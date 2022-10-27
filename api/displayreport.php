<?php 

require_once "functions.php";


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
        $DIFFWASTEAMOUNT = difference(($last["WASTEAMOUNT"] ?? 0),($current["WASTEAMOUNT"] ?? 0),true);    

        $DIFFSELFPROMONITEMS = difference($last["SELFPROMONBITEMS"],$current["SELFPROMONBITEMS"]);
        $DIFFSELFPROMOQUANTITY = difference($last["SELFPROMOQUANTITY"],$current["SELFPROMOQUANTITY"]);

        $DIFFRETURNNBITEMS = difference($last["RETURNNBITEMS"],$current["RETURNNBITEMS"],true);
        $DIFFRETURNQUANTITY = difference($last["RETURNQUANTITY"],$current["RETURNQUANTITY"],true);
        $DIFFRETURNAMOUNT = difference(($last["RETURNAMOUNT"] ?? 0),($current["RETURNAMOUNT"] ?? 0),true);

        $DIFFSALENBITEMS = difference($last["SALENBITEMS"],$current["SALENBITEMS"]);
        $DIFFSALEQUANTITY = difference($last["SALEQUANTITY"],$current["SALEQUANTITY"]);
        $DIFFRECEIVENBITEMS = difference($last["RECEIVENBITEMS"],$current["RECEIVENBITEMS"]);
        $DIFFRECEIVEQUANTITY = difference($last["RECEIVEQUANTITY"],$current["RECEIVEQUANTITY"]);
        $DIFFSALEINCOME = difference($last["SALEINCOME"],$current["SALEINCOME"]);
        $DIFFSALEMARGIN = difference($last["SALEMARGIN"],$current["SALEMARGIN"]);

        $DIFFTRANSFERNBITEMS = difference($last["TRANSFERNBITEMS"],$current["TRANSFERNBITEMS"]);
        $DIFFTRANSFERQUANTITY = difference($last["TRANSFERQUANTITY"],$current["TRANSFERQUANTITY"]);        
        $LASTPERCENTINCOME = round($last["SALEINCOME"] * 100 / ($lastincome != 0 ? $lastincome : 1),2);
        $LASTPERCENTMARGIN = round($last["SALEMARGIN"] * 100 / ($lastmargin != 0 ? $lastmargin : 1) ,2);
        $CURRENTPERCENTINCOME = round($current["SALEINCOME"] * 100 / $currentincome,2);        
        $CURRENTPERCENTMARGIN = round($current["SALEMARGIN"] * 100 / $currentmargin,2);        
        $DIFFPERCENTINCOME = difference($LASTPERCENTINCOME,$CURRENTPERCENTINCOME);
        $DIFFPERCENTMARGIN = difference($LASTPERCENTMARGIN,$CURRENTPERCENTMARGIN);

        $formWASTELast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Waste items(LAST MONTH)'><input type='hidden' name='items' value='".json_encode($last["WASTEITEMS"])."'><input type='submit' value='Details'></form>"; 
        $formWASTECurrent = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Waste items(CURRENT MONTH)'><input type='hidden' name='items' value='".json_encode($current["WASTEITEMS"])."'><input type='submit' value='Details'></form>"; 

        $formTRANSFERLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Transfer items(LAST MONTH)'><input type='hidden' name='items' value='".json_encode($last["TRANSFERITEMS"])."'><input type='submit' value='Details'></form>"; 
        $formTRANSFERCurrent =  "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Waste items(CURRENT MONTH)'><input type='hidden' name='items' value='".json_encode($current["TRANSFERITEMS"])."'><input type='submit' value='Details'></form>"; 

        $formSELFPROMOLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Selfpromotion items(LAST MONTH)'><input type='hidden' name='items' value='".json_encode($last["SELFPROMOTIONITEMS"])."'><input type='submit' value='Details'></form>"; 
        $formSELFPROMOCurrent = "<form method='POST' action='itemdetails.php'><input type='hidden' name='display' value='Selfpromotion items(CURRENT MONTH)'><input type='hidden' name='items' value='".json_encode($current["SELFPROMOTIONITEMS"])."'><input type='submit' value='Details'></form>"; 

        $formRETURNLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='display' value='Return items(CURRENT MONTH)'><input type='hidden' name='items' value='".json_encode($last["RETURNITEMS"])."'><input type='submit' value='Details'></form>"; 
        $formRETURNCurrent = "<form method='POST' action='itemdetails.php'><input type='hidden' name='display' value='Return items(CURRENT MONTH)'><input type='hidden' name='items' value='".json_encode($current["RETURNITEMS"])."'><input type='submit' value='Details'></form>"; 
        

        $display .=   
        "<table border='1'>
        <tr><td colspan=4><center><b>".$onedata["NAME"]."</b>:".$onedata["ITEMCOUNT"]." items</center></td></tr>
        <tr><td>STATS</td><td>LASTMONTH</td><td>CURRENTMONTH</td><td>EVOLUTION</td></tr> 
        <tr><td>WASTE NBITEMS</td><td>".$last["WASTENBITEMS"]." ".$formWASTELast."</td><td>".$current["WASTENBITEMS"]." ".$formWASTECurrent."</td><td>".$DIFFWASTENBITEMS."</td></tr>
        <tr><td>WASTE AMOUNT</td><td>".($last["WASTEAMOUNT"] ?? 0)."</td><td>".($current["WASTEAMOUNT"] ?? 0)."</td><td>".$DIFFWASTEAMOUNT."</td></tr>
        <tr><td>WASTE QUANTITY</td><td>".$last["WASTEQUANTITY"]."</td><td>".$current["WASTEQUANTITY"]."</td><td>".$DIFFWASTEQUANTITY."</td></tr>

        <tr><td>TRANSFER NBITEMS</td><td>".$last["TRANSFERNBITEMS"]." ".$formTRANSFERLast."</td><td>".$current["TRANSFERNBITEMS"]." ".$formTRANSFERCurrent."</td><td>".$DIFFTRANSFERNBITEMS."</td></tr>
        <tr><td>TRANSFER QUANTITY</td><td>".$last["TRANSFERQUANTITY"]."</td><td>".$current["TRANSFERQUANTITY"]."</td><td>".$DIFFTRANSFERQUANTITY."</td></tr>
        
        <tr><td>SELFPROMO NBITEMS</td><td>".$last["SELFPROMONBITEMS"]." ".$formSELFPROMOLast."</td><td>".$current["SELFPROMONBITEMS"]." ".$formSELFPROMOCurrent."</td><td>".$DIFFSELFPROMONITEMS."</td></tr>
        <tr><td>SELFPROMO QTY</td><td>".$last["SELFPROMOQUANTITY"]."</td><td>".$current["SELFPROMOQUANTITY"]."</td><td>".$DIFFSELFPROMOQUANTITY."</td></tr>
        
        <tr><td>RETURN NBITEMS</td><td>".$last["RETURNNBITEMS"]." ".$formRETURNLast."</td><td>".$current["RETURNNBITEMS"]." ".$formRETURNCurrent."</td><td>".$DIFFRETURNNBITEMS."</td></tr>
        <tr><td>RETURN AMOUNT</td><td>".($last["RETURNAMOUNT"] ?? 0)."</td><td>".($current["RETURNAMOUNT"] ?? 0)."</td><td>".$DIFFRETURNAMOUNT."</td></tr>
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
    

    $display = "<center><h3>GENERAL</h3>
    MONTH: ".$month." YEAR:".$year."<br>";
    $generalData = json_decode($data["GENERALDATA"],true);
    $last = $generalData["LAST"];
    $current = $generalData["CURRENT"];    
    
    $expensescurrent = $data["EXPENSESCURRENT"];
    $expenseslast = $data["EXPENSESLAST"];
    
    
    $profitcurrent =  $current["SALEMARGIN"] - $data["EXPENSESCURRENT"];
    $profitlast = $last["SALEMARGIN"] - $data["EXPENSESLAST"];
    
    $DIFFWASTENBITEMS = difference($last["WASTENBITEMS"],$current["WASTENBITEMS"],true);    
    $DIFFWASTEQUANTITY = difference($last["WASTEQUANTITY"],$current["WASTEQUANTITY"],true);    
    $DIFFWASTEAMOUNT = difference($last["WASTEAMOUNT"] ?? 0,$current["WASTEAMOUNT"] ?? 0,true);    
    $DIFFSELFPROMONBITEMS = difference($last["SELFPROMONBITEMS"],$current["SELFPROMONBITEMS"]);
    
    $DIFFSELFPROMOQUANTITY = difference($last["SELFPROMOQUANTITY"],$current["SELFPROMOQUANTITY"]);
    $DIFFRETURNNBITEMS = difference($last["RETURNNBITEMS"],$current["RETURNNBITEMS"],true);
    $DIFFRETURNAMOUNT = difference($last["RETURNAMOUNT"] ?? 0,$current["RETURNAMOUNT"] ?? 0,true);
    $DIFFRETURNQUANTITY = difference($last["RETURNQUANTITY"],$current["RETURNQUANTITY"],true);

    $DIFFSALENBITEMS = difference($last["SALENBITEMS"],$current["SALENBITEMS"]);
    $DIFFSALEQUANTITY = difference($last["SALEQUANTITY"],$current["SALEQUANTITY"]);
    $DIFFRECEIVENBITEMS = difference($last["RECEIVENBITEMS"],$current["RECEIVENBITEMS"]);
    $DIFFRECEIVEQUANTITY = difference($last["RECEIVEQUANTITY"],$current["RECEIVEQUANTITY"]);
    $DIFFSALEINCOME = difference($last["SALEINCOME"],$current["SALEINCOME"]);
    $DIFFSALEMARGIN = difference($last["SALEMARGIN"],$current["SALEMARGIN"]);
    $DIFFTOTALCUSTOMER = difference($last["TOTALCUSTOMER"],$current["TOTALCUSTOMER"]);
    $DIFFAVERAGEBASKET = difference($last["AVERAGEBASKET"],$current["AVERAGEBASKET"]);
    $DIFFTRANSFERNBITEMS = difference($last["TRANSFERNBITEMS"],$current["TRANSFERNBITEMS"]);
    $DIFFTRANSFERQUANTITY = difference($last["TRANSFERQUANTITY"],$current["TRANSFERQUANTITY"]);
    
    $DIFFPROMOLOSSNBITEMS = difference($last["PROMOLOSSNBITEMS"],$current["PROMOLOSSNBITEMS"]);
    $DIFFPROMOLOSSQUANTITY = difference($last["PROMOLOSSQUANTITY"],$current["PROMOLOSSQUANTITY"]);

    $DIFFEXPENSES = difference($expenseslast,$expensescurrent,true);
    $DIFFPROFIT = difference($profitlast,$profitcurrent);

    $formWASTELast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($last["WASTEITEMS"])."'><input type='hidden' name='display' value='Waste items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 
    $formWASTECurrent = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["WASTEITEMS"])."'><input type='hidden' name='display' value='Waste items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 

    $formTRANSFERLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($last["TRANSFERITEMS"])."'><input type='hidden' name='display' value='Transfer items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 
    $formTRANSFERCurrent =  "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["TRANSFERITEMS"])."'><input type='hidden' name='display' value='Transfer items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 

    $formSELFPROMOLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($last["SELFPROMOTIONITEMS"])."'><input type='submit' value='Details'><input type='hidden' name='display' value='Selfpromo items(LAST MONTH)'></form>"; 
    $formSELFPROMOCurrent = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["SELFPROMOTIONITEMS"])."'><input type='submit' value='Details'><input type='hidden' name='display' value='Selfpromo items(CURRENT MONTH)'></form>"; 

    $formRETURNLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($last["RETURNITEMS"])."'><input type='hidden' name='display' value='Return items(LAST MONTH)'><input type='submit' value='Details'></form>"; 
    $formRETURNCurrent = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["RETURNITEMS"])."'><input type='hidden' name='display' value='Return items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 

    $formPromoLossLast = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["PROMOLOSSITEMS"])."'><input type='hidden' name='display' value='PromoLoss items(LAST MONTH)'><input type='submit' value='Details'></form>"; 
    $formPromoLossCurrent = "<form method='POST' action='itemdetails.php' target='_blank'><input type='hidden' name='items' value='".json_encode($current["PROMOLOSSITEMS"])."'><input type='hidden' name='display' value='PromoLoss items(CURRENT MONTH)'><input type='submit' value='Details'></form>"; 
            
    $display .=
    "<table border='1'>
    <tr><td colspan=4><center><b>GENERAL</b></center></td></tr>
    <tr><td>STATS</td><td>LASTMONTH</td><td>CURRENTMONTH</td><td>EVOLUTION</td></tr> 
    
    <tr><td>WASTE NBITEMS</td><td>".$last["WASTENBITEMS"]." ".$formWASTELast."</td><td>".$current["WASTENBITEMS"]." ".$formWASTECurrent."</td><td>".$DIFFWASTENBITEMS."</td></tr>
    <tr><td>WASTE AMOUNT</td><td>".($last["WASTEAMOUNT"] ?? 0)."</td><td>".($current["WASTEAMOUNT"] ?? 0)."</td><td>".$DIFFWASTEAMOUNT."</td></tr>
    <tr><td>WASTE QUANTITY</td><td>".$last["WASTEQUANTITY"]."</td><td>".$current["WASTEQUANTITY"]."</td><td>".$DIFFWASTEQUANTITY."</td></tr>
    <tr><td>TRANSFER NBITEMS</td><td>".$last["TRANSFERNBITEMS"]." ".$formTRANSFERLast."</td><td>".$current["TRANSFERNBITEMS"]." ".$formTRANSFERCurrent."</td><td>".$DIFFTRANSFERNBITEMS."</td></tr>
    <tr><td>TRANSFER QUANTITY</td><td>".$last["TRANSFERQUANTITY"]."</td><td>".$current["TRANSFERQUANTITY"]."</td><td>".$DIFFTRANSFERQUANTITY."</td></tr>        
    <tr><td>SELFPROMO NBITEMS</td><td>".$last["SELFPROMONBITEMS"]." ".$formSELFPROMOLast."</td><td>".$current["SELFPROMONBITEMS"]." ".$formSELFPROMOCurrent."</td><td>".$DIFFSELFPROMONBITEMS."</td></tr>
    <tr><td>SELFPROMO QTY</td><td>".$last["SELFPROMOQUANTITY"]."</td><td>".$current["SELFPROMOQUANTITY"]."</td><td>".$DIFFSELFPROMOQUANTITY."</td></tr>        
    <tr><td>RETURN NBITEMS</td><td>".$last["RETURNNBITEMS"]." ".$formRETURNLast."</td><td>".$current["RETURNNBITEMS"]." ".$formRETURNCurrent."</td><td>".$DIFFRETURNNBITEMS."</td></tr>
    <tr><td>RETURN AMOUNT</td><td>".($last["RETURNAMOUNT"] ?? 0)."</td><td>".($current["RETURNAMOUNT"] ?? 0)."</td><td>".$DIFFRETURNAMOUNT."</td></tr>
    <tr><td>RETURN QUANTITY</td><td>".$last["RETURNQUANTITY"]."</td><td>".$current["RETURNQUANTITY"]."</td><td>".$DIFFRETURNQUANTITY."</td></tr>
    <tr><td>SALE NBITEMS</td><td>".$last["SALENBITEMS"]."</td><td>".$current["SALENBITEMS"]."</td><td>".$DIFFSALENBITEMS."</td></tr>
    <tr><td>SALE QTY</td><td>".round($last["SALEQUANTITY"],2)."</td><td>".round($current["SALEQUANTITY"],2)."</td><td>".$DIFFSALEQUANTITY."</td></tr>
    <tr><td>RECEIVE NBITEMS</td><td>".$last["RECEIVENBITEMS"]."</td><td>".$current["RECEIVENBITEMS"]."</td><td>".$DIFFRECEIVENBITEMS."</td></tr>
    <tr><td>RECEIVE QTY</td><td>".round($last["RECEIVEQUANTITY"],2)."</td><td>".round($current["RECEIVEQUANTITY"],2)."</td><td>".$DIFFRECEIVEQUANTITY."</td></tr>       
    
    <tr><td>PROMOLOSS NBITEMS</td><td>".round($last["PROMOLOSSNBITEMS"],2)." ".$formPromoLossLast."</td><td>".round($current["PROMOLOSSNBITEMS"],2)." ".$formPromoLossCurrent."</td><td>".$DIFFPROMOLOSSNBITEMS."</td></tr>       
    <tr><td>PROMOLOSS QUANTITY</td><td>".round($last["PROMOLOSSQUANTITY"],2)."</td><td>".round($current["PROMOLOSSQUANTITY"],2)."</td><td>".$DIFFPROMOLOSSQUANTITY."</td></tr>       

    <tr><td>SALE INCOME</td><td>".round($last["SALEINCOME"],2)."</td><td>".round($current["SALEINCOME"],2)."</td><td>".$DIFFSALEINCOME."</td></tr>
    <tr><td>SALE MARGIN</td><td>".round($last["SALEMARGIN"],2)."</td><td>".round($current["SALEMARGIN"],2)."</td><td>".$DIFFSALEMARGIN."</td></tr>       
    
     
    <tr><td>EXPENSE</td><td>".$expenseslast."</td><td>".$expensescurrent."</td><td>".$DIFFEXPENSES."</td></tr>
    <tr><td>PROFIT</td><td>".$profitlast."</td><td>".$profitcurrent."</td><td>".$DIFFPROFIT."</td></tr>

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

if (isset($_GET["MONTH"]) && isset($_GET["YEAR"])){
    echo render($_GET["MONTH"],$_GET["YEAR"]);
}else{
    echo "Missing MONTH or YEAR parameters";
}





?>