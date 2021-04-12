<?php 

// CORE
function genID($type){

	//UPDATE SYSDATA SET NUM1=NUM1+1 WHERE ltrim(rtrim(SYSID))='PO'
}


function getNewDatabase(){ 
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
function getOldDatabase(){ 
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
function getTaxDatabase(){ 
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


// Step 0 
function createItem()
{

}


function randomUser(){
	return "";
}


// Step 1
function createItemsInReceipts()
{
	$randomUser = $randomUser();

	// Calculate a probable insertion date
	$anteriorDate = "";


	if (strtotime("date") < 1572566400)	
		$db = getOldDatabase();	
	else 		
		$db = getNewDatabase();


	$taxDB = getTaxDatabase();
	$SQL = "SELECT distinct(PRODUCTID) FROM POSDETAIL";
	
	$req = $taxDB->prepare($SQL);
	$req->execute(array());

	$items = $req->fetchAll();

	foreach($items as $item){
		$SQL = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($SQL);
		$req->execute();
		$itemDetail = $req->fetch();


		// Check to see if category exists 
		$SQL = "SELECT * FROM ICCATEGORY WHERE CATEGORYID = ?";
		$req = $taxDB->prepare($SQL);
		$req->execute($itemDetail["VENDID"]);
		$categoryDetail = $req->fetch();

		// Need to create category
		if ($categoryDetail == null){

			$req = $db->prepare($SQL);
			$req->execute();
			$categoryDetail = $req->fetch();

			$SQL = "INSERT INTO [ICCATEGORY_NUMBER](
			[CATEGORYID],[STARTNUM],[USERADD],[DATEADD]) 
			values(
			?,?,?,getdate())";

			$req->execute(array(
				$categoryDetail["CATEGORYID"],1,'ADMIN'
			));

			$SQL = "INSERT INTO [ICCATEGORY](
			[CATEGORYID],[ACTIVE],[CATEGORYNAME],[CATEGORYNAME1],[DISC],
			[NOTES],[USERADD],[DATEADD]) 
			values(
			?,?,?,?,?,
			?,?,getdate())";
			$req->execute(array(
				$categoryDetail["CATEGORYID"],$categoryDetail["ACTIVE"],$categoryDetail["CATEGORYNAME"],$categoryDetail["CATEGORYNAME1"],$categoryDetail["DISC"],
				$categoryDetail["NOTES"],"ADMIN"));
		}

		
		

		// Check to see if vendor exists
		$SQL = "SELECT * FROM APVENDOR WHERE VENDID = ?";
		$req = $taxDB->prepare($SQL);
		$req->execute($itemDetail["VENDID"]);
		$vendorDetail = $req->fetch();
		// Need to create Vendor
		if ($vendorDetail == null){
			$req = $db->prepare($SQL);
			$req->execute();
			$vendorDetail = $req->fetch();

			$SQL = "INSERT INTO [APVENDOR](
			[VENDID],[ACTIVE],[VENDNAME],[VENDNAME1],[PHONE1],
			[PHONE2],[ADDRESS1],[COUNTRY],[CITY],[FAXNO],
			[WEBSITE],[EMAIL],[CONTACT],[CONTACTTITLE],[ATTN],
			[ATTNTITLE],[BUYER],[BANKID],[BANKACC],[TERMID],
			[VATNO],[LIMIT],[TAX],[NOTES],[APACC],
			[PURCHASEDISCACC],[TAXACC_OUT],[CURR_ID],[USERADD],[DATEADD]) 
			values(
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?)";
			$req = $db->prepare($SQL);
			$req->execute(array(
				
				$vendorDetail["VENDID"],$vendorDetail["ACTIVE"],$vendorDetail["VENDNAME"],$vendorDetail["VENDNAME1"],$vendorDetail["PHONE1"],
				$vendorDetail["PHONE2"],$vendorDetail["ADDRESS1"],$vendorDetail["COUNTRY"],$vendorDetail["CITY"],$vendorDetail["FAXNO"],
				$vendorDetail["WEBSITE"],$vendorDetail["EMAIL"],$vendorDetail["CONTACT"],$vendorDetail["CONTACTTITLE"],$vendorDetail["ATTN"],
				$vendorDetail["ATTNTITLE"],$vendorDetail["BUYER"],$vendorDetail["BANKID"],$vendorDetail["BANKACC"],$vendorDetail["TERMID"],
				$vendorDetail["VATNO"],$vendorDetail["LIMIT"],$vendorDetail["TAX"],$vendorDetail["NOTES"],$vendorDetail["APACC"],
				$vendorDetail["PURCHASEDISCACC"],$vendorDetail["TAXACC_OUT"],$vendorDetail["CURR_ID"],$vendorDetail["USERADD"],$vendorDetail["DATEADD"]
			));

		}
		$SQL = "
		INSERT INTO [ICPRODUCT](
		[PRODUCTID],[ACTIVE],[PRODUCTNAME],[PRODUCTNAME1],[CATEGORYID],
		[CLASSID],[COLOR],[BARCODE],[COST],[PRICE],
		[LASTCOST],[TYPE],[VENDID],[ONHAND],[PACKING],
		[WEIGHT],[DISCABLE],[STKUM],[STKFACTOR],[PURUM],
		[PURFACTOR],[SALEUM],[SALEFACTOR],[MEASUREMENT],[NOTES],
		[REVENUEACC],[COGSACC],[INVENTORYACC],[TAXACC],[SALEDISCOUNTACC],
		[STORE],[THELF],[ORIGINAL_CODE],[OTHER_ITEMCODE],[DIMENSION],
		[UOM],[SIZE],[OTHER_PRICE],[EXPIRED_DATE],[PACKING_DATE],
		[ITEMSIMBOL],[PACKAGESIZE1],[PACKAGEPRICE1],[PACKAGE1DESC1],[PACKAGE1DESC2],
		[PACKAGESIZE2],[PACKAGEPRICE2],[PACKAGE2DESC1],[PACKAGE2DESC2],[PACKAGESIZE3],
		[PACKAGEPRICE3],[PACKAGE3DESC1],[PACKAGE3DESC2],[PACKAGESIZE4],[PACKAGEPRICE4],
		[PACKAGE4DESC1],[PACKAGE4DESC2],[PACKAGESIZE5],[PACKAGEPRICE5],[PACKAGE5DESC1],
		[PACKAGE5DESC2],[PACKAGEUNIT1],[PACKAGEUNIT2],[PACKAGEUNIT3],[PACKAGEUNIT4],
		[PACKAGEUNIT5],[USE_LOT],[ORDERPOINT],[STD_COST],[CUT_STOCK_PRODUCTID],
		[CUT_STOCK_SUBQTY],[NOTE_DEALER],[GROUPCATEGORYID],[BIG_UNIT],[BIG_UNIT_FACTOR],
		[TRACKSERIAL],[RECORD_STATUS],[BEC_UNIT],[BEC_FACTOR],[SONG_UNIT],
		[SONG_FACTOR],[CASE_METER],[INCLUDE_TAX],[COST_METHOD],[MFG_OR_PUR],
		[HAS_VAT],[VAT_RATE],[USERADD],[DATEADD],[WIDTH],
		[HEIGHT],[UPCCODE],[OTHERCODE],[PICTURE_PATH]) 
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
		?,?,?,?)";

		$req = $db->prepare($SQL);
		$req->execute(array(
		$itemDetail["PRODUCTID"],$itemDetail["ACTIVE"],$itemDetail["PRODUCTNAME"],$itemDetail["PRODUCTNAME1"],$itemDetail["CATEGORYID"],
		$itemDetail["CLASSID"],$itemDetail["COLOR"],$itemDetail["BARCODE"],$itemDetail["COST"],$itemDetail["PRICE"],
		$itemDetail["LASTCOST"],$itemDetail["TYPE"],$itemDetail["VENDID"],$itemDetail["ONHAND"],$itemDetail["PACKING"],
		$itemDetail["WEIGHT"],$itemDetail["DISCABLE"],$itemDetail["STKUM"],$itemDetail["STKFACTOR"],$itemDetail["PURUM"],
		$itemDetail["PURFACTOR"],$itemDetail["SALEUM"],$itemDetail["SALEFACTOR"],$itemDetail["MEASUREMENT"],$itemDetail["NOTES"],
		$itemDetail["REVENUEACC"],$itemDetail["COGSACC"],$itemDetail["INVENTORYACC"],$itemDetail["TAXACC"],$itemDetail["SALEDISCOUNTACC"],
		$itemDetail["STORE"],$itemDetail["THELF"],$itemDetail["ORIGINAL_CODE"],$itemDetail["OTHER_ITEMCODE"],$itemDetail["DIMENSION"],
		$itemDetail["UOM"],$itemDetail["SIZE"],$itemDetail["OTHER_PRICE"],$itemDetail["EXPIRED_DATE"],$itemDetail["PACKING_DATE"],
		$itemDetail["ITEMSIMBOL"],$itemDetail["PACKAGESIZE1"],$itemDetail["PACKAGEPRICE1"],$itemDetail["PACKAGE1DESC1"],$itemDetail["PACKAGE1DESC2"],
		$itemDetail["PACKAGESIZE2"],$itemDetail["PACKAGEPRICE2"],$itemDetail["PACKAGE2DESC1"],$itemDetail["PACKAGE2DESC2"],$itemDetail["PACKAGESIZE3"],
		$itemDetail["PACKAGEPRICE3"],$itemDetail["PACKAGE3DESC1"],$itemDetail["PACKAGE3DESC2"],$itemDetail["PACKAGESIZE4"],$itemDetail["PACKAGEPRICE4"],
		$itemDetail["PACKAGE4DESC1"],$itemDetail["PACKAGE4DESC2"],$itemDetail["PACKAGESIZE5"],$itemDetail["PACKAGEPRICE5"],$itemDetail["PACKAGE5DESC1"],
		$itemDetail["PACKAGE5DESC2"],$itemDetail["PACKAGEUNIT1"],$itemDetail["PACKAGEUNIT2"],$itemDetail["PACKAGEUNIT3"],$itemDetail["PACKAGEUNIT4"],
		$itemDetail["PACKAGEUNIT5"],$itemDetail["USE_LOT"],$itemDetail["ORDERPOINT"],$itemDetail["STD_COST"],$itemDetail["CUT_STOCK_PRODUCTID"],
		$itemDetail["CUT_STOCK_SUBQTY"],$itemDetail["NOTE_DEALER"],$itemDetail["GROUPCATEGORYID"],$itemDetail["BIG_UNIT"],$itemDetail["BIG_UNIT_FACTOR"],
		$itemDetail["TRACKSERIAL"],$itemDetail["RECORD_STATUS"],$itemDetail["BEC_UNIT"],$itemDetail["BEC_FACTOR"],$itemDetail["SONG_UNIT"],
		$itemDetail["SONG_FACTOR"],$itemDetail["CASE_METER"],$itemDetail["INCLUDE_TAX"],$itemDetail["COST_METHOD"],$itemDetail["MFG_OR_PUR"],
		$itemDetail["HAS_VAT"],$itemDetail["VAT_RATE"],$itemDetail["USERADD"],$itemDetail["DATEADD"],$itemDetail["WIDTH"],
		$itemDetail["HEIGHT"],$itemDetail["UPCCODE"],$itemDetail["OTHERCODE"],$itemDetail["PICTURE_PATH"]
		));

		// BIND PRODUCT TO VENDOR
		$SQL = "INSERT INTO [ICVENDOR]
						   ([PRODUCTID],[VENDID],[VENDPARTNO],[LASTCOST],[LEADTIME],
							[ORDERPOINT],[ORDQTY],[DISCOUNT],[NOTES],[USERADD],
							[DATEADD]) 
						values(
						?,?,?,?,?,
						?,?,?,?,?,
						)";
		$req = $db->prepare($SQL);
		$req->execute(array(
			$itemDetail["PRODUCTID"],$itemDetail["VENDID"],$itemDetail["PRODUCTID"],0.0,0,
			0,0,0,"",$randomUser,
			$anteriorDate
		));


		//BIND PRODUCT TO LOCATION
		$SQL = "INSERT INTO [ICLOCATION](
							[LOCID],[PRODUCTID],[VENDID],[LOCCOST],[LOCLASTCOST],
							[RECENTLOCCOST],[LOCONHAND],[TOTALSALE],[TOTALUSE],[TOTALRECEIVE],
							[ORDERPOINT],[ORDERQTY],[LEADTIME],[NOTES],[TRACKLOT],

							[TRACKSERIAL],[STORBIN],[VENDORPARTNUM],[REVENUEACC],[COGSACC],
							[INVENTORYACC],[SALEDISCOUNTACC],[USERADD],[DATEADD],[LOC_PRICE]) 
							values(
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,?,?,
							?,?,?,getdate(),?)"

		$TOTALSALE = "";
		$req = $db->prepare($SQL);
		$req->execute(array(
			"WH1",$itemDetail["PRODUCTID"],$itemDetail["VENDID"],$itemDetail["COST"],$itemDetail["COST"],
			0,0,0,$TOTALSALE,0,
			0,0,0,"",0,
			0,"",$itemDetail["PRODUCTID"],40000,50000,
			17000,49000,$randomUser,$anteriorDate ,0,		
		));
	}	
}


