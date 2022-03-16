<?php 


function getTMPDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=192.168.72.249\\SQL2008r2,49896;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getNewDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getOldDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=SuperStore2_Data;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getTaxDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=T_PP_SS_DATA;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function checkData($data){
	$diff = $data["amount"] - $data["bigtotal"];
	if ($diff > 5)
		echo $data["date"].":".$diff."\n";	
}

function renderData($data){
	echo "<h1>".$data["date"]."|".($data["exceed"] == true ? "SUPERIOR" : "INFERIOR")."<h1><br>";
	echo "<h3>".$data["amount"]."|".$data["bigtotal"]." -->".($data["amount"] - $data["bigtotal"])." </h3><br>";

	echo "<table border='1'><tr>";	
	foreach($data as $key => $value){
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;
		echo "<th>".$key."</th>";
	}

	// RECEIPT DETAILS
	echo "<tr>";
	foreach($data as $key => $value)
	{
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;

		echo "<td>";	
		foreach($data[$key]["selectedAmt"] as $AMT){
			echo $AMT."<br>";			
		}
		echo "</td>";

	}
	echo "</tr>";

	// TOTAL
	echo "<tr>";
	foreach($data as $key => $value)
	{
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;
		$total = array_sum($data[$key]["selectedAmt"]);
		$percent = ($total * 100) / $data["amount"];
		echo "<td>TOTAL: ".$total."<br>
				  TOTAL EXPECTED : ".$data[$key]["expected"]."<br> 	
				  PERCENT : ".substr($percent,0,5)."%<br> 	
				  PERCENT EXPECTED : ".($data[$key]["percent"] * 100)."%<br> 	
			</td>";		

	}
	echo "</tr>";
	echo "</table>";
}


function resetDate($date)
{
	$taxDB = getTaxDatabase();
	$begin = "'".$date." 00:00:00.000'";
	$end = "'".$date." 23:59:59.999'";			
	
	echo "Begin:".$begin."\n";
	echo "End:".$end."\n";

	$SQL = "DELETE FROM POSHEADER WHERE POSDATE BETWEEN ".$begin. " AND ".$end;	
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM POSDETAIL WHERE POSDATE BETWEEN ".$begin. " AND ".$end;	
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM POSCASH WHERE PAIDDATE BETWEEN ".$begin. " AND ".$end;	
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM ICTRANHEADER WHERE TRANTYPE = 'I' AND TRANDATE BETWEEN ".$begin. " AND ".$end;
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND TRANDATE BETWEEN ".$begin. " AND ".$end;
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM POSCASHINOUT WHERE CASHINDATE BETWEEN ".$begin. " AND ".$end;
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$SQL = "DELETE FROM POSCASHOUTCURRENCY WHERE DATEADD BETWEEN ".$begin. " AND ".$end;;
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

}


function AdjustCashPercent($data ,$amount,$percents){
	
	//echo "<h1>".$data["date"]."|".($data["exceed"] == true ? "SUPERIOR" : "INFERIOR")."<h1><br>";
	//echo "<h3>".$data["amount"]."|".$data["bigtotal"]." -->".($data["amount"] - $data["bigtotal"])." </h3><br>";
	$newPercent = array();
	foreach($percents as $percent){
		array_push($newPercent,$percent);
	}

	$okneeded = count($percents);
	$numberok = 0;
	$count = 0;				
	foreach($data as $key => $value){
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;		 
		$total = array_sum($data[$key]["selectedAmt"]);
		
		$percent = ($total * 100) / $amount;		
		$percentExpected = ($data[$key]["percent"] * 100);

		$diffpercent = $percentExpected - $percent;
		echo "PERCENT EXPECTED:".$percentExpected."\n";
		echo "PERCENT :".$percent."\n";
		echo "DIFF PERCENT ".$diffpercent."\n\n";
		if ($diffpercent > 0.2){ // 
			$newPercent[$count] -= 0.01;		
			break;		
		}else{
			$numberok++;	
		}
		$count++;
	}

	if ($numberok == $okneeded)
		return $newPercent;

	$highestRes = 0;
	$highestIndex = 0;
	$count = 0;
	foreach($data as $key => $value){
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;

		$total = array_sum($data[$key]["selectedAmt"]);
		$expected = $data[$key]["expected"];
		$percent = ($total * 100) / $amount;		
		$percentExpected = ($data[$key]["percent"] * 100);
		
		$diffpercent = $percentExpected - $percent;

		if ($diffpercent < 0.2 && (($expected - $total) > $highestRes) ){ // IF IS OK
			$highestRes = $expected - $total;
			$highestIndex = $count;
		}		
		$count++;
	}
	$newPercent[$highestIndex] += 0.01;
	return $newPercent;
}

function AdjustVisaPercent($results ,$percents){
	$newPercent = array();

	$okneeded = count($percents);
	$numberok = 0;
	$count = 0;		

	foreach($percents as $percent){
		array_push($newPercent,$percent);
	}
	foreach($results as $result){
		if($result["RESULT"] == "OK")
			$numberok++;			
		if($result["RESULT"] == "KO"){
			$newPercent[$count] -= 0.01;
			break;		
		}
		$count++;
	}
	if ($numberok == $okneeded)
		return $newPercent;

	$highestRes = 0;
	$highestIndex = 0;
	$count = 0;
	foreach($results as $result)
	{
		if (($result["RESULT"] == "OK") && ($result["MAX"] - $result["RES"]) > $highestRes){
			$highestRes = $result["MAX"] - $result["RES"];
			$highestIndex = $count;	
		}
		$count++;
	}
	$newPercent[$highestIndex] += 0.01;
	return $newPercent;
}

function renderResult($results){
	echo "=============================\n";
	foreach($results as $result){
		echo $result["CASHIER"].":".$result["PERCENT"]."\n";
		echo "RES:".$result["RES"]."\n";
		echo "MAX:".$result["MAX"]."\n";
		echo "RESULT:".$result["RESULT"]."\n\n";		
	}
}



