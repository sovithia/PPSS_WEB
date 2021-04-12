<?php


//require_once 'src/vendor/autoload.php';
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
	$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}


/**************BASIC***************/
$app->get('/check',function(Request $request,Response $response) {    
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


/**************LOGIN***************/
$app->post('/login',function(Request $request,Response $response) { 
	
	$json = json_decode($request->getBody(),true);
	$username = $json["username"];
	$password = $json["password"];	
	// ROLES
	$conn = getInternalDatabase();
	$sql = "SELECT * FROM USER,ROLE WHERE USER.role_id = ROLE.ID and login = ? and password = ?";


	$params = array($username,$password);	
	$req = $conn->prepare($sql);
	$req->execute($params);
	$user = $req->fetch(PDO::FETCH_ASSOC);

	if($user != false)
	{
		$result["result"] = "OK";
		$result["role"] = $user["role"];
		
		// TOKEN
		$token = md5(uniqid(mt_rand(), true));			
		$result["token"] = $token;
		$result["user"] = $user;
		$sql = "UPDATE USER SET accessToken = ? where login = ? and password = ?";
		$params = array($token,$username,$password);	
		$req = $conn->prepare($sql);
		$req->execute($params);
	}
	else
		$result["result"] = "KO";
	
	$response = $response->withJson($result);
	return $response;
});


/**************SUPPLIER LIST***************/
$app->get('/supplier',function(Request $request,Response $response) {    
	$db = getInternalDatabase();	
	$sql = "SELECT ID,orderday,replace(name,'''','') as 'name'  ,leadtime,
			replace(phones,'''','') as 'phones',replace(replace(contacts,'''',''),'/','<br>') as 'contacts',vat,discount,term,
			returnpolicy,spacerental			
			FROM SUPPLIER
			";
	$params = array();
	$req = $db->prepare($sql);
	$req->execute($params);
	$suppliers = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$db2 = getDatabase();	
	$data = array();

	$begin = "1/1/".date('Y');
	$end = "12/31/".date('Y');

	foreach($suppliers as $supplier){
		$ID = $supplier["ID"];

		//nbitem
		$stmt = $db2->prepare("SELECT count(*) as 'NB' FROM ICPRODUCT WHERE VENDID = ?");		 
		$stmt->execute(array($ID));	
		$supplier["nbitem"] = $stmt->fetch(PDO::FETCH_ASSOC)['NB'];

		//nbpo 
		$stmt =  $db2->prepare("SELECT count(*) as 'NB' FROM POHEADER WHERE POSTATUS = 'C' AND PODATE BETWEEN ? AND ? AND VENDID = ?");		
		$stmt->execute(array($begin,$end,$ID));	
		$supplier["nbpo"] = $stmt->fetch(PDO::FETCH_ASSOC)['NB'];

		// amountspent
		$stmt = $db2->prepare("SELECT sum(EXTCOST) as 'NB' FROM PODETAIL WHERE POSTATUS = 'C' AND DATEADD BETWEEN ? AND ? AND VENDID = ?");		
		$stmt->execute(array($begin,$end,$ID));	
		$supplier["amountspent"] = $stmt->fetch(PDO::FETCH_ASSOC)['NB'];

		array_push($data,$supplier);
	}



	$response = $response->withJson($data);
	return $response;
});

/******SUPPLIER *****/

$app->get('/supplier/{id}',function(Request $request,Response $response) {    
	$db = getInternalDatabase();		
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM SUPPLIER WHERE ID = ?";
	$params = array($id);
	$req = $db->prepare($sql);
	$req->execute($params);
	$supplier = $req->fetch(PDO::FETCH_ASSOC);
	
	if (file_exists(getcwd()."/img/suppliers/".$supplier["ID"].".png"))
		$supplier["image"] = "http://phnompenhsuperstore.com/api/img/suppliers/".$supplier["ID"].".png";
	else if (file_exists(getcwd()."./img/suppliers/".$supplier["ID"].".jpg"))
		$supplier["image"] = "http://phnompenhsuperstore.com/api/img/suppliers/".$supplier["ID"].".jpg";
	else 
		$supplier["image"] = "";
	

	$response = $response->withJson($supplier);
	return $response;
});

$app->post('/supplier/{vendorid}',function(Request $request,Response $response) {   

	$json = json_decode($request->getBody(),true);	
	$vendorid = $request->getAttribute('vendorid'); 
	$field = $json["field"];
	$value = isset($json["value"]) ? $json["value"] : null;


	if ($field == "vendorname")
	{
		/*
		$DB = getDatabase();
		$stmt1 = $DB->prepare("UPDATE APVENDOR set VENDNAME = :value WHERE VENDID = :vendorid");
		$stmt1->bindValue(':value',$value);
		$stmt1->bindValue(':vendorid',$vendorid);
		$stmt1->execute();
		*/
	}

	$internalDB=getInternalDatabase();	

	$sql = "UPDATE SUPPLIER_NEW set ".$field." = '".$value."' WHERE ID = ".$vendorid;
	$stmt = $internalDB->prepare($sql);				
	error_log($sql);	

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


/**************TROMBI ***************/
$app->get('/trombi',function(Request $request,Response $response) {    	
	$db = getInternalDatabase();	
	$sql = "SELECT ID,firstname,lastname,phone,dayoff,sex,role,companyEmail,birthdate FROM USER";
	$params = array();
	$req = $db->prepare($sql);
	$req->execute($params);
	$users = $req->fetchAll(PDO::FETCH_ASSOC);

	$result = array();

	foreach($users as $user)
	{	
		if (file_exists(getcwd()."/img/users/".$user["ID"].".png"))
			$user["image"] = "http://phnompenhsuperstore.com/api/img/users/".$user["ID"].".png";
		else if (file_exists(getcwd()."./img/users/".$user["ID"].".jpg"))
			$user["image"] = "http://phnompenhsuperstore.com/api/img/users/".$user["ID"].".jpg";
		else 
			$user["image"] = "";
		array_push($result,$user);
	}
	$response = $response->withJson($result);
	return $response;
});

$app->get('/trombi/{id}',function(Request $request,Response $response) {    	
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');
	$params = array($id);

	$sql = "SELECT ID,firstname,lastname,phone,dayoff,sex,role,companyEmail,birthdate FROM USER WHERE login = ?";
	$req = $db->prepare($sql);
	$req->execute($params);
	$user = $req->fetch(PDO::FETCH_ASSOC);
	
	if (file_exists(getcwd()."/img/users/".$user["ID"].".png"))
		$user["image"] = "http://phnompenhsuperstore.com/api/img/users/".$user["ID"].".png";
	else if (file_exists(getcwd()."./img/users/".$user["ID"].".jpg"))
		$user["image"] = "http://phnompenhsuperstore.com/api/img/users/".$user["ID"].".jpg";
	else 
		$user["image"] = "";	

	$response = $response->withJson($user);
	return $response;
});


/**************SCHEDULE***************/

$app->get('/scheduleStore',function(Request $request,Response $response) { 
	$db = getInternalDatabase();		

	$resp = array();
	// CASHIER
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'C' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["C"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// FRESH 
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'F' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["F"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// ROW
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'R' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["R"] = $req->fetchAll(PDO::FETCH_ASSOC);


	$response = $response->withJson($resp);
	return $response;
});

$app->get('/scheduleAll',function(Request $request,Response $response) { 
	$db = getInternalDatabase();		

	$resp = array();
	// CASHIER
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'C' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["C"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// FRESH 
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'F' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["F"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// ROW
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'R' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["R"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// Cleaner	
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'CL' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["CL"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// Warehouse
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'W' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["W"] = $req->fetchAll(PDO::FETCH_ASSOC);

	// Office
	$sql = "SELECT ID,login,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER where space = 'O' ";
	$req = $db->prepare($sql);
	$req->execute();
	$resp["O"] = $req->fetchAll(PDO::FETCH_ASSOC);




	$response = $response->withJson($resp);
	return $response;
});



$app->get('/schedule/{id}',function(Request $request,Response $response) { 
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');
	$params = array($id);

	$sql = "SELECT ID,dayoff,starttime1,endtime1,starttime2,endtime2,color,firstname,lastname FROM USER WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute($params);
	$schedule = $req->fetch(PDO::FETCH_ASSOC);

	$response = $response->withJson($schedule);
	return $response;

});



$app->put('/schedule/{id}',function(Request $request,Response $response) { 
	$id = $request->getAttribute('id');
});

/**************SALARY***************/
$app->get('/salary',function(Request $request,Response $response) { 

	$db = getInternalDatabase();	
	
	$result = array();

	$sql = "SELECT ID,firstname,lastname FROM USER";
	$req = $db->prepare($sql);
	$req->execute();
	$users = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($users as $user)
	{
		$result[$user["ID"]]["USER"] = $user;
		$result[$user["ID"]]["SALARIES"] = array();

		$sql2 = "SELECT amount,date FROM SALARY WHERE userid = ?";
		$req2 = $db->prepare($sql2); 
		$req2->execute(array($user["ID"]));		
		$salaries = $req2->fetchAll(PDO::FETCH_ASSOC);
		foreach($salaries as $salary)
		{
			array_push($result[$user["ID"]]["SALARIES"],$salary);			
		}				
	}	
	$response = $response->withJson($result);
	return $response;

});

$app->post('/salary',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
});

$app->put('/salary/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
});

/**************REST DAY***************/
$app->get('/restday',function(Request $request,Response $response) { 
	$db = getInternalDatabase();		

	$sql = "SELECT * FROM RESTDAY WHERE status = 'PENDING'";
	$req = $db->prepare($sql);
	$req->execute(); 
	$restdays = $req->fetchAll(PDO::FETCH_ASSOC);		
	$response = $response->withJson($restdays);
	return $response;
});


$app->get('/restday/{id}',function(Request $request,Response $response) { 
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM RESTDAY WHERE userid = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id)); 
	$restdays = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$response = $response->withJson($restdays);
	return $response;
});

$app->put('/restday',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
});

$app->delete('/restday/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
});



/**************PURCHASE ORDER***************/
$app->get('/receivedpo/{id}', function(Request $request, Response $response) {
	$db = getDatabase();

	$sql = "";
});

$app->get('/receivedpo', function(Request $request, Response $response) {
	// USER
	// DATE 
	// VENDOR 

});

// Purchaser create purchase order 
$app->get('/purchaseorder/{id}', function(Request $request, Response $response) {
	$db = getDatabase();

	//$sql = 

	//clearview_identifier

});
// POSTATUS : C = Complete
// POSTATUS : R = Waiting

// INSERT INTO TABLE POHEADER

// PONUMBER : NEED TO FIND LOGIC : MAY TRY INDEPENDENT NUMBER
// VENDID : OK | AUTO 
// VENDNAME : OK | CHOOSE FROM A LIST
// VENDNAME1 :  | AUTO 
// PODATE : OK | AUTO 
// LOCID : OK | PICKER 
// PURCHASE_AMT : Negative when POSTATUS is R 
// USERADD : RETRIEVE USER_ID
// COLID : TO ENQUIRE 
// POSTATUS : R
// VAT_PERCENT : RETRIEVE FROM VENDOR
// PCNAME : INTRANET
// CURR_RATE : 4100.00000
// CURRID : USD
// EST_ARRIVAL : NOW + 2 DAYS
// REQUIRE_DATE : NOW + 2 DAYS
// VAT_AMT : CALCULATE FROM PURCHASE_AMT + VAT_PERCENT
// DISC_PERCENT : FROM OUR VENDOR TABLE

// INSERT INTO TABLE PODETAIL 
// PONUMBER : OK 
// VENDID : OK 
// VENDNAME : OK
// VENDNAME1 : OK 
// PURCHASE_DATE : NOW
// PRODUCT_ID : OK
// LOCID : WH1
// PRODUCTID : OK 
// LOCID : OK
// PRODUCTNAME : OK
// PRODUCTNAME1 : OK
// ORDER_QTY : OK
// TRANUNIT : OK 
// TRANFACTOR : 1.00000
// STKUNIT : UNIT

// STKFACTOR : 1.00000
// TRANDISC : (PERCENT OF DISCOUNT)
// TRANCOST:  (PRODUCT UNIT COST)
// EXTCOST : (TOTAL COST AFTER DISCOUNT)
// CURR_RATE : 4150 
   
/*
{
	VENDID : "XXXX",
	LOCID : "XXX",
	USERADD : "XXX",
	ITEMS : [ 
		{ 
		  "PRODUCTID" : "XXXX",
		  "ORDER_QTY" : "XXXX",
		  "DISCPERCENT" : "XXX"
		},
		{
			"PRODUCTID" : "XXXX",
		  "ORDER_QTY" : "XXXX",
		  "DISCPERCENT" : "XXX"		 
		},	
	]

}
*/


$app->post('/purchaseorder',function(Request $request,Response $response) { 	
	//  

	// LIST OF ITEMS WITH QUANTITY 
	// POSTYPE : PA = Waiting  (maybe)
	// POSTYPE : IN : Received (maybe)
	$sqlHeader = "INSERT INTO ";
});

// Purchaser cancel
$app->delete('/purchaseorder/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');
	$sql = "DELETE FROM PURCHASE_ORDER WHERE ID = ?";
	$req->execute($params);

	$sql = "DELETE FROM PURCHASE_ORDER WHERE ID = ?";
	$req->execute($params);

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


// Clerk Receive 
$app->put('/purchaseorder/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');
});

// Receiver Inject TODO code qui fait l'accounting 
$app->post('/purchaseorderInject/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');
});

/************** EXPIRATION ***************/
$app->get('/expiration/{dayrange}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	$dayrange = $request->getAttribute('dayrange'); 	
});

/************** RENTAL ***************/
// Rental list
$app->get('/rental',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);	
});

$app->post('/rental',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	
});

$app->delete('/rental/{id}',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);	
	$id = $request->getAttribute('id');
});

// OUT OF STOCK //
$app->get('outofstock',function(Request $request, Response $response) {
	$db = getDatabase();
	$sql = "";         
});





ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();