<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '10000M');
error_reporting(E_ALL);

include('service.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function fieldsPresets($type)
{       
    if ($type == "EXPORT")
        return ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE",
                "PRICE","COST","VENDNAME","TOTALRECEIVE","TOTALSALE",
                "CNT","WH1","WH2","CATEGORYID","COLOR"];   
    else if ($type == "EXPORT2")
        return ["IMAGE","BARCODE","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE",
                "VENDNAME","TOTALRECEIVE","TOTALSALE","TOTALTHROWN","ONHAND",
                "WH1","WH2","CATEGORYID","COST","COSTWITHPROMO",
                "AVGCOST","LASTCOST","PRICE","PRICEWITHPROMO","SALEINPERIOD","LASTRECEIVEDATE","LASTRECEIVEQTY"];
    else if ($type == "EXPORTALL")
        return ["IMAGE","BARCODE","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE",
                "VENDNAME","TOTALRECEIVE","TOTALSALE","TOTALTHROWN","ONHAND",
                "WH1","WH2","CATEGORYID","COST","COSTWITHPROMO",
                "AVGCOST","LASTCOST","PRICE","PRICEWITHPROMO","SALEINPERIOD","LASTRECEIVEDATE","LASTRECEIVEQTY"];
    else if ($type == "EXPORTSELECT")
        return ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE","PRICE","COST","VENDNAME","TOTALRECEIVE","TOTALSALE","CNT","WH1","WH2","CATEGORYID","COLOR"];   
    else if ($type == "POEXPORT")
        return ["IMAGE","PRODUCTID","QTY","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE","PRICE","LASTCOST","VENDNAME","TOTALRECEIVE","TOTALSALE","CNT","WH1","WH2","CATEGORYID","COLOR","SALEPERCENT"];
    else if ($type == 'bestseller')
        return ["IMAGE","PRODUCTNAME","PRODUCTID","COUNT","PRICE","COST","VENDNAME","TOTALRECEIVE","TOTALSALE","WH1","WH2","CATEGORYID","COLOR"];    
    else if ($type == 'fresh')
        return ["IMAGE","BARCODE","PRODUCTNAME","PRODUCTNAME1","VENDNAME","TOTALRECEIVE","TOTALSALE","ONHAND","WH1","WH2","CATEGORYID","COLOR","COST","PRICE","LASTRECEIVEDATE"];
    else if($type == "selection")    
        return ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PRICE","COST","VENDNAME","TOTALRECEIVE","TOTALSALE","PERCENTSALE","WH1","WH2","CATEGORYID","COLOR"];
    else if ($type == "itemzerostock")
        return ["IMAGE","BARCODE","PRODUCTNAME","PRODUCTNAME1","VENDNAME","ONHAND","WH1","WH2"];
    else if ($type == 'promotion')
        return ["IMAGE","PRODUCTID","PRODUCTNAME","DISCPERCENT","BEFORE","PRICE","FROM","TO","VENDNAME","TOTALRECEIVE","TOTALSALE","WH1","WH2","CATEGORYID","COLOR"];
    else if ($type == 'itemnegative')
        return ["IMAGE","PRODUCTID","PRODUCTNAME","VENDNAME","TOTALRECEIVE","TOTALSALE","ONHAND","WH1","WH2","CATEGORYID","COLOR","PRICE","SALELAST30","LASTRECEIVEDATE","LASTSALEDATE"];
    else if ($type == 'zerosale')
        return ["IMAGE","BARCODE","PRODUCTNAME","VENDNAME","TOTALRECEIVE","TOTALSALE","ONHAND","WH1","WH2","CATEGORYID","COLOR","PRICE","LASTRECEIVEDATE","LASTSALEDATE"];
    else if ($type == "costzero")
        return ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PRICE","COST","VENDNAME","TOTALRECEIVE","TOTALSALE","ONHAND","WH1","WH2","CATEGORYID","COLOR",
                "LASTRECEIVEDATE","LASTSALEDATE"];      
   else if ($type == "lowprofit")
        return ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PRICE","COST","AVGCOST","PROFIT","VENDNAME","TOTALRECEIVE","TOTALSALE","ONHAND","WH1","WH2","CATEGORYID","COLOR","SALELAST30",
                "LASTRECEIVEDATE","LASTSALEDATE"];      
   else if ($type == "adjusteditems")      
        return ["PRODUCTID","name","oldqty","newqty","location","storebin","cost","difference","toadjust","date","author"]; 
    else if ($type == "lowseller")
         return ["IMAGE","PRODUCTID","PERCENTSALE","LOCATION","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE","TOTALSALE","TOTALTHROWN","TOTALRECEIVE","VENDNAME","ONHAND","WH1","WH2","CATEGORYID","LASTCOST","PRICE","DISCPERCENT"];
    else if ($type == "vault")
        return ["IMAGE","ID","PRODUCTNAME","ONHAND","LOCATION","ORDERQUANTITY"];
    else if ($type == "progression")
        return ["IMAGE","BARCODE","PRODUCTNAME","last1","last2","last3","last4","last4"];    
    else if ($type == "ecommerce")
        return ["IMAGE","PRODUCTNAME","PRODUCTNAME1","PACKING","ONHAND","CATEGORYID","COUNTRY","COST","PRICE","MARGIN"];  
    
    else if ($type == "itemrequestactionpool_PURCHASE" || 
             $type == "itemrequestactionpool_TRANSFER" ||  
             $type == "itemrequestactionpool_RESTOCK")
        return ["IMAGE", "PRODUCTNAME","PRODUCTID","PACKINGNOTE","VENDNAME","REQUEST_QUANTITY"];

    else if ($type == "depleteditems")
    {
        return ["IMAGE","PRODUCTID","PRODUCTNAME", "VENDNAME","WH1","WH2","ORDERPOINT","ORDERQUANTITY"];    
    }
}


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


