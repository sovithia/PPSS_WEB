<?php


//require_once 'src/vendor/autoload.php';
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
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
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
function getModules($role)
{
	$db = getInternalDatabase();
	$sql = "SELECT * FROM ROLE WHERE name = ?";
	$getItems=$db->prepare($sql);
	
	$getItems->execute(array($role) ); 
	$role = $getItems->fetch(PDO::FETCH_ASSOC);
	return $role["modules"];	
}

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
		

/*
sql="
	DECLARE @img varbinary(max)
	SELECT @img = PICTURE from  dbo.ICPRODUCT where BARCODE = ?;
	SELECT PRODUCTID,

	(SELECT TOP(1) DISCOUNT_VALUE FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATETO DESC) as 'DISCPERCENT', 

	(SELECT TOP(1) DATEFROM FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	
	(SELECT TOP(1) DATETO FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',


	CATEGORYID,CATEGORYNEWID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,STORE,SIZE,COLOR,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
	CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@img\"))','VARCHAR(MAX)') AS PICTURE 
	FROM dbo.ICPRODUCT,dbo.APVENDOR  
	WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID 
	AND BARCODE = ?";
*/

$app->get('/master',function(Request $request,Response $response) {    
	$conn=getDatabase();

	$sql = "SELECT PRODUCTID,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,LASTCOST,PRICE FROM ICPRODUCT";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$items=$req->fetchAll(PDO::FETCH_ASSOC);	

	$data = array();

	foreach($items as $item){
		
		$sql2 = "SELECT PACK_CODE,DESCRIPTION1,DESCRIPTION2, SALEUNIT,SALEFACTOR,SALEPRICE 
				 FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
		$req2 = $conn->prepare($sql2);
		$params = array($item["PRODUCTID"]);
		$req2->execute($params);
		$items2=$req2->fetchAll(PDO::FETCH_ASSOC);	
		
		$item["PACKS"] = $items2;
		array_push($data,$item);
	}
	
	$response = $response->withJson($data);
	return $response;
});


$app->get('/test',function(Request $request,Response $response) { 

	

    $item["result"] = "TEST";
    $item["result2"] = "TEST2";
	
	$result["object"] = $item;



	$response = $response->withJson($result);
	return $response;
});

/**************BASIC***************/
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


$app->get('/check',function(Request $request,Response $response) {    
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


function packLookup($barcode)
{

	$conn=getDatabase();
	$params = array($barcode);
	$sql = "SELECT PRODUCTID,SALEPRICE,DESCRIPTION1,DESCRIPTION2,SALEUNIT,DISC,EXPIRED_DATE,SALEFACTOR,SALEUNIT FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?"; 	
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item=$req->fetch(PDO::FETCH_ASSOC);	
		
	$json = RestEngine::GET($GLOBALS['URL'].$barcode);      
	if ($item != false)
	{
		if ($json["result"] != "KO")			
			$item["PICTURE"] = $json["image"];
		else
			$item["PICTURE"] = null;	
		return $item;
	}
	else
		return null;
}

/*
$sql="
	DECLARE @img varbinary(max)
	SELECT @img = PICTURE from  dbo.ICPRODUCT where BARCODE = ?;
	SELECT PRODUCTID,

	(SELECT TOP(1) DISCOUNT_VALUE FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATETO DESC) as 'DISCPERCENT', 

	(SELECT TOP(1) DATEFROM FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	
	(SELECT TOP(1) DATETO FROM [SuperStore2_Data].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',


	CATEGORYID,CATEGORYNEWID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,STORE,SIZE,COLOR,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
	CAST('' AS XML).value('xs:base64Binary(sql:vap-riable(\"@img\"))','VARCHAR(MAX)') AS PICTURE 
	FROM dbo.ICPRODUCT,dbo.APVENDOR  
	WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID 
	AND BARCODE = ?";
*/

function weightedItemLookup($barcode){
	$code = substr($barcode,0,6);
	$item = itemLookup($code);
	if ($item != null){
		$weight = substr($barcode,6,5);	
		$d1 = substr($weight,0,1);
		$d2 = substr($weight,1,1);
		$d3 = substr($weight,2,1);
		$d4 = substr($weight,3,1);
		$d5 = substr($weight,4,1);
		$weightStr = $d1.$d2.".".$d3.$d4.$d5;
		$multiplier = floatval($weightStr);
		//$item["PRICE"] = $multiplier;
		$item["PRICE"] = number_format(floatval($item["PRICE"]) * $multiplier,2); 	
	}
	return $item;
}




function itemLookup($barcode)
{
	$conn=getDatabase();
	
	$sql = "SELECT PRODUCTID FROM dbo.ICPRODUCT WHERE BARCODE = ?";	

	$req=$conn->prepare($sql);
	$fourDigit = substr($barcode,0,4);	
	$req->execute(array($fourDigit)); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	if (count($items) > 0)
		$barcode = $fourDigit;

	$req=$conn->prepare($sql);
	$sixDigit = substr($barcode,0,6);
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	if (count($items) > 0)
		$barcode = $sixDigit;

	$params = array($barcode,$barcode);
	$begin = date("Y-m-d");

	

	$sql="SELECT PRODUCTID,
	(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATETO DESC) as 'DISCPERCENT', 
	(SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	(SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',
	CATEGORYID,CATEGORYNEWID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
	(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST'
	,STORE,SIZE,COLOR,PRICE,VENDNAME,
	


	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
	OTHER_ITEMCODE
	FROM dbo.ICPRODUCT,dbo.APVENDOR  
	WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID 
	AND BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute($params);
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	
	if (count($items) > 0)
	{
		$finalItem = $items[0];
		$sql="
		SELECT LOCONHAND 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$finalItem["WH1"] = $item["LOCONHAND"];
		
		$sql="
		SELECT LOCONHAND 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$finalItem["WH2"] = $item["LOCONHAND"];

		$json = RestEngine::GET($GLOBALS['URL'].$barcode);      
		if ($json["result"] != "KO")			
			$finalItem["PICTURE"] = $json["image"];
		else 		
			$finalItem["PICTURE"] = getImage($barcode);					
		return $finalItem;
	}
	else 
		return null;

}

/*
$app->get('/kpisaleratio', function(Request $request,Response $response) {    
// Purchaser ID
// Vendor ID
});
*/

/************** SUPPLIER ITEMS ***************/
$app->get('/supplieritems/{id}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$id = $request->getAttribute('id');

	//$sql = "SELECT * FROM ICPRODUCT WHERE VENDID = ?";
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,

			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',

			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',

			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND dbo.ICPRODUCT.VENDID = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($id));
	$items=$req->fetchAll(PDO::FETCH_ASSOC);


	$result = RestEngine::GET("http://phnompenhsuperstore.com/api/intrapi.php/supplier/".$id);
	$result["items"] = $items;

	$response = $response->withJson($result);
	return $response;   
});


$app->get('/supplierpurchaseorders/{id}',function(Request $request,Response $response) {
	$id = $request->getAttribute('id');
	$conn=getDatabase();	
	
	$sql = "SELECT * FROM POHEADER WHERE VENDID = ? ORDER BY PODATE DESC";
	$req = $conn->prepare($sql);
	$req->execute(array($id)); 
	$pos = $req->fetchAll(PDO::FETCH_ASSOC);	


	$result = RestEngine::GET("http://phnompenhsuperstore.com/api/intrapi.php/supplier/".$id);
	$result["purchaseorders"] = $pos;

	$response = $response->withJson($result);
	return $response;

});




/************** ANALYSIS ***************/
$app->get('/itemfull/{barcode}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode'); 
	$packInfo = packLookup($barcode);

	if ($packInfo != null) // IS  A PACK
	{
		$packcode = $barcode;		
		$result = itemLookup($packInfo["PRODUCTID"]);
		$result["BARCODE"] = $packcode;
		//if (file_exists("img/packs/".$packcode.".jpg"))
		//	$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
		$result["PICTURE"] = $packInfo["PICTURE"];
		$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
		$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
		$result["DISC"] = $packInfo["DISC"];
		$result["PRODUCTNAMEPACK"] = $packInfo["DESCRIPTION1"];
		$result["PRICE"] = $packInfo["SALEPRICE"];		
		
		// PICTURE PACK
		$result["ISPACK"] = "PACK";
		$result["result"] = "OK";
	}
	else
	{
		$result = itemLookup($barcode);
		if ($result != null){
			$result["ISPACK"] = "ITEM";
			$result["result"] = "OK";
		}					
		else
		{
			$result = weightedItemLookup($barcode);
			if ($result != null){
				$result["ISPACK"] = "ITEM";
				$result["result"] = "OK";
			}					
			else
				$result["result"] = "KO";	
		}
	}	
	$response = $response->withJson($result);
	return $response;   
});

function getCurrentRate()
{
	$conn=getDatabase();
	$sql = "select RATE from SETTING";
	$req=$conn->prepare($sql);
	$req->execute();
	$result=$req->fetch();
	return $result["RATE"];
}

function getImage($barcode)
{
	$json = RestEngine::GET($GLOBALS['URL'].$barcode);      
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


function truncateDollarPrice($price)
{

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


function generateRielPrice($price)
{

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

function generateBarcodeImage($barcode)
{
	$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
	return base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_128,1.5));
}

/************** SMALL LABEL PRINTING ********/
$app->get('/itemlabels/{barcodes}', function(Request $request,Response $response) {    
	$conn=getDatabase();

	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode){

		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,SALEFACTOR,PRODUCTNAME,PRODUCTNAME1,STKUM,SIZE,COLOR,PRICE,PACKINGNOTE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0) // NOT PACK
		{
			$item = $items[0];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
			$oneItem["packing"] = $item["PACKINGNOTE"];
			$oneItem["return"] = $item["SIZE"];
			$oneItem["country"] = $item["COLOR"];
			$oneItem["salefactor"] = $item["SALEFACTOR"];
			$oneItem["unit"] = $item["STKUM"];
			$oneItem["isPack"] = "no";
			array_push($result,$oneItem);			
		}
		else // PACK
		{			

			$packInfo = packLookup($barcode);			
			if ($packInfo != null) // IS  A PACK
			{
				$packcode = $barcode;		
				$oneItem["isPack"] = "yes";
				$theItem = itemLookup($packInfo["PRODUCTID"]);
				$oneItem["barcode"] = $packcode;

				$oneItem["rielPrice"] = generateRielPrice($packInfo["SALEPRICE"]);
				$oneItem["dollarPrice"] = "$". truncateDollarPrice($packInfo["SALEPRICE"]);
				// PICTURE
				if (file_exists("img/packs/".$packcode.".jpg"))
					$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
				else
					$oneItem["productImg"] = $packInfo["PICTURE"];
				$oneItem["salefactor"] = $packInfo["SALEFACTOR"];				
				$oneItem["return"] = $packInfo["SALEUNIT"];		
				$oneItem["productImg"] = getImage($barcode);		
				$oneItem["barcodeNumber"] = $packcode;
				$oneItem["barcodeImage"] = generateBarcodeImage($packcode);

				$oneItem["PRICE"] = $packInfo["SALEPRICE"];		
				$oneItem["unit"] = $packInfo["SALEUNIT"];
				// FROM ITEM				
				$oneItem["nameEN"] = $packInfo["DESCRIPTION1"];
				$oneItem["nameKH"] = $packInfo["DESCRIPTION2"];
				

				$oneItem["country"] = null;			
				$oneItem["packing"] = null;
				// PICTURE PACK
				//$tmp["ISPACK"] = "PACK";
				//$tmp["result"] = "OK";		

				array_push($result,$oneItem);
			}
			else
			{
				array_push($result,"ERROR");	
			}
		
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/biglabel/{barcodes}',function($request,Response $response) {
	$conn=getDatabase();
	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode){
		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0){
			$item = $items[0];
			$oneItem["barcode"] = $item["BARCODE"];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);			
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});

function itemLookupLabel($barcode)
{
	$conn=getDatabase();	
	$begin = date("m-d-y");
	$params = array($barcode);
	$sql="SELECT PRODUCTID,						
		  (SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT', 
					
		  (SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',

		  (SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTEND', 
					
		   BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
						FROM dbo.ICPRODUCT WHERE BARCODE = ?";
	$getItems=$conn->prepare($sql);
	$getItems->execute($params);
	$items=$getItems->fetchAll(PDO::FETCH_ASSOC);

	if (count($items) > 0)
	{
		$item = $items[0];				
		$oneItem["barcode"] = $item["BARCODE"];						
		$oneItem["nameEN"] = $item["PRODUCTNAME"];
		$oneItem["nameKH"] = $item["PRODUCTNAME1"];
		$oneItem["productImg"] = getImage($barcode);			
		$oneItem["country"] = $item["COLOR"];

		if (intval( explode('.',$item["DISCPERCENT"])[1] ) == 0)
			$oneItem["discpercent"] = explode('.',$item["DISCPERCENT"])[0];
		else 
			$oneItem["discpercent"] = explode('.',$item["DISCPERCENT"])[0].".".substr(explode('.',$item["DISCPERCENT"])[1],0,2);	

		if ($item["DISCPERCENTEND"] != null && $item["DISCPERCENTEND"] != "")
		{
			$end = explode(' ',$item["DISCPERCENTEND"])[0];
			$end = explode('-',$end);
			$end = $end[2]."/".$end[1]."/".$end[0];
			$oneItem["discpercentend"] = $end;	
		}
		else
			$oneItem["discpercentend"] = "";		
		
		
		if ($item["DISCPERCENTSTART"] != null && $item["DISCPERCENTSTART"] != "")
		{
			$start = explode(' ',$item["DISCPERCENTSTART"])[0];
			$start = explode('-',$start);
			$start = $start[2]."/".$start[1]."/".$start[0];
			$oneItem["discpercentstart"] = $start;	
		}
		else
			$oneItem["discpercentstart"] = "";		
		
		$oneItem["oldPrice"] = 	"$". truncateDollarPrice($item["PRICE"]);

		$oldPrice = floatval(truncateDollarPrice($item["PRICE"]));					
		$percent = (100 - floatval($oneItem["discpercent"])) ;		

		if ($percent != 100)
		{
			$percent  /= 100;
			$newPrice = $percent * $oldPrice; 	
			//var_dump($newPrice);
			//exit;			
		}
		else			
			$newPrice = $oldPrice * 1; 	
			
		$oneItem["dollarPrice"] = "$". truncateDollarPrice($newPrice);										
		$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));
		return $oneItem;
	}
	return null;
}

$app->get('/biglabelpromo/{barcodes}',function($request,Response $response) {	
	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode)
	{
		if ($barcode == "")
			continue;
		$packInfo = packLookup($barcode);

		if ($packInfo != null)		
		{
			//var_dump($packInfo);
			$packcode = $barcode;
			$barcode = $packInfo["PRODUCTID"];									
			$oneItem = itemLookupLabel($barcode);
			$oneItem["barcode"] = $packcode;

			$oneItem["oldPrice"] = 	"$". truncateDollarPrice($packInfo["SALEPRICE"]);			

			// CALCULATE PROMO
			$oldPrice = floatval(truncateDollarPrice($packInfo["SALEPRICE"]));					
			$percent = (100 - intval($oneItem["discpercent"])) ;		
			if ($percent != 100)
			{
				$percent = floatval("0.".$percent);
				$newPrice = $percent * $oldPrice; 				
			}
			else			
				$newPrice = $oldPrice * 1; 	
			
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($newPrice);										
			$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));


			$oneItem["PRICE"] = $packInfo["SALEPRICE"];								
			$oneItem["ISPACK"] = "PACK";
			$oneItem["nameEN"] = $packInfo["DESCRIPTION1"]." (".$packInfo["SALEUNIT"].")";


			array_push($result,$oneItem);
		}
		else 					
			array_push($result,itemLookupLabel($barcode));					
	}	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/itemdetails', function(Request $request,Response $response) {    
	$conn=getDatabase();

	$json = json_decode($request->getBody(),true);	
	$barcodes = $json["barcodes"];
	

	$result = array();
	foreach($barcodes as $barcode){
		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0){
			$item = $items[0];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
			$oneItem["packing"] = $item["STORE"];
			$oneItem["return"] = $item["SIZE"];
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});


