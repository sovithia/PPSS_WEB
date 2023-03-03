<?php 

require_once("functions.php");



function GenerateDailyGroupedPurchases2()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT DISTINCT(ICPRODUCT.VENDID)
			FROM ICLOCATION,ICPRODUCT 
			WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
			AND ACTIVE = 1			
			AND ONHAND < ICLOCATION.ORDERPOINT 
			AND ICLOCATION.ORDERPOINT > 0					
			AND PPSS_IS_BLACKLIST IS NULL		
			AND PPSS_HAVE_EXTERNAL IS NULL
			AND PPSS_IS_ORDERED IS NULL";
	$req = $dbBlue->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($vendors as $vendor)
	{
		echo "VENDOR: ".$vendor["VENDID"]."\n";

		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND ARG1 = ? AND REQUESTEE IS null"; 
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$sql = "SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);		
			if ($res != false)
				$vendorname = $res["VENDNAME"];
			else 
				$vendorname = "";
			$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
				$orderday = $res["orderday"];
			else 
				$orderday = false;
			$db->beginTransaction();
			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2,ARG3) VALUES ('GROUPEDPURCHASE','AUTO',?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"],$vendorname,$orderday));
			$theID = $db->lastInsertId();
			$db->commit();
		}
		else		
			$theID = $res["ID"];	
		
		$sql = "SELECT ICPRODUCT.PRODUCTID 
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1		
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.LOCID = 'WH1'
		AND ICLOCATION.ORDERPOINT > 0					
		AND PPSS_IS_BLACKLIST IS NULL		
		AND PPSS_HAVE_EXTERNAL IS NULL
		AND PPSS_IS_ORDERED IS NULL
		AND ICPRODUCT.VENDID = ? 
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRICE";		
		$req = $dbBlue->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		echo "Nb items: ".count($items)."\n"; 
		foreach($items as $item){
		
			$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$theID));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false)			
				$new = true;
			else
				$new = false;

			$sql = "SELECT TOP(1) TRANCOST,TRANDISC,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";			
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);


			$sql = "SELECT PPSS_NEW_COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res2 = $req->fetch(PDO::FETCH_ASSOC);
			if ($res2 == false || $res2["PPSS_NEW_COST"] == null)
			{
				if ($res == false)
					$TRANCOST = 0;
				else
					$TRANCOST = $res["TRANCOST"];
			}				
			else{
				if ($res2["TRANCOST"] != "0" || $res2["TRANCOST"] != 0)
					$TRANCOST = $res2["PPSS_NEW_COST"];
				else 
					$TRANCOST = $res["TRANCOST"];
			}
				
			
			if ($new == true){
				
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,COST,DISCOUNT,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$res["TRANQTY"], $TRANCOST,$res["TRANDISC"] ,'AUTOMATIC',$theID));
				echo "Inserting non-existent: ".$item["PRODUCTID"]."\n";
			}
			else
			{
				$sql = "UPDATE ITEMREQUEST SET REQUESTTYPE = 'BOTH'	WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$theID));
				echo "Updating existent: ".$item["PRODUCTID"]."\n";
			}

			$sql = "UPDATE ICPRODUCT SET PPSS_IS_ORDERED = 'Y' WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));	
			//sleep(1);	
		}
		//break;		
	}
}

