<?php

function OccupancyByTeamYesterday($team){
	$today = date('m.d.Y');
	$yesterday = date('d.m.Y',strtotime("-1 days"));
	$sql = "SELECT * FROM STATSRECORD WHERE DAY = ?";
	$req = $db->prepare($sql);
	$data = $req->execute(array());
	if ($data == false)
		return null;
	else{
		return  $data["OCC_".$team."_TOD"];		
	}
}

function OccupancyByTeam($team)
{
	$db=getDatabase();	
	
	$teams["RAT"] = "G01A|G01B|G02A|G02B|G03A|G03B";
	$teams["OX"] = "G04A|G04B|G05A|G05B|GSOF";
	$teams["TIGER"] = "G06A|G06B|G07A|G07B|GMIL";
	$teams["HARE"] = "N08A|N08B|N09A|N09B|N10A|N10B|N11A|N11B|N12A|N12B|NCHA";
	$teams["DRAGON"] = "N13A|N13B|N14A|N14B|N15A|N15B|N16A|N16B|N17A|N17B|NRAC";
	$teams["SNAKE"] = "N18A|N18B|N19A|N19B|N20A|N20B|N21A|N21B|N22A|N22B"; 
	$teams["HORSE"] = "NBAB|GWIN";
	$teams["GOAT"] = "CHIL|FROZ";	
	$teams["ALL"] = "ALL";
	$allloc = $teams[$team]; 

	$sqlCount = "select sum(DATEDIFF(day,LASTRECEIVE,GETDATE()))
	FROM ICLOCATION
	WHERE LOCID = 'WH1' 
	AND LOCONHAND > 0
	AND DATEDIFF(day,LASTRECEIVE,GETDATE()) > 30 ";

	$sqlItems = "select TOP(20) ICLOCATION.PRODUCTID,PRODUCTNAME,LOCONHAND,LASTRECEIVE,DATEDIFF(day,LASTRECEIVE,GETDATE()) as DIFF 
	FROM ICLOCATION,ICPRODUCT 
	WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
	AND LOCID = 'WH1' 
	AND LOCONHAND > 0
	AND DATEDIFF(day,LASTRECEIVE,GETDATE()) > 30";
	
	if ($team != "ALL"){
		$locs = explode('|',$allloc);
		$sqlCount .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
		$sqlItems .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";

		foreach($locs as $loc){
			$sqlCount .= ' STORBIN LIKE ? OR';
			$sqlItems .= ' STORBIN LIKE ? OR';
			array_push($params, '%'.$loc.'%' );
		}
		$sqlCount = substr($sql,0,-2);
		$sqlCount .= "))";	
		$sqlItems = substr($sql,0,-2);
		$sqlItems .= ")) ORDER BY DIFF DESC";	
	}else{
		$sqlItems .= " ORDER BY DIFF DESC";	
	}
	
	
	$req1 = $db->prepare($sqlCount);
	$req1->execute($params);
	$count = $req1->fetch(PDO::FETCH_ASSOC);

	$req2 = $db->prepare($sqlItems);
	$req1->execute($params);
	$items = $req2->fetchAll(PDO::FETCH_ASSOC);

	$data = array();
	$data["COUNT"] = $count;
	$data["ITEMS"] = $items;
	return $data;
}

function TransferByTeam($team,$start,$end)
{
	$indb = getInternalDatabase();

	$teams["RAT"] = "G01A|G01B|G02A|G02B|G03A|G03B";
	$teams["OX"] = "G04A|G04B|G05A|G05B|GSOF";
	$teams["TIGER"] = "G06A|G06B|G07A|G07B|GMIL";
	$teams["HARE"] = "N08A|N08B|N09A|N09B|N10A|N10B|N11A|N11B|N12A|N12B|NCHA";
	$teams["DRAGON"] = "N13A|N13B|N14A|N14B|N15A|N15B|N16A|N16B|N17A|N17B|NRAC";
	$teams["SNAKE"] = "N18A|N18B|N19A|N19B|N20A|N20B|N21A|N21B|N22A|N22B"; 
	$teams["HORSE"] = "NBAB|GWIN";
	$teams["GOAT"] = "CHIL|FROZ";	
	$allloc = $teams[$team]; 
	
	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND (";
	$locs = explode('|',$allloc);
	$params = array();
	foreach($locs as $loc){
		$sql .= " ARG1 = ? OR";		
		array_push($params, $loc);
	}
	$sql .= ")";
				
	$sqlToday = $sql. "AND REQUEST_UPDATED BETWEEN ? AND ?";
	$req1 = $indb->prepare($sqlToday);
	$req1->execute(array($startToday,$endToday));	
	$items = $req1->fetchAll(PDO::FETCH_ASSOC);
	$nbItems = 0;
	$qtyItems = 0;
	foreach($items as $item){
		$sql = "SELECT count(*) as CNT,sum(REQUEST_QUANTITY) as SUM FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$nbItems += $data["CNT"];
		$qtyItems += $data["SUM"];
	}	
	$data = array();
	$data["NBITEM"] = $nbItemsToday;
	$data["QUANTITY"] = $qtyItemsToday;

	return $data;
}


function Generate()
{
	$db = getDatabase();
	$today = date('m/d/Y');
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $db->prepare($sql);
	$req->execute(array($today));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res == false){
		$sql = "SELECT COUNT(*) as 'CNT' FROM GENERATEDSTATS";
		$req = $db->prepare($sql);
		$req->execute(array());
		$count = $req->fetchAll(PDO::FETCH_ASSOC);

		$sql = "INSERT INTO GENERATEDSTATS (DAY) VALUES (?)";
		$req = $db->prepare($sql);
		$req->execute(array());
		if ($count == 0){
			GenerateYesterday();
			GenerateToday();
		}else{
			GenerateYesterdayFromCache();
			GenerateToday();
		}
	}
}

