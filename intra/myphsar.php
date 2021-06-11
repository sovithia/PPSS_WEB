<?php 


require_once 'RestEngine.php';

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


function recordMPID($barcode,$myphsarid)
{
	$db = getInternalDatabase("ECOMMERCE");
	$sql = "UPDATE ITEM SET MYPHSARID = ? WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($myphsarid,$barcode));

} 

function addProduct($product)
{
	$data = array();
	$data["api_key"] = "91d7d5eee3d78ed9ccc8877caba6789a";
	$data["user_id"] = "970770";
	$data["marketplace_user_id"] = "727499";
	$data["name"] = $product["PRODUCTNAME"];	
	$img = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$product["PRODUCTID"];	
	$data["multi_image_url"] = [$img];
	$data["inventory_enabled"] = 1;		
	$data["parent_category_id"] = $product["MYPHSARCATEGORYID"];	

	if (substr($product["PRICE"],0,1) == ".")
		$product["PRICE"] = "0".$product["PRICE"];
	$data["price"] = $product["PRICE"];

	$result = null;
	while(1)
	{
		$result = RestEngine::POST("https://api.yelo.red/open/product/add",$data);
		if (!isset($result["data"]["id"]))	{
			echo $product["PRICE"]."\n";
			echo "PAUSING FOR ".$product["PRODUCTID"]."\n";	
			var_dump($result);		
			sleep(5);		
		}	
			
		else
			break;		
	}		
	return $result["data"]["id"];
}

function Go()
{
	$result = RestEngine::GET("http://sites.local/PPSS/api/api_ecommerce.php/items");	
	$exclude = [ "8850709300022",
				"5703538244988",
				"5703538245107",
				"5703538266492",
				"9414453906078",
				"9329982017587",
				"9414453904401",
				"9329982016542",
				"8935006100107",
				"8850007650508",
				"8850029000923",
				"8945006100663",
				"8935006533837",
				"8850710008207",
				"4513574011786",
				"4902430374293",
				"4902430734950",
				"4902430359733",
				"8999999059941",
				"4902430360906",
				"8850144206392",
				"8850144208693",
				"8850144225539",
				"8850144211440",
				"6944496600211",
				"8847106398837",
				"8850069011019",
				"8850144059097",
				"8850144219897"];
	/*
	$object["PRODUCTID"] = "4902430360906";
	$object["PRODUCTNAME"] = "OLAY day's facial cream (total effects 7in1 normal SPF15) 20g";
	$object["MYPHSARCATEGORYID"] = "6191747";
	$object["PRICE"] = "5.60000";
	echo "INSERTING ". $object["PRODUCTID"]."\n";		
	$id = addProduct($object);	
	recordMPID($object["PRODUCTID"],$id);		
	*/
	
	foreach($result  as $object)
	{
		if (!in_array($object["PRODUCTID"],$exclude))
		{
			echo "INSERTING ". $object["PRODUCTID"]."\n";	
			$id = addProduct($object);					
			recordMPID($object["PRODUCTID"],$id);	
		}		
		
	}	
}
Go();
?>