<?php
include('RestEngine.php');
require_once('functions.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); 
?>

<html>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>

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
   <!--  <script type="text/javascript" src="js/FileSaver.js"></script> -->


</head>

<body  >

<?php 
   
  if (isset($_GET["barcodes"]))
  {    

    $barcodes = explode("|",$_GET["barcodes"]);
    $newString = "";
    foreach($barcodes as $barcode){
      $newString .= str_replace(" ","%20",$barcode). "|";
    }
    $newString = substr($newString,0,-1);
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $newString);      
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
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $barcodes);      
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
        <span style='color:white'>BARCODE 3</span><input name='barcode3' ><br>
        <span style='color:white'>BARCODE 4</span><input name='barcode4' ><br>
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
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
  $from = ($product["discpercentstart"] != null) ? $product["discpercentstart"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];

  if ($percent == 0)
  {
    echo "
    <div class='A4_horizontal' id='A4_Image'>
    <div class='A7_box'>
				<div class='A7_header'>
					<img src='bg/bg-header.png'>
					<div class='tag-wrap'>
						<img src='img/logo-text1.png'>
					</div>
				</div>
					<div class='A7_body'>
					<div class='A7_box1'>
						<div class='A7_text1'>
							<p>$nameKH</p>
						</div>
						<div class='A7_text2'>
							<p>$nameEN</p>
						</div>
						<div class='A7_code'>
							<p>Code: $barcode</p>
						</div>
						<div class='A7_code'>
							<p>Origin: $country</p>
						</div>
					</div>
					<div class='A7_box2'>
									<img class='product whitecontour' src='http://phnompenhsuperstore.com/api/picture.php?barcode=$barcode'>
					</div>
					<div class='A7_box3'>
						<div class='A7_box3_box1'>
							<img src='bg/bg-sale.png'>
							<div class='sale1'>
									<p>SALE</p>
								</div>
						</div>
						<div class='A7_box_price1'>
							<div class='A7_box_price2'>
								<div class='A7_box_price3'>
									<div class='A7_box_price4'>
										<div class='A7_price_kh'>
											<p>$rielPrice</p>
										</div>
										<div class='symbool_kh'>
											<p>៛</p>
										</div>
									</div>
									<div class='A7_box_price5'>
										<div class='A7_box_price6'>
											<div class='flag'>
												<img class='originpicture' src=$flag />
											</div>
											<div class='unit'>
												<p>1 Unit</p>
											</div>
										</div>
										<div class='A7_box_price7'>
											<div class='symbool_en'>
												<p>$</p>
											</div>
											<div class='A7_box_price_en'>
												<p>$dollarPrice</p>
											</div>
										</div>
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
    <div class='A4_horizontal' id='A4_Image'>
    <div class='A7_box'>
				<div class='A7_header'>
					<img src='bg/bg-header.png'>
					<div class='tag-wrap'>
						<img src='img/logo-text1.png'>
					</div>
				</div>
					<div class='A7_body'>
					<div class='A7_box1'>
						<div class='A7_text1'>
							<p>$nameKH</p>
						</div>
						<div class='A7_text2'>
							<p>$nameEN</p>
						</div>
						<div class='A7_code'>
							<p>Code: $barcode</p>
						</div>
						<div class='A7_code'>
							<p>Origin: $country</p>
						</div>
					</div>
					<div class='A7_box2'>
						<img class='product whitecontour' src='data:jpeg;base64, $image'>
					</div>
					<div class='A7_box3'>
						<div class='A7_box3_box1'>
							<img src='bg/bg-sale.png'>
							<div class='sale1'>
									<p>SALE</p>
								</div>
						</div>
						<div class='A7_box_price1'>
							<div class='A7_box_price2'>
								<div class='A7_box_price3'>
									<div class='A7_box_price4'>
										<div class='A7_price_kh'>
											<p>$rielPrice</p>
										</div>
										<div class='symbool_kh'>
											<p>៛</p>
										</div>
									</div>
									<div class='A7_box_price5'>
										<div class='A7_box_price6'>
											<div class='flag'>
												<img class='originpicture' src=$flag />
											</div>
											<div class='unit'>
												<p>1 Unit</p>
											</div>
										</div>
										<div class='A7_box_price7'>
											<div class='symbool_en'>
												<p>$</p>
											</div>
											<div class='A7_box_price_en'>
												<p>$dollarPrice</p>
											</div>
										</div>
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
?>
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





<table >
      <tr>        
        <td colspan='2' align='center'>
          <div class='productname whitecontour'>            

            <table  width='100%'>
            
            <tr>
              <td align='right'><span class='productname'>$nameEN</span></td>
              <td rowspan='2' align='right'>
                <img width='65px' src='img/logo.png'>
              </td>

            </tr>
                
            <tr>
              <td align='right'><span class='productnameKH' style='color:#ffed00'>$nameKH</span></td>
            </tr>

            </table>
          </div>                                                    
        </td>
              
      </tr>

      <tr valign='top'>
         <td valign='top' >
          <center>
            <div style='border-radius: 10px;height:150px;background-color:white;;vertical-align:middle;display:table-cell'>
            <img class='product whitecontour' src='http://phnompenhsuperstore.com/api/picture.php?barcode=$barcode'>
            </div>
            <span style='color:white'>$barcode</span>
          </center>
        </td>    
 

        <td align='center'  >
          <div class='productname whitecontour'>                   
            <table >
              <tr height='100px'>
                <td>
                  <span class='rielprice'>$rielPrice ៛</span>      
                </td>   

                <td width='100px' align='center'> 
                  <div class='starburst starburstOne'>
                   <span style='font-size:25pt'>$dollarPrice</span></div>          
                </td>
              </tr>  
              <tr>
                <td align='center'>
                  <img class='originpicture' src=$flag /><br>
                  <span style='font-size:8pt;color:white' >Origin : $country</span>
                </td>

                <td align='center'>                              
                </td>

              </tr>          
            </table>
          </div>
        </td>
      </tr>
  </table>