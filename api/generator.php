<?php
function GenerateGroupedPurchases()
{
	//patchGroupedPurchases();
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$sql = "SELECT DISTINCT(VENDID) FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($vendors as $vendor)
	{
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND ARG1 = ? AND REQUESTEE IS null"; 
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false)
		{
			$sql = "SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
		
			if ($res != false)
				$vendorname = $res["VENDNAME"];
			else 
				$vendorname = "";

			$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
				$orderday = $res["orderday"];
			else 
				$orderday = false;

			$db->beginTransaction();
			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2,ARG3) VALUES ('GROUPEDPURCHASE','AUTO',?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"],$vendorname,$orderday));
			$theID = $db->lastInsertId();
			$db->commit();
		}
		else		
			$theID = $res["ID"];	

		$sql = "SELECT * FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE VENDID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item)
		{
			$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$theID));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			$sql = "SELECT TOP(1)TRANCOST,TRANDISC FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";			
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			$sql = "SELECT PPSS_NEW_COST FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res2 = $req->fetch(PDO::FETCH_ASSOC);	

			if ($res2 == false || $res2["PPSS_NEW_COST"] == null)
				$TRANCOST = $res["TRANCOST"];
			else{
				if ($res2["TRANCOST"]??"" != "0" || $res2["TRANCOST"]??"" != 0)
					$TRANCOST = $res2["PPSS_NEW_COST"];
				else 
					$TRANCOST = $res["TRANCOST"];
			}

			if ($res != false){
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,COST,DISCOUNT,ITEMREQUESTACTION_ID,REQUESTTYPE) VALUES (?,?,?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"], $TRANCOST,$res["TRANDISC"] ,$theID,'MANUAL'));
			}
			else{
				$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = REQUEST_QUANTITY + ?, 
						COST = ?,
						DISCOUNT = ?
						WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$TRANCOST,$res["TRANDISC"],$theID));
			}
			$sql = "DELETE FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
		}

	}	
}


function patchGroupedPurchases()
{
	$db = getInternalDatabase();	

	$dbBlue = getDatabase();
	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE ARG3 IS NULL AND TYPE = 'GROUPEDPURCHASE'";
	$req = $db->prepare($sql);
	$req->execute();
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($actions as $action)
	{		
		$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($action["ARG1"]));	
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false)
			$orderday = $res["orderday"];
		else 
			$orderday = null;		
		$sql = "UPDATE ITEMREQUESTACTION SET ARG3 = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($orderday,$action["ID"]));

		$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($action["ID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($items as $item){
			$sql = "SELECT TRANDISC,TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res != false){
				$sql = "UPDATE ITEMREQUEST SET DISCOUNT = ?, COST = ?,ORDER_QTY = REQUEST_QUANTITY";
				$req = $db->prepare($sql);
				$req->execute(array($res["TRANDISC"],$res["TRANCOST"]));
			}

			
		}
	}
}




function GenerateGroupedRestocks(){
    GenerateGroupedRestocksByVendor();
    GenerateGroupedRestocksByRow();
    //GenerateGroupedRestocksByRowAndWarehouseStocks();
}