function generateVisa($data,$visaAmt)
{				

	if (strtotime($data["date"]) < 1572541200){			
		
		$db = getOldDatabase();
	}
	else {					
		$db = getNewDatabase();		
	}

	$percentages["1"] = [1.0];  
	$percentages["2"] = [0.5,0.5]; 
	$percentages["3"] = [0.33,0.33,0.34]; 
	$percentages["4"] = [0.25,0.25,0.25,0.25];
	$percentages["5"] = [0.2,0.2,0.2,0.2,0.2];	
	$percentages["6"] = [0.16,0.16,0.16,0.16,0.16,0.2];


	// skip bigtotal and date
	$cashierCount = count($data) - 2;
	// ONE DAY X Cashiers
	$pauser = 0;

	echo "Total Visa EXP :".$visaAmt."\n";
	$percents = null;
	$results = null;

	while(1) // Try percents of VISA
	{
		//sleep(1);
		if ($percents == null){
			$percents = $percentages[strval($cashierCount)];
			$attempts = 0;
			//echo "PERCENTS NEW ";
			//var_dump($percents);
		}			
		else if ($attempts > 2){
			$percents = AdjustVisaPercent($results,$percents);
			//echo "PERCENTS AUTO ";
			//var_dump($percents);
			$attempts = 0;
		}	

		$errors = 0;
		$i = 0;		
		$results = array();
		foreach($data as $key => $value)
		{
			if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
				continue;

			$result["PERCENT"] = $percents[$i];			
			$data[$key]["visaAmt"] = $percents[$i] * $visaAmt;	
			$count = 0;

			$result["CASHIER"] = $key;
			$result["RES"] = $data[$key]["visaAmt"];
			$result["MAX"] = array_sum($data[$key]["selectedAmt"]);
			
			if($data[$key]["visaAmt"] > array_sum($data[$key]["selectedAmt"]))	{				
				$result["RESULT"] = "KO";	
				$errors++;
			}
			else 
				$result["RESULT"] = "OK";								
			$i++;
			array_push($results,$result);	
		}
		echo "\nThe Date: " .$data["date"]."\n";
		renderResult($results);
		$pauser++;
		$attempts++;
		if ($pauser > 10)
		{
			$pauser = 0;
			srand(time());
			sleep(1);
		}
		if ($errors == 0)
			break;
	}
	$extract = null;	
	foreach($data as $key => $value)
	{		
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;
			
		if ($extract == null){
			$begin = "'".$data["date"]." 00:00:00.000'";
			$end = "'".$data["date"]." 23:59:59.999'";			
			$SQLCashinOutExtract = "SELECT * FROM POSCASHINOUT WHERE USERADD = ? 
			AND DATEADD BETWEEN ".$begin." AND ".$end;	
			
			$req = $db->prepare($SQLCashinOutExtract);		
			$req->execute(array($key));		
			$extract = $req->fetch();			
		}	
		

		$Amount = array_sum($data[$key]["selectedAmt"]) - $data[$key]["visaAmt"];
		$data[$key]["splittedNote"] = splitMoney($Amount,$extract["EXCHRATE"]);
	}	
	return $data;
}

