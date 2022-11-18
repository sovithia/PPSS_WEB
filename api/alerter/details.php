<?php

function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
	try  
	{  		
		if ($name == "MAIN")
		{
			if (isLocal()){				
				$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
			}
			else 
				$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TRAINING")
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=TRAININGDATA;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TMP" )
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.249\\SQL2008r2,55008;Database=ppss_tempdata;ConnectionPooling=0', 'sa', 'blue');
		}  		
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage( )) );   
	} 
	return $conn;
}


function getInternalDatabase($base = "MAIN")
{
	try{
		if ($base == "MAIN")
			$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		else if ($base == "TEST")
			$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStoreTEST.sqlite');
		else if ($base == "ECOMMERCE")
			$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/ecommerce.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

$db = getDatabase();
$indb = getInternalDatabase();

// NEGATIVE WH1
// NEGATIVE WH2
// NEGATIVE FRESH

// EXPIRE R
// EXPIRE NR
// UNSOLD 30
// NEED MOVE
// NO LOC 
// COST ZERO
// ZERO SALE
// LOW PROFIT

// TRF_RAT_TOD
// TRF_RAT_YES
// TRF_OX_TOD
// TRF_OX_YES
// TRF_TIGER_TOD
// TRF_TIGER_YES
// TRF_HARE_TOD
// TRF_HARE_YES
// TRF_SNAKE_TOD
// TRF_SNAKE_YES
// TRF_DRAGON_TOD
// TRF_GOAT_YES
// TRF_HORSE_TOD
// TRF_HORSE_YES

// SALE_RAT_TOD
// SALE_RAT_YES
// SALE_OX_TOD
// SALE_OX_YES
// SALE_TIGER_TOD
// SALE_TIGER_YES
// SALE_HARE_TOD
// SALE_HARE_YES
// SALE_SNAKE_TOD
// SALE_SNAKE_YES
// SALE_DRAGON_TOD
// SALE_GOAT_YES
// SALE_HORSE_TOD
// SALE_HORSE_YES

// OCC_RAT_TOD
// OCC_RAT_YES
// OCC_OX_TOD
// OCC_OX_YES
// OCC_TIGER_TOD
// OCC_TIGER_YES
// OCC_HARE_TOD
// OCC_HARE_YES
// OCC_SNAKE_TOD
// OCC_SNAKE_YES
// OCC_DRAGON_TOD
// OCC_GOAT_YES
// OCC_HORSE_TOD
// OCC_HORSE_YES

// PRICEDIFFERENCE 
// ANOMALY

// RETURN_YES
// RETURN_TOD

// WASTE_YES
// WASTE_TOD

function renderItems($items){
    echo "Nb Items: ".count($items)."<br>";
    if ($type == "0")
    {
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td></tr>";
        foreach($fullitems as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>                    
                </tr>";
        }
        echo "</table>";
    }
    else if ($type == "1")
    {
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>QUANTITY</td></tr>";
        foreach($fullitems as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["QUANTITY"]."</td>
                </tr>";
        }
        echo "</table>";
    }else if ($type == "2"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>QUANTITY</td><td>LASTRECEIVE</td><td>DIFF</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["QUANTITY"]."</td>
                    <td>".$items["LASTRECEIVE"]."</td>
                    <td>".$items["DIFF"]."</td>
                </tr>";
        }
        echo "</table>";

    }else if (type == "3"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td>
                <td>VENDNAME</td><td>WH1</td><td>WH2</td>
                <td>STORBIN1</td><td>STORBIN2</td>
            </tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["VENDNAME"]."</td>
                    <td>".$items["WH1"]."</td>
                    <td>".$items["WH2"]."</td>                    
                    <td>".$items["STORBIN1"]."</td>
                    <td>".$items["STORBIN2"]."</td>
                </tr>";
        }
        echo "</table>";
    }else if (type == "4"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>                    
                    <td>".$items["WH1"]."</td>
                    <td>".$items["WH2"]."</td>                                        
                </tr>";
        }
        echo "</table>"; 
    }else if (type == "5"){
        echo "<table>        
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>LASTRECEIVENBDAYS</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["LASTRECEIVENBDAYS"]."</td>                    
                    <td>".$items["WH1"]."</td>
                    <td>".$items["WH2"]."</td>                                        
                </tr>";
        }
        echo "</table>";
    }else if (type == "6"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>LASTRECEIVENBDAYS</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["PPSS_WAITING_PRICE"]."</td>                    
                    <td>".$items["PPSS_DELIVERED_PRICE"]."</td>                                                          
                </tr>";
        }
        echo "</table>";
    }else if (type == "7"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PPSS_WAITING_CALCULATED</td><td>PPSS_WAITING_QUANTITY</td><td>CURRENTONHAND</td><td>ONHAND</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["PPSS_WAITING_CALCULATED"]."</td>                    
                    <td>".$items["PPSS_WAITING_QUANTITY"]."</td> 
                    <td>".$items["CURRENTONHAND"]."</td>
                    <td>".$items["ONHAND"]."</td>                                          
                </tr>";
        }
        echo "</table>";        
    }else if ($type == "8"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>QUANTITY</td><td>COST</td><td>AMOUNT</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["QUANTITY"]."</td>                    
                    <td>".$items["COST"]."</td> 
                    <td>".($items["QUANTITY"] * $items["COST"])."</td>
                    
                </tr>";
        }
        echo "</table>";        
    }else if ($type == "9"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>VENDNAME</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["PRICE"]."</td>                    
                    <td>".$items["VENDNAME"]."</td>                                 
                </tr>";
        }
        echo "</table>";            
    }else if ($type == "10"){
        echo "<table>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>LASTCOST</td><td>MARGIN</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                    <td>".$items["PRODUCTID"]."</td>
                    <td>".$items["PRODUCTNAME"]."</td>
                    <td>".$items["PRICE"]."</td>                    
                    <td>".$items["LASTCOST"]."</td>                                 
                    <td>".$items["MARGIN"]."</td>                                 
                </tr>";
        }
        echo "</table>";            
    }else if ($type == "11"){
    echo "<table>
        <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>LASTCOST</td><td>MARGIN</td></tr>";
    foreach($items as $item){
        echo "<tr>
                <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."></td>
                <td>".$items["PRODUCTID"]."</td>
                <td>".$items["PRODUCTNAME"]."</td>
                <td>".$items["PRICE"]."</td>                    
                <td>".$items["LASTCOST"]."</td>                    
                <td>".$items["WH1"]."</td>                                 
                <td>".$items["WH2"]."</td>                                 
            </tr>";
    }
    echo "</table>";            
}

}


