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



function loadPicture($id,$scale = 150,$type = "PCH",$base64 = false)
{
	if ($type == "PCH")
		$basePath = "./img/supplyrecords_signatures/PCH_";
	else if ($type == "VAL")
		$basePath = "./img/supplyrecords_signatures/VAL_";

	if (!file_exists($basePath.$id.".png"))
	{
		$path = "./img/mystery.png";		
		$final = file_get_contents($path);
	}
	else 
	{
		$final = file_get_contents($basePath.$id.".png");
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
			$path = "./img/mystery.png";		
			$final = file_get_contents($path);
		}
		
		
	}
		
	if ($base64 == true)
		return base64_encode($final);
	return $final;		
}



$name = './tmp.png';
$id = $_GET["id"];
$type = "PCH";
if (isset( $_GET["type"]))
	$type = $_GET["type"];

$data = loadPicture($id);
file_put_contents($name,$data);
$fp = fopen($name, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;
?>