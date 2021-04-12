<?php

require_once 'vendor/autoload.php';
require_once 'RestEngine.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

/**************CORE ***************/

function getDatabase()
{ 
	$conn = null;      
	try  
	{  
	
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=SuperStore2_Data;ConnectionPooling=0', 'sa', 'blue'); 
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
	die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}


	$conn=getDatabase();
	$sql = 
	"DECLARE @img varbinary(max)
	SELECT @img = PICTURE from  dbo.ICPRODUCT where BARCODE = ?;
	SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@img\"))','VARCHAR(MAX)') AS PICTURE
	FROM ICPRODUCT 
	WHERE BARCODE = ?"; 

	$barcodes = file_get_contents("barcodes.txt");
	$barcodes = explode(" ",$barcodes); 

	foreach($barcodes as $barcode)
	{
		
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,$barcode));
		$item=$req->fetch(PDO::FETCH_ASSOC);
		if ($item["PICTURE"] == null)
			continue;
		;
		if (!file_exists("generate/".$barcode.".jpg"))
		{
			echo "GO\n";
			file_put_contents("generate/".$barcode.".jpg",base64_decode($item["PICTURE"])); 
		}
		//break;
	}	

	echo "OK";
?>