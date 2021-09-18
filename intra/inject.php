<?php 

function getDatabase()
{ 
	$conn = null;      
	try  
	{  
		$conn = new PDO('sqlsrv:Server=192.168.72.252\\SQL2008r2,55008;Database=PhnomPenhSuperStore2019;ConnectionPooling=0', 'sa', 'blue'); 
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	} 
	return $conn;
}


function getInternalDatabase()
{
	try{
		$db = new PDO('sqlite:'.dirname(__FILE__).'/../db/SuperStore.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $ex)
	{
		die("Cannot open database".$ex->getMessage());
	}
	return $db;
}



function go()
{	
	$db = getDatabase();

	$sql = "SELECT PRODUCTNAME,PRODUCTID,CATEGORYID,SIZE,PACKINGNOTE FROM ICPRODUCT WHERE SIZE NOT LIKE 'R%' 
			AND SIZE <> 'NR90' AND SIZE <> 'NR60' AND SIZE <> 'NR30' AND SIZE <> 'NR120' AND SIZE <> 'NOEXPIRE' AND SIZE <> 'NOEXPIRATION' AND SIZE <> 'N/A'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$products = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$NRDATA["AROMATHERAPY|MASSAGE OIL"] = "NR90";
	$NRDATA["BEEF"] = "N/A";
	$NRDATA["BEER BOTTLES"] = "NR60";
	$NRDATA["BINDER"] = "NOEXPIRE";
	$NRDATA["CHEESE"] = "N/A"; 
	$NRDATA["CONDENSED MILK"]  = "NR60";
	$NRDATA["ENERGY DRINK"] = "NR60";
	$NRDATA["FISH"] = "N/A";
	$NRDATA["FOOD SET"] = "NR60";
	$NRDATA["FRESH NOODLE|RICE NOODLE"] = "NR60";
	$NRDATA["FROZEN FRUITS"] = "NR30";
	$NRDATA["FROZEN TOFU"] = "NR30";
	$NRDATA["HAIR COMB & BRUSH"] = "NOEXPIRE";
	$NRDATA["MEATBALLS"] = "N/A";
	$NRDATA["OTHER(BABY CARE)"] = "NOEXPIRE";
	$NRDATA["OTHER(KITCHEN)"] = "NOEXPIRE";
	$NRDATA["OTHER(PARTY ACCESSORIES)"] = "NOEXPIRE";
	$NRDATA["OTHER(SALTED SNACKS)"] = "NR60";
	$NRDATA["OTHER(STARCHES)"] = "NR60";
	$NRDATA["OTHER(SWEET SNACKS)"] = "NR60";
	$NRDATA["OTHER(TOBACCO)"] = "NOEXPIRE";
	$NRDATA["OTHER(VEGETABLES|FRUITS)"] = "NR30";
	$NRDATA["OUTDOOR GAMES"] = "NOEXPIRE";
	$NRDATA["POWER BANK|CABLE|ADAPTER"] = "NOEXPIRE";
	$NRDATA["RACKET GAMES"] = "NOEXPIRE";
	$NRDATA["RED WINE"] = "NR60";
	$NRDATA["SEAFOOD"] = "N/A";
	$NRDATA["SEALED MEAT/SEAFOOD"] = "NR60";
	$NRDATA["SEALED TOFU"] = "NR60";
	$NRDATA["SHOE CARE"] = "NOEXPIRE";
	$NRDATA["SHOES"] = "NOEXPIRE";
	$NRDATA["SOAP|SHOWER GEL(BODYCARE)"] = "NR90";
	$NRDATA["SOY MILK"] = "";
	$NRDATA["SPONGE|DUSTER"] = "NOEXPIRE";
	$NRDATA["SPREAD"] = "NR60";
	$NRDATA["SYRUP"] = "NR60";
	$NRDATA["TEQUILA"] = "NR90";
	$NRDATA["TISSUE|WET WIPES"] = "NOEXPIRE";
	$NRDATA["TOOTHPASTE"] = "NR90";
	$NRDATA["ADULT DIAPER"] = "NR90";
	$NRDATA["BATH TOWEL|BODY SCRUBBER"] = "NOEXPIRE";
	$NRDATA["BEER TANK"] = "NR60";
	$NRDATA["BIRDS NEST DRINK"] = "NR60";
	$NRDATA["CANDY"] = "NR60";
	$NRDATA["CAR FRESHENER|FRAGRANCE"] = "NR90";
	$NRDATA["CARD GAMES|BOARD GAMES"] = "NOEXPIRE";
	$NRDATA["CHAMPAGNE"] = "NR60";
	$NRDATA["CHILDREN CLOTHES"] = "NOEXPIRE";
	$NRDATA["CONDOMS & OTHERS"] = "NR90";
	$NRDATA["COOKWARE|CASSEROLE|PAN"] = "NOEXPIRE";
	$NRDATA["DRY SAUSAGE"] = "NR60";
	$NRDATA["EDUCATIONAL GAMES"] = "NOEXPIRE";
	$NRDATA["FACE CLEAN|MAKEUP CLEAN"] = "NR90";
	$NRDATA["FAKE NAILS|POLISH|REMOVER"] = "NR90";
	$NRDATA["FESTIVAL DECORATION"] = "NOEXPIRE";
	$NRDATA["FLAVORED|FRESH MILK"] = "NR60";
	$NRDATA["FLOWER|PLANT|SEED"] = "NR60";
	$NRDATA["FRESH DESERT"] = "N/A";
	$NRDATA["FRESH FRUITS"] = "N/A";
	$NRDATA["FROZEN MEALS"] = "R30";
	$NRDATA["GROOMING"] = "NOEXPIRE";
	$NRDATA["HONEY"] = "NR60";
	$NRDATA["JUICE"] = "NR60";
	$NRDATA["LIPSTICK & LIP BALM"] = "NR60";
	$NRDATA["LIQUID CONTAINER|ICEHOUSE"] = "NOEXPIRATION";
	$NRDATA["MEAL SAUCE"] = "NR60";
	$NRDATA["MOISTURIZER MILK|BODYCARE"] = "NR90";
	$NRDATA["MOON CAKES"] = "NR60";
	$NRDATA["NEM CHUA"] = "NR60";
	$NRDATA["ODOR SCENT"] = "NR60";
	$NRDATA["OTHER ACCESSORIES(BABY)"] = "NR60";
	$NRDATA["OTHER(CLEANING TOOLS)"] = "NOEXPIRE";
	$NRDATA["OTHER(ELECTRONICS)"] = "NOEXPIRE";
	$NRDATA["OTHER(FROZEN SWEET)"] = "NR30";
	$NRDATA["OTHER(PET S CARE)"] = "NOEXPIRE";
	$NRDATA["PARTY ACCESSORIES"] = "NOEXPIRE";
	$NRDATA["PEST CONTROL"] = "NR90";
	$NRDATA["SEALED FRUITS"] = "NR60";
	$NRDATA["SHAVING"] = "NR60";
	$NRDATA["VINEGAR & SOUR"] = "NR60";
	$NRDATA["VITAMINS & COMPLEMENT"] = "NR90";
	$NRDATA["BALL GAMES"] = "NOEXPIRE";
	$NRDATA["BATTERY|POWER STRIP"] = "NOEXPIRE";
	$NRDATA["BISCUIT|FOOD(BABY)"] = "NR60";
	$NRDATA["BREAD"] = "N/A";
	$NRDATA["CAR CLEANING PRODUCTS"] = "NR90";
	$NRDATA["CHIPS & CRACKERS"] = "NR60";
	$NRDATA["CLEANING GLOVES"] = "NOEXPIRE";
	$NRDATA["CLOTHE HANGER|LAUNDRY BOX"] = "NOEXPIRE";
	$NRDATA["COFFEE|CAPPUCINO"] = "NR60";
	$NRDATA["CUTLERY"] = "NOEXPIRE";
	$NRDATA["DOG FOOD"] = "NR60";
	$NRDATA["EGGS"] = "NR60";
	$NRDATA["EYE COLOR LENS"] = "NR60";
	$NRDATA["FLAVORED MILK"] = "NR60";
	$NRDATA["FURNITURE PACKAGES"] = "NR60";
	$NRDATA["HAIR REMOVAL|SHAVING|WAX"] = "NR60";
	$NRDATA["HAM"] = "NR60";
	$NRDATA["HAND WASH"] = "NR60";
	$NRDATA["HOME DECOR & LIGHTING"] = "NOEXPIRE";
	$NRDATA["INCENSE|PAPER|RED ENVELOP"] = "NOEXPIRE";
	$NRDATA["JAM"] = "NR60";
	$NRDATA["KITCHEN USTENSILS"] = "NR60";
	$NRDATA["MILK (BABY)"] = "NR60";
	$NRDATA["OTHER(CLEANING PRODUCTS)"] = "NR90";
	$NRDATA["OTHER(LIQUOR|SPIRITUOUS)"] = "NR60";
	$NRDATA["OTHER(TINKERING|CAR)"] = "NOEXPIRE";
	$NRDATA["OTHER(WINE)"] = "NR60";
	$NRDATA["OTHERS ACCESSORIES (BABY)"] = "NOEXPIRE";
	$NRDATA["OUTDOOR FURNITURE"] = "NOEXPIRE";
	$NRDATA["PASTA"] = "NR60";
	$NRDATA["PENCIL SHARPENER"] = "NOEXPIRE";
	$NRDATA["PERFUME (WOMAN)"] = "NR90";
	$NRDATA["PHONE ACC|CREDIT"] = "NOEXPIRE";
	$NRDATA["READING BOOKS"] = "NOEXPIRE";
	$NRDATA["SEALED MEALS"] = "NR60";
	$NRDATA["SOAP|SHOWER GEL(MEN)"] = "NR60";
	$NRDATA["STORAGE|BOX|HOOK"] = "NOEXPIRE";
	$NRDATA["TINKERING TOOLS"] = "NOEXPIRE";
	$NRDATA["TOILET SCENT"] = "NR90";
	$NRDATA["TOOTHBRUSH"] = "NOEXPIRE";
	$NRDATA["WHITE WINE"] = "NR60";
	$NRDATA["ANTI-AGING"] = "NR60";
	$NRDATA["BROOM|MOP"] = "NOEXPIRE";
	$NRDATA["CARPET|DOOR MAT|DOOR SIGN"] = "NOEXPIRE";
	$NRDATA["CAT FOOD"] = "NR60";
	$NRDATA["CHEW TOY"] = "NOEXPIRE";
	$NRDATA["CHOCOLATE|CANDY|SWEETS"] = "NR60";
	$NRDATA["CHOCOLATE|SWEETS"] = "NR60";
	$NRDATA["CLEANING LIQUID|POWDER"] = "NR60";
	$NRDATA["COFFEE|TEA SERVICE"] = "NR60";
	$NRDATA["CROCKERY|PLATE"] = "NOEXPIRE";
	$NRDATA["DAIRY CREAM"] = "NR90";
	$NRDATA["DEODORANT (MEN)"] = "NR90";
	$NRDATA["DEODORANT (WOMAN)"] = "NR90";
	$NRDATA["DIAPER (BABY)"] = "NR60";
	$NRDATA["EARPHONE|HEADSET|SPEAKER"] = "NOEXPIRE";
	$NRDATA["FLOUR|PREMADE CAKE|MIX"] = "NR60";
	$NRDATA["FRESH TOFU"] = "N/A";
	$NRDATA["FROZEN FILLED PASTRY"] = "NR30";
	$NRDATA["FROZEN MEATS|SEAFOOD"] = "NR30";
	$NRDATA["GIFT SET"] = "NOEXPIRE";
	$NRDATA["HAIR DRYER|HAIR CUTTER"] = "NOEXPIRE";
	$NRDATA["HAIR GEL|WAX|SPRAY"] = "R90";
	$NRDATA["HAIR TREATMENT"] = "R90";
	$NRDATA["HOME ELECTRICAL APPLIANCE"] = "NOEXPIRE";
	$NRDATA["HOT CHOCOLATE"] = "R60";
	$NRDATA["HYGIENIC DIAPER|TAMPON"] = "R90";
	$NRDATA["KIDS"] = "NOEXPIRE";
	$NRDATA["KITCHEN|LUNCH STORAGE"] = "NOEXPIRE";
	$NRDATA["LEATHER GOODS|SUITCASES"] = "NOEXPIRE";
	$NRDATA["MOUTHWASH"] = "NR90";
	$NRDATA["ORGANIC VEGETABLE"] = "N/A";
	$NRDATA["OTHER(COSMETICS)"] = "NR90";
	$NRDATA["OTHER(DAIRY & MILK)"] = "NR60";
	$NRDATA["OTHER(PHARMACY)"] = "NR90";
	$NRDATA["OTHER(WATER & BEVERAGE)"] = "NR60";
	$NRDATA["PETS ACCESSORIES"] = "N/A";
	$NRDATA["POULTRY"] = "N/A";
	$NRDATA["POWDER|PASTE"] = "NR60";
	$NRDATA["RULER"] = "NOEXPIRE";
	$NRDATA["SCISSORS|TAPES"] = "NOEXPIRE";
	$NRDATA["SEALED SEEDS|BEANS"] = "NR60";
	$NRDATA["SOJU"] = "NR60";
	$NRDATA["SPARKLING WATER"] = "NR60";
	$NRDATA["WHISKY"] = "NR60";
	$NRDATA["AROMA/SPICE"] = "NR60";
	$NRDATA["AROMA|SPICE"] = "NR60";
	$NRDATA["BABY HYGIENE"] = "NR90";
	$NRDATA["BISCUIT & CAKE"] = "NR60";
	$NRDATA["BOTTLE|MEASURE CUP(BABY)"] = "NOEXPIRE";
	$NRDATA["BULBS & LIGHTING"] = "NOEXPIRE";
	$NRDATA["CAP|HAT"] = "NOEXPIRE";
	$NRDATA["CEREALS"] = "NR60";
	$NRDATA["CHEWING GUM"] = "NR60";
	$NRDATA["CHINESE SNACK"] = "NR60";
	$NRDATA["DISPOSABLE TABLEWARE"] = "NOEXPIRE";
	$NRDATA["DRY FRUITS"] = "NR60";
	$NRDATA["FACE CARE (MEN)"] = "NR90";
	$NRDATA["FIRE LIGHTER"] = "NOEXPIRE";
	$NRDATA["FOIL|BAG|RECEPTACLE"] = "NOEXPIRE";
	$NRDATA["FROZEN DIM SUM"] = "NR30";
	$NRDATA["FROZEN PIZZA"] = "NR30";
	$NRDATA["FRUITS MIX"] = "N/A";
	$NRDATA["GIFT CARDS|PAPER|RIBBONS"] = "NOEXPIRE";
	$NRDATA["GLUE STICK"] = "NOEXPIRE";
	$NRDATA["HAIR DYE(MAN)"] = "NR90";
	$NRDATA["HALLOWEEN COSTUME"] = "NOEXPIRE";
	$NRDATA["INSECT REPELLENT"] = "NR90";
	$NRDATA["LIPSTICK|LIP BALM"] = "NR90";
	$NRDATA["MAKGEOLLI"] = "NR60";
	$NRDATA["NOODLE"] = "NR60";
	$NRDATA["NOTEBOOK|PAPER|PRINTING"] = "NOEXPIRE";
	$NRDATA["NUTRITIONAL DRINK"] = "NR60";
	$NRDATA["OTHER(BODY CARE)"] = "NR90";
	$NRDATA["OTHER(BUTCH|EGG|SEAFOOD)"] = "N/A";
	$NRDATA["OTHER(CAN|SEALED FOOD)"] = "NR60";
	$NRDATA["OTHER(FURNIT|STATIONARI)"] = "NOEXPIRE"; 
	$NRDATA["OTHER(HOME)"] = "NOEXPIRE";
	$NRDATA["PACIFIER|NIPPLE (BABY)"] = "NOEXPIRE"; 
	$NRDATA["PARAPHARMACY"] = "NR90";
	$NRDATA["PEANUTS & NUTS"] = "NR60";
	$NRDATA["PERFUME (MEN)"] = "NR120";
	$NRDATA["PETS HYGIENE"] = "NOEXPIRE";
	$NRDATA["PORTO"] = "NR60";
	$NRDATA["SAUCES"] = "NR60";
	$NRDATA["SEALED MEAT|SEAFOOD"] = "NR60";
	$NRDATA["SHAMPOO|CONDITIONNER(KID)"] = "NR90";
	$NRDATA["SHAMPOO|CONDITIONNER(MEN)"] = "NR90";
	$NRDATA["SOFT DRINK"] = "NR60";
	$NRDATA["SWIMMING"] = "NOEXPIRE";
	$NRDATA["TOILET USTENSILS"] = "NOEXPIRE";
	$NRDATA["WATER"] = "NR60";
	$NRDATA["WRITING|DRAWING"] = "NOEXPIRE";
	$NRDATA["ALCOHOLIC BEVERAGE"] = "NR60";
	$NRDATA["BEER CANS"] = "NR60";
	$NRDATA["BLEACH"] = "NR90";
	$NRDATA["BREAKFAST BISCUIT"] = "NR60";
	$NRDATA["CAR CLEANING TOOLS"] = "NOEXPIRE";
	$NRDATA["CHINESE ALCOHOL"] = "NR60";
	$NRDATA["CLOTHE (BABY)"] = "NOEXPIRE";
	$NRDATA["COMPUTER MATERIAL"] = "NOEXPIRE";
	$NRDATA["COTTON|COTTON BUD"] = "NOEXPIRE";
	$NRDATA["CRAB STICK"] = "NR60";
	$NRDATA["CUPS|MUGS"] = "NOEXPIRE";
	$NRDATA["DISHWASHING LIQUID"] = "R90";
	$NRDATA["DRAWING PINS|NEEDLES"] = "NOEXPIRE";
	$NRDATA["DRINKING-YOGURT|NUTRITIO"] = "R60";
	$NRDATA["ELECTRONIC TOYS"] = "NOEXPIRE";
	$NRDATA["ERASER"] = "NOEXPIRE";
	$NRDATA["EYES MAKE-UP|BLUSH|ACC"] = "NR90";
	$NRDATA["FLOUR/PREMADE CAKE/MIX"] = "NR60";
	$NRDATA["HAIR DYE(WOMAN)"] = "NR90";
	$NRDATA["HOUSEHOLD LINEN"] = "NOEXPIRE";
	$NRDATA["ICE CREAM"] = "R30";
	$NRDATA["IRONING"] = "NOEXPIRE";
	$NRDATA["JERKY MEAT|DRIED SEAFOOD"] = "R60";
	$NRDATA["LAUNDRY POWD|LIQUID|DETER"] = "R90";
	$NRDATA["MASK AND SCRUB"] = "R90";
	$NRDATA["NOODLES"] = "R60";
	$NRDATA["ORTHER(WINE)"] = "R60";
	$NRDATA["OTHER(CONDIMENTS)"] = "R60";
	$NRDATA["OTHER(COOK INGREDIENT)"] = "R60";
	$NRDATA["OTHER(FACE CARE)"] = "R90";
	$NRDATA["OTHER(HAIR CARE)"] = "R90";
	$NRDATA["OTHER(PROCESSED MEAT)"] = "R60";
	$NRDATA["PAIN RELIEVER|MEDICINE"] = "R90";
	$NRDATA["PASTA SAUCE"] = "R60";
	$NRDATA["PASTIS"] = "R60";
	$NRDATA["ROSE WINE"] = "R60";
	$NRDATA["RUM"] = "R60";
	$NRDATA["SAKE"] = "R60";
	$NRDATA["SAUSAGE"] = "R30";
	$NRDATA["SEALED VEGETABLES"] = "NR60";
	$NRDATA["SHAMPOO & CONDITIONNER"] = "NR90";
	$NRDATA["TEA"] = "NR90"; 
	$NRDATA["TRASH BAG"] = "NOEXPIRE";
	$NRDATA["ANTI-ACNE"] = "NR90";
	$NRDATA["ASHTRAY"] = "NOEXPIRE";
	$NRDATA["BUTTER"] = "NR45";
	$NRDATA["CANNED PATÉ"] = "NR60";
	$NRDATA["CAR ACCESSORIES|DECO"] = "NOEXPIRE";
	$NRDATA["CHRISTMAS"] = "NOEXPIRE";
	$NRDATA["CIGARETTES"] = "R90";
	$NRDATA["COOKING OIL"] = "R60";
	$NRDATA["COSMETICS FOUNDATION"] = "R90";
	$NRDATA["DRY MEAT"] = "R60";
	$NRDATA["DRY VEGETABLES"] = "R60";
	$NRDATA["EYE CARE"] = "NR90";
	$NRDATA["FLOOR CLEANING"] = "NOEXPIRE";
	$NRDATA["FRESH VEGETABLE"] = "R30";
	$NRDATA["FROZEN CAKES"] = "R30";
	$NRDATA["FROZEN VEGETABLES"] = "R30";
	$NRDATA["GIBLETS"] = "N/A";
	$NRDATA["GIN"] = "NR60";
	$NRDATA["GLASSWARE"] = "NOEXPIRE";
	$NRDATA["HAIR ACCESSORIES"] = "NOEXPIRE";
	$NRDATA["HOME FURNITURE"] = "NOEXPIRE";
	$NRDATA["INSTANT NOODLE|FOOD"] = "NR60";
	$NRDATA["INTIMATE SOAP"] = "NR90";
	$NRDATA["KITCHEN APPLIANCES & ACC"] = "NOEXPIRE";
	$NRDATA["MILK"] = "NR90";
	$NRDATA["MILK|POWDER (BABY)"] = "NR90";
	$NRDATA["OTHER(BREAKFAST)"] = "NR60";
	$NRDATA["OTHER(COOK INGREDIENTS)"] = "NR60";
	$NRDATA["OTHER(DENTAL HYGIENE)"] = "NR90";
	$NRDATA["OTHER(SALTED FROZEN)"] = "NR30";
	$NRDATA["OTHER(SPORTS|RECREATION)"] = "NOEXPIRE";
	$NRDATA["OTHER(TEXTILES|LUGGAGE)"] = "NOEXPIRE";
	$NRDATA["OTHER(TOYS & GAME)"] = "NOEXPIRE";
	$NRDATA["PLUSH|DOLL|PUPPET"] = "NOEXPIRE";
	$NRDATA["POCKET CANDY"] = "NR60";
	$NRDATA["POCKET CANDY|CHEWING GUM"] = "NR60";
	$NRDATA["PORK"] = "N/A";
	$NRDATA["RICE"] = "NR60";
	$NRDATA["SEEDS"] = "NR60";
	$NRDATA["SLIPPERS"] = "NOEXPIRE";
	$NRDATA["SOCKS"] = "NOEXPIRE";
	$NRDATA["SUNBLOCK"] = "NR90";
	$NRDATA["TOILET PAPER|TISSUE"] = "NOEXPIRE";
	$NRDATA["TRASH BIN"] = "NOEXPIRE";
	$NRDATA["VARIOUS DESERT"] = "NR60";
	$NRDATA["VEHICLE CAR|BIKE|SCOOTER"] = "NOEXPIRE";
	$NRDATA["VODKA"] = "NR60";
	$NRDATA["WOMEN CLOTHES"] = "NOEXPIRE";

	echo "CNT:" .count($products)."\n";
	//exit;	
	foreach($products as $product)
	{
		if($product["PACKINGNOTE"] == null || $product["PACKINGNOTE"] == ""){
			$sql = "UPDATE ICPRODUCT SET PACKINGNOTE = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($product["SIZE"],$product["PRODUCTID"])); 
		}
		$sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($NRDATA[$product["CATEGORYID"]],$product["PRODUCTID"])); 

		echo $product["PRODUCTID"]."\n";
		usleep(100000);
	}
	
    fclose($handle);
}

go();

?>