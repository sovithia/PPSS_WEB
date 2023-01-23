<?php 

require_once "functions.php";

function itemsWithoutStockThatSellsTheMost(){
    // Top 200 Seller in current month
}

function calculateLastDay($year,$month)
{	 
	if ($year % 400 == 0)
		$leapyear = true;
	else if ($year % 100 == 0)
		$leapyear = true;
	else if ($year % 4 == 0)
		$leapyear = true;
	else
		$leapyear = false;

	if ($month == "1")
		return "31";	
	else if ($month == "2")
	{
		if ($leapyear == true)
			return "29";
		else
			return "28";	
	}
	else if($month == "3")
		return "31";
	else if ($month == "4")
		return "30";
	else if ($month == "5")
		return "31";
	else if ($month == "6")
		return "30";
	else if ($month == "7")
		return "31";
	else if ($month == "8")
		return "31";
	else if ($month == "9")
		return "30";
	else if ($month == "10")
		return "31";
	else if ($month == "11")
		return "30";
	else if ($month == "12")
		return "31";

}

function loadStats($month,$year)
{
    $db = getDatabase();
    $indb = getInternalDatabase();
    $sql = "SELECT * FROM REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res == false)
    {
        $sql = "INSERT INTO REPORT (MONTH,YEAR,ROWDATA,TEAMDATA,SECTIONDATA,DEPARTMENTDATA,CATEGORYDATA,GENERALDATA) values (?,?,?,?,?,?,?,?)";    
        $req = $indb->prepare($sql);
        $req->execute(array($month,$year,'N/A','N/A','N/A','N/A','N/A','N/A'));    
    }

    $prevyear = $year;
	if ($month == "1"){
		$prevmonth = 12;
		$prevyear = intval($year) - 1;		
	}		
	else
		$prevmonth = sprintf("%02d",intval($month) -1);		

	$month = sprintf("%02d",intval($month));	
	$startLast = $prevyear."-".$prevmonth."-01". " 00:00:00.000";
	$endLast = $prevyear."-".$prevmonth."-".calculateLastDay($year,$prevmonth)." 23:59:59.999";
	$startCurrent = $year."-".$month."-01"." 00:00:00.000";
    $endCurrent = $year."-".$month."-".calculateLastDay($year,$month)." 23:59:59.999";
    
    // General 
    $sql = "SELECT GENERALDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res["GENERALDATA"] == 'N/A')
    {
        echo "Generating General data...\n";
        $generalData = array();
        $generalData["LAST"] = getGeneralStats($startLast,$endLast); 
        $generalData["CURRENT"] = getGeneralStats($startCurrent,$endCurrent); 
        
        $sql = "UPDATE REPORT set GENERALDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($generalData),$month,$year));
    }
    

    // Row List   
    $sql = "SELECT ROWDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    //echo ($month." ".$year);
        
    if ($res["ROWDATA"] == 'N/A')
    { 
        echo "Generating Row data...\n";
        $rowsData = array();
        $rows = array(
            "G01A","G01B","G02A","G02B","G03A","G03B","G04A","G04B","G05A","G05B",
            "GSOF","G06A","G06B","G07A","G07B","GMIL","N08A","N08B","N09A","N09B",
            "N10A","N10B","N11A","N11B","N12A","N12B","NCHA","N13A","N13B","N14A",
            "N14B","N15A","N15B","N16A","N16B","N17A","N17B","NRAC","N18A","N18B",
            "N19A","N19B","N20A","N20B","N21A","N21B","N22A","N22B","NBAB","GWIN",
            "CHIL","FROZ"
        );    
        foreach($rows as $rowname){
            echo "ROW: ".$rowname."\n";
            $sql = "SELECT distinct(PRODUCTID) FROM ICLOCATION WHERE STORBIN like ? AND LOCID = 'WH1'";
            $req = $db->prepare($sql);
            $req->execute(array('%'.$rowname.'%'));
            $items = $req->fetchAll(PDO::FETCH_ASSOC);
            $str = "(";
            foreach($items as $item){
                $str .= "'".$item["PRODUCTID"]."',";
            }
            $str = substr($str,0,-1);
            $str .= ")";
            $oneData = array();
            $oneData["NAME"] = $rowname;
            $oneData["ITEMCOUNT"] = count($items);
            $oneData["LAST"] = getProductsStats($str,$startLast,$endLast); 
            $oneData["CURRENT"] = getProductsStats($str,$startCurrent,$endCurrent); 
            array_push($rowsData,$oneData);
        }

   
        $sql = "UPDATE REPORT set ROWDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($rowsData),$month,$year));
    }

    // Team List
    $sql = "SELECT TEAMDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res["TEAMDATA"] == 'N/A')
    {
        echo "Generating Team data...\n";
        $teamsData = array();
        $teams = array();
        $teams["RAT"] = "G01A|G01B|G02A|G02B|G03A|G03B";
        $teams["OX"] = "G04A|G04B|G05A|G05B|GSOF";
        $teams["TIGER"] = "G06A|G06B|G07A|G07B|GMIL";
        $teams["HARE"] = "N08A|N08B|N09A|N09B|N10A|N10B|N11A|N11B|N12A|N12B|NCHA";
        $teams["DRAGON"] = "N13A|N13B|N14A|N14B|N15A|N15B|N16A|N16B|N17A|N17B|NRAC";
        $teams["SNAKE"] = "N18A|N18B|N19A|N19B|N20A|N20B|N21A|N21B|N22A|N22B";
        $teams["HORSE"] = "NBAB|GWIN";
        $teams["GOAT"] = "CHIL|FROZ";
        foreach($teams as $teamname => $locations){     
            echo "TEAM: ".$teamname."\n";   
            $str = "(";
            $locs = explode('|',$locations);
            foreach($locs as $loc){
                $sql = "SELECT distinct(PRODUCTID) FROM ICLOCATION WHERE STORBIN like ? AND LOCID = 'WH1'";
                $req = $db->prepare($sql);
                $req->execute(array('%'.$loc.'%'));
                $items = $req->fetchAll(PDO::FETCH_ASSOC);
                foreach($items as $item){
                    $str .= "'".$item["PRODUCTID"]."',";
                }            
            }
            $str = substr($str,0,-1);
            $str .= ")";
            $oneData = array();
            $oneData["NAME"] = $teamname;
            $oneData["ITEMCOUNT"] = count($items);
            $oneData["LAST"] = getProductsStats($str,$startLast,$endLast); // To Store
            $oneData["CURRENT"] = getProductsStats($str,$startCurrent,$endCurrent); // To Store
            array_push($teamsData,$oneData);        
        }
           
        $sql = "UPDATE REPORT set TEAMDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($teamsData),$month,$year));
    }
    
    // Sections
    $sql = "SELECT SECTIONDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res["SECTIONDATA"] == 'N/A')
    {

        echo "Generating Section data...\n";
        $sectionData = array();
        $sections = array(
            "FRESH",
            "DRY GROCERY",
            "FROZEN",
            "NON-FOOD"
        );
        foreach($sections as $section){
            echo "Section ".$section."\n";
            $sql = "SELECT CATEGORYNAME FROM CATEGORY WHERE SECTIONNAME = ?";
            $req = $indb->prepare($sql);        
            $req->execute(array($section));
            $categories = $req->fetchAll(PDO::FETCH_ASSOC);         
            $catstr = "";
            foreach($categories as $category){
            $catstr .= $category["CATEGORYNAME"]."~";     
            }
            $catstr = substr($catstr,0,-1);            
            $oneData["NAME"] = $section;
            $oneData["LAST"] = getCategoriesStats($catstr,$startLast,$endLast); 
            $oneData["CURRENT"] = getCategoriesStats($catstr,$startCurrent,$endCurrent);
            $oneData["ITEMCOUNT"] = $oneData["CURRENT"]["ITEMCOUNT"];
            array_push($sectionData,$oneData);                
        }
   
        $sql = "UPDATE REPORT SET SECTIONDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($sectionData),$month,$year));
    }
    
    // Department List
    $sql = "SELECT DEPARTMENTDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res["DEPARTMENTDATA"] == 'N/A')
    {
        echo "Generating Department data...\n";
        $departmentData = array();
        $departments = array(                      
            "BUTCHERY|EGGS|SEAFOOD",
            "PROCESSED MEAT",
            "VEGETABLE & FRUITS",
            "ORGANIC VEGETABLES & FRUITS",
            "DAIRY & MILK",
            "SALTED SNACKS",
            "STARCHES",
            "CANNED|SEALED FOOD",
            "CONDIMENTS",
            "BREAKFAST",
            "COOKING INGREDIENTS",
            "WATER & BEVERAGE",
            "WINE ",
            "LIQUOR & SPIRITUOUS",        
            "BABY CARE",
            "PET CARE",
            "SALTED FROZEN",
            "SWEET FROZEN",
            "HAIR CARE",
            "DENTAL HYGIENE",
            
            "TISSUE & WET WIPES & COTTON",            
            "BODY CARE",
            "FEMININE HYGIENE AND INCONTINENCE",
            "FACE CARE",
            "COSMETICS",
            "KIDS HYGIENE",
            "MEN CARE",
            "PHARMACY",
            "CLEANING PRODUCTS",
            "CLEANING TOOLS",
            "HOME",
            "KITCHEN",
            "OFFICE & STATIONERY",
            "MISCELLANEOUS",
            "KIDS & TOY",
            "SPORTS & RECREATION",
            "ELECTRONICS & LIGHTING",
            "TOBACCO",
            "TINKERING & CAR",
            "GARDEN & OUTDOOR",
            "TEXTILES & LUGGAGE"
        );
        foreach($departments as $department){
            echo "Department ".$department."\n";
            $sql = "SELECT SECTIONNAME,CATEGORYNAME FROM CATEGORY WHERE DEPARTMENTNAME = ?";
            $req = $indb->prepare($sql);        
            $req->execute(array($department));
            $categories = $req->fetchAll(PDO::FETCH_ASSOC);         
            $catstr = "";
            $sectionname = null;
            foreach($categories as $category){
                if ($sectionname == null)
                    $sectionname = $category["SECTIONNAME"];
                 $catstr .= $category["CATEGORYNAME"]."~";     
            }
            $catstr .= substr($catstr,0,-1);        
            $oneData["NAME"] = $sectionname.">".$department;            
            $oneData["LAST"] = getCategoriesStats($catstr,$startLast,$endLast); 
            $oneData["CURRENT"] = getCategoriesStats($catstr,$startCurrent,$endCurrent);
            $oneData["ITEMCOUNT"] = $oneData["CURRENT"]["ITEMCOUNT"];
            array_push($departmentData,$oneData);  
        }
    
        $sql = "UPDATE REPORT set DEPARTMENTDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($departmentData),$month,$year));
    }

    // Category List
    $sql = "SELECT CATEGORYDATA from REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $indb->prepare($sql);
    $req->execute(array($month,$year));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res["CATEGORYDATA"] == 'N/A')
    {
        echo "Generating Category data...\n";
        $categoryData = array();    
        $sql = "SELECT CATEGORYNAME,SECTIONNAME,DEPARTMENTNAME FROM CATEGORY GROUP BY SECTIONNAME,DEPARTMENTNAME";
        $req = $indb->prepare($sql);
        $req->execute(array());
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($categories as $category){
            echo "Category: ".$category["CATEGORYNAME"]."\n";      
            $oneData["NAME"] = $category["SECTIONNAME"].">".$category["DEPARTMENTNAME"].">".$category["CATEGORYNAME"];
            $oneData["LAST"] = getCategoriesStats($category["CATEGORYNAME"],$startLast,$endLast); 
            $oneData["CURRENT"] = getCategoriesStats($category["CATEGORYNAME"],$startCurrent,$endCurrent);
            $oneData["ITEMCOUNT"] = $oneData["CURRENT"]["ITEMCOUNT"];
            array_push($categoryData,$oneData);  
        }
    
        $sql = "UPDATE REPORT set CATEGORYDATA = ? WHERE MONTH = ? AND YEAR = ?";
        $req = $indb->prepare($sql);
        $req->execute(array(json_encode($categoryData),$month,$year));
    }
    echo "Finished !";
    
}

