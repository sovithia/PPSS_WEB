<?php 
include('Service.php');

function renderOverlay()
{
  return '<div class="overlay">
          </div>';  
}

//-- SKELETON --//
function renderHead($center = false)
{
	return '
    	<head>
    	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	  <meta name="msapplication-tap-highlight" content="no">
    	  <meta name="description" content="Phnom Penh SuperStore!">
    	  <meta name="keywords" content="phnom penh, supermarket, superstore">
    	  <title>SuperStore</title>

    	  <!-- Favicons-->
    	  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    	  <!-- Favicons-->
    	  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    	  <!-- For iPhone -->
    	  <meta name="msapplication-TileColor" content="#00bcd4">
    	  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">    	      	  
        <!-- CORE CSS-->
    	  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    	  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    	  '
        .
          ($center == true ? '<link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">' : '')
        .
    	  '
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    	  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    	  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- data-tables --> 
    	  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    	  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <!--Datatable fixed header -->        
        <link href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <!--dropify-->
        <link href="js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">


       

        <!-- Custom CSS-->    
        <link href="css/custom/custom.css" type="text/css" rel="stylesheet" media="screen,projection">
    	</head>';
}
function renderLoadAnimation()
{
	return '	 
  	<div id="loader-wrapper">
    	<div id="loader"></div>        
      	<div class="loader-section section-left"></div>
      	<div class="loader-section section-right"></div>
  	</div>';  
}
function renderHeader()
{
  $averageBasket = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/averagebasket");  
  $averageBasket = "Avg Basket ". date('F, Y') .": ".$averageBasket;
	return ' 
		  	<header id="header" class="page-topbar">
		        <!-- start header nav-->
		        <div class="navbar-fixed">
		            <nav class="navbar-color" >
		                <div class="nav-wrapper blacktile">
                    <marquee>'.$averageBasket.'</marquee>
		                    <ul class="left">                      
		                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"></a> 
                          </h1></li>
		                    </ul>                                      
		                </div>
		            </nav>
		        </div>
		        <!-- end header nav-->
		    </header>';
}
function renderTop()
{
  if (!isset($_GET['display']))
    return;

  if ($_GET['display'] == 'list')
  {    
    $entity = $_GET['entity'];  
      
    return '
     <div id="breadcrumbs-wrapper">                        
          <div class="container">
            <div class="row">            
             <div class="col s10 m11 l11 center-align large breadcrumbs-title" >'.$_GET['entity'].'</div>            
              <div  class="col s12 m1 l1"  >
                <a href="?display=singleCreate&action=none&entity='.$entity.'" class="btn-floating btn-large right"><i class="mdi-content-add"></i></a>
              </div>              
            </div>
          </div>
      </div>';       
  }
  else
  {             
        return '
         <div id="breadcrumbs-wrapper">                        
              <div class="container">
                <div class="row">            
                    
                    <div class="col s10 m11 l11 center-align large breadcrumbs-title" >'.$_GET['entity'].'</div>            
                </div>
              </div>
         </div>';                           
  }      
}

function includeScriptsBefore()
{
  return '
       <!-- jQuery Library -->
       
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Datatables --> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

        <!-- Datatable Edit -->
        <script src="js/dataTables.cellEdit.js"></script>

        <!-- Fixed Header Datatable Edit -->
        <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

        <!--angularjs-->
        <script type="text/javascript" src="js/plugins/angular.min.js"></script> 
        <!-- formatter -->
        <script type="text/javascript" src="js/plugins/formatter/jquery.formatter.min.js"></script>      
        <!-- Chart.JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>    

        <!-- Signature -->
        <script type="text/javascript" src="js/html2canvas.min.js"></script>
        <script type="text/javascript" src="js/canvas-toBlob.js"></script>
        <script type="text/javascript" src="js/FileSaver.js"></script>
        <script type="text/javascript" src="js/script.js"></script>          
  ';
}

function includeScripts()
{
	return '

		    <!--materialize js-->        
		    <script type="text/javascript" src="js/materialize.js"></script>
		    <!--prism
		    <script type="text/javascript" src="js/prism/prism.js"></script>-->
		    <!--scrollbar-->
		    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		    <!-- data-tables -->
		    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
		    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
		    
        <!-- validate -->
        <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>

		    <!-- dropify -->
        <script type="text/javascript" src="js/plugins/dropify/js/dropify.min.js"></script>        
		    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
		    <script type="text/javascript" src="js/plugins.js"></script>
		    <!--custom-script.js - Add your own theme custom JS-->
		    <script type="text/javascript" src="js/custom-script.js"></script>

       ';
}



//-- LOGIN --//
function renderLogin($warning = false)
{
  $image = 'logo.png';  
  $print = ($warning == true) ? '<p class="center login-form-text red">Wrong Login</p>' : ''; 
  return '
   <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" id="formLogin" method="POST" action="?action=login">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/'.$image.'" alt="" class="circle responsive-img valign profile-image-login">
            '            
            .$print.            
          '</div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="username" type="text" >
            <label for="username" class="center-align">Login</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>        
        <div class="row">
          <div class="input-field col s12">             
             <input type="submit" class="btn waves-effect waves-light col s12 grey darken-2" value="Login">
          </div>
        </div>      
      </form>
    </div>
  </div> 
  ';
}

