<?php 

function getDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage( )) );   
	} 
	return $conn;
}


function insertProducts($prices)
{
	$db = getDatabase();
	$now = date("Y-m-d H:i:s");

	$PRODUCTID = "";
	$PRODUCTNAME = "";
	$PRODUCTNAME1 = "";
	$CATEGORYID = "BISCUIT & CAKE";
	$CLASSID = "LOCAL";
	$BARCODE = "";
	$PRICE = "";
	$TYPE = "I";
	$VENDID = "400-463";
	$ACTIVE = "1";
	$DISCABLE = "1";
	$STKUM = "UNIT";
	$STKFACTOR = "1";
	$PURUM = "UNIT"; 
	$PURFACTOR = "1.0";
	$SALEUM = "UNIT";
	$SALEFACTOR = "1.0";
	$USERADD = "SOVI";
	$DATEADD = $now;
	$REVENUEACC = "40000";
	$COGSACC = "50000"; 
	$INVENTORYACC = "17000";
	$TAXACC = "16100";
	$SALEDISCOUNTACC = "49000";
	$OTHER_PRICE = "";
	$BIG_UNIT = "UNIT";
	$BIG_UNIT_FACTOR = "1.0";
	$RECORD_STATUS = "E";
	$COST_METHOD = "AG";
	$WIDTH = "1";
	$HEIGHT = "1";
	$MFG_OR_PUR = "P";
	$HAS_VAT = "N";
	$VAT_RATE = "0.0";

	for($i = 19; $i <= 60;$i++)
	{
		$identifier = sprintf("%03d",$i);
		$PRODUCTID = "BISCANDCAK_".$identifier; 
		$PRODUCTNAME = "BISCUIT & CAKE CLASS ".$i;
		$PRODUCTNAME1 = "នំគ្រប់ប្រភេទ ".$i;
		$BARCODE = $PRODUCTID;
		$PRICE = $prices[$i - 1];
		$OTHER_PRICE = $PRICE;


		$sql = "INSERT INTO ICPRODUCT 
				(PRODUCTID,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,CLASSID,BARCODE,PRICE,TYPE,VENDID,ACTIVE,
	 			DISCABLE,STKUM,STKFACTOR,PURUM,PURFACTOR, SALEUM,SALEFACTOR,USERADD,DATEADD,REVENUEACC,
	 			COGSACC,INVENTORYACC,TAXACC,SALEDISCOUNTACC,OTHER_PRICE,BIG_UNIT,BIG_UNIT_FACTOR,RECORD_STATUS,COST_METHOD,
	 			WIDTH,HEIGHT,MFG_OR_PUR,HAS_VAT,VAT_RATE) 
	 			VALUES 
	 			(?,?,?,?,?,?,?,?,?,?,
	 			 ?,?,?,?,?,?,?,?,?,?,
	 			 ?,?,?,?,?,?,?,?,?,?,
	 			 ?,?,?,?)";	

	 	$req = $db->prepare($sql);		
	 	$params = array(
	 	$PRODUCTID,$PRODUCTNAME,$PRODUCTNAME1,$CATEGORYID,$CLASSID,$BARCODE,$PRICE,$TYPE,$VENDID,$ACTIVE,
		$DISCABLE,$STKUM,$STKFACTOR,$PURUM,$PURFACTOR,$SALEUM,$SALEFACTOR,$USERADD,$DATEADD,$REVENUEACC,
	 	$COGSACC, $INVENTORYACC,$TAXACC,$SALEDISCOUNTACC,$OTHER_PRICE,$BIG_UNIT,$BIG_UNIT_FACTOR,$RECORD_STATUS,$COST_METHOD,
	 	$WIDTH,$HEIGHT,$MFG_OR_PUR, $HAS_VAT,$VAT_RATE);
	 	echo "INSERTING ".$BARCODE." WITH PRICE ".$PRICE." \n";  
	 	//var_dump($params);
	 	sleep(1);
	 	
	 	$req->execute($params);	 
	 	
	}

}

$prices = ["0.4","0.5","0.6","0.7","0.8","0.9","0.97","1.04","1.11","1.18",
"1.25","1.32","1.4","1.48","1.56","1.64","1.72","1.81","1.9","1.99",
"2.08","2.17","2.25","2.33","2.41","2.49","2.57","2.66","2.75","2.84",
"2.93","3.02","3.1","3.18","3.26","3.34","3.42","3.5","3.58",
"3.66","3.74","3.82","3.91","4.0","4.09","4.18","4.27","4.36","4.45",
"4.54","4.63","4.72","4.81","4.9","4.99","5.08","5.17","5.26","5.35","5.44"];

insertProducts($prices);



?>