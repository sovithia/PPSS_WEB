<?php 

require_once("functions.php");


/*
function purifyAll()
{
    $db = getDatabase();
    $indb = getInternalDatabase();
    $sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE PPSS_IS_BLACKLIST IS NOT NULL";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "SELECT count(*) as 'COUNT' FROM ITEMREQUEST WHERE PRODUCTID = ?";
        $req = $indb->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res["COUNT"] != "0" && $res["COUNT"] != 0){
            echo "Deleting ".$res["COUNT"]." items : ".$item["PRODUCTID"]."\n";
            $sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ?";
            $req = $indb->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
        }                    
    }
}

function purifyGroupedPurchases()
{
    $db = getInternalDatabase();
    $sql = "select ID FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND REQUESTEE IS NULL";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item)
    {
        $sql = "select PRODUCTID,ID
                FROM ITEMREQUEST as IR2
                WHERE ITEMREQUESTACTION_ID = ?
                GROUP BY PRODUCTID
                HAVING (SELECT COUNT(PRODUCTID) FROM ITEMREQUEST WHERE PRODUCTID = IR2.PRODUCTID AND ITEMREQUESTACTION_ID = ?) > 1
                ORDER BY PRODUCTID";
        $req = $db->prepare($sql);
        $req->execute(array($item["ID"],$item["ID"]));               
        $itemsToDelete = $req->fetchAll(PDO::FETCH_ASSOC);
               
        foreach($itemsToDelete as $itemToDelete){

             $sql = "SELECT ID FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ? AND PRODUCTID = ?";
             $req = $db->prepare($sql);
             $req->execute(array($item["ID"],$itemToDelete["PRODUCTID"]));
             $itemsToDelete2 = $req->fetchAll(PDO::FETCH_ASSOC);

             $count = 0; 
            echo "Item: ".$itemToDelete["PRODUCTID"]." count: ".count($itemsToDelete2)."\n";
            foreach($itemsToDelete2 as $itemToDelete2){
                if ($count == 0){
                    $count++;
                    continue;
                }                
                $sql = "DELETE FROM ITEMREQUEST WHERE ID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($itemToDelete2["ID"]));    
                echo "Deleting ".$itemToDelete["PRODUCTID"]."\n";
                $count++;
            }
            
        }         
    }   
}
purifyGroupedPurchases();
*/


function difference()
{
    $db = getDatabase();
    $sql = "SELECT PRODUCTID,ONHAND,
            (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
     FROM ICPRODUCT";
     $req = $db->prepare($sql);
     $req->execute(array());
     $items = $req->fetchAll();
     foreach($items as $item){        
        $sum = $item['WH1'] + $item['WH2'];
        if ($sum != $item["ONHAND"]){            
            echo $item["PRODUCTID"]." WH1: ".$item['WH1']." WH2:".$item["WH2"]." ONHAND:".$item["ONHAND"]."\n";            
            $sql = "UPDATE ICPRODUCT SET ONHAND = ?, DATEEDIT = GETDATE() WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            //$req->execute(array($sum,$item["PRODUCTID"]));
        }
     }    
}
difference();


//UPDATE ICPRODUCT_SALEUNIT SET DISC = 0.0;
/*
function repricePack()
{
    $db = getDatabase();
    $sql = "SELECT PRODUCTID,SALEFACTOR,SALEPRICE,DISC  FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($items as $item){
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $oneData = $req->fetch(PDO::FETCH_ASSOC);
        
        echo $item["PRODUCTID"]."\n";
        $expected = ($oneData["PRICE"] * $item["SALEFACTOR"]) * 1;
        //if (round($item["SALEPRICE"],2) != round($expected,2)){
            echo $item["PRODUCTID"].": SALEPRICE :".$item["SALEPRICE"];        
            echo " EXPECTED: ".$expected."\n";    
            $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ?, DATEADD = GETDATE() WHERE PRODUCTID = ? AND SALEFACTOR = ?";
            $req = $db->prepare($sql);
            $req->execute(array($expected,$item["PRODUCTID"],$item["SALEFACTOR"]));
            //break;
        //}        
        //sleep(1);
    }
}
*/


//repricePack()

/*
function extractWrongPacking()
{
    $db = getDatabase();
    $sql = "SELECT ICPRODUCT.PRODUCTNAME,ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,QTY_ORDER, PACKINGNOTE,TRANDATE
            FROM PORECEIVEDETAIL,ICPRODUCT 
            WHERE PORECEIVEDETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
            AND PACKINGNOTE <> 'NR'
            AND PACKINGNOTE <> ''
            AND PACKINGNOTE <> 'N/A'
            AND PACKINGNOTE <> 'NOEXPIRE'
            AND PACKINGNOTE <> 'NO'
            AND SUBSTRING(PACKINGNOTE, 0, 3) <> '1x'
            AND SUBSTRING(PACKINGNOTE, 0, 3) <> '1X'";
    $req = $db->prepare($sql);
    $req->execute(array());
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    $problemData = array();
    foreach($data as $item){
        if (str_contains($item["PACKINGNOTE"],"x")){
            $qty = explode('x',$item["PACKINGNOTE"])[0];
            $qty = str_replace(' ', '', $qty);
            
        }else if (str_contains($item["PACKINGNOTE"],"X")){
            $qty = explode('X',$item["PACKINGNOTE"])[0];
            $qty = str_replace(' ', '', $qty);
        }else
            continue;        
        if ($item["QTY_ORDER"] <  $qty)
        {
            //echo $item["QTY_ORDER"].":".$qty."\n";
            $problemData[$item["PRODUCTID"]] = $item;            
        }     
    }
    $content = "";
    foreach($problemData as $data){
        $content .= $data["VENDID"].";".$data["PRODUCTID"].";".str_replace('\n','',$data["PRODUCTNAME"]).";".$data["PACKINGNOTE"].";".$data["QTY_ORDER"]."\n";

    }
    file_put_contents("problems.csv",$content);
    //var_dump(count($problemData));
}
*/

//extractWrongPacking();
?>

