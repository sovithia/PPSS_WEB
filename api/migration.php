<?php


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

function getDatabase($name = "MAIN")
{ 	
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	return $conn;
}

function patchSupplyRecord()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ID > 42663";
	$req = $db->prepare($sql);
	$req->execute(array());
	$records = $req->fetchAll(PDO::FETCH_ASSOC);

	$count = 0;
	foreach($records as $record)
	{
		echo $record["ID"]."|".$count."\n";
		$count++;				
		$sql = "UPDATE PODETAIL SET PPSS_WAITING_CALCULATED = ORDER_QTY, 
									PPSS_WAITING_DISCOUNT = TRANDISC,
									PPSS_WAITING_PRICE = TRANCOST,
									PPSS_WAITING_VAT = VAT_PERCENT,
									PPSS_WAITING_QUANTITY = ORDER_QTY
									WHERE PONUMBER = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array( $record["PONUMBER"]));

		$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_QUANTITY = PPSS_WAITING_QUANTITY, 
									 PPSS_DELIVERED_PRICE = PPSS_WAITING_PRICE,
									 PPSS_DELIVERED_DISCOUNT = PPSS_WAITING_DISCOUNT,
									 PPSS_DELIVERED_VAT =  PPSS_WAITING_VAT,
									 PPSS_DELIVERED_EXPIRE = PPSS_EXPIREDATE
									 WHERE PONUMBER = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($record["PONUMBER"]));				
	}

}

function markAnomalies()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ANOMALY_STATUS is null";
	$req = $db->prepare($sql);
	$req->execute(array());
	$records = $req->fetchAll(PDO::FETCH_ASSOC);
	$count = 0;
	foreach($records as $record)
	{
		$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($record["PONUMBER"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
				
		$status = "NOANOMALY";		
		foreach($items as $item)
		{
			if ( floatval($item["PPSS_DELIVERED_PRICE"]) != floatval($item["PPSS_WAITING_PRICE"]))
			{
				$status = "ANOMALYUNSOLVED";		
				echo "!!!!";		
				break;
			} 						
			if ( floatval($item["PPSS_DELIVERED_QUANTITY"]) != floatval($item["PPSS_WAITING_QUANTITY"]))
			{
				$status = "ANOMALYUNSOLVED";				
				echo "!!!!";
				break;
			} 						
			if ( floatval($item["PPSS_WAITING_CALCULATED"]) != floatval($item["PPSS_WAITING_QUANTITY"]))
			{
				$status = "ANOMALYUNSOLVED";				
				echo "!!!!";
				break;
			} 						

		}		
		echo $record["ID"]."|".$status."|".$count."\n";
		$count++;				

		$sql = "UPDATE SUPPLY_RECORD SET ANOMALY_STATUS = ? WHERE PONUMBER = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$record["PONUMBER"]));		
		
	}
}



//markAnomalies();
patchSupplyRecord();
?>