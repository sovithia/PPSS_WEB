<?php 

require_once("functions.php");

ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');

// Once Per Month 
function AddAnnualLeave(){
    $db = getInternalDatabase();
    $sql = "UPDATE USER SET RESTCREDIT = RESTCREDIT + 12";
    $req = $db->prepare($sql);
    $req->execute(array());

}

// Once Every Day Except Tuesday
function ScanPack(){
    $db = getDatabase();
    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack)
    {
        // CHECK IF PRICE IS IRREGULAR
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res2 = $req->fetch(PDO::FETCH_ASSOC);   
        if ($res2 == false){
            echo "Price not found for ".$pack["PRODUCTID"]."\n";
            continue;
        }
        $UNITPRICE = $res2["PRICE"];        
        $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        

        $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
        $req = $db->prepare($sql); 
        $req->execute(array($pack["PACK_CODE"]));
        $res3 = $req->fetch(PDO::FETCH_ASSOC); 
        $currentPrice = $res3["SALEPRICE"];    

        $calculatedIrregular = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
        $calculatedNormalPromo = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.9,4);                

        if (floatval($currentPrice) != floatval($fullPrice) &&
            floatval($currentPrice) != floatval($calculatedIrregular) && 
            floatval($currentPrice) != floatval($calculatedNormalPromo)            
            ){// WE LEAVE IRREGULAR PRICE UNTOUCHED
            echo "Skip for ".$pack["PRODUCTID"];
            continue;
        }

        $sql = "SELECT DISCOUNT_TYPE,DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = ? AND GETDATE() < DATETO ";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);                      
        if($res == false) // Check if there is a promotion
        {             
                // IF NO PROMO, 10% DISC ON PRICE                                                                    
            $calculated = round((($UNITPRICE * $pack["SALEFACTOR"]) * 0.9),4);                
            if (floatval($pack["SALEPRICE"]) != $calculated){
                echo "SETTING 10% DISC FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR) * 0.9), DATEADD = GETDATE() WHERE PACK_CODE = ?";
                $req = $db->prepare($sql);
                $req->execute(array($UNITPRICE,$pack["PACK_CODE"])); 
            }                        
        }
        else
        {                   
            // FULL PRICE      
        
            $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        
            $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
            $req = $db->prepare($sql); 
            $req->execute(array($pack["PACK_CODE"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);    
            $currentPrice = $res["SALEPRICE"];                                
            // We don't apply only 3% discount
            $calculated = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
            if (floatval($pack["SALEPRICE"]) != $calculated){
                echo "SETTING FULL PRICE FOR ".$pack["PACK_CODE"].":".$calculated."\n";
                $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ?, DATEADD = GETDATE() WHERE PACK_CODE = ?";
                $req = $db->prepare($sql);
                $req->execute(array($calculated,$pack["PACK_CODE"])); 
            }
        }
        
    } 
}

function ResetPack(){  // ON TUESDAY 23:59
    $db = getDatabase();
    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT";
    $req = $db->prepare($sql);
    $req->execute(array());
    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($packs as $pack){
        
        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($pack["PRODUCTID"]));
        $res2 = $req->fetch(PDO::FETCH_ASSOC);
        if ($res2 != false){
            $UNITPRICE = $res2["PRICE"];        
            $calculated = round(($UNITPRICE * $pack["SALEFACTOR"]),4);  
        
            if ($calculated != $pack["SALEPRICE"])// Skip on irregular price.
                continue;
            //echo "CURR:".floatval($pack["SALEPRICE"])."|EXP:".$calculated."\n";            
            echo "SETTING FULL PRICE FOR ".$pack["PACK_CODE"].":".$calculated."\n";
            $sql = "UPDATE ICPRODUCT_SALEUNIT SET SALEPRICE = ((? * SALEFACTOR)), DATEADD = GETDATE() WHERE PACK_CODE = ?";
            $req = $db->prepare($sql);
            $req->execute(array($UNITPRICE,$pack["PACK_CODE"]));                     
        }
               
    }
}

