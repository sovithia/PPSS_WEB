<?php

require_once("RestEngine.php"); 
set_time_limit(0);
?>

<html>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="html2canvas.min.js"></script>
	<style>

		#target{
    	background-image: url(img/background.jpg);
    	width: 29.7cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}

		#content{
		 width: 99%;
		 height: 21cm;
		 margin: 10px;
		 padding:5px;
		 background-color: rgba(128,128,128,0.6);		    
		}

		#target2{
    	background-image: url(img/background.jpg);
    	width: 21cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}

		#content2{
		 width: 99%;
		 height: 29.7cm;
		 margin: 10px;
		 padding:5px;
		 background-color: rgba(128,128,128,0.6);		    
		}
		

		.pricetag{
			height:118px;
			width:272px;
			background-color: white;
			position: relative;
			border : 0.4px dashed #009183;
		}


		.pricetaggreen{
			height:118px;
			width:272px;
			background-color: #009183;
			position: relative;
			border : 0.4px dashed white;
		}


		.pricetagblack{
			height:118px;
			width:272px;
			background-color: black;
			position: relative;
			border : 0.4px dashed white;
		}

		.rielSymbol{
			font-size: 10pt;
		}

		.rielprice{    		  		  
    		width:160px; 
    		height:20px;
    		text-align: left;
    		font-size: 8pt;
    		top:5px;
    		left:5px; 
    		position: absolute; 	
    	}

		.pricetag .rielprice{
    		color:black;	  	
    	}
    	.pricetaggreen .rielprice{
    		color:#ffed00;	  	
    	}
    	.pricetagblack .rielprice{
    		color:#009183;	  	
    	}



    	.dollarprice{    		
    		width:160px; 
    		height:20px;
    		font-size: 25pt;
    		top:18px;
    		left:5px;
    		text-align: left;  
    		position: absolute; 	  		
    	}

	    .pricetag .dollarprice{
    		color:#009183;
    	}

    	 .pricetaggreen .dollarprice{
    		color:white;		  	
    	}
    	 .pricetagblack .dollarprice{
    		color:#ffed00;		  	
    	}




    	.packing {
			width:150px; 			
    		top:5px;
    		text-align: right;
    		left:5px;    		
    		
    		font-size: 8pt;    		
    		position: absolute;
    	}

		.pricetag .packing{
			color:#009183;
    	}

 		.pricetaggreen .packing{
			color:#ffed00;
    	}
    	.pricetagblack .packing{
			color:#ffed00;
    	}
    	
    	.nameEN{
			top:50px;
    		left:5px;      	
    		position: absolute;
    		width: 160px;    
    		height: 18px;			
    		font-size: 8pt;    		    		
    	
    	}

    	.pricetag .nameEN{
    		color: black;
    	}
    	.pricetaggreen .nameEN{
    		color: white;
    	}    	
    	.pricetagblack .nameEN{
    		color: white;
    	}

    	

    	.nameKH{    		
			top:65px;
    		left:5px;  
    		width: 160px;    		
    		height: 18px;    		
    		position: absolute;
    		font-size: 8pt;   	    		
    	}
    	
    	.pricetag .nameKH{
    		color:#009183;
    	}
    	.pricetagGreen .nameKH{
    		color:#ffed00;
    	}
    	.pricetagblack .nameKH{
    		color:#009183;
    	}
    	


    	.productImg{
			top:5px;
    		right:5px;  
    		position: absolute;     	   
    		background-color: white;
    		height: 95px;
    		width: 90px;   
    		display: flex;
    		text-align: center;
    		align-items: center; 		       		
    	}	

    	.barcode{
    		width:160px; 
    		height:15px; 
    		background-size: cover;    	
    		bottom:18px;
    		left:5px;    		
    		position: absolute;
    	}

    	.barcodeNumber{
    		width:150px;      		
    		bottom:5px;
    		left:5px;    		
    		position: absolute;    		
    		font-size: 8pt;
    		text-align: center;

    	}
    	.pricetaggreen .barcodeNumber{
    		color: white;
    	}
    	.pricetag .barcodeNumber{
    		color: black;
    	}

    	.pricetagblack .barcodeNumber{
    		color: white;
    	}



    	.country{    		
    		width:90px;
    		bottom:5px;
    		right:5px;    		    		
    		font-size: 8pt;
    		text-align: center;
    		position: absolute;
    	}

		.pricetaggreen .country{
    		color:#ffed00;
    	}

    	.pricetag .country{
    		color:#009183;
    	}
    	.pricetagblack .country{
    		color:#ffed00;
    	}



    	.return {    		
    		
    		width:160px;     		
    		bottom:10px;
    		left:5px;
    		font-size:5pt;    		
    		
    		position: absolute;
    		text-align: right;
    		vertical-align: top;

    	}
    	.pricetag .return{
    		color:black;
    	}
		.pricetaggreen .return{
    		color:#ffed00;
    	}

		.pricetagblack .return{
    		color:#009183;
    	}


   </style>
</head>

<?php 


function render($items)
{		
	echo "<table border='0'>";	
	$close = false;
	for($i = 0;$i < count($items);$i++)
	{
		if ($i  % 4 == 0 && $i != 0)
		{
			$close = !$close;
			if ($close == true)
				echo "<tr>";		
			else
				echo "</tr>";
		}
		echo "<td width='272px'>".PriceTag($items[$i])."</td>";
		$items[$i];	
	}	
	echo "</table>";

}


function PriceTag($item)
{

	$color = 'pricetag';
	$rielPrice = $item["rielPrice"];
	$dollarPrice = $item["dollarPrice"];
	$nameEN = substr($item["nameEN"],0,30);
	$nameEN = str_replace("\n"," ",$nameEN);	
	$nameKH = substr($item["nameKH"],0,82);
	$productImg = $item["productImg"];

	$barcodeImg = $item["barcodeImage"];
	


	$barcodeNumber = $item["barcodeNumber"];
	$packing = $item["packing"];

	$return = $item["return"];
	$country = $item["country"];	

	return "	
	<div class='$color'>
		
		<div class='rielprice'><span class='rielSymbol'>R</span>$rielPrice</div>    

    	<div class='dollarprice'>$dollarPrice</div>
    	

    	<div class='nameEN'>$nameEN</div>	
    	    	
		<div class='nameKH'>$nameKH</div>
    	
    	<div class='productImg' valign='center'><img width='90px' src='data:image/png;base64, $productImg'></div>

		<div class='barcode' style=\"background-image:url('$barcodeImg');\">&nbsp;</div>

		<div class='barcodeNumber'>$barcodeNumber</div>

		<div class='packing'>$packing</div>

    	<div class='return'>
    		$return
    	</div>    	


		<div class='country'>
			$country
		</div>
	</div>
	";
}



?>
<body bgcolor="white">
	<center>
        <img height='100px' src='img/roundlogo.png' >
    <h1 style='color:#009183'>SMALL LABEL GENERATOR</h1>
        <span style='background-color:#009183;color:white'>Copy up to 24 barcodes, separated by a comma</span><br>
	<form method="GET" action='http://phnompenhsuperstore.com/api/labelprint.php'>
		<textarea type='text' name="barcodes" rows="5" cols="50" /> </textarea><br>
		<input style='background-color: #009183;font-size: 20pt;color:white' type='submit' value='GENERATE' />
	</form>
	</center>

	<?php 

	?>

	
</body>
</html>