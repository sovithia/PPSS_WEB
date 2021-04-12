<?php
include('RestEngine.php');
?>

<html>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="html2canvas.min.js"></script>

    <script type="text/javascript" src="canvas-toBlob.js"></script>
    <script type="text/javascript" src="FileSaver.js"></script>



    <style> 
 
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
      width: 10em;
      height: 10em;  
    }
    .starburstTwo{
      width: 10em;
      height: 10em;  
    }

   .starburstThree{
      width: 5em;
      height: 5em;  
    }




      html{
        font-family: Myriad Pro Bold;
      }

/* BEGIN FRAMES */
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
    		width:180px;height:180px;  
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

/* END */

/* ONE */

/* TWO */

    .originTwo{
      height:235px;
      padding:10px; 
      display: table-cell;
      vertical-align: middle;          
    }

    .originpictureTwoPromo{
        width:160px;
        text-align: center;
      }


       .productDetailsTwo{
       border-radius: 5px;
        background: rgba(0,145,131,0.7);      
        width: 300px; 
        height: 235px;
        display: table-cell;
      vertical-align: middle;               
    }


/* THREE */
    .percentThree {
    color: #ffed00;
    font-size: 24pt;      
    font-weight: bold;
    }

    .circleThree { 
      width:80px;height:80px;  
      background-color: rgba(0,145,131,0.8);      
      display: table-cell;
      vertical-align: middle;          
      border-radius:140px;
      text-align: center;
      }
    
   
    .titleThree{
        color:#ffed00;
        font-size:44pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px; 
    }
 
    .productDetailsThree{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);      
        width: 300px; 
        height: 300px; 
      display: table-cell;
       vertical-align: middle;                            
    }

    .oldpriceThree {
      color:#ffed00;      
      font-size: 20pt;
      text-align: center;
    }

/* FOUR */
    .productFour{
      width: 250px;
      height: 250px;
      background-color: rgba(0,145,131,0.5);                            
      border-radius: 10px;        
      }

    .productDetailsFour{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);      
        width: 250px; 
        height: 250px;
        display: table-cell;
        vertical-align: middle;                   

    }

      .smallpercent {
      color: #ffed00;
      font-size: 60pt;      
      font-weight: bold;
      }

      .mediumpercent {
      color: #ffed00;
      font-size: 80pt;      
      font-weight: bold;
      }

      .bigpercent {
      color: #ffed00;
      font-size: 80pt;      
      font-weight: bold;
      }

     
  		.originpicture{
  			width:200px;
        text-align: center;
  		}

      .originpicturesmall{
        width:180px;
        text-align: center;
      }
  		.origin{
			   color:white;
  			font-size:20pt;
  			 background-color: rgba(0,145,131,0.8);  
  			 border-radius: 10px; 
  			 height: 180px;
  			 width: 210px;
  			 padding: 5pt;
  			 text-align: center;
  		}

        .originsmall{
      color:white;
        font-size:20pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px; 
         height: 180px;
         width: 180px;
         padding: 5pt;
         text-align: center;
      }



  		.titlesmall{
  			color:#ffed00;
  			font-size:42pt;
  			 background-color: rgba(0,145,131,0.8);  
  			 border-radius: 10px;   		
  		}

      .titlemedium{
        color:#ffed00;
        font-size:55pt;
         background-color: rgba(0,145,131,0.8);  
         border-radius: 10px;       
      }

  		.titlebig{
  			color:#ffed00;
  			font-size:120pt;
  			background-color: rgba(0,145,131,0.8);  
  			border-radius: 10px;   		
  		}

  	.product{
  			width: 500px;height: 500px;
  			background-color: rgba(0,145,131,0.5);  						  						
			border-radius: 10px;

  		}

    .productmedium{
      width: 400px;
      height: 400px;
      background-color: rgba(0,145,131,0.5);                            
      border-radius: 10px;
      }

    .productmediumsmall{
      width: 300px;
      height: 300px;
      background-color: rgba(0,145,131,0.5);                            
      border-radius: 10px;
      }

  
  		

		.rounded{
			 border-radius: 10px;
  			background: rgba(0,145,131,0.7);
  			padding: 20px;
  			width: 213px; 
  			height: 460px;  			  		
		}
		
	
