<?php
header("refresh: 30;");
?>
<?php


function getInternalDatabase()
{
    $host = '119.82.252.226';
	$db   = 'PPSS_STATS';
	$user = 'sovi';
	$pass = 'pied2porc';
	$port = "3306";
	$charset = 'utf8mb4';

	$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
	try {
    	 $pdo = new \PDO($dsn, $user, $pass, $options);
	} catch (\PDOException $e) {
     	throw new \PDOException($e->getMessage(), (int)$e->getCode());
		return null;
	}
	return $pdo;
}


function getInternalDatabase2()
{
	$host = '119.82.252.226';
	$db   = 'PPSS';
	$user = 'sovi';
	$pass = 'pied2porc';
	$port = "3306";
	$charset = 'utf8mb4';

	$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
	try {
    	 $pdo = new \PDO($dsn, $user, $pass, $options);
	} catch (\PDOException $e) {
     	throw new \PDOException($e->getMessage(), (int)$e->getCode());
		return null;
	}
	return $pdo;
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
    if ($yesterdayNum == $todayNum)
        return "<p style='color:yellow'>SAME</p>";

    if ($yesterdayNum == "0" || $yesterdayNum == 0)
        $percent = (($todayNum - $yesterdayNum) / 1);            
    else
        $percent = (($todayNum - $yesterdayNum) / $yesterdayNum) * 100;    
    $percent = round($percent,2);

    if ($invert == true){
        if ($percent > 0)    
            return "<p style='color:#8b0000'>+".$percent."%</p>";
        else if ($percent < 0)    
            return "<p style='color:lightgreen'>".$percent."%</p>";
    }else{
        if ($percent > 0)    
            return "<p style='color:lightgreen'>+".$percent."%</p>";
        else if ($percent < 0)    
            return "<p style='color:#8b0000'>".$percent."%</p>";
    }
    
    

}

function DLX($action)
{
    return "<a target='_blank' href='details.php?ACTION=".$action."'><img height='25px' src='img/eye.png'></a>";
}

function renderSign($sign)
{
    $db = getInternalDatabase2();
    if ($sign == "RAT"){
        $teamid = "1";
        $render = "<img height='50' src='img/signRat.png'><br>";
    }else if ($sign == "OX"){
        $teamid = "2";
        $render = "<img height='50' src='img/signOx.png'><br>";
    }else if ($sign == "TIGER"){
        $teamid = "3";
        $render = "<img height='50' src='img/signTiger.png'><br>";
    }else if ($sign == "HARE"){
        $teamid = "4";
        $render = "<img height='50' src='img/signHare.png'><br>";
    }else if ($sign == "DRAGON"){
        $teamid = "5";
        $render = "<img height='50' src='img/signDragon.png'><br>";
    }else if ($sign == "SNAKE"){
        $teamid = "6";
        $render = "<img height='50' src='img/signSnake.png'><br>";
    }else if ($sign == "HORSE"){
        $teamid = "7";
        $render = "<img height='50' src='img/signHorse.png'><br>";
    }else if ($sign == "GOAT"){
        $teamid = "8";
        $render = "<img height='50' src='img/signGoat.png'><br>";
    }
    $sql = "SELECT ID FROM USER where team_id = ?";
    $req = $db->prepare($sql);
    $req->execute(array($teamid));
    $pictures = $req->fetchAll();
    $render .= "<hr>";
    foreach($pictures as $picture){
        $render .= "<img height='50px'   src='http://phnompenhsuperstore.com/api/img/employee/".$picture["ID"].".jpg'>";
    }
    return $render;
}


