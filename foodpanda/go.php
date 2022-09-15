<?php 

require_once("../api/RestEngine.php");

function getDatabase()
{ 	
	$conn = null;      
    try  {  		
        $conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
    }
    catch(Exception $e){   
		die( print_r( $e->getMessage( )) );   
    }
	return $conn;
}

function getInternalDatabase()
{
	try{				
        $db = new PDO('sqlite:'.dirname(__FILE__).'/foodpanda.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}




function foodpandaUpdate($sku,$active)
{
	$curl = curl_init();

	$data["sku"] = $sku;
	$data["active"] = $active;

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://partners-ap.deliveryhero.io/api/assortment/v1/vendors/vfbb/product',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => json_encode($data),
  	CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer eyJJRCI6IiIsIk5hbWUiOiIiLCJHbG9iYWxFbnRpdHlJRCI6IkZQX0tIIiwiQ2hhaW5HbG9iYWxJRCI6IjRjZjg1YTdjLTI1OTEtNDE0Yi1hY2Q3LWQ0Mjg3ZWUxYWMzZiIsIlRva2VuIjoiTktGREI3eExnWlFwZVJRUSIsIkdlbmVyYXRlZEF0IjoiMDAwMS0wMS0wMVQwMDowMDowMFoifQo=',
    'Content-Type: application/json'
  	),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	if ($active == true)
		echo "Active ".$response."\n";
	else
		echo "Inactive ".$response."\n";
}

function go()
{
    $blueDB = getDatabase();
	$db = getInternalDatabase();

	$sql = "SELECT * FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());

	$actions = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($actions as $action)
	{
		$barcode = $action["IDENTIFIER"];
		$onHand = $action["ARG2"];

		$req = $db->prepare("select * FROM ITEM WHERE BARCODE = ?");
		$req->execute(array($barcode));
		$res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false)
            continue;

		if ($itemdetail["ONHAND"] <= $item["THRESHOLD"] ?? 0)
			foodpandaUpdate($item["SKU"],false);            
		else 
			foodpandaUpdate($item["SKU"],true);		
	}
	$sql = "DELETE FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());
}


function initialize()
{
    $db = getInternalDatabase();
	$blueDB = getDatabase();
    $sql = "SELECT * FROM ITEM";
    $req = $db->prepare($sql);
	$req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
	
    foreach($items as $item){
		echo "Item : ".$item["BARCODE"]." ";
        $sql = "SELECT * FROM ICPRODUCT WHERE BARCODE = ?";
        $req = $blueDB->prepare($sql);
        $req->execute(array($item["BARCODE"]));
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);				
        if ($itemdetail["ONHAND"] <= $item["THRESHOLD"] ?? 0)
			foodpandaUpdate($item["SKU"],false);            
		else 
			foodpandaUpdate($item["SKU"],true);            		
    }
}


//Go();
//initialize();


?>
