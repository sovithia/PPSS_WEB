<?php
include('RestEngine.php');
require_once('functions.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); 
?>

<html>
<head>
  

  <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="img/Logo-text1.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="icon/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/html2canvas.min.js"></script>
  <script type="text/javascript" src="js/canvas-toBlob.js"></script>
  <script type="text/javascript" src="js/FileSaver.js"></script>
<!-- <title>Label Printing A4</title> -->
<!--   <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="img/Logo-text1.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="icon/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script> -->
</head>

<body>

<?php 
   
  if (isset($_GET["barcodes"]))
  {    

    $barcodes = explode("|",$_GET["barcodes"]);
    $newString = "";
    foreach($barcodes as $barcode){
      $newString .= str_replace(" ","%20",$barcode). "|";
    }
    $newString = substr($newString,0,-1);
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/label/" . $newString);      
    if (count($itemList) == 1)        
        renderOneProduct($itemList[0]);      
    else if (count($itemList) == 2)    
      renderTwoProduct($itemList[0],$itemList[1]); 
    else if (count($itemList) == 3)    
      renderThreeProduct($itemList[0],$itemList[1],$itemList[2]);
    else if (count($itemList) == 4)       
      renderFourProduct($itemList[0],$itemList[1],$itemList[2],$itemList[3]);          
  }
  else if (isset($_GET["barcode1"]) )
  {
    $b1 = str_replace(" ","%20",$_GET['barcode1']);
    $b2 = str_replace(" ","%20",$_GET['barcode2']);
    $b3 = str_replace(" ","%20",$_GET['barcode3']);
    $b4 = str_replace(" ","%20",$_GET['barcode4']);

    $barcodes = implode("|",array($b1,$b2,$b3,$b4));
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/label/" . $barcodes);      
    if (count($itemList) == 1)        
        renderOneProduct($itemList[0]);      
    else if (count($itemList) == 2)    
      renderTwoProduct($itemList[0],$itemList[1]); 
    else if (count($itemList) == 3)    
      renderThreeProduct($itemList[0],$itemList[1],$itemList[2]);
    else if (count($itemList) == 4)       
      renderFourProduct($itemList[0],$itemList[1],$itemList[2],$itemList[3]);          
?>

<?php } else { ?>

<center>
  <img height='200px' src='img/biglogo.png'  >
  <br>
  <h1 style='color:#009183'>BIG LABEL GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td  align="center">
      <span style='color:white'>NORMAL</span>
      <form  method="POST">
        <span style='color:white'>BARCODE 1</span><input name='barcode1' ><br>
        <span style='color:white'>BARCODE 2</span><input name='barcode2' ><br>
        <!-- <span style='color:white'>BARCODE 3</span><input name='barcode3' ><br>
        <span style='color:white'>BARCODE 4</span><input name='barcode4' ><br> -->
        <input type='hidden' value='NORMAL' name='action' />
        <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
      </form>
    </td>
    
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 


// ONE 
function renderOneProduct($product)
{
  $nameKH = $product["nameKH"];
  $nameEN = $product["nameEN"];
  $flag = flagByCountry($product["country"]);
  $dollarPrice = $product["dollarPrice"];
  $rielPrice = $product["rielPrice"];  
  $country = $product["country"];
  $image = $product["productImg"]; 
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
  $from = ($product["discpercentstart"] != null) ? $product["discpercentstart"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];

  if ($percent == 0)
  {
    echo "
    <div class='A4' id='A4_Image'>
		<div class='tag-wrap'>
			<div class='clip4'>
				<img src='bg/bg-header.png'>
		</div>
		</div>
			<div class='logo'>
				<div class='tag-wrap'>
					<img src='img/logo-text1.png'>
				</div>
				<div class='tag-wrap'></div>
			</div>
		<div class='box'>
			<div class='box1'>
				<div class='name_kh'>
					<p>$nameKH</p>
				</div>
				<div class='name_En'>
					<p>$nameEN</p>
				</div> 
				<div class='itemcode'>
					<p>Code: $barcode</p>
				</div>
				<div class='itemcode'>
					<p>Origin: $country</p>
				</div>
				
			</div>
			<div class='box2'>
				<div class='box_img'>
					<img class='product whitecontour' src='data:image/jpeg;base64, $image' >
				</div>
			</div>
			<div class='box3'>
				<div class='box4'>
					<img src='bg/bg-sale.png'>
					<div class='tag-wrap'>
						<p>SALE</p>
					</div>
					
				</div>
				<div class='box_price'>
					<div class='box_price1'>
						<div class='box_price2'>
							<div class='A4_price_kh'>
								<p>$rielPrice</p>
							</div>
							<div class='symbol_riel'>
								<p>៛</p>
							</div>
							<div class='unit'>
								<div class='unit1'>
 									<img class='originpicture' src=$flag>
								</div>
								<div class='unit2'>
									<p>1 Unit</p>
								</div>
							</div>
							<div class='price_en'>
								<div class='symbol_dollar'>
								<p>$</p>
								</div>
								<div class='price1'>
									<p>$dollarPrice</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</br>
	<center><button class='btngenerate' id='save_image_locally'>Download</button></center>
	";
    }
else
    {
  if (strpos($percent,".") === false)
    $percentSize = "60";
  else 
    $percentSize = "45";
    echo "
    <div class='A4' id='A4_Image'>
		<div class='tag-wrap'>
			<div class='clip4'>
				<img src='bg/bg-header.png'>
		</div>
		</div>
			<div class='logo'>
				<div class='tag-wrap'>
					<img src='img/logo-text1.png'>
				</div>
				<div class='tag-wrap'></div>
			</div>
		<div class='box'>
			<div class='box1'>
				<div class='name_kh'>
					<p>$nameKH</p>
				</div>
				<div class='name_En'>
					<p>$nameEN</p>
				</div> 
				<div class='itemcode'>
					<p>Code: $barcode</p>
				</div>
				<div class='itemcode'>
					<p>Origin: $country</p>
				</div>
				
			</div>
			<div class='box2'>
				<div class='box_img'>
					<img class='product whitecontour' src='data:image/jpeg;base64, $image'>
				</div>
			</div>
			<div class='box3'>
				<div class='box4'>
					<img src='bg/bg-sale.png'>
					<div class='tag-wrap'>
						<div class='disc'>
							<p>$percent</p>
						</div>
						<div class='off'>
							<div class='person'>
								<p>%</p>
							</div>
							<div class='off1'>
								<p>OFF</p>
							</div>
						</div>
						<div class='till'>
							<p>Promotion Till: $till</p>
						</div>
					</div>
					
				</div>
				<div class='box_price'>
					<div class='box_price1'>
						<div class='box_price2'>
							<div class='promot2'>
								<div class='symbool'>
									<p>$</p>
								</div>
								<div class='promot3'>
									<span class='strikethrough'>
										<p>$oldPrice</p>
									</span>
								</div>
							</div>
							<div class='promot5'>
								<div class='unit1'>
									<p>1 Unit</p>
								</div>
								<div class='unit2'>
									<p>$rielPrice</p>
								</div>
								<div class='unit3'>
									<p>៛</p>
								</div>
							</div>
							<div class='promot6'>
								<div class='promot_price7'>
									<p>$</p>
								</div>
								<div class='promot_price8'>
									<p>$dollarPrice</p>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	
</div>
</br>
<center><button class='btngenerate' id='save_image_locally'>Download</button></center>
	   ";
    }
}


// TWO
function _renderTwoProductPromoLeft($product)
{
  $nameKH = $product["nameKH"];
  $nameEN = $product["nameEN"];
  $flag = flagByCountry($product["country"]);
  $dollarPrice = $product["dollarPrice"];
  $rielPrice = $product["rielPrice"];  
  $country = $product["country"];
  $image = $product["productImg"];
  $from = ($product["discpercentstart"] != null) ? $product["discpercentstart"] : "N/A";
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];


  if ($percent != "0" && $percent != ".")
  {
    if (strpos($percent,".") === false)
      $percentSize = "60";
    else 
      $percentSize = "45";

    return "
    		<div class='box-sale'>
					<img src='bg/bg-sale.png'>
					<div class='tag-wrap'>
						<p style='font-size: 50px; margin-right:-300px; margin-top: 20px'>PROMOTION</p>
					</div>
				</div>
     		<div class='barcode1'>
					<div class='box-image'>
						<div class='discount_percent'>
						<div class='percent'>
							<div class='percent1'>
								<p>$percent</p>
							</div>
							<div class='percent2'>
								<p>OFF</p>
							</div>
							<div class='percent3'>
								<p>%</p>
							</div>
						</div>
					</div>
						<img class='product whitecontour' style='margin-right: -10px;' src='data:image/jpeg;base64, $image'>
					</div>

					<div class='box-text'>
						<div class='box-text1'>
							<div class='nameKh' style='margin-left: 10px;'>
								<p>$nameKH</p>
							</div>
							<div class='nameen' style='margin-left: 10px;'>
								<p>$nameEN</p>
							</div>
						</div>
						<div class='box-price'  style='margin-left: 10px;'>
							<div class='box_price_b2'>
								<div class='box_price1_b2'>
								<div class='box_price2_b2'>
									<div class='A4_price_kh_b2'>
										<div class='A4_symbool_2items'>
											<p>$</p>
										</div>
										<div class='A4_price_2items'>
											<div class='strikethrough'>
												<p>$oldPrice</p>
											</div>
										</div>
									</div>
								</div>

									<div class='A4_price_2item_box'>
										<div class='unit'>
											<p>1 Unit</p>
										</div>
										<div class='A4_2item_price_disckh'>
											<p>$rielPrice</p>
										</div>
										<div class='A4_2item_price_disckh_symbool'>
											<p>៛</p>
										</div>
									</div>
									<div class='A4_price_2item_dis'>
										<div class='symbool_en'>
												<p>$</p>
										</div>
										<div class='price_disc'>
											<p>$dollarPrice</p>
										</div>
									</div>
							</div>
							</div>
							
						</div>
						<div class='box-item'>
							<div class='code'>
								<p>
								Code: $barcode
								<br>
								Till: $till
								</p>
							</div>
						</div>
					</div>
				</div>
        ";
      }
      else{        
        return "
        <div class='barcode1'>
					<div class='box-image'>
						<img class='product whitecontour' style='margin-right: -18px;' src='data:image/jpeg;base64, $image'>
					</div>
					<div class='box-text'>
						<div class='box-text1'>
							<div class='nameKH' style='margin-left: 23px;'>
								<p>$nameKH</p>
							</div>
							<div class='nameen' style='margin-left: 23px;'>
								<p >$nameEN</p>
							</div>
						</div>
						<div class='box-price' style='margin-left: 20px;' >
							<div class='box_price_b2'>
								<div class='box_price1_b2'>
								<div class='box_price2_b2'>
									<div class='A4_price_kh_b2'>
										<p>$rielPrice</p>
									</div>
									<div class='symbol_riel'>
										<p>៛</p>
									</div>
									<div class='unit'>
										<div class='unit1'>
											<img src='$country'>
										</div>
											<div class='unit2'>
												<p>1 Unit</p>
											</div>
									</div>
									<div class='price_en_b2'>
										<div class='symbool_dollar_b2'>
											<p>$</p>
										</div>
										<div class='price_dollar_b2'>
											<p>$dollarPrice</p>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class='box-item'>
							<div class='code' style='margin-left: 5px;' >
								<p>Code: $barcode</p>
							</div>
						</div>
					</div>
				</div>
        ";
      }
}
function _renderTwoProductPromoRight($product)
{
  $nameKH = $product["nameKH"];
  $nameEN = $product["nameEN"];
  $flag = flagByCountry($product["country"]);
  $dollarPrice = $product["dollarPrice"];
  $rielPrice = $product["rielPrice"];  
  $country = $product["country"];
  $image = $product["productImg"];  
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
   $from = ($product["discpercentstart"] != null) ? $product["discpercentstart"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];


  if ($percent != "0" && $percent != ".")
  {    
    if (strpos($percent,".") === false)
      $percentSize = "60";
    else 
      $percentSize = "45";
  return "
  	<div class='barcode1'>
					<div class='box-image'>
						<div class='discount_percent'>
						<div class='percent'>
							<div class='percent1'>
								<p>$percent</p>
							</div>
							<div class='percent2'>
								<p>OFF</p>
							</div>
							<div class='percent3'>
								<p>%</p>
							</div>
						</div>
					</div>
						<img class='product whitecontour' style='margin-right: -10px;' src='data:image/jpeg;base64, $image'>
					</div>

					<div class='box-text'>
						<div class='box-text1'>
							<div class='nameKh'>
								<p>$nameKH</p>
							</div>
							<div class='nameen'>
								<p>$nameEN</p>
							</div>
						</div>
						<div class='box-price'  style='margin-left: 10px;'>
							<div class='box_price_b2'>
								<div class='box_price1_b2'>
								<div class='box_price2_b2'>
									<div class='A4_price_kh_b2'>
										<div class='A4_symbool_2items'>
											<p>$</p>
										</div>
										<div class='A4_price_2items'>
											<div class='strikethrough'>
												<p>$oldPrice</p>
											</div>
										</div>
									</div>
								</div>

									<div class='A4_price_2item_box'>
										<div class='unit'>
											<p>1 Unit</p>
										</div>
										<div class='A4_2item_price_disckh'>
											<p>$rielPrice</p>
										</div>
										<div class='A4_2item_price_disckh_symbool'>
											<p>៛</p>
										</div>
									</div>
									<div class='A4_price_2item_dis'>
										<div class='symbool_en'>
												<p>$</p>
										</div>
										<div class='price_disc'>
											<p>$dollarPrice</p>
										</div>
									</div>
							</div>
							</div>
							
						</div>
						<div class='box-item'>
							<div class='code'>
								<p>
								Code: $barcode
								<br>
								Till: $till
								</p>
							</div>
						</div>
					</div>
				</div>
  ";
    }
    else
    {
      return "
      <div class='barcode1'>
					<div class='box-image'>
						<img class='product whitecontour' style='margin-right: 2px;' src='data:image/jpeg;base64, $image'>
					</div>
					<div class='box-text'>
						<div class='box-text1'>
							<div class='nameKH' >
								<p>$nameKH</p>
							</div>
							<div class='nameen'>
								<p>$nameEN</p>
							</div>
						</div>
						<div class='box-price'>
							<div class='box_price_b2'>
								<div class='box_price1_b2'>
								<div class='box_price2_b2'>
									<div class='A4_price_kh_b2'>
										<p>$rielPrice</p>
									</div>
									<div class='symbol_riel'>
										<p>៛</p>
									</div>
									<div class='unit'>
										<div class='unit1'>
											<img src='$country'>
										</div>
											<div class='unit2'>
												<p>1 Unit</p>
											</div>
									</div>
									<div class='price_en_b2'>
										<div class='symbool_dollar_b2'>
											<p>$</p>
										</div>
										<div class='price_dollar_b2'>
											<p>$dollarPrice</p>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class='box-item'>
							<div class='code' style='margin-left: 2px;' >
								<p>Code: $barcode</p>
							</div>
						</div>
					</div>
				</div>
      ";
    }
}
function renderTwoProduct($product1,$product2)
{
  
 //  echo "
 //  <center><button id='save_image_locally'>Download</button></center>

 //    <div id='target'>
 //     <div id='content' >
 //     <center>
 //       <table border='0' width='98%' height='98%'>
 //         <tr height='12%' valign='center'>      
 //            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
 //            <span class='titlemedium'>SALE</span></td>      
 //         </tr>
 //         <tr>
 //            <td width='50%' >"._renderTwoProductPromoLeft($product1)."
 //            </td>

 //            <td  width='50%'>".
 //             _renderTwoProductPromoRight($product2)."
 //            </td>
 //         </tr>
 //       </table>
 //      </center>
 //      </div>
 //    </div>
 //   </br>
	// <center><button class='btngenerate' id='save_image_locally'>Download</button></center>
 //    ";
	echo"
	<div class='A4' id='A4_Image'>
	<div class='tag-wrap'>
			<div class='clip4'>
				<img src='bg/bg-header.png'>
			</div>
	</div>
			<div class='logo'>
				<div class='tag-wrap'>
					<img src='img/logo-text1.png'>
				</div>
				<div class='tag-wrap'></div>
			</div>
		<div class='box'>
			<div class='renderTwoProduct'>
			
				 <td width='50%' >"._renderTwoProductPromoLeft($product1)."
         </td>
			 <td  width='50%'>".
             _renderTwoProductPromoRight($product2)."
            </td>
		</div>
	</div>
</div>
</br>
<center><button class='btngenerate' id='save_image_locally'>Download</button></center>
	";
}
?>
<!-- <script type="text/javascript" src="html2canvas.js"></script> -->
<script>
   $('#save_image_locally').click(function(){           
      let opt = { scale : 5};
      html2canvas(document.getElementById('A4_Image'),opt).then(function(canvas) {
      
      canvas.toBlob(function(blob){
          saveAs(blob, 'lastlabels.jpg');                
      },'image/png');
      
      },);
  });
</script>

</body>
</html>