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

function updateProduct()
{
	$db = getDatabase();
	$indb = getInternalDatabase();

	$sql = "SELECT ID,returnpolicy FROM SUPPLIER";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$suppliers = $req->fetchAll(PDO::FETCH_ASSOC);

	$done = [];

	$i = 0;
	foreach($suppliers as $supplier)
	{
		if (in_array($supplier["ID"], $done))
			continue;
		$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE VENDID = ?";
		
		echo ">>>".$supplier["ID"]."<<<";

		$req = $db->prepare($sql);
		$req->execute(array("400-041"));
		$products = $req->fetchAll(pdo::FETCH_ASSOC);

		foreach($products as $product)
		{
			$sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			if($supplier["returnpolicy"] == "NR")
				$policy = "NR";
			else
				$policy = "R" . $supplier["returnpolicy"];  
			$req->execute(array($policy,$product["PRODUCTID"]));
			echo $product["PRODUCTID"] . "\n";
			usleep(100000);  
		}
	}
}

function updateProductsByVendor()
{
	$indb = getInternalDatabase();
	$db = getDatabase();
	if (($handle = fopen("policies.csv", "r")) !== FALSE) 
	{
    	while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) 
    	{			
    		$split = explode(";",$data[0]);
			$vendid = $split[0];
			$policy = $split[1];

			usleep(1000000);
    		echo ">>>>>> VENDOR: ".$vendid." ".$policy."<<<<<<<<<<\n";

			$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE VENDID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendid));
			$items = $req->fetchAll(PDO::FETCH_ASSOC);

			foreach($items as $item){
				echo "Updating: ".$item["PRODUCTID"]."\n";
				$sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE VENDID = ? AND PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($policy,$vendid,$item["PRODUCTID"]));    						
				usleep(100000);  		
			}	

        }
    }
}



function go()
{	
	$indb = getInternalDatabase();
	if (($handle = fopen("suppliers.csv", "r")) !== FALSE) 
	{
    	while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) 
    	{
    		$split = explode(";",$data[0]);
    		$day = $split[0];
    		$vendid = $split[1];
    		$vendname = $split[2];
    		$leadtime =  $split[3];
    		$phones = $split[4];
    		$contacts = $split[5];
    		$vat = $split[6];
    		$discount = $split[7];
    		$term = $split[8];
    		$return = $split[9];
    		$user = $split[10];

    		echo "INSERTING ".$vendid."\n";
    		$sql = "INSERT INTO SUPPLIER (ID,name,orderday,leadtime,phones,contacts,vat,discount,term,returnpolicy,user) values 
    		(?,?,?,?,?,?,?,?,?,?,?)";
			$req = $indb->prepare($sql);
			$req->execute(array($vendid,$vendname,$day,$leadtime,$phones,$contacts,$vat,$discount,$term,$return,$user));  
			usleep(100000);  		
        }
    }

	foreach($products as $product)
	{
		if(in_array($product["PRODUCTID"],$done))
			continue;
			$sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);			
			$req->execute(array("NR",$product["PRODUCTID"]));
			echo $product["PRODUCTID"] . "\n";
			usleep(100000);  
	}
}


updateProductsByVendor();

?>

