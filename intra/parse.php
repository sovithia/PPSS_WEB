<?php 
ini_set('memory_limit', '-1');
set_time_limit(0);

/*
function CleanFile()
{
	$data = file_get_contents("PORECEIVEDETAIL.sql");
	$newdata = str_replace("\nINSERT INTO", "XXXXXX",$data);
	$newdata = str_replace("\n", "",$newdata);
	$newdata = str_replace("GO", "",$newdata);
	$newdata = str_replace("XXXXXX", "\nINSERT INTO",$newdata);
	file_put_contents("FINAL.sql", $newdata);
}


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

$conn=getDatabase();

$file_name = "FINAL.sql";
$write_file = "DIFFERENCE.sql";
$fp = fopen($file_name, 'r');
$fp2 = fopen($write_file, 'w');
$i = 0;
while (($line = fgets($fp)) !== false) 
{
	$buffer = $line;

	
	$buffer = explode(';',$buffer)[0].";\n";		
	$block = explode('VALUES (',$buffer) [1];
	
	
	
	$e1 = explode(',',$block)[0];
	$e2 = explode(',',$block)[1];
	$e3 = explode(',',$block)[5];	
	$e4 = explode(',',$block)[6];
	$e5 = explode(',',$block)[20];	
	
	
	$sql = "SELECT count(*) as 'NB' FROM PORECEIVEDETAIL WHERE VENDID = ? AND RECEIVENO = ? AND PONUMBER = ? AND TRANDATE LIKE ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($e1,$e2,$e3,$e4,$e5));
	$item=$req->fetch(PDO::FETCH_ASSOC);
	//echo $item["NB"]; 
	if ($item["NB"] == "0" || $item["NB"] == 0)	
	{
		echo $i."\n";
		fwrite($fp2,$buffer);							
	}
	else
	{
		//echo "NO\n";
	}
	$i++;
	
}
fclose($fp);
fclose($fp2);
*/

$data = file_get_contents("ICTRANDETAIL.sql");
$data = str_replace("GO","",$data);
$data = str_replace("CATERYID","CATEGORYID",$data);
$data = str_replace("\nINSERT INTO","XXXXXX",$data);
$data = str_replace("\n","",$data);
$data = str_replace("XXXXXX","\nINSERT INTO",$data);
file_put_contents("ICTRANDETAIL_CLEAN", $data);




?>