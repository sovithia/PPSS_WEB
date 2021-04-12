<?php 


//$data = json_decode(file_get_contents('php://input'), true);
error_log(file_get_contents('php://input'));
/*
if (isset($_POST["imageData"]))
{	
	//error_log("LEN:".strlen($_POST["imageData"]));

	$ifp = fopen( "tmp.png", 'wb' );    
    $data = explode( ',', $_POST["imageData"] );    
    error_log("LEN:".strlen($data[1]));
    fwrite( $ifp,  $data[ 1 ]  ); 
    fclose( $ifp );     
}
*/
?>