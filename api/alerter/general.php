<?php
header("refresh: 30;");
?>
<?php

function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
	try  
	{  		
		if ($name == "MAIN")
		{
			if (isLocal()){				
				$conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
			}
			else 
				$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TRAINING")
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=TRAININGDATA;ConnectionPooling=0', 'sa', 'blue');
		}
		else if ($name == "TMP" )
		{
			$conn = new PDO('sqlsrv:Server=192.168.72.249\\SQL2008r2,55008;Database=ppss_tempdata;ConnectionPooling=0', 'sa', 'blue');
		}  		
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



function renderFiveItems($key,$countLbl,$haveQty = true)
{
	$i1 = isset($d[$key][0]) ?? null;
	$i2 = isset($d[$key][1]) ?? null;
	$i3 = isset($d[$key][2]) ?? null;
	$i4 = isset($d[$key][3]) ?? null;
	$i5 = isset($d[$key][4]) ?? null;

	if ($haveQty == true){
		return "        
        <table border='1'>
            <tr><td colspan=3'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>
                <td>".A($i1,'PRODUCTNAME')."</td>
                <td>".A($i1,'PRODUCTID')."</td>     
				<td>".A($i1,'LOCONHAND')."</td>       
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>
				<td>".A($i2,'PRODUCTNAME')."</td>
				<td>".A($i2,'PRODUCTID')."</td>       
				<td>".A($i2,'LOCONHAND')."</td>            
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>
				<td>".A($i3,'PRODUCTNAME')."</td>
				<td>".A($i3,'PRODUCTID')."</td>
				<td>".A($i3,'LOCONHAND')."</td>            
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i4,'PRODUCTID')."'></td>
				<td>".A($i4,'PRODUCTNAME')."</td>
				<td>".A($i4,'PRODUCTID')."</td>
				<td>".A($i4,'LOCONHAND')."</td>            
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i5,'PRODUCTID')."'></td>
				<td>".A($i5,'PRODUCTNAME')."</td>
				<td>".A($i5,'PRODUCTID')."</td>
				<td>".A($i5,'LOCONHAND')."</td>            
            </tr>
        </table>";
	}else{
		return "
		<table border='1'>
            <tr><td colspan=3'>".$countLbl."</td></tr>
            <tr>
                <td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i1,'PRODUCTID')."'></td>
                <td>".A($i1,'PRODUCTNAME')."</td>
                <td>".A($i1,'PRODUCTID')."</td>     				  
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i2,'PRODUCTID')."'></td>
				<td>".A($i2,'PRODUCTNAME')."</td>
				<td>".A($i2,'PRODUCTID')."</td>       				       
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i3,'PRODUCTID')."'></td>
				<td>".A($i3,'PRODUCTNAME')."</td>
				<td>".A($i3,'PRODUCTID')."</td>				     
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i4,'PRODUCTID')."'></td>
				<td>".A($i4,'PRODUCTNAME')."</td>
				<td>".A($i4,'PRODUCTID')."</td>				            
            </tr>
            <tr>
				<td><img style='height:50px' src='https://phnompenhsuperstore.com/api/picture.php?barcode=".A($i5,'PRODUCTID')."'></td>
				<td>".A($i5,'PRODUCTNAME')."</td>
				<td>".A($i5,'PRODUCTID')."</td>				            
            </tr>
        </table>";
	}

	
}