/* 1 */
    .rielpriceSmall{
      color:#ffed00;
      font-size: 16pt;
    }

    .dollarpriceSmall{
      color:#ffffff;
      font-size: 16pt;
    }

    .rielprice{
      color:#ffed00;
      font-size: 25pt;
    }

    .dollarprice{
      color:#ffffff;
      font-size: 25pt;
    }

    .rielpriceMedium{
      color:#ffed00;
      font-size: 30pt;
    }

    .dollarpriceMedium{
      color:#ffffff;
      font-size: 30pt;
    }

		.rielpriceBig{
			color:#ffed00;
			font-size: 40pt;
		}

    .dollarpriceBig{
      color:#ffffff;
      font-size: 40pt;
    }
    



		.newprice{
		color:white;
 		font-size: 50pt; 		
		}	

		.info{
		color:white;
 		font-size: 15pt;
		}
		.oldprice {
	   	color:#ffed00;	   	
	   	font-size: 30pt;
	   	text-align: right;
		}
		.productname{
		color:white;
 		font-size: 12pt;
 		font-weight: bold;
		}

    .productnameBig{
      font-size: 18pt;
      font-weight: bold;
      color:white;
    }

		.till{
			color:#ffed00;
			font-weight: bold;	   	
		}
		
/* 2 */
		.product2{
  			width: 300px;
        height: 300px;
  			background-color: rgba(0,145,131,0.5);  						  						
			border-radius: 10px;

  		}

		.rounded2{
			 border-radius: 10px;
  			background: rgba(0,145,131,0.7);
  			padding: 10px;
  			width: 163px; 
  			height: 280px;  			  		
		}




    .rounded3{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);
        padding: 10px;
        width: 153px; 
        height: 80px;              
    }

    .productDetails{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);      
        width: 500px; 
        height: 230px; 

    }





		.rielprice2{
			color:#ffed00;
			font-size: 25pt;
		}

		.newprice2{
		color:white;
 		font-size: 30pt;
 		text-align: right; 		
		}	

    .newpriceX{
    color:white;
    font-size: 35pt;
    text-align: center;    
    } 

		.info2{
		color:white;
 		font-size: 10pt;
		}
		.oldprice2 {
	   	color:#ffed00;	   	
	   	font-size: 25pt;
	   	text-align: right;
		}
		.productname2{
		color:white;
 		font-size: 10pt;
 		font-weight: bold;
		}
		.till2{
			color:#ffed00;
			font-weight: bold;	   	
		}
/* */
		#target{
    	background-image: url(img/bg<?=rand(1,4)?>.png);
    	width: 29.7cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}

		#content{
		 width: 98%;
		 height: 21cm;
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
    		margin: 0.9em 0; padding: 0; }

    </style>
</head>

<body  >

