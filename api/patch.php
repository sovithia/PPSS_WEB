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
        $sql = "SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
        $req = $db->prepare($sql);
        $req->execute(array($onedata["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res == false){
            //print("Look in podetail|");
            $sql = "SELECT TOP(1) TRANCOST FROM PODETAIL WHERE PRODUCTID = ? AND POSTATUS = 'C' ORDER BY RECEIVE_DATE DESC";
            $req = $db->prepare($sql);
            $req->execute(array($onedata["PRODUCTID"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);
        }


        if ($res == false){
            //echo "ID:".$onedata["PRODUCTID"]." never received\n";
        }
        else{
            $old = floatval($onedata["LASTCOST"]);
            $new = floatval($res["TRANCOST"]);
            if ($old != $new){
                echo "ID:".$onedata["PRODUCTID"]." ICPRODUCT LC: " .$old."|PORECV LC: ".$new."\n";
                echo "Updating...\n";
                $sql = "UPDATE ICPRODUCT SET LASTCOST = ? WHERE PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($new,$onedata["PRODUCTID"]));        
                
            }else{
                //echo "ID:".$onedata["PRODUCTID"]."SAME\n";
            }      
        }          
    }
}

updateAllLastCost();
?>