function renderNegativeWH1()
{ 
    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME,LOCONHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1'
    AND PPSS_IS_FRESH <> 'Y'
    AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"1");   
}

function renderNegativeWH2()
{    
    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME, LOCHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    renderItems($items,"1");
}

function renderNegativeFresh()
{
    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME,LOCONHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1' 
    AND PPSS_IS_FRESH = 'Y'
    AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"1");   
}


function renderCostZero()
{
    $sql = "SELECT PRODUCTID,PRODUCTNAME,PRICE,VENDNAME,						
    FROM dbo.ICPRODUCT  		
    WHERE (LASTCOST = 0 OR LASTCOST IS NULL)
    AND dbo.ICPRODUCT.ACTIVE = 1";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"9");   

}

function renderLowProfit()
{
    $sql = "SELECT PRODUCTID,PRODUCTNAME,PRICE
            (select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY ICTRANDETAIL.COLID DESC) as 'LASTCOST',
            (((PRICE - LASTCOST) / LASTCOST) * 100) as 'MARGIN'
            FROM ICPRODUCT
            WHERE LASTCOST <> 0
            AND (((PRICE - LASTCOST) / LASTCOST) * 100) < 20
            AND ONHAND > 0
            AND ACTIVE = 1"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"10");   
                   
}