function renderStats()
{
    $today = date('Y-m-d');	
	$db = getInternalDatabase("STATS");
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
    //$d["TRF_GOAT_YES"] = json_decode($d["TRF_GOAT_YES"] ,true);
    $d["TRF_HORSE_YES"] = json_decode($d["TRF_HORSE_YES"] ,true);

    $d["TRF_ALL_TOD"] = json_decode($d["TRF_ALL_TOD"] ,true);
    $d["TRF_RAT_TOD"] = json_decode($d["TRF_RAT_TOD"] ,true);
    $d["TRF_OX_TOD"] = json_decode($d["TRF_OX_TOD"] ,true);
    $d["TRF_TIGER_TOD"] = json_decode($d["TRF_TIGER_TOD"] ,true);
    $d["TRF_HARE_TOD"] = json_decode($d["TRF_HARE_TOD"] ,true);
    $d["TRF_SNAKE_TOD"] = json_decode($d["TRF_SNAKE_TOD"] ,true);
    $d["TRF_DRAGON_TOD"] = json_decode($d["TRF_DRAGON_TOD"] ,true);
    //$d["TRF_GOAT_TOD"] = json_decode($d["TRF_GOAT_TOD"] ,true);
    $d["TRF_HORSE_TOD"] = json_decode($d["TRF_HORSE_TOD"] ,true);


	$display = "
<html style='background-color:#009183;color:white'>    
	<center>

    <h1>".date("d/m/Y")."</h1><br>
    Last updated : (".$d["UPDATED"].")
    	
    <table  width='98%' > 
        <tr valign='top'>
            <td align='center' width='25%'>
                <table border='1' height='100%'>           
                    <tr align='center'>
                        <td colspan='6' style='font-size:20pt'>GENERAL</td>                        
                    </tr>    
                    <tr>
                        <td></td><td colspan='2' ><center>Yesterday</center></td><td colspan='2'><center>Today</center></td><td><center>EV</center></td>
                    </tr>    
                    <tr>
                        <td>Traffic</td>
                        <td colspan='2' align='center'>".$d["TRAFFIC_YES"]."</td>
                        <td colspan='2' align='center'>".$d["TRAFFIC_TOD"]."</td>
                        <td align='center'> ".EV($d["TRAFFIC_YES"],$d["TRAFFIC_TOD"])." </td>
                    </tr>        
                    <tr>
                        <td>Average Sale Basket</td>
                        <td colspan='2' align='center'>".$d["AVGBASKET_YES"]."</td>
                        <td colspan='2' align='center'>".$d["AVGBASKET_TOD"]."</td>
                        <td align='center'> ".EV($d["AVGBASKET_YES"],$d["AVGBASKET_TOD"])."</td>
                    </tr>    
                    <tr>
                        <td width='25%'>Unsold items 30</td>
                        <td width='10%' colspan='2' align='center'>".$d["UNSOLD30_ITEMS_CNT_YES"]."</td>                        
                        <td width='10%' align='center'>".$d["UNSOLD30_ITEMS_CNT_TOD"]."</td>
                        <td width='10%' align='center'>".DLX("UNSOLD30_ITEMS_TOD")."</td>
                        <td width='10%' align='center'>".EV($d["UNSOLD30_ITEMS_CNT_YES"],$d["UNSOLD30_ITEMS_CNT_TOD"],true)."</td>
                    </tr>
                    
                    <tr>
                        <td>No Picture items</td>
                        <td colspan='2' align='center'>".$d["NOPICTURE_ITEMS_CNT_YES"]."</td>                        
                        <td align='center'>".$d["NOPICTURE_ITEMS_CNT_TOD"]."</td>
                        <td align='center'>".DLX("NOPICTURE_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["NOPICTURE_ITEMS_CNT_YES"],$d["NOPICTURE_ITEMS_CNT_TOD"],true)."</td>
                    </tr>
                                
                    <tr>
                        <td>No Loc items</td>
                        <td colspan='2' align='center'>".$d["NOLOC_ITEMS_CNT_YES"]."</td>                        
                        <td align='center'>".$d["NOLOC_ITEMS_CNT_TOD"]."</td>
                        <td align='center'>".DLX("NOLOC_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["NOLOC_ITEMS_CNT_YES"],$d["NOLOC_ITEMS_CNT_TOD"],true)."</td>
                    </tr>
                        
                    <tr>
                        <td>Cost Zero items</td>
                        <td colspan='2' align='center'>".$d["COSTZERO_YES"]."</td>                        
                        <td align='center'>".$d["COSTZERO_TOD"]."</td>
                        <td align='center'>".DLX("COSTZERO_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["COSTZERO_YES"],$d["COSTZERO_TOD"],true)."</td>
                    </tr>
                    
                    <tr>
                        <td>Zero sale items</td>
                        <td colspan='2' align='center'>".$d["ZEROSALE_YES"]."</td>                        
                        <td align='center'>".$d["ZEROSALE_TOD"]."</td>
                        <td align='center'>".DLX("ZEROSALE_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["ZEROSALE_YES"],$d["ZEROSALE_TOD"],true)."</td>
                    </tr>
                    
                    <tr>
                        <td>Low Profit</td>
                        <td colspan='2' align='center'>".$d["LOWPROFIT_YES"]."</td>                        
                        <td align='center'>".$d["LOWPROFIT_TOD"]."</td>
                        <td align='center'>".DLX("LOWPROFIT_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["LOWPROFIT_YES"],$d["LOWPROFIT_TOD"],true)."</td>
                    </tr>                                
                </table>
            </td>

            <td align='center' width='25%'>
                <table border='1' height='100%'>        
                    <tr align='center' >
                        <td colspan='6' style='font-size:20pt'>ALERT</td>                        
                    </tr>
                    
                    <tr>
                        <td></td><td colspan='2' ><center>Yesterday</center></td><td colspan='2'><center>Today</center></td><td><center>EV</center></td>
                    </tr>            
                    
                    <tr>
                        <td width='25%'> Negative items WH1</td>
                        <td align='center' width='10%' colspan='2'>".$d["NEGATIVEITEM_WH1_CNT_YES"]."</td>                        
                        <td align='center' width='10%'>".$d["NEGATIVEITEM_WH1_CNT_TOD"]."</td>
                        <td align='center' width='10%'>".DLX("NEGATIVEITEM_WH1_ITEMS_TOD")."</td>            
                        <td align='center' width='10%'>".EV($d["NEGATIVEITEM_WH1_CNT_YES"],$d["NEGATIVEITEM_WH1_CNT_TOD"],true)."</td>            
                    </tr>        
                    
                    <tr>
                        <td> Negative items WH2 </td>
                        <td align='center' colspan='2'>".$d["NEGATIVEITEM_WH2_CNT_YES"]."</td>                        
                        <td align='center'>".$d["NEGATIVEITEM_WH2_CNT_TOD"]."</td>
                        <td align='center'>".DLX("NEGATIVEITEM_WH2_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["NEGATIVEITEM_WH2_CNT_YES"],$d["NEGATIVEITEM_WH2_CNT_TOD"],true)."</td>            
                    </tr>
                    
                    <tr>
                        <td>Negative items FRESH</td>
                        <td colspan='2' align='center'>".$d["NEGATIVEITEM_FRESH_CNT_YES"]."</td>                        
                        <td align='center'>".$d["NEGATIVEITEM_FRESH_CNT_TOD"]."</td>
                        <td align='center'>".DLX("NEGATIVEITEM_FRESH_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["NEGATIVEITEM_FRESH_CNT_YES"],$d["NEGATIVEITEM_FRESH_CNT_TOD"],true)."</td>            
                    </tr>        
                    
                    <tr>
                        <td>Expire Returns items</td>
                        <td align='center' colspan='2'>".$d["EXPIRE_RET_CNT_YES"]."</td>                        
                        <td align='center'>".$d["EXPIRE_RET_CNT_TOD"]."</td>
                        <td align='center'>".DLX("EXPIRE_RET_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["EXPIRE_RET_CNT_YES"],$d["EXPIRE_RET_CNT_TOD"])."</td>            
                    </tr>        
                    
                    <tr>
                        <td>Expire NoReturns items</td>
                        <td align='center' colspan='2'>".$d["EXPIRE_NR_CNT_YES"]."</td>                        
                        <td align='center'>".$d["EXPIRE_NR_CNT_TOD"]."</td>
                        <td align='center'>".DLX("EXPIRE_NR_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["EXPIRE_NR_CNT_YES"],$d["EXPIRE_NR_CNT_TOD"])."</td>
                    </tr>        
                    
                    <tr>
                        <td>Need move items</td>
                        <td align='center' colspan='2'>".$d["NEEDMOVE_CNT_YES"]."</td>                        
                        <td align='center'>".$d["NEEDMOVE_CNT_TOD"]."</td>
                        <td align='center'>".DLX("NEEDMOVE_ITEMS_TOD")."</td>
                        <td align='center'>".EV($d["NEEDMOVE_CNT_YES"],$d["NEEDMOVE_CNT_TOD"])."</td>
                    </tr>
                                                    
                </table>
            </td>

            <td align='center' width='25%'>
                <table border='1' width='100%'>
                        <tr>
                            <td colspan='6' style='font-size:20pt' align='center'>PURCHASING</td>
                        </tr>
                        <tr>
                            <td></td><td colspan='2'><center>Yesterday</center></td><td colspan='2'><center>Today</center></td><td>EVOL</td>
                        </tr>

                        <tr>
                            <td width='25%'>NB PO Created</td>
                            <td width='25%' align='center' colspan='2'>".$d["POCREATED_YES"]."</td>
                            <td width='25%' align='center' colspan='2'>".$d["POCREATED_TOD"]."</td>
                            <td width='25%' align='center'>".EV($d["POCREATED_YES"],$d["POCREATED_TOD"])."</td>
                        </tr>

                        <tr>
                            <td>NB Item Ordered</td>        
                            <td colspan='2' align='center'>".$d["NBITEMORDERED_YES"]."</td>
                            <td colspan='2' align='center'>".$d["NBITEMORDERED_TOD"]."</td>
                            <td width='25%' align='center'>".EV($d["NBITEMORDERED_YES"],$d["NBITEMORDERED_TOD"])."</td>
                        </tr>

                        <tr>
                            <td>Qty Item ordered</td>        
                            <td colspan='2' align='center'>".$d["QTYITEMORDERED_YES"]."</td>
                            <td colspan='2' align='center'>".$d["QTYITEMORDERED_TOD"]."</td>   
                            <td width='25%' align='center'>".EV($d["QTYITEMORDERED_YES"],$d["QTYITEMORDERED_TOD"])."</td>                 
                        </tr>	
                                        
                        <tr>        
                            <td>PriceDifferences -7days</td>
                            <td colspan='2' align='center'>".$d["PRICEDIFFERENCES_ITEMS_CNT_YES"]."</td>
                            <td align='center'>".$d["PRICEDIFFERENCES_ITEMS_CNT_TOD"]."</td><td>".DLX("PRICEDIFFERENCES_ITEMS_TOD")."</td>
                            <td width='25%' align='center'>".EV($d["PRICEDIFFERENCES_ITEMS_CNT_YES"],$d["PRICEDIFFERENCES_ITEMS_CNT_TOD"],true)."</td>
                        </tr>
                        <tr>
                            <td>Anomalies</td>
                            <td colspan='2' align='center'>".$d["ANOMALIES_ITEMS_CNT_YES"]."</td>
                            <td align='center'>".$d["ANOMALIES_ITEMS_CNT_TOD"]."</td><td>".DLX("PRICEDIFFERENCES_ITEMS_TOD")."</td>                    
                            <td width='25%' align='center'>".EV($d["ANOMALIES_ITEMS_CNT_YES"],$d["ANOMALIES_ITEMS_CNT_TOD"],true)."</td>
                        </tr>
                        </tr>
                </table><br>
                             
            </td>

            <td align='center' width='25%'>
                <table border='1'>
                    <tr>
                        <td colspan='4' style='font-size:20pt' align='center'>RECEIVE</td>
                    </tr>
                    <tr>
                        <td></td><td><center>Yesterday</center></td><td><center>Today</center></td><td>EVOL</td>
                    </tr>

                    <tr>
                        <td '>NB PO Received</td>
                        <td >".$d["PORECEIVED_YES"]."</td>
                        <td >".$d["PORECEIVED_TOD"]."</td>
                        <td >".EV($d["PORECEIVED_YES"],$d["PORECEIVED_TOD"])."</td>                        
                    </tr>

                    <tr >
                        <td>Nb ItemReceived</td>    
                        <td>".$d["NBITEMRECEIVED_YES"]."</td>
                        <td>".$d["NBITEMRECEIVED_TOD"]."</td>
                        <td width='25%'>".EV($d["NBITEMRECEIVED_YES"],$d["NBITEMRECEIVED_TOD"])."</td>                          
                    </tr>

                    <tr >         
                        <td>Item Quantity Received</td>      
                        <td>".$d["ITEMQTYRECEIVED_YES"]."</td>                                
                        <td>".$d["ITEMQTYRECEIVED_TOD"]."</td>
                        <td width='25%'>".EV($d["ITEMQTYRECEIVED_YES"],$d["ITEMQTYRECEIVED_TOD"])."</td>                        
                    </tr> 
                    
                                        
                </table>   
            </td>
        
        </tr>        
    </table><br>

    <table>
        <tr>
            <td width='75%'>
                <table border='1' >
                    <tr align='center'>
                            <td></td>        
                            <td colspan='5'>".renderSign("RAT")."</td>                
                            <td colspan='5'>".renderSign("OX")."</td>                
                            <td colspan='5'>".renderSign("TIGER")."</td>
                            <td colspan='5'>".renderSign("HARE")."</td>            
                    </tr>
                    <tr>
                            <td width='4%'></td>  
                            <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%'  colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                            <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                            <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                            <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>                
                    <tr>
                    <tr align='center'>
                        <td>Transfer NB items</td>            
                        <td width='4%'>".($d["TRF_RAT_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_RAT_ITEMS_YES")."</td><td width='4%'>".($d["TRF_RAT_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_RAT_ITEMS_TOD")."</td><td>".EV($d["TRF_RAT_YES"]["NBITEM"] ?? 0,$d["TRF_RAT_TOD"]["NBITEM"] ?? 0)."</td>
                        <td width='4%'>".($d["TRF_OX_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_OX_ITEMS_YES")."</td><td width='4%'>".($d["TRF_OX_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_OX_ITEMS_TOD")."</td><td>".EV($d["TRF_OX_YES"]["NBITEM"] ?? 0,$d["TRF_OX_TOD"]["NBITEM"] ?? 0)."</td>
                        <td width='4%'>".($d["TRF_TIGER_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_TIGER_ITEMS_YES")."</td><td width='4%'>".($d["TRF_TIGER_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_TIGER_ITEMS_TOD")."</td><td>".EV($d["TRF_TIGER_YES"]["NBITEM"] ?? 0,$d["TRF_TIGER_TOD"]["NBITEM"] ?? 0)."</td>
                        <td width='4%'>".($d["TRF_HARE_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_HARE_ITEMS_YES")."</td><td width='4%'>".($d["TRF_HARE_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_HARE_ITEMS_TOD")."</td><td>".EV($d["TRF_HARE_YES"]["NBITEM"] ?? 0,$d["TRF_HARE_TOD"]["NBITEM"] ?? 0)."</td>            
                    </tr>
            
                    <tr align='center'>
                        <td>Transfer Qty items</td>            
                        <td>".($d["TRF_RAT_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_RAT_ITEMS_YES")."</td><td>".($d["TRF_RAT_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_RAT_ITEMS_TOD")."</td><td>".EV($d["TRF_RAT_YES"]["QUANTITY"] ?? 0,$d["TRF_RAT_TOD"]["QUANTITY"] ?? 0)."</td>
                        <td>".($d["TRF_OX_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_OX_ITEMS_YES")."</td><td>".($d["TRF_OX_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_OX_ITEMS_TOD")."</td><td>".EV($d["TRF_OX_YES"]["QUANTITY"] ?? 0,$d["TRF_OX_TOD"]["QUANTITY"] ?? 0)."</td>
                        <td>".($d["TRF_TIGER_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_TIGER_ITEMS_YES")."</td><td>".($d["TRF_TIGER_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_TIGER_ITEMS_TOD")."</td><td>".EV($d["TRF_TIGER_YES"]["QUANTITY"] ?? 0,$d["TRF_TIGER_TOD"]["QUANTITY"] ?? 0)."</td>
                        <td>".($d["TRF_HARE_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_HARE_ITEMS_YES")."</td><td>".($d["TRF_HARE_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_HARE_ITEMS_TOD")."</td><td>".EV($d["TRF_HARE_YES"]["QUANTITY"] ?? 0,$d["TRF_HARE_TOD"]["QUANTITY"] ?? 0)."</td>            
                    </tr>
                    
                    <tr align='center'>
                        <td>Sale Nb Items</td>            
                        <td>".$d["SALE_RAT_YES"]."</td><td>".DLX("SALE_RAT_ITEMS_YES")."</td><td>".$d["SALE_RAT_TOD"]."</td><td>".DLX("SALE_RAT_ITEMS_TOD")."</td></a></td><td>".EV($d["SALE_RAT_YES"],$d["SALE_RAT_TOD"])."</td>
                        <td>".$d["SALE_OX_YES"]."</td><td>".DLX("SALE_OX_ITEMS_YES")."</td></td><td>".$d["SALE_OX_TOD"]."</td><td>".DLX("SALE_OX_ITEMS_TOD")."</td><td>".EV($d["SALE_OX_YES"],$d["SALE_OX_TOD"])."</td>
                        <td>".$d["SALE_TIGER_YES"]."</td><td>".DLX("SALE_TIGER_ITEMS_YES")."</td></td><td>".$d["SALE_TIGER_TOD"]."</td><td>".DLX("SALE_TIGER_ITEMS_TOD")."</a></td><td>".EV($d["SALE_OX_YES"],$d["SALE_OX_TOD"])."</td>
                        <td>".$d["SALE_HARE_YES"]."</td><td>".DLX("SALE_HARE_ITEMS_YES")."</td></td><td>".$d["SALE_HARE_TOD"]."</td><td>".DLX("SALE_HARE_ITEMS_TOD")."</td><td>".EV($d["SALE_HARE_YES"],$d["SALE_HARE_TOD"])."</td>            
                    </tr>
            
                    
                    <tr align='center'>
                        <td>Occupancy</td>            
                        <td>".$d["OCC_RAT_YES"]."</td><td>N/A</td><td>".$d["OCC_RAT_TOD"]."</td><td>".DLX("OCC_RAT_ITEMS_TOD")."</td><td>".EV($d["OCC_RAT_YES"],$d["OCC_RAT_TOD"],true)."</td>
                        <td>".$d["OCC_OX_YES"]."</td><td>N/A</td><td>".$d["OCC_OX_TOD"]."</td><td>".DLX("OCC_OX_ITEMS_TOD")."</td><td>".EV($d["OCC_OX_YES"],$d["OCC_OX_TOD"],true)."</td>
                        <td>".$d["OCC_TIGER_YES"]."</td><td>N/A</td><td>".$d["OCC_TIGER_TOD"]."</td><td>".DLX("OCC_TIGER_ITEMS_TOD")."</td><td>".EV($d["OCC_TIGER_YES"],$d["OCC_TIGER_TOD"],true)."</td>
                        <td>".$d["OCC_HARE_YES"]."</td><td>N/A</td><td>".$d["OCC_HARE_TOD"]."</td><td>".DLX("OCC_HARE_ITEMS_TOD")."</td><td>".EV($d["OCC_HARE_YES"],$d["OCC_HARE_TOD"],true)."</td>            
                    </tr>       
                </table><br>
                <table border='1' >
                    <tr align='center'>
                            <td></td>                            
                            <td colspan='5'>".renderSign("SNAKE")."</td>            
                            <td colspan='5'>".renderSign("DRAGON")."</td>                                       
                            <td colspan='5'>".renderSign("HORSE")."</td>                
                    </tr>
                    <tr>
                         <td width='4%'></td>                      
                         <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                         <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                         <td width='5%' colspan='2'><center>Yesterday</center></td><td width='5%' colspan='2'><center>Today</center></td><td width='2%'>EV</td>
                    <tr>
                    <tr align='center'>
                        <td>Transfer NB items</td>                            
                        <td width='4%'>".($d["TRF_SNAKE_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_SNAKE_ITEMS_YES")."</td><td width='4%'>".($d["TRF_SNAKE_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_SNAKE_ITEMS_TOD")."</td><td>".EV($d["TRF_SNAKE_YES"]["NBITEM"] ?? 0,$d["TRF_SNAKE_TOD"]["NBITEM"] ?? 0)."</td>
                        <td width='4%'>".($d["TRF_DRAGON_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_DRAGON_ITEMS_YES")."</td><td width='4%'>".($d["TRF_DRAGON_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_DRAGON_ITEMS_TOD")."</td><td>".EV($d["TRF_DRAGON_YES"]["NBITEM"] ?? 0,$d["TRF_DRAGON_TOD"]["NBITEM"] ?? 0)."</td>                        
                        <td width='4%'>".($d["TRF_HORSE_YES"]["NBITEM"] ?? "N/A")."</td><td width='1%'>".DLX("TRF_HORSE_ITEMS_YES")."</td><td width='4%'>".($d["TRF_HORSE_TOD"]["NBITEM"] ?? "N/A")."</td><td>".DLX("TRF_HORSE_ITEMS_TOD")."</td><td>".EV($d["TRF_HORSE_YES"]["NBITEM"] ?? 0,$d["TRF_HORSE_TOD"]["NBITEM"] ?? 0)."</td>            
                    </tr>
                
                    <tr align='center'>
                        <td>Transfer Qty items</td>                            
                        <td>".($d["TRF_SNAKE_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_SNAKE_ITEMS_YES")."</td><td>".($d["TRF_SNAKE_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_SNAKE_ITEMS_TOD")."</td><td>".EV($d["TRF_SNAKE_YES"]["QUANTITY"] ?? 0,$d["TRF_SNAKE_TOD"]["QUANTITY"] ?? 0)."</td>
                        <td>".($d["TRF_DRAGON_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_DRAGON_ITEMS_YES")."</td><td>".($d["TRF_DRAGON_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_DRAGON_ITEMS_TOD")."</td><td>".EV($d["TRF_DRAGON_YES"]["QUANTITY"] ?? 0,$d["TRF_DRAGON_TOD"]["QUANTITY"] ?? 0)."</td>                        
                        <td>".($d["TRF_HORSE_YES"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_HORSE_ITEMS_YES")."</td><td>".($d["TRF_HORSE_TOD"]["QUANTITY"] ?? "N/A")."</td><td>".DLX("TRF_HORSE_ITEMS_TOD")."</td><td>".EV($d["TRF_HORSE_YES"]["QUANTITY"] ?? 0,$d["TRF_HORSE_TOD"]["QUANTITY"] ?? 0)."</td>
                    </tr>
                    
                
                    <tr align='center'>
                        <td>Sale Nb Items</td>                            
                        <td>".$d["SALE_SNAKE_YES"]."</td><td>".DLX("SALE_SNAKE_ITEMS_YES")."</td></td><td>".$d["SALE_SNAKE_TOD"]."</td><td>".DLX("SALE_SNAKE_ITEMS_TOD")."</td><td>".EV($d["SALE_SNAKE_YES"],$d["SALE_SNAKE_TOD"])."</td>
                        <td>".$d["SALE_DRAGON_YES"]."</td><td>".DLX("SALE_DRAGON_ITEMS_YES")."</td></td><td>".$d["SALE_DRAGON_TOD"]."</td><td>".DLX("SALE_DRAGON_ITEMS_TOD")."</td><td>".EV($d["SALE_DRAGON_YES"],$d["SALE_DRAGON_TOD"])."</td>
                        <td>".$d["SALE_HORSE_YES"]."</td><td>".DLX("SALE_HORSE_ITEMS_YES")."</td></td><td>".$d["SALE_HORSE_TOD"]."</td><td>".DLX("SALE_HORSE_ITEMS_TOD")."</td><td>".EV($d["SALE_HORSE_YES"],$d["SALE_HORSE_TOD"])."</td>
                    </tr>
                
                    
                    <tr align='center'>
                        <td>Occupancy</td>                            
                        <td>".$d["OCC_SNAKE_YES"]."</td><td>N/A</td><td>".$d["OCC_SNAKE_TOD"]."</td><td>".DLX("OCC_SNAKE_ITEMS_TOD")."</td><td>".EV($d["OCC_SNAKE_YES"],$d["OCC_SNAKE_TOD"],true)."</td>
                        <td>".$d["OCC_DRAGON_YES"]."</td><td>N/A</td><td>".$d["OCC_DRAGON_TOD"]."</td><td>".DLX("OCC_DRAGON_ITEMS_TOD")."</td><td>".EV($d["OCC_DRAGON_YES"],$d["OCC_DRAGON_TOD"],true)."</td>                        
                        <td>".$d["OCC_HORSE_YES"]."</td><td>N/A</td><td>".$d["OCC_HORSE_TOD"]."</td><td>".DLX("OCC_HORSE_ITEMS_TOD")."</td><td>".EV($d["OCC_HORSE_YES"],$d["OCC_HORSE_TOD"],true)."</td>
                    </tr>       
                </table>
            </td>                        
            <td width='25%'>
                <table border='1' width='100%'>
                    <tr>
                        <td colspan='4' style='font-size:20pt' align='center'>RETURN</td>
                    </tr>
                    <tr>
                        <td></td><td><center>Yesterday</center></td><td><center>Today</center></td><td>EVOL</td>
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
                </table><br>
                <table border='1' width='100%'>      
                    <tr>
                        <td width='100%' colspan='4' style='font-size:20pt' align='center'>WASTE</td>
                    </tr>              
                    <tr>
                        <td></td><td><center>Yesterday</center></td><td><center>Today</center></td><td>EVOL</td>
                    </tr>
                    <tr>		
                        <tr>
                            <td >NB items</td>
                            <td >".$d["WASTE_NBITEMS_YES"]."</td>
                            <td >".$d["WASTE_NBITEMS_TOD"]."</td>
                            <td >".EV($d["WASTE_NBITEMS_YES"],$d["WASTE_NBITEMS_TOD"],true)."</td>                            
                        </tr>

                        <tr>
                            <td>Quantity items</td>
                            <td>".$d["WASTE_QTY_YES"]."</td>
                            <td>".$d["WASTE_QTY_TOD"]."</td>
                            <td>".EV($d["WASTE_QTY_YES"],$d["WASTE_QTY_TOD"],true)."</td>
                        </tr>

                        <tr>
                            <td>Sum</td>
                            <td>".$d["WASTE_SUM_YES"]."</td>
                            <td>".$d["WASTE_SUM_TOD"]."</td>
                            <td>".EV($d["WASTE_SUM_YES"],$d["WASTE_SUM_TOD"],true)."</td>
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
        
		    
</center></html>";
    return $display;
}	 


echo renderStats();


?>