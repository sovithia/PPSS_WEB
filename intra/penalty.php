<html>
<?php

require_once 'RestEngine.php';


function renderPenalties($month,$year)
{
    $data = RestEngine::GET("http://phnompenhsuperstore.com/api/intrapi.php/penalties?year=".$year."&month=".$month);
    $returns =  $data["RETURN"];
    $noreturns =  $data["NORETURN"];    
    $selfpromotions = $data["SELFPROMOTION"];


    $body = "<center>";
    $body = "<br> <h1>RETURN ITEMS</h1>";
    $body .= "<table><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($returns as $return ) 
    {
        if (intval($return["LATE"])> 0)
            $color = "red";
        else 
            $red = "green";
        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$return["PRODUCTID"]."</td> 
                      <td>".$return["PRODUCTID"]."</td>
                      <td>".$return["PRODUCTNAME"]."</td>
                      <td>".$return["EXPIREDATE"]."</td>
                      <td>".$return["POLICY"]."</td>
                      <td bgcolor='".$color."'>".$return["LATE"]." days</td>                      
                      <td>".$return["MSG"]."</td>
                  </tr>";                                            
    }
    $body .= "</table>";

    $body = "<br> <h1>NO RETURN ITEMS</h1>";
    $body .= "<table><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($noreturn as $noreturns ) 
    {
        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$noreturn["PRODUCTID"]."</td> 
                      <td>".$noreturn["PRODUCTID"]."</td>
                      <td>".$noreturn["PRODUCTNAME"]."</td>
                      <td>".$noreturn["EXPIREDATE"]."</td>
                      <td>".$noreturn["POLICY"]."</td>                      
                      <td bgcolor='".$color."'>".$noreturn["LATE"]." days</td>
                      <td>".$noreturn["MSG"]."</td>
                  </tr>";                                            
    }
    

    $body = "<br><h1>SELF PROMOTION ITEMS</h1>";
    $body .= "<table><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>POLICY</th><th>LATE</th><th>MSG</th></tr>";
    foreach($selfpromotions as $selfpromotion ) 
    {
        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$selfpromotion["PRODUCTID"]."</td> 
                    <td>".$selfpromotion["PRODUCTID"]."</td>
                    <td>".$selfpromotion["PRODUCTNAME"]."</td>
                    <td>".$selfpromotion["EXPIREDATE"]."</td>
                    <td>".$selfpromotion["POLICY"]."</td>                    
                    <td bgcolor='".$color."'>".$selfpromotion["LATE"]." days</td>
                    <td>".$selfpromotion["MSG"]."</td>
                  </tr>";                                            
    }
    $body .= "</center>";
}


if ( isset($_GET["YEAR"]) && isset($_GET["MONTH"]) ){
    renderPenalties($_GET["MONTH"],$_GET["YEAR"]);
}else {
    echo "    
        <form action='penalty.php'>
        <table>
            <tr>            
                <td>
                    <select name='month'>  
                        <option value='JAN'>January</option>
                        <option value='FEB'>February</option>  
                        <option value='MAR'>March</option>  
                        <option value='APR'>April</option>  
                        <option value='MAY'>May</option>  
                        <option value='JUN'>June</option>  
                        <option value='JUL'>July</option>  
                        <option value='AUG'>August</option>  
                        <option value='SEP'>September</option>  
                        <option value='OCT'>October</option>  
                        <option value='NOV'>November</option>  
                        <option value='DEC'>December</option>  
                    </select>
                </td>
                <td>
                    <select name='month'>  
                        <option value='2022'>October</option>  
                        <option value='2023'>November</option>  
                        <option value='2024'>December</option>  
                        <option value='2025'>December</option>  
                        <option value='2026'>December</option>  
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input text='Load' type='submit'>
                </td>
            </tr>
        <table>
        </form>
    ";
}


    
?>
<html>