function GenerateGroupedRestocksByVendor()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$OTHER = array("VENDID" =>  "OTHER", "VENDNAME" => "OTHER");
	$SOPHIESOK = array("VENDID" =>  "400-463", "VENDNAME" => "SOPHIE SOK");
	$MAKROCLICK = array("VENDID" => "400-429", "VENDNAME" => "MAKRO CLICK");
	$vendors = array($SOPHIESOK,$MAKROCLICK,$OTHER);
	$maxItem = 30;

	foreach($vendors as $vendor)
	{				
			$sql = "SELECT * FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL WHERE VENDID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$items = $req->fetchAll(PDO::FETCH_ASSOC);

			foreach($items as $item)
			{
				//itemIsInGroupedRestock
				$sql = "SELECT ITEMREQUESTACTION_ID,count(*) as 'CNT' FROM ITEMREQUEST WHERE PRODUCTID = ? 
						AND ITEMREQUESTACTION_ID IN (SELECT ID FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDRESTOCK' AND REQUESTEE IS NULL)
						GROUP BY ITEMREQUESTACTION_ID"; 
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res != false && $res['CNT'] == 0)
					$irID =  false;
				else	
					$irID = $res["ITEMREQUESTACTION_ID"];	

				
				if ($irID != false)// JUST UPDATE
				{						
						$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
						$req = $db->prepare($sql);
						$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$irID));
				}
				else 
				{
					$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDRESTOCK' AND ARG1 = ? AND REQUESTEE IS NULL"; 
					$req = $db->prepare($sql);
					$req->execute(array($vendor["VENDID"]));
					$irs = $req->fetchAll(PDO::FETCH_ASSOC);

					$theID = null;
					// ID SEARCHING
					if (count($irs) == 0)// NEW 
					{
						$db->beginTransaction();
						$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2) VALUES ('GROUPEDRESTOCK','AUTO',?,?)";
						$req = $db->prepare($sql);
						$req->execute(array($vendor["VENDID"],$vendor["VENDNAME"]));	
						$theID = $db->lastInsertId(); // ID FROM NEW
						$db->commit();
					}
					else
					{
						foreach($irs as $ir){
							$sql = "SELECT COUNT(*) as 'CNT' FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
							$req = $db->prepare($sql);
							$req->execute(array($ir["ID"]));
							$requests = $req->fetch(PDO::FETCH_ASSOC); 
							if ($requests['CNT'] < $maxItem){ // 
								$theID = $ir["ID"]; // ID FROM OLD WITH ROOM
								break;
							}
						}
						if ($theID == null){ // ALL FULL			
							$db->beginTransaction();			
							$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2) VALUES ('GROUPEDRESTOCK','AUTO',?,?)";
							$req = $db->prepare($sql);
							$req->execute(array($vendor["VENDID"],$vendor["VENDNAME"]));	
							$theID = $db->lastInsertId(); // ID FROM NEW
							$db->commit();
						}										
					}						
					$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,ITEMREQUESTACTION_ID) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$theID));
				}
				// TREATED
				$sql = "DELETE FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
		  }
	}
}

