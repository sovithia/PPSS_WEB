<?php 
ini_set('memory_limit', '-1');
ini_set('post_max_size','1000M');
set_time_limit(0);
session_start();


include('Render.php');
include('PagesRender.php');
include('RenderCalendar.php');
require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function i18n($key)
{
  return $key;
}

function doAction($action)
{  
  if($action == "create") 
  {
    $entity = Service::CreateEntity($_GET["entity"],$_POST);    
    echo "<script>alert('<".i18n($_GET["entity"])."> ".i18n("created")."')</script>";   
    return $entity;
  }
  else if ($action == "update") 
  {         
    $entity = Service::UpdateEntity($_GET["entity"],$_POST);
    echo "<script>alert('<".i18n($_GET["entity"])."> ".i18n("updated")."')</script>";     
    return $entity;
  }  
  else if ($action == "delete")  
  {
    $response = Service::DeleteEntity($_GET["entity"],$_GET["id"]);
    echo "<script>alert('".$_GET["entity"]." deleted')</script>";   
    return $response;
  }  
} 

function getItemsFromExcel($inputFileName)
{
  $inputFileType = 'Xls';
  
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
    $worksheet = $spreadsheet->getActiveSheet();
  $items = array();
    $header = true;

    for ($row = 2; true; ++$row) 
    {
        if ($worksheet->getCell('A'.$row)->getValue() == '')
            break;
        $barcode = $worksheet->getCell('A' . $row)->getValue();
        if ($barcode == '')
            break;
        $nameen = $worksheet->getCell('B' . $row)->getValue();
        $namekh = $worksheet->getCell('C' . $row)->getValue();
        $cost = $worksheet->getCell('D' . $row)->getValue();
        $category = $worksheet->getCell('E' . $row)->getValue();
        if ($category != "NONE")
        {                 
            $itemdetails = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/calculatePrice?cost=".$cost."&category=".urlencode($category));     
            $oneitem["MIN"] = $itemdetails["MIN"];
            $oneitem["AVG"] = $itemdetails["AVG"];
            $oneitem["MAX"] = $itemdetails["MAX"];
        }
        else 
        {
            $oneitem["MIN"] = '';
            $oneitem["AVG"] = '';
            $oneitem["MAX"] = '';
        }
        $oneitem["BARCODE"] = $barcode;
        $oneitem["NAME-EN"] = $nameen;
        $oneitem["NAME-KH"] = $namekh;
        $oneitem["COST"] = $cost;
        $oneitem["CATEGORY"] = $category;

        
        array_push($items,$oneitem);        
    }
  return $items;
}

