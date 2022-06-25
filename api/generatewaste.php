<?php 


require_once 'functions.php';

$db = getInternalDatabase();
$sql = "SELECT * FROM DEPRECIATION WHERE TYPE = 'DAMAGEWASTE' OR TYPE = 'EXPIREWASTE'";

$req = $db->prepare($sql);
$req->execute(array());
$depreciations = $req->fetchAll(PDO::FETCH_ASSOC);


foreach($depreciations as $depreciation){
    echo $depreciation["ID"]." ".$depreciation["STATUS"]."\n";
    $db->beginTransaction();
    $sql = "INSERT INTO WASTE (TYPE,STATUS,CREATED,CREATOR,VALIDATOR,CLEARER,UPDATED) VALUES (?,?,?,?,?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($depreciation["TYPE"],$depreciation["STATUS"],$depreciation["CREATED"],$depreciation["CREATOR"],$depreciation["VALIDATOR"],$depreciation["CLEARER"],$depreciation["UPDATED"]));
    $lastID = $db->lastInsertId();
    $db->commit(); 


    $sql = "SELECT * FROM DEPRECIATIONITEM WHERE DEPRECIATION_ID1 = ?";
    $req = $db->prepare($sql);
    $req->execute(array($depreciation["ID"]));
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "INSERT INTO WASTEITEM (PRODUCTID,EXPIRATION,QUANTITY,WASTE_ID,CREATED,TYPE) VALUES (?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"],$item["EXPIRATION"],$item["QUANTITY1"],$lastID,$item["CREATED"],$item["TYPE"]));        
    }

}

?>