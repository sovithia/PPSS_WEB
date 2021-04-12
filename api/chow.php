<?php 

require_once("RestEngine.php"); 
set_time_limit(0);

	if (isset($_GET["barcode"]))
	{

        $barcodes = str_replace(" ","",$_GET["barcode"]);	
        $labels = RestEngine::GET("http://sites.local/PPSS/api/api.php/itemlabels/".$barcodes);	         		
        $image = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/picture/".$barcodes);                 
        $image = $image["PICTURE"]; 
        echo "<center><img src='data:image/png;base64,$image'><center>";				
	}		
?>