function getVendorByItem(){

}


function randomPurchaser()
{
	return "";
}

function randomReceiver()
{
	return "";
}

function generateDiscountByVendor($VENDID){

}

// Step 2
function createPO($items,$date){

	if (strtotime("date") < 1572566400)	
		$db = getOldDatabase();	
	else 		
		$db = getNewDatabase();	
	$taxDB = getTaxDatabase();


	
	// Generate PO Number
	$PONUMBER = ""; 

	
	$PURCHASE_AMT = 0;

	foreach($items as $qty => $item){
		$SQL = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($SQL);
		$req->execute($item["PRODUCTID"]);
		$itemDetail = $req->fetch();	


		 $PURCHASE_AMT += ($itemDetail["COST"] * $qty);
		 // calculated 

	}
	

	$firstItem = $items[0];
	
	$SQL = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($SQL);
	$req->execute($firstItem["PRODUCTID"]);
	$firstItemDetail = $req->fetch();


	$SQL = "SELECT * FROM APVENDOR WHERE VENDID = ?";
	$req = $db->prepare($SQL);
	$req->execute($firstItem["PRODUCTID"]);
	$vendorDetail = $req->fetch();


	// Retrieved via items;
	$VENDID = $firstItemDetail["VENDID"];
	$VENDNAME = $vendorDetail["VENDNAME"];
	$VENDNAME1 = $vendorDetail["VENDNAME1"];
	$PODATE = $date;
	$LOCID = "WH1"; // we decide to deliver directly to store 


	
	$USERADD = randomPurchaser();
	$VATPERCENT = $vendorDetail["TAX"];
	$PCNAME = "SS2-POS-17";
	$CURRRATE = "1"; // NEED TO CHANGE ???
	// POSTATUS R = WAITING
	$EST_ARRIVAL = $PODATE;
	$REQUIRE_DATE = $PODATE;

	$VAT_AMT = $PURCHASE_AMT * ($vendorDetail["TAX"] / 100);

	// NEED TO INVESTIGATE WHERE TO APPLY THE DISCOUNT
	$DISC_PERCENT = generateDiscountByVendor($VENDID); 

	// POHEADER
	$SQL = "INSERT INTO [POHEADER]
						([PONUMBER],[VENDID],[BUYER],[VENDNAME],[VENDNAME1],
						[PODATE],[LOCID],[PURCHASE_AMT],[RECEIVE_AMT],[TERMID],
						[TERM_DAYS],[TERM_DISC],[TERM_NET],[FOB_POINT],[SHIPVIA],
						[NOTES],[POSTATUS],[VAT_PERCENT],[PCNAME],[CURR_RATE],
						[CURRID],[EST_ARRIVAL],[REQUIRE_DATE],[REQUESTBY],[VAT_AMT],
						[REFERENCE],[DISC_PERCENT],[FILEID],[USER_DOCNO],[BASECURR_ID],
						[CURRENCY_AMOUNT],[CURRENCY_VATAMOUNT],[CURRENCY_RECEIVEAMOUNT],[SHIP_REFERENCE],[DISC_AMT_HEADER],
						[COST_ADD_HEADER],[COST_ADD_HEADER2],[USERADD],[DATEADD]) 
						values (
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,getdate()
						)";
	$taxDB->prepare($sql);
	$taXDB->execute(array(
	$PONUMBER, $VENDID,"",$VENDNAME,$VENDNAME1,
	$PODATE, 'WH1',$PURCHASE_AMT,0.0,'',
	0.0,0.0,0.0,'','',
	'','R',$VATPERCENT,$PCNAME,$CURRRATE,
	'USD',$EST_ARRIVAL,$REQUIRE_DATE,'', $VAT_AMT,
	'',$DISC_PERCENT,'',null,null,
	null,null,null,null,null,
	null,null,$USERADD);

	));

	$count = 0;
	foreach($items as $item => $qty)
	{
		// POLOCATION
		$SQL = "INSERT INTO [POLOCATION]
						([PONUMBER],[VENDID],[TOADDRESS1],[TOVENDID],[TOPHONE1],
						[TOFAXNO],[TOCOUNTRY],[TOCITY],[ADDRESS1],[COUNTRY],
						[PHONE1],[FAXNO],[CITY],[USERADD],[DATEADD]) 
						values(
						?,?,?,?,?,
						?,?,?,?,?,
						?,?,?,?,getdate()
						)";			

		$taxDB->prepare($sql);
		$taXDB->execute(array(
			$PONUMBER,$VENDID,'','','',
			'','','','','',
			'','','',$USERADD);
		));		

		$now = date('Y-m-d H:i:s', time());

		$SQL = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($SQL);
		$req->execute($item["PRODUCTID"]);
		$itemDetail = $req->fetch();	

		// <PODETAIL> (X times per item)
		$PURCHASE_DATE = $now;
		$PRODUCTID = $item["PRODUCTID"];
		$PRODUCTNAME = $item["PRODUCTNAME"];
		$PRODUCTNAME1 = $item["PRODUCTNAME1"];
		$COMMENT = "";
		$ORDER_QTY = $qty;
		$RECEIVE_QTY = 0;
		$TRANUNIT = "UNIT"; 
		$TRANFACTOR = 1.0;
		$STKFACTOR = 1.0;
		$STKUNIT = "UNIT";
		$TRANDISC = 0.0;
		$TRANCOST = $item["COST"]; //???
		$EXTCOST = $item["COST"] * $qty;
		$CURRENTONHAND = $item["ONHAND"];
		$CURR_RATE = 1;
		$CURRID = "USD";
		$WEIGHT = 1.0;
		$OLDWEIGHT = 1.0;
		$COST_ADD = 0.0;
		$TRANLINE = $count;
		$VATABLE = "Y";
		$VAT_PERCENT = $vendorDetail["TAX"];
		$POSTATUS = ""; // Nothing means just created
		$DIMENSION = "0.0";
		$FILEID = "";
		$IS_CATON = "0";
		$COST_CENTER = "";
		$INVENTORYACC = "";
		$REQUIREDATE = null;
		$FREIGHT_SG = 0.0;	
		$INSUR_SG = 0.0;
		$FOB = 0.0;
		$FREIGHT = 0.0;
		$INSUR = 0.0;
		$DECL2 = 0.0;
		$DUTY_VAT = 0.0;
		$MCC_EXP = 0.0;
		$LDC = 0.0;
		$SELLPRICE = 0.0;
		$EXTPRICE = 0.0;
		$TOTAL_COST = 0.0;
		$CURRID_ADDCOST = "";
		$BASECURR_ID = "USD";
		$CURRENCY_AMOUNT = $qty * $itemDetail["COST"];
		$CURRENCY_COST = $itemDetail["COST"];
		$ORIGINAL_QTY = 0.0;
		$QTY_PACK = 0.0;
		$PACK_WEIGHT = 0.0;
		$CHAMBERNG_QTY = 0.0;
		$WET_QTY = 0.0;
		$WET_PERCENT = 0.0;
		$DISC_AMT = 0.0;
		$DATEADD = $anteriorDate;		
		$SQL = "INSERT INTO [PODETAIL]
							([PONUMBER],[VENDID],[VENDNAME],[VENDNAME1],[PURCHASE_DATE],
							 [LOCID],[PRODUCTID],[PRODUCTNAME],[PRODUCTNAME1],[COMMENT],
							 [ORDER_QTY],[RECEIVE_QTY],[TRANUNIT],[TRANFACTOR],[STKFACTOR],
							 [STKUNIT],[TRANDISC],[TRANCOST],[EXTCOST],[CURRENTONHAND],
							 [CURR_RATE],[CURRID],[WEIGHT],[OLDWEIGHT],[COST_ADD],
							 [TRANLINE],[VATABLE],[VAT_PERCENT],[POSTATUS],[DIMENSION],
							 [FILEID],[IS_CATON],[COST_CENTER],[INVENTORYACC],[REQUIREDATE],
							 [FREIGHT_SG],[INSUR_SG],[FOB],[FREIGHT],[INSUR],
							 [DECL2],[DUTY_VAT],[MCC_EXP],[LDC],[SELLPRICE],
							 [EXTPRICE],[TOTAL_COST],[CURRID_ADDCOST],[BASECURR_ID],[CURRENCY_AMOUNT],
							 [CURRENCY_COST],[ORIGINAL_QTY],[QTY_PACK],[PACK_WEIGHT],[CHAMBERNG_QTY],
							 [WET_QTY],[WET_PERCENT],[DISC_AMT],[USERADD],[DATEADD]) 
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
							 ?,?,?,?,getdate())";
		
		$taxDB->prepare($sql);
		$taXDB->execute(array(
			$PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PURCHASE_DATE,
			$LOCID, $PRODUCTID,$PRODUCTNAME, $PRODUCTNAME1,$COMMENT,
			$ORDER_QTY,$RECEIVE_QTY,$TRANUNIT,$TRANFACTOR,$STKFACTOR,
			$STKUNIT,$TRANDISC,$TRANCOST,$EXTCOST,$CURRENTONHAND,
			$CURR_RATE,$CURRID,$WEIGHT,$OLDWEIGHT,$COST_ADD,
			$TRANLINE,$VATABLE,$VAT_PERCENT,$POSTATUS,$DIMENSION,
			$FILEID,$IS_CATON,$COST_CENTER,$INVENTORYACC,$REQUIREDATE,
			$FREIGHT_SG,$INSUR_SG,$FOB,$FREIGHT,$INSUR,
			$DECL2,$DUTY_VAT,$MCC_EXP,$LDC,$SELLPRICE,
			$EXTPRICE],$TOTAL_COST,$CURRID_ADDCOST,$BASECURR_ID,$CURRENCY_AMOUNT,
			$CURRENCY_COST,$ORIGINAL_QTY,$QTY_PACK,$PACK_WEIGHT,$CHAMBERNG_QTY,
			$WET_QTY],$WET_PERCENT,$DISC_AMT,$USERADD,$DATEADD


		));	
		$PO_ORDER = $qty;	
		$PRODUCTID = $itemDetail["PRODUCTID"];			 					
		//<ICLOCATION> (X times per item)  // PO_ORDER CUMUL QTY ORDER
		$SQL ="UPDATE [ICLOCATION] set 
					[PO_ORDER] = [PO_ORDER]+?  
					WHERE [LOCID]=? AND [PRODUCTID]=?";
		$taxDB->prepare($sql);
		$taXDB->execute(array(
			$PO_ORDER, $LOCID,$PRODUCTID;
		));


		$count++;
	}
	

	
}



