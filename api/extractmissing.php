<?php 

function getDatabase()
{ 
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');	  		
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  	
	return $conn;
}


function extractMissingImage()
{
	$db=getDatabase();
	$sql = "SELECT PRODUCTID,VENDID,PRODUCTNAME,PRODUCTNAME1 FROM ICPRODUCT WHERE ONHAND > 0";

	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$content = "";
	foreach($items as $item)
	{
		if (!file_exists("/Volumes/Image/".$item["PRODUCTID"].".jpg"))
		{
			echo $item["PRODUCTID"]."\n";
			$sql = "SELECT STORBIN FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = 'WH2'";
			$req = $db->prepare($sql);	
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			$content .= $item["PRODUCTID"].",".$item["PRODUCTNAME"].",".$item["PRODUCTNAME1"].",".$res["STORBIN"]."\n";   

		}		
	}
	file_put_contents("./missing.csv",$content);
} 

extractMissingImage();

?>