// Separer le split Money 
function insertData($data, $from = null){	

	if (strtotime($data["date"]) < 1572541200){			
		$db = getOldDatabase();
	}
	else {				
		$db = getNewDatabase();
	}

	$taxDB = getTaxDatabase();


	// KEY = CASHIERNAME
	$max = false;
	foreach($data as $key => $value)
	{
		if ($key == "date" || $key == "amount" || $key == "bigtotal" || $key == "exceed")
			continue;		

		$begin = "'".$data["date"]." 00:00:00.000'";
		$end = "'".$data["date"]." 23:59:59.999'";			
		$SQLCashinOutExtract = "SELECT * FROM POSCASHINOUT WHERE USERADD = ? 
			AND DATEADD BETWEEN ".$begin." AND ".$end;
		$req = $db->prepare($SQLCashinOutExtract);
		$req->execute( array($key,$begin,$end) );		
		$extract = $req->fetch();
		
		
		$cashinNO = genCashINID($from,$max);	

		

		$difference =  $data[$key]["visaAmt"];

				 
		$cashInDate = date("Y-m-d H:i:s", (strtotime($data[$key]["openDatetime"]) - (random_int(5,30) * 60)));
		$cashOutDate =  date("Y-m-d H:i:s", (strtotime($data[$key]["closeDatetime"]) + (random_int(5,30) * 60)));
		$cashOutDateMinus = date("Y-m-d H:i:s", ( strtotime($cashOutDate) - random_int(5,60)));

		
		$totalSaleAmount = array_sum($data[$key]["selectedAmt"]);
		$saleamountMinusVisa =  array_sum($data[$key]["selectedAmt"]) - $data[$key]["visaAmt"];		
		$invoiceCount = count($data[$key]["selectedAmt"]);
		echo "Cashier: ".$key."\n";


		$SQLCashinOut = "INSERT INTO POSCASHINOUT (
		CASHINNO,CASHINUSER,CASHINDATE,CASHOUTUSER,CASHOUTDATE,
		SALEAMOUNT,COUNTINVOICE,EXCHRATE,COUNTER, ISOPEN,
		USERADD,DATEADD,USEREDIT,DATEEDIT) VALUES (
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?)
		";	
	
		$req = $taxDB->prepare($SQLCashinOut);
			
		$params = array(
		$cashinNO, $key, $cashInDate,$key,$cashOutDate,
		$totalSaleAmount, $invoiceCount,$extract["EXCHRATE"],$extract["COUNTER"],$extract["ISOPEN"],
		$key, $cashInDate, $key, $cashOutDate);
		$req->execute($params); 
		
		// 		
		$splittedNote = $data[$key]["splittedNote"];

		$totalRiel = ($splittedNote["R100"] * 100) + ($splittedNote["500"] * 500) + ($splittedNote["1000"] * 1000)  + 
					 ($splittedNote["2000"] * 2000) + ($splittedNote["5000"] * 5000) + ($splittedNote["10000"] * 10000) + 
					 ($splittedNote["20000"] * 20000)  + ($splittedNote["50000"] * 50000) + ($splittedNote["100000"] * 100000);

		$totalDollar =  ($splittedNote["1"] * 1) + ($splittedNote["2"] * 2) + ($splittedNote["5"] * 5) + ($splittedNote["10"] * 10) +
						($splittedNote["20"] * 20) + ($splittedNote["50"] * 50) + ($splittedNote["100"] * 100);


		$SQLCashoutCurrency = "INSERT INTO POSCASHOUTCURRENCY (
		CASHINNO,\"1USD\",\"2USD\",\"5USD\",\"10USD\",
		\"20USD\",\"50USD\",\"100USD\",\"OTHERUSD\",\"100RIEL\",
		\"500RIEL\",\"1000RIEL\",\"2000RIEL\",\"5000RIEL\",\"10000RIEL\",
		\"20000RIEL\",\"50000RIEL\",\"100000RIEL\", EXCHRATE,COUNTER,
		TOTALRIEL,TOTALDOLLAR,GRANDTOTAL,MISSINGVALUE,USERADD,DATEADD,USEREDIT,DATEEDIT) 
		VALUES (
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?)";
		
		$req = $taxDB->prepare($SQLCashoutCurrency);
		$params = array(
		$cashinNO,$splittedNote["1"],$splittedNote["2"],$splittedNote["5"],$splittedNote["10"],
		$splittedNote["20"],$splittedNote["50"],$splittedNote["100"],1, $splittedNote["R100"],
		$splittedNote["500"],$splittedNote["1000"],$splittedNote["2000"],$splittedNote["5000"],$splittedNote["10000"],
		$splittedNote["20000"],$splittedNote["50000"],$splittedNote["100000"],$extract["EXCHRATE"],$extract["COUNTER"],
		$totalRiel,$totalDollar, $saleamountMinusVisa ,$difference,$key, $cashOutDateMinus,$key,$cashOutDate);
				

		$req->execute($params);


		foreach ($data[$key]["selectedReceipts"] as $receipt)
		{
			// POSHEADER
			$extractHeaderSQL = "SELECT * FROM POSHEADER WHERE INVID = ?";
			$req = $db->prepare($extractHeaderSQL);		
			$req->execute(array($receipt["INVID"]));
			$extracted = $req->fetch();

			$genID = genID($data["date"],$max);
			$max = true;

			//echo "GeneratedID :".$genID."\n";

			$headerSQL = "INSERT INTO POSHEADER (
			INVID,POSDATE,CUSTID,CUSTNAME,POSTYPE,
			DISC_PERCENT,DISC_AMT,INV_AMT,VAT_PERCENT,VAT_AMT,
			PAID_AMT,CASH_RECEIPT,CASH_RETURN,PAIDRIEL,RETURNRIEL,
			BALANCE,SALEMAN,USERADD,DATEADD,PCNAME,
			CURR_RATE,PAIDDATE,ORDERDATE,TERM_DAYS,TERM_DISC,
			TERM_NET,PAY_TYPE,PAY_REFERENCE,CURRID,ORIG_INVAMOUNT,
			GLACCNT,TAXACC_OUT,LASTPOSDATE,LASTINVID,INVOICE_FROM,
			FIRST_PAID_INVOICE,LOCID,BASECURR_ID,CURRENCY_ORIGINVAMT,CURRENCY_INVAMT,
			CURRENCY_PAIDAMT,POS_CURRRATE,INVOICE_BEF_ROUNDING,CURR_INVOICE_BEF_ROUNDING,TOTAL_LINE_DISCOUNT) 
			VALUES (
			?,?,?,?,?,?,?,?,?,?,
			?,?,?,?,?,?,?,?,?,?,
			?,?,?,?,?,?,?,?,?,?,
			?,?,?,?,?,?,?,?,?,?,
			?,?,?,?,?)";
					
			$req = $taxDB->prepare($headerSQL);		
			$params = array(
					$genID,$extracted["POSDATE"],$extracted["CUSTID"],$extracted["CUSTNAME"],$extracted["POSTYPE"],
					$extracted["DISC_PERCENT"],$extracted["DISC_AMT"],$extracted["INV_AMT"],$extracted["VAT_PERCENT"],$extracted["VAT_AMT"],

					$extracted["PAID_AMT"],$extracted["CASH_RECEIPT"],$extracted["CASH_RETURN"],$extracted["PAIDRIEL"],$extracted["RETURNRIEL"],
					$extracted["BALANCE"],$extracted["SALEMAN"],$extracted["USERADD"],$extracted["DATEADD"],$extracted["PCNAME"],
					
					$extracted["CURR_RATE"],$extracted["PAIDDATE"],$extracted["ORDERDATE"],$extracted["TERM_DAYS"],$extracted["TERM_DISC"],
					$extracted["TERM_NET"],$extracted["PAY_TYPE"],$extracted["PAY_REFERENCE"],$extracted["CURRID"],$extracted["ORIG_INVAMOUNT"],
					
					$extracted["GLACCNT"],$extracted["TAXACC_OUT"],$extracted["LASTPOSDATE"],$extracted["LASTINVID"],$extracted["INVOICE_FROM"],
					$extracted["FIRST_PAID_INVOICE"],$extracted["LOCID"],$extracted["BASECURR_ID"],$extracted["CURRENCY_ORIGINVAMT"],$extracted["CURRENCY_INVAMT"],

					$extracted["CURRENCY_PAIDAMT"],$extracted["POS_CURRRATE"],$extracted["INVOICE_BEF_ROUNDING"],$extracted["CURR_INVOICE_BEF_ROUNDING"],$extracted["TOTAL_LINE_DISCOUNT"]
			);
			//echo "INSERTING ".$genID."\n";			
			$req->execute($params);

			// ICTRANHEADER 
			$extractTranHeaderSQL = "SELECT * FROM ICTRANHEADER WHERE DOCNUM = ?";
			$req = $db->prepare($extractTranHeaderSQL);		
			$req->execute(array($receipt["INVID"]));
			$extracted = $req->fetch();

			$tranHeaderSQL = "INSERT INTO ICTRANHEADER 
					(DOCNUM,FLOCID, TRANDATE, TRANTYPE, TOTAL_AMT,
					PCNAME,CURRID,CURR_RATE,CUSTID,DISC_PERCENT,
					VAT_PERCENT,USERADD,DATEADD, APPLID, BASECURR_ID, 
					CURRENCY_AMOUNT)
			VALUES (?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?)";
			$req = $taxDB->prepare($tranHeaderSQL);		
			$req->execute(array(
				$genID,$extracted["FLOCID"],$extracted["TRANDATE"],$extracted["TRANTYPE"], $extracted["TOTAL_AMT"],
				$extracted["PCNAME"],$extracted["CURRID"],$extracted["CURR_RATE"],$extracted["CUSTID"],$extracted["DISC_PERCENT"],
				$extracted["VAT_PERCENT"],$extracted["USERADD"],$extracted["DATEADD"],$extracted["APPLID"],$extracted["BASECURR_ID"],
				$extracted["CURRENCY_AMOUNT"]
				));

			// POSCASH
			$extractCashSQL = "SELECT * FROM POSCASH WHERE INVID = ?";
			$req = $db->prepare($extractCashSQL);
			$req->execute(array($receipt["INVID"]));
			$extracted = $req->fetch();

			$cashSQL = "INSERT INTO POSCASH(
			CUSTID, INVID, CUSTNAME,SALEMAN,PAIDDATE,
			POSDATE,PAID_AMT,PAY_TYPE,PAY_REFERENCE,CURRID,
			CURR_RATE,POSTYPE,DISC_AMT,USERADD,DATEADD,
			PCNAME, REC_REFERENCE,DISCACC,CASHACC,BASECURR_ID, 
			CURRENCY_PAIDAMOUNT, CURRENCY_PAIDDISCAMOUNT) VALUES   
			(?,?,?,?,?,
			 ?,?,?,?,?,
			 ?,?,?,?,?,
			 ?,?,?,?,?,
			 ?,?)";
			$req = $taxDB->prepare($cashSQL);		
			
			$req->execute(array(
				$extracted["CUSTID"], $genID, $extracted["CUSTNAME"],$extracted["SALEMAN"],$extracted["PAIDDATE"],
				$extracted["POSDATE"],$extracted["PAID_AMT"],$extracted["PAY_TYPE"],$extracted["PAY_REFERENCE"],$extracted["CURRID"],
				$extracted["CURR_RATE"],$extracted["POSTYPE"],$extracted["DISC_AMT"],$extracted["USERADD"],$extracted["DATEADD"],
				$extracted["PCNAME"], $extracted["REC_REFERENCE"], $extracted["DISCACC"], $extracted["CASHACC"],$extracted["BASECURR_ID"], 
				$extracted["CURRENCY_PAIDAMOUNT"], $extracted["CURRENCY_PAIDDISCAMOUNT"]
			));

			// POSDETAIL
			$extractDetailSQL = "SELECT * FROM POSDETAIL WHERE INVID = ?";
			$req = $db->prepare($extractDetailSQL);
			$req->execute(array($receipt["INVID"]));
			$items = $req->fetchAll(PDO::FETCH_ASSOC);		

			foreach($items as $item)
			{
				$detailSQL = "INSERT INTO POSDETAIL 
				(INVID, POSDATE,CUSTID,POSTYPE,SALEMAN, 
				 CURR_RATE,CURRID, PRODUCTID, PRODUCTNAME,PRODUCTNAME1,
				 CATEGORYID, CLASSID, UMID, LOCID, FACTOR,
				 DISC_PERCENT, VAT_PERCENT, COST, PRICE, QTY,
				 WEIGHT, TOTAL_AMT, VATABLE, [LINENO], COLOR,
				 USERADD, DATEADD, USEREDIT,PRICE_ORI, DIMENSION,
				 FROM_LINE, INVOICE_FROM, PACKAGESIZE, PACKAGEPRICE,PACKAGE_EXTPRICE,
				 REVENUE_ACC, DISCOUNT_ACC, TRANQTY, TRANUNIT, TRANFACTOR,
				 COGSACC, INVENTORYACC, INVOICE_DISCOUNT, ORIG_PACKAGEPRICE,ITEM_LONG,
				 COST_METHOD, TOTAL_COST, BASECURR_ID, CURRENCY_PRICE,CURRENCY_AMOUNT,
				 CURRENCY_PACKAGEPRICE,CURRENCY_PACKAGEEXTPRICE, AMOUNT_BEFORE_DISC,CURRENCY_AMOUNT_BEFORE_DISC, LINE_ROUNDING_VALUE) 
				VALUES (
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,				
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?)";

				$req = $taxDB->prepare($detailSQL);
				$params = array(
						$genID,$item["POSDATE"],$item["CUSTID"],$item["POSTYPE"],$item["SALEMAN"], 
						$item["CURR_RATE"],$item["CURRID"],$item["PRODUCTID"],$item["PRODUCTNAME"],$item["PRODUCTNAME1"],
						$item["CATEGORYID"],$item["CLASSID"],$item["UMID"],$item["LOCID"], $item["FACTOR"],
						$item["DISC_PERCENT"],$item["VAT_PERCENT"],floatval($item["COST"]),$item["PRICE"],$item["QTY"],
						$item["WEIGHT"], $item["TOTAL_AMT"], $item["VATABLE"], $item["LINENO"],$item["COLOR"],
						$item["USERADD"], $item["DATEADD"], $item["USEREDIT"],$item["PRICE_ORI"],$item["DIMENSION"],
						$item["FROM_LINE"], $item["INVOICE_FROM"], $item["PACKAGESIZE"], $item["PACKAGEPRICE"],$item["PACKAGE_EXTPRICE"],
						$item["REVENUE_ACC"], $item["DISCOUNT_ACC"], $item["TRANQTY"], $item["TRANUNIT"], $item["TRANFACTOR"],
						$item["COGSACC"], $item["INVENTORYACC"], $item["INVOICE_DISCOUNT"], $item["ORIG_PACKAGEPRICE"], $item["ITEM_LONG"],
						$item["COST_METHOD"], $item["TOTAL_COST"],$item["BASECURR_ID"],floatval($item["CURRENCY_PRICE"]),floatval($item["CURRENCY_AMOUNT"]),
						floatval($item["CURRENCY_PACKAGEPRICE"]),floatval($item["CURRENCY_PACKAGEEXTPRICE"]),floatval($item["AMOUNT_BEFORE_DISC"]),floatval($item["CURRENCY_AMOUNT_BEFORE_DISC"]),$item["LINE_ROUNDING_VALUE"]
				);
				$req->execute($params);				
			}

			// TRANDETAIL 
			$extractTranDetailSQL = "SELECT * FROM ICTRANDETAIL WHERE DOCNUM = ?";
			$req =  $db->prepare($extractTranDetailSQL);
			$req->execute(array($receipt["INVID"]));
			$items = $req->fetchAll(PDO::FETCH_ASSOC);		
			foreach($items as $item)
			{
				$detailSQL = "INSERT INTO ICTRANDETAIL  
										 (DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,
										  TRANDATE,TRANTYPE,LINENUM,PRODUCTNAME,PRODUCTNAME1,
										  REFERENCE,TRANQTY,TRANUNIT,TRANFACTOR,STKUNIT,
										  STKFACTOR,TRANDISC,TRANTAX,TRANCOST,TRANPRICE, 
										  PRICE_ORI,EXTPRICE,EXTCOST,CURRENTONHAND,CURRID,
										  CURR_RATE,CUSTID,VENDID,WEIGHT,OLDWEIGHT,
										  USERADD,DATEADD,CURRENTCOST,LASTCOST,APPLID,
										  LINK_LINE,ICCLEARING_ACC,INVENTORY_ACC,COSG_ACC,DIMENSION,
										  LINE_DISCAMT,TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,COST_METHOD,
										  BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_EXTPRICE,CURRENCY_PRICE, 
										  INVENTORY_ROUNDING, MAIN_PRODUCTID) 
									 VALUES(
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?,?,?,?,
									 ?,?)";
				$req = $taxDB->prepare($detailSQL);
				$params = array(	
				  $genID,$item["PRODUCTID"],$item["LOCID"],$item["CATEGORYID"],$item["CLASSID"],
				  $item["TRANDATE"],$item["TRANTYPE"],$item["LINENUM"],$item["PRODUCTNAME"],$item["PRODUCTNAME1"],
				  $item["REFERENCE"],$item["TRANQTY"],$item["TRANUNIT"],$item["TRANFACTOR"],$item["STKUNIT"],
				  $item["STKFACTOR"],$item["TRANDISC"],$item["TRANTAX"],floatval($item["TRANCOST"]),floatval($item["TRANPRICE"]), 
				  floatval($item["PRICE_ORI"]),floatval($item["EXTPRICE"]),floatval($item["EXTCOST"]),floatval($item["CURRENTONHAND"]),$item["CURRID"],
				  $item["CURR_RATE"],$item["CUSTID"],$item["VENDID"],$item["WEIGHT"],$item["OLDWEIGHT"],
				  $item["USERADD"],$item["DATEADD"],$item["CURRENTCOST"],$item["LASTCOST"],$item["APPLID"],
				  $item["LINK_LINE"],$item["ICCLEARING_ACC"],$item["INVENTORY_ACC"],$item["COSG_ACC"],$item["DIMENSION"],
				  $item["LINE_DISCAMT"],$item["TRANQTY_NEW"],floatval($item["TRANCOST_NEW"]),floatval($item["TRANEXTCOST_NEW"]),$item["COST_METHOD"],
				  $item["BASECURR_ID"],floatval($item["CURRENCY_AMOUNT"]),$item["CURRENCY_COST"],floatval($item["CURRENCY_EXTPRICE"]),floatval($item["CURRENCY_PRICE"]), 
				  $item["INVENTORY_ROUNDING"], $item["MAIN_PRODUCTID"]
				  );
				$req->execute($params);				
				
			}

		}
	}

}