function difference($last,$current, $inverse = false){
    if ($last == $current)
        return "<p style='background-color:yellow'>No variation</p>";
    else if ($last > $current)
    {
        $percentChange = 0;
        if ($current != "0" && $current != 0)
        {
            $percentChange = ($last * 100) / $current;
            $percentChange = round($percentChange - 100,2);
            if ($inverse == true)
                return "<p style='background-color:green'>Decrease of " . $percentChange . "%</p>";
            else 
                return "<p style='background-color:red'>Decrease of " . $percentChange . "%</p>";
        }
        else
            return "<p style='background-color:red'>Decrease of " . $last . "%</p>";
    }                    
    else if ($last < $current) 
    {
        $percentChange = 0;
        if ($last != 0)
            $increase = ($current - $last) / $last * 100;
        else
            $increase = $current;
        $increase = round($increase,2);
        if ($inverse)
            return "<p style='background-color:red'>Increase of " . $increase . "%</p>";
        else 
            return "<p style='background-color:green'>Increase of " . $increase . "%</p>";
    }                    
    return "";
}


function getCategoriesStats($name, $begin,$end)
{		        
    $indb = getInternalDatabase();
    $db = getDatabase();
	$data = array();
	
    $cats = explode('~',$name);  
    $catstr = "(";
    foreach($cats as $cat){
        $catstr .= "'".$cat."',";
    }    
    $catstr = substr($catstr,0,-1);
    $catstr .=  ")";

    $sql = "SELECT count(PRODUCTID) as 'CNT' FROM ICPRODUCT WHERE CATEGORYID IN ".$catstr;
    $req = $db->prepare($sql);
    $req->execute(array());
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $itemCount = $res["CNT"];

    $str = "(SELECT PRODUCTID FROM ICPRODUCT WHERE CATEGORYID IN ".$catstr.")";
    $sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE CATEGORYID IN ".$catstr;
    $req = $db->prepare($sql);
    $req->execute(array());
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($items) == 0){
        $productids = "('00000000')";
    }else{
        $productids = "(";
        foreach($items as $item){
            $productids .= "'".$item["PRODUCTID"]."',";
        }    
        $productids = substr($productids,0,-1);
        $productids .= ")";
    }

    $stats = getProductsStats($productids, $begin,$end);
    return $stats;
}

