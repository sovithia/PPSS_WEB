<?php

function isLocal()
{
	$mac = shell_exec("dig +short myip.opendns.com @resolver1.opendns.com");    
	return ($mac != "119.82.252.226");
}


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


function getInternalDatabase()
{
    
	try{
        $db = new PDO('sqlite:'.dirname(__FILE__).'/../../db/SuperStore.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function renderItems($items,$type,$message = ""){

    echo "
    <html style='background-color:#009183;color:white'>
    <center>
    <img height='100px' src='http://phnompenhsuperstore.com/assets/images/logo.png'><br><br>
    ".$message."<br>
    Nb Items: ".count($items)."<br>";
    if ($type == "0"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>                    
                </tr>";
        }
        echo "</table>";
    }else if ($type == "1"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>QUANTITY</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["QUANTITY"]."</td>
                </tr>";
        }
        echo "</table>";
    }else if ($type == "2"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>QUANTITY</td><td>LASTRECEIVE</td><td>DIFF</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["QUANTITY"]."</td>
                    <td>".$item["LASTRECEIVE"]."</td>
                    <td>".$item["DIFF"]."</td>
                </tr>";
        }
        echo "</table>";

    }else if ($type == "3"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td>
                <td>VENDNAME</td><td>WH1</td><td>WH2</td>
                <td>STORBIN1</td><td>STORBIN2</td>
                <td>EXPIRE</td><td>DIFF</td>
            </tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["VENDNAME"]."</td>
                    <td>".$item["WH1"]."</td>
                    <td>".$item["WH2"]."</td>                    
                    <td>".$item["STOREBIN1"]."</td>
                    <td>".$item["STOREBIN2"]."</td>
                    <td>".$item["PPSS_DELIVERED_EXPIRE"]."</td>
                    <td>".$item["DIFF"]."</td>
                </tr>";
        }
        echo "</table>";
    }else if ($type == "4"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>                    
                    <td>".$item["WH1"]."</td>
                    <td>".$item["WH2"]."</td>                                        
                </tr>";
        }
        echo "</table>"; 
    }else if ($type == "5"){        
        echo "<table border='1'>        
                <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>LASTRECEIVENBDAYS</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){

            echo "<tr>                    
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["LASTRECEIVENBDAYS"]."</td>                    
                    <td>".$item["WH1"]."</td>
                    <td>".$item["WH2"]."</td>                                        
                </tr>";
        }
        echo "</table>";
    }else if ($type == "6"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE EXPECTED</td><td>REAL PRICE</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".round($item["PPSS_WAITING_PRICE"],4)."</td>                    
                    <td>".round($item["PPSS_DELIVERED_PRICE"],4)."</td>                                                          
                </tr>";
        }
        echo "</table>";
    }else if ($type == "7"){        
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PPSS_WAITING_CALCULATED</td><td>PPSS_WAITING_QUANTITY</td><td>CURRENTONHAND</td><td>ONHAND</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["PPSS_WAITING_CALCULATED"]."</td>                    
                    <td>".$item["PPSS_WAITING_QUANTITY"]."</td> 
                    <td>".$item["CURRENTONHAND"]."</td>
                    <td>".$item["ONHAND"]."</td>                                          
                </tr>";
        }
        echo "</table>";        
    }else if ($type == "8"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>TYPE</td><td>EXPIRE</td><td>QUANTITY</td><td>COST</td><td>AMOUNT</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["TYPE"]."</td>
                    <td>".$item["EXPIRATION"]."</td>
                    <td>".$item["QUANTITY"]."</td>                    
                    <td>".$item["COST"]."</td> 
                    <td>".($item["QUANTITY"] * $item["COST"])."</td>
                    
                </tr>";
        }
        echo "</table>";        
    }else if ($type == "9"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>VENDNAME</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["PRICE"]."</td>                    
                    <td>".$item["VENDNAME"]."</td>                                 
                </tr>";
        }
        echo "</table>";            
    }else if ($type == "10"){
        echo "<table border='1'>
            <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>LASTCOST</td><td>MARGIN</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".round($item["PRICE"],4)."</td>                    
                    <td>".round($item["LASTCOST"],4)."</td>                                 
                    <td>".round($item["MARGIN"],2)."%</td>                                 
                </tr>";
        }
        echo "</table>";            
    }else if ($type == "11"){
        echo "<table border='1'>
        <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>LASTCOST</td><td>WH1</td><td>WH2</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["PRICE"]."</td>                    
                    <td>".$item["LASTCOST"]."</td>                    
                    <td>".$item["WH1"]."</td>                                 
                    <td>".$item["WH2"]."</td>                                 
                </tr>";
        }
        echo "</table>";            
    }else if ($type == "12"){
        echo "<table border='1'>
        <tr><td>IMAGE</td><td>PRODUCTID</td><td>PRODUCTNAME</td><td>PRICE</td><td>LASTCOST</td><td>MARGIN</td></tr>";
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>
                    <td>".$item["ONHAND"]."</td>                    
                    <td>".$item["EXPIRATION"]."</td>                    
                    <td>".$item["QUANTITY"]."</td>                                 
                    
                </tr>";
        }
        echo "</table>";    
    }
    
    echo "</center>
    </html>";            
}