function isInRange($value,$expected,$margin){
	$diff = $expected - $value;
	if ($diff < 0)
		$diff = $diff * -1; 

	if ($diff > $margin)
		return false;
	return true;
}

function generate($amount,$date,$receiptmaxValue,$receiptBiglimit){	
	$margin = 0.5;
	$data = array();
	
	$data["date"] = $date;
	//$data["amount"] = $amount;

	echo "The Date: ".$date."\n";	
			
	if (strtotime($date) < 1572541200)						
		$db = getOldDatabase();
	else 
		$db = getNewDatabase();
	$begin = "'".$date." 00:00:00.000'";
	$end = "'".$date." 23:59:59.999'";

	// Get Cashiers
	try{
		$sql = "SELECT DISTINCT(USERADD) FROM POSHEADER WHERE POSDATE BETWEEN ".$begin." AND ".$end;
		$req = $db->prepare($sql);
		$req->execute();					
		$cashiers = $req->fetchAll(PDO::FETCH_ASSOC);	
		$tmp = array();	
	}
	catch(Exception $ex){
		echo $ex->getMessage();
	}

	foreach($cashiers as $cashier){ 

		$sql = "SELECT COUNT(*) as CNT FROM POSCASHINOUT WHERE USERADD = ? AND DATEADD BETWEEN ".$begin." AND ".$end;
		$req = $db->prepare($sql);
		$req->execute(array($cashier["USERADD"]));

		$CNT = $req->fetch()["CNT"];			
		$sql = "SELECT count(INVID) as CNT FROM POSHEADER WHERE POSDATE BETWEEN ".$begin." AND ".$end. 
			" AND PAY_TYPE = 'Cash' AND POSTYPE = 'IN' AND CUSTNAME = 'General Customer' AND USERADD = ?";

		$req = $db->prepare($sql);
		$req->execute(array($cashier["USERADD"]));
		$cnt = $req->fetch();
 
		if ($cnt["CNT"] > 10) // WE ONLY TAKE CASHIER THAT HAVE MORE THAN 10 RECIPES
			array_push($tmp,$cashier["USERADD"]);
	}
	$cashiers = $tmp;

	echo "Count: ".count($cashiers)."\n";

	$percentageSplit["1"] = [1.0];			
	$percentageSplit["2"] = [0.5,0.5];								
	$percentageSplit["3"] = [0.34,0.33,0.33];		
	$percentageSplit["4"] = [0.25,0.25,0.25,0.25];									
	$percentageSplit["5"] = [0.2,0.2,0.2,0.2,0.2];	
	$percentageSplit["6"] = [0.16,0.16,0.16,0.16,0.16,0.2];


	$results = null;
	$percentages = null;
	while(1)
	{			
		if ($percentages == null){						
			$percentages = $percentageSplit[strval(count($cashiers))];
			echo "NEW PERCENT";
			var_dump($percentages);
		}
		else {			
			$percentages = AdjustCashPercent($data,$amount,$percentages);
			echo "AUTO PERCENT";
			var_dump($percentages);
		}

		$data = array(); 
		$i = 0;	
		foreach($cashiers as $cashier){	// WE EXTRACT OPEN,CLOSE DATE AND RATE	
			$sql = "SELECT INVID,PAID_AMT FROM POSHEADER WHERE POSDATE BETWEEN ".$begin." AND ".$end. 
				" AND PAY_TYPE = 'Cash' AND POSTYPE = 'IN' AND CUSTNAME = 'General Customer' AND USERADD = ?";
			$req = $db->prepare($sql);
			$req->execute(array($cashier));
			$data[$cashier]["all"] = $req->fetchAll(PDO::FETCH_ASSOC);	
			$data[$cashier]["selectedAmt"] = array();
			$data[$cashier]["selectedReceipts"] = array();
			$data[$cashier]["percent"] = $percentages[$i]; // IMPORTANT 
			$data[$cashier]["expected"] = $amount * $percentages[$i];	// IMPORTANT

			$req = $db->prepare($sql);
			$req->execute(array($cashier));
			$sql = "SELECT MAX(POSDATE) as CLS,MIN(POSDATE) as OPN, MAX(CURR_RATE) as RATE FROM POSHEADER WHERE POSDATE BETWEEN ".$begin." AND ".$end. 
				" AND PAY_TYPE = 'Cash' AND POSTYPE = 'IN' AND CUSTNAME = 'General Customer' AND USERADD = ?";
			
			$req = $db->prepare($sql);
			$req->execute(array($cashier));
			$extract = $req->fetch(PDO::FETCH_ASSOC);	

			$data[$cashier]["openDatetime"] = $extract["OPN"];
			$data[$cashier]["closeDatetime"] = $extract["CLS"];
			$data[$cashier]["rate"] = $extract["RATE"];	
			$i++;
		 }

		$receiptBigQty = 0;
		$bigtotal = 0;
		foreach($cashiers as $cashier)
		{
		 	$totalSelected = array_sum($data[$cashier]["selectedAmt"]);
			$expected = $data[$cashier]["expected"];

			// Check if the total of 
		 	while(!isInRange($totalSelected,$expected, $margin) && count($data[$cashier]["all"]) > 0)
		 	{				
		 		$idx = array_rand($data[$cashier]["all"]);
		 		$randomReceipt = $data[$cashier]["all"][$idx];	 		


				if ($randomReceipt["PAID_AMT"] > $receiptmaxValue)	 			
				{
					if ($receiptBigQty >= $receiptBiglimit){
						array_splice($data[$cashier]["all"],$idx,1);
						continue;
					}
					// Check if it's too high				
					$totalNow = array_sum($data[$cashier]["selectedAmt"]);

					
					if (($totalNow + $randomReceipt["PAID_AMT"])  > $expected + $margin)
					{
						array_splice($data[$cashier]["all"],$idx,1);
						continue;
					}
					else				
						$receiptBigQty++;	
				}
		 		else
		 		{
		 			// Check if it's too high
					$totalNow = array_sum($data[$cashier]["selectedAmt"]);			
					if ( ($totalNow + $randomReceipt["PAID_AMT"]) > $expected + $margin){
						array_splice($data[$cashier]["all"],$idx,1);
						continue;	
					}
							
		 		}	
		 		array_splice($data[$cashier]["all"],$idx,1);
		 		array_push($data[$cashier]["selectedAmt"], $randomReceipt["PAID_AMT"]);
				array_push($data[$cashier]["selectedReceipts"], $randomReceipt);

				$totalSelected = array_sum($data[$cashier]["selectedAmt"]);
				$expected = $data[$cashier]["expected"];
				
				//echo "EX: ".$expected."|SUM: ". $totalSelected."\n";
		 	}
		 	$bigtotal += $totalSelected;
		 	unset($data[$cashier]["all"]);	 	
		}
		$data["bigtotal"] = $bigtotal;	


		$diff = $amount - $data["bigtotal"];		
		if ($diff < 0)
			$diff = $diff * -1;
		//$data["exceed"] = $isExceeded; // Probably only for render	
		echo "DIFF: ".$diff."\n";
		if ( $diff < 5)
			break;
	}
	return $data;

}


