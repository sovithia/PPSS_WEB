<?php 

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


function old()
{
	//$indb = getInternalDatabase();
	//$sql = "SELECT * FROM CATEGORY";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$categories=$req->fetchAll(PDO::FETCH_ASSOC);	

	$db = getDatabase();
	$date = "2020-04-09 12:00:00.000";
	foreach($categories as $category)
	{
		$sql = "INSERT INTO ICCATEGORY (CATEGORYID,USERADD,ACTIVE,DATEADD) VALUES (?,?,?,?)";		
		$req2 = $db->prepare($sql);
		$req2->execute(array($category["CATEGORYNAME"],"SOVI",1,$date));					
	}	
}


function go2()
{	
	$db = getDatabase();
	$sql = "SELECT CATEGORYID,PRODUCTID FROM ICPRODUCT WHERE CATEGORYOLDID IS NULL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$categories=$req->fetchAll(PDO::FETCH_ASSOC);	
	//var_dump($categories);	
	foreach($categories as $category)
	{
		//echo $category["PRODUCTID"]."\n";
		$sql2 = "UPDATE ICPRODUCT SET CATEGORYOLDID = ? WHERE PRODUCTID = ?";
		$req2 = $db->prepare($sql2);
		$req2->execute(array($category["CATEGORYID"],$category["PRODUCTID"]));		
		//usleep(1000000);
		//break;
	}

}

function go()
{	
	$db = getDatabase();
	$sql = "SELECT CATEGORYNEWID,PRODUCTID FROM ICPRODUCT WHERE CATEGORYNEWID IS NOT NULL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$categories=$req->fetchAll(PDO::FETCH_ASSOC);	
	//var_dump($categories);	
	foreach($categories as $category)
	{
		//echo $category["PRODUCTID"]."\n";
		$sql2 = "UPDATE ICPRODUCT SET CATEGORYID = ? WHERE PRODUCTID = ?";
		$req2 = $db->prepare($sql2);
		$req2->execute(array($category["CATEGORYNEWID"],$category["PRODUCTID"]));		
		//usleep(1000000);
		//break;
	}

}





go();

?>