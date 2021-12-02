<?php 

function _createPO($items,$author)
{
	if(count($items) == 0){
		return null;
	}
	$db = getDatabase();

	$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($items[0]["PRODUCTID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res == false)
		return null;
	$vendorid = $res["VENDID"];

	$autoPromo = autoPromoForVendor($vendorid);

	$dbBLUE = getDatabase();
	$now = date("Y-m-d H:i:s");

	$sql = "SELECT VENDNAME,VENDNAME1,TAX FROM APVENDOR WHERE VENDID = ?";
	$req = $dbBLUE->prepare($sql); 
	$req->execute(array($vendorid));
	$vendor = $req->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT num1 FROM SYSDATA where sysid = 'PO'";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array());	
	$num1 = $req->fetch(PDO::FETCH_ASSOC)["num1"];
	$newID = intval($num1);
	$identifier = sprintf("PO%013d",$newID);

	// Increment gen ID for Next	
	$incremented = $newID + 1;
	$sql = "UPDATE SYSDATA set num1 = ? where sysid = 'PO'"; 
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($incremented));

	$PONUMBER = $identifier;
	$VENDID = $vendorid;
	$VENDNAME = $vendor["VENDNAME"];
	$VENDNAME1 = $vendor["VENDNAME1"];
	$PODATE = $now;
	$LOCID = 'WH2';
	$USERADD = $author;
	$DATEADD = $now;
	$VAT_PERCENT = $vendor["TAX"];
	$PCNAME = "APPLICATION";
	$CURR_RATE = "1";
	$CURRID = "USD";
	$EST_ARRIVAL = $now;
	$REQUIRE_DATE = $now;
	$DISC_PERCENT = 0;
	$BASECURR_ID = "USD";
	$PURCHASE_AMT = 0;
	$VAT_AMT = 0;
	$CURRENCY_AMOUNT = 0;

	$sql = "INSERT INTO POLOCATION (PONUMBER,VENDID,USERADD,DATEADD,
																	TOADDRESS1,TOVENDID,TOPHONE1,TOFAXNO,TOCOUNTRY,
																	TOCITY,ADDRESS1,COUNTRY,PHONE1,FAXNO,CITY
																 ) VALUES (?,?,?,getdate(),
																 					'','','','','','','','','','','')";
	$req = $db->prepare($sql);
	$req->execute(array($PONUMBER,$vendorid,$USERADD)); 

			
	foreach($items as $item)
	{
		if (!isset($item["DISCOUNT"])) // TO CLEAN 
			$item["DISCOUNT"] = "0";
		if (!isset($item["ORDER_QTY"])) // TO CLEAN 
			$item["ORDER_QTY"] = $item["ORDERQTY"];


		$sql = "SELECT TOP(1) TRANCOST,DATEADD FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";		
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res != false){	
			$TRANCOST = $res["TRANCOST"];	
		}else{
			$sql = "SELECT  LASTCOST,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			$TRANCOST = $res["LASTCOST"];				
		}
		
		$TRANDISC = $item["DISCOUNT"];
		
		if ($TRANDISC != null && $TRANDISC != "0"){
			$calculatedCost =  $TRANCOST - ($TRANCOST * ($TRANDISC / 100));
		}			
		else{
			$calculatedCost =  $TRANCOST;
		} 
			
		$vat = ($calculatedCost * ($VAT_PERCENT / 100)) * $item["ORDER_QTY"];
		$price =   $calculatedCost; 
		$PURCHASE_AMT += $price * $item["ORDER_QTY"] + $vat; 
		$VAT_AMT += $vat;
	}
	 $CURRENCY_VATAMOUNT = $VAT_AMT;
	 $CURRENCY_AMOUNT = $PURCHASE_AMT;// + $VAT_AMT;

	 $sql = "INSERT POHEADER (
		PONUMBER,VENDID,VENDNAME,VENDNAME1,PODATE,
		LOCID,PURCHASE_AMT,USERADD,DATEADD,VAT_PERCENT,
		PCNAME,CURR_RATE,CURRID,EST_ARRIVAL,REQUIRE_DATE,
		VAT_AMT,DISC_PERCENT,BASECURR_ID,CURRENCY_VATAMOUNT,
		NOTES,REFERENCE,POSTATUS,CURRENCY_AMOUNT) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$req =$dbBLUE->prepare($sql);	


	$params = array($PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PODATE,
					$LOCID,$PURCHASE_AMT,$USERADD,$DATEADD,$VAT_PERCENT,					
					$PCNAME,$CURR_RATE,$CURRID,$EST_ARRIVAL,$REQUIRE_DATE,					
					$VAT_AMT,$DISC_PERCENT,$BASECURR_ID,$CURRENCY_VATAMOUNT,"AUTOVALIDATED",
					"","",$CURRENCY_AMOUNT);
	$req->execute($params);

	$line = 1;
	foreach($items as $item)
	{
		if (!isset($item["DISCOUNT"])) // TO CLEAN 
			$item["DISCOUNT"] = "0";
		if (!isset($item["ORDER_QTY"])) // TO CLEAN 
			$item["ORDER_QTY"] = $item["ORDERQTY"];

		$sql = "SELECT TOP(1) TRANCOST,DATEADD FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";		
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);


		$sql = "SELECT  LASTCOST,COST,DISCABLE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res2 = $req->fetch(PDO::FETCH_ASSOC);

		if ($res != false){	
			$TRANCOST = $res["TRANCOST"];	
		}else{			
			$TRANCOST = $res2["LASTCOST"];		
		}
		$DISCABLE = $res2["DISCABLE"];

		if(isset($item["ALGOQTY"]))
			$ALGOQTY = $item["ALGOQTY"];
		else
			$ALGOQTY = $item["REQUEST_QUANTITY"];
		
		
		$REASON = "";
		if (isset($item["REASON"]))
			$REASON = $item["REASON"];

		
		// PATCH SUPPLYRECORD WITH ITEMREQUEST
		if (isset($item["SPECIALQTY"]) && $item["SPECIALQTY"] != "0"){
			$QUANTITY = $item["SPECIALQTY"];
			$REASON = $item["REASON"];
		}			
		else if (isset($item["ORDER_QTY"]))
			$QUANTITY = $item["ORDER_QTY"];
		else
			$QUANTITY = $item["REQUEST_QUANTITY"];
		//
	
		$PURCHASE_DATE = $now;
		$PRODUCTID = $item["PRODUCTID"];
		$ORDER_QTY = $QUANTITY;
		$DATEADD = $now;

		$sql = "SELECT PRODUCTNAME,PRODUCTNAME1,COST,ONHAND 
						FROM ICPRODUCT  
						WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"])); 
		$newitem = $req->fetch(PDO::FETCH_ASSOC);

		$PRODUCTNAME = $newitem["PRODUCTNAME"];
		$PRODUCTNAME1 = $newitem["PRODUCTNAME1"];
		$CURRENTONHAND = $newitem["ONHAND"];

		$CURRENCY_COST = floatval($TRANCOST) *  floatval( (100 - $item["DISCOUNT"]) / 100);
		$CURRENCY_AMOUNT = floatval($CURRENCY_COST) * floatval($QUANTITY);	

		$STKFACTOR = "1.00000";
		$BASECURR_ID = "USD";
		$VATABLE = "Y";
		$TRANUNIT = "UNIT";
		$TRANFACTOR = "1.00000";
		$STKUNIT = "UNIT";
		$USERADD = blueUser($author);
		$CURRID = "USD";
		$CURR_RATE = "1";
		$WEIGHT = "1.00000";
		$OLDWEIGHT = "1.00000";
		$RECEIVE_QTY = "0.00000";

		$TRANDISC = 0;
		if ($DISCABLE == 1)
		{
			if (isset($item["DISCOUNT"]))			
				$TRANDISC = $item["DISCOUNT"];
			else if ($autoPromo != "0")
				$TRANDISC = $autoPromo;	
		}
		
			
		$EXTCOST = $CURRENCY_AMOUNT;		
		
		$RECEIVE_QTY = "0.0000";
		$COMMENT = "";
		$POSTATUS = "";
		$COST_ADD = "0.0000";
		$DIMENSION = "0.0000";

		$FILEID = "";
		$COST_CENTER = "";
		$INVENTORYACC = "";
		$QTY_OVORORDER = "0.0000";
		$FREIGHT_SG = "0.0000";



		$sql = "INSERT INTO PODETAIL (
		PONUMBER,VENDID,VENDNAME,VENDNAME1,PURCHASE_DATE, 
		PRODUCTID,LOCID,PRODUCTNAME,PRODUCTNAME1,ORDER_QTY, 	
		TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,TRANDISC,
		TRANCOST,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,	
		WEIGHT,OLDWEIGHT,USERADD,DATEADD,TRANLINE,
		VATABLE,VAT_PERCENT,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,
		RECEIVE_QTY,COMMENT,POSTATUS,COST_ADD,DIMENSION,
		FILEID,COST_CENTER,INVENTORYACC,QTY_OVERORDER,FREIGHT_SG,
		PPSS_ORDER_QTY,PPSS_QTYCOMMENT) 
		VALUES (?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?)"; 

		$req = $dbBLUE->prepare($sql);
		$params = array(
		$PONUMBER,$VENDID, $VENDNAME, $VENDNAME, $PURCHASE_DATE,
		$PRODUCTID, $LOCID,$PRODUCTNAME,$PRODUCTNAME1, $ORDER_QTY, 
		$TRANUNIT, $TRANFACTOR, $STKUNIT, $STKFACTOR, $TRANDISC,
		$TRANCOST, $EXTCOST, $CURRENTONHAND, $CURRID, $CURR_RATE,
		$WEIGHT, $OLDWEIGHT, $USERADD, $DATEADD, $line, 
		$VATABLE, $VAT_PERCENT,$BASECURR_ID, $CURRENCY_AMOUNT,$CURRENCY_COST,
		$RECEIVE_QTY,$COMMENT,$POSTATUS,$COST_ADD,$DIMENSION, 
		$FILEID,$COST_CENTER,$INVENTORYACC,$QTY_OVORORDER,$FREIGHT_SG,
		$ALGOQTY,$REASON 
		);

		$debug = var_export($params, true);
		error_log($debug);

		$req->execute($params);				
		$line++;
	}
	return $PONUMBER;
}

