<?php 


function getDatabase()
{ 	
    $conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  		
	return $conn;
}


function updateWithLastCost()
{
    $db = getDatabase();
    // WH1 
    $sql = "SELECT PRODUCTID,LOCCOST,LOCLASTCOST,RECENTLOCCOST FROM ICLOCATION WHERE  (LOCCOST = 0 OR LOCLASTCOST = 0 OR RECENTLOCCOST = 0) AND (LOCID = 'WH1' OR LOCID = 'WH2') " ;
    $req = $db->prepare($sql);
    $req->execute(array());
    $items =  $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($items as $item){

        $sql = "SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";    
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res != false){
            echo "Updating ".$item["PRODUCTID"]." : ".$res["TRANCOST"]."\n";
            $sql = "UPDATE ICLOCATION SET LOCCOST = ?, RECENTLOCCOST = ?, LOCLASTCOST = ?, DATEEDIT =GETDATE()  WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($res["TRANCOST"],$res["TRANCOST"],$res["TRANCOST"],$item["PRODUCTID"]));
        }else
            echo "LAST COST NOT FOUND FOR ".$item["PRODUCTID"]."\n";   
    }
}

$db = getDatabase();
// WH1 
/*
$sql = "SELECT PRODUCTID,LOCCOST,LOCLASTCOST,RECENTLOCCOST FROM ICLOCATION WHERE  LOCID = 'WH1' AND (LOCCOST = 0 OR LOCLASTCOST = 0 OR RECENTLOCCOST = 0)" ;
$req = $db->prepare($sql);
$req->execute(array());
$items =  $req->fetchAll(PDO::FETCH_ASSOC);

foreach($items as $item){

    if ($item["LOCLASTCOST"] != 0){
        $sql = "UPDATE ICLOCATION SET LOCCOST = LOCLASTCOST, RECENTLOCCOST = LOCLASTCOST WHERE PRODUCTID = ? AND LOCID = 'WH1'";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        echo "Found in WH1 LOCLASTCOST ".$item["LOCLASTCOST"]."\n";
    }
    else if ($item["LOCCOST"] == 0 && $item["LOCLASTCOST"] == 0 && $item["RECENTLOCCOST"] == 0)
    {
        $sql = "SELECT PRODUCTID,LOCCOST,LOCLASTCOST,RECENTLOCCOST FROM ICLOCATION WHERE  LOCID = 'WH2' AND PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res != false && ($res["LOCLASTCOST"]) != 0){
            echo "Found in WH2 LOCLASTCOST ".$res["LOCLASTCOST"]."\n";

            $sql = "UPDATE ICLOCATION SET LOCCOST = ?, RECENTLOCCOST = ?,LOCLASTCOST = ? WHERE PRODUCTID = ? AND LOCID = 'WH1'";
            $req = $db->prepare($sql);
            $req->execute(array($res["LOCLASTCOST"],$res["LOCLASTCOST"],$res["LOCLASTCOST"],$item["PRODUCTID"]));
        }
    }
}
*/

// WH2
$sql = "SELECT PRODUCTID,LOCCOST,LOCLASTCOST,RECENTLOCCOST FROM ICLOCATION WHERE  LOCID = 'WH2' AND (LOCCOST = 0 OR LOCLASTCOST = 0 OR RECENTLOCCOST = 0)" ;
$req = $db->prepare($sql);
$req->execute(array());
$items =  $req->fetchAll(PDO::FETCH_ASSOC);

foreach($items as $item){

    if ($item["RECENTLOCCOST"] != 0){
        $sql = "UPDATE ICLOCATION SET LOCCOST = RECENTLOCCOST, LOCLASTCOST = RECENTLOCCOST  WHERE PRODUCTID = ? AND LOCID = 'WH2'";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        echo "Found in WH1 RECENTLOCCOST ".$item["RECENTLOCCOST"]."\n";
    }
    else if ($item["LOCCOST"] == 0 && $item["LOCLASTCOST"] == 0 && $item["RECENTLOCCOST"] == 0)
    {
        $sql = "SELECT PRODUCTID,LOCCOST,LOCLASTCOST,RECENTLOCCOST FROM ICLOCATION WHERE  LOCID = 'WH1' AND PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res != false && ($res["RECENTLOCCOST"]) != 0){
            echo "Found in WH2 RECENTLOCCOST ".$res["RECENTLOCCOST"]."\n";

            $sql = "UPDATE ICLOCATION SET LOCCOST = ?, RECENTLOCCOST = ?,LOCLASTCOST = ? WHERE PRODUCTID = ? AND LOCID = 'WH2'";
            $req = $db->prepare($sql);
            $req->execute(array($res["RECENTLOCCOST"],$res["RECENTLOCCOST"],$res["RECENTLOCCOST"],$item["PRODUCTID"]));
        }
    }
}

?>