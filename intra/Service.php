<?php 

require_once("RestEngine.php");

class MODELS
{

	const RESTDAY = "restday";
	const RENTAL = "rental";
	const SALARY = "salary";

	static function Structure($entity){
		
		
		$structure[MODELS::RENTAL] = [
			"ID","date","status"
		];

		$structure[MODELS::RESTDAY] = [
			"ID","date","status"
		];

		return $structure[$entity];
	}

	static function StructureFull($entity)
	{
		

		$structure[MODELS::RESTDAY] = [
			"ID","date","status"
		];

		$structure[MODELS::RENTAL] = [
			"ID","date","status"
		];
		
		return $structure[$entity];
	}

}

class Service
{
	
	//const BaseURL = "http://phnompenhsuperstore.com/api/api.php";	
	const BaseURL = "http://phnompenhsuperstore.com/api/api_dev.php";	
	const BaseURLIntra = "http://phnompenhsuperstore.com/api/intrapi.php";
	const BaseURLEcommerce = "http://phnompenhsuperstore.com/api/api_ecommerce.php";	

	// Login
	const ResourceLogin = Service::BaseURLIntra."/login";
	// Manage
	const ResourceRestDay = Service::BaseURLIntra."/restday";
	const ResourceRental = Service::BaseURLIntra."/rental";
	const ResourceSalary = Service::BaseURLIntra."/salary";	
	const ResourceTrombi = Service::BaseURLIntra."/trombi";
	const ResourceSupplier = Service::BaseURLIntra."/supplier";

	// Sales
	const ResourceSales = Service::BaseURL."/sale";
	const ResourcePromotionList = Service::BaseURL."/currentpromotion";

	// Tools 
	const ResourceBiglabel = Service::BaseURL."/biglabel";
	const ResourceBiglabelpromo = Service::BaseURL."/biglabelpromo";
	
	const ResourceItemSearch = Service::BaseURL."/itemsearch";
	const ResourceItemSearch2 = Service::BaseURL."/itemsearch2";

	const ResourceBestSeller = Service::BaseURL."/bestseller";
	const ResourceItemSale = Service::BaseURL."/itemsale";

	const ResourcePurchaseOrder = Service::BaseURLIntra."/purchaseorder";
	const ResourceReceivedPO = Service::BaseURLIntra."/receivedpo";
	
	const ResourceScheduleAll = Service::BaseURLIntra."/scheduleAll";
	const ResourceScheduleStore = Service::BaseURLIntra."/scheduleStore";
	const ResourceSchedule = Service::BaseURLIntra."/schedule";

	const ResourceItemZeroStock = Service::BaseURL."/itemzerostock";
	const ResourceZeroSale = Service::BaseURL."/zerosale";

	const ResourceItemNegative = Service::BaseURL."/itemnegative";

	const ResourceItemAll = Service::BaseURL."/itemall";
	
	const ResourceMyWaitingPO = Service::BaseURL."/mywaitingpo";
	const ResourceMyCompletedPO = Service::BaseURL."/mycompletedpo";
	const ResourcePOSearch = Service::BaseURL."/posearch";
	const ResourcePODetail = Service::BaseURL."/podetail";

	const ResourceMyReceivedPO = Service::BaseURL."/myreceivedpo";
	const ResourceReceivedPOSearch = Service::BaseURL."/receivedposearch";
	const ResourceReceivedPODetail = Service::BaseURL."/receivedpodetail";

	

	const ResourceLowProfit = Service::BaseURL."/lowprofit";

	const ResourceFreshSales = Service::BaseURL."/freshsales";
	const ResourceCostZero = Service::BaseURL."/costzero";

	 const ResourceSelection = Service::BaseURL."/selection";

	const ResourceAdjustedItem = Service::BaseURL."/adjusteditems";

	const ResourceCalculatePrice = Service::BaseURL."/calculatePrice";

	const ResourceAllWaitingPO = Service::BaseURL."/allwaitingpo";

	const ResourceBarcodeGenerate = Service::BaseURL."/classifiedCategories"; // WEIRD

	const ResourceCustomBarcode = Service::BaseURL."/custombarcodes";

	const ResourceItemDamaged = Service::BaseURL."/itemdamagedrecordTreatedFull";

	const ResourceKPISales = Service::BaseURL."/KPISales";
	const ResourceKPICategory = Service::BaseURL."/KPICategories";

	const ResourceMaster = Service::BaseURL."/master";

	const ResourceBank = Service::BaseURL."/bank";	

