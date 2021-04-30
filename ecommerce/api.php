<?php
require_once '../api/vendor/autoload.php';
require_once '../api/RestEngine.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

$URL = "http://192.168.72.62/api/api.php/picture/";

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
		die( print_r( $e->getMessage( )) );   
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



$app->post('/login',function(Request $request,Response $response) { 

	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "SELECT *,count(*)  as OCU FROM USER WHERE username = ? and password = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["username"],$json["password"]));
	$res = $req->fetch();
	
	if ($res["OCU"] == 0)
	{
		
		$result["result"] = "KO";
	}
	else
	{		
		$api_key = $request->getHeaders()["HTTP_API_KEY"][0];		
		if ($api_key == null || $api_key != $res["key"])
			$result["result"] = "KO";
		else
		{			
			$token = bin2hex(random_bytes(64));
			error_log($token);
			$sql = "UPDATE USER set access_token = ? WHERE username = ? AND password = ?";			
			$req = $db->prepare($sql);		
			$req->execute(array($token,$json["username"],$json["password"]));

			$result["result"] = "OK";
			$result["username"] = $res["username"];
			$result["access_token"] = $token;
		}
	}
	
	$response = $response->withJson($result);
	return $response;

	
});

function authentify($access_token,$api_key){
	$db = getInternalDatabase();
	$sql = "SELECT *,count(*) as OCU FROM USER WHERE access_token = ? and expiration > DATETIME('now')";
	error_log($access_token);
	$req = $db->prepare($sql);	
	$req->execute(array($access_token));
	$res = $req->fetch();
	error_log($res["OCU"]);
	if ($res["OCU"] == 0)
		return null;
	if($res["key"] != $api_key)
		return null;
	return $res;			
}

$app->get('/free',function(Request $request,Response $response) { 


	
		$inDB = getInternalDatabase();
		$sql = "SELECT * FROM ITEM";
		$req = $inDB->prepare($sql);
		$req->execute(array());	
		$result = $req->fetchAll(PDO::FETCH_ASSOC);	


		$conn=getDatabase();
		$json = json_decode($request->getBody(),true);
		$barcodes = $json["barcodes"];

		$sql =  "SELECT PRODUCTID,
				replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
				replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
				PACKING,PRICE,				
				CATEGORYID,ONHAND
				FROM dbo.ICPRODUCT				
				 ";

		$params = array();    	 
		$sql .= " WHERE PRODUCTID in (";
		foreach($result as $item)
		{
				$sql .=  "?,"; 
			array_push($params,$item["ID"]);			
		}	    
	    $sql = substr($sql, 0, -1);
	    $sql .= ") ORDER BY CATEGORYID";
		$req = $conn->prepare($sql);	
		$req->execute($params);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);	
		$finalitems = array();		
		foreach($items  as $item){
			$item["IMAGE"] = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
			array_push($finalitems,$item);
		
		$resp = array();
		$resp["result"] = "OK";
		$resp["items"] = $finalitems;
		$response = $response->withJson($resp);
	}
	return $response;
});

$app->get('/items',function(Request $request,Response $response) { 


	$headers = $request->getHeaders();	
	$api_key = $headers["HTTP_API_KEY"][0];	
	$token = $headers["HTTP_ACCESS_TOKEN"][0];		


	$user = authentify($token,$api_key);	

	if ($user == null)
	{
		$result["result"] = "KO";
		$response = $response->withJson($result);
	}
	else
	{
		$inDB = getInternalDatabase();
		$sql = "SELECT * FROM ITEM";
		$req = $inDB->prepare($sql);
		$req->execute(array());	
		$result = $req->fetchAll(PDO::FETCH_ASSOC);	


		$conn=getDatabase();
		$json = json_decode($request->getBody(),true);
		$barcodes = $json["barcodes"];

		$sql =  "SELECT PRODUCTID,
				replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
				replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
				PACKING,PRICE,				
				CATEGORYID,ONHAND
				FROM dbo.ICPRODUCT				
				 ";

		$params = array();    	 
		$sql .= " WHERE PRODUCTID in (";
		foreach($result as $item)
		{
				$sql .=  "?,"; 
			array_push($params,$item["ID"]);			
		}	    
	    $sql = substr($sql, 0, -1);
	    $sql .= ") ORDER BY CATEGORYID";
		$req = $conn->prepare($sql);	
		$req->execute($params);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);	
		$finalitems = array();		
		foreach($items  as $item){
			$item["IMAGE"] = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
			array_push($finalitems,$item);
		}


		$resp = array();
		$resp["result"] = "OK";
		$resp["items"] = $finalitems;
		$response = $response->withJson($resp);
	}
	return $response;
});

$app->get('/info',function(Request $request,Response $response) {
	var_dump($request->getHeaders());
	$result["RESULT"] = "INFO";
	$response = $response->withJson($result);
	return $response;

});

ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();

?>