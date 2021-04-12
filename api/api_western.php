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
	$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/western.sqlite');
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

// ACCESS TOKEN GENERATION
function getUserSession($login,$password)
{
    $db = getInternalDatabase();
    $stmt = $db->prepare("SELECT * FROM USER ,ROLE     			
    				      WHERE USER.role_id = ROLE.ID		 
    					  AND login = ? 
    					  AND  password = ?");

    $stmt->execute(array($login,$password));
    $user = $stmt->fetch();

    if ($user != false)
    {
    	$expiration = time() + 86400;
        $token = md5(uniqid(mt_rand(), true));
        $stmt = $db->prepare("UPDATE USER set accessToken = ?, tokenExpiration = ? WHERE ID = ?");
        $stmt->execute(array($token,$expiration,$user["ID"]));        
        $session["token"] = $token;
        $session["role"] = $user["name"];	// name of the module
        $session["modules"] = getModules($user["name"]);  
        return $session;  	
    }
    else // TMP
    {
	    $role = findTmpUser($login,$password);	    
    	if ($role != null)
    	{    		
    		$session["token"] = md5(uniqid(mt_rand(), true));
    		$session["role"] = $role; // name of the module
    		$session["modules"] = getModules($role);
    		return $session;
    	}
    	else
    		return null;
				                	 
    }  
}
		

$app->post('/login',function(Request $request,Response $response) { 

	$json = json_decode($request->getBody(),true);
	$username = $json["username"];
	$password = $json["password"];

	
 	$session = getUserSession($username,$password); 
    if ($session != null)
	{
			$result["result"] = "OK";
			$result["role"] = $session["role"];
			$result["modules"] = $session["modules"];
			$result["token"] = $session["token"];
	}
    else
    	$result["result"] = "KO";
	
	$response = $response->withJson($result);
	return $response;
});


// login 

// Add to cart AJAX

// remove from cart AJAX  

// update cart AJAX

// send cart 



// Login client page with Superstore + Western Logo
// My Order 
// My Cart 

// Login Admin 
// All Orders




?>