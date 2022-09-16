<html>
<head>    
</head>
<body>


<?php 
require_once("RestEngine.php");

if (isset($_POST["items"]))
{
    $items = json_decode($_POST["items"],true);
    $text = $_POST["display"];

    $productids = array();
    $quantities = array();
    $promotions = array();

    foreach($items as $item){
        array_push($productids,$item["PRODUCTID"]);
        $quantities[$item["PRODUCTID"]] = $item["QUANTITY"];
        if (isset($item["PERCENTPROMO1"]))
            $promotions[$item["PRODUCTID"]] = $item["PERCENTPROMO1"];
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
                <td><img class='lozad'  data-src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                <td><center>".$item["PRODUCTID"]."</center></td>
                <td><center>".$item["PRODUCTNAME"]."</center></td>
                <td><center>".$item["PRODUCTNAME1"]."</center></td>
                <td><center>".$item["LASTCOST"]."</center></td>
                <td><center>".$item["PRICE"]."</center></td>
                <td><center>".$item["WH1"]."</center></td>
                <td><center>".$item["WH2"]."</center></td>                
                <td><center>".$quantities[$item["PRODUCTID"]]."</center></td>                                
                <td><center>".$promotions[$item["PRODUCTID"]]."</center></td>                
            <tr>";
    }
    echo "</table><center>";
    
    
}
?>
<!-- IntersectionObserver polyfill -->
<script src="https://raw.githubusercontent.com/w3c/IntersectionObserver/master/polyfill/intersection-observer.js"></script>

<!-- Lozad.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/lozad"></script>
<script>

lozad('.lozad', {
    load: function(el) {
        el.src = el.dataset.src;
        el.onload = function() {
            el.classList.add('fade')
        }
    }
}).observe()
</script>

</body>
</html>