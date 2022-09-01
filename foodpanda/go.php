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
        $db = new PDO('sqlite:'.dirname(__FILE__).'/.foodpanda.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function Go()
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

        if ($onHand <= $res["THRESHOLD"])
            $data["active"] = false;
		else 
            $data["true"] = false;
        $headers = ["Authorization"] = "Bearer eyJJRCI6IiIsIk5hbWUiOiIiLCJHbG9iYWxFbnRpdHlJRCI6IkZQX0tIIiwiQ2hhaW5HbG9iYWxJRCI6IjRjZjg1YTdjLTI1OTEtNDE0Yi1hY2Q3LWQ0Mjg3ZWUxYWMzZiIsIlRva2VuIjoiTktGREI3eExnWlFwZVJRUSIsIkdlbmVyYXRlZEF0IjoiMDAwMS0wMS0wMVQwMDowMDowMFoifQo=";        
		$result = RestEngine::PUT("https://partners-ap.deliveryhero.io/api/assortment/v1/vendors/vfbb/product",$data,$headers);			
	}
	$sql = "DELETE FROM RS_MENU_QUEUE";
	$req = $blueDB->prepare($sql);
	$req->execute(array());
}

function initialize()
{
    $db = getInternalDatabase();
    $sql = "SELECT * FROM ITEM";
    $req = $db->prepare($sql);
    $items = $req->fetchAll(PDO::FETCH_ASSOC);


    foreach($items as $item){

        $sql = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->prepare($sql);
        $itemdetail = $req->fetch(PDO::FETCH_ASSOC);

        if ($itemdetail["ONHAND"] <= $item["THRESHOLD"])
            $data["active"] = false;
		else 
            $data["true"] = false;
        $headers = ["Authorization"] = "Bearer eyJJRCI6IiIsIk5hbWUiOiIiLCJHbG9iYWxFbnRpdHlJRCI6IkZQX0tIIiwiQ2hhaW5HbG9iYWxJRCI6IjRjZjg1YTdjLTI1OTEtNDE0Yi1hY2Q3LWQ0Mjg3ZWUxYWMzZiIsIlRva2VuIjoiTktGREI3eExnWlFwZVJRUSIsIkdlbmVyYXRlZEF0IjoiMDAwMS0wMS0wMVQwMDowMDowMFoifQo=";        
		$result = RestEngine::PUT("https://partners-ap.deliveryhero.io/api/assortment/v1/vendors/vfbb/product",$data,$headers);			
    }
}

Go();
?>
