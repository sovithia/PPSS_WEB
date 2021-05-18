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
        font-family: impact;
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
         border-ra

dius: 10px;          
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
       border-radius: 10px;
        background: rgba(0,145,131,0.7);      
        width: 300px; 
        height: 235px;
        display: table-cell;
      vertical-align: middle;               
    }


/* THREE */
    .percentThree {
    color: #ffed00;
    font-size: 20pt;      
    font-weight: bold;
    }

    .circleThree { 
      width:70px;height:70px;  
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
        font-size:80pt;
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
      font-size: 35pt;
    }

    .dollarpriceMedium{
      color:#ffffff;
      font-size: 35pt;
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
 		font-size: 15pt;
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
		 width: 98%;
		 height: 21cm;
		 margin: 10px;
		 padding:5px;
		 background-color: rgba(128,128,128,0.6);		    
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

    </style>
</head>

<body  >

<?php 
  if (isset($_GET["barcodes"]))
  {

    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabel/" . $_GET['barcodes']);      
    if (count($itemList) == 1)
    {
      renderOneProductPromo($itemList[0]);
    }
    else if (count($itemList) == 2)
    {
      renderTwoProductPromo($itemList[0],$itemList[1]); 
    }
    else if (count($itemList) == 3)
    {
      renderThreeProductPromo($itemList[0],$itemList[1],$itemList[2]);
    }
    else 
    {
      renderFourProductPromo($itemList[0],$itemList[1],$itemList[2],$itemList[3]);      
    }    
  }
 else if (isset($_POST["action"])) 
 { 
   $barcodes = implode("|",array($_POST['barcode1'],$_POST['barcode2'],$_POST['barcode3'],$_POST['barcode4']));
   $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabel/" . $barcodes);      
  if ($_POST["action"] == "NORMAL")
  {       
    if (count($itemList) == 1)    
      renderOneProduct($itemList[0]);    
    else if (count($itemList) == 2)        
      renderTwoProduct($itemList[0],$itemList[1]); 
    else if (count($itemList) == 3)
      renderThreeProduct($itemList[0],$itemList[1],$itemList[2]);             
    else if (count($itemList) == 4)
      renderFourProduct($itemList[0],$itemList[1],$itemList[2],$itemList[3]);             
  }
  else if ($_POST["action"] == "PROMO")
  {    
    if (count($itemList) == 1)
      renderOneProductPromo($itemList[0]);    
    else if (count($itemList) == 2)        
      renderTwoProductPromo($itemList[0],$itemList[1]); 
    else if (count($itemList) == 3)
      renderThreeProductPromo($itemList[0],$itemList[1],$itemList[2]);             
    else if (count($itemList) == 4)
      renderFourProductPromo($itemList[0],$itemList[1],$itemList[2],$itemList[3]);  
  }

?>


<?php } else { ?>

<center>
  <img height='200px' src='img/roundlogo.png' >
  <br>
  <h1 style='color:#009183'>BIG LABEL GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td width="50%" align="center">
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

    <td width="50%" align="center">
      <span style='color:white'>PROMO</span>
      
      <form  method="POST">        
        <span style='color:white'>BARCODE 1</span><input name='barcode1' ><br>
        <span style='color:white'>BARCODE 2</span><input name='barcode2' ><br>
        <span style='color:white'>BARCODE 3</span><input name='barcode3' ><br>
        <span style='color:white'>BARCODE 4</span><input name='barcode4' ><br>

        <input type='hidden' value='PROMO' name='action' />
        <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
      </form>
    </td>
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 




// PROMO
function renderFourProductPromo($product1,$product2,$product3,$product4)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $till1 = $product1["discpercentend"] ?? "N/A";
  $percent1 = $product1["discpercent"] ?? "0";
  $oldPrice1 = $product1["oldPrice"] ?? $dollarPrice1;
  $barcode1 = $product1["barcode"];


  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $oldprice2 = '';
  $till2 = $product2["discpercentend"] ?? "N/A";
  $percent2 = $product2["discpercent"] ?? "0";
  $oldPrice2 = $product2["oldPrice"] ?? $dollarPrice2;
  $barcode2 = $product2["barcode"];

  $nameKH3 = $product3["nameKH"];
  $nameEN3 = $product3["nameEN"];
  $flag3 = flagByCountry($product3["country"]);
  $dollarPrice3 = $product3["dollarPrice"];
  $rielPrice3 = $product3["rielPrice"];  
  $country3 = $product3["country"];
  $image3 = $product3["productImg"];  
  $till3 = $product3["discpercentend"] ?? "N/A";
  $percent3 = $product3["discpercent"] ?? "0";
  $oldPrice3 = $product3["oldPrice"] ?? $dollarPrice3;
  $barcode3 = $product3["barcode"];

  $nameKH4 = $product4["nameKH"];
  $nameEN4 = $product4["nameEN"];
  $flag4 = flagByCountry($product4["country"]);
  $dollarPrice4 = $product4["dollarPrice"];
  $rielPrice4 = $product4["rielPrice"];  
  $country4 = $product4["country"];
  $image4 = $product4["productImg"];  
  $till4 = $product4["discpercentend"] ?? "N/A";
  $percent4 = $product4["discpercent"] ?? "0";
  $oldPrice4 = $product4["oldPrice"] ?? $dollarPrice4;
  $barcode4 = $product4["barcode"];

  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
        <tr height='10%' valign='center'>      
            <td align='center' class='rounded3' colspan='4'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titleThree'>PROMOTION</span></td>      
         </tr>        

         <tr height='80%'>

            <td  width='25%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</>
                          </td>
                        </tr>

                        <tr valign='bottom'> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH1</span>
                                    <br>$nameEN1
                                    </span>
                                    <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice1</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice1"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice1</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent1%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till1</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='25%'>
              <table width='100%' height='100%' >
                  <tr valign='top'>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH2</span>
                                    <br>$nameEN2
                                  </span>                                  

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice2</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice2</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent2%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till2</span> 
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%' >
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='70%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                            <span style='color:white'>$barcode2</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='25%'>
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image3'><br>
                            <span style='color:white'>$barcode3</>
                          </td>
                        </tr>

                        <tr valign='bottom'>  
                          <td  width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH3</span>
                                    <br>$nameEN3
                                  </span>

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice2</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice2</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent2%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till1</span> 

                                                                                                                           
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>              
              </table>
            </td>

            <td  width='25%'>
              <table width='100%' height='100%' >
                  <tr>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH2</span>
                                    <br>$nameEN2
                                  </span>                                  

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice2</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice2</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent2%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till2</span> 
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='70%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                            <span style='color:white'>$barcode2</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>


         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}


function renderThreeProductPromo($product1,$product2,$product3)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $till1 = $product1["discpercentend"] ?? "N/A";
  $percent1 = $product1["discpercent"] ?? "0";
  $oldPrice1 = $product1["oldPrice"] ?? $dollarPrice1;
  $barcode1 = $product1["barcode"];


  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $oldprice2 = '';
  $till2 = $product2["discpercentend"] ?? "N/A";
  $percent2 = $product2["discpercent"] ?? "0";
  $oldPrice2 = $product2["oldPrice"] ?? $dollarPrice2;
  $barcode2 = $product2["barcode"];

  $nameKH3 = $product3["nameKH"];
  $nameEN3 = $product3["nameEN"];
  $flag3 = flagByCountry($product3["country"]);
  $dollarPrice3 = $product3["dollarPrice"];
  $rielPrice3 = $product3["rielPrice"];  
  $country3 = $product3["country"];
  $image3 = $product3["productImg"];  
  $till3 = $product3["discpercentend"] ?? "N/A";
  $percent3 = $product3["discpercent"] ?? "0";
  $oldPrice3 = $product3["oldPrice"] ?? $dollarPrice3;
  $barcode3 = $product3["barcode"];
  
  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
         <tr height='10%' valign='center'>      
            <td align='center' class='rounded3' colspan='3'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titleThree'>PROMOTION</span></td>      
         </tr>        

         <tr height='80%'>

            <td  width='33%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%' >
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</span>
                          </td>
                        </tr>

                        <tr valign='bottom'> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH1</span>
                                    <br>$nameEN1
                                    </span>
                                    <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice1</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice1"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice1</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent1%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till1</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='33%'>
              <table width='100%' height='100%' >
                  <tr>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH2</span>
                                    <br>$nameEN2
                                  </span>                                  

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice2</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice2</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent2%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till2</span> 
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%' >
                    <td colspan='2'>
                      <table width='100%' height='100%' >
                        <tr valign='bottom'>
                          <td  width='70%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                            <span style='color:white'>$barcode2</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='33%'>
             <table width='100%' height='100%'  >          
                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image3'><br>
                            <span style='color:white'>$barcode3</span>
                          </td>
                        </tr>

                        <tr valign='bottom'>  
                          <td  width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productname'>
                                    <span style='color:ffed00'>$nameKH3</span>
                                    <br>$nameEN3
                                  </span>

                                  <hr>
                                    <span class='oldpriceThree strikeout'>$oldPrice2</span>   
                                    <hr>
                                    <span class='rielpriceSmall'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceSmall'>$dollarPrice2</span>                                       
                                    <div class='circleThree whitecontour' >
                                      <span class='percentThree'>-$percent2%</span>
                                    </div>                                     
                                    <span class='till2'>Till $till1</span> 

                                                                                                                           
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>              
              </table>
            </td>
         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}

