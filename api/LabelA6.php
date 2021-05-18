<?php
include('RestEngine.php');
?>

<html>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>

    <style> 

      html{
        font-family: Myriad Pro Bold;
      }


 .starburst {
    background: #ffed00;  
    
    text-align: center;
    color: #009183;
    left: 75%;
    transform: rotate(-45deg);
  }

  .starburst,
  .starburst span {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .starburst span {
    width: 100%;
    height: 100%;
    background: inherit;
    transform: rotate(45deg);
  }
  .starburst:before,
  .starburst:after ,
  .starburst span:before,
  .starburst span:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit;
    z-index: -1;
    transform: rotate(30deg);
  }
  .starburst:after {
    transform: rotate(-30deg);
  }
  .starburst span:after {
    transform: rotate(30deg);
  }
  .starburst span:before {
    transform: rotate(-30deg);
  }

   .starburstOne{
      width: 4.5em;
      height: 4.5em;  
    }

    .starburstTwo{
      width: 5em;
      height: 5em;  
    }

    	.yellowreflect{
    		box-shadow: 10px -10px rgb(255, 237, 0); 
    		-moz-box-shadow: 10px -10px rgb(255, 237, 0); 
    		-webkit-box-shadow: 10px -10px rgb(255, 237, 0); 
    		-o-box-shadow: 10px -10px rgba(255,237,0,0.6);
    	}

    	.whitecontour{ /* STYLE */
    		border: 4px solid white;
    	}

      .greenbackground{                
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px;          
         padding: 5pt;
         text-align: center;
      }
		.yellowcontour{ /* STYLE */
    		border: 10px solid yellow;
    	}
    	.smallcircle { 
    		width:100px;height:100px;  
        background-color: rgba(0,145,131,0.8);     	
        display: table-cell;
        vertical-align: middle;          
    		border-radius:200px;
  			text-align: center;
  			}
    
      .tinycircle {  /* LOGO DECORATION */
        width:65px;height:65px;  
        background-color: rgba(0,145,131,0.8);      
        border-radius:200px; line-height: 100px;    
        text-align: center;
        }

		  .bigcircle { /* LOGO DECORATION */
        width:250px;height:250px; 			
			  background-color: rgba(0,145,131,0.8);  
        line-height: 250px;  			
    		border-radius:380px;     		
  			text-align: center;
  			opacity: 1;
  			filter: alpha(opacity=100);
  		}

		 #target{
     background-image: url(img/bg<?=rand(1,4)?>.png);
    	width: 10.5cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}



		#content{		 
		 height: 14.8cm;
		 margin: 10px;
		 padding:5px;
		  background-color: rgba(255,255,255,0.6); 
     border: solid white 1px;      
		}

		.strikeout {		 
		  line-height: 1px;
		  position: relative;
		}
		.strikeout::after {
		  border-bottom: 0.100em solid red;
		  content: "";
		  left: 0;
		  margin-top: calc(0.125em / 2 * -1);
		  position: absolute;
		  right: 0;
		  top: 50%;
		}

    #save_image_locally{
      background-color: #009183;
      font-size: 30pt;
      color:white;
    }
		
		hr { display: block; height: 1px;
    		border: 0; border-top: 3px solid #fff;
    		margin: 1px 0; padding: 0; }


    .title{
      color:#ffed00;
      font-size:80pt;
      background-color: rgba(0,145,131,0.8);  
      border-radius: 10px;      
    }

    .nopromotitle{
      color:#ffed00;
      font-size:40pt;
      background-color: rgba(0,145,131,0.8);  
      border-radius: 10px;      
    }

    .percent {
      color: #ffed00;
      font-size: 60pt;      
      font-weight: bold;
      }

    .originpicture{
        width:40px;
        text-align: center;
    }

    .originpicturePromo{
        width:100px;
    }

    .originNormal{
         color:white;
         font-size:10pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px;          
         width: 340px;
         padding: 5pt;
         text-align: center;
    }

    .origin{
         color:white;
         font-size:10pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px;          
         width: 100px;
         padding: 5pt;
         text-align: center;
    }


    .rielprice{
      color:#ffed00;
      font-size: 22pt;
    }


    .newprice{
    color:white;
    font-size: 22pt;    
    } 

    .oldprice {
      color:#ffed00;      
      font-size: 14pt;
      text-align: right;
    }

  .productname{
    color:white;
    font-size: 20pt;
    font-weight: bold;
    background-color: rgba(0,145,131,0.5);                            
    }


  .productnamePromo{
    color:white;
    font-size: 16pt;
    font-weight: bold;
    background-color: rgba(0,145,131,0.5);                            
    }


    


    .product{
      height: 260px;      
      border-radius: 10px;
      }

    .productPromo{
      height: 230px;      
      border-radius: 10px;
      }

    .till{
      color:#ffed00;
      font-weight: bold;      
    }

      .rounded{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);
        padding: 20px;
        width: 140px;
        height: 300px; 
        
    }
    
     .dollarprice{
      color:#ffffff;
      font-size: 40pt;
    }

    </style>
