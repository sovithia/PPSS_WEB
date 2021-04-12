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

?>