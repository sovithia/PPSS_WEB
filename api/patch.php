<?php 

require_once("functions.php");

function updateAllLastCost()
{
    $sql = "SELECT PRODUCTID,LASTCOST FROM ICPRODUCT";
    $db = getDatabase();
    $req = $db->prepare($sql);
    $req->execute(array());
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $onedata){
        $sql = "SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($onedata["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        $old = floatval($data["LASTCOST"]);
        $new = floatval($res["TRANCOST"]);
        

        if ($old != $new){
            echo "ID:".$onedata["PRODUCTID"]." ICPRODUCT LC: " .$old."|PORECV LC: ".$new."\n";
            /*
            $sql = "UPDATE ICPRODUCT SET LASTCOST = ? WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($new,$onedata["PRODUCTID"]));        
            */
        }else{
            echo "ID:".$onedata["PRODUCTID"]."SAME\n";
        }    
    }

}

//updateAllLastCost();
?>