	const ResourceItemThrown = Service::BaseURL."/itemthrown";

	const ResourceItemReceived = Service::BaseURL."/itemreceived";

	const ResourceSupplierItems = Service::BaseURL."/supplieritems";
	const ResourceSupplierPurchaseOrders = Service::BaseURL."/supplierpurchaseorders";

	const ResourceReceptionRecordWaiting = Service::BaseURL."/receptionrecordmix/WAITING";
	const ResourceReceptionRecordOrdered = Service::BaseURL."/receptionrecordmix/ORDERED";
	const ResourceReceptionRecordValidated = Service::BaseURL."/receptionrecordmix/VALIDATED";
	const ResourceReceptionRecordDelivered = Service::BaseURL."/receptionrecordmix/DELIVERED";
	const ResourceReceptionRecordReceived = Service::BaseURL."/receptionrecordmix/RECEIVED";
	const ResourceReceptionRecordPaid = Service::BaseURL."/receptionrecordmix/PAID";
	const ResourceReceptionRecordDetails = Service::BaseURL."/receptionrecorddetails";


	const ResourceVault = Service::BaseURL."/vault";
	const ResourceVaults = Service::BaseURL."/vaults";
 	


 	const ResourceTinyItemSearch = Service::BaseURL."/tinyitemsearch";

 	const ResourceReceptionRecordSearch =  Service::BaseURL."/receptionrecordsearch";

 	const ResourceLowSeller = Service::BaseURL."/lowseller";

 	const ResourcePriceProgression = Service::BaseURL."/priceprogression";

 	const ResourceItemUpdate = Service::BaseURLEcommerce."/items";

 	// NEW
 	const ResourceSupplyRecord = Service::BaseURL."/supplyrecord";
 	const ResourceSupplyRecordDetails = Service::BaseURL."/supplyrecorddetails";
 	const ResourceItemRequestAction = Service::BaseURL."/itemrequestaction";

	const modelRoute = array( 		
							  "sales" => Service::ResourceSales,
							  "restday" => Service::ResourceRestDay,
							  "rental" => Service::ResourceRental,							  
							  "salary" => Service::ResourceSalary,
							  "trombi" => Service::ResourceTrombi, 
							  "supplier" => Service::ResourceSupplier,
						 	  "biglabel" => Service::ResourceBiglabel,
						 	  "biglabelpromo" => Service::ResourceBiglabelpromo,
						 	  "itemsearch2" => Service::ResourceItemSearch2,
						 	  "itemsearch" => Service::ResourceItemSearch,
						 	  "itemupdate" => Service::ResourceItemUpdate,  
						 	  "promotionlist" => Service::ResourcePromotionList,
						 	  "bestseller" => Service::ResourceBestSeller,
						 	  "itemsale" => Service::ResourceItemSale,
						 	  
						 	  "purchaseorder" => Service::ResourcePurchaseOrder,
						 	  "receivedpo" => Service::ResourceReceivedPO,

						 	  "schedule" => Service::ResourceSchedule,						 	  
						 	  "scheduleAll" => Service::ResourceScheduleAll,
						 	  "scheduleStore" => Service::ResourceScheduleStore,

						 	  "itemzerostock" => Service::ResourceItemZeroStock, 
						 	  "itemnegative" => Service::ResourceItemNegative,
						 	  "zerosale" => Service::ResourceZeroSale,						 	  
						 	  "itemcategorize" => Service::ResourceItemAll,

						 	  "mywaitingpo" => Service::ResourceMyWaitingPO,
						 	  "mycompletedpo" => Service::ResourceMyCompletedPO,
						 	  "posearch" => Service::ResourcePOSearch,
						 	  "podetail" => Service::ResourcePODetail,

						 	  "myreceivedpo" => Service::ResourceMyReceivedPO,
						 	  "receivedposearch" => Service::ResourceReceivedPOSearch,
						 	  "receivedpodetail" => Service::ResourceReceivedPODetail,

						 	  "lowprofit" => Service::ResourceLowProfit,

						 	  "freshsales" => Service::ResourceFreshSales,

						 	  "costzero" => Service::ResourceCostZero,

						 	  "selection" => Service::ResourceSelection,

						 	  "adjusteditems" => Service::ResourceAdjustedItem,

						 	  "pricecalculator" => Service::ResourceCalculatePrice,
						 	  
						 	  "allwaitingpo" => Service::ResourceAllWaitingPO,

						 	  "custombarcode" => Service::ResourceCustomBarcode,

						 	  "barcodegenerator" => Service::ResourceBarcodeGenerate,
						 	  
						 	  "damageditems" => Service::ResourceItemDamaged,

						 	  "master" => Service::ResourceMaster,

						 	  "KPISales" => Service::ResourceKPISales,

						 	  "KPICategory" => Service::ResourceKPICategory,

						 	  "bank" => Service::ResourceBank,

						 	  "itemthrown" => Service::ResourceItemThrown,

						 	  "itemreceived" => Service::ResourceItemReceived,
							   
						 	  "supplieritems" => Service::ResourceSupplierItems,
						 	  "supplierpurchaseorders" => Service::ResourceSupplierPurchaseOrders,

							  "receptionrecordwaiting" => Service::ResourceReceptionRecordWaiting,
							  "receptionrecordvalidated" => Service::ResourceReceptionRecordValidated, 
						 	  "receptionrecorddelivered" => Service::ResourceReceptionRecordDelivered,
						 	  "receptionrecordreceived" => Service::ResourceReceptionRecordReceived,
						 	  "receptionrecordordered" => Service::ResourceReceptionRecordOrdered,
						 	  "receptionrecordpaid" => Service::ResourceReceptionRecordPaid,
						 	  "receptionrecordsearch" => Service::ResourceReceptionRecordSearch,
						 	  "receptionRecordDetail" => Service::ResourceReceptionRecordDetails,
						 	  "receptionRecordDetailNOPO" => Service::ResourceReceptionRecordDetails,


						 	  "supplyrecord" => Service::ResourceSupplyRecord,
						 	  "supplyrecorddetails" => Service::ResourceSupplyRecordDetails,

						 	  "itemrequestaction" => Service::ResourceItemRequestAction,


						 	  "vaultdetail" => Service::ResourceVault,
						 	  "tinyitemsearch" => Service::ResourceTinyItemSearch,
						 	  "lowseller" => Service::ResourceLowSeller,
						 	  "priceprogression" => Service::ResourcePriceProgression
						 	 );
	 
								
	

