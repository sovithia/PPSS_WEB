<?php

require_once("functions.php");



function OccupancyByTeamCount($db,$team)
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

	$sqlCount = "select sum(DATEDIFF(day,LASTRECEIVE,GETDATE())) as 'CNT'
	FROM ICLOCATION
	WHERE LOCID = 'WH1' 
	AND LOCONHAND > 0
	AND DATEDIFF(day,LASTRECEIVE,GETDATE()) > 30 ";
	
	$params = array();
	if ($team != "ALL"){
		$locs = explode('|',$allloc);
		$sqlCount .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";		

		foreach($locs as $loc){
			$sqlCount .= ' STORBIN LIKE ? OR';			
			array_push($params, '%'.$loc.'%' );
		}
		$sqlCount = substr($sqlCount,0,-2);
		$sqlCount .= "))";					
	}else{		
	}
	
	$req1 = $db->prepare($sqlCount);
	$req1->execute($params);
	$count = $req1->fetch(PDO::FETCH_ASSOC)["CNT"];
	
	$data = array();	
	return $count;
}

function TransferByTeam($indb,$team,$day)
{
	$start = $day." 00:00:00.000";
	$end = $day. "23:59:59.999";
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

	$params = array();
	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER'";
	if ($team != "ALL")
	{
		$sql .= " AND (";
		$locs = explode('|',$allloc);		
		foreach($locs as $loc){
			$sql .= " ARG1 = ? OR";		
			array_push($params, $loc);
		}
		$sql = substr($sql,0,-2);
		$sql .= ")";
	}
					
	$sqlToday = $sql. " AND REQUEST_UPDATED BETWEEN ? AND ?";	
	$req1 = $indb->prepare($sqlToday);
	array_push($params,$start,$end);
	$req1->execute($params);	
	$items = $req1->fetchAll(PDO::FETCH_ASSOC);		

	$nbItems = 0;
	$qtyItems = 0;
	foreach($items as $item){
		$sql = "SELECT count(*) as CNT,sum(REQUEST_QUANTITY) as SUM FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($item["ID"]));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$nbItems += $data["CNT"];
		$qtyItems += $data["SUM"];
	}	
	$data = array();
	$data["NBITEM"] = $nbItems;
	$data["QUANTITY"] = $qtyItems;
	return $data;
}

function getSaleByTeamCount($start,$end,$team)
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

	$sql = "SELECT count(POSDETAIL.PRODUCTID) as 'CNT'	
			FROM dbo.POSDETAIL WHERE 1=1 ";	
	$params = array();
		
	$locs = explode('|',$allloc);
	$sql .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
	
	foreach($locs as $loc){
		$sql .= ' STORBIN LIKE ? OR';
		array_push($params, '%'.$loc.'%' );
	}
	$sql = substr($sql,0,-2);
	$sql .= "))";		
	
	$sql .= "
	AND POSDATE BETWEEN ? AND ?	
	";
	array_push($params,$start);
	array_push($params,$end);

	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetch(PDO::FETCH_ASSOC);
	return $items["CNT"];
}

function Generate()
{
	$db = getDatabase();
	$indb = getInternalDatabase();
	$statsdb = getInternalDatabase("STATS");
	$today = date('Y-m-d');	

	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $statsdb->prepare($sql);
	$req->execute(array($today));
	$data = $req->fetch(PDO::FETCH_ASSOC);

	if ($data == false){ // EMPTY DAY 
		$sql = "INSERT INTO GENERATEDSTATS (DAY) VALUES (?)";
		$req = $statsdb->prepare($sql);
		$req->execute(array($today));

		$sql = "SELECT COUNT(*) as 'CNT' FROM GENERATEDSTATS";
		$req = $statsdb->prepare($sql);
		$req->execute(array());
		$count = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		if ($count == 0){ // FIRST INSERT				
			GenerateBlankYesterday($statsdb);
			GenerateToday($db,$indb,$statsdb,false);
		}else{			
			GenerateYesterdayFromCache($statsdb);
			GenerateToday($db,$indb,$statsdb,false);
		}
	}
	else{ // DAY REFRESH		
		GenerateToday($db,$indb,$statsdb,true);		
	}
	
}

