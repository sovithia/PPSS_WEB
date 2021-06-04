<?php 

require_once 'vendor/autoload.php';
require_once 'RestEngine.php';
require_once 'functions.php';



// SELECT QUEUE 
// EXECUTE QUEUTE


function Go()
{
	$headers["Api_key"] = "91d7d5eee3d78ed9ccc8877caba6789a";
	$headers["user_id"] = "970770";
	$headers["Marketplace_user_id"] = "727499";


 
	$result = RestEngine::POST("https://api.yelo.red/open/product/get","{}",$headers);
	var_dump($result);	
}
Go();
?>