function LogToDB($text){
    $db = getInternalDatabase();
    $sql = "INSERT INTO LOGMESSAGE (MSG) VALUES (?)";
    $req = $db->prepare($sql);
    $req->execute(array($text));
    $db = null;

}

// Once Every 5 minutes
function ScanPriceChange(){
    $indb = getInternalDatabase();
    $db = getDatabase();
    $sql = "SELECT * FROM RS_PRICECHANGE_QUEUE";    
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll();
    $excludeCategories = array(
        'BEEF',
        'DRY FRUITS',
        'DRY MEAT',
        'DRY SAUSAGE',
        'DRY VEGETABLES',
        'EGGS',
        'FISH',
        'FOOD SET',
        'FRESH FRUITS',
        'FRESH NOODLE|RICE NOODLE',
        'FRESH TOFU',
        'FRESH VEGETABLE',
        'GIBLETS',
        'MEATBALLS',
        'ORGANIC FRUITS',
        'ORGANIC VEGETABLE',
        'OTHER(ORGANIC VEG|FRUIT)',
        'OTHER(VEGETABLES|FRUITS)',
        'POULTRY',
        'SEAFOOD',
        'SEALED TOFU',
        'SEALED VEGETABLES'
    );
    echo "Items count: ". count($items)."\n";
    $i = 0;
    foreach($items as $item){
        if (floatval($item["NEWCOST"]) == floatval($item["OLDCOST"]))
            continue;
        $i++;        
        $sql = "SELECT CATEGORYID FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $category = $req->fetch(PDO::FETCH_ASSOC);
        if ($category == false){
            echo "category false\n";
            continue;        
        }            
        if (in_array($category["CATEGORYID"],$excludeCategories)){
            if (floatval($item["NEWCOST"]) > floatval($item["OLDCOST"]) &&  ((floatval($item["NEWCOST"]) - floatval($item["OLDCOST"])) > 0.05) )
            {
                $sql = "SELECT TOP 1 TRANCOST FROM PODETAIL WHERE PRODUCTID = ? ORDER BY RECEIVE_DATE DESC";
                $req = $db->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $tmpdata = $req->fetch(PDO::FETCH_ASSOC);
                if ($tmpdata == false)
                    continue;                
                if ($item["NEWCOST"] == $tmpdata["TRANCOST"])
                    continue;
                $lastCost = $tmpdata["TRANCOST"];

                $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $oneitem = $req->fetch(PDO::FETCH_ASSOC);
                $price = $oneitem["PRICE"];

                $marginPercent = (($price / $lastCost) - 1);
                $newCost = floatval($item["NEWCOST"]);
                $newPrice = $newCost + ($newCost * $marginPercent);
                
                $sql = "SELECT * FROM PRICECHANGE WHERE PRODUCTID = ? AND REQUESTEE IS null";            
                $req = $indb->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $res = $req->fetch(PDO::FETCH_ASSOC);
                if ($res == false){
                    $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER,OLDCOST,NEWCOST) values(?,?,?,?,?,?,?)";	
                    $req = $indb->prepare($sql);
                    $req->execute(array($item["PRODUCTID"], $oldPrice, $newPrice,'CREATED',"AUTO",$item["OLDCOST"],$item["NEWCOST"]));	

                    $sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["PRODUCTID"]));
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                    $STORBIN = $res["STORBIN"] ?? "";
                    $STORBIN = explode('-',$STORBIN)[0];

                    // Detect if packs are irregular price 
                    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["PRODUCTID"]));
                    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($packs as $pack)
                    {
                        // CHECK IF PRICE IS IRREGULAR
                        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
                        $req = $db->prepare($sql);
                        $req->execute(array($pack["PRODUCTID"]));
                        $res2 = $req->fetch(PDO::FETCH_ASSOC);   
                        if ($res2 != false){
                            $UNITPRICE = $res2["PRICE"];        
                            $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        
                
                            $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
                            $req = $db->prepare($sql); 
                            $req->execute(array($pack["PACK_CODE"]));
                            $res3 = $req->fetch(PDO::FETCH_ASSOC); 
                            $currentPrice = $res3["SALEPRICE"];    
                
                            $calculatedIrregular = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
                            $calculatedNormalPromo = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.9,4);                
                
                            if (floatval($currentPrice) != floatval($fullPrice) &&
                                floatval($currentPrice) != floatval($calculatedIrregular) && 
                                floatval($currentPrice) != floatval($calculatedNormalPromo)            )
                            {// IF IT IS IRREGULAR
                                $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER,OLDCOST,NEWCOST) values(?,?,?,?,?,?,?)";	
                                $req = $indb->prepare($sql);
                                $newPackPrice = $newPrice * $pack["SALEFACTOR"];
                                $req->execute(array($pack["PACK_CODE"], $currentPrice, $newPackPrice,'CREATED',"AUTO",$item["OLDCOST"],$item["NEWCOST"]));	                            
                            }
                        }                                      
                    }
                    $sql = "SELECT * 
                            FROM USER,TEAM 
                            WHERE USER.team_id = TEAM.ID                         
                            AND LOCATION LIKE ?"; 
                    $req = $indb->prepare($sql);
                    $req->execute(array("'%".$STORBIN."%'"));
                    $userstopush = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($userstopush as $user){
                        sendPushToUser("PRICE CHANGE","Price change requested for product ".$json["PRODUCTID"],$user["ID"]);
                    }                 
                }                      
            }
        }
        else
        {
            if (floatval($item["NEWCOST"]) > floatval($item["OLDCOST"]) &&  ((floatval($item["NEWCOST"]) - floatval($item["OLDCOST"])) > 0.05) )
            {
                $sql = "SELECT TOP 1 TRANCOST FROM PODETAIL WHERE PRODUCTID = ? ORDER BY RECEIVE_DATE DESC";
                $req = $db->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $tmpdata = $req->fetch(PDO::FETCH_ASSOC);
                if ($tmpdata == false)
                    continue;            
                if ($item["NEWCOST"] == $tmpdata["TRANCOST"])
                    continue;
                $lastCost = $tmpdata["TRANCOST"];

                $diff = floatval($item["NEWCOST"]) - floatval($item["OLDCOST"]);

                if ($item["NEWCOST"] == 0 || $item["OLDCOST"] == 0)
                    continue;
                $percent = (($item["NEWCOST"] - $item["OLDCOST"]) / $item["OLDCOST"]);
                
                $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $oneitem = $req->fetch(PDO::FETCH_ASSOC);

                $oldPrice = $oneitem["PRICE"];
                //$newPrice = $oneitem["PRICE"] + ($oneitem["PRICE"] * $percent);
                $newPrice = $oneitem["PRICE"] + $diff;
                $newPrice = round($newPrice,2);

                $sql = "SELECT * FROM PRICECHANGE WHERE PRODUCTID = ? AND REQUESTEE IS null";            
                $req = $indb->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));
                $res = $req->fetch(PDO::FETCH_ASSOC);
                if ($res == false){
                    $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER,OLDCOST,NEWCOST) values(?,?,?,?,?,?,?)";	
                    $req = $indb->prepare($sql);
                    $req->execute(array($item["PRODUCTID"], $oldPrice, $newPrice,'CREATED',"AUTO",$item["OLDCOST"],$item["NEWCOST"]));	

                    $sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["PRODUCTID"]));
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                    $STORBIN = $res["STORBIN"] ?? "";
                    $STORBIN = explode('-',$STORBIN)[0];

                    // Detect if packs are irregular price 
                    $sql = "SELECT * FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["PRODUCTID"]));
                    $packs = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($packs as $pack)
                    {
                        // CHECK IF PRICE IS IRREGULAR
                        $sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
                        $req = $db->prepare($sql);
                        $req->execute(array($pack["PRODUCTID"]));
                        $res2 = $req->fetch(PDO::FETCH_ASSOC);   
                        if ($res2 != false){
                            $UNITPRICE = $res2["PRICE"];        
                            $fullPrice = round(($UNITPRICE * $pack["SALEFACTOR"])  ,4);        
                
                            $sql = "SELECT SALEPRICE FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?";
                            $req = $db->prepare($sql); 
                            $req->execute(array($pack["PACK_CODE"]));
                            $res3 = $req->fetch(PDO::FETCH_ASSOC); 
                            $currentPrice = $res3["SALEPRICE"];    
                
                            $calculatedIrregular = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.97,4);                
                            $calculatedNormalPromo = round(($UNITPRICE * $pack["SALEFACTOR"]) * 0.9,4);                
                
                            if (floatval($currentPrice) != floatval($fullPrice) &&
                                floatval($currentPrice) != floatval($calculatedIrregular) && 
                                floatval($currentPrice) != floatval($calculatedNormalPromo)            )
                            {// IF IT IS IRREGULAR
                                $sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER,OLDCOST,NEWCOST) values(?,?,?,?,?,?,?)";	
                                $req = $indb->prepare($sql);
                                $newPrice = $currentPrice + ($diff * $pack["SALEFACTOR"]);
                                $req->execute(array($pack["PACK_CODE"], $currentPrice, $newPrice,'CREATED',"AUTO",$item["OLDCOST"],$item["NEWCOST"]));	                            
                            }
                        }                                      
                    }
                    $sql = "SELECT * 
                            FROM USER,TEAM 
                            WHERE USER.team_id = TEAM.ID                         
                            AND LOCATION LIKE ?"; 
                    $req = $indb->prepare($sql);
                    $req->execute(array("'%".$STORBIN."%'"));
                    $userstopush = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($userstopush as $user){
                        sendPushToUser("PRICE CHANGE","Price change requested for product ".$json["PRODUCTID"],$user["ID"]);
                    }                 
                }            
            }  
            else{
                $msg = $item["PRODUCTID"]. ": [OLDCOST]=".$item["OLDCOST"]." [NEWCOST]=".$item["NEWCOST"];  
                LogToDB($msg);
            }
        }
            

    
    }   
    $sql = "DELETE FROM RS_PRICECHANGE_QUEUE";
    $req = $db->prepare($sql);
    $req->execute(array());        
}

