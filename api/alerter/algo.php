
<html style="background-color:powderblue;">
    <center>
    <h1>Algorithm checker</h1>
    <form method='POST' >
        BARCODE
        <input type='text' name='barcode' /><br><br>
        <input type='submit' name='submit' value="Load existing" />&nbsp;&nbsp;
        <input type='submit' name='submit' value="Calculate new" />
    </form>
    </center>

<?php 
	require_once("../functions.php");
	
	if (isset($_POST['barcode']))
	{
        echo "<center>BARCODE=".$_POST['barcode']."&nbsp;&nbsp;submit=".$_POST['submit']."<center><br>";
		$barcode = $_POST["barcode"];
		if ($_POST['submit'] == 'Load existing')
		{
			$db = getInternalDatabaseNew();
			$sql = "SELECT ITEMREQUESTSTATS.*, ITEMREQUEST.PRODUCTID 
            FROM ITEMREQUESTSTATS,ITEMREQUEST 				
            WHERE 	ITEMREQUEST.ID = ITEMREQUESTSTATS.itemrequest_id
            AND ITEMREQUEST.PRODUCTID  = ? 
            ORDER BY ITEMREQUESTSTATS.CREATED";
			$req = $db->prepare($sql);
			$req->execute(array($barcode));
			$allData = $req->fetchAll(PDO::FETCH_ASSOC);

		}
		else if ($_POST['submit'] == 'Calculate new')
		{
			$allData = [];
			$data = orderStatistics($barcode);
            $data["SALESPEED75"] = $data["SALESPEED"];
            $data["TOTALWASTEQUANTITY"] = $data["WASTE"];
            $data["TOTALPROMOTIONQUANTITY"] = $data["PROMO"];
            $data["CALCULATEDQUANTITY"] = $data["FINALQTY"];
            $data["LASTRECEIVEDATE"] = $data["LASTRCVDATE"];
			array_push($allData,$data);			
		}

		echo "<center>
			<table border='1'>
			<tr>
				<th>RATIO</th>
				<th>SALESPEED75</th>
				<th>WASTE PERCENT</th>
				<th>PROMOTION PERCENT</th>
				<th>DECISION</th>
				<th>CALCULATED QUANTITY</th>
				<th bgcolor='black'>&nbsp;&nbsp;</th>
				<th>LASTRECEIVEDATE</th>
				<th>LASTRECEIVEQUANTITY</th>
				<th>TOTALWASTEQUANTITY</th>
				<th>TOTALPROMOTIONQUANTITY</th>

				<th>TOTALORDERTIME</th>
				<th>TOTALRECEIVE</th>
				<th>SALESSINCELASTRECEIVE</th>
				<th>LASTSALEDAY</th>
				<th>TOTALSALE</th>
			</tr>";

		foreach($allData as $data)
		{			
			$RATIOSALE = ($data["TOTALSALE"] * 100) / $data["TOTALRECEIVE"];
			$SALESPEED75 = $data["SALESPEED75"];
			$WASTEPERCENT = ($data["TOTALWASTEQUANTITY"] * 100) / $data["TOTALRECEIVE"];
			$PROMOTIONPERCENT = ($data["TOTALPROMOTIONQUANTITY"] * 100) / $data["TOTALRECEIVE"];
			$DECISION = $data["DECISION"];
			$CALCULATEDQUANTITY = $data["CALCULATEDQUANTITY"];

			$LASTRECEIVEDATE = $data["LASTRECEIVEDATE"];
			$LASTRECEIVEQUANTITY = $data["LASTRECEIVEQUANTITY"];
			$TOTALWASTEQUANTITY = $data["TOTALWASTEQUANTITY"];
			$TOTALPROMOTIONQUANTITY = $data["TOTALPROMOTIONQUANTITY"];
			$TOTALORDERTIME = $data["TOTALORDERTIME"];
			$TOTALRECEIVE = $data["TOTALRECEIVE"];
			$SALESINCELASTRECEIVE = $data["SALESINCELASTRECEIVE"];
            $LASTSALEDAY = $data["LASTSALEDAY"];
			$TOTALSALE = $data["TOTALSALE"];

			echo "	
			<tr>
				<td>$RATIOSALE</td>		
				<td>$SALESPEED75</td>
				<td>$WASTEPERCENT</td>
				<td>$PROMOTIONPERCENT</td>
				<td>$DECISION</td>
				<td>$CALCULATEDQUANTITY</td>
				<td bgcolor='black'></td>
				<td>$LASTRECEIVEDATE</td>			
				<td>$LASTRECEIVEQUANTITY</td>
				<td>$TOTALWASTEQUANTITY</td>
				<td>$TOTALPROMOTIONQUANTITY</td>
				<td>$TOTALORDERTIME</td>
				<td>$TOTALRECEIVE</td>
				<td>$SALESINCELASTRECEIVE</td>
                <td>$LASTSALEDAY</td>
				<td>$TOTALSALE</td>
			</tr>";
		}
		echo "</table><center>";
	}
?>
