<?php 

require_once("../api/RestEngine.php");

/***********************************************************************/
/****************************** FUNCTIONS ******************************/
/***********************************************************************/

function LogAction($str){
    system("echo '".$str."' >> /var/log/daemon.log");
}

function getDatabase()
{ 	
	$conn = null;      
    try  {  				
		$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
    }
    catch(Exception $e){   
		die( print_r( $e->getMessage( )) );   
    }
	return $conn;
}

function getFoodpandaDatabase()
{
	try{				
        $db = new PDO('sqlite:'.dirname(__FILE__).'/../foodpanda/foodpanda.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function getNham24Database()
{
	$host = '119.82.252.226';
	$db   = 'NHAM24';
	$user = 'sovi';
	$pass = 'pied2porc';
	$port = "3306";
	$charset = 'utf8mb4';

	$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
	try {
    	 $pdo = new \PDO($dsn, $user, $pass, $options);
	} catch (\PDOException $e) {
     	throw new \PDOException($e->getMessage(), (int)$e->getCode());
		return null;
	}
	return $pdo;
}

function imageBaseURL()
{
	return "http://iaetcode.fr/images/";
}

function getAccessToken()
{
	$curl = curl_init();
	$data["username"] = "user_pp_super_store";
	$data["password"] = "fb0d6f70d5d0d90090568c69c";
	$data["type"] = "merchant";

	curl_setopt_array($curl, array(
					
	CURLOPT_URL => 'https://partner.nham24.com/oauth/token',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($data),
  	CURLOPT_HTTPHEADER => array(    
    'Content-Type: application/json'
  	),
	));
	$response = curl_exec($curl);
	$data = json_decode($response,true);	
	curl_close($curl);	
	return $data["access_token"];
}

/***********************************************************************/
/****************************** MAINTENANCE ****************************/
/***********************************************************************/
function _nham24UpdateItemActive($ID,$status)
{
	$db = getNham24Database();
	$sql = "SELECT * FROM ITEM WHERE IDENTIFIER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($ID));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	
	$data["status"] = $status;
	
	echo "updating item...\n";
	$baseURL = "https://partner.nham24.com/";
	$token = getAccessToken();
	$curl = curl_init();
	curl_setopt_array($curl, array(								  
		CURLOPT_URL => $baseURL.'api/v1/item/status/' . $ID ,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$token,
			'Content-Type: application/json'),
		)
	);
	$response = curl_exec($curl);
	curl_close($curl);	
}


function _nham24UpdatePrice($identifier)
{	
	$indb = getNham24Database();
	$db = getDatabase();

	$sql = "SELECT * FROM ITEM WHERE IDENTIFIER = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($identifier));
	$data = $req->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT PRICE FROM ICPRODUCT WHERE BARCODE = ?";
	$req = $db->prepare($sql);
	$req->execute(array($data["BARCODE"]));
	$itemdetail = $req->fetch(PDO::FETCH_ASSOC);
	if($itemdetail == false){
		echo "Identifier: ".$identifier. " not found, skipping...\n";
		return;
	}else{
		echo "Identifier: ".$identifier. " changing...\n";
	}
		
	$data["ref_id"] = $data["IDENTIFIER"];
	$data["ref_cat_id"] = $data["CATEGORYID"];
	$data["name_en"] = $data["NAMEEN"];
	$data["name_km"] = $data["NAMEKH"];
	$data["name_zh"] = "";
	$data["desc_en"] = "";
	$data["desc_km"] = "";
	$data["desc_zh"] = "";
	$data["barcode"] = $data["BARCODE"];
	$data["image"] = imageBaseURL() . $data["BARCODE"] . ".jpg"; 
	$data["recommended"] = false;	
	$option_prices = array(["ref_id" => $data["IDENTIFIER"]."_1", 
							"name" => "Regular",
							"price" => $data["PRICE"],
							"status" => "active",
							"default" => true]);	
	$data["option_prices"] = $option_prices;
	$data["modifier_group"] = array();

	$sql = "SELECT SALEUNIT,SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";		
	$req = $db->prepare($sql);
	$packs = $req->execute(array($data["BARCODE"]));
	$packs = $req->fetchAll(PDO::FETCH_ASSOC);
	$i = 2;
	foreach($packs as $pack){
		$option = ["ref_id" => $data["ref_id"]."_".$i, 
				   "name" => $pack["SALEUNIT"],
				   "price" => $pack["SALEPRICE"],
				   "status" => "active",
				   "default" => false
				   ];
		$i++;
		array_push($option_prices,$option);
	}
	$baseURL = "https://partner.nham24.com/";
	$token = getAccessToken();
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $baseURL.'api/v1/item/update/' . $identifier,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$token,
			'Content-Type: application/json'),
		)
	);
	$response = curl_exec($curl);
	curl_close($curl);	

	$sql = "UPDATE ITEM SET PRICE = ? WHERE IDENTIFIER = ?";
	$req = $indb->prepare($sql);					    
	$req->execute(array($itemdetail["PRICE"],$identifier));
}

function maintenancePrice()
{	
	$indb = getNham24Database();
	$blueDB = getDatabase();
    $sql = "SELECT * FROM ITEM";
    $req = $indb->prepare($sql);
	$req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
	
    foreach($items as $item){
		//echo $item["BARCODE"]. " ";
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE BARCODE = ?";
        $req = $blueDB->prepare($sql);
        $req->execute(array($item["BARCODE"]));
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);				
		if ($itemdetail == false){
			echo $item["BARCODE"]."NOT FOUND\n";
			continue;
		}			
		$NPrice = floatval($item["PRICE"]);
		$SPrice = floatval($itemdetail["PRICE"]);		

		if ($NPrice != $SPrice){
			echo "Nham24 price : ".$NPrice." | PPSS price:".$SPrice." changing...\n"; 			
			_nham24UpdatePrice($item["IDENTIFIER"]);			
		}	
		sleep(1);		
    }
}

function maintenanceStock()
{
	$db = getNham24Database();
	$blueDB = getDatabase();
    $sql = "SELECT * FROM ITEM";
    $req = $db->prepare($sql);
	$req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);	
    foreach($items as $item){
		$sql = "SELECT ONHAND FROM ICPRODUCT WHERE BARCODE = ?";
        $req = $blueDB->prepare($sql);
        $req->execute(array($item["BARCODE"]));
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);				
        if ($itemdetail != false && $itemdetail["ONHAND"] <= $item["THRESHOLD"] ?? 0){
			echo "Item : ".$item["BARCODE"]." INACTIVE\n";
			_nham24UpdateItemActive($item["IDENTIFIER"],false);            			
		}			
		else {
			echo "Item : ".$item["BARCODE"]." ACTIVE\n";
			_nham24UpdateItemActive($item["IDENTIFIER"],true);            			       		
		}			
	}
}

/***********************************************************************/
/****************************** MAINTENANCE ****************************/
/***********************************************************************/

if ($argc > 1 && $argv[1] == "INITIALIZE")
	maintenanceStock();
else if ($argc > 1 && $argv[1] == "INITIALIZEPRICE")
	maintenancePrice();

?>
