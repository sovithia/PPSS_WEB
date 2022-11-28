

<?php 

if(isset($_GET["BARCODE"]))
{    

	$stats = orderStatistics($_GET["BARCODE"]);

	// GENERAL 
	echo "<table>
			<tr><td colspan=4><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$stats["PRODUCTID"]."></td></tr>
			<tr><td colspan=4>".$stats["PRODUCTID"]."</td></tr>
			<tr><td colspan=4>".$stats["PRODUCTNAME"]."</td></tr>

			<tr>
				<td> 
					<table>	
							<tr><td colspan='2'>GENERAL</td></tr>						
							<tr><td>PACK MULTIPLE</td><td>".$stats["MULTIPLE"]."</td></tr>
							<tr><td>ON HAND</td><td>".$stats["ONHAND"]."</td></tr>
							<tr><td>COST</td><td>".$stats["COST"]."</td></tr>
							<tr><td>PRICE</td><td>".$stats["PRICE"]."</td></tr>
							<tr><td>MARGIN</td><td>".($stats["PRICE"] - $stats["COST"])."</td></tr>
							<tr><td>MARGIN %</td><td>".((($stats["PRICE"] - $stats["LASTCOST"]) / $stats["LASTCOST"]) * 100)."%</td></tr>
					</table>				
				</td>
				<td> 
					<table>
							<tr><td colspan='2'>RECEIVE</td></tr>						
							<tr><td>TOTALRECEIVE</td><td>".$stats["TOTALRECEIVE"]."</td></tr>
							<tr><td>LASTRCVDATE</td><td>".$stats["LASTRCVDATE"]."</td></tr>
							<tr><td>LASTRECEIVEQUANTITY</td><td>".$stats["LASTRECEIVEQUANTITY"]."</td></tr>
	
					</table>
				</td>
			</tr>
			
			<tr>
				<td> 
					<table>
						<tr><td colspan='2'>SALE</td></tr>						
						<tr><td>TOTALSALE</td><td>".$stats["TOTALSALE"]."</td></tr>
						<tr><td>SALESINCELASTRECEIVE</td><td>".$stats["SALESINCELASTRECEIVE"]."</td></tr>
						<tr><td>(75% of Last RCV QTY)</td><td>".($stats["QTYSALE"] * 0.75)."</td></tr>
						<tr><td>SALE SPEED FOR 75%</td><td>".$stats["SALESPEED"]."</td></tr>
						<tr><td>SALE FROM LASTRCVDATE TO NOW</td><td>".$stats["QTYSALE"]."</td></tr>
						<tr><td> PERCENTAGE SOLD FROM RCVQTY</td><td>".$stats["RATIOSALE"]."</td></tr>
					</table>
				</td>
				<td> 
					<table>
						<tr><td>TOTAL PROMO QTY</td><td>".$stats["PROMO"]."</td></tr>
						<tr><td>TOTAL WASTE QTY</td><td>".$stats["WASTE"]."</td></tr>
					</table> 
				
				</td>
			</tr>

			<tr>
				<td colspan='2'>
					<table>
						<tr><td>FINALQTY</td><td>".$stats["FINALQTY"]."</td></tr>
						<tr><td>DECISION</td><td>".$stats["DECISION"]."</td></tr>
					</table> 
				</td>
			</tr>
		";	
}
else{
	echo "
		<html style='background-color:#009183;color:white'>
			<center><img height='100px' src='http://phnompenhsuperstore.com/assets/images/logo.png'></center>
			<br><br>
			<center>
			BARCODE
			<form>
				<input type='text' namne='BARCODE' value=''><br>
				<input type='submit' text=''>
			</form>
			</center>
		</html>";
}
?>
</html>