function renderNegativeWH1()
{ 
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME,LOCONHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1'
    AND PPSS_IS_FRESH IS NULL
    AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		    
    renderItems($items,"1","Negative Items WH1");   
}

function renderNegativeWH2()
{
    $db = getDatabase();
    $indb = getInternalDatabase();
    
    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME, LOCONHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH2' AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    renderItems($items,"1","Negative Items WH2");
}

function renderNegativeFresh()
{
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT ICLOCATION.PRODUCTID,LOCONHAND,PRODUCTNAME,LOCONHAND as 'QUANTITY'
    FROM ICLOCATION,ICPRODUCT 
    WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
    AND LOCID = 'WH1' 
    AND PPSS_IS_FRESH = 'Y'
    AND LOCONHAND < 0"; 
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"1","Negative items Fresh");   
}

function renderCostZero()
{
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PRODUCTID,PRODUCTNAME,PRICE,VENDNAME						
    FROM dbo.ICPRODUCT,APVENDOR     		
    WHERE (LASTCOST = 0 OR LASTCOST IS NULL)
    AND ICPRODUCT.VENDID = APVENDOR.VENDID
    AND dbo.ICPRODUCT.ACTIVE = 1";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"9","Cost Zero items<br>");   

}

function renderLowProfit()
{
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PRODUCTID,PRODUCTNAME,PRICE,
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
    renderItems($items,"10","Low Profit");                   
}

function renderZeroSale()
{
    $db = getDatabase();
    $indb = getInternalDatabase();

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
    renderItems($items,"11","Zero sales<br>");   

}

function renderReturn($day)
{
    $db = getDatabase();
    $indb = getInternalDatabase();
    $sql = "SELECT PRODUCTID,QUANTITY,EXPIRATION FROM RETURNRECORDITEM WHERE STATUS = 'CLEARED' AND UPDATED BETWEEN ? AND ?";
    $start = $day." 00:00:00.000";
	$end = $day." 23:59:59.999";	

	$req = $indb->prepare($sql);
	$req->execute(array($start,$end));
	$returnrecorditems = $req->fetchAll(PDO::FETCH_ASSOC);

    $itemsData = array();
    foreach($returnrecorditems as $item){

        $sql = "SELECT PRODUCTNAME, ONHAND FROM ICPRODUCT WHERE PRODUCTID = ?";        
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));		
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $item["PRODUCTNAME"] = $data["PRODUCTNAME"];
        $item["ONHAND"] = $data["ONHAND"];
        array_push($itemsData,$item);		
    }    
    renderItems($itemsData,"12","Return for : ".$day."<br>");		        	        
}

function renderOccupancy($team) // TOP 100
{    
    $db = getDatabase();
    $indb = getInternalDatabase();

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
		$sqlItems .= "AND ICLOCATION.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
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
    $db = getDatabase();
    $indb = getInternalDatabase();

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
    array_push($params,$start,$end);    
	$req1->execute($params);	
	$items = $req1->fetchAll(PDO::FETCH_ASSOC);
    
    $fullitems = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTID,REQUEST_QUANTITY as 'QUANTITY' FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
        $req->execute(array($item["ID"]));
		$data = $req->fetch(PDO::FETCH_ASSOC);
        
        $sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($data["PRODUCTID"]));
        $oneData = $req->fetch(PDO::FETCH_ASSOC);
        $data["PRODUCTNAME"] = $oneData["PRODUCTNAME"];
		array_push($fullitems,$data);
	}		
    renderItems($fullitems,"1","Transfer<br>Date". " ".$day."<br>Team ".$team."<br>Locations: ". $teams[$team]."<br>");    
}

