<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);
error_reporting(E_ALL);


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function getDatabase()
{ 
	$conn = null;      
	try  {  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e){   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getInternalDatabase()
{
	try{
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function master($location)
{
	$conn=getDatabase();
	$sql = "SELECT BARCODE,PRODUCTNAME,PRODUCTNAME1,ONHAND,COST,
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2' 
			FROM ICPRODUCT
			WHERE ONHAND <> 0
			AND PRODUCTID in (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = '".$location."' AND LOCONHAND <> 0) ";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	return $items;

}


function ExtractData($location)
{
	$allitems = master($location);	

	// MASTER - ADJUSTED ITEMS
	echo "STEP 1 (KEEPING ALL BUT ADJUSTED ITEMS)\n";	
	$count = 0;

	$db = getInternalDatabase();
	$sql = "SELECT barcode FROM ITEMADJUST WHERE location = '".$location."' ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$barcodes=$req->fetchAll(PDO::FETCH_ASSOC);
	$justBarcodes = array();
	foreach($barcodes as $barcode){
		array_push($justBarcodes,$barcode["barcode"]);
	}

	$data = array();
	
	$count = 0;
	foreach($allitems as $oneItem)
	{		
		if (!in_array($oneItem["BARCODE"], $justBarcodes)) 	{
			array_push($data,$oneItem);					
					
		}
	}	

	// EXTRACT REST
	echo "STEP 2 (KEEPING ALL BUT RECEIVE,SALE,TRANFER)\n";
	$finalData = array();
	foreach($data as $oneItem)
	{
		$conn=getDatabase();
		$params = array($barcode);

		$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('I','R','TR','TI')
			AND TRANDATE BETWEEN '2020-01-01 00:00:00.000' AND '2020-06-15 23:59:59.000'";

		$req = $conn->prepare($sql);
		$req->execute(array($oneItem["BARCODE"],$location));
		$item=$req->fetch(PDO::FETCH_ASSOC);
		if ($item["NB"] == "0" || $item["NB"] == 0)	{
			array_push($finalData,$oneItem);					
		}					
	}	
	return $finalData;
}


function generateExcel($items,$filename = 'data.xlsx')
{
            
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(15);    
        
	$sheet->setCellValue('A1', "BARCODE"); 
	$sheet->setCellValue('B1', "PRODUCTNAME"); 
	$sheet->setCellValue('C1', "PRODUCTNAME1"); 
	$sheet->setCellValue('D1', "WH1"); 
	$sheet->setCellValue('E1', "WH2"); 	
 
    $count = 2;    
    foreach($items as $item)    
    {              
        $sheet->getRowDimension($count)->setRowHeight(20); 
                 
        if (!isset($item["BARCODE"]))
            continue;
      	$sheet->setCellValue("A".$count,$item["BARCODE"]);
      	$sheet->setCellValue("B".$count,$item["PRODUCTNAME"]);
      	$sheet->setCellValue("C".$count,$item["PRODUCTNAME1"]);
      	$sheet->setCellValue("D".$count,$item["WH1"]);
      	$sheet->setCellValue("E".$count,$item["WH2"]);      	
   		$count++;
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);   
}

function generateExcel2($items,$filename){
	 $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->getColumnDimension('B')->setWidth(15);
           
	$sheet->setCellValue('A1', "BARCODE"); 
	$sheet->setCellValue('B1', "QTY"); 
 
    $count = 2;    
    foreach($items as $item)    
    {              
        $sheet->getRowDimension($count)->setRowHeight(20);                  
        if (!isset($item["BARCODE"]))
            continue;
      	$sheet->setCellValue("A".$count,$item["BARCODE"]);
      	$sheet->setCellValue("B".$count,$item["QTY"]);   
      	$count++;   	   		
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);   
}

function openAndFilter($filename,$loc)
{
	$conn=getDatabase();
	$data = array();
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    for($i = 2;$i < $highestRow;$i++)
    {
    	$barcode = $sheet->getCell('A'.$i)->getValue();    	
    	
    	
    	if(needRetrieval($barcode,$loc))
    	{

			$sql = "SELECT LOCONHAND FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = ?";
			$req = $conn->prepare($sql);
			$req->execute(array($barcode,$loc));
			$item=$req->fetch(PDO::FETCH_ASSOC);
			$locondhand = $item["LOCONHAND"];

    		$productnameEN = $sheet->getCell('B'.$i)->getValue();
    		$productnameKH = $sheet->getCell('C'.$i)->getValue();
    		$WH1 = $sheet->getCell('D'.$i)->getValue();
    		$WH2 = $sheet->getCell('E'.$i)->getValue();
    		$cost = $sheet->getCell('F'.$i)->getValue();
    		$item = array();

    		$item["BARCODE"] = $barcode;
    		$item["PRODUCTNAME"] = $productnameEN;
    		$item["PRODUCTNAME1"] = $productnameKH;
			$item["WH1"] = $WH1;
			$item["WH2"] = $WH2;    		
			$item["COST"] = $cost;	


			if ($loc == "WH1")
				$item["NEW_QTY"] =	(intval($WH1)) + $locondhand;	
			else if  ($loc == "WH2")
				$item["NEW_QTY"] = 	(intval($WH2)) + $locondhand;

    		array_push($data,$item);
    	}    	
	}
    return $data;

}


function RemoveAdjusted($filename)
{
	$conn=getDatabase();
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    $data = array();
    for($i = 2;$i < $highestRow;$i++)    	
    {
    	$barcode = $sheet->getCell('A'.$i)->getValue();    	
    	$qty = $sheet->getCell('B'.$i)->getValue();    	
    	$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('AD','AI')
			AND TRANDATE BETWEEN '2020-06-04 00:00:00.000' AND '2020-06-17 23:59:59.000'";		
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,"WH1"));
		$item = $req->fetch(PDO::FETCH_ASSOC);
		if ($item["NB"] == "0" || $item["NB"] == 0){
			$newItem["BARCODE"] = $barcode;
			$newItem["QTY"] = $qty;
			array_push($data,$newItem); 
		}		
    }
    return $data;
}

function RemoveSale($items,$loc = "WH1")
{
	$conn=getDatabase();	
    $data = array();
    foreach($items as $item)    	
    {
    	$barcode = $item["BARCODE"]; 
    	$qty = $item["QTY"];
    	$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('I')
			AND TRANDATE BETWEEN '2020-06-05 00:00:00.000' AND '2020-06-16 23:59:59.000'";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,$loc));
		$item = $req->fetch(PDO::FETCH_ASSOC);		
		if ($item["NB"] == "0" || $item["NB"] == 0)
		{
			$newItem["BARCODE"] = $barcode;
			$newItem["QTY"] = $qty;
			array_push($data,$newItem); 
		}		
    }
    return $data;
}

function ExtractSale($items,$loc = "WH1")
{
	$conn=getDatabase();	
    $data = array();
    foreach($items as $item)    	
    {
    	$barcode = $item["BARCODE"]; 
    	$qty = $item["QTY"];
    	$sql = 	"SELECT SUM(TRANQTY) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('I')
			AND TRANDATE BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-18 23:59:59.000'";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,$loc));
		$item = $req->fetch(PDO::FETCH_ASSOC);		
		if ($item["NB"] != "0" && $item["NB"] != 0)
		{
			$sql = "SELECT SUM(TRANQTY) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('AD','AI')
			AND TRANDATE BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-18 23:59:59.000'";
			$req = $conn->prepare($sql);
			$req->execute(array($barcode,$loc));
			$adjust = $req->fetch(PDO::FETCH_ASSOC);
			if ($adjust != null) 		
				$adjust = $adjust["NB"];
			else 
				$adjust = 0;

			$newItem["BARCODE"] = $barcode;
			$newItem["QTY"] =  + $qty  + intval($item["NB"]) + intval($adjust);
			array_push($data,$newItem); 
		}		
    }
    return $data;
}


function calculateSalesAdjust($filename){
	$conn=getDatabase();
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    $data = array();
    for($i = 2;$i < $highestRow;$i++)    	
    {
    	$barcode = $sheet->getCell('A'.$i)->getValue();    	
    	$qty = $sheet->getCell('B'.$i)->getValue();    	
    	
    	$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('AD','AI')
			AND TRANDATE BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-19 23:59:59.000'";		
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,"WH1"));
		$item = $req->fetch(PDO::FETCH_ASSOC);
		$adjQty = intval($item["NB"]) * (-1);

		$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('TR','TI')
			AND TRANDATE BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-19 23:59:59.000'";		
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,"WH1"));
		$item = $req->fetch(PDO::FETCH_ASSOC);
		$trQty = intval($item["NB"]);


		$sql = 	"SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('I')
			AND TRANDATE BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-19 23:59:59.000'";		
		$req = $conn->prepare($sql);
		$req->execute(array($barcode,"WH1"));
		$item = $req->fetch(PDO::FETCH_ASSOC);
		$saleQty = intval($item["NB"]);

		//echo "AdjQty: ".$adjQty."| SaleQty: ".$saleQty."\n";

		$finalQty = $adjQty + $trQty + $saleQty;
		
		$newItem["BARCODE"] = $barcode;
		$newItem["QTY"] = $finalQty;
		array_push($data,$newItem); 		
		
    }
    return $data;
}


$data = calculateSalesAdjust("./OnlySalesUpdated.xlsx");
//echo "Step 1:".count($data)."\n";
//$data = ExtractSale($data);
//echo "Step 2:".count($data)."\n";
generateExcel2($data,"OnlySalesLast.xlsx")


?>
	