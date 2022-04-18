<?php 

function createPO($items,$author)
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
	if (isset($items[0]) && isset($items[0]["LOCID"]))
		$LOCID = $items[0]["LOCID"];
	else 
		$LOCID = "WH2";
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
									) VALUES (?,?,?,getdate(),'','','','','','','','','','','')";
	$req = $db->prepare($sql);
	$req->execute(array($PONUMBER,$vendorid,$USERADD)); 

			
	foreach($items as $item)
	{		
		$TRANDISC = $item["DISCOUNT"];
        $item["ORDER_QTY"] = $item["REQUEST_QUANTITY"];		
		$TRANCOST = $item["COST"];
			
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

	 $sql = "INSERT INTO POHEADER (
		PONUMBER,VENDID,VENDNAME,VENDNAME1,PODATE,
		LOCID,PURCHASE_AMT,USERADD,DATEADD,VAT_PERCENT,
		PCNAME,CURR_RATE,CURRID,EST_ARRIVAL,REQUIRE_DATE,
		VAT_AMT,DISC_PERCENT,BASECURR_ID,CURRENCY_VATAMOUNT,
		NOTES,REFERENCE,POSTATUS,CURRENCY_AMOUNT,
		
		BUYER,RECEIVE_AMT,TERMID,TERM_DAYS,TERM_DISC,
		TERM_NET,FOB_POINT,SHIPVIA,REQUESTBY,FILEID,
		USER_DOCNO,SHIP_REFERENCE) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,?,?)";

	$req =$dbBLUE->prepare($sql);	

	$params = array($PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PODATE,
					$LOCID,$PURCHASE_AMT,$USERADD,$DATEADD,$VAT_PERCENT,					
					$PCNAME,$CURR_RATE,$CURRID,$EST_ARRIVAL,$REQUIRE_DATE,					
					$VAT_AMT,$DISC_PERCENT,$BASECURR_ID,$CURRENCY_VATAMOUNT,"AUTOVALIDATED",
					"","",$CURRENCY_AMOUNT,"",0,"",0,0,0,"","","","","","");
	$req->execute($params);

	$line = 1;
	foreach($items as $item)
	{
			
		$sql = "SELECT TOP(1) TRANCOST,DATEADD FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";		
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT  LASTCOST,COST,DISCABLE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res2 = $req->fetch(PDO::FETCH_ASSOC);

		if (isset($item["COST"]))
			$TRANCOST = $item["COST"];
		$VAT_PERCENT = $item["VAT"];
   
		$DISCABLE = $res2["DISCABLE"];

		
		$ALGOQTY = $item["ALGOQTY"]; // FIXED				
		if (isset($item["REASON"]))
			$REASON = $item["REASON"];
	
		// PATCH SUPPLYRECORD WITH ITEMREQUEST
		if (isset($item["SPECIALQTY"]) && $item["SPECIALQTY"] != "0"){
			$QUANTITY = $item["SPECIALQTY"];
			$REASON = $item["REASON"];
		}			
		else if (isset($item["ORDER_QTY"]))
			$QUANTITY = $item["ORDER_QTY"];
		else if (isset($item["REQUEST_QUANTITY"]))
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
        PPSS_WAITING_CALCULATED, PPSS_WAITING_COMMENT,PPSS_WAITING_PRICE,PPSS_WAITING_QUANTITY,PPSS_WAITING_DISCOUNT,
		PPSS_WAITING_VAT) 
		VALUES (?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?)"; 		
		$req = $dbBLUE->prepare($sql);
		$params = array(
			$PONUMBER,$VENDID, $VENDNAME, $VENDNAME1, $PURCHASE_DATE,
			$PRODUCTID, $LOCID,$PRODUCTNAME,$PRODUCTNAME1, $ORDER_QTY, 
			$TRANUNIT, $TRANFACTOR, $STKUNIT, $STKFACTOR, $TRANDISC,
			$TRANCOST, $EXTCOST, $CURRENTONHAND, $CURRID, $CURR_RATE,
			$WEIGHT, $OLDWEIGHT, $USERADD, $DATEADD, $line, 
			$VATABLE, $VAT_PERCENT,$BASECURR_ID, $CURRENCY_AMOUNT,$CURRENCY_COST,
			$RECEIVE_QTY,$COMMENT,$POSTATUS,$COST_ADD,$DIMENSION, 
			$FILEID,$COST_CENTER,$INVENTORYACC,$QTY_OVORORDER,$FREIGHT_SG,
			$ALGOQTY,$REASON,$TRANCOST,$ORDER_QTY,$TRANDISC,
			$VAT_PERCENT);		

		$req->execute($params);				
		
		
		$line++;
	}
	return $PONUMBER;
}

