<?php 

function getImage($path) {
switch(mime_content_type($path)) {
  case 'image/png':
    $img = @imagecreatefrompng($path);
    break;
  case 'image/gif':
    $img = @imagecreatefromgif($path);
    break;
  case 'image/jpeg':
    $img = @imagecreatefromjpeg($path);
    break;
  case 'image/bmp':
    $img = @imagecreatefrombmp($path);
    break;
  default:
     $img = @imagecreatefromjpeg($path);
  }
  return $img;
}

function loadPicture($barcode,$scale = 150,$base64 = false)
{
	if (!file_exists("/Volumes/Image/".$barcode.".jpg"))
	{
		$path = "img/mystery.png";		
		$final = file_get_contents($path);
	}
	else 
	{
		
		$final = file_get_contents("/Volumes/Image/".$barcode.".jpg");
		file_put_contents("./tmp.jpg",$final);		
		$data = getImage("./tmp.jpg");
		if ($data != false){
			$data = imagescale($data,$scale);
			ob_start();
			imagejpeg($data);
			$contents = ob_get_contents();
			ob_end_clean();	
			$final = $contents;		
		}else{
			$path = "img/mystery.png";		
			$final = file_get_contents($path);
		}
		
		
	}
		
	if ($base64 == true)
		return base64_encode($final);
	return $final;		
}

if( isset($_GET["barcode"]) )
{
	$barcode = $_GET["barcode"];
	if (!isset($_GET["scale"]))
		$scale = 150;
	else 
		$scale = $_GET["scale"];
	$name = './tmp.png';
	$data = loadPicture($barcode,$scale);
	file_put_contents($name,$data);
}
else {
	$name = "img/mystery.png";
}


$fp = fopen($name, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;
?>