<?php 

require_once 'functions.php';

function go()
{
    $db = getInternalDatabase();
    $dbBlue = getDatabase();


    $sql = "select PONUMBER FROM  POHEADER WHERE DATEADD > '2021-01-21 00:00:00.000'";

    $req = $dbBlue->prepare($sql);
    $req->execute(array());
    $allpo = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($allpo as $po){
        echo "TESTING ID: ".$po["PONUMBER"]."\n";
        $sql = "SELECT * FROM SUPPLY_RECORD WHERE PONUMBER = ?";        
        $req = $db->prepare($sql);
        $req->execute(array($po["PONUMBER"]));       
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false){
            echo "INSERTING: ".$po["PONUMBER"]."\n";
            $sql = "SELECT USERADD,DATEADD,VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
            $req = $dbBlue->prepare($sql);
            $req->execute(array($po["PONUMBER"]));    
            $onepoheader = $req->fetch(PDO::FETCH_ASSOC);


			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , 
                        STATUS,TYPE, AUTOVALIDATED,VALIDATOR_USER,WAREHOUSE_USER,
                        RECEIVER_USER,ACCOUNTANT_USER,ANOMALY_STATUS) 
                    VALUES (?,?,?,?,?,
                            ?,?,?,?,?,
                            ?,?,?)"; 
			$req = $db->prepare($sql);
			$req->execute(array($po["PONUMBER"], $onepoheader["USERADD"], $onepoheader["VENDID"], $onepoheader["VENDNAME"],$onepoheader["DATEADD"],                                
            'PAID','NOPO','YES','AUTO','AUTO',
            'AUTO','AUTO','NOANOMALY'));		        
        }
    }
}

function patchPODetail()
{
    $sql = "SELECT PONUMBER"
}

go();




?>