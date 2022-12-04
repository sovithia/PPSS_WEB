<?php 
    function getInternalDatabase()
    {
        try{		
            $db = new PDO('sqlite:'.dirname(__FILE__).'/../../db/SuperStoreStats.sqlite');		
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $ex)
        {
            die("Cannot open database".$ex->getMessage());
        }
        return $db;
    }


    $indb = getInternalDatabase();

    $sql = "SELECT * FROM ORDERSTATS ORDER BY PURCHASE_DATE DESC";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    
    echo "
            <html style='background-color:#009183;color:white'>    
            <table border='1'>
            <tr><td>IMAGE</td>
            <td>PRODUCTID</td>
            <td>PRODUCTNAME</td>
            <td>PONUMBER</td>
            <td>CALCULATED QTY</td>
            <td>ORDER QTY</td>
            <td>ONHAND AT ORDER</td>
            <td>DECISION</td>            
            <td>LASTRCVDATE</td>
            <td>LASTRCVQTY</td>
            <td>SALES SINCE LASTRCV</td>
            <td>MULTIPLE</td>
            <td>75% OF QTY</td>
            <td>SALESPEED</td>
            <td>RATIOSALE</td>
            <td>ONHAND</td>
            <td>COST</td>
            <td>PRICE</td>
            <td>TOTALRECEIVE</td>
            <td>TOTALSALE</td>
            <td>SELFPROMO QTY</td>
            <td>WASTE QTY</td>
            <td>PURCHASEDATE</td>";
            
        foreach($items as $item){
            echo "<tr>
                    <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>
                    <td>".$item["PRODUCTID"]."</td>
                    <td>".$item["PRODUCTNAME"]."</td>                    
                    <td>".$item["PONUMBER"]."</td>

                    <td>".$item["PPSS_WAITING_CALCULATED"]."</td>                    
                    <td>".$item["PPSS_WAITING_QUANTITY"]."</td> 
                    <td>".$item["CURRENTONHAND"]."</td> 
                    <td>".$item["DECISION"]."</td> 
                    <td>".$item["LASTRCVDATE"]."</td>                                        
                    <td>".$item["LASTRECEIVEQUANTITY"]."</td>       
                    <td>".$item["SALESINCELASTRECEIVE"]."</td>   
                    <td>".$item["MULTIPLE"]."</td> 
                    <td>".($item["LASTRECEIVEQUANTITY"] * 0.75)."</td>                                     
                    <td>".$item["SALESPEED"]."</td>
                    <td>".$item["RATIOSALE"]."</td>                                    
                    <td>".$item["ONHAND"]."</td>   
                    <td>".$item["COST"]."</td>
                    <td>".$item["PRICE"]."</td>
                    <td>".$item["TOTALRECEIVE"]."</td>
                    <td>".$item["TOTALSALE"]."</td>                                    
                    <td>".$item["PROMO"]."</td>
                    <td>".$item["WASTE"]."</td>
                    <td>".$item["PURCHASE_DATE"]."</td>
                                                           
                </tr>";
        }
        echo "</table></html>";        
?>