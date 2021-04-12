<html>
<head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" >
</script>
</head>
<body background="images/bluebg.jpg">
<?php 

include('Service.php');
include('data.php');



function getCategories()
{
	static $categories = null;
	if ($categories == null)
		$categories = getOrderedCategories();	
	return $categories;
}

function selectCategory($selected,$id)
{
	$categories = getCategories();
	$page = isset($_GET["page"]) ?  $_GET["page"] : 0;
	$body = "

	<form action='?page=".$page."&action=update&entity=itemcategorize' method='POST'>
	<input type='hidden' name='field' value='CATEGORY'>
	<input type='hidden' name='ID' value='".$id."'>
	<select id='category".$id."' name='value' >";
	foreach($categories as $category)	
	{		
		$body .= "<option value='".$category."' >".$category."</option>";  			
	}
	$body .= "</select>
	<script>
	</script>
	<br>
	<center><input type='submit' value='Update'></center>
	</form>";
	return $body;
}


function renderItemCategorize($items)
{
  $pages = $items["NBPAGES"];
  $nbitems = $items["NBITEMS"];
  $items = $items["ITEMS"];
  $page = isset($_GET["page"]) ? $_GET["page"] : 0;

  $body = "<center>";       
  $skip = 0;
  for($i = 0;$i < $pages;$i++)
  {
   $body .= "<a href='?display=itemcategorize&action=no&entity=itemcategorize&page=$i'>$i</a>&nbsp;";
   $skip++;
   if ($skip % 50 == 0)
 	$body .= "<br>";
  }
  $body .= "<br><b><u>Displaying from ".(($page * 100) + 1)."/".$nbitems."</b></u><center><br>";

  $body .="<table border='1'>
		<tr>
		<th>Picture</th>
		<th>Name</th>
		<th>Name-KH</th>
		<th>Barcode</th>
		<th>Old Cat</th>
		<th>New Cat</th>		
		<th>Category</th>

		<th>Active</th>
		<th>OnHand</th>
		<th>Last Receive</th>
		<th>Last Sale</th>
		
		</tr>";

	$apiURL = "http://phnompenhsuperstore.com/api/api.php/itemupdate";
	$categories = getCategories();
    foreach($items as $item)
    {       	
    	if (!isset($item["PRODUCTID"]))
    		continue;
    	if ($item["CATEGORYNEWID"] != "")
    		$color = "#b9e7c3";
    	else if ($item["ACTIVE"] == 0)
    		$color = "white";
    	else 
    		$color = "white";



        $body.="<tr id='line_".$item["PRODUCTID"]."' style='background-color:".$color."'>             
                <td><img height='100px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'</td> 
                <td>
                	<span style='background-color:red;width:20px;height:20px' id='resA_".$item["PRODUCTID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;</span>                	
	                <form action='".$apiURL."/".$item["PRODUCTID"]."' method='POST' id='formA_".$item["PRODUCTID"]."'>
	                	<input type='hidden' name='field' value='PRODUCTNAME'>
	                	<input style='width:200px' type='text' name='value' value='".$item["PRODUCTNAME"]."'>
	                	<input type='submit' name='submit' value='Update' />	                
	                </form>

	                <script type='text/javascript'>	 
					$.fn.serializeObject = function()
						{
						    var o = {};
						    var a = this.serializeArray();
						    $.each(a, function() {
						        if (o[this.name] !== undefined) {
						            if (!o[this.name].push) {
						                o[this.name] = [o[this.name]];
						            }
						            o[this.name].push(this.value || '');
						        } else {
						            o[this.name] = this.value || '';
						        }
						    });
						    return o;
					};
	                $('#formA_".$item["PRODUCTID"]."').submit(function(event){	                	
						event.preventDefault();	
						$('#resA_".$item["PRODUCTID"]."').css('background-color','yellow');					
						var post_url = $(this).attr('action'); 
						var request_method = $(this).attr('method'); 
						var form_data = $(this).serializeObject(); 						
						$.ajax({
							url : post_url,
							type: request_method,
							data : JSON.stringify(form_data),
							dataType : 'json'}).
						done(function(response){ 					
							if (response['result'] == 'OK'){
								$('#resA_".$item["PRODUCTID"]."').css('background-color','green');								
							}else{
								$('#resA_".$item["PRODUCTID"]."').css('background-color','red');								
							}
						});	 
					});				
	                </script>
                </td>
                <td>
                	<span style='background-color:red;width:20px;height:20px' id='resB_".$item["PRODUCTID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;</span>                	
                	<form action='".$apiURL."/".$item["PRODUCTID"]."' method='POST' id='formB_".$item["PRODUCTID"]."'>
	                	<input type='hidden' name='field' value='PRODUCTNAME1'>
	                	<input style='width:200px' type='text' name='value' value='".$item["PRODUCTNAME1"]."'>
	                	<input type='submit' name='submit' value='Update' />	                
	                </form>

	                <script type='text/javascript'>	 					
	                $('#formB_".$item["PRODUCTID"]."').submit(function(event){	                	
						event.preventDefault();	
						$('#resB_".$item["PRODUCTID"]."').css('background-color','yellow');					
						var post_url = $(this).attr('action'); 
						var request_method = $(this).attr('method'); 
						var form_data = $(this).serializeObject(); 						
						$.ajax({
							url : post_url,
							type: request_method,
							data : JSON.stringify(form_data),
							dataType : 'json'}).
						done(function(response){ 					
							if (response['result'] == 'OK'){
								$('#resB_".$item["PRODUCTID"]."').css('background-color','green');								
							}else{
								$('#resB_".$item["PRODUCTID"]."').css('background-color','red');								
							}
						});	 
					});				
	                </script>
                

                </td>                
                <td>".$item["PRODUCTID"]."</td>                                                                      
                <td>".$item["CATEGORYID"]."</td>
                <td><span id='cat_".$item["PRODUCTID"]."'>".$item["CATEGORYNEWID"]."</span></td>                                                      
                ";
	
		$body .= "<td>
		<span style='background-color:red;width:20px;height:20px' id='resC_".$item["PRODUCTID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;</span>                	
		<form action='".$apiURL."/".$item["PRODUCTID"]."' method='POST' id='formC_".$item["PRODUCTID"]."'>
				<input type='hidden' name='field' value='CATEGORY'>
				<select id='category".$item["PRODUCTID"]."' name='value' >";
				foreach($categories as $category){		
				$body .= "<option value='".$category."' >".$category."</option>";  			
				}
		$body .= "</select>
				<input type='submit' name='submit' value='Update' />	                
		</form>

		<script type='text/javascript'>	 					
	                $('#formC_".$item["PRODUCTID"]."').submit(function(event){	                	
						event.preventDefault();	
						$('#resC_".$item["PRODUCTID"]."').css('background-color','yellow');					
						var post_url = $(this).attr('action'); 
						var request_method = $(this).attr('method'); 

						var form_data = $(this).serializeObject(); 						
						$.ajax({
							url : post_url,
							type: request_method,
							data : JSON.stringify(form_data),
							dataType : 'json'}).
						done(function(response){ 					
							if (response['result'] == 'OK'){
								$('#resC_".$item["PRODUCTID"]."').css('background-color','green');								
								$('#cat_".$item["PRODUCTID"]."').text(form_data['value']);
								$('#line_".$item["PRODUCTID"]."').css('background-color','#b9e7c3');

							
							}else{
								$('#resC_".$item["PRODUCTID"]."').css('background-color','red');													
							}
						});	 
					});				
	     </script>

		</td>

		<td>
		<span style='background-color:red;width:20px;height:20px' id='resD_".$item["PRODUCTID"]."'>&nbsp;&nbsp;&nbsp;&nbsp;</span>                	
		<span id='active_".$item["PRODUCTID"]."' >".$item["ACTIVE"]."</span> 	
		<form action='".$apiURL."/".$item["PRODUCTID"]."' method='POST' id='formD_".$item["PRODUCTID"]."'>
				<input type='hidden' name='field' value='ACTIVE'>								
				<input type='submit' name='submit' value='Update' />	                
		</form>

		<script type='text/javascript'>	 					
	                $('#formD_".$item["PRODUCTID"]."').submit(function(event){	                	
						event.preventDefault();	
						$('#resD_".$item["PRODUCTID"]."').css('background-color','yellow');					
						var post_url = $(this).attr('action'); 
						var request_method = $(this).attr('method'); 

						var form_data = $(this).serializeObject(); 						
						$.ajax({
							url : post_url,
							type: request_method,
							data : JSON.stringify(form_data),
							dataType : 'json'}).
						done(function(response){ 					
							if (response['result'] == 'OK'){
								$('#resD_".$item["PRODUCTID"]."').css('background-color','green');								
								$('#active_".$item["PRODUCTID"]."').text(response['active']);
								$('#line_".$item["PRODUCTID"]."').css('background-color','#b9e7c3');							

								if (response['active'] == 0)							
									$('#line_".$item["PRODUCTID"]."').css('background-color','#ffff00');								
								else								
									$('#line_".$item["PRODUCTID"]."').css('background-color','".$color."');
							}else{
								$('#resD_".$item["PRODUCTID"]."').css('background-color','red');								
							}
						});	 
					});				
	     </script>
		</td>
		<td>".$item["ONHAND"]."</td>
		<td>".$item["LASTRECEIVE"]."</td>
		<td>".$item["LASTSALE"]."</td>
		
		
		</tr>";   
    }
  $body .= "</table>";
  return $body;
}

$page = isset($_GET["page"]) ? $_GET["page"] : 0;
echo renderItemCategorize(Service::ListEntity("itemcategorize","?page=".$page));


?>

			 


</body>
</html>

	