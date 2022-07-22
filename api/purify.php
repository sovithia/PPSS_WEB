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

purifyAll();
?>