function GenerateToday()
{
	$db = getDatabase();
	$indb = getInternalDatabase();

	/*******************************************/
	//***   TRAFIC & AVG BASKET TODAY		****/
	/*******************************************/			
	$sql = "SELECT  count([POSDATE]) as 'NB', sum([PAID_AMT]) as 'SUM'
	FROM POSCASH
	WHERE POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($startToday,$endToday));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$data["TRAFFIC_TOD"] = $res["NB"];
	$data["AVGBASKET_TOD"] = $res["SUM"] / $res["NB"];

	/*******************************************/
	//*******   ITEM WASTED  TODAY		********/
	/*******************************************/	
	$sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?  IS NOT NULL ";
	$req = $db->prepare($sql);
	$req->execute($startToday,$endToday);
	$wasteditems = $req->fetchAll(PDO::FETCH_ASSOC);

	$allwasteitems = array();
	$data["WASTE_NBITEMS_TOD"] = count($wasteditems);
	$totalQty = 0;
	$totalSum = 0;
	foreach($wasteditems as $wasteditem){
		$sql = "SELECT PRODUCTNAME,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array(wasteditem["PRODUCTID"]));
		$oneitemData = $req->fetch(PDO:FETCH);

		$totalQty += $wasteitem["QUANTITY"];
		$totalSum += $wasteitem["QUANTITY"] * $oneitemData["COST"];

		$oneWasteData["PRODUCTID"] = wasteditem["PRODUCTID"];
		$oneWasteData["PRODUCTNAME"] = $oneitemData["PRODUCTNAME"];		
		$oneWasteData["QUANTITY"] = $wasteitem["QUANTITY"];
		$oneWasteData["COST"] = $oneitemData["COST"];
		array_push($allwasteitems, $oneWasteData);
	}
	$data["WASTE_SUM_TOD"] = $totalQty;
	$data["WASTE_ITEMS_TOD"] = $allwasteitems;	

	/*******************************************/
	//*******   RETURNED TODAY			********/
	/*******************************************/
	$sql = "SELECT * FROM RETURNRECORD WHERE  CREATED BETWEEN ? AND ? AND STATUS = 'CLEARED'";
	$req = $db->prepare($sql);
	$req->execute(array($startToday,$endToday));
	$returnData = $req->fetchAll(PDO::FETCH_ASSOC);
	$nbitemReturned = 0;
	$sumitemReturned = 0;
	$amountItemReturned = 0;
	foreach($returnData as $oneReturn){
		$sql = "SELECT QUANTITY,COST,VAT,DISCOUNT FROM RETURNRECORDITEM WHERE RETURNRECORD_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($oneReturn["ID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item){
			$nbitemReturned++;
			$sumitemReturned += $item["QUANTITY"];
			$itemPrice = $item["COST"] * ((100 - $item["DISCOUNT"])/100);
			$itemPrice = $itemPrice * (1 + $item["VAT"]); 			
			$amountItemReturned += $item["QUANTITY"] * $itemPrice;
		}
	}
	$data["RETURN_NBITEM_TOD"] = $nbitemReturned;
	$data["RETURN_SUMITEM_TOD"] = $sumitemReturned;
	$data["RETURN_AMOUNT_TOD"] = $amountItemReturned;


	/*******************************************/
	/****			TRANSFER TODAY			****/
	/*******************************************/
	$data["TRF_ALL_TOD"] = TransferByTeam("ALL",$startToday,$endToday);
	$data["TRF_RAT_TOD"] = TransferByTeam("RAT",$startToday,$endToday);
	$data["TRF_OX_TOD"] = TransferByTeam("OX",$startToday,$endToday);
	$data["TRF_TIGER_TOD"] = TransferByTeam("TIGER",$startToday,$endToday);
	$data["TRF_HARE_TOD"] = TransferByTeam("HARE",$startToday,$endToday);
	$data["TRF_DRAGON_TOD"] = TransferByTeam("DRAGON",$startToday,$endToday);
	$data["TRF_SNAKE_TOD"] = TransferByTeam("SNAKE",$startToday,$endToday);
	$data["TRF_HORSE_TOD"] = TransferByTeam("HORSE",$startToday,$endToday);
	$data["TRF_GOAT_TOD"] = TransferByTeam("GOAT",$startToday,$endToday);

		/*******************************************/
	/**** TOTAL OCCUPANCY ITEMS NOW ******/
	/*******************************************/
	$data["OCC_ALL_TOD"] = OccupancyByTeam("ALL");
	$data["OCC_RAT_TOD"] = OccupancyByTeam("RAT");
	$data["OCC_OX_TOD"] = OccupancyByTeam("OX");
	$data["OCC_TIGER_TOD"] = OccupancyByTeam("TIGER");
	$data["OCC_HARE_TOD"] = OccupancyByTeam("HARE");
	$data["OCC_DRAGON_TOD"] = OccupancyByTeam("DRAGON");
	$data["OCC_SNAKE_TOD"] = OccupancyByTeam("SNAKE");
	$data["OCC_HORSE_TOD"] = OccupancyByTeam("HORSE");
	$data["OCC_GOAT_TOD"] = OccupancyByTeam("GOAT");


	/***********************/
	/**** SALE TODAY    ****/
	/***********************/
	$data["SALE_RAT_TOD"] = getSaleByTeam($startToday,$endToday,"RAT");
	$data["SALE_OX_TOD"] = getSaleByTeam($startToday,$endToday,"OX");		
	$data["SALE_TIGER_TOD"] = getSaleByTeam($startToday,$endToday,"TIGER");
	$data["SALE_HARE_TOD"] = getSaleByTeam($startToday,$endToday,"HARE");
	$data["SALE_DRAGON_TOD"] = getSaleByTeam($startToday,$endToday,"DRAGON");
	$data["SALE_SNAKE_TOD"] = getSaleByTeam($startToday,$endToday,"SNAKE");
	$data["SALE_HORSE_TOD"] = getSaleByTeam($startToday,$endToday,"HORSE");
	$data["SALE_GOAT_TOD"] = getSaleByTeam($startToday,$endToday,"GOAT");

	/****************************/
	/** EXPIRE NORETURN ITEMS ***/
	/****************************/
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'NORETURN' AND CREATED > DATETIME('now', '-12 month')";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	$params = array();
	$sql = "SELECT SELECT TOP 5 (distinct PPSS_DELIVERED_EXPIRE),
					ICPRODUCT.PRODUCTID,
					ICPRODUCT.PRODUCTNAME,
					PODETAIL.VENDNAME,
					ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$expireNR = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["EXPIRE_RET_ITEMS"] = $expireNR;
		
	/****************************/
	/** EXPIRE NORETURN COUNT ***/
	/****************************/
	$sql = "SELECT SELECT TOP 5 count (distinct PPSS_DELIVERED_EXPIRE) as CNT	
	FROM PODETAIL,ICPRODUCT
	WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
	AND PPSS_DELIVERED_EXPIRE IS NOT NULL
	AND SUBSTRING(SIZE,1,2) = 'NR'
	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
	  AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
	AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
	AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
	AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
			 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
	AND ONHAND > 0		
	AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$data["EXPIRE_RET_CNT"] = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
	 

	/****************************/
	/** EXPIRE RETURN ITEMS *****/
	/****************************/
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'RETURN' AND CREATED > DATETIME('now', '-12 month')";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["PROMOTED"] = $items;
	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	$sql = "SELECT TOP 5 (distinct PPSS_DELIVERED_EXPIRE),
					ICPRODUCT.PRODUCTID,
					ICPRODUCT.PRODUCTNAME,
					PODETAIL.VENDNAME,
					ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$data["EXPIRE_NR_ITEMS"] = $req->fetchAll(PDO::FETCH_ASSOC);

	/**********************************/
	/** EXPIRE RETURN ITEMS COUNT *****/
	/**********************************/

	$sql = "SELECT 	count(distinct PPSS_DELIVERED_EXPIRE) as CNT										
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);	
	$req->execute($params);	
	$data["EXPIRE_NR_CNT"] = $req->fetch(PDO::FETCH_ASSOC);

	/*********************/
	/**** NEEDMOVE  ******/ 
	/*********************/
	$sql = "SELECT TOP(5) PRODUCTNAME,PRODUCTID,COST,PRICE,
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
	FROM ICPRODUCT 
	WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
	AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["NEEDMOVE_ITEMS"] = $items;

	 /*********************/
	/**** NEEDMOVE CNT ****/ 
	/*********************/
	$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
	FROM ICPRODUCT 
	WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
	AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetch(PDO::FETCH_ASSOC);
	$data["NEEDMOVE_CNT"] = $data['CNT'];

	/*********************/
	/**** NO LOCATION ****/ 
	/*********************/
	$sql = "SELECT TOP(5)PRODUCTID,PRODUCTNAME 
			FROM ICLOCATION,ICPRODUCT 
			WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
			AND STORBIN IS NULL 
			AND LOCID = 'WH1'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$noclocitems = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["NOLOC_ITEMS"] = $noclocitems;

	/*************************/
	/**** NO LOCATION COUNT **/ 
	/*************************/
	$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
			FROM ICLOCATION			
			WHERE STORBIN IS NULL 
			AND LOCID = 'WH1'";
	$req = $db->prepare($sql);
	$req->execute(array());	
	$data["NOLOC_ITEMS_CNT"] = $req->fetch(PDO::FETCH_ASSOC)["CNT"];


	 /***************************/
	/**** NEGATIVE ITEM WH1 ****/
	/***************************/
	$sql = "SELECT TOP(5) PRODUCTID,LOCONHAND,PRODUCTNAME 
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1' AND LOCONHAND < 0"; 
	$req = $db->prepare($sql);
	$req->execute(array());
	$count = $req->fetch(PDO::FETCH_ASSOC);
	$data["NEGATIVEITEM_WH1_ITEMS"] = $count;

	/*********************************/
	/**** NEGATIVE ITEM WH1 COUNT ****/
	/*********************************/
	$sql = "SELECT count(*) as CNT FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND < 0"; 
	$req = $db->prepare($sql);
	$req->execute(array());
	$count = $req->fetch(PDO::FETCH_ASSOC);
	$data["NEGATIVEITEM_WH1_CNT"] = $count;

    /***************************/
	/**** NEGATIVE ITEM WH2 ****/
	/***************************/
	$sql = "SELECT TOP(5) PRODUCTID,LOCONHAND,PRODUCTNAME 
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $count = $req->fetch(PDO::FETCH_ASSOC);
    $data["NEGATIVEITEM_WH2_ITEMS"] = $count;

    /*********************************/
    /**** NEGATIVE ITEM WH2 COUNT ****/
    /*********************************/
    $sql = "SELECT count(*) as CNT FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $count = $req->fetch(PDO::FETCH_ASSOC);
    $data["NEGATIVEITEM_WH2_CNT"] = $count;

	/***********************/
	/**** UNSOLD 30 ****/
	/***********************/
	$sql = "SELECT PODETAIL.PRODUCTID,DATEDIFF(day,RECEIVE_DATE,GETDATE()) as 'LASTRECEIVENBDAYS',ONHAND
			FROM ICPRODUCT,PODETAIL
			WHERE POSTATUS = 'C' 
			AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
			AND ONHAND > 0
			AND DATEDIFF(day,RECEIVE_DATE,GETDATE()) BETWEEN 30 AND 720
			AND (SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = PODETAIL.PRODUCTID) = 0";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["UNSOLD30_ITEMS"] = $items;

	/*****************************/
    // TOTAL PO RECEIVED TODAY //
    /*****************************/
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["PORECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    /*****************************/
    // TOTAL ITEM RECEIVED TODAY //
    /*****************************/
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["NBITEMRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    //********************************//
    // TOTAL ITEM QTY RECEIVED TODAY  //
    //********************************//
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["ITEMQTYRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    //*****************************//
    //****   PO CREATED TODAY  ****//
    //*****************************//
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["POCREATED_TOD"] = $req->fetch(PDO::FETCH_ASSOC);

    //***********************************//
    //****   TOTAL ITEMS IN PO TODAY ****//
    //***********************************//
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["NBITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

	//***********************************************//
    //****   TOTAL ITEMS ORDERED QTY IN PO TODAY ****//
    //**********************************************//
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["QTYITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
    

	//*******************************************//
    //**********    ANOMALIES COUNT    **********//
    //*******************************************//
	$sql = "SELECT count(*) as 'CNT' FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$data["ANOMALIES_CNT_NOW"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

	//*******************************************//
    //********	ANOMALIES ITEMS   ***************//
    //*******************************************//
	$sql = "SELECT TOP(5) PONUMBER FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED'";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$anomalies = $req->fetchAll(PDO::FETCH_ASSOC);
	$anomalyData = array();
	foreach($anomalies as $anomaly){

		$sql = "SELECT TOP(1) PRODUCTID,PPSS_WAITING_CALCULATED,PPSS_WAITING_QUANTITY 
				FROM PODETAIL 
				WHERE PONUMBER = ? 
				AND PPSS_WAITING_CALCULATED <> PPSS_WAITING_QUANTITY";
		$req = $db->prepare($sql);
		$req->execute(array($anomaly["PONUMBER"]));		
		$anomalyData[$anomaly["PONUMBER"]] = $req->fetch(PDO::FETCH_ASSOC);
	}
	$data["ANOMALIES_ITEMS_NOW"];

	//*******************************************//
    //**** PRICE DIFFERENCES TODAY 		*********//
    //*******************************************//
    $sql = "SELECT PRODUCTID,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    $data["PRICEDIFFERENCES_ITEMS_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

	$sql = "UPDATE GENERATEDSTATS SET 
	TRAFFIC_TOD = ?,AVGBASKET_TOD = ?,WASTE_SUM_TOD = ?,WASTE_ITEMS_TOD = ?,RETURN_NBITEM_TOD = ?,
	RETURN_SUMITEM_TOD = ?,RETURN_AMOUNT_TOD = ?,TRF_ALL_TOD = ?,TRF_RAT_TOD = ?,TRF_OX_TOD = ?,
	TRF_TIGER_TOD = ?,TRF_HARE_TOD = ?,TRF_DRAGON_TOD = ?,TRF_SNAKE_TOD = ?,TRF_HORSE_TOD = ?,
	TRF_GOAT_TOD = ?,OCC_ALL_TOD = ?,OCC_RAT_TOD = ?,OCC_OX_TOD = ?,OCC_TIGER_TOD = ?,
	OCC_HARE_TOD = ?,OCC_DRAGON_TOD = ?,OCC_SNAKE_TOD = ?,OCC_HORSE_TOD = ?,OCC_GOAT_TOD = ?,
	SALE_RAT_TOD = ?,SALE_OX_TOD = ?,SALE_TIGER_TOD = ?,SALE_HARE_TOD = ?,SALE_DRAGON_TOD = ?,
	SALE_SNAKE_TOD = ?,SALE_HORSE_TOD = ?,SALE_GOAT_TOD = ?,EXPIRE_RET_ITEMS = ?,EXPIRE_RET_CNT = ?,
	EXPIRE_NR_ITEMS = ?,EXPIRE_NR_CNT = ?,NEEDMOVE_ITEMS = ?,NEEDMOVE_CNT = ?,NOLOC_ITEMS = ?,
	NOLOC_ITEMS_CNT = ?,NEGATIVEITEM_WH1_ITEMS = ?,NEGATIVEITEM_WH1_CNT = ?,NEGATIVEITEM_WH2_ITEMS = ?,NEGATIVEITEM_WH2_CNT = ?,
	UNSOLD30_ITEMS = ?,PORECEIVED_TOD = ?,NBITEMRECEIVED_TOD = ?,ITEMQTYRECEIVED_TOD = ?,POCREATED_TOD = ?,
	NBITEMORDERED_TOD = ?,QTYITEMORDERED_TOD = ?,ANOMALIES_CNT_NOW = ?,ANOMALIES_ITEMS_NOW = ?,PRICEDIFFERENCES_ITEMS_TOD = ?";

	$params = array(
		$data["TRAFFIC_TOD"], $data["AVGBASKET_TOD"], $data["WASTE_SUM_TOD"], $data["WASTE_ITEMS_TOD"], $data["RETURN_NBITEM_TOD"], 
		$data["RETURN_SUMITEM_TOD"], $data["RETURN_AMOUNT_TOD"], $data["TRF_ALL_TOD"], $data["TRF_RAT_TOD"], $data["TRF_OX_TOD"], 
		$data["TRF_TIGER_TOD"], $data["TRF_HARE_TOD"], $data["TRF_DRAGON_TOD"], $data["TRF_SNAKE_TOD"], $data["TRF_HORSE_TOD"], 
		$data["TRF_GOAT_TOD"], $data["OCC_ALL_TOD"], $data["OCC_RAT_TOD"], $data["OCC_OX_TOD"], $data["OCC_TIGER_TOD"], 
		$data["OCC_HARE_TOD"], $data["OCC_DRAGON_TOD"], $data["OCC_SNAKE_TOD"], $data["OCC_HORSE_TOD"], $data["OCC_GOAT_TOD"], 
		$data["SALE_RAT_TOD"], $data["SALE_OX_TOD"], $data["SALE_TIGER_TOD"], $data["SALE_HARE_TOD"], $data["SALE_DRAGON_TOD"], 
		$data["SALE_SNAKE_TOD"], $data["SALE_HORSE_TOD"], $data["SALE_GOAT_TOD"], $data["EXPIRE_RET_ITEMS"], $data["EXPIRE_RET_CNT"], 
		$data["EXPIRE_NR_ITEMS"], $data["EXPIRE_NR_CNT"], $data["NEEDMOVE_ITEMS"], $data["NEEDMOVE_CNT"], $data["NOLOC_ITEMS"], 
		$data["NOLOC_ITEMS_CNT"], $data["NEGATIVEITEM_WH1_ITEMS"], $data["NEGATIVEITEM_WH1_CNT"], $data["NEGATIVEITEM_WH2_ITEMS"], $data["NEGATIVEITEM_WH2_CNT"], 
		$data["UNSOLD30_ITEMS"], $data["PORECEIVED_TOD"], $data["NBITEMRECEIVED_TOD"], $data["ITEMQTYRECEIVED_TOD"], $data["POCREATED_TOD"], 
		$data["NBITEMORDERED_TOD"], $data["QTYITEMORDERED_TOD"], $data["ANOMALIES_CNT_NOW"], $data["ANOMALIES_ITEMS_NOW"], $data["PRICEDIFFERENCES_ITEMS_TOD"], 
	);

}


function GenerateYesterdayFromCache()
{
	$indb = getInternalDatabase();
	$today = date('m/d/Y');
	$yesterday = date('d.m.Y',strtotime("-1 days"));
	
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $db->prepare($sql);
	$res = $req->execute(array($yesterday));
	if ($res != false){
		$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
		$req = $db->prepare($sql);
		$res = $req->execute(array($yesterday));
		if ($res == false){
			$sql = "INSERT INTO GENERATEDSTATS (DAY) VALUES (?)";
			$req = $db->prepare($sql);
			$req->execute(array());
		}

		$sql = "UPDATE GENERATEDSTATS SET 
				TRAFFIC_YES = ?,AVGBASKET_YES = ?, WASTE_NBITEMS_YES = ?, WASTE_SUM_YES = ?,WASTE_ITEMS_YES = ?,
				RETURN_NBITEM_YES = ?,RETURN_SUMITEM_YES = ?,RETURN_AMOUNT_YES = ?,TRF_ALL_YES = ?,TRF_RAT_YES = ?,
				TRF_OX_YES = ?,TRF_TIGER_YES = ?,TRF_HARE_YES = ?,TRF_DRAGON_YES = ?,TRF_SNAKE_YES = ?,
				TRF_HORSE_YES = ?,TRF_GOAT_YES = ?,OCC_ALL_YES = ?,OCC_RAT_YES = ?,OCC_OX_YES = ?,
				OCC_TIGER_YES = ?,OCC_HARE_YES = ?,OCC_DRAGON_YES = ?,OCC_SNAKE_YES = ?,OCC_HORSE_YES = ?,
				OCC_GOAT_YES = ?,SALE_RAT_YES = ?,SALE_OX_YES = ?,SALE_TIGER_YES = ?,SALE_HARE_YES = ?,
				SALE_DRAGON_YES = ?,SALE_SNAKE_YES = ?,SALE_HORSE_YES = ?,SALE_GOAT_YES = ?,PORECEIVED_YES = ?,
				NBITEMRECEIVED_YES = ?,ITEMQTYRECEIVED_YES = ?,POCREATED_YES = ?,NBITEMORDERED_YES = ?,QTYITEMORDERED_YES = ?,
				PRICEDIFFERENCES_ITEMS_YES = ? WHERE DAY = ?
				";
		
		$params = array(
			$res["TRAFFIC_TOD"],$res["AVGBASKET_TOD"],$res["WASTE_NBITEMS_TOD"],$res["WASTE_SUM_TOD"],$res["WASTE_ITEMS_TOD"],
			$res["RETURN_NBITEM_TOD"],$res["RETURN_SUMITEM_TOD"],$res["RETURN_AMOUNT_TOD"],$res["TRF_ALL_TOD"],$res["TRF_RAT_TOD"],
			$res["TRF_OX_TOD"],$res["TRF_TIGER_TOD"],$res["TRF_HARE_TOD"],$res["TRF_DRAGON_TOD"],$res["TRF_SNAKE_TOD"],
			$res["TRF_HORSE_TOD"],$res["TRF_GOAT_TOD"],$res["OCC_ALL_TOD"],$res["OCC_RAT_TOD"],$res["OCC_OX_TOD"],
			$res["OCC_TIGER_TOD"],$res["OCC_HARE_TOD"],$res["OCC_DRAGON_TOD"],$res["OCC_SNAKE_TOD"],$res["OCC_HORSE_TOD"],
			$res["OCC_GOAT_TOD"],$res["SALE_RAT_TOD"],$res["SALE_OX_TOD"],$res["SALE_TIGER_TOD"],$res["SALE_HARE_TOD"],
			$res["SALE_DRAGON_TOD"],$res["SALE_SNAKE_TOD"],$res["SALE_HORSE_TOD"],$res["SALE_GOAT_TOD"],$res["PORECEIVED_TOD"],
			$res["NBITEMRECEIVED_TOD"],$res["ITEMQTYRECEIVED_TOD"],$res["POCREATED_TOD"],$res["NBITEMORDERED_TOD"],$res["QTYITEMORDERED_TOD"],
			$res["PRICEDIFFERENCES_ITEMS_TOD"],$today
		);
		$db->prepare($sql);
		$req = $db->execute($params);
	}

}

function GenerateYesterday()
{
    $db = getDatabase();
	$indb = getInternalDatabase();
    $data = array();

    $today = date('m/d/Y');
	$yesterday = date('d.m.Y',strtotime("-1 days"));
	$startToday = $today." 00:00:00.000";
	$endToday = $today." 23:59:59.999";
	$startYesterday = $yesterday." 00:00:00.000";
	$endYesterday = $yesterday." 23:59:59.999";

	/*******************************************/
	//***   TRAFIC & AVG BASKET YESTERDAY	****/
	/*******************************************/			
	$sql = "SELECT  count([POSDATE]) as 'NB', sum([PAID_AMT]) as 'SUM'
	FROM POSCASH
	WHERE POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($startYesterday,$endYesterday));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$data["TRAFFIC_YES"] = $res["NB"];
	$data["AVGBASKET_YES"] = $res["SUM"] / $res["NB"];	
			
	/*******************************************/
	//*******   ITEM WASTED  YESTERDAY	********/
	/*******************************************/
	$sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?  IS NOT NULL ";
	$req = $db->prepare($sql);
	$req->execute($startYesterday,$endYesterday);
	$wasteditems = $req->fetchAll(PDO::FETCH_ASSOC);

	$allwasteitems = array();
	$data["WASTE_NBITEMS_YES"] = count($wasteditems);
	$totalQty = 0;
	$totalSum = 0;
	foreach($wasteditems as $wasteditem){
		$sql = "SELECT PRODUCTNAME,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array(wasteditem["PRODUCTID"]));
		$oneitemData = $req->fetch(PDO:FETCH);

		$totalQty += $wasteitem["QUANTITY"];
		$totalSum += $wasteitem["QUANTITY"] * $oneitemData["COST"];

		$oneWasteData["PRODUCTID"] = wasteditem["PRODUCTID"];
		$oneWasteData["PRODUCTNAME"] = $oneitemData["PRODUCTNAME"];		
		$oneWasteData["QUANTITY"] = $wasteitem["QUANTITY"];
		$oneWasteData["COST"] = $oneitemData["COST"];
		array_push($allwasteitems, $oneWasteData);
	}
	$data["WASTE_SUM_YES"] = $totalQty;
	$data["WASTE_ITEMS_YES"] = $allwasteitems;

	/*******************************************/
	//*******   RETURNED YESTERDAY		********/
	/*******************************************/
	$sql = "SELECT * FROM RETURNRECORD WHERE  CREATED BETWEEN ? AND ? AND STATUS = 'CLEARED'";
	$req = $db->prepare($sql);
	$req->execute(array($startYesterday,$endYesterday));
	$returnData = $req->fetchAll(PDO::FETCH_ASSOC);
	$nbitemReturned = 0;
	$sumitemReturned = 0;
	$amountItemReturned = 0;
	foreach($returnData as $oneReturn){
		$sql = "SELECT QUANTITY,COST,VAT,DISCOUNT FROM RETURNRECORDITEM WHERE RETURNRECORD_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($oneReturn["ID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item){
			$nbitemReturned++;
			$sumitemReturned += $item["QUANTITY"];
			$itemPrice = $item["COST"] * ((100 - $item["DISCOUNT"])/100);
			$itemPrice = $itemPrice * (1 + $item["VAT"]); 			
			$amountItemReturned += $item["QUANTITY"] * $itemPrice;
		}
	}
	$data["RETURN_NBITEM_YES"] = $nbitemReturned;
	$data["RETURN_SUMITEM_YES"] = $sumitemReturned;
	$data["RETURN_AMOUNT_YES"] = $amountItemReturned;

	// TURNOVER
	/*******************************************/
	/****			TRANSFER YESTERDAY		****/
	/*******************************************/
	$data["TRF_ALL_YES"] = TransferByTeam("ALL",$startYesterday,startYesterday);
	$data["TRF_RAT_YES"] = TransferByTeam("RAT",$startYesterday,startYesterday);
	$data["TRF_OX_YES"] = TransferByTeam("OX",$startYesterday,startYesterday);
	$data["TRF_TIGER_YES"] = TransferByTeam("TIGER",$startYesterday,startYesterday);
	$data["TRF_HARE_YES"] = TransferByTeam("HARE",$startYesterday,startYesterday);
	$data["TRF_DRAGON_YES"] = TransferByTeam("DRAGON",$startYesterday,startYesterday);
	$data["TRF_SNAKE_YES"] = TransferByTeam("SNAKE",$startYesterday,startYesterday);
	$data["TRF_HORSE_YES"] = TransferByTeam("HORSE",$startYesterday,startYesterday);
	$data["TRF_GOAT_YES"] = TransferByTeam("GOAT",$startYesterday,startYesterday);

	/*************************************************/
	/**** TOTAL OCCUPANCY ITEMS YESTERDAY ******/
	/*************************************************/
	$data["OCC_ALL_YES"] = OccupancyByTeamYesterday("ALL");
	$data["OCC_RAT_YES"] = OccupancyByTeamYesterday("RAT");
	$data["OCC_OX_YES"] = OccupancyByTeamYesterday("OX");
	$data["OCC_TIGER_YES"] = OccupancyByTeamYesterday("TIGER");
	$data["OCC_HARE_YES"] = OccupancyByTeamYesterday("HARE");
	$data["OCC_DRAGON_YES"] = OccupancyByTeamYesterday("DRAGON");
	$data["OCC_SNAKE_YES"] = OccupancyByTeamYesterday("SNAKE");
	$data["OCC_HORSE_YES"] = OccupancyByTeamYesterday("HORSE");
	$data["OCC_GOAT_YES"] = OccupancyByTeamYesterday("GOAT");
	

    /***********************/
	/**** SALE YESTERDAY ***/
	/***********************/
	$data["SALE_RAT_YES"] = getSaleByTeam($startYesterday,$endYesterday,"RAT");
	$data["SALE_OX_YES"] = getSaleByTeam($startYesterday,$endYesterday,"OX");		
	$data["SALE_TIGER_YES"] = getSaleByTeam($startYesterday,$endYesterday,"TIGER");
	$data["SALE_HARE_YES"] = getSaleByTeam($startYesterday,$endYesterday,"HARE");
	$data["SALE_DRAGON_YES"] = getSaleByTeam($startYesterday,$endYesterday,"DRAGON");
	$data["SALE_SNAKE_YES"] = getSaleByTeam($startYesterday,$endYesterday,"SNAKE");
	$data["SALE_HORSE_YES"] = getSaleByTeam($startYesterday,$endYesterday,"HORSE");
	$data["SALE_GOAT_YES"] = getSaleByTeam($startYesterday,$endYesterday,"GOAT");
	
    // RCV //

    //*******************************//
    // TOTAL PO RECEIVED YESTERDAY   //
    //*******************************//
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["PORECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
    
    //*******************************//
    // TOTAL ITEM RECEIVED YESTERDAY //
    //*******************************//
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["NBITEMRECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    //*******************************//
    // TOTAL ITEM QTY RECEIVED YESTERDAY //
    //*******************************//
     $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["ITEMQTYRECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    // PCH //    
    //*********************************//
    //****   PO CREATED YESTERDAY  ****//
    //*********************************//
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["POCREATED_YES"] = $req->fetch(PDO::FETCH_ASSOC);

    //************************************//
    //*** TOTAL ITEMS IN PO YESTERDAY ****//
    //************************************//
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["NBITEMORDERED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];   
  
    //*******************************************//
    //****TOTAL ITEMS ORDERED QTY  YESTERDAY ****//
    //*******************************************//
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["QTYITEMORDERED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];


	//*******************************************//
    //**** PRICE DIFFERENCES  	   YESTERDAY ****//
    //*******************************************//
    $sql = "SELECT PRODUCTID,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["PRICEDIFFERENCES_ITEMS_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
}


/*

$app->get('/expirereturnalertwh/ALL',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID)  > 0;
					";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);

	$data["ALERT"] = $allitems;
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirenoreturnalertwh/ALL',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID)  > 0;
					";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);

	$data["ALERT"] = $allitems;
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});
*/



?>