function renderSale($team,$day)
{  
    $db = getDatabase();
    $indb = getInternalDatabase();

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
    renderItems($items,"1","SALE<br>Date". " ".$day."<br>Team ".$team."<br>Locations: ". $teams[$team]."<br>");
}
	
function renderWaste($day)
{
    $db = getDatabase();
    $indb = getInternalDatabase();

    $start = $day." 00:00:00.000";
	$end = $day." 23:59:59.999";	

    $sql = "SELECT PRODUCTID,QUANTITY,EXPIRATION,TYPE FROM WASTEITEM WHERE  CREATED BETWEEN ? AND ?";
		$req = $indb->prepare($sql);
		$req->execute(array($start,$end));
		$wasteditems = $req->fetchAll(PDO::FETCH_ASSOC);
		$items = array();		    
		$totalQty = 0;
		$totalSum = 0;
		foreach($wasteditems as $wasteditem){
			$sql = "SELECT PRODUCTNAME,COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($wasteditem["PRODUCTID"]));
			$oneitemData = $req->fetch(PDO::FETCH_ASSOC);
            $oneWasteData["TYPE"] = $wasteditem["TYPE"];
			$oneWasteData["EXPIRATION"] = $wasteditem["EXPIRATION"];
			$oneWasteData["PRODUCTID"] = $wasteditem["PRODUCTID"];
			$oneWasteData["PRODUCTNAME"] = $oneitemData["PRODUCTNAME"];		
			$oneWasteData["QUANTITY"] = $wasteditem["QUANTITY"];
			$oneWasteData["COST"] = $oneitemData["COST"];
			array_push($items, $oneWasteData);
		}
    
    renderItems($items,"8","Waste: ".$day."<br>");					
}

function renderNoLocation()
{    
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT ICLOCATION.PRODUCTID,PRODUCTNAME
        FROM ICLOCATION,ICPRODUCT 
        WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID 
        AND STORBIN IS NULL 
        AND LOCID = 'WH1'";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
	renderItems($items,"0","No loc items<br>");
}

function renderExpireReturn()
{	
    $db = getDatabase();
    $indb = getInternalDatabase();

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
    $sql = "SELECT distinct PPSS_DELIVERED_EXPIRE,
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
    $req->execute();
    $items = $req->fetchAll(PDO::FETCH_ASSOC);				
    var_dump($items);
    exit;
    renderItems($items,"3","Expire returns");
}

function renderExpireNoReturn()
{
    $db = getDatabase();
    $indb = getInternalDatabase();

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
    renderItems($items,"3","Expire no returns");
} 

