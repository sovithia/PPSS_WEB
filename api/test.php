
<?php 

function generateRielPrice($price)
{

	$priceStr = strval(4100 *$price);
	$price = intval(4100 * $price);
	$i = intval(substr($priceStr,strlen($priceStr) - 2,2));	


	if ($i == 0){			
		$str = strval($price);	
		if (strlen($str) > 3)		
			return substr($str,0,strlen($str) - 3) . "," . substr($str,strlen($str) - 3);
		
		return $price; 
	}
	
	$centnum = intval(substr($priceStr,strlen($priceStr) - 3,1));
	if ($i > 50)
	{
		$num = 	substr($priceStr,0,strlen($priceStr) - 2); 
		$num .= "00";
		$num = intval($num);
		$num += 100;			
	}else{
		$num = 	substr($priceStr,0,strlen($priceStr) - 2); 
		$num .= "00";
		$num = intval($num);		
	}	
	
	$str = strval($num);	

	if (strlen($str) > 3)		
		return substr($str,0,strlen($str) - 3) . "," . substr($str,strlen($str) - 3);

	return $num;

}

//echo generateRielPrice("5.05")."\n";
$timestamp = strtotime('-30 days');
echo date("Y-m-d",$timestamp);
?>