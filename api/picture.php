<?php 

require_once 'RestEngine.php';


$URL = "http://192.168.72.62/api/api.php/picture/";


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


function getImage($barcode)
{
	if(strpos($barcode," ") !== false){
		$path = "img/mystery.png";		
		$data = file_get_contents($path);
		return base64_encode($data);	  
	}

	$json = RestEngine::GET($GLOBALS['URL'].$barcode);      

	if ($json["result"] != "KO")					
		return $json["image"];
	else if (file_exists("img/products/".$barcode.".jpg"))
	{
		$path = "img/products/".$barcode.".jpg";		
		$data = file_get_contents($path);

	}
	else if (file_exists("img/products/".$barcode.".png"))
	{
		$path = "img/products/".$barcode.".jpg";		
		$data = file_get_contents($path);
	}
	else
	{		
		$path = "img/mystery.png";		
		$data = file_get_contents($path);  
 	}
	return base64_encode($data);	
}


$barcode = $_GET["barcode"];
$name = './tmp.png';
$data = base64_decode(getImage($barcode));
file_put_contents($name,$data);

//base64_to_jpeg($result["PICTURE"],"tmp.png");


$fp = fopen($name, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;
?>