// Receive Late PO 
function receivePO($ponumber){

	if (strtotime("date") < 1572566400)	
		$db = getOldDatabase();	
	else 		
		$db = getNewDatabase();	
	$taxDB = getTaxDatabase();



	$sql = "SELECT * FROM POHEADER WHERE PONUMBER = ?";
	$req = $db->prepare($SQL);
	$poDetails = $req->fetch(array($ponumber));

	$VENDID = $poDetails["VENDID"];
	
	$RECEIVENO = ""; // Generate Receive Number

	$VENDNAME = $poDetails["VENDNAME"];
	$VENDNAME1 = $poDetails["VENDNAME1"];
	$TO_INVOICE = "Y"; // ???? 
	$VAT_AMT = $poDetails["VAT_AMT"];
	$VAT_PERCENT = $poDetails["VAT_PERCENT"];;
	$INV_AMT = ""; // Calcute amount of Invoice  
	$BALANCE = $INV_AMT;
	$PCNAME = "SS2-POS-17";;
	$VOUCHER_DESC = "";
	$VATNO = "";
	$APACCOUNT = "20000"; // 2101 ?? Compta number 
	$DISC_PERCENT = 0.0;
	$TAXACC_OUT = "16100";
	$VOUCHERNO = ""; // To generate same number than receiveno
	$PODATE = $poDetails["PODATE"]; // Retrieved from PO
	$LOCID = $poDetails["LOCID"];// Retrieved from PO
	$USERADD = randomReceiver();

	$DATEADD = ""// ANTERIOR DATE 


	//<CREATE PORECEIVEDHEADER>
	$SQL = "INSERT INTO [PORECEIVEHEADER]
	([VENDID],[RECEIVENO],[TRANDATE],[DUEDATE],[VENDNAME],
	 [VENDNAME1],[TO_INVOICE],[VAT_AMT],[VAT_PERCENT],[INV_AMT],
	 [PAID_AMT],[BALANCE],[PCNAME],[CURR_RATE],[REMARK],
	 [TERMID],[TERM_DAYS],[TERM_DISC],[TERM_NET],[VOUCHER_DESC],
	 [VOUCHER_DESC1],[REFERENCE],[VATNO],[PONUMBER],[APACCOUNT],
	 [DISC_PERCENT],[TAXACC_OUT],[FILEID],[EXPENSE_TYPE],[VOUCHERNO],
	 [POCLEARINGACC],[PODATE],[RECEIVEDATE],[LOCID],[CURR_ID],

	 [BASECURR_ID],[CURRENCY_AMOUNT],[CURRENCY_VATAMOUNT],[SHIP_REFERENCE],[DATEADD],
	 [USERADD]) 
	 values(
	 ?,?,getdate(),getdate(),?,
	 ?,?,?,?,?,
	 ?,?,?,?,?,
	 ?,?,?,?,?,
	 ?,?,?,?,?,
	 ?,?,?,?,?,
	 ?,?,?,?,?,
	 ?,?,?,getdate(),?";

	 $taxDB->prepare($sql);
	 $taXDB->execute(array(
		$VENDID, $RECEIVENO,$VENDNAME,
		$VENDNAME1,$TO_INVOICE,$VAT_AMT, $VAT_PERCENT,$INV_AMT,
		0.0,$BALANCE,$PCNAME, 0.0,"",
		"","","","",$VOUCHER_DESC,  
		"", $ponumber,$VATNO,$ponumber,$APACCOUNT ,
		$DISC_PERCENT,$TAXACC_OUT, "","",$VOUCHERNO, 
		"",$PODATE,getdate(),$LOCID,null,
		null,null,null,null,$DATEADD,
		$USERADD
	));

	
	//<UPDATE POHEADER>
	 $RECEIVE_AMT = $INV_AMT;
	 $CURRENCY_RECEIVEAMOUNT = $INV_AMT;


	 $SQL = "UPDATE [POHEADER] set [RECEIVE_AMT] = [RECEIVE_AMT]+?,
	 								[CURRENCY_RECEIVEAMOUNT] = [CURRENCY_RECEIVEAMOUNT]+@2,
	 								[POSTATUS] = @3  
	 								WHERE [PONUMBER]=@4";

 	$taxDB->prepare($SQL);
	$taXDB->execute(array($RECEIVE_AMT,$CURRENCY_RECEIVEAMOUNT,"C",$ponumber));

	 

	//<UPDATE APVENDOR>	
	$TOTALREC = $INV_AMT; // total receive
	$LASTRECAMT = $INV_AMT; // last receive amount 							   
	$LASTRECDATE = $anteriorDate;
	$BALANCE = $INV_AMT; 
	$LASTRECDOC = $poDetails["PONUMBER"];
	

	 $SQL =	"UPDATE [APVENDOR] set 
	 				[TOTALREC] = [TOTALREC]+ ?,
	 				[LASTRECAMT] = ?,[LASTRECDATE] = ?,
	 				[BALANCE] = [BALANCE]+?,[LASTRECDOC] = ?  
	 				WHERE [VENDID]=?";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
			$TOTALREC,$LASTRECAMT,$LASTRECDATE,$BALANCE,$LASTRECDOC,$VENDID));


	 // <CREATE ICTRANHEADER>	

	$TOTAL_AMT = $INV_AMT;
	$DISCPERCENT = 0.0;
	$VATPERCENT = 0.0;
	$IS_CHANGE_AVGCOST = ""; // WE CONSIDER IT NEVER HAPPENS IN THE SIMULATION

	 $SQL = "INSERT INTO [ICTRANHEADER](
	 							[DOCNUM],[FLOCID],[TLOCID],[REFERENCE],[TRANDATE],
	 					  		[TRANTYPE],[TOTAL_AMT],[PCNAME],[CURRID],[CURR_RATE],
	 					  		[CUSTID],[VENDID],[DISC_PERCENT],[VAT_PERCENT],[APPLID],
	 					  		[FILEID],[TOFILEID],[IS_CHANGE_AVGCOST],[REF_DOCUMENT],[IS_PROCCESS],
	 					  		[POSSTAT],[RECEIVENO],[CHANGE_REWARD],[TOTAL_STOCKREWARD],[TOTAL_MONEYREWARD],

	 					  		[ARACC],[BASECURR_ID],[CURRENCY_AMOUNT],[PURPOSE_ISSUE],[JOB_ID],
	 					  		[USERADD],[DATEADD]
	 					  		) 
	 							VALUES(
	 							?,?,?,?,?,
	 							?,?,?,?,?,
	 							?,?,?,?,?,
	 							?,?,?,?,?,
	 							?,?,?,?,?,
	 							?,?,?,?,?,
	 							?,getdate()
	 							)";


	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$ponumber,$LOCID, "","",$DATEADD,
		'R',$TOTAL_AMT,$PCNAME,"",0.0,
		"",$VENDID,$DISCPERCENT,$VATPERCENT,"PO",
		"","",$IS_CHANGE_AVGCOST,"","",
		"","","",0.0,0.0,
		"",null,null,null,null,
		$USERADD)
	));		




	//< CREATE APHEADER>
	//$VENDID = ""; // retrieved earlier
	$VOUCHERNO = ""; // GENERATE AP ID 
	$TRANDATE = ""; // Payment 18th of the month following the PO
	$DUEDATE = $TRANDATE;
	$VENDNAME = $poDetails["VENDNAME"];
	$VENDNAME1 = $poDetails["VENDNAME"];
	$APSTATUS = ""; // V when voided but else nothing
	//$VAT_AMT = ""; retrieved earlier
	//$VAT_PERCENT = ""; retrieved earlier
	// $INV_AMT = "";retrieved earlier
	$PAID_AMT = $INV_AMT;
	$BALANCE = $INV_AMT;
	//$PCNAME = "";;//retrieved earlier
	$CURR_RATE = 1;
	$REMARK = "";
	$TERMID = "";
	$TERM_DAYS = 0;
	$TERM_DISC = 0;
	$TERM_NET = 0;
	$VOUCHER_DESC = $poDetails["PONUMBER"];
	$VOUCHER_DESC1 = "";
	$REFERENCE = $poDetails["PONUMBER"];
	$VATNO = "";
	$PONUMBER = $poDetails["PONUMBER"];
	$APACCOUNT = 20000;
	$DISC_PERCENT = generateDiscountByVendor($VENDID); 
	$TAXACC_OUT = 16100;
	$FILEID = "";
	$EXPENSE_TYPE = "";
	$DOCUMENTDATE = "1900-01-01 00:00:00.000";
	// $LOCID = ""; retrieved earlier
	$CURR_ID = "USD";
	$BASECURR_ID = "USD";
	$CURRENCY_AMOUNT = $INV_AMT;
	$CURRENCY_VATAMOUNT = ($poDetails["VAT_PERCENT"] /100) * $INV_AMT;
	$CURRENCY_BALANCE = $INV_AMT;
	$CURRENCY_PAIDAMT = 0;
	//$DATEADD = "";retrieved earlier
	//$USERADD = ""; retrieved earlier

	 $SQL = "	
				INSERT INTO [APHEADER](
				[VENDID],[VOUCHERNO],[TRANDATE],[DUEDATE],[VENDNAME],
				[VENDNAME1],[APSTATUS], [VAT_AMT],[VAT_PERCENT],[INV_AMT],
				[PAID_AMT],[BALANCE],[PCNAME],[CURR_RATE],[REMARK],
				[TERMID],[TERM_DAYS],[TERM_DISC],[TERM_NET],[VOUCHER_DESC],
				[VOUCHER_DESC1],[REFERENCE],[VATNO],[PONUMBER],[APACCOUNT],
				[DISC_PERCENT],[TAXACC_OUT],[FILEID],[EXPENSE_TYPE],[DOCUMENTDATE],
				[LOCID],[CURR_ID],[BASECURR_ID],[CURRENCY_AMOUNT],[CURRENCY_VATAMOUNT],
				[CURRENCY_BALANCE],[CURRENCY_PAIDAMT],[DATEADD],[USERADD]) values(
				?,?,getdate(),getdate(),?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,getdate(),?)"
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$VENDID,$VOUCHERNO,$TRANDATE,$DUEDATE,$VENDNAME,
		$VENDNAME1,$APSTATUS,$VAT_AMT,$VAT_PERCENT,$INV_AMT,
		$PAID_AMT,$BALANCE,$PCNAME,$CURR_RATE,$REMARK,
		$TERMID,$TERM_DAYS,$TERM_DISC,$TERM_NET,$VOUCHER_DESC,
		$VOUCHER_DESC1,$REFERENCE,$VATNO,$PONUMBER,$APACCOUNT,
		$DISC_PERCENT,$TAXACC_OUT,$FILEID,$EXPENSE_TYPE,$DOCUMENTDATE,
		$LOCID,$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_VATAMOUNT,
		$CURRENCY_BALANCE,$CURRENCY_PAIDAMT,$DATEADD,$USERADD
	));





	// GET ALL ITEMS FROM PO

	foreach($items as  $item){

	//<UPDATE PODETAIL>
	$RECEIVE_DATE = "";
	$RECEIVE_QTY = "";
	$POSTATUS = "";
	$QTY_OVERORDER = "";
	$COMMENT = "";
	$PRODUCTID = "";
	$COLID = "";	
	$SQL = 	"UPDATE [PODETAIL] set [RECEIVE_DATE] = @1,
								   [RECEIVE_QTY] = [RECEIVE_QTY]+@2,
								   [POSTATUS] = @3,[QTY_OVERORDER] = @4,
								   [COMMENT] = @5  
								   WHERE [PONUMBER]=@6 
								   AND [PRODUCTID]=@7 AND [COLID]=@8";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$RECEIVE_DATE,$RECEIVE_QTY,$POSTATUS,$QTY_OVERORDER,$COMMENT,$PRODUCTID,$COLID
	));
    // <UPDATE ICLOCATION> X Times
	$PO_ORDER = "";
	$LOCID = "";
	$PRODUCTID = "";

	$SQL = "UPDATE [ICLOCATION] set [PO_ORDER] = [PO_ORDER]-? 
								  WHERE [LOCID]=? 
								  AND [PRODUCTID]=?";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$PO_ORDER,$LOCID,$PRODUCTID
	));
	// <CREATE ICTRANDETAIL> X Times
	$DOCNUM= "";
	$PRODUCTID= "";
	$LOCID= "";
	$CATEGORYID= "";
	$CLASSID= "";
	$BATCHNO= "";
	$SERIAL= "";
	$TIERID= "";
	$TRANDATE= "";
	$TRANTYPE= "";
	$LINENUM= "";
	$PRODUCTNAME= "";
	$PRODUCTNAME1= "";
	$REFERENCE= "";
	$COMMENT="",
	$TRANQTY= "";
	$TRANUNIT= "";
	$TRANFACTOR= "";
	$STKUNIT= "",
	$STKFACTOR = "",
	$TRANDISC= "";
	$TRANTAX= "";
	$TRANCOST= "";
	$TRANPRICE= "";,
	$PRICE_ORI= "";
	$EXTPRICE= "";
	$EXTCOST= "";
	$CURRENTONHAND= "";
	$CURRID= "";
	$CURR_RATE= "";
	$CUSTID= "";
	$VENDID= "";
	$WEIGHT= "";
	$OLDWEIGHT= "";
	$APPLID= "";
	$CURRENTCOST= "";
	$LASTCOST= "";
	$COST_ADD= "";
	$COST_RIEL= "";
	$LINK_LINE= "";
	$ICCLEARING_ACC= "";
	$INVENTORY_ACC= "";
	$COSG_ACC= "";
	$DIMENSION= "";
	$FILEID= "";
	$IS_CHANGE_AVGCOST= "";
	$WASTE_QTY= "";
	$PRODUCT_PRODUCTID= "";
	$IS_PROCCESS= "";
	$EXPIRED_DATE= "";
	$TRANQTY_NEW= "";
	$TRANCOST_NEW= "";
	$TRANEXTCOST_NEW= "";
	$LINE_DISCAMT= "";
	$COST_CENTER= "";
	$LINE_NOTE= "";
	$CASE_PRODUCTID= "";
	$CASE_QTY= "";
	$POSSTAT= "";
	$DECL1= "";
	$FOB= "";
	$FREIGHT= "";
	$INSUR= "";
	$DECL2= "";
	$DUTY_VAT= "";
	$MCC_EXP= "";
	$LDC= "";
	$FREIGHT_SG= "";
	$INSUR_SG= "";
	$RECEIVENO= "";
	$OTHER_PRICE= "";
	$PO_COLID= "";
	$RETURN_DATE= "";
	$BORROW_NUMBER= "";
	$CHANGE_REWARD= "";
	$MONEY_REWARD= "";
	$IS_MONEY_REWARD= "";
	$PACK_RECEIVE= "";
	$PACK_UNIT= "";
	$REWARD_UNIT= "";
	$COST_METHOD= "";
	$BASECURR_ID= "";
	$CURRENCY_AMOUNT= "";
	$CURRENCY_COST= "";
	$CURRENCY_COST_ADD= "";
	$CURRENCY_EXTPRICE= "";
	$CURRENCY_PRICE= "";
	$FF_LF_INDEX= "";
	$PURPOSE_ISSUE= "";
	$JOB_ID= "";
	$ROW_ID= "";
	$MAIN_PRODUCTID= "";
	$USERADD= "";
	$DATEADD= "";	
	
	$SQL = "INSERT INTO [ICTRANDETAIL](
	[DOCNUM],[PRODUCTID],[LOCID],[CATEGORYID],[CLASSID],
	[BATCHNO],[SERIAL],[TIERID],[TRANDATE],[TRANTYPE],
	[LINENUM],[PRODUCTNAME],[PRODUCTNAME1],[REFERENCE],[COMMENT],
	[TRANQTY],[TRANUNIT],[TRANFACTOR],[STKUNIT],[STKFACTOR],
	[TRANDISC],[TRANTAX],[TRANCOST],[TRANPRICE],[PRICE_ORI],
	[EXTPRICE],[EXTCOST],[CURRENTONHAND],[CURRID],[CURR_RATE],
	[CUSTID],[VENDID],[WEIGHT],[OLDWEIGHT],[APPLID],
	[CURRENTCOST],[LASTCOST],[COST_ADD],[COST_RIEL],[LINK_LINE],
	[ICCLEARING_ACC],[INVENTORY_ACC],[COSG_ACC],[DIMENSION],[FILEID],
	[IS_CHANGE_AVGCOST],[WASTE_QTY],[PRODUCT_PRODUCTID],[IS_PROCCESS],[EXPIRED_DATE],
	[TRANQTY_NEW],[TRANCOST_NEW],[TRANEXTCOST_NEW],[LINE_DISCAMT],[COST_CENTER],
	[LINE_NOTE],[CASE_PRODUCTID],[CASE_QTY],[POSSTAT],[DECL1],
	[FOB],[FREIGHT],[INSUR],[DECL2],[DUTY_VAT],
	[MCC_EXP],[LDC],[FREIGHT_SG],[INSUR_SG],[RECEIVENO],
	[OTHER_PRICE],[PO_COLID],[RETURN_DATE],[BORROW_NUMBER],[CHANGE_REWARD],
	[MONEY_REWARD],[IS_MONEY_REWARD],[PACK_RECEIVE],[PACK_UNIT],[REWARD_UNIT],
	[COST_METHOD],[BASECURR_ID],[CURRENCY_AMOUNT],[CURRENCY_COST],[CURRENCY_COST_ADD],
	[CURRENCY_EXTPRICE],[CURRENCY_PRICE],[FF_LF_INDEX],[PURPOSE_ISSUE],[JOB_ID],
	[ROW_ID],[MAIN_PRODUCTID],[USERADD],[DATEADD]) 
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
	?,?,?,getdate())";


	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID,
		$BATCHNO,$SERIAL,$TIERID,$TRANDATE,$TRANTYPE,
		$LINENUM,$PRODUCTNAME,$PRODUCTNAME1,$REFERENCE,$COMMENT,
		$TRANQTY,$TRANUNIT,$TRANFACTOR,$STKUNIT,$STKFACTOR,
		$TRANDISC,$TRANTAX,$TRANCOST,$TRANPRICE$,$PRICE_ORI,
		$EXTPRICE,$EXTCOST,$CURRENTONHAND,$CURRID,$CURR_RATE,
		$CUSTID,$VENDID,$WEIGHT,$OLDWEIGHT,$APPLID,
		$CURRENTCOST,$LASTCOST,$COST_ADD,$COST_RIEL,$LINK_LINE,
		$ICCLEARING_ACC,$INVENTORY_ACC,$COSG_ACC,$DIMENSION,$FILEID,
		$IS_CHANGE_AVGCOST,$WASTE_QTY,$PRODUCT_PRODUCTID,$IS_PROCCESS,$EXPIRED_DATE,
		$TRANQTY_NEW,$TRANCOST_NEW,$TRANEXTCOST_NEW,$LINE_DISCAMT,$COST_CENTER,
		$LINE_NOTE,$CASE_PRODUCTID,$CASE_QTY,$POSSTAT,$DECL1,
		$FOB,$FREIGHT,$INSUR,$DECL2,$DUTY_VAT,
		$MCC_EXP,$LDC,$FREIGHT_SG,$INSUR_SG,$RECEIVENO,
		$OTHER_PRICE,$PO_COLID,$RETURN_DATE,$BORROW_NUMBER,$CHANGE_REWARD,
		$MONEY_REWARD,$IS_MONEY_REWARD,$PACK_RECEIVE,$PACK_UNIT,$REWARD_UNIT,
		$COST_METHOD,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,$CURRENCY_COST_ADD,
		$CURRENCY_EXTPRICE,$CURRENCY_PRICE,$FF_LF_INDEX,$PURPOSE_ISSUE,$JOB_ID,
		$ROW_ID,$MAIN_PRODUCTID,$USERADD,$DATEADD
 	));

	// <ICLOCATION> X Times
	$LOCCOST = "";
	$LOCLASTCOST = "";
	$RECENTLOCCOST = "";
	$LOCONHAND = "";
	$TOTALRECEIVE = "";
	$LASTRECEIVE = "";
	$USEREDIT = "";
	$DATEEDIT = "";
	$LOCID = "";
	$PRODUCTID = "";
 
 	$SQL = "UPDATE [ICLOCATION] set [LOCCOST] = @1,
				   [LOCLASTCOST] = @2,
				   [RECENTLOCCOST] = @3,
				   [LOCONHAND] = [LOCONHAND]+@4,
				   [TOTALRECEIVE] = [TOTALRECEIVE]+@5,
				   [LASTRECEIVE] = @6,
				   [USEREDIT] = @7,
				   [DATEEDIT] = @8  
			WHERE [LOCID]=@9 AND [PRODUCTID]=@10";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$LOCCOST,$LOCLASTCOST,$RECENTLOCCOST,$LOCONHAND,$TOTALRECEIVE,
		$LASTRECEIVE,$USEREDIT,$DATEEDIT,$LOCID,$PRODUCTID
	));			


	//<ICPRODUCT> X Times
	$ONHAND = ""; 
	$LASTCOST = ""; 
	$TOTALRECEIVE = ""; 
	$LASTRECEIVEDATE = ""; 
	$COST = ""; 
	$PRODUCTID = "";	
	$SQL = "UPDATE [ICPRODUCT] set [ONHAND] = [ONHAND]+@1,
								   [LASTCOST] = @2,
								   [TOTALRECEIVE] = [TOTALRECEIVE]+@3,
								   [LASTRECEIVEDATE] = @4,[COST] = @5  
								   WHERE [PRODUCTID]=@6";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$ONHAND, $LASTCOST, $TOTALRECEIVE, $LASTRECEIVEDATE, $COST, $PRODUCTID
	));



	//<ICVENDOR>
	$LASTCOST = "";
	$LASTRECEIVE = "";
	$TOTALRECEIVE = "";
	$USEREDIT = "";
	$DATEEDIT = "";
	$PRODUCTID = "";
	$VENDID = "";
	$SQL = "UPDATE [ICVENDOR] set [LASTCOST] = ?,
								  [LASTRECEIVE] = ?,
								  [TOTALRECEIVE] = [TOTALRECEIVE]+?,
								  [USEREDIT] = ?,[DATEEDIT] = ?  
							  	   WHERE [PRODUCTID]=? AND [VENDID]=?";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$LASTCOST,$LASTRECEIVE,$TOTALRECEIVE,$USEREDIT,$DATEEDIT,$PRODUCTID,$VENDID
	));							  	   


	//<PORECEIVEDDETAIL X times		
	$VENDID= "";
	$RECEIVENO = "";
	$VENDNAME = "";
	$VENDNAME1 = "";
	$PONUMBER = "";
	$TRANDATE = "";
	$APSTATUS = "";
	$TRANCOST = "";
	$PURCHASEDATE = "";
	$LINENUM = "";
	$PRODUCTID = "";
	$PRODUCTNAME = "";
	$PRODUCTNAME1 = "";
	$TRANQTY = "";
	$DIMENSION = "";
	$FILEID = "";
	$COST_CENTER = "";
	$INVENTORY_ACC = "";
	$POCLEARING_ACC = "";
	$EXTCOST = "";
	$LOCID = "";
	$QTY_ORDER = "";
	$VATABLE = "";
	$VAT_PERCENT = "";
	$LINE_NOTE = "";
	$REQUIREDATE = "";
	$PO_COLID = "";
	$TRANDISC = "";
	$FROM_SERIAL = "";
	$TO_SERIAL = "";
	$TRANUNIT = "";
	$TRANFACTOR = "";
	$CURRID_COSTADD = "";
	$OPERATIONBASE = "";
	$CURRID_EXCHRATE = "";
	$CURRENCY_AMOUNT = "";
	$COST_ADD = "";$CURR_ID,
	$BASECURR_ID = "";
	$CURRENCY_COST = "";
	$CURRENCY_COST_ADD = "";
	$ORIGINAL_QTY = "";
	$QTY_PACK = "";
	$PACK_WEIGHT = "";
	$CHAMBERNG_QTY = "";
	$WET_QTY = "";
	$WET_PERCENT = "";
	$DATEADD = "";
	$USERADD = "";
	$SQL ="INSERT INTO [PORECEIVEDETAIL](
	[VENDID],[RECEIVENO],[VENDNAME],[VENDNAME1],[PONUMBER],
	[TRANDATE],[APSTATUS],[TRANCOST],[PURCHASEDATE],[LINENUM],
	[PRODUCTID],[PRODUCTNAME],[PRODUCTNAME1],[TRANQTY],[DIMENSION],
	[FILEID],[COST_CENTER],[INVENTORY_ACC],[POCLEARING_ACC],[EXTCOST],
	[LOCID],[QTY_ORDER],[VATABLE],[VAT_PERCENT],[LINE_NOTE],
	[REQUIREDATE],[PO_COLID],[TRANDISC],[FROM_SERIAL],[TO_SERIAL],
	[TRANUNIT],[TRANFACTOR],[CURRID_COSTADD],[OPERATIONBASE],[CURRID_EXCHRATE],
	[CURRENCY_AMOUNT],[COST_ADD],[CURR_ID],[BASECURR_ID],[CURRENCY_COST],
	[CURRENCY_COST_ADD],[ORIGINAL_QTY],[QTY_PACK],[PACK_WEIGHT],[CHAMBERNG_QTY],
	[WET_QTY],[WET_PERCENT],[DATEADD],[USERADD]) 
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
	?,?,getdate(),?)";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
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

	//<APPO>
	$VENDID = "";
	$VOUCHERNO = "";
	$VENDNAME = "";
	$VENDNAME1 = "";
	$PONUMBER = "";
	$TRANDATE = "";
	$APSTATUS = "";
	$TRANCOST = "";
	$PURCHASEDATE = "";
	$LINENUM = "";
	$PRODUCTID = "";
	$PRODUCTNAME = "";
	$PRODUCTNAME1 = "";
	$TRANQTY = "";
	$DIMENSION = "";
	$FILEID = "";
	$COST_CENTER = "";
	$FREIGHTSG = "";
	$INSURSG = "";
	$TRANUNIT = "";
	$TRANFACTOR = "";
	$CURR_ID = "";
	$BASECURR_ID = "";
	$CURRENCY_AMOUNT = "";
	$CURRENCY_COST = "";
	$AMOUNT = "";
	$CURR_RATE = "";
	$DATEADD = "";
	$USERADD = "";
	$SQL = "INSERT INTO [APPO](
			[VENDID],[VOUCHERNO],[VENDNAME],[VENDNAME1],[PONUMBER],
			[TRANDATE],[APSTATUS],[TRANCOST],[PURCHASEDATE],[LINENUM],
			[PRODUCTID],[PRODUCTNAME],[PRODUCTNAME1],[TRANQTY],[DIMENSION],
			[FILEID],[COST_CENTER],[FREIGHTSG],[INSURSG],[TRANUNIT],
			[TRANFACTOR],[CURR_ID],[BASECURR_ID],[CURRENCY_AMOUNT],[CURRENCY_COST],
			[AMOUNT],[CURR_RATE],[DATEADD],[USERADD]) 
			values(
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,			
			?,?,getdate(),?)";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$VENDID,$VOUCHERNO,$VENDNAME,$VENDNAME1,$PONUMBER,
		$TRANDATE,$APSTATUS,$TRANCOST,$PURCHASEDATE,$LINENUM,
		$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$TRANQTY,$DIMENSION,
		$FILEID,$COST_CENTER,$FREIGHTSG,$INSURSG,$TRANUNIT,
		$TRANFACTOR,$CURR_ID,$BASECURR_ID,$CURRENCY_AMOUNT,$CURRENCY_COST,
		$AMOUNT,$CURR_RATE,$DATEADD,$USERADD
	));	

	
	


	//<GLTRAN> X Times
	$GLNO = "";
	$LINNO = "";
	$GLDESC = "";
	$GLDATE = "";
	$GLYEAR = "";
	$GLMONTH = "";
	$ACCNO = "";
	$GLAMT = "";
	$DEBIT = "";
	$CREDIT = "";
	$DOCNO = "";
	$USERADD = "";
	$DATEADD = "";
	$APPID = "";
	$REMARKS = "";
	$CUSTID = "";
	$VENDID = "";
	$FILEID = "";
	$COST_CENTER = "";
	$LOCID = "";

	$SQL = "INSERT INTO [GLTRAN](
	[GLNO],[LINNO],[GLDESC],[GLDATE],[GLYEAR],
	[GLMONTH],[ACCNO],[GLAMT],[DEBIT],[CREDIT],
	[DOCNO],[USERADD],[DATEADD],[APPID],[REMARKS],
	[CUSTID],[VENDID],[FILEID],[COST_CENTER],[LOCID]) 
	values(
	?,?,?,?,?,
	?,?,?,?,?,
	?,?,getdate(),?,?,
	?,?,?,?,?)";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
		$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
		$DOCNO,$USERADD,$DATEADD,$APPID,$REMARKS,
		$CUSTID,$VENDID,$FILEID,$COST_CENTER,$LOCID
	));


	//<DELETE ICCLOSING_COSTING>
	$TRAN_DATE = "";
	$PRODUCTID = "";

	$SQL = "DELETE [ICCLOSING_COSTING]  
			WHERE [TRAN_DATE]=@1 AND [PRODUCTID]=@2";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$TRAN_DATE,$PRODUCTID
	));


	//<CREATE ICCLOSING_COSTING>
	$TRAN_DATE = "";
	$PRODUCTID = "";
	$CLOSING_QTY = "";
	$CLOSING_AMOUNT = "";
	$PERIOD_COST = "";
	$INCREASED_QTY = "";
	$INCREASED_AMOUNT = "";
	$INCREASED_QTY_ALL = "";
	$INCREASED_AMOUNT_ALL = "";
	$DECREASED_QTY = "";
	$DECREASED_AMOUNT = "";
	$USERADD = "";
	$DATEADD = "";		


	$SQL = "INSERT INTO [ICCLOSING_COSTING](
	[TRAN_DATE],[PRODUCTID],[CLOSING_QTY],[CLOSING_AMOUNT],[PERIOD_COST],
	[INCREASED_QTY],[INCREASED_AMOUNT],[INCREASED_QTY_ALL],[INCREASED_AMOUNT_ALL],[DECREASED_QTY],
	[DECREASED_AMOUNT],[USERADD],[DATEADD]) 
	values(
	?,?,?,?,?,
	?,?,?,?,?,
	?,?,getdate())";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$TRAN_DATE,$PRODUCTID,$CLOSING_QTY,$CLOSING_AMOUNT,$PERIOD_COST,
		$INCREASED_QTY,$INCREASED_AMOUNT,$INCREASED_QTY_ALL,$INCREASED_AMOUNT_ALL,$DECREASED_QTY,
		$DECREASED_AMOUNT,$USERADD],$DATEADD
	));




	// APACCOUNT 
	$VENDID = "";
	$VOUCHERNO = "";
	$LINENUM = "";
	$ACCNO = "";
	$AMOUNT = "";
	$ACCNAME = "";
	$CURR_AMOUNT = "";
	$CURR_RATE = "";
	$USERADD = "";
	$DATEADD = "";

	$SQL = "INSERT INTO APACCOUNT
			(VENDID,VOUCHERNO,TRANDATE,LINENUM,ACCNO,
			AMOUNT,PERIOD,YEAR,BATCH,REFERENCE,
			ACCNAME,ACCNAME1,STAT,TYPE,BATCHDATE,
			FILEID,COST_CENTER,LOCID,COMMENT_ON_LINE,CURR_TYPE,
			CURR_AMOUNT,CURR_RATE,OPERATION_BASE,BASECURR_ID,CURR_ID,
			USERADD,DATEADD) 
			VALUES(
			?,?,getdate,?,?,
			?,MONTH(GETDATE()),YEAR(GETDATE()),?,?,
			?,?,?,?,GETDATE(),
			?,?,?,?,?,
			?,?,?,?,?,
			?,getdate())";
	$taxDB->prepare($SQL);
	$taXDB->execute(array(
	
	$VENDID,$VOUCHERNO,$LINENUM,$ACCNO,
	$AMOUNT,'','',
	$ACCNAME,'','','',
	'','','','','',
	$CURR_AMOUNT,$CURR_RATE,'','USD','USD',
	$USERADD			
	));
	 

}

