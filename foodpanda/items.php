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

function getInternalDatabase()
{
	try{
    $db = new PDO('sqlite:'.dirname(__FILE__).'/foodpanda.sqlite');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex){
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}

function escapeJS($string)
{
   $string =  str_replace("\n", '\n', $string);
   $string = str_replace('"', '\"',$string);
   $string = str_replace("'", "’",$string);    
   return $string;
}

function render() 
{   
  $db = getInternalDatabase();    
  $sql = "SELECT * FROM ITEM";
  $req = $db->prepare($sql); 
  $req->execute();   
  $items = $req->fetchAll(PDO::FETCH_ASSOC);	  
  $finalitems = array();		
  foreach($items  as $item){
        $item["IMAGE"] = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["BARCODE"];
        array_push($finalitems,$item);
  }       
  $body = "";	
  $dataSet = "";                  
  if ($finalitems != null)
  {	

      $body .= "Total : ".count($items);
        $body .= "
      <center>                 
      <form target=_blank action='../intra/export.php' method='POST'>    
           <input type='hidden' name='type' value='foodpanda'>              
           <input type='submit' value='EXPORT'>

         <table border='1' id='resultTable'>
            <thead><tr>
                <th>Picture</th><th>SKU</th><th>CATEGORY</th><th>BARCODE</th>
                <th>BRAND</th><th>NAMEEN</th><th>NAMEKH</th><th>PRICE</th>
                <th>THRESHOLD</th><th></th>
            </tr></thead>
            
            <tfoot><tr>
                    <th>Picture</th><th>SKU</th><th>CATEGORY</th><th>BARCODE</th>
                    <th>BRAND</th><th>NAMEEN</th><th>NAMEKH</th><th>PRICE</th>
                    <th>THRESHOLD</th><th></th>
            </tr></tfoot>

        </table>              
      </form>
     <br><br>";

      foreach($items as $item)
      {
       $item["PRODUCTID"] = $item["BARCODE"];                     

        $dataSet .= "[
         '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
         \"".$item["SKU"]."\",         
         \"".$item["CATEGORY"]."\",
         \"".$item["BARCODE"]."\",
         \"".$item["BRAND"]."\",
         \"".$item["NAMEEN"]."\",
         \"".$item["NAMEKH"]."\",                  
         '".$item["PRICE"]."',
         '".$item["THRESHOLD"]."',                   
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
   echo $body;              
}

render();
?>

</body>
</html>



