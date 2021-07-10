<?php 

require_once 'RestEngine.php';

function SELECTALL($sql,$params = array(),$database = "MAIN")
{
	if (posix_uname()["machine"] == "x86_64")
	//if (0)
	{
		$db=getDatabase($database);
		$req = $db->prepare($sql);		
		$req->execute($params);
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else 
	{		
		$data["SQL"] = $sql;
		$data["PARAMS"] = json_encode($params);
		$data["DATABASE"] = $database;
		$json = RestEngine::POST("http://phnompenhsuperstore.com/api/wrap.php/SELECT",$data);      
		return $json["DATA"];
	}
}

function SELECTONE($sql,$params = array(),$database = "MAIN")
{
	if (posix_uname()["machine"] == "x86_64")
	{
		$db=getDatabase($database);
		$req = $db->prepare($sql);	
		$req->execute($params);
		return $req->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$data["SQL"] = $sql;
		$data["PARAMS"] = json_encode($params);
		$data["DATABASE"] = $database;
		$json = RestEngine::POST("http://phnompenhsuperstore.com/api/wrap.php/SELECT",$data);
		if (count($json["DATA"]) > 0)      
			return $json["DATA"];
		else
			return null;
	}	
}

function INSERT($sql,$params = array(),$database = "MAIN")
{
	if (posix_uname()["machine"] == "x86_64")
	{
		$db=getDatabase($database);
		$req = $db->prepare($sql);	
		$req->execute($params);
		return $req->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$data["SQL"] = $sql;
		$data["PARAMS"] = json_encode($params);
		$data["DATABASE"] = $database;
		$json = RestEngine::POST("http://phnompenhsuperstore.com/api/wrap.php/INSERT",$data);
		return $json["RESULT"];
	}	
}

function UPDATE($sql,$params = array(),$database = "MAIN")
{
	if (posix_uname()["machine"] == "x86_64")
	{
		$db=getDatabase($database);
		$req = $db->prepare($sql);	
		$req->execute($params);
		return $req->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$data["SQL"] = $sql;
		$data["PARAMS"] = json_encode($params);
		$data["DATABASE"] = $database;
		$json = RestEngine::POST("http://phnompenhsuperstore.com/api/wrap.php/UPDATE",$data);
		return $json["RESULT"];
	}	
}

function DELETE($sql,$params = array(),$database = "MAIN")
{
	if (posix_uname()["machine"] == "x86_64")
	{
		$db=getDatabase($database);
		$req = $db->prepare($sql);	
		$req->execute($params);
		return $req->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$data["SQL"] = $sql;
		$data["PARAMS"] = json_encode($params);
		$data["DATABASE"] = $database;
		$json = RestEngine::POST("http://phnompenhsuperstore.com/api/wrap.php/DELETE",$data);
		return $json["RESULT"];
	}	
}


function blueUser($author){
	if($author == "thoeun_s") // TODO FUNCTION
		return "THOEUN SOPHAL";	
	else if ($author == "hay_s")
		return "HAY SE";
	else if ($author ==	"sen_s")
		return "SOVI";
	else if ($author == "em_c")
		return "CHEN";
	else if ($author == "prum_p")	
		return "PONLEU";
	else if ($author == "prom_r")
		return "RETH";
	else if ($author == "phorl_p")
		return "PHARY";
	else if ($author == "sin_p")
		return "PHEAK";
	else if ($author == "chea_s")
		return "SOPHAL";
	else 
		return $author;

}	

function CVUserByLogin($login)
{
	$conn=getInternalDatabase();
	$sql = "SELECT clearview_identifier from USER where login = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($login));
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	return $result["clearview_identifier"];
}

function isLocal()
{
	$mac = shell_exec("dig +short myip.opendns.com @resolver1.opendns.com");    
	return ($mac != "119.82.252.226");
}

function getDatabase($name = "MAIN")
{ 
	$conn = null;      
	try  
	{  		
		if ($name == "MAIN")
		{
			if (isLocal()){				
				$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
			}
			else 
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


function getInternalDatabase($base = "MAIN")
{
	try{
		if ($base == "MAIN")
			$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		else if ($base == "ECOMMERCE")
			$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/ecommerce.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function findTmpUser($login,$password)
{

	$userlist["vibol"] = "banane";
	$roles["vibol"] = "special";
	
	$userlist["sophie"] = "maman";
	$roles["sophie"] = "CHAIRMAN";

	$userlist["store"] = "store";
	$roles["store"] = "STOREWORKER";
	//chairman
	//admin 	

	if (array_key_exists($login,$userlist) && ($userlist[$login] == $password) )
	{		
		return $roles[$login];
	}
	else
		return null;
}

function truncateNumber($number){
	if (count(explode('.',$number)) == 2)
	{
		$left = explode('.',$number)[0];
		$right = explode('.',$number)[1];
		return $left.".".substr($right, 0,2);	
	}
	else
		return "0.0";
}

function getCurrentRate(){
	$conn=getDatabase();
	$sql = "select RATE from SETTING";
	$req=$conn->prepare($sql);
	$req->execute();
	$result=$req->fetch();
	return $result["RATE"];
}

function getImage($barcode){

	$json = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/image/".str_replace(" ","%20",$barcode));      
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


function truncateDollarPrice($price){

	$pos = strpos($price,".");
	if ($price < 1)
	{
		if (substr($price,0,1) == "0")
			return substr($price,0,$pos + 3);
		else
			return "0".substr($price,0,$pos + 3);
	}
	else
		return substr($price,0,$pos + 3);
}


function generateRielPrice($price){

	$priceStr = strval(getCurrentRate() *$price);
	$price = intval(getCurrentRate() * $price);
	return ceil($price / 100) * 100;

	$i = intval(substr($priceStr,strlen($priceStr) - 2,2));	

	if ($i == 0)
	{			
		$str = strval($price);	
		if (strlen($str) > 3)		
		{
			return substr($str,0,strlen($str) - 3) . "," . substr($str,strlen($str) - 3);
		}	
		return $price; 
	}
	
	$centnum = intval(substr($priceStr,strlen($priceStr) - 3,1));
	if ($i > 50)
	{

		$num = 	substr($priceStr,0,strlen($priceStr) - 2); 
		$num .= "00";
		$num = intval($num);
		$num += 100;			
	}else{		
		$num = 	substr($priceStr,0,strlen($priceStr) - 2); 
		$num .= "00";
		$num = intval($num);		
	}	
	
	$str = strval($num);	

	if (strlen($str) > 3)		
		return substr($str,0,strlen($str) - 3) . "," . substr($str,strlen($str) - 3);

	return $num;
}

function flagByCountry($flag){
  if ($flag == "" || $flag == null)
    return $flag = 'img/mystery.png';
    else 
  return $flag = 'img/flags/'.strtolower($flag).'.png';
}


function statisticsByItem($barcode)
{	
	$response["MARGIN"] = "";
	$response["THROWN"] = "";
	$response["RETURN"] = "";
	$response["TURNOVER"] = "";
	$response["RATIOSALE"] = "";
	$response["OVERALL"] = "";
	return $response;
}


?>