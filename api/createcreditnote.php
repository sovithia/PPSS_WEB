<?php 


// ITEMS : PRODUCTID,QUANTITY
function createCreditNote($items,$author,$locid,$note){
	$db = getDatabase("TRAINING");

	$sql = "SELECT num2 FROM SYSDATA WHERE sysid = 'PO'";
    $req = $db->prepare($sql);
	$req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
	$today = date("Y-m-d H:i:s");
	$todayDate = date("Y-m-d");
	$todayYear = date("Y");
	$todayMonth = date("m");

    $PONUMBER = sprintf("RT%013d",intval($res["num2"]));  

    $sql = "UPDATE SYSDATA SET num2=num2+1 WHERE ltrim(rtrim(SYSID))='PO'";
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

	$firstItem = $items[0];
	$sql = "SELECT ICPRODUCT.VENDID,APVENDOR.VENDNAME,APVENDOR.VENDNAME1,APVENDOR.TAX FROM ICPRODUCT,APVENDOR WHERE  PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($firstItem["PRODUCTID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res != false && floatval($res["TAX"])  > 0.0)
		$HAVEVAT = true;
	else 
		$HAVEVAT = false;

	$purchase_amt = 0;
	$receive_amt = 0;
	$currency_amount = 0;
	$currency_vatamount = 0;
	$currency_receiveamount = 0;
	$VAT_AMT = 0;
	foreach($items as $item){
		$sql = "SELECT CURRENCY_COST,TRANDISC,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));		
		$oneitem = $req->fetch(PDO::FETCH_ASSOC);
		if ($oneitem != false)
			$amt = ($item["QUANTITY"] * $oneitem["CURRENCY_COST"]) * ( (100 - $oneitem["TRANDISC"]) / 100);
		else
			$amt = 0;

		$purchase_amt += $amt;
		$receive_amt +=  $amt; 
		$currency_amount -= $amt;
		if ($oneitem != false)
			$currency_vatamount -= $oneitem["CURRENCY_COST"] * ((100 - $oneitem["VAT_PERCENT"])/100); 			
		$currency_receiveamount -= $amt;		
	}
	

	$VENDID = $res["VENDID"] ?? ""; 
	$VENDNAME = $res["VENDNAME"] ?? "";
	$VENDNAME1 = $res["VENDNAME1"] ?? "";
	$PODATE = $today;
	$LOCID = $locid;
	$PURCHASE_AMT = $purchase_amt;
	$RECEIVE_AMT = $receive_amt;
	$TERMID = "";
	$TERM_DAYS = 0;
	$TERM_DISC = 0;
	$TERM_NET = 0;
	$FOB_POINT = "";
	$SHIPVIA = "";
	$NOTES = $note;
	$USERADD = $author;
	$DATEADD = $today;
	$POSTATUS = "R";
	$VAT_PERCENT = $res["TAX"] ?? 0;

	$PCNAME = "APPLICATION";
	$CURR_RATE = "1";
	$CURRID = "USD";
	$EST_ARRIVAL = $today;
	$REQUIRE_DATE = $today;
	$REQUESTBY	= "";
	$VAT_AMT = $currency_vatamount;
	$REFERENCE = $note;

	$DISC_PERCENT = "0";

	$FILEID = "";
	$BASECURR_ID = "USD";
	$CURRENCY_AMOUNT = $currency_amount;
	$CURRENCY_VATAMOUNT = $currency_vatamount;
	$CURRENCY_RECEIVEAMOUNT = $currency_receiveamount;
	$DISC_AMT_HEADER = 0;
	$COST_ADD_HEADER = 0;
	$COST_ADD_HEADER2 = 0;

	$sql = "INSERT INTO POHEADER (
					PONUMBER,VENDID,VENDNAME,VENDNAME1,PODATE,
					LOCID,PURCHASE_AMT,RECEIVE_AMT,TERMID,TERM_DAYS,
					TERM_DISC,TERM_NET,FOB_POINT,SHIPVIA,NOTES,
					USERADD,DATEADD,POSTATUS,VAT_PERCENT,PCNAME,
					CURR_RATE,CURRID,EST_ARRIVAL,REQUIRE_DATE,REQUESTBY,
					VAT_AMT,REFERENCE,DISC_PERCENT,FILEID,BASECURR_ID,
					CURRENCY_AMOUNT,CURRENCY_VATAMOUNT,CURRENCY_RECEIVEAMOUNT,DISC_AMT_HEADER,COST_ADD_HEADER,
					COST_ADD_HEADER2) 
					VALUES (?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?)";

    $req = $db->prepare($sql);
	
	$req->execute(array( $PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PODATE,
					   $LOCID,$PURCHASE_AMT,$RECEIVE_AMT,$TERMID,$TERM_DAYS,
					   $TERM_DISC,$TERM_NET,$FOB_POINT,$SHIPVIA,$NOTES,					   
					   $USERADD,$DATEADD,$POSTATUS,$VAT_PERCENT,$PCNAME,					   
					   $CURR_RATE,$CURRID,$EST_ARRIVAL,$REQUIRE_DATE,$REQUESTBY,
					   $VAT_AMT,$REFERENCE,$DISC_PERCENT,$FILEID,$BASECURR_ID,
					   $CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,$CURRENCY_RECEIVEAMOUNT,$DISC_AMT_HEADER, $COST_ADD_HEADER,
					   $COST_ADD_HEADER2
				));	
	
	$linecount = 1;
	foreach($items as $item){

		$sql = "SELECT ONHAND FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT TRANCOST,EXTCOST,TRANDISC,VAT_PERCENT,PRODUCTNAME,PRODUCTNAME1 
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				ORDER BY DATEADD DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"])); 
		$receiveDetail = $req->fetch(PDO::FETCH_ASSOC);

		$PURCHASE_DATE = $today;
		$PRODUCTID = $item["PRODUCTID"];
		$PRODUCTNAME = $receiveDetail["PRODUCTNAME"] ?? "";
		$PRODUCTNAME1 = $receiveDetail["PRODUCTNAME1"] ?? "";
		$ORDER_QTY = $item["QUANTITY"] * -1;//  ?
		$RECEIVE_QTY = $item["QUANTITY"] * -1;  //  ?
		$TRANUNIT = "UNIT";
		$TRANFACTOR = 1;
		$STKFACTOR = 1;
		$STKUNIT = "UNIT";		
		$TRANDISC = $receiveDetail["TRANDISC"] ?? "0";

		$TRANCOST = $receiveDetail["TRANCOST"] ?? "0"; 
		$EXTCOST =  ($receiveDetail["TRANCOST"] ?? "0")* $item["QUANTITY"] * -1; 
		$CURRENTONHAND = $oneItem["ONHAND"] ?? "0";
		$CURR_RATE = 1;
		$CURRID = "USD";
		$WEIGHT = 1;
		$OLDWEIGHT = 1;
		$COST_ADD = 0;
		$TRANLINE = $linecount;
		$VATABLE = "Y";
		$VAT_PERCENT = $receiveDetail["VAT_PERCENT"] ?? "0";
		$POSTATUS = "R";
		$BASECURR_ID = "USD";
		$CURRENCY_AMOUNT = ($receiveDetail["TRANCOST"] ?? "0") * $item["QUANTITY"] * -1; 
		$CURRENCY_COST = $receiveDetail["TRANCOST"] ?? "0";
		$USERADD = $author;
		$DATEADD = $today;
		$sql = "INSERT INTO PODETAIL (PONUMBER,VENDID,VENDNAME,VENDNAME1,PURCHASE_DATE,
						LOCID,PRODUCTID,PRODUCTNAME,PRODUCTNAME1,ORDER_QTY,						
						RECEIVE_QTY,TRANUNIT,TRANFACTOR,STKFACTOR,STKUNIT,
						TRANDISC,TRANCOST,EXTCOST,CURRENTONHAND,CURR_RATE,
						CURRID,WEIGHT,OLDWEIGHT,COST_ADD,TRANLINE,						
						VATABLE,VAT_PERCENT,POSTATUS,BASECURR_ID,CURRENCY_AMOUNT,
						CURRENCY_COST,USERADD,DATEADD ) 
						VALUES (?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?)";

		$req = $db->prepare($sql);				
		$params = array($PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PURCHASE_DATE,
						$LOCID,$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$ORDER_QTY,
	   					$RECEIVE_QTY,$TRANUNIT,$TRANFACTOR,$STKFACTOR,$STKUNIT,
	   					$TRANDISC,$TRANCOST,$EXTCOST,$CURRENTONHAND,$CURR_RATE,
	   					$CURRID,$WEIGHT,$OLDWEIGHT,$COST_ADD,$TRANLINE,
	   					$VATABLE,$VAT_PERCENT,$POSTATUS,$BASECURR_ID,$CURRENCY_AMOUNT,
	   					$CURRENCY_COST,$USERADD,$DATEADD);	
		
		$req->execute($params);		
		
		$linecount++;		
	}

	$sql = "SELECT TAX FROM APVENDOR WHERE VENDID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($VENDID));
	$vendordetails = $req->fetch(PDO::FETCH_ASSOC);

	
	$sql = "SELECT num1 FROM SYSDATA WHERE sysid = 'AP'";
    $req = $db->prepare($sql);
	$req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $APNUM = intval($res["num1"]);    
	$theDOCNO = sprintf("VO%013d",$APNUM); 


	$DOCNUM =  $theDOCNO;
	$FLOCID = $locid;
	$REFERENCE = "Return PO " . $PONUMBER;
	$TRANDATE = $today;
	$TRANTYPE = "I";	 
	$TOTAL_AMT = $CURRENCY_AMOUNT;
	$PCNAME = "Application";
	$CURRID = "USD";
	$CURR_RATE = 1;	
	$CUSTID = "";
	$DISC_PERCENT = 0;
	$VAT_PERCENT = $vendordetails["TAX"] ?? 0;
	$APPLID = "PO";
	$FILEID = "";
	$TOFILEID = "";
	$IS_CHANGE_AVGCOST = "";
	$REF_DOCUMENT = "";
	$IS_PROCCESS = "";
	$POSSTAT = "";
	$RECEIVENO = "";
	$CHANGE_REWARD = "";
	$TOTAL_STOCKREWARD = 0;
	$TOTAL_MONEYREWARD = 0;
	$ARACC = "";
	$BASECURR_ID = "USD";
	$CURRENCY_AMOUNT = $currency_amount;
	$PURPOSE_ISSUE = "";
	$JOB_ID = "";	
	$USERADD = $author;
	$DATEADD = $today;

	$sql = "INSERT INTO ICTRANHEADER (  DOCNUM,FLOCID,REFERENCE,TRANDATE,TRANTYPE, 
										TOTAL_AMT,PCNAME,CURRID,CURR_RATE,CUSTID,										
										VENDID,DISC_PERCENT,VAT_PERCENT,APPLID,FILEID,
										TOFILEID,IS_CHANGE_AVGCOST,REF_DOCUMENT,IS_PROCCESS,POSSTAT,
										RECEIVENO, CHANGE_REWARD,TOTAL_STOCKREWARD,TOTAL_MONEYREWARD,ARACC,
										BASECURR_ID,CURRENCY_AMOUNT,PURPOSE_ISSUE,JOB_ID,USERADD,
										DATEADD) 
										VALUES (
										?,?,?,?,?,
										?,?,?,?,?,
										?,?,?,?,?,
										?,?,?,?,?,
										?,?,?,?,?,
										?,?,?,?,?,
										?)";
	$req = $db->prepare($sql);	
	$req->execute(array(
						$DOCNUM,$FLOCID,$REFERENCE,$TRANDATE,$TRANTYPE,	 
						$TOTAL_AMT,$PCNAME,$CURRID,$CURR_RATE,$CUSTID,										
						$VENDID,$DISC_PERCENT,$VAT_PERCENT,$APPLID,$FILEID,
						$TOFILEID,$IS_CHANGE_AVGCOST,$REF_DOCUMENT,$IS_PROCCESS,$POSSTAT,
						$RECEIVENO,$CHANGE_REWARD,$TOTAL_STOCKREWARD,$TOTAL_MONEYREWARD,$ARACC, 										
						$BASECURR_ID,$CURRENCY_AMOUNT,$PURPOSE_ISSUE,$JOB_ID,$USERADD,
						$DATEADD));
	
	$linenum = 1;	
	$_AMT_WITHOUTDISCOUNT = 0;
	$_AMT_WITHDISCOUNT = 0;
	$_AMT_VAT = 0;
	foreach($items as $item){
		$sql = "SELECT CATEGORYID,CLASSID,ONHAND,PRODUCTNAME,PRODUCTNAME1,PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT TRANDISC,TRANCOST,VAT_PERCENT,CURRENCY_COST FROM PORECEIVEDETAIL WHERE ICPRODUCT = ? ORDER BY TRANDATE DESC";
		$req = $db->prepare($sql);
		$receiveDetail = $req->fetch(PDO::FETCH_ASSOC);

		$DOCNUM = $theDOCNO; 
		$PRODUCTID = $item["PRODUCTID"];
		$LOCID = $locid;
		$CATEGORYID = $oneItem["CATEGORYID"] ?? "";
		$CLASSID = $oneItem["CLASSID"] ?? "";
		$BATCHNO = "";
		$SERIAL = "";
		$TIERID = "";
		$TRANDATE = $today;
		$TRANTYPE = "I";
		$LINENUM = $linenum;
		$PRODUCTNAME = $oneItem["PRODUCTNAME"] ?? "";
		$PRODUCTNAME1 = $oneItem["PRODUCTNAME1"] ?? "";	
		$REFERENCE = "Return PO " . $PONUMBER;
		$COMMENT = "";
		$TRANQTY = $item["QUANTITY"] * -1;
		$TRANUNIT = "UNIT";
		$TRANFACTOR = 1;
		$STKUNIT = "UNIT";
		$STKFACTOR = 1;
		$TRANDISC = $receiveDetail["TRANDISC"] ?? 0;
		$TRANTAX =  $receiveDetail["VAT_PERCENT"] ?? 0;
		$TRANCOST = $receiveDetail["TRANCOST"] ?? 0;
		$TRANPRICE = $oneItem["PRICE"] ?? 0;
		$PRICE_ORI = $oneItem["PRICE"] ?? 0;
		$EXTPRICE = ($oneItem["PRICE"] ?? 0) * $item["QUANTITY"] * -1;
		$EXTCOST = $TRANCOST * $item["QUANTITY"] * -1;
		$CURRENTONHAND = $oneItem["ONHAND"] ?? 0;
		$CURRID = "CURRID";
		$CURR_RATE = 1;
		$WEIGHT = 1;
		$OLDWEIGHT = 0;
		$APPLID = "PO";
		$CURRENTCOST = $oneItem["TRANCOST"] ?? 0;
		$LASTCOST = $oneItem["TRANCOST"] ?? 0;

		$COST_ADD = 0;
		$COST_RIEL = 0;
		$LINK_LINE = 0;

		$ICCLEARING_ACC = 21400;
		$INVENTORY_ACC = 17000;
		$COSG_ACC = "";
		$DIMENSION = 1;
		$FILEID = "";
		$IS_CHANGE_AVGCOST = "";
		$WASTE_QTY = 0;
		$PRODUCT_PRODUCTID = "";
		$IS_PROCCESS = "";		
		$TRANQTY_NEW = 	$item["QUANTITY"] * -1; // TO CHECK
		$TRANCOST_NEW = $TRANCOST;
		$TRANEXTCOST_NEW = $TRANCOST * $item["QUANTITY"] * -1;

		$LINE_DISCAMT = 0;
		$COST_CENTER = "";
		$LINE_NOTE = "";
		$CASE_PRODUCTID = "";
		$CASE_QTY = 0;
		$POSSTAT = "";
		$DECL1 = 0;
		$FOB = 0;
		$FREIGHT = 0;
		$INSUR = 0;
		$DECL2 = 0;
		$DUTY_VAT = 0;
		$MCC_EXP = 0;
		$LDC = 0;
		$FREIGHT_SG = 0;
		$INSUR_SG = 0;
		$RECEIVENO = "";
		$OTHER_PRICE = 0;
		$PO_COLID = 0;
		$CHANGE_REWARD = 0;
		$MONEY_REWARD = 0;
		$IS_MONEY_REWARD = "";
		$PACK_RECEIVE = 0;
		$PACK_UNIT = "";
		$REWARD_UNIT = "";		
		$COST_METHOD = "AG";
		$BASECURR_ID = "USD";		
		$CURRENCY_AMOUNT = $TRANCOST * ((100 - $TRANDISC)/100) * $item["QUANTITY"] * -1; // ?
		$CURRENCY_COST = $TRANCOST *  $item["QUANTITY"] * -1;
		$CURRENCY_COST_ADD = 0;
		$CURRENCY_EXTPRICE = 0;
		$CURRENCY_PRICE = 0;
		$FF_LF_INDEX = 0;
		$PURPOSE_ISSUE = "";
		$JOB_ID = "";
		$ROW_ID = 0;
		$MAIN_PRODUCTID = $oneItem["PRODUCTID"] ?? "";
		$USERADD = $author;
		$DATEADD = $today;
	
		$_AMT_VAT += ((100 - ($receiveDetail["VAT_PERCENT"] ?? 0) )/100) * ($receiveDetail["CURRENCY_COST"] ?? 0) * $item["QUANTITY"];
		// Calculate amount
		$_AMT_WITHOUTDISCOUNT += $CURRENCY_COST;
		$_AMT_WITHDISCOUNT += $CURRENCY_AMOUNT;

		$sql = "INSERT INTO ICTRANDETAIL (
						DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,
						BATCHNO,SERIAL,TIERID,TRANDATE,TRANTYPE,
						LINENUM,PRODUCTNAME,PRODUCTNAME1,REFERENCE,COMMENT,
						TRANQTY,TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,
						TRANDISC,TRANTAX,TRANCOST,TRANPRICE,PRICE_ORI,
						EXTPRICE,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,
						CUSTID,VENDID,WEIGHT,OLDWEIGHT, APPLID,
						CURRENTCOST,LASTCOST,COST_ADD,COST_RIEL,LINK_LINE,
						ICCLEARING_ACC,INVENTORY_ACC,COSG_ACC, DIMENSION,FILEID,
						IS_CHANGE_AVGCOST,WASTE_QTY,PRODUCT_PRODUCTID,IS_PROCCESS,TRANQTY_NEW,
						TRANCOST_NEW,TRANEXTCOST_NEW,LINE_DISCAMT,COST_CENTER,LINE_NOTE,
						CASE_PRODUCTID,CASE_QTY,POSSTAT,DECL1,FOB,
						FREIGHT,INSUR,DECL2,DUTY_VAT, MCC_EXP,
						LDC,FREIGHT_SG,INSUR_SG,RECEIVENO,OTHER_PRICE,
						PO_COLID,CHANGE_REWARD,MONEY_REWARD,IS_MONEY_REWARD,PACK_RECEIVE,
						PACK_UNIT,REWARD_UNIT,COST_METHOD,BASECURR_ID,CURRENCY_AMOUNT,
						CURRENCY_COST,CURRENCY_COST_ADD,CURRENCY_EXTPRICE,CURRENCY_PRICE,FF_LF_INDEX,
						PURPOSE_ISSUE,JOB_ID,ROW_ID,MAIN_PRODUCTID,USERADD,
						DATEADD
						) 
						VALUES (?,?,?,?,?,
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
								?)"; 
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
						$ICCLEARING_ACC,$INVENTORY_ACC,$COSG_ACC, $DIMENSION,$FILEID,
						$IS_CHANGE_AVGCOST,$WASTE_QTY,$PRODUCT_PRODUCTID,$IS_PROCCESS,$TRANQTY_NEW,
						$TRANCOST_NEW,$TRANEXTCOST_NEW,$LINE_DISCAMT,$COST_CENTER,$LINE_NOTE,
						$CASE_PRODUCTID,$CASE_QTY,$POSSTAT,$DECL1,$FOB,
						$FREIGHT,$INSUR,$DECL2,$DUTY_VAT, $MCC_EXP,
						$LDC,$FREIGHT_SG,$INSUR_SG,$RECEIVENO,$OTHER_PRICE,
						$PO_COLID,$CHANGE_REWARD,$MONEY_REWARD,$IS_MONEY_REWARD,$PACK_RECEIVE,
						$PACK_UNIT,$REWARD_UNIT,$COST_METHOD,$BASECURR_ID,$CURRENCY_AMOUNT,
						$CURRENCY_COST,$CURRENCY_COST_ADD,$CURRENCY_EXTPRICE,$CURRENCY_PRICE,$FF_LF_INDEX,
						$PURPOSE_ISSUE,$JOB_ID,$ROW_ID,$MAIN_PRODUCTID,$USERADD,
						$DATEADD)
					);
		$linenum++;

		$TRANDATEGT = "";//?
		$TRANDATELT = "";//?
		$TRANTYPE = "";//?
		$IS_PROCESS = "";//?

		$sql = "UPDATE ICTRANDETAIL 
		set TRANCOST = EXTCOST/TRANQTY,
		TRANCOST_NEW = EXTCOST/TRANQTY,
		TRANEXTCOST_NEW = EXTCOST,
		CURRENCY_COST = EXTCOST/TRANQTY
		WHERE TRANDATE>= ? 
		AND TRANDATE <= ? 
		AND PRODUCTID = ?  
		AND (TRANTYPE = ? AND IS_PROCCESS = ?)";

		$req = $db->prepare($sql);
		$req->execute(array(
			$TRANDATEGT,$TRANDATELT,$item["PRODUCTID"],$TRANTYPE,$IS_PROCESS
		)); 
	}
		//****** IF VENDOR NOT VAT INSERT 2LINE (17000) AND (20000)***************************
		//****** IF VENDOR HAS VAT INSERT 3 LINE (17000) AND (16100) AND (20000) ********
		$theGLNO = date('y').date('m')."00000".$GLNUM;		
				
		$GLNO = $theGLNO;
		$LINNO = "1";
		$GLDESC = "Return PO";
		$GLDATE = $todayDate;
		$GLYEAR = $todayYear;
		$GLMONTH = $todayMonth;
		$ACCNO = "17000";
		$GLAMT = $_AMT_WITHDISCOUNT;
		$DEBIT = 0;
		$CREDIT = $_AMT_WITHDISCOUNT;
		$DOCNO = $theDOCNO;
		$USERADD = $author;
		$DATEADD = $today;
		$GLPOST = "N";
		$GLTYPE = "J";
		$APPID = "PO";	
		$REMARKS = "";
		$CUSTID = "";
		$FILEID = "";
		$LOCID = $locid;
		$sql = "INSERT INTO GLTRAN (
					GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
					GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,
					DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,
					APPID,REMARKS,CUSTID,VENDID,FILEID,
					LOCID) 
					VALUES (
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?,?,?,?,?,
					?)";

		$req = $db->prepare($sql);
		$req->execute(array(
					$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
					$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
					$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,
					$APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,
					$LOCID
		));					
	
		if ($HAVEVAT)
		{
			$GLNO = $theGLNO;
			$LINNO = "2";
			$GLDESC = "Return PO";
			$GLDATE = $todayDate;
			$GLYEAR = $todayYear;
			$GLMONTH = $todayMonth;
			$ACCNO = "16100";
			$GLAMT = $_AMT_VAT;
			$DEBIT = 0;
			$CREDIT = $_AMT_VAT;
			$DOCNO =  $theDOCNO;;
			$USERADD = $author;
			$DATEADD = $today;
			$GLPOST = "N";
			$GLTYPE = "J";
			$APPID = "PO";	
			$REMARKS = "";
			$CUSTID = "";
			//$VENDID
			$FILEID = "";
			$LOCID = $locid;
			

			$sql = "INSERT INTO GLTRAN (
						GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
						GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,
						DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,
						APPID,REMARKS,CUSTID,VENDID,FILEID,						
						LOCID) 
						VALUES (
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?)";

			$req = $db->prepare($sql);
			$req->execute(array(
			$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
			$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
			$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,
			$APPID,$REMARKS,$CUSTID,$VENDID,$FILEID,
			$LOCID));			
		}
		$GLNO = $theGLNO;
		if ($HAVEVAT)
			$LINNO = "3";
		else
			$LINNO = "2";
		$GLDESC = "Return PO";
		$GLDATE = $todayDate;
		$GLYEAR = $todayYear;
		$GLMONTH = $todayMonth;
		$ACCNO = "20000";

		$GLAMT = $_AMT_WITHDISCOUNT + $_AMT_VAT;
		$DEBIT = $_AMT_WITHDISCOUNT + $_AMT_VAT;
		$CREDIT = 0;
		$DOCNO = $theDOCNO;
		$USERADD = $author;
		$DATEADD = $today;
		$GLPOST = "N";
		$GLTYPE = "J";
		$APPID = "PO";
		$REMARKS = "";
		$CUSTID = "";
		//$VENDID
		$FILEID = "";
		$LINE_ACC = "";
		$LOCID = $locid;

		$sql = "INSERT INTO GLTRAN (
						GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
						GLMONTH,ACCNO,GLAMT,DEBIT,CREDIT,
						DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,
						APPID,REMARKS,CUSTID,VENDID,FILEID,
						LINE_ACC,LOCID) 
				VALUES (?,?,?,?,?,
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
						$LINE_ACC,$LOCID
		));	
		



	foreach($items as $item)
	{
		
		$PRODUCTID = $item["PRODUCTID"];
		$sql = "UPDATE ICPRODUCT set ONHAND = ONHAND - ?, TOTALUSE = TOTALUSE + ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["QUANTITY"],$item["QUANTITY"],$PRODUCTID));
				
		$LASTUSE = $today;
		$LOCID = $locid;
		$PRODUCTID = $item["PRODUCTID"];
		$sql = "UPDATE ICLOCATION 
		set LOCONHAND = LOCONHAND - ?, 
		TOTALUSE = TOTALUSE + ?, 
		LASTUSE = ? 
		WHERE LOCID = ? 
		AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["QUANTITY"],$item["QUANTITY"],$LASTUSE,$locid,$PRODUCTID));
	}

		

	/*
	****** IF VENDOR NOT VAT INSERT 1 LINE (21400)**************************
	****** IF VENDOR HAS VAT INSERT 2 LINE (21400) AND (16100)************
	*/
	//$VENDID;
	$VOUCHERNO = $theDOCNO;
	$TRANDATE = $today;
	$LINENUM = "1";
	$ACCNO = "21400";

	$AMOUNT = $_AMT_WITHDISCOUNT;
	$PERIOD = $todayMonth;
	$YEAR = $todayYear;
	$BATCH = "";
	$REFERENCE = $PONUMBER;

	$ACCNAME = "PO Clearing";
	$ACCNAME1 = "";
	$STAT = "";
	$TYPE = "";
	$BATCHDATE = $today;

	$FILEID = "";	
	$CURR_AMOUNT = $_AMT_WITHDISCOUNT; //??
	$CURR_RATE = 1;
	$OPERATION_BASE = "";	
	$BASECURR_ID = "";

	$CURR_ID = "USD";
	$USERADD = $author;
	$DATEADD = $today;
	$sql = "INSERT INTO APACCOUNT (
					VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,
					AMOUNT,PERIOD,YEAR,BATCH,REFERENCE,
					ACCNAME,ACCNAME1,STAT,TYPE,BATCHDATE,
					FILEID,CURR_AMOUNT,CURR_RATE,OPERATION_BASE,BASECURR_ID,
					CURR_ID,USERADD,DATEADD) VALUES (
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?
					)";
	$req = $db->prepare($sql);					
	$req->execute(array($VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
						$AMOUNT,$PERIOD,$YEAR,$BATCH,$REFERENCE,
						$ACCNAME,$ACCNAME1,$STAT,$TYPE,$BATCHDATE,
						$FILEID,$CURR_AMOUNT,$CURR_RATE,$OPERATION_BASE,$BASECURR_ID,
						$CURR_ID,$USERADD,$DATEADD));	
	

	if ($HAVEVAT)
	{
		// IF VAT
		//VENDID
		$VOUCHERNO = $theDOCNO;
		$TRANDATE = $today;
		$LINENUM = "2";
		$ACCNO = "16100";

		$AMOUNT = $_AMT_VAT * -1;
		$PERIOD = $todayMonth;
		$YEAR = $todayYear;
		$BATCH = "";
		$REFERENCE = $PONUMBER;

		$ACCNAME = "VAT Input";
		$ACCNAME1 = "";
		$STAT = "";
		$TYPE = "T";
		$BATCHDATE = $today;

		$FILEID = "";
		$CURR_AMOUNT = $_AMT_VAT * -1;
		$CURR_RATE = 1;
		$OPERATION_BASE = "";
		$BASECURR_ID = "USD";
		$CURR_ID = "USD";
		$USERADD = $author;
		$DATEADD = $today;	

		$sql = "INSERT INTO APACCOUNT (
						VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,
						AMOUNT,PERIOD,YEAR,BATCH,REFERENCE,
						ACCNAME,ACCNAME1,STAT,TYPE,BATCHDATE,
						FILEID,CURR_AMOUNT,CURR_RATE,OPERATION_BASE,BASECURR_ID,
						CURR_ID,USERADD,DATEADD) VALUES (
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?)";
		$req = $db->prepare($sql);					
		$req->execute(array(
						$VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
						$AMOUNT,$PERIOD,$YEAR,$BATCH,$REFERENCE,
						$ACCNAME,$ACCNAME1,$STAT,$TYPE, $BATCHDATE,
						$FILEID, $CURR_AMOUNT,$CURR_RATE,$OPERATION_BASE, $BASECURR_ID,							
						$CURR_ID,$USERADD,$DATEADD));					
	}


	$BALANCE = $_AMT_WITHDISCOUNT + $_AMT_VAT; // ??
	$sql = "UPDATE APVENDOR SET BALANCE = BALANCE - ? WHERE VENDID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($BALANCE,$VENDID));
	
	//PONUMBER
	//VENDID
	$TOADDRESS1 = "";
	$TOVENDID = "";
	$TOPHONE1 = "";
	$TOFAXNO = "";
	$TOCOUNTRY = "";
	$TOCITY = "";
	$ADDRESS1 = "";
	$COUNTRY = "";
	$PHONE1 = "";
	$FAXNO = "";
	$CITY = "";
	$USERADD = $author;
	$DATEADD = $today;
	$sql = "INSERT INTO POLOCATION (
				PONUMBER,VENDID,TOADDRESS1,TOVENDID,TOPHONE1,
				TOFAXNO,TOCOUNTRY,TOCITY,ADDRESS1,COUNTRY,
				PHONE1, FAXNO,CITY,USERADD,DATEADD) 
				values (?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?
							)";
	$req = $db->prepare($sql);					
	$req->execute(array(
		$PONUMBER,$VENDID,$TOADDRESS1,$TOVENDID,$TOPHONE1,
		$TOFAXNO,$TOCOUNTRY,$TOCITY,$ADDRESS1,$COUNTRY,
		$PHONE1,$FAXNO,$CITY,$USERADD,$DATEADD));
	return $PONUMBER;
}


?>
