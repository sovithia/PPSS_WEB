<?php
include('RestEngine.php');
require_once('functions.php');
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
      width: 7em;
      height: 7em;  
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
    		width:160px;height:160px;  
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
    	width: 21.0cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}

		#content{
		 width: 98%;
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
    		margin: 1em 0; padding: 0; }


    .title{
      color:#ffed00;
      font-size:80pt;
      background-color: rgba(0,145,131,0.8);  
      border-radius: 10px;      
    }

    .nopromotitle{
      color:#ffed00;
      font-size:32pt;
      background-color: rgba(0,145,131,0.8);  
      border-radius: 10px;      
    }

    .percent {
      color: #ffed00;
      font-size: 70pt;      
      font-weight: bold;
      }

 

    .originpicture{
        width:150px;
        text-align: center;
    }

    .origin{
         color:white;
         font-size:20pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px;          
         width: 150px;
         padding: 5pt;
         text-align: center;
    }

    .rielprice{
      color:#ffed00;
      font-size: 20pt;
    }


    .newprice{
    color:white;
    font-size: 30pt;    
    } 

    .oldprice {
      color:#ffed00;      
      font-size: 20pt;
      text-align: right;
    }

  .productname{
    color:white;
    font-size: 11pt;
    font-weight: bold;
    }


    .product{
        width: 340px;height: 340px;
        background-color: rgba(0,145,131,0.5);                            
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

  
  if (isset($_GET["barcodes"]))
  {  
    $barcodes = split("|",$_GET["barcodes"]);
    $newString = "";
    foreach($barcodes as $barcode){
      $newString .= str_replace(" ","%20",$barcode). "|";
    }
    $newString = substr($newString,0,-1);
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $newString);              
    if (count($itemList) == 1)
      renderOneProduct($itemList[0]);  
  } 
  else if (isset($_GET["barcode1"]) )
  { 
    $b1 = str_replace(" ","%20",$_GET['barcode1']);   
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $b1);      
    if (count($itemList) == 1)  
      renderOneProduct($itemList[0]);    
?>

<?php  } else { ?>

<center>
  <img height='200px' src='img/biglogo.png' >
  <br>
  <h1 style='color:#009183'>A5 LABEL GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td align="center">
      <span style='color:white'>NORMAL</span>
      <form  method="GET">
        <span style='color:white'>BARCODE</span><input name='barcode1' ><br>        
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



function renderOneProduct($product)
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

  if ($percent == "0")
  { 
    echo "
    <center><button id='save_image_locally'>Download</button></center>
    <div id='target'>
    <div id='content'>

      <center><table border='0'>

      <tr height='160px'>    
        <td align='center' width='70%' colspan='3'>
        <div class='nopromotitle whitecontour'>
            <span style='font-family:\"KH Content\"'>$nameKH</span>
            <br><span style='color:white'>$nameEN</span>
        </div></td>     
      </tr>

    
      <tr height='380px'>
        <td width='300px' valign='top' align='left'>
          <div class='origin whitecontour' >
            <img class='originpicture' src=$flag />
            <br>
            <center><span>Origin : $country</span></center>
          </div>        
        
        <img  class='smallcircle whitecontour' src='img/roundlogo.png'>             
        </td>
        
        
        <td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'>
        <center><span style='color:white'>$barcode</span></center></td>
        
        <td width='250px' valign='top' align='center'>
          <div class='rounded whitecontour' >
            <div class='rielprice'>$rielPrice ៛</div><br>          
              <div class='starburst starburstOne'>
              <span style='font-size:35pt'>$dollarPrice</span>
              </div>  
              <br>
            <hr>          
          </div> 
        </td>
      </tr>
     </table>
    </center>
    </div>
    </div>";
  }
  else
  {
    if (strpos($percent,".") === false)
      $percentSize = "40";
    else 
      $percentSize = "30";

    echo " 
      <center><button id='save_image_locally'>Download</button></center>
      <div id='target'>
      <div id='content' >

      <center><table border='0'>

      <tr height='170px'>
        
        <td align='center' width='70%' colspan='2'><div class='title whitecontour'>Promotion</div></td>
        <td align='center' width='30%' >
          <div class='starburst starburstOne'  >
            <span style='font-size:".$percentSize."pt'>-$percent%</span>
          </div>
        </td>
      </tr>

    
      <tr height='380px'>
        <td width='300px' valign='top' align='center'>
          <div class='origin whitecontour' >
            <img class='originpicture' src=$flag />
            <br>
            <center><span>Origin : $country</span></center>
          </div>
        <br>
              
        <br>
        <img  class='smallcircle whitecontour' src='img/roundlogo.png'>             
        </td>
        
        <td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'>
        <center><span style='color:white'>$barcode</span></center>
        </td>
        
        <td width='250px' valign='top' align='right'>
          <div class='rounded whitecontour' align='right' >
            <div class='rielprice'>$rielPrice ៛</div>           
            <div class='newprice' align='right'>$dollarPrice</div>  
            <hr>                    
            <div class='oldprice strikeout'>$oldPrice</div>   
            <hr>
            <span class='productname'>
            <span style='color:#ffed00;font-family:\"KH Content\"'>$nameKH</span><br>
            $nameEN<br>
            </span>
            <span class='till'>From $from</span>         
            <span class='till'>Till $till</span>
          </div> 
        </td>

      </tr>
     </table>
     </center>
     </div>
     </div>
    ";
  }
}

?>

<script>
   $('#save_image_locally').click(function(){           
      let opt = { scale : 1};
      html2canvas(document.getElementById('target'),opt).then(function(canvas) {
      
      canvas.toBlob(function(blob){
          saveAs(blob, 'lastlabels.jpg');                
      },'image/png');
      
      },);
  });
</script>

</body>
</html>