function getProductsStats($productids, $begin,$end){
    $str = $productids;
    $db = getDatabase();
    $indb = getInternalDatabase();
	$itemCount = count(explode(",",$productids)); 
        
    // Transfer Quantity 
    $transferQuantity = 0;
    $sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER'  AND REQUEST_UPDATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $actions = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($actions as $action){
        $sql = "SELECT SUM(REQUEST_QUANTITY)  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ? AND PRODUCTID in ".$productids;
        $req = $indb->prepare($sql);
        $req->execute(array($action["ID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $transferQuantity  += $res["COUNT"] ?? "0";
    }

    // Transfer NBItems 
    $transferNbitems = 0;
    $sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND REQUEST_UPDATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $actions = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($actions as $action){
        $sql = "SELECT count(distinct(PRODUCTID))  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ? AND PRODUCTID in ".$productids;
        $req = $indb->prepare($sql);
        $req->execute(array($action["ID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $transferNbitems  += $res["COUNT"] ?? "0";
    }
    // Transfer Items
    $sql = "SELECT distinct(PRODUCTID),
           (SELECT sum(REQUEST_QUANTITY) FROM ITEMREQUEST WHERE ITEMREQUEST.PRODUCTID = IR.PRODUCTID 
                AND ITEMREQUEST.ITEMREQUESTACTION_ID = IR.ITEMREQUESTACTION_ID) as 'QUANTITY'                
           FROM ITEMREQUESTACTION,ITEMREQUEST as IR
           WHERE ITEMREQUESTACTION.ID = IR.ITEMREQUESTACTION_ID   
           AND TYPE = 'TRANSFER'  
           AND PRODUCTID in ".$productids." AND REQUEST_TIME BETWEEN ? AND ?";        
    $req = $indb->prepare($sql);                           
    $req->execute(array($begin,$end));
    $transferItems = $req->fetchAll(PDO::FETCH_ASSOC);

    // Waste Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) as 'CNT' FROM WASTEITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteNbItems = $res["CNT"];
    // Waste Quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM WASTEITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteQuantity = $res["CNT"];

    // Waste Amount
    
    $wasteAmount = 0;
    $extracted = substr($productids,1,-1);    
    $allproductid = explode(',',$extracted);     
    foreach($allproductid as $productid){
        $productid = substr($productid,1,-1);        
        $sql = "SELECT sum(QUANTITY) as 'CNT' FROM WASTEITEM WHERE PRODUCTID = ? AND CREATED BETWEEN ? AND ?";
        $req = $indb->prepare($sql);
        $req->execute(array($productid,$begin,$end));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $theQuantity = $res["CNT"];

        $sql = "SELECT LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($productid));
        $res = $req->fetch(PDO::FETCH_ASSOC);        
        $thePrice = $res["LASTCOST"] ?? 0;        
        $wasteAmount += $theQuantity * $thePrice;
    }

    // Waste Items
    $sql = "SELECT distinct(PRODUCTID),
            (SELECT sum(QUANTITY) FROM WASTEITEM WHERE WASTEITEM.PRODUCTID = WI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM WASTEITEM as WI
            WHERE PRODUCTID in ".$productids." 
            AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $wasteItems = $req->fetchAll(PDO::FETCH_ASSOC);
                            
    // Self Promotion Quantity
    $sql = "SELECT sum(QUANTITY1) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $selfpromoQuantity = $res["CNT"];
    // Self Promotion NbItem
    $sql = "SELECT count(distinct(PRODUCTID)) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $selfpromoNbItems = $res["CNT"];
    // Self Promotion Items
    $sql = "SELECT distinct(PRODUCTID),PERCENTPROMO1,                
            (select sum(QUANTITY1) FROM SELFPROMOTIONITEM WHERE SELFPROMOTIONITEM.PRODUCTID = SPI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM SELFPROMOTIONITEM as 'SPI'
            WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $selfpromotionItems = $req->fetchAll(PDO::FETCH_ASSOC);

    // Return Nb item
    $sql = "SELECT count(PRODUCTID) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $returnNbItems = $res["CNT"];
    // Return quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $returnQuantity = $res["CNT"];
    // Return Items
    $sql = "SELECT distinct(PRODUCTID),
            (select sum(QUANTITY) FROM RETURNRECORDITEM WHERE RETURNRECORDITEM.PRODUCTID = RRI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM RETURNRECORDITEM as 'RRI'
            WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $returnItems = $req->fetchAll(PDO::FETCH_ASSOC);

    // Return Amount
    $returnAmount = 0;
    $extracted = substr($productids,1,-1);
    $allproductid = explode(',',$extracted);    
    foreach($allproductid as $productid){
        $productid = substr($productid,1,-1);
        //echo $productid."\n";
        $sql = "SELECT sum(QUANTITY) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID = ? AND CREATED BETWEEN ? AND ?";        
        $req = $indb->prepare($sql);
        $req->execute(array($productid,$begin,$end));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $theQuantity = $res["CNT"];

        $sql = "SELECT LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($productid));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $thePrice = $res["LASTCOST"] ?? 0;
        $returnAmount += $theQuantity * $thePrice;
    }

    // Sale Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND  POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $saleNbItems = $res["CNT"];
    // Sale Quantity
    $sql = "SELECT sum(QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $saleQuantity = $res["CNT"];


    // Receive Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) AS 'CNT' FROM PODETAIL WHERE PRODUCTID in ".$str." AND POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $receiveNbItems = $res["CNT"];
    // Receive Quantity
    $sql = "SELECT sum(RECEIVE_QTY) AS 'CNT' FROM PODETAIL WHERE PRODUCTID in ".$str." AND POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $receiveQuantity = $res["CNT"];
    // Sale Income
    $sql = "SELECT sum(PRICE * QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $saleIncome = $res["CNT"];

    // Sale Margin
    $sql = "SELECT sum((PRICE - COST) * QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $saleMargin = $res["CNT"];

    $data["ITEMCOUNT"] = $itemCount;
    $data["TRANSFERQUANTITY"] =  $transferQuantity != "" ?  $transferQuantity : "0";
    $data["TRANSFERNBITEMS"] = $transferNbitems != "" ? $transferNbitems : "0";
    $data["TRANSFERITEMS"] = $transferItems; 
    
    $data["WASTENBITEMS"] = $wasteNbItems != "" ? $wasteNbItems : "0" ;
    $data["WASTEQUANTITY"] = $wasteQuantity != "" ? $wasteQuantity : "0";
    $data["WASTEAMOUNT"] = $wasteAmount != "" ? $wasteAmount : "0";
    $data["WASTEITEMS"] = $wasteItems; 

    $data["SELFPROMONBITEMS"] = $selfpromoNbItems != "" ? $selfpromoNbItems : "0";
    $data["SELFPROMOQUANTITY"] = $selfpromoQuantity != "" ? $selfpromoQuantity : "0";
    $data["SELFPROMOTIONITEMS"] = $selfpromotionItems; 

    $data["RETURNNBITEMS"] = $returnNbItems != "" ? $returnNbItems : "0";
    $data["RETURNQUANTITY"] = $returnQuantity != "" ? $returnQuantity : "0";    
    $data["RETURNAMOUNT"] =  $returnAmount != "" ? $returnAmount : "0"; 
    $data["RETURNITEMS"] =  $returnItems; 

    $data["SALENBITEMS"] = $saleNbItems != "" ? $saleNbItems : "0";
    $data["SALEQUANTITY"] = $saleQuantity != "" ? $saleQuantity : "0";
    $data["RECEIVENBITEMS"] = $receiveNbItems != "" ? $receiveNbItems : "0";
    $data["RECEIVEQUANTITY"] = $receiveQuantity != "" ? $receiveQuantity : "0";
    $data["SALEINCOME"] = $saleIncome != "" ? $saleIncome : "0";
    $data["SALEMARGIN"] = $saleMargin != "" ? $saleMargin : "0";
    
    return $data;
}

function getGeneralStats($begin,$end){    
    $db = getDatabase();
    $indb = getInternalDatabase();

    // Transfer Quantity 
    $transferQuantity = 0;
    $sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND REQUEST_UPDATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($actions as $action){
		$sql = "SELECT SUM(REQUEST_QUANTITY)  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($action["ID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$transferQuantity  += $res["COUNT"] ?? "0";
	}

    // Transfer NBItems 
    $transferNbitems = 0;
    $sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND REQUEST_UPDATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($actions as $action){
		$sql = "SELECT count(distinct(PRODUCTID))  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($action["ID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$transferNbitems  += $res["COUNT"] ?? "0";
	}
    $sql = "SELECT distinct(PRODUCTID),
    (SELECT sum(REQUEST_QUANTITY) FROM ITEMREQUEST WHERE ITEMREQUEST.PRODUCTID = IR.PRODUCTID 
         AND ITEMREQUEST.ITEMREQUESTACTION_ID = IR.ITEMREQUESTACTION_ID) as 'QUANTITY'                
    FROM ITEMREQUESTACTION,ITEMREQUEST as IR
    WHERE ITEMREQUESTACTION.ID = IR.ITEMREQUESTACTION_ID   
    AND TYPE = 'TRANSFER'  
    AND REQUEST_TIME BETWEEN ? AND ?
    LIMIT 2000";        
    $req = $indb->prepare($sql);                           
    $req->execute(array($begin,$end));
    $transferItems = $req->fetchAll(PDO::FETCH_ASSOC);

    // Waste Nb Items
	$sql = "SELECT count(distinct(PRODUCTID)) as 'CNT' FROM WASTEITEM WHERE CREATED BETWEEN ? AND ?";    
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteNbItems = $res["CNT"];
    // Waste Quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM WASTEITEM WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteQuantity = $res["CNT"];

    // Waste Amount
    $wasteAmount = 0;
    $sql = "SELECT distinct(PRODUCTID) FROM WASTEITEM WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $productids = $req->fetchAll(PDO::FETCH_ASSOC);      
    foreach($productids as $productid){
          $sql = "SELECT sum(QUANTITY) as 'CNT' FROM WASTEITEM WHERE PRODUCTID = ? AND CREATED BETWEEN ? AND ?";
          $req = $indb->prepare($sql);
          $req->execute(array($productid["PRODUCTID"],$begin,$end));
          $res = $req->fetch(PDO::FETCH_ASSOC);
          $theQuantity = $res["CNT"];
  
          $sql = "SELECT LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
          $req = $db->prepare($sql);
          $req->execute(array($productid["PRODUCTID"]));
          $res = $req->fetch(PDO::FETCH_ASSOC);
          $thePrice = $res["LASTCOST"];
          $wasteAmount += $theQuantity * $thePrice;
    }
      
    // Waste Items
    $sql = "SELECT distinct(PRODUCTID),
            (SELECT sum(QUANTITY) FROM WASTEITEM WHERE WASTEITEM.PRODUCTID = WI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM WASTEITEM as WI
            WHERE PRODUCTID 
            AND CREATED BETWEEN ? AND ?
            LIMIT 2000";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $wasteItems = $req->fetchAll(PDO::FETCH_ASSOC);

    // Self Promotion Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) as 'CNT' FROM SELFPROMOTIONITEM WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $selfpromoQuantity = $res["CNT"];
    // Self Promotion Quantity
	$sql = "SELECT sum(QUANTITY1) as 'CNT' FROM SELFPROMOTIONITEM WHERE  CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$selfpromoNbItems = $res["CNT"];
    // Self Promotion items
    $sql = "SELECT distinct(PRODUCTID),                
            (select sum(QUANTITY1) FROM SELFPROMOTIONITEM WHERE SELFPROMOTIONITEM.PRODUCTID = SPI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM SELFPROMOTIONITEM as 'SPI'
            WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $selfpromotionItems = $req->fetchAll(PDO::FETCH_ASSOC);

     // Return Nb item
	$sql = "SELECT count(distinct(PRODUCTID)) as 'CNT' FROM RETURNRECORDITEM WHERE  CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$returnNbItems = $res["CNT"];
    // Return quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM RETURNRECORDITEM WHERE  CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$returnQuantity = $res["CNT"];

    $sql = "SELECT distinct(PRODUCTID),
            (select sum(QUANTITY) FROM RETURNRECORDITEM WHERE RETURNRECORDITEM.PRODUCTID = RRI.PRODUCTID AND CREATED BETWEEN ? AND ?) as 'QUANTITY'
            FROM RETURNRECORDITEM as 'RRI'
            WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end,$begin,$end));
    $returnItems = $req->fetchAll(PDO::FETCH_ASSOC);

     // Return Amount
     $returnAmount = 0;
     $sql = "SELECT distinct(PRODUCTID) FROM RETURNRECORDITEM WHERE CREATED BETWEEN ? AND ?";
     $req = $indb->prepare($sql);
     $req->execute(array($begin,$end));
     $allproductid = $req->fetchAll(PDO::FETCH_ASSOC); 
    
     foreach($allproductid as $productid){
         $sql = "SELECT sum(QUANTITY) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID = ? AND CREATED BETWEEN ? AND ?";        
         $req = $indb->prepare($sql);
         $req->execute(array($productid["PRODUCTID"],$begin,$end));
         $res = $req->fetch(PDO::FETCH_ASSOC);
         $theQuantity = $res["CNT"];
 
         $sql = "SELECT LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
         $req = $db->prepare($sql);
         $req->execute(array($productid["PRODUCTID"]));
         $res = $req->fetch(PDO::FETCH_ASSOC);
         $thePrice = $res["LASTCOST"];
         $returnAmount += $theQuantity * $thePrice;
     }

    // Sale Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) AS 'CNT' FROM dbo.POSDETAIL WHERE  POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$saleNbItems = $res["CNT"];
    // Sale Quantity
    $sql = "SELECT sum(QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE  POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$saleQuantity = $res["CNT"];

    // Receive Nb Items
    $sql = "SELECT count(distinct(PRODUCTID)) AS 'CNT' FROM PODETAIL WHERE  POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$receiveNbItems = $res["CNT"];
    // Receive Quantity
    $sql = "SELECT sum(RECEIVE_QTY) AS 'CNT' FROM PODETAIL WHERE  POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$receiveQuantity = $res["CNT"];

    // Sale Income
    $sql = "SELECT sum(PRICE * QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$saleIncome = $res["CNT"];

    // Sale Margin
    $sql = "SELECT sum((PRICE - COST) * QTY) AS 'CNT' FROM dbo.POSDETAIL WHERE POSDATE BETWEEN  ? AND ?"; 
    $req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$saleMargin = $res["CNT"];

     // Total Customer
     $sql = "SELECT count(*) AS 'CNT' FROM dbo.POSDETAIL WHERE POSDATE BETWEEN  ? AND ?"; 
     $req = $db->prepare($sql);
     $req->execute(array($begin,$end));
     $res = $req->fetch(PDO::FETCH_ASSOC);
     $totalCustomer = $res["CNT"];

     $sql = "SELECT  AVG(PAID_AMT) AS BASKET FROM POSCASH WHERE POSDATE between ? AND ?";     
     $req = $db->prepare($sql);
	 $req->execute(array($begin,$end));
	 $res = $req->fetch(PDO::FETCH_ASSOC);
	 $averageBasket = $res["BASKET"];

    // Loss Promo NBITEMS & Loss Promo QTY
    $promoLossItems = array();
    $promoLossNbItems = 0;
    $promoLossQuantity = 0;

    $sql = "SELECT DISTINCT(PRODUCTID),
            (SELECT sum(QUANTITY1) FROM SELFPROMOTIONITEM WHERE SELFPROMOTIONITEM.PRODUCTID = SPI.PRODUCTID) as 'QUANTITY',
            (SELECT sum(PERCENTPROMO1 + PERCENTPROMO2 + PERCENTPROMO3 + PERCENTPROMO4) FROM SELFPROMOTIONITEM WHERE SELFPROMOTIONITEM.PRODUCTID = SPI.PRODUCTID) as 'PERCENTPROMO'
             FROM SELFPROMOTIONITEM as 'SPI'
             WHERE CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $items = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($items as $item){
        $sql = "SELECT PRICE,isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 4)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'LASTCOST'
                FROM ICPRODUCT 
                WHERE PRODUCTID = ?";
        $req = $db->prepare($sql);
        $req->execute(array($item["PRODUCTID"]));
        $res = $req->fetch(PDO::FETCH_ASSOC);

        $price = $res != false ? $res["PRICE"] : 0;
        $promo = $item != false ? $item["PERCENTPROMO"] : 0;
        $lastcost = $res != false ? $res["LASTCOST"] : 0;
        $finalPrice = $price - ($price * ($promo / 100));
        if ($finalPrice < $lastcost){
            $promoLossNbItems++;
            $promoLossQuantity += $item["QUANTITY"];
            $data = array();
            $data["PRODUCTID"] = $item["PRODUCTID"];
            $data["QUANTITY"] = $item["QUANTITY"];
            array_push($promoLossItems,$data);
        }
    }
    // 
    $data["PROMOLOSSQUANTITY"] = $promoLossQuantity;
    $data["PROMOLOSSNBITEMS"] = $promoLossNbItems;
    $data["PROMOLOSSITEMS"] = $promoLossItems;

    $data["WASTENBITEMS"] = $wasteNbItems != "" ? $wasteNbItems : "0" ;
    $data["WASTEQUANTITY"] = $wasteQuantity != "" ? $wasteQuantity : "0";
    $data["WASTEAMOUNT"] = $wasteAmount != "" ? $wasteAmount : "0";
    $data["WASTEITEMS"] = $wasteItems;

    $data["SELFPROMONBITEMS"] = $selfpromoNbItems != "" ? $selfpromoNbItems : "0";
    $data["SELFPROMOQUANTITY"] = $selfpromoQuantity != "" ? $selfpromoQuantity : "0";

    $data["RETURNNBITEMS"] = $returnNbItems != "" ? $returnNbItems : "0";
    $data["RETURNQUANTITY"] = $returnQuantity != "" ? $returnQuantity : "0"; 
    $data["RETURNAMOUNT"] = $returnAmount != "" ? $returnAmount : "0";
    $data["RETURNITEMS"] = $returnItems;   
	
    $data["SALENBITEMS"] = $saleNbItems != "" ? $saleNbItems : "0";
	$data["SALEQUANTITY"] = $saleQuantity != "" ? $saleQuantity : "0";
    $data["RECEIVENBITEMS"] = $receiveNbItems != "" ? $receiveNbItems : "0";
    $data["RECEIVEQUANTITY"] = $receiveQuantity != "" ? $receiveQuantity : "0";

    $data["SALEINCOME"] = $saleIncome != "" ? $saleIncome : "0";
    $data["SALEMARGIN"] = $saleMargin != "" ? $saleMargin : "0";
    $data["TOTALCUSTOMER"] = $totalCustomer != "" ? $totalCustomer : "0";
    $data["AVERAGEBASKET"] = $averageBasket != "" ? $averageBasket : "0";

    $data["TRANSFERNBITEMS"] = $transferNbitems != "" ? $transferNbitems : "0";
    $data["TRANSFERQUANTITY"] =  $transferQuantity != "" ? $transferQuantity : "0";

    $data["TRANSFERITEMS"] = $transferItems;
    $data["SELFPROMOTIONITEMS"] = $selfpromotionItems;
    

	return $data;
}

loadStats("10","2022");
?>