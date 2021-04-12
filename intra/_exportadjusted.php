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

function purifyData($data)
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


function generateExcel($items,$type = 1,$setQuantity = false)
{
        
    $fields = ["barcode","name","oldqty","newqty","location","storebin","cost","difference","toadjust","date","author"]; 

    $alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R"];


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getColumnDimension('B')->setWidth(15);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(8);

    $sheet->getColumnDimension('F')->setWidth(8);
    $sheet->getColumnDimension('G')->setWidth(30);
    $sheet->getColumnDimension('H')->setWidth(8);
    $sheet->getColumnDimension('I')->setWidth(8);
    $sheet->getColumnDimension('J')->setWidth(8);

    $sheet->getColumnDimension('K')->setWidth(8);
    $sheet->getColumnDimension('L')->setWidth(8);
    $sheet->getColumnDimension('M')->setWidth(10);
    $sheet->getColumnDimension('N')->setWidth(10);

    $sheet->getColumnDimension('O')->setWidth(10);
    $sheet->getColumnDimension('P')->setWidth(10);
    $sheet->getColumnDimension('Q')->setWidth(10);
    $sheet->getColumnDimension('R')->setWidth(10);
    
    $alphacount = 0;

   
    foreach($fields as $field )
    {
        $sheet->setCellValue($alphabet[$alphacount].'1', $field); 
        $alphacount++;     
    }

 
    $count = 2;    

    

    foreach($items as $item)    
    {                      
        $sheet->getRowDimension($count)->setRowHeight(100); 
         
        

        $alphacount = 0;
        foreach($fields as $field )
        {            
            if ($field == "IMAGE")
            {
                
                $path = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
                $data = file_get_contents($path);
            
                if ($data != null)
                {                    
                    file_put_contents("images/products/".$item["PRODUCTID"].".png", $data);
                    $sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $sheeti->setName('name');
                    $sheeti->setDescription('description');
                    $sheeti->setPath('./images/products/'.$item["PRODUCTID"].'.png');
                    $sheeti->setHeight(90); 
                    $sheeti->setCoordinates("A".$count);
                    $sheeti->setOffsetX(10);
                    $sheeti->setOffsetY(1);
                    $sheeti->setWorksheet($sheet);
                }               
            }
            else if ($field == "QTY")            
                $sheet->setCellValue($alphabet[$alphacount].$count, $_POST["qty".$item["PRODUCTID"]]);                                   
            else
            {            
                if (isset($item[$field]))
                    $sheet->setCellValue($alphabet[$alphacount].$count, $item[$field]);                       
            }
           $alphacount++;
        }
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');
    
    $files = glob('images/products/*'); 
    foreach($files as $file){ 
    if(is_file($file))
        unlink($file); 
}
}



function generateCSV($data)
{   
   ob_start();
   $df = fopen("php://output", 'w');
	foreach($data as $key => $value)
	{
        $val = ($value != "") ? $value : 0;
        if ($val != 0 && $val != "0")
            fputcsv($df,array(substr($key,3),$val));    
	}
	fclose($df);
  return ob_get_clean();
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

//$items = purifyData($_POST);
  //  generateExcel($items,$type);    
   // downloadFile("data.xlsx");

$items = Service::ListEntity("adjusteditems");  
generateExcel($items,"adjusteditems");
downloadFile("data.xlsx");  

die();


?>