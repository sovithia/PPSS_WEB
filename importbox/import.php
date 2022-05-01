<?php 

function getDatabase()
{ 	
    $conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	return $conn;
}

function getInternalDatabase($base = "MAIN"){
    try{
        if ($base == "MAIN")
            $db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $ex)
    {
        die("Cannot open database".$ex->getMessage());
    }
    return $db;
}

function loopPOFruits(){
    $db = getInternalDatabase();
    $dbBlue = getDatabase();
    echo "START\n";
    $pofile = fopen('pofruit.csv','r');
    while (($line = fgetcsv($pofile)) !== FALSE) 
    {
        $linedata = explode(';',$line[0]);
        $ponumber = $linedata[0] ?? "";
        $vendor = $linedata[1] ?? "";
        
        echo "PONUMBER: ". $ponumber."|VENDOR: ".$vendor."\n";

        $sql = "SELECT ID FROM EXTERNALFRUITVENDOR WHERE NAMEEN = ?";
        $req = $db->prepare($sql);
        $req->execute(array($vendor));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $vendorid = $res["ID"]; 

        $sql = "SELECT PRODUCTID,TRANCOST FROM PORECEIVEDETAIL WHERE PONUMBER = ?";

        $req = $dbBlue->prepare($sql);
        $req->execute(array($ponumber));
        $items = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($items as $item)
        {            
            echo "  ITEM: ". $item["PRODUCTID"]."\n";

            $sql = "SELECT PRODUCTID FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";            
            $req = $db->prepare($sql);
            $req->execute(array($vendorid,$item["PRODUCTID"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);            
            
            if ($res == false){
                $sql = "INSERT INTO EXTERNALFRUITCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) VALUES (?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($vendorid,$item["PRODUCTID"],$item["TRANCOST"]));
            }else{
                $sql = "UPDATE EXTERNALFRUITCOST SET COST = ? WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($item["TRANCOST"],$vendorid,$item["PRODUCTID"]));                
            }

            $sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'F' WHERE PRODUCTID = ?";
            $req = $dbBlue->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));        
        }
        sleep(1);     
    }
}

function loopPO(){
    $db = getInternalDatabase();
    $dbBlue = getDatabase();
    echo "START\n";
    $pofile = fopen('po.csv','r');
    while (($line = fgetcsv($pofile)) !== FALSE) 
    {
        $linedata = explode(';',$line[0]);
        $ponumber = $linedata[0] ?? "";
        $vendor = $linedata[1] ?? "";
        
        echo "PONUMBER: ". $ponumber."|VENDOR: ".$vendor."\n";

        $sql = "SELECT ID FROM EXTERNALVENDOR WHERE NAMEEN = ?";
        $req = $db->prepare($sql);
        $req->execute(array($vendor));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $vendorid = $res["ID"]; 

        

        $sql = "SELECT PRODUCTID,TRANCOST FROM PORECEIVEDETAIL WHERE PONUMBER = ?";

        $req = $dbBlue->prepare($sql);
        $req->execute(array($ponumber));
        $items = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($items as $item)
        {            
            echo "  ITEM: ". $item["PRODUCTID"]."\n";

            $sql = "SELECT PRODUCTID FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";            
            $req = $db->prepare($sql);
            $req->execute(array($vendorid,$item["PRODUCTID"]));
            $res = $req->fetch(PDO::FETCH_ASSOC);            
            
            if ($res == false){
                $sql = "INSERT INTO EXTERNALCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) VALUES (?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($vendorid,$item["PRODUCTID"],$item["TRANCOST"]));
            }else{
                $sql = "UPDATE EXTERNALCOST SET COST = ? WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
                $req = $db->prepare($sql);
                $req->execute(array($item["TRANCOST"],$vendorid,$item["PRODUCTID"]));                
            }

            $sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
            $req = $dbBlue->prepare($sql);
            $req->execute(array($item["PRODUCTID"]));        
        }
        sleep(1);     
    }
}