function payPO($ponumber){

	// <UPDATE APHEADER>
	$PAID_AMT = "";
	$DISC_AMT = "";
	$BALANCE = "";
	$CURRENCY_PAIDAMT = "";
	$CURRENCY_DISCAMT = "";
	$CURRENCY_BALANCE = "";
	$PAIDDATE = "";

	$SQL = "UPDATE [APHEADER] set [PAID_AMT] = CONVERT([decimal](18,2),[PAID_AMT]+@1,0),
								  [DISC_AMT] = CONVERT([decimal](18,2),[DISC_AMT]+@2,0),
								  [BALANCE] = CONVERT([decimal](18,2),[BALANCE]-@3,0),
								  [CURRENCY_PAIDAMT] = CONVERT([decimal](18,2),[CURRENCY_PAIDAMT]+@4,0),
								  [CURRENCY_DISCAMT] = CONVERT([decimal](18,2),[CURRENCY_DISCAMT]+@5,0),
								  [CURRENCY_BALANCE] = CONVERT([decimal](18,2),[CURRENCY_BALANCE]-@6,0),
								  [PAIDDATE] = @7  
								  WHERE [VENDID]=@8 AND [VOUCHERNO]=@9";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$PAID_AMT,$DISC_AMT,$BALANCE,,$CURRENCY_PAIDAMT,
		$CURRENCY_DISCAMT,$CURRENCY_BALANCE,$PAIDDATE
	);								  


	//<CREATE APPAY>
	$VENDID = "";
	$VOUCHERNO = "";
	$VENDNAME = "";
	$VENDNAME1 = ""; 
	$PAIDDATE = "";
    $PAID_AMT = "";
    $PAY_TYPE = "";
    $PAY_REFERENCE = "";
    $CURRID = "";
    $CURR_RATE = "";
    $VATNO = "";
    $DISC_AMT = "";
    $PCNAME = "";
    $PAYNO = "";
    $ACCOUNT = "";
    $PAY_DESC = "";
    $PAY_DESC1 = "";
    $DISCACC = "";
    $BILL_REFERENCE = "";
    $SR = ""; 
    $FILEID = ""; 
    $RECEIPTNO = "";
    $REMARKS = "";
    $CURRENCY_PAIDAMOUNT = "";
    $CURRENCY_PAIDDISCAMOUNT = "";
    $BASECURR_ID = "";
    $CURR_INVOICERATE = "";
    $CURR_GAINLOSSES = "";
    $TRAN_PAIDAMOUNT = "";
    $TRAN_PAIDDISCAMOUNT = "";
    $GAIN_ACC = "";
    $LOSSES_ACC = "";
    $ROUNDING_ACC = "";
    $ROUNDING_VALUE = "";
    $CHEQUE_NUMBER = "";
    $DATEADD = "";
    $USERADD = "";
    $SQL = "INSERT INTO [APPAY]
    		([VENDID],[VOUCHERNO],[VENDNAME],[VENDNAME1],[PAIDDATE],
    		[PAID_AMT],[PAY_TYPE],[PAY_REFERENCE],[CURRID],[CURR_RATE],
    		[VATNO],[DISC_AMT],[PCNAME],[PAYNO],[ACCOUNT],
    		[PAY_DESC],[PAY_DESC1],[DISCACC],[BILL_REFERENCE],[SR],
    		[FILEID],[RECEIPTNO],[REMARKS],[CURRENCY_PAIDAMOUNT],[CURRENCY_PAIDDISCAMOUNT],
    		[BASECURR_ID],[CURR_INVOICERATE],[CURR_GAINLOSSES],[TRAN_PAIDAMOUNT],[TRAN_PAIDDISCAMOUNT],
    		[GAIN_ACC],[LOSSES_ACC],[ROUNDING_ACC],[ROUNDING_VALUE],[CHEQUE_NUMBER],
    		[DATEADD],[USERADD]) values(
    		?,?,?,?,?,
    		?,?,?,?,?,
    		?,?,?,?,?,
    		?,?,?,?,?,
    		?,?,?,?,?,
    		?,?,?,?,?,
    		?,?,?,?,?,    		    		
    		getdate(),?)";

    $taxDB->prepare($SQL);
	$taXDB->execute(array(
			$VENDID,$VOUCHERNO,$VENDNAME,$VENDNAME1,$PAIDDATE,
    		$PAID_AMT,$PAY_TYPE,$PAY_REFERENCE,$CURRID,$CURR_RATE,
    		$VATNO,$DISC_AMT,$PCNAME,$PAYNO,$ACCOUNT,
    		$PAY_DESC,$PAY_DESC1,$DISCACC,$BILL_REFERENCE,$SR,
    		$FILEID,$RECEIPTNO,$REMARKS,$CURRENCY_PAIDAMOUNT,$CURRENCY_PAIDDISCAMOUNT,
    		$BASECURR_ID,$CURR_INVOICERATE,$CURR_GAINLOSSES,$TRAN_PAIDAMOUNT,$TRAN_PAIDDISCAMOUNT,
    		$GAIN_ACC,$LOSSES_ACC,$ROUNDING_ACC,$ROUNDING_VALUE,$CHEQUE_NUMBER,
    		$DATEADD,$USERADD
	);


	$GLNO = "";
	$LINNO = "";
	$GLDESC = "";
	$GLDATE = "";
	$GLYEAR = "";
	$GLMONTH = "";
	$ACCNO = ""''
	$GLAMT = "";
	$DEBIT = "";
	$CREDIT = "";
    $DOCNO = ""; 
    $USERADD = "";
    $DATEADD = "";
    $APPID = "";
    $REMARKS = "";
    $CUSTID] = "";
    $VENDID = "";
    $FILEID = "" 
    $AUTO_PAYNO = "";


    //<CREATE GLTRAN> X times ??
    $SQL = "INSERT INTO [GLTRAN]
    		([GLNO],[LINNO],[GLDESC],[GLDATE],[GLYEAR],
    		 [GLMONTH],[ACCNO],[GLAMT],[DEBIT],[CREDIT],
    		 [DOCNO],[USERADD],[DATEADD],[APPID],[REMARKS],
    		 [CUSTID],[VENDID],[FILEID],[AUTO_PAYNO]) 
    		 values(
    		 ?,?,?,?,?,
    		 ?,?,?,?,?,
    		 ?,?,getdate(),?,?,
    		 ?,?,?,?)";

	$taxDB->prepare($SQL);
	$taXDB->execute(array(
		$GLNO,$LINNO,$GLDESC,$GLDATE,$GLYEAR,
		$GLMONTH,$ACCNO,$GLAMT,$DEBIT,$CREDIT,
    	$DOCNO,$USERADD,$DATEADD,$APPID,$REMARKS,
    	$CUSTID],$VENDID,$FILEID,$AUTO_PAYNO); 
	);

}





// Step 3

// Create all items and all vendors
// List items per vendor 

function createKickstartOrders(){
	// Retrieve the items listed in the first 2 month of sale 
	// Random 20% of remaining 

}

// Step 4
function superStore()
{
	// Repartition 3/PO per month, vendor based on quantity;
	// Stock checker and set PO per Vendor  // GREAT !!!***
	//  Simulate Stock Decrease with POS 

	// Chronology Loop, day by day simulate stock 

}


// Future SuperStore
	// Stock checker and set create  per Vendor per Day based on Vendor Order Day // GREAT !!!***
	// Receive PO with PO number and items list
	// Generate All AP


?>