function renderZeroSale()
{
    $sql = "SELECT PRODUCTID, PRODUCTNAME,PRICE,
                (select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY ICTRANDETAIL.COLID DESC) as 'LASTCOST',
                (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
                (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
				FROM ICPRODUCT
				WHERE TOTALSALE = 0
				AND ONHAND > 0
				AND ACTIVE = 1";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"11");   

}

function renderOccupancy($team) // TOP 100
{    
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

	$sqlItems = "select TOP(20) ICLOCATION.PRODUCTID,PRODUCTNAME,LOCONHAND as 'QUANTITY',LASTRECEIVE,DATEDIFF(day,LASTRECEIVE,GETDATE()) as DIFF 
	FROM ICLOCATION,ICPRODUCT 
	WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
	AND LOCID = 'WH1' 
	AND LOCONHAND > 0
	AND DATEDIFF(day,LASTRECEIVE,GETDATE()) > 30";
	$params = array();
	if ($team != "ALL"){
		$locs = explode('|',$allloc);		
		$sqlItems .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
		foreach($locs as $loc){		
			$sqlItems .= ' STORBIN LIKE ? OR';
			array_push($params, '%'.$loc.'%' );
		}		
		$sqlItems = substr($sqlItems,0,-2);
		$sqlItems .= ")) ORDER BY DIFF DESC";	
	}else{
		$sqlItems .= " ORDER BY DIFF DESC";	
	}	
	$req2 = $db->prepare($sqlItems);
	$req2->execute($params);
	$items = $req2->fetchAll(PDO::FETCH_ASSOC);
	$data = array();	
	$data["ITEMS"] = $items;
	
    renderItems($items,"2");
}

function renderTransfer($team,$day)
{
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
    $start = $day." 00:00:00.000";
	$end = $day." 23:59:59.999";	

	$sqlToday = $sql. " AND REQUEST_UPDATED BETWEEN ? AND ?";	
	$req1 = $indb->prepare($sqlToday);
	$req1->execute(array($start,$end));	
	$items = $req1->fetchAll(PDO::FETCH_ASSOC);
    $fullitems = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTID,REQUEST_QUANTITY as 'QUANTITY' FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
		$data = $req->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $oneData = $req->fetch(PDO::FETCH_ASSOC);
        $data["PRODUCTNAME"] = $oneData["PRODUCTNAME"];
		array_push($fullitems,$oneData);
	}		
    renderItems($items,"1");    
}

function renderSale($team,$day)
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

	$sql = "SELECT 
	POSDETAIL.PRODUCTID
	,POSDETAIL.PRODUCTNAME			
	,SUM(dbo.POSDETAIL.QTY) AS 'QUANTITY'
	FROM dbo.POSDETAIL WHERE 1=1 ";	
	$params = array();

    $start = $day." 00:00:00.000";
	$end = $day." 23:59:59.999";	
		
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
	GROUP BY PRODUCTID,PRODUCTNAME
	";
	array_push($params,$start);
	array_push($params,$end);

	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
    renderItems($items,"1");
}
	
function renderWaste($day)
{
    $start = $day." 00:00:00.000";
	$end = $day." 23:59:59.999";	

    $sql = "SELECT PRODUCTID,QUANTITY FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?";
		$req = $indb->prepare($sql);
		$req->execute(array($start,$start));
		$wasteditems = $req->fetchAll(PDO::FETCH_ASSOC);
		$items = array();
		
		$totalQty = 0;
		$totalSum = 0;
		foreach($wasteditems as $wasteditem){
			$sql = "SELECT PRODUCTNAME,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array(wasteditem["PRODUCTID"]));
			$oneitemData = $req->fetch(PDO:FETCH);
			
			$oneWasteData["PRODUCTID"] = wasteditem["PRODUCTID"];
			$oneWasteData["PRODUCTNAME"] = $oneitemData["PRODUCTNAME"];		
			$oneWasteData["QUANTITY"] = $wasteitem["QUANTITY"];
			$oneWasteData["COST"] = $oneitemData["COST"];
			array_push($items, $oneWasteData);
		}
    renderItems($items,"8");					
}

