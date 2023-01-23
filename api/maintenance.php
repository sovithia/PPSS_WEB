<?php 

require_once("functions.php");

// Once Per Month 
function AddAnnualLeave()
{
    $db = getInternalDatabase();
    $sql = "UPDATE USER SET RESTCREDIT = RESTCREDIT + 12";
    $req = $db->prepare($sql);
    $req->execute(array());

}

// Once Every 2 Hours
function ScanPack()
{
    $db = getDatabase();
    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($packs as $pack){
        $sql = "SELECT * FROM ICNEWPROMOTION WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res2 = $req->fetch(PDO::FETCH_ASSOC);
        if ($res2 != false){
            $UNITPRICE = $res2["PRICE"];
            if($res == false){ // IF NO PROMO 10% DISC ON PRICE                                                
                $calculated = round( (($UNITPRICE * $pack["SALEFACTOR"]) * 0.9),4);
                //echo "CURR:".floatval($pack["SALEPRICE"])."|EXP:".$calculated."\n";
                if (floatval($pack["SALEPRICE"]) != $calculated){
                    echo "SETTING 10% DISC FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                    $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR) * 0.9), DATEADD = GETDATE() WHERE PACK_CODE = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($UNITPRICE,$pack["PACK_CODE"])); 
                }            
            }else{ // FULL PRICE     
                $calculated = round(($UNITPRICE * $pack["SALEFACTOR"]),4);                           
                //echo "CURR:".floatval($pack["SALEPRICE"])."|EXP:".$calculated."\n";
                if (floatval($pack["SALEPRICE"]) != $calculated){
                    echo "SETTING FULL PRICE FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                    $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR)), DATEADD = GETDATE() WHERE PACK_CODE = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($UNITPRICE,$pack["PACK_CODE"])); 
                }
            } 
        }
               
    }
}

// Once Every 5 minutes
function ScanPriceChange()
{
    $indb = getInternalDatabase();
    $db = getDatabase();
    $sql = "SELECT * FROM RS_PRICECHANGE_QUEUE";    
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll();
    $excludeCategories = array(
        'BEEF',
        'DRY FRUITS',
        'DRY MEAT',
        'DRY SAUSAGE',
        'DRY VEGETABLES',
        'EGGS',
        'FISH',
        'FOOD SET',
        'FRESH FRUITS',
        'FRESH NOODLE|RICE NOODLE',
        'FRESH TOFU',
        'FRESH VEGETABLE',
        'GIBLETS',
        'MEATBALLS',
        'ORGANIC FRUITS',
        'ORGANIC VEGETABLE',
        'OTHER(ORGANIC VEG|FRUIT)',
        'OTHER(VEGETABLES|FRUITS)',
        'POULTRY',
        'SEAFOOD',
        'SEALED TOFU',
        'SEALED VEGETABLES'
    );
    foreach($items as $item){

        $sql = "SELECT CATEGORYID FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $category = $req->fetch(PDO::FETCH_ASSOC);
        if ($category == false)
            continue;        
        if (in_array($category["CATEGORYID"],$excludeCategories))
            continue;

        if ($item["NEWCOST"] > $item["OLDCOST"] &&  (($item["NEWCOST"] - $item["OLDCOST"]) > 0.02) )
        {
            if ($item["NEWCOST"] == 0 || $item["OLDCOST"] == 0)
                continue;
            $percent = (($item["NEWCOST"] - $item["OLDCOST"]) / $item["OLDCOST"]);
            
            $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
            $oneitem = $req->fetch(PDO::FETCH_ASSOC);

            $oldPrice = $oneitem["PRICE"];
            $newPrice = $oneitem["PRICE"] + ($oneitem["PRICE"] * $percent);

            $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER) values(?,?,?,?,?)";	
            $req = $indb->prepare($sql);
            $req->execute(array($item["PRODUCTID"], $oldPrice, $newPrice,'CREATED',"AUTO"));	
        }  
    }  
	$sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$STORBIN = $res["STORBIN"] ?? "";
	$STORBIN = explode('-',$STORBIN)[0];

	$sql = "SELECT * FROM USER WHERE LOCATION LIKE ?"; 
	$req = $db->prepare($sql);
	$req->execute(array($STORBIN));
	$userstopush = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($userstopush as $user){
		sendPushToUser("PRICE CHANGE","Price change requested for product ".$json["PRODUCTID"],$user["ID"]);
	}    
    $sql = "DELETE FROM RS_PRICECHANGE_QUEUE";
    $req = $db->prepare($sql);
    $req->execute(array());    
}


if ($argc > 1 && $argv[1] == "PACK"){
    ScanPack();
}else if ($argc > 1 && $argv[1] == "PRICECHANGE"){
    ScanPriceChange();
}else if ($argc > 1 && $argv[1] == "AL"){
    AddAnnualLeave();
}
else
	error_log("WARNING !!! maintenance attempt");
?>