// Once Per Day 
function CashierClean(){
    
    $cashierDB = getDatabase("CASHIER");
    
    //$sql = "SELECT PRODUCTID FROM link_main.PhnomPenhsuperstore2019.dbo.icproduct";
    //$req = $cashierDB->prepare($sql);
    //$res = $req->execute(array());  
    //$data =  $req->fetchAll(PDO::FETCH_ASSOC);  
    //var_dump($data);

    $sql = "DELETE FROM ICPRODUCT WHERE PRODUCTID NOT IN (SELECT PRODUCTID FROM link_main.PhnomPenhsuperstore2019.dbo.icproduct)";
    $req = $cashierDB->prepare($sql);
    $res = $req->execute(array());        
}

function extractClockIn($month,$year)
{
	$db = getDatabase();
	$day_count=cal_days_in_month(CAL_GREGORIAN,$month,$year);

	$from = $year."-".$month."-"."01 00:00:00";
	$to = $year."-".$month."-".$day_count." 23:59:59";
	$fromTS = strtotime($from);
	$toTS = strtotime($to); 
	system("echo 'Select * from Checkinout where CheckTime >= '.$from.' AND CheckTime <= '.$to.' > ./query.sql;mdb-sql -P -H -F -i ./query.sql -i ./result.txt");
		
	// Open your file in read mode
    $input = fopen("./result.txt", "r");
    // Display a line of the file until the end 
    while(!feof($input)) {
  
        // Display each line
        $line =  fgets($input). "<br>";
		$separated = preg_split("/\t+/", $line);

		$userid = $separated[1];
		$checktime = $separated[2];
		$date = explode(' ',$checktime)[0];
		$hour = explode(' ',$checktime)[1];
		$checktype = $separated[3];

		$sql = "SELECT * FROM CLOCKIN1,CLOCKOUT1,CLICKING WHERE USERID = ? AND DATE = ";
		$req = $db->prepare($sql);
		$req->execute(array($userid));
		$data = $req->fetch(PDO::FETCH_ASSOC);

		if ($data == false){
			if($checktype == "I"){
				$sql = "INSERT INTO CLOCKING (USERID,CLOCKIN1,DATE) VALUES (?,?,?)"; 	
				$req = $db->prepare($sql);
				$req->execute(array($userid));
			}				
			else if($checktype == "O"){
				$sql = "INSERT INTO CLOCKING (USERID,CLOCKOUT1,DATE) VALUES (?,?,?)"; 	
				$req = $db->prepare($sql);
				$req->execute(array($userid,$hour,$date));
			}							
			else
				echo "Invalid type detected\n";				
		}else{		
			if($checktype == "I"){
				if($data["CLOCKIN1"] == null)
					$sql = "UPDATE CLOCKING SET CLOCKIN1 = ? WHERE USERID = ? AND DATE = ?";				
				else 
					$sql = "UPDATE CLOCKING SET CLOCKIN2 = ? WHERE USERID = ? AND DATE = ?";				
				$req = $db->prepare($sql);
				$req->execute(array($hour,$userid,$date));
			}		
			else if($checktype == "O"){
				if($data["CLOCKOUT1"] == null)
					$sql = "UPDATE CLOCKING SET CLOCKOUT1 = ? WHERE USERID = ? AND DATE = ?";				
				else 
					$sql = "UPDATE CLOCKING SET CLOCKOUT2 = ? WHERE USERID = ? AND DATE = ?";				
			}
		}				
    }
}


