<?php 
function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
		

	$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');		
	//$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	
	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	return $conn;
}

$db = getDatabase();
$sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
$req = $db->prepare($sql);
$req->execute(array());
$items = $req->fetchAll(PDO::FETCH_ASSOC);


foreach($items as $item)
{
	$sql = "SELECT count(*) as NB FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
	$req = $db->prepare($sql);
    $req->execute(array($item["PACK_CODE"]));
	$data = $req->fetch();    
    //echo $item["PRODUCTID"].":".$data['NB']."\n";
	
    if ($data != false && $data['NB'] > 1)
		echo $item["PRODUCTID"]."\n";//.":".$data['NB']."\n";
    //else
    //    echo "";//$item["PRODUCTID"]."\n";
}
?>