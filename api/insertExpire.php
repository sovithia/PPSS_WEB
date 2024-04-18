<?php 


function getInternalDatabase()
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


function insertExpirations()
{
	$db = getInternalDatabase();

	if (($handle = fopen("expiration.csv", "r")) !== FALSE) 
	{
    	while (($data = fgetcsv($handle, 9000, ";")) !== FALSE) 
    	{        	
        	
        	$data["PRODUCTID"] = $data[1];
        	$data["PRODUCTNAME"] = $data[2];
        	$data["VENDNAME"] = $data[3];
        	$data["VENDID"] = $data[4];
			$data["QUANTITY"] = $data[5];
        	$data["EXPIRATION"] = $data[6];
			$data["TYPE"] = $data[7];
			$data["STOREBINSTR"] = $data[8];  
            if ($data["TYPE"] == "RETURN")
        	    $data["POLICY"] = "R".$data[9];
            else 
                $data["POLICY"] = "NR".$data[9];
        	$sql = "INSERT INTO ITEMEXPIRATION (PRODUCTID,PRODUCTNAME,VENDNAME,VENDID,QUANTITY,
        										EXPIRATION,TYPE,STOREBINSTR,POLICY,PONUMBER,
												STATUS,STOREBINWH) VALUES (?,?,?,?,?,
																?,?,?,?,?,
																?,?)";
        	$req = $db->prepare($sql);
        	$req->execute(array($data["PRODUCTID"],$data["PRODUCTNAME"],$data["VENDNAME"],$data["VENDID"],$data["QUANTITY"], 
								$data["EXPIRATION"],$data["TYPE"],$data["STOREBINSTR"],$data["POLICY"],"N/A","ACTIVE",""));								            
    	}


    	fclose($handle);
	}
}

insertExpirations();
?>