<?php 
  


  if (isset($_GET["barcodes"]))
  {    
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $_GET["barcodes"]);      
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
    $barcodes = implode("|",array($_GET['barcode1'],$_GET['barcode2'],$_GET['barcode3'],$_GET['barcode4']));
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
  $image = $product["productImg"];
  $till = ($product["discpercentend"] != null) ? $product["discpercentend"] : "N/A";
  $from = ($product["discpercentstart"] != null) ? $product["discpercentstart"] : "N/A";
  $percent = ($product["discpercent"] != null) ? $product["discpercent"] : "0";
  $oldPrice = ($product["oldPrice"] != null) ? $product["oldPrice"]  : $dollarPrice;
  $barcode = $product["barcode"];

  if ($percent == 0)
  {
    echo "
    <center><button id='save_image_locally'>Download</button></center>
    <div id='target'>
    <div id='content'>

      <center><table >

      <tr height='250px'>    
        <td align='center' width='70%' colspan='3'>
        <div class='titlesmall whitecontour'>$nameKH
            <br><span style='color:white'>$nameEN</span><br>
        </div></td>     
      </tr>

    
      <tr height='535px'>
        <td width='300px' valign='top' align='left'>
          <div class='origin whitecontour' >
            <img class='originpicture' src=$flag />
            <br>
            <center><span>Origin : $country</span></center>
          </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <img  class='smallcircle whitecontour' src='img/roundlogo.png'>             
        </td>
        
        <td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'>
        <span style='color:white'>$barcode</span></td>
        
        <td width='250px' valign='top' align='right'>
          <div class='rounded whitecontour' align='center'>
            <div class='rielpriceBig'>$rielPrice ៛</div>          
            <div class='starburst starburstOne' >
              <span style='font-size:48pt'>$dollarPrice</span>
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
    $percentSize = "60";
  else 
    $percentSize = "45";
    echo "
      <center><button id='save_image_locally'>Download</button></center>
      <div id='target'>
      <div id='content' >

        <center><table border='0'>

        <tr height='250px'>
          
          <td align='center' width='70%' colspan='2'><div class='titlebig whitecontour'>Promotion</div></td>
          <td align='center' width='30%' >          
            <div class='starburst starburstOne' >
              <span style='font-size:".$percentSize."pt'>-$percent%
              </span>
            </div>
          </td>
        </tr>

      
        <tr height='535px'>
          <td width='300px' valign='top' align='left'>
            <div class='origin whitecontour' >
              <img class='originpicture' src=$flag />
              <br>
              <center><span>Origin : $country</span></center>
            </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <img  class='smallcircle whitecontour' src='img/roundlogo.png'>             
          </td>
          
          <td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'>
          <span style='color:white'>$barcode</span>
          </td>
          
          <td width='250px' valign='top' align='center'>
            <div class='rounded whitecontour' align='right' >
              <div class='rielprice'>$rielPrice ៛</div>           
              <div class='newprice' align='right'>$dollarPrice</div>  
              <hr>                    
              <div class='oldprice strikeout'>$oldPrice</div>   
              <hr>
              <span class='productname'>
              $nameKH<br>$nameEN<br>
              </span>
              <hr>
              <span class='till'>From $from</span><br>
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


  if ($percent != "0")
  {
    if (strpos($percent,".") === false)
      $percentSize = "60";
    else 
      $percentSize = "45";

    return "
     <table width='100%' height='100%' >          
                  <tr >
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr >
                          <td  width='70%'>
                            <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</span>
                          </td>
                          <td  width='30%'>
                             <div class='rounded2 whitecontour' align='right' >
                                    <div class='rielprice2'>$rielPrice"."៛"."</div>                 
                                    <div class='newprice2' align='right'>$dollarPrice</div>                              
                                    <hr>                                      
                                    <div class='oldprice2 strikeout'>$oldPrice</div>   
                                    <hr>
                                    <span class='productname2'>
                                      $nameKH<br>$nameEN<br>
                                    </span>      
                                     <span class='till2'>From $from</span><br>                              
                                    <span class='till2'>Till $till</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>

                  </tr>
                  <tr>
                    <td width='45%' align='center'>
                      <div class='starburst starburstTwo'>
                        <span style='font-size:".$percentSize."pt'>
                        -$percent%
                        </span>
                      </div>
                    </td>
                    <td width='30%' align='right'>     
                        <div class='greenbackground whitecontour originTwo' >         
                          <img  width='160px' src='$flag' />
                          <br>
                          <span style='color:white;font-size:16pt'>Origin : $country</span>
                        </div>
                    </td>              
                  </tr>
              </table>
            </td>
        ";
      }
      else{        
        return "
         <table width='100%' height='100%' >          
                  <tr height='70%'>
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</>
                          </td>
                        </tr>

                        <tr>  
                          <td  width='30%'>
                            <table><tr>
                               <td> 
                               <div class='productDetailsTwo whitecontour' align='center' >
                                      <span class='productname'>
                                      <span style='color:ffed00'>$nameKH</span>
                                      <br>$nameEN
                                      </span>
                                      <hr>
                                      <span class='rielpriceMedium'>$rielPrice"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                      <span class='dollarpriceMedium'>$dollarPrice</span>  
                              </td>
                              <td  align='center'>              
                                <div class='greenbackground whitecontour originTwo' >
                                  <img class='originpicturesmall' width='180px' src='$flag' /><br>
                                  <span style='color:white;font-size:16pt'>Origin : $country</span>                      
                                </div>
                              </td>  

                            <tr></table>                                                                                                                                           
                            </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>                  
              </table>
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


  if ($percent != "0")
  {    
    if (strpos($percent,".") === false)
      $percentSize = "60";
    else 
      $percentSize = "45";
  return "
   <table width='100%' height='100%' >
                <tr >
                  <td width='45%' align='center'>
                      <div class='starburst starburstTwo'>
                        <span style='font-size:".$percentSize."pt'>-$percent%</span>                      
                      </div>
                    </td>
                    <td width='30%' align='right'>          
                        <div class='greenbackground whitecontour originTwo'>     
                          <img width='160px' src='$flag' /><br>
                          <span style='color:white;font-size:16pt'>Origin : $country</span>              
                        </div>
                    </td> 
                </tr>

                <tr >
                  <td colspan='2'>
                    <table width='100%' height='100%' >
                      <tr valign='bottom'>
                        <td  width='70%'>
                          <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                          <span style='color:white'>$barcode</span>
                        </td>
                        <td  width='30%'>
                           <div class='rounded2 whitecontour' align='right' >
                                  <div class='rielprice2'>$rielPrice"."៛"."</div>                 
                                  <div class='newprice2' align='right'>$dollarPrice</div>                              
                                
                                  <hr>        
                                  <div class='oldprice2 strikeout'>$oldPrice</div>   
                                  <hr>
                                  <span class='productname2'>
                                  $nameKH<br>$nameEN<br>
                                  </span>        
                                   <span class='till2'>From $from</span><br>                          
                                  <span class='till2'>Till $till</span>
                              </div> 
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
      ";
    }
    else
    {
      return "
      <table width='100%' height='100%'>
              <tr>  
                  <td  width='30%'>                          
                  <table><tr>
                     <td>
                        <div class='productDetailsTwo whitecontour' align='center' >
                            <span class='productname'>
                              <span style='color:ffed00'>$nameKH</span>
                              <br>$nameEN
                            </span>
                            <hr>
                            <span class='rielpriceMedium'>$rielPrice"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <span class='dollarPriceMedium' >$dollarPrice</span>
                        </div>
                      </td>
                      <td>
                        <div class='greenbackground whitecontour originTwo' >
                          <img class='originpicturesmall' width='180px' src='$flag' /><br>
                          <span style='color:white;font-size:16pt'>Origin : $country</span>                      
                        </div>
                      <td>
                      </td>
                  <tr></table> 
                  </td>
                </tr>

                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='bottom'>
                        <td  width='70%' align='center'>
                          <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                          <span style='color:white'>$barcode</>
                        </td>                        
                      </tr>
                    </table>
                  </td>
                </tr>
      </table>";
    }
}
function renderTwoProduct($product1,$product2)
{
  
  echo "
  <center><button id='save_image_locally'>Download</button></center>

    <div id='target'>
     <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>
         <tr height='12%' valign='center'>      
            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titlemedium'>SALE</span></td>      
         </tr>
         <tr>
            <td width='50%' >"._renderTwoProductPromoLeft($product1)."
            </td>

            <td  width='50%'>".
             _renderTwoProductPromoRight($product2)."
            </td>
         </tr>
       </table>
      </center>
      </div>
    </div>";
}
// THREE
function _renderThreeProductUp($product)
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



  if ($percent == "0")
  {
  return "
            <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</>
                          </td>
                        </tr>

                        <tr> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productnameBig'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                    </span>
                                    <hr>                                    
                                    <span class='rielpriceMedium'>$rielPrice"."៛"."</span><br>                
                                    <div class='starburst starburstThree'>
                                      <span style='font-size:30pt'>$dollarPrice</span>                                     
                                    </div>                                    
                                    <br>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>";
    }
    else {
         if (strpos($percent,".") === false)
      $percentSize = "30";
    else 
      $percentSize = "20";
     return "
            <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%' >
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</span>
                          </td>
                        </tr>

                        <tr valign='bottom'> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                    </span>
                                    <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice</span>   
                                    <hr>
                                    <span class='rielpriceMedium'>$rielPrice"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceMedium'>$dollarPrice</span>                                       
                                    
                                    

                                    <div class='starburst starburstThree' >
                                        <span style='font-size:".$percentSize."pt'>-$percent%</span>
                                    </div>    
                                    <br>                                 
                                    <span class='till2'>From $from</span>
                                     <span class='till2'>Till $till</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
     ";   
    }
}