/************** COMMON ***************/
$app->get('/item/{barcode}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode'); 
	$check = "NO";
	if (substr($barcode,0,1) == 'X'){
		$barcode = substr($barcode, 1);
		$check = "WH1";
	}
	if (substr($barcode,0,1) == 'Y'){
		$barcode = substr($barcode, 1);
		$check = "WH2";
	}

	$params = array($barcode,$barcode);
	$sql="	
	SELECT PRODUCTID,BARCODE,PRODUCTNAME,COST,PRICE,ONHAND,
	(SELECT STORBIN FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'LOCATION'
	FROM dbo.ICPRODUCT  
	WHERE BARCODE = ?";
	$getItems=$conn->prepare($sql);
	$getItems->execute($params);
	$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
	if (count($items) > 0){
	
		$items = $items[0];
		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$items["WH1"] = $item["LOCONHAND"];
		$items["STOREBIN1"] = $item["STORBIN"];
		
		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$items["WH2"] = $item["LOCONHAND"];
		$items["STOREBIN2"] = $item["STORBIN"];

		$items["result"] = "OK";

		$json = RestEngine::GET($GLOBALS['URL'].$barcode);      
		
		if ($json["result"] != "KO")			
			$items["PICTURE"] = $json["image"];
		else 
			$items["PICTURE"] = getImage($barcode);
		$item = $items;

		if ($check == "WH1" || $check == "WH2")
		{					
			/*
			$today = floor(time()/86400)*86400;
			$todayEnd = $today + 86399;
			$inDB = getInternalDatabase();
			$params = array($barcode,$check,$today,$todayEnd);
			$sql = "SELECT * FROM ITEMADJUST WHERE BARCODE = ? AND location = ? AND DATE BETWEEN ? AND ? ";
			$req=$inDB->prepare($sql);
			$req->execute($params);
			$res = $req->fetch();			
			if ($res != false)
				$item["SCANNED"] = 'YES';
			else 
				$item["SCANNED"] = 'NO';
			*/


			$inDB = getInternalDatabase();
			$begin = strtotime($request->getParam('begin',''));
			$params = array($barcode,$check,$begin);
			$sql = "SELECT * FROM ITEMADJUST WHERE BARCODE = ? AND location = ? AND DATE > ?";
			$req=$inDB->prepare($sql);
			$req->execute($params);
			$res = $req->fetch();			
			if ($res != false)
				$item["SCANNEDRANGE"] = 'YES';
			else 
				$item["SCANNEDRANGE"] = 'NO';


		}	
		else
			$item["SCANNED"] = 'NO';
	}
	else
	{
		$packInfo = packLookup($barcode);
		if ($packInfo != null) // IS  A PACK
		{
			$packcode = $barcode;		
			$result = itemLookup($packInfo["PRODUCTID"]);
			$result["BARCODE"] = $packcode;
			//if (file_exists("img/packs/".$packcode.".jpg"))
			//	$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
			$result["PICTURE"] = $packInfo["PICTURE"];
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
			$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
			$result["DISC"] = $packInfo["DISC"];
			$result["PRODUCTNAMEPACK"] = $packInfo["DESCRIPTION1"];
			$result["PRICE"] = $packInfo["SALEPRICE"];		
			
			// PICTURE PACK
			$result["ISPACK"] = "PACK";
			$result["result"] = "OK";
			$item = $result; 
		}
		else			
			$item["result"] = "KO";
	}
	$response = $response->withJson($item);
	return $response;
});

$app->get('/picture/{barcode}',function(Request $request,Response $response) {


	$barcode = $request->getAttribute('barcode');
	$result["PICTURE"] = getImage($barcode);
	$response = $response->withJson($result);
	return $response;
});

/**************SALE ***************/
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



$app->get('/KPIOneCategory',function(Request $request,Response $response) {   
	
	$conn=getDatabase();
	$type = $request->getParam('type','month');
	$category = $request->getParam('category','');
	$month = $request->getParam('month',date('m'));		
	$data = array();

	if ($type == "year")
	{
		for($i = 1;$i < 13;$i++)
		{					
			$month = sprintf("%02d",$i);
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));

			$begin = $year."-".$month."-01 00:00:00.000";	
			$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";
			$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,CATEGORYID
						FROM POSDETAIL,ICCATEGORY  			
						WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
						AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
						AND CATEGORYID = ".$category."
						GROUP BY CATEGORYID";		
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);					
			$oneResponse = array();
			$oneResponse["PROFIT"] = truncateNumber($result["PROFIT"]);
			$oneResponse["SALE"] = truncateNumber($result["SALE"]);								
			$data[$i] = $oneResponse;											
		}
	}
	else if($type == "month")
	{
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		for($i = 1; $i <= $daysInMonth;$i++)
		{
			$day = sprintf("%02d",$i);
			$begin = $year."-".$month."-".$day." 00:00:00.000";	
			$end = $year."-".$month."-".$day." 23:59:59.999";
			
			$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,CATEGORYID
						FROM POSDETAIL,ICCATEGORY  			
						WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
						AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
						AND CATEGORYID = ".$category."
						GROUP BY CATEGORYID";		
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);					
			$oneResponse = array();			
			$oneResponse["PROFIT"] = truncateNumber($result["PROFIT"]);
			$oneResponse["SALE"] = truncateNumber($result["SALE"]);								
			$data[$i] = $oneResponse;					
		}		
	}	
	$response = $response->withJson($data);
	return $response;
});

function querySection($section,$begin,$end){
	$conn=getDatabase();
	$oneResponse = array();
	$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,DEPARTMENT
				FROM POSDETAIL,ICCATEGORY  			
				WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
				AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
				AND CUSTID NOT IN (".clientToExclude().")
				AND SECTION = '".$section."'
				GROUP BY DEPARTMENT";									
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);					

	$oneResponse = array();
	foreach($result as $oneResult){
		$tmp = array();
		$tmp["PROFIT"] = truncateNumber($oneResult["PROFIT"]);
		$tmp["SALE"] = truncateNumber($oneResult["SALE"]);				
		//$tmp["NAME"] = 	;
		$oneResponse[$oneResult["DEPARTMENT"]] = $tmp;
	}	
	return $oneResponse;
}

function queryAllSection($begin,$end){	
	$conn=getDatabase();
	$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,SECTION
				FROM POSDETAIL,ICCATEGORY  			
				WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
				AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
				AND SECTION IS NOT NULL
				AND CUSTID NOT IN (".clientToExclude().")
				GROUP BY SECTION";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);					

	$oneResponse = array();
	foreach($result as $oneResult){
		$obj = array();
		$tmp = array();
		$tmp["PROFIT"] = truncateNumber($oneResult["PROFIT"]);
		$tmp["SALE"] = truncateNumber($oneResult["SALE"]);				
		$oneResponse[$oneResult["SECTION"]] = 	$tmp;		
	}	
	return $oneResponse;		
}


$app->get('/KPIRows',function(Request $request,Response $response) {   

	$conn=getDatabase();

	$year = $request->getParam('year',2020);		
	$month = $request->getParam('month',null);	
	$day = 	$request->getParam('day',null);
	$data = array();

	
	$rows = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","BB","DO","WI","SO","NU"];
	
	if ($day != null)
	{
		$start = $day." 00:00:00.000";
		$end = $end." 23:59:59.999";
	}
	else if ($month != null)
	{
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start = "01-".$month."-".$year;
		$end = $daysInMonth."-".$month."-".$year;	
	}
	else if ($year != null)
	{
		$start = $year."-1-1"." 00:00:00.000";
		$end = $year."-12-31"." 23:59:59.999";

	}

	$sql = "SELECT COUNT(TOTAL_AMT) as 'TOTAL', SUM(TOTAL_AMT) as 'AMOUNT' 
				FROM POSDETAIL 
				WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?) 
				AND POSDATE BETWEEN ? AND ?";	
	$req = $conn->prepare($sql);	
	foreach($rows as $row)
	{
		$req->execute(array($row."%",$start,$end));
		$data[$row] = $req->fetchAll(PDO::FETCH_ASSOC);			
	}	
	
	$response = $response->withJson($data);
	return $response;	
});

$app->get('/KPICategories',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));		
	$month = $request->getParam('month',null);		
	$data = array();
	$resp["year"] = $year;
	if ($month != null){
		$resp["month"] = $month;

		
		$oneMonthData = array();
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		for($j = 1; $j <= $daysInMonth;$j++)
		{			
			$day = sprintf("%02d",$j);
			$begin = $year."-".$month."-".$day." 00:00:00.000";	
			$end = $year."-".$month."-".$day." 23:59:59.999";

			$data["ALL"] = queryAllSection($begin,$end);					
			$data["FRESH"] = querySection("FRESH",$begin,$end);
			$data["DRY GROCERY"] = querySection("DRY GROCERY",$begin,$end);
			$data["FROZEN"] = querySection("FROZEN",$begin,$end);
			$data["NON-FOOD"] = querySection("NON-FOOD",$begin,$end);

			$oneMonthData[$j] = $data;
		}		

		$resp["data"] = $oneMonthData;	

	}
	else {

		$yearData = array();
		$monthData = array();
		$data = array();		
		for($i = 1;$i < 13;$i++)
		{			
			$oneData = array();

			$month = sprintf("%02d",$i);
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));
			$begin = $year."-".$month."-01 00:00:00.000";	
			$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";
							
			$data["ALL"] = queryAllSection($begin,$end);					
			$data["FRESH"] = querySection("FRESH",$begin,$end);
			$data["DRY GROCERY"] = querySection("DRY GROCERY",$begin,$end);
			$data["FROZEN"] = querySection("FROZEN",$begin,$end);
			$data["NON-FOOD"] = querySection("NON-FOOD",$begin,$end);

			$yearData[$i] = $data;	
		}
		$resp["data"] = $yearData;
	}
	$response = $response->withJson($resp);
	return $response;	
});
function clientToExclude()
{
	return "'1111','200-100','200-101','2222','6666','L0026'";
}

$app->get('/KPISales',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));			
	$resp["year"] = $year;
	$data = array();
	
	$yearData = array();	
	$monthData = array();
	
	for($i = 1;$i < 13;$i++)
	{					
		$month = sprintf("%02d",$i);
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));

		$begin = $year."-".$month."-01 00:00:00.000";	
		$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";

		$sql = "
		SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
		FROM POSDETAIL 			
		WHERE POSDATE >= '".$begin."' 
		AND POSDATE <= '".$end."'
		AND CUSTID NOT IN (".clientToExclude().");
		";
		$req = $conn->prepare($sql);
		$req->execute(array());
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$result["PROFIT"] =	truncateNumber($result["PROFIT"]);
		$result["SALE"] =	truncateNumber($result["SALE"]);

		$yearData[$i] = $result;

		// MONTH
		$oneMonthData = array();
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,$year);
		for($j = 1; $j <= $daysInMonth;$j++)
		{
			$day = sprintf("%02d",$j);
			$begin = $year."-".$i."-".$day." 00:00:00.000";	
			$end = $year."-".$i."-".$day." 23:59:59.999";

			$sql = "
			SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
			FROM POSDETAIL 			
			WHERE POSDATE >= '".$begin."' 
			AND POSDATE <= '".$end."'
			AND CUSTID NOT IN (".clientToExclude().");
			";			
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);			
			$result["PROFIT"] = truncateNumber($result["PROFIT"]);		
			$result["SALE"] = truncateNumber($result["SALE"]);
			$oneMonthData[$j] = $result;
		}	
		$monthData[$i] = $oneMonthData;		
	}
	$data["year"] = $yearData;
	$data["months"] =  $monthData;

	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;	
});

