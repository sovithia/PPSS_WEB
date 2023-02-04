

<html lang="en">
<head>
<style>
body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}
 
.fadein { 
position:relative; height:1332px; width:1500px; margin:0 auto;
background: #ebebeb;
padding: 10px;
 }
.fadein img{
	position:absolute;
	width: calc(96%);
    height: calc(94%);
    object-fit: scale-down;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>

<style>
body {font-family:Arial, Helvetica, sans-serif; font-size:12px;} 
.fadein { 
position:absolute; height:100%; width:100%; margin:0 auto;
background: #ebebeb;
padding: 10px;
 }
.fadein img{
	position:absolute;
	width: calc(96%);
    height: calc(94%);
    object-fit: scale-down;
}
</style>

<title>Phnom Penh SuperStore</title>
 
</head>
<body>
<div class="fadein">
<?php 
// display images from directory
// directory path
$dir = "/Volumes/Image/PROMOTION/";
 
$scan_dir = scandir($dir);
foreach($scan_dir as $img):
	if(in_array($img,array('.','..')))
	continue;
$data = file_get_contents($dir.$img);
$type = pathinfo($dir.$img,PATHINFO_EXTENSION);
$base64 = 'data:image/'.$type.';base64,'.base64_encode($data);	
echo "<img src=".$base64." width='500px'>";
?>
<?php endforeach; ?>
</div>
</body>
</html>