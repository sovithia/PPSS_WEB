<?php 

function generateData()
{
    $p["NAME"] = "PRODUCT ";
    $p["BARCODE"] = "888888888";
    $p["PROMO"] = "30%";
    $p["BEFORE"] = "$100";
    $p["AFTER"] = "$70";
    
    $data = array();
    for($i = 0;$i < 100;$i++){
        $p["NAME"] = "PRODUCT ".$i; 
        array_push($data,$p);
    }
    return $data;
}


function renderData($data){
    $display = "<table border='1' width='100%'>";
    $odd = true;
    $count = 0;
    foreach ($data as $product){

        if ($odd == true){
            $display .= "<tr><td  background-color:red><table border='1' width='100%' >
                            <tr>
                                <td rowspan='3'><img width='40%' height='200px' src='http://phnompenhsuperstore.com/api/picture.php?barcode='".$product["BARCODE"]."</td>
                                <td colspan='2' width='60%' align='center'><span style='font-size:20pt'>PRODUCTNAME</span></td>
                            </tr>
                                <td colspan='2' align='center'><span style='font-size:20pt'>30% Discount</span></td>                            
                            <tr>
                                <td align='center'><span style='font-size:20pt' >$100</span></td>
                                <td  align='center'><span style='font-size:20pt'>$70</span></td>
                            </tr>                                                        
                        </table></td></tr>";
        }else{
            $display .= "<tr><td width='100%'><table border='1' width='100%'>
                            <tr>
                                <td colspan='2' width='60%' align='center'><span style='font-size:20pt'>PRODUCTNAME</span></td>
                                <td rowspan='3'><img width='40%' height='200px' src='http://phnompenhsuperstore.com/api/picture.php?barcode='".$product["BARCODE"]."</td>
                                
                            </tr>
                                <td colspan='2' align='center'><span style='font-size:20pt'>30% Discount</span></td>                            
                            <tr>
                                <td align='center'><span style='font-size:20pt' >$100</span></td>
                                <td  align='center'><span style='font-size:20pt'>$70</span></td>
                            </tr>     
                        </table></td></tr>";
        }
        $odd = !$odd;
        $count++;
        if($count == 10)
            break;
    }

    $display .= "</table>";
    return $display;

}

echo (renderData(generateData()));
?>