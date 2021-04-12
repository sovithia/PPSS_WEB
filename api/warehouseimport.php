<?php 
require_once 'vendor/autoload.php';
require_once 'RestEngine.php';


function getDatabase()
{ 
	$conn = null;      
	try  
	{  
	
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
	die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}


// Open the file for reading
if (($h = fopen("warehouse.csv", "r")) !== FALSE) 
{
  $db = getDatabase();
  $i = 0;
  // Convert each line into the local $data variable
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {		  	
  	echo $data[1].":".$data[0].": $i"."\n";
  	$params = array($data[1],$data[0]);
  	$sql = "UPDATE ICLOCATION set STORBIN = ? WHERE PRODUCTID = ? AND LOCID = 'WH2'";
  	$req = $db->prepare($sql);
  	$req->execute($params);
  	$i++;
  	// break;
    // Read the data from a single line
  }
  echo "DONE";
  // Close the file
  fclose($h);
}


/*
$conn=getDatabase();
	$params = array($barcode);
	$sql = "SELECT PRODUCTID,SALEPRICE,DESCRIPTION1,SALEUNIT,DISC,EXPIRED_DATE,SALEFACTOR FROM ICPRODUCT_SALEUNIT WHERE BARCODE = ?"; 	
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item=$req->fetch(PDO::FETCH_ASSOC);	
		
	$json = RestEngine::GET("http://192.168.72.57/api/api.php/picture/".$barcode);      
	if ($item != false)
	{
		if ($json["result"] != "KO")			
			$item["PICTURE"] = $json["image"];
		else
			$item["PICTURE"] = null;	
		return $item;
	}
	else
		return null;
*/


?>