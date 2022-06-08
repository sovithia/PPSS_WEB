<?php
include('RestEngine.php');
require_once('functions.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); 
?>

<html>
<head>
  

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

<body>
		<div class="">
			<form method="post" action="export.php">
     		<input type="submit" name="export" class="btn btn-success" value="Export" />
    	</form>
			<div class="data-container">
				<table id="tblData" class="tblData">
					<tr>
						<th>No</th>
						<th>Location</th>
						<th>Item Code</th>
						<th>Productline</th>
						<th>Store Bin</th>
						<th>Description1</th>
						<th>Description2</th>
						<th>Vend ID</th>
						<th>Vend Name</th>
						<th>U/M</th>
						<th>Onhand</th>
						<th>Cost</th>
						<th>Last Cost</th>
						<th>Retail Price</th>
						<th>Pro.Percent</th>
						<th>New Price</th>
					</tr>

					<tr>
						<td>1</td>
						<td>WH1</td>
						<td>8850210030043</td>
						<td>COOKING OIL</td>
						<td>S.G02B-C03-L3</td>
						<td>Healthy Chef 100% Oil 6x1900ml</td>
						<td>ប្រេងឆាសុទ្ធ១០០%</td>
						<td>400-106</td>
						<td>Sen Sovithia</td>
						<td>U/M</td>
						<td>100</td>
						<td>4.5000</td>
						<td>4.5000</td>
						<td>6.85</td>
						<td>20%</td>
						<td>5.48</td>
					</tr>
						<tr>
						<td>2</td>
						<td>WH1</td>
						<td>8850210030043</td>
						<td>COOKING OIL</td>
						<td>S.G02B-C03-L3</td>
						<td>Healthy Chef 100% Oil 6x1900ml</td>
						<td>ប្រេងឆាសុទ្ធ១០០%</td>
						<td>400-106</td>
						<td>Sen Sovithia</td>
						<td>U/M</td>
						<td>100</td>
						<td>4.5000</td>
						<td>4.5000</td>
						<td>6.85</td>
						<td>20%</td>
						<td>5.48</td>
					</tr>
				</table>
			</div>
		</div>
</body>
</html>