 <html>
 <head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">      
 	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../intra/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../intra/js/plugins/data-tables/data-tables-script.js"></script>
</head>
<body>
	

<?php 

require_once '../intra/RestEngine.php'; 



function escapeJS($string)
{

    $string =  str_replace("\n", '\n', $string);
    $string = str_replace('"', '\"',$string);
    $string = str_replace("'", "’",$string);    
    return $string;
}



function renderItemSearch($items) 
{   
   $body = "";	
   $dataSet = "";                  
   if ($items != null)
   {	

       $body .= "Total : ".count($items);
    	 $body .= "
       <center>                 
       <form target=_blank action='../intra/export.php' method='POST'>    
            <input type='hidden' name='type' value='ecommerce'>              
            <input type='submit' value='EXPORT'>

    	  <table border='1' id='resultTable'>
        <thead><tr>
  		  	<th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th>
            <th>Packing</th><th>Stock</th><th>Category</th> <th>COUNTRY</th>
            <th>COST</th><th>PRICE</th><th>MARGIN</th><th></th>
  		  </tr></thead>
        
        <tfoot><tr>
         	<th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th>
            <th>Packing</th><th>Stock</th><th>Category</th> <th>COUNTRY</th>
  		  	  <th>COST</th><th>PRICE</th><th>MARGIN</th><th></th>  
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

       foreach($items as $item)
       {
        $item["PRODUCTID"] = $item["BARCODE"];
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["COST"] = floatval($item["COST"]);
        $item["MARGIN"] = $item["PRICE"] - $item["COST"];

         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',         
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",
          '".$item["PACKING"]."',          
          '".$item["ONHAND"]."',
          '".$item["CATEGORYID"]."',
          '".$item["COLOR"]."',
          '".$item["COST"]."',          
          '".$item["PRICE"]."',
          '".$item["MARGIN"]."',
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");    		
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }
	return $body;              
}

$jsonData = RestEngine::GET("http://phnompenhsuperstore.com/api/api_ecommerce.php/items");
echo renderItemSearch($jsonData);
?>

</body>
</html>

