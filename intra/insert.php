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
      $productID = "";
      $address = "";        
      foreach ($cellIterator as $cell) 
      {        
        
        if ($cell->getColumn() == "A" && $cell->getValue() != "")
            $productID = $cell->getValue();                             
        if ($cell->getColumn() == "B" && $cell->getValue() != "")                  
            $address = $cell->getValue();               
      }
     if ($productID != "" && $address != ""){
            echo ("ProductID:".$productID."|Address:".$address."\n");       
            sleep(1);
            $sql = "UPDATE ICLOCATION SET STORBIN = ? WHERE PRODUCTID = ? AND LOCID ='WH1' ";
            $req = $db->prepare($sql);
            $req->execute(array($address,$productID));  
        }                       
    } 
}

function go2()
{
    $db = getDatabase();
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load("MultiVendorItems.xlsx");    
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
      $productID = "";
      $policy = "";        
      foreach ($cellIterator as $cell) 
      {        
        
        if ($cell->getColumn() == "B" && $cell->getValue() != "")
            $productID = $cell->getValue();                             
        if ($cell->getColumn() == "C" && $cell->getValue() != "")                  
            $policy = $cell->getValue();               
      }
     if ($productID != "" && $policy != ""){
            echo ("ProductID: ".$productID."|Policy: ".$policy."\n");       
            //sleep(1);
            $sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($policy,$productID));  
        }                       
    } 
}

go2();
    