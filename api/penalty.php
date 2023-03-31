

<html>
<?php

require_once 'RestEngine.php';


function renderPenalties($month,$year)
{
    $data = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/penalties?year=".$year."&month=".$month);    
    $returns =  $data["RETURN"];
    $noreturns =  $data["NORETURN"];    
    $selfpromotions = $data["SELFPROMOTION"];

    

    $body = "<center>";
    $body .= "<br><center><h1>RETURN ITEMS</h1>";
    $body .= "<table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>TYPE</th><th>PRODUCTNAME</th><th>EXPIREDATE</th><th>CREATED</th><th>POLICY</th><th>LATE</th>
    <th>COST</th><th>QUANTITY</th><th>MSG</th></tr>";
    foreach($returns as $return ) 
    {
        if (intval($return["LATE"])> 0)
            $color = "red";
        else {
            if (intval($return["LATE"]) < -10)
                $color = "yellow";
            else 
                $color = "green";
        }

            

        if ($return["POLICY"] == "" || $return["POLICY"] == null || !isset($return["LATE"]))
            $late = "N/A";
        else     
            $late = $return["LATE"];                

        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$return["PRODUCTID"]."'></td> 
                      <td>".$return["PRODUCTID"]."</td>
                      <td>".$return["TYPE"]."</td>
                      <td>".$return["PRODUCTNAME"]."</td>
                      <td>".$return["EXPIREDATE"]."</td>
                      <td>".$return["CREATED"]."</td>
                      <td align='center'>".$return["POLICY"]."</td>
                      <td bgcolor='".$color."'>".$late." days</td> 
                      <td>".number_format($return["COST"],2)."</td>
                      <td>".$return["QUANTITY"]."</td>                     
                      <td>".$return["MSG"]."</td>
                  </tr>";                                            
    }
    $body .= "</table></center>";

    $body .= "<br></br><center><h1>NO RETURN ITEMS</h1>";
    $body .= "<table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>TYPE</th><th>PRODUCTNAME</th><th>EXPIREDATE</th>
                    <th>CREATED</th><th>POLICY</th><th>LATE</th><th>COST</th><th>QTY</th><th>MSG</th></tr>";
    foreach($noreturns as $noreturn ) 
    {

        if (!isset($noreturn["LATE"]) || intval($noreturn["LATE"])> 0  )
            $color = "red";
        else {
            if (intval($noreturn["LATE"]) < -10)
                $color = "yellow";
            else 
                $color = "green";
        }

        if ($noreturn["POLICY"] == "" || $noreturn["POLICY"] == null || !isset($noreturn["LATE"]) )
            $late = "N/A";
        else  {
            $late = $noreturn["LATE"];
        }
            

        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$noreturn["PRODUCTID"]."'></td> 
                      <td>".$noreturn["PRODUCTID"]."</td>
                      <td>".$noreturn["TYPE"]."</td>
                      <td>".$noreturn["PRODUCTNAME"]."</td>
                      <td>".$noreturn["EXPIREDATE"]."</td>
                      <td>".$noreturn["CREATED"]."</td>
                      <td align='center'>".$noreturn["POLICY"]."</td>                      
                      <td bgcolor='".$color."'>".$late." days</td>
                      <td>".number_format($return["COST"],2)."</td>
                      <td>".$noreturn["QUANTITY"]."</td>

                      <td>".($noreturn["MSG"] ?? "")."</td>
                  </tr>";                                            
    }
    $body .= "</table></center>";
    $body .= "<br><center><h1>SELF PROMOTION ITEMS</h1>";
    
    $body .= "<table border='1'><tr><th>IMAGE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>EXPIRATION</th><th>CREATED</th><th>POLICY</th><th>LATE</th>
    <th>COST</th><th>QUANTITY</th>
    <th>MSG</th></tr>";
    foreach($selfpromotions as $selfpromotion ) 
    {
        if (intval($selfpromotion["LATE"])> 0)
            $color = "red";
        else {
            if (intval($selfpromotion["LATE"]) < -10)
                $color = "yellow";
            else 
                $color = "green";
        }
            

        if ($selfpromotion["POLICY"] == "" || $selfpromotion["POLICY"] == null || !isset($return["LATE"]))
            $late = "N/A";
        else     
            $late = $noreturn["LATE"];                

        $body .= "<tr><td><img src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$selfpromotion["PRODUCTID"]."'></td> 
                    <td>".$selfpromotion["PRODUCTID"]."</td>   
                    <td>".$selfpromotion["PRODUCTNAME"]."</td>   
                    <td>".$selfpromotion["EXPIRATION"]."</td>
                    <td>".$selfpromotion["CREATED"]."</td>
                    <td align='center'>".$selfpromotion["POLICY"]."</td>                    
                    <td bgcolor='".$color."'>".$selfpromotion["LATE"]." days</td>
                    <td>".number_format($return["COST"],2)."</td>
                    <td>".$selfpromotion["QUANTITY"]."</td>
                    <td>".($selfpromotion["MSG"] ?? "")."</td>
                  </tr>";                                            
    }
    $body .= "</center>";
    
    echo $body;
}


if ( isset($_GET["year"]) && isset($_GET["month"]) ){
    renderPenalties($_GET["month"],$_GET["year"]);
}else {
    echo "    
        <center><h1>Penalty Listting</h1></center><br>
        <center>
        <form action='penalty.php'>
        <table border='1'>
            <tr>            
                <td>
                    <select name='month'>  
                        <option value='01'>January</option>
                        <option value='02'>February</option>  
                        <option value='03'>March</option>  
                        <option value='04'>April</option>  
                        <option value='05'>May</option>  
                        <option value='06'>June</option>  
                        <option value='07'>July</option>  
                        <option value='08'>August</option>  
                        <option value='09'>September</option>  
                        <option value='10'>October</option>  
                        <option value='11'>November</option>  
                        <option value='12'>December</option>  
                    </select>
                </td>
                <td>
                    <select name='year'>                          
                        <option value='2023'>2023</option>  
                        <option value='2024'>2024</option>  
                        <option value='2025'>2025</option>  
                        <option value='2026'>2026</option>  
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <input text='Load' type='submit'>
                </td>
            </tr>
        <table>        
        </form>
        </center>
    ";
}
    
?>
</html>

<?php

/*
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
*/

?>