function renderTwoProductPromo($product1,$product2)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $till1 = $product1["discpercentend"] ?? "N/A";
  $percent1 = $product1["discpercent"] ?? "0";
  $oldPrice1 = $product1["oldPrice"] ?? $dollarPrice1;
  $barcode1 = $product1["barcode"];


  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $oldprice2 = '';
  $till2 = $product2["discpercentend"] ?? "N/A";
  $percent2 = $product2["discpercent"] ?? "0";
  $oldPrice2 = $product2["oldPrice"] ?? $dollarPrice2;
  $barcode2 = $product2["barcode"];




  echo "
  <center><button id='save_image_locally'>Download</button></center>

    <div id='target'>
     <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>
         <tr height='16%' valign='center'>      
            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' src='img/roundlogo.png'>
            <span class='titlemedium'>PROMOTION</span></td>      
         </tr>
         <tr>
            <td width='50%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='70%'>
                            <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</span>
                          </td>
                          <td  width='30%'>
                             <div class='rounded2 whitecontour' align='right' >
                                    <div class='rielprice2'>$rielPrice1"."៛"."</div>                 
                                    <div class='newprice2' align='right'>$dollarPrice1</div>                              
                                    <hr>                                      
                                    <div class='oldprice2 strikeout'>$oldPrice1</div>   
                                    <hr>
                                    <span class='productname2'>
                                      $nameKH1<br>$nameEN1<br>
                                    </span>                                    
                                    <span class='till2'>Till $till1</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>

                  </tr>
                  <tr height='30%' >
                    <td width='45%' align='center'>
                      <div class='smallcircle whitecontour' ><span class='smallpercent'>-$percent1%</span></div>
                    </td>
                    <td width='30%' align='right'>     
                        <div class='greenbackground whitecontour originTwo' >         
                          <img  width='160px' src='$flag1' />
                          <br>
                          <span style='color:white;font-size:16pt'>Origin : $country1</span>
                        </div>
                    </td>              
                  </tr>
              </table>
            </td>


            <td  width='50%'>
              <table width='100%' height='100%' >
                <tr height='30%'>
                  <td width='45%' align='center'>
                      <div class='smallcircle whitecontour' ><span class='smallpercent'>-$percent2%</span></div>
                    </td>
                    <td width='30%' align='right'>          
                        <div class='greenbackground whitecontour originTwo'>     
                          <img width='160px' src='$flag2' /><br>
                          <span style='color:white;font-size:16pt'>Origin : $country2</span>              
                        </div>
                    </td> 
                </tr>

                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%' >
                      <tr valign='bottom'>
                        <td  width='70%'>
                          <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                          <span style='color:white'>$barcode2</span>
                        </td>
                        <td  width='30%'>
                           <div class='rounded2 whitecontour' align='right' >
                                  <div class='rielprice2'>$rielPrice2"."៛"."</div>                 
                                  <div class='newprice2' align='right'>$dollarPrice2</div>                              
                                
                                  <hr>        
                                  <div class='oldprice2 strikeout'>$oldPrice2</div>   
                                  <hr>
                                  <span class='productname2'>
                                  $nameKH2<br>$nameEN2<br>
                                  </span>                                  
                                  <span class='till2'>Till $till2</span>
                              </div> 
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
         </tr>
       </table>
      </center>
      </div>
    </div>";
}

