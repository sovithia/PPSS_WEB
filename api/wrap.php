<?php 


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;



function getDatabase($name = "MAIN")
{ 
	$conn = null;      
	try  
	{  
		if ($name == "MAIN")
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TRAINING")
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=TRAININGDATA;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TMP" )
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.249\\SQL2008r2,55008;Database=ppss_tempdata;ConnectionPooling=0', 'sa', 'blue');
		}  		
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage( )) );   
	} 
	return $conn;
}


$app->post('/select',function(Request $request,Response $response) {

$response = $response->withJson($data);
$json = json_decode($request->getBody(),true);
$sql = $json["SQL"];
$params = $json["PARAMS"];

return $response;
});


$app->post('/update',function(Request $request,Response $response) {

$response = $response->withJson($data);
return $response;
});

$app->post('/insert',function(Request $request,Response $response) {

$response = $response->withJson($data);
return $response;
});

$app->post('/delete',function(Request $request,Response $response) {

$response = $response->withJson($data);
return $response;
});

?>