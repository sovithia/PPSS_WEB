<?php 

if (isset($_GET["id"])){
    $id = $_GET["id"];
    if (!file_exists("img/employee/".$id.".png"))	
		$path = "img/employee/".$id.".png";					
	else 	
        $path = "img/mystery.png";					
    $final = file_get_contents($path);
    $fp = fopen($name, 'rb');

    header("Content-Type: image/png");
    header("Content-Length: " . filesize($name));
    fpassthru($fp);
    exit;
}else{
    echo "ID Missing";
}
    
?>