function renderProfile()
{
  $body = '<div align="center" class="row" >     
              <div class="col s12 m12 l12">
                <center><h1>Hello '.$_SESSION["USER"]["firstname"].' '.$_SESSION["USER"]["lastname"].' </h1></center>
              </div>                
              <div class="col s12 m12 l12 center ">                
                <img width="400px" height="400px" src="images/logo.png"/>                
            </div>                  
       </div>
       <br><br><br><br><br><br><br><br>';
  return $body;
}


function moduleMAMAN()
{
  $body = '
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation whitetile">
            <li class="blacktile cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="?action=profile"><i class="mdi-action-face-unlock"></i>Profile</a>
                        </li>                        
                        <li class="divider"></li>                        
                        <li><a href="?action=logout"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">SuperStore<i class="mdi-navigation-arrow-drop-down right"></i></a>                    
                </div>
            </div>

          
    
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation whitetile">
            <li class="blacktile cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="?action=profile"><i class="mdi-action-face-unlock"></i>Profile</a>
                        </li>                        
                        <li class="divider"></li>                        
                        <li><a href="?action=logout"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">SuperStore<i class="mdi-navigation-arrow-drop-down right"></i></a>                    
                </div>
            </div>';   

      return $body;
}

function hoverColor($identifier){
   $one = isset($_GET["display"]) ? $_GET["display"] : "";
   $two = isset($_GET["entity"]) ? $_GET["entity"] : "";
  if(isset($_GET["type"]))
        $three = $_GET["type"];
  else if (isset($_GET["status"]))
        $three = $_GET["status"];
  else
        $three = "";
  $four = isset($_GET["action"]) ? $_GET["action"] : "";

  $compare = $one.$two.$three.$four;

  if ($identifier == $compare)
    return 'style="background-color:gray"';
  else
    return '';  
}

