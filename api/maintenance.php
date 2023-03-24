<?php 

require_once("functions.php");

// Once Per Month 
function AddAnnualLeave(){
    $db = getInternalDatabase();
    $sql = "UPDATE USER SET RESTCREDIT = RESTCREDIT + 12";
    $req = $db->prepare($sql);
    $req->execute(array());

}

// Once Every Day
function ScanPack(){
    $db = getDatabase();
    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack)
    {
        $sql = "SELECT DISCOUNT_TYPE,DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = ? AND GETDATE() < DATETO ";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($res != false){            
            $disctype = $res["DISCOUNT_TYPE"];
            $discvalue = $res["DISCOUNT_VALUE"];
        }else{            
            $disctype = "";
            $discvalue = "";
        }
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res2 = $req->fetch(PDO::FETCH_ASSOC);   
        if ($res2 == false){
            echo "Price not found for ".$pack["PRODUCTID"]."\n";
            continue;
        }
        
        $UNITPRICE = $res2["PRICE"];

        // CHECK IF PRICE IS IRREGULAR
        $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        
        $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
        $req = $db->prepare($sql); 
        $req->execute(array($pack["PACK_CODE"]));
        $res3 = $req->fetch(PDO::FETCH_ASSOC);    
        $currentPrice = $res3["SALEPRICE"];    
        $calculatedIrregular = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
        $calculatedNormalPromo = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.9,4);                

        if (floatval($currentPrice) != floatval($fullPrice) &&
            floatval($currentPrice) != floatval($calculatedIrregular) && 
            floatval($currentPrice) != floatval($calculatedNormalPromo)            
            ){// WE LEAVE IRREGULAR PRICE UNTOUCHED
            echo "Skip for ".$pack["PRODUCTID"];
            continue;
        }

                              
        if($res == false)
        {             
                // IF NO PROMO, 10% DISC ON PRICE                                                                    
            $calculated = round((($UNITPRICE * $pack["SALEFACTOR"]) * 0.9),4);                
            if (floatval($pack["SALEPRICE"]) != $calculated){
                echo "SETTING 10% DISC FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR) * 0.9), DATEADD = GETDATE() WHERE PACK_CODE = ?";
                $req = $db->prepare($sql);
                $req->execute(array($UNITPRICE,$pack["PACK_CODE"])); 
            }                        
        }
        else
        {                   
            // FULL PRICE      
            // WE NEED TO CHECK IF THE PRICE WE ARE ABOUT TO CHANGE IS A WEIRD PRICE BECAUSE NOT EQUAL TO SALEFACTOR
            $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        
            $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
            $req = $db->prepare($sql); 
            $req->execute(array($pack["PACK_CODE"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);    
            $currentPrice = $res["SALEPRICE"];                                
            // We don't apply discount because it is applied automatically after
            $calculated = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
            if (floatval($pack["SALEPRICE"]) != $calculated){
                echo "SETTING FULL PRICE FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ?, DATEADD = GETDATE() WHERE PACK_CODE = ?";
                $req = $db->prepare($sql);
                $req->execute(array($calculated,$pack["PACK_CODE"])); 
            }
        }
        
    } 
}

function ResetPack(){
    $db = getDatabase();
    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack){
        
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res2 = $req->fetch(PDO::FETCH_ASSOC);
        if ($res2 != false){
            $UNITPRICE = $res2["PRICE"];        
            $calculated = round(($UNITPRICE * $pack["SALEFACTOR"]),4);  
        
            if ($calculated != $pack["SALEPRICE"])// Skip on irregular price.
                continue;
            //echo "CURR:".floatval($pack["SALEPRICE"])."|EXP:".$calculated."\n";            
            echo "SETTING FULL PRICE FOR ".$pack["PACK_CODE"].":".$calculated."\n";
            $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR)), DATEADD = GETDATE() WHERE PACK_CODE = ?";
            $req = $db->prepare($sql);
            $req->execute(array($UNITPRICE,$pack["PACK_CODE"]));                     
        }
               
    }
}

