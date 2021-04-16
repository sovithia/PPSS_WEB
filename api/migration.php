<?php


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
		die( print_r( $e->getMessage( )) );   
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
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function goRR()
{
	$indb = getInternalDatabase();

	$sql = "SELECT * FROM RECEPTION_RECORD";

	$req=$conn->prepare($sql);	
	$req->execute(array()); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	foreach($items as $rr){
		
		$iSQL = "INSERT INTO SUPPLY_RECORD (PONUMBER,STATUS,TYPE,VENDID,VENDNAME,
		VALIDATOR_USER,PURCHASER_USER,WAREHOUSE_USER,RECEIVER_USER,ACCOUNTANT_USER,
		PODATE,LINKEDPO,NOPONOTE,CANCELER,LAST_UPDATED) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req1=$conn->prepare($iSQL);	
		$req1->execute(array($rr["PONUMBER"],$rr["STATUS"],$rr["TYPE"],$rr["VENDID"],$rr["VENDNAME"],
							$rr["XWAREHOUSE_USER"],$rr["PURCHASER_USER"],$rr["WAREHOUSE_USER"],$rr["RECEIVER_USER"],$rr["ACCOUNTANT_USER"],
							$rr["PODATE"],$rr["LINKEDPO"],$rr["NOPONOTE"],$rr["CANCELER"],$rr["LAST_UPDATED"])); 

		$lastID = $indb->lastInsertId();
		$xwhsig = $rr["XWAREHOUSESIGNATUREIMAGE"];
		$pchsig = $rr["PURCHASERSIGNATUREIMAGE"];
		$whsig = $rr["WAREHOUSESIGNATUREIMAGE"];
		$rcvsig = $rr["RECEIVERSIGNATUREIMAGE"];
		$accsig = $rr["ACCOUNTANTSIGNATUREIMAGE"];
		file_put_contents("./img/supplyrecords_signatures/VAL_".$lastID.".png", $xwhsig)
		file_put_contents("./img/supplyrecords_signatures/PCH_".$lastID.".png", $pchsig)
		file_put_contents("./img/supplyrecords_signatures/WH_".$lastID.".png", $whsig)
		file_put_contents("./img/supplyrecords_signatures/RCV_".$lastID.".png", $rcvsig)
		file_put_contents("./img/supplyrecords_signatures/ACC_".$lastID.".png", $accsig)

		$invoices = json_decode($rr["INVOICEJSONDATA"],true);
		$count = 1;
		foreach($invoices as $invoice){
			file_put_contents("./img/supplyrecords_invoices/INV_".$lastID."_".$count.".png", base64_decode($invoice));
		}
		break;
	}
}	


function goIRR()
{
	$indb = getInternalDatabase();
	$db = getDatabase();

	$sql = "SELECT * FROM ITEMRECEPTIONNED";
	$req=$conn->prepare($sql);
	$req->execute(array($)); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);

	foreach($items as $item){
		$uSQL = "UPDATE PODETAIL SET PPSS_ORDER_QTY = ?,
									 PPSS_VALIDATION_QTY = ?,
									 PPSS_RECEPTION_QTY = ?
									 WHERE PRODUCTID = ? 
									 AND PONUMBER = ?";
		$req1=$conn->prepare($uSQL);
		$req1->execute($item["ORDER_QTY"],$item["VALIDATION_QTY"],$item["RECEPTION_QTY"],$item["PRODUCTID"],$item["PONUMBER"]);
		break;
	}
}

goRR();

?>