function renderLeftSidebar()
{  
  


  $sectionADMIN = '<li class="li-hover"><div class="divider"></div></li>
                   <li class="li-hover"><p class="ultra-small margin more-text">ADMIN</p></li>
                   </li>            
                   
                  <li '.hoverColor("KPISales").' class="bold"><a href="?display=KPISales&entity=KPISales" class="waves-effect waves-cyan">
                    <img src="images/sale.png" width="30px" height="30px">Sales</a></li>
                  <li '.hoverColor("KPICategory").'><a href="?display=KPICategory&action=no&entity=KPICategory"><img src="images/categorysales.png" width="30px" height="30px">Sales By Category</a></li>
                  <li '.hoverColor("KPIRow").'><a href="?display=KPIRow&action=no&entity=KPIRow"><img src="images/rowsales.png" width="30px" height="30px">Sales By ROW</a></li>
                  <li '.hoverColor("KPIAverage").'><a href="?display=KPIAverage&action=no&entity=KPIAverage"><img src="images/salesbasket.png" width="30px" height="30px">Average Sales</a></li>
                  <li '.hoverColor("bank").'><a href="?display=bank&action=no&entity=bank"><img src="images/bank.png" width="30px" height="30px">Bank Accounts</a></li>
                  <li '.hoverColor("sales").'><a href="?display=sales&action=no&entity=sales"><img src="images/sale.png" width="30px" height="30px">Sales</a></li>
                  <li '.hoverColor("adjusteditems").'><a href="?display=adjusteditems&action=no&entity=adjusteditems"><img src="images/adjust.png" width="30px" height="30px">Adjusted Items</a></li>';

  
  $hide = 'style="display:none"';          

  $sectionSTORECLERK =      '<li class="li-hover"><div class="divider"></div></li>
                             <li class="li-hover"><p class="ultra-small margin more-text">STORE CLERK</p></li>                                                        
                          
                            <li '.hoverColor("itemrequestactionlist"."itemrequestaction"."aDEMAND").'>
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=aDEMAND&status=SUBMITTED">
                            <img src="images/icons/STRCLRK/ItemRequestDemandSubmittedListPage.png" width="30px" height="30px">ItemDemand(?)</a></li>
                            ';            

  $sectionSTORESUPERVISOR ='<li  class="li-hover"><div class="divider"></div></li>
                            <li class="li-hover"><p class="ultra-small margin more-text">STORE SUPERVISOR</p></li>
                                                  
                            <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."DEMAND").' >
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=DEMAND&status=TODO" >
                            <img src="images/icons/STRSPVR/ItemRequestDemandTodoListPage.png" width="30px" height="30px">ItemDemand(!)</a></li>
                            
                            <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."vDEMAND").' >
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=vDEMAND&status=VALIDATED" >
                            <img src="images/icons/STRSPVR/ItemRequestDemandValidatedListPage.png" width="30px" height="30px">ItemDemand(#)</a></li>
                            

                            <li  '.hoverColor("itemrequestrestockcreate"."itemrequestitemspool"."RESTOCK").' >
                            <a href="?display=itemrequestrestockcreate&entity=itemrequestactionpool&type=RESTOCK" >
                            <img src="images/icons/STRSPVR/ItemRequestRestockCreatePage.png" width="30px" height="30px">ItemRestock(+)</a></li>
                        
                            <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."RESTOCK").' >
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=vRESTOCK&status=SUBMITTED" >
                            <img src="images/icons/WH/ItemRequestRestockValidatedListPage.png" width="30px" height="30px">ItemRestock(#)</a></li>                            

                           <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."GROUPEDRESTOCK").' >
                           <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=GROUPEDRESTOCK&status=SUBMITTED" >
                           <img src="images/icons/WH/ItemRequestRestockValidatedListPage.png" width="30px" height="30px">ItemRestock(GROUPED)</a></li>
                            

                            <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."TRANSFER").' >
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=TRANSFER&status=TODO" >
                            <img src="images/icons/STRSPVR/ItemRequestTransferTodoListPage.png" width="30px" height="30px">ItemTransfer(!)</a></li>
                            

                            <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."vTRANSFER").' >
                            <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=vTRANSFER&status=VALIDATED" >
                            <img src="images/icons/STRSPVR/ItemRequestTransferValidatedListPage.png" width="30px" height="30px">ItemTransfer(#)</a></li>
                            
                            
                     ';

 $sectionVALIDATOR =     '<li class="li-hover"><div class="divider"></div></li>
                           <li class="li-hover"><p class="ultra-small margin more-text">VALIDATOR</p></li>
                          
                           <li '.hoverColor("supplyrecordlist"."supplyrecord"."WAITING"."VAL").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=WAITING&action=VAL" >
                           <img src="images/icons/VAL/SupplyRecordListVALTodoPage.png" width="30px" height="30px">SupplyRecord(Todo)</a></li>

                           <li  '.hoverColor("supplyrecordlist"."supplyrecord"."VALIDATED"."VAL").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=VALIDATED&action=VAL" >
                           <img src="images/icons/VAL/SupplyRecordListVALDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>                        
                          ';


  $sectionWAREHOUSECLERK =     '<li class="li-hover"><div class="divider"></div></li>
                           <li class="li-hover"><p class="ultra-small margin more-text">WAREHOUSE</p></li>
                          
                           <li '.hoverColor("supplyrecordlist"."supplyrecord"."ORDERED"."WH").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=ORDERED&action=WH" >
                           <img src="images/icons/WH/SupplyRecordListWHTodoPage.png" width="30px" height="30px">SupplyRecord(Todo)</a></li>

                           <li  '.hoverColor("supplyrecordlist"."supplyrecord"."DELIVERED"."WH").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=DELIVERED&action=WH" >
                           <img src="images/icons/WH/SupplyRecordListWHDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>

                           <li '.hoverColor("supplyrecordlist"."supplyrecord"."DELIVEREDAUTO"."RCV").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=DELIVEREDAUTO&action=RCV" >
                           <img src="images/icons/WH/SupplyRecordListWHTodoPage.png" width="30px" height="30px">SupplyRecord(EASY PO)</a></li>

                           <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."GROUPEDRESTOCK").' >
                           <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=GROUPEDRESTOCK&status=TODO" >
                           <img src="images/icons/WH/ItemRequestRestockTodoListPage.png" width="30px" height="30px">ItemRestock(!)</a></li>

                           <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."vGROUPEDRESTOCK").' >
                           <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=GROUPEDRESTOCK&status=SUBMITTED" >
                           <img src="images/icons/WH/ItemRequestRestockValidatedListPage.png" width="30px" height="30px">ItemRestock(#)</a></li>


                           <li  '.hoverColor("itemrequestactioncreate"."itemrequestitemspool"."PURCHASE").' >
                           <a href="?display=itemrequestactioncreate&entity=itemrequestactionpool&type=PURCHASE" >
                           <img src="images/icons/WH/ItemRequestPurchaseCreatePage.png" width="30px" height="30px">ItemPurchase(+)</a></li>
                           
                           <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."PURCHASE").' >
                           <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=PURCHASE&status=SUBMITTED" >
                           <img src="images/icons/WH/ItemRequestPurchaseSubmittedListPage.png" width="30px" height="30px">ItemPurchase(!)</a></li>
                           
                           <li  '.hoverColor("itemrequestactioncreate"."itemrequestactionpool"."TRANSFER").' >
                           <a href="?display=itemrequestactioncreate&entity=itemrequestactionpool&type=TRANSFER" >
                           <img src="images/icons/WH/ItemRequestTransferCreatePage.png" width="30px" height="30px">ItemTransfer(+)</a></li>

                           <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."TRANSFER").' >
                           <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=TRANSFER&status=SUBMITTED" >
                           <img src="images/icons/WH/ItemRequestTransferSubmittedListPage.png" width="30px" height="30px">ItemTransfer(?)</a></li>
                           ';

                        

  $sectionPURCHASER = '<li class="li-hover"><div class="divider"></div></li>
                        <li  class="li-hover"><p class="ultra-small margin more-text">PURCHASER</p></li>
                                                
                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."WAITING"."PCH").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=WAITING&action=PCH">
                        <img src="images/icons/PCH/SupplyRecordListPCHCreatedPage.png" width="30px" height="30px">SupplyRecord(Waiting)</a></li>   

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."VALIDATED"."PCH").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=VALIDATED&action=PCH" >
                        <img src="images/icons/PCH/SupplyRecordListPCHTodoPage.png" width="30px" height="30px">SupplyRecord(Todo)</a></li>

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."ORDERED"."PCH").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=ORDERED&action=PCH" >
                        <img src="images/icons/PCH/SupplyRecordListPCHDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."DELIVERED"."WH").' >
                           <a href="?display=supplyrecordlist&entity=supplyrecord&status=DELIVERED&action=WH" >
                           <img src="images/icons/WH/SupplyRecordListWHDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>


                        <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."PURCHASE").' >
                        <a href="?display=itemrequestactiongroupedpurchaselist&entity=itemrequestaction&type=GROUPEDPURCHASE&status=TODO" >
                        <img src="images/icons/PCH/ItemRequestPurchaseTodoListPage.png" width="30px" height="30px">ItemPurchase(!)</a></li>

                        <li  '.hoverColor("itemrequestactionlist"."itemrequestaction"."vGROUPEDPURCHASE").' >
                        <a href="?display=itemrequestactionlist&entity=itemrequestaction&type=vGROUPEDPURCHASE&status=VALIDATED" >
                        <img src="images/icons/PCH/ItemRequestPurchaseValidatedListPage.png" width="30px" height="30px">ItemPurchase(#)</a></li>                  

                        ';
            


  $sectionRECEIVER =  '<li class="li-hover"><div class="divider"></div></li>
                        <li  class="li-hover"><p class="ultra-small margin more-text">RECEIVING</p></li>        

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."DELIVERED"."RCV").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=DELIVERED&action=RCV" >
                        <img src="images/icons/RCV/SupplyRecordListRCVTodoPage.png" width="30px" height="30px">SupplyRecord(Todo)</a></li>

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."RECEIVED"."RCV").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=RECEIVED&action=RCV" >
                        <img src="images/icons/RCV/SupplyRecordListRCVDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>
                                                  
                        <li '.hoverColor("custombarcode").'><a href="?display=custombarcode&action=no&entity=custombarcode"><img src="images/barcode.png" width="30px" height="30px">Custom Barcodes List</a></li>
                        <li '.hoverColor("barcodegenerator").'><a href="?display=barcodegenerator&action=no&entity=barcodegenerator"><img src="images/barcodesgenerator.png" width="30px" height="30px">Barcode generator</a></li>
                        <li '.hoverColor("pricecalculator").'><a href="?display=pricecalculator&action=no&entity=pricecalculator"><img src="images/calculator.png" width="30px" height="30px">Price Calculator</a></li>';           




  $sectionACCOUNTANT = '<li class="li-hover"><div class="divider"></div></li>
                        <li class="li-hover"><p class="ultra-small margin more-text">ACCOUNTING</p></li>

                        
                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."PAID"."ACC").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=RECEIVED&action=ACC" >
                        <img src="images/icons/ACC/SupplyRecordListACCTodoPage.png" width="30px" height="30px">SupplyRecord(Todo)</a></li>

                        <li  '.hoverColor("supplyrecordlist"."supplyrecord"."RECEIVED"."ACC").' >
                        <a href="?display=supplyrecordlist&entity=supplyrecord&status=PAID&action=ACC" >
                        <img src="images/icons/ACC/SupplyRecordListACCDonePage.png" width="30px" height="30px">SupplyRecord(Done)</a></li>                       
            ';


  $sectionCOMMON = '
            <li  class="li-hover"><div class="divider"></div></li>
            <li  class="li-hover"><p class="ultra-small margin more-text">COMMON</p></li>

            <li '.hoverColor("depleteditems").' >
                <a href="?display=depleteditems&entity=depleteditems" >
                <img src="images/icons/STRSPVR/DepletemItemListPage.png" width="30px" height="30px">Depleted Items(!)</a></li>

            <li '.hoverColor("supplyrecordsearch").'><a href="?display=supplyrecordsearch&action=no&entity=supplyrecordsearch"><img src="images/icons/SupplyRecordSearchPage.png" width="30px" height="30px">SupplyRecord Search</a></li>

              <li '.hoverColor("itemrequestactionsearch").'><a href="?display=itemrequestactionsearch&action=no&entity=itemrequestactionsearch"><img src="images/icons/ItemRequestActionSearchPage.png" width="30px" height="30px">ItemRequestAction Search</a></li>

            <li '.hoverColor("priceprogression").' ><a href="?display=priceprogression&action=no&entity=priceprogression"><img src="images/progression.png" width="30px" height="30px">Price Progression</a></li>

            <li '.hoverColor("itemsearch").'><a href="?display=itemsearch&action=no&entity=itemsearch"><img src="images/loupe.png" width="30px" height="30px">Item Search</a></li> 
            <li '.hoverColor("itemsearch2").'><a href="?display=itemsearch2&action=no&entity=itemsearch2"><img src="images/loupe.png" width="30px" height="30px">Item Search 2</a></li>
            <li '.hoverColor("itemsearch3").'><a href="?display=itemsearch3&action=no&entity=itemsearch3"><img src="images/loupe.png" width="30px" height="30px">Item Search 3</a></li>
            

            <li '.hoverColor("supplierlist").'><a href="?display=supplierlist&action=no&entity=supplier"><img src="images/supplier.png" width="30px" height="30px">Supplier List</a></li>            
            <li '.hoverColor("allwaitingpo").'><a href="?display=allwaitingpo&action=no&entity=allwaitingpo"><img src="images/waitingpo.png" width="30px" height="30px">All Waiting PO</a></li>
            <li '.hoverColor("itemreceived").'><a href="?display=itemreceived&action=no&entity=itemreceived"><img src="images/receiveitem.png" width="30px" height="30px">Items Received</a></li>            
            <li '.hoverColor("damageditems").'><a href="?display=damageditems&action=no&entity=damageditems"><img src="images/damaged.png" width="30px" height="30px">Damaged Items</a></li>             
            <li '.hoverColor("promotionlist").'><a href="?display=promotionlist&action=no&entity=promotionlist"><img src="images/promoted.png" width="30px" height="30px">Promotion List</a></li>
            <li '.hoverColor("lowseller").'><a href="?display=lowseller&saction=no&entity=lowseller"><img src="images/lowsell.png" width="30px" height="30px">Low Sell</a></li>                                
            <li '.hoverColor("itemthrown").'><a href="?display=itemthrown&action=no&entity=itemthrown"><img src="images/expired.png" width="30px" height="30px">Items Thrown</a></li>
            <li '.hoverColor("bestseller").'><a href="?display=bestseller&action=no&entity=bestseller"><img src="images/bestseller.png" width="30px" height="30px">Best Seller</a></li>
            '; 



  $sectionLABELS = '  
            <li  class="li-hover"><div class="divider"></div></li>        
            <li  class="li-hover"><p class="ultra-small margin more-text">LABELS</p></li>  
            <li '.hoverColor("labelsmall").'><a href="?display=labelsmall&action=no&entity=smalllabel"><img src="images/smalllabel.png" width="30px" height="30px">Small Label</a></li>
            <li '.hoverColor("smalllabelnew").'><a href="?display=smalllabelnew&action=no&entity=smalllabelnew"><img src="images/smalllabel.png" width="30px" height="30px">Small Label</a></li>          
            <li '.hoverColor("a7label").'><a href="?display=a7label&action=no&entity=a7label"><img src="images/A6Labels.png" width="30px" height="30px">A7 Labels</a></li>  
            <li '.hoverColor("a6label").'><a href="?display=a6label&action=no&entity=a6label"><img src="images/A6Labels.png" width="30px" height="30px">A6 Labels</a></li>  
            <li '.hoverColor("a5label").'><a href="?display=a5label&action=no&entity=a5label"><img src="images/A5Labels.png" width="30px" height="30px">A5 Labels</a></li>            
            <li '.hoverColor("a4label").'><a href="?display=a4label&action=no&entity=a4label"><img src="images/biglabel.png" width="30px" height="30px">A4 Label</a></li>
            <li '.hoverColor("promotiontag").'><a href="?display=promotiontag&action=no&entity=promotiontag"><img src="images/promotion.png" width="30px" height="30px">Promotion Tag</a></li>
            <li '.hoverColor("labelword").'><a href="?display=labelword&action=no&entity=labelword"><img src="images/word.png" width="30px" height="30px">Word Label Generator</a></li>';
            

  $sectionPROBLEMS = '
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">PROBLEMS</p></li>
            <li '.hoverColor("lowprofit").'><a href="?display=lowprofit&saction=no&entity=lowprofit"><img src="images/lowprofit.png" width="30px" height="30px">Low Profit</a></li>
            <li '.hoverColor("costzero").'><a href="?display=costzero&action=no&entity=costzero"><img src="images/costzero.png" width="30px" height="30px">Cost Zero</a></li>
            <li '.hoverColor("itemzerostock").'><a href="?display=itemzerostock&action=no&entity=itemzerostock&page=0"><img src="images/zero.png" width="30px" height="30px">Item Zero Stock</a></li>
            <li '.hoverColor("zerosale").'><a href="?display=zerosale&action=no&entity=zerosale&page=0"><img src="images/zerosale.png" width="30px" height="30px">Item Zero Sale</a></li>
            <li '.hoverColor("itemnegative").'><a href="?display=itemnegative&action=no&entity=itemnegative"><img src="images/negative.png" width="30px" height="30px">Item Negative</a></li>
  ';    


  $sectionBETA = '<li class="li-hover"><div class="divider"></div></li>
                  <li class="li-hover"><p class="ultra-small margin more-text">BETA</p></li>
                  <li '.hoverColor("trombi").' class="bold"><a href="?display=trombi&entity=trombi" class="waves-effect waves-cyan"><img src="images/trombi.png" width="30px" height="30px">Trombi</a></li>          
                  <li '.hoverColor("scheduleAll").' class="bold "><a href="?display=scheduleAll&entity=scheduleAll" class="waves-effect waves-cyan"><img src="images/timetable.png" width="30px" height="30px">Timetable</a></li>
                  <li '.hoverColor("schedule").' class="bold "><a href="?display=schedule&entity=schedule&ID='.$_SESSION["USER"]["ID"].'" class="waves-effect waves-cyan"><img src="images/schedule.png" width="30px" height="30px">My Schedule</a></li>
                  <li '.hoverColor("downloadapp").' class="bold"><a href="?display=downloadapp&entity=app" class="waves-effect waves-cyan"><img src="images/downloadapp.png" width="30px" height="30px">Download App</a></li>
                  <li '.hoverColor("restday").' class="bold"><a href="?display=restday&entity=restday&ID='.$_SESSION["USER"]["ID"].'" class="waves-effect waves-cyan"><img src="images/restday.png" width="30px" height="30px">Restday</a></li>
                  <li '.hoverColor("createpo").'><a href="?display=createpo&action=no&entity=createpo"><img src="images/create.png" width="30px" height="30px">Create PO</a></li>
                  <li '.hoverColor("shelfrental").'><a href="?display=shelfrental&action=no&entity=shelfrental"><img src="images/shelfrental.png" width="30px" height="30px">Shelf Rental</a></li>
                  <li '.hoverColor("leaflet").'><a href="?display=leaflet&action=no&entity=leaflet"><img src="images/leaflet.png" width="30px" height="30px">Leaflet Generator</a></li>
                  <li '.hoverColor("selection").'><a href="?display=selection&action=no&entity=selection"><img src="images/selection.png" width="30px" height="30px">Selection</a></li>
                  <li '.hoverColor("itemsale").'><a href="?display=itemsale&action=no&entity=itemsale"><img src="images/itemsale.png" width="30px" height="30px">Item Sale</a></li>                    
                  <li '.hoverColor("freshsales").'><a href="?display=freshsales&action=no&entity=freshsales"><img src="images/fresh.png" width="30px" height="30px">Fresh Sales</a></li>                      
                  <li '.hoverColor("salarylist").'><a href="?display=salarylist&action=no&entity=salary"><img src="images/salary.png" width="30px" height="30px">Salaries</a></li> 
                  <li '.hoverColor("restdaylist").'><a href="?display=restdaylist&action=no&entity=restday"><img src="images/permission.png" width="30px" height="30px">Day Off Requests</a></li>              
                  <li '.hoverColor("receivepo").'><a href="?display=receivepo&action=no&entity=receivepo"><img src="images/receive.png" width="30px" height="30px">Receive PO</a></li>
                  ';         
  $sectionBETA = '';

  $sectionMAMAN = '<li class="li-hover"><div class="divider"></div></li>
                  <li class="li-hover"><p class="ultra-small margin more-text">LOOKUP</p></li>
                  <li '.hoverColor("tinyitemsearch").'><a href="?display=tinyitemsearch&action=no&entity=tinyitemsearch"><img src="images/loupe.png" width="30px" height="30px">Search</a></li>';


  // SPECIFIC
  $modulesList["STORECLERK"] = $sectionSTORECLERK;
  $modulesList["STORESUPERVISOR"] = $sectionSTORESUPERVISOR;

  $modulesList["VALIDATOR"] =  $sectionVALIDATOR;
  $modulesList["WAREHOUSECLERK"] =  $sectionWAREHOUSECLERK;
  $modulesList["PURCHASER"] = $sectionPURCHASER;

  $modulesList["RECEIVER"] = $sectionRECEIVER;
  $modulesList["ACCOUNTANT"] = $sectionACCOUNTANT;
  
  

  // FOR ALL 
  $modulesList["COMMON"] = $sectionCOMMON;
  $modulesList["LABELS"] = $sectionLABELS;
  $modulesList["PROBLEMS"] = $sectionPROBLEMS;

  // FOR ME 
  $modulesList["BETA"] = $sectionBETA;
  $modulesList["ADMIN"] = $sectionADMIN;
  $modulesList["MAMAN"] = $sectionMAMAN;

  $entity = isset($_GET['entity']) ? $_GET['entity'] : "";
  $modules = explode('|',$_SESSION["USER"]["webmodules"]);

  $isMAMAN = false;
  foreach($modules as$module) {  
    if ($module == "MAMAN")      
       $isMAMAN = true;
  }

   $body = '
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation whitetile">
            <li class="blacktile cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="?action=profile"><i class="mdi-action-face-unlock"></i>Profile</a>
                        </li>                        
                        <li class="divider"></li>                        
                        <li><a href="?action=logout"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">SuperStore<i class="mdi-navigation-arrow-drop-down right"></i></a>                    
                </div>
            </div>';

 
  foreach($modules as$module) {
    $body .= $modulesList[$module];    
  } 

  
  if ($isMAMAN == false){
    $body .= $modulesList["COMMON"];
    $body .= $modulesList["PROBLEMS"];  
  }         
  
  $body .= '<li class="li-hover"><p class="ultra-small margin more-text">END</p></li>
        </ul><br><br>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu "></i></a>
  </aside><br>
  ';

  return $body;
}



