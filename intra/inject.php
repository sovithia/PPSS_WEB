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


function go()
{	
	$db = getDatabase();
	if (($handle = fopen("costzero.csv", "r")) !== FALSE) 
	{
    	while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) 
    	{
    		$split = explode(";",$data[0]);
    		if ($split[1] != "0")
    		{
    			echo $split[0].":".str_replace(',','.',$split[1])."\n"; 

    			$sql = "UPDATE ICPRODUCT SET LASTCOST = ? WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array(str_replace(',','.',$split[1]),$split[0]));  
				usleep(100000);
				//break;	
    		}

    		
        }
    }
    fclose($handle);
}

go();

?>