function LogAction($str){
    system("echo '".$str."' >> /var/log/daemon.log");
}

function updateAllLastCost()
{
    $sql = "SELECT PRODUCTID,LASTCOST FROM ICPRODUCT";
    $db = getDatabase();
    $req = $db->prepare($sql);
    $req->execute(array());
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $onedata){
        $sql = "SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
        $req = $db->prepare($sql);
        $req->execute(array($onedata["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res == false){
            //print("Look in podetail|");
            $sql = "SELECT TOP(1) TRANCOST FROM PODETAIL WHERE PRODUCTID = ? AND POSTATUS = 'C' ORDER BY RECEIVE_DATE DESC";
            $req = $db->prepare($sql);
            $req->execute(array($onedata["PRODUCTID"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);
        }
        if ($res == false){
            //echo "ID:".$onedata["PRODUCTID"]." never received\n";
        }
        else{
            $old = floatval($onedata["LASTCOST"]);
            $new = floatval($res["TRANCOST"]);
            if ($old != $new){
                echo "ID:".$onedata["PRODUCTID"]." ICPRODUCT LC: " .$old."|PORECV LC: ".$new."\n";
                echo "Updating...\n";
                $sql = "UPDATE ICPRODUCT SET LASTCOST = ? WHERE PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($new,$onedata["PRODUCTID"]));        
                
            }else{
                //echo "ID:".$onedata["PRODUCTID"]."SAME\n";
            }      
        }          
    }
}

function updateItemStats()
{
	$db = getDatabase();
	$sql = "SELECT PRODUCTID,
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',	
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND APPLID = 'PO'),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE'						
	FROM dbo.ICPRODUCT";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$indb = getInternalDatabase();
	foreach($items as $item)
	{		        
		$req = $indb->prepare("SELECT BARCODE FROM ITEMSTATS WHERE BARCODE = ?");		
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		
        if ($item["TOTALRECEIVE"] == 0){
            $PERCENTTHROWN = 0; 
            $PERCENTSOLD = 0;
        }            
        else {
            $PERCENTTHROWN = ($item["TOTALTHROWN"] * -1) * 100 / $item["TOTALRECEIVE"];
            $PERCENTSOLD = $item["TOTALSALE"] * 100 / $item["TOTALRECEIVE"];
        }
		$score = $PERCENTSOLD - ($PERCENTTHROWN * 2);		
		if ($res == false){
            echo $item["PRODUCTID"]."\n";
			$sql = " INSERT INTO ITEMSTATS (BARCODE,TOTALRECEIVE,TOTALSALE,TOTALTHROWN,SCORE) 
					VALUES (?,?,?,?,?)";
					$req = $indb->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["TOTALRECEIVE"],$item["TOTALSALE"],$item["TOTALTHROWN"],$score));
		}else{
			$sql = "UPDATE ITEMSTATS SET TOTALRECEIVE = ?,TOTALSALE = ?,TOTALTHROWN = ?,SCORE = ? WHERE BARCODE = ?";
					$req = $indb->prepare($sql);
					$req->execute(array($item["TOTALRECEIVE"],$item["TOTALSALE"],$item["TOTALTHROWN"],$score,$item["PRODUCTID"]));					
		}	        
	}
}