function loadAmountFromDate($date = null)
{
	$result = array();
	$row = 1;
	$filename = "FinalDataSale.csv";	

	if ($date == null)
		$canStart = true;	
	else
		$canStart = false;
	if (($handle = fopen($filename, "r")) !== FALSE) 
	{

	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	    {	   	    	
	    	if($date == $data[0])	    		    		
	    		$canStart = true;
	    	
	    	if ($canStart == false)	
	    		continue;

	    	$result[$data[0]] = $data[1];	    
	    }
	    fclose($handle);
	}	
	else {
		echo "file not found";
		exit;
	}
	return $result;
}

function loadVisaFromDate($date = null)
{
	$result = array();
	$row = 1;
	$filename = "FinalDataSale.csv";
	if ($date == null)
		$canStart = true;	
	else
		$canStart = false;

	if (($handle = fopen($filename, "r")) !== FALSE) 
	{
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	    {
	    	if($date == $data[0])
	    		$canStart = true;
	    	if ($canStart == false)	
	    		continue;
	    	$result[$data[0]] = $data[2];	    
	    }
	    fclose($handle);
	}
	return $result;
}


function renderSplit($initial,$data,$rate)
{
	if ($rate == 0)
		$rate = 4150;

	echo  "<center><table border='1'>";
	echo "<tr><td>AMOUNT:</td><td>".$initial."</td><td>".$data["remain"]."</td></tr>"; 
	echo "<tr><th>NOTE</td><td>QTY</td><td>TOTAL</td></tr>"; 
	
	echo "<tr><td>$1</td><td>".$data["1"]."</td><td>".((1 * $rate) * $data["1"])."</td></tr>";
	echo "<tr><td>$2</td><td>".$data["2"]."</td><td>".((2 * $rate) * $data["2"])."</td></tr>";
	echo "<tr><td>$5</td><td>".$data["5"]."</td><td>".((5 * $rate) * $data["5"])."</td></tr>";
	echo "<tr><td>$10</td><td>".$data["10"]."</td><td>".((10 * $rate) * $data["10"])."</td></tr>";
	echo "<tr><td>$20</td><td>".$data["20"]."</td><td>".((20 * $rate) * $data["20"])."</td></tr>"; // OK
	echo "<tr><td>$50</td><td>".$data["50"]."</td><td>".((50 * $rate) * $data["50"])."</td></tr>"; // OK
	echo "<tr><td>$100</td><td>".$data["100"]."</td><td>".((100 * $rate) * $data["100"])."</td></tr>"; // OK
	echo "<tr><td>R50</td><td>".$data["R50"]."</td><td>0</td></tr>";
	echo "<tr><td>R100</td><td>".$data["R100"]."</td><td>".(100 * $data["R100"])."</td></tr>";
	echo "<tr><td>R200</td><td>".$data["200"]."</td><td>".(200 * $data["200"])."</td></tr>";
	echo "<tr><td>R500</td><td>".$data["500"]."</td><td>".(500 * $data["500"])."</td></tr>";
	echo "<tr><td>R1000</td><td>".$data["1000"]."</td><td>".(1000 * $data["1000"])."</td></tr>";
	echo "<tr><td>R2000</td><td>".$data["2000"]."</td><td>".(2000 * $data["2000"])."</td></tr>";
	echo "<tr><td>R5000</td><td>".$data["5000"]."</td><td>".(5000 * $data["5000"])."</td></tr>";
	echo "<tr><td>R10000</td><td>".$data["10000"]."</td><td>".(10000 * $data["10000"])."</td></tr>";
	echo "<tr><td>R20000</td><td>".$data["20000"]."</td><td>".(20000 * $data["20000"])."</td></tr>";
	echo "<tr><td>R50000</td><td>".$data["50000"]."</td><td>".(50000 * $data["50000"])."</td></tr>";
	echo "<tr><td>R100000</td><td>".$data["100000"]."</td><td>".(100000 * $data["100000"])."</td></tr>";
	echo  "</table></center>";

	$grandTotal = ((1 * $rate) * $data["1"]) +  ((2 * $rate) * $data["2"]) + ((5 * $rate) * $data["5"]) + ((10 * $rate) * $data["10"]) + 
			      ((20 * $rate) * $data["20"]) + ((50 * $rate) * $data["50"]) + ((100 * $rate) * $data["100"]) + (100 * $data["R100"]) + 
			      (200 * $data["200"]) + (500 * $data["500"]) + (1000 * $data["1000"]) + (2000 * $data["2000"]) + (5000 * $data["5000"]) + 
			      (10000 * $data["10000"]) + (20000 * $data["20000"]) + (50000 * $data["50000"]) + (100000 * $data["100000"]);   


	echo "Total Riel: ".$grandTotal."<br>";
	echo "Total USD: ".($grandTotal/$rate)."<br>"; 
	$total = 0;
}


