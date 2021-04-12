<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '1024M');
error_reporting(E_ALL);

include('service.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function downloadFile($filename)
{  
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=\"". basename($filename) ."\""); 
    readfile ($filename);
    exit(); 
}

function getItems()
{
	$inputFileType = 'Xls';
	$inputFileName = $_FILES['file']["tmp_name"];    
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);	
    $worksheet = $spreadsheet->getActiveSheet();
	$items = array();
    $header = true;

    for ($row = 2; true; ++$row) 
    {
        if ($worksheet->getCell('A'.$row)->getValue() == '')
            break;
        $barcode = $worksheet->getCell('A' . $row)->getValue();
        if ($barcode == '')
            break;
        $nameen = $worksheet->getCell('B' . $row)->getValue();
        $namekh = $worksheet->getCell('C' . $row)->getValue();
        $cost = $worksheet->getCell('D' . $row)->getValue();
        $category = $worksheet->getCell('E' . $row)->getValue();
        if ($category != "NONE")
        {            
            $itemdetails = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/calculatePrice?cost=".$cost."&category=".$category);     
            $oneitem["MIN"] = $itemdetails["MIN"];
            $oneitem["AVG"] = $itemdetails["AVG"];
            $oneitem["MAX"] = $itemdetails["MAX"];
        }
        else 
        {
            $oneitem["MIN"] = '';
            $oneitem["AVG"] = '';
            $oneitem["MAX"] = '';
        }
        $oneitem["BARCODE"] = $barcode;
        $oneitem["NAME-EN"] = $nameen;
        $oneitem["NAME-KH"] = $namekh;
        $oneitem["COST"] = $cost;
        $oneitem["CATEGORY"] = $category;

        
        array_push($items,$oneitem);        
    }
	return $items;
}


function generateExcel($items)
{
    $alphabet = ["A","B","C","D","E","F","G","H"];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', "BARCODE"); 
    $sheet->setCellValue('B1', "NAME-EN"); 
    $sheet->setCellValue('C1', "NAME-KH"); 
    $sheet->setCellValue('D1', "COST"); 
    $sheet->setCellValue('E1', "CATEGORY");     
    $sheet->setCellValue('F1', "MIN");         
    $sheet->setCellValue('G1', "AVG");         
    $sheet->setCellValue('H1', "MAX"); 

    $count = 2;     
    foreach($items as $item)    
    {            
        $sheet->getRowDimension($count)->setRowHeight(100); 
                                   
        $sheet->setCellValue('A'.$count ,$item["BARCODE"]);
        $sheet->setCellValue('B'.$count ,$item["NAME-EN"]);
        $sheet->setCellValue('C'.$count ,$item["NAME-KH"]);
        $sheet->setCellValue('D'.$count ,$item["COST"]);
        $sheet->setCellValue('E'.$count ,$item["CATEGORY"]);
        $sheet->setCellValue('F'.$count ,$item["MIN"]);
        $sheet->setCellValue('G'.$count ,$item["AVG"]);
        $sheet->setCellValue('H'.$count ,$item["MAX"]);       
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('calculated.xlsx');
}

$items = getItems();
generateExcel($items);    
downloadFile("calculated.xlsx");
?>