$app->get('/sale/{date}',function(Request $request,Response $response) {   
	$conn=getDatabase();
	$date = $request->getAttribute('date'); 
	//$splitted = explode('/',$date);
	//$date = $splitted[1] . "/" . $splitted[0] . "/" . $splitted[2];
	$date = str_replace("-","/",$date);
	
	$sql = "
			SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
			FROM POSDETAIL 			
			WHERE POSDATE >= '".$date." 00:00:00.000' 
			AND POSDATE <= '".$date." 23:59:59.999'
			AND CUSTID NOT IN (".clientToExclude().");
			";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	$left = explode('.',$result["PROFIT"])[0];
	$right = explode('.',$result["PROFIT"])[1];
	$result["PROFIT"] = $left.".".substr($right, 0,2);

	$left = explode('.',$result["SALE"])[0];
	$right = explode('.',$result["SALE"])[1];
	$result["SALE"] = $left.".".substr($right, 0,2);

	$response = $response->withJson($result);
	return $response;	
});


/**************INVENTORY ***************/
$app->get('/adjusteditems', function(Request $request,Response $response) {

	$date = $request->getParam('date','');
	$storebin = $request->getParam('storebin','');
	$location =  $request->getParam('location','');
	$author =  $request->getParam('author',''); 

	$db = getInternalDatabase();
	$sql = "SELECT barcode,replace(replace(replace(name,'\"',''),x'0A',''),x'0D','') as 'name',oldqty,newqty,location,
			replace(replace(storebin,x'0A', ''),x'0D','') as 'storebin',
			cost,date,author
		    FROM ITEMADJUST WHERE 1 = 1";
	$params = array();
	if ($date != ""){
		$datePlus = $date + 86399;
		$sql .= " AND (date BETWEEN ? AND ?)";
		array_push($params,$date,$datePlus);		
	}
	if ($storebin != ""){
		$sql .= " AND storebin = ?";
		array_push($params,$storebin);		
	}
	if ($location != ""){
		$sql .= " AND location = ?";
		array_push($params,$location);		
	}
	if ($author != ""){
		$sql .= " AND author = ?";
		array_push($params,$author);		
	}	
	$sql .= " ORDER BY date DESC";
	$req = $db->prepare($sql);
	$req->execute($params);	
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);

	return $response;
	
});  


$app->post('/item/{barcode}',function(Request $request,Response $response) {   

	$conn=getDatabase();
	// RETRIEVE INFO
	$barcode = $request->getAttribute('barcode'); 
	$json = json_decode($request->getBody(),true);	
	if ($json["secret"] != "alouette")
	{		
		$result["result"] = "KO";
		$response = $response->withJson($result);
		return $response;
	}
	$author = $json["author"];	
	$storebin = $json["storebin"];
	$quantity = $json["quantity"];	
	
	if (substr($storebin,0,1) == "W")	
		$location = "WH2";
	else
		$location = "WH1";

	$oldquantity = 0;
	$params = array($location,$barcode);
	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$oldquantity = $result["LOCONHAND"];
	

	// RETRIEVE PRODUCT INFO
	$params = array($barcode);
	$sql = "SELECT ONHAND,PRODUCTNAME,PRODUCTNAME1,PRICE,LASTCOST,CATEGORYID,CLASSID  FROM dbo.ICPRODUCT WHERE BARCODE = ?";
	$req = $conn->prepare($sql);
	$req->execute($params);
	$theitem = $req->fetch(PDO::FETCH_ASSOC);
	$name = $theitem["PRODUCTNAME"];
	$nameKH = $theitem["PRODUCTNAME1"];
	$cost = $theitem["LASTCOST"];
	$price = $theitem["PRICE"];
	$category = $theitem["CATEGORYID"];
	$classid = $theitem["CLASSID"];

	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($location,$barcode));
	$theitem = $req->fetch(PDO::FETCH_ASSOC);
	$onhand = $theitem["LOCONHAND"];
	
	
	// RECORD TRANSACTION
	$now = date("Y-m-d H:i:s");
	if($author == "thoeun_s") // TODO FUNCTION
		$userBLUE = "THOEUN SOPHAL";	
	else if ($author == "hay_s")
		$userBLUE = "HAY SE";
	else if ($author ==	"sen_s")
		$userBLUE = "SOVI";

	// GENERATE ID
	$sql = "SELECT num4 FROM SYSDATA where sysid = 'IC'";
	$req = $conn->prepare($sql);
	$req->execute(array());	
	$num4 = $req->fetch(PDO::FETCH_ASSOC)["num4"];
	$newID = intval($num4);	

	// CALCULATED
	$GENID = "AD000000000".$newID;	
	$TRANQTY =  $quantity - $onhand;
	if ($TRANQTY > 0)
		$type = 'AI';
	else if ($TRANQTY < 0)
		$type = 'AD';
	else 
		$type = 'NO';
	if ($type != 'NO')
	{
		$amountCost = sprintf("%.2f",$TRANQTY * $cost);
		$amountPrice = sprintf("%.2f",$TRANQTY * $price);
		// UPDATE HEADER	
		$params = array($GENID,$location,$now,$type,$amountCost,$userBLUE,$now,$amountCost);

		$sql = "
		INSERT INTO ICTRANHEADER (DOCNUM,FLOCID,TRANDATE,TRANTYPE,TOTAL_AMT,PCNAME,CURRID,CURR_RATE,
		DISC_PERCENT,VAT_PERCENT,USERADD,DATEADD,APPLID,BASECURR_ID,CURRENCY_AMOUNT) 
		VALUES (?,?,?,?,?,'SS2-IT-01','USD',1,0.0,0.0,?,?,'IC','USD',?)"; 
		$req = $conn->prepare($sql);
		$req->execute($params);		
		
		// UPDATE DETAIL	
		$params = array(
			$GENID,$barcode,$location,$category,$classid,$now, $type,$name,$nameKH,$TRANQTY,
			$cost,$price,$price,$amountPrice,
			$amountCost,$onhand,$userBLUE,$now,$cost,$cost,
			$TRANQTY,$cost,$amountCost,
			$amountCost,$cost,$amountPrice,$price,$barcode  
		);
		$sql = "INSERT INTO ICTRANDETAIL (
		DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,TRANDATE,TRANTYPE,LINENUM,PRODUCTNAME,PRODUCTNAME1,TRANQTY,
		TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,TRANDISC,TRANTAX,TRANCOST,TRANPRICE,PRICE_ORI,EXTPRICE,	
		EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,WEIGHT,OLDWEIGHT,USERADD,DATEADD,CURRENTCOST,LASTCOST,
		APPLID,LINK_LINE,ICCLEARING_ACC,INVENTORY_ACC,DIMENSION,TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,COST_METHOD,BASECURR_ID,	
		CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_EXTPRICE,CURRENCY_PRICE,MAIN_PRODUCTID) 
		VALUES (
		?,?,?,?,?,?,?,1,?,?,?,
		'UNIT',1.0,'UNIT',1.0,0.0,0.0,?,?,?,?,	
		?,?,'USD',1,1.0,1.0,?,?,?,?,
		'IC',0,77000,17000,1.0,?,?,?,'AG','USD',
		?,?,?,?,?
		)"; 



		$req = $conn->prepare($sql);
		$req->execute($params);

		// UPDATE BY SETTING THE FINAL QUANTITY AND STORBIN
		$params = array((float)$quantity,$storebin,$location,$barcode);
		$sql = "UPDATE dbo.ICLOCATION set LOCONHAND = ?, STORBIN = ?  WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	
		// 
		
		// UPDATE ONHAND
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result != null)		
			$QTY1 = $result["LOCONHAND"];
		else 
			$QTY1 = 0;

		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result != null)		
			$QTY2 = $result["LOCONHAND"];
		else 
			$QTY2 = 0;
		$totalQTY = $QTY1 + $QTY2;
		
		$params = array($totalQTY,$barcode);
		$sql = "UPDATE dbo.ICPRODUCT set ONHAND = ? WHERE PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	

		// Increment gen ID for Next
		$incremented = $newID + 1;
		$sql = "UPDATE SYSDATA set num4 = ? where sysid = 'IC'"; 
		$req = $conn->prepare($sql);
		$req->execute(array($incremented));
	}
	else
	{
		// UPDATE BY SETTING THE ONLY THE STORBIN
		$params = array($storebin,$location,$barcode);
		$sql = "UPDATE dbo.ICLOCATION set STORBIN = ?  WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	
	}

	// RECORDING
	$conn2 = getInternalDatabase();
	$date = time(); 
	$params = array($barcode,$name,$oldquantity ,$quantity , $location,$storebin,$cost,$date,0,$author);
	$sql = "INSERT INTO ITEMADJUST VALUES(null,?,?,?,?,?,?,?,?,?,?)";
	$req = $conn2->prepare($sql);
	$req->execute($params);

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


/************** TRAFFIC   ***************/
// customer visit 
$app->get('/traffic/{date}',function($request,Response $response) {
	$date = $request->getAttribute('date');
	$conn=getDatabase();
	$date = str_replace("-","/",$date);
	$totalresp = array();
	for($i = 8;$i < 21;$i++)
	{
		$begin = $date." 0".($i + 1).":00:00.000"; // HACK BECAUSE OF SERVER
		$end = $date." 0".($i + 2).":00:00.000"; // HACK BECAUSE OF SERVER
		
		$sql = "SELECT  count([POSDATE]) as 'NB".$i."',sum([PAID_AMT]) as 'SUM".$i."'
		FROM [PhnomPenhSuperStore2019].[dbo].[POSCASH]
		WHERE POSDATE > '".$begin."' AND POSDATE < '".$end."'";
		
		$req = $conn->prepare($sql);
		$req->execute(array());
		$result = $req->fetch(PDO::FETCH_ASSOC);	
		$resp["hour"] = $i;	
		$resp["count"] = $result["NB".$i];
		$resp["amount"] = $result["SUM".$i];
		array_push($totalresp,$resp);
	}
	$response = $response->withJson($totalresp);
	return $response;	
});

/*
$sql = "SELECT COUNT(PRODUCTID) AS 'COUNT'
	  FROM [SuperStore2_Data].[dbo].[POSDETAIL]
	  WHERE PRODUCTID = ?
	  AND POSDATE >=  '".$begin." 00:00:00.000' 
	  AND POSDATE <= '".$end." 23:59:59.999'	  
	  GROUP BY PRODUCTID";
*/

