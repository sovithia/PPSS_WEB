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
    		border-radius:200px; line-height: 200px;  	
  			text-align: center;
  			}

		.bigcircle { width:250px;height:250px; 			
			line-height: 250px;  	
			background-color: rgba(0,145,131,0.8);  

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

  		.originpicture{
  			width:200px;
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

  		.titlesmall{
  			color:#ffed00;
  			font-size:50pt;
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
 		text-align: right; 		
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
		.rielprice2{
			color:#ffed00;
			font-size: 15pt;
		}

		.newprice2{
		color:white;
 		font-size: 24pt;
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
		
		hr { display: block; height: 1px;
    		border: 0; border-top: 3px solid #fff;
    		margin: 1em 0; padding: 0; }

    </style>
</head>


<body >


<button id="save_image_locally">download img</button>

	<div id="target">

   <div id="content" class="yellowcontour">

   <center>
   <table border="1" width="98%" height='98%'>

   <tr height='16%'>      
      <td colspan='2' class='rounded2'>LAPIN</td>      
   </tr>

  	<tr>
  		<td  width="50%" >
  		 <table width="100%" height='100%'>          
    				<tr height='70%'>
    					<td >
    						<table width="100%" height="100%">
    							<tr valign="top">
    								<td  width="70%">
    									<img class="product2 whitecontour"  src="images/product.png">	
    								</td>
    								<td  width="30%">
    									 <div class="rounded2 whitecontour" align="right" >
  						                <div class="rielprice2">6,300៛</div>                 
                              <div class="newprice2" align="right">$7.99</div>                              
                              <div class="info2">One bottle</div>  

                              <hr>        
                              <div class="oldprice2 strikeout">$10.00</div>   
                              <hr>
                              <span class="productname2">
                              ភេសជ្ជៈ CHUM CHURUM<br>Eragold Soft Drink 300ml<br>
                              </span>
                              <hr>
                              <span class="till2">Till 01-01-20</span>
              				 </div> 
    								</td>
    							</tr>
    						</table>
    					</td>
    				</tr>
    				<tr height='30%'>
    					<td >
    						<img  class="smallcircle whitecontour" src="images/roundlogo.png">                       
    				    </td>
    				</tr>
    		</table>
  		</td>
  		<td  width="50%">
  			<table width="100%" height='100%'>
  				<tr height='30%'>
  					<td align='right'>
  						<div class="origin whitecontour" >
                    
                		<img class="originpicture" src="images/flag.png" />
                		<br>
                		Origin : France
            		</div>
  					</td>
  				</tr>
  				<tr height='70%'>
  					<td >
              <table width="100%" height="100%">
                <tr valign="bottom">
                  <td  width="70%">
                    <img class="product2 whitecontour"  src="images/product.png">  
                  </td>
                  <td  width="30%">
                     <div class="rounded2 whitecontour" align="right" >
                            <div class="rielprice2">6,300៛</div>                 
                            <div class="newprice2" align="right">$7.99</div>                              
                            <div class="info2">One bottle</div>  

                            <hr>        
                            <div class="oldprice2 strikeout">$10.00</div>   
                            <hr>
                            <span class="productname2">
                            ភេសជ្ជៈ CHUM CHURUM<br>Eragold Soft Drink 300ml<br>
                            </span>
                            <hr>
                            <span class="till2">Till 01-01-20</span>
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
	

<?php 




function renderOneProduct()
{
	return '
	<div id="target">
	<div id="content">

    <center><table border="0">

    <tr height="250px">
    	
    	<td align="center" width="70%" colspan="3"><div class="titlesmall whitecontour">ភេសជ្ជៈ CHUM CHURUM<br>Eragold Soft Drink 300ml<br></div></td>    	
    </tr>

  
    <tr height="535px">
    	<td width="300px" valign="top" align="left">
    		<div class="origin whitecontour" >
    			<img class="originpicture" src="img/flag.png" />
    			<br>
    			<center><span>Origin : France</span></center>
    		</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<img  class="smallcircle whitecontour" src="images/roundlogo.png">    		    	
    	</td>
    	
    	
    	<td valign="top"><img class="product whitecontour"  src="img/product.png"></td>
    	
    	<td width="250px" valign="top" align="right">
    		<div class="rounded whitecontour" align="right" >
	    		<div class="rielprice">6,300៛</div> 		    	
	    		<div class="newprice" align="right">$7.99</div>  
	    		<hr>
	    		<div class="info">One bottle</div>  	    			    	
    		</div> 
    	</td>

    </tr>
   </table>
	</center>
	</div>
	</div>';
}


function renderOneProductPromo()
{
	return '
	<div id="target">
	<div id="content" class="yellowcontour">

    <center><table border="0">

    <tr height="250px">
    	
    	<td align="center" width="70%" colspan="2"><div class="titlebig whitecontour">Promotion</div></td>
    	<td align="right" width="30%" ><div class="bigcircle whitecontour" ><span class="percent">-20%</span></div></td>
    </tr>

  
    <tr height="535px">
    	<td width="300px" valign="top" align="left">
    		<div class="origin whitecontour" >
    			<img class="originpicture" src="img/flag.png" />
    			<br>
    			<center><span>Origin : France</span></center>
    		</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<img  class="smallcircle whitecontour" src="img/roundlogo.png">    		    	
    	</td>
    	
    	<td valign="top"><img class="product whitecontour"  src="img/product.png"></td>
    	
    	<td width="250px" valign="top" align="right">
    		<div class="rounded whitecontour" align="right" >
	    		<div class="rielprice">6,300៛</div> 		    	
	    		<div class="newprice" align="right">$7.99</div>  
	    		<hr>
	    		<div class="info">One bottle</div>  
	    		<hr>  		
	    		<div class="oldprice strikeout">$10.00</div>   
	    		<hr>
	    		<span class="productname">
	    		ភេសជ្ជៈ CHUM CHURUM<br>Eragold Soft Drink 300ml<br>
	    		</span>
	    		<hr>
	    		<span class="till">Till 01-01-20</span>
    		</div> 
    	</td>

    </tr>
   </table>
   </center>
   </div>
   </div>
	';
}

//echo renderOneProduct();
//echo renderOneProductPromo();
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