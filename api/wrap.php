<?php 
require_once 'vendor/autoload.php';
require_once 'RestEngine.php';
require_once 'functions.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;


$app->post('/SELECT',function(Request $request,Response $response) {

	$json = json_decode($request->getBody(),true);

	$sql = $json["SQL"];
	$database =  $json["DATABASE"];
	$params = json_decode($json["PARAMS"],true);

	$db=getDatabase($database);
	$req = $db->prepare($sql);	
	$req->execute($params);
	$result =  $req->fetchAll(PDO::FETCH_ASSOC);
	$data["DATA"] = $result;
	$data["RESULT"] = "OK";

	$response = $response->withJson($data);
	return $response;
});


$app->post('/UPDATE',function(Request $request,Response $response) {

	$json = json_decode($request->getBody(),true);

	$sql = $json["SQL"];
	$database =  $json["DATABASE"];
	$params = json_decode($json["PARAMS"],true);
	$db=getDatabase($database);
	$req = $db->prepare($sql);	
	$req->execute($params);

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->post('/INSERT',function(Request $request,Response $response) {

	$json = json_decode($request->getBody(),true);

	$sql = $json["SQL"];
	$database =  $json["DATABASE"];
	$params = json_decode($json["PARAMS"],true);
	$db=getDatabase($database);
	$req = $db->prepare($sql);	
	$req->execute($params);

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->post('/DELETE',function(Request $request,Response $response) {

	$json = json_decode($request->getBody(),true);

	$sql = $json["SQL"];
	$database =  $json["DATABASE"];
	$params = json_decode($json["PARAMS"],true);
	$db=getDatabase($database);
	$req = $db->prepare($sql);	
	$req->execute($params);

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->get('/info',function(Request $request,Response $response) {

phpinfo();
//$response = $response->withJson($data);
//return $response;
});


ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();

?>