function GenerateDailyGroupedPurchases()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT DISTINCT(ICPRODUCT.VENDID)
			FROM ICLOCATION,ICPRODUCT 
			WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
			AND ACTIVE = 1			
			AND ONHAND < ICLOCATION.ORDERPOINT 
			AND ICLOCATION.ORDERPOINT > 0					
			AND PPSS_IS_BLACKLIST IS NULL		
			AND PPSS_HAVE_EXTERNAL IS NULL
			AND PPSS_IS_ORDERED IS NULL";
	$req = $dbBlue->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($vendors as $vendor)
	{
		echo "VENDOR: ".$vendor["VENDID"]."\n";

		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND ARG1 = ? AND REQUESTEE IS null"; 
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$sql = "SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);		
			if ($res != false)
				$vendorname = $res["VENDNAME"];
			else 
				$vendorname = "";
			$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
				$orderday = $res["orderday"];
			else 
				$orderday = false;
			$db->beginTransaction();
			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2,ARG3) VALUES ('GROUPEDPURCHASE','AUTO',?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"],$vendorname,$orderday));
			$theID = $db->lastInsertId();
			$db->commit();
		}
		else		
			$theID = $res["ID"];	
		
		$sql = "SELECT ICPRODUCT.PRODUCTID 
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1		
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.LOCID = 'WH1'
		AND ICLOCATION.ORDERPOINT > 0					
		AND PPSS_IS_BLACKLIST IS NULL		
		AND PPSS_HAVE_EXTERNAL IS NULL
		AND PPSS_IS_ORDERED IS NULL
		AND ICPRODUCT.VENDID = ? 
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRICE";		
		$req = $dbBlue->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		echo "Nb items: ".count($items)."\n"; 
		foreach($items as $item){
		
			$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$theID));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false)			
				$new = true;
			else
				$new = false;

			$sql = "SELECT TOP(1) TRANCOST,TRANDISC,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";			
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);


			$sql = "SELECT PPSS_NEW_COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res2 = $req->fetch(PDO::FETCH_ASSOC);
			if ($res2 == false || $res2["PPSS_NEW_COST"] == null)
			{
				if ($res == false)
					$TRANCOST = 0;
				else
					$TRANCOST = $res["TRANCOST"];
			}				
			else{
				if ($res2["TRANCOST"] != "0" || $res2["TRANCOST"] != 0)
					$TRANCOST = $res2["PPSS_NEW_COST"];
				else 
					$TRANCOST = $res["TRANCOST"];
			}				
			$stats = orderStatistics($item["PRODUCTID"]);
			$LASTRECEIVEDATE = 	$stats["LASTRCVDATE"];
			$LASTRECEIVEQUANTITY = $stats["LASTRECEIVEQUANTITY"];				
			$TOTALWASTEQUANTITY = $stats["WASTE"];
			$TOTALPROMOQUANTITY = $stats["PROMO"];
			$TOTALORDERTIME = $stats["TOTALORDERTIME"];		
			$TOTALRECEIVE = $stats["TOTALRECEIVE"];	
			$SALESINCELASTRECEIVE = $stats["SALESINCELASTRECEIVE"];
			$SALESPEED75 = $stats["SALESPEED"];
			$LASTSALEDAY = $stats["LASTSALEDAY"];
			$TOTALSALE = $stats["TOTALSALE"];
			$MOMENTONHAND = $stats["ONHAND"];	
			$DECISION = $stats["DECISION"];
			$CALCULATEDQUANTITY = $stats["FINALQTY"];
			
			if ($new == true){
				
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,COST,DISCOUNT,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$res["TRANQTY"], $TRANCOST,$res["TRANDISC"] ,'AUTOMATIC',$theID));
				echo "Inserting non-existent: ".$item["PRODUCTID"]."\n";
				$ITEMREQUESTID = $db->lastInsertId();		

				echo "INSERTING ITEMREQUESTSTATS\n...";
				$sql = "INSERT INTO ITEMREQUESTSTATS (lastreceivedate,lastreceivequantity,totalwastequantity,totalpromotionquantity,totalordertime,
						totalreceive, salesincelastreceive, salespeed75,lastsaleday,totalsale,
						momentonhand,calculatedquantity,decision,itemrequest_id)		 
						VALUES (?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?)";
				$req = $db->prepare($sql);								
				$req->execute(array($LASTRECEIVEDATE,$LASTRECEIVEQUANTITY,$TOTALWASTEQUANTITY,$TOTALPROMOQUANTITY,$TOTALORDERTIME,
				$TOTALRECEIVE,$SALESINCELASTRECEIVE,$SALESPEED75,$LASTSALEDAY,$TOTALSALE,$MOMENTONHAND,$CALCULATEDQUANTITY,$DECISION, $ITEMREQUESTID));
			}
			else
			{
				
				$sql = "UPDATE ITEMREQUEST SET REQUESTTYPE = 'BOTH'	WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$theID));
				echo "Updating existent: ".$item["PRODUCTID"]."\n";
				echo "Updating itemrequeststats \n";
				$ITEMREQUESTID = $theID;
				echo "Updating ".$ITEMREQUESTID." with CALCULATED:".$CALCULATEDQUANTITY."\n";
				$sql = "UPDATE ITEMREQUESTSTATS 
						SET lastreceivedate = ?,
							lastreceivequantity = ?,
							totalwastequantity = ?,
							totalpromotionquantity = ?,
							totalordertime = ?,
							totalreceive = ?,
							salesincelastreceive = ?,
							salespeed75 = ?,
							lastsaleday = ?,
							totalsale = ?,
							momentonhand = ?,
							decision = ?,
							calculatedquantity = ?
							WHERE itemrequest_id = ?";
				$req = $db->prepare($sql);
				$req->execute(array(
					$LASTRECEIVEDATE,
					$LASTRECEIVEQUANTITY,
					$TOTALWASTEQUANTITY,					
					$TOTALPROMOQUANTITY,
					$TOTALORDERTIME, 
					$TOTALRECEIVE,
					$SALESINCELASTRECEIVE, 
					$SALESPEED75,
					$LASTSALEDAY, 
					$TOTALSALE, 
					$MOMENTONHAND,
					$DECISION,
					$CALCULATEDQUANTITY,
					$ITEMREQUESTID
				));


			}


			$sql = "UPDATE ICPRODUCT SET PPSS_IS_ORDERED = 'Y' WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));	
			//sleep(1);	
		}
		//break;		
	}
}
if ($argc > 1 && $argv[1] == "CROCODILE")
	GenerateDailyGroupedPurchases();
else
	error_log("WARNING !!! generateScheduledPurchases attempt");

?>