/************** SEARCH 2  ***************/
// list all items by category 
$app->get('/itemsearch2',function(Request $request,Response $response) {    	
	$conn=getDatabase();

$today = date("Y-m-d");
	
$category = $request->getParam('category','ALL');
$thrownstart =  $request->getParam('thrownstart','2000-1-1');
$thrownend =  $request->getParam('thrownend','2050-1-1');
$sellstart =  $request->getParam('sellstart','2000-1-1');
$sellend =  $request->getParam('sellend','2050-1-1');
$zerosale =  $request->getParam('zerosale','NO');


$sql =  "SELECT PRODUCTID,BARCODE,
			
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',		
			PACKINGNOTE,COST,PRICE,VENDNAME,
	
			(SELECT TOP(1) TRANDISC FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC)  as 'COSTPROMO',
			(SELECT TOP(1) DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEFROM <= '$today 00:00:00.000' AND DATETO >= '$today 23:59:59.999' ORDER BY DATEFROM DESC) as 'PRICEPROMO', 

			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOSTX',
			LASTCOST,
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE BETWEEN ? AND ?),0) as 'THROWNINPERIOD',
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  ? AND ? GROUP BY PRODUCTID) as 'SALEINPERIOD',
			PRICE,LASTRECEIVEDATE, 

			(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTRECEIVEQTY',

			LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID		
			";

	$params = array($thrownstart, $thrownend, $sellstart, $sellend);

	if ($category != "ALL"){
		$sql .=	" AND CATEGORYID = ?";
		array_push($params,$category);
	}			
	if ($zerosale == "NO"){
		$sql .= " 	GROUP BY PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,PACKINGNOTE,COST,
					PRICE,VENDNAME,TOTALSALE,OTHER_ITEMCODE,COLOR,LASTCOST,
					CATEGORYID,ONHAND,PRICE,LASTRECEIVEDATE,LASTSALEDATE,
					dbo.ICPRODUCT.DATEADD
					HAVING (SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  ? AND ? GROUP BY PRODUCTID)  > 0";	
		array_push($params,$thrownstart,$thrownend);
	}
	$sql .= " ORDER BY PRODUCTNAME ASC";
	$req = $conn->prepare($sql);	

	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 


/************** SEARCH   ***************/
$app->post('/itemget',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	$barcodes = $json["barcodes"];

	$sql =  "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
			PACKING,COST,PRICE,VENDNAME,
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',			
			COLOR,CATEGORYID,ONHAND,PRICE
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			 ";

	$params = array();    	 
	$sql .= " AND PRODUCTID in (";
    foreach($barcodes as $oneBarcode)
    {
    	$sql .=  "?,"; 
		array_push($params,$oneBarcode);	
    }
    $sql = substr($sql, 0, -1);
    $sql .= ")";
    $sql .= " ORDER BY CATEGORYID";
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
	
	
}); 
/************** SEARCH   ***************/
$app->get('/tinyitemsearch',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$barcode = $request->getParam('barcode','');

	
	$sql =  "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',				
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST',
			PRICE,ONHAND 
			FROM dbo.ICPRODUCT
			WHERE PRODUCTID = ?"; 
			
	$req = $conn->prepare($sql);	
	$req->execute(array($barcode));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 

// list all items by category 
$app->get('/itemsearch',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$barcode = $request->getParam('barcode','');
	$category = $request->getParam('category','');
	$keyword =  $request->getParam('keyword','');
	$vendor =  $request->getParam('vendor',''); 
	$country = $request->getParam('country','');
	$vendorid = $request->getParam('vendorid','');
	$count = $request->getParam('count',"3000");

	//ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',

	$sql =  "SELECT TOP(".$count.") PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
			PACKINGNOTE,COST,PRICE,VENDNAME,
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',				
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID";

	$params = array();


	if ($barcode != ""){

		if (strpos($barcode, '|') !== false) 
		{
    		$barcodes = explode('|',$barcode); 
			$sql .= " AND PRODUCTID in (";
    		foreach($barcodes as $oneBarcode){
    			$sql .=  "?,"; 
				array_push($params,$oneBarcode);	
    		}
    		$sql = substr($sql, 0, -1);
    		$sql .= ")";
		}
		else 
		{
			$sql .= " AND PRODUCTID = ?";
			array_push($params,$barcode);	
		}

	
	}
	if ($category != "" && $category != "ALL"){
		$sql .=	" AND CATEGORYID = ?";
		array_push($params,$category);
	}			
	if ($keyword != ""){
		$keyword = "%".$keyword."%";		
			$sql .= " AND PRODUCTNAME like ?";
			array_push($params,$keyword);			
	}
	if ($vendor != ""){
		$vendor = "%".$vendor."%";
		$sql .= " AND VENDNAME like ?";
		array_push($params,$vendor);
	}

	if ($vendorid != ""){
		$sql .= " AND dbo.ICPRODUCT.VENDID = ?";
		array_push($params,$vendorid);
	}

	if ($country != ""){
		$country = "%".$country."%";
		$sql .= " AND COLOR like ?";
		array_push($params,$country);
	}
	$sql .= " ORDER BY PRODUCTNAME ASC";
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 

$app->get('/freshsales',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$day = $request->getParam('day','');
	if ($day == '')
		$day = date("Y-m-d");
		

	$sql =  "SELECT  PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,

			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day 00:00:00.000' AND '$day 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',

			PRICE,LASTRECEIVEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND CATEGORYID in ('FRESH FRUIT','FRESH MEAT','FRESH MILK','FRESH VEGETABLE')";

	$params = array();


	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 


$app->get('/costzero',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,replace(replace(PRODUCTNAME1,'\n',' '),'\"','') as 'PRODUCTNAME1',LASTCOST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',				

			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND (LASTCOST = 0 OR LASTCOST IS NULL)
			AND dbo.ICPRODUCT.ACTIVE = 1
			";
	$params = array(); 
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$response = $response->withJson($result);
	return $response;				

});

$app->get('/zerosale',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$start = 0;
	$end = 100000;
	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,

			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
						
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) = 0
			AND ONHAND > 0
			AND dbo.ICPRODUCT.ACTIVE = 1)t
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$result["ITEMS"] = $result;


	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND = 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;	
});

$app->get('/itemzerostock',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);
	
	$start = 0;
	$end = 100000;
	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,

			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',

			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN '$day30before 00:00:00.000'  AND '$today 23:59:59.999' GROUP BY PRODUCTID) as 'SALELAST30',
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ONHAND = 0)t
			WHERE SEQ BETWEEN $start AND $end 
			ORDER BY VENDNAME
			";	
	$params = array(); 
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$result["ITEMS"] = $result;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND = 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;	
}); 


$app->get('/itemnegative',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	
	$start = 0;
	$end = 100000;

	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,AVGCOST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			PRICE,VENDNAME,

			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',

			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND POSDATE BETWEEN  '$day30before 00:00:00.000' 
			AND '$today 23:59:59.999' GROUP BY PRODUCTID) as 'SALELAST30',
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ONHAND < 0)t
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$result["ITEMS"] = $result;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND < 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];


	$response = $response->withJson($result);
	return $response;		
}); 

/************** Low Margin  ***************/
$app->get('/lowprofit',function($request,Response $response) {
	$timestamp = strtotime('-30 days');
	$today = date("Y-m-d");
	$day30before = date("Y-m-d",$timestamp);
	$conn=getDatabase();
	$sql =  "SELECT TOP(1000) PRODUCTID,BARCODE,replace(PRODUCTNAME,'\n',' ') as  'PRODUCTNAME',replace(PRODUCTNAME1,'\n',' ') as  'PRODUCTNAME1',COST,
			(SELECT (sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			PRICE,VENDNAME,			
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID			
			";		
	$req = $conn->prepare($sql);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);	
	return $response;	
});


/************** Item Sale  ***************/

$app->get('/itemsale',function($request,Response $response) {
	
	$begin = $request->getParam('begin','');
	$end = $request->getParam('end','');
	$barcode = $request->getParam('barcode',''); 
	$conn=getDatabase();

	$sql = "SELECT SUM(QTY) AS 'COUNT'
	  FROM [PhnomPenhSuperStore2019].[dbo].[POSDETAIL]
	  WHERE PRODUCTID = ?
	  AND POSDATE >=  '".$begin." 00:00:00.000' 
	  AND POSDATE <= '".$end." 23:59:59.999'	  
	  GROUP BY PRODUCTID";

	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	if ($result == false)
		$result["COUNT"] = 0;	


	$sql2 = "SELECT PRODUCTNAME FROM 
			 dbo.POSDETAIL WHERE PRODUCTID = ?";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array($barcode));			 
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
	if ($result2 != false)
		$result["PRODUCTNAME"] = $result2["PRODUCTNAME"];
	else
		$result["PRODUCTNAME"] = "N/A";
	$result["PRODUCTID"] = $barcode;

	
	$response = $response->withJson($result);	



	return $response;	
});

function purifyPromotion($result)
{
	$output = array();

	foreach($result as $item)
	{
		if ($item["DISCAMOUNT"] != null && $item["DISCAMOUNTSTART"] != null && $item["DISCAMOUNTEND"] != null) 
			array_push($output,$item);
		
		if ($item["DISCPERCENT"] != null && $item["DISCPERCENTSTART"] != null && $item["DISCPERCENTEND"] != null) 
			array_push($output,$item);		
	}
	return $output;
}



// LOW SELLER
$app->get('/lowseller',function($request,Response $response) {
	$conn=getDatabase();
	$sql = "
			SELECT TOP (1000)
			PRODUCTID
			,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME'
			,replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1'	
			,PRICE
			,CATEGORYID
			,(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'LASTCOST'
			
			,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE'
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE'			
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN'
			, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) as 'PERCENTSALE'		
			,ISNULL((SELECT TOP(1) DISCOUNT_VALUE FROM dbo.ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'DISCPERCENT'
			,ISNULL((SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as  'WH1'
			,ISNULL((SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as  'WH2'			
			,ONHAND
			,replace(replace(replace(VENDNAME,char(10),''),char(13),''),char(39),'') as 'VENDNAME'			
			,ISNULL(PACKINGNOTE,'N/A') as 'PACKINGNOTE' 		
			,ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1' ) ,'N/A') as 'LOCATION' 
			FROM dbo.ICPRODUCT,dbo.APVENDOR			
			WHERE dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID	
			AND ONHAND > 0				
			AND ( ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) > 0
			
			GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,CATEGORYID,COLOR,ONHAND,PACKINGNOTE	
			HAVING (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) < 20
			ORDER BY PERCENTSALE ASC
			";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);		
	$response = $response->withJson($result);

	return $response;
});
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              

// CURRENT PROMOTION
$app->get('/currentpromotion',function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$begin = date("Y-m-d");
	$conn=getDatabase();
/************** PROMOTION  ***************/
// best seller promotions 	
	 $sql = "SELECT [PRODUCTID] ,[PRODUCTNAME] ,[PRODUCTNAME1] ,[PRICE] ,
	(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNT' ,
	(SELECT TOP(1) DATESTART FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNTSTART' ,
	(SELECT TOP(1) DATEEND FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNTEND' ,

	(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT', 

	(SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	
	(SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',

	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
	(SELECT VENDNAME FROM dbo.APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME',
	CATEGORYID,COLOR,
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE'
  		
	FROM dbo.ICPRODUCT 	
	WHERE PRODUCTID in (SELECT PRODUCTID FROM [PhnomPenhSuperStore2019].[dbo].[ICPROMOTION] WHERE DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ) 
	OR PRODUCTID in (SELECT PRODUCTID FROM [PhnomPenhSuperStore2019].[dbo].[ICNEWPROMOTION] WHERE DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ) 
	GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE,CATEGORYID,COLOR,TOTALRECEIVE,TOTALSALE,VENDID"; 
	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$result = purifyPromotion($result);
	$response = $response->withJson($result);


	return $response;	
});



// best seller promotion 
$app->get('/bestsellerpromotion',function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$begin = $request->getParam('begin','');//$json["begin"];
	$end = $request->getParam('end','');//$json["end"];
	$conn=getDatabase();
	
	$sql = "SELECT TOP (150)
      [PRODUCTID]
      ,[PRODUCTNAME]
	  ,[PRODUCTNAME1]
	  ,[PRICE]
	  ,(SELECT (PRICE_ORI - PRICE) FROM ICPROMOTION WHERE PRODUCTID = POSDETAIL.PRODUCTID) as 'DISCAMOUNT'
	  ,(SELECT DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = POSDETAIL.PRODUCTID) as 'DISCPERCENT'
	  ,COUNT(PRODUCTID) AS 'COUNT'
	  FROM [PhnomPenhSuperStore2019].[dbo].[POSDETAIL]
	  WHERE POSDATE >=  '".$begin." 00:00:00.000' 
	  AND POSDATE <= '".$end." 23:59:59.999'
	  AND PRODUCTID in (SELECT  PRODUCTID FROM  [PhnomPenhSuperStore2019].[dbo].[ICPROMOTION]  
	  WHERE DATESTART >= '".$begin." 00:00:00.000' AND DATEEND <= '".$end." 23:59:59.999')
	  OR PRODUCTID in (SELECT  PRODUCTID FROM  [PhnomPenhSuperStore2019].[dbo].[ICNEWPROMOTION]  
	  WHERE DATEFROM >= '".$begin." 00:00:00.000' AND DATETO <= '".$end." 23:59:59.999')
	  GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE
	  ORDER BY COUNT DESC";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);  
	return $response;	
});

// Best Seller Selection
$app->get('/selection',function($request,Response $response) {
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	
	$sql = "
		SELECT TOP (1000)
		 dbo.POSDETAIL.PRODUCTID
		,dbo.POSDETAIL.PRODUCTNAME
		,dbo.POSDETAIL.PRODUCTNAME1
		,dbo.POSDETAIL.PRICE
		,dbo.ICPRODUCT.COST
		,dbo.POSDETAIL.CATEGORYID
		,dbo.ICPRODUCT.COLOR
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0) as 'TOTALSALE'
		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0) as 'TOTALRECEIVE'
		, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) as 'PERCENTSALE'		
		,(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID) as 'DISCAMOUNT' 
		,(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID) as 'DISCPERCENT'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'
		,VENDNAME		

		FROM dbo.POSDETAIL,dbo.ICPRODUCT,dbo.APVENDOR
		WHERE dbo.POSDETAIL.PRODUCTID = dbo.ICPRODUCT.PRODUCTID
		AND dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID		
		AND dbo.POSDETAIL.CATEGORYID NOT IN ('FRESH FRUIT','FRESH MEAT','FRESH MILK','FRESH VEGETABLE')
		AND ( ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) > 0
		
		GROUP BY dbo.POSDETAIL.PRODUCTID,dbo.POSDETAIL.PRODUCTNAME,dbo.POSDETAIL.PRODUCTNAME1,dbo.POSDETAIL.PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE, dbo.POSDETAIL.CATEGORYID,dbo.ICPRODUCT.COLOR,dbo.ICPRODUCT.COST		
		HAVING (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) < 100
		ORDER BY PERCENTSALE DESC
		"; 

	$req = $conn->prepare($sql);	
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
});

// best seller general
$app->get('/bestseller',function($request,Response $response) {
	
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	$begin = $request->getParam('begin','');
	$end = $request->getParam('end','');
	$sql = "
		SELECT TOP (500)
		dbo.POSDETAIL.PRODUCTID
		,dbo.POSDETAIL.PRODUCTNAME
		,dbo.POSDETAIL.PRODUCTNAME1
		,dbo.POSDETAIL.PRICE
		,dbo.ICPRODUCT.COST
		,dbo.POSDETAIL.CATEGORYID
		,dbo.ICPRODUCT.COLOR

		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0) as 'TOTALRECEIVE'
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0) as 'TOTALSALE'

		,(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID AND DATESTART <= '$begin 00:00:00.000' 
		AND DATEEND >= '$end 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNT' 
		,(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' 
		AND DATETO >= '$end 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'
		,VENDNAME
		,COUNT(dbo.POSDETAIL.PRODUCTID) AS 'COUNT'
		FROM dbo.POSDETAIL,dbo.ICPRODUCT,dbo.APVENDOR
		WHERE dbo.POSDETAIL.PRODUCTID = dbo.ICPRODUCT.PRODUCTID
		AND dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID
		AND POSDATE >=  '$begin 00:00:00.000' 
		AND POSDATE <= '$end 23:59:59.999'
		GROUP BY dbo.POSDETAIL.PRODUCTID,dbo.POSDETAIL.PRODUCTNAME,dbo.POSDETAIL.PRODUCTNAME1,dbo.POSDETAIL.PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,dbo.POSDETAIL.CATEGORYID,dbo.ICPRODUCT.COLOR,dbo.ICPRODUCT.COST
		ORDER BY COUNT DESC"; 

	$req = $conn->prepare($sql);	
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
});
// ADMIN UPDATE PRODUCT PRICE/NAME/CATEGORY 
$app->get('/itemall',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$start = $request->getParam('page',0 ) * 100;	
	$end = $start + 100; 

	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
				   COST,PRICE,COLOR,CATEGORYID,CATEGORYNEWID,
				   ONHAND,ACTIVE	

			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY CATEGORYID) as SEQ ,
				    PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYNEWID,
				    COST,PRICE,COLOR,CATEGORYID,ONHAND,ACTIVE
			 FROM dbo.ICPRODUCT
			 WHERE CATEGORYID LIKE 'TO_RECLASSIFY'
			 )t
			 
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);

	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$newItems = array();
	foreach($result as $item)
	{
		
		$sql = "SELECT 
					(SELECT MAX(TRANDATE) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = ?) as 'LASTRECEIVE',
					(SELECT MAX(TRANDATE) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = ?) as 'LASTSALE'
				FROM dbo.SYSUSER WHERE USERID = 'BLUE'				
				"; 
						 
		$req = $conn->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["PRODUCTID"]));
		$extra = $req->fetch(PDO::FETCH_ASSOC);			

		$item["LASTRECEIVE"] = $extra["LASTRECEIVE"];
		$item["LASTSALE"] = $extra["LASTSALE"];							
		
		array_push($newItems,$item);
	}


	$result["ITEMS"] = $newItems;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE CATEGORYID LIKE 'TO_RECLASSIFY'";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;		
});


$app->put('/itempromo/{barcode}', function(Request $request,Response $response) { 
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);	
	$barcode = $request->getAttribute('barcode'); 

	$isPack = $json["isPack"];
	if ($isPack == "PACK")
	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set DISC = :disc, EXPIRED_DATE = :dateto WHERE BARCODE = :barcode");	
		$stmt->bindValue(':disc',$json["discount"],PDO::PARAM_STR);
		$stmt->bindValue(':dateto',$json["to"],PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
		$stmt->execute();
		$result["result"] = "OK";
		$response = $response->withJson($result);
	}
	else
	{
		$now = date("Y-m-d");
		$stmt = $conn->prepare("SELECT * FROM dbo.ICNEWPROMOTION where PRODUCTID = :barcode AND DATETO >  :now");
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);		
		$stmt->bindValue(':now',$now,PDO::PARAM_STR);		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);			

		if ($result == null) // INSERT
		{
			$params = array($json["from"],$json["to"],$barcode,"1.00000","DISCOUNT(%)",$json["discount"],"APP",$json["login"]);
			$sql = "INSERT INTO dbo.ICNEWPROMOTION (DATEFROM,DATETO,PRODUCTID,SALE_QTY,DISCOUNT_TYPE,DISCOUNT_VALUE,PCNAME,USERADD)  VALUES(?,?,?,?,?,?,?,?)";			
			$stmt = $conn->prepare($sql);		
			$stmt->execute($params);
		}
		else // UPDATE
		{
			$params = array($json["from"],$json["to"],$barcode,$json["discount"]);
			$sql = "UPDATE dbo.ICNEWPROMOTION  set DATEFROM = ?,DATETO = ?, DISCOUNT_VALUE = ? WHERE PRODUCTID = ?";			
			$stmt = $conn->prepare($sql);		
			$stmt->execute($params);		

		}
	}		
	return $response;
});




