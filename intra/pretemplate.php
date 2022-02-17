<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '10000M');
error_reporting(E_ALL);

include('service.php');
require 'vendor/autoload.php';
require('../api/functions.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function extractItems($data)
{        
    $result = array();    
    foreach($data as $key => $value)    
    {             
        
        if (substr($key,0,3) == 'qty' || $value == null || $key == 'full' || 
            $key == 'type' || $key == 'resultTable_length'){
            continue;
        }                
        array_push($result,json_decode($value,true));                        
    }    
    return $result;
}


function downloadFile($filename)
{  
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=\"". basename($filename) ."\""); 
    readfile ($filename);
    exit(); 
}

function extractProducts()
{
	$allProducts = array();
	if (isset($_FILES["filename"]))
    {
      $filename = $_FILES["filename"]["tmp_name"];
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $reader->setReadDataOnly(true);
      $spreadsheet = $reader->load($filename);    
      $worksheet = $spreadsheet->getActiveSheet();  
      $allData = array(); 
            
      foreach ($worksheet->getRowIterator() AS $row) 
      {
          
        $data = array();            
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(TRUE); // This loops through all cells,
        $cells = [];    
        foreach ($cellIterator as $cell) 
          {        
              if ($cell->getColumn() == "A")
              	array_push($allProducts,$cell->getValue());                                
          }          
       }       
     }
     return $allProducts;
}

function generateExcel($items)
{

    $alphabet = ["A","B","C","D","E",];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(20);
    
	$sheet->setCellValue('A1', 'PRODUCTID'); 
	$sheet->setCellValue('B1', 'DECISION'); 
	$sheet->setCellValue('C1', 'MAXQTY'); 
	$sheet->setCellValue('D1', 'REQUESTQTY'); 
	$sheet->setCellValue('E1', 'SPECIALQTY'); 
	$sheet->setCellValue('F1', 'REASON'); 

    $count = 2;            
    foreach($items as $item)    
    {  
        if ($item == "PRODUCTID")
            continue;        
    	 if ($item == "" || $item == null)
            continue;
    	 $sheet->getRowDimension($count)->setRowHeight(50); 
   
		$orderstats = orderStatistics($item);        

		$sheet->setCellValue('A'.$count, $item);                       
		if ($orderstats == "NOT FOUND" || $orderstats == "INACTIVE"){
			$sheet->setCellValue('B'.$count, $orderstats);                       
			$sheet->setCellValue('C'.$count, "0");
		}		
		else{
			$sheet->setCellValue('B'.$count, $orderstats["DECISION"]);
			$sheet->setCellValue('C'.$count, $orderstats["FINALQTY"]);
		}
		
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');       
}

$items = extractProducts();
generateExcel($items);        
downloadFile("data.xlsx");
?>