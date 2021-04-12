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


function HuntGhost($location)
{
	$db = getInternalDatabase();
	$sql = "SELECT barcode FROM ITEMADJUST WHERE location = '".$location."' ";
	echo $sql;
	$req = $db->prepare($sql);
	$req->execute(array());
	$barcodes=$req->fetchAll(PDO::FETCH_ASSOC);
	$justBarcodes = array();
	foreach($barcodes as $barcode){
		array_push($justBarcodes,$barcode["barcode"]);
	}

	echo "STEP 1 : ".count($justBarcodes)."\n";		
	$count = 0;

	$allitems = master($location);
	$data = array();
	
	$count = 0;
	foreach($allitems as $oneItem)
	{		
		if (!in_array($oneItem["BARCODE"], $justBarcodes)) 	{
			array_push($data,$oneItem);					
					
		}
	}	
	echo "STEP 2\n";
	$finalData = array();
	foreach($data as $oneItem)
	{
		$conn=getDatabase();
		$params = array($barcode);
		//$sql = "SELECT count(*) as 'NB' FROM PORECEIVEDETAIL WHERE PRODUCTID = ? AND LOCID = ? AND TRANDATE > '2020-03-01'";  	

		$sql = "SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('AD','AI','I','R','TR','TI')
			AND TRANDATE BETWEEN '2020-01-01 00:00:00.000' AND '2020-06-15 23:59:59.000'
			AND TRANDATE NOT BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-03 23:59:59.000' 
			";

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
    $sheet->getColumnDimension('F')->setWidth(15);
    $sheet->getColumnDimension('G')->setWidth(15);
        
	$sheet->setCellValue('A1', "BARCODE"); 
	$sheet->setCellValue('B1', "PRODUCTNAME"); 
	$sheet->setCellValue('C1', "PRODUCTNAME1"); 
	$sheet->setCellValue('D1', "WH1"); 
	$sheet->setCellValue('E1', "WH2"); 
	$sheet->setCellValue('F1', "COST"); 
	
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
      	$sheet->setCellValue("F".$count,$item["COST"]);      	
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

function needRetrieval($barcode,$loc)
{
	$db = getDatabase();

	$sql = "SELECT count(*) as NB FROM ICTRANDETAIL 
			WHERE PRODUCTID = ?
			AND LOCID = ?
			AND TRANTYPE IN ('AD','AI','I','R','TR','TI')
			AND TRANDATE BETWEEN '2020-01-01 00:00:00.000' AND '2020-06-15 23:59:59.000'
			AND TRANDATE NOT BETWEEN '2020-06-01 00:00:00.000' AND '2020-06-03 23:59:59.000' 
			";
	$req = $db->prepare($sql);
	$req->execute(array($barcode,$loc));	

	$item=$req->fetch(PDO::FETCH_ASSOC);
	if ($item["NB"] == "0" || $item["NB"] == 0)
		return false;				

	return true;
}

$data = HuntGhost("WH1");
generateExcel($data,"NewGhost.xlsx")
/*
echo "Starting WH1...\n";
$items = Counted('WH1');
echo "Counted acquired...".count($items)."\n";
generateExcel($items,'GhostWH1.xlsx');
echo "WH1 File saved!\n";
*/

/*
echo "Starting WH2...\n";
$items = Counted('WH2');
generateExcel($items,'GhostWH2.xlsx');
echo "WH2 File saved!\n";
*/

//downloadFile("data.xlsx");
?>
	