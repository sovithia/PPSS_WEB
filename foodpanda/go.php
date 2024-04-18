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
	system("echo 'FOODPANDA MAINTENANCE PRICE ".date('H:i')."' >> /Users/ppss/maintenance.log");
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	//$sql = "SELECT * FROM ITEM WHERE BARCODE = '072810112105'";    
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
		$SPrice = floatval($itemdetail["PRICE"]) * floatval($item["UNITFACTOR"]);		
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
	system("echo 'FOODPANDA MAINTENANCE STOCK ".date('H:i')."' >> /Users/ppss/maintenance.log");
    $db = getInternalDatabase();
	$blueDB = getDatabase();
    $sql = "SELECT * FROM ITEM WHERE";

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
		"8850999112107",
		"8935212810807",
		"8935212810067",
		"8850144023029",
		"8850144023067",
		"8888086022008",
		"8998389134473",
		"8850338017193",
		"8850338018114",
		"4892018006701",
		"8888202026422",
		"8850029025292",
		"8850029020969",
		"8850029022253",
		"8850007650508",
		"8850304192176",
		"38850304191392",
		"9556710002755",
		"9556710006463",
		"5000347026713",
		"5000347091766",
		"8850304206361",
		"8859272202498",
		"8934732700728",
		"8934732700711",
		"8850092010201",
		"8886467100062",
		"9300650025172",
		"9300650025219",
		"4902430399340",
		"4902430540872",
		"4902430199926",
		"4902430733823",
		"8855051035738",
		"8855051039149",
		"8851021730603",
		"8855360203415",
		"8855360203378",
		"6926292595816",
		"8836020331778",
		"9555480007304",
		"8850186100078",
		"8996001410691",
		"8996001600221",
		"8846600067775",
		"8851989061054",
		"7702018868940",
		"42184652",
		"3014400186841",
		"3014400007962",
		"8846001557783",
		"8846001557615",
		"8000139100789",
		"FF0005",
		"5412873180171",
		"5412873177331",
		"5412873177324",
		"8847100561046",
		"8847100562395",
		"8859128600171",
		"8859128600201",
		"8888265000629",
		"8888265001039",
		"8888265000612",
		"8004402119317",
		"7001758562034",
		"8886350000059",
		"9556995170484",
		"9555127900753",
		"9555127900722",
		"9555127902320",
		"6946431800298",
		"8888077103389",
		"8850096750929",
		"6917878029252",
		"9555218709326",
		"8888192502685",
		"9555218700965",
		"8888417001207",
		"8850195710015",
		"8888116278870",
		"8888116000570",
		"8908000097131",
		"8908000097957",
		"8908000097148",
		"8858782300366",
		"8859572610108",
		"9555127902160",
		"9555127902177",
		"9555127901880",
		"9556046627097",
		"9556046627103",
		"9556046503025",
		"9556046511143",
		"9556184200275",
		"9556184036034",
		"9556184150051",
		"9556184200329",
		"9556184200312",
		"3068320085005",
		"4892368654195",
		"8850851810738",
		"8850851510607",
		"8858947450059",
		"8851932415255",
		"8851932415262",
		"8851932402781",
		"8851932274913",
		"8851932389358",
		"8851932397940",
		"8851932398756",
		"8851932386845",
		"8851932386876",
		"8851932353847",
		"8851932353892",
		"8851932353915",
		"8851932354349",
		"8851932412285",
		"8851932405287",
		"8851932403535",
		"8851932403559",
		"8850144225539",
		"8851932396882",
		"8851932396943",
		"8851932314299",
		"8851932283915",
		"8851932283779",
		"8851932221085",
		"8851932390729",
		"8851932390743",
		"8999999503642",
		"8851932372848",
		"8851932357968",
		"8851932388634",
		"8886439200004",
		"9555017407065",
		"309972154644",
		"309972154637",
		"8886421563018",
		"8886421563001",
		"8886421562035",
		"8886421562042",
		"8886421562028",
		"8935001722595",
		"8846000189640",
		"6946537047450",
		"8850086194016",
		"8850360040107",
		"8991380232261",
		"8850360031181",
		"9556046513147",
		"3434350000019",
		"3434350000026",
		"8886451002464",
		"8886451004864",
		"8886451004871",
		"9556001171771",
		"6926719110011",
		"4710962442522",
		"4710962431823",
		"4710962195053",
		"8888470028302",
		"8850122603106",
		"8004275084293",
		"8004275054449",
		"8004275025319",
		"8004275025364",
		"8858705609347",
		"877120",
		"4750021000140",
		"7312040040100",
		"8851028003854",
		"8850025121813",
		"8852023006864",
		"8809386886398",
		"8809386881553",
		"8809386881614",
		"8809386880464",
		"8809386885155",
		"8809386885124",
		"8846600196215",
		"8888300814037",
		"8935149850839",
		"8850002907645",
		"8850175020240",
		"8850175061250",
		"8934669480021",
		"4902508078597",
		"4902508008822",
		"4902508008815",
		"4902508261517",
		"4902508261494",
		"8858773958682",
		"8850201379137",
		"9414453906078",
		"9414453904401",
		"8809317284309",
		"8809317284347",
		"8849300425555",
		"8854512051249",
		"8809505544017",
		"3607340721083",
		"3614227838840",
		"8690605056643",
		"8690605056841",
		"8690605056872",
		"6942607200572",
		"6923807807839",
		"6902538007367",
		"6920616317580",
		"4800135001578",
		"884394001917",
		"884394005694",
		"8850273275719",
		"8859197040229",
		"8859197040236",
		"8850393800020",
		"8857122875991",
		"6971889109013",
		"7613035607729",
		"7613035608887",
		"7613035608856",
		"9555259503075",
		"8850250010937",
		"8853095000699",
		"8850206160129",
		"8853095000682",
		"8853095000033",
		"6956588500309",
		"6956588500316",
		"6956588500842",
		"8851932301572",
		"8851932111805",
		"8851932234429",
		"4902430658188",
		"8857102910636",
		"8850848011193",
		"8850848011209",
		"8854782030401",
		"41000499031984",
		"41000499011984",
		"8934988010022",
		"8888192815112",
		"8854761394319",
		"8854761004010",
		"8854761184019",
		"8854761024018",
		"8934669280416",
		"8934669280546",
		"8934669280379",
		"6928761501380",
		"8847103470031",
		"8847100241501",
		"9555192508786",
		"8699415020196",
		"8847100981295",
		"735852966340",
		"9556001215932",
		"6948129701580",
		"88000114",
		"8809375144447",
		"8857126414035",
		"8857126414059",
		"8857126414042",
		"8803348022213",
		"6971585870644",
		"8858842090770",
		"41200199001984",
		"6970334132330",
		"6954851259053",
		"41900598991984",
		"4712389910523",
		"740617274646",
		"740617298680",
		"740617298697",
		"3021005450139",
		"3151002422342",
		"3031000082342",
		"6934787530167",
		"8712561631204",
		"611269991000",
		"5601182013007",
		"6947878415144",
		"3747788405678",
		"6947878415168",
		"3520710004947",
		"3520710004930",
		"8003510028733",
		"6971648334229",
		"8845555551667",
		"3258563230045",
		"3258563230083",
		"3258563230137",
		"8852746160379",
		"8938510904049",
		"6939663905213",
		"41000199021984",
		"3518646266362",
		"8851401000210",
		"85000007686",
		"7640153869333",
		"5703538245107",
		"5703538266492",
		"8857200111218",
		"8857200111225",
		"170219",
		"4943863875001",
		"3019081236090",
		"4005900241276",
		"4005900241986",
		"6921804700795",
		"6921804700559",
		"4003583187584",
		"4003583190515",
		"9556466212330",
		"8901162032576",
		"8901162032569",
		"8901162032583",
		"8901162033979",
		"8849301843327",
		"8849301844423",
		"8853348008960",
		"8853348004344",
		"8853348004382",
		"8697420534646",
		"8697420535520",
		"20300299991984",
		"8842018005",
		"8842018003",
		"8842018004",
		"8851111401802",
		"8851111401819",
		"8851111401727",
		"8851111401734",
		"873453002552",
		"873453002576",
		"873453003467",
		"4893757100118",
		"8847106398837",
		"8847106398820",
		"3057640257773",
		"8809192579552",
		"8809469775694",
		"8857101430869",
		"8850069011019",
		"8850114407514",
		"8850620888234",
		"8850250006015",
		"8850250000365",
		"8850250000358",
		"8847104150024",
		"8847104150031",
		"8847104150017",
		"4710421090059",
		"8859052655209",
		"8859052655704",
		"8809505543973",
		"8809505543959",
		"8809505543195",
		"8850250002628",
		"8850069020073",
		"8850620885004",
		"8850058003728",
		"54061057",
		"8852117001324",
		"8801353000967",
		"8858870307918",
		"8851932391818",
		"8850250008200",
		"8850987123825",
		"8850035010008",
		"120123",
		"8850228000151",
		"8859559601099",
		"9556001670700",
		"8852117000464",
		"8852117000266",
		"6956588500460",
		"8852117000754",
		"8850006605318",
		"8850006605257",
		"8904018300591",
		"8904018303660",
		"6410254216586",
		"8858842077962",
		"4800135001165",
		"4800135001431",
		"9556001131751",
		"8850002907638",
		"8904091113606",
		"41401199021984",
		"8847105056196",
		"8847105056189",
		"8847105054260",
		"8850487037172",
		"4710962452460",
		"4710962451692",
		"9556447021609",
		"4902508261500",
		"8847100570444",
		"88000111",
		"21100499281984",
		"8845555558888",
		"4710962320011",
		"82000003861",
		"8690605056612",
		"4710962431502",
		"4710962442577",
		"4710962441938",
		"4902508136815",
		"8690605031107",
		"6983549542610",
		"21100499461984",
		"4710962113187",
		"8690605055462",
		"95502489",
		"4710962128051",
		"4710962441426",
		"4710962452415",
		"8801619047569",
		"8850124092823",
		"3607340718380",
		"4901515368530",
		"20300299981984",
		"9856294055056",
		"8848017112000",
		"4005900513243",
		"4513574025332",
		"4513574024298",
		"8849301721687",
		"8809192579521",
		"8993176120059",
		"8886451002471",
		"6938942500095",
		"5703538272257");

	foreach($barcodes as $barcode){
		$sql = "SELECT SKU FROM ITEM WHERE BARCODE = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($barcode));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$SKU = $res["SKU"];
		echo $barcode."\n";
		foodpandaUpdate($SKU,false);
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
	initializePrice(true);
else if ($argc > 1 && $argv[1] == "DESACTIVATE")
	desactivate();
else if($argc > 1 && $argv[1] == "REFRESH")
	go();	
else
	error_log("WARNING !!! foodpanda go attempt");


?>
