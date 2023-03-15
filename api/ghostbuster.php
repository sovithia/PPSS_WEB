<?php 

require('functions.php');


function copyExcel()
{
    $file = fopen('counted.csv', 'r');
    $db = new PDO('sqlite:'.dirname(__FILE__).'/../db/GhostBuster.sqlite');
    
    while (($line = fgetcsv($file,0,';')) !== FALSE) {               
        $barcode = $line[0];
        $onhand = $line[1];
        $counted = $line[2];        
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

    $sql = "SELECT DISTINCT(PRODUCTID) FROM PORECEIVEDETAIL WHERE DATEADD BETWEEN '2023-03-09 00:00:00.000' AND '2023-03-15 00:00:00.000'";
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

function listGhost()
{
    $db = getDatabase();
    $ghostdb = new PDO('sqlite:'.dirname(__FILE__).'/../db/GhostBuster.sqlite');
    

    $sql = "SELECT ICPRODUCT.PRODUCTID,ONHAND,LOCID,LOCONHAND FROM ICPRODUCT,ICLOCATION 
            WHERE ICPRODUCT.PRODUCTID = ICLOCATION.PRODUCTID
            AND LOCID = 'WH1'
            AND LOCONHAND <> 0";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($items as $item){
        $sql = "SELECT PRODUCTID FROM COUNTED WHERE PRODUCTID = ?";
        $req = $ghostdb->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            $sql = "INSERT INTO GHOST (PRODUCTID) VALUES (?)";
            $req = $ghostdb->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));            
            //echo "GHOST:".$item["PRODUCTID"]." ".$item["ONHAND"]."\n";
        }else{
            //echo "NO GHOST:".$item["PRODUCTID"]." ".$item["ONHAND"]."\n";
        }
    }
}


function diffGhost()
{
    $ghostdb = new PDO('sqlite:'.dirname(__FILE__).'/../db/GhostBuster.sqlite');
    $sql = "SELECT PRODUCTID FROM GHOST";

    $req = $ghostdb->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "SELECT PRODUCTID FROM RECEIVED WHERE PRODUCTID = ?";
        $req = $ghostdb->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res != false){
            echo "DELETING ".$item["PRODUCTID"]."\n";
            $sql = "DELETE FROM GHOST WHERE PRODUCTID = ?";
            $req = $ghostdb->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
        }
    }
}

function updatePolicies()
{
    $db = getDatabase();
    $file = fopen('MERGED_POLICY.csv', 'r');
    while (($line = fgetcsv($file,0,';')) !== FALSE) {               
        $sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($line[1],$line[0]));
        echo $line[0]."|".$line[1]."\n";
        sleep(1);
        //$barcode = $line[0];
        //$onhand = $line[1];
        //$counted = $line[2];        
       //$sql = "INSERT INTO COUNTED (PRODUCTID, ONHAND, COUNTED) VALUES (?,?,?)";
       //$req = $db->prepare($sql);
       //$req->execute(array($barcode,$onhand,$counted));
    }
    fclose($file);
}
updatePolicies();
//receivedInBetween();
//diffGhost();



?>