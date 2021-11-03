<?php 

function loadPicture($barcode,$scale = 150,$base64 = false)
{
	if (!file_exists("/Volumes/Image/".$barcode.".jpg"))
	{
		$path = "img/mystery.png";		
		$final = file_get_contents($path);
	}
	else 
	{
		$image = file_get_contents("/Volumes/Image/".$barcode.".jpg");    
		$name = './tmp.jpg';
		file_put_contents($name,$image);	
		$data = imagecreatefromjpeg($name);
		$data = imagescale($data,$scale);
		ob_start();
		imagejpeg($data);
		$contents = ob_get_contents();
		ob_end_clean();
		$final = $contents;	        
    }
	if ($base64 == true)
		return base64_encode($final);
	return $final;		
}

$barcode = $_GET["barcode"];
$name = './tmp.png';
$data = loadPicture($barcode);


file_put_contents($name,$data);
$fp = fopen($name, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;
?>