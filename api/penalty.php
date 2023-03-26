<?php

require_once 'RestEngine.php';

function hardData()
{
    $filename = "penalty.json";
    $file = fopen( $filename, "r" );            
    $filesize = filesize( $filename );
    $filetext = fread( $file, $filesize );
    $data = json_decode($filetext,true);    
    return $data["data"];
}


function renderPenalties()
{
    //$data = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/penalties");
    $data = hardData();
    $returns =  $data["RETURN"];
    $noreturns =  $data["NORETURN"];    
    $selfpromotions = $data["SELFPROMOTION"];

    
    
    
    $body = "<br> <center><h1>RETURN ITEMS</h1></center>";
    $body .= "<center>
                    <table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>CREATED</th<th></th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($returns as $return ) 
    {
        $body .= "<tr><td><img height='100px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$return["PRODUCTID"]."'></td> 
                      <td>".$return["PRODUCTID"]."</td>
                      <td>".$return["PRODUCTNAME"]."</td>
                      <td>".$return["EXPIREDATE"]."</td>                      
                      <td>".$return["CREATED"]."</td>
                      <td align='center'>".$return["POLICY"]."</td>
                      <td>".$return["LATE"]." days</td>                      
                      <td>".$return["MSG"]."</td>
                  </tr>";                                            
    }
    $body .= "</table><center>";
    

    $body .= "<br> <center><h1>NO RETURN ITEMS</h1></center>";
    $body .= "<center><table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>CREATED</th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($noreturns as $noreturn) 
    {
        $body .= "<tr><td><img height='100px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$noreturn["PRODUCTID"]."'></td> 
                      <td>".$noreturn["PRODUCTID"]."</td>
                      <td>".$noreturn["PRODUCTNAME"]."</td>
                      <td>".$noreturn["EXPIREDATE"]."</td>
                      <td>".$return["CREATED"]."</td>
                      <td  align='center'>".$noreturn["POLICY"]."</td>                      
                      <td>".($noreturn["LATE"] ?? "")." days</td>
                      <td>".($noreturn["MSG"] ?? "")."</td>
                  </tr>";                                            
    }
    $body .= "</table></center>";
    
    $body .= "<br><center><h1>SELF PROMOTION ITEMS</h1></center>";
    $body .= "<table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>CREATED</th><th>EXPIREDATE</th><th>PERCENTPROMO</th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($selfpromotions as $selfpromotion ) 
    {
        
        $body .= "<tr><td><img height='100px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$selfpromotion["PRODUCTID"]."'></td> 
                    <td>".$selfpromotion["PRODUCTID"]."</td>
                    <td>".$selfpromotion["CREATED"]."</td>                    
                    <td>".$selfpromotion["EXPIRATION"]."</td>
                    <td align='center'>".$selfpromotion["PERCENTPROMO1"]."</td>
                    <td  align='center'>".$selfpromotion["POLICY"]."</td>                    
                    <td>".$selfpromotion["LATE"]." days</td>
                    <td>".$selfpromotion["MSG"]."</td>
                  </tr>";                                                 
    }

    $body .= "</center>";
    return $body;
}

echo renderPenalties();


?>