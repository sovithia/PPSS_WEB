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

    
/* */
		#target{
    	background-image: url(images/background.jpg);
    	width: 21cm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;
		}

		#content{
		 width: 98%;
		 height: 29.7cm;
		 margin: 10px;
		 padding:5px;
		 background-color: rgba(128,128,128,0.6);		    
		}

    .oneProduct {

    }

    .
		
    #save_image_locally{
      background-color: #009183;
      font-size: 30pt;
      color:white;
    }		

    </style>

</head>




<body>

<div id='target'>
    <div id='content' >

      <div style='height:20%;width:100%;background-color: yellow' ></div>


      <table border='1' width="100%" height='80%'>
        <tr>
          <td>
            <div>
            </div>
          </td>
          <td>P2</td>
          <td>P3</td>
        </tr>
        <tr>
          <td>P1</td>
          <td>P2</td>
          <td>P3</td>
        </tr>
        <tr>
          <td>P1</td>
          <td>P2</td>
          <td>P3</td>
        </tr>

      </table>

    </div>
</div>  

</body>



</html>

