<?php 

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
	
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=SuperStore2_Data;ConnectionPooling=0', 'sa', 'blue'); 
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
		$db = new PDO('sqlite:'.dirname(__FILE__).'/db/SuperStoreInventory.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}


/**************ORDER Warehouse  ***************/
// Order product from warehouse/
// ECRAN ORDER 
$app->post('/itemorders/{barcode}',function($request,Response $response) {
	$barcode = $request->getAttribute('barcode');

	$conn=getDatabase();
	$sql = "SELECT  PRODUCTNAME,PRODUCTNAME1 FROM dbo.ICPRODUCT WHERE PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	
	$conn=getInternalDatabase();
	$json = json_decode($request->getBody(),true);	
	$author = $json["author"];	
	$author = $json["quantity"];
	// TODO INSERT QUANTITY
	$sql = "INSERT INTO ITEMORDER (ID,ITEM_ID, STATUS, AUTHOR_ORDER,AUTHOR_DELIVER,ITEMNAME,ITEMNAMEKH,TIMEORDER) 
	VALUES (null,:itemid,'IN PROGRESS',:authororder,'',:itemname,:itemnamekh,:timeorder)";
	$req = $conn->prepare($sql);
	$req->bindParam(':itemid',$barcode,PDO::PARAM_STR);
	$req->bindParam(':authororder',$author,PDO::PARAM_STR);
	$req->bindParam(':itemname',$result["PRODUCTNAME"],PDO::PARAM_STR);
	$req->bindParam(':itemnamekh',$result["PRODUCTNAME1"],PDO::PARAM_STR);
	$req->bindParam(':timeorder',date('H:m:s d/m/y'),PDO::PARAM_STR);
	
	$req->execute();

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;	
});

// My Orders
$app->get('/itemordersmine/{author}',function($request,Response $response) {
	$conn=getInternalDatabase();
	$author = $request->getAttribute('author');	
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH,TIMEORDER FROM ITEMORDER WHERE AUTHOR_ORDER = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($author));
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});


// ECRAN DELIVER

// Treat order 
$app->put('/deliver/{id}',function($request,Response $response) {
	$conn=getInternalDatabase();
	$id = $request->getAttribute('id');	
	$json = json_decode($request->getBody(),true);	
	$author = $json["author"];
	$sql = "UPDATE ITEMORDER SET STATUS = 'DONE',AUTHOR_DELIVER = ?,TIMEDELIVER = ? WHERE ID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($author,date('H:m:s d/m/y'),$id));	
	
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});
// List Orders
$app->get('/itemordersinprogress',function($request,Response $response) {
	$conn=getInternalDatabase();
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH,TIMEORDER FROM ITEMORDER WHERE STATUS = 'IN PROGRESS'";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});
$app->get('/itemordersdone',function($request,Response $response) {
	$conn=getInternalDatabase();
	
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH FROM ITEMORDER WHERE STATUS = 'DONE'";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});




/**************ORDER Purchase   ***************/
// Order product from warehouse/
// ECRAN ORDER 
$app->post('/itemordersP/{barcode}',function($request,Response $response) {
	$barcode = $request->getAttribute('barcode');

	$conn=getDatabase();
	$sql = "SELECT  PRODUCTNAME,PRODUCTNAME1 FROM dbo.ICPRODUCT WHERE PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	
	$conn=getInternalDatabase();
	$json = json_decode($request->getBody(),true);	
	$author = $json["author"];	
	$author = $json["quantity"];
	// TODO INSERT QUANTITY
	$sql = "INSERT INTO ITEMORDERP (ID,ITEM_ID, STATUS, AUTHOR_ORDER,AUTHOR_DELIVER,ITEMNAME,ITEMNAMEKH,TIMEORDER) 
	VALUES (null,:itemid,'IN PROGRESS',:authororder,'',:itemname,:itemnamekh,:timeorder)";
	$req = $conn->prepare($sql);
	$req->bindParam(':itemid',$barcode,PDO::PARAM_STR);
	$req->bindParam(':authororder',$author,PDO::PARAM_STR);
	$req->bindParam(':itemname',$result["PRODUCTNAME"],PDO::PARAM_STR);
	$req->bindParam(':itemnamekh',$result["PRODUCTNAME1"],PDO::PARAM_STR);
	$req->bindParam(':timeorder',date('H:m:s d/m/y'),PDO::PARAM_STR);
	
	$req->execute();

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;	
});

// My Orders
$app->get('/itemordersmineP/{author}',function($request,Response $response) {
	$conn=getInternalDatabase();
	$author = $request->getAttribute('author');	
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH,TIMEORDER FROM ITEMORDERP WHERE AUTHOR_ORDER = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($author));
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});


// ECRAN DELIVER

// Treat order 
$app->put('/deliverP/{id}',function($request,Response $response) {
	$conn=getInternalDatabase();
	$id = $request->getAttribute('id');	
	$json = json_decode($request->getBody(),true);	
	$author = $json["author"];
	$sql = "UPDATE ITEMORDERP SET STATUS = 'DONE',AUTHOR_DELIVER = ?,TIMEDELIVER = ? WHERE ID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($author,date('H:m:s d/m/y'),$id));	
	
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});
// List Orders
$app->get('/itemordersinprogressP',function($request,Response $response) {
	$conn=getInternalDatabase();
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH,TIMEORDER FROM ITEMORDERP WHERE STATUS = 'IN PROGRESS'";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});
$app->get('/itemordersdoneP',function($request,Response $response) {
	$conn=getInternalDatabase();
	
	$sql = "SELECT ID,ITEM_ID,STATUS,AUTHOR_ORDER,ITEMNAME,ITEMNAMEKH FROM ITEMORDERP WHERE STATUS = 'DONE'";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});



// transfer WH2 to WH1 
$app->post('/transfer2Store/{barcode}',function($request,Response $response) {
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode');  
	$json = json_decode($request->getBody(),true);	
	$quantity = $json["quantity"];
	
	// Take out 
	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND PRODUCTID = ?
			";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	
	$qtyStart = $result["LOCONHAND"];
	$qtyEnd = $qtyStart - $quantity;
	
	$sql = "UPDATE dbo.ICLOCATION set LOCONHAND  = ? WHERE LOCID = 'WH2' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($qtyEnd,$qty));

	// Take in
	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	
	$qtyStart = $result["LOCONHAND"];
	$qtyEnd = $qtyStart + $quantity;
	
	$sql = "UPDATE dbo.ICLOCATION set LOCONHAND  = ? WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($qtyEnd,$qty));
	
                      	$result["response"] = "OK";		
	$response = $response->withJson($result);
});

$app->post('/transfer2WH/{barcode}',function($request,Response $response) {
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode');  
	$json = json_decode($request->getBody(),true);	
	$quantity = $json["quantity"];
	
	// Take out 
	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?
			";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	
	$qtyStart = $result["LOCONHAND"];
	$qtyEnd = $qtyStart - $quantity;
	
	$sql = "UPDATE dbo.ICLOCATION set LOCONHAND  = ? WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($qtyEnd,$qty));

	// Take in
	$sql = "SELECT LOCONHAND from dbo.ICLOCATION  WHERE LOCID = 'WH2' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	
	$qtyStart = $result["LOCONHAND"];
	$qtyEnd = $qtyStart + $quantity;
	
	$sql = "UPDATE dbo.ICLOCATION set LOCONHAND  = ? WHERE LOCID = 'WH2' AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($qtyEnd,$qty));
	
	$result["response"] = "OK";	
	$response = $response->withJson($result);
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

// ***********// PROMOTION ***********// 
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



?>