function initializeBlackList()
{
	$db = getDatabase();
    $indb = getInternalDatabase();
	$sql = "SELECT * FROM ICPRODUCT WHERE PPSS_IS_BLACKLIST = 'Y'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($items as $item){
		$sql = "SELECT * FROM BLACKLIST WHERE BARCODE = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) == 0){
			$sql = "INSERT INTO BLACKLIST (BARCODE,PRODUCTNAME,STATUS,USERADDED) VALUES (?,?,'ON','AUTO')";
			$req = $indb->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"]));
		}
	}	
}

function updateBlacklistReceived()
{
	$db = getDatabase();
	$indb = getInternalDatabase();
	$sql = "SELECT * FROM BLACKLIST WHERE STATUS = 'ON'";
	$req = $indb->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$needSendPush = false;	
	foreach($items as $item)
	{		
		$sql = "SELECT PRODUCTID,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? AND TRANDATE > '2023-10-23 00:00:00.000'";
		$req = $db->prepare($sql);
		$req->execute(array($item["BARCODE"]));
		$res = $req->fetchAll(PDO::FETCH_ASSOC);
		if(count($res) > 0){
            $sql = "SELECT BLACKLISTRECEIVED WHERE PRODUCTID = ?";
            $req = $indb->prepare($sql);
            $req->execute(array($item["BARCODE"]));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            if (count($data) > 0){
                $needSendPush = true;
                $sql = "INSERT INTO BLACKLISTRECEIVED (PRODUCTID,QUANTITY) VALUES(?,?)";
                $req = $db->prepare($sql);	
            }
		}
	}
	if($needSendPush == true){
		//sendPushToUser("BLACK LIST ITEM WAS RECEIVED",1001);
		//sendPushToUser("BLACK LIST ITEM WAS RECEIVED",603);
        //sendPushToUser("BLACK LIST ITEM WAS RECEIVED",401);	
		//sendPushToUser("BLACK LIST ITEM WAS RECEIVED",402);	
	}
	
}

