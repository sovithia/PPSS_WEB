<?php 
require_once("functions.php");



$stats = statisticsByItem($_GET["ID"]);


var_dump($stats);
?>