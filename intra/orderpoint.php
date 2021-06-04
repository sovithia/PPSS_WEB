<?php 

function getDatabase()
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


$row = 1;
$db = getDatabase();
if (($handle = fopen("orderpoint.csv", "r")) !== FALSE) 
{
    $i = 1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
    {
        if ($i > 27000)
        {
            $splitted = explode(';',$data[0]);    
            $sql = "SELECT PRODUCTID FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = 'WH1'";
            $req = $db->prepare($sql);

            $req->execute(array($splitted[0]));
            $res = $req->fetch();

            echo $i."\n";

            if ($res == true){            
                $sql2 = "UPDATE ICLOCATION SET ORDERPOINT = ?, ORDERQTY = ? WHERE PRODUCTID = ? AND LOCID = 'WH1'";
                $req2 = $db->prepare($sql2);
                $req2->execute(array($splitted[1],$splitted[2],$splitted[0]));            
            }else{
                //echo $splitted[0]."\n";
            }
        }
        $i++;
        //if($i % 50 == 0)
        //    sleep(1);

    }
    fclose($handle);
}

?>