function renderFooter()
{
  return '
        <footer class="page-footer">
          <div class="footer-copyright blacktile">
            <div class="container">
              <span>Copyright © 2019 Uditi All rights reserved.</span>
              <span class="right"> -- </span>
              </div>
          </div>
        </footer>
       ';  
}

//-- SKELETON --//

function extractFile()
{
  if (isset($_FILES["file"]))  
    $_POST["file"] = base64_encode(file_get_contents($_FILES['file']['tmp_name']));  
}

function base64ToFile($base64_string) 
{
    $base64_string = str_replace('data:image/png;base64,', '', $base64_string);
    $base64_string = str_replace(' ', '+', $base64_string);
    $data = base64_decode($base64_string);
    $file = 'images/tmp/' . uniqid() . '.png';
    file_put_contents($file, $data);  
    return $file;    
}

function elemSelect($elements,$label,$size = 10,$default = 0)
{
  $body = '<div class="input-field col s'.$size.'">                
                  <select name='.$label.' id='.$label.'>
                      ';
  
  foreach($elements as $element)
  {
    if ($element == $default){  
      $body .= '<option selected value="'.$element.'">'.$element.'</option>'; 
    }
    else
      $body .= '<option value="'.$element.'">'.$element.'</option>'; 
  }                                            
  $body .=       '</select>
                  <label for="'.$label.'">'.$label.'</label>
            </div>';
  return $body;            
}


