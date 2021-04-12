<?php 

ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);
error_reporting(E_ALL);


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function getDatabase()
{ 
	$conn = null;      
	try  {  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e){   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}

function getInternalDatabase()
{
	try{
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function Go($filename,$loc)
{
	$conn=getDatabase();
	$data = array();
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
    $sheet = $spreadsheet->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    for($i = 1;$i < $highestRow;$i++)
    {
    	$section = $sheet->getCell('A'.$i)->getValue();    	
    	$department = $sheet->getCell('B'.$i)->getValue();    	
    	$category = $sheet->getCell('C'.$i)->getValue();    	
    	
    	//echo $section.":".$department.":".$category."\n";
    	$sql = "UPDATE ICCATEGORY SET SECTION = ?, DEPARTMENT = ?  WHERE CATEGORYID = ?";
    	$req = $conn->prepare($sql);
		$req->execute(array($section,$department,$category));	
	}

}

$data = Go("./CategoryList.xlsx","WH1");


?>
	