function eraseAlreadyPromoted(){
    
    $indb = getInternalDatabase();
    $sql = "SELECT * FROM EXPIREPROMOTED";
    $req = $indb->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){

        $sql = "DELETE FROM ITEMEXPIRATION WHERE PRODUCTID = ? AND EXPIRATION = ?";
        $req = $indb->prepare($sql);
        $req->execute(array($item["PRODUCTID"],$item["EXPIRATION"]));
    }
}


function transferExpiration(){
    $db = getDatabase();
    $indb = getInternalDatabase();

    $sql = "SELECT PPSS_DELIVERED_EXPIRE,PRODUCTID,VENDID,PRODUCTNAME,VENDNAME,VENDID,PONUMBER,ORDER_QTY FROM PODETAIL WHERE PPSS_DELIVERED_EXPIRE > GETDATE()";
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){

        $sql = "SELECT * FROM ITEMEXPIRATION WHERE PRODUCTID = ? AND EXPIRATION = ?";
        $req = $indb->prepare($sql);
        $req->execute(array($item["PRODUCTID"],$item["PPSS_DELIVERED_EXPIRE"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res != false){            
            continue;
        }            
        else
            echo "Go ".$item["PRODUCTID"]."\n";
        $sql = "SELECT SIZE,
                (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBINSTR',	
				(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBINWH',	 
				(SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?) as 'VENDNAME'
        FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["VENDID"],$item["PRODUCTID"]));
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if($item["VENDID"] == "400-463" || $item["VENDID"] == "400-106" || $item["VENDID"] == "400-697" || 
           $item["VENDID"] == "400-698" || $item["VENDID"] == "400-699")
        {
            $type = "NORETURN";
        }else
            $type = "RETURN";
        //echo "SIZE:".$data["SIZE"]."\n";
        //echo "TYPE:".$type."\n";
        if (substr($data["SIZE"],0,1) == ':')
        {
			if ($type == "RETURN"){
				$policy = substr($data["SIZE"],1,3);
				if($policy == "0NE")
					$policy = "NOEXPIRE";
				else 
					$policy = intval($policy);									
			}
			else if($type == "NORETURN"){
				$policy = substr($data["SIZE"],5,3);
				if($policy == "0NE")
					$policy = "NOEXPIRE";
				else 
					$policy = intval($policy);		        
			}			           
		}
        else
        {
			if ($type == "RETURN" && substr($data["SIZE"],0,1) == "R")						
				$policy = substr($data["SIZE"],1);
			else 
				$policy = substr($data["SIZE"],2);									
		}
        
        $sql = "INSERT INTO ITEMEXPIRATION (PRODUCTID,PRODUCTNAME,VENDNAME,VENDID,EXPIRATION,
                            POLICY,PONUMBER,QUANTITY,TYPE,STATUS,STOREBINWH,STOREBINSTR) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $req = $indb->prepare($sql);
        $req->execute(array($item["PRODUCTID"],$item["PRODUCTNAME"],$item["VENDNAME"],$item["VENDID"],$item["PPSS_DELIVERED_EXPIRE"],
                            $policy,$item["PONUMBER"],$item["ORDER_QTY"],$type,"ACTIVE",$data["STOREBINWH"],$data["STOREBINSTR"]));
    }
    eraseAlreadyPromoted();
}