function getData($display,$entity,$param)
{     
  $data = null;
  if ($display == "sales" && isset($param["date"]))
    return Service::ListEntity($entity,$param["date"]);
  else if ($display == "itemrequestactionsearch" && isset($param["START"]))
  {
    $params = "?a=1";
    $params .= (strlen($param["TYPE"]) > 0)  ? "&TYPE=".$param["TYPE"] : "";    
    $params .= (strlen($param["REQUESTER"]) > 0)  ? "&REQUESTER=".$param["REQUESTER"] : "";
    $params .= (strlen($param["REQUESTEE"]) > 0)  ? "&REQUESTEE=".$param["REQUESTEE"] : "";   
    $params .= (strlen($param["PRODUCTID"]) > 0)  ? "&potype=".$param["PRODUCTID"] : "";   
    $params .= (strlen($param["START"]) > 0)  ? "&START=".$param["START"] : "";
    $params .= (strlen($param["END"]) > 0)  ? "&END=".$param["END"] : "";

    return Service::ListEntity($entity,$params);
  } 
  else if ($display == "supplyrecordsearch" && isset($param["START"]))
  {
    $params = "?a=1";
    $params .= (strlen($param["PONUMBER"]) > 0)  ? "&PONUMBER=".$param["PONUMBER"] : "";
    $params .= (strlen($param["PRODUCTID"]) > 0)  ? "&productid=".$param["productid"] : "";
    $params .= (strlen($param["STATUS"]) > 0)  ? "&STATUS=".$param["STATUS"] : "";
    $params .= (strlen($param["POTYPE"]) > 0)  ? "&POTYPE=".$param["POTYPE"] : "";   
    $params .= (strlen($param["START"]) > 0)  ? "&START=".$param["START"] : "";
    $params .= (strlen($param["END"]) > 0)  ? "&END=".$param["END"] : "";    
    return Service::ListEntity($entity,$params);
  }  
  else if ( $display == "itemsearch" && isset($param["keyword"]) ) // 
  {   
    $params = "?a=1";
    $params .= (strlen($param["barcode"]) > 0)  ? "&barcode=".$param["barcode"] : "";
    $params .= (strlen($param["keyword"]) > 0)  ? "&keyword=".urlencode($param["keyword"]) : "";
    $params .= ($param["country"] != "ALL")  ? "&country=".urlencode($param["country"]) : "";
    $params .= ($param["vendor"] != "ALL")  ? "&vendor=".urlencode($param["vendor"]) : "";
    $params .= (strlen($param["vendid"]) > 0) ? "&vendid=".urlencode($param["vendid"]) : "";
    $params .= ($param["category"] != "ALL") ? "&category=".urlencode($param["category"]) : "";     
    $params .= ($param["storebin1"] != "ALL") ? "&storebin1=".urlencode($param["storebin1"]) : "";   
    $params .= ($param["storebin2"] != "ALL") ? "&storebin2=".urlencode($param["storebin2"]) : "";          
    return Service::ListEntity($entity,$params);                                             
  }
  else if ($display == "itemsearch2" && isset($param["category"]) ) // 
  {
    $params = "?a=1";
    $params .= ($param["category"] != "ALL") ? "&category=".urlencode($param["category"]) : "";
    $params .= ($param["zerosale"] != "ALL") ? "&zerosale=".urlencode($param["zerosale"]) : "";
    $params .= (strlen($param["vendor"])> 0)  ? "&vendor=".urlencode($param["vendor"]) : "";
    $params .= (strlen($param["vendid"]) > 0) ? "&vendid=".urlencode($param["vendid"]) : "";
    $params .= (strlen($param["thrownstart"]) > 0) ? "&thrownstart=".urlencode($param["thrownstart"]) : "";
    $params .= (strlen($param["thrownend"]) > 0) ? "&thrownend=".urlencode($param["thrownend"]) : "";
    $params .= (strlen($param["sellstart"]) > 0) ? "&sellstart=".urlencode($param["sellstart"]) : "";
    $params .= (strlen($param["sellend"]) > 0) ? "&sellend=".urlencode($param["sellend"]) : "";

    return Service::ListEntity($entity,$params);
  }
  else if ($display == "itemsearch3" && isset($param["category"]) )
  {
    $params = "?a=1";
    $params .= ($param["category"] != "ALL") ? "&category=".urlencode($param["category"]) : "";
    $params .= ($param["year"] != "") ? "&year=".urlencode($param["year"]) : "";

    return Service::ListEntity($entity,$params);
  }
  else if ($display == "priceprogression" &&  ( isset($param["barcode"]) || 
                                                isset($param["vendor"])  || 
                                                isset($param["vendorid"])  ))
  {    
    $params = "?a=1";
    $params .= (strlen($param["barcode"]) > 0)  ? "&barcode=".$param["barcode"] : "";        
    $params .= (strlen($param["vendor"]) > 0)  ? "&vendor=".urlencode($param["vendor"]) : "";
    $params .= (strlen($param["vendorid"]) > 0) ? "&vendorid=".urlencode($param["vendorid"]) : "";

    return Service::ListEntity($entity,$params); 
    
  }
  else if ($display == "tinyitemsearch" && isset($param["barcode"]) )
  {
    $params = "?a=1";
    $params .= (strlen($param["barcode"]) > 0)  ? "&barcode=".$param["barcode"] : "";
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "itemthrown")
  {
    $params = "?a=1"; 
    if (isset($param["barcode"]))
    {
      $params .= (strlen($param["barcode"]) > 0)  ? "&barcode=".$param["barcode"] : "";
      $params = "?begin=".$param["begin"];
      $params .= "&end=".$param["end"];
      return Service::ListEntity($entity,$params);                                                
    }
  }
  else if ($display == "itemreceived")
  {
    $params = "?a=1"; 
    $params = "?begin=".$param["begin"];
    $params .= "&end=".$param["end"];
    return Service::ListEntity($entity,$params);                                                
  }
  else if ($display == "adjusteditems" )
  {     
    $params = "?a=1";  
    if (isset($param["date"])){      
      $param["date"] = strtotime($param["date"]);      
      $params .= (strlen($param["date"]) > 0)  ? "&date=".$param["date"] : "";
      $params .= (strlen($param["storebin"]) > 0)  ? "&storebin=".urlencode($param["storebin"]) : "";
      $params .= (strlen($param["location"]) > 0)  ? "&location=".urlencode($param["location"]) : "";
      $params .= (strlen($param["author"]) > 0)  ? "&author=".urlencode($param["author"]) : "";      
    }
    return Service::ListEntity($entity,$params);                                             
  } 
  else if ($display == "pricecalculator") 
  { 
    if (isset($_FILES['file']["tmp_name"])){
      return getItemsFromExcel($_FILES['file']["tmp_name"]);    
    }
    else {
      $params = "?a=1"; 
      if (isset($param["category"])){
        $params .= "&cost=".$param["cost"];
        $params .= "&category=".urlencode($param["category"]);            
      }     
    }
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "KPISales" || $display == "KPICategory")
  { 
      if (!isset($param["year"]))
          $param["year"] = date('Y'); 
    $params = "?a=1";
    $params .= "&year=".$param["year"];
    if (isset($param["month"]))
      $params .= "&month=".$param["month"];
    
    return Service::ListEntity($entity,$params); 
  }
  else if ($display == "KPIRow"){
    
  }
  else if ($display == "posearch" && isset($param["userpurchase"]))
  {
    $params = "?a=1";
    $params .= "&ponumber=".$param["ponumber"];
    $params .= "&userpurchase=".$param["userpurchase"];
    $params .= "&useredit=".$param["useredit"];
    $params .= "&from=".$param["from"];
    $params .= "&to=".$param["to"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "receivedposearch" && isset($param["userreceive"]))
  {
    $params = "?a=1";    
    $params .= "&userreceive=".$param["userreceive"];
    $params .= "&from=".$param["from"];
    $params .= "&to=".$param["to"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "bestseller" && isset($param["begin"]) ){
    $params = "?begin=".$param["begin"];
    $params .= "&end=".$param["end"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "discountsumlist" && isset($param["begin"])){
    $params = "?begin=".$param["begin"];
    $params .= "&end=".$param["end"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "aplist" && isset($param["begin"])){
    $params = "?begin=".$param["begin"];
    $params .= "&end=".$param["end"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "itemsale" && isset($param["begin"])){
    $params  = "?a=1";
    $params .= "&begin=".$param["begin"];
    $params .= "&end=".$param["end"];
    $params .= "&barcode=".$param["barcode"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "itemzerostock" || $display == "zerosale" || 
           $display == "itemnegative" || 
           $display == "itemcategorize")
  {
    $params = "?page=".$param["page"];
    return Service::ListEntity($entity,$params);
  }
  else if ($display == "promotionlist"){
    return Service::ListEntity($entity);
  }    
  else if ($display == "trombidetail" 
    || $display == "schedule" || $display == "restday" || $display == "podetail" ||
    $display == "receivedpodetail" || $display == "supplieritems" || $display == "supplierpurchaseorders"
    || $display == "receptionRecordDetail" || $display == "receptionRecordDetailNOPO" || $display == "vaultdetail" ||
    $display == "supplyrecorddetails" )
  {                                                   
    return Service::ListEntity($entity,$param["ID"]);
  }    
  else if ($display == "mywaitingpo" || $display == "mycompletedpo" || $display == "myreceivedpo"){
      return Service::ListEntity($entity,$_SESSION["USER"]["login"]);          
  }
  else if ($display == "supplyrecordlist")
  {
      return Service::ListEntity($entity,$param["status"]);          
  }
  else if ($display == "itemrequestactionlist" || $display == "itemrequestactiongroupedpurchaselist")
  {
    return Service::ListEntity($entity,$param["type"]);          
  }    
  else if ($display == "itemrequestactiondetails")
  {
    return Service::ListEntity($entity,$param["ID"]);          
  }
  else if ($display == "itemrequestactioncreate" || $display == "itemrequestrestockcreate")
  {
    $type = isset($_GET["type"]) ? $_GET["type"] : ""; 
   
    if (isset($_FILES["filename"]))
    {
      $filename = $_FILES["filename"]["tmp_name"];
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $reader->setReadDataOnly(true);
      $spreadsheet = $reader->load($filename);    
      $worksheet = $spreadsheet->getActiveSheet();  
      $allData = array(); 
      $count = 0;
      foreach ($worksheet->getRowIterator() AS $row) 
      {
        if ($count == 0){
            $count++;
            continue;
        }
        $data = array();            
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
        $cells = [];    
        foreach ($cellIterator as $cell) 
        {        
              if ($cell->getColumn() == "A" && $cell->getValue() != "")
                  $data["PRODUCTID"] = $cell->getValue();                             
              if ($cell->getColumn() == "B" && $cell->getValue() != "")                  
                  $data["REQUEST_QUANTITY"] = $cell->getValue();                 
        }
        array_push($allData,$data);
      } 

      if ($_POST["action"] == 'Template Add(A)')
        $datasend["LISTNAME"] = "A";
      else if ($_POST["action"] == 'Template Add(B)')
        $datasend["LISTNAME"] = "B";
      else if ($_POST["action"] == 'Template Add(C)')
        $datasend["LISTNAME"] = "C";

       $datasend["ITEMS"] = $allData;  
       $datasend["AUTHOR"] =  $_SESSION["USER"]["firstname"].' '.$_SESSION["USER"]["lastname"];          
       $data = Service::CreateEntity($entity,$datasend,$type);                
     }
    else if (isset($param["PRODUCTID"]) && $_GET["action"] != "DELETE")
    {  
      $datasend["PRODUCTID"] = $_GET["PRODUCTID"];          
      if ($_GET["action"] == 'Single Add (A)')
        $datasend["LISTNAME"] = "A";
      if ($_GET["action"] == 'Single Add (B)')
        $datasend["LISTNAME"] = "B";
      if ($_GET["action"] == 'Single Add (C)')
        $datasend["LISTNAME"] = "C";
                    
      $datasend["REQUEST_QUANTITY"] = $param["REQUEST_QUANTITY"];          
      $data = Service::CreateEntity($entity,$datasend,$type);    
    }
    else if (isset($_GET["action"]) && $_GET["action"] == "DELETE"){       
       $data = array();
       $data["PRODUCTID"] = $_GET["PRODUCTID"];  
       $data["LISTNAME"] = $_GET["LISTNAME"];            
       Service::DeleteEntity($entity,$type,$data);
    }

    $response = Service::ListEntity($entity,$param["type"]);
    if($data != null){
      $tmp = $response;
      $response["errors"] = $data;
      $response["data"] = $tmp;
    }
    return $response;
  }
  else if ($display == "scheduleAll" || $display == "trombi" || $display == "supplierlist" || 
           $display == "salarylist" || $display == "restdaylist" || $display == "lowprofit" || 
           $display == "freshsales"|| $display == "costzero" || $display == "selection" ||
           $display == "allwaitingpo" || $display == "custombarcode" || $display == "barcodegenerator" ||
           $display == "damageditems" || $display == "bank" || 
           $display == "receivetodo" || $display == "receivedone" ||
           $display == "acctodo" ||  $display == "accdone" || 
           $display == "pchtodo" || $display == "pchdone" ||            
           $display == "rcvtodo" || $display == "rcvdone" || 
           $display == "whdone" || $display == "whdone2" || $display == "lowseller" || $display == "depleteditems") 
  {    

    return Service::ListEntity($entity);    
  }


            
  return null;
}

function renderBody()
{
  $display = (isset($_GET["display"]) ? $_GET["display"] : "");
  if($display == "")
    $display = (isset($_POST["display"]) ? $_POST["display"] : "");

  $entity = (isset($_GET["entity"]) ? $_GET["entity"] : "");
  if ($entity == "")
    $entity = (isset($_POST["entity"]) ? $_POST["entity"] : "");


  $data = (array)getData($display,$entity,$_GET);   



  if (isset($data["error"]))
    return renderTimeout(); 

  // KPI 
  else if ($display == "KPISales")
    return renderKPISales($data);
  else if ($display == "KPIAverage")
    return renderKPIAverage($data);
  else if ($display == "KPICategory")
    return renderKPICategory($data);
  else if ($display == "KPIRow")
    return renderKPIRow($data);


  // BASICS
  else if ($display == "tinyitemsearch")
    return renderTinyItemSearch($data); // FORM

  else if ($display == "itemsearch")
    return renderItemSearch($data); // FORM
  else if ($display == "itemsearch2")
    return renderItemSearch2($data); // FORM
else if ($display == "itemsearch3")
    return renderItemSearch3($data); // FORM
  else if ($display == "itemthrown")
    return renderItemThrown($data); 

  else if ($display == "itemreceived")
    return renderItemReceived($data,$GET); 

  else if ($display == "itemzerostock") // ITEM ZERO
    return renderItemZeroStock($data);
  else if ($display == "itemnegative") // ITEM NEGATIVE 
    return renderItemNegative($data);
  else if ($display == "zerosale")
    return renderZeroSale($data);

  // Account
  else if ($display == "discountsumlist")
    return renderDiscountSumList($data);
  else if ($display == "aplist")
    return renderAPList($data);

  // Admin  
  else if ($display == "itemcategorize")
    return renderItemCategorize($data);

  else if ($display == "bestseller")
    return renderBestSeller($data); // FORM 
  else if ($display == "itemsale")
    return renderItemSale($data); // FORM
  else if ($display == "promotionlist")
    return renderPromotionList($data); // FORM
  else if ($display == "sales") // FORM
    return renderSales($data);
  else if ($display == "a4label") // FORM EXTERNAL
    return renderA4Label();
  else if ($display == "labelsmall") // FORM EXTERNAL
    return renderLabelSmall();

  else if ($display == "smalllabelnew") // FORM EXTERNAL
    return renderLabelSmallNew();


  else if ($display == "labelword") // FORM EXTERNAL
    return renderLabelWord();
  
  else if ($display == "a5label")
    return renderA5Label();

  else if ($display == "a6label")
    return renderA6Label();
  else if ($display == "a7label")
    return renderA7Label();

  // PO
  else if ($display == "mywaitingpo")
    return renderMyWaitingPO($data);
  else if ($display == "mycompletedpo")
    return renderMyCompletedPO($data);
  else if ($display == "podetail")
    return renderPODetail($data);
  else if ($display == "posearch")
    return renderPOSearch($data);

  else if ($display == "myreceivedpo")
    return renderMyReceivedPO($data);
  else if ($display == "receivedpodetail")
    return renderReceivedPODetail($data);
  else if ($display == "receivedposearch")  
    return renderReceivedPOSearch($data);

  else if ($display == "promotiontag") // FORM EXTERNAL
    return renderPromotionTag();
   
  else if ($display == "damageditems")
    return renderDamagedItems($data);

  else if ($display == "schedule")
    return renderSchedule($data); 
  else if ($display == "scheduleAll")
    return renderAllSchedule($data);

  else if ($display == "leaflet")
    return renderLeaflet($data);  

  else if ($display == "restday")
    return renderRestDay($data); // FORM 
  else if ($display == "restdaylist")
    return renderRestDayList($data);

  else if ($display == "adjusteditems")
    return renderAdjustedItem($data);


  else if ($display == "downloadapp")
    return renderDownloadApp(); // FIX
  else if ($display == "shelfrental") // FORM EXTERNAL
    return renderShelfRental();
  else if ($display == "salarylist") 
    return renderSalaries($data);

  else if ($display == "supplierlist") 
    return renderSupplierList($data);
  else if ($display == "supplieritems")
    return renderSupplierItems($data);
  else if ($display == "supplierpurchaseorders")    
    return renderSupplierPurchaseOrders($data);
  


  else if ($display == "trombi") 
    return renderTrombi($data); 
  else if ($display == "trombidetail")
    return renderTrombiDetail($data);

  else if ($display == "lowprofit")
    return renderLowProfit($data);
  else if ($display == "freshsales")
    return renderFreshSales($data);
  else if ($display == "costzero")
    return renderCostZero($data);
  else if ($display == "selection")
    return renderSelection($data);

  else if ($display == "pricecalculator")  
    return renderPriceCalculator($data);
  else if ($display == "allwaitingpo")
    return renderAllWaitingPO($data);
  // RESULTS
  else if ($display == "biglabelpromo")
  {
    if (count($data) == 1)
      renderOneProductPromo($data[0]);
    else // TMP    
      renderTwoProductPromo($data[0],$data[1]);
  }
  else if ($display == "biglabel")
  {
    if (count($data) == 1)    
      return renderOneProduct($data[0]);    
    else     
      return renderTwoProduct($data[0],$data[1]);     
  }
  else if ($display == "barcodegenerator")  
      return renderBarcodeGenerator($data);  
  else if ($display == "custombarcode")  
      return renderCustomBarcodeList($data);
  // FINANCE
  else if ($display == "bank")
    return renderBank($data);  

  // SUPPLY RECORD
  else if ($display == "supplyrecordsearch")
    return renderSupplyRecordSearch($data);
  else if ($display == "itemrequestactionlist")
    return renderItemRequestActionList($data);
  else if ($display == "supplyrecordlist")
    return renderSupplyRecordList($data,$_GET["action"]);
  else if ($display == "supplyrecorddetails")
    return renderSupplyRecordDetail($data,$_GET["action"]);
  
  // ITEM REQUEST
  else if ($display == "itemrequestactionsearch")
    return renderItemRequestActionSearch($data);
    else if ($display == "itemrequestactionsearch")
    return renderItemRequestActionSearch($data); 
  else if ($display == "itemrequestactionlist")
    return renderItemRequestActionList($data);
  else if ($display == "itemrequestactiongroupedpurchaselist")
    return renderItemRequestactionGroupedPurchaseList($data);
  else if ($display == "itemrequestactiondetails")
    return renderItemRequestActionDetails($data);
  else if ($display == "itemrequestactioncreate")
    return renderItemRequestActionCreate($data);

  else if ($display == "itemrequestrestockcreate")
    return renderItemRequestRestockCreate($data);


  else if ($display == "depleteditems")
    return renderDepletedItemList($data);


  // DEPRECATION
  else if ($display == "receptionRecordDetailNOPO")
    return renderReceptionRecordDetailNOPO($data);

  else if ($display == "vault")
    return renderVault($data);  
  else if ($display == "vaultdetail")


    return renderVaultDetail($data);
  else if ($display == "lowseller")
    return renderLowSeller($data);
  else if ($display == "priceprogression")
    return renderPriceProgression($data);
  else if ($display == "receptioncancel")
    return renderReceptionCancel($data);


  return renderProfile();
}

function renderTimeout()
{
  return '
        <div class="col s12 m8 l9">
            <div class="row" align="center">    
              Session Timeout<br>
              <a href="?action=logout">Re-Connect </a>
            </div>
        </div>
  ';
}

function renderPage()
{
    echo   
     renderHeader().
        '<div id="main">                
            <div class="wrapper">'.
               renderLeftSidebar().
               '<section id="content">'.
                 renderTop().                      
                '<div class="container">
                   <div class="section">'.
                   renderBody().
                  '</div>
                </div> 
                </section>                    
            </div>                  
          </div>'.                             
     renderFooter();     
}


?>

<!DOCTYPE html>
<html lang="en">
  <div id='fullscreenimage' align='center' valign='center' style='visibility:hidden;position: absolute; top: 0; right: 0; bottom: 0; left: 0;
                                  padding-top: 200px;                                     
                                   height:150%;width:100%;z-index:1000;background-color:rgba(0,0,0,0.7)'>
      <img id='imagefullscreen'>                                 
  </div>
  <script type="text/javascript">
    
  var fullscreen = document.getElementById('fullscreenimage');
  fullscreen.style.cursor = 'pointer';
  fullscreen.onclick = function() {
  fullscreen.style.visibility = "hidden";
  };
  function enlargeimage(src)
  {
          document.getElementById('fullscreenimage').style.visibility = 'visible';
          document.getElementById('imagefullscreen').src = src;
   } 
  </script>


  
<?php   
  // LOGIN / LOGOUT HANDLING
  if (isset($_GET["action"])) 
  {
      if ($_GET["action"] == "login"  && isset($_POST["username"]) && isset($_POST["password"]))
      {        
        $result = (array)Service::Login($_POST["username"],$_POST["password"]);         
        if ($result["result"] == "OK")  
        {
          $_SESSION["USER"] = $result["user"];                  
          $_SESSION["TOKEN"] = $result["token"];                
        }
        else 
          $_SESSION["warn"] = "yes";
      }
      else if ($_GET["action"] == "logout")               
        unset($_SESSION["TOKEN"]);                          
  }
?>


<?= renderHead(!isset($_SESSION["TOKEN"]) ) ?>
<body class="grey lighten-2">  


  <?= includeScriptsBefore() ?>
  
  <?php    
    if (!isset($_SESSION["TOKEN"]) && !isset($_GET["action"])) // NO SESSION, NO ACTION
    {    
        echo renderLogin(); 
    }  
    else if (isset($_SESSION["TOKEN"]))      
    {      

        doAction(isset($_GET["action"]) ? $_GET["action"] : "");                  
        renderPage();               
    }  
    else{ // LOGOUT + ELSE
        $warn = isset($_SESSION["warn"]);
        unset($_SESSION["warn"]);
        echo renderLogin($warn);    
    }
   ?>
  
  <?= includeScripts() ?>  
  <script type="text/javascript">
    $("#formLogin").validate({
        rules: {
            username: {
                required: true,
                minlength: 4
            },
            password: {
                required: true,
                minlength: 4
            }           
        },        
        messages: {
            username:{
                required: "Enter a username",
                minlength: "Enter at least 4 characters"
            },          
            password:{
                required: "Enter a password",
                minlength: "Enter at least 4 characters"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
      
              
  </script>  
</body>

</html>