$app->post('/itemupdate/{barcode}',function(Request $request,Response $response) {   
	$conn=getDatabase();	
	$json = json_decode($request->getBody(),true);	

	$field = $json["field"];
	$value = isset($json["value"]) ? $json["value"] : null;


	$barcode = $request->getAttribute('barcode'); 

	
	$stmt = null;
	if ($field == "PRODUCTNAME"){
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRODUCTNAME = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	if ($field == "PRODUCTNAME1"){
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRODUCTNAME1 = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "CATEGORY") {	
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set CATEGORYNEWID = :value WHERE BARCODE = :barcode");
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "PACKINGNOTE") {	
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PACKINGNOTE = :value WHERE BARCODE = :barcode");
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}

	else if ($field == "PACKNAME")
	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set DESCRIPTION1 = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "PRICE")	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRICE = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}	
	else if ($field == "PACKPRICE") {
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set SALEPRICE = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "ACTIVE")
	{
		$stmt = $conn->prepare("SELECT ACTIVE FROM dbo.ICPRODUCT WHERE BARCODE = :barcode");	
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);			

		if ($result["ACTIVE"] == 0)	
		{
			$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set ACTIVE = 1 WHERE BARCODE = :barcode");	
			$result["active"] = 1;
		}		
		
		else 
		{
			$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set ACTIVE = 0 WHERE BARCODE = :barcode");	
			$result["active"] = 0;
		}
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);	
	}
	
	else if ($field == "PICTURE"){
		$data["image"] = $value;
		$json = RestEngine::POST($GLOBALS['URL'].$barcode,$data);      
		/*
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PICTURE = ? WHERE BARCODE = ?");		
		$stmt->bindParam(1,base64_decode($value) ,PDO::PARAM_LOB,0,PDO::SQLSRV_ENCODING_BINARY);
		$stmt->bindParam(2,$barcode ,PDO::PARAM_STR);		

		if (file_exists("img/products/".$barcode.".jpg"))
			unlink("img/products/".$barcode.".jpg");

		if (file_exists("img/products/".$barcode.".png"))
			unlink("img/products/".$barcode.".png"); 
		*/
	}	
	else if ($field == "PACKPICTURE")	{
		$data["image"] = $value;
		$json = RestEngine::POST($GLOBALS['URL'].$barcode,$data);      

		// TODO INSERT IN FIELD ON NEW BLUE SYSTEM
		//if (file_exists($_SERVER['DOCUMENT_ROOT'] ."img/packs/".$barcode.".jpg"))
		//	unlink("img/packs/".$barcode.".jpg");
		//$fp = fopen("./img/packs/".$barcode.".jpg","wb+");
		//fwrite( $fp, base64_decode( $value) ); 
    	//fclose( $fp ); 
	}
	else {
		$sql = "";
	}

	if ($stmt != null){
		$stmt->execute();	
		$result["result"] = "OK";	
	}
	else{
		$result["result"] = "KO";
	}

	$response = $response->withJson($result);
	return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});



function CVUserByLogin($login)
{
	$conn=getInternalDatabase();
	$sql = "SELECT clearview_identifier from USER where login = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($login));
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	return $result["clearview_identifier"];
}


$app->get('/allwaitingpo', function(Request $request,Response $response) { 

	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);	
	$conn=getDatabase();	
	$sql = "SELECT PONUMBER,POHEADER.VENDID,POSTATUS,POHEADER.VENDNAME,POHEADER.DATEADD,POHEADER.USERADD,PHONE1,PHONE2 FROM POHEADER,APVENDOR WHERE POHEADER.VENDID = APVENDOR.VENDID  AND POSTATUS != 'C' AND POSTATUS != 'V' AND POSTATUS != 'R' ORDER BY DATEADD DESC";
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

// Purchase list my waitingpo all
$app->get('/mywaitingpo/{login}', function(Request $request,Response $response) { 

	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);	
	$conn=getDatabase();	
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS != 'C' AND POSTATUS != 'V' AND USERADD = ? ORDER BY DATEADD ASC";
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

// list completed po now and 7 days before
$app->get('/mycompletedpo/{login}', function(Request $request,Response $response) { 
	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);

	$today = date("Y-m-d");
	$timestamp = strtotime('-7 days');
	$day7before = date("Y-m-d",$timestamp);


	$conn=getDatabase();	
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS = 'C' AND USERADD = ? 
			AND DATEADD BETWEEN '$day7before 00:00:00.000' AND '$today 23:59:59.999' 
			ORDER BY DATEADD DESC";
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});



$app->get('/podetail/{ponumber}', function(Request $request,Response $response) { 
	$id = $request->getAttribute('ponumber');

	$conn=getDatabase();	
	$sql = "SELECT PODETAIL.PONUMBER,PODETAIL.PURCHASE_DATE,PODETAIL.VENDID,PODETAIL.VENDNAME,PODETAIL.PRODUCTID,PODETAIL.PRODUCTNAME,PODETAIL.ORDER_QTY,PODETAIL.RECEIVE_QTY,PHONE1,PHONE2 FROM PODETAIL,APVENDOR WHERE PODETAIL.VENDID = APVENDOR.VENDID  AND PONUMBER = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($id));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});


$app->get('/posearch', function(Request $request,Response $response) { 	

	$conn=getDatabase();	
	$ponumber = $request->getParam('ponumber','');
	$userpurchase = $request->getParam('userpurchase','');
	$useredit = $request->getParam('useredit','');
	$from = $request->getParam('from','');
	$to =  $request->getParam('to','');


	$sql = "SELECT * FROM POHEADER WHERE 1 = 1 ";
	$params = array();

	if ($ponumber != "")
	{
		$sql .= "AND PONUMBER = ? ";
		array_push($params,$ponumber);
	}
	if ($userpurchase != "")
	{
		$sql .= "AND USERADD = ? ";
		array_push($params,$userpurchase);
	}
	if ($useredit != "")
	{
		$sql .= "AND USEREDIT = ? ";
		array_push($params,$useredit);
	}
	if ($from != "")
		$sql .= "AND DATEADD >= '$from 00:00:00.000' ";

	if ($to != "")
		$sql .= "AND DATEADD <= '$to 23:59:59.999' ";
	$sql .= "ORDER BY DATEADD DESC";							
	$req = $conn->prepare($sql);
	$req->execute($params);	
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});



// Received PO (with item count) of the month
$app->get('/myreceivedpo/{login}', function(Request $request,Response $response) {

	$today = date("Y-m-d");
	$month = explode('-',$today)[1];
	$year = explode('-',$today)[0];

	$firstday = $year."-".$month."-"."1";

	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE  USERADD = ? AND DATEADD BETWEEN '$firstday 00:00:00.000' AND '$today 23:59:59.999' ORDER BY DATEADD DESC";	
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});



$app->get('/receivedposearch', function(Request $request,Response $response) { 
	$userreceive = $request->getParam('userreceive','');
	$from = $request->getParam('from','');
	$to =  $request->getParam('to','');

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE  USERADD = ? AND DATEADD BETWEEN '$from 00:00:00.000' AND '$to 23:59:59.999' ORDER BY DATEADD DESC";	
	$req = $conn->prepare($sql);	
	$req->execute(array($userreceive));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/receivedpodetail/{poreceivenumber}', function(Request $request,Response $response) { 
	$id = $request->getAttribute('poreceivenumber');

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEDETAIL WHERE RECEIVENO = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($id));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/purchaseorder', function(Request $request,Response $response) { 

});


$app->post('/products',function(Request $request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$products = $json["products"];
	foreach($products as $product)
	{
		$sql = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($product["PRODUCTID"]));
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 0) // INSERT
		{
			$sql = "INSERT INTO ICPRODUCT ()";
		} // UPDATE
		else 
		{

		}
	}
});

// RESEARCH AP
$app->post('/receivedpo',function(Request $request,Response $response) {

});

$app->get('/orderedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT CATEGORYNAME FROM CATEGORY ORDER BY CATEGORYNAME ASC";
	
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp = array();
	foreach ($result as $category) 	
		array_push($resp,$category["CATEGORYNAME"]);
	
	$response = $response->withJson($resp);
	return $response;
});


$app->get('/classifiedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT SECTIONNAME,DEPARTMENTNAME,CATEGORYNAME FROM CATEGORY";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	/*
	$resp = array();
	foreach ($result as $category) 	
		array_push($resp,$category["CATEGORYNAME"]);
	*/
	$response = $response->withJson($result);
	return $response;
});

/// 
$app->get('/calculatePrice',function(Request $request,Response $response) {

	$cost = $request->getParam('cost','');
	$category = $request->getParam('category','');
	
	
	$db = getInternalDatabase();
	$sql = "SELECT * FROM CATEGORY WHERE CATEGORYNAME = ?";
	$req = $db->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetch(PDO::FETCH_ASSOC);

	$min = $result["MINCLASS"];
	$avg = $result["AVGCLASS"];
	$max = $result["MAXCLASS"];
	
	// FIND RANGE 
	$sql = "SELECT * FROM PRICECLASS";
	$req = $db->prepare($sql);
	$req->execute(array());
	$priceclasses = $req->fetchAll(PDO::FETCH_ASSOC);
	$selectedPriceClass = null;
	foreach($priceclasses as $priceclass){
		$splitted = explode(' -> ',$priceclass["RANGE"]);
		$rmin = substr($splitted[0],1);
		$rmax = substr($splitted[1],1);

		//echo $rmin."|".$rmax."<br>";
		if($cost >= $rmin && $cost <= $rmax){
			$selectedPriceClass = $priceclass;			
		}		
	}	
	$resp = array();
	if ($selectedPriceClass != null){
		$resp["MIN"] = $selectedPriceClass["CLASS".$min];
		$resp["AVG"] = $selectedPriceClass["CLASS".$avg];
		$resp["MAX"] = $selectedPriceClass["CLASS".$max];
		$resp["CLASSMIN"] = $min;
		$resp["CLASSAVG"] = $avg;
		$resp["CLASSMAX"] = $max;
		$resp["DATA"] = $selectedPriceClass;
	}	
	
	$response = $response->withJson($resp);
	return $response;
});






