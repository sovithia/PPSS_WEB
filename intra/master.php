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


function generateExcel($items)
{
         

    $alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R"];


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->getColumnDimension('B')->setWidth(50);
    $sheet->getColumnDimension('C')->setWidth(35);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(8);
    $sheet->getColumnDimension('F')->setWidth(8);
    $sheet->getColumnDimension('G')->setWidth(10);
    $sheet->getColumnDimension('H')->setWidth(10);
    
    
    $sheet->setCellValue('A1', 'IDENTIFIER'); 
    $sheet->setCellValue('B1', 'NAME_EN'); 
    $sheet->setCellValue('C1', 'NAME_KH'); 
    $sheet->setCellValue('D1', 'CATEGORY'); 
    $sheet->setCellValue('E1', 'COST'); 
    $sheet->setCellValue('F1', 'PRICE'); 
	$sheet->setCellValue('G1', 'SALEUNIT'); 
	$sheet->setCellValue('H1', 'SALEFACTOR'); 


    $count = 2;    

    foreach($items as $item)    
    {              
        $sheet->getRowDimension($count)->setRowHeight(20); 
         
        $sheet->setCellValue('A'.$count,$item["PRODUCTID"]);
        $sheet->setCellValue('B'.$count,$item["PRODUCTNAME"]);
        $sheet->setCellValue('C'.$count,$item["PRODUCTNAME1"]);
        $sheet->setCellValue('D'.$count,$item["CATEGORYID"]);
        $sheet->setCellValue('E'.$count,$item["LASTCOST"]);
        $sheet->setCellValue('F'.$count,$item["PRICE"]);

        if ($item["PACKS"] != null)
        {
        	foreach($item["PACKS"] as $packitem)
        	{
        		$count++;
        		$sheet->getRowDimension($count)->setRowHeight(20); 
        		$sheet->setCellValue('A'.$count,$packitem["PACK_CODE"]);
        		$sheet->setCellValue('B'.$count,$packitem["DESCRIPTION1"]);
        		$sheet->setCellValue('C'.$count,$packitem["DESCRIPTION2"]);
        		$sheet->setCellValue('F'.$count,$packitem["SALEPRICE"]);
        		$sheet->setCellValue('G'.$count,$packitem["SALEUNIT"]);
        		$sheet->setCellValue('H'.$count,$packitem["SALEFACTOR"]);
        	}
        }  
        $count++;
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('FullMaster.xlsx');
}


function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2031 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

function downloadFile($filename)
{  
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=\"". basename($filename) ."\""); 
    readfile ($filename);
    exit(); 
}

$items = Service::ListEntity("master");     
generateExcel($items);    
downloadFile("FullMaster.xlsx");

?>