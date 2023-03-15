<?php

require_once("functions.php");



function go()
{
    $db = getDatabase();
    $adjustdb = getInternalDatabase();

    $sql = "SELECT PRODUCTID,PRODUCTNAME,ONHAND,LASTCOST,PRICE FROM ICPRODUCT";
    $db->prepare($sql);
    $req = $db->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "SELECT PRODUCTID,QUANTITY,COST,PRICE FROM ADJUSTED WHERE PRODUCTID = ?";
        $req = $adjustdb->prepare($sql);
        $req->execute(array());
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            $sql = "INSERT INTO GHOST (PRODUCTID,QUANTITY,COST,PRICE) VALUES (?,?,?,?)";
            $req = $adjustdb->prepare($sql);
            //$req->execute(array($item["PRODUCTID"],$item["ONHAND"],$item["LASTCOST"],$item["PRICE"]));            
            echo "GHOST:".$item["PRODUCTID"]." ".$item["PRODUCTNAME"]." ".$item["ONHAND"]."\n";
        }
    }
}



?>