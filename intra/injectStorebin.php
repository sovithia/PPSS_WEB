<?php 

ini_set('memory_limit', '-1');
set_time_limit(0);


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


function DoAction()
{
	$conn = getDatabase();
	$fn = fopen("FrontstoreStorebin.csv","r"); 
  	while(! feof($fn))  
  	{
		$result = fgets($fn);
		$splitted =  explode(',',$result); 
		$barcode = $splitted[0];
		$storebin = $splitted[1];
		
		$params = array($storebin,$barcode);
		$sql = "UPDATE ICLOCATION set STORBIN = ? WHERE PRODUCTID = ? AND LOCID = 'WH1'";		
		$conn->prepare($sql);
		$req = $conn->prepare($sql);
		$req->execute($params);
		echo $barcode.":".$storebin;		
		//sleep(1);		
  	}
}

DoAction();

?>