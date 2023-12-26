<?php 

require_once("/Users/ppss/Sites/PPSS/api/RestEngine.php");

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


function foodpandaUpdatePrice($sku,$price)
{
	echo "Updating price...\n";
	$curl = curl_init();
	$data["sku"] = $sku;
	$data["price"] = $price;

	print("SKU:" .$sku."\n");
	print("PRICE:" .$price);

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://partners-ap.deliveryhero.io/api/assortment/v1/vendors/eyn4/product',
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
    'Authorization: Bearer eyJJRCI6IiIsIk5hbWUiOiIiLCJHbG9iYWxFbnRpdHlJRCI6IkZQX0tIIiwiQ2hhaW5HbG9iYWxJRCI6IjVjNjkxODM5LTA2N2QtNDMzYi1iOTY4LTk4N2U4NDlhMDA2MiIsIlRva2VuIjoiNnlLWTl0Tk5xOWZteTVrcyIsIkdlbmVyYXRlZEF0IjoiMDAwMS0wMS0wMVQwMDowMDowMFoifQo=',
    'Content-Type: application/json'
  	),
	));
	$response = curl_exec($curl);
	$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	echo "\nHttpCode ".$httpcode;
	echo $response."\n";
	curl_close($curl);	
}

function foodpandaUpdate($sku,$active)
{	
	$curl = curl_init();
	$data["sku"] = $sku;
	$data["active"] = $active;

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://partners-ap.deliveryhero.io/api/assortment/v1/vendors/eyn4/product',
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
    'Authorization: Bearer eyJJRCI6IiIsIk5hbWUiOiIiLCJHbG9iYWxFbnRpdHlJRCI6IkZQX0tIIiwiQ2hhaW5HbG9iYWxJRCI6IjVjNjkxODM5LTA2N2QtNDMzYi1iOTY4LTk4N2U4NDlhMDA2MiIsIlRva2VuIjoiNnlLWTl0Tk5xOWZteTVrcyIsIkdlbmVyYXRlZEF0IjoiMDAwMS0wMS0wMVQwMDowMDowMFoifQo=',
    'Content-Type: application/json'
  	),
	));
	$response = curl_exec($curl);
	echo $response."\n";
	curl_close($curl);	
}

function go()
{
	echo "Refreshing...\n";
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

		$sql = "SELECT * FROM ICPRODUCT WHERE BARCODE = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["BARCODE"]));
		$itemdetail = $req->fetch(PDO::FETCH_ASSOC);					

		if ($itemdetail["ONHAND"] <= $item["THRESHOLD"] ?? 0)
			foodpandaUpdate($item["SKU"],false);            
		else 
			foodpandaUpdate($item["SKU"],true);		
	}
	$sql = "DELETE FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());

	LogAction(date("Y-m-d H:i:s")." FOODPANDA REFRESHED");
}

function initializePrice($force = true)
{
	error_log("FOODPANDA MAINTENANCE PRICE!!!!!");
	$db = getInternalDatabase();
	$blueDB = getDatabase();
    #$sql = "SELECT * FROM ITEM WHERE BARCODE = '8801069182445'";
	$sql = "SELECT * FROM ITEM";
    $req = $db->prepare($sql);
	$req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
	
    foreach($items as $item){
		echo $item["BARCODE"]. " ";
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE BARCODE = ?";
        $req = $blueDB->prepare($sql);
        $req->execute(array($item["BARCODE"]));
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);				
		if ($itemdetail == false){
			echo $item["BARCODE"]."NOT FOUND\n";
			continue;
		}
			
		$FPrice = floatval(str_replace(",",".",substr($item["PRICE"],1)));
		$SPrice = floatval($itemdetail["PRICE"]);		
		if ($FPrice != $SPrice || $force == true){
			echo $item["BARCODE"]." Foodpanda price : ".$FPrice." | PPSS price:".$SPrice."\n"; 
			echo " changing\n";
			foodpandaUpdatePrice($item["SKU"],$SPrice);
			$newPrice = "$".str_replace(".",",",$itemdetail["PRICE"]);
			$sql = "UPDATE ITEM SET PRICE = ? WHERE SKU = ?";
			$req = $db->prepare($sql);
			$req->execute(array($newPrice,$item["SKU"]));
		}	
		//sleep(1);		
    }
}

