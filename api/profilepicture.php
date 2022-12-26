<?php 


if (isset($_GET["id"])){
    $id = $_GET["id"];
    if (file_exists("./img/employee/".$id.".png"))	
		$path = "./img/employee/".$id.".png";					
	else 	
        $path = "img/mystery.png";					
    $final = file_get_contents($path);
}else{
    $path = "img/mystery.png";		
	$final = file_get_contents($path);
}
file_put_contents('./tmp.png',$final);
$fp = fopen('./tmp.png', 'rb');

header("Content-Type: image/png");
header("Content-Length: " . filesize($path));
fpassthru($fp);
exit;


?>