function updatePO($ponumber,$items)
{
	$db = getDatabase();
	//$sql = "SELECT * FROM PODETAIL "
	foreach($items as $item){
		$sql = "UPDATE PODETAIL SET 
				RECEIVE_QTY = PPSS_DELIVERED_QUANTITY,
				ORDER_QTY = PPSS_DELIVERED_QUANTITY,
				TRANDISC = PPSS_DELIVERED_DISCOUNT,
				TRANCOST = PPSS_DELIVERED_PRICE, 
				VAT_PERCENT = PPSS_DELIVERED_VAT,
				EXTCOST = ((PPSS_DELIVERED_PRICE - (PPSS_DELIVERED_PRICE * (PPSS_DELIVERED_DISCOUNT /100))) * PPSS_DELIVERED_QUANTITY)
				WHERE PONUMBER = ?";
		$req = $db->prepare($sql);
		$req->execute(array($ponumber));
	}

	$sql = "SELECT sum(EXTCOST) as SUM FROM PODETAIL WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($ponumber));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT sum(EXTCOST * (1 + (VAT_PERCENT/100))) as SUMVAT FROM PODETAIL WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($ponumber));
	$res2 = $req->fetch(PDO::FETCH_ASSOC);

	$sql = "UPDATE POHEADER SET CURRENCY_AMOUNT = ?,  CURRENCY_RECEIVEAMOUNT = ?,CURRENCY_VATAMOUNT = ? WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($res["SUM"],$res["SUM"],$res2["SUMVAT"],$ponumber));

}

