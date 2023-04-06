<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
    $conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	return $conn;
}

function go()
{
    $db = getDatabase();
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load("products.xlsx");    
    $worksheet = $spreadsheet->getActiveSheet();  
    $allData = array(); 
    $count = 0;
    foreach ($worksheet->getRowIterator() AS $row) 
    {
      if ($count == 0){
          $count++;
          continue;
      }
      $data = array();            
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
      $cells = [];    
      foreach ($cellIterator as $cell) 
      {        
        $productID = "";
        $address = "";        
        if ($cell->getColumn() == "A" && $cell->getValue() != "")
            $productID = $cell->getValue();                             
        if ($cell->getColumn() == "B" && $cell->getValue() != "")                  
            $address = $cell->getValue();
        echo ("ProductID:".$productID."|Address:".$address."\n");
        /*
        if ($productID != "" && $address != ""){
            $sql = "UPDATE ICLOCATION SET STORBIN = ? WHERE PRODUCTID = ? AND LOCID ='WH1' ";
            $req = $db->prepare($sql);
            $req->execute(array($address,$productID));  
        } 
        */  
                                                 
      }      
    } 
}

go();
    