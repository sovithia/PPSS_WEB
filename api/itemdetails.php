<?php 
require_once("RestEngine.php");
if (isset($_POST["items"]))
{
    $items = json_decode($_POST["items"],true);
    $text = $_POST["display"];

    $productids = array();
    $quantities = array();

    foreach($items as $item){
        array_push($productids,$item["PRODUCTID"]);
        $quantities[$item["PRODUCTID"]] = $item["QUANTITY"];
    }
    $data["barcodes"] = $productids;
	$itemswithDetail = RestEngine::POST("http://phnompenhsuperstore.com/api/api.php/itemget",$data);
    $itemswithDetail = $itemswithDetail["data"];
    //var_dump($itemswithDetail);
    //exit;

    echo "<center><h3>".$text."</h3>";
    echo "<table border='1'><tr><th>PICTURE</th><th>PRODUCTID</th><th>NAMEEN</th><th>NAMEKH</th><th>LASTCOST</th><th>PRICE</th><th>WH1</th><th>WH2</th><th>QUANTITY</th></tr>";
    foreach($itemswithDetail as $item){
        echo "<tr>
                <td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                <td><center>".$item["PRODUCTID"]."</center></td>
                <td><center>".$item["PRODUCTNAME"]."</center></td>
                <td><center>".$item["PRODUCTNAME1"]."</center></td>
                <td><center>".$item["LASTCOST"]."</center></td>
                <td><center>".$item["PRICE"]."</center></td>
                <td><center>".$item["WH1"]."</center></td>
                <td><center>".$item["WH2"]."</center></td>


                <td><center>".$quantities[$item["PRODUCTID"]]."</center></td>                
            <tr>";
    }
    echo "</table><center>";
    
}
?>