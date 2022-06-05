<?php 

// Give Create Restock Permission to store clerk (Remove Quantity)
// Promotion request to STRCLRK
// Return Alert To STRCLRK By Row
// Alert on Transfer request (Push Notification)
// Generate EmptyRestock based on item WH2 have and WH1 not have
// KPI By Row




function AlertStoreClerkByRow($row)
{
    $db = getInternalDatabase();
    $sql = "SELECT fcm_token FROM USER WHERE LOCATION LIKE ?";
    $req = $db->prepare($sql);
    $req->execute(array($row));

    $user = $req->fetch(PDO::FETCH_ASSOC);
    
    // Device Token
    // Push
}

function GenerateRestock()
{
    $dbBlue = getDatabase();
    $db = getInternalDatabase();

    $storebins = [        
        "G01A%",
        "G01B%",
        "G02A%",
        "G02B%",
        "G03A%",
        "G03B%",
        "G04A%",
        "G04B%",
        "G05A%",
        "G05B%",
        "G06A%",
        "G06B%",
        "G07A%",
        "G07B%",
        "G08A%",
        "G08B%",
        "N09A%",
        "N09B%",
        "N10A%",
        "N10B%",
        "N11A%",
        "N11B%",
        "N12A%",
        "N12B%",
        "N13A%",
        "N13B%",
        "N14A%",
        "N14B%",
        "N15A%",
        "N15B%",
        "N16A%",
        "N16B%",
        "N17A%",
        "N17B%",
        "N18A%",
        "N18B%",
        "N19A%",
        "N19B%",
        "N20A%",
        "N20B%",
        "N21A%",
        "N21B%",
        "N22A%",
        "N22B%",
        "CHIL%",
        "FROZ%",
        "NBAB%",
        "NCHA%",
        "NRAC%",
        "GSOF%",
        "CIGA%",
        "FFRU%",
        "FMET%",
        "FVEG%"
    ];

    foreach($storebins as $storebin){
        $sql = "SELECT PRODUCTNAME,PRODUCTID,		
		FROM ICPRODUCT 
        WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
		AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)
        AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND STORBIN LIKE ?";

    	$req = $dbBlue->prepare($sql);
	    $req->execute(array($storebin));
	    $items = $req->fetchAll(PDO::FETCH_ASSOC);
        if (count($items) > 0){
            $db->beginTransaction();    
            $sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,REQUESTEE,ARG1) VALUES('RESTOCK','AUTO','AUTO',?)";	
            $req = $db->prepare($sql);	
            $req->execute(array($storebin));
            $lastID = $db->lastInsertId();
            $db->commit();    
            echo "ItemRequestAction with ID: ".$lastID;
            
            foreach($items as $item)
            {	
                echo "inserting ".$item["PRODUCTID"]."\n";	        
                if ($item["PRODUCTID"] == null || $item["PRODUCTID"] == "")
                    continue;
                
                $sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,TYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($item["PRODUCTID"],0,"AUTOMATIC",$lastID));
            }
        }
    }
 }



	



?>