<?php 

require_once 'vendor/autoload.php';
require_once 'RestEngine.php';
require_once 'functions.php';



// SELECT QUEUE 
// EXECUTE QUEUTE

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



function updateAllQty()
{
	$blueDB = getDatabase();
	$db = getInternalDatabase("ECOMMERCE");

	$sql = "SELECT * FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());

	$actions = $req->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	$data["api_key"] = "91d7d5eee3d78ed9ccc8877caba6789a";
	$data["user_id"] = "970770";
	$data["marketplace_user_id"] = "727499";

	foreach($actions as $action)
	{
		$identifier = $action["IDENTIFIER"];
		$onHand = $action["ARG2"];
		$price = $action["ARG1"];
		$sql = "";
		$req = $db->prepare("select * FROM ITEM WHERE ID = ?");
		$req->execute(array($identifier));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		$data["product_id"] = $res["MYPHSARID"];
		$data["available_quantity"] = $onHand;
		$data["price"] = $price;

		$result = RestEngine::POST("https://api.yelo.red/open/product/edit",$data);	
		$req = $db->prepare("UPDATE ");

	}
	$sql = "DELETE FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());
}


?>