function renderOneProductPromo($product1)
{
  $nameKH = $product1["nameKH"];
  $nameEN = $product1["nameEN"];
  $flag = flagByCountry($product1["country"]);
   
  $country = $product1["country"];
  $image = $product1["productImg"];
  $percent = $product1["discpercent"] ?? "0";
  
  $dollarPrice = $product1["dollarPrice"];
  $rielPrice = $product1["rielPrice"];   
  $oldPrice = $product1["oldPrice"] ?? $dollarPrice;
  

  $barcode = $product1["barcode"];
  $till = $product1["discpercentend"] ?? "N/A";  
	echo "
  <center><button id='save_image_locally'>Download</button></center>
	<div id='target'>
	<div id='content' >

    <center><table border='0'>

    <tr height='250px'>
    	
    	<td align='center' width='70%' colspan='2'><div class='titlebig whitecontour'>Promotion</div></td>
    	<td align='right' width='30%' ><div class='bigcircle whitecontour' ><span class='mediumpercent'>-$percent%</span></div></td>
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
    	
    	<td width='250px' valign='top' align='right'>
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

// NORMAL

function renderFourProduct($product1,$product2,$product3,$product4)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $barcode1 = $product1["barcode"];

  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $barcode2 = $product2["barcode"];

  $nameKH3 = $product3["nameKH"];
  $nameEN3 = $product3["nameEN"];
  $flag3 = flagByCountry($product3["country"]);
  $dollarPrice3 = $product3["dollarPrice"];
  $rielPrice3 = $product3["rielPrice"];  
  $country3 = $product3["country"];
  $image3 = $product3["productImg"];
  $barcode3 = $product3["barcode"];

  $nameKH4 = $product4["nameKH"];
  $nameEN4 = $product4["nameEN"];
  $flag4 = flagByCountry($product4["country"]);
  $dollarPrice4 = $product4["dollarPrice"];
  $rielPrice4 = $product4["rielPrice"];  
  $country4 = $product4["country"];
  $image4 = $product4["productImg"];
  $barcode4 = $product4["barcode"];

  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
        <tr height='20%'>      
            <td align='center' class='rounded3' colspan='4'><img  class='tinycircle whitecontour' height='30px' src='img/roundlogo.png'></td>          
         </tr>

         <tr height='80%' >

            <td  width='25%''>
             <table width='100%' height='100%' >          
                  <tr height='100%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</>
                          </td>
                        </tr>

                        <tr valign='top'>  
                          <td  width='30%'>
                             <div class='productDetailsFour whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH1</span>
                                    <br>$nameEN1
                                    </span>
                                    <hr>
                                    <span class='rielprice'>$rielPrice1"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                                    <span class='dollarprice' >$dollarPrice1</span>                                                                                            
                             </div> 
                          </td>
                        </tr>

                      </table>
                    </td>
                  </tr>                
              </table>
            </td>

             <td  width='25%'>
              <table width='100%' height='100%' >
               <tr  valign='bottom'>  
                  <td width='30%'>
                     <div class='productDetailsFour whitecontour' align='center' >
                            <span class='productname'>
                              <span style='color:ffed00'>$nameKH2</span>
                              <br>$nameEN2
                            </span>
                            <hr>
                            <span class='rielprice'>$rielPrice2"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class='dollarPrice' >$dollarPrice2</span>
                      </div> 
                  </td>
                </tr>
                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='top'>
                        <td  width='70%' align='center'>
                          <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                          <span style='color:white'>$barcode2</>
                        </td>                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>      


            <td  width='25%'>
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='100%' align='center'>
                            <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image3'><br>
                            <span style='color:white'>$barcode3</>
                          </td>
                        </tr>

                        <tr valign='top'>  
                          <td  width='30%'>
                             <div class='productDetailsFour whitecontour' align='center' >
                                    <span class='productname'>
                                    <span style='color:ffed00'>$nameKH3</span>
                                    <br>$nameEN3
                                    </span>
                                    <hr>
                                    <span class='rielprice'>$rielPrice3"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                                    <span class='dollarprice' >$dollarPrice3</span>                                                                                            
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>                
              </table>
            </td>

            <td  width='25%'>
              <table width='100%' height='100%'>
               <tr  valign='bottom'>  
                  <td width='30%'>
                     <div class='productDetailsFour whitecontour' align='center' >
                            <span class='productname'>
                              <span style='color:ffed00'>$nameKH4</span>
                              <br>$nameEN4
                            </span>
                            <hr>
                            <span class='rielprice'>$rielPrice4"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class='dollarPrice' >$dollarPrice4</span>
                      </div> 
                  </td>
                </tr>
                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='top'>
                        <td  width='70%' align='center'>
                          <img class='productFour whitecontour'  src='data:image/jpeg;base64, $image4'><br>  
                          <span style='color:white'>$barcode4</>
                        </td>                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>         


         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}

