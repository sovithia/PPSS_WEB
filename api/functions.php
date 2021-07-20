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



function truncatePrice($price)
{
  if (strpos($price, 'E') !== false)
  {
    return floatval($price);
  }
  if (substr($price,0,3) == ".00")
    return "0";
  $left = explode('.',$price)[0];

  if (count(explode('.',$price)) > 1)
  {
    $right = explode('.',$price)[1];
    $right = substr($right,0,2);
    return $left.".".$right;
  }
  else  
    return  substr($left,0,2);    
  
} 

function getCurrentRate(){
	$conn=getDatabase();
	$sql = "select RATE from SETTING";
	$req=$conn->prepare($sql);
	$req->execute();
	$result=$req->fetch();
	return $result["RATE"];
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

function writePicture($barcode,$b64Image)
{
	$state = smbclient_state_new();
	// Initialize the state with workgroup, username and password:
	smbclient_state_init($state, null, 'A-DAdmin', '$uper$tore@2017!123');
	$file = smbclient_creat($state,'smb://192.168.72.252/d$/Image/'.$barcode.'.jpg');
	smbclient_write($state,$file,base64_decode($b64Image));
}


function loadPicture($barcode,$base64 = false)
{
	// Create new state:
	$state = smbclient_state_new();
	// Initialize the state with workgroup, username and password:
	smbclient_state_init($state, null, 'A-DAdmin', '$uper$tore@2017!123');
	$file = smbclient_open($state,'smb://192.168.72.252/d$/Image/'.$barcode.'.jpg','r');

	$error = smbclient_state_errno($state);
	if ($error == 1 || $error == 2 || $error == 9)
	{
		$path = "img/mystery.png";		
		$final = file_get_contents($path);
	}
	else {
		$tmp = "";
		$final = "";
		while (true) {	
			$tmp = smbclient_read($state, $file, 500);
			if ($tmp === false || strlen($tmp) === 0) {
				break;
			}
			$final .= $tmp;
		}
	}
	
	if ($base64 == true)
		return base64_encode($final);
	return $final;		
}



function statisticsByItem($barcode)
{	
	$db=getDatabase();

	$sql =  "SELECT PRODUCTID,PRODUCTNAME,PRICE,
						(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',			
					 (SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',

					 ISNULL((SELECT TOP(1) DATEADD FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC),0) as 'LASTTHROWN',

					 ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'NBTHROWN',
					 ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
					 ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',		
					 ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALNBRETURN',		
					 ISNULL((SELECT SUM(ORDER_QTY) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALQTYRETURN',		
					 ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALORDERTIME',		

					 ISNULL((SELECT TOP(1) DATEADD  FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC),0) as 'LASTORDERTIME',		


					 ONHAND
					FROM dbo.ICPRODUCT
					WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));			
	$item = $req->fetch(PDO::FETCH_ASSOC);	
	$ATTEUANCEFACTOR = 3;
	if ($item != false)
	{
	$response["PRODUCTID"] = $item["PRODUCTID"];
	$response["PRODUCTNAME"] = $item["PRODUCTNAME"];
		// MARGIN
	$response["COST"] = $item["LASTCOST"]; 
	$response["PRICE"] = $item["PRICE"];
	$response["MARGIN"] = $response["PRICE"] - $response["COST"];
	if ($response["COST"] != "0" && $response["COST"] != 0)
		$response["SCOREMARGIN"] = min(100 * ($response["MARGIN"] /  $response["COST"]),100);
	else
		$response["SCOREMARGIN"] = 0;

	// TURNOVER
	$response["TOTALORDERTIME"] = $item["TOTALORDERTIME"];
	$response["LASTORDERTIME"] = $item["LASTORDERTIME"];

	$response["SCORETURNOVER"] = max(0,min(100, $item["TOTALORDERTIME"] * 10));
	$response["LASTTHROWN"] = $item["LASTTHROWN"];
	$response["NBTHROWN"] = $item["NBTHROWN"];	
	$response["SCORETHROWN"] = 100 - (max(0,min(100,$response["NBTHROWN"])));
	// RATIOSALE 
	$response["TOTALSALE"] = $item["TOTALSALE"];
	$response["TOTALRECEIVE"] = $item["TOTALRECEIVE"];
	$response["SCORERATIOSALE"] = $item["TOTALSALE"] * 100 / $item["TOTALRECEIVE"];
	// RETURN 
	$response["TOTALNBRETURN"] = $item["TOTALNBRETURN"];
	$response["TOTALQTYRETURN"] = $item["TOTALQTYRETURN"];
	$response["SCORERETURN"] = 100 - (max(0,min(100,$response["TOTALNBRETURN"] * 20)));
	
	$response["TOTALSCORE"] = ($response["SCOREMARGIN"] / 5) + 
												 ($response["SCORETHROWN"] / 5) + 
												 ($response["SCORERETURN"] / 5) + 
												 ($response["SCORETURNOVER"] / 5) + 
												 ($response["SCORERATIOSALE"] / 5); 

 
  $response["TOTALSCORE"] = truncatePrice($response["TOTALSCORE"],4);
	
	}
	else
	{
		$response["WARNING"] = "NOT FOUND";
	}
	return $response;
}

?>