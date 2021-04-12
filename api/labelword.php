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

      html{
        font-family: impact;
      }

    .word {
			color: #ffed00;
			font-size: 100pt;			
			font-weight: bold;
      		font-family: impact;
      background-color: rgba(0,145,131,0.8);
      padding: 20px;  
      border-radius: 30px;
  		}

    .symbol {
      color: #ffed00;
      font-size: 170pt;     
      font-weight: bold;
      font-family: impact;
      }

    .off {
      color: #ffed00;
      font-size: 80pt;     
      font-weight: bold;
      font-family: impact;
      }
 
/* */
		#target{
    	background-image: url(img/green.jpg);
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

<?php if (isset($_GET["word"])) { 
    echo renderWord($_GET["word"]);     
?>

<?php } else { ?>

<center>
  <img height='200px' src='img/roundlogo.png' >
  <br>
  <h1 style='color:#009183'>FREE WORD GENERATOR</h1>  
<table bgcolor="#009183" width="1000px" border='1'>
  <tr>    
    <td width="50%" align="center">
      <span style='color:white'>ENTER ANYTHING</span>
      <form  method="GET">
        <textarea name='word' rows="4" cols="50" style="text-align:center"></textarea><br>                
        <input style='background-color:#ffed00;color:green' type='submit' value='GENERATE' />
      </form>
    </td>

   
  </tr>

  <tr>
</table>
</center>

<?php } ?>

<?php 

function renderWord($word){
    return "
            <center><button id='save_image_locally'>Download</button></center>

            <div id='target'>
              <div id='content' >
                <center>
                  <table width='1000px' height='90%'  >
                  <tr >
                    <td align='left'><img height='200px' src='img/roundlogo.png' ></td>
                  </tr>
                  <tr >
                    <td align='center'>
                      <table  >                      
                        <tr>
                          <td rowspan='2' class='word'>$word</td>                          
                        </tr valign='center'>                   
                      </table>  

                    </td>
                  </tr>
                  <tr>   
                    <td align='right'><span class='off'>&nbsp;</span></td>
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