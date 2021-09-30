<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '10000M');
error_reporting(E_ALL);

include('service.php');
require 'vendor/autoload.php';
require('../api/functions.php');


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


function generateExcel($items,$fields,$setQuantity = false)
{


    $alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];


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
    $sheet->getColumnDimension('S')->setWidth(10);
    $sheet->getColumnDimension('T')->setWidth(10);
    $sheet->getColumnDimension('U')->setWidth(10);
    $sheet->getColumnDimension('V')->setWidth(10);
    $sheet->getColumnDimension('W')->setWidth(10);
    $sheet->getColumnDimension('X')->setWidth(10);
    $sheet->getColumnDimension('Y')->setWidth(10);
    $sheet->getColumnDimension('Z')->setWidth(10);
    
    $alphacount = 0;

   
    foreach($fields as $field )
    {
        $sheet->setCellValue($alphabet[$alphacount].'1', $field); 
        $alphacount++;     
    }

 
    $count = 2;    
        
    foreach($items as $item)    
    {  
    
        if (isset($item["PRODUCTID"]) && $item["PRODUCTID"] == "153020") // MYSTERY
            continue;        

        $sheet->getRowDimension($count)->setRowHeight(100); 
         
        if ($setQuantity == true)
        {            
            if ($_POST["qty".$item["PRODUCTID"]] == "0" || 
                $_POST["qty".$item["PRODUCTID"]] == 0)
                continue;
        }           

        if (!isset($item["PRODUCTID"]))
            continue;
        


        $alphacount = 0;
        foreach($fields as $field )
        {            
            if ($field == "IMAGE")
            {
                
                $path = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
                //$data = file_get_contents($path);
            

                $ch = curl_init(); //curl handler init
                curl_setopt($ch,CURLOPT_URL,$path);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);// set optional params
                curl_setopt($ch,CURLOPT_HEADER, false); 
                $data=curl_exec($ch); 
                curl_close($ch);
 

                if ($data != null && $data != false)
                {                    
                    file_put_contents("images/products/".$item["PRODUCTID"].".png", $data);
                    if (file_exists('./images/products/'.$item["PRODUCTID"].'.png'))
                    {
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
            }
            else if ($field == "QTY")            
                $sheet->setCellValue($alphabet[$alphacount].$count, $_POST["qty".$item["PRODUCTID"]]);                                   
            else
            {            
                if (isset($item[$field])){
                    $item[$field] = str_replace("<hr>","\n",$item[$field]);
                    $sheet->setCellValue($alphabet[$alphacount].$count, $item[$field]);                       
                }
            }
           $alphacount++;
        }
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');
    
    $files = glob('images/products/*'); 
    //foreach($files as $file){ 
    //if(is_file($file))
      //  unlink($file); 
    //}
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
    	 if ($item == "" || $item == null)
            continue;
    	 $sheet->getRowDimension($count)->setRowHeight(100); 
   
		$orderstats = orderStatistics($item,"RESTOCK");


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