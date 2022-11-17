<?php
header("refresh: 30;");
?>
<?php


function getInternalDatabase($base = "MAIN")
{
	try{		
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../../db/SuperStore.sqlite');		
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}


function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
	try  
	{  		
        $conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');		
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage( )) );   
	} 
	return $conn;
}

function A($array,$key){
	if ($array == null)
		return "";

	if (isset($array[$key]))
		return $array[$key];
	else
		return "";
}


function renderFiveItems($data,$countLbl,$haveQty = true)
{
	$i1 = $data[0] ?? null;
	$i2 = $data[1] ?? null;
	$i3 = $data[2] ?? null;
	$i4 = $data[3] ?? null;
	$i5 = $data[4] ?? null;
    
	if ($haveQty == true){
		return "        
        <table border='1'>
            <tr><td colspan=4'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>                
                <td>".A($i1,'PRODUCTID')."</td>     
				<td>".A($i1,'LOCONHAND')."</td>       
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>				
				<td>".A($i2,'PRODUCTID')."</td>       
				<td>".A($i2,'LOCONHAND')."</td>            
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>				
				<td>".A($i3,'PRODUCTID')."</td>
				<td>".A($i3,'LOCONHAND')."</td>            
            </tr>            
        </table>";
	}    
    else{
		return "
		<table border='1'>
            <tr><td colspan=3'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>                
                <td>".A($i1,'PRODUCTID')."</td>     				  
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>				
				<td>".A($i2,'PRODUCTID')."</td>       				       
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>				
				<td>".A($i3,'PRODUCTID')."</td>				     
            </tr>            
        </table>";
	}
}

function renderPriceDifference($data,$countLbl)
{
    $i1 = $data[0] ?? null;
	$i2 = $data[1] ?? null;
	$i3 = $data[2] ?? null;
    return "
    <table border='1'>
            <tr>
                <th>IMAGE</th>
                <th>BARCODE</th>
                <th>EXPECTED</th>
                <th>REAL</th>                
            </tr>

            <tr><td colspan=3'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>                
                <td>".A($i1,'PRODUCTID')."</td>     	
                <td>".A($i1,'PPSS_WAITING_PRICE')."</td>
                <td>".A($i1,'PPSS_DELIVERED_PRICE')."</td>
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>
				<td>".A($i2,'PRODUCTID')."</td>
				<td>".A($i1,'PPSS_WAITING_PRICE')."</td>
                <td>".A($i1,'PPSS_DELIVERED_PRICE')."</td>
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>
				<td>".A($i3,'PRODUCTID')."</td>
				<td>".A($i1,'PPSS_WAITING_PRICE')."</td>
                <td>".A($i1,'PPSS_DELIVERED_PRICE')."</td>
            </tr>            
        </table>";

}

function renderAnomalies($data,$countLbl)
{    
    $i1 = $data[0] ?? null;
	$i2 = $data[1] ?? null;
	$i3 = $data[2] ?? null;
	$i4 = $data[3] ?? null;
	$i5 = $data[4] ?? null;
    return "
		<table border='1'>
            <tr>
                <th>IMAGE</th>
                <th>BARCODE</th>
                <th>CALCULATED</th>
                <th>ORDERED</th>
                <th>ONHAND AT ORDER</th>
                <th>ONHAND NOW</th>

            </tr>

            <tr><td colspan=3'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>                
                <td>".A($i1,'PRODUCTID')."</td>     	
                <td>".A($i1,'PPSS_WAITING_CALCULATED')."</td>
                <td>".A($i1,'PPSS_WAITING_QUANTITY')."</td>                			  
                <td>".A($i1,'CURRENTONHAND')."</td>                			  
                <td>".A($i1,'ONHAND')."</td>                			  
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>
				<td>".A($i2,'PRODUCTID')."</td>
				<td>".A($i2,'PPSS_WAITING_CALCULATED')."</td>
                <td>".A($i2,'PPSS_WAITING_QUANTITY')."</td> 
                <td>".A($i2,'CURRENTONHAND')."</td>                			  
                <td>".A($i2,'ONHAND')."</td>                			                 			         				       
            </tr>
            <tr>
				<td><img style='height:50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>
				<td>".A($i3,'PRODUCTID')."</td>
				<td>".A($i3,'PPSS_WAITING_CALCULATED')."</td>
                <td>".A($i3,'PPSS_WAITING_QUANTITY')."</td>   
                <td>".A($i3,'CURRENTONHAND')."</td>                			  
                <td>".A($i3,'ONHAND')."</td>                			               			  				     
            </tr>            
        </table>";
}


