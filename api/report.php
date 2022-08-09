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

function renderOne($data, $lastincome,$lastmargin,$currentincome,$currentmargin){
    
    $display = "";
    foreach($data as $onedata){
        $last = $onedata["LAST"];
        $current = $onedata["CURRENT"];    

        $DIFFWASTENBITEMS = difference($last["WASTENBITEMS"],$current["WASTENBITEMS"],true);
        $DIFFWASTEQUANTITY = difference($last["WASTEQUANTITY"],$current["WASTEQUANTITY"],true);
        $DIFFSELFPROMONITEMS = difference($last["SELFPROMONBITEMS"],$current["SELFPROMONBITEMS"]);
        $DIFFSELFPROMOQUANTITY = difference($last["SELFPROMOQUANTITY"],$current["SELFPROMOQUANTITY"]);
        $DIFFRETURNNBITEMS = difference($last["RETURNNBITEMS"],$current["RETURNNBITEMS"],true);
        $DIFFRETURNQUANTITY = difference($last["RETURNQUANTITY"],$current["RETURNQUANTITY"],true);
        $DIFFSALENBITEMS = difference($last["SALENBITEMS"],$current["SALENBITEMS"]);
        $DIFFSALEQUANTITY = difference($last["SALEQUANTITY"],$current["SALEQUANTITY"]);
        $DIFFRECEIVENBITEMS = difference($last["RECEIVENBITEMS"],$current["RECEIVENBITEMS"]);
        $DIFFRECEIVEQUANTITY = difference($last["RECEIVEQUANTITY"],$current["RECEIVEQUANTITY"]);
        $DIFFSALEINCOME = difference($last["SALEINCOME"],$current["SALEINCOME"]);
        $DIFFSALEMARGIN = difference($last["SALEMARGIN"],$current["SALEMARGIN"]);

        $LASTPERCENTINCOME = round($last["SALEINCOME"] * 100 / $lastincome,2);
        $LASTPERCENTMARGIN = round($last["SALEMARGIN"] * 100 / $lastmargin,2);
        $CURRENTPERCENTINCOME = round($current["SALEINCOME"] * 100 / $currentincome,2);        
        $CURRENTPERCENTMARGIN = round($current["SALEMARGIN"] * 100 / $currentmargin,2);
        $DIFFPERCENTINCOME = difference($LASTPERCENTINCOME,$CURRENTPERCENTINCOME);
        $DIFFPERCENTMARGIN = difference($LASTPERCENTMARGIN,$CURRENTPERCENTMARGIN);

        $display .=   
        "<table border='1'>
        <tr><td colspan=4><center><b>".$onedata["NAME"]."</b>:".$onedata["ITEMCOUNT"]." items</center></td></tr>
        <tr><td>STATS</td><td>LASTMONTH</td><td>CURRENTMONTH</td><td>EVOLUTION</td></tr> 
        <tr><td>WASTE NBITEMS</td><td>".$last["WASTENBITEMS"]."</td><td>".$current["WASTENBITEMS"]."</td><td>".$DIFFWASTENBITEMS."</td></tr>
        <tr><td>WASTE QUANTITY</td><td>".$last["WASTEQUANTITY"]."</td><td>".$current["WASTEQUANTITY"]."</td><td>".$DIFFWASTEQUANTITY."</td></tr>
        <tr><td>SELFPROMO NBITEMS</td><td>".$last["SELFPROMONBITEMS"]."</td><td>".$current["SELFPROMONBITEMS"]."</td><td>".$DIFFSELFPROMONITEMS."</td></tr>
        <tr><td>SELFPROMO QTY</td><td>".$last["SELFPROMOQUANTITY"]."</td><td>".$current["SELFPROMOQUANTITY"]."</td><td>".$DIFFSELFPROMOQUANTITY."</td></tr>
        <tr><td>RETURN NBITEMS</td><td>".$last["RETURNNBITEMS"]."</td><td>".$current["RETURNNBITEMS"]."</td><td>".$DIFFRETURNNBITEMS."</td></tr>
        <tr><td>RETURN QTY</td><td>".$last["RETURNQUANTITY"]."</td><td>".$current["RETURNQUANTITY"]."</td><td>".$DIFFRETURNQUANTITY."</td></tr>
        <tr><td>SALE NBITEMS</td><td>".$last["SALENBITEMS"]."</td><td>".$current["SALENBITEMS"]."</td><td>".$DIFFSALENBITEMS."</td></tr>
        <tr><td>SALE QTY</td><td>".round($last["SALEQUANTITY"],2)."</td><td>".round($current["SALEQUANTITY"],2)."</td><td>".$DIFFSALEQUANTITY."</td></tr>
        <tr><td>RECEIVE NBITEMS</td><td>".$last["RECEIVENBITEMS"]."</td><td>".$current["RECEIVENBITEMS"]."</td><td>".$DIFFRECEIVENBITEMS."</td></tr>
        <tr><td>RECEIVE QTY</td><td>".round($last["RECEIVEQUANTITY"],2)."</td><td>".round($current["RECEIVEQUANTITY"],2)."</td><td>".$DIFFRECEIVEQUANTITY."</td></tr>       
        <tr><td>SALE INCOME</td><td>".round($last["SALEINCOME"],2)."</td><td>".round($current["SALEINCOME"],2)."</td><td>".$DIFFSALEINCOME."</td></tr>
        <tr><td>SALE % INCOME</td><td>".$LASTPERCENTINCOME."</td><td>".$CURRENTPERCENTINCOME."</td><td>".$DIFFPERCENTINCOME."</td></tr>        
        <tr><td>SALE MARGIN</td><td>".round($last["SALEMARGIN"],2)."</td><td>".round($current["SALEMARGIN"],2)."</td><td>".$DIFFSALEMARGIN."</td></tr>       
        <tr><td>SALE % MARGIN</td><td>".$LASTPERCENTMARGIN."</td><td>".$CURRENTPERCENTMARGIN."</td><td>".$DIFFPERCENTMARGIN."</td></tr>       
        <table><br><br>";
    }
    return $display;
}

