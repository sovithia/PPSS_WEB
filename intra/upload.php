<form action='upload.php' method='POST' enctype="multipart/form-data">
    <input type="file" name="filename"><br>
    <input type="submit" value="Upload">
</form>

<?php 

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function readExcel()
{
    $filename = $_FILES["filename"]["tmp_name"];
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($filename);    
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
            if ($cell->getColumn() == "A")
                $data["PRODUCTID"] = $cell->getValue();
            if ($cell->getColumn() == "B")
                $data["QUANTITY"] = $cell->getValue();
            
             
        }
        array_push($allData,$data);
    } 
    return $allData;    
}


$data = readExcel();
var_dump($data);
?>