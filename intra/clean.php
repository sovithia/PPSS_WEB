<?php 
ini_set('memory_limit', '-1');
set_time_limit(0);

//$file_name = "ICTRANHEADER.sql";
//$write_file = "ICTRANHEADER_CLEAN.sql";

$file_name = "ICTRANDETAIL.sql";
$write_file = "ICTRANDETAIL_CLEAN.sql";


$data = file_get_contents($file_name) ;
$data = str_replace("GO","",$data);
file_put_contents($write_file, $data);

/*
$fp = fopen($file_name, 'r');
$fp2 = fopen($write_file, 'w');

while (($line = fgets($handle)) !== false) 
{
	$buffer = $line;
	$buffer = explode(';',$buffer)[0].";\n";	
	$block = explode('VALUES (',$buffer)[1];
	//echo $block."\n";
	

	if (count(explode(',',$block)) < 6)
		echo $block;

	$e1 = explode(',',$block)[0];
	$e2 = explode(',',$block)[1];
	$e3 = explode(',',$block)[5];	
	$e4 = explode(',',$block)[6];
	$e5 = explode(',',$block)[20];	

	/*
	$sql = "SELECT count(*) as 'NB' FROM PORECEIVEDETAIL WHERE VENDID = ? AND RECEIVENO = ? AND PONUMBER = ? AND TRANDATE LIKE ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($e1,$e2,$e3,$e4,$e5));
	$item=$req->fetch(PDO::FETCH_ASSOC);
	//echo $item["NB"]; 
	if ($item["NB"] == "0" || $item["NB"] == 0)	
	{
		echo $i."\n";
		//fwrite($fp2, "INSERT ".$buffer);							
	}
	else
	{
		//echo "NO\n";
	}
	
}
fclose($fp);
fclose($fp2);
*/

?>