function _renderThreeProductDown($product)
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

  if ($percent == "0")
  {
    return "
            <table width='100%' height='100%' >
                  <tr>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productnameBig'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                  </span>
                                  <hr>
                                  <span class='rielpriceMedium'>$rielPrice"."៛"."</span><br>
                                  <div class='starburst starburstThree'>
                                      <span style='font-size:30pt'>$dollarPrice</span>                                     
                                  </div> 
                                  <br>                               
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='70%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                            <span style='color:white'>$barcode</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>";
  }
  else{
      if (strpos($percent,".") === false)
        $percentSize = "30";
      else 
        $percentSize = "20";
      return "
      <table width='100%' height='100%' >
                  <tr>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                  </span>                                  

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice</span>   
                                    <hr>
                                    <span class='rielpriceMedium'>$rielPrice"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceMedium'>$dollarPrice</span>                                       
                                    

                                    <div class='starburst starburstThree'>
                                      <span style='font-size:".$percentSize."pt'>-$percent%</span>
                                    </div>
                                    <br>         
                                     <span class='till2'>From $from</span>                             
                                    <span class='till2'>Till $till</span> 
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%' >
                    <td colspan='2'>
                      <table width='100%' height='100%' >
                        <tr valign='bottom'>
                          <td  width='70%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                            <span style='color:white'>$barcode</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
      </table>";
  }
}

