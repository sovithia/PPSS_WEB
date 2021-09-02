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




function statisticsByItem($barcode, $start = '',$end = '')
{	
	$db=getDatabase();


	if ($start != '' && $end != '')
	{
		$start .= " 00:00:00.000";
		$end .= " 23:59:59.999";
		$sql =  "SELECT PRODUCTID,PRODUCTNAME,PRICE,
		(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C' AND RECEIVE_DATE between ? AND ?) as 'TOTALRECEIVE',			
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE between ? AND ? ORDER BY TRANDATE DESC) as 'LASTCOST',COST,
		ISNULL((SELECT TOP(1) DATEADD FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE between ? AND ? ORDER BY DATEADD DESC),0) as 'LASTTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE between ? AND ? ),0) as 'NBTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE between ? AND ?),0) as 'TOTALRECEIVE',
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE between ? AND ?) * -1),0) as 'TOTALSALE',		
		ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEADD between ? AND ?),0) as 'TOTALNBRETURN',		
		ISNULL((SELECT SUM(ORDER_QTY) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEADD between ? AND ?),0) as 'TOTALQTYRETURN',		
		ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEADD between ? AND ?),0) as 'TOTALORDERTIME',		
		ISNULL((SELECT TOP(1) DATEADD  FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEADD between ? AND ? ORDER BY DATEADD DESC),0) as 'LASTORDERTIME',		
		ONHAND FROM dbo.ICPRODUCT
		WHERE PRODUCTID = ?";

		error_log($sql);
		error_log($start);
		error_log($end);

		$req = $db->prepare($sql);
	  $req->execute(array($start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$start,$end,$barcode));			
	}
	else
	{
		$sql =  "SELECT PRODUCTID,PRODUCTNAME,PRICE,
		(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',			
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',COST,
		ISNULL((SELECT TOP(1) DATEADD FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC),0) as 'LASTTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'NBTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',		
		ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALNBRETURN',		
		ISNULL((SELECT SUM(ORDER_QTY) FROM PODETAIL WHERE POSTATUS = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALQTYRETURN',		
		ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALORDERTIME',		
		ISNULL((SELECT TOP(1) DATEADD  FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC),0) as 'LASTORDERTIME',		
		ONHAND FROM dbo.ICPRODUCT
		WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($barcode));			
	}
	$item = $req->fetch(PDO::FETCH_ASSOC);	
	if ($item == false)
	{
		$response["WARNING"] = "NOT FOUND";
		return $response;
	}
	$ATTEUANCEFACTOR = 3;
	$response["PRODUCTID"] = $item["PRODUCTID"];
	$response["PRODUCTNAME"] = $item["PRODUCTNAME"];
		// MARGIN
	$response["COST"] = $item["LASTCOST"]; 
	if ($response["COST"] == null)
		$response["COST"] = $item["COST"];
	$response["PRICE"] = $item["PRICE"];
	$response["MARGIN"] = $response["PRICE"] - $response["COST"];
	if ($response["COST"] != "0" && $response["COST"] != 0)
		$response["SCOREMARGIN"] = min(100 * ($response["MARGIN"] /  $response["COST"]),100);
	else
		$response["SCOREMARGIN"] = 0;
	$response["SCOREMARGIN"] = truncatePrice($response["SCOREMARGIN"]);

	// TURNOVER
	$response["TOTALORDERTIME"] = $item["TOTALORDERTIME"];
	$response["LASTORDERTIME"] = $item["LASTORDERTIME"];

	$response["SCORETURNOVER"] = max(0,min(100, $item["TOTALORDERTIME"] * 10));
	$response["SCORETURNOVER"] = truncatePrice($response["SCORETURNOVER"]);

	$response["LASTTHROWN"] = $item["LASTTHROWN"];
	if ($response["LASTTHROWN"] == "1900-01-01 00:00:00.000")
		$response["LASTTHROWN"] = "N/A";
	$response["NBTHROWN"] = floatval($item["NBTHROWN"]);	
	$response["SCORETHROWN"] = 100 - (max(0,min(100,$response["NBTHROWN"])));
	// RATIOSALE 
	$response["TOTALSALE"] = $item["TOTALSALE"];
	$response["TOTALRECEIVE"] = $item["TOTALRECEIVE"];
	if ($item["TOTALRECEIVE"] == 0)
		$response["SCORERATIOSALE"] = 0;
	else 
		$response["SCORERATIOSALE"] = $item["TOTALSALE"] * 100 / $item["TOTALRECEIVE"];
	$response["SCORERATIOSALE"] = truncatePrice($response["SCORERATIOSALE"]);
	// RETURN 
	$response["TOTALNBRETURN"] = $item["TOTALNBRETURN"];
	$response["TOTALQTYRETURN"] = $item["TOTALQTYRETURN"] * -1;
	$response["SCORERETURN"] = 100 - (max(0,min(100,$response["TOTALNBRETURN"] * 25)));
	
	$response["TOTALSCORE"] = ($response["SCOREMARGIN"] / 5) + 
												 ($response["SCORETHROWN"] / 5) + 
												 ($response["SCORERETURN"] / 5) + 
												 ($response["SCORETURNOVER"] / 5) + 
												 ($response["SCORERATIOSALE"] / 5); 

 
  $response["TOTALSCORE"] = truncatePrice($response["TOTALSCORE"],4);
  return $response;
}

// Todo disable quantity on APP
// V1 only based on ratio sale 
// < 30 FAST
// > 30 < 60 // Medium
// > 60 Slow
function calculateSaleSpeed($barcode,$begin,$end,$qty){
	$db = getDatabase();
	$sql = "SELECT QTY,POSDATE FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ORDER BY POSDATE ASC";
	$req = $db->prepare($sql);
	$req->execute(array($barcode,$begin,$end));
	$qtyToReach = $qty * 0.7;
	$results = $req->fetchAll(PDO::FETCH_ASSOC);
	$currentQty = 0;
	$day = 0;
	foreach($results as $result)
	{
				$currentQty += $result["QTY"];
				if($currentQty >= $qtyToReach)
				{
					$datetime1 = date_create($result["POSDATE"]);	
    			$datetime2 = date_create($begin);
    			$interval = date_diff($datetime1, $datetime2);    
    			return $interval->format('%a');    					
				}
	}
	return -1;
}


// TOOEARLY
// STOP SELL
// KEEP
// INCREASE
// DECREASE

function calculateMultiple($barcode){
	$db = getDatabase();
	$sql = "SELECT TOP(1) QTY_ORDER, PACKINGNOTE,TRANDATE FROM PORECEIVEDETAIL,ICPRODUCT 
					WHERE PORECEIVEDETAIL.PRODUCTID = ICPRODUCT.PRODUCTID 
					AND  PORECEIVEDETAIL.PRODUCTID =?
					ORDER BY TRANDATE DESC";

	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	// Faut virer les espaces
	if ($res == false) 		
		return 1;	
	if (str_contains($res["PACKINGNOTE"],'x'))
		$left = explode('x',$res["PACKINGNOTE"])[0];
	else if (str_contains($res["PACKINGNOTE"],'X'))
		$left = explode('X',$res["PACKINGNOTE"])[0];
	else 
		$left = 1;
	return $left;
}

function increaseQty($barcode,$lastorderqty,$unit = 1) // Unit will always be 1 for increase
{

	$increasedQty = (int)$lastorderqty * (1 + (0.1 * $unit));
	$multiple = calculateMultiple($barcode);

	if ($multiple == 1){
		return $increasedQty;
	}
	else{
		$remains = $increasedQty % $multiple;
 		if ($remains == 0)	
			return $increasedQty;
		else{
			if ($remains > ($multiple / 2))
				return $increasedQty + $remains;
			else if ($remains < ($multiple / 2))
				return $increasedQty - $remains;
		}

	}

}

function decreaseQty($barcode,$lastorderqty,$unit = 1)
{
	$decreasedQty = (int)$lastorderqty * (1 - (0.1 * $unit));
	$multiple = calculateMultiple($barcode);
	if ($multiple == 1){
		return $increasedQty;
	}
	else
	{
		$remains = $increasedQty % $multiple;
 		if ($remains == 0)	
			return $decreasedQty;
		else
		{
			if ($remains > ($multiple / 2))
				return $decreasedQty - $remains;
			else if ($remains < ($multiple / 2))
				return $decreasedQty + $remains;
		}
	}
}

function orderStatistics($barcode)
{
	$inDB = getInternalDatabase();
	$db = getDatabase();

	$sql = "SELECT TOP(1) TRANDATE, TRANQTY  FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));  
	$res  = $req->fetch(PDO::FETCH_ASSOC); 
	if($res == false){
		$resp["message"] = "Product Not Found";
		$resp["result"] = "KO";	
		return $response->withJson($resp);
	}
	else{
		$RCVDATE = $res["TRANDATE"];
		$RCVQTY = $res["TRANQTY"]; //**	
	}

	$begin = $RCVDATE;
	$end = date('Y-m-d', time()). " 23:59:59.999";

	$sql = "SELECT SUM(QTY) AS 'COUNT' FROM POSDETAIL
	  WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? GROUP BY PRODUCTID";
	$req = $db->prepare($sql);
	$req->execute(array($barcode,$begin,$end));  

	$QTYSALE = $req->fetch(PDO::FETCH_ASSOC)["COUNT"]; // **

	$RATIOSALE = ($QTYSALE * 100) / $RCVQTY; // **

	$sql = "SELECT ONHAND,PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$ONHAND = $res["ONHAND"]; //**	
	$PRODUCTNAME = $res["PRODUCTNAME"]; //**
	$SALESPEED = calculateSaleSpeed($barcode,$begin,$end,$RCVQTY); //**

	$sql = "SELECT (SUM(QUANTITY1)+SUM(QUANTITY2)+SUM(QUANTITY3)+SUM(QUANTITY4)) as 'QTY' FROM DEPRECIATION,DEPRECIATIONITEM
					WHERE DEPRECIATIONITEM.DEPRECIATION_ID1 =  DEPRECIATION.ID
					AND PRODUCTID = ? 
					AND  (TYPE = 'CLEARANCEDAMAGEDPROMOTION' OR 
					 			TYPE = 'CLEARANCELOWSELLPROMOTION' OR 
					 			TYPE = 'CLEARANCETOOMUCHPROMOTION')
					AND DEPRECIATIONITEM.CREATED BETWEEN ? AND ?";
	$req = $inDB->prepare($sql);
	$req->execute(array($barcode,$begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$PROMO = 0;
	if ($res != false)	
		$PROMO = $res["QTY"] ?? 0; //**					

	$sql = "SELECT (SUM(QUANTITY1)+SUM(QUANTITY2)+SUM(QUANTITY3)+SUM(QUANTITY4)) as 'QTY' FROM DEPRECIATION,DEPRECIATIONITEM 
					WHERE DEPRECIATIONITEM.DEPRECIATION_ID1 =  DEPRECIATION.ID 
					AND PRODUCTID = ? 
					AND  (TYPE = 'DAMAGEWASTE' OR 
					 			TYPE = 'EXPIREWASTE')
					AND DEPRECIATIONITEM.CREATED BETWEEN ? AND ?";
	$req = $inDB->prepare($sql);
	$req->execute(array($barcode,$begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$WASTE = 0;
	if ($res != false)
		$WASTE = $res["QTY"] ?? 0; //**

	$stats["LASTRCVDATE"] = $begin;
	$stats["TODAY"] = $end;

	$stats["RCVQTY"] = $RCVQTY;
	$stats["QTYSALE"] = $QTYSALE;
	$stats["RATIOSALE"] = $RATIOSALE;
	$stats["ONHAND"] = $ONHAND;
	$stats["PRODUCTNAME"] = $PRODUCTNAME;
	$stats["PRODUCTID"] = $barcode;
	$stats["SALESPEED"] = $SALESPEED . " days";
	$stats["LASTSALEDAY"] = date('Y-m-d', strtotime($begin. ' + '.$SALESPEED.' days')); 
	$stats["PROMO"] = $PROMO;	
	$stats["WASTE"] = $WASTE;
	$stats["MULTIPLE"] = calculateMultiple($barcode);

	$MARGIN = (int)$RCVQTY * 0.05;
	if (($ONHAND + $MARGIN)< ($stats["RCVQTY"] - $stats["QTYSALE"])) 
	{
		$stats["FINALQTY"] = 0;
		$stats["SUSPICIOUS"] = "YES";
		$stats["DECISION"] = "INQUIRE"

	}
	else 
	{
		$stats["SUSPICIOUS"] = "NO";
		if ($RATIOSALE >= 100) // Good Sale so speed matter
		{
			if($stats["SALESPEED"] < 30){
				$stats["FINALQTY"] = increaseQty($barcode,$RCVQTY,2);
				$stats["DECISION"] = "INCREASEQTY";
			}
			else if($stats["SALESPEED"] > 30 && $stats["SALESPEED"] < 60){
				$stats["FINALQTY"] = increaseQty($barcode,$RCVQTY,1);
				$stats["DECISION"] = "INCREASEQTY";
			}
			else if ($stats["SALESPEED"] > 60 && $stats["SALESPEED"] < 120){
				$stats["FINALQTY"] = $RCVQTY;
				$stats["DECISION"] = "SAMEQTY";
			}
		}
		else if ($RATIOSALE > 70 && $RATIOSALE < 100) // Speed not important here
		{
			if ($PROMO > 0 || $WASTE > 0) // DIFFERENT TREATMENT
			{
					if ($WASTE >= 0.1 * $RCVQTY){
						$stats["FINALQTY"] = decreaseQty($barcode,$RCVQTY,2);
						$stats["DECISION"] = "DECREASEQTY";
				  }
					else if ($PROMO >= 0.1 * $RCVQTY){
						$stats["FINALQTY"] = decreaseQty($barcode,$RCVQTY,1);
						$stats["DECISION"] = "DECREASEQTY";
					}
			}
			else
			{
					$stats["FINALQTY"] = $RCVQTY;
					$stats["DECISION"] = "SAMEQTY";	
			}
		}
		else if ($RATIOSALE > 50 && $RATIOSALE < 70 ) // Normal Sale
		{
			if ($PROMO > 0 || $WASTE > 0) // DIFFERENT TREATMENT
			{
				if ($WASTE >= 0.1 * $RCVQTY){
					$stats["FINALQTY"] = decreaseQty($barcode,$RCVQTY,4);
					$stats["DECISION"] = "DECREASEQTY";
				}
				else if ($PROMO >= 0.1 * $RCVQTY){
					$stats["FINALQTY"] = decreaseQty($barcode,$RCVQTY,2);
					$stats["DECISION"] = "DECREASEQTY";
				}
			}
			else
			{
				
					$stats["FINALQTY"] = $RCVQTY;
					$stats["DECISION"] = "SAMEQTY";				
			}							
		}
		else if ($RATIOSALE < 50)
		{
			if ($PROMO > 0 || $WASTE > 0){ // DIFFERENT TREATMENT		
				$stats["FINALQTY"] = 0;
				$stats["DECISION"] = "MANUALREVIEW";				
			}
			else{
				$stats["FINALQTY"] = 0;
				$stats["DECISION"] = "TOOEARLY";					
			}	
		}
	}
	return $stats;	
}

?>