function dateSelect($field,$strDate = "")
{    
  if ($strDate == "")
    $strDate = date('Y-m-d');


  $body = '<div class="input-date-picker col s12">  
              <label for="'.$field.'">'.$field.'</label>
              <input placeholder="2000-12-20" type="text" name="'.$field.'" id="'.$field.'" value='.$strDate.'>                                          
            </div>
            <script type="text/javascript">
                $( function() {                  
                  $( "#'.$field.'" ).datepicker({ dateFormat: "yy-mm-dd" });
            } );            
               
            </script>'            
            ;
  return $body;            
}

function dateSelectMonth($field,$strDate = "")
{    
  if ($strDate == "")
    $strDate = date('Y-m');


  $body = '<div class="input-date-picker col s12">  
              <label for="'.$field.'">'.$field.'</label>
              <input placeholder="2000-12-20" type="text" name="'.$field.'" id="'.$field.'" value='.$strDate.'>                                          
            </div>
            <script type="text/javascript">
                $( function() {                  
                  $( "#'.$field.'" ).datepicker({ dateFormat: "yy-mm" });
            } );            
               
            </script>'            
            ;
  return $body;            
}



function maskedInput($field,$value,$placeholder,$mask)
{
  $body = '<div class="col s12">  
              <label for="'.$field.'">'.$field.'</label>
              <input placeholder="'.$placeholder.'" type="text" name="'.$field.'" id="'.$field.'" value='.$value.'>                                          
            </div>
            <script type="text/javascript">
                $("#'.$field.'").formatter({
                  "pattern": "'.$mask.'",
                });
            </script>'            
            ;
  return $body;  
}

