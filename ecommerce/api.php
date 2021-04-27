<?
require_once 'vendor/autoload.php';
require_once 'RestEngine.php';

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

	if ($res["OCU"] == 0){
		$result["result"] = "KO";
	}
	else{

		$token = bin2hex(random_bytes(64));
		$sql = "UPDATE USER set ACCESS_TOKEN = ? WHERE username = ?, password = ?,expiration = ?";

		$req = $db->prepare($sql);
		$expiration = date("Y-m-d H:i:s", strtotime('+72 hours')).
		
		$req->execute(array($token,$json["username"],$json["password"],$expiration));

		$result["result"] = "OK";
		$result["access_token"] = $token;
	}
	
	$response = $response->withJson($result);
	return $response;

	
});

function authentify($access_token){
	$db = getInternalDatabase();
	$sql = "SELECT *,count(*) as OCU FROM USER WHERE access_token = ? and expiration > DATETIME('now')";
	$req = $db->prepare($sql);
	
	$res = $req->execute(array($access_token));
	if ($res["OCU"] == 0)
		return null;
	return $res;			
}

$app->get('/items',function(Request $request,Response $response) { 

	$user = authentify($token = $request->headers->get('ACCESS_TOKEN'));	
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
		$resp = array();
		$barcodes = array();
		foreach($result as $item)
			array_push($barcodes,$item["ID"]);			
		
		$url = "http://phnompenhsuperstore.com/api/api.php/itemget";
		$data["barcodes"] = $barcodes;
		$jsonData = RestEngine::POST($url,$data);  
		$response = $response->withJson($jsonData);
	}
	return $response;
});



ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();

?>