function fieldIsNull($db,$key,$day){
	$sql = "SELECT ".$key." FROM GENERATEDSTATS WHERE DAY = ?";	
	$req = $db->prepare($sql);
	$req->execute(array($day));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false)
		return ($res[$key] == null);
	else{
		echo $key." not found";	
		exit;	
	}
}

function updateStats($db,$day,$key,$value){
	
	echo "UPDATE ".$key."\n";
	$sql = "UPDATE GENERATEDSTATS SET ".$key." = ?";
	$req = $db->prepare($sql);		
	try{
		if (is_array($value))
		$req->execute(array(json_encode($value,true)));
	else
		$req->execute(array($value));	
	sleep(1);		
	}catch(Exception $ex){
		var_dump($ex);
		sleep(10);
	}
	
}


function GenerateToday($db,$indb,$statsdb,$forceRefresh)
{	
	$today = date('Y-m-d');	
	$startToday = $today." 00:00:00.000";
	$endToday = $today." 23:59:59.999";		
	$data = array();
	echo "TODAY\n";
	
	/*******************************************/
	//*******   ITEM WASTED  TODAY		********/
	/*******************************************/	
	echo "ITEM WASTED TODAY.\n";
	if ( (fieldIsNull($statsdb,"WASTE_QTY_TOD",$today) && fieldIsNull($statsdb,"WASTE_NBITEMS_TOD",$today)) && fieldIsNull($statsdb,"WASTE_SUM_TOD",$today) || $forceRefresh == true){
		$sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?";
		$req = $indb->prepare($sql);
		$req->execute(array($startToday,$endToday));
		$wasteditems = $req->fetchAll(PDO::FETCH_ASSOC);
		$allwasteitems = array();
		
		$totalQty = 0;
		$totalSum = 0;
		foreach($wasteditems as $wasteditem){			
			$sql = "SELECT PRODUCTNAME,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($wasteditem["PRODUCTID"]));
			$oneitemData = $req->fetch(PDO::FETCH_ASSOC);

			$totalQty += $wasteditem["QUANTITY"];
			$totalSum += $wasteditem["QUANTITY"] * $oneitemData["COST"];
			
		}
		
		updateStats($statsdb,$today,"WASTE_QTY_TOD",$totalQty);
		updateStats($statsdb,$today,"WASTE_NBITEMS_TOD",count($wasteditems));
		updateStats($statsdb,$today,"WASTE_SUM_TOD",round($totalSum,2));		
	}
	/*******************************************/
	//*******   RETURNED TODAY			********/
	/*******************************************/
	echo "RETURNED TODAY.\n";
	if ((fieldIsNull($statsdb,"RETURN_NBITEM_TOD",$today) && fieldIsNull($statsdb,"RETURN_SUMITEM_TOD",$today) && fieldIsNull($statsdb,"RETURN_AMOUNT_TOD",$today)) || $forceRefresh == true )
	{
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
		updateStats($statsdb,$today,"RETURN_NBITEM_TOD",$nbitemReturned);
		updateStats($statsdb,$today,"RETURN_SUMITEM_TOD",$sumitemReturned);
		updateStats($statsdb,$today,"RETURN_AMOUNT_TOD",$amountItemReturned);
	}	
	/*******************************************/
	/****			TRANSFER TODAY			****/
	/*******************************************/
	echo "TRANSFER TODAY.\n";
	if (fieldIsNull($statsdb,"TRF_ALL_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_ALL_TOD",TransferByTeam($indb,"ALL",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_RAT_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_RAT_TOD",TransferByTeam($indb,"RAT",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_OX_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_OX_TOD",TransferByTeam($indb,"OX",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_TIGER_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_TIGER_TOD",TransferByTeam($indb,"TIGER",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_HARE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_HARE_TOD",TransferByTeam($indb,"HARE",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_DRAGON_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_DRAGON_TOD",TransferByTeam($indb,"DRAGON",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_SNAKE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_SNAKE_TOD",TransferByTeam($indb,"SNAKE",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_HORSE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_HORSE_TOD",TransferByTeam($indb,"HORSE",date('Y-m-d')));
	if (fieldIsNull($statsdb,"TRF_GOAT_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"TRF_GOAT_TOD",TransferByTeam($indb,"GOAT",date('Y-m-d')));

	/*******************************************/
	/**** TOTAL OCCUPANCY ITEMS NOW ******/
	/*******************************************/
	echo "OCCUPANCY TODAY.\n";
	if (fieldIsNull($statsdb,"OCC_ALL_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_ALL_TOD",OccupancyByTeamCount($db,"ALL"));
	if 	(fieldIsNull($statsdb,"OCC_RAT_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_RAT_TOD",OccupancyByTeamCount($db,"RAT"));
	if (fieldIsNull($statsdb,"OCC_OX_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"OCC_OX_TOD",OccupancyByTeamCount($db,"OX"));
	if (fieldIsNull($statsdb,"OCC_TIGER_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"OCC_TIGER_TOD",OccupancyByTeamCount($db,"TIGER"));
	if (fieldIsNull($statsdb,"OCC_HARE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_HARE_TOD",OccupancyByTeamCount($db,"HARE"));
	if (fieldIsNull($statsdb,"OCC_DRAGON_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_DRAGON_TOD",OccupancyByTeamCount($db,"DRAGON"));
	if (fieldIsNull($statsdb,"OCC_SNAKE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_SNAKE_TOD",OccupancyByTeamCount($db,"SNAKE"));
	if (fieldIsNull($statsdb,"OCC_HORSE_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_HORSE_TOD",OccupancyByTeamCount($db,"HORSE"));
	if (fieldIsNull($statsdb,"OCC_GOAT_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"OCC_GOAT_TOD",OccupancyByTeamCount($db,"GOAT"));

	/***********************/
	/**** SALE TODAY    ****/
	/***********************/
	echo "SALE TODAY.\n";
	if (fieldIsNull($statsdb,"SALE_RAT_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"SALE_RAT_TOD",getSaleByTeamCount($startToday,$endToday,"RAT"));
	if (fieldIsNull($statsdb,"SALE_OX_TOD",$today) || $forceRefresh == true)
		updateStats($statsdb,$today,"SALE_OX_TOD",getSaleByTeamCount($startToday,$endToday,"OX"));
	if (fieldIsNull($statsdb,"SALE_TIGER_TOD",$today) || $forceRefresh == true)			
		updateStats($statsdb,$today,"SALE_TIGER_TOD",getSaleByTeamCount($startToday,$endToday,"TIGER"));
	if (fieldIsNull($statsdb,"SALE_HARE_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"SALE_HARE_TOD",getSaleByTeamCount($startToday,$endToday,"HARE"));
	if (fieldIsNull($statsdb,"SALE_DRAGON_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"SALE_DRAGON_TOD",getSaleByTeamCount($startToday,$endToday,"DRAGON"));
	if (fieldIsNull($statsdb,"SALE_SNAKE_TOD",$today) || $forceRefresh == true)		
		updateStats($statsdb,$today,"SALE_SNAKE_TOD",getSaleByTeamCount($startToday,$endToday,"SNAKE"));
	if (fieldIsNull($statsdb,"SALE_HORSE_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"SALE_HORSE_TOD",getSaleByTeamCount($startToday,$endToday,"HORSE"));
	if (fieldIsNull($statsdb,"SALE_GOAT_TOD",$today) || $forceRefresh == true)	
		updateStats($statsdb,$today,"SALE_GOAT_TOD",getSaleByTeamCount($startToday,$endToday,"GOAT"));

	/*******************************************/
	//***   TRAFIC & AVG BASKET TODAY		****/
	/*******************************************/	
	
	echo "TRAFFIC AND AVERAGE BASKET TODAY.\n";
	if ( (fieldIsNull($statsdb,"TRAFFIC_TOD",$today) && fieldIsNull($statsdb,"AVGBASKET_TOD",$today)) || $forceRefresh == true){
		$sql = "SELECT  count([POSDATE]) as 'NB', sum([PAID_AMT]) as 'SUM'
		FROM POSCASH
		WHERE POSDATE BETWEEN ? AND ?";
		$req = $db->prepare($sql);
		$req->execute(array($startToday,$endToday));
		$res = $req->fetch(PDO::FETCH_ASSOC);		
		$divider = intval($res["NB"]) != 0 ? $res["NB"] : 1;
		updateStats($statsdb,$today,"TRAFFIC_TOD",$res["NB"],$forceRefresh);
		updateStats($statsdb,$today,"AVGBASKET_TOD",round($res["SUM"] / $divider,2),$forceRefresh);
	}

	/****************************/
	/** EXPIRE NORETURN COUNT ***/
	/****************************/
	echo "EXPIRE NORETURNS COUNT.\n";
	if (fieldIsNull($statsdb,"EXPIRE_RET_CNT_TOD",$today) || $forceRefresh == true) {	
		$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'NORETURN' AND CREATED > DATETIME('now', '-12 month')";
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
		$req->execute(array());	
		//$data["EXPIRE_RET_CNT"] = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
		updateStats($statsdb,$today,"EXPIRE_RET_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)["CNT"],$forceRefresh);
	}	
	
	/*****************************/
	/** EXPIRE RETURN  COUNT *****/
	/*****************************/
	echo "EXPIRE RETURNS COUNT.\n";
	if (fieldIsNull($statsdb,"EXPIRE_NR_CNT_TOD",$today) || $forceRefresh == true) { 	
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
		$req->execute(array());	
		//$data["EXPIRE_NR_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"EXPIRE_NR_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	}
	
	/*********************/
	/**** NEEDMOVE CNT ***/ 
	/*********************/
	echo "NEED MOVE COUNT.\n";
	if (fieldIsNull($statsdb,"NEEDMOVE_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
		FROM ICPRODUCT 
		WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
		AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
		$req = $db->prepare($sql);
		$req->execute(array());	
		//$data["NEEDMOVE_CNT"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"NEEDMOVE_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	}
	
	/*************************/
	/**** NO LOCATION COUNT **/ 
	/*************************/
	echo "NO LOCATION COUNT.\n";
	if (fieldIsNull($statsdb,"NOLOC_ITEMS_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT COUNT(PRODUCTID) as 'CNT'
				FROM ICLOCATION			
				WHERE STORBIN IS NULL 
				AND LOCID = 'WH1'";
		$req = $db->prepare($sql);
		$req->execute(array());			
		updateStats($statsdb,$today,"NOLOC_ITEMS_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)["CNT"]);	
	}
	
	/*********************************/
	/**** NEGATIVE ITEM WH1 COUNT ****/
	/*********************************/
	echo "NEGATIVE ITEM WH1 COUNT.\n";
	if (fieldIsNull($statsdb,"NEGATIVEITEM_WH1_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT count(*) as 'CNT' 
				FROM ICLOCATION,ICPRODUCT 
				WHERE LOCID = 'WH1'
				AND ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
				AND PPSS_IS_FRESH IS NULL
				AND LOCONHAND < 0"; 
		$req = $db->prepare($sql);
		$req->execute(array());	
		
		updateStats($statsdb,$today,"NEGATIVEITEM_WH1_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	}

	/*********************************/
    /**** NEGATIVE ITEM FRESH COUNT ****/
    /*********************************/
	echo "NEGATIVE ITEM FRESH\n";
	if (fieldIsNull($statsdb,"NEGATIVEITEM_FRESH_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT count(*) as 'CNT' 
				FROM ICLOCATION,ICPRODUCT 
				WHERE LOCID = 'WH1'
				AND ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
				AND PPSS_IS_FRESH = 'Y'
				AND LOCONHAND < 0"; 
		$req = $db->prepare($sql);
		$req->execute(array());
		$count = $req->fetch(PDO::FETCH_ASSOC);
		
		updateStats($statsdb,$today,"NEGATIVEITEM_FRESH_CNT_TOD",$count['CNT']);	
	}

    /*********************************/
    /**** NEGATIVE ITEM WH2 COUNT ****/
    /*********************************/
	echo "NEGATIVE ITEM WH2\n";
	if (fieldIsNull($statsdb,"NEGATIVEITEM_WH2_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT count(*) as 'CNT' FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND < 0"; 
		$req = $db->prepare($sql);
		$req->execute(array());
		$count = $req->fetch(PDO::FETCH_ASSOC);
		//$data["NEGATIVEITEM_WH2_CNT"] = $count['CNT'];
		updateStats($statsdb,$today,"NEGATIVEITEM_WH2_CNT_TOD",$count['CNT']);	
	}

	
	//*******************************************//
    //**** 		        COSTZERO  		  *******//
    //*******************************************//
	if (fieldIsNull($statsdb,"COSTZERO_TOD",$today) || $forceRefresh == true) {	
		echo "COST ZERO\n";	
		$sql = "SELECT count(PRODUCTID) as 'CNT'
		FROM dbo.ICPRODUCT  		
		WHERE (LASTCOST = 0 OR LASTCOST IS NULL)
		AND dbo.ICPRODUCT.ACTIVE = 1";
		$req = $db->prepare($sql);
		$req->execute(array());
		updateStats($statsdb,$today,"COSTZERO_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	}
	//*******************************************//
    //**** 		        ZEROSALE  		  *******//
    //*******************************************//
	if (fieldIsNull($statsdb,"ZEROSALE_TOD",$today) || $forceRefresh == true) {
		echo "ZERO SALE\n";
		$sql = "SELECT count(PRODUCTID) as 'CNT'
				FROM ICPRODUCT
				WHERE TOTALSALE = 0
				AND ONHAND > 0
				AND ACTIVE = 1";
		$req = $db->prepare($sql);
		$req->execute(array());
		updateStats($statsdb,$today,"ZEROSALE_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);					

	}

	//*******************************************//
    //**** 		        LOWPROFIT  		  *******//
    //*******************************************//
	if (fieldIsNull($statsdb,"LOWPROFIT_TOD",$today) || $forceRefresh == true) {
		echo "LOW PROFIT\n";
		$sql = "SELECT count(PRODUCTID) as 'CNT'
				FROM ICPRODUCT
				WHERE LASTCOST <> 0
				AND (((PRICE - LASTCOST) / LASTCOST) * 100) < 20
				AND ONHAND > 0
				AND ACTIVE = 1";
		$req = $db->prepare($sql);
		$req->execute(array());
		updateStats($statsdb,$today,"LOWPROFIT_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	}
		
	
	/***********************/
	/**** UNSOLD 30 CNT ****/
	/***********************/
	echo "UNSOLD 30\n";
	if (fieldIsNull($statsdb, "UNSOLD30_ITEMS_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT count(PODETAIL.PRODUCTID) as 'CNT'				
				FROM ICPRODUCT,PODETAIL
				WHERE POSTATUS = 'C' 
				AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
				AND ONHAND > 0
				AND DATEDIFF(day,RECEIVE_DATE,GETDATE()) BETWEEN 30 AND 720
				AND (SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = PODETAIL.PRODUCTID) = 0";
		$req = $db->prepare($sql);
		$req->execute(array());
		$cnt = $req->fetch(PDO::FETCH_ASSOC);
		//$data["UNSOLD30_ITEMS_CNT"] = $items;
		updateStats($statsdb,$today,"UNSOLD30_ITEMS_CNT_TOD",$cnt['CNT']);	
	}
	/*****************************/
    // TOTAL PO RECEIVED TODAY //
    /*****************************/	
	echo "TOTAL PO RECEIVED TODAY\n";
	if (fieldIsNull($statsdb, "PORECEIVED_TOD",$today) || $forceRefresh == true) {
    	$sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    	$req = $db->prepare($sql);
    	$req->execute(array($startToday,$endToday));
    	//$data["PORECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"PORECEIVED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	}
    /*****************************/
    // TOTAL ITEM RECEIVED TODAY //
    /*****************************/	
	echo "TOTAL ITEM RECEIVED TODAY\n";
	if (fieldIsNull($statsdb, "NBITEMRECEIVED_TOD",$today) || $forceRefresh == true) {
    	$sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
    	$req = $db->prepare($sql);
    	$req->execute(array($startToday,$endToday));
    	//$data["NBITEMRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"NBITEMRECEIVED_TOD",round($req->fetch(PDO::FETCH_ASSOC)['CNT'],2));	
	}
    //********************************//
    // TOTAL ITEM QTY RECEIVED TODAY  //
    //********************************//
	echo "TOTAL ITEM QTY RECEIVED TODAY\n";
	if (fieldIsNull($statsdb,"ITEMQTYRECEIVED_TOD",$today) || $forceRefresh == true){
		$sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = 'C' AND  DATEADD BETWEEN ? AND ?";
		$req = $db->prepare($sql);
		$req->execute(array($startToday,$endToday));
		//$data["ITEMQTYRECEIVED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"ITEMQTYRECEIVED_TOD",round($req->fetch(PDO::FETCH_ASSOC)['CNT'],2));	
	}    
	

    //*****************************//
    //****   PO CREATED TODAY  ****//
    //*****************************//
	echo "PO CREATED TODAY\n";
	if (fieldIsNull($statsdb,"POCREATED_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT COUNT(PONUMBER) as 'CNT' FROM POHEADER WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    	$req = $db->prepare($sql);
    	$req->execute(array($startToday,$endToday));
    	//$data["POCREATED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"POCREATED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	}    
    //***********************************//
    //**** TOTAL ITEMS IN PO TODAY   ****//
    //***********************************//
	echo "TOTAL ITEMS IN PO TODAY\n";
	if (fieldIsNull($statsdb,"NBITEMORDERED_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT COUNT(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
    	$req = $db->prepare($sql);
    	$req->execute(array($startToday,$endToday));
    	//$data["NBITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"NBITEMORDERED_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT']);	
	} 
	//***********************************************//
    //****   TOTAL ITEMS ORDERED QTY IN PO TODAY ****//
    //**********************************************//
	echo "TOTAL ITEMS ORDERED QTY IN PO TODAY\n";
	if (fieldIsNull($statsdb,"QTYITEMORDERED_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT SUM(ORDER_QTY) as 'CNT' FROM PODETAIL WHERE POSTATUS = '' AND  DATEADD BETWEEN ? AND ?";
		$req = $db->prepare($sql);
		$req->execute(array($startToday,$endToday));
		//$data["QTYITEMORDERED_TOD"] = $req->fetch(PDO::FETCH_ASSOC)['CNT'];
		updateStats($statsdb,$today,"QTYITEMORDERED_TOD",round($req->fetch(PDO::FETCH_ASSOC)['CNT'],2),$forceRefresh);	
	}    
	
	
	//*******************************************//
    //********	ANOMALIES ITEMS COUNT ***********//
    //*******************************************//
	echo "ANOMALIES ITEMS CNT\n";
	if (fieldIsNull($statsdb,"ANOMALIES_ITEMS_CNT_TOD",$today) || $forceRefresh == true) {
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
		updateStats($statsdb,$today,"ANOMALIES_ITEMS_CNT_TOD",$sumQty,$forceRefresh);	
	}	
	//*******************************************//
    //**** PRICE DIFFERENCES TODAY COUNT  *******//
    //*******************************************//	
	echo "PRICE DIFFERENCES 7Days Back COUNT\n";
	if (fieldIsNull($statsdb,"PRICEDIFFERENCES_ITEMS_CNT_TOD",$today) || $forceRefresh == true) {


		$todayMinusSeven = date('Y-m-d', strtotime('-7 days'))." 00:00:00.000";
		$sql = "SELECT COUNT(PODETAIL.PRODUCTID) as 'CNT'   
		FROM PODETAIL,ICPRODUCT	
		WHERE POSTATUS = 'C' 	
		AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID	
		AND ICPRODUCT.PPSS_IS_FRESH IS NULL
		AND  PODETAIL.DATEADD BETWEEN ? AND ? 
		AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
		$req = $db->prepare($sql);
		$req->execute(array($todayMinusSeven,$endToday));		
		updateStats($statsdb,$today,"PRICEDIFFERENCES_ITEMS_CNT_TOD",$req->fetch(PDO::FETCH_ASSOC)['CNT'],$forceRefresh);	
	}

	//*******************************************//
    //**** NO PICTURE  					  *******//
    //*******************************************//	
	if (fieldIsNull($statsdb,"NOPICTURE_ITEMS_CNT_TOD",$today) || $forceRefresh == true) {
		$sql = "SELECT PRODUCTID FROM ICPRODUCT";
		$req = $db->prepare($sql);
		$req->execute(array());
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		$count = 0;
		foreach($items as $item){
			if (!file_exists("/Volumes/Image/".$item["PRODUCTID"].".jpg"))
				$count++;
		}

		$sql = "SELECT PACK_CODE FROM ICPRODUCT_SALEUNIT";
		$req = $db->prepare($sql);
		$req->execute(array());
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item){
			if (!file_exists("/Volumes/Image/".$item["PACK_CODE"].".jpg"))
				$count++;
		}
		updateStats($statsdb,$today,"NOPICTURE_ITEMS_CNT_TOD",$count,$forceRefresh);	
	}
}

function GenerateBlankYesterday($indb)
{
	echo "YESTERDAY BLANK\n";	
	$today = date('Y-m-d');
	echo $today."\n";
	$yesterday = date('Y-m-d',strtotime("-1 days"));
		
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($yesterday));
	$res = $req->fetch(PDO::FETCH_ASSOC);

			
	$blankTransfer = '{"NBITEM":0,"QUANTITY":0}';		
	$blankCount = "0";
	$sql = "UPDATE GENERATEDSTATS SET 
			TRAFFIC_YES = ?,AVGBASKET_YES = ?, WASTE_NBITEMS_YES = ?, WASTE_SUM_YES = ?,WASTE_QTY_YES = ?,
			RETURN_NBITEM_YES = ?,RETURN_SUMITEM_YES = ?,RETURN_AMOUNT_YES = ?,TRF_ALL_YES = ?,TRF_RAT_YES = ?,
			TRF_OX_YES = ?,TRF_TIGER_YES = ?,TRF_HARE_YES = ?,TRF_DRAGON_YES = ?,TRF_SNAKE_YES = ?,
			TRF_HORSE_YES = ?,TRF_GOAT_YES = ?,OCC_ALL_YES = ?,OCC_RAT_YES = ?,OCC_OX_YES = ?,
			OCC_TIGER_YES = ?,OCC_HARE_YES = ?,OCC_DRAGON_YES = ?,OCC_SNAKE_YES = ?,OCC_HORSE_YES = ?,
			OCC_GOAT_YES = ?,SALE_RAT_YES = ?,SALE_OX_YES = ?,SALE_TIGER_YES = ?,SALE_HARE_YES = ?,
			SALE_DRAGON_YES = ?,SALE_SNAKE_YES = ?,SALE_HORSE_YES = ?,SALE_GOAT_YES = ?,PORECEIVED_YES = ?,
			NBITEMRECEIVED_YES = ?,ITEMQTYRECEIVED_YES = ?,POCREATED_YES = ?,NBITEMORDERED_YES = ?,QTYITEMORDERED_YES = ?,
			PRICEDIFFERENCES_ITEMS_CNT_YES = ?, COSTZERO_YES = ?, ZEROSALE_YES = ?, LOWPROFIT_YES = ?,EXPIRE_RET_CNT_YES = ?, 
			EXPIRE_NR_CNT_YES = ?, NEEDMOVE_CNT_YES = ?, NOLOC_ITEMS_CNT_YES = ?, NEGATIVEITEM_WH1_CNT_YES = ?,NEGATIVEITEM_FRESH_CNT_YES = ?,
			NEGATIVEITEM_WH2_CNT_YES = ?,UNSOLD30_ITEMS_CNT_YES = ?,ANOMALIES_ITEMS_CNT_YES = ? 
			WHERE DAY = ?
			";
		
	$params = array(
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount,$blankTransfer,$blankTransfer,
		$blankTransfer,$blankTransfer,$blankTransfer,$blankTransfer,$blankTransfer,
		$blankTransfer,$blankTransfer,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount, $blankCount, $blankCount, $blankCount, $blankCount,
		$blankCount,$blankCount,$blankCount,$blankCount,$blankCount,
		$blankCount,$blankCount,$blankCount, 
		$today
		);
		$req = $indb->prepare($sql);
		$req->execute($params);	
}

function GenerateYesterdayFromCache($indb)
{
	echo "YESTERDAY FROM CACHE\n";	
	$today = date('Y-m-d');
	$yesterday = date('Y-m-d',strtotime("-1 days"));
		
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
				TRAFFIC_YES = ?,AVGBASKET_YES = ?, WASTE_NBITEMS_YES = ?, WASTE_SUM_YES = ?,WASTE_QTY_YES = ?,
				RETURN_NBITEM_YES = ?,RETURN_SUMITEM_YES = ?,RETURN_AMOUNT_YES = ?,TRF_ALL_YES = ?,TRF_RAT_YES = ?,
				TRF_OX_YES = ?,TRF_TIGER_YES = ?,TRF_HARE_YES = ?,TRF_DRAGON_YES = ?,TRF_SNAKE_YES = ?,
				TRF_HORSE_YES = ?,TRF_GOAT_YES = ?,OCC_ALL_YES = ?,OCC_RAT_YES = ?,OCC_OX_YES = ?,
				OCC_TIGER_YES = ?,OCC_HARE_YES = ?,OCC_DRAGON_YES = ?,OCC_SNAKE_YES = ?,OCC_HORSE_YES = ?,
				OCC_GOAT_YES = ?,SALE_RAT_YES = ?,SALE_OX_YES = ?,SALE_TIGER_YES = ?,SALE_HARE_YES = ?,
				SALE_DRAGON_YES = ?,SALE_SNAKE_YES = ?,SALE_HORSE_YES = ?,SALE_GOAT_YES = ?,PORECEIVED_YES = ?,
				NBITEMRECEIVED_YES = ?,ITEMQTYRECEIVED_YES = ?,POCREATED_YES = ?,NBITEMORDERED_YES = ?,QTYITEMORDERED_YES = ?,
				PRICEDIFFERENCES_ITEMS_CNT_YES = ?, COSTZERO_YES = ?, ZEROSALE_YES = ?, LOWPROFIT_YES = ?,EXPIRE_RET_CNT_YES = ?, 
				EXPIRE_NR_CNT_YES = ?, NEEDMOVE_CNT_YES = ?, NOLOC_ITEMS_CNT_YES = ?, NEGATIVEITEM_WH1_CNT_YES = ?,NEGATIVEITEM_FRESH_CNT_YES = ?,
				NEGATIVEITEM_WH2_CNT_YES = ?,UNSOLD30_ITEMS_CNT_YES = ?,ANOMALIES_ITEMS_CNT_YES = ?,NOPICTURE_ITEMS_CNT_YES = ?
				WHERE DAY = ?
				";
		
		$params = array(
			$res["TRAFFIC_TOD"],$res["AVGBASKET_TOD"],$res["WASTE_NBITEMS_TOD"],$res["WASTE_SUM_TOD"],$res["WASTE_QTY_TOD"],
			$res["RETURN_NBITEM_TOD"],$res["RETURN_SUMITEM_TOD"],$res["RETURN_AMOUNT_TOD"],$res["TRF_ALL_TOD"],$res["TRF_RAT_TOD"],
			$res["TRF_OX_TOD"],$res["TRF_TIGER_TOD"],$res["TRF_HARE_TOD"],$res["TRF_DRAGON_TOD"],$res["TRF_SNAKE_TOD"],
			$res["TRF_HORSE_TOD"],$res["TRF_GOAT_TOD"],$res["OCC_ALL_TOD"],$res["OCC_RAT_TOD"],$res["OCC_OX_TOD"],
			$res["OCC_TIGER_TOD"],$res["OCC_HARE_TOD"],$res["OCC_DRAGON_TOD"],$res["OCC_SNAKE_TOD"],$res["OCC_HORSE_TOD"],
			$res["OCC_GOAT_TOD"],$res["SALE_RAT_TOD"],$res["SALE_OX_TOD"],$res["SALE_TIGER_TOD"],$res["SALE_HARE_TOD"],
			$res["SALE_DRAGON_TOD"],$res["SALE_SNAKE_TOD"],$res["SALE_HORSE_TOD"],$res["SALE_GOAT_TOD"],$res["PORECEIVED_TOD"],
			$res["NBITEMRECEIVED_TOD"],$res["ITEMQTYRECEIVED_TOD"],$res["POCREATED_TOD"],$res["NBITEMORDERED_TOD"],$res["QTYITEMORDERED_TOD"],
			$res["PRICEDIFFERENCES_ITEMS_CNT_TOD"], $res["COSTZERO_TOD"], $res["ZEROSALE_TOD"], $res["LOWPROFIT_TOD"], $res["EXPIRE_RET_CNT_TOD"],
			$res["EXPIRE_NR_CNT_TOD"],$res["NEEDMOVE_CNT_TOD"],$res["NOLOC_ITEMS_CNT_TOD"],$res["NEGATIVEITEM_WH1_CNT_TOD"],$res["NEGATIVEITEM_FRESH_CNT_TOD"],
			$res["NEGATIVEITEM_WH2_CNT_TOD"],$res["UNSOLD30_ITEMS_CNT_TOD"],$res["ANOMALIES_ITEMS_CNT_TOD"], $res["NOPICTURE_ITEMS_CNT_TOD"],
			$today
		);
		$req = $indb->prepare($sql);
		$req->execute($params);
		
	}

}


Generate();
?>