function insertVendors(){
    $db = getInternalDatabase();

    $sql = "DELETE FROM EXTERNALVENDOR";
    $req = $db->prepare($sql);
    $req->execute(array());


    $itemsfile = fopen('vendors.csv', 'r');
    while (($line = fgetcsv($itemsfile)) !== FALSE) 
    {               
        $linedata = explode(';',$line[0]);
        if($linedata[0] == "No")
            continue;       
        $id = $linedata[0] ?? "";        
        $nameen = $linedata[1] ?? "";
        $namekh = $linedata[2] ?? "";
        $website = $linedata[3] ?? "";
        if ($namekh == "N/A")
            $namekh = null;
        $phone1 = $linedata[4] ?? "";
        $phone2 = $linedata[5] ?? "";
        $phone3 = $linedata[6] ?? "";
        $phone4 = $linedata[7] ?? "";
        $address1 = $linedata[8] ?? "";
        $address2 = $linedata[9] ?? "";
        $ctype1 = $linedata[10] ?? "";
        $chandle1 = $linedata[11] ?? "";
        $ctype2 = $linedata[12] ?? "";
        $chandle2 = $linedata[13] ?? "";

        $sql = "SELECT * FROM EXTERNALVENDOR WHERE NAMEEN = ?"; 
        $req = $db->prepare($sql);
        $req->execute(array($linedata[1]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if($res == false)
        {            
            $sql = "INSERT INTO EXTERNALVENDOR (ID,
                                                WEBSITE,
                                                NAMEEN,NAMEKH,
                                                PHONE1,PHONE2,
                                                PHONE3,PHONE4,
                                                ADDRESS1,ADDRESS2,
                                                COMMUNICATIONTYPE1,COMMUNICATIONHANDLE1,
                                                COMMUNICATIONTYPE2,COMMUNICATIONHANDLE2) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $req = $db->prepare($sql);
            $params = array($id,$website,
                                $nameen,$namekh,$phone1,$phone2,
                                $phone3,$phone4,$address1,$address2,
                                $ctype1,$chandle1,$ctype2,$chandle2);
            //$debug = var_export($params, true);  
            //error_log($debug);        
            $req->execute($params);            
        }

    }
    fclose($itemsfile);
}
function insertItems(){
    $db = getInternalDatabase();
    $dbBlue = getDatabase();
    $sql = "DELETE FROM EXTERNALCOST";
    $req = $db->prepare($sql);
    $req->execute(array());

    $itemsfile = fopen('items.csv', 'r');
    while (($line = fgetcsv($itemsfile)) !== FALSE) 
    {                    
        $linedata = explode(';',$line[0]);        
        if($linedata[0] == "BARCODE")
            continue;              
        $barcode = $linedata[0] ?? "";
        //$nameen = $linedata[1] ?? "";
        //$namekh = $linedata[2] ?? "";
        //$note = $linedata[3] ?? "";
        $cost = $linedata[4] ?? "";
        $vendorid = $linedata[5] ?? "";
        /*
        $sql = "SELECT * FROM EXTERNALITEM WHERE NAMEEN = ?"; 
        $req = $db->prepare($sql);
        $req->execute(array($nameen));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($res == false){
            $db->beginTransaction(); 
            $sql = "INSERT INTO EXTERNALITEM (PRODUCTID,NAMEEN,NAMEKH,COST,NOTE) VALUES (?,?,?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($barcode,$namekh,$nameen,$note,$cost));                                        
            $itemid  = $db->lastInsertId();
            $db->commit(); 

        }else{
            $itemid = $res["ID"];
        }
        */

        $sql = "SELECT * FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($vendorid,$barcode));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            $sql = "INSERT INTO EXTERNALCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) VALUES (?,?,?)";
            $req = $db->prepare($sql);
            $req->execute(array($vendorid,$barcode,$cost));
        }
        
        $sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
        $req = $dbBlue->prepare($sql);
        $req->execute(array($barcode));        
    }
    fclose($itemsfile);
}