function renderStats()
{
    $today = date('m/d/Y');	
	$db = getInternalDatabase();
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req = $db->prepare($sql);
    $req->execute(array($today));
	$d = $req->fetch(PDO::FETCH_ASSOC);

    $d["TRF_ALL_YES"] = json_decode($d["TRF_ALL_YES"] ,true);
    $d["TRF_RAT_YES"] = json_decode($d["TRF_RAT_YES"] ,true);
    $d["TRF_OX_YES"] = json_decode($d["TRF_OX_YES"] ,true);
    $d["TRF_TIGER_YES"] = json_decode($d["TRF_TIGER_YES"] ,true);
    $d["TRF_HARE_YES"] = json_decode($d["TRF_HARE_YES"] ,true);
    $d["TRF_SNAKE_YES"] = json_decode($d["TRF_SNAKE_YES"] ,true);
    $d["TRF_DRAGON_YES"] = json_decode($d["TRF_DRAGON_YES"] ,true);
    $d["TRF_GOAT_YES"] = json_decode($d["TRF_GOAT_YES"] ,true);
    $d["TRF_HORSE_YES"] = json_decode($d["TRF_HORSE_YES"] ,true);

    $d["TRF_ALL_TOD"] = json_decode($d["TRF_ALL_TOD"] ,true);
    $d["TRF_RAT_TOD"] = json_decode($d["TRF_RAT_TOD"] ,true);
    $d["TRF_OX_TOD"] = json_decode($d["TRF_OX_TOD"] ,true);
    $d["TRF_TIGER_TOD"] = json_decode($d["TRF_TIGER_TOD"] ,true);
    $d["TRF_HARE_TOD"] = json_decode($d["TRF_HARE_TOD"] ,true);
    $d["TRF_SNAKE_TOD"] = json_decode($d["TRF_SNAKE_TOD"] ,true);
    $d["TRF_DRAGON_TOD"] = json_decode($d["TRF_DRAGON_TOD"] ,true);
    $d["TRF_GOAT_TOD"] = json_decode($d["TRF_GOAT_TOD"] ,true);
    $d["TRF_HORSE_TOD"] = json_decode($d["TRF_HORSE_TOD"] ,true);


	$display = "
		<html style='background-color:#009183;color:white'>    
		<center>
    		<img height='50' src='http://phnompenhsuperstore.com/assets/images/logo.png'>

    	<table border='1'>
        <tr>
            <td>
                Traffic Today : ".$d["TRAFFIC_TOD"]."  / Average Sale basket today : ".$d["AVGBASKET_TOD"]."                
            </td>
            <td>
                Traffic Yeserday : ".$d["TRAFFIC_YES"]."  / Average Sale basket yesterday : ".$d["AVGBASKET_YES"]."                
            </td>
        </tr>
    </table>
    
    <table border='1'>
        <tr>
            <td></td><td>ALL</td><td>RAT</td><td>OX</td><td>TIGER</td><td>HARE</td>
            <td>SNAKE</td><td>DRAGON</td><td>GOAT</td><td>HORSE</td>
        </tr>
        <tr>
            <td>Transfer</td>
            <td>NB[".$d["TRF_ALL_YES"]["NBITEM"]."] QTY[".$d["TRF_ALL_YES"]["QUANTITY"]."] > NB[".$d["TRF_ALL_TOD"]["NBITEM"]."] QTY[".$d["TRF_ALL_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_RAT_YES"]["NBITEM"]."] QTY[".$d["TRF_RAT_YES"]["QUANTITY"]."] > NB[".$d["TRF_RAT_TOD"]["NBITEM"]."] QTY[".$d["TRF_RAT_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_OX_YES"]["NBITEM"]."] QTY[".$d["TRF_OX_YES"]["QUANTITY"]."] > NB[".$d["TRF_OX_TOD"]["NBITEM"]."] QTY[".$d["TRF_OX_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_TIGER_YES"]["NBITEM"]."] QTY[".$d["TRF_TIGER_YES"]["QUANTITY"]."] > NB[".$d["TRF_TIGER_TOD"]["NBITEM"]."] QTY[".$d["TRF_TIGER_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_HARE_YES"]["NBITEM"]."] QTY[".$d["TRF_HARE_YES"]["QUANTITY"]."] > NB[".$d["TRF_HARE_TOD"]["NBITEM"]."] QTY[".$d["TRF_HARE_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_SNAKE_YES"]["NBITEM"]."] QTY[".$d["TRF_SNAKE_YES"]["QUANTITY"]."] > NB[".$d["TRF_SNAKE_TOD"]["NBITEM"]."] QTY[".$d["TRF_SNAKE_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_DRAGON_YES"]["NBITEM"]."] QTY[".$d["TRF_DRAGON_YES"]["QUANTITY"]."] > NB[".$d["TRF_DRAGON_TOD"]["NBITEM"]."] QTY[".$d["TRF_DRAGON_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_GOAT_YES"]["NBITEM"]."] QTY[".$d["TRF_GOAT_YES"]["QUANTITY"]."] > NB[".$d["TRF_GOAT_TOD"]["NBITEM"]."] QTY[".$d["TRF_GOAT_TOD"]["QUANTITY"]."]</td>
            <td>NB[".$d["TRF_HORSE_YES"]["NBITEM"]."] QTY[".$d["TRF_HORSE_YES"]["QUANTITY"]."] > NB[".$d["TRF_HORSE_TOD"]["NBITEM"]."] QTY[".$d["TRF_HORSE_TOD"]["QUANTITY"]."]</td>
        </tr>
        <tr>
            <td>Sale</td>            
            <td>".$d["SALE_RAT_YES"]." > ".$d["SALE_RAT_TOD"]."</td>
            <td>".$d["SALE_OX_YES"]." > ".$d["SALE_OX_TOD"]."</td>
            <td>".$d["SALE_TIGER_YES"]." > ".$d["SALE_TIGER_TOD"]."</td>
            <td>".$d["SALE_HARE_YES"]." > ".$d["SALE_HARE_TOD"]."</td>
            <td>".$d["SALE_SNAKE_YES"]." > ".$d["SALE_SNAKE_TOD"]."</td>
            <td>".$d["SALE_DRAGON_YES"]." > ".$d["SALE_DRAGON_TOD"]."</td>
            <td>".$d["SALE_GOAT_YES"]." > ".$d["SALE_GOAT_TOD"]."</td>
            <td>".$d["SALE_HORSE_YES"]." > ".$d["SALE_HORSE_TOD"]."</td>
        </tr>
        <tr>
            <td>Occupancy</td>
            <td>".$d["OCC_ALL_YES"]." > ".$d["OCC_ALL_TOD"]."</td>
            <td>".$d["OCC_RAT_YES"]." > ".$d["OCC_RAT_TOD"]."</td>
            <td>".$d["OCC_OX_YES"]." > ".$d["OCC_OX_TOD"]."</td>
            <td>".$d["OCC_TIGER_YES"]." > ".$d["OCC_TIGER_TOD"]."</td>
            <td>".$d["OCC_HARE_YES"]." > ".$d["OCC_HARE_TOD"]."</td>
            <td>".$d["OCC_SNAKE_YES"]." > ".$d["OCC_SNAKE_TOD"]."</td>
            <td>".$d["OCC_DRAGON_YES"]." > ".$d["OCC_DRAGON_TOD"]."</td>
            <td>".$d["OCC_GOAT_YES"]." > ".$d["OCC_GOAT_TOD"]."</td>
            <td>".$d["OCC_HORSE_YES"]." > ".$d["OCC_HORSE_TOD"]."</td>
        </tr>        
    </table>";    
	    	
	$display .= "
    <table>
    <tr>
        <td>".renderFiveItems(json_decode($d["NOLOC_ITEMS"],true) ,"No Loc items:".$d["NOLOC_ITEMS_CNT"],false)."</td>               	
		<td>".renderFiveItems(json_decode($d["NEGATIVEITEM_WH1_ITEMS"],true),"Negative items WH1: ".$d["NEGATIVEITEM_WH1_CNT"])."</td>
		<td>".renderFiveItems(json_decode($d["NEGATIVEITEM_WH2_ITEMS"],true),"Negative items WH2: ".$d["NEGATIVEITEM_WH2_CNT"])."</td>
		<td>".renderFiveItems(json_decode($d["UNSOLD30_ITEMS"],true),"Unsold items 30: ".$d["UNSOLD30_ITEMS_CNT"])."</td>
		<td>".renderFiveItems(json_decode($d["EXPIRE_RET_ITEMS"],true),"Expire Returns items : ".$d["EXPIRE_RET_CNT"])."</td>
		<td>".renderFiveItems(json_decode($d["EXPIRE_NR_ITEMS"],true),"Expire NoReturns items : ".$d["EXPIRE_NR_CNT"])."</td>
		<td>".renderFiveItems(json_decode($d["NEEDMOVE_ITEMS"],true),"Need move items : ".$d["NEEDMOVE_CNT"])."</td>	
     </tr>
    </table>    

    <table border='1'>
        <tr>
            <td><center>
                <table border='1'>
                    <tr>
                        <td colspan='3'>Receive</td>
                    </tr>
                    <tr>
                        <td>NB PO Received yesterday: ".$d["PORECEIVED_YES"]."</td>
                        <td>Item qty Received yesterday: ".$d["NBITEMRECEIVED_YES"]."</td>
                        <td>Nb item Received yesterday: ".$d["ITEMQTYRECEIVED_YES"]."</td>
                    </tr>
                    <tr>                    
                        <td>NB PO Received today: ".$d["PORECEIVED_TOD"]."</td>                       
                        <td>Item qty Received today: ".$d["NBITEMRECEIVED_TOD"]."</td>                        
                        <td>Nb item Received today: ".$d["ITEMQTYRECEIVED_TOD"]."</td>
                    </tr>                    
                </table>
                </center>
            </td>

            <td><center>
                <table border='1'>
                    <tr>
                        <td colspan='3'>Return</td>
                    </tr>
                    <tr>
					
                        <td>Return nb items today: ".$d["RETURN_NBITEM_TOD"]."</td>
                        <td>Return sum items today: ".$d["RETURN_SUMITEM_YES"]."</td> 
                        <td>Return amount  today: ".$d["RETURN_AMOUNT_YES"]."</td>  
                    </tr>

                    <tr>					
                        <td>Return nb items yesterday: ".$d["RETURN_NBITEM_YES"]."</td>                        
                        <td>Return sum items yesterday: ".$d["RETURN_SUMITEM_YES"]."</td>                          
                        <td>Return amount yesterday: ".$d["RETURN_AMOUNT_YES"]."</td>                          
                    </tr>

                </table>
            </center>
            </td>

        </tr>
		
        <tr>
            <td>
                <table border='1'>
                    <tr>
                        <td>NB Po Created Yesterday: ".$d["POCREATED_YES"]."</td>
                        <td>NB Po Created Today: ".$d["POCREATED_TOD"]."</td>
        
						<td>NB Item ordered Yesterday: ".$d["NBITEMORDERED_YES"]."</td>
                        <td>NB Item ordered Today: ".$d["POCREATED_TOD"]."</td>
                        
        
						<td>Qty Item ordered Yesterday: ".$d["QTYITEMORDERED_YES"]."</td>
                        <td>Qty Item ordered Today: ".$d["POCREATED_TOD"]."</td>
                        
                    </tr>	
                    <tr>
                        <td colspan='2'>".renderPriceDifference(json_decode($d["PRICEDIFFERENCES_ITEMS_TOD"],true),"Price difference 7 daysBack: ".$d["PRICEDIFFERENCES_ITEMS_TOD_CNT"])."</td>							
						<td colspan='2'>".renderAnomalies(json_decode($d["ANOMALIES_ITEMS_NOW"],true),"Anomaly count: ".$d["ANOMALIES_ITEMS_NOW_CNT"])."</td>			
                    </tr>
                </table>
            </td>

            <td>
                <table border='1'>                    
                    <tr>		
                        <td colspan='4'>
                            <table>            
                                <tr>
									<td>".renderFiveItems(json_decode($d["WASTE_ITEMS_TOD"],true),"Waste items yesterday:".$d["WASTE_NBITEMS_YES"]."|Sum:".$d["WASTE_SUM_YES"] )."</td>
                                    <td>".renderFiveItems(json_decode($d["WASTE_ITEMS_TOD"],true),"Waste items today:" .$d["WASTE_NBITEMS_TOD"]."|Sum:".$d["WASTE_SUM_TOD"] )."</td>		
                                </tr>                
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>                
    </table>
</center>
</html>";
    return $display;
}	 


echo renderStats();


?>