$app->get('/info',function(Request $request,Response $response){
	phpinfo();
});

// SDDCCCNNNNPPPP
// S = SECTION
// DD = DEPARTMENT
// CCC = CATEGORY 
// NNNN = SEQUENCE
// PPPP = PADDING (1984)
function GenerateCategoryNumberByName($category)
{
	$padding = 1984;
	$sections = [
		'FRESH' => '1',
		'DRY GROCERY' => '2',
		'FROZEN' => '3',
		'NON-FOOD' => '4' 
	];

	$database = getInternalDatabase();
	$sql = "SELECT * FROM CATEGORY WHERE CATEGORYNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	

	$categoryName = $result["CATEGORYNAME"];

	$sectionName = $result["SECTIONNAME"];
	
	$departmentName = $result["DEPARTMENTNAME"];


	$sql = "SELECT distinct(DEPARTMENTNAME) FROM CATEGORY WHERE SECTIONNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($sectionName));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$positionDep = 1;
	foreach($result as $category){
		if ($category["DEPARTMENTNAME"] == $departmentName)
			break;
		$positionDep++;		
	}
	$positionDep = sprintf("%02d",$positionDep);

	$sql = "SELECT * FROM CATEGORY WHERE DEPARTMENTNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($departmentName));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$positionCat = 1;
	foreach($result as $category){
		if ($category["CATEGORYNAME"] == $categoryName)
			break;
		$positionCat++;		
	}
	$positionCat = sprintf("%03d",$positionCat);

	$start = 9999;
	$db = getDatabase();
	$barcodes = "";
	$count = 0;	
	for($i = $start;$i > 0;$i--)
	{
		$sequenceName = sprintf("%04d",$i);

		$final = $sections[$sectionName].$positionDep.$positionCat.$sequenceName.$padding;			
		$sql = "SELECT * FROM ICPRODUCT WHERE BARCODE = ?";
		$req = $db->prepare($sql);
		$req->execute(array($final));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result == null)
		{
			$barcodes .= $final . "<br>";
			$count++;
		}				
		if($count == 100)
			break;
	}	
	return $barcodes;
}


// BARCODE 
$app->post('/barcode/{categoryname}',function(Request $request,Response $response){
	$categoryname = $request->getAttribute('categoryname');	
	$result["BARCODES"] = GenerateCategoryNumberByName($categoryname);	
	$response = $response->withJson($result);
	return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/custombarcodes', function(Request $request,Response $response){
	$db=getDatabase();
	$sql = 'SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE FROM ICPRODUCT WHERE LEN(BARCODE) = 15';
	$req = $db->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($result);
	return $response;
});


$app->get('/averagebasket', function(Request $request, Response $response){

   $now = time();	
   $month = date('m');     
   $year = date('Y');

   $result = strtotime("{$year}-{$month}-01");
   $begin =  date('Y-m-d', $result)." 00:00:00";
		

   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
   $end =  date('Y-m-d', $result). " 00:00:00";
	
	$sql = "SELECT  AVG(PAID_AMT) AS BASKET FROM POSCASH WHERE POSDATE > ? AND POSDATE < ?";

	$db=getDatabase();
	$req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);


	return $result["BASKET"];
});

$app->get('/vendormargin', function(Request $request, Response $response){
	$vendorid = $request->getParam('vendorid','');
	$begin =  $request->getParam('begin','');
	$end =  $request->getParam('end',''); 

	$beginSale =  $request->getParam('beginSale','');
	$endSale =  $request->getParam('endSale',''); 
	
	$beginSale .= " 00:00:00.000";
	$endSale .= " 23:59:59.999 ";

	$begin .= " 00:00:00.000";
	$end .= " 23:59:59.999 ";

	$db=getDatabase();
	// VENDOR ID 
	// Begin 
	// End 
	// Calculate Spending
	$sql = "SELECT SUM(PAID_AMT) AS PAID FROM APPAY WHERE VENDID = ? AND PAIDDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($vendorid,$begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$paidAMT = $result["PAID"];
	

	$sql = "SELECT SUM(PRICE * QTY) AS SALE_AMT 
			FROM POSDETAIL 
			WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICPRODUCT WHERE VENDID = ?)
			AND POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);


	$req->execute(array($vendorid,$beginSale,$endSale));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$saleAMT = $result["SALE_AMT"];
	
	$resp["SPENDING"] = $paidAMT;
	$resp["SALE_AMT"] = $saleAMT;
	$resp["MARGIN"] = $saleAMT - $paidAMT;

	$response = $response->withJson($resp);
	return $response;
});

$app->get('/productmargin', function(Request $request, Response $response){

	$productid = $request->getParam('productid','');
	
	$begin =  $request->getParam('begin','');
	$end =  $request->getParam('end',''); 
	$begin .= " 00:00:00.000";
	$end .= " 23:59:59.999 ";

	$beginSale =  $request->getParam('beginSale','');
	$endSale =  $request->getParam('endSale',''); 
	$beginSale .= " 00:00:00.000";
	$endSale .= " 23:59:59.999 ";

	$db=getDatabase();
	// VENDOR ID 
	// Begin 
	// End 
	// Calculate Spending
	$sql = "SELECT SUM(AMOUNT) AS PAID FROM APPO WHERE PRODUCTID = ? AND PURCHASE_DATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$paidAMT = $result["PAID"];
	

	$sql = "SELECT SUM(PRICE * QTY) AS SALE_AMT 
			FROM POSDETAIL 
			WHERE PRODUCTID = ? 
			AND POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);


	$req->execute(array($productid,$beginSale,$endSale));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$saleAMT = $result["SALE_AMT"];
	
	$resp["SPENDING"] = $paidAMT;
	$resp["SALE_AMT"] = $saleAMT;
	$resp["MARGIN"] = $saleAMT - $paidAMT;

	$response = $response->withJson($resp);
	return $response;
});

$app->get('/bank', function(Request $request, Response $response){
	$db=getDatabase();
	$sql = "SELECT * FROM RPT_TRIALBALANCE WHERE TYPEENG = 'Bank'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result =$req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($result);
	return $response;
});


$app->get('/itemthrown', function(Request $request, Response $response){
	$db=getDatabase();

	$barcode = $request->getParam('barcode','');	
	$begin = $request->getParam('begin','');	
	$end = $request->getParam('end','');	

	$sql = "SELECT PRODUCTID,LOCID, TRANDATE, replace(replace(PRODUCTNAME,'\n',' '),'\"','') as 'PRODUCTNAME',PRODUCTNAME1,REFERENCE,TRANQTY,
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICTRANDETAIL.PRODUCTID 
					AND TRANDATE BETWEEN '$begin 00:00:00.000'  AND '$end 23:59:59.999'  ),0) as 'THROWN' 
	FROM dbo.ICTRANDETAIL 
	WHERE DOCNUM LIKE 'IS%' 
	AND TRANTYPE = 'I'
	AND TRANDATE BETWEEN '$begin 00:00:00.000'  AND '$end 23:59:59.999'";

	if ($barcode != '')
		$sql .= " AND PRODUCTID = ?";

	$sql.= " ORDER BY TRANDATE DESC";

	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$result =$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});


$app->get('/itemreceived', function(Request $request,Response $response) {

	$begin = $request->getParam('begin','');	
	$end = $request->getParam('end','');	

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE DATEADD BETWEEN '$begin 00:00:00.000' AND '$end 23:59:59.999' ORDER BY TRANDATE DESC";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$receivedpos = $req->fetchAll(PDO::FETCH_ASSOC);	


	$result = array();
	foreach($receivedpos as $receivedpo){

		$sql = "SELECT * FROM PORECEIVEDETAIL WHERE RECEIVENO = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($receivedpo["RECEIVENO"]));
		$receivedDetail = $req->fetchAll(PDO::FETCH_ASSOC);	


		$receivedpo["detail"] = $receivedDetail;
		array_push($result,$receivedpo);

	}
	$response = $response->withJson($result);
	return $response;
});

// ********************* //
// *** SUPPLY RECORD *** //
// ********************* //

function pictureRecord($base64Str,$type,$id){
	

	if ($type == "INVOICES")
	{
		$filename = "./img/supplyrecords_invoices/";	
		$invoices = json_decode($base64Str,true);	
		$count = 1;
		foreach($invoices as $invoice)
		{
			file_put_contents($filename."INV_".$id."_".$count.".png", base64_decode($invoice));	
			$count++;
		}	
	}
	else 
	{
		$imageData = base64_decode($base64Str);
		if ($type == "VAL")
			$filename = "./img/supplyrecords_signatures/VAL_".$id.".png";
		else if ($type == "PCH")
			$filename = "./img/supplyrecords_signatures/PCH_".$id.".png";
		else if ($type == "WH")
			$filename = "./img/supplyrecords_signatures/WH_".$id.".png";
		else if ($type == "RCV")
			$filename = "./img/supplyrecords_signatures/RCV_".$id.".png";
		else if ($type == "ACC")
			$filename = "./img/supplyrecords_signatures/ACC_".$id.".png";
		file_put_contents($filename, $imageData);
	}	
}

function createSupplyRecordForPO(){
	$db = getDatabase();		
	$indb = getInternalDatabase();

	// NORMAL
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS = '' AND NOTES <> 'AUTOVALIDATED' ";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $onePO)
	{
		$sql = "SELECT count(*) as CNT FROM SUPPLY_RECORD WHERE PONUMBER = ?"; 
		$req = $indb->prepare($sql);
		$req->execute(array($onePO["PONUMBER"]));
		$cnt = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
		if ($cnt == 0)
		{
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE) VALUES (?,?,?,?,?,'WAITING','PO')";
			$req = $indb->prepare($sql);
			$req->execute(array($onePO["PONUMBER"], $onePO["USERADD"], $onePO["VENDID"], $onePO["VENDNAME"], $onePO["DATEADD"]));
		}		
	}

	// AUTOVALIDATED
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS = '' AND NOTES LIKE '%AUTOVALIDATED%' ";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $onePO)
	{
		$sql = "SELECT count(*) as CNT FROM SUPPLY_RECORD WHERE PONUMBER = ?"; 
		$req = $indb->prepare($sql);
		$req->execute(array($onePO["PONUMBER"]));
		$cnt = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
		if ($cnt == 0)
		{
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'ORDERED','PO','YES')";
			$req = $indb->prepare($sql);
			$req->execute(array($onePO["PONUMBER"], $onePO["USERADD"], $onePO["VENDID"], $onePO["VENDNAME"], $onePO["DATEADD"]));
		}		
	}
}	

$app->get('/supplyrecordsearch', function(Request $request,Response $response) {

	$today = date("Y-m-d");
		
	$ponumber = $request->getParam('ponumber','');
	$start =  $request->getParam('start','');
	$end =  $request->getParam('end','');
	$status =  $request->getParam('status','ALL');
	$potype =  $request->getParam('potype','ALL');

	$db = getInternalDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD 
		    WHERE 1 = 1";
	$params = array();
	if ($ponumber != ''){
		$sql .= " AND (PONUMBER = ? OR LINKEDPO = ?)";
		array_push($params,$ponumber,$ponumber);
	}

	if ($start != '' && $end != ''){
		$sql .= " AND PODATE between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}

	if ($status != 'ALL'){
		$sql .= " AND STATUS = ?";
		array_push($params,$status);
	}

	if ($potype != 'ALL'){
		$sql .= " AND TYPE = ?";
		array_push($params,$potype);
	}
	
	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecord/{status}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$db2 = getDatabase();

	$status = $request->getAttribute('status');
	if ($status == "WAITING")
		createSupplyRecordForPO();

	if ($status == "ALL"){
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE TYPE = 'PO'
			ORDER BY LAST_UPDATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array());
		$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else {
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE STATUS = ?
			AND TYPE = 'PO' 
			ORDER BY LAST_UPDATED DESC";	
		$req = $db->prepare($sql);
		$req->execute(array($status));
		$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	// ADD VENDNAME	
	$newPOData = array();
	foreach($POData as $onePOData){
		$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
		$req = $db2->prepare($sql);
		$req->execute(array($onePOData["PONUMBER"]));
		$oneRes = $req->fetch();
		$onePOData["VENDNAME"] = $oneRes["VENDNAME"];
		
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{       

	        if (file_exists("./img/supplyrecords_invoices/INV_".$onePOData["ID"]."_".$count.".png"))
	          $nbinvoices++;                
	        $count++;        
	        $go = file_exists("./img/supplyrecords_invoices/INV_".$onePOData["ID"]."_".$count.".png");
    	}while($go);		
		$onePOData["NBINVOICES"] = $nbinvoices;
		array_push($newPOData,$onePOData);
	}
	$mixData["PO"] = $newPOData;

	// NO PO
	if ($status == "ALL"){
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE TYPE = 'NOPO'
			ORDER BY LAST_UPDATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array());
		$NOPOData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else {
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE STATUS = ?
			AND TYPE = 'NOPO' 
			ORDER BY LAST_UPDATED DESC";	
		$req = $db->prepare($sql);
		$req->execute(array($status));
		$NOPOData = $req->fetchAll(PDO::FETCH_ASSOC);
	}	

	$newNOPOData = array();
	foreach($NOPOData as $oneNOPOData){		
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{        
	        if (file_exists("./img/supplyrecords_invoices/INV_".$oneNOPOData["ID"]."_".$count.".png"))
	          $nbinvoices++;                
	        $count++;        
	        $go = file_exists("./img/supplyrecords_invoices/INV_".$oneNOPOData["ID"]."_".$count.".png");
    	}while($go);		
		$oneNOPOData["NBINVOICES"] = $nbinvoices;
		array_push($newNOPOData,$oneNOPOData);
	}
	$mixData["NOPO"] = $newNOPOData;

	$response = $response->withJson($mixData);
	return $response;
});

$app->post('/supplyrecord', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	if (isset($json["TYPE"]) == "NOPO") // NOPO, the only possible case 
	{
			$sql = "INSERT INTO SUPPLY_RECORD (WAREHOUSE_USER,NOPONOTE,STATUS,TYPE) 
			VALUES (:author,:noponote,'DELIVERED','NOPO')";
		$req = $db->prepare($sql);	
	
		$req->bindParam(':author',$json["WAREHOUSE_USER"],PDO::PARAM_STR);
		$req->bindParam(':noponote',$json["NOPONOTE"],PDO::PARAM_STR);
		$req->execute();
		$lastID = $db->lastInsertId();
		
		pictureRecord($json["WAREHOUSESIGNATUREIMAGE"],"WH",$lastID);
		pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$lastID);	
		$result["RESULT"] = "OK";
	}
	else
		$result["RESULT"] = "KO";
	
	

	$response = $response->withJson($result);
	return $response;
});