function fileSelect($name,$data = null) 
{
    $base64Img = base64NA();
    if ($data != null)
    {            
      $binaryData = base64_decode($data);
      file_put_contents("images/tmp/tmp.pdf", $binaryData);
      $handle = fopen("images/tmp/tmp.pdf", "r");
      $header = fread($handle, 4);
      fclose($handle);    
      
      if ($header == "%PDF")
      {                    
        $myurl = "images/tmp/tmp.pdf[1]";
        $image = new Imagick();
        $image->setResolution( 300,300 );
        $image->readImage($myurl);
        $image->setImageFormat('jpeg');        
        $newFile = 'images/tmp/' . uniqid() . '.png';
        $image->writeImage($newFile);
        $base64Img = "data:image/png;base64,".base64_encode(file_get_contents($newFile));    
      }      
    }   
  return '
  <hr style="color:#D3D3D3" >
    <div class="file-field input-field">    

      <div class="col s12 m12 l12">
        <p>&nbsp;</p>
        <p><img height="300px" src="'.$base64Img.'"></p>
      </div>
      <div class="btn">
        <span>File</span>
        <input type="file" name="'.$name.'">
      </div>
      <div class="file-path-wrapper">        
        <input class="file-path validate" type="text">
      </div> 
      <label for="'.$name.'">'.$name.'</label>     
    </div>';
}


