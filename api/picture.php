<?php 

function getImage($path) {
switch(mime_content_type($path)) {
  case 'image/png':
    $img = imagecreatefrompng($path);
    break;
  case 'image/gif':
    $img = imagecreatefromgif($path);
    break;
  case 'image/jpeg':
    $img = @imagecreatefromjpeg($path);
    break;
  case 'image/bmp':
    $img = imagecreatefrombmp($path);
    break;
  default:
     $img = @imagecreatefromjpeg($path);
  }
  return $img;
}

function loadPicture($barcode,$scale = 150)
{
	if (!file_exists("/Volumes/Image/".$barcode.".jpg"))
	{
		$path = "img/mystery.png";		
		$final = file_get_contents($path);
		return $final;
	}
	else 
	{
		$tmpHandle = tmpfile();
		$metaDatas = stream_get_meta_data($tmpHandle);
		$path = $metaDatas['uri'];
		fwrite($tmpHandle, file_get_contents("/Volumes/Image/".$barcode.".jpg"));
		//fclose($tmpHandle);
		$data = getImage($path);
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
		return $final;		
	}

}

$barcode = $_GET["barcode"];
if (!isset($_GET["scale"]))
	$scale = 150;
else 
	$scale = $_GET["scale"];
$name = './tmp.png';

//var_dump($barcode);

$data = loadPicture($barcode,$scale);
file_put_contents($name,$data);

$fp = fopen($name, 'rb');
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
fpassthru($fp);

exit;

?>