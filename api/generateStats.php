<?php

require_once("functions.php");

function OccupancyByTeamYesterday($team){
	$db=getInternalDatabase();	
	$today = date('m.d.Y');
	$yesterday = date('d.m.Y',strtotime("-1 days"));
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetch(PDO::FETCH_ASSOC);
	if ($data == false)
		return null;
	else{
		return  $data["OCC_".$team."_TOD"];		
	}
}

function OccupancyByTeam($db,$team)
{
	echo "OCCUPANCY BY TEAM: ".$team."\n";	
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
	$params = array();
	if ($team != "ALL"){
		$locs = explode('|',$allloc);
		$sqlCount .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
		$sqlItems .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";

		foreach($locs as $loc){
			$sqlCount .= ' STORBIN LIKE ? OR';
			$sqlItems .= ' STORBIN LIKE ? OR';
			array_push($params, '%'.$loc.'%' );
		}
		$sqlCount = substr($sqlCount,0,-2);
		$sqlCount .= "))";	
		$sqlItems = substr($sqlItems,0,-2);
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

function TransferByTeam($indb,$team,$start,$end)
{
	echo "TRANFER BY TEAM: ".$team."\n";
	
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

	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER'";
	if ($team != "ALL")
	{
		$sql .= " AND (";
		$locs = explode('|',$allloc);
		$params = array();
		foreach($locs as $loc){
			$sql .= " ARG1 = ? OR";		
			array_push($params, $loc);
		}
		$sql = substr($sql,0,-2);
		$sql .= ")";
	}
					
	$sqlToday = $sql. " AND REQUEST_UPDATED BETWEEN ? AND ?";	
	$req1 = $indb->prepare($sqlToday);
	$req1->execute(array($start,$end));	
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
	$data["NBITEM"] = $nbItems;
	$data["QUANTITY"] = $qtyItems;

	return $data;
}


function Generate()
{
	$db = getDatabase();
	$indb = getInternalDatabase();
	$today = date('m/d/Y');
	
	$sql = "SELECT COUNT(*) as 'CNT' FROM GENERATEDSTATS";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$count = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($today));
	$data = $req->fetch(PDO::FETCH_ASSOC);
	if ($data == false){
		$sql = "INSERT INTO GENERATEDSTATS (DAY) VALUES (?)";
		$req = $indb->prepare($sql);
		$req->execute(array($today));
		if ($count == 0){		
			GenerateToday($db,$indb,false);
		}else{			
			GenerateYesterdayFromCache();
			GenerateToday($db,$indb);
		}
	}
	else{
		GenerateToday($db,$indb,true);
	}
	
}

function updateStats($db,$day,$key,$value,$forceRefresh = false){
	$sql = "SELECT ".$key." FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $db->prepare($sql);
	$req->execute(array($day));
	$res = $req->fetch(PDO::FETCH_ASSOC);	
	if($res[$key] == null || $forceRefresh == true){
		echo "UPDATE ".$key."\n";
		$sql = "UPDATE GENERATEDSTATS SET ".$key." = ?";
		$req = $db->prepare($sql);		
		if (is_array($value))
			$req->execute(array(json_encode($value,true)));
		else
			$req->execute(array($value));
		
		

	}
}

function GenerateToday($db,$indb,$forceRefresh)
{

	$today = date('m/d/Y');	
	$startToday = $today." 00:00:00.000";
	$endToday = $today." 23:59:59.999";	
	$data = array();
	echo "TODAY\n";
	/*******************************************/
	//***   TRAFIC & AVG BASKET TODAY		****/
	/*******************************************/			
	echo "TRAFFIC AND AVERAGE BASKET TODAY.\n";
	$sql = "SELECT  count([POSDATE]) as 'NB', sum([PAID_AMT]) as 'SUM'
	FROM POSCASH
	WHERE POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($startToday,$endToday));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	
	//$data["TRAFFIC_TOD"] = $res["NB"];	
	//$data["AVGBASKET_TOD"] = $res["SUM"] / $divider;
	$divider = intval($res["NB"]) != 0 ? $res["NB"] : 1;
	updateStats($indb,$today,"TRAFFIC_TOD",$res["NB"],$forceRefresh);
	updateStats($indb,$today,"AVGBASKET_TOD",$res["SUM"] / $divider,$forceRefresh);

	/*******************************************/
	//*******   ITEM WASTED  TODAY		********/
	/*******************************************/	
	echo "ITEM WASTED TODAY.\n";
	$sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($startToday,$endToday));
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
	//$data["WASTE_SUM_TOD"] = $totalQty;
	//$data["WASTE_ITEMS_TOD"] = $allwasteitems;	
	updateStats($indb,$today,"WASTE_SUM_TOD",$totalQty,$forceRefresh);
	updateStats($indb,$today,"WASTE_ITEMS_TOD",$allwasteitems,$forceRefresh);
	
	/*******************************************/
	//*******   RETURNED TODAY			********/
	/*******************************************/
	echo "RETURNED TODAY.\n";
	$sql = "SELECT * FROM RETURNRECORD WHERE  CREATED BETWEEN ? AND ? AND STATUS = 'CLEARED'";
	$req = $indb->prepare($sql);
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
	//$data["RETURN_NBITEM_TOD"] = $nbitemReturned;
	//$data["RETURN_SUMITEM_TOD"] = $sumitemReturned;
	//$data["RETURN_AMOUNT_TOD"] = $amountItemReturned;
	updateStats($indb,$today,"RETURN_NBITEM_TOD",$nbitemReturned,$forceRefresh);
	updateStats($indb,$today,"RETURN_SUMITEM_TOD",$sumitemReturned,$forceRefresh);
	updateStats($indb,$today,"RETURN_AMOUNT_TOD",$amountItemReturned,$forceRefresh);


	/*******************************************/
	/****			TRANSFER TODAY			****/
	/*******************************************/
	echo "TRANSFER TODAY.\n";
	updateStats($indb,$today,"TRF_ALL_TOD",TransferByTeam($indb,"ALL",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_OX_TOD",TransferByTeam($indb,"OX",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_TIGER_TOD",TransferByTeam($indb,"TIGER",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_HARE_TOD",TransferByTeam($indb,"HARE",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_DRAGON_TOD",TransferByTeam($indb,"DRAGON",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_SNAKE_TOD",TransferByTeam($indb,"SNAKE",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_HORSE_TOD",TransferByTeam($indb,"HORSE",$startToday,$endToday),$forceRefresh);
	updateStats($indb,$today,"TRF_GOAT_TOD",TransferByTeam($indb,"GOAT",$startToday,$endToday),$forceRefresh);
	/*
	$data["TRF_ALL_TOD"] = TransferByTeam($indb,"ALL",$startToday,$endToday);
	$data["TRF_RAT_TOD"] = TransferByTeam($indb,"RAT",$startToday,$endToday);
	$data["TRF_OX_TOD"] = TransferByTeam($indb,"OX",$startToday,$endToday);
	$data["TRF_TIGER_TOD"] = TransferByTeam($indb,"TIGER",$startToday,$endToday);
	$data["TRF_HARE_TOD"] = TransferByTeam($indb,"HARE",$startToday,$endToday);
	$data["TRF_DRAGON_TOD"] = TransferByTeam($indb,"DRAGON",$startToday,$endToday);
	$data["TRF_SNAKE_TOD"] = TransferByTeam($indb,"SNAKE",$startToday,$endToday);
	$data["TRF_HORSE_TOD"] = TransferByTeam($indb,"HORSE",$startToday,$endToday);
	$data["TRF_GOAT_TOD"] = TransferByTeam($indb,"GOAT",$startToday,$endToday);
	*/

	/*******************************************/
	/**** TOTAL OCCUPANCY ITEMS NOW ******/
	/*******************************************/
	echo "OCCUPANCY TODAY.\n";
	updateStats($indb,$today,"OCC_ALL_TOD",OccupancyByTeam($db,"ALL"),$forceRefresh);
	updateStats($indb,$today,"OCC_RAT_TOD",OccupancyByTeam($db,"RAT"),$forceRefresh);
	updateStats($indb,$today,"OCC_OX_TOD",OccupancyByTeam($db,"OX"),$forceRefresh);
	updateStats($indb,$today,"OCC_TIGER_TOD",OccupancyByTeam($db,"TIGER"),$forceRefresh);
	updateStats($indb,$today,"OCC_HARE_TOD",OccupancyByTeam($db,"HARE"),$forceRefresh);
	updateStats($indb,$today,"OCC_DRAGON_TOD",OccupancyByTeam($db,"DRAGON"),$forceRefresh);
	updateStats($indb,$today,"OCC_SNAKE_TOD",OccupancyByTeam($db,"SNAKE"),$forceRefresh);
	updateStats($indb,$today,"OCC_HORSE_TOD",OccupancyByTeam($db,"HORSE"),$forceRefresh);
	updateStats($indb,$today,"OCC_HARE_TOD",OccupancyByTeam($db,"GOAT"),$forceRefresh);

	/*
	$data["OCC_ALL_TOD"] = OccupancyByTeam($db,"ALL");
	$data["OCC_RAT_TOD"] = OccupancyByTeam($db,"RAT");
	$data["OCC_OX_TOD"] = OccupancyByTeam($db,"OX");
	$data["OCC_TIGER_TOD"] = OccupancyByTeam($db,"TIGER");
	$data["OCC_HARE_TOD"] = OccupancyByTeam($db,"HARE");
	$data["OCC_DRAGON_TOD"] = OccupancyByTeam($db,"DRAGON");
	$data["OCC_SNAKE_TOD"] = OccupancyByTeam($db,"SNAKE");
	$data["OCC_HORSE_TOD"] = OccupancyByTeam($db,"HORSE");
	$data["OCC_GOAT_TOD"] = OccupancyByTeam($db,"GOAT");
	*/

	/***********************/
	/**** SALE TODAY    ****/
	/***********************/
	echo "SALE TODAY.\n";
	updateStats($indb,$today,"SALE_RAT_TOD",getSaleByTeam($startToday,$endToday,"RAT"),$forceRefresh);
	updateStats($indb,$today,"SALE_OX_TOD",getSaleByTeam($startToday,$endToday,"OX"),$forceRefresh);
	updateStats($indb,$today,"SALE_TIGER_TOD",getSaleByTeam($startToday,$endToday,"TIGER"),$forceRefresh);
	updateStats($indb,$today,"SALE_HARE_TOD",getSaleByTeam($startToday,$endToday,"HARE"),$forceRefresh);
	updateStats($indb,$today,"SALE_DRAGON_TOD",getSaleByTeam($startToday,$endToday,"DRAGON"),$forceRefresh);
	updateStats($indb,$today,"SALE_SNAKE_TOD",getSaleByTeam($startToday,$endToday,"SNAKE"),$forceRefresh);
	updateStats($indb,$today,"SALE_HORSE_TOD",getSaleByTeam($startToday,$endToday,"HORSE"),$forceRefresh);
	updateStats($indb,$today,"SALE_GOAT_TOD",getSaleByTeam($startToday,$endToday,"GOAT"),$forceRefresh);

	/*
	$data["SALE_RAT_TOD"] = getSaleByTeam($startToday,$endToday,"RAT");
	$data["SALE_OX_TOD"] = getSaleByTeam($startToday,$endToday,"OX");		
	$data["SALE_TIGER_TOD"] = getSaleByTeam($startToday,$endToday,"TIGER");
	$data["SALE_HARE_TOD"] = getSaleByTeam($startToday,$endToday,"HARE");
	$data["SALE_DRAGON_TOD"] = getSaleByTeam($startToday,$endToday,"DRAGON");
	$data["SALE_SNAKE_TOD"] = getSaleByTeam($startToday,$endToday,"SNAKE");
	$data["SALE_HORSE_TOD"] = getSaleByTeam($startToday,$endToday,"HORSE");
	$data["SALE_GOAT_TOD"] = getSaleByTeam($startToday,$endToday,"GOAT");
	*/

	/****************************/
	/** EXPIRE NORETURN ITEMS ***/
	/****************************/
	echo "EXPIRE NORETURNS ITEMS.\n";
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
	$sql = "SELECT DISTINCT TOP 5 PPSS_DELIVERED_EXPIRE,
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
	$req = $db->prepare($sql);
	$req->execute($params);
	$expireNR = $req->fetchAll(PDO::FETCH_ASSOC);
	//$data["EXPIRE_RET_ITEMS"] = $expireNR;		
	updateStats($indb,$today,"EXPIRE_RET_ITEMS",$expireNR);
	/****************************/
	/** EXPIRE NORETURN COUNT ***/
	/****************************/
	echo "EXPIRE NORETURNS COUNT.\n";
	$sql = "SELECT count(distinct PPSS_DELIVERED_EXPIRE) as CNT	
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
	$req = $db->prepare($sql);
	$req->execute($params);	
	//$data["EXPIRE_RET_CNT"] = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
	updateStats($indb,$today,"EXPIRE_RET_CNT",$req->fetch(PDO::FETCH_ASSOC)["CNT"],$forceRefresh);

	/****************************/
	/** EXPIRE RETURN ITEMS *****/
	/****************************/
	echo "EXPIRE RETURNS ITEMS.\n";
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
	$sql = "SELECT distinct TOP 5 PPSS_DELIVERED_EXPIRE,
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
	$req = $db->prepare($sql);
	$req->execute($params);
	//$data["EXPIRE_NR_ITEMS"] = $req->fetchAll(PDO::FETCH_ASSOC);
	updateStats($indb,$today,"EXPIRE_NR_ITEMS",$req->fetchAll(PDO::FETCH_ASSOC),$forceRefresh);
	/**********************************/
	/** EXPIRE RETURN  COUNT 	  *****/
	/**********************************/
	echo "EXPIRE RETURNS COUNT.\n";
	$sql = "SELECT 	count(distinct PPSS_DELIVERED_EXPIRE) as 'CNT'
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
	$req = $db->prepare($sql);	
	$req->execute($params);	
	//$data["EXPIRE_NR_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"EXPIRE_NR_CNT",$req->fetch(PDO::FETCH_ASSOC),$forceRefresh);	
	/*********************/
	/**** NEEDMOVE  ******/ 
	/*********************/
	echo "NEED MOVE ITEMS.\n";
	$sql = "SELECT TOP(5) PRODUCTNAME,PRODUCTID,COST,PRICE,
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
	FROM ICPRODUCT 
	WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
	AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	//$data["NEEDMOVE_ITEMS"] = $items;
	updateStats($indb,$today,"NEEDMOVE_ITEMS",$items);	
	 /*********************/
	/**** NEEDMOVE CNT ****/ 
	/*********************/
	echo "NEED MOVE COUNT.\n";
	$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
	FROM ICPRODUCT 
	WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
	AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
	$req = $db->prepare($sql);
	$req->execute(array());	
	//$data["NEEDMOVE_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"NEEDMOVE_CNT",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	/*********************/
	/**** NO LOCATION ****/ 
	/*********************/
	echo "NO LOCATION ITEMS.\n";
	$sql = "SELECT TOP(5)ICLOCATION.PRODUCTID,PRODUCTNAME 
			FROM ICLOCATION,ICPRODUCT 
			WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
			AND STORBIN IS NULL 
			AND LOCID = 'WH1'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$noclocitems = $req->fetchAll(PDO::FETCH_ASSOC);
	//$data["NOLOC_ITEMS"] = $noclocitems;
	updateStats($indb,$today,"NOLOC_ITEMS",$noclocitems,$forceRefresh);	
	/*************************/
	/**** NO LOCATION COUNT **/ 
	/*************************/
	echo "NO LOCATION COUNT.\n";
	$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
			FROM ICLOCATION			
			WHERE STORBIN IS NULL 
			AND LOCID = 'WH1'";
	$req = $db->prepare($sql);
	$req->execute(array());	
	//$data["NOLOC_ITEMS_CNT"] = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
	updateStats($indb,$today,"NOLOC_ITEMS_CNT",$req->fetch(PDO::FETCH_ASSOC)["CNT"],$forceRefresh);	
	 /***************************/
	/**** NEGATIVE ITEM WH1 ****/
	/***************************/
	echo "NEGATIVE ITEM WH1.\n";
	$sql = "SELECT TOP(5) ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME 
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1' AND LOCONHAND < 0"; 
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	//$data["NEGATIVEITEM_WH1_ITEMS"] = $items;
	updateStats($indb,$today,"NEGATIVEITEM_WH1_ITEMS",$items,$forceRefresh);	
	/*********************************/
	/**** NEGATIVE ITEM WH1 COUNT ****/
	/*********************************/
	echo "NEGATIVE ITEM WH1 COUNT.\n";
	$sql = "SELECT count(*) as 'CNT' FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND < 0"; 
	$req = $db->prepare($sql);
	$req->execute(array());	
	//$data["NEGATIVEITEM_WH1_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"NEGATIVEITEM_WH1_CNT",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
    /***************************/
	/**** NEGATIVE ITEM WH2 ****/
	/***************************/
	echo "NEGATIVE ITEM WH2\n";
	$sql = "SELECT TOP(5) ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME 
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    //$data["NEGATIVEITEM_WH2_ITEMS"] = $items;
	updateStats($indb,$today,"NEGATIVEITEM_WH2_ITEMS",$items,$forceRefresh);	
    /*********************************/
    /**** NEGATIVE ITEM WH2 COUNT ****/
    /*********************************/
	echo "NEGATIVE ITEM WH2\n";
    $sql = "SELECT count(*) as 'CNT' FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $count = $req->fetch(PDO::FETCH_ASSOC);
    //$data["NEGATIVEITEM_WH2_CNT"] = $count['CNT'];
	updateStats($indb,$today,"NEGATIVEITEM_WH2_CNT",$count['CNT'],$forceRefresh);	
	/***********************/
	/**** UNSOLD 30 ****/
	/***********************/
	echo "UNSOLD 30\n";
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
	//$data["UNSOLD30_ITEMS"] = $items;
	updateStats($indb,$today,"UNSOLD30_ITEMS",$items,$forceRefresh);	
	/***********************/
	/**** UNSOLD 30 CNT ****/
	/***********************/
	echo "UNSOLD 30\n";
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
	//$data["UNSOLD30_ITEMS_CNT"] = $items;
	updateStats($indb,$today,"UNSOLD30_ITEMS_CNT",$items,$forceRefresh);	
	/*****************************/
    // TOTAL PO RECEIVED TODAY //
    /*****************************/
	echo "TOTAL PO RECEIVED TODAY\n";
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["PORECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"PORECEIVED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
    /*****************************/
    // TOTAL ITEM RECEIVED TODAY //
    /*****************************/
	echo "TOTAL ITEM RECEIVED TODAY\n";
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["NBITEMRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"NBITEMRECEIVED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
    //********************************//
    // TOTAL ITEM QTY RECEIVED TODAY  //
    //********************************//
	echo "TOTAL ITEM QTY RECEIVED TODAY\n";
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["ITEMQTYRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"ITEMQTYRECEIVED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
    //*****************************//
    //****   PO CREATED TODAY  ****//
    //*****************************//
	echo "PO CREATED TODAY\n";
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["POCREATED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"POCREATED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
    //***********************************//
    //****   TOTAL ITEMS IN PO TODAY ****//
    //***********************************//
	echo "TOTAL ITEMS IN PO TODAY\n";
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["NBITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"NBITEMORDERED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	//***********************************************//
    //****   TOTAL ITEMS ORDERED QTY IN PO TODAY ****//
    //**********************************************//
	echo "TOTAL ITEMS ORDERED QTY IN PO TODAY\n";
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["QTYITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
    updateStats($indb,$today,"QTYITEMORDERED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	//*******************************************//
    //**********    ANOMALIES COUNT    **********//
    //*******************************************//
	echo "ANOMALIES COUNT\n";
	$sql = "SELECT count(*) as 'CNT' FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED'";
	$req = $indb->prepare($sql);
	$req->execute(array());
	//$data["ANOMALIES_CNT_NOW"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"ANOMALIES_CNT_NOW",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	//*******************************************//
    //********	ANOMALIES ITEMS   ***************//
    //*******************************************//
	echo "ANOMALIES ITEMS\n";
	$sql = "SELECT PONUMBER FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED' limit 5";
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
	//$data["ANOMALIES_ITEMS_NOW"] = $anomalyData;
	updateStats($indb,$today,"ANOMALIES_ITEMS_NOW",$anomalyData,$forceRefresh);	
	//*******************************************//
    //********	ANOMALIES ITEMS COUNT ***********//
    //*******************************************//
	echo "ANOMALIES ITEMS CNT\n";
	$sql = "SELECT PONUMBER FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED'";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$anomalies = $req->fetchAll(PDO::FETCH_ASSOC);
	$anomalyData = array();
	$sumQty = 0;
	foreach($anomalies as $anomaly){

		$sql = "SELECT count(PRODUCTID) as 'CNT' 
				FROM PODETAIL 
				WHERE PONUMBER = ? 
				AND PPSS_WAITING_CALCULATED <> PPSS_WAITING_QUANTITY";
		$req = $db->prepare($sql);
		$req->execute(array($anomaly["PONUMBER"]));		
		$sumQty += $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	}
	//$data["ANOMALIES_ITEMS_NOW_CNT"] = $sumQty;
	updateStats($indb,$today,"ANOMALIES_ITEMS_NOW_CNT",$sumQty,$forceRefresh);	

	//*******************************************//
    //**** PRICE DIFFERENCES TODAY 		*********//
    //*******************************************//
	echo "PRICE DIFFERENCES TODAY\n";
    $sql = "SELECT TOP(5) PRODUCTID,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["PRICEDIFFERENCES_ITEMS_TOD"] = $req->fetchAll(PDO::FETCH_ASSOC);
	updateStats($indb,$today,"PRICEDIFFERENCES_ITEMS_TOD",$req->fetchAll(PDO::FETCH_ASSOC),$forceRefresh);	

	$sql = "SELECT COUNT(PRODUCTID) as 'CNT'  FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));
    //$data["PRICEDIFFERENCES_ITEMS_TOD_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
	updateStats($indb,$today,"PRICEDIFFERENCES_ITEMS_TOD_CNT",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	

	/*	
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
	NBITEMORDERED_TOD = ?,QTYITEMORDERED_TOD = ?,ANOMALIES_CNT_NOW = ?,ANOMALIES_ITEMS_NOW = ?,PRICEDIFFERENCES_ITEMS_TOD = ?,
	PRICEDIFFERENCES_ITEMS_TOD_CNT = ?
	WHERE DAY = ?";

	$params = array(
		$data["TRAFFIC_TOD"], $data["AVGBASKET_TOD"], $data["WASTE_SUM_TOD"], json_encode($data["WASTE_ITEMS_TOD"],true) , $data["RETURN_NBITEM_TOD"], 
		$data["RETURN_SUMITEM_TOD"], $data["RETURN_AMOUNT_TOD"], json_encode($data["TRF_ALL_TOD"],true), json_encode($data["TRF_RAT_TOD"],true), json_encode($data["TRF_OX_TOD"],true), 
		json_encode($data["TRF_TIGER_TOD"],true), json_encode($data["TRF_HARE_TOD"],true), json_encode($data["TRF_DRAGON_TOD"],true), json_encode($data["TRF_SNAKE_TOD"],true), json_encode($data["TRF_HORSE_TOD"],true), 
		json_encode($data["TRF_GOAT_TOD"],true), json_encode($data["OCC_ALL_TOD"],true), json_encode($data["OCC_RAT_TOD"],true), json_encode($data["OCC_OX_TOD"],true), json_encode($data["OCC_TIGER_TOD"],true), 
		json_encode($data["OCC_HARE_TOD"],true), json_encode($data["OCC_DRAGON_TOD"],true), json_encode($data["OCC_SNAKE_TOD"],true), json_encode($data["OCC_HORSE_TOD"],true), json_encode($data["OCC_GOAT_TOD"],true), 
		json_encode($data["SALE_RAT_TOD"],true), json_encode($data["SALE_OX_TOD"],true), json_encode($data["SALE_TIGER_TOD"],true), json_encode($data["SALE_HARE_TOD"],true), json_encode($data["SALE_DRAGON_TOD"],true), 
		json_encode($data["SALE_SNAKE_TOD"],true), json_encode($data["SALE_HORSE_TOD"],true), json_encode($data["SALE_GOAT_TOD"],true), json_encode($data["EXPIRE_RET_ITEMS"],true), json_encode($data["EXPIRE_RET_CNT"],true), 
		json_encode($data["EXPIRE_NR_ITEMS"],true), json_encode($data["EXPIRE_NR_CNT"],true), json_encode($data["NEEDMOVE_ITEMS"],true), $data["NEEDMOVE_CNT"], json_encode($data["NOLOC_ITEMS"],true), 
		$data["NOLOC_ITEMS_CNT"], json_encode($data["NEGATIVEITEM_WH1_ITEMS"],true), $data["NEGATIVEITEM_WH1_CNT"], json_encode($data["NEGATIVEITEM_WH2_ITEMS"],true), $data["NEGATIVEITEM_WH2_CNT"], 
		json_encode($data["UNSOLD30_ITEMS"],true), $data["PORECEIVED_TOD"], $data["NBITEMRECEIVED_TOD"], $data["ITEMQTYRECEIVED_TOD"], $data["POCREATED_TOD"], 
		$data["NBITEMORDERED_TOD"], $data["QTYITEMORDERED_TOD"], $data["ANOMALIES_CNT_NOW"], json_encode($data["ANOMALIES_ITEMS_NOW"],true), json_encode($data["PRICEDIFFERENCES_ITEMS_TOD"],true), 
		$data["PRICEDIFFERENCES_ITEMS_TOD_CNT"],
		$today
	);	
	$req = $indb->prepare($sql);
	try{
		$req->execute($params);
	}catch(Exception $ex){
		error_log($ex);
	}
    */

}


function GenerateYesterdayFromCache()
{
	echo "YESTERDAY FROM CACHE\n";
	$indb = getInternalDatabase();
	$today = date('m/d/Y');
	$yesterday = date('d/m/Y',strtotime("-1 days"));
	
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($yesterday));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($yesterday));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res == false){
			$sql = "INSERT INTO GENERATEDSTATS (DAY) VALUES (?)";
			$req = $indb->prepare($sql);
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
				PRICEDIFFERENCES_ITEMS_YES = ?,PRICEDIFFERENCES_ITEMS_YES_CNT WHERE DAY = ?
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
			$res["PRICEDIFFERENCES_ITEMS_TOD"],$res["PRICEDIFFERENCES_ITEMS_TOD_CNT"],$today
		);
		$req = $indb->prepare($sql);
		$req->execute($params);
	}

}



function GenerateYesterday()
{
	echo "YESTERDAY\n";
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
	echo "TRAFIC & AVG BASKET YESTERDAY";			
	$sql = "SELECT  count([POSDATE]) as 'NB', sum([PAID_AMT]) as 'SUM'
	FROM POSCASH
	WHERE POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($startYesterday,$endYesterday));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$data["TRAFFIC_YES"] = $res["NB"];
	$data["AVGBASKET_YES"] = $res["SUM"] / ($res["NB"] != 0 ? $res["NB"] : 1);	
			
	/*******************************************/
	//*******   ITEM WASTED YESTERDAY	********/
	/*******************************************/
	echo "ITEM WASTED YESTERDAY";
	$sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($startYesterday,$endYesterday));
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
	echo "RETURNED YESTERDAY\n";
	$sql = "SELECT * FROM RETURNRECORD WHERE  CREATED BETWEEN ? AND ? AND STATUS = 'CLEARED'";
	$req = $indb->prepare($sql);
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
	echo "TRANSFER YESTERDAY\n";
	$data["TRF_ALL_YES"] = TransferByTeam("ALL",$startYesterday,$startYesterday);
	$data["TRF_RAT_YES"] = TransferByTeam("RAT",$startYesterday,$startYesterday);
	$data["TRF_OX_YES"] = TransferByTeam("OX",$startYesterday,$startYesterday);
	$data["TRF_TIGER_YES"] = TransferByTeam("TIGER",$startYesterday,$startYesterday);
	$data["TRF_HARE_YES"] = TransferByTeam("HARE",$startYesterday,$startYesterday);
	$data["TRF_DRAGON_YES"] = TransferByTeam("DRAGON",$startYesterday,$startYesterday);
	$data["TRF_SNAKE_YES"] = TransferByTeam("SNAKE",$startYesterday,$startYesterday);
	$data["TRF_HORSE_YES"] = TransferByTeam("HORSE",$startYesterday,$startYesterday);
	$data["TRF_GOAT_YES"] = TransferByTeam("GOAT",$startYesterday,$startYesterday);

	/*************************************************/
	/**** TOTAL OCCUPANCY ITEMS YESTERDAY ******/
	/*************************************************/
	echo "TOTAL OCCUPANCY ITEMS YESTERDAY\n";
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
	echo "SALE YESTERDAY\n";
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
	echo "TOTAL PO RECEIVED YESTERDAY\n";
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["PORECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
    
    //*******************************//
    // TOTAL ITEM RECEIVED YESTERDAY //
    //*******************************//
	echo "TOTAL ITEM RECEIVED YESTERDAY\n";
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["NBITEMRECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    //*******************************//
    // TOTAL ITEM QTY RECEIVED YESTERDAY //
    //*******************************//
	echo "TOTAL ITEM QTY RECEIVED YESTERDAY\n";
     $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["ITEMQTYRECEIVED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    // PCH //    
    //*********************************//
    //****   PO CREATED YESTERDAY  ****//
    //*********************************//
	echo "PO CREATED YESTERDAY\n";
    $sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["POCREATED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];

    //************************************//
    //*** TOTAL ITEMS IN PO YESTERDAY ****//
    //************************************//
	echo "TOTAL ITEMS IN PO YESTERDAY\n";
    $sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["NBITEMORDERED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];   
  
    //*******************************************//
    //****TOTAL ITEMS ORDERED QTY  YESTERDAY ****//
    //*******************************************//
	echo "TOTAL ITEMS ORDERED QTY YESTERDAY\n";
    $sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["QTYITEMORDERED_YES"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];


	//*******************************************//
    //**** PRICE DIFFERENCES YESTERDAY 	     ****//
    //*******************************************//
	echo "PRICE DIFFERENCES YESTERDAY\n";
    $sql = "SELECT TOP(5) PRODUCTID,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["PRICEDIFFERENCES_ITEMS_YES"] = $req->fetchAll(PDO::FETCH_ASSOC);

	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ? AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
    $req = $db->prepare($sql);
    $req->execute(array($startYesterday,$endYesterday));
    $data["PRICEDIFFERENCES_ITEMS_YES_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];


	$sql = "UPDATE GENERATEDSTATS SET 
	TRAFFIC_YES = ?,AVGBASKET_YES = ?, WASTE_NBITEMS_YES = ?, WASTE_SUM_YES = ?,WASTE_ITEMS_YES = ?,
	RETURN_NBITEM_YES = ?,RETURN_SUMITEM_YES = ?,RETURN_AMOUNT_YES = ?,TRF_ALL_YES = ?,TRF_RAT_YES = ?,
	TRF_OX_YES = ?,TRF_TIGER_YES = ?,TRF_HARE_YES = ?,TRF_DRAGON_YES = ?,TRF_SNAKE_YES = ?,
	TRF_HORSE_YES = ?,TRF_GOAT_YES = ?,OCC_ALL_YES = ?,OCC_RAT_YES = ?,OCC_OX_YES = ?,
	OCC_TIGER_YES = ?,OCC_HARE_YES = ?,OCC_DRAGON_YES = ?,OCC_SNAKE_YES = ?,OCC_HORSE_YES = ?,
	OCC_GOAT_YES = ?,SALE_RAT_YES = ?,SALE_OX_YES = ?,SALE_TIGER_YES = ?,SALE_HARE_YES = ?,
	SALE_DRAGON_YES = ?,SALE_SNAKE_YES = ?,SALE_HORSE_YES = ?,SALE_GOAT_YES = ?,PORECEIVED_YES = ?,
	NBITEMRECEIVED_YES = ?,ITEMQTYRECEIVED_YES = ?,POCREATED_YES = ?,NBITEMORDERED_YES = ?,QTYITEMORDERED_YES = ?,
	PRICEDIFFERENCES_ITEMS_YES = ?,PRICEDIFFERENCES_ITEMS_YES_CNT = ? 
	WHERE DAY = ?
	";

	$sql1 = "UPDATE GENERATEDSTATS SET 
	TRAFFIC_YES = ?,AVGBASKET_YES = ?, WASTE_NBITEMS_YES = ?, WASTE_SUM_YES = ?,WASTE_ITEMS_YES = ?,
	RETURN_NBITEM_YES = ?,RETURN_SUMITEM_YES = ?,RETURN_AMOUNT_YES = ?,TRF_ALL_YES = ?,TRF_RAT_YES = ?,
	TRF_OX_YES = ?,TRF_TIGER_YES = ?,TRF_HARE_YES = ?,TRF_DRAGON_YES = ?,TRF_SNAKE_YES = ?
	WHERE DAY = ?
	";

	$sql2 = "UPDATE GENERATEDSTATS SET 
	TRF_HORSE_YES = ?,TRF_GOAT_YES = ?,OCC_ALL_YES = ?,OCC_RAT_YES = ?,OCC_OX_YES = ?,
	OCC_TIGER_YES = ?,OCC_HARE_YES = ?,OCC_DRAGON_YES = ?,OCC_SNAKE_YES = ?,OCC_HORSE_YES = ?	
	WHERE DAY = ?
	";

	$sql3 = "UPDATE GENERATEDSTATS SET 	
	OCC_GOAT_YES = ?,SALE_RAT_YES = ?,SALE_OX_YES = ?,SALE_TIGER_YES = ?,SALE_HARE_YES = ?,
	SALE_DRAGON_YES = ?,SALE_SNAKE_YES = ?,SALE_HORSE_YES = ?,SALE_GOAT_YES = ?,PORECEIVED_YES = ?,	
	WHERE DAY = ?
	";

	$sql4 = "UPDATE GENERATEDSTATS SET 		
	NBITEMRECEIVED_YES = ?,ITEMQTYRECEIVED_YES = ?,POCREATED_YES = ?,NBITEMORDERED_YES = ?,QTYITEMORDERED_YES = ?,
	PRICEDIFFERENCES_ITEMS_YES = ?,PRICEDIFFERENCES_ITEMS_YES_CNT = ? 
	WHERE DAY = ?
	";

	// NEED TO TO IN TWO TIMES, OTHERWISE DATABASE IS LOCKED
	$params1 = array(
	$data["TRAFFIC_YES"],$data["AVGBASKET_YES"],$data["WASTE_NBITEMS_YES"],$data["WASTE_SUM_YES"],json_encode($data["WASTE_ITEMS_YES"],true),
	$data["RETURN_NBITEM_YES"],$data["RETURN_SUMITEM_YES"],$data["RETURN_AMOUNT_YES"],json_encode($data["TRF_ALL_YES"],true),json_encode($data["TRF_RAT_YES"],true),
	json_encode($data["TRF_OX_YES"],true),json_encode($data["TRF_TIGER_YES"],true),json_encode($data["TRF_HARE_YES"],true),json_encode($data["TRF_DRAGON_YES"],true),json_encode($data["TRF_SNAKE_YES"],true),	
	$today);	

	$params2 = array(		
	json_encode($data["TRF_HORSE_YES"],true),json_encode($data["TRF_GOAT_YES"],true),json_encode($data["OCC_ALL_YES"],true),json_encode($data["OCC_RAT_YES"],true),json_encode($data["OCC_OX_YES"],true),
	json_encode($data["OCC_TIGER_YES"],true),json_encode($data["OCC_HARE_YES"],true),json_encode($data["OCC_DRAGON_YES"],true),json_encode($data["OCC_SNAKE_YES"],true),json_encode($data["OCC_HORSE_YES"],true),
	$today);	

	$params3 = array(	
	json_encode($data["OCC_GOAT_YES"],true),json_encode($data["SALE_RAT_YES"],true),json_encode($data["SALE_OX_YES"],true),json_encode($data["SALE_TIGER_YES"],true),json_encode($data["SALE_HARE_YES"],true),
	json_encode($data["SALE_DRAGON_YES"],true),json_encode($data["SALE_SNAKE_YES"],true),json_encode($data["SALE_HORSE_YES"],true),json_encode($data["SALE_GOAT_YES"],true),$data["PORECEIVED_YES"],	
	$today);	

	$params4 = array(	
	$data["NBITEMRECEIVED_YES"],$data["ITEMQTYRECEIVED_YES"],$data["POCREATED_YES"],$data["NBITEMORDERED_YES"],$data["QTYITEMORDERED_YES"],
	json_encode($data["PRICEDIFFERENCES_ITEMS_YES"],true),"PRICEDIFFERENCES_ITEMS_YES_CNT",
	$today);	

	echo "SQL1...\n";
	var_dump($params1);
	$req1 = $indb->prepare($sql1);
	$req1->execute($params1);
	sleep(5);
	/*
	echo "SQL2...\n";
	$req2 = $indb->prepare($sql2);
	$req2->execute($params2);
	sleep(5);
	echo "SQL3...\n";
	$req3 = $indb->prepare($sql3);
	$req3->execute($params3);
	sleep(5);
	echo "SQL4...\n";
	$req4 = $indb->prepare($sql4);
	$req4->execute($params4);
	*/

	/*
	$params = array(
	$data["TRAFFIC_YES"],$data["AVGBASKET_YES"],$data["WASTE_NBITEMS_YES"],$data["WASTE_SUM_YES"],json_encode($data["WASTE_ITEMS_YES"],true),
	$data["RETURN_NBITEM_YES"],$data["RETURN_SUMITEM_YES"],$data["RETURN_AMOUNT_YES"],json_encode($data["TRF_ALL_YES"],true),json_encode($data["TRF_RAT_YES"],true),
	json_encode($data["TRF_OX_YES"],true),json_encode($data["TRF_TIGER_YES"],true),json_encode($data["TRF_HARE_YES"],true),json_encode($data["TRF_DRAGON_YES"],true),json_encode($data["TRF_SNAKE_YES"],true),
	json_encode($data["TRF_HORSE_YES"],true),json_encode($data["TRF_GOAT_YES"],true),json_encode($data["OCC_ALL_YES"],true),json_encode($data["OCC_RAT_YES"],true),json_encode($data["OCC_OX_YES"],true),
	json_encode($data["OCC_TIGER_YES"],true),json_encode($data["OCC_HARE_YES"],true),json_encode($data["OCC_DRAGON_YES"],true),json_encode($data["OCC_SNAKE_YES"],true),json_encode($data["OCC_HORSE_YES"],true),
	json_encode($data["OCC_GOAT_YES"],true),json_encode($data["SALE_RAT_YES"],true),json_encode($data["SALE_OX_YES"],true),json_encode($data["SALE_TIGER_YES"],true),json_encode($data["SALE_HARE_YES"],true),
	json_encode($data["SALE_DRAGON_YES"],true),json_encode($data["SALE_SNAKE_YES"],true),json_encode($data["SALE_HORSE_YES"],true),json_encode($data["SALE_GOAT_YES"],true),$data["PORECEIVED_YES"],
	$data["NBITEMRECEIVED_YES"],$data["ITEMQTYRECEIVED_YES"],$data["POCREATED_YES"],$data["NBITEMORDERED_YES"],$data["QTYITEMORDERED_YES"],
	json_encode($data["PRICEDIFFERENCES_ITEMS_YES"],true),"PRICEDIFFERENCES_ITEMS_YES_CNT",$today);	
	$req = $indb->prepare($sql);
	$req->execute($params);
	*/
}



Generate();





?>