// Once Every 5 minutes
function ScanPriceChange(){
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
    echo "Items count: ". count($items)."\n";
    $i = 0;
    foreach($items as $item){
        $i++;
        echo $i."\n";
        $sql = "SELECT CATEGORYID FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $category = $req->fetch(PDO::FETCH_ASSOC);
        if ($category == false){
            echo "category false\n";
            continue;        
        }
        
            
        if (in_array($category["CATEGORYID"],$excludeCategories)){
            echo "exclude category\n";
            continue;
        }
            

        if (floatval($item["NEWCOST"]) > floatval($item["OLDCOST"]) &&  ((floatval($item["NEWCOST"]) - floatval($item["OLDCOST"])) > 0.02) )
        {

            $diff = floatval($item["NEWCOST"]) - floatval($item["OLDCOST"]);

            if ($item["NEWCOST"] == 0 || $item["OLDCOST"] == 0)
                continue;
            $percent = (($item["NEWCOST"] - $item["OLDCOST"]) / $item["OLDCOST"]);
            
            $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
            $oneitem = $req->fetch(PDO::FETCH_ASSOC);

            $oldPrice = $oneitem["PRICE"];
            //$newPrice = $oneitem["PRICE"] + ($oneitem["PRICE"] * $percent);
            $newPrice = $oneitem["PRICE"] + $diff;
            $newPrice = round($newPrice,2);

            $sql = "SELECT * FROM PRICECHANGE WHERE PRODUCTID = ? AND REQUESTEE IS null";            
            $req = $indb->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);
            if ($res == false){
                echo "insert\n";
                $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER,OLDCOST,NEWCOST) values(?,?,?,?,?,?,?)";	
                $req = $indb->prepare($sql);
                $req->execute(array($item["PRODUCTID"], $oldPrice, $newPrice,'CREATED',"AUTO",$item["OLDCOST"],$item["NEWCOST"]));	

                $sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	            $req = $db->prepare($sql);
	            $req->execute(array($item["PRODUCTID"]));
	            $res = $req->fetch(PDO::FETCH_ASSOC);
	            $STORBIN = $res["STORBIN"] ?? "";
	            $STORBIN = explode('-',$STORBIN)[0];
    
                $sql = "SELECT * 
                        FROM USER,TEAM 
                        WHERE USER.team_id = TEAM.ID                         
                        AND LOCATION LIKE ?"; 
                $req = $indb->prepare($sql);
                $req->execute(array("'%".$STORBIN."%'"));
                $userstopush = $req->fetchAll(PDO::FETCH_ASSOC);
                foreach($userstopush as $user){
                    sendPushToUser("PRICE CHANGE","Price change requested for product ".$json["PRODUCTID"],$user["ID"]);
                }                 
            }            
        }  
    }   
    $sql = "DELETE FROM RS_PRICECHANGE_QUEUE";
    $req = $db->prepare($sql);
    $req->execute(array());        
}

// Once Per Day 
function CashierClean(){
    
    $cashierDB = getDatabase("CASHIER");
    
    //$sql = "SELECT PRODUCTID FROM link_main.PhnomPenhsuperstore2019.dbo.icproduct";
    //$req = $cashierDB->prepare($sql);
    //$res = $req->execute(array());  
    //$data =  $req->fetchAll(PDO::FETCH_ASSOC);  
    //var_dump($data);

    $sql = "DELETE FROM ICPRODUCT WHERE PRODUCTID NOT IN (SELECT PRODUCTID FROM link_main.PhnomPenhsuperstore2019.dbo.icproduct)";
    $req = $cashierDB->prepare($sql);
    $res = $req->execute(array());        
}


function LogAction($str){
    system("echo '".$str."' >> /var/log/daemon.log");
}

if ($argc > 1 && $argv[1] == "SCANPACK"){
    ScanPack();
    LogAction(date("Y-m-d H:i:s").":SCANPACK");
}
else if ($argc > 1 && $argv[1] == "RESETPACK"){
    ResetPack();
    LogAction(date("Y-m-d H:i:s").":RESETPACK");
}    
else if ($argc > 1 && $argv[1] == "PRICECHANGE"){    
    ScanPriceChange();
    LogAction(date("Y-m-d H:i:s").":PRICECHANGE");
}else if ($argc > 1 && $argv[1] == "AL"){
    AddAnnualLeave();
    LogAction(date("Y-m-d H:i:s").":AL");
}else if ($argc > 1 && $argv[1] == "CASHIERCLEAN"){
    CashierClean();
    LogAction(date("Y-m-d H:i:s").":CASHIERCLEAN");
}
else
	error_log("WARNING !!! maintenance attempt");


?>
