<?php 

require_once("functions.php");
// FIRST // 
// DELEGATE ORDER TO POU PEUV
// Store Clerk Transfer
// Verify rather than ask Sophal
// 1 purchase meeting per week 

// Select Department, Section, Category 

// MUST HAVE ITEM
// MUST HAVE CATEGORY
// SLOW SELL ITEM BY ROW 
// FAST SELL ITEM BY ROW
// List Number of items 
// Number of Active items
// Number of inactive items 
// Total Stock 

//NON-FOOD
//DRY GROCERY 
//FRESH

function getCategoryStats($name)
{
	$db = getDatabase();	
	$data = array();
	$itemCount = 0;
	$itemCountActive = 0;
	$itemCountWithStock = 0;
	$itemCountWithoutStock = 0;
	$totalStock = 0;

	$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($name));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$itemCount += $res["COUNT"];

	$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
	$req = $db->prepare($sql);
	$req->execute(array($name));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$itemCountWithStock += $res["COUNT"];

	$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND <= 0";
	$req = $db->prepare($sql);
	$req->execute(array($name));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$itemCountWithoutStock += $res["COUNT"];

	$sql = "SELECT sum(ONHAND) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
	$req = $db->prepare($sql);
	$req->execute(array($name));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$totalStock += $res["COUNT"];

	$data["ITEMCOUNT"] = $itemCount;
	$data["ITEMCOUNTWITHSTOCK"] = $itemCountWithStock;
	$data["ITEMCOUNTWITHOUTSTOCK"] = $itemCountWithoutStock;
	$data["TOTALSTOCK"] = $totalStock;
	return $data;
}


function getStats($name, $type)
{
	$db = getDatabase();	
	$sql = "SELECT CATEGORYID FROM ICCATEGORY WHERE ".$type." = ?";
	$req = $db->prepare($sql);
	$req->execute(array($name)); 	

	$data = array();
	$itemCount = 0;
	$itemCountActive = 0;
	$itemCountWithStock = 0;
	$itemCountWithoutStock = 0;
	$totalStock = 0;

	$categories = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($categories as $category){
		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($category["CATEGORYID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$itemCount += $res["COUNT"];

		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
		$req = $db->prepare($sql);
		$req->execute(array($category["CATEGORYID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$itemCountWithStock += $res["COUNT"];

		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND <= 0";
		$req = $db->prepare($sql);
		$req->execute(array($category["CATEGORYID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$itemCountWithoutStock += $res["COUNT"];

		$sql = "SELECT sum(ONHAND) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
		$req = $db->prepare($sql);
		$req->execute(array($category["CATEGORYID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$totalStock += $res["COUNT"];

	}
	$data["ITEMCOUNT"] = $itemCount;
	$data["ITEMCOUNTWITHSTOCK"] = $itemCountWithStock;
	$data["ITEMCOUNTWITHOUTSTOCK"] = $itemCountWithoutStock;
	$data["TOTALSTOCK"] = $totalStock;
	return $data;

}



function renderOne($data)
{
	return "<table border='1'>
				<tr><td>ITEM COUNT</td><td>".$data['ITEMCOUNT']."</td></tr>
				<tr><td>ITEM WITH STOCK</td><td>".$data['ITEMCOUNTWITHSTOCK']."</td></tr>
				<tr><td>ITEM WITHOUT STOCK</td><td>".$data['ITEMCOUNTWITHOUTSTOCK']."</td></tr>
				<tr><td>TOTALSTOCK</td><td>".$data['TOTALSTOCK']."</td></tr>
			<table>";
}

function renderAll()
{
	$db = getDatabase();

	$sql = "SELECT DISTINCT(SECTION) FROM ICCATEGORY WHERE SECTION IS NOT NULL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$sections = $req->fetchAll(PDO::FETCH_ASSOC);		
	$render = "<table>";	
	foreach($sections as $section){
		$render .= "<tr>";
		$render .= "<td>";
		$render .= "<u>".$section["SECTION"]."</u><br>";
		$render .= renderOne(getStats($section["SECTION"],"SECTION"));
		$render .= "</td>";

		$render .= "<td>";
		$sql = "SELECT DISTINCT(DEPARTMENT) FROM ICCATEGORY WHERE SECTION = ?";
		$req = $db->prepare($sql);
		$req->execute(array($section["SECTION"]));
		$departments = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($departments as $department){
			$render .= "<u>".$department["DEPARTMENT"]."</u><br>";
			$render .= renderOne(getStats($department["DEPARTMENT"],"DEPARTMENT"));			
			$render .= "<br>&nbsp;&nbsp;&nbsp;&nbsp;";						

			$sql = "SELECT CATEGORYID FROM ICCATEGORY WHERE DEPARTMENT = ?";
			$req = $db->prepare($sql);
			$req->execute(array($department["DEPARTMENT"]));
			$categories = $req->fetchAll(PDO::FETCH_ASSOC);
			foreach($categories as $category){
				$render .= "<u>".$category["CATEGORYID"]."</u><br>";
				$render .= renderOne(getCategoryStats($category["CATEGORYID"]));			
				$render .= "<br>";					
			}			
		}		
		$render .= "</td>";
		$render .= "</tr>";
	}	
	$render .= "</table>";
	echo $render;
}

renderAll();
?> 
