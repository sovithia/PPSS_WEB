<?php 


// Run everyday at midnight 
function CleanPromoPack()
{
    $indb = getInternalDatabase();
    $db = getDatabase();
    
    $sql = "SELECT PACKCODE FROM PROMOPACK WHERE END < GETDATE()";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack){        
        $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((PRICE * SALEFACTOR) * 0.9), DATEADD = GETDATE() WHERE PACKCODE = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PACKCODE"]));
    }
    $sql = "DELETE FROM PROMOPACK WHERE END < GETDATE()";
    $req = $db->prepare($sql);
    $req->execute();    
}

// Run Every 30 minutes
function CleanPriceChange()
{
    $indb = getInternalDatabase();
    $sql = "SELECT * FROM RS_PRICECHANGE_QUEUE";    
    $req = $indb->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll();
    foreach($items as $item){
        if ($item["NEWCOST"] > $item["OLDCOST"] &&  (($item["NEWCOST"] - $item["OLDCOST"]) > 0.1) )
        {
            $percent = (($item["NEWCOST"] - $item["OLDCOST"]) / $item["OLDCOST"]);
            
            $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $oneitem = $req->execute($item["PRODUCTID"]);

            $oldPrice = $oneitem["PRICE"];
            $newPrice = $oneitem["PRICE"] + ($oneitem["PRICE"] * $percent);

            $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER) values(?,?,?,?,?)";	
            $req = $indb->prepare($sql);
            $req->execute(array($item["PRODUCTID"], $oldPrice, $newPrice,'CREATED',"AUTO"));	
        }  
    }  
	$sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $dbBLUE->prepare($sql);
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
    $req = $indb->prepare($sql);
    $req->execute(array());    
}



?>