function GenerateGroupedRestocksByRow()
{
	// Call from WH2 > WH1
	$dbBlue = getDatabase();
    $db = getInternalDatabase();

    $storebins = [        
        "G01A",
        "G01B",
        "G02A",
        "G02B",
        "G03A",
        "G03B",
        "G04A",
        "G04B",
        "G05A",
        "G05B",
        "G06A",
        "G06B",
        "G07A",
        "G07B",
        "N08A",
        "N08B",
        "N09A",
        "N09B",
        "N10A",
        "N10B",
        "N11A",
        "N11B",
        "N12A",
        "N12B",
        "N13A",
        "N13B",
        "N14A",
        "N14B",
        "N15A",
        "N15B",
        "N16A",
        "N16B",
        "N17A",
        "N17B",
        "N18A",
        "N18B",
        "N19A",
        "N19B",
        "N20A",
        "N20B",
        "N21A",
        "N21B",
        "N22A",
        "N22B",
        "CHIL",
        "FROZ",
        "NBAB",
        "NCHA",
        "NRAC",
        "GSOF",
        "CIGA",
        "FFRU",
        "FMET",
        "FVEG"
    ];

    foreach($storebins as $storebin){   
		                              
		$sql = "SELECT PRODUCTID,COMMENT FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL WHERE STORBIN LIKE ?";
		$req = $db->prepare($sql);
	    $req->execute(array('%'.$storebin.'%'));
	    $items = $req->fetchAll(PDO::FETCH_ASSOC);
        
		if (count($items) > 0)
        {			
			$sql = "SELECT * from ITEMREQUESTACTION WHERE TYPE = 'AUTOMATICRESTOCK'  AND ARG1 LIKE ? AND REQUESTEE IS NULL ";
			$req = $db->prepare($sql);
			$req->execute(array($storebin));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$IRID = null;
			if ($res == false){ // Create only when there are items
				$db->beginTransaction();    
				$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1) VALUES ('AUTOMATICRESTOCK','AUTO',?)";
				$req = $db->prepare($sql);	
				$req->execute(array($storebin));
				$IRID = $db->lastInsertId();
				$db->commit();    
			}else
				$IRID = $res["ID"];

            $sql = "UPDATE ITEMREQUESTACTION SET ARG2 = ? WHERE ID = ?";
            $req = $db->prepare($sql);
            $req->execute(array($items[0]["COMMENT"],$IRID));         
		}

    	foreach($items as $item)
		{

            $sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
            $req = $dbBlue->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));
            $itemdetail = $req->fetch(PDO::FETCH_ASSOC);
            if ($itemdetail != false)
                $wh2 = $itemdetail["LOCONHAND"];
            else
                $wh2 = "0";

			$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$IRID));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res == false){
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
            	$req = $db->prepare($sql);
            	$req->execute(array($item["PRODUCTID"],$wh2,"AUTOMATIC",$IRID));
			}			
		}                
    }

	$sql = "SELECT ID from ITEMREQUESTACTION WHERE TYPE = 'AUTOMATICRESTOCK'  AND ARG1 = 'UNROWED' AND REQUESTEE IS NULL ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res == false){
		$db->beginTransaction();    
			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1) VALUES ('AUTOMATICRESTOCK','AUTO','UNROWED')";
			$req = $db->prepare($sql);	
			$req->execute(array());
			$unrowedID  = $db->lastInsertId();
			$db->commit(); 
	}else{
		$unrowedID = $res["ID"];            
	}
	$sql = "SELECT PRODUCTID,COMMENT FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL WHERE STORBIN IS NULL OR STORBIN = '' ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($items as $item)
	{
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$itemdetail = $req->fetch(PDO::FETCH_ASSOC);
		if ($itemdetail != false)
			$wh2 = $itemdetail["LOCONHAND"];
		else
			$wh2 = "0";

		$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$unrowedID));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if($res == false){
			$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$wh2,"AUTOMATIC",$unrowedID));
		}				
	}  

	$sql = "SELECT PRODUCTID,COMMENT FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL 
		WHERE STORBIN NOT LIKE '%G01A%'
		AND STORBIN NOT LIKE '%G01B%'
		AND STORBIN NOT LIKE '%G02A%'
		AND STORBIN NOT LIKE '%G02B%'
		AND STORBIN NOT LIKE '%G03A%'
		AND STORBIN NOT LIKE '%G03B%'
		AND STORBIN NOT LIKE '%G04A%'
		AND STORBIN NOT LIKE '%G04B%'
		AND STORBIN NOT LIKE '%G05A%'
		AND STORBIN NOT LIKE '%G05B%'
		AND STORBIN NOT LIKE '%G06A%'
		AND STORBIN NOT LIKE '%G06B%'
		AND STORBIN NOT LIKE '%G07A%'
		AND STORBIN NOT LIKE '%G07B%'
		AND STORBIN NOT LIKE '%N08A%'
		AND STORBIN NOT LIKE '%N08B%'
		AND STORBIN NOT LIKE '%N09A%'
		AND STORBIN NOT LIKE '%N09B%'
		AND STORBIN NOT LIKE '%N10A%'                       
		AND STORBIN NOT LIKE '%N10B%'
		AND STORBIN NOT LIKE '%N11A%'
		AND STORBIN NOT LIKE '%N11B%'
		AND STORBIN NOT LIKE '%N12A%'
		AND STORBIN NOT LIKE '%N12B%'
		AND STORBIN NOT LIKE '%N13A%'
		AND STORBIN NOT LIKE '%N13B%'
		AND STORBIN NOT LIKE '%N14A%'
		AND STORBIN NOT LIKE '%N14B%'
		AND STORBIN NOT LIKE '%N15A%'
		AND STORBIN NOT LIKE '%N15B%'
		AND STORBIN NOT LIKE '%N16A%'
		AND STORBIN NOT LIKE '%N16B%'
		AND STORBIN NOT LIKE '%N17A%'
		AND STORBIN NOT LIKE '%N17B%'
		AND STORBIN NOT LIKE '%N18A%'
		AND STORBIN NOT LIKE '%N18B%'
		AND STORBIN NOT LIKE '%N19A%'
		AND STORBIN NOT LIKE '%N19B%'
		AND STORBIN NOT LIKE '%N20A%'
		AND STORBIN NOT LIKE '%N20B%'
		AND STORBIN NOT LIKE '%N21A%'
		AND STORBIN NOT LIKE '%N21B%'
		AND STORBIN NOT LIKE '%N22A%'
		AND STORBIN NOT LIKE '%N22B%'
		AND STORBIN NOT LIKE '%CHIL%'
		AND STORBIN NOT LIKE '%FROZ%'
		AND STORBIN NOT LIKE '%NBAB%'
		AND STORBIN NOT LIKE '%NCHA%'
		AND STORBIN NOT LIKE '%NRAC%'
		AND STORBIN NOT LIKE '%GSOF%'
		AND STORBIN NOT LIKE '%CIGA%'
		AND STORBIN NOT LIKE '%FFRU%'
		AND STORBIN NOT LIKE '%FMET%'
		AND STORBIN NOT LIKE '%FVEG%'
		AND STORBIN IS NOT NULL
		AND STORBIN <> ''
	";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($items as $item)
	{
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$itemdetail = $req->fetch(PDO::FETCH_ASSOC);
		if ($itemdetail != false)
			$wh2 = $itemdetail["LOCONHAND"];
		else
			$wh2 = "0";

		$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$unrowedID));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if($res == false){
			$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$wh2,"AUTOMATIC",$unrowedID));
		}				
	}


	$sql = "DELETE FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	

} 


	

?>