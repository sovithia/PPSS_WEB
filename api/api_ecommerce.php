<?php 

require_once 'RestEngine.php';
require_once 'functions.php';

require_once 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

/**************CORE ***************/



$app->get('/items',function(Request $request,Response $response) { 

	$inDB = getInternalDatabase("ECOMMERCE");

	$sql = "SELECT * FROM ITEM";
	$req = $inDB->prepare($sql);
	$req->execute(array());	
	$result = $req->fetchAll(PDO::FETCH_ASSOC);		

	$resp = array();
	$barcodes = array();

	foreach($result as $item)
		array_push($barcodes,$item["ID"]);
		
	if (isLocal())
		$url = "http://sites.local/PPSS/api/api.php/itemget";
	else
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