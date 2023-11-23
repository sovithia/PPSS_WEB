<?php 

require_once("functions.php");

$db = getDatabase();
$sql = "SELECT PRODUCTID FROM ICPRODUCT";
$req = $db->prepare($sql);

$req->execute(array());
$data = $req->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $onedata){
    if(!file_exists("./productImages/". $onedata["PRODUCTID"].".jpg")){
        if(file_exists("/Volumes/Image/". $onedata["PRODUCTID"].".jpg")){
            echo "Copying ".$onedata["PRODUCTID"].".jpg\n"; 
            copy("/Volumes/Image/". $onedata["PRODUCTID"].".jpg","/Users/ppss/Sites/PPSS/productImages/".$onedata["PRODUCTID"].".jpg");
        }       
        else if (file_exists("/Volumes/Image/". $onedata["PRODUCTID"].".JPG")){
            echo "Copying ".$onedata["PRODUCTID"].".jpg\n";
            copy("/Volumes/Image/". $onedata["PRODUCTID"].".JPG","./Users/ppss/Sites/PPSS/productImages/".$onedata["PRODUCTID"].".jpg");
        }
        else 
            echo $onedata["PRODUCTID"].".jpg file not found\n";
    }else{
        echo $onedata["PRODUCTID"].".jpg already exists\n";
    }   
}
?>