function purifySelectedData($data)
{
    $result = array();    
    foreach($data as $key => $value)    
    {     
        if (substr($key,0,3) == 'qty' || $value == null || $key == 'full' || $key == 'type' ||
            $key == 'resultTable_length')
            continue;
        $json = json_decode($value,true);        
        if (!isset($data["b".$json["PRODUCTID"]]))
            continue;     
        array_push($result,$json);
    }    
    return $result;

}


function generateExcel($items,$type = 1,$setQuantity = false)
{
        
    $fields = fieldsPresets($type);  

    $alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V"];


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
    
    $alphacount = 0;

   
    foreach($fields as $field )
    {
        $sheet->setCellValue($alphabet[$alphacount].'1', $field); 
        $alphacount++;     
    }

 
    $count = 2;    

    

    foreach($items as $item)    
    {  
        if ($item["PRODUCTID"] == "153020") // MYSTERY
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

function generatePricesCalculatorExcel($items)
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

        $costMin = $item["COST"] + $item["MIN"];
        $costAvg = $item["COST"] + $item["AVG"];
        $costMax = $item["COST"] + $item["MAX"];

        $sheet->getRowDimension($count)->setRowHeight(100); 
                                   
        $sheet->setCellValue('A'.$count ,$item["BARCODE"]);
        $sheet->setCellValue('B'.$count ,$item["NAME-EN"]);
        $sheet->setCellValue('C'.$count ,$item["NAME-KH"]);
        $sheet->setCellValue('D'.$count ,$item["COST"]);
        $sheet->setCellValue('E'.$count ,$item["CATEGORY"]);
        $sheet->setCellValue('F'.$count ,$costMin."(+".$item["MIN"].")");
        $sheet->setCellValue('G'.$count ,$costAvg."(+".$item["AVG"].")");
        $sheet->setCellValue('H'.$count ,$costMax."(+".$item["MAX"].")");       
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('calculated.xlsx');
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




$type = isset($_POST["type"]) ? $_POST["type"] : 0;
//var_dump($type);
//exit;
//if($type == 0)
//    $type =  "EXPORTALL";
if ($type == "EXPORTALL")
{
    $items = Service::ListEntity("itemsearch2","?zerosale=YES&thrownstart=2015-01-01&thrownend=2030-01-01&sellstart=2015-01-01&sellend=2030-01-01");     
    error_log("DOWNLOAD DONE");
    generateExcel($items,$type);    
    downloadFile("data.xlsx");
}
else if ($type == "POEXPORT")
{ 
    $items = purifyData($_POST);            
    generateExcel($items,$type,true);    
    downloadFile("data.xlsx");
}
else if ($type == "itemnegative")
{
    $items = Service::ListEntity("itemnegative","?page=-1");     
    generateExcel($items,"itemnegative");
    downloadFile("data.xlsx");  
}
else if ($type == "itemzerostock")
{
    $items = Service::ListEntity("itemzerostock","?page=-1");     
    generateExcel($items,"itemzerostock");
    downloadFile("data.xlsx");     
}
else if ($type == "zerosale")
{
    $items = Service::ListEntity("zerosale","?page=-1");     
    generateExcel($items,"zerosale");
    downloadFile("data.xlsx");
}
else if ($type == "pricecalculator")
{
    $items = json_decode($_POST["items"],true);
    generatePricesCalculatorExcel($items);    
    downloadFile("calculated.xlsx");
}
else if ($type == "EXPORTSELECT")
{
    $items = purifySelectedData($_POST);    
    generateExcel($items,$type);    
    downloadFile("data.xlsx");
}                  
else if ($type == "itemrequestactionpool_PURCHASE" || 
         $type == "itemrequestactionpool_TRANSFER" || 
         $type == "itemrequestactionpool_RESTOCK" || 
         $type == "depleteditems")
{

    $items = json_decode($_POST["items"],true);        
    generateExcel($items,$type);
    downloadFile("data.xlsx");
}
else// itemsearch, fresh sales, low profit, cost zero, selection adjusteditems
{             
    $items = purifyData($_POST);
          
    generateExcel($items,$type);        
    downloadFile("data.xlsx");
} 

die();


?>