function rollQuantity2($amount,$key,$rate){
	if ($rate == 0)
		$rate = 4150;

	if ($amount < 0)
		return 0;
	$range["100000"] = [0,2];
	$range["50000"] = [0,4];


	$range["1"] = [0,50];	
	$range["5"] = [0,50];
	$range["10"] = [0,50];

	$range["100"] = [0,15];
	$range["50"] = [0,20];
	$range["20"] = [0,30];
	
	$range["20000"] = [0,15];
	$range["10000"] = [0,25];
	$range["5000"] = [0,25];
	$range["2000"] = [0,25];
	$range["1000"] = [0,25];
	$range["500"] = [0,25];
	$range["R100"] = [0,25];

	if ($key == "R100")
		$value = 100;
	else if ($key == "10" || $key == "5" || $key == "1")
		$value = intval($key) * $rate;
	else 
		$value = intval($key);


	$calculated = PHP_INT_MAX;
	while($calculated > $amount){
		$qty = random_int($range[$key][0],$range[$key][1]);
		$calculated = $qty * $value;
		//echo "*CAL:".$calculated."|AMT:".$amount."\n";		
	}
	if ($qty < 0){
		echo "Negative Quantity|".$range[$key][0]."<>".$range[$key][1]."|<br>";
		exit;
	}
	return $qty;
}

function rollQuantity($amount,$key,$rate)
{	

	if ($rate == 0)
		$rate = 4150;

	if ($amount < 0)
		return 0;

	$range = array();
	$range["100"]["0"] =  [0,0];
	$range["100"]["100"] = [0,0];
	$range["100"]["200"] = [0,1];
	$range["100"]["300"] = [0,2];
	$range["100"]["400"] = [0,3];
	$range["100"]["500"] = [0,4];
	$range["100"]["600"] = [0,5];//
	$range["100"]["700"] = [0,6];
	$range["100"]["800"] = [0,7];
	$range["100"]["900"] = [0,8];
	$range["100"]["1000"] = [0,9];
	$range["100"]["1100"] = [0,10];
	$range["100"]["1200"] = [0,11];
	$range["100"]["1300"] = [0,12];
	$range["100"]["1400"] = [0,13];//
	$range["100"]["1500"] = [0,11];
	$range["100"]["1600"] = [0,12];
	$range["100"]["1700"] = [0,13];
	$range["100"]["1800"] = [0,14];
	$range["100"]["1900"] = [0,15];
	$range["100"]["2000"] = [0,15];//
	$range["100"]["2100"] = [0,16];
	$range["100"]["2200"] = [0,17];
	$range["100"]["2300"] = [0,18];
	$range["100"]["2400"] = [0,19];
	$range["100"]["2500"] = [0,20];
	$range["100"]["2600"] = [0,21];
	$range["100"]["2700"] = [0,22];
	$range["100"]["2800"] = [0,23];
	$range["100"]["2900"] = [0,24];
	$range["100"]["3000"] = [0,25];
	$range["100"]["3100"] = [0,26];
	$range["100"]["3200"] = [0,27];
	$range["100"]["3300"] = [0,28];
	$range["100"]["3400"] = [0,29];
	$range["100"]["3500"] = [0,30];
	$range["100"]["3600"] = [0,31];
	$range["100"]["3700"] = [0,32];
	$range["100"]["3800"] = [0,33];
	$range["100"]["3900"] = [0,34];
	$range["100"]["4000"] = [0,35];

	$range["50"]["0"] =  [0,0];
	$range["50"]["100"] = [0,0];
	$range["50"]["200"] = [0,2];
	$range["50"]["300"] = [0,4];
	$range["50"]["400"] = [0,6];
	$range["50"]["500"] = [0,8];
	$range["50"]["600"] = [0,10];//
	$range["50"]["700"] = [0,10];
	$range["50"]["800"] = [0,10];
	$range["50"]["900"] = [0,12];
	$range["50"]["1000"] = [0,14];
	$range["50"]["1100"] = [0,16];
	$range["50"]["1200"] = [0,18];
	$range["50"]["1300"] = [0,20];
	$range["50"]["1400"] = [0,20];//
	$range["50"]["1500"] = [0,22];
	$range["50"]["1600"] = [0,24];
	$range["50"]["1700"] = [0,26];
	$range["50"]["1800"] = [0,28];
	$range["50"]["1900"] = [0,30];
	$range["50"]["2000"] = [0,30];//
	$range["50"]["2100"] = [0,32];
	$range["50"]["2200"] = [0,34];
	$range["50"]["2300"] = [0,36];
	$range["50"]["2400"] = [0,38];
	$range["50"]["2500"] = [0,40];
	$range["50"]["2600"] = [0,40];
	$range["50"]["2700"] = [0,42];
	$range["50"]["2800"] = [0,44];
	$range["50"]["2900"] = [0,46];
	$range["50"]["3000"] = [0,48];
	$range["50"]["3100"] = [0,50];
	$range["50"]["3200"] = [0,50];
	$range["50"]["3300"] = [0,52];
	$range["50"]["3400"] = [0,54];
	$range["50"]["3500"] = [0,56];
	$range["50"]["3600"] = [0,58];
	$range["50"]["3700"] = [0,60];
	$range["50"]["3800"] = [0,60];
	$range["50"]["3900"] = [0,62];
	$range["50"]["4000"] = [0,64];


	$range["20"]["0"] =  [0,0];
	$range["20"]["100"] = [0,2];
	$range["20"]["200"] = [0,4];
	$range["20"]["300"] = [0,8];
	$range["20"]["400"] = [0,12];
	$range["20"]["500"] = [0,16];
	$range["20"]["600"] = [0,20];//
	$range["20"]["700"] = [0,20];	
	$range["20"]["800"] = [0,20];
	$range["20"]["900"] = [0,24];
	$range["20"]["1000"] = [0,28];
	$range["20"]["1100"] = [0,32];
	$range["20"]["1200"] = [0,36];
	$range["20"]["1300"] = [0,40];
	$range["20"]["1400"] = [0,40];//
	$range["20"]["1500"] = [0,44];
	$range["20"]["1600"] = [0,48];
	$range["20"]["1700"] = [0,52];
	$range["20"]["1800"] = [0,56];
	$range["20"]["1900"] = [0,60];
	$range["20"]["2000"] = [0,60];//
	$range["20"]["2100"] = [0,64];
	$range["20"]["2200"] = [0,68];
	$range["20"]["2300"] = [0,72];
	$range["20"]["2400"] = [0,76];
	$range["20"]["2500"] = [0,80];
	$range["20"]["2600"] = [0,80];
	$range["20"]["2700"] = [0,84];
	$range["20"]["2800"] = [0,88];
	$range["20"]["2900"] = [0,92];
	$range["20"]["3000"] = [0,96];
	$range["20"]["3100"] = [0,100];
	$range["20"]["3200"] = [0,100];
	$range["20"]["3300"] = [0,104];
	$range["20"]["3400"] = [0,108];
	$range["20"]["3500"] = [0,112];
	$range["20"]["3600"] = [0,116];
	$range["20"]["3700"] = [0,120];
	$range["20"]["3800"] = [0,120];
	$range["20"]["3900"] = [0,124];
	$range["20"]["4000"] = [0,128];


	$usAmt = $amount / $rate;
	$selected = intval($usAmt - ($usAmt % 100));	
	if ($selected > 4000)
		$selected = 4000;

	$calculated = PHP_INT_MAX;
	// WE SEEK CALCULATED INFERIOR TO AMOUNT
	while ($calculated > $amount){
		$min = $range[$key][strval($selected)][0];
		$max = $range[$key][strval($selected)][1];
		$qtyRolled = random_int($min,$max);	
		$calculated = $qtyRolled * (intval($key) * $rate);
		//echo "CAL:".$calculated."|AMT:".$amount."\n";
	}

	return $qtyRolled;	
}

