<?php 

function getDatabase()
{ 	
    $conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');
	return $conn;
}

function getInternalDatabase($base = "MAIN")
{
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

function insertVendors()
{
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

function insertItems()
{
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


insertVendors();
insertItems();
?>