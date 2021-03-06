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

function truncatePrice($price)
{
  if (strpos($price, 'E') !== false)
  {
    return floatval($price);
  }
  if (substr($price,0,3) == ".00")
    return "0";
  $left = explode('.',$price)[0];

  if (count(explode('.',$price)) > 1)
  {
    $right = explode('.',$price)[1];
    $right = substr($right,0,2);
    return $left.".".$right;
  }
  else  
    return  substr($left,0,2);    
  
}

function truncateWhole($price)
{
  if (strpos($price, 'E') !== false)
  {
    return floatval($price);
  }
  if (substr($price,0,3) == ".00")
    return "0";
  $left = explode('.',$price)[0];

  if (count(explode('.',$price)) > 1)
  {
    $right = explode('.',$price)[1];
    $right = substr($right,0,2);
     return $left;
  }
  else  
    return  substr($left,0,2);    
  
}


function escapeJS($string)
{

    $string =  str_replace("\n", '\n', $string);
    $string = str_replace('"', '\"',$string);
    $string = str_replace("'", "’",$string);    
    return $string;
}


function renderPicker($identifier,$max)
{
  return "";
  if ($max < 1)
    return "NO STOCK";
  $body = "<select name=\"".$identifier."\"><option value=\"\">Select...</option>";
    for($i = 0;$i < $max;$i++){
      $body .= "<option value=\"".$i."\">".$i."</option>";
    }
  $body .= "</select>";
  return $body;
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
       
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th>
            <th>PRICE</th><th>STOCK</th><th></th>
        </tr></thead>
        
        <tfoot><tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th>
            <th>PRICE</th><th>STOCK</th><th></th>         
        </tr></tfoot>
        </table>              
    
      <br><br>";

       foreach($items as $item)
       {
        $item["PRODUCTID"] = $item["BARCODE"];
        $item["ONHAND"] = truncateWhole($item["ONHAND"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);
      
         $dataSet .= "[
          '<img  height=\"100px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',         
          \"".$item["PRODUCTNAME"]."\",          
          '".$item["PRICE"]."',
          '".$item["ONHAND"]."',
          '".renderPicker($item["BARCODE"],$item["ONHAND"])."'
          ],";
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

