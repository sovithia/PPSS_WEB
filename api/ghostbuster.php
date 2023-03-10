<?php 

require('functions.php');


function copyExcel()
{
    $file = fopen('counted.csv', 'r');
    $db = new PDO('sqlite:'.dirname(__FILE__).'/../db/GhostBuster.sqlite');
    
    while (($line = fgetcsv($file,0,';')) !== FALSE) {       
        //$splitted = explode(';',$line[0]);
        $barcode = $line[0];
        $onhand = $line[1];
        $counted = $line[2];
        //echo $barcode."|".str_replace(',','.',$onhand)."|".str_replace(',','.',$counted)."\n";
       $sql = "INSERT INTO COUNTED (PRODUCTID, ONHAND, COUNTED) VALUES (?,?,?)";
       $req = $db->prepare($sql);
       $req->execute(array($barcode,$onhand,$counted));
    }
    fclose($file);
}


function receivedInBetween()
{
    $db = getDatabase();
    $ghostdb = new PDO('sqlite:'.dirname(__FILE__).'/../db/GhostBuster.sqlite');

    $sql = "SELECT DISTINCT(PRODUCTID) FROM PORECEIVEDETAIL WHERE DATEADD BETWEEN '2023-03-09 00:00:00.000' AND '2023-03-11 00:00:00.000'";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($items as $item){
        $sql = "SELECT PRODUCTID FROM RECEIVED WHERE PRODUCTID = ?";
        $req = $ghostdb->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            $sql = "INSERT INTO RECEIVED (PRODUCTID) VALUES (?)";
            $req = $ghostdb->prepare($sql);
            $req->execute(array($item["PRODUCTID"])); 
        }         
        
    }
}

receivedInBetween();
?>