function renderThreeProduct($product1,$product2,$product3)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $barcode1 = $product1["barcode"];

  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $barcode2 = $product2["barcode"];

  $nameKH3 = $product3["nameKH"];
  $nameEN3 = $product3["nameEN"];
  $flag3 = flagByCountry($product3["country"]);
  $dollarPrice3 = $product3["dollarPrice"];
  $rielPrice3 = $product3["rielPrice"];  
  $country3 = $product3["country"];
  $image3 = $product3["productImg"];
  $barcode3 = $product3["barcode"];
  
  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
        <tr height='10%'>      
            <td align='center' class='rounded3' colspan='3'><img  class='tinycircle whitecontour' height='30px' src='img/roundlogo.png'></td>          
         </tr>

         <tr height='80%'>

            <td  width='33%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>                  
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</>
                          </td>
                        </tr>

                        <tr> 
                          <td width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                    <span class='productnameBig'>
                                    <span style='color:ffed00'>$nameKH1</span>
                                    <br>$nameEN1
                                    </span>
                                    <hr>
                                    <span class='rielpriceMedium'>$rielPrice1"."៛"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                    <span class='dollarpriceMedium'>$dollarPrice1</span>   

                                    
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='33%'>
              <table width='100%' height='100%' >
                  <tr>  
                      <td  width='30%' align='center'>
                           <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productnameBig'>
                                    <span style='color:ffed00'>$nameKH2</span>
                                    <br>$nameEN2
                                  </span>
                                  <hr>
                                  <span class='rielpriceMedium'>$rielPrice2"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                  <span class='dollarpriceMedium'>$dollarPrice2</span>   
                                  
                            </div> 
                      </td>
                  </tr>

                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='70%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                            <span style='color:white'>$barcode2</>
                          </td>                        
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
            </td>

            <td  width='33%'>
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='bottom'>
                          <td  width='100%' align='center'>
                            <img class='productmediumsmall whitecontour'  src='data:image/jpeg;base64, $image3'><br>
                            <span style='color:white'>$barcode3</>
                          </td>
                        </tr>

                        <tr>  
                          <td  width='30%' align='center'>
                             <div class='productDetailsThree whitecontour' align='center' >
                                  <span class='productnameBig'>
                                    <span style='color:ffed00'>$nameKH3</span>
                                    <br>$nameEN3
                                  </span>
                                  <hr>
                                  <span class='rielpriceMedium'>$rielPrice3"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                  <span class='dollarpriceMedium'>$dollarPrice3</span>   
                                  </span>                                                                                            
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>              
              </table>
            </td>
         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}