function finalPick(&$data,$amount,$rate)
{

	if ($rate == 0)
		$rate = 4150;

	// $100
	if ($amount < 0)
		return;
	$qty = intdiv($amount, 100 * $rate);



	$data["100"] += $qty;
	$amount -= $qty * (100 * $rate);


	// $50
	if ($amount < 0)
		return;
	$qty = intdiv($amount, 50 * $rate);	



	$data["50"] += $qty;
	$amount -= $qty * (50 * $rate);	


	// $20
	if ($amount < 0)
		return;
	$qty = intdiv($amount, 20 * $rate);



	$data["20"] += $qty;
	$amount -= $qty * (20 * $rate);


	// $10
	if ($amount < 0)
		return;
	$qty = intdiv($amount, 10 * $rate);



	$data["10"] += $qty;
	$amount -= $qty * (10 * $rate);	


	// $5
	if ($amount < 0)
		return;


	$qty = intdiv($amount, 5 * $rate);	
	$data["5"] += $qty;
	$amount -= $qty * (5 * $rate);	


	// $1
	if ($amount < 0)
		return;


	$qty = intdiv($amount, 1 * $rate);	
	$data["1"] += $qty;
	$amount -= $qty * (1 * $rate);	


	// 1000
	if ($amount < 0)
		return;

	$qty = intdiv($amount, 1000);	
	$data["1000"] += $qty;
	$amount -= $qty * 1000;	


	// 500
	if ($amount < 0)
		return;


	$qty = intdiv($amount, 500);
	$data["500"] += $qty;
	$amount -= $qty * 500;	



	// 100
	if ($amount < 0)
		return;

	$qty = intdiv($amount, 100);	
	$data["R100"] += $qty;
	$amount -= $qty * 100;

	$data["remain"] = $amount;
}


function TMPRender($data,$rate){

	if ($rate == 0)
		$rate = 4150;
	
	$total = 0;

	$total += $data["1"] * (1 * $rate);
	$total += $data["5"] * (5 * $rate);

	$total += $data["10"] * (10 * $rate);
	$total += $data["20"] * (20 * $rate);

	$total += $data["50"] * (50 * $rate);
	$total += $data["100"] * (100 * $rate);
	
	$total += $data["R100"] * 100;
	$total += $data["500"] * 500;
	$total += $data["1000"] * 1000;
	$total += $data["2000"] * 2000;
	$total += $data["5000"] * 5000;
	$total += $data["10000"] * 10000;

	$total += $data["20000"] * 20000;
	$total += $data["50000"] * 50000;
	$total += $data["100000"] * 100000;
	
	echo "R".$total."|$".($total/$rate)."<br>";
}


