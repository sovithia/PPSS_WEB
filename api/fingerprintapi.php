<?php 


$dbName = "Att2003.mdb";
$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb,*.accdb)};charset=UTF-8; DBQ=$dbName; Uid=; Pwd=;");

$sql = "SELECT Userid,name FROM Userid";
$req = $db->prepare($sql);
$req->execute(array());
$res = $req->fetchAll(PDO::FETCH_ASSOC);

var_dump($res);


?>