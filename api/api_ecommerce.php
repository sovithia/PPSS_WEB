<?php 

require_once 'RestEngine.php';

require_once 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

/**************CORE ***************/


function getDatabase()
{ 
	$conn = null;      
	try  
	{  
	
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
	die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getInternalDatabase()
{
	try{
	$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/ecommerce.sqlite');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}


$app->get('/items',function(Request $request,Response $response) { 

	$inDB = getInternalDatabase();
	$sql = "SELECT * FROM ITEM";
	$req = $inDB->prepare($sql);
	$req->execute(array());	
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$resp = array();

	$barcodes = array();
	foreach($result as $item)
		array_push($barcodes,$item["ID"]);
		
	
	$url = "http://phnompenhsuperstore.com/api/api.php/itemget";
	$data["barcodes"] = $barcodes;
	$jsonData = RestEngine::POST($url,$data);
  
	$response = $response->withJson($jsonData);
	return $response;
});



ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();


?>