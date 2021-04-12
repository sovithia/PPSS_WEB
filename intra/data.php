<?php 

require_once("RestEngine.php");


function getOrderedCategories()
{
	$categories = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/orderedCategories");      
	return $categories;
}

function getCategoryListJS()
{    
    $categories = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/orderedCategories");      
    $str = "";
    foreach($categories as $category){
       $str .= "{ 'value':'".$category."', 'display':'".$category."' },";
    }    
    $str = rtrim($str,",");
    return $str;
}

function getCountries()
{
	static $countries = array(
   					  "AUSTRALIA",
   					  "CAMBODIA",
   					  "CANADA",
   					  "CHILE",
   					  "CHINA",
   					  "FRANCE",
   					  "GERMANY",
   					  "HONG KONG",
   					  "INDONESIA",
   					  "KOREA",
   					  "MALAYSIA",
   					  "PHILLIPINES",
   					  "SINGAPORE",
   					  "SPAIN",
   					  "SWITZERLAND",
   					  "TAIWAN",
   					  "THAILAND",
   					  "USA"   					  
   					);

	return $countries;
}

function getOldCategories()
{
	static $categories = array(
                    "BABY",
                    "BABY DAIPER",
                    "BABY MILK",
                    "BAKERY/JAMS",
                    "BEER",
                    "BIRDNEST",
                    "CAKE/BAK ERY-POWDER",
                    "CANDLE",
                    "CANDY",
                    "CANNED FOOD",
                    "CAR/ACCESSORY",
                    "CEREAL",
                    "CHEEZ",
                    "CIGARETTE",
                    "CLOTHES",
                    "COCKTAIL WINE",
                    "COSMETIC",
                    "DETERGENT",
                    "DOG-FOOD",
                    "DRY FOOD",
                    "ELECTRONICS",
                    "ENERGY DRINK",
                    "FRESH FLOWER",
                    "FRESH FRUIT",                  
                    "FRESH MEAT",
                    "FRESH MILK",
                    "FRESH VEGETABLE",
                    "FROZEN/CHILL",
                    "GIFT",
                    "GLASS",
                    "HOMEUSE",
                    "HONEY",
                    "ICE-CREAM",
                    "INCREDIENT",
                    "JAME",
                    "JELLY",
                    "KITCHEN WARE",
                    "LAM STARTIONARY",
                    "LOTION/FOAM",
                    "MAKERY",
                    "MASSAGE",
                    "MEDICINE",
                    "MILK",
                    "MOON CAKE",
                    "NOODLE",
                    "NOT DISCOUNT",
                    "OIL",
                    "OTHER",
                    "PETS",
                    "PICKLE",
                    "PLASTIC",
                    "PROCESSING FOOD",
                    "PRODUCT FOR FREE",
                    "RICE",
                    "SAUCE",
                    "SEED",
                    "SHAMPOO/CONDITIONER",
                    "SHOE",
                    "SHOE-POLISH",
                    "SHOWER-CREAM/SOAP",
                    "SNACKFOODS",
                    "SODA",
                    "SOFT DRINK",
                    "STATIONARY FESTIVAL",
                    "STATIONARY/TOY",
                    "STUDENT BAG",
                    "TEA AND COFFEE",
                    "TISSUE",
                    "TOOTHPASTE",
                    "WATER",
                    "WINE AND WHISKY",
                    "WOMENDIAPER");
	return $categories;
}

?>
