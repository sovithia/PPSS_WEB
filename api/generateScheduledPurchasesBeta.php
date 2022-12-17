<?php 

require_once("functions.php");



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
		/*
		$sql = "SELECT ICPRODUCT.PRODUCTID,ONHAND 
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
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,ONHAND,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRICE";		
		*/
		$sql = "SELECT ICPRODUCT.PRODUCTID,ONHAND,PRODUCTNAME 
		FROM ICPRODUCT
		WHERE ACTIVE = 1					
		AND PPSS_IS_BLACKLIST IS NULL		
		AND PPSS_HAVE_EXTERNAL IS NULL
		AND PPSS_IS_ORDERED IS NULL
		AND VENDID = ?";		
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
			if ($res == false){
				$TRANDISC = 0;
			}else{
				$TRANDISC = $res["TRANDISC"];
			}

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
				$stats = orderStatistics($item["PRODUCTID"]);	
				if($stats["DECISION"] == "TOOEARLY")
					continue;				
				echo $item["PRODUCTID"]."-".$item["PRODUCTNAME"].":".$stats["DECISION"]." ORDERPOINT:".$stats["ORDERPOINT"]. " QTY:".$stats["FINALQTY"]." ONHAND: ".$item["ONHAND"]."\n";
								
				$sql = "INSERT INTO ITEMREQUEST (
				PRODUCTID,REQUEST_QUANTITY,COST,DISCOUNT,LASTRECEIVEDATE,
				LASTRECEIVEQUANTITY,MOMENTONHAND,TOTALWASTEQUANTITY,TOTALPROMOTIONQUANTITY,SALESINCELASTRECEIVE,
				SALE70PERCENTDAYS,LASTSALEDAY,TOTALORDERTIME,TOTALRECEIVE,TOTALSALE,
				CALCULATED_QUANTITY,DECISION,REQUESTTYPE,ITEMREQUESTACTION_ID) 
				VALUES (?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array(
				$item["PRODUCTID"],$stats["FINALQTY"], $TRANCOST,$TRANDISC,$stats["LASTRCVDATE"],
				$stats["LASTRECEIVEQUANTITY"],$stats["ONHAND"],$stats["WASTE"],$stats["PROMO"],$stats["SALESINCELASTRECEIVE"],
				$stats["SALESPEED"],$stats["LASTSALEDAY"],$stats["TOTALORDERTIME"],$stats["TOTALRECEIVE"],$stats["TOTALSALE"],
				$stats["FINALQTY"],$stats["DECISION"],'ALGO',$theID));
				
				
			}
			else
			{
				echo "Already exists: ".$item["PRODUCTID"]."\n";
				//echo "Existing item ".$item["PRODUCTID"]."\n";
				/*
				$stats = orderStatistics($item["PRODUCTID"]);
				if($stats["DECISION"] == "TOOEARLY")
					continue;										
				$sql = "UPDATE ITEMREQUEST SET REQUESTTYPE = 'ALGO',
				REQUEST_QUANTITY = ?,LASTRECEIVEDATE = ?,LASTRECEIVEQUANTITY = ?,MOMENTONHAND = ?,TOTALWASTEQUANTITY = ?,
				TOTALPROMOTIONQUANTITY = ?,SALESINCELASTRECEIVE = ?,SALE70PERCENTDAYS = ?,LASTSALEDAY = ?,TOTALORDERTIME = ?,
				TOTALRECEIVE = ?,TOTALSALE = ?, CALCULATED_QUANTITY = ? ,DECISION = ? 				
				WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array(
				$stats["FINALQTY"], $stats["LASTRCVDATE"],$stats["LASTRECEIVEQUANTITY"],$stats["ONHAND"],$stats["WASTE"],
				$stats["PROMO"],$stats["SALESINCELASTRECEIVE"],$stats["SALESPEED"],$stats["LASTSALEDAY"],$stats["TOTALORDERTIME"],
				$stats["TOTALRECEIVE"],$stats["TOTALSALE"],$stats["FINALQTY"],$stats["DECISION"],					
				$item["PRODUCTID"],$theID));
				echo "Updating existent: ".$item["PRODUCTID"]."\n";
				*/
			}

			$sql = "UPDATE ICPRODUCT SET PPSS_IS_ORDERED = 'Y' WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));	
			sleep(1);	
		}
		//break;		
	}
}


if ($argc > 1 && $argv[1] == "CROCODILE")
	GenerateDailyGroupedPurchases();
else
	error_log("WARNING !!! generateScheduledPurchases attempt");

?>