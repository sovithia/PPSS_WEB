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

    .bigcircle { /* LOGO DECORATION */
        width:580px;height:580px;       
        background-color: rgba(0,145,131,0.8);  
        line-height: 250px;       
        border-radius:380px;        
        text-align: center;
        opacity: 1;
        filter: alpha(opacity=100);
        display: table-cell;
        vertical-align: middle;                  
      }

   
		.percent {
      
			color: #ffed00;
			font-size: 230pt;			
			font-weight: bold;
      font-family: impact;            
  		}

    .symbol {
      
      color: #ffed00;
      font-size: 160pt;     
      font-weight: bold;
      font-family: impact;      
      }

    .off {
      
      color: #ffed00;
      font-size: 70pt;     
      font-weight: bold;
      font-family: impact;      
      display: table-cell;
      vertical-align: middle;          
      }
 
/* */
		#target{
    	background-image: url(img/green.jpg);
      background-repeat: no-repeat;
      background-size: auto;

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


<?php if (isset($_GET["percent"])) { 
    echo renderPercent($_GET["percent"]);  
?>

<?php } else { ?>

<center>
  <img height='200px' src='img/roundlogo.png' >
  <br>
  <h1 style='color:#009183'>PERCENTAGE GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>        

    <td width="50%" align="center">
      <span style='color:white'>INPUT PERCENTAGE</span>
      
      <form  method="GET">
        <input name='percent' style="width: 200px" ><br>        
        <input style='background-color:#ffed00' type='submit' value='GENERATE' />
      </form>
    </td>
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 
  function renderPercent($percent){
    return "
            <center><button id='save_image_locally'>Download</button></center>

            <div id='target'>
              <div id='content' >
                <center>
                  <table width='1000px' >
                  <tr>
                    <td align='left'><img height='200px' src='img/roundlogo.png' ></td>
                  </tr>
                  <tr>
                    <td align='center'>
                      <div class='bigcircle' >
                      <center>
                      <table >                      
                        <tr >                        
                          <td rowspan='2' class='percent'>$percent</td>
                          <td class='symbol' >%</td>
                        </tr valign='center'>
                        <tr valign='top'>
                          <td class='off'>OFF</td>
                        </tr>                      
                      </table>  
                      </center>
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