function renderTwoProduct($product1,$product2)
{
  $nameKH1 = $product1["nameKH"];
  $nameEN1 = $product1["nameEN"];
  $flag1 = flagByCountry($product1["country"]);
  $dollarPrice1 = $product1["dollarPrice"];
  $rielPrice1 = $product1["rielPrice"];  
  $country1 = $product1["country"];
  $image1 = $product1["productImg"];
  $barcode1 = $product1["barcode"];

  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $barcode2 = $product2["barcode"];

  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
        <tr height='10%'>      
            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' height='30px' src='img/roundlogo.png'></td>          
         </tr>

         <tr height='80%'>
            <td  width='50%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image1'><br>
                            <span style='color:white'>$barcode1</>
                          </td>
                        </tr>

                        <tr>  
                          <td  width='30%'>
                            <table><tr>
                               <td> 
                               <div class='productDetailsTwo whitecontour' align='center' >
                                      <span class='productname'>
                                      <span style='color:ffed00'>$nameKH1</span>
                                      <br>$nameEN1
                                      </span>
                                      <hr>
                                      <span class='rielpriceMedium'>$rielPrice1"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                                      <span class='dollarpriceMedium'>$dollarPrice1</span>  
                              </td>
                              <td  align='center'>              
                                <div class='greenbackground whitecontour originTwo' >
                                  <img class='originpicturesmall' width='180px' src='$flag1' /><br>
                                  <span style='color:white;font-size:16pt'>Origin : $country1</span>                      
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
            </td>
            <td  width='50%'>
              <table width='100%' height='100%'>
                      <tr>  
                          <td  width='30%'>                          
                          <table><tr>
                             <td>
                                <div class='productDetailsTwo whitecontour' align='center' >
                                    <span class='productname'>
                                      <span style='color:ffed00'>$nameKH2</span>
                                      <br>$nameEN2
                                    </span>
                                    <hr>
                                    <span class='rielpriceMedium'>$rielPrice2"."៛"."</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <span class='dollarPriceMedium' >$dollarPrice2</span>
                                </div>
                              </td>
                              <td>
                                <div class='greenbackground whitecontour originTwo' >
                                  <img class='originpicturesmall' width='180px' src='$flag2' /><br>
                                  <span style='color:white;font-size:16pt'>Origin : $country2</span>                      
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
                          <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image2'><br>  
                          <span style='color:white'>$barcode2</>
                        </td>                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
         </tr>
       </table>

     </center>
    </div>
   </div>
  ";
}
function renderOneProduct($product1)
{
  $nameKH = $product1["nameKH"];
  $nameEN = $product1["nameEN"];
  $flag = flagByCountry($product1["country"]);
  $dollarPrice = $product1["dollarPrice"];
  $rielPrice = $product1["rielPrice"];  
  $country = $product1["country"];
  $image = $product1["productImg"];
  $barcode = $product1["barcode"];

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
        <div class='rounded whitecontour' align='right'>
          <div class='rielpriceBig'>$rielPrice ៛</div>          
          <div class='dollarpriceBig' align='right'>$dollarPrice</div>  
          <hr>          
        </div> 
      </td>

    </tr>
   </table>
  </center>
  </div>
  </div>";
}


function flagByCountry($flag){
  return $flag = 'img/flags/'.strtolower($flag).'.png';
}
?>

<script>
   $('#save_image_locally').click(function(){           
      let opt = { scale : 5};
      html2canvas(document.getElementById('target'),opt).then(function(canvas) {
      
      canvas.toBlob(function(blob){
          saveAs(blob, 'lastlabels.jpg');                
      },'image/png');
      
      },);
  });
</script>

</body>
</html>