// TODO INSERT HOME MARKET
function transferVendorData(){
    $db = getInternalDatabase();
    $ids = ["35","36","40","41","42","43","57","58","62","71","72","73","74","75","76","77","78","87"];
    foreach($ids as $id){
        $sql = "SELECT * FROM EXTERNALVENDOR WHERE ID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($id));        
        $res = $req->fetch(PDO::FETCH_ASSOC);

        $sql = "INSERT INTO EXTERNALFRUITVENDOR (NAMEEN,NAMEKH,WEBSITE,PHONE1,PHONE2,
                                                PHONE3,PHONE4,ADDRESS1,ADDRESS2,COMMUNICATIONTYPE1,
                                                COMMUNICATIONHANDLE1,COMMUNICATIONTYPE2,COMMUNICATIONHANDLE2,COMMENT,CREATED) 
                                                VALUES (?,?,?,?,?,
                                                        ?,?,?,?,?,
                                                        ?,?,?,?,?)";                                                        
        $req = $db->prepare($sql);
        $req->execute(array(
            $res["NAMEEN"],$res["NAMEKH"],$res["WEBSITE"],$res["PHONE1"],$res["PHONE2"],
            $res["PHONE3"],$res["PHONE4"],$res["ADDRESS1"],$res["ADDRESS2"],$res["COMMUNICATIONTYPE1"],
            $res["COMMUNICATIONHANDLE1"],$res["COMMUNICATIONTYPE2"],$res["COMMUNICATIONHANDLE2"],$res["COMMENT"],$res["CREATED"]
        ));

    }
    
    
    

}

function detachOld(){
    $db = getInternalDatabase();
    $ids = ["35","36","40","41","42","43","57","58","62","71","72","73","74","75","76","77","78","87"];
    foreach($ids as $id){
        $sql = "DELETE FROM EXTERNALVENDOR WHERE ID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($id));

        $sql = "DELETE FROM EXTERNALCOST WHERE ID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($id));
    }
}

function insertDetachedVendors()
{
    //HOME MARKET 400-461 -> EXTERNALVENDOR_ID 95
    //CHHUN HUONG 400-470 -> EXTERNALVENDOR_ID 83
    //DIN HOL SALE 400-626 -> EXTERNALVENDOR_ID 51
    //SIAM FOOD 400-599 -> EXTERNALVENDOR_ID 46
    //DA LIN SALE 400-625 -> EXTERNALVENDOR_ID 82
    $db = getInternalDatabase();
    $dbBlue = getDatabase();    
    
    $vendorids = array(83,51,46,82,95);

    foreach($vendorids as $vendorid)
    {
        $sql = "SELECT PONUMBER FROM POHEADER WHERE VENDID = ";
        $req = $dbBlue->prepare($sql);
        $req->execute(array($vendorid));

        $pos = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($pos as $po)
        {
            $sql = "SELECT PRODUCTID,TRANCOST FROM PORECEIVEDETAIL WHERE PONUMBER = ?";
            $req = $dbBlue->prepare($sql);
            $req->execute(array($po));
            $items = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach($items as $item)
            {
                echo "  ITEM: ". $item["PRODUCTID"]."\n";
                $sql = "SELECT PRODUCTID FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";            
                $req = $db->prepare($sql);
                $req->execute(array($vendorid,$item["PRODUCTID"]));
                $res = $req->fetch(PDO::FETCH_ASSOC);            
                
                if ($res == false){
                    $sql = "INSERT INTO EXTERNALCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) VALUES (?,?,?)";
                    $req = $db->prepare($sql);
                    $req->execute(array($vendorid,$item["PRODUCTID"],$item["TRANCOST"]));
                }else{
                    $sql = "UPDATE EXTERNALCOST SET COST = ? WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
                    $req = $db->prepare($sql);
                    $req->execute(array($item["TRANCOST"],$vendorid,$item["PRODUCTID"]));                
                }
    
                $sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
                $req = $dbBlue->prepare($sql);
                $req->execute(array($item["PRODUCTID"]));    
            }

        }        
    }
    


} 



// insertDetachedVendors();
// transferVendorData();
// loopPOFruits();
// detachOld();

//insertVendors();
//insertItems();
//loopPO();
?>