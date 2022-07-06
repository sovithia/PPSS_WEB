<?php 

// Give Create Restock Permission to store clerk (Remove Quantity)
// Promotion request to STRCLRK
// Return Alert To STRCLRK By Row
// Alert on Transfer request (Push Notification)
// Generate EmptyRestock based on item WH2 have and WH1 not have
// KPI By Row
function getDatabase($name = "MAIN")
{ 	
	$conn = null;      
	$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	return $conn;
}

function getInternalDatabase($base = "MAIN")
{	
	$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $db;
}



 function GenerateGroupedRestocksByRowAndWarehouseStocks()
 {
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
         $sql = "SELECT PRODUCTID,(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
         FROM ICPRODUCT
         WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
         AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)
         AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND STORBIN LIKE ?)";
 
         $storebinquery = '%'.$storebin.'%';
         $req = $dbBlue->prepare($sql);
         $req->execute(array($storebinquery));
         $items = $req->fetchAll(PDO::FETCH_ASSOC);
         if (count($items) > 0){

            $sql = "SELECT ID FROM ITEMREQUESTACTION WHERE TYPE = 'AUTOMATICRESTOCKWH' AND ARG1 = ? AND REQUESTEE = null";
            $req = $db->prepare($sql);
            $req->execute(array($storebin));            
            $res = $req->fetch(PDO::FETCH_ASSOC);

            if ($res == false){
                $db->beginTransaction();    
                $sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,ARG1) VALUES('AUTOMATICRESTOCKWH','AUTO',?)";	
                $req = $db->prepare($sql);	
                $req->execute(array($storebin));
                $lastID = $db->lastInsertId();
                $db->commit();    
            }else{
                $lastID = $res["ID"];
            }            

             echo "ItemRequestAction with ID: ".$lastID." for StoreBin: ".$storebin."\n";
             
             foreach($items as $item)
             {	
                
                if ($item["PRODUCTID"] == null || $item["PRODUCTID"] == "")
                     continue;
                $sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ? AND PRODUCTID = ?"; 
                $req = $db->prepare($sql);
                $req->execute(array($lastID,$item["PRODUCTID"]));
                $res = $req->fetch(PDO::FETCH_ASSOC);
                
                if ($res == false){
                    echo "inserting ".$item["PRODUCTID"]."\n";	        
                    $sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["PRODUCTID"],$item["WH2"],"AUTOMATIC",$lastID));
                }else{
                    echo $item["PRODUCTID"]." ALREADY IN LIST.\n";
                }
                
             }             
         }
       
     }
  } 

  GenerateGroupedRestocksByRowAndWarehouseStocks();


?>