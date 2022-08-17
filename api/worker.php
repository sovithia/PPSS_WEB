<?php 

function makeTransparent($input,$output)
{
    $picture = imagecreatefrompng($input);
    $img_w = imagesx($picture);
    $img_h = imagesy($picture);
    
    $newPicture = imagecreatetruecolor( $img_w, $img_h );
    imagesavealpha( $newPicture, true );
    $rgb = imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 );
    imagefill( $newPicture, 0, 0, $rgb );
    
    $color = imagecolorat( $picture, $img_w-1, 1);
    
    for( $x = 0; $x < $img_w; $x++ ) {
        for( $y = 0; $y < $img_h; $y++ ) {
            $c = imagecolorat( $picture, $x, $y );
            if($color!=$c){         
                imagesetpixel( $newPicture, $x, $y,    $c);             
            }           
        }
    }
    imagepng($newPicture, $output);
    imagedestroy($newPicture);
    imagedestroy($picture);
}

function jpgTopng($input,$output)
{
    imagepng(imagecreatefromstring(file_get_contents($input)), $output);   
}

function addLogo($input,$logo,$output){

}

//jpgTopng("50913.jpg","50913.png");
makeTransparent("50913.png","50913.png");

?>