function receivePO($PONumber,$author,$notes,$TAX = 0,$DISCOUNT = 0)
{		
    $db = getDatabase();
    $today = date("Y-m-d H:i:s");

	$sql = "SELECT LOCID FROM POHEADER WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($PONumber));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$THELOCATION = $res["LOCID"];

    $sql = "SELECT num3 FROM SYSDATA WHERE sysid = 'PO'";
    $req = $db->prepare($sql);
	$req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);

    $PONUM = intval($res["num3"]);  
    $sql = "UPDATE SYSDATA SET num3=num3+1 WHERE ltrim(rtrim(SYSID))='PO'";
    $req = $db->prepare($sql);
    $req->execute(array());

    $sql = "SELECT num1 FROM SYSDATA WHERE sysid = 'AP'";
    $req = $db->prepare($sql);
	$req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $APNUM = intval($res["num1"]);    
    $sql = "UPDATE SYSDATA set num1 = num1 +1  WHERE sysid = 'AP'";
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

	if ($TAX != 0){
		$theVATPERCENT = $TAX;
		$HAVEVAT = true;
	}		
	else 
		$theVATPERCENT = $PORef["VAT_PERCENT"];


	$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($PONumber));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

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
	$TERMID =  "";
	$TERM_DAYS = 0;
	$TERM_DISC =  0;
	$TERM_NET =   0;
	$VOUCHER_DESC = $PONumber;
	$VOUCHER_DESC1 = "";
	$REFERENCE =  $PONumber;
	$VATNO =   "";
	$PONUMBER =  $PONumber;
	$APACCOUNT =  "20000";
	$DISC_PERCENT =  $PORef["DISC_PERCENT"];
	$TAXACC_OUT =  "16100";
	$DISC_AMT =   0;
	$FILEID  = '';

	$EXPENSE_TYPE =  "";
	$POCLEARINGACC = "";
	$PODATE = $today;
	$RECEIVEDATE = $today;
	$LOC  =  $THELOCATION;
	$CURR_ID =   "USD";
	$BASECURR_ID =  "USD";
	$CURRENCY_AMOUNT =  $PORef["CURRENCY_AMOUNT"]; 
	$CURRENCY_VATAMOUNT =  $PORef["CURRENCY_VATAMOUNT"]; 
	$SHIP_REFERENCE = "";
	$DATEADD =  $today;
	$USERADD = blueUser($author);
 

	$sql = "INSERT INTO PORECEIVEHEADER(
	VENDID,RECEIVENO,VOUCHERNO,TRANDATE,DUEDATE,   
	VENDNAME,VENDNAME1,TO_INVOICE,VAT_AMT,VAT_PERCENT,
	INV_AMT,PAID_AMT,BALANCE,PCNAME,CURR_RATE,  
	REMARK,TERMID,TERM_DAYS,TERM_DISC,TERM_NET,
	VOUCHER_DESC,VOUCHER_DESC1,REFERENCE,VATNO, PONUMBER,
	APACCOUNT,DISC_PERCENT,TAXACC_OUT,DISC_AMT,FILEID,
	EXPENSE_TYPE,POCLEARINGACC,PODATE,RECEIVEDATE,LOCID,
	CURR_ID, BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_VATAMOUNT,SHIP_REFERENCE,
	DATEADD, USERADD) values (?,?,?,?,?,?,?,?,?,?,
							  ?,?,?,?,?,?,?,?,?,?,
					 		  ?,?,?,?,?,?,?,?,?,?,
							  ?,?,?,?,?,?,?,?,?,?,
					 		  ?,?)";
	
	$req = $db->prepare($sql);
	$req->execute(array(
	$VENDID,$RECEIVENO,$VOUCHERNO,$TRANDATE,$DUEDATE,
	$VENDNAME,$VENDNAME1,$TO_INVOICE,$VAT_AMT,$VAT_PERCENT,
	$INV_AMT,$PAID_AMT,$BALANCE,$PCNAME,$CURR_RATE,
	$REMARK,$TERMID,$TERM_DAYS,$TERM_DISC,$TERM_NET,
	$VOUCHER_DESC,$VOUCHER_DESC1,$REFERENCE,$VATNO,$PONUMBER,
	$APACCOUNT,$DISC_PERCENT,$TAXACC_OUT,$DISC_AMT,$FILEID,
	$EXPENSE_TYPE,$POCLEARINGACC,$PODATE,$RECEIVEDATE,$LOC,
	$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,$SHIP_REFERENCE,
	$DATEADD,$USERADD));


	$line = 0; 
	$CURRENCY_AMOUNT_SUM = 0;
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
		$APSTATUS =    '';
		$TRANCOST =     $item["TRANCOST"]; 
		$PURCHASEDATE = $item["PURCHASE_DATE"];
		$LINENUM =      $line;
		$PRODUCTID =    $item["PRODUCTID"];
		$PRODUCTNAME =  $item["PRODUCTNAME"]; 
		$PRODUCTNAME1 = $item["PRODUCTNAME1"];
		$TRANQTY =     $item["ORDER_QTY"]; 
		$DIMENSION =   0;
		$FILEID =   "";
		$COST_CENTER =   "";
		$INVENTORY_ACC =    "17000";
		$POCLEARING_ACC =  "21400";
		$EXTCOST =   $item["EXTCOST"];
		$LOCID =     $item["LOCID"];
		$QTY_ORDER =  $item["ORDER_QTY"];
		$VATABLE =    0;
		$VAT_PERCENT = $item["VAT_PERCENT"];
		$LINE_NOTE =    "";
		$REQUIREDATE =  "";
		// GENERAL DISCOUNT
		if ($DISCOUNT != 0)
			$TRANDISC = $DISCOUNT;
		else 
			$TRANDISC = $item["TRANDISC"];
		$FROM_SERIAL =  "";
		$TO_SERIAL =    "";
		$TRANUNIT =     "UNIT";
		$TRANFACTOR =   "1";
		$CURRID_COSTADD =  "";
		$OPERATIONBASE =   "";
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
		REQUIREDATE,TRANDISC,FROM_SERIAL,TO_SERIAL,TRANUNIT,
		TRANFACTOR,CURRID_COSTADD,OPERATIONBASE,CURRID_EXCHRATE,CURRENCY_AMOUNT,
		COST_ADD,CURR_ID,BASECURR_ID,CURRENCY_COST,CURRENCY_COST_ADD,
		ORIGINAL_QTY,QTY_PACK,PACK_WEIGHT,CHAMBERNG_QTY, WET_QTY,
		WET_PERCENT,DATEADD,USERADD) 
		VALUES (?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,
				?,?,?,?,?,?,?,?,?,?,				
				?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array(
		$VENDID,$RECEIVENO,$VENDNAME,$VENDNAME1,$PONUMBER,
		$TRANDATE,$APSTATUS,$TRANCOST,$PURCHASEDATE,$LINENUM,
		$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$TRANQTY,$DIMENSION,
		$FILEID,$COST_CENTER,$INVENTORY_ACC,$POCLEARING_ACC,$EXTCOST,
		$LOCID,$QTY_ORDER,$VATABLE,$VAT_PERCENT,$LINE_NOTE,
		$REQUIREDATE,$TRANDISC,$FROM_SERIAL,$TO_SERIAL,
		$TRANUNIT,$TRANFACTOR,$CURRID_COSTADD,$OPERATIONBASE,$CURRID_EXCHRATE,
		$CURRENCY_AMOUNT,$COST_ADD,$CURR_ID,$BASECURR_ID,$CURRENCY_COST,
		$CURRENCY_COST_ADD,$ORIGINAL_QTY,$QTY_PACK,$PACK_WEIGHT,$CHAMBERNG_QTY,
		$WET_QTY,$WET_PERCENT,$DATEADD,$USERADD
		));

		$CURRENCY_AMOUNT_SUM += $CURRENCY_AMOUNT;
	}
	$BUYER = "";
	$TERMID = "";
	$TERM_DAYS = 0;
	$TERM_DISC = 0;
	$TERM_NET = 0;
	$FOB_POINT = "";
	$SHIPVIA = "";
	$REQUESTBY = "";
	$FILEID = "";
	$USER_DOCNO = "";
	$SHIP_REFERENCE = "";

	
	$sql = "UPDATE POHEADER  set BUYER = ?,							 	  
							 RECEIVE_AMT = PURCHASE_AMT, 
							 TERMID = ?,
							 TERM_DAYS = ?,
							 TERM_DISC =  ?,
							 TERM_NET = ?,
							 FOB_POINT = ?,
							 SHIPVIA = ?,
							 REQUESTBY = ?,
							 FILEID = ?,
							 USER_DOCNO = ?,
							 SHIP_REFERENCE = ?,
							 CURRENCY_RECEIVEAMOUNT = ?,
							 NOTES = ?,
							 REFERENCE = ?,
							 [POSTATUS] = ?  
							 WHERE [PONUMBER]= ?";
	$req = $db->prepare($sql);
	$req->execute(array($BUYER,											
						$TERMID,
						$TERM_DAYS,
						$TERM_DISC,
						$TERM_NET,
						$FOB_POINT,
						$SHIPVIA,
						$REQUESTBY,
						$FILEID,
						$USER_DOCNO,
						$SHIP_REFERENCE,
						$CURRENCY_AMOUNT_SUM,
						$notes,
						$notes,
						'C',
						$PONumber));
	error_log($CURRENCY_AMOUNT_SUM);
	$sql = "UPDATE APVENDOR set TOTALREC = TOTALREC + ?,
							LASTRECAMT = ?,
							LASTRECDATE = ?,
							BALANCE = BALANCE +?,
							LASTRECDOC = ?  
							WHERE VENDID=?";

	$req = $db->prepare($sql);
	$req->execute(array($CURRENCY_AMOUNT_SUM,$CURRENCY_AMOUNT_SUM,$today,
						$CURRENCY_AMOUNT_SUM,$PONumber,$theVENDID));



	$DOCNUM =   sprintf("RP%013d",$PONUM);  
	$FLOCID =    $THELOCATION;
	$TLOCID =    '';
	$REFERENCE =   "Receive PO# " . $PONumber;
	$TRANDATE =    $today;
	$TRANTYPE =    "R";
	$TOTAL_AMT =   $PORef["CURRENCY_AMOUNT"]; 
	$PCNAME =    "Application";
	$CURRID =    "USD";
	$CURR_RATE =   "1";
	$CUSTID =    '';
	$VENDID =    $theVENDID;
	$DISC_PERCENT =   "0";
	$VAT_PERCENT =   "0";
	$APPLID =    "PO";
	$FILEID =     '';
	$TOFILEID =    '';
	$IS_CHANGE_AVGCOST = '';
	$REF_DOCUMENT =  '';
	$IS_PROCCESS =   '';
	$POSSTAT =   '';
	$RECEIVENO =   '';
	$CHANGE_REWARD =  '';
	$TOTAL_STOCKREWARD = 0;
	$TOTAL_MONEYREWARD = 0;
	$ARACC =    '';
	$BASECURR_ID =   "USD";
	$CURRENCY_AMOUNT = $PORef["CURRENCY_AMOUNT"];
	$PURPOSE_ISSUE =  '';
	$JOB_ID =  '';
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
	(?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?,?,?,?,
	 ?,?,?,?,?,?,?,?,?,?,
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
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$line++;

		$DOCNUM =  sprintf("VO%013d",$APNUM); 
		$PRODUCTID = $item["PRODUCTID"]; 
		$LOCID = $item["LOCID"]; 
		$CATEGORYID = $res["CATEGORYID"];
		$CLASSID = "LOCAL";
		$BATCHNO = '';
		$SERIAL = '';
		$TIERID = '';
		$TRANDATE = $today; 
		$TRANTYPE = "R";
		$LINENUM = $line;
		$PRODUCTNAME = $item["PRODUCTNAME"];
		$PRODUCTNAME1 = $item["PRODUCTNAME1"]; 
		$REFERENCE = "Receive PO " . $PONumber;
		$COMMENT = '';
		$TRANQTY = $item["ORDER_QTY"];
		$TRANUNIT = "UNIT";
		$TRANFACTOR = "1";
		$STKUNIT =  "UNIT";
		$STKFACTOR =  "1";
		// GENERAL DISCOUNT
		if ($DISCOUNT != 0)
			$TRANDISC = $DISCOUNT;
		else 
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
		$CUSTID = '';
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
		$COSG_ACC = "";
		$DIMENSION = "1";
		$FILEID = "";
		$IS_CHANGE_AVGCOST = "";
		$WASTE_QTY = 0;
		$PRODUCT_PRODUCTID = "";
		$IS_PROCCESS = "";
		$EXPIRED_DATE = "";
		$TRANQTY_NEW = $item["ORDER_QTY"];
		$TRANCOST_NEW = $item["TRANCOST"]; 
		$TRANEXTCOST_NEW =  $item["ORDER_QTY"] * $item["TRANCOST"];
		$LINE_DISCAMT = "0";
		$COST_CENTER = "";
		$LINE_NOTE = "";
		$CASE_PRODUCTID = "";
		$CASE_QTY =  "0";
		$POSSTAT = "";
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
		$RECEIVENO = "";
		$OTHER_PRICE = "0";	
		$RETURN_DATE = "";
		$BORROW_NUMBER = "";
		$CHANGE_REWARD = "";
		$MONEY_REWARD = 0;
		$IS_MONEY_REWARD = "";
		$PACK_RECEIVE = "0";
		$PACK_UNIT = "";
		$REWARD_UNIT = "";
		$COST_METHOD = "AG";
		$BASECURR_ID = "USD";
		$CURRENCY_AMOUNT = $item["CURRENCY_AMOUNT"];
		$CURRENCY_COST = $item["CURRENCY_COST"];
		$CURRENCY_COST_ADD = "0";
		$CURRENCY_EXTPRICE = "0";
		$CURRENCY_PRICE = "0";
		$FF_LF_INDEX = "0";
		$PURPOSE_ISSUE = "";
		$JOB_ID = "";
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
		OTHER_PRICE,RETURN_DATE,BORROW_NUMBER,CHANGE_REWARD,MONEY_REWARD,
		IS_MONEY_REWARD,PACK_RECEIVE,PACK_UNIT,REWARD_UNIT,COST_METHOD,
		BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_COST_ADD,CURRENCY_EXTPRICE,
		CURRENCY_PRICE,FF_LF_INDEX,PURPOSE_ISSUE,JOB_ID,ROW_ID,
		MAIN_PRODUCTID,USERADD,DATEADD) 
		values(
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
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?)";

		$req = $db->prepare($sql);

		$req->execute(array(
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
		$OTHER_PRICE,$RETURN_DATE,$BORROW_NUMBER,$CHANGE_REWARD,$MONEY_REWARD,
		$IS_MONEY_REWARD,$PACK_RECEIVE,$PACK_UNIT,$REWARD_UNIT, $COST_METHOD,
		$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,$CURRENCY_COST_ADD, $CURRENCY_EXTPRICE,
		$CURRENCY_PRICE,$FF_LF_INDEX,$PURPOSE_ISSUE,$JOB_ID,$ROW_ID,
		$MAIN_PRODUCTID,$USERADD,$DATEADD));
	}

	//$sql = "UPDATE SYSSETUPCURRENCY  set HAS_TRANSACTION = ? WHERE CURR_ID = ?"; NO NEED ?

	$VENDID =      $theVENDID;
	$VOUCHERNO =   sprintf("VO%013d",$APNUM);   
	$TRANDATE =     $today;
	$DUEDATE =      $today;
	$VENDNAME =     $theVENDNAME;
	$VENDNAME1 =     $theVENDNAME1;
	$APSTATUS =      '';
	$VAT_AMT =      $theVATAMOUNT; 
	$VAT_PERCENT =   $theVATPERCENT;
	$INV_AMT =      $theTOTALAMOUNT;
	$PAID_AMT =      "0";
	$BALANCE =      $theTOTALAMOUNT;
	$PCNAME =      "APPLICATION";
	$CURR_RATE =    "1";   
	$REMARK =      '';
	$TERMID =      '';
	$TERM_DAYS =     0;
	$TERM_DISC =     0;
	$TERM_NET =      0;
	$VOUCHER_DESC =    $PONumber;
	$VOUCHER_DESC1 = '';
	$REFERENCE =    $PONumber;
	$VATNO =     '';
	$PONUMBER =   $PONumber;
	$APACCOUNT =     "20000";
	$DISC_PERCENT =     "0";
	$TAXACC_OUT =    "16100";
	$FILEID =       '';
	$EXPENSE_TYPE = '';
	$DOCUMENTDATE = '';
	$LOCID =       $THELOCATION;
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
	?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?)";

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
		$IS_CATON = 0;
		$REQUIREDATE = "";
		$CURRID_ADDCOST = "";

		$sql = "UPDATE PODETAIL 
		 		set 
				 IS_CATON = ?,
				 REQUIREDATE = ?,
				 CURRID_ADDCOST = ?,
				 RECEIVE_DATE = ?,
				[RECEIVE_QTY] = RECEIVE_QTY + ?,
				[POSTATUS] = 'C',
				[QTY_OVERORDER] = 0		
		 		WHERE PONUMBER = ? 
		 		AND PRODUCTID =?";
		 $req = $db->prepare($sql);
		 $req->execute(array($IS_CATON,$REQUIREDATE,$CURRID_ADDCOST,$today, $item["ORDER_QTY"],$PONumber,$item["PRODUCTID"]));		

		$LOCCOST = $item["TRANCOST"];
		$LOCLASTCOST = $item["TRANCOST"];
		$RECENTLASTCOST = $LOCLASTCOST;
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
			$LOCCOST,$LOCLASTCOST,$RECENTLASTCOST,$LOCONHAND,$TOTALRECEIVE,$LASTRECEIVE,
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
		$req->execute(array($ONHAND,$LASTCOST,$TOTALRECEIVE,$LASTRECEIVEDATE,$COST,$PRODUCTID));


		$LASTCOST = $item["TRANCOST"];
		$LASTRECEIVE = $today;
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
		$req->execute(
			array($LASTCOST,$LASTRECEIVE,$TOTALRECEIVE,$USEREDIT,$DATEEDIT,$PRODUCTID,$VENDID));							   

		$VENDID =  $theVENDID;
		$VOUCHERNO = sprintf("VO%013d",$APNUM);
		$VENDNAME = $theVENDNAME; 
		$VENDNAME1 = $theVENDNAME1;
		$PONUMBER =  $PONumber;
		$TRANDATE =  $today;
		$APSTATUS = "";
		$TRANCOST =   $item["TRANCOST"]; //  Last cost of Item
		$PURCHASEDATE = $today;
		$LINENUM =   $line;
		$PRODUCTID =  $item["PRODUCTID"];
		$PRODUCTNAME = $item["PRODUCTNAME"]; 
		$PRODUCTNAME1 = $item["PRODUCTNAME1"]; 
		$TRANQTY =   $item["ORDER_QTY"];
		$DIMENSION =  0;
		$FILEID =    "";  
		$COST_CENTER =  "";
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
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array(
		$VENDID,$VOUCHERNO,$VENDNAME,$VENDNAME1,$PONUMBER,    
		$TRANDATE,$APSTATUS,$TRANCOST,$PURCHASEDATE,$LINENUM,     
		$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$TRANQTY,$DIMENSION, 
		$FILEID,$COST_CENTER,$FREIGHTSG,$INSURSG,$TRANUNIT,    
		$TRANFACTOR,$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,   
		$AMOUNT,$CURR_RATE,$DATEADD,$USERADD
		));
	}

	//****** IF VENDOR NOT VAT INSERT 2LINE (17000) AND (20000)***************************
	//****** IF VENDOR HAS VAT INSERT 3 LINE (17000) AND (16100) AND (20000) ********
	$theGLNO = date('y').date('m')."00000".$GLNUM;

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
	$DOCNO =    sprintf("VO%013d",$APNUM); 
	$USERADD =    blueUser($author);
	$DATEADD =    $today;
	$GLPOST =    "N";
	$GLTYPE =    "J"; 
	$APPID =     "PO";
	$REMARKS =    "";
	$CUSTID =    "";
	$VENDID =    $theVENDID;
	$FILEID =     "";
	$COST_CENTER =   "";
	$LOCID =     $THELOCATION;

	//+GLTRAN (Account Number 20000)
	$sql = "INSERT INTO GLTRAN (
	GLNO,LINNO,GLDESC,GLDATE,GLYEAR,    
	GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,    
	DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,     
	APPID,REMARKS,CUSTID,VENDID,FILEID,     
	COST_CENTER,LOCID) 
	values (
	?,?,?,?,?,?,?,?,?,?,
	?,?,?,?,?,?,?,?,?,?,
	?,?)";      
	$req = $db->prepare($sql);
	$req->execute(array(
		$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,    
		$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,    
		$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,     
		$APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,    
		$COST_CENTER,$LOCID

	));

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
		$DOCNO =    sprintf("VO%013d",$APNUM);
		$USERADD =    blueUser($author);
		$DATEADD =    $today;
		$GLPOST =    "N";
		$GLTYPE =    "J";  
		$APPID =     "PO";
		$REMARKS =    "";
		$CUSTID =    "";
		$VENDID =    $theVENDID;
		$FILEID =     "";
		$COST_CENTER =   "";
		$LOCID =     $THELOCATION;
		$sql = "
		INSERT INTO GLTRAN(
		GLNO,LINNO,GLDESC,GLDATE,GLYEAR,   
		GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,    
		DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,      
		APPID,REMARKS,CUSTID,VENDID,FILEID,     
		COST_CENTER,LOCID) values(
		?,?,?,?,?,?,?,?,?,?,
		?,?,?,?,?,?,?,?,?,?,
		?,?)";   

		$req = $db->prepare($sql);
		$req->execute(array(	
			$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,   
			$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,    
			$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,      
			$APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,     
			$COST_CENTER,$LOCID));
	}

	//+GLTRAN (Acc$ount Number 17000)
	$GLNO = $theGLNO;
	if ($HAVEVAT)
		$LINNO = 3;
	else 
	    $LINNO = 2;

	$GLDESC =   "Receive PO ". $PONumber;
	$GLDATE =   $today;
	$GLYEAR =    date("Y"); 
	$GLMONTH =   date("m");
	$ACCNO =    "17000";
	if ($HAVEVAT)
		$GLAMT = $theVATAMOUNT;
	else 
		$GLAMT = $theTOTALAMOUNT;
	
	if ($HAVEVAT)
		$DEBIT = $theVATAMOUNT;
	else 
		$DEBIT = $theTOTALAMOUNT;
	$CREDIT =    0;
	$DOCNO =     sprintf("VO%013d",$APNUM);
	$USERADD =    blueUser($author); 
	$DATEADD =    $today; 
	$GLPOST =     "N";
	$GLTYPE =    "J";  
	$APPID =     "PO";
	$REMARKS =    "";
	$CUSTID =    "";
	$VENDID =    $theVENDID;
	$FILEID =     "";
	$COST_CENTER =   "";
	$LOCID =     $THELOCATION;

	$sql = "INSERT INTO GLTRAN(
	GLNO,LINNO,GLDESC,GLDATE,GLYEAR,    
	GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,    
	DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,    
	APPID,REMARKS,CUSTID,VENDID,FILEID,     
	COST_CENTER,LOCID) 
	values (?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?)";
	$req = $db->prepare($sql);
	$req->execute(array(	
		$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,    
		$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,    
		$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,    
		$APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,     
		$COST_CENTER,$LOCID));

	//****** IF VENDOR NOT VAT INSERT 1 LINE (17000) ***********************
	//****** IF VENDOR HAS VAT INSERT 3 LINE (17000) AND (16100) AND (20000) ********

	//+APACCOUNT (Account Number 17000)
	$VENDID = $theVENDID;
	$VOUCHERNO = sprintf("VO%013d",$APNUM); 
	$TRANDATE = $today;
	$LINENUM =   "1";
	$ACCNO =       "17000";
	$AMOUNT = $theTOTALAMOUNT;
	$PERIOD = date("n");
	$YEAR = date("Y");
	$BATCH = '';
	$REFERENCE = '';
	$ACCNAME = 'INVENTORY ACCOUNT';
	$ACCNAME1 = '';
	$STAT = '';
	$TYPE = '';
	$BATCHDATE = $today;
	$FILEID = '';
	$COST_CENTER = '';
	$LOCID = '';
	$COMMENT_ON_LINE = '';
	$CURR_TYPE =  '';
	$CURR_AMOUNT = $theTOTALAMOUNT;
	$CURR_RATE =     "1";
	$OPERATION_BASE = '';
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
	 ?,?,?,?,?,
	 ?,?)";
	$req = $db->prepare($sql);
	$req->execute(array(
	$VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
	$AMOUNT,$PERIOD,$YEAR,$BATCH,$REFERENCE,
	$ACCNAME,$ACCNAME1,$STAT,$TYPE,$BATCHDATE,
	$FILEID,$COST_CENTER,$LOCID,$COMMENT_ON_LINE,$CURR_TYPE,
	$CURR_AMOUNT,$CURR_RATE,$OPERATION_BASE,$BASECURR_ID,$CURR_ID,
	$USERADD,$DATEADD
	));

	/* THIS IS FOR PAY AP
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
	$CURRENCY_BALANCE,$PAIDDATE,$VENDID,$VOUCHERNO)
	);


	$BALANCE = "";
	$LASTPAIDAMT = "";
	$VENDID = $theVENDID;
	$sql = "UPDATE APVENDOR 
			set BALANCE = BALANCE-?,
			LASTPAIDAMT = ?  
			WHERE VENDID=?";

	$req = $db->prepare($sql);
	$req->execute(array($BALANCE,$LASTPAIDAMT,$VENDID));		
	*/
}

function createAndReceivePO($items,$author,$notes)
{
	$ponumber = createPO($items,$author);
	receivePO($ponumber,$author,$notes);
	return $ponumber;
}

?>