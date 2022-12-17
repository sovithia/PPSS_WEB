<?php 

require_once("functions.php");

function generateCalculationForDate($day = null)
{
    if ($day == null)
        $day = date('Y-m-d');	
	$startToday = $day." 00:00:00.000";
	$endToday = $day." 23:59:59.999";		

    $db = getDatabase();
    $indb = getInternalDatabase();
    $statsdb = getInternalDatabase("STATS");

    $sql = "SELECT PONUMBER,PODETAIL.PRODUCTID, PPSS_WAITING_CALCULATED,PPSS_WAITING_QUANTITY,PURCHASE_DATE,CURRENTONHAND 
            FROM PODETAIL,ICPRODUCT 
            WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID 
            AND PPSS_IS_FRESH IS NULL
            AND PURCHASE_DATE BETWEEN ? AND ?";
    $req = $db->prepare($sql);
    $req->execute(array($startToday,$endToday));

    $items = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($items as $item){
        echo $item["PRODUCTID"]."\n";
        $stats = orderStatistics($item["PRODUCTID"]);

        $sql = "SELECT * FROM ORDERSTATS WHERE PRODUCTID = ? AND PONUMBER = ? AND PURCHASE_DATE = ?";
        $req = $indb->prepare($sql);
        $req->execute(array($item["PRODUCTID"],$item["PONUMBER"],$item["PURCHASE_DATE"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            $params = array(
                $item["PONUMBER"],$item["PPSS_WAITING_CALCULATED"],$item["PPSS_WAITING_QUANTITY"],$item["CURRENTONHAND"],$item["PRODUCTID"],
                $stats["PRODUCTNAME"],$stats["DECISION"],$stats["MULTIPLE"],$stats["ONHAND"],$stats["COST"],
                $stats["PRICE"],$stats["TOTALRECEIVE"],$stats["LASTRCVDATE"],$stats["LASTRECEIVEQUANTITY"],$stats["TOTALSALE"],
                $stats["SALESINCELASTRECEIVE"],$stats["SALESPEED"],$stats["RATIOSALE"],$stats["PROMO"],$stats["WASTE"],
                $item["PURCHASE_DATE"]

            );
            $sql = "INSERT INTO ORDERSTATS (
            PONUMBER,PPSS_WAITING_CALCULATED,PPSS_WAITING_QUANTITY,CURRENTONHAND,PRODUCTID,
            PRODUCTNAME,DECISION,MULTIPLE,ONHAND,COST,
            PRICE,TOTALRECEIVE,LASTRCVDATE,LASTRECEIVEQUANTITY,TOTALSALE,
            SALESINCELASTRECEIVE,SALESPEED,RATIOSALE,PROMO,WASTE,
            PURCHASE_DATE) 
            VALUES (?,?,?,?,?,
                    ?,?,?,?,?,
                    ?,?,?,?,?,
                    ?,?,?,?,?,
                    ?)";
            $req = $statsdb->prepare($sql);
            $req->execute($params);
        }
    }
}

//generateCalculationForDate("2022-12-8");    