function render($month,$year)
{
    $db = getInternalDatabase();
    $sql = "SELECT * FROM REPORT WHERE MONTH = ? AND YEAR = ?";
    $req = $db->prepare($sql);
    $req->execute(array($month,$year));
    $data = $req->fetch(PDO::FETCH_ASSOC);
    
    $display = "<center><h3>GENERAL</h3>";
    $generalData = json_decode($data["GENERALDATA"],true);
    $last = $generalData["LAST"];
    $current = $generalData["CURRENT"];    

    $DIFFWASTENBITEMS = difference($last["WASTENBITEMS"],$current["WASTENBITEMS"],true);
    $DIFFWASTEQUANTITY = difference($last["WASTEQUANTITY"],$current["WASTEQUANTITY"],true);
    $DIFFSELFPROMONITEMS = difference($last["SELFPROMONBITEMS"],$current["SELFPROMONBITEMS"]);
    $DIFFSELFPROMOQUANTITY = difference($last["SELFPROMOQUANTITY"],$current["SELFPROMOQUANTITY"]);
    $DIFFRETURNNBITEMS = difference($last["RETURNNBITEMS"],$current["RETURNNBITEMS"],true);
    $DIFFRETURNQUANTITY = difference($last["RETURNQUANTITY"],$current["RETURNQUANTITY"],true);
    $DIFFSALENBITEMS = difference($last["SALENBITEMS"],$current["SALENBITEMS"]);
    $DIFFSALEQUANTITY = difference($last["SALEQUANTITY"],$current["SALEQUANTITY"]);
    $DIFFRECEIVENBITEMS = difference($last["RECEIVENBITEMS"],$current["RECEIVENBITEMS"]);
    $DIFFRECEIVEQUANTITY = difference($last["RECEIVEQUANTITY"],$current["RECEIVEQUANTITY"]);
    $DIFFSALEINCOME = difference($last["SALEINCOME"],$current["SALEINCOME"]);
    $DIFFSALEMARGIN = difference($last["SALEMARGIN"],$current["SALEMARGIN"]);
    $DIFFTOTALCUSTOMER = difference($last["TOTALCUSTOMER"],$current["TOTALCUSTOMER"]);
    $DIFFAVERAGEBASKET = difference($last["AVERAGEBASKET"],$current["AVERAGEBASKET"]);


    $display .=
    "<table border='1'>
    <tr><td colspan=4><center><b>GENERAL</b></center></td></tr>
    <tr><td>STATS</td><td>LASTMONTH</td><td>CURRENTMONTH</td><td>EVOLUTION</td></tr> 
    <tr><td>WASTE NBITEMS</td><td>".$last["WASTENBITEMS"]."</td><td>".$current["WASTENBITEMS"]."</td><td>".$DIFFWASTENBITEMS."</td></tr>
    <tr><td>WASTE QUANTITY</td><td>".$last["WASTEQUANTITY"]."</td><td>".$current["WASTEQUANTITY"]."</td><td>".$DIFFWASTEQUANTITY."</td></tr>
    <tr><td>SELFPROMO NBITEMS</td><td>".$last["SELFPROMONBITEMS"]."</td><td>".$current["SELFPROMONBITEMS"]."</td><td>".$DIFFSELFPROMONITEMS."</td></tr>
    <tr><td>SELFPROMO QTY</td><td>".$last["SELFPROMOQUANTITY"]."</td><td>".$current["SELFPROMOQUANTITY"]."</td><td>".$DIFFSELFPROMOQUANTITY."</td></tr>
    <tr><td>RETURN NBITEMS</td><td>".$last["RETURNNBITEMS"]."</td><td>".$current["RETURNNBITEMS"]."</td><td>".$DIFFRETURNNBITEMS."</td></tr>
    <tr><td>RETURN QTY</td><td>".$last["RETURNQUANTITY"]."</td><td>".$current["RETURNQUANTITY"]."</td><td>".$DIFFRETURNQUANTITY."</td></tr>
    <tr><td>SALE NBITEMS</td><td>".$last["SALENBITEMS"]."</td><td>".$current["SALENBITEMS"]."</td><td>".$DIFFSALENBITEMS."</td></tr>
    <tr><td>SALE QTY</td><td>".round($last["SALEQUANTITY"],2)."</td><td>".round($current["SALEQUANTITY"],2)."</td><td>".$DIFFSALEQUANTITY."</td></tr>
    <tr><td>RECEIVE NBITEMS</td><td>".$last["RECEIVENBITEMS"]."</td><td>".$current["RECEIVENBITEMS"]."</td><td>".$DIFFRECEIVENBITEMS."</td></tr>
    <tr><td>RECEIVE QTY</td><td>".round($last["RECEIVEQUANTITY"],2)."</td><td>".round($current["RECEIVEQUANTITY"],2)."</td><td>".$DIFFRECEIVEQUANTITY."</td></tr>       
    <tr><td>SALE INCOME</td><td>".round($last["SALEINCOME"],2)."</td><td>".round($current["SALEINCOME"],2)."</td><td>".$DIFFSALEINCOME."</td></tr>
    <tr><td>SALE MARGIN</td><td>".round($last["SALEMARGIN"],2)."</td><td>".round($current["SALEMARGIN"],2)."</td><td>".$DIFFSALEMARGIN."</td></tr>       
    <tr><td>TOTAL CUSTOMER</td><td>".$last["TOTALCUSTOMER"]."</td><td>".$current["TOTALCUSTOMER"]."</td><td>".$DIFFTOTALCUSTOMER."</td></tr>
    <tr><td>AVERAGE BASKET</td><td>".round($last["AVERAGEBASKET"],2)."</td><td>".round($current["AVERAGEBASKET"],2)."</td><td>".$DIFFAVERAGEBASKET."</td></tr>       
    <table><br><hr>";

    $lastincome = round($last["SALEINCOME"],2);
    $lastmargin = round($last["SALEMARGIN"],2);
    $currentincome = round($current["SALEINCOME"],2);    
    $currentmargin = round($current["SALEMARGIN"],2);
    
    $display .= "<h3>ROWS</h3>";    
    $display .= renderOne(json_decode($data["ROWDATA"],true),$lastincome,$lastmargin,$currentincome,$currentmargin);

    $display .= "<hr><h3>TEAMS</h3>";
    $display .= renderOne(json_decode($data["TEAMDATA"],true),$lastincome,$lastmargin,$currentincome,$currentmargin);    
    
	$display .= "<hr><h3>SECTIONS</h3>";
    $display .= renderOne(json_decode($data["SECTIONDATA"],true),$lastincome,$lastmargin,$currentincome,$currentmargin);    
    
    $display .= "<hr><h3>DEPARTMENTS</h3>";
    $display .= renderOne(json_decode($data["DEPARTMENTDATA"],true),$lastincome,$lastmargin,$currentincome,$currentmargin);    

    $display .= "<hr><h3>CATEGORIES</h3>";
    $display .= renderOne(json_decode($data["CATEGORYDATA"],true),$lastincome,$lastmargin,$currentincome,$currentmargin);    

    return $display."<center>";

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
        $productids = "()";
    }else{
        $productids = "(";
        foreach($items as $item){
            $productids .= "'".$item["PRODUCTID"]."',";
        }    
        $productids = substr($productids,0,-1);
        $productids .= ")";
    }
    
	$itemCount = count(explode(',',$productids));

    // Waste Nb Items
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM WASTEITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
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
    // Self Promotion Nb Items
    $sql = "SELECT sum(QUANTITY1) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $selfpromoQuantity = $res["CNT"];
    // Self Promotion Quantity
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$productids." AND CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$selfpromoNbItems = $res["CNT"];
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

    // Sale Nb Items
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND  POSDATE BETWEEN  ? AND ?"; 
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
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM PODETAIL WHERE PRODUCTID in ".$str." AND POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
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
    $data["WASTENBITEMS"] = $wasteNbItems != "" ? $wasteNbItems : "0" ;
    $data["WASTEQUANTITY"] = $wasteQuantity != "" ? $wasteQuantity : "0";
    $data["SELFPROMONBITEMS"] = $selfpromoNbItems != "" ? $selfpromoNbItems : "0";
    $data["SELFPROMOQUANTITY"] = $selfpromoQuantity != "" ? $selfpromoQuantity : "0";
    $data["RETURNNBITEMS"] = $returnNbItems != "" ? $returnNbItems : "0";
    $data["RETURNQUANTITY"] = $returnQuantity != "" ? $returnQuantity : "0";    
	$data["SALENBITEMS"] = $saleNbItems != "" ? $saleNbItems : "0";
	$data["SALEQUANTITY"] = $saleQuantity != "" ? $saleQuantity : "0";
    $data["RECEIVENBITEMS"] = $receiveNbItems != "" ? $receiveNbItems : "0";
    $data["RECEIVEQUANTITY"] = $receiveQuantity != "" ? $receiveQuantity : "0";
    $data["SALEINCOME"] = $saleIncome != "" ? $saleIncome : "0";
    $data["SALEMARGIN"] = $saleMargin != "" ? $saleMargin : "0";
	return $data;
}

