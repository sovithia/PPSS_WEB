<?php
include('RestEngine.php');
?>

<html>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="html2canvas.min.js"></script>

    <style> 

    	.yellowreflect{
    		box-shadow: 10px -10px rgb(255, 237, 0); 
    		-moz-box-shadow: 10px -10px rgb(255, 237, 0); 
    		-webkit-box-shadow: 10px -10px rgb(255, 237, 0); 
    		-o-box-shadow: 10px -10px rgba(255,237,0,0.6);
    	}

    	.whitecontour{
    		border: 4px solid white;
    	}

		.yellowcontour{
    		border: 10px solid yellow;
    	}
    	.smallcircle { 
    		width:180px;height:180px;  
        background-color: rgba(0,145,131,0.8);     	
    		border-radius:200px; line-height: 200px;  	
  			text-align: center;
  			}
    
      .tinycircle { 
        width:80px;height:80px;  
        background-color: rgba(0,145,131,0.8);      
        border-radius:200px; line-height: 100px;    
        text-align: center;
        }



		.bigcircle { width:250px;height:250px; 			
			  background-color: rgba(0,145,131,0.8);  
        line-height: 250px;  	
    		border-radius:380px; 
  			text-align: center;
  			opacity: 1;
  			filter: alpha(opacity=100);
  		}

		.percent {
			color: #ffed00;
			font-size: 80pt;			
			font-weight: bold;
  		}

      .smallpercent {
      color: #ffed00;
      font-size: 60pt;      
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
  			font-size:50pt;
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
        width: 400px;height: 400px;
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
		.rielprice{
			color:#ffed00;
			font-size: 20pt;
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
	   	font-size: 25pt;
	   	text-align: right;
		}
		.productname{
		color:white;
 		font-size: 15pt;
 		font-weight: bold;
		}

    .productnameBig{
      font-size: 20pt;
      font-weight: bold;
      color:white;
    }

		.till{
			color:#ffed00;
			font-weight: bold;	   	
		}
		
/* 2 */
		.product2{
  			width: 300px;height: 300px;
  			background-color: rgba(0,145,131,0.5);  						  						
			border-radius: 10px;

  		}

		.rounded2{
			 border-radius: 10px;
  			background: rgba(0,145,131,0.7);
  			padding: 20px;
  			width: 153px; 
  			height: 260px;  			  		
		}

    .rounded3{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);
        padding: 20px;
        width: 153px; 
        height: 100px;              
    }

  .productDetails{
       border-radius: 10px;
        background: rgba(0,145,131,0.7);      
        width: 500px; 
        height: 230px;              
    }


		.rielprice2{
			color:#ffed00;
			font-size: 15pt;
		}

		.newprice2{
		color:white;
 		font-size: 36pt;
 		text-align: right; 		
		}	

		.info2{
		color:white;
 		font-size: 10pt;
		}
		.oldprice2 {
	   	color:#ffed00;	   	
	   	font-size: 20pt;
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
    	background-image: url(images/background.jpg);
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
		  line-height: 1em;
		  position: relative;
		}
		.strikeout::after {
		  border-bottom: 0.125em solid red;
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


<?php if (isset($_POST["action"])) { 

  if ($_POST["action"] == "NORMAL")
  {    

    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabel/" . $_POST['barcodes']);      
    if (count($itemList) == 1)
    {
      renderOneProduct($itemList[0]);
    }
    else // TMP
    {
      renderTwoProduct($itemList[0],$itemList[1]); 
    }
  }
  else if ($_POST["action"] == "PROMO")
  {
    $itemList = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/biglabelpromo/" . $_POST['barcodes']);  
    if (count($itemList) == 1)
    {
      renderOneProductPromo($itemList[0]);
    }
    else // TMP
    {
      renderTwoProductPromo($itemList[0],$itemList[1]);
    }
  }

?>


<?php } else { ?>

<center>
  <img height='200px' src='images/roundlogo.png' >
  <br>
  <h1 style='color:#009183'>BIG LABEL GENERATOR</h1>
  (Paste barcodes separated by a '|' character, support up to 2 now)
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td width="50%" align="center">
      <span style='color:white'>NORMAL</span>
      <form  method="POST">
        <textarea name='barcodes' rows="4" cols="50"></textarea><br>        
        <input type='hidden' value='NORMAL' name='action' />
        <input style='background-color:#ffed00' type='submit' value='GENERATE' />
      </form>
    </td>

    <td width="50%" align="center">
      <span style='color:white'>PROMO</span>
      
      <form  method="POST">
        <textarea name='barcodes' rows="4" cols="50"></textarea><br>
        <input type='hidden' value='PROMO' name='action' />
        <input style='background-color:#ffed00' type='submit' value='GENERATE' />
      </form>
    </td>
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 

function flagByCountry($flag)
{
  if ($flag == 'LOCAL')    
    return 'images/flags/cambodia';
  return $flag = 'images/flags/'.strtolower($flag).'.png';
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

  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];

  echo "
  <center><button id='save_image_locally'>Download</button></center>

   <div id='target'>
    <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>         
        <tr height='10%'>      
            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' height='30px' src='images/roundlogo.png'></td>          
         </tr>

         <tr height='80%'>
            <td  width='50%' >
             <table width='100%' height='100%' >          
                  <tr height='70%'>
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='100%' align='center'>
                            <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image1'> 
                          </td>
                        </tr>

                        <tr>  
                          <td  width='30%'>
                             <div class='productDetails whitecontour' align='center' >
                                    <span class='productnameBig'>
                                    $nameKH1<br>$nameEN1<br>
                                    </span>
                                    <hr>
                                    <div class='rielprice'>$rielPrice1 ៛</div>                 
                                    <div class='newprice' >$dollarPrice1</div>                                                                                            
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
                             <div class='productDetails whitecontour' align='center' >
                                    <span class='productnameBig'>
                                      $nameKH2<br>
                                      $nameEN2<br>
                                    </span>
                                    <hr>
                                    <div class='rielprice'>$rielPrice2 ៛</div>                 
                                    <div class='newprice'>$dollarPrice2</div>
                              </div> 
                          </td>
                        </tr>

                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='bottom'>
                        <td  width='70%' align='center'>
                          <img class='productmedium whitecontour'  src='data:image/jpeg;base64, $image2'>  
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

  $till1 = $product2["discpercentend"];
  $percent1 = $product1["discpercent"];

  $oldPrice1 = (substr($dollarPrice1,1) * 100) / (100 - $percent1);
  $oldPrice1 = "$".substr($oldPrice1,0,4);


  $nameKH2 = $product2["nameKH"];
  $nameEN2 = $product2["nameEN"];
  $flag2 = flagByCountry($product2["country"]);
  $dollarPrice2 = $product2["dollarPrice"];
  $rielPrice2 = $product2["rielPrice"];  
  $country2 = $product2["country"];
  $image2 = $product2["productImg"];
  $oldprice2 = '';
  $till2 = $product2["discpercentend"];
  $percent2 = $product2["discpercent"];

  $oldPrice2 = (substr($dollarPrice2,1) * 100) / (100 - $percent2);
  $oldPrice2 = "$".substr($oldPrice2,0,4);

  echo "
  <center><button id='save_image_locally'>Download</button></center>

    <div id='target'>
     <div id='content' >
     <center>
       <table border='0' width='98%' height='98%'>
         <tr height='16%' valign='center'>      
            <td align='center' class='rounded3' colspan='2'><img  class='tinycircle whitecontour' src='images/roundlogo.png'>
            <span class='titlemedium'>PROMOTION</span></td>      
         </tr>
         <tr>
            <td width='50%' >
             <table width='100%' height='100%' border='0'>          
                  <tr height='70%'>
                    
                    <td colspan='2'>
                      <table width='100%' height='100%'>
                        <tr valign='top'>
                          <td  width='70%'>
                            <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image1'> 
                          </td>
                          <td  width='30%'>
                             <div class='rounded2 whitecontour' align='right' >
                                    <div class='rielprice2'>$rielPrice1 ៛</div>                 
                                    <div class='newprice2' align='right'>$dollarPrice1</div>                              
                                    
                                    <hr>        
                                    <div class='oldprice2 strikeout'>$oldPrice1</div>   
                                    <hr>
                                    <span class='productname2'>
                                      $nameKH1<br>$nameEN1<br>
                                    </span>
                                    <br>
                                    <span class='till2'>Till $till1</span>
                             </div> 
                          </td>
                        </tr>
                      </table>
                    </td>

                  </tr>
                  <tr height='30%'>
                    <td width='45%' align='center'>
                      <div class='smallcircle whitecontour' ><span class='smallpercent'>-$percent1%</span></div>
                    </td>
                    <td width='30%' align='center'>              
                          <img class='originpicturesmall' width='180px' src='$flag1' />
                          <br>
                          <span style='color:white;font-size:16pt'>Origin : $country1</span>
                      
                    </td>              
                  </tr>
              </table>
            </td>
            <td  width='50%'>
              <table width='100%' height='100%'>
                <tr height='30%'>
                  <td width='45%' align='center'>
                      <div class='smallcircle whitecontour' ><span class='smallpercent'>-$percent2%</span></div>
                    </td>
                    <td width='30%' align='center'>              
                          <img class='originpicturesmall' width='180px' src='$flag2' />
                          <br>
                          <span style='color:white;font-size:16pt'>Origin : $country2</span>              
                    </td> 
                </tr>

                <tr height='70%'>
                  <td colspan='2'>
                    <table width='100%' height='100%'>
                      <tr valign='bottom'>
                        <td  width='70%'>
                          <img class='product2 whitecontour'  src='data:image/jpeg;base64, $image2'>  
                        </td>
                        <td  width='30%'>
                           <div class='rounded2 whitecontour' align='right' >
                                  <div class='rielprice2'>$rielPrice1 ៛</div>                 
                                  <div class='newprice2' align='right'>$dollarPrice2</div>                              
                                
                                  <hr>        
                                  <div class='oldprice2 strikeout'>$oldPrice2</div>   
                                  <hr>
                                  <span class='productname2'>
                                  $nameKH2<br>$nameEN2<br>
                                  </span>
                                  <br>
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


function renderOneProduct($product1)
{
  $nameKH = $product1["nameKH"];
  $nameEN = $product1["nameEN"];
  $flag = flagByCountry($product1["country"]);
  $dollarPrice = $product1["dollarPrice"];
  $rielPrice = $product1["rielPrice"];  
  $country = $product1["country"];
  $image = $product1["productImg"];

	echo "
  <center><button id='save_image_locally'>Download</button></center>
	<div id='target'>
	<div id='content'>

    <center><table >

    <tr height='250px'>    
    	<td align='center' width='70%' colspan='3'>
      <div class='titlesmall whitecontour'>$nameKH<br>$nameEN<br></div></td>    	
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
			<img  class='smallcircle whitecontour' src='images/roundlogo.png'>    		    	
    	</td>
    	
    	
    	<td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'></td>
    	
    	<td width='250px' valign='top' align='right'>
    		<div class='rounded whitecontour' align='right'>
	    		<div class='rielprice'>$rielPrice ៛</div> 		    	
	    		<div class='newprice' align='right'>$dollarPrice</div>  
	    		<hr>	    		
    		</div> 
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
  $dollarPrice = $product1["dollarPrice"];
  $rielPrice = $product1["rielPrice"];  
  $country = $product1["country"];
  $image = $product1["productImg"];
  $percent = $product1["discpercent"];
  $oldPrice = (substr($dollarPrice,1) * 100) / (100 - $percent);
  $oldPrice = "$".substr($oldPrice,0,4);

  $till = $product1["discpercentend"];
  $percent = $product1["discpercent"];
	echo "
  <center><button id='save_image_locally'>Download</button></center>
	<div id='target'>
	<div id='content' >

    <center><table border='0'>

    <tr height='250px'>
    	
    	<td align='center' width='70%' colspan='2'><div class='titlebig whitecontour'>Promotion</div></td>
    	<td align='right' width='30%' ><div class='bigcircle whitecontour' ><span class='percent'>-$percent%</span></div></td>
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
			<img  class='smallcircle whitecontour' src='images/roundlogo.png'>    		    	
    	</td>
    	
    	<td valign='top'><img class='product whitecontour'  src='data:image/jpeg;base64, $image'></td>
    	
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


?>





<script>
 $('#save_image_locally').click(function(){
   		html2canvas(document.getElementById('target')).then(function(canvas) {
   			var imgString = canvas.toDataURL();
            window.open(imgString);
    		//document.body.appendChild(canvas);
		});
 });


</script>



</body>
</html>