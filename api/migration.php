<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');

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

function deleteFiles($folder)
{
	$files = glob($folder.'/*'); 
	foreach($files as $file)
	{ 
  		if(is_file($file))   
    		unlink($file); 
  	}
}

function resetAll()
{
	deleteFiles("img/supplyrecords_invoices");
	deleteFiles("img/supplyrecords_signatures");
	$indb = getInternalDatabase();
	$sql = "DELETE FROM SUPPLY_RECORD";
	$req=$indb->prepare($sql);
	$req->execute(array()); 	
}

function goRR()
{
	$indb = getInternalDatabase();
	$sql = "SELECT * FROM RECEPTION_RECORD";
	$req=$indb->prepare($sql);	
	$req->execute(array()); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	foreach($items as $rr){
		
		$iSQL = "INSERT INTO SUPPLY_RECORD (PONUMBER,STATUS,TYPE,VENDID,VENDNAME,
		VALIDATOR_USER,PURCHASER_USER,WAREHOUSE_USER,RECEIVER_USER,ACCOUNTANT_USER,
		PODATE,LINKEDPO,NOPONOTE,CANCELER,LAST_UPDATED) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req1=$indb->prepare($iSQL);	
		$req1->execute(array($rr["PONUMBER"],$rr["STATUS"],$rr["TYPE"],$rr["VENDID"],$rr["VENDNAME"],
							$rr["XWAREHOUSE_USER"],$rr["PURCHASER_USER"],$rr["WAREHOUSE_USER"],$rr["RECEIVER_USER"],$rr["ACCOUNTANT_USER"],
							$rr["PODATE"],$rr["LINKEDPO"],$rr["NOPONOTE"],$rr["CANCELER"],$rr["LAST_UPDATED"])); 

		$lastID = $indb->lastInsertId();

		echo "INSERTED SUPPLY_RECORD WITH ID".$lastID."\n";	
		$xwhsig = $rr["XWAREHOUSESIGNATUREIMAGE"];
		$pchsig = $rr["PURCHASERSIGNATUREIMAGE"];
		$whsig = $rr["WAREHOUSESIGNATUREIMAGE"];
		$rcvsig = $rr["RECEIVERSIGNATUREIMAGE"];
		$accsig = $rr["ACCOUNTANTSIGNATUREIMAGE"];

		if ($xwhsig != null)
			file_put_contents("./img/supplyrecords_signatures/VAL_".$lastID.".png", $xwhsig);
		if ($pchsig != null)
			file_put_contents("./img/supplyrecords_signatures/PCH_".$lastID.".png", $pchsig);
		if ($whsig != null)
			file_put_contents("./img/supplyrecords_signatures/WH_".$lastID.".png", $whsig);
		if ($rcvsig != null)
			file_put_contents("./img/supplyrecords_signatures/RCV_".$lastID.".png", $rcvsig);
		if ($accsig)
			file_put_contents("./img/supplyrecords_signatures/ACC_".$lastID.".png", $accsig);

		$invoices = json_decode($rr["INVOICEJSONDATA"],true);
		if (count($invoices) > 0)
		{
			$count = 1;		
			foreach($invoices as $invoice){
				file_put_contents("./img/supplyrecords_invoices/INV_".$lastID."_".$count.".png", base64_decode($invoice));
			}
		}
		sleep(1);
		//break;
	}
}	



function goIRR()
{
	$indb = getInternalDatabase();
	$db = getDatabase();

	$sql = "SELECT * FROM ITEMRECEPTIONNED";
	$req=$indb->prepare($sql);
	$req->execute(array()); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	$count = 1;

	foreach($items as $item){
		$uSQL = "UPDATE PODETAIL SET PPSS_VALIDATION_QTY = ?,
									 PPSS_RECEPTION_QTY = ?
									 WHERE PRODUCTID = ? 
									 AND PONUMBER = ?";
		$req1=$db->prepare($uSQL);
		$req1->execute(array($item["VALIDATION_QTY"],$item["RECEPTION_QTY"],$item["PRODUCTID"],$item["PONUMBER"]));
		echo "UPDATING PODETAIL WITH ID ".$item["PONUMBER"]." ".$count."\n";	

		$count++;		
	}
}
//resetAll();
//goRR();
goIRR();

?>