function renderThreeProduct($product1,$product2,$product3)
{
  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
       <tr height='12%' valign='center'>      
            <td align='center' class='rounded3' colspan='3'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titlemedium'>SALE</span></td>      
         </tr>
      
         <tr height='80%'>

            <td  width='33%' >
              "._renderThreeProductUp($product1)."
            </td>

            <td  width='33%'>
              "._renderThreeProductDown($product2)."
            </td>

            <td  width='33%'>
              "._renderThreeProductUp($product3)."
            </td>
         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}

// FOUR
function _renderFourProductUp($product)
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

  if ($percent == "0")
  {
    return
        " 
          <table width='100%' height='100%' >          
                  <tr height='100%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</>
                          </td>
                        </tr>

                        <tr valign='top'>  
                          <td  width='30%'>
                             <div class='productDetailsFour whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                    </span>
                                    <hr>
                                    <span class='rielprice'>$rielPrice"."៛"."</span><br>
                                    <div class='starburst starburstThree'>
                                      <span  style='font-size:30pt'>
                                      $dollarPrice</span>                                                                                            
                                    </div>
                                    <br>
                             </div> 
                          </td>
                        </tr>

                      </table>
                    </td>
                  </tr>                
              </table>
          " ;      
  }
  else
  { 
       if (strpos($percent,".") === false)
        $percentSize = "30";
      else 
        $percentSize = "22";
      return "      
          <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image'><br>
                            <span style='color:white'>$barcode</>
                          </td>
                        </tr>

                        <tr valign='bottom'> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                    </span>
                                    <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice</span>                                       
                                    <div class='starburst starburstThree' >
                                      <span style='font-size:".$percentSize."pt'>-$percent%</span>
                                    </div>
                                    <br>             
                                    <span class='till2'>From $from</span>                                                            
                                    <span class='till2'>Till $till</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            ";
  }
}

function _renderFourProductDown($product)
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
 
  if ($percent == "0")
  {
    return "
            <table width='100%' height='100%' >
               <tr  valign='bottom'>  
                  <td width='30%'>
                     <div class='productDetailsFour whitecontour' align='center' >
                            <span class='productname'>
                              <span style='color:ffed00'>$nameKH</span>
                              <br>$nameEN
                            </span>
                            <hr>
                            <span class='rielprice'>$rielPrice"."៛"."</span><br>
                            <div class='starburst starburstThree'>
                              <span  style='font-size:30pt'>
                              $dollarPrice</span>                                                                                            
                            </div>
                            <br>

                      </div> 
                  </td>
                </tr>
                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='top'>
                        <td  width='70%' align='center'>
                          <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                          <span style='color:white'>$barcode</>
                        </td>                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
         ";
  }
  else
  {
      if (strpos($percent,".") === false)
        $percentSize = "30";
      else 
        $percentSize = "22";
      return "
              <table width='100%' height='100%' >
                  <tr valign='top'>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH</span>
                                    <br>$nameEN
                                  </span>                                  

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice</span>                                       
                                    <div class='starburst starburstThree' >
                                      <span style='font-size:".$percentSize."pt'>-$percent%</span>
                                    </div>
                                    <br>                                
                                    <span class='till'>From $from</span>     
                                    <span class='till'>Till $till</span> 
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%' >
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='70%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image'><br>  
                            <span style='color:white'>$barcode</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
      ";
  }
}

function renderFourProduct($product1,$product2,$product3,$product4)
{  

  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         

         <tr height='12%' valign='center'>      
            <td align='center' class='rounded3' colspan='4'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titlemedium'>SALE</span></td>      
         </tr>

        

         <tr height='80%' >

            <td  width='25%''>
             "._renderFourProductUp($product1)."
            </td>

             <td  width='25%'>
               "._renderFourProductDown($product2)."
            </td>      

            <td  width='25%'>
                "._renderFourProductUp($product3)."          
            </td>

            <td  width='25%'>
                "._renderFourProductDown($product4)."        
            </td>         
         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}




function flagByCountry($flag){
  return $flag = 'img/flags/'.strtolower($flag).'.png';
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