function renderNoLocation()
{    
    $sql = "SELECT ICLOCATION.PRODUCTID,PRODUCTNAME
        FROM ICLOCATION,ICPRODUCT 
        WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
        AND STORBIN IS NULL 
        AND LOCID = 'WH1'";
    $req = $db->prepare($sql);
    $req->execute(array());
    $noclocitems = $req->fetchAll(PDO::FETCH_ASSOC);		
	renderItems($items,"0");
}

function renderExpireReturn()
{	
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
    $items = $req->fetchAll(PDO::FETCH_ASSOC);				
    renderItems($items,"3");
}

function renderExpireNoReturn()
{
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
    $sql = "SELECT DISTINCT PPSS_DELIVERED_EXPIRE,
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
    $items = $req->fetchAll(PDO::FETCH_ASSOC);	
    renderItems($items,"3");
} 

function renderNeedMove()
{    	
    $sql = "SELECT PRODUCTNAME,PRODUCTID,
    (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
    (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
    FROM ICPRODUCT 
    WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
    AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    renderItems($items,"4");	
} 

function renderUnsold30()
{    	
    $sql = "SELECT PODETAIL.PRODUCTID,PRODUCTNAME,DATEDIFF(day,RECEIVE_DATE,GETDATE()) as 'LASTRECEIVENBDAYS',ONHAND
        FROM ICPRODUCT,PODETAIL,
        (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
        (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
        WHERE POSTATUS = 'C' 
        AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
        AND ONHAND > 0
        AND DATEDIFF(day,RECEIVE_DATE,GETDATE()) BETWEEN 30 AND 720
        AND (SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = PODETAIL.PRODUCTID) = 0";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"5");
}



function renderPriceDifference()
{  
	$todayMinusSeven = date('m/d/Y', strtotime('-7 days'))." 00:00:00.000";
	echo "PRICE DIFFERENCES 7Days Back\n";
	
		$sql = "SELECT TOP(5) PODETAIL.PRODUCTID,PRODUCTNAME,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  
		FROM PODETAIL,ICPRODUCT
		WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ICPRODUCT.PPSS_IS_FRESH <> 'Y'		
		AND POSTATUS = 'C' 
		AND  PODETAIL.DATEADD BETWEEN ? AND ? 
		AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
		$req = $db->prepare($sql);
		$req->execute(array($todayMinusSeven,$endToday));
        $items = $req->fetchAll(PDO::FETCH_ASSOC);		
        renderItems($items,"6");        		    
}

function renderAnomaly()
{    
	
    $sql = "SELECT PONUMBER FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED' limit 5";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $anomalies = $req->fetchAll(PDO::FETCH_ASSOC);
    $anomalyData = array();
    foreach($anomalies as $anomaly){

        $sql = "SELECT PODETAIL.PRODUCTID,PRODUCTNAME,CURRENTONHAND,PPSS_WAITING_CALCULATED,PPSS_WAITING_QUANTITY,ONHAND
                FROM PODETAIL, ICPRODUCT
                WHERE PONUMBER = ? 
                AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
                AND PPSS_WAITING_CALCULATED <> PPSS_WAITING_QUANTITY";
        $req = $db->prepare($sql);
        $req->execute(array($anomaly["PONUMBER"]));		
        array_push($anomalyData,$req->fetchAll(PDO::FETCH_ASSOC));		
    }
    renderItems($anomalyData,"7");		        	    
}




?>
