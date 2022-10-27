<?php 
require_once 'functions.php';




function cleanAll()
{
    $db = getDatabase();  
    $sql = "SELECT PRODUCTID,ONHAND,
                   (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
                   (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2' 
                   FROM ICPRODUCT";

    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    $count = 0;
    foreach($items as $item){      
        $sum = $item["WH1"] + $item["WH2"];
        if($sum != $item["ONHAND"]){                
            echo $item["PRODUCTID"].":".$item["ONHAND"]." WH1:".$item["WH1"]." WH2:".$item["WH2"]."\n";
            echo "DIFF".$sum."\n";
            $count++;
            $sql = "UPDATE ICPRODUCT SET ONHAND = ? WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($sum,$item["PRODUCTID"]));
            sleep(1);
        }            
    }   
    echo "COUNT".$count; 
}

cleanAll();
?>