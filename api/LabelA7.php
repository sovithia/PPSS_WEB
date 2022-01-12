<?php
include('RestEngine.php');
require_once('functions.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); 
?>

<html>

<head>
<!-- 	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/html2canvas.min.js"></script>
  <script type="text/javascript" src="js/canvas-toBlob.js"></script>
  <script type="text/javascript" src="js/FileSaver.js"></script> -->

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
<!-- 	<link rel="stylesheet" type="text/css" href="icon/css/all.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
  

</head>

<body  >

<?php 
  
  //if (1)
  //{
  //  renderEightProduct(array(FakeProduct(),FakeProductPromo(),FakeProduct(),FakeProductPromo(),FakeProduct(),FakeProductPromo(),FakeProduct(),FakeProductPromo()));
  //}
  if (isset($_GET["barcodes"]))
  {  
    $barcodes = explode("|",$_GET["barcodes"]);
    $newString = "";
    foreach($barcodes as $barcode){
      $newString .= str_replace(" ","%20",$barcode). "|";
    }
    $newString = substr($newString,0,-1);
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/label/" . $newString);                
    if (count($itemList) > 0)
      renderEightProduct($itemList);  
  } 
  else if (isset($_GET["barcode1"]) )
  {    
    $b1 = str_replace(" ","%20",$_GET['barcode1']);
    $b2 = str_replace(" ","%20",$_GET['barcode2']);
    $b3 = str_replace(" ","%20",$_GET['barcode3']);
    $b4 = str_replace(" ","%20",$_GET['barcode4']);
    $b5 = str_replace(" ","%20",$_GET['barcode5']);
    $b6 = str_replace(" ","%20",$_GET['barcode6']);
    $b7 = str_replace(" ","%20",$_GET['barcode7']);
    $b8 = str_replace(" ","%20",$_GET['barcode8']);


    $p1 = str_replace(" ","%20",$_GET['percent1']);
    $p2 = str_replace(" ","%20",$_GET['percent2']);
    $p3 = str_replace(" ","%20",$_GET['percent3']);
    $p4 = str_replace(" ","%20",$_GET['percent4']);
    $p5 = str_replace(" ","%20",$_GET['percent5']);
    $p6 = str_replace(" ","%20",$_GET['percent6']);
    $p7 = str_replace(" ","%20",$_GET['percent7']);
    $p8 = str_replace(" ","%20",$_GET['percent8']);

    $percentages = implode("|", array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8));
    if (strlen($percentages) > 0)
      $percentages = "?percentages=".$percentages;
    else
      $percentages = "";

    $barcodes = implode("|",array($b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8));      
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/label/" . $barcodes.$percentages);        
    
    if (count($itemList) > 0)  
      renderEightProduct($itemList);    
?>


<?php } else { ?>

<center>
  <img height='200px' src='img/roundlogo.png' >
  <br>
  <h1 style='color:#009183'>A6 LABEL GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td  align="center">      
      <form  method="GET">
        <span style='color:white'>BARCODE1</span><input name='barcode1' ><span style="color: white;">PERCENT1</span><input type="text" name="percent1"><br>        
        <span style='color:white'>BARCODE2</span><input name='barcode2' ><span style="color: white;">PERCENT2</span><input type="text" name="percent2"><br>        
        <span style='color:white'>BARCODE3</span><input name='barcode3' ><span style="color: white;">PERCENT3</span><input type="text" name="percent3"><br>        
        <span style='color:white'>BARCODE4</span><input name='barcode4' ><span style="color: white;">PERCENT4</span><input type="text" name="percent4"><br>        
        <span style='color:white'>BARCODE5</span><input name='barcode5' ><span style="color: white;">PERCENT5</span><input type="text" name="percent5"><br>        
        <span style='color:white'>BARCODE6</span><input name='barcode6' ><span style="color: white;">PERCENT6</span><input type="text" name="percent6"><br>        
        <span style='color:white'>BARCODE7</span><input name='barcode7' ><span style="color: white;">PERCENT7</span><input type="text" name="percent7"><br>        
        <span style='color:white'>BARCODE8</span><input name='barcode8' ><span style="color: white;">PERCENT8</span><input type="text" name="percent8"><br>        

        <input style='background-color:#ffed00;color:009183;font-weight: bold; margin-left: 90px; margin-top: 20px;' type='submit' value='GENERATE' />
      </form>
    </td>
    
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 

function FakeProductPromo()
{
  $product["nameKH"] = "កូកាកូឡាសូន្យ";
  $product["nameEN"] = "Coca Cola Zero";
  $product["country"] = "flags/australia.png";
  $product["dollarPrice"] = "$90";
  $product["rielPrice"] = "100000";
  $product["country"] = "Australia";
  $product["productImg"] = "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";
  $product["discpercentend"] = "11-31-19";
  $product["discpercent"] = "10";
  $product["oldPrice"] = "$100";
  $product["barcode"] = "011210000018";

  return $product;
}


function FakeProduct()
{
  $product["nameKH"] = "កូកាកូឡាសូន្យ";
  $product["nameEN"] = "Coca Cola Zero";
  $product["country"] = "flags/australia.png";
  $product["dollarPrice"] = "$100";
  $product["rielPrice"] = "100000";
  $product["country"] = "Australia";
  $product["productImg"] = "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";
  $product["discpercentend"] = "11-31-19";
  $product["discpercent"] = "0";
  $product["oldPrice"] = "$100";
  $product["barcode"] = "011210000018";

  return $product;
}

function renderEightProduct($products)
{
  $percent1 = "0";
  $percent2 = "0";
  $percent3 = "0";
  $percent4 = "0";
  $percent5 = "0";
  $percent6 = "0";
  $percent7 = "0";
  $percent8 = "0";

  if (count($products) > 0)
    $percent1 = ($products[0]["discpercent"] != null) ? $products[0]["discpercent"] : "0";
  if (count($products) > 1)
    $percent2 = ($products[1]["discpercent"] != null) ? $products[1]["discpercent"] : "0";
  if (count($products) > 2)
    $percent3 = ($products[2]["discpercent"] != null) ? $products[2]["discpercent"] : "0";
  if (count($products) > 3)
    $percent4 = ($products[3]["discpercent"] != null) ? $products[3]["discpercent"] : "0";
  if (count($products) > 4)
    $percent5 = ($products[4]["discpercent"] != null) ? $products[4]["discpercent"] : "0";
  if (count($products) > 5)
    $percent6 = ($products[5]["discpercent"] != null) ? $products[5]["discpercent"] : "0";
  if (count($products) > 6)
    $percent7 = ($products[6]["discpercent"] != null) ? $products[6]["discpercent"] : "0";
  if (count($products) > 7)
    $percent8 = ($products[7]["discpercent"] != null) ? $products[7]["discpercent"] : "0";

  $render = 
    "
    <div class='A4_horizontal' id='A4_Image'>    
      <center>
      <table>
        <tr>
            <td>
            <div>
            ";
            if   ($percent1 == "0" )
              $render .= _renderProduct(isset($products[0]) ? $products[0] : null);
            // else if($percent1 == "1")
            //     $render .="Buy one get one free";
            else 
              $render .= _renderPromoProduct(isset($products[0]) ? $products[0] : null);
            $render .= 
            "
            </div>
            </td>
            <td>
            <div>";
            if ($percent2 == "0")
              $render .= _renderProduct(isset($products[1]) ? $products[1] : null);
            else 
              $render .= _renderPromoProduct(isset($products[1]) ? $products[1] : null);
            $render .=
            "
            </div>
            </td>
        </tr>
      
        <tr>
            <td >
            <div>
            ";
            if ($percent3 == "0")
              $render .= _renderProduct(isset($products[2]) ? $products[2] : null);
            else 
              $render .= _renderPromoProduct(isset($products[2]) ? $products[2] : null);
            $render .= 
            "
            </div>
            </td>
            <td >
            <div>";
            if ($percent4 == "0")
              $render .= _renderProduct(isset($products[3]) ? $products[3] : null);
            else 
              $render .= _renderPromoProduct(isset($products[3]) ? $products[3] : null);
            $render .=
            "
            </div>
            </td>
        </tr>

         <tr>
            <td>
            <div>
            ";
            if ($percent5 == "0")
              $render .= _renderProduct(isset($products[4]) ? $products[4] : null);
            else 
              $render .= _renderPromoProduct(isset($products[4]) ? $products[4] : null);
            $render .= 
            "
            </div>
            </td>
            <td>
            <div>";
            if ($percent6 == "0")
              $render .= _renderProduct(isset($products[5]) ? $products[5] : null);
            else 
              $render .= _renderPromoProduct(isset($products[5]) ? $products[5] : null);
            $render .=
            "
            </div>
            </td>
        </tr>

        <tr>
            <td>
            <div >
            ";
            if ($percent7 == "0")
              $render .= _renderProduct(isset($products[6]) ? $products[6] : null);
            else 
              $render .= _renderPromoProduct(isset($products[6]) ? $products[6] : null);
            $render .= 
            "
            </div>
            </td>
            <td >
            <div>";
            if ($percent8 == "0")
              $render .= _renderProduct(isset($products[7]) ? $products[7] : null);
            else 
              $render .= _renderPromoProduct(isset($products[7]) ? $products[7] : null);
            $render .=
            "
            </div>
            </td>
        </tr>
      </table>
      </center>   
     </div>
     </br>
    <center><button class='btngenerate' id='save_image_locally'>Download</button></center>  
     "; 
    echo $render;
}



function _renderPromoProduct($product)
{
  if ($product == null)
    return "";
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

  $unit = $product['unit'];
  $packing = $product['packing'];
  $ispack = $product['ISPACK'];
  if ($ispack == 'NO') {
     ?>
              <?php
                  $factor = "<p>1 $unit</p>";
                ?>
        <?php
    }else{
        ?>
              <?php
                  $factor = "<p style='background-color: red; color: white; float: right; border-radius: 2px;'>$packing</p>";
                ?>
        <?php
        }

   if (strpos($percent,".") === false)
    $percentSize = "28";
  else 
    $percentSize = "20";
  return "
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
            <img class='product whitecontour' src='data:image/jpeg;base64, $image' >
          </div>
          <div class='A7_box3'>
            <div class='A7_box3_box1'>
              <img src='bg/bg-sale.png'>
              <div class='A7_promot'>
                <div class='A7_promot1'>
                  <div class='A7_promot2'>
                    <p>$percent</p>
                  </div>
                  <div class='A7_promot3'>
                    <div class='A7_percent'>
                      <p>%</p>
                    </div>
                    <div class='A7_off'>
                      <p>OFF</p>
                    </div>
                  </div>
                </div>
                <div class='A7_till'>
                  <p>Promotion Till: $till</p>
                </div>
              </div>
            </div>
            <div class='A7_box_price1'>
              <div class='A7_box_price2'>
                <div class='A7_box_price3'>
                  <div class='A7_box_price4'>
                    <div class='oldprice_symbool'>
                      <p>$</p>
                    </div>
                    <div class='A7_oldprice'>
                      <div class='strikethrough'>
                        <p>$oldPrice</p>
                      </div>
                    </div>
                  </div>
                  <div class='A7_box_price5'>
                    <div class='A7_box_price6'>
                      <div class='A7_promot_4'>
                        <div class='A7_promot_unit'>
                            $factor
                        </div>
                        <div class='A7_promot_price_en'>
                          <div class='A7_promot_price_en1'>
                            <p>$rielPrice</p>
                          </div>
                          <div class='A7_promot_price_symbool'>
                            <p>៛</p>
                          </div>
                        </div>
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
   ";
}
function _renderProduct($product)
{
  if ($product == null)
    return "";
  $nameKH = $product["nameKH"];
  $nameEN = $product["nameEN"];
  $flag = flagByCountry($product["country"]);
  $dollarPrice = $product["dollarPrice"];
  $rielPrice = $product["rielPrice"];  
  $country = $product["country"];
  $image = $product["productImg"];  
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];
  
  $unit = $product['unit'];
  $packing = $product['packing'];
  $ispack = $product['ISPACK'];
  if ($ispack == 'NO') {
     ?>
              <?php
                  $factor = "<p>1 $unit</p>";
                ?>
        <?php
    }else{
        ?>
              <?php
                  $factor = "<p style='background-color: red; color: white; float: right; border-radius: 2px;'>$packing</p>";
                ?>
        <?php
        }

  return "

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
						<img class='product whitecontour' src='data:image/jpeg;base64, $image' >
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
												    $factor
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

   ";
}
?>

	
<script type="text/javascript" src="html2canvas.js"></script>
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
</html