function splitMoney($amountUSD,$rate)
{
	if ($rate == 0)
		$rate = 4150;
	//echo "TO SPLIT:".$amountUSD."<br>"; 
	// start from the bottom 
	// Repartition aleatoire de CB 

	// INIT
	$data["1"] = 0;
	$data["2"] = 0; 
	$data["5"] = 0;
	$data["10"] = 0; 
	$data["20"] = 0; 
	$data["50"] = 0; 	
	$data["100"] = 0;
	$data["R50"] = 0; 	
	$data["R100"] = 0; 
	$data["200"] = 0;
	$data["500"] = 0; 
	$data["1000"] = 0; 
	$data["2000"] = 0; 
	$data["5000"] = 0; 
	$data["10000"] = 0; 
	$data["20000"] = 0; 
	$data["50000"] = 0; 
	$data["100000"] = 0;  
		 
	// GLOBAL REPARTITION 
	//TMPRender($data,$rate);

	$poolRiel = $amountUSD * $rate;

		
	// 1 	
	$qty = rollQuantity2($poolRiel,"1",$rate);	
	$data["1"] = $qty;
	$poolRiel -= $qty * (1 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_1 :".$qty;

	// 5 
	$qty = rollQuantity2($poolRiel,"5",$rate);	
	$data["5"] = $qty;
	$poolRiel -= $qty * (5 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_5 :".$qty;
	
	// 50$ 
	$qty = rollQuantity($poolRiel,"50",$rate);
	$data["50"] = $qty;
	$poolRiel -= $qty * (50 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_50 :".$qty;
	
	// 20000 
	$qty = rollQuantity2($poolRiel,"20000",$rate);
	$data["20000"] = $qty;
	$poolRiel -= $qty * 20000;

	if ($poolRiel < 0)
		echo "ALERT_20000 :".$qty;
	
	// 1000 
	$qty = rollQuantity2($poolRiel,"1000",$rate);
	$data["1000"] = $qty;
	$poolRiel -= $qty * 1000;


	if ($poolRiel < 0)
		echo "ALERT_1000 :".$qty;

	// 2000 
	$qty = rollQuantity2($poolRiel,"2000",$rate);
	$data["2000"] = $qty;
	$poolRiel -= $qty * 2000;


	if ($poolRiel < 0)
		echo "ALERT_2000 :".$qty;


	// 500 
	$qty = rollQuantity2($poolRiel,"500",$rate);
	$data["500"] = $qty;
	$poolRiel -= $qty * 500;

	if ($poolRiel < 0)
		echo "ALERT_500 :".$qty;

	
	//	R100 
	$qty = rollQuantity2($poolRiel,"R100",$rate);
	$data["R100"] = $qty;
	$poolRiel -= $qty * 100;

	if ($poolRiel < 0)
		echo "ALERT_R100 :".$qty;


	// 10000 
	$qty = rollQuantity2($poolRiel,"10000",$rate);
	$data["10000"] = $qty;
	$poolRiel -= $qty * 10000;

	if ($poolRiel < 0)
		echo "ALERT_10000 :".$qty;

	
	// 5000 
	$qty = rollQuantity2($poolRiel,"5000",$rate);
	$data["5000"] = $qty;
	$poolRiel -= $qty * 5000;

	if ($poolRiel < 0)
		echo "ALERT_5000 :".$qty;

	// 100$
	$qty = rollQuantity($poolRiel,"100",$rate);	
	$data["100"] = $qty;
	$poolRiel -= $qty * (100 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_100$ :".$qty;

	
	// 10 
	$qty = rollQuantity2($poolRiel,"10",$rate);
	$data["10"] = $qty;
	$poolRiel -= $qty * (10 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_10 :".$qty;
	
	// 20 
	$qty = rollQuantity($poolRiel,"20",$rate);
	$data["20"] = $qty;
	$poolRiel -= $qty * (20 * $rate);

	if ($poolRiel < 0)
		echo "ALERT_20 :".$qty;

	// 100000
	$qty = rollQuantity2($poolRiel,"100000",$rate);
	$data["100000"] = $qty;
	$poolRiel -= $qty * 100000;

	if ($poolRiel < 0)
		echo "ALERT_100000 :".$qty;

	// 50000 
	$qty = rollQuantity2($poolRiel,"50000",$rate);
	$data["50000"] = $qty;
	$poolRiel -= $qty * 50000;

	if ($poolRiel < 0)
		echo "ALERT_50000 :".$qty;

	//echo $poolRiel." ".($poolRiel/$rate)."\n";
	
	finalPick($data,$poolRiel,$rate);
	return $data;

}

function genID($date,$max)
{	
	
	$year = explode('/',$date)[2];
	$month = sprintf("%02d",explode('/',$date)[0]);
	$left = "IN".$year.$month;

	$taxDB = getTaxDatabase();
	
	if ($year == "2022")
	{
		$sql = "SELECT  max(INVID) as mx  FROM POSHEADER WHERE POSDATE > '2021-12-31 23:59:59.999'";	
	}
	else 
	{
		if ($max == false)
		{
			$before = "'".$date." 00:00:00.000'";		
			$sql = "SELECT max(INVID) as mx FROM POSHEADER WHERE POSDATE < ".$before;
		}
		else 
		{
			$before = "'".$date." 23:59:59.000'";		
			$sql = "SELECT max(INVID) as mx FROM POSHEADER WHERE POSDATE <".$before;
		}
	}
	

	$req = $taxDB->prepare($sql);
	$req->execute(array());
	$extract = $req->fetch();
	if ($extract == null)
		$ID = 0;
	else{
		$ID = intval(substr($extract["mx"],8));
		//echo "MAXID :".$ID."\n";
	}	
	$ID++;
	$newID = sprintf("%08d",$ID);
	return $left.$newID;
}

function genCashINID($date,$max)
{		
	$taxDB = getTaxDatabase();

	$year = explode('/',$date)[2];
	
	if ($year == "2021" || $year == "2022")
	{
		$sql = "SELECT max(CASHINNO) as mx FROM POSCASHINOUT";
	}
	else 
	{	
		if ($max == false)
		{
			$before = "'".$date." 00:00:00.000'";
			$sql = "SELECT max(CASHINNO) as mx FROM POSCASHINOUT WHERE CASHINDATE < ".$before;		
		}
		else 
		{
			$before = "'".$date." 23:59:59.000'";
			$sql = "SELECT max(CASHINNO) as mx FROM POSCASHINOUT WHERE CASHINDATE < ".$before;
		}
	
	}
	$req = $taxDB->prepare($sql);
	$req->execute(array());
	$extract = $req->fetch();
	if ($extract == null)
		$ID = 0;
	else{
		$ID = intval(substr($extract["mx"],2));
	}
	$ID++;
	return sprintf("CI%08d",$ID);
}



function SampleData(){
	$data = array();		
	$data["2/9/2022"] = 5219.6815;
	return $data;

}

function SampleDataVisa(){
	$data = array();
	$data["2/9/2022"] = 3692.11;
	return $data;
}





function GO(){
	//$render = 1;
	$render = 0;

	$taxDB = getTaxDatabase();
	$sql = "SELECT MAX(CASHINDATE) as MX FROM POSCASHINOUT";
	$req = $taxDB->prepare($sql);
	$req->execute(array());
	$extract = $req->fetch();


	resetDate("2/20/2022");
	if ($render == 0){				
		$amountDates = loadAmountFromDate("2/20/2022");		
		$visaDates = loadVisaFromDate("2/20/2022");				
	}
	else if ($render == 1){
		$amountDates = SampleData();
		$visaDates = SampleDataVisa();	
	}
	$i = 0;	

	foreach($amountDates as $key => $value)
	{
		echo "Looking ".$key."...\n";
		// MaxValue and Amount 
		$year = explode('/',$key)[2]; 

		if ($year == 2017){
			$maxRecipleValue = 100;
			$receiptmaxAmount = 2;
		}
		else if ($year == 2018){
			$maxRecipleValue = 50;
			$receiptmaxAmount = 3;
		}
		else if ($year == 2019){
			$maxRecipleValue = 100;	
			$receiptmaxAmount = 4;
		}
		else if ($year == 2020){
			$maxRecipleValue = 100;	
			$receiptmaxAmount = 3;
		}
		else if ($year == 2021){
			$maxRecipleValue = 100;	
			$receiptmaxAmount = 3;	
		}
		else if ($year == 2022){
			$maxRecipleValue = 100;	
			$receiptmaxAmount = 3;	
		}
		else  
			echo "Year Error ". $year."<br>";
		
		echo $key."\n";
		

		while(1){
			//$isExceeded = (random_int(1,2) == 1) ? true : false;	

			$data = generate($value,$key,$maxRecipleValue,$receiptmaxAmount);
			$data["date"] = $key;			
			//if ($render == 1){
			//	renderData($data);
			//	exit;	
			//}		
			$diff = $value - $data["bigtotal"];
			echo $diff."\n";
			if ($diff < 0)
				$diff = $diff * -1;

			//$data["exceed"] = $isExceeded; // Probably only for render
			
			echo "DIFF: ".$diff."\n";
			if ( $diff < 5){				
				$data = generateVisa($data,$visaDates[$key]);				
				break;					
			}						
		}		
		echo "Inserting ".$key."\n";
		insertData($data,$key);	
		$i++;						
	}
}

GO();

?>