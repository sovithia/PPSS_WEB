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


function renderTransfer($yesterday,$today)
{
    return "<table border='1'>    
    <tr><td>NB:".$yesterday["NBITEM"]."|QTY:".$yesterday["QUANTITY"]."</td>
    <td>NB:".$today["NBITEM"]."|QTY:".$today["QUANTITY"]."</td><tr>    
    </table>";
}

function EV($yesterdayNum,$todayNum,$invert = false)
{
    if ($yesterdayNum != "0" && $yesterdayNum != 0)
        $percent = (($yesterdayNum - $todayNum) / $yesterdayNum) * 100;
    else {
        $percent = $todayNum;
    }        

    if ($percent == 0)
    return "<p style='color:yellow'>SAME</p>";

    if ($invert == true){
        if ($percent > 0)    
            return "<p style='color:red'>+".$percent."%</p>";
        else if ($percent < 0)    
            return "<p style='color:lightgreen'>-".$percent."%</p>";
    }else{
        if ($percent > 0)    
            return "<p style='color:lightgreen'>+".$percent."%</p>";
        else if ($percent < 0)    
            return "<p style='color:red'>-".$percent."%</p>";
    }
    
    

}

function DLX($action)
{
    return "<a target='_blank' href='details.php?ACTION=".$action."'><img src='img/eye.png'></a>";
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
    	
    <table border='1' width='99%'> 
        <tr>
            <td align='center' width='40%'>
                <table border='1' >           
                    <tr align='center'>
                        <td colspan='6' style='font-size:20pt'>ALERT</td>                        
                    </tr>    
                    <tr>
                        <td></td><td colspan='2' ><center>←</center></td><td colspan='2'><center>↓</center></td><td>EVOL</td>
                    </tr>    
                    <tr>
                        <td>Traffic</td>
                        <td colspan='2'>".$d["TRAFFIC_YES"]."</td>
                        <td colspan='2'>".$d["TRAFFIC_TOD"]."</td>
                        <td> XXX </td>
                    </tr>        
                    <tr>
                        <td>Average Sale Basket</td>
                        <td colspan='2'>".$d["AVGBASKET_YES"]."</td>
                        <td colspan='2'>".$d["AVGBASKET_TOD"]."</td>
                        <td> XXX </td>
                    </tr>    
                    <tr>
                        <td width='25%'>Unsold items 30</td>
                        <td width='10%'>".$d["UNSOLD30_ITEMS_CNT_YES"]."</td>
                        <td width='10%'></td>
                        <td width='10%'>".$d["UNSOLD30_ITEMS_CNT_TOD"]."</td>
                        <td width='10%'>".DLX("UNSOLD30_ITEMS_TOD")."</td>
                        <td width='10%'>".EV($d["UNSOLD30_ITEMS_CNT_YES"],$d["UNSOLD30_ITEMS_CNT_TOD"])."</td>
                    </tr>
                    
                                
                    <tr>
                        <td>No Loc items</td>
                        <td colspan='2'>".$d["NOLOC_ITEMS_CNT_YES"]."</td>                        
                        <td>".$d["NOLOC_ITEMS_CNT_TOD"]."</td>
                        <td>".DLX("NOLOC_ITEMS_TOD")."</td>
                        <td>".EV($d["NOLOC_ITEMS_CNT_YES"],$d["NOLOC_ITEMS_CNT_TOD"])."</td>
                    </tr>
                        
                    <tr>
                        <td>Cost Zero items</td>
                        <td colspan='2'>".$d["COSTZERO_YES"]."</td>                        
                        <td>".$d["COSTZERO_TOD"]."</td>
                        <td>".DLX("COSTZERO_ITEMS_TOD")."</td>
                        <td>".EV($d["COSTZERO_YES"],$d["COSTZERO_TOD"])."</td>
                    </tr>
                    
                    <tr>
                        <td>Cost Zero sale</td>
                        <td colspan='2'>".$d["ZEROSALE_YES"]."</td>                        
                        <td>".$d["ZEROSALE_TOD"]."</td>
                        <td>".DLX("ZEROSALE_ITEMS_TOD")."</td>
                        <td>".EV($d["ZEROSALE_YES"],$d["ZEROSALE_TOD"])."</td>
                    </tr>
                    
                    <tr>
                        <td>Low Profit</td>
                        <td colspan='2'>".$d["LOWPROFIT_YES"]."</td>                        
                        <td>".$d["LOWPROFIT_TOD"]."</td>
                        <td>".DLX("LOWPROFIT_ITEMS_TOD")."</td>
                        <td>".EV($d["LOWPROFIT_YES"],$d["ZEROSALE_TOD"])."</td>
                    </tr>                                
                </table>
            </td>

            <td align='center' width='40%'>
                <table border='1'>        
                    <tr align='center'>
                        <td colspan='6' style='font-size:20pt'>ALERT</td>                        
                    </tr>
                    
                    <tr>
                        <td></td><td colspan='2' ><center>←</center></td><td colspan='2'><center>↓</center></td><td>EVOL</td>
                    </tr>            
                    
                    <tr>
                        <td width='25%'> Negative items WH1</td>
                        <td width='10%'>".$d["NEGATIVEITEM_WH1_CNT_YES"]."</td>
                        <td width='10%'>N/A</td>
                        <td width='10%'>".$d["NEGATIVEITEM_WH1_CNT_TOD"]."</td>
                        <td width='10%'>".DLX("NEGATIVEITEM_WH1_ITEMS_TOD")."</td>            
                        <td width='10%'>".EV($d["NEGATIVEITEM_WH1_CNT_YES"],$d["NEGATIVEITEM_WH1_CNT_TOD"])."</td>            
                    </tr>        
                    
                    <tr>
                        <td> Negative items WH2 </td>
                        <td>".$d["NEGATIVEITEM_WH2_CNT_YES"]."</td>
                        <td>N/A</td>
                        <td>".$d["NEGATIVEITEM_WH2_CNT_TOD"]."</td>
                        <td>".DLX("NEGATIVEITEM_WH2_ITEMS_TOD")."</td>
                        <td>".EV($d["NEGATIVEITEM_WH2_CNT_YES"],$d["NEGATIVEITEM_WH2_CNT_TOD"])."</td>            
                    </tr>
                    
                    <tr>
                        <td>Negative items FRESH</td>
                        <td>".$d["NEGATIVEITEM_FRESH_CNT_YES"]."</td>
                        <td>N/A</td>
                        <td>".$d["NEGATIVEITEM_FRESH_CNT_TOD"]."</td>
                        <td>".DLX("NEGATIVEITEM_FRESH_ITEMS_TOD")."</td>
                        <td>".EV($d["NEGATIVEITEM_FRESH_CNT_YES"],$d["NEGATIVEITEM_FRESH_CNT_TOD"])."</td>            
                    </tr>        
                    
                    <tr>
                        <td>Expire Returns items</td>
                        <td>".$d["EXPIRE_RET_CNT_YES"]."</td>
                        <td>N/A</td>
                        <td>".$d["EXPIRE_RET_CNT_TOD"]."</td>
                        <td>".DLX("EXPIRE_RET_ITEMS_TOD")."</td>
                        <td>".EV($d["EXPIRE_RET_CNT_YES"],$d["EXPIRE_RET_CNT_TOD"])."</td>            
                    </tr>        
                    
                    <tr>
                        <td>Expire NoReturns items</td>
                        <td>".$d["EXPIRE_NR_CNT_YES"]."</td>
                        <td>N/A</td>
                        <td>".$d["EXPIRE_NR_CNT_TOD"]."</td>
                        <td>".DLX("EXPIRE_NR_ITEMS_TOD")."</td>
                        <td>".EV($d["EXPIRE_NR_CNT_YES"],$d["EXPIRE_NR_CNT_TOD"])."</td>
                    </tr>        
                    
                    <tr>
                        <td>Need move items</td>
                        <td>".$d["NEEDMOVE_CNT_YES"]."</td>
                        <td>N/A</td>
                        <td>".$d["NEEDMOVE_CNT_TOD"]."</td>
                        <td>".DLX("NEEDMOVE_ITEMS_TOD")."</td>
                        <td>".EV($d["NEEDMOVE_CNT_YES"],$d["NEEDMOVE_CNT_TOD"])."</td>
                    </tr>
                    
                    
                    
                </table>
            </td>
        </tr>        
    </table>


    <br><br>

    <table border='1' width='99%'>
        <tr align='center'>
                <td></td>        
                <td colspan='5'><img height='50' src='img/signRat.png'></td>                
                <td colspan='5'><img height='50' src='img/signOx.png'></td>                
                <td colspan='5'><img height='50' src='img/signTiger.png'></td>
                <td colspan='5'><img height='50' src='img/signHare.png'></td>
                <td colspan='5'><img height='50' src='img/signSnake.png'></td>            
                <td colspan='5'><img height='50' src='img/signDragon.png'></td>                
                <td colspan='5'><img height='50' src='img/signGoat.png'></td>                
                <td colspan='5'><img height='50' src='img/signHorse.png'></td>                
        </tr>
        <tr>
                <td width='4%'></td>  
                <td width='5%' colspan='2'><center>←</center></td><td width='5%'  colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
                <td width='5%' colspan='2'><center>←</center></td><td width='5%' colspan='2'><center>↓</center></td><td width='2%'>EV</td>
        <tr>
        <tr align='center'>
            <td>Transfer NB items</td>            
            <td width='4%'>".$d["TRF_RAT_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_RAT_ITEMS_YES")."</td><td width='4%'>".$d["TRF_RAT_TOD"]["NBITEM"]."</td><td>".DLX("TRF_RAT_ITEMS_TOD")."</td><td>".EV($d["TRF_RAT_YES"]["NBITEM"],$d["TRF_RAT_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_OX_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_OX_ITEMS_YES")."</td><td width='4%'>".$d["TRF_OX_TOD"]["NBITEM"]."</td><td>".DLX("TRF_OX_ITEMS_TOD")."</td><td>".EV($d["TRF_OX_YES"]["NBITEM"],$d["TRF_OX_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_TIGER_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_TIGER_ITEMS_YES")."</td><td width='4%'>".$d["TRF_TIGER_TOD"]["NBITEM"]."</td><td>".DLX("TRF_TIGER_ITEMS_TOD")."</td><td>".EV($d["TRF_TIGER_YES"]["NBITEM"],$d["TRF_TIGER_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_HARE_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_HARE_ITEMS_YES")."</td><td width='4%'>".$d["TRF_HARE_TOD"]["NBITEM"]."</td><td>".DLX("TRF_HARE_ITEMS_TOD")."</td><td>".EV($d["TRF_HARE_YES"]["NBITEM"],$d["TRF_HARE_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_SNAKE_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_SNAKE_ITEMS_YES")."</td><td width='4%'>".$d["TRF_SNAKE_TOD"]["NBITEM"]."</td><td>".DLX("TRF_SNAKE_ITEMS_TOD")."</td><td>".EV($d["TRF_SNAKE_YES"]["NBITEM"],$d["TRF_SNAKE_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_DRAGON_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_DRAGON_ITEMS_YES")."</td><td width='4%'>".$d["TRF_DRAGON_TOD"]["NBITEM"]."</td><td>".DLX("TRF_DRAGON_ITEMS_TOD")."</td><td>".EV($d["TRF_DRAGON_YES"]["NBITEM"],$d["TRF_DRAGON_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_GOAT_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_GOAT_ITEMS_YES")."</td><td width='4%'>".$d["TRF_GOAT_TOD"]["NBITEM"]."</td><td>".DLX("TRF_GOAT_ITEMS_TOD")."</td><td>".EV($d["TRF_GOAT_YES"]["NBITEM"],$d["TRF_GOAT_TOD"]["NBITEM"])."</td>
            <td width='4%'>".$d["TRF_HORSE_YES"]["NBITEM"]."</td><td width='1%'>".DLX("TRF_HORSE_ITEMS_YES")."</td><td width='4%'>".$d["TRF_HORSE_TOD"]["NBITEM"]."</td><td>".DLX("TRF_HORSE_ITEMS_TOD")."</td><td>".EV($d["TRF_HORSE_YES"]["NBITEM"],$d["TRF_HORSE_TOD"]["NBITEM"])."</td>            
        </tr>

        <tr align='center'>
            <td>Transfer Qty items</td>            
            <td>".$d["TRF_RAT_YES"]["QUANTITY"]."</td><td>".DLX("TRF_RAT_ITEMS_YES")."</td><td>".$d["TRF_RAT_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_RAT_ITEMS_TOD")."</td><td>".EV($d["TRF_RAT_YES"]["QUANTITY"],$d["TRF_RAT_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_OX_YES"]["QUANTITY"]."</td><td>".DLX("TRF_OX_ITEMS_YES")."</td><td>".$d["TRF_OX_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_OX_ITEMS_TOD")."</td><td>".EV($d["TRF_OX_YES"]["QUANTITY"],$d["TRF_OX_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_TIGER_YES"]["QUANTITY"]."</td><td>".DLX("TRF_TIGER_ITEMS_YES")."</td><td>".$d["TRF_TIGER_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_TIGER_ITEMS_TOD")."</td><td>".EV($d["TRF_TIGER_YES"]["QUANTITY"],$d["TRF_TIGER_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_HARE_YES"]["QUANTITY"]."</td><td>".DLX("TRF_HARE_ITEMS_YES")."</td><td>".$d["TRF_HARE_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_HARE_ITEMS_TOD")."</td><td>".EV($d["TRF_HARE_YES"]["QUANTITY"],$d["TRF_HARE_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_SNAKE_YES"]["QUANTITY"]."</td><td>".DLX("TRF_SNAKE_ITEMS_YES")."</td><td>".$d["TRF_SNAKE_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_SNAKE_ITEMS_TOD")."</td><td>".EV($d["TRF_SNAKE_YES"]["QUANTITY"],$d["TRF_SNAKE_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_DRAGON_YES"]["QUANTITY"]."</td><td>".DLX("TRF_DRAGON_ITEMS_YES")."</td><td>".$d["TRF_DRAGON_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_DRAGON_ITEMS_TOD")."</td><td>".EV($d["TRF_DRAGON_YES"]["QUANTITY"],$d["TRF_DRAGON_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_GOAT_YES"]["QUANTITY"]."</td><td>".DLX("TRF_GOAT_ITEMS_YES")."</td><td>".$d["TRF_GOAT_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_GOAT_ITEMS_TOD")."</td><td>".EV($d["TRF_GOAT_YES"]["QUANTITY"],$d["TRF_GOAT_TOD"]["QUANTITY"])."</td>
            <td>".$d["TRF_HORSE_YES"]["QUANTITY"]."</td><td>".DLX("TRF_HORSE_ITEMS_YES")."</td><td>".$d["TRF_HORSE_TOD"]["QUANTITY"]."</td><td>".DLX("TRF_HORSE_ITEMS_TOD")."</td><td>".EV($d["TRF_HORSE_YES"]["QUANTITY"],$d["TRF_HORSE_TOD"]["QUANTITY"])."</td>
        </tr>
        

        
        <tr align='center'>
            <td>Sale Nb Items</td>            
            <td>".$d["SALE_RAT_YES"]."</td><td>".DLX("SALE_RAT_ITEMS_YES")."</td><td>".$d["SALE_RAT_TOD"]."</td><td>".DLX("SALE_RAT_ITEMS_TOD")."</td></a></td><td>".EV($d["SALE_RAT_YES"],$d["SALE_RAT_TOD"])."</td>
            <td>".$d["SALE_OX_YES"]."</td><td>".DLX("SALE_OX_ITEMS_YES")."</td></td><td>".$d["SALE_OX_TOD"]."</td><td>".DLX("SALE_OX_ITEMS_TOD")."</td><td>".EV($d["SALE_OX_YES"],$d["SALE_OX_TOD"])."</td>
            <td>".$d["SALE_TIGER_YES"]."</td><td>".DLX("SALE_TIGER_ITEMS_YES")."</td></td><td>".$d["SALE_TIGER_TOD"]."</td><td>".DLX("SALE_TIGER_ITEMS_TOD")."</a></td><td>".EV($d["SALE_OX_YES"],$d["SALE_OX_TOD"])."</td>
            <td>".$d["SALE_HARE_YES"]."</td><td>".DLX("SALE_HARE_ITEMS_YES")."</td></td><td>".$d["SALE_HARE_TOD"]."</td><td>".DLX("SALE_HARE_ITEMS_TOD")."</td><td>".EV($d["SALE_HARE_YES"],$d["SALE_HARE_TOD"])."</td>
            <td>".$d["SALE_SNAKE_YES"]."</td><td>".DLX("SALE_SNAKE_ITEMS_YES")."</td></td><td>".$d["SALE_SNAKE_TOD"]."</td><td>".DLX("SALE_SNAKE_ITEMS_TOD")."</td><td>".EV($d["SALE_SNAKE_YES"],$d["SALE_SNAKE_TOD"])."</td>
            <td>".$d["SALE_DRAGON_YES"]."</td><td>".DLX("SALE_DRAGON_ITEMS_YES")."</td></td><td>".$d["SALE_DRAGON_TOD"]."</td><td>".DLX("SALE_DRAGON_ITEMS_TOD")."</td><td>".EV($d["SALE_DRAGON_YES"],$d["SALE_DRAGON_TOD"])."</td>
            <td>".$d["SALE_GOAT_YES"]."</td><td>".DLX("SALE_GOAT_ITEMS_YES")."</td></td><td>".$d["SALE_GOAT_TOD"]."</td><td>".DLX("SALE_GOAT_ITEMS_TOD")."</td><td>".EV($d["SALE_GOAT_YES"],$d["SALE_GOAT_TOD"])."</td>
            <td>".$d["SALE_HORSE_YES"]."</td><td>".DLX("SALE_HORSE_ITEMS_YES")."</td></td><td>".$d["SALE_HORSE_TOD"]."</td><td>".DLX("SALE_HORSE_ITEMS_TOD")."</td><td>".EV($d["SALE_HORSE_YES"],$d["SALE_HORSE_TOD"])."</td>
        </tr>

        
        <tr align='center'>
            <td>Occupancy</td>            
            <td>".$d["OCC_RAT_YES"]."</td><td>N/A</td><td>".$d["OCC_RAT_TOD"]."</td><td>".DLX("OCC_RAT_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_OX_YES"]."</td><td>N/A</td><td>".$d["OCC_OX_TOD"]."</td><td>".DLX("OCC_OX_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_TIGER_YES"]."</td><td>N/A</td><td>".$d["OCC_TIGER_TOD"]."</td><td>".DLX("OCC_TIGER_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_HARE_YES"]."</td><td>N/A</td><td>".$d["OCC_HARE_TOD"]."</td><td>".DLX("OCC_HARE_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_SNAKE_YES"]."</td><td>N/A</td><td>".$d["OCC_SNAKE_TOD"]."</td><td>".DLX("OCC_SNAKE_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_DRAGON_YES"]."</td><td>N/A</td><td>".$d["OCC_DRAGON_TOD"]."</td><td>".DLX("OCC_DRAGON_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_GOAT_YES"]."</td><td>N/A</td><td>".$d["OCC_GOAT_TOD"]."</td><td>".DLX("OCC_GOAT_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
            <td>".$d["OCC_HORSE_YES"]."</td><td>N/A</td><td>".$d["OCC_HORSE_TOD"]."</td><td>".DLX("OCC_HORSE_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"])."</td>
        </tr>   
        

    </table>
    <br><br>
        

    <table width='99%' >
        <tr valign='top' >
            <td width='25%'>
                <table border='1' width='100%'>
                <tr>
                    <td colspan='4' style='font-size:30pt' align='center'>Purchasing</td>
                </tr>
                <tr>
                    <td></td><td colspan='2'><center>←</center></td><td colspan='2'><center>↓</center></td><td>EVOL</td>
                </tr>

                <tr>
                    <td width='25%'>NB PO Created</td>
                    <td width='25%' colspan='2'>".$d["POCREATED_YES"]."</td>
                    <td width='25%' colspan='2'>".$d["POCREATED_TOD"]."</td>
                    <td width='25%'>".EV($d["POCREATED_YES"],$d["POCREATED_TOD"])."</td>
                </tr>

                <tr>
                    <td>NB Item Ordered</td>        
                    <td colspan='2'>".$d["NBITEMORDERED_YES"]."</td>
                    <td colspan='2'>".$d["NBITEMORDERED_TOD"]."</td>
                    <td width='25%'>".EV($d["NBITEMORDERED_YES"],$d["NBITEMORDERED_TOD"])."</td>
                </tr>

                <tr>
                    <td>Qty Item ordered</td>        
                    <td colspan='2'>".$d["QTYITEMORDERED_YES"]."</td>
                    <td colspan='2'>".$d["QTYITEMORDERED_TOD"]."</td>   
                    <td width='25%'>".EV($d["QTYITEMORDERED_YES"],$d["QTYITEMORDERED_TOD"])."</td>                 
                </tr>	
                                
                <tr>        
                    <td>PriceDifferences -7days</td>
                    <td colspan='2'>".$d["PRICEDIFFERENCES_ITEMS_CNT_YES"]."</td>
                    <td>".$d["PRICEDIFFERENCES_ITEMS_CNT_TOD"]."</td><td>".DLX("ANOMALIES_ITEMS_TOD")."</td>
                    <td width='25%'>".EV($d["PRICEDIFFERENCES_ITEMS_CNT_YES"],$d["PRICEDIFFERENCES_ITEMS_CNT_TOD"])."</td>
                </tr>
                <tr>
                    <td>Anomalies</td>
                    <td colspan='2'>".$d["ANOMALIES_ITEMS_CNT_YES"]."</td>
                    <td>".$d["ANOMALIES_ITEMS_CNT_TOD"]."</td><td>".DLX("PRICEDIFFERENCES_ITEMS_TOD")."</td>                    
                    <td width='25%'>".EV($d["PRICEDIFFERENCES_ITEMS_CNT_YES"],$d["PRICEDIFFERENCES_ITEMS_CNT_TOD"])."</td>
                </tr>
                </tr>
                </table>   
            </td>    
            <td width='25%'>                                            
                <table border='1'>
                    <tr>
                        <td colspan='4' style='font-size:30pt' align='center'>Receive</td>
                    </tr>
                    <tr>
                        <td></td><td><center>←</center></td><td><center>↓</center></td><td>EVOL</td>
                    </tr>

                    <tr >
                        <td width='25%'>NB PO Received</td>
                        <td width='25%'>".$d["PORECEIVED_YES"]."</td>
                        <td width='25%'>".$d["PORECEIVED_TOD"]."</td>
                        <td width='25%'>".EV($d["PORECEIVED_YES"],$d["PORECEIVED_TOD"])."</td>
                        
                    </tr>

                    <tr >
                        <td>Nb ItemReceived</td>    
                        <td>".$d["NBITEMRECEIVED_YES"]."</td>
                        <td>".$d["NBITEMRECEIVED_TOD"]."</td>
                        <td width='25%'>".EV($d["PORECEIVED_YES"],$d["PORECEIVED_TOD"])."</td>                          
                    </tr>

                    <tr >         
                        <td>Item Quantity Received</td>      
                        <td>".$d["ITEMQTYRECEIVED_YES"]."</td>                                
                        <td>".$d["ITEMQTYRECEIVED_TOD"]."</td>
                        <td width='25%'>".EV($d["PORECEIVED_YES"],$d["PORECEIVED_TOD"])."</td>                        
                    </tr> 
                                        
                </table>
                    
            </td>        
            <td width='25%'>
                <table border='1' width='100%'>
                    <tr>
                        <td colspan='4' style='font-size:30pt' align='center'>Return</td>
                    </tr>
                    <tr>
                        <td></td><td><center>←</center></td><td><center>↓</center></td><td>EVOL</td>
                    </tr>
                    <tr>	
                        <td width='25%'>NB items</td> 				
                        <td width='25%'>".$d["RETURN_NBITEM_YES"]."</td>                        
                        <td width='25%'>".$d["RETURN_NBITEM_TOD"]."</td>    
                        <td width='25%'>".EV($d["RETURN_NBITEM_YES"],$d["RETURN_NBITEM_TOD"])."</td>                                                                    
                    </tr>

                    <tr>
                        <td>Sum Items</td>					
                        <td>".$d["RETURN_SUMITEM_YES"]."</td> 
                        <td>".$d["RETURN_SUMITEM_TOD"]."</td>    
                        <td width='25%'>".EV($d["RETURN_SUMITEM_YES"],$d["RETURN_SUMITEM_TOD"])."</td>                         
                    </tr>

                    <tr>
                    
                        <td>Amount</td>					
                        <td>".$d["RETURN_AMOUNT_YES"]."</td>                          
                        <td>".$d["RETURN_AMOUNT_TOD"]."</td>  
                        <td width='25%'>".EV($d["RETURN_AMOUNT_YES"],$d["RETURN_AMOUNT_TOD"])."</td>
                    </tr>

                    <tr>
                        <td>SEE</td>
                        <td>".DLX("RETURN_ITEMS_YES")."</td>
                        <td>".DLX("RETURN_ITEMS_TOD")."</td>
                        <td></td>
                    </tr>
                </table>
            </td>

            <td width='25%' align='center'>
                <table border='1' width='100%'>      
                    <tr>
                        <td width='100%' colspan='4' style='font-size:30pt' align='center'>Waste</td>
                    </tr>              
                    <tr>
                        <td></td><td><center>←</center></td><td><center>↓</center></td><td>EVOL</td>
                    </tr>
                    <tr>		
                        <tr>
                            <td width='25%'>NB items</td>
                            <td width='25%'>".$d["WASTE_NBITEMS_YES"]."</td>
                            <td width='25%'>".$d["WASTE_NBITEMS_TOD"]."</td>
                            <td width='25%'>".EV($d["WASTE_NBITEMS_YES"],$d["WASTE_NBITEMS_TOD"])."</td>                            
                        </tr>

                        <tr>
                            <td>Quantity items</td>
                            <td>".$d["WASTE_QTY_YES"]."</td>
                            <td>".$d["WASTE_QTY_TOD"]."</td>
                            <td>".EV($d["WASTE_NBITEMS_YES"],$d["WASTE_QTY_TOD"])."</td>
                        </tr>

                        <tr>
                            <td>Sum</td>
                            <td>".$d["WASTE_SUM_YES"]."</td>
                            <td>".$d["WASTE_SUM_TOD"]."</td>
                            <td>".EV($d["WASTE_NBITEMS_YES"],$d["WASTE_NBITEMS_TOD"])."</td>
                        </tr> 
                        <tr>
                            <td>SEE</td>
                            <td>".DLX("WASTE_ITEMS_YES")."</td>
                            <td>".DLX("WASTE_ITEMS_TOD")."</td>
                            <td></td>
                        </tr>
                                                       
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <td><center>
                
            </center>
            </td>

        </tr>
		
    </table>
</center>
</html>";
    return $display;
}	 


echo renderStats();


?>