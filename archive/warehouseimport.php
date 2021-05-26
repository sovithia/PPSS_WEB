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




function Add(id)
        {
          if (document.getElementById('transfer_' + id).value == ".$item["REQUEST_QUANTITY"].")
            return;
          var t = parseInt(document.getElementById('transfer_' + id).value) + 1;
          var p = parseInt(document.getElementById('purchase_' + id).value) - 1;
          document.getElementById('transfer_' + id).value = t;
          document.getElementById('purchase_' + id).value = p;
        }
        function Substract(id)
        {
          if (document.getElementById('transfer_' + id).value == 0)
            return;
          var t = parseInt(document.getElementById('transfer_' + id).value) - 1;
          var p = parseInt(document.getElementById('purchase_' + id).value) + 1;
          document.getElementById('transfer_' + id).value = t;
          document.getElementById('purchase_' + id).value = p;
        }
        function All(id)
        {
          document.getElementById('transfer_' + id).value = 0;
          document.getElementById('purchase_' + id).value = ".$item["REQUEST_QUANTITY"]."; 
        }

,    

          '<input  value=\"".$item["ID"]."\" type=\"hidden\"><input style=\"text-align:center\" id=\"transfer_".$item["ID"]."\" value=\"".$item["REQUEST_QUANTITY"]."\" type=\"text\"  >',
          '<input style=\"text-align:center\" id=\"purchase_".$item["ID"]."\" value=\"0\" type=\"text\"  >',          
          '<button type=\"button\" onclick=\"All(".$item["ID"].")\">ALL</button><br><button type=\"button\" onclick=\"Add(".$item["ID"].")\">-</button><button type=\"button\" onclick=\"Substract(".$item["ID"].")\">+</button>',
        
?>