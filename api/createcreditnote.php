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

    $PONUMBER = sprintf("RT%013d",intval($res["num2"])); ; 

    $sql = "UPDATE SYSDATA SET num3=num3+1 WHERE ltrim(rtrim(SYSID))='PO'";
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
	$sql = "SELECT VENDID,APVENDOR.VENDNAME,APVENDOR.VENDNAME1,APVENDOR.TAX FROM ICPRODUCT,APVENDOR WHERE VENDID.ID";
	$req = $db->prepare($sql);
	$req->execute($firstItem["PRODUCTID"]);
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if (floatval($res["TAX"])  > 0.0)
		$HAVEVAT = true;
	else 
		$HAVEVAT = false;

	$purchase_amt = 0;
	$receive_amt = 0;
	$currency_amount = 0;
	$currency_vatamount = 0;
	$CURRENCY_RECEIVEAMOUNT = 0;
	$VAT_AMT = 0;
	foreach($items as $item){
		$sql = "SELECT CURRENCY_COST,TRANDISC,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY DATEADD DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));		
		$oneitem = $req->fetch(PDO::FETCH_ASSOC);
		
		$amt = ($item["QUANTITY"] * $oneitem["CURRENCY_COST"]) * ( (100 - $oneitem["TRANDISC"]) / 100);

		$purchase_amt += $amt;
		$receive_amt +=  $amt; 
		$currency_amount -= $amt;
		$currency_vatamount -= $oneitem["CURRENCY_COST"] * ((100 - $oneitem["VAT_PERCENT"])/100); // TODO CHECK
		$CURRENCY_RECEIVEAMOUNT -= $amt;		
	}
	

	$VENDID = $res["VENDID"];
	$VENDNAME = $res["VENDNAME"];
	$VENDNAME1 = $res["VENDNAME1"];
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
	$NOTE = $note;
	$USERADD = $author;
	$DATEADD = $today;
	$POSTATUS = "R";
	$VAT_PERCENT = $res["TAX"];

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
	$CURRENCY_VATAMOUNT = "";
	$CURRENCY_RECEIVEAMOUNT = "";
	$DISC_AMT_HEADER = 0;
	$COST_ADD_HEADER = 0;
	$COST_ADD_HEADER2 = 0;

	$sql = "INSERT INTO POHEADER (
					PONUMBER,VENID,VENDNAME,VENDNAME1,PODATE,
					LOCID,PURCHASE_AMT,RECEIVE_AMT,TERMID,TERM_DAYS,
					TERM_DISC,TERM_NET,FOB_POINT,SHIPVIA,NOTE,
					USERADD,DATEADD,POSTATUS,VAT_PERCENT,PCNAME,
					CURR_RATE,CURRID,EST_ARRIVAL,REQUIRE_DATE,REQUESTBY
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
											 $LOCID,$PURCHASE_AMT,$RECEIVE_AMT,$NOTE,$USERADD,
											 $DATEADD,$POSTATUS,$VAT_PERCENT,$PCNAME,$CURR_RATE,
										   $CURRID,$EST_ARRIVAL,$REQUIRE_DATE,$VAT_AMT,$REFERENCE,
											 $DISC_PERCENT,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,$CURRENCY_RECEIVEAMOUNT));
	

	$linecount = 1;
	foreach($items as $item){

		$sql = "SELECT ONHAND FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute($item["PRODUCTID"]);
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT TRANCOST,EXTCOST,TRANDISC,PRODUCTNAME,PRODUCTNAME1 
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				ORDER BY DATEADD DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"])); 
		$receiveDetail = $req->fetch(PDO::FETCH_ASSOC);

		$PRODUCTID = $item["PRODUCTID"];
		$PRODUCTNAME = $receiveDetail["PRODUCTNAME"];
		$PRODUCTNAME1 = $receiveDetail["PRODUCTNAME1"];
		$ORDER_QTY = $item["QUANTITY"];
		$RECEIVE_QTY = $item["QUANTITY"];
		$TRANUNIT = "UNIT";
		$TRANFACTOR = "1.00000";
		$STKFACTOR = "1.00000";
		$STKUNIT = "UNIT";
		
		$TRANDISC = $receiveDetail["TRANDISC"];
		$PURCHASE_DATE = $today;
		$TRANCOST = $receiveDetail["TRANCOST"]; 
		$EXTCOST =  $receiveDetail["TRANCOST"] * $item["QUANTITY"]; 
		$CURRENTONHAND = $oneItem["ONHAND"];
		$CURR_RATE = "1";
		$CURRID = "USD";
		$WEIGHT = "1.00000";
		$OLDWEIGHT = "1.00000";
		$COST_ADD = "0.0000";
		$TRANLINE = $linecount;
		$VATABLE = 0;
		$VAT_PERCENT;
		$POSTATUS = "R";
		$BASECURR_ID = "USD";
		$CURRENCY_AMOUNT;
		$CURRENCY_COST = "";
		$USERADD = $today;
		$DATEADD = $today;
		$sql = "INSERT INTO PODETAIL (PONUMBER,VENDID,VENDNAME,VENDNAME1,PURCHASE_DATE,
						LOCID,PRODUCTID,PRODUCTNAME,PRODUCTNAME1,ORDER_QTY,
						RECEIVE_QTY,TRANUNIT,TRANFACTOR,STKFACTOR,STKUNIT,
						TRANDISC,TRANCOST,EXTCOST,CURRENTONHAND,CURR_RATE,
						CURRID,WEIGHT,OLDWEIGHT,COST_ADD,TRANLINE,
						VATABLE,VAT_PERCENT,POSTATUS,BASECURR_ID,CURRENCY_AMOUNT
						CURRENCY_COST,USERADD,DATEADD ) 
						VALUES (?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?,?,?,
								?,?,?)";

		$req = $db->prepare($sql);

		$req->execute(array($PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PURCHASE_DATE,
							 $LOCID,$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$ORDER_QTY,
							$RECEIVE_QTY,$TRANUNIT,$TRANFACTOR,$STKFACTOR,$STKUNIT,
							$TRANDISC,$TRANCOST,$EXTCOST,$CURRENTONHAND,$CURR_RATE,
							$CURRID,$WEIGHT,$OLDWEIGHT,$COST_ADD,$TRANLINE,
							$VATABLE,$VAT_PERCENT,$POSTATUS,$BASECURR_ID,$CURRENCY_AMOUNT,
							$CURRENCY_COST,$USERADD,$DATEADD));		
		$linecount++;		
	}

	
	$sql = "SELECT num1 FROM SYSDATA WHERE sysid = 'AP'";
    $req = $db->prepare($sql);
	$req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $APNUM = intval($res["num1"]);    

	$DOCNUM =  sprintf("VO%013d",$APNUM); 	
	$FLOCID = "WH2";
	$REFERENCE = "Return PO " + $PONUMBER;
	$TRANDATE = $today;
	$TRANTYPE = "I";	 
	$TOTAL_AMT = $CURRENCY_AMOUNT;
	$PCNAME = "Application";
	$CURRID = "USD";
	$CURR_RATE = 1;	
	$DISC_PERCENT;
	$VAT_PERCENT;
	$APPLID = "PO";
	$BASECURR_ID;
	$CURRENCY_AMOUNT;
	$USERADD = $author;
	$DATEADD = $today;

	$sql = "INSERT INTO ICTRANHEADER (DOCNUM,FLOCID,REFERENCE,TRANDATE,TRANTYPE, 
											 TOTAL_AMT,PCNAME,CURRID,CURR_RATE,VENDID,
											 DISC_PERCENT,VAT_PERCENT,APPLID,BASECURR_ID,CURRENCY_AMOUNT,
											 USERADD,DATEADD) 
											 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$req = $db->prepare($sql);	
	$req->execute(array(
	$DOCNUM,$FLOCID,$REFERENCE,$TRANDATE,$TRANTYPE,	 
	$TOTAL_AMT,$PCNAME,$CURRID,$CURR_RATE,$VENDID,
	$DISC_PERCENT,$VAT_PERCENT,$APPLID,$BASECURR_ID,$CURRENCY_AMOUNT,
	$USERADD,$DATEADD));
	
	$linenum = 1;	
	$_AMT_WITHOUTDISCOUNT = 0;
	$_AMT_WITHDISCOUNT = 0;
	$_AMT_VAT = 0;
	foreach($items as $item){
		$sql = "SELECT CATEGORYID,CLASSID,ONHAND,PRODUCTNAME,PRODUCTNAME1,PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT TRANDISC,VAT_PERCENT,CURRENCY_COST FROM PORECEIVEDETAIL WHERE ICPRODUCT = ? ORDER BY TRANDATE DESC";
		$req = $db->prepare($sql);
		$receiveDetail = $req->fetch(PDO::FETCH_ASSOC);

		$DOCNUM = sprintf("VO%013d",$APNUM); 	
		$PRODUCTID = $item["PRODUCTID"];
		$LOCID = 'WH2';
		$CATEGORYID = $oneItem["CATEGORYID"];
		$CLASSID = $oneItem["CLASSID"];
		$TRANDATE = $today;
		$TRANTYPE = "I";
		$LINENUM = $linenum;
		$PRODUCTNAME = $oneItem["PRODUCTNAME"];
		$PRODUCTNAME1 = $oneItem["PRODUCTNAME1"];	
		$REFERENCE = "Return PO " + $PONUMBER;
		$TRANQTY = $item["QUANTITY"];
		$TRANUNIT = "UNIT";
		$TRANFACTOR = 1;
		$STKUNIT = "UNIT";
		$STKFACTOR = 1;
		$TRANDISC = $receiveDetail["TRANDISC"];
		$TRANTAX =  $receiveDetail["VAT_PERCENT"];
		$TRANCOST = $receiveDetail["CURRENCY_COST"];
		$TRANPRICE = $oneItem["PRICE"];
		$PRICE_ORI = $oneItem["PRICE"];
		$EXTPRICE = $oneItem["PRICE"];
		$EXTCOST = $oneItem["CURRENCY_COST"];
		$CURRENTONHAND = $oneItem["ONHAND"];
		$CURRID = "CURRID";
		$CURR_RATE = 1;
		$WEIGHT = 1;
		$APPLID = "PO";
		$CURRENTCOST = $oneItem["CURRENCY_COST"];
		$LASTCOST = $oneItem["CURRENCY_COST"];
		$ICCLEARING_ACC = 21400;
		$INVENTORY_ACC = 17000;
		$DIMENSION = 1;
		$TRANQTY_NEW = 	$item["QUANTITY"]; // TO CHECK
		$TRANCOST_NEW = $oneItem["CURRENCY_COST"];
		$TRANEXTCOST_NEW = $oneItem["CURRENCY_COST"] * $item["QUANTITY"];
		$COST_METHOD = "AG";
		$BASECURR_ID = "USD";
		$CURRENCY_COST = $oneItem["CURRENCY_COST"] * $item["QUANTITY"];
		$CURRENCY_AMOUNT = ($oneItem["CURRENCY_COST"] * ((100 - $TRANDISC)/100)) * $item["QUANTITY"];	
		$MAIN_PRODUCTID = $oneItem["PRODUCTID"];
		$USERADD = $author;
		$DATEADD = $today;
	
		$_AMT_VAT += ((100 - $receiveDetail["VAT_PERCENT"])/100) * $receiveDetail["CURRENCY_COST"] * $item["QUANTITY"];
		// Calculate amount
		$_AMT_WITHOUTDISCOUNT += $CURRENCY_COST;
		$_AMT_WITHDISCOUNT += $CURRENCY_AMOUNT;

		$sql = "INSERT INTO ICTRANDETAIL (DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,
						TRANDATE,TRANTYPE,LINENUM,PRODUCTNAME,PRODUCTNAME1,
						REFERENCE,TRANQTY,TRANUNIT,TRANFACTOR,STKUNIT,
						STKFACTOR,TRANDISC,TRANTAX,TRANCOST,TRANPRICE,
						PRICE_ORI,EXTPRICE,EXTCOST,CURRENTONHAND,CURRID,
						CURR_RATE,VENDID,WEIGHT,APPLID,CURRENTCOST,
						LASTCOST,ICCLEARING_ACC,INVENTORY_ACC,DIMENSION,TRANQTY_NEW,
						TRANCOST_NEW,TRANEXTCOST_NEW,COST_METHOD,BASECURR_ID,CURRENCY_AMOUNT,
						CURRENCY_COST,MAIN_PRODUCTID,USERADD,DATEADD
						) 
						VALUES (?,?,?,?,?,?,?,?,?,?,
								?,?,?,?,?,?,?,?,?,?,
								?,?,?,?,?,?,?,?,?,?,
								?,?,?,?,?,?,?,?,?,?,
								?,?,?,?)"; 
		$req = $db->prepare($sql);			 
	
		$req->execute(array(
		$DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID,
		$TRANDATE,$TRANTYPE,$LINENUM,$PRODUCTNAME,$PRODUCTNAME1,
		$REFERENCE,$TRANQTY,$TRANUNIT,$TRANFACTOR,$STKUNIT,		
		$STKFACTOR,$TRANDISC,$TRANTAX,$TRANCOST,$TRANPRICE,
		$PRICE_ORI,$EXTPRICE,$EXTCOST,$CURRENTONHAND,$CURRID,
		$CURR_RATE,$VENDID,$WEIGHT,$APPLID,$CURRENTCOST,
		$LASTCOST,$ICCLEARING_ACC,$INVENTORY_ACC,$DIMENSION,$TRANQTY_NEW,	
		$TRANCOST_NEW,$TRANEXTCOST_NEW,$COST_METHOD,$BASECURR_ID,$CURRENCY_AMOUNT,
		$CURRENCY_COST,$MAIN_PRODUCTID,$USERADD,$DATEADD));
	
		$linenum++;
		// TODO !!!// 	
		/*
		+UDPATE ICTRANDETAIL
		UPDATE [ICTRANDETAIL] set 
		[TRANCOST] = [EXTCOST]/[TRANQTY],
		[TRANCOST_NEW] = [EXTCOST]/[TRANQTY],
		[TRANEXTCOST_NEW] = [EXTCOST],
		[CURRENCY_COST] = [EXTCOST]/[TRANQTY]
		WHERE [TRANDATE]>=@1 
		AND [TRANDATE]<=@2 
		AND [PRODUCTID]=@3 
		AND ([TRANTYPE]=@4 
		AND [IS_PROCCESS]=@5);
		*/	
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
		$CREDIT = $_AMT_WITHDISCOUNT;
		$DOCNO = 
		$USERADD = $author;
		$DATEADD = $today;
		$GLPOST = "N";
		$GLTYPE = "J";
		$APPID = "PO";	
		$LOCID = "WH2";
		$sql = "INSERT INTO GLTRAN (GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
					GLMONTH,ACCNO,GLAMT,CREDIT,DOCNO,
					USERADD,DATEADD,GLPOST,GLTYPE,APPID,
						VENDID,LOCID) 
						VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array($GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
		$GLMONTH,$ACCNO,$GLAMT,$CREDIT,$DOCNO,
		$USERADD,$DATEADD,$GLPOST,$GLTYPE,$APPID,
		$VENDID,$LOCID
		));					
		/*
		+ INSERT INTO GLTRAN (17000) INVENTORY
		INSERT INTO [GLTRAN]
		([GLNO],   => Auto Number : year (yy)+ month(MM) + 0000000+GLNO(GLSYS)
		[LINNO],   => Line Number of Return
		[GLDESC],  => (Return PO) 
		[GLDATE],  => Date Return (yyyy-MM-dd)
		[GLYEAR],  => Year Return (yyyy)
		[GLMONTH],  => Month Return (M)
		[ACCNO],  => (17000) 
		[GLAMT],  => SubToTaL 
		[DEBIT],   => (0)
		[CREDIT],  => SubTotal
		[DOCNO],  => VO000000000030 (AUTO VO+…) —> AP: num1
		[USERADD],  => User Return
		[DATEADD],  => Date Return
		[GLPOST],  => (N)
		[GLTYPE],  => (J)
		[APPID],   => (PO)
		[REMARKS],  => (Null)
		[CUSTID],  => (Null)
		[VENDID],  => Vendor ID Return
		[FILEID],    => (Null)
		[LINE_ACC],  => (Null)
		[COLID],   => Auto
		[LOCID]);  => Local ID
		*/

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
			$CREDIT = $_AMT_VAT;
			$DOCNO = sprintf("VO%013d",$APNUM);
			$USERADD = $author;
			$DATEADD = $today;
			$GLPOST = "N";
			$GLTYPE = "J";
			$APPID = "PO";		
			$sql = "INSERT INTO GLTRAN (GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
						GLMONTH,ACCNO,GLAMT,CREDIT,DOCNO,
						USERADD,DATEADD,GLPOST,GLTYPE,APPID,
							VENDID,LOCID) 
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$req = $db->prepare($sql);
			$req->execute(array($GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
			$GLMONTH,$ACCNO,$GLAMT,$CREDIT,$DOCNO,
			$USERADD,$DATEADD,$GLPOST,$GLTYPE,$APPID,
			$VENDID,$LOCID
			));	
			/*
			+ INSERT INTO GLTRAN (16100) VAT INPUT
			INSERT INTO [GLTRAN]
			([GLNO],   => Auto Number : year + month + 00000001
			[LINNO],   => Line Number of Return
			[GLDESC],  => (Return PO) 
			[GLDATE],  => Date Return (yyyy-MM-dd)
			[GLYEAR],  => Year Return (yyyy)
			[GLMONTH],  => Month Return (M)
			[ACCNO],  => (16100) 
			[GLAMT],  => Total VAT 
			[DEBIT],   => (0)
			[CREDIT],  => Total VAT
			[DOCNO],  => VO000000000030 (AUTO VO+…) —> AP: num1
			[USERADD],  => User Return
			[DATEADD],  => Date Return
			[GLPOST],  => (N)
			[GLTYPE],  => (J)
			[APPID],   => (PO)
			[REMARKS],  => (Null)
			[CUSTID],  => (Null)
			[VENDID],  => Vendor Return
			[FILEID],    => (Null)
			[LINE_ACC],  => (Null)
			[COLID],   => Auto
			[LOCID]);  => Local ID
			*/
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
		$DEBIT = $_AMT_WITHDISCOUNT;
		$CREDIT = 0;
		$DOCNO = sprintf("VO%013d",$APNUM);
		$USERADD = $author;
		$DATEADD = $today;
		$GLPOST = "N";
		$GLTYPE = "J";
		$APPID = "PO";
		$LOCID = "WH2";

		$sql = "INSERT INTO GLTRAN (GLNO,LINNO,GLDESC,GLDATE,GLYEAR,
									GLMONTH,ACCNO,GLAMT,CREDIT,DEBIT
									DOCNO,USERADD,DATEADD,GLPOST,GLTYPE,
									APPID,VENDID,LOCID) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$req = $db->prepare($sql);
		$req->execute(array($GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
		$GLMONTH,$ACCNO,$GLAMT,$CREDIT,$DEBIT,
		$DOCNO,$USERADD,$DATEADD,$GLPOST,$GLTYPE,
		$APPID,$VENDID,$LOCID
		));	
		/*
		+ INSERT INTO GLTRAN (20000) ACCOUNT PAYBLE
		INSERT INTO [GLTRAN]
		([GLNO],   => Auto Number : year + month + 00000001
		[LINNO],   => Line of Return
		[GLDESC],  => (Return PO) 
		[GLDATE],  => Date Return (yyyy-MM-dd)
		[GLYEAR],  => Year Return (yyyy)
		[GLMONTH],  => Month Return (M)
		[ACCNO],  => (20000) 
		[GLAMT],  => Grand Total Amount (Subtotal + VTA  amount)
		[DEBIT],   => Grand Total Amount
		[CREDIT],  => (0)
		[DOCNO],  => VO000000000030 (AUTO VO+…) —> AP: num1
		[USERADD],  => User Return
		[DATEADD],  => Date return
		[GLPOST],  => (N)
		[GLTYPE],  => (J)
		[APPID],   => (PO)  
		[REMARKS],  => (Null)
		[CUSTID],  => (Null) 
		[VENDID],  => Vendor Return
		[FILEID],    => (Null)
		[LINE_ACC],  => (Null)
		[LOCID]);  => Local ID

		*/
	foreach($items as $item)
	{
		$sql = "SELECT ONHAND FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);

		$ONHAND = $oneItem["ONHAND"];		
		$PRODUCTID = $item["PRODUCTID"];
		$sql = "UPDATE ICPRODUCT set ONHAND = ?, TOTALUSE = TOTALUSE + ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($ONHAND,$ONHAND,$PRODUCTID));
		/*
		+UPDATE ICPRODUCT
		UPDATE [ICPRODUCT] set 
		[ONHAND] = [ONHAND]-@1,
		[TOTALUSE] = [TOTALUSE]+@2  
		WHERE [PRODUCTID]=@3;
		+ Update Onhand in ICPRODUCT with Item code 
		*/

		$LOCONHAND = $ONHAND;
		$LASTUSE = $today;
		$LOCID = "WH2";
		$PRODUCTID = $item["PRODUCTID"];
		$sql = "UPDATE ICLOCATION set LOCONHAND = ?, TOTALUSE = TOTALUSE + ?, LASTUSE = ? WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($LOCONHAND,$ONHAND,$LASTUSE,$LOCID,$PRODUCTID));

		/*
		+UPDATE ICLOCATION
		UPDATE [ICLOCATION] set 
		[LOCONHAND] = [LOCONHAND]-@1,
		[TOTALUSE] = [TOTALUSE]+@2,
		[LASTUSE] = @3  
		WHERE [LOCID]=@4 AND [PRODUCTID]=@5;
		+ Update Onhand in ICLOCATION with Item code 
		*/
	}

		

	/*
	****** IF VENDOR NOT VAT INSERT 1 LINE (21400)**************************
	****** IF VENDOR HAS VAT INSERT 2 LINE (21400) AND (16100)************
	*/
	$VENDID;
	$VOUCHERNO = sprintf("VO%013d",$APNUM); 
	$TRANDATE = $today;
	$LINENUM = "1";
	$ACCNO = "21400";
	$AMOUNT = $_AMT_WITHDISCOUNT; //??
	$PERIOD = $todayMonth;
	$YEAR = $todayYear;
	$REFERENCE;
	$ACCNAME = "PO Clearing";
	$TYPE = null;
	$BATCHDATE = $today;
	$CURR_AMOUNT = ""; //??
	$CURR_RATE = 1;
	$BASECURR_ID;
	$CURR_ID = "USD";
	$USERADD = $author;
	$DATEADD = $today;
	$sql = "INSERT INTO APACCOUNT (VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,
					AMOUNT,PERIOD,YEAR,REFERENCE,ACCNAME,
					TYPE,BATCHDATE,CURR_AMOUNT,CURR_RATE,
					BASECURR_ID,CURR_ID,USERADD,DATEADD)";
	$req = $db->prepare($sql);					
	$req->execute(array($VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
						$AMOUNT,$PERIOD,$YEAR,$REFERENCE,$ACCNAME,
						$TYPE,$BATCHDATE,$CURR_AMOUNT,$CURR_RATE,
						$BASECURR_ID,$CURR_ID,$USERADD,$DATEADD));	
	
	/*
	+INSERT INTO APACCOUNT
	INSERT INTO [APACCOUNT]
	([VENDID],   => Verdor ID
	[VOUCHERNO],  =>  VO000000000030 (AUTO VO+…) —> AP: num1
	[TRANDATE],   => Date Return
	[LINENUM],   => (1)
	[ACCNO],   => (21400) (PO Clearing)
	[AMOUNT],   => Amount Return (Minus Grand Total)
	[PERIOD],   => Month of Return (MM) 
	[YEAR],    => Year of Return (yyyy)
	[BATCH],   => (Null)
	[REFERENCE],  => Return Number(RTXXXXXXXXX)
	[ACCNAME],   => “PO Clearing”
	[ACCNAME1],   => (Null)
	[STAT],    => (Null)
	[TYPE],    => (Null)
	[BATCHDATE],  => Date Return
	[FILEID],    => (Null)
	[CURR_AMOUNT], => Subtotal (Menus Subtotal) 
	[CURR_RATE],  => (1)
	[OPERATION_BASE], => (Null)q
	[BASECURR_ID],  => (USD)
	[CURR_ID],   =>(USD)
	[USERADD],   => User Return
	[DATEADD]);   => Date Return 
	*/

	if ($HAVEVAT)
	{
		// IF VAT
		$VOUCHERNO = sprintf("VO%013d",$APNUM); 
		$TRANDATE = $today;
		$LINENUM = "2";
		$ACCNO = "16100";
		$AMOUNT = ""; //??
		$PERIOD = $todayMonth;
		$YEAR = $todayYear;
		$REFERENCE = ""; //??
		$ACCNAME = "VAT Input";
		$TYPE = "T";
		$BATCHDATE = $today;
		$CURR_AMOUNT = ""; // ??
		$CURR_RATE = 1;
		$BASECURR_ID = "USD";
		$CURR_ID = "USD";
		$USERADD = $author;
		$DATEADD = $today;	
		$sql = "INSERT INTO APACCOUNT (VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,
						AMOUNT,PERIOD,YEAR,REFERENCE,ACCNAME,
						TYPE,BATCHDATE,CURR_AMOUNT,CURR_RATE,
						BASECURR_ID,CURR_ID,USERADD,DATEADD)";
		$req = $db->prepare($sql);					
		$req->execute(array($VENDID,$VOUCHERNO,$TRANDATE,$LINENUM,$ACCNO,
							$AMOUNT,$PERIOD,$YEAR,$REFERENCE,$ACCNAME,
							$TYPE,$BATCHDATE,$CURR_AMOUNT,$CURR_RATE,$BASECURR_ID,
							$CURR_ID,$USERADD,$DATEADD));	
		
		/*
		+INSERT INTO APACCOUNT
		INSERT INTO [APACCOUNT]
		([VENDID],   => Verdor ID
		[VOUCHERNO],  =>  VO000000000030 (AUTO VO+…) —> AP: num1
		[TRANDATE],   => Date Return
		[LINENUM],   => (1)
		[ACCNO],   => (16100) (VAT Input)
		[AMOUNT],   => Amount VAT (Minus Amount Vat)
		[PERIOD],   => Month of Return (MM)
		[YEAR],    => Year of Return (yyyy)
		[BATCH],   => (Null)
		[REFERENCE],  => Return Number(RTXXXXXXXXX)
		[ACCNAME],   => “VAT Input”
		[ACCNAME1],   => (Null)
		[STAT],    => (Null)
		[TYPE],    => (T)
		[BATCHDATE],  => Date Return
		[FILEID],    => (Null)
		[CURR_AMOUNT], => Amount VAT (Minus VAT Amount)
		[CURR_RATE],  => (1)
		[OPERATION_BASE], => (Null)
		[BASECURR_ID],  => (USD)
		[CURR_ID],   => (USD)
		[USERADD],   => User Return
		[DATEADD]);   => Date Return 
		*/
	}
	


	$BALANCE = "TODO"; //AMOUNT RETURN	
	$sql = "UPDATE APVENDOR SET BALANCE = BALANCE - ? WHERE VENDID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($BALANCE,$VENDID));

	/*
	+UPDATE APVENDOR
	UPDATE [APVENDOR] set
	[BALANCE] = [BALANCE]-@1  
	WHERE [VENDID]=@2;
	*UDPATE APVENDOR SET BALANCE = BALANCE - AMOUNT RETURN WHER VENDID = VENDID RETURN
	*/

	$USERADD = $author;
	$DATEADD = $today;
	$sql = "INSERT INTO POLOCATION (PONUMBER,VENDID,USERADD,DATEADD) 
					values (?,?,?,?)";
	$req = $db->prepare($sql);					
	$req->execute(array($PONUMBER,$VENDID,$USERADD,$DATEADD));
	/*
	+INSERT INTO POLOCATION
	INSERT INTO [POLOCATION]
	([PONUMBER],  => Return Number
	[VENDID],   => Vendor Return
	[TOADDRESS1],  => (Null)
	[TOVENDID],   => (Null)
	[TOPHONE1],   => (Null)
	[TOFAXNO],   => (Null)
	[TOCOUNTRY],  => (Null)
	[TOCITY],   => (Null)
	[ADDRESS1],   => (Null)
	[COUNTRY],   => (Null)
	[PHONE1],   => (Null)
	[FAXNO],   => (Null)
	[CITY],    => (Null)
	[USERADD],   => User Return
	[DATEADD]);   => Date Return
	*/
}

function test()
{
    $json = '[
        {
            "PRODUCTID" : "TEST2",
            "QUANTITY" : 1
        }
    ]';
    $items = json_decode($json,true);    
    createCreditNote($items,"SOVI");
}
//test();

?>
