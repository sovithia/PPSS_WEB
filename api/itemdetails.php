<?php 
if (isset($_POST["items"]))
{
    $items = json_decode($_POST["items"],true);
    $text = $_POST["display"];

    echo "<center><h3>".$text."</h3>";
    echo "<table border='1'><tr><th>PICTURE</th><th>PRODUCTID</th><th>QUANTITY</th></tr>";
    foreach($items as $item){
        echo "<tr>
                <td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                <td><center>".$item["PRODUCTID"]."</center></td>
                <td><center>".$item["QUANTITY"]."</center></td>                
            <tr>";
    }
    echo "</table><center>";
    
}
?>