function _receivePO($PONumber,$author)
{		
    $db = getDatabase();
    $today = date('Y-m-d');


    $sql = "SELECT NUM3 FROM SYSDATA WHERE sysid = 'PO'";
    $req = $db->prepare($sql);
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $PONUM = $res["NUM3"];  
    $sql = "UPDATE SYSDATA SET NUM3=NUM3+1 WHERE ltrim(rtrim(SYSID))='PO'";
    $req = $db->prepare($sql);
    $req->execute(array());


    $sql = "SELECT NUM1 FROM SYSDATA WHERE sysid = 'AP'";
    $req = $db->prepare($sql);
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $APNUM = $res["NUM1"];
    $sql = "UPDATE SYSDATA set NUM1 = NUM1 +1  WHERE sysid = 'AP'";
    $req = $db->prepare($sql);
    $req->execute(array());

    $sql = "SELECT GLNO FROM GLSYS";
    $req = $db->prepare($sql);
    $req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $GLNUM = $res["GLNO"];

    $sql = "UPDATE GLSYS set GLNO = GLNO + 1";
    $req = $db->prepare($sql);
    $req->execute(array());

	$sql = "SELECT * FROM POHEADER WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($PONumber));
	$PORef = $req->fetch(PDO::FETCH_ASSOC);

	if (floatval($PORef["VAT_PERCENT"])  > 0.0)
		$HAVEVAT = true;
	else
		$HAVEVAT = false;

	$theVENDID = $PORef["VENDID"];
	$theVENDNAME = $PORef["VENDNAME"];
	$theVENDNAME1 = $PORef["VENDNAME1"];
	$theVATAMOUNT =  $PORef["CURRENCY_VATAMOUNT"];
	$theTOTALAMOUNT = $PORef["CURRENCY_AMOUNT"];
	$theVATPERCENT = $PORef["VAT_PERCENT"];


	$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($PONumber));
	$items = $req->fecthAll(PDO::FETCH_ASSOC);

	$VENDID =  $theVENDID;
	$RECEIVENO =  "RP00000000000".$PONUM;
	$VOUCHERNO =  "VO00000000000".$APNUM;
	$TRANDATE = $today;
	$DUEDATE = $today;
	$VENDNAME = $theVENDNAME; 
	$VENDNAME1 = $theVENDNAME1; 
	$TO_INVOICE =  "Y";
	$VAT_AMT =  $PORef["VAT_AMT"]; 
	$VAT_PERCENT = $PORef["VAT_PERCENT"];
	$INV_AMT =  $PORef["CURRENCY_AMOUNT"];
	$PAID_AMT =  "0";
	$BALANCE =  $PORef["CURRENCY_AMOUNT"];
	$PCNAME =  "Application";
	$CURR_RATE = "1";
	$REMARK =  "Note";
	$TERMID =  null;
	$TERM_DAYS = 0;
	$TERM_DISC =  0;
	$TERM_NET =   0;
	$VOUCHER_DESC = $PONumber;
	$VOUCHER_DESC1 = null;
	$REFERENCE =  $PONumber;
	$VATNO =   null;
	$PONUMBER =  $PONumber;
	$APACCOUNT =  "20000";
	$DISC_PERCENT =  $PORef["DISC_PERCENT"];
	$TAXACC_OUT =  "16100";
	$DISC_AMT =   0;
	$FILE  = null;
	$EXPENSE_TYPE =  null;
	$POCLEARINGACC = null;
	$PODATE = $today;
	$RECEIVEDATE = $today;
	$LOC  =  'WH2';
	$CURR_ID =   "USD";
	$BASECURR_ID =  "USD";
	$CURRENCY_AMOUNT =  $PORef["CURRENCY_AMOUNT"]; 
	$CURRENCY_VATAMOUNT =  $PORef["CURRENCY_VATAMOUNT"]; 
	$SHIP_REFERENCE = null;
	$DATEADD =  $today;
	$USERADD = blueUser($author);
 

	$sql = "INSERT INTO PORECEIVEHEADER(
	VENDID,RECEIVENO,VOUCHERNO,TRANDATE,DUEDATE,   
	VENDNAME,VENDNAME1,TO_INVOICE,VAT_AMT,VAT_PERCENT,
	INV_AMT,PAID_AMT,BALANCE,PCNAME,CURR_RATE,  
	REMARK,TERMID,TERM_DAYS,TERM_DISC,TERM_NET,VOUCHER_DESC, 
	VOUCHER_DESC1,REFERENCE,VATNO, PONUMBER,APACCOUNT, 
	DISC_PERCENT,TAXACC_OUT,DISC_AMT,FILEID,EXPENSE_TYPE,
	POCLEARINGACC,PODATE,RECEIVEDATE,LOCID,CURR_ID, 
	BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_VATAMOUNT,SHIP_REFERENCE,DATEADD, 
	USERADD) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
					 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
					 ?)";
	

	$req = $db->prepare($sql);
	$req = $db->execute(array(
	$VENDID,$RECEIVENO,$VOUCHERNO,$TRANDATE,$DUEDATE,
	$VENDNAME,$VENDNAME1,$TO_INVOICE,$VAT_AMT,$VAT_PERCENT,
	$INV_AMT,$PAID_AMT,$BALANCE,$PCNAME,$CURR_RATE,
	$REMARK,$TERMID,$TERM_DAYS,$TERM_DISC,$TERM_NET,
	$VOUCHER_DESC,$VOUCHER_DESC1,$REFERENCE,$VATNO,$PONUMBER,
	$APACCOUNT,$DISC_PERCENT,$TAXACC_OUT,$DISC_AMT,$FILE,
	$EXPENSE_TYPE,$POCLEARINGACC,$PODATE,$RECEIVEDATE,$LOC,
	$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,$SHIP_REFERENCE,
	$DATEADD,$USERADD));


	$line = 0; 
	foreach($items as $item)
    {

		if (!isset($item["ORDER_QTY"])) // TO CLEAN 
			$item["ORDER_QTY"] = $item["ORDERQTY"];
		$line++;

		$VENDID =      $PORef["VENDID"];
		$RECEIVENO =   "RP00000000000".$PONUM;
		$VENDNAME =    $PORef["VENDNAME"];
		$VENDNAME1 =   $PORef["VENDNAME1"];
		$PONUMBER =    $PONumber;
		$TRANDATE =    $today;
		$APSTATUS =    null;
		$TRANCOST =     $item["TRANCOST"]; 
		$PURCHASEDATE = $item["PURCHASE_DATE"];
		$LINENUM =      $line;
		$PRODUCTID =    $item["PRODUCTID"];
		$PRODUCTNAME =  $item["PRODUCTNAME"]; 
		$PRODUCTNAME1 = $item["PRODUCTNAME1"];
		$TRANQTY =     $item["ORDER_QTY"]; 
		$DIMENSION =   0;
		$FILEID =   null;
		$COST_CENTER =   null;
		$INVENTORY_ACC =    "17000";
		$POCLEARING_ACC =  "21400";
		$EXTCOST =   $item["EXTCOST"];
		$LOCID =     "WH2";
		$QTY_ORDER =  $item["ORDER_QTY"];
		$VATABLE =    $item["VATABLE"];
		$VAT_PERCENT = $item["VAT_PERCENT"];
		$LINE_NOTE =    $today;
		$REQUIREDATE =  $today;
		$TRANDISC =     $item["TRANDISC"];
		$FROM_SERIAL =  null;
		$TO_SERIAL =    null;
		$TRANUNIT =     "UNIT";
		$TRANFACTOR =   "1";
		$CURRID_COSTADD =  null;
		$OPERATIONBASE =   null;
		$CURRID_EXCHRATE = "1";
		$CURRENCY_AMOUNT = $item["CURRENCY_AMOUNT"];
		$COST_ADD =  "0";
		$CURR_ID =   "USD";
		$BASECURR_ID = "USD";
		$CURRENCY_COST = $item["CURRENCY_COST"];
		$CURRENCY_COST_ADD =  "0";
		$ORIGINAL_QTY =  "0";
		$QTY_PACK =     "0";
		$PACK_WEIGHT =  "0";
		$CHAMBERNG_QTY = "0";
		$WET_QTY =   "0";
		$WET_PERCENT = "0";
		$DATEADD =  $today; 
		$USERADD =  blueUser($author);



			$sql = "INSERT INTO PORECEIVEDETAIL(
		VENDID,RECEIVENO,VENDNAME,VENDNAME1,PONUMBER,   
		TRANDATE,APSTATUS,TRANCOST,PURCHASEDATE,LINENUM,     
		PRODUCTID,PRODUCTNAME,PRODUCTNAME1,TRANQTY,DIMENSION,  
		FILEID,COST_CENTER,INVENTORY_ACC,POCLEARING_ACC,EXTCOST,    
		LOCID,QTY_ORDER,VATABLE,VAT_PERCENT,LINE_NOTE,   
		REQUIREDATE,TRANDISC,FROM_SERIAL,TO_SERIAL,   
		TRANUNIT,TRANFACTOR,CURRID_COSTADD,OPERATIONBASE,CURRID_EXCHRATE, 
		CURRENCY_AMOUNT,COST_ADD,CURR_ID,BASECURR_ID,CURRENCY_COST, 
		CURRENCY_COST_ADD,ORIGINAL_QTY,QTY_PACK,PACK_WEIGHT,CHAMBERNG_QTY, 
		WET_QTY,WET_PERCENT,DATEADD,USERADD) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array(
		$VENDID,$RECEIVENO,$VENDNAME,$VENDNAME1,$PONUMBER,
		$TRANDATE,$APSTATUS,$TRANCOST,$PURCHASEDATE,$LINENUM,
		$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$TRANQTY,$DIMENSION,
		$FILEID,$COST_CENTER,$INVENTORY_ACC,$POCLEARING_ACC,$EXTCOST,
		$LOCID,$QTY_ORDER,$VATABLE,$VAT_PERCENT,$LINE_NOTE,
		$REQUIREDATE,$PO_COLID,$TRANDISC,$FROM_SERIAL,$TO_SERIAL,
		$TRANUNIT,$TRANFACTOR,$CURRID_COSTADD,$OPERATIONBASE,$CURRID_EXCHRATE,
		$CURRENCY_AMOUNT,$COST_ADD,$CURR_ID,$BASECURR_ID,$CURRENCY_COST,
		$CURRENCY_COST_ADD,$ORIGINAL_QTY,$QTY_PACK,$PACK_WEIGHT,$CHAMBERNG_QTY,
		$WET_QTY,$WET_PERCENT,$DATEADD,$USERADD
		));
	}

	$sql = "UPDATE POHEADER  set RECEIVE_AMT = RECEIVE_AMT + ?, 
							 CURRENCY_RECEIVEAMOUNT = CURRENCY_RECEIVEAMOUNT+ ?,
							 [POSTATUS] = ?  WHERE [PONUMBER]= ?";
	$req = $db->prepare($sql);
	$req->execute(array($CURRENCY_AMOUNT,$CURRENCY_AMOUNT,$PONumber));

	$sql = "UPDATE APVENDOR set TOTALREC = TOTALREC + ?,
							LASTRECAMT = ?,
							LASTRECDATE = ?,
							BALANCE = BALANCE +?,
							LASTRECDOC = ?  
							WHERE VENDID=?";

	$req = $db->prepare($sql);
	$req->execute(array($CURRENCY_AMOUNT,$CURRENCY_AMOUNT,$today,
					$CURRENCY_AMOUNT,$PONumber,$theVENDID));



	$DOCNUM =   "RP00000000000".$PONUM;
	$FLOCID =    "WH2";
	$TLOCID =    null;
	$REFERENCE =   "Receive PO " . $PONumber;
	$TRANDATE =    $today;
	$TRANTYPE =    "R";
	$TOTAL_AMT =   $PORef["CURRENCY_AMOUNT"]; 
	$PCNAME =    "Application";
	$CURRID =    "USD";
	$CURR_RATE =   "1";
	$CUSTID =    null;
	$VENDID =    $theVENDID;
	$DISC_PERCENT =   "0";
	$VAT_PERCENT =   "0";
	$APPLID =    "PO";
	$FILEID =     null;
	$TOFILEID =    null;
	$IS_CHANGE_AVGCOST = null;
	$REF_DOCUMENT =  null;
	$IS_PROCCESS =   null;
	$POSSTAT =       //
	$RECEIVENO =   null;
	$CHANGE_REWARD =  null;
	$TOTAL_STOCKREWARD = null;
	$TOTAL_MONEYREWARD = null;
	$ARACC =    null;
	$BASECURR_ID =   "USD";
	$CURRENCY_AMOUNT = $PORef["CURRENCY_AMOUNT"];
	$PURPOSE_ISSUE =  null;
	$JOB_ID =  null;
	$USERADD =    blueUser($author);
	$DATEADD =   $today;

	$sql = "INSERT INTO ICTRANHEADER (
	DOCNUM,FLOCID,TLOCID,REFERENCE,TRANDATE, 
	TRANTYPE,TOTAL_AMT,PCNAME,CURRID,CURR_RATE,     
	CUSTID,VENDID,DISC_PERCENT,VAT_PERCENT,APPLID,      
	FILEID,TOFILEID,IS_CHANGE_AVGCOST,REF_DOCUMENT,IS_PROCCESS,     
	POSSTAT,RECEIVENO,CHANGE_REWARD,TOTAL_STOCKREWARD,TOTAL_MONEYREWARD,   
	ARACC,BASECURR_ID,CURRENCY_AMOUNT,PURPOSE_ISSUE,JOB_ID,      
	USERADD,DATEADD) 
	values 
	(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	 ?,?)";
	$req = $db->prepare($sql);
	$req->execute(array(
	$DOCNUM,$FLOCID,$TLOCID,$REFERENCE,$TRANDATE,
	$TRANTYPE,$TOTAL_AMT,$PCNAME,$CURRID,$CURR_RATE,
	$CUSTID,$VENDID,$DISC_PERCENT,$VAT_PERCENT,$APPLID,
	$FILEID,$TOFILEID,$IS_CHANGE_AVGCOST,$REF_DOCUMENT,$IS_PROCCESS,
	$POSSTAT,$RECEIVENO,$CHANGE_REWARD,$TOTAL_STOCKREWARD,$TOTAL_MONEYREWARD,
	$ARACC,$BASECURR_ID,$CURRENCY_AMOUNT,$PURPOSE_ISSUE,$JOB_ID,
	$USERADD,$DATEADD));

	$line = 0;
	foreach($items as $item)
	{

		if (!isset($item["ORDER_QTY"])) // TO CLEAN 
				$item["ORDER_QTY"] = $item["ORDERQTY"];

		$sql = "SELECT CATEGORYID FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$res = $req->execute(array($item["PRODUCTID"]));

		$line++;

		$DOCNUM = "VO00000000000" + $APNUM;
		$PRODUCTID = $item["PRODUCTID"]; 
		$LOCID = "WH2"; 
		$CATEGORYID = $res["CATEGORYID"];
		$CLASSID = "LOCAL";
		$BATCHNO = null;
		$SERIAL = null;
		$TIERID = null;
		$TRANDATE = $today; 
		$TRANTYPE = "R";
		$LINENUM = $line;
		$PRODUCTNAME = $item["PRODUCTNAME"];
		$PRODUCTNAME1 = $item["PRODUCTNAME1"]; 
		$REFERENCE = "Receive PO " . $PONumber;
		$COMMENT = null;
		$TRANQTY = $item["ORDER_QTY"];
		$TRANUNIT = "UNIT";
		$TRANFACTOR = "1";
		$STKUNIT =  "UNIT";
		$STKFACTOR =  "1";
		$TRANDISC = $item["TRANDISC"];
		$TRANTAX = $item["VAT_PERCENT"];
		$TRANCOST = $item["TRANCOST"];
		$TRANPRICE = $item["TRANCOST"];
		$PRICE_ORI = $item["TRANCOST"];
		$EXTPRICE = $item["EXTPRICE"];
		$EXTCOST = $item["EXTCOST"];
		$CURRENTONHAND = $item["CURRENTONHAND"];
		$CURRID = "USD";
		$CURR_RATE = "1";
		$CUSTID = null;
		$VENDID = $theVENDID;
		$WEIGHT = "1";
		$OLDWEIGHT = "0";
		$APPLID = "PO";
		$CURRENTCOST = $item["TRANCOST"];
		$LASTCOST = "0";
		$COST_ADD = "0";
		$COST_RIEL = "0";
		$LINK_LINE = $line;
		$ICCLEARING_ACC =  "21400";
		$INVENTORY_ACC = "17000";
		$COSG_ACC = null;
		$DIMENSION = "1";
		$FILEID = null;
		$IS_CHANGE_AVGCOST = null;
		$WASTE_QTY = 0;
		$PRODUCT_PRODUCTID = null;
		$IS_PROCCESS = null;
		$EXPIRED_DATE = null;
		$TRANQTY_NEW = $item["ORDER_QTY"];
		$TRANCOST_NEW = $item["TRANCOST"]; 
		$TRANEXTCOST_NEW =  $item["ORDER_QTY"] * $item["TRANCOST"];
		$LINE_DISCAMT = "0";
		$COST_CENTER = null;
		$LINE_NOTE = null;
		$CASE_PRODUCTID = null;
		$CASE_QTY =  "0";
		$POSSTAT = "0";
		$DECL1 = "0";
		$FOB = "0";
		$FREIGHT = "0";
		$INSUR = "0";
		$DECL2 = "0";
		$DUTY_VAT = "0";
		$MCC_EXP = "0";
		$LDC = "0";
		$FREIGHT_SG = "0";
		$INSUR_SG = "0";
		$RECEIVENO = "0";
		$OTHER_PRICE = "0";	
		$RETURN_DATE = null;
		$BORROW_NUMBER = null;
		$CHANGE_REWARD = null;
		$MONEY_REWARD = null;
		$IS_MONEY_REWARD = null;
		$PACK_RECEIVE = "0";
		$PACK_UNIT = null;
		$REWARD_UNIT = null;
		$COST_METHOD = "AG";
		$BASECURR_ID = "USD";
		$CURRENCY_AMOUNT = $item["CURRENCY_AMOUNT"];
		$CURRENCY_COST = $item["CURRENCY_COST"];
		$CURRENCY_COST_ADD = "0";
		$CURRENCY_EXTPRICE = "0";
		$CURRENCY_PRICE = "0";
		$FF_LF_INDEX = "0";
		$PURPOSE_ISSUE = "0";
		$JOB_ID = "0";
		$ROW_ID = "0";
		$MAIN_PRODUCTID = $item["PRODUCTID"];
		$USERADD = blueUser($author);
		$DATEADD = $today;


		$sql = "INSERT INTO ICTRANDETAIL (
		DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,    
		BATCHNO,SERIAL,TIERID,TRANDATE,TRANTYPE,     
		LINENUM,PRODUCTNAME,PRODUCTNAME1,REFERENCE,COMMENT,     
		TRANQTY,TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,    
		TRANDISC,TRANTAX,TRANCOST,TRANPRICE,PRICE_ORI,    
		EXTPRICE,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,    
		CUSTID,VENDID,WEIGHT,OLDWEIGHT,APPLID,     
		CURRENTCOST,LASTCOST,COST_ADD,COST_RIEL,LINK_LINE,  
		ICCLEARING_ACC,INVENTORY_ACC,COSG_ACC,DIMENSION,FILEID,      
		IS_CHANGE_AVGCOST,WASTE_QTY,PRODUCT_PRODUCTID,IS_PROCCESS,EXPIRED_DATE,    
		TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,LINE_DISCAMT,COST_CENTER,    
		LINE_NOTE,CASE_PRODUCTID,CASE_QTY,POSSTAT,DECL1,      
		FOB,FREIGHT,INSUR,DECL2,DUTY_VAT,     
		MCC_EXP,LDC,FREIGHT_SG,INSUR_SG,RECEIVENO,    
		OTHER_PRICE,RETURN_DATE,BORROW_NUMBER,CHANGE_REWARD,   
		MONEY_REWARD,IS_MONEY_REWARD,PACK_RECEIVE,PACK_UNIT,REWARD_UNIT,    
		COST_METHOD,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_COST_ADD,  
		CURRENCY_EXTPRICE,CURRENCY_PRICE,FF_LF_INDEX,PURPOSE_ISSUE,JOB_ID,     
		ROW_ID,MAIN_PRODUCTID,USERADD,DATEADD) 
		values(
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?)";

		$req = $db->prepare($sql);

		$req->execute(
		$DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID, 
		$BATCHNO,$SERIAL,$TIERID,$TRANDATE,$TRANTYPE, 
		$LINENUM,$PRODUCTNAME,$PRODUCTNAME1,$REFERENCE,$COMMENT, 
		$TRANQTY,$TRANUNIT,$TRANFACTOR,$STKUNIT,$STKFACTOR, 
		$TRANDISC,$TRANTAX,$TRANCOST,$TRANPRICE,$PRICE_ORI, 
		$EXTPRICE,$EXTCOST,$CURRENTONHAND,$CURRID,$CURR_RATE, 
		$CUSTID,$VENDID,$WEIGHT,$OLDWEIGHT,$APPLID, 
		$CURRENTCOST,$LASTCOST,$COST_ADD,$COST_RIEL,$LINK_LINE, 
		$ICCLEARING_ACC,$INVENTORY_ACC, $COSG_ACC, $DIMENSION,$FILEID, 
		$IS_CHANGE_AVGCOST,$WASTE_QTY,$PRODUCT_PRODUCTID,$IS_PROCCESS,$EXPIRED_DATE, 
		$TRANQTY_NEW,$TRANCOST_NEW,$TRANEXTCOST_NEW,$LINE_DISCAMT,$COST_CENTER, 
		$LINE_NOTE,$CASE_PRODUCTID,$CASE_QTY,$POSSTAT,$DECL1, 
		$FOB,$FREIGHT,$INSUR,$DECL2,$DUTY_VAT, 
		$MCC_EXP,$LDC,$FREIGHT_SG,$INSUR_SG,$RECEIVENO, 
		$OTHER_PRICE,$PO_COLID,$RETURN_DATE,$BORROW_NUMBER,$CHANGE_REWARD, 
		$MONEY_REWARD,$IS_MONEY_REWARD,$PACK_RECEIVE,$PACK_UNIT,$REWARD_UNIT, 
		$COST_METHOD,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,$CURRENCY_COST_ADD, 
		$CURRENCY_EXTPRICE,$CURRENCY_PRICE,$FF_LF_INDEX,$PURPOSE_ISSUE,$JOB_ID, 
		$ROW_ID,$MAIN_PRODUCTID,$USERADD,$DATEADD);
	}

	//$sql = "UPDATE SYSSETUPCURRENCY  set HAS_TRANSACTION = ? WHERE CURR_ID = ?"; NO NEED ?

	$VENDID =      $theVENDID;
	$VOUCHERNO =   "VO00000000000".$APNUM;
	$TRANDATE =     $today;
	$DUEDATE =      $today;
	$VENDNAME =     $theVENDNAME;
	$VENDNAME1 =     $theVENDNAME1;
	$APSTATUS =      null;
	$VAT_AMT =      $theVATAMOUNT; 
	$VAT_PERCENT =   $theVATPERCENT;
	$INV_AMT =      $theTOTALAMOUNT;
	$PAID_AMT =      "0";
	$BALANCE =      $theTOTALAMOUNT;
	$PCNAME =      "APPLICATION";
	$CURR_RATE =    "1";   
	$REMARK =      null;
	$TERMID =      null;
	$TERM_DAYS =     0;
	$TERM_DISC =     0;
	$TERM_NET =      0;
	$VOUCHER_DESC =    $PONumber;
	$VOUCHER_DESC1 = null;
	$REFERENCE =    $PONumber;
	$VATNO =     null;
	$PONUMBER =   $PONumber;
	$APACCOUNT =     "20000";
	$DISC_PERCENT =     "0";
	$TAXACC_OUT =    "16100";
	$FILEID =       null;
	$EXPENSE_TYPE = null;
	$DOCUMENTDATE = null;
	$LOCID =       "WH2";
	$CURR_ID =      "USD";
	$BASECURR_ID =   "USD";
	$CURRENCY_AMOUNT =   $theTOTALAMOUNT;
	$CURRENCY_VATAMOUNT =  $theVATAMOUNT;
	$CURRENCY_BALANCE =  $theTOTALAMOUNT;
	$CURRENCY_PAIDAMT =   "0";
	$DATEADD =   $today;
	$USERADD = 	blueUser($author);

	$sql =  "INSERT INTO APHEADER (
	VENDID,VOUCHERNO,TRANDATE,DUEDATE,VENDNAME,    
	VENDNAME1,APSTATUS,VAT_AMT,VAT_PERCENT,INV_AMT,     
	PAID_AMT,BALANCE,PCNAME,CURR_RATE,REMARK,     
	TERMID,TERM_DAYS,TERM_DISC,TERM_NET,VOUCHER_DESC,
	VOUCHER_DESC1,REFERENCE,VATNO,PONUMBER,APACCOUNT,    
	DISC_PERCENT,TAXACC_OUT,FILEID,EXPENSE_TYPE,DOCUMENTDATE,   
	LOCID,CURR_ID,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_VATAMOUNT,
	CURRENCY_BALANCE,CURRENCY_PAIDAMT,DATEADD,USERADD) 
	values (
	?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$req = $db->prepare($sql);
	$req->execute(array($VENDID,$VOUCHERNO,$TRANDATE,$DUEDATE,$VENDNAME,
	$VENDNAME1,$APSTATUS,$VAT_AMT,$VAT_PERCENT,$INV_AMT,
	$PAID_AMT,$BALANCE,$PCNAME,$CURR_RATE,$REMARK,
	$TERMID,$TERM_DAYS,$TERM_DISC,$TERM_NET,$VOUCHER_DESC,
	$VOUCHER_DESC1,$REFERENCE,$VATNO,$PONUMBER,$APACCOUNT,
	$DISC_PERCENT,$TAXACC_OUT,$FILEID,$EXPENSE_TYPE,$DOCUMENTDATE,
	$LOCID,$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,
	$CURRENCY_BALANCE,$CURRENCY_PAIDAMT,$DATEADD,$USERADD
	));


	foreach($items as $item)
	{
		$sql = "UPDATE PODETAIL 
		 		set RECEIVE_DATE = ?,
				[RECEIVE_QTY] = RECEIVE_QTY + ?,
				[POSTATUS] = 'C',
				[QTY_OVERORDER] = 0,		
		 		WHERE PONUMBER = ? 
		 		AND PRODUCTID =?";
		 $req = $db->prepare($sql);
		 $req->execute(array($today, $item["ORDER_QTY"],$PONumber,$item["PRODUCTID"]));		

		$LOCCOST = $item["TRANCOST"];
		$LOCLASTCOST = $item["TRANCOST"];
		$LOCONHAND = $item["ORDER_QTY"];
		$TOTALRECEIVE = $item["ORDER_QTY"];
		$LASTRECEIVE = $today;
		$USEREDIT = blueUser($author);
		$DATEEDIT = $today;
		$LOCID = $item["LOCID"];
		$PRODUCTID = $item["PRODUCTID"];

		$sql = "UPDATE ICLOCATION 
				set LOCCOST = ?,
				LOCLASTCOST = ?,
				RECENTLOCCOST = ?,
				LOCONHAND = LOCONHAND + ?,
				TOTALRECEIVE = TOTALRECEIVE + ?,
				LASTRECEIVE = ?,
				USEREDIT = ?,
				DATEEDIT = ?  
				WHERE LOCID = ? 
				AND PRODUCTID = ?";

		$req = $db->prepare($sql);
		$req->execute(array(
			$LOCCOST,$LOCLASTCOST,$LOCONHAND,$TOTALRECEIVE,$LASTRECEIVE,
			$USEREDIT,$DATEEDIT,$LOCID,$PRODUCTID));

		$ONHAND = $item["ORDER_QTY"];
		$LASTCOST = $item["TRANCOST"];
		$TOTALRECEIVE = $item["ORDER_QTY"];
		$LASTRECEIVEDATE = $today;
		$COST = $item["TRANCOST"];
		$PRODUCTID = $item["PRODUCTID"];
		$sql = "UPDATE ICPRODUCT
			set ONHAND = ONHAND + ?,
			LASTCOST = ?,
			TOTALRECEIVE = TOTALRECEIVE + ?,
			LASTRECEIVEDATE = ?,
			COST = ? 
			WHERE [PRODUCTID]= ?";
		$req = $db->prepare($sql);
		$req->execute($ONHAND,$LASTCOST,$TOTALRECEIVE,$LASTRECEIVEDATE,$COST,$PRODUCTID);


		$LASTCOST = $item["TRANCOST"];
		$LASTRECEIVE = $item["ORDER_QTY"];
		$TOTALRECEIVE = $item["ORDER_QTY"];
		$USEREDIT = blueUser($author);
		$DATEEDIT = $today;
		$PRODUCTID = $item["PRODUCTID"];
		$VENDID = $item["VENDID"];
		$sql = "UPDATE ICVENDOR set LASTCOST = ?, 
								 LASTRECEIVE = ?, 
								 TOTALRECEIVE = TOTALRECEIVE + ?,
								  USEREDIT = ?, 
								  DATEEDIT = ?
								  WHERE PRODUCTID = ? AND VENDID =?";
		$req = $db->prepare($sql);
		$req->execute(array($LASTCOST,$LASTRECEIVE,$TOTALRECEIVE,$USEREDIT,$DATEEDIT,$PRODUCTID,$VENDID));							   

		$VENDID =  $theVENDID;
		$VOUCHERNO =  "VO00000000000" + $APNUM;
		$VENDNAME = $theVENDNAME; 
		$VENDNAME1 = $theVENDNAME1;
		$PONUMBER =  $PONumber;
		$TRANDATE =  $today;
		$APSTATUS = null;
		$TRANCOST =   $item["TRANCOST"]; //  Last cost of Item
		$PURCHASEDATE = $today;
		$LINENUM =   $line;
		$PRODUCTID =  $item["PRDUCTID"];
		$PRODUCTNAME = $item["PRODUCTNAME"]; 
		$PRODUCTNAME1 = $item["PRODUCTNAME1"]; 
		$TRANQTY =   $item["ORDER_QTY"];
		$DIMENSION =  0;
		$FILEID =    null;  
		$COST_CENTER =  null;
		$FREIGHTSG =  0;
		$INSURSG =   0;
		$TRANUNIT =   "UNIT";
		$TRANFACTOR =  "1";
		$CURR_ID =   "USD";
		$BASECURR_ID =  "USD";
		$CURRENCY_AMOUNT = $item["CURRENCY_AMOUNT"];
		$CURRENCY_COST = $item["CURRENCY_COST"];
		$AMOUNT =  $item["CURRENCY_AMOUNT"];
		$CURR_RATE =  "1";
		$DATEADD =   $today;
		$USERADD =   blueUser($author);

		$sql = "INSERT INTO APPO (
		VENDID,VOUCHERNO,VENDNAME,VENDNAME1,PONUMBER,    
		TRANDATE,APSTATUS,TRANCOST,PURCHASEDATE,LINENUM,     
		PRODUCTID,PRODUCTNAME,PRODUCTNAME1,TRANQTY,DIMENSION, 
		FILEID,COST_CENTER,FREIGHTSG,INSURSG,TRANUNIT,    
		TRANFACTOR,CURR_ID,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,   
		AMOUNT,CURR_RATE,DATEADD,USERADD) values (
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array(
		));
	}

	//****** IF VENDOR NOT VAT INSERT 2LINE (17000) AND (20000)***************************
	//****** IF VENDOR HAS VAT INSERT 3 LINE (17000) AND (16100) AND (20000) ********
	$theGLNO = date('y').date('m')."0000000".$GLNUM;

	$GLNO =     $theGLNO;
	$LINNO =    "1"; 
	$GLDESC =    "Receive PO ". $PONumber;
	$GLDATE =    $today;
	$GLYEAR =    date("Y");
	$GLMONTH =    date("m"); 
	$ACCNO =    "20000";
	$GLAMT =    $theTOTALAMOUNT; 
	$DEBIT =     "0";
	$CREDIT =    $theTOTALAMOUNT;
	$DOCNO =     "VO00000000000" + $APNUM;
	$USERADD =    blueUser($author);
	$DATEADD =    $today;
	$GLPOST =    "N";
	$GLTYPE =    "J"; 
	$APPID =     "PO";
	$REMARKS =    null;
	$CUSTID =    null;
	$VENDID =    $theVENDID;
	$FILEID =     null;
	$COST_CENTER =   null;
	$LOCID =     "WH2";

	//+GLTRAN (Account Number 20000)
	$sql = "INSERT INTO GLTRAN (
	GLNO,LINNO,GLDESC,GLDATE,GLYEAR    
	GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT    
	DOCNO,USERADD,DATEADD,GLPOST,GLTYPE     
	APPID,REMARKS,CUSTID,VENDID,FILEID     
	COST_CENTER,LOCID) 
	values (
	?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,
	?,?,?)";      

	if ($HAVEVAT)
	{
		//+GLTRAN (Account Number 16100)


		$GLNO =    $theGLNO;
		$LINNO =   "2";  // Line 1-2 or hav VTA 1-2-3
		$GLDESC =    "Receive PO ". $PONumber;
		$GLDATE =    $today;
		$GLYEAR =    date('Y');
		$GLMONTH =  date('m');
		$ACCNO =     "16100";
		$GLAMT =    $theVATAMOUNT;
		$DEBIT =     $theVATAMOUNT;
		$CREDIT =    0;
		$DOCNO =      "VO00000000000" + $APNUM;
		$USERADD =    blueUser($author);
		$DATEADD =    $today;
		$GLPOST =    "N";
		$GLTYPE =    "J";  
		$APPID =     "PO";
		$REMARKS =    null;
		$CUSTID =    null;
		$VENDID =    $theVENDID;
		$FILEID =     null;
		$COST_CENTER =   null;
		$LOCID =     "WH2";
		$sql = "
		INSERT INTO GLTRAN(
		GLNO,LINNO,GLDESC,GLDATE,GLYEAR,   
		GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,    
		DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,      
		APPID,REMARKS,CUSTID,VENDID,FILEID,     
		COST_CENTER,LOCID) values(
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,
		?,?,?)";   

	}

	//+GLTRAN (Account Number 17000)
	$GLNO =   $theGLNO;
	if ($HAVEVAT)
		$LINNO = 3;
	else 
	    $LINE = 2;

	$GLDESC =   "Receive PO ". $PONumber;
	$GLDATE =   $today;
	$GLYEAR =    date("Y"); 
	$GLMONTH =   date("m");
	$ACCNO =    "17000";
	$GLAMT =    $theVATAMOUNT;
	$DEBIT =     $theVATAMOUNT;
	$CREDIT =    0;
	$DOCNO =      "VO00000000000".$APNUM;
	$USERADD =    blueUser($author); 
	$DATEADD =    $today; 
	$GLPOST =     "N";
	$GLTYPE =    "J";  
	$APPID =     "PO";
	$REMARKS =    null;
	$CUSTID =    null;
	$VENDID =    $theVENDID;
	$FILEID =     null;
	$COST_CENTER =   null;
	$LOCID =     "WH2";

	$sql = "INSERT INTO GLTRAN(
	GLNO,LINNO,GLDESC,GLDATE,GLYEAR,    
	GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,    
	DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,    
	APPID,REMARKS,CUSTID,VENDID,FILEID,     
	COST_CENTER,LOCID)";

	//****** IF VENDOR NOT VAT INSERT 1 LINE (17000) ***********************
	//****** IF VENDOR HAS VAT INSERT 3 LINE (17000) AND (16100) AND (20000) ********

	//+APACCOUNT (Account Number 17000)
	$VENDID = $theVENDID;
	$VOUCHERNO = "VO00000000000" + $APNUM; 
	$TRANDATE = $today;
	$LINENUM =   "1";
	$ACCNO =       "17000";
	$AMOUNT = $theTOTALAMOUNT;
	$PERIOD = date("m");
	$YEAR = date("Y");
	$BATCH = null;
	$REFERENCE = //     Reference from Received PO
	$ACCNAME = //     Name Acount
	$ACCNAME1 = //     Name Account 1
	$STAT = null;
	$TYPE = null;
	$BATCHDATE = $today;
	$FILEID = null;
	$COST_CENTER = null;
	$LOCID = null;
	$COMMENT_ON_LINE = null;
	$CURR_TYPE =  null;
	$CURR_AMOUNT = $theTOTALAMOUNT;
	$CURR_RATE =     "1";
	$OPERATION_BASE = null;
	$BASECURR_ID = "USD";
	$CURR_ID = "USD";
	$USERADD = blueUser($author);
	$DATEADD =$today;


	$sql = "INSERT INTO APACCOUNT (
	VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,     
	AMOUNT,PERIOD,YEAR,BATCH,REFERENCE,    
	ACCNAME,ACCNAME1,STAT,TYPE,BATCHDATE,    
	FILEID,COST_CENTER,LOCID,COMMENT_ON_LINE,CURR_TYPE,    
	CURR_AMOUNT,CURR_RATE,OPERATION_BASE,BASECURR_ID,CURR_ID,    
	USERADD,DATEADD) values
	(?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?)";
	$req = $db->prepare($sql);
	$sql->execute(array(
	$VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
	$AMOUNT,$PERIOD,$YEAR,$BATCH,$REFERENCE,
	$ACCNAME,$ACCNAME1,$STAT,$TYPE,$BATCHDATE,
	$FILEID,$COST_CENTER,$LOCID,$COMMENT_ON_LINE,$CURR_TYPE,
	$CURR_AMOUNT,$CURR_RATE,$OPERATION_BASE,$BASECURR_ID,$CURR_ID,
	$USERADD,$DATEADD
	));


	$PAID_AMT = "";
	$DISC_AMT = "";
	$BALANCE = "";
	$CURRENCY_PAIDAMT = "";
	$CURRENCY_DISCAMT = "";
	$CURRENCY_BALANCE = "";
	$PAIDDATE = "";
	$VENDID = $theVENDID;
	$VOUCHERNO = "";

	$sql = "UPDATE APHEADER 
	set PAID_AMT = CONVERT([decimal](18,2),PAID_AMT+?,0),
	[DISC_AMT] = CONVERT([decimal](18,2),DISC_AMT+?,0),
	[BALANCE] = CONVERT([decimal](18,2),BALANCE-?,0),
	[CURRENCY_PAIDAMT] = CONVERT([decimal](18,2),CURRENCY_PAIDAMT+?,0),
	[CURRENCY_DISCAMT] = CONVERT([decimal](18,2),CURRENCY_DISCAMT+?,0),
	[CURRENCY_BALANCE] = CONVERT([decimal](18,2),CURRENCY_BALANCE-?,0),
	[PAIDDATE] = ?  
	WHERE [VENDID]=? 
	AND [VOUCHERNO]=?";

	$req = $db->prepare($sql);
	$req->execute(array(
	$PAID_AMT,$DISC_AMT,$BALANCE,$CURRENCY_PAIDAMT,$CURRENCY_DISCAMT,
	$CURRENCY_BALANCE,$PAIDDATE,$VENDID,$VOUCHERNO
	));


	$BALANCE = "";
	$LASTPAIDAMT = "";
	$VENDID = $theVENDID;
	$sql = "UPDATE APVENDOR 
			set BALANCE = BALANCE-?,
			LASTPAIDAMT = ?  
			WHERE VENDID=?";

	$req = $db->prepare($sql);
	$req->execute(array($BALANCE,$LASTPAIDAMT,$VENDID));		
}

function createAndReceivePO($items,$author)
{
	$ponumber = _createPO($items,$author);
	_receivePO($ponumber,$author);
	return $ponumber;
}

?>