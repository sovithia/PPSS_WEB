<?php 

require_once("../api/RestEngine.php");

/***********************************************************************/
/****************************** FUNCTIONS ******************************/
/***********************************************************************/

function LogAction($str){
    system("echo '".$str."' >> /var/log/daemon.log");
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

function getNham24DatabaseOld()
{
	try{				
        $db = new PDO('sqlite:'.dirname(__FILE__).'/nham24.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function _createCategory($ID,$nameEN,$nameKH)
{
	echo "creating category...\n";
	$curl = curl_init();
	$data["ref_id"] = $ID;
	$data["name_en"] = $nameEN;
	$data["name_zh"] = "";
	$data["name_kh"] = $nameKH;
	$data["desc_en"] = "";
	$data["desc_zh"] = "";
	$data["desc_kh"] = "";
	$data["sequence"] = "1";
	$data["status"] = "active";
	$baseURL = "https://partner.nham24.com/";
	$token = getAccessToken();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $baseURL.'api/v1/category/create',
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
	var_dump($response);
	curl_close($curl);	
}
function setupCategories()
{
	$indb = getNham24Database();
	$sql = "SELECT * FROM CATEGORY";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$categories = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($categories as $category){		
		_createCategory($category["id"],$category["name"],$category["namekh"]);		
		break;
	}
}

function _createItem($itemID,$categoryID,$nameEN,$nameKH,$barcode,$price)
{
	echo $categoryID;
	$indb = getNham24Database();
	$db = getDatabase();
	echo "creating item ".$itemID."...\n";
	$curl = curl_init();
	$data["ref_id"] = $itemID;
	$data["ref_cat_id"] = $categoryID;
	$data["name_en"] = $nameEN;
	$data["name_km"] = $nameKH;
	$data["status"] = "active";
	$data["name_zh"] = "";
	$data["desc_en"] = "";
	$data["desc_km"] = "";
	$data["desc_zh"] = "";
	$data["barcode"] = $barcode;
	$data["image"] = imageBaseURL() . $barcode . ".jpg"; 
	$data["recommended"] = false;	
		
	$option_prices = array(["ref_id" => $itemID."_1", 
							"name" => "Regular",
							"price" => $price,
							"status" => "active",
							"default" => true]);	

	$sql = "SELECT SALEUNIT,SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";		
	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$packs = $req->fetchAll(PDO::FETCH_ASSOC);
	$i = 2;
	foreach($packs as $pack){
		$option = ["ref_id" => $itemID."_".$i, 
				   "name" => $pack["SALEUNIT"],
				   "price" => $pack["SALEPRICE"],
				   "status" => "active",
				   "default" => false
			];
		$i++;
		array_push($option_prices,$option);
	}						   	
	$data["option_prices"] = $option_prices;
	$data["modifier_group"] = array();
	$baseURL = "https://partner.nham24.com/";
	$token = getAccessToken();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $baseURL.'api/v1/item/create',
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

function setupItems()
{
	$indb = getNham24Database();
	$sql = "SELECT * FROM ITEM";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	foreach($items as $item){			
		if($item["IDENTIFIER"] == "10010002")			
			continue;		
		_createItem($item["IDENTIFIER"],$item["CATEGORYID"],$item["NAMEEN"],$item["NAMEKH"],$item["BARCODE"],$item["PRICE"]);				
	}
}

function checkMissingPictures()
{
	$db = getNham24Database();
	$sql = "SELECT BARCODE FROM ITEM";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$missing = "";
	foreach($items as $item){
		if (!file_exists("/Users/sovi/Projects/Nham24/ImageNham24/".$item["BARCODE"].".jpg"))
			$missing .= "\n".$item["BARCODE"];			
	}	

}

function copyDB()
{
    $olddb = getNham24DatabaseOld();
    $db = getNham24Database();

    // Copy category
    /*
    $sql = "SELECT * FROM CATEGORY";
    $req = $olddb->prepare($sql);
    $req->execute(array());
    $categories = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($categories as $category){
        $sql = "INSERT INTO CATEGORY (id,name,namekh) VALUES (?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($item["id"],$item["name"],$item["namekh"]));        
    }
    */

    // Copy items
    $sql = "SELECT * FROM ITEM";
    $req = $olddb->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "INSERT INTO ITEM (IDENTIFIER,CATEGORYID,NAMEEN,NAMEKH,BARCODE,PRICE,THRESHOLD) VALUES (?,?,?,?,?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($item["IDENTIFIER"],$item["CATEGORYID"],$item["NAMEEN"],$item["NAMEKH"],$item["BARCODE"],
                            $item["PRICE"],$item["THRESHOLD"]));        
    }

}

function listCategories()
{	
	$baseURL = "https://partner.nham24.com/";
	$token = getAccessToken();
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $baseURL.'api/v1/category/list',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',		
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$token,
			'Content-Type: application/json'),
		)
	);
	$response = curl_exec($curl);
	var_dump($response);
	curl_close($curl);	
}

function imageBaseURL(){
	return "http://iaetcode.fr/images/";
}

if ($argc > 1 && $argv[1] == "CATEGORY")
	setupCategories();
else if ($argc > 1 && $argv[1] == "LISTCATEGORY")
	listCategories();
else if ($argc > 1 && $argv[1] == "ITEMS")
	setupItems();
?>