function renderStats()
{
	$db = getDatabase();
	$sql = "SELECT * FROM GENERATEDSTATS WHERE DAY = ?";
	$req->prepare($sql);
	$d = $req->fetch(PDO::FETCH_ASSOC);

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
                Traffic Yeserday : ".$d["TRAFFIC_YES"]."  / Average Sale basket yesterday : ".$d["TRAFFIC_YES"]."                
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
            <td>".$d["TRF_ALL_YES"]." > ".$d["TRF_ALL_TOD"]."</td>
            <td>".$d["TRF_RAT_YES"]." > ".$d["TRF_RAT_TOD"]."</td>
            <td>".$d["TRF_OX_YES"]." > ".$d["TRF_OX_TOD"]."</td>
            <td>".$d["TRF_TIGER_YES"]." > ".$d["TRF_TIGER_TOD"]."</td>
            <td>".$d["TRF_HARE_YES"]." > ".$d["TRF_HARE_TOD"]."</td>
            <td>".$d["TRF_SNAKE_YES"]." > ".$d["TRF_SNAKE_TOD"]."</td>
            <td>".$d["TRF_DRAGON_YES"]." > ".$d["TRF_DRAGON_TOD"]."</td>
            <td>".$d["TRF_GOAT_YES"]." > ".$d["TRF_GOAT_TOD"]."</td>
            <td>".$d["TRF_HORSE_YES"]." > ".$d["TRF_HORSE_TOD"]."</td>
        </tr>
        <tr>
            <td>Sale</td>
            <td>".$d["SAL_ALL_YES"]." > ".$d["SAL_ALL_TOD"]."</td>
            <td>".$d["SAL_RAT_YES"]." > ".$d["SAL_RAT_TOD"]."</td>
            <td>".$d["SAL_OX_YES"]." > ".$d["SAL_OX_TOD"]."</td>
            <td>".$d["SAL_TIGER_YES"]." > ".$d["SAL_TIGER_TOD"]."</td>
            <td>".$d["SAL_HARE_YES"]." > ".$d["SAL_HARE_TOD"]."</td>
            <td>".$d["SAL_SNAKE_YES"]." > ".$d["SAL_SNAKE_TOD"]."</td>
            <td>".$d["SAL_DRAGON_YES"]." > ".$d["SAL_DRAGON_TOD"]."</td>
            <td>".$d["SAL_GOAT_YES"]." > ".$d["SAL_GOAT_TOD"]."</td>
            <td>".$d["SAL_HORSE_YES"]." > ".$d["SAL_HORSE_TOD"]."</td>
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
        <td>".renderFiveItems("NOLOC_ITEMS","No Loc items:".$d["NOLOC_ITEMS_CNT"],false)."</td>               	
		<td>".renderFiveItems("NEGATIVEITEM_WH1_ITEMS","Negative items WH1: ".$d["NEGATIVEITEM_WH1_CNT"])."</td>
		<td>".renderFiveItems("NEGATIVEITEM_WH2_ITEMS","Negative items WH2: ".$d["NEGATIVEITEM_WH2_CNT"])."</td>
		<td>".renderFiveItems("UNSOLD30_ITEMS","Unsold items 30: ".$d["UNSOLD30_ITEMS_CNT"])."</td>
		<td>".renderFiveItems("EXPIRE_RET_ITEMS","Expire Returns items : ".$d["EXPIRE_RET_CNT"])."</td>
		<td>".renderFiveItems("EXPIRE_NR_ITEMS","Expire Returns items : ".$d["EXPIRE_NR_CNT"])."</td>
		<td>".renderFiveItems("NEEDMOVE_ITEMS","Need move items : ".$d["NEEDMOVE_CNT"])."</td>	
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
                        <td colspan='2'>".renderFiveItems("PRICEDIFFERENCES_ITEMS_TOD","Price difference today: ".$d["PRICEDIFFERENCES_ITEMS_TOD_CNT"])."</td>	
						<td colspan='2'>".renderFiveItems("PRICEDIFFERENCES_ITEMS_YES","Price difference yesterday: ".$d["PRICEDIFFERENCES_ITEMS_YES_CNT"])."</td>
						<td colspan='2'>".renderFiveItems("ANOMALIES_ITEMS_NOW","Anomaly count: ".$d["ANOMALIES_ITEMS_NOW_CNT"])."</td>			
                    </tr>
                </table>
            </td>

            <td>
                <table border='1'>                    
                    <tr>		
                        <td colspan='4'>
                            <table>            
                                <tr>
									<td>".renderFiveItems("WASTE_ITEMS_TOD","Waste items yesterday:".$d["WASTE_NBITEMS_YES"]."|Sum:".$d["WASTE_SUM_YES"] )."</td>
                                    <td>".renderFiveItems("WASTE_ITEMS_TOD","Waste items today:" .$d["WASTE_NBITEMS_TOD"]."|Sum:".$d["WASTE_SUM_TOD"] )."</td>		
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





	 