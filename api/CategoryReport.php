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
function getSectionStats($name, $type)
{
	$db = getDatabase();	
	$sql = "SELECT CATEGORYID FROM ICCATEGORY WHERE ".$type." = ?";
	$req = $db->prepare($sql);
	$req->execute(array($name)); 	

	$data = array();
	$itemCount = 0;
	$itemCountActive = 0;
	$itemCountWithoutStock = 0;
	$totalStock = 0;

	$categories = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($categories as $category){
		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ?";
		$req = $db->prepare($sql);
		$res = $req->execute(array($category));
		$itemCount += $res["COUNT"];

		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
		$req = $db->prepare($sql);
		$res = $req->execute(array($category));
		$itemCountWithStock += $res["COUNT"];

		$sql = "SELECT count(PRODUCTID) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND < 0";
		$req = $db->prepare($sql);
		$res = $req->execute(array($category));
		$itemCountWithoutStock += $res["COUNT"];

		$sql = "SELECT sum(ONHAND) as 'COUNT' FROM ICPRODUCT WHERE CATEGORYID = ? AND ONHAND > 0";
		$req = $db->prepare($sql);
		$res = $req->execute(array($category));
		$totalStock += $res["COUNT"];

	}
	$data["ITEMCOUNT"] = $itemCount;
	$data["ITEMCOUNTWITHSTOCK"] = $itemCountWithStock;
	$data["ITEMCOUNTWITHOUTSTOCK"] = $itemCountWithoutStock;
	$data["TOTALSTOCK"] = $totalStock;

}

function renderOne($data)
{
	return "<table>
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
	$sections = $req->fetchAll(PDO::FETCH_ASSOC);
	var_dump($sections);
	exit;
	$render = "<table>";	
	foreach($sections as $section){
		$render .= "<tr>";
		$render .= "<td>";
		$render .= "<u>".$section."</u><br>";
		$render .= renderOne(getSectionStats($section,"SECTION"));
		$render .= "</td>";

		$render .= "<td>";
		$sql = "SELECT DISTINCT(DEPARTMENT) FROM ICCATEGORY WHERE SECTION = ?";
		$req = $db->prepare($sql);
		$req->execute(array($section));
		$departments = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($departments as $department){
			$render .= "<u>$department</u><br>";
			$render .= renderOne(getSectionStats($department,"DEPARTMENT"));			
			$render .= "<br>&nbsp;&nbsp;&nbsp;&nbsp;";						

			$sql = "SELECT CATEGORYID FROM ICATEGORY WHERE DEPARTMENT = ?";
			$req = $db->prepare($sql);
			$req->execute(array($department));
			$categories = $req->fetchAll(PDO::FETCH_ASSOC);
			foreach($categories as $category){
				$render .= "<u>$department</u><br>";
				$render .= renderOne(getSectionStats($category,"CATEGORYID"));			
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
