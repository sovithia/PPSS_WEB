<?php 

require_once("functions.php");



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
?>