function renderNeedMove()
{    
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PRODUCTNAME,PRODUCTID,
    (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
    (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
    FROM ICPRODUCT 
    WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
    AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    renderItems($items,"4","Need move items<br>");	
} 

function renderUnsold30()
{   
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PODETAIL.PRODUCTID,PODETAIL.PRODUCTNAME,DATEDIFF(day,RECEIVE_DATE,GETDATE()) as 'LASTRECEIVENBDAYS',ONHAND,
        (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
        (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2'
        FROM ICPRODUCT,PODETAIL        
        WHERE POSTATUS = 'C' 
        AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
        AND ONHAND > 0
        AND DATEDIFF(day,RECEIVE_DATE,GETDATE()) BETWEEN 30 AND 720
        AND (SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = PODETAIL.PRODUCTID) = 0";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);		
    renderItems($items,"5","Unsold items 30<br>");
}

function renderPriceDifference()
{  
    $db = getDatabase();
    $indb = getInternalDatabase();

	$todayMinusSeven = date('m/d/Y', strtotime('-7 days'))." 00:00:00.000";
    $endToday = date('m/d/Y')." 23:59:59.000";
	echo "PRICE DIFFERENCES 7Days Back\n";
	
		$sql = "SELECT PODETAIL.PRODUCTID,ICPRODUCT.PRODUCTNAME,PPSS_WAITING_PRICE,PPSS_DELIVERED_PRICE  
		FROM PODETAIL,ICPRODUCT
		WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ICPRODUCT.PPSS_IS_FRESH IS NULL
		AND POSTATUS = 'C' 
		AND  PODETAIL.DATEADD BETWEEN ? AND ? 
		AND PPSS_WAITING_PRICE <> PPSS_DELIVERED_PRICE";
		$req = $db->prepare($sql);
		$req->execute(array($todayMinusSeven,$endToday));
        $items = $req->fetchAll(PDO::FETCH_ASSOC);		
        renderItems($items,"6","Price Differences 7 Days back");        		    
}

function renderAnomaly()
{    
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PONUMBER FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = 'ANOMALYUNSOLVED'";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $anomalies = $req->fetchAll(PDO::FETCH_ASSOC);
    $anomalyData = array();
    foreach($anomalies as $anomaly){

        $sql = "SELECT PODETAIL.PRODUCTID,ICPRODUCT.PRODUCTNAME,CURRENTONHAND,PPSS_WAITING_CALCULATED,PPSS_WAITING_QUANTITY,ONHAND
                FROM PODETAIL, ICPRODUCT
                WHERE PONUMBER = ? 
                AND PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
                AND PPSS_WAITING_CALCULATED <> PPSS_WAITING_QUANTITY";
        $req = $db->prepare($sql);
        $req->execute(array($anomaly["PONUMBER"]));		
        $anomalyData = array_merge($anomalyData,$req->fetchAll(PDO::FETCH_ASSOC));		
    }    
    renderItems($anomalyData,"7", "Anomaly items<br>");		        	    
}

function render($action){
    $today = date('Y-m-d');	
    $yesterday = date('Y-m-d',strtotime("-1 days"));
    
    if ($action == "NOLOC_ITEMS_TOD"){
        renderNoLocation();
    }
    else if ($action == "COSTZERO_ITEMS_TOD"){
        renderCostZero();
    }
    else if ($action == "ZEROSALE_ITEMS_TOD"){
        renderZeroSale();
    }
    else if ($action == "LOWPROFIT_ITEMS_TOD"){
        renderLowProfit();
    }
    else if ($action == "NEGATIVEITEM_WH1_ITEMS_TOD"){
        renderNegativeWH1();
    }
    else if ($action == "NEGATIVEITEM_WH2_ITEMS_TOD"){
        renderNegativeWH2();
    }
    else if ($action == "NEGATIVEITEM_FRESH_ITEMS_TOD"){
        renderNegativeFresh();
    }
    else if ($action == "EXPIRE_RET_ITEMS_TOD"){
        renderExpireReturn(); 
    }
    else if ($action == "EXPIRE_NR_ITEMS_TOD"){
        renderExpireNoReturn();
    }
    else if ($action == "NEEDMOVE_ITEMS_TOD"){
        renderNeedMove();
    }
    else if ($action == "TRF_RAT_ITEMS_YES"){    
        renderTransfer("RAT",$yesterday);
    }
    else if ($action == "TRF_OX_ITEMS_YES"){
        renderTransfer("OX",$yesterday);
    }
    else if ($action == "TRF_TIGER_ITEMS_YES"){
        renderTransfer("TIGER",$yesterday);
    }
    else if ($action == "TRF_HARE_ITEMS_YES"){
        renderTransfer("HARE",$yesterday);
    }
    else if ($action == "TRF_SNAKE_ITEMS_YES"){
        renderTransfer("SNAKE",$yesterday);
    }
    else if ($action == "TRF_DRAGON_ITEMS_YES"){
        renderTransfer("DRAGON",$yesterday);
    }
    else if ($action == "TRF_GOAT_ITEMS_YES"){
        renderTransfer("GOAT",$yesterday);
    }
    else if ($action == "TRF_HORSE_ITEMS_YES"){
        renderTransfer("HORSE",$yesterday);
    }
    else if ($action == "TRF_RAT_ITEMS_TOD"){
        renderTransfer("RAT",$today);
    }
    else if ($action == "TRF_OX_ITEMS_TOD"){
        renderTransfer("OX",$today);
    }
    else if ($action == "TRF_TIGER_ITEMS_TOD"){
        renderTransfer("TIGER",$today);
    }
    else if ($action == "TRF_HARE_ITEMS_TOD"){
        renderTransfer("HARE",$today);
    }
    else if ($action == "TRF_SNAKE_ITEMS_TOD"){
        renderTransfer("SNAKE",$today);
    }
    else if ($action == "TRF_DRAGON_ITEMS_TOD"){
        renderTransfer("DRAGON",$today);
    }
    else if ($action == "TRF_GOAT_ITEMS_TOD"){
        renderTransfer("GOAT",$today);
    }
    else if ($action == "TRF_HORSE_ITEMS_TOD"){
        renderTransfer("HORSE",$today);
    }    
    else if ($action == "SALE_RAT_ITEMS_YES"){
        renderSale("RAT",$yesterday);
    }
    else if ($action == "SALE_OX_ITEMS_YES"){
        renderSale("OX",$yesterday);
    }
    else if ($action == "SALE_TIGER_ITEMS_YES"){
        renderSale("TIGER",$yesterday);
    }
    else if ($action == "SALE_HARE_ITEMS_YES"){
        renderSale("HARE",$yesterday);
    }
    else if ($action == "SALE_SNAKE_ITEMS_YES"){
        renderSale("SNAKE",$yesterday);
    }
    else if ($action == "SALE_DRAGON_ITEMS_YES"){
        renderSale("DRAGON",$yesterday);
    }
    else if ($action == "SALE_GOAT_ITEMS_YES"){
        renderSale("GOAT",$yesterday);
    }
    else if ($action == "SALE_HORSE_ITEMS_YES"){
        renderSale("HORSE",$yesterday);
    }
    else if ($action == "SALE_RAT_ITEMS_TOD"){
        renderSale("RAT",$today);
    }
    else if ($action == "SALE_OX_ITEMS_TOD"){
        renderSale("OX",$today);
    }
    else if ($action == "SALE_TIGER_ITEMS_TOD"){
        renderSale("TIGER",$today);
    }
    else if ($action == "SALE_HARE_ITEMS_TOD"){
        renderSale("HARE",$today);
    }
    else if ($action == "SALE_SNAKE_ITEMS_TOD"){
        renderSale("SNAKE",$today);
    }
    else if ($action == "SALE_DRAGON_ITEMS_TOD"){
        renderSale("DRAGON",$today);
    }
    else if ($action == "SALE_GOAT_ITEMS_TOD"){
        renderSale("GOAT",$today);
    }
    else if ($action == "SALE_HORSE_ITEMS_TOD"){
        renderSale("HORSE",$today);
    }    
    else if ($action == "OCC_RAT_ITEMS_TOD"){
        renderOccupancy("RAT");
    }
    else if ($action == "OCC_OX_ITEMS_TOD"){
        renderOccupancy("OX");
    }
    else if ($action == "OCC_TIGER_ITEMS_TOD"){
        renderOccupancy("TIGER");
    }
    else if ($action == "OCC_HARE_ITEMS_TOD"){
        renderOccupancy("HARE");
    }
    else if ($action == "OCC_SNAKE_ITEMS_TOD"){
        renderOccupancy("SNAKE");
    }
    else if ($action == "OCC_DRAGON_ITEMS_TOD"){
        renderOccupancy("DRAGON");
    }
    else if ($action == "OCC_GOAT_ITEMS_TOD"){
        renderOccupancy("GOAT");
    }
    else if ($action == "OCC_HORSE_ITEMS_TOD"){
        renderOccupancy("HORSE");
    }
    else if ($action == "ANOMALIES_ITEMS_TOD"){   
        renderAnomaly();
    }
    else if ($action == "PRICEDIFFERENCES_ITEMS_TOD"){
        renderPriceDifference();    
    }
    else if ($action == "UNSOLD30_ITEMS_TOD"){
        renderUnsold30();  
    }
    else if ($action == "RETURN_ITEMS_YES"){
        renderReturn($yesterday);
    }
    else if ($action == "RETURN_ITEMS_TOD"){
        renderReturn($today);        
    }
    else if ($action == "WASTE_ITEMS_YES"){
        renderWaste($yesterday);
    }
    else if ($action == "WASTE_ITEMS_TOD"){
        renderWaste($today);        
    }else{
        echo "action: ".$action." not found";
    }
}


render($_GET["ACTION"]);




?>