function getProductsStats($productids, $begin,$end){
    $str = $productids;
    $db = getDatabase();
    $indb = getInternalDatabase();

	$itemCount = count(explode(",",$productids)); 
    // Waste Nb Items
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM WASTEITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";    
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteNbItems = $res["CNT"];
    // Waste Quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM WASTEITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $wasteQuantity = $res["CNT"];
    // Self Promotion Nb Items
    $sql = "SELECT sum(QUANTITY1) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";
    $req = $indb->prepare($sql);
    $req->execute(array($begin,$end));
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $selfpromoQuantity = $res["CNT"];
    // Self Promotion Quantity
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM SELFPROMOTIONITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$selfpromoNbItems = $res["CNT"];
     // Return Nb item
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$returnNbItems = $res["CNT"];
    // Return quantity
    $sql = "SELECT sum(QUANTITY) as 'CNT' FROM RETURNRECORDITEM WHERE PRODUCTID in ".$str." AND CREATED BETWEEN ? AND ?";
	$req = $indb->prepare($sql);
	$req->execute(array($begin,$end));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$returnQuantity = $res["CNT"];

    // Sale Nb Items
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID in ".$str." AND  POSDATE BETWEEN  ? AND ?"; 
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
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM PODETAIL WHERE PRODUCTID in ".$str." AND POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
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
    $data["WASTENBITEMS"] = $wasteNbItems != "" ? $wasteNbItems : "0" ;
    $data["WASTEQUANTITY"] = $wasteQuantity != "" ? $wasteQuantity : "0";
    $data["SELFPROMONBITEMS"] = $selfpromoNbItems != "" ? $selfpromoNbItems : "0";
    $data["SELFPROMOQUANTITY"] = $selfpromoQuantity != "" ? $selfpromoQuantity : "0";
    $data["RETURNNBITEMS"] = $returnNbItems != "" ? $returnNbItems : "0";
    $data["RETURNQUANTITY"] = $returnQuantity != "" ? $returnQuantity : "0";    
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


    // Waste Nb Items
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM WASTEITEM WHERE CREATED BETWEEN ? AND ?";    
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
    // Self Promotion Nb Items
    $sql = "SELECT count(PRODUCTID) as 'CNT' FROM SELFPROMOTIONITEM WHERE CREATED BETWEEN ? AND ?";
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
     // Return Nb item
	$sql = "SELECT count(PRODUCTID) as 'CNT' FROM RETURNRECORDITEM WHERE  CREATED BETWEEN ? AND ?";
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

    // Sale Nb Items
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE  POSDATE BETWEEN  ? AND ?"; 
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
    $sql = "SELECT count(PRODUCTID) AS 'CNT' FROM PODETAIL WHERE  POSTATUS = 'C' AND RECEIVE_DATE BETWEEN  ? AND ?"; 
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

      
    $data["WASTENBITEMS"] = $wasteNbItems != "" ? $wasteNbItems : "0" ;
    $data["WASTEQUANTITY"] = $wasteQuantity != "" ? $wasteQuantity : "0";
    $data["SELFPROMONBITEMS"] = $selfpromoNbItems != "" ? $selfpromoNbItems : "0";
    $data["SELFPROMOQUANTITY"] = $selfpromoQuantity != "" ? $selfpromoQuantity : "0";
    $data["RETURNNBITEMS"] = $returnNbItems != "" ? $returnNbItems : "0";
    $data["RETURNQUANTITY"] = $returnQuantity != "" ? $returnQuantity : "0";    
	$data["SALENBITEMS"] = $saleNbItems != "" ? $saleNbItems : "0";
	$data["SALEQUANTITY"] = $saleQuantity != "" ? $saleQuantity : "0";
    $data["RECEIVENBITEMS"] = $receiveNbItems != "" ? $receiveNbItems : "0";
    $data["RECEIVEQUANTITY"] = $receiveQuantity != "" ? $receiveQuantity : "0";

    $data["SALEINCOME"] = $saleIncome != "" ? $saleIncome : "0";
    $data["SALEMARGIN"] = $saleMargin != "" ? $saleMargin : "0";
    $data["TOTALCUSTOMER"] = $totalCustomer != "" ? $totalCustomer : "0";
    $data["AVERAGEBASKET"] = $averageBasket != "" ? $averageBasket : "0";

	return $data;
}

//loadStats("07","2022");
echo render("07","2022");
?>