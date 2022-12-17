<?php 

require_once("functions.php");

function CleanPackPromo()
{
    $indb = getInternalDatabase();
    $db = getDatabase();
    
    $sql = "SELECT PACKCODE FROM PACKPROMO WHERE ENDPROMO < DATE()";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack){        
        $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((PRICE * SALEFACTOR) * 0.9), DATEADD = GETDATE() WHERE PACKCODE = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PACKCODE"]));
    }
    $sql = "DELETE FROM PACKPROMO WHERE ENDPROMO < DATE()";
    $req = $indb->prepare($sql);
    $req->execute();    
}

function CleanPriceChange()
{
    $indb = getInternalDatabase();
    $db = getDatabase();
    $sql = "SELECT * FROM RS_PRICECHANGE_QUEUE";    
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll();
    foreach($items as $item){
        if ($item["NEWCOST"] > $item["OLDCOST"] &&  (($item["NEWCOST"] - $item["OLDCOST"]) > 0.1) )
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
    $req = $indb->prepare($sql);
    $req->execute(array());    
}


if ($argc > 1 && $argv[1] == "CROCODILE"){
    CleanPackPromo();
    CleanPriceChange();
}
else
	error_log("WARNING !!! maintenance attempt");


?>