function initialize()
{
    $db = getInternalDatabase();
	$blueDB = getDatabase();
    $sql = "SELECT * FROM ITEM WHERE";

    $req = $db->prepare($sql);
	$req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
	error_log("FOODPANDA MAINTENANCE STOCK!!!!!");
    foreach($items as $item){
		
        $sql = "SELECT ONHAND FROM ICPRODUCT WHERE BARCODE = ?";
        $req = $blueDB->prepare($sql);
        $req->execute(array($item["BARCODE"]));
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);				
        if ($itemdetail != false && $itemdetail["ONHAND"] <= $item["THRESHOLD"] ?? 0){
			echo "Item : ".$item["BARCODE"]." INACTIVE\n";
			foodpandaUpdate($item["SKU"],false);            
		}			
		else {
			echo "Item : ".$item["BARCODE"]." ACTIVE\n";
			foodpandaUpdate($item["SKU"],true);            		
		}			
    }
	LogAction(date("Y-m-d H:i:s")." FOODPANDA INITIALIZED");
}

function desactivate()
{
	$db = getInternalDatabase();
	$barcodes = array(
	"8998389134473",
	"8850338017193",
	"8850338018114",
	"8886467100062",
	"9300650025172",
	"9300650025219",
	"9555480007304",
	"8850186100078",
	"749921106377",
	"8847100561046",
	"8859128600171",
	"8859128600201",
	"9556995170132",
	"9555127902177",
	"9555127901880",
	"8852199186117",
	"9555218709326",
	"8859572610108",
	"8858947450059",
	"3434350000019",
	"3434350000026",
	"8847105680681",
	"6926719110011",
	"8850122603106",
	"8004275084293",
	"8004275054449",
	"8004275025319",
	"8004275025364",
	"8004275060235",
	"8858705609347",
	"8846600196215",
	"6923807807839",
	"6902538007367",
	"6920616317580",
	"884394001917",
	"884394005694",
	"8859197040229",
	"8859197040236",
	"8846008598888",
	"8846008599786",
	"8850250010937",
	"8853095000699",
	"8850206160129",
	"8853095000682",
	"8853095000033",
	"6956588500309",
	"6956588500316",
	"6956588500842",
	"8854761394319",
	"8854761184019",
	"8854761024018",
	"8854761004010",
	"8847100241501",
	"9555192508786",
	"8847100981295",
	"9556001215932",
	"8858952801648",
	"8712561631204",
	"611269991000",
	"3258563230045",
	"3258563230083",
	"3258563230137",
	"8857200111218",
	"8857200111225",
	"3019081236090",
	"6916432980015",
	"6921804700795",
	"6921804700559",
	"9556466212330",
	"8849301843327",
	"8849301844423",
	"873453003467",
	"3057640257773",
	"8850114407514",
	"8850620888234",
	"8850213197507",
	"8850250006015",
	"8850250000365",
	"8850250000358",
	"8847104150024",
	"8847104150031",
	"8847104150017",
	"8850250002628",
	"8850069020073",
	"8850124092823",
	"8850058003728",
	"8852117001324",
	"8850250008200",
	"8850487037172",
	"6921480218287",
	"6922406898989",
	"1103",
	"1345",
	"1101",
	"1312",
	"1319",
	"1102",
	"1315",
	"1213",
	"1212",
	"1310",
	"1111",
	"1324",
	"1306",
	"1206",
	"1104",
	"1211",
	"1207");

	foreach($barcodes as $barcode){
		$sql = "SELECT SKU FROM ITEM WHERE BARCODE = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($barcode));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$SKU = $res["SKU"];
		echo $barcode."\n";
		//foodpandaUpdate($SKU,false);
		$sql = "DELETE FROM ITEM WHERE SKU = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($barcode));
	}

	

}

function LogAction($str){
    system("echo '".$str."' >> /var/log/daemon.log");
}

if ($argc > 1 && $argv[1] == "INITIALIZE")
	initialize();
else if ($argc > 1 && $argv[1] == "INITIALIZEPRICE")
	initializePrice();
else if ($argc > 1 && $argv[1] == "DESACTIVATE")
	desactivate();
else if($argc > 1 && $argv[1] == "REFRESH")
	go();	
else
	error_log("WARNING !!! foodpanda go attempt");
//initialize();


?>