$app->put('/supplyrecord', function(Request $request,Response $response) {
	$json = json_decode($request->getBody(),true);	
	
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();

	if ($json["ACTIONTYPE"] == "VAL"){

		$sql = "UPDATE SUPPLY_RECORD SET VALIDATOR_USER = :author ,STATUS = 'VALIDATED'  WHERE ID = :identifier" ;
		$req = $db->prepare($sql);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();
		pictureRecord($json["SIGNATURE"],"VAL",$json["IDENTIFIER"]);

		if (isset($json["ITEMS"]))
		{
			foreach($json["ITEMS"] as $key => $value)
			{
				$sql = "UPDATE PODETAIL SET  ORDER_QTY = ?,PPSS_VALIDATION_QTY = ?, PPSS_NOTE = ? WHERE  PRODUCTID = ? AND PONUMBER = ? ";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($value["PPSS_VALIDATION_QTY"],$value["PPSS_VALIDATION_QTY"],$value["PPSS_NOTE"],$key,$json["PONUMBER"]) );	 						
			}
		}
		$data["RESULT"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "PCH"){		
		$sql = "UPDATE SUPPLY_RECORD SET PURCHASER_USER = :author ,STATUS = 'ORDERED'  WHERE ID = :identifier";
		$req = $db->prepare($sql);			
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"PCH",$json["IDENTIFIER"]);
		$data["RESULT"] = "OK";	


	}
	else if ($json["ACTIONTYPE"] == "WH"){

			$sql = "UPDATE SUPPLY_RECORD SET WAREHOUSE_USER = :author, STATUS = 'DELIVERED' WHERE ID = :identifier";
			$req = $db->prepare($sql);							
			$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
			$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);			
			$req->execute();

			if(isset($json["INVOICEJSONDATA"]))
				pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$json["IDENTIFIER"]);
			pictureRecord($json["SIGNATURE"],"WH",$json["IDENTIFIER"]);

		if (isset($json["ITEMS"]))
		{
			foreach($json["ITEMS"] as $key => $value)
			{
				$sql = "UPDATE PODETAIL SET PPSS_RECEPTION_QTY = ?,PPSS_NOTE = ? WHERE  PRODUCTID = ? AND PONUMBER = ? ";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($value["PPSS_RECEPTION_QTY"],$value["PPSS_NOTE"],$key,$json["PONUMBER"]) );	 						
			}
		}
		$data["RESULT"] = "OK";
	}else if ($json["ACTIONTYPE"] == "RCV"){
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'RECEIVED', RECEIVER_USER = :author, 
				LINKEDPO = :linkedpo WHERE ID = :identifier";			
		$req = $db->prepare($sql);

		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);	
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':linkedpo',$json["LINKEDPO"],PDO::PARAM_STR);
		$req->execute();
		
		pictureRecord($json["SIGNATURE"],"RCV",$json["IDENTIFIER"]);
		$data["RESULT"] = "OK";

	}else if ($json["ACTIONTYPE"] == "ACC"){
		$sql = "UPDATE SUPPLY_RECORD SET 
					   ACCOUNTANT_USER = :author,
					   STATUS = 'PAID' 
					   WHERE ID = :identifier";	
		$req = $db->prepare($sql);
		$image = base64_decode($json["SIGNATURE"]);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"ACC",$json["IDENTIFIER"]);
		$data["RESULT"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "WHCANCEL"){
		$sql = "UPDATE SUPPLY_RECORD  
				SET WAREHOUSE_USER = null, 
				STATUS = 'ORDERED', 
				CANCELER = :author
			   WHERE ID = :identifier";
		$req = $db->prepare($sql);						
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();

		// Delete all invoices 
		$count = 1;
		$res = true;
		do{
			if(file_exists("./img/supplyrecords_invoices/INV_".$json["IDENTIFIER"]."_".$count.".png"))
				$res = unlink("./img/supplyrecords_invoices/INV_".$json["IDENTIFIER"]."_".$count.".png");
			else
				$res = false; 
			$count++;		
		}while($res);
		if (file_exists("./img/supplyrecords_signatures/WH_".$json["IDENTIFIER"].".png"))	
			unlink("./img/supplyrecords_signatures/WH_".$json["IDENTIFIER"].".png");

		// Cancel all validation
		$sql = "UPDATE PODETAIL SET PPSS_RECEPTION_QTY = '0', PPSS_NOTE = null WHERE  PONUMBER = ? ";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($json["PONUMBER"]) );	

		$data["RESULT"] = "OK";	 			
	}
	else if ($json["ACTIONTYPE"] == "PCHCANCEL")
	{
			$sql = "UPDATE SUPPLY_RECORD 
					SET PURCHASER_USER = null ,
					STATUS = 'VALIDATED',
					CANCELER = :author  
					WHERE ID = :identifier";
		$req = $db->prepare($sql);		
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);				
		$req->execute();
		if(file_exists("./img/supplyrecords_signatures/PCH_".$json["IDENTIFIER"].".png"))
			unlink("./img/supplyrecords_signatures/PCH_".$json["IDENTIFIER"].".png");
		$data["RESULT"] = "OK";	
	}
	else
	{
		$data["RESULT"] = "KO";
	}	

	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecorddetails/{id}', function(Request $request,Response $response) {
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();
	$db2 = getDatabase();

	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$rr = $req->fetch(PDO::FETCH_ASSOC);

	$rr["items"] = null;

	if ($rr["TYPE"] == "NOPO")
	{
		if ($rr["LINKEDPO"] != null)
		{
			
			$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
			$req = $db2->prepare($sql);
			$req->execute(array($rr["LINKEDPO"]));
			$rr["items"] = $req->fetchAll(PDO::FETCH_ASSOC);			 
		}
	}
	else 
	{
		$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";	
		$req = $db2->prepare($sql);
		$req->execute(array($rr["PONUMBER"]));
		$poitems  = $req->fetchAll(PDO::FETCH_ASSOC);
		$rr["items"] = $poitems;
	}
	$response = $response->withJson($rr);
	return $response;
});

// ********************* //
// *ITEMREQUESTACTIONS** //
// ********************* //


$app->get('/itemrequestaction/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	
	$type = $request->getAttribute('type');

	if (substr($type,0,1) == "v")
	{
		$filter = "VALIDATED";
		$type = substr($type,1);
	}	
	else if (substr($type,0,1) == "s")
	{
		$filter = "SUBMITED";
		$type = substr($type,1);
	}
	else if (substr($type,0,1) == "a")
	{
		$filter = "ALL";
		$type = substr($type,1);
	}
	else
		$filter = "UNVALIDATED";

	if ($filter == "UNVALIDATED")
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? ORDER BY REQUEST_TIME DESC";
	else if ($filter == "VALIDATED")
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE REQUESTEE NOT NULL AND TYPE = ? ORDER BY REQUEST_UPDATED DESC";
	else if ($filter == "SUBMITED")
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? ORDER BY REQUEST_UPDATED DESC";
	else if ($filter == "ALL")
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = ? ORDER BY REQUEST_UPDATED DESC";
		
	error_log($sql);

	$req = $db->prepare($sql);
	$req->execute(array($type));
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);		
	$response = $response->withJson($actions);
	return $response;
});

$app->post('/itemrequestaction', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);	
	$type = $request->getAttribute('type');

	$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) 
			VALUES(:type,:requester)";
	$req = $db->prepare($sql);

	$req->bindParam(':type',$json["TYPE"],PDO::PARAM_STR);
	$req->bindParam(':requester',$json["REQUESTER"],PDO::PARAM_STR);	
	//$now = date('Y-m-d H:i:s');
	//$req->bindParam(':requesttime',$now,PDO::PARAM_STR);
	$req->execute();

	$lastID = $db->lastInsertId();

	$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
	file_put_contents("./img/requestaction/R" .$lastID.".png" , $imageData);

	$items =  json_decode($json["ITEMS"],true);

	// NO ADDITIONNAL ACTION FOR DEMAND
	$tableName = "";
	if ($json["TYPE"] == "RESTOCK") // STORE SUPERVISOR CREATE RESTOCK REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($json["TYPE"] == "TRANSFER") // WAREHOUSE CREATE TRANSFER REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($json["TYPE"] == "PURCHASE") // WAREHOUSE CREATE PURCHASE REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	// NO POOL FOR DEMAND

	foreach($items as $item)
	{
		if ($item["POOL_WITHDRAW"] == 0)
			continue;
		$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY,LOCATION,ITEMREQUESTACTION_ID) VALUES (?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["POOL_WITHDRAW"],$item["LOCATION"],$lastID));


		// UPDATE POOL
		$sql = "SELECT REQUEST_QUANTITY FROM ".$tableName." WHERE PRODUCTID = ?";			
		$req = $db->prepare($sql);
		$req->execute(array());
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch();
				

		if ($res != false && $res["REQUEST_QUANTITY"] == $item["POOL_WITHDRAW"]) // DELETE FROM POOL
		{
			$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));				
		}
		else if ($res != false && $res["REQUEST_QUANTITY"] != $item["POOL_WITHDRAW"])// SUBSTRACT POOL
		{
			$newQty = $res["REQUEST_QUANTITY"] - $item["POOL_WITHDRAW"];		

			$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($newQty,$item["PRODUCTID"]));								
		}	
	}		
	
	
	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->put('/itemrequestaction/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$ira = $req->fetch();

	$items = json_decode($json["ITEMS"],true);
	if($json["STATUS"] == "TODO") // Validation
	{
		$sql = "UPDATE ITEMREQUESTACTION set REQUESTEE = :requestee WHERE ID = :id";
		$req = $db->prepare($sql);
		$req->bindParam(':requestee',$json["REQUESTEE"],PDO::PARAM_STR);
		$req->bindParam(':id',$id,PDO::PARAM_STR);
		$req->execute();
		$imageData = base64_decode($json["REQUESTEESIGNATURE"]);
		file_put_contents("./img/requestaction/E" .$id.".png" , $imageData);
		
		if ($ira["TYPE"] == "DEMAND"){ // STORE SUPERVISOR VALIDATE DEMAND AND ADD TO RESTOCK POOL					
			foreach($items as $item){
				$sql = "SELECT sum(REQUEST_QUANTITY) as CNT FROM ITEMREQUESTRESTOCKPOOL WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));			
				$cnt = $req->fetch();

				if ($cnt == false){ // CREATE NEW ENTRY
					$sql1 = "INSERT INTO ITEMREQUESTRESTOCKPOOL (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY) values (?,?,?)";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["REQUEST_QUANTITY"]));	
				}
				else 
				{

					$newQty = $item["REQUEST_QUANTITY"] + $cnt["CNT"];					
					$sql1 = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($newQty,$item["PRODUCTID"]));		
				}
			}
		}
		else if ($ira["TYPE"] == "RESTOCK"){ // WAREHOUSE VALIDATE RESTOCK AND TO TRANFER POOL & PURCHASE POOL
		
			foreach($items as $item)
			{
				// TRANSFER POOL
				$sql = "SELECT REQUEST_QUANTITY FROM ITEMREQUESTRESTOCKPOOL WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute();
				$cnt = $req->fetch(array($item["PRODUCTID"]));

				error_log($cnt);
				if ($cnt == false){
					error_log("FALSE");
					$sql1 = "INSERT INTO ITEMREQUESTTRANSFERPOOL (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY) values (?,?,?)";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["TRANSFER_POOL_NEW"]));
				}
				else{
					error_log("TRUE");
					$newQty = $cnt["REQUEST_QUANTITY"] + $item["TRANSFER_POOL"];
					$sql1 = "UPDATE ITEMREQUESTTRANSFERPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($newQty,$item["PRODUCTID"]));
				}
		
				// PURCHASE POOL
				$sql = "SELECT REQUEST_QUANTITY FROM ITEMREQUESTPURCHASEPOOL WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute();
				$cnt = $req->fetch(array($item["PRODUCTID"]));

				if ($cnt == false){
					$sql2 = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY) values (?,?,?)";
					$req2 = $db->prepare($sql2);
					$req2->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["PURCHASE_POOL_NEW"]));	
				}
				else{
					$newQty = $cnt["REQUEST_QUANTITY"] + $item["PURCHASE_POOL"];
					$sql2 = "UPDATE ITEMREQUESTPURCHASEPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
					$req2 = $db->prepare($sql2);
					$req2->execute(array($newQty,$item["PRODUCTID"]));
				}
				
				// WE PUT ALL QUANTITY BECAUSE AT THAT MOMENT NO TRANSFER IS CREATED YET
				$sql = "SELECT REQUEST_QUANTITY FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"]));
				$cnt = $req->fetch();
				if ($cnt == false) 
				{
					$sql = "INSERT INTO ITEMREQUESTDEBT (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["REQUEST_QUANTITY"]));
				}
				else
				{
					$totalQty = $cnt["REQUEST_QUANTITY"] + $item["REQUEST_QUANTITY"];
					$sql = "UPDATE ITEMREQUESTDEBT SET QUANTITY = ? WHERE PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($totalQty,$item["REQUEST_QUANTITY"]));					
				}
			}
		}
		else if ($ira["TYPE"] == "TRANSFER"){ // STORE SUPERVISOR VALIDATE TRANSFER AND UPDATE DEBT POOL
			$sql = "SELECT REQUEST_QUANTITY FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["REQUEST_QUANTITY"]));
			$cnt = $req->fetch();


			if ($cnt == false) // INSERT NEGATIVE QUANTITY : NOT NORMAL 
			{
					$sql = "INSERT INTO ITEMREQUESTDEBT (PRODUCTID,PRODUCTNAME,REQUEST_QUANTITY) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["REQUEST_QUANTITY"]));
			}
			else
			{
					$totalQty = $cnt["REQUEST_QUANTITY"] - $item["REQUEST_QUANTITY"];
					if ($totalQty == 0) // DEBT FALL TO ZERO
					{
						$sql = "DELETE FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
						$req = $db->prepare($sql);
						$req->execute(array($totalQty,$item["REQUEST_QUANTITY"]));						
					}
					else // REDUCE DEBT
					{
						$sql = "UPDATE ITEMREQUESTDEBT SET QUANTITY = ? WHERE PRODUCTID = ?";
						$req = $db->prepare($sql);
						$req->execute(array($totalQty,$item["REQUEST_QUANTITY"]));						
					}
					
			}			
		}
		else if ($ira["TYPE"] == "PURCHASE"){// NOTHING}																
		}			
	}
	else if ($json["STATUS"] == "SUBMITTED")
	{
		if ($ira["TYPE"] == "DEMAND" && $ira["REQUESTEE"] == null)
		{

			$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
			file_put_contents("./img/requestaction/R" .$id.".png" , $imageData);

			$items =  json_decode($json["ITEMS"],true);
			foreach($items as $item){
				$sql = "UPDATE ITEMREQUEST set REQUEST_QUANTITY = ? WHERE PRODUCTID = ? and ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$id));
			}
		}// RESTOCK,PURCHASE && TRANSFER CANNOT BE CHANGED ONCE SIGNED
	}
	// DEMAND -> RESTOCK POOL
	// RESTOCK -> TRANSFER POOL & PURCHASE POOL
	// 
	

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});
			
