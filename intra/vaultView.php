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



function getInternalDatabase()
{
	try{
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}



$id = $_GET["ID"];
$db = getInternalDatabase();
$sql = "SELECT * FROM VAULT WHERE ID = ?";
$req = $db->prepare($sql);
$req->execute(array($id)); 
$vault=$req->fetch(PDO::FETCH_ASSOC);	


$items = json_decode($vault["jsondata"], TRUE); 


$body = "

<center>
<form method='POST'>
<input type='submit' value='Export' />
<input type='hidden' name='action' value='export' />

<table border='1'>
			<tr>
				<th>IMAGE</th>
				<th>ID</th>
				<th>PRODUCTNAME</th>
                <th>ONHAND</th>
                <th>LOCATION</th>
                <th>ORDER QTY</th>

				<th></th>
			</tr>";


if ($items != null){
    foreach ($items as $item){
        $body .= "<tr>";
        $body .= "<td><img height='200px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["ID"]."'></td>";
        $body .= "<td>".$item["ID"]."</td>";
        $body .= "<td>".$item["PRODUCTNAME"]."</td>";
        $body .= "<td>".$item["ONHAND"]."</td>";
        $body .= "<td>".$item["LOCATION"]."</td>";
        $body .= "<td>".$item["ORDERQUANTITY"]."</td>";

        $body .= "<td><input type='hidden' name='".$item["ID"]."' value='".json_encode($item)."')></td>";
        $body .= "</tr>";
    }

}

$body .= "</table></form><center>";



if(isset($_POST['action']) && $_POST['action'] == 'export'){

	$items = purifyData($_POST);         		
	generateExcel($items);    
	downloadFile("data.xlsx");	
}else{
	echo $body;
}

 

function purifyData($data)
{        
    $result = array();    
    foreach($data as $key => $value)    
    {             
        if ($key == 'action' || $value == null)
            continue;                     
        array_push($result,json_decode($value,true));                        
    }   
    return $result;
}

function escapeJS($string)
{

    $string =  str_replace("\n", '\n', $string);
    $string = str_replace('"', '\"',$string);
    $string = str_replace("'", "’",$string);    
    return $string;
}


function generateExcel($items)
{

    $fields = array("IMAGE","ID","PRODUCTNAME","ONHAND","LOCATION","ORDERQUANTITY");

    $alphabet = ["A","B","C","D","E","F"];


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getColumnDimension('B')->setWidth(15);
    $sheet->getColumnDimension('C')->setWidth(80);

    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->getColumnDimension('F')->setWidth(20);
    
    
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
     

        if (!isset($item["ID"]))
            continue;
        
        $alphacount = 0;
        foreach($fields as $field )
        {            
            if ($field == "IMAGE")
            {
                
                $path = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["ID"];
                $data = file_get_contents($path);
            
                if ($data != null)
                {                    
                    file_put_contents("images/products/".$item["ID"].".png", $data);
                    $sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $sheeti->setName('name');
                    $sheeti->setDescription('description');
                    $sheeti->setPath('./images/products/'.$item["ID"].'.png');
                    $sheeti->setHeight(90); 
                    $sheeti->setCoordinates("A".$count);
                    $sheeti->setOffsetX(10);
                    $sheeti->setOffsetY(1);
                    $sheeti->setWorksheet($sheet);
                }               
            }                                               
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

?>
