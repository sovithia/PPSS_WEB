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
    $img = imagecreatefromjpeg($path);
    break;
  case 'image/bmp':
    $img = imagecreatefrombmp($path);
    break;
  default:
    $img = null; 
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
		$image = file_get_contents("/Volumes/Image/".$barcode.".jpg");    
		$name = './tmp.jpg';
		file_put_contents($name,$image);	
		$data = getImage($name);
		if ($data != null)
		{
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


<?php 
/*
function getImage($path) {
switch(mime_content_type($path)) {
  case 'image/png':
    $img = imagecreatefrompng($path);
    break;
  case 'image/gif':
    $img = imagecreatefromgif($path);
    break;
  case 'image/jpeg':
    $img = imagecreatefromjpeg($path);
    break;
  case 'image/bmp':
    $img = imagecreatefrombmp($path);
    break;
  default:
    $img = null; 
  }
  return $img;
}

function loadPicture($barcode,$scale = 150,$base64 = false)
{	
	// Create new state:
	$state = smbclient_state_new();
	// Initialize the state with workgroup, username and password:
	smbclient_state_init($state, null, 'A-DAdmin', '$uper$tore@2017!123');
	$file = smbclient_open($state,'smb://192.168.72.252/d$/Image/'.$barcode.'.jpg','r');

	$error = smbclient_state_errno($state);
	if ($error == 1 || $error == 2 || $error == 9)
	{
		$path = "img/mystery.png";		
		$final = file_get_contents($path);
	}
	else 
	{
		$tmp = "";
		$final = "";
		while (true) {	
			$tmp = smbclient_read($state, $file, 500);
			if ($tmp === false || strlen($tmp) === 0) {
				break;
			}
			$final .= $tmp;
		}
		$name = './tmp.jpg';
		file_put_contents($name,$final);
		
		$data = getImage($name);		
		if ($data != null){
			$data = imagescale($data,$scale);
			ob_start();
			imagejpeg($data);
			$contents = ob_get_contents();
			ob_end_clean();	
		}
		else{
			
			$contents = null;
		}

		$final = $contents;
	}
	if ($base64 == true)
		return base64_encode($final);
	return $final;		
}

$barcode = $_GET["barcode"];
if (!isset($_GET["scale"]))
	$scale = 150;
else 
	$scale = $_GET["scale"];
$name = './tmp.png';
$data = loadPicture($barcode,$scale);
file_put_contents($name,$data);

$fp = fopen($name, 'rb');
// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
// dump the picture and stop the script
fpassthru($fp);
exit;
*/
?>