function renderImageList($type = "",$imageID = null,$imageArray = null,$suffix = "",$idx = 0)
{
  preloadBackground($type);
  $body = "<div style='width:100%;overflow:scroll'>";              
  $body .= "<script type='text/javascript'>
              function selectImage".$idx."(id,suffix){\n";   
  foreach($imageArray as $image){   
  $body .=  "document.getElementById(\"img_".$image->ID.$suffix."\").style.border = '';\n";}                         
  $body .= "var justID = id.substr(4);\n";
  $body .=  "document.getElementById(id + suffix).style.border = 'solid 1px red';\n
             document.getElementById('".$imageID."').setAttribute('data-default-file','images/tmp/' + justID + '.png')\n;                  
             if (document.getElementsByClassName('dropify-render')[".$idx."].children.length == 0){            
              var elem = document.createElement(\"img\");             
              document.getElementsByClassName('dropify-render')[".$idx."].appendChild(elem);
              document.getElementsByClassName('dropify-preview')[".$idx."].style='display:block';
             } 
             document.getElementsByClassName(\"dropify-render\")[".$idx."].children[0].src='images/tmp/' + justID + '.png'\n;";    
  $body .=  "var images = {};\n";
  foreach($imageArray as $image){   
  $body .=  "images[\"".$image->ID."\"] = \"".$image->image."\";\n";}                           
  $body .= "document.getElementById('hiddenImage".$idx."').value=images[justID]; 
            }
             </script>";  
  foreach($imageArray as $image){      
    $body .= "<img style='max-width:100px' onClick='selectImage".$idx."(\"img_".$image->ID."\",\"".$suffix."\")' id=\"img_".$image->ID.$suffix."\" src='data:image/png;base64,".$image->image."'>&nbsp;&nbsp;"; } 
  $body .= "</div>";  

  return $body;
}

function renderModalFrame($id,$text,$yesLink)
{
  return '
            <div id="'.$id.'" class="modal">
              <div class="modal-content">
                <p>'.$text.'</p>
              </div>
              <div class="modal-footer">
                <a href="#"  class="waves-effect waves-red btn-flat modal-action modal-close">'.i18n("NO").'</a>
                <a href="'.$yesLink.'" class="waves-effect waves-green btn-flat modal-action modal-close">'.i18n("YES").'</a>
              </div>
            </div>'
            ;
}
    

function _ItemsTable($items,$fields,$params = null,$name = "",$exporttype = "")
{
  $body = "<div id='".$name."'>
          <center>Item count: ".count($items)."<center><br>";

 if($exporttype != "NO")
 {
    $body .= "<form target=_blank action='export.php' method='POST' >         
            <input type='hidden' name='type' value='".$exporttype."'>
            <input type='hidden' name='items' value='".json_encode($items)."'>
            <input type='hidden' name='fields' value='".json_encode($fields)."'>
            <input type='submit' value='EXPORT'>
          </form>";
  }
  $body .= "          
  <table border='1' id='result".$name."'>";   
  $body .= "<thead><tr>";
  foreach($fields as $field)
    $body .= "<th>".$field."</th>";
  $body .= "</tr></thead>";

  $body .= "<tfoot><tr>";
  foreach($fields as $field)
    $body .= "<th>".$field."</th>";
  $body .= "</tr></tfoot>";

  $body .= "</table>";
  $dataSet = "";
   foreach($items as $item)
    {   
      $dataSet .= "[";
        foreach($fields as $field)
        {
            if ($field == "IMAGE")
              $dataSet .= "'<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',";
            
            else if ($field == "ISDEBT"){
              if ($item[$field] == "YES")
                $dataSet .= "'<span style=\"color:red\">DEBT</span>',";
              else 
                $dataSet .= "'<span style=\"color:green\">DEBT</span>',";
            }

            else if ($field == "DETAILS_IR"){               
               $dataSet .=  "'<a href=\"?display=itemrequestactiondetails&entity=itemrequestactiondetails&status=".$params["status"]."&ID=".$item["ID"]."\">DETAILS</a>',";                
            }
            else if($field == "REQUESTER"){
              $REQUESTER = isset($item["REQUESTER"]) ? $item["REQUESTER"] : "";              
               $dataSet .= "'<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists("../api/img/requestaction/R".$item["ID"].".png")) ? 
                "../api/img/requestaction/R".$item["ID"].".png" : "../api/img/na.jpg")."\"><br>".$REQUESTER."',";

            }
            else if ($field == "REQUESTEE"){
              $REQUESTEE = isset($item["REQUESTEE"]) ? $item["REQUESTEE"] : "";
               $dataSet .= "'<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists("../api/img/requestaction/E".$item["ID"].".png")) ? 
                "../api/img/requestaction/R".$ID.".png" : "../api/img/na.jpg")."\"><br>".$REQUESTEE."',";
            }

            else if ($field == "REQUEST_QUANTITY"){

              $dataSet .= "'<input name=\"idfield\" value=\"".$item["PRODUCTID"]."\" type=\"hidden\">\
                            <input  style=\"text-align:center\" type=\"text\" id=\"quantity_".$item["PRODUCTID"]."\" value=\"".$item[$field]."\" ><br>\
                            <button type=\"button\" onclick=updatePoolQty(\"".$item["TYPE"]."\",\"".$item["PRODUCTID"]."\")>Update</button>',";
            }
            else if ($field == "ACTION"){
              if ($name == "listA")
                $list = '<input type=\"hidden\" name=\"LISTNAME\" value=\"A\">';
              else if ($name == "listB")
                $list = '<input type=\"hidden\" name=\"LISTNAME\" value=\"B\">';                
              else if ($name == "listC")
                $list = '<input type=\"hidden\" name=\"LISTNAME\" value=\"C\">';

              $dataSet .= "'<form method=\"GET\"><input type=\"submit\" value=\"Delete\">\
                      ".$list."<input type=\"hidden\" name=\"PRODUCTID\" value=\"".$item["PRODUCTID"]."\">\
                              <input type=\"hidden\" name=\"action\" value=\"DELETE\">\
                              <input type=\"hidden\" name=\"display\" value=\"".$params["display"]."\">\
                              <input type=\"hidden\" name=\"entity\" value=\"".$params["entity"]."\">\
                              <input type=\"hidden\" name=\"type\" value=\"".$params["type"]."\">\
                            </form>'";

            } 
            else 
              $dataSet .= "\"".(isset($item[$field]) ? $item[$field] : "")."\",";         
        }       
        $dataSet = rtrim($dataSet,",");    
        $dataSet .= "],";      
    }
    $dataSet = rtrim($dataSet,",");    

  $body .= "
        <script>      
        var dataSet".$name." = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#result".$name."').DataTable({                
         data:dataSet".$name.", 
         'lengthMenu':[-1],          
           });
        });


  function updatePoolQty (type,productid) 
  {
    
    var form_data = new Object();
    form_data['PRODUCTID'] = productid;
    form_data['REQUEST_QUANTITY'] = document.getElementById('quantity_' + productid).value;    
    form_data['LISTNAME'] = document.getElementById('listnameLbl').innerHTML;
    var url = 'http://phnompenhsuperstore.com/api/api.php/itemrequestitemspool/' + type;
                                                          
    var request_method = $(this).attr('method');     

    $.ajax({
      url : url,
      type: 'PUT',
      data : JSON.stringify(form_data),
      dataType : 'json'
      }).done(function(response)
      {          
        if (response['RESULT'] == 'OK'){
          alert('Update Success');       
        }else{
          alert('Error Updating');     
        } 
    });   
    
  }

      </script>
      </div>";
    return $body;
}



?>