if ($argc > 1 && $argv[1] == "SCANPACK"){
    ScanPack();
    LogAction(date("Y-m-d H:i:s").":SCANPACK");
}
else if ($argc > 1 && $argv[1] == "RESETPACK"){
    ResetPack();
    LogAction(date("Y-m-d H:i:s").":RESETPACK");
}    
else if ($argc > 1 && $argv[1] == "PRICECHANGE"){    
    ScanPriceChange();
    LogAction(date("Y-m-d H:i:s").":PRICECHANGE");
}else if ($argc > 1 && $argv[1] == "AL"){
    AddAnnualLeave();
    LogAction(date("Y-m-d H:i:s").":AL");
}else if ($argc > 1 && $argv[1] == "CASHIERCLEAN"){
    CashierClean();
    LogAction(date("Y-m-d H:i:s").":CASHIERCLEAN");
}else if ($argc > 1 && $argv[1] == "UPDATELASTCOST"){
    updateAllLastCost();
}else if ($argc > 1 && $argv[1] == "UPDATEITEMSTATS"){
    updateItemStats();
}else if ($argc > 1 && $argv[1] == "INITIALIZEBLACKLIST"){
    initializeBlackList();
}else if ($argc > 1 && $argv[1] == "UPDATEBLR"){
    updateBlacklistReceived();
}    
else if ($argc > 1 && $argv[1] == "TRANSFEREXPIRATION"){
    transferExpiration();
}
else
	error_log("WARNING !!! maintenance attempt");

?>