$app->get('/itemrequestactionitems/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	$id = $request->getAttribute('id');
	$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	

	
	// Debt (internal) OK
	// demand (internal) OK
	// restock(internal) OK
	// Transfer (internal) OK
	// Purchase(internal) OK
	// WH (Blue) OK	
	// SUPPLIERREQUESTED_QTY (2) PODETAIL(Blue)

	$newData = array();
	foreach($items as $item){
		$itemID = $item["PRODUCTID"];

		// DEBT
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as DEBT_QTY from ITEMREQUESTDEBT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));		
		$item["DEBT_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["DEBT_QTY"];				
		
		// DEMAND
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as DEMAND_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'DEMAND'
				AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["DEMAND_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["DEMAND_QTY"];
		
		// RESTOCK
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as RESTOCK_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'RESTOCK'
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["RESTOCK_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["RESTOCK_QTY"];
		
		// TRANSFER
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as TRANSFER_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'TRANSFER'
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["TRANSFER_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["TRANSFER_QTY"];
		
		// PURCHASE
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as PURCHASE_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'PURCHASE'
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["PURCHASE_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["PURCHASE_QTY"];
		//

		// PURCHASE POOL
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as PURCHASE_POOL FROM ITEMREQUESTPURCHASEPOOL 
				WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["PURCHASE_POOL"] = $req->fetch(PDO::FETCH_ASSOC)["PURCHASE_POOL"];

		// TRANSFER POOL
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as TRANSFER_POOL FROM ITEMREQUESTTRANSFERPOOL 
				WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["TRANSFER_POOL"] = $req->fetch(PDO::FETCH_ASSOC)["TRANSFER_POOL"];

		// WH Stock
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));		
		$item["WAREHOUSE_QTY"] = floatval($req->fetch()["LOCONHAND"]);		
				
		// On ORDER		
		$sql = "SELECT ISNULL(SUM(ORDER_QTY),0) as SUPPLIERREQUESTED_QTY 
				FROM dbo.PODETAIL
				WHERE POSTATUS = ''
				AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));				
		$item["SUPPLIERREQUESTED_QTY"] = floatval($req->fetch()["SUPPLIERREQUESTED_QTY"]);
		//
		array_push($newData,$item);
	}	

	$response = $response->withJson($newData);
	return $response;
});

$app->get('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	
	$type = $request->getAttribute('type');
	

	if ($type == "RESTOCK")
		$sql = "SELECT * FROM ITEMREQUESTRESTOCKPOOL";
	else if ($type == "PURCHASE")
		$sql = "SELECT * FROM ITEMREQUESTPURCHASEPOOL";
	else if ($type == "TRANSFER")
		$sql = "SELECT * FROM ITEMREQUESTTRANSFERPOOL";	
	else if ($type == "DEBT")
		$sql = "SELECT * FROM ITEMREQUESTDEBT";	

	$req = $db->prepare($sql);
	$req->execute(array());
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);		
	$items = $response->withJson($actions);
	return $items;	
});

$app->put('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	
	
	if ($type == "RESTOCK")
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";

	$items = $json["ITEMS"];	
	foreach($items as $item)
	{
			
		$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"]));	
	}
	$result["RESULT"] = "OK";
	$response = $response->withJson($result);
	return $response;	
});


// ***********// PROMOTION ***********// 
// LIST
$app->get('/itempromotionned/{status}', function(Request $request, Response $response){ 

	$status = $request->getAttribute('status','');

	$db=getInternalDatabase();
	$sql = "SELECT * FROM ITEMPROMOTIONNED WHERE STATUS = ? ORDER BY DATECREATED DESC";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$records = $req->fetchAll(PDO::FETCH_ASSOC);	

	$data = array();
	foreach($records as $record){
		if ($record["IMAGEDAMAGED"] != null)				
			$record["IMAGEDAMAGED"] = base64_encode($record["IMAGEDAMAGED"]);
		array_push($data,$record);
	}
	$response = $response->withJson($data);
	return $response;
});


// create promotion
$app->post('/itempromotionned', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();

	$items = $json["ITEMS"];
	foreach($items as $item)
	{
		$sql = "INSERT INTO ITEMPROMOTIONNED (BARCODE,NAME,IMAGEDAMAGED,QUANTITY,COST,REASON,PROMOTION,OLDPRICE,NEWPRICE,DATECREATED,CREATOR) 
				VALUES (:barcode,:name,:image,:quantity,:cost,
						:reason,:promotion,:oldprice,:newprice,:datecreated,:creator)";
		$req = $db->prepare($sql);
		$req->bindParam(':barcode',$item["BARCODE"],PDO::PARAM_STR);
		$req->bindParam(':name',$item["NAME"],PDO::PARAM_STR);

		if ($item["IMAGEDAMAGED"] != null){
			$imgData = base64_decode($item["IMAGEDAMAGED"]);		
			$req->bindParam(':image',$imgData,PDO::PARAM_LOB);
		}else
		$req->bindParam(':image',null,PDO::PARAM_LOB);

		$req->bindParam(':quantity',$item["QUANTITY"],PDO::PARAM_STR);		
		$req->bindParam(':reason',$item["REASON"],PDO::PARAM_STR);
		$req->bindParam(':promotion',$item["PROMOTION"],PDO::PARAM_STR);
		$req->bindParam(':oldprice',$item["OLDPRICE"],PDO::PARAM_STR);		
		$req->bindParam(':newprice',$item["NEWPRICE"],PDO::PARAM_STR);				
		$req->bindParam(':datecreated',$now,PDO::PARAM_INT);
		$req->bindParam(':creator',$item["CREATOR"],PDO::PARAM_STR);

		$req->execute();

	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

// validate promotion 
$app->put('/itempromotionned', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	$items = $json["ITEMS"]; 
	foreach($items as $item){
		$sql = "UPDATE ITEMPROMOTIONNED SET STATUS = 'VERIFIED',
									   		VERIFIER = ?									   
									   	WHERE BARCODE = ?
									   	AND ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($item["VERIFIER"],$item["BARCODE"],$item["ID"]));
	}
	$result["result"] = "OK";
	return $response;
});



// ***********// LIST ITEMDAMAGED ***********// 
$app->get('/itemdamaged/{status}', function(Request $request, Response $response){ 

	$status = $request->getAttribute('status','');

	$db=getInternalDatabase();
	$sql = "SELECT * FROM ITEMDAMAGED WHERE STATUS = ? ORDER BY DATECREATED DESC";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$records = $req->fetchAll(PDO::FETCH_ASSOC);	


	$data = array();
	foreach($records as $record){
		if ($record["IMAGEDAMAGED"] != null)				
			$record["IMAGEDAMAGED"] = base64_encode($record["IMAGEDAMAGED"]);
		array_push($data,$record);
	}
	$response = $response->withJson($data);
	return $response;
});
// create items damaged
$app->post('/itemsdamaged', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();

	$items = $json["ITEMS"];
	foreach($items as $item)
	{
		$sql = "INSERT INTO ITEMDAMAGED (BARCODE,IMAGEDAMAGED,QUANTITY,REASON,NAME,DATECREATED,CREATOR) 
				VALUES (:barcode,:imagedamaged,:quantity,:reason,:name,:datecreated,:creator)";
		$req = $db->prepare($sql);
		$req->bindParam(':barcode',$item["BARCODE"],PDO::PARAM_STR);
			$data3 = base64_decode($item["IMAGEDAMAGED"]);		
		$req->bindParam(':imagedamaged',$data3,PDO::PARAM_LOB);
		$req->bindParam(':quantity',$item["QUANTITY"],PDO::PARAM_STR);	
		$req->bindParam(':reason',$item["REASON"],PDO::PARAM_STR);
		$req->bindParam(':name',$item["NAME"],PDO::PARAM_STR);		
		$req->bindParam(':datecreated',$now,PDO::PARAM_INT);
		$req->bindParam(':creator',$item["CREATOR"],PDO::PARAM_STR);
		$req->execute();

	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});
// Validate
$app->put('/itemdamaged/validate', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	$items = $json["ITEMS"]; 
	foreach($items as $item){
		$sql = "UPDATE ITEMDAMAGED SET QUANTITYMODIFIED = ?,
									   COMMENT = ?,
									   DATEMODIFIED = ?,
									   VERIFIER = ?,
									   STATUS = 'VALIDATED' 
									   WHERE BARCODE = ?
									   AND ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($item["QUANTITYMODIFIED"],$item["COMMENT"],$now,$item["VERIFIER"],$item["BARCODE"],$item["ID"]));
	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});
// Set As recorded
$app->put('/itemdamaged/setrecorded', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	
	$items = $json["ITEMS"]; 
	foreach($items as $item){
		$sql = "UPDATE ITEMDAMAGED SET DATEMODIFIED = ?,
									   STATUS = 'RECORDED',
									   RECORDER = ? 
									   WHERE BARCODE = ?
									   AND ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($now,$item["RECORDER"],$item["BARCODE"],$item["ID"]));
	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


$app->get('/priceprogression',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$barcode = $request->getParam('barcode','');
	$vendor =  $request->getParam('vendor',''); 
	$vendorid = $request->getParam('vendorid','');	

	$sql =  "SELECT PRODUCTID,BARCODE,
			 replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',VENDNAME					
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID";

	$params = array();
	if ($barcode != ""){
		if (strpos($barcode, '|') !== false) 
		{
    		$barcodes = explode('|',$barcode); 
			$sql .= " AND PRODUCTID in (";
    		foreach($barcodes as $oneBarcode){
    			$sql .=  "?,"; 
				array_push($params,$oneBarcode);	
    		}
    		$sql = substr($sql, 0, -1);
    		$sql .= ")";
		}
		else 
		{
			$sql .= " AND PRODUCTID = ?";
			array_push($params,$barcode);	
		}
	}

	if ($vendor != ""){
		$vendor = "%".$vendor."%";
		$sql .= " AND VENDNAME like ?";
		array_push($params,$vendor);
	}

	if ($vendorid != ""){
		$sql .= " AND dbo.ICPRODUCT.VENDID = ?";
		array_push($params,$vendorid);
	}

	$sql .= " ORDER BY PRODUCTNAME ASC";


	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$newResult = array();
	foreach($result as $oneproduct){
		$sql = "SELECT TOP(5) PORECEIVEDETAIL.VENDNAME,POHEADER.USERADD as 'PCH',PORECEIVEDETAIL.USERADD as 'RCV', TRANDATE,TRANCOST,PORECEIVEDETAIL.VAT_PERCENT 
				FROM PORECEIVEDETAIL, POHEADER 
				WHERE PRODUCTID = ?
				AND POHEADER.PONUMBER = PORECEIVEDETAIL.PONUMBER 
				ORDER BY TRANDATE DESC";
		$req = $conn->prepare($sql);
		$req->execute(array($oneproduct["PRODUCTID"]));		
		$lasts = $req->fetchAll(PDO::FETCH_ASSOC);
		$oneproduct["lasts"] =  $lasts;

		array_push($newResult,$oneproduct);
	}

	$response = $response->withJson($newResult);
	return $response;	
}); 



ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();