	static function Login($username,$password){			
		$data["username"] = $username;
		$data["password"] = $password;	
		$response = RestEngine::POST(Service::ResourceLogin,$data);		
		return $response;
	}


	// Trombi : check token, return list
	// Schedule  check token, return list
	// Restday : check token, return list
 
 	// Item Search : GET with params, return list
 	// Best seller : GET with params, return list
	// Item sale : GET with params, return list
	// Sales : GET with parans, return list
	// Small Label : GET with params, return list
	// Big label : GET with params, return list

	static function ListEntity($model, $option = ""){				
    
		$header = array();
		if (isset($_SESSION["IDENTIFIER"]))			
			$header["IDENTIFIER"] = $_SESSION["IDENTIFIER"]; 
		
		if (isset($_SESSION["TOKEN"]))
			$header["TOKEN"] = $_SESSION["TOKEN"];		

		if ($option != "" && (substr($option,0,1) != "?"))
			$option = "/".$option;				
				
		//echo Service::modelRoute[$model] . $option;
		//exit;
		return RestEngine::GET(Service::modelRoute[$model] . $option,$header);				
	}

	static function CreateEntity($model,$data){
		$header = array();
		if (isset($_SESSION["IDENTIFIER"]))			
			$header["IDENTIFIER"] = $_SESSION["IDENTIFIER"];
		if (isset($_SESSION["TOKEN"]))
			$header["TOKEN"] = $_SESSION["TOKEN"];		
		return RestEngine::POST(Service::modelRoute[$model],$data,$header);						
	}

	static function UpdateEntity($model,$data){			
		$header = array();
		$id = isset($data["ID"]) ? 	$data["ID"] : $data["deviceToken"];
		if (isset($_SESSION["IDENTIFIER"]))			
			$header["IDENTIFIER"] = $_SESSION["IDENTIFIER"];
		if (isset($_SESSION["TOKEN"]))
			$header["TOKEN"] = $_SESSION["TOKEN"];	
		$response = RestEngine::PUT(Service::modelRoute[$model]."/".$id,$data,$header);		
		return $response;
	}

	static function DeleteEntity($model,$id){
		$header = array();
		if (isset($_SESSION["IDENTIFIER"]))			
			$header["IDENTIFIER"] = $_SESSION["IDENTIFIER"];
		if (isset($_SESSION["TOKEN"]))	
			$header["TOKEN"] = $_SESSION["TOKEN"];	
		$response = RestEngine::DELETE(Service::modelRoute[$model]."/".$id,$header);		
		return $response;
	}		
}

?>