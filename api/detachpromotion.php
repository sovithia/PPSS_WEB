<?php 

function getDatabase()
{ 	
	$conn = null;   
    $conn = new PDO('sqlsrv:Server=119.82.252.226\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue');       
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  	 
	return $conn;
}

function detachPromotion()
{
    $db = getDatabase();
    $sql = "UPDATE ICLOCATION SET DISC_PERCENT = 0,DATEEDIT = GETDATE() 
            WHERE LOCID = 'WH1'
            AND PRODUCTID IN (SELECT PRODUCTID FROM ICPRODUCT WHERE DISCABLE = 1)                        
           ";
    $req = $db->prepare($sql);       
    $req->execute(array());    
    echo "Detaching promotion\n";
}
detachPromotion();

?>