</head>

<body  >

<?php 

  //if (1)
  //{
  //  renderFourProduct(array(FakeProduct(),FakeProductPromo(),FakeProduct(),FakeProductPromo()));
  //}
  if (isset($_GET["barcodes"]))
  {  
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $_GET["barcodes"]);      
    if (count($itemList) > 0)
      renderFourProduct($itemList);
  } 
  else if (isset($_GET["barcode1"]) )
  {    
    $barcodes = implode("|",array($_GET["barcode1"],$_GET["barcode2"],$_GET["barcode3"],$_GET["barcode4"]));    
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $barcodes);      
    if (count($itemList) > 0)  
      renderFourProduct($itemList);    
?>
<?php } else { ?>

<center>
  <img height='200px' src='img/biglogo.png' >
  <br>
  <h1 style='color:#009183'>A6 LABEL GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td  align="center">      
      <form  method="GET">
        <span style='color:white'>BARCODE1</span><input name='barcode1' ><br>        
        <span style='color:white'>BARCODE2</span><input name='barcode2' ><br>        
        <span style='color:white'>BARCODE3</span><input name='barcode3' ><br>        
        <span style='color:white'>BARCODE4</span><input name='barcode4' ><br>                
        <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
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

function renderFourProduct($products)
{
  $percent1 = "0";
  $percent2 = "0";
  $percent3 = "0";
  $percent4 = "0";
   if (count($products) > 0)
    $percent1 = ($products[0]["discpercent"] != null) ? $products[0]["discpercent"] : "0";
  if (count($products) > 1)
    $percent2 = ($products[1]["discpercent"] != null) ? $products[1]["discpercent"] : "0";
  if (count($products) > 2)
    $percent3 = ($products[2]["discpercent"] != null) ? $products[2]["discpercent"] : "0";
  if (count($products) > 3)
    $percent4 = ($products[3]["discpercent"] != null) ? $products[3]["discpercent"] : "0";

  $render = 
    "<center><button id='save_image_locally'>Download</button></center>
    <div id='target' style='width:23cm'>    
    <center>
    <table border='1' >
    <tr>
      <td width='50%' align='center'>
      <div id='content' style='width:10.5cm'>
      ";
      if ($percent1 == "0")
        $render .= _renderProduct( isset($products[0]) ? $products[0] : null );
      else 
        $render .= _renderPromoProduct( isset($products[0]) ? $products[0] : null );
      $render .= 
      "
      </div>
      </td>
      <td width='50%' align='center'>
      <div id='content' style='width:10.5cm'>";
      if ($percent2 == "0")
        $render .= _renderProduct( isset($products[1]) ? $products[1] : null);
      else 
        $render .= _renderPromoProduct( isset($products[1]) ? $products[1] : null);
      $render .=
      "
      </div>
      </td>
    </tr>

    <tr>
      <td width='50%' align='center'>
      <div id='content' style='width:10.5cm'>
      ";
      if ($percent3 == "0")
        $render .= _renderProduct( isset($products[2]) ? $products[2] : null );
      else 
        $render .= _renderPromoProduct( isset($products[2]) ? $products[2] : null );
      $render .= 
      "
      </div>
      </td>
      <td width='50%' align='center'>
      <div id='content' style='width:10.5cm'>";
      if ($percent4 == "0")
        $render .= _renderProduct( isset($products[3]) ? $products[3] : null );
      else 
        $render .= _renderPromoProduct( isset($products[3]) ? $products[3] : null);
      $render .=
      "
      </div>
      </td>
    </tr>

    </table>
    </center>     
     </div>";  
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

  if (strpos($percent,".") === false)
    $percentSize = "32";
  else 
    $percentSize = "22";

  return "
   <table border='0'>
    <tr> 
        <td width='300px' valign='top' align='left'>
          <div class='origin whitecontour' >
            <center>
            <img class='originpicturePromo' src=$flag />
            <br>
            Origin : $country</center>
          </div> 
        </td>  

        <td align='center' width='30%' >
            <div class='starburst starburstOne' >
              <span style='font-size:".$percentSize."pt'>-$percent%
              </span>
            </div>
        </td>    
    </tr>
    <tr>
      <td align='center'  colspan='2'>
      <div class='productnamePromo whitecontour'>        
        <span style='color:#ffed00;font-family:\"KH Content\"' >$nameKH</span><br>
          $nameEN
        <hr>
          <span class='oldprice strikeout'>$oldPrice</span> <br>  
          <span class='rielprice'>$rielPrice ៛</span> |           
          <span style='dollarPrice'>$dollarPrice</span>    
        <hr> 
           <span class='till'>From ".$from."</span>       
        <span class='till'>".($till == "N/A" ? "Until out of stock" : "Till $till") ."</span>
      </div>
      </td>
    </tr>
    <tr>    
      <td valign='top' colspan='2'>
        <center>
          <img class='productPromo whitecontour'  src='data:image/jpeg;base64, $image'><br>
          <span style='color:white'>$barcode</span>
        </center>
      </td>      
    </tr>
   </table>";
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

  return "
   <table border='0'>
      <tr>
        <td align='center'  colspan='2'>
        <div class='productname whitecontour'>        
          <span style='color:#ffed00;font-family:\"KH Content\"'>$nameKH</span><br>
            $nameEN
          <hr>        
          <table >
          <tr height='100px'>
            <td>
              <span class='rielprice'>$rielPrice ៛</span>      
            </td>
          
            <td width='100px' align='center'> 
              <div class='starburst starburstOne'> <span style='font-size:25pt'>$dollarPrice</span></div>          
            </td>
          </tr>
          <tr>
            <td colspan='2'>
              
              <center>
              <img class='originpicture' src=$flag /><br>
              <span style='font-size:10pt;color:white' >Origin : $country</span>
              </center>
              </span>             
            </td>
          </tr>
          </table>        
        </div>
        </td>      
      </tr>
      
      <tr>
        <td valign='top' colspan='2'>
          <center>
            <img class='product whitecontour'  src='data:image/jpeg;base64, $image'><br>
            <span style='color:white'>$barcode</span>
          </center>
        </td>      
      </tr>
     </table>";
}

function renderOneProduct($product)
{
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";

    $render = 
    "<center><button id='save_image_locally'>Download</button></center>
    <div id='target'>
    <div id='content'>
    <center>";
      if ($percent == "0")
        $render .=   _renderProduct($product);
      else     
        $render .=   _renderPromoProduct($product);        
      $render .=
    "</center>
     </div>
     </div>";  
    echo $render;
}

function flagByCountry($flag){
  return $flag = 'img/flags/'.strtolower($flag).'.png';
}
?>

<script>
   $('#save_image_locally').click(function(){           
      let opt = { scale : 1,                  
                };
      html2canvas(document.getElementById('target'),opt).then(function(canvas) {
      canvas.toBlob(function(blob){
          saveAs(blob, 'lastlabels.jpg');                
      },'image/png');
      
      },);
  });
</script>

</body>
</html