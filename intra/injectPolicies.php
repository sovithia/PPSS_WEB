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


function go(){
	/*
	$policies["100-028"]=	"R120";
	$policies["100-002"]=	"R14";
	$policies["400-173"]=	"R14";
	$policies["400-229"]=	"R14";
	$policies["400-453"]=	"R180";
	$policies["100-541"]=	"R180";
	$policies["400-595"]=	"R180";
	$policies["400-594"]=	"R180";
	$policies["100-003"]=	"R180";
	$policies["400-362"]=	"R180";
	$policies["400-099"]=	"R180";
	$policies["100-190"]=	"R180";
	$policies["400-062"]=	"R180";
	$policies["100-211"]=	"R180";
	$policies["100-123"]=	"R180";
	$policies["100-328"]=	"R180";
	$policies["400-368"]=	"R180";
	$policies["400-415"]=	"R180";
	$policies["400-573"]=	"R180";
	$policies["400-456"]=	"R180";
	$policies["100-414"]=	"R180";
	$policies["100-456"]=	"R180";
	$policies["100-410"]=	"R180";
	$policies["400-093"]=	"R180";
	$policies["400-054"]=	"R180";
	$policies["100-088"]=	"R180";
	$policies["100-509"]=	"R180";
	$policies["400-426"]=	"R180";
	$policies["100-247"]=	"R180";
	$policies["400-275"]=	"R180";
	$policies["400-208"]=	"R180";
	$policies["400-105"]=	"R180";
	$policies["100-438"]=	"R180";
	$policies["400-088"]=	"R180";
	$policies["100-520"]=	"R180";
	$policies["400-276"]=	"R180";
	$policies["100-151"]=	"R180";
	$policies["100-355"]=	"R180";
	$policies["400-150"]=	"R180";
	$policies["100-416"]=	"R180";
	$policies["100-131"]=	"R180";
	$policies["400-217"]=	"R180";
	$policies["400-080"]=	"R180";
	$policies["400-232"]=	"R180";
	$policies["400-385"]=	"R180";
	$policies["400-431"]=	"R180";
	$policies["100-149"]=	"R180";
	$policies["400-464"]=	"R180";
	$policies["400-611"]=	"R180";
	$policies["100-012"]=	"R180";
	$policies["100-401"]=	"R180";
	$policies["100-140"]=	"R180";
	$policies["100-083"]=	"R180";
	$policies["100-554"]=	"R180";
	$policies["400-204"]=	"R180";
	$policies["100-394"]=	"R180";
	$policies["100-154"]=	"R180";
	$policies["400-171"]=	"R180";
	$policies["100-470"]=	"R180";
	$policies["400-392"]=	"R180";
	$policies["400-433"]=	"R180";
	$policies["400-037"]=	"R180";
	$policies["100-074"]=	"R180";
	$policies["400-451"]=	"R180";
	$policies["400-476"]=	"R180";
	$policies["400-633"]=	"R180";
	$policies["100-597"]=	"R180";
	$policies["100-153"]=	"R180";
	$policies["100-064"]=	"R180";
	$policies["100-244"]=	"R180";
	$policies["400-084"]=	"R180";
	$policies["400-076"]=	"R180";
	$policies["400-128"]=	"R180";
	$policies["100-369"]=	"R180";
	$policies["100-169"]=	"R180";
	$policies["100-578"]=	"R180";
	$policies["400-174"]=	"R180";
	$policies["100-331"]=	"R240";
	$policies["100-143"]=	"R240";
	$policies["100-266"]=	"R30";
	$policies["100-232"]=	"R60";
	$policies["100-152"]=	"R60";
	$policies["400-169"]=	"R90";
	$policies["400-182"]=	"R90";
	$policies["400-125"]=	"R90";
	$policies["400-366"]=	"R90";
	$policies["100-020"]=	"R90";
	$policies["400-428"]=	"R90";
	$policies["100-014"]=	"R90";
	$policies["400-602"]=	"R90";
	$policies["400-042"]=	"R90";
	$policies["100-100"]=	"R90";
	$policies["100-092"]=	"R90";
	$policies["400-050"]=	"R90";
	$policies["400-056"]=	"R90";
	$policies["400-188"]=	"R90";
	$policies["100-200"]=	"R90";
	$policies["100-218"]=	"R90";
	$policies["100-356"]=	"R90";
	$policies["100-057"]=	"R90";
	$policies["100-320"]=	"R90";
	$policies["400-049"]=	"R90";
	$policies["400-437"]=	"R90";
	$policies["400-452"]=	"R90";
	$policies["400-347"]=	"R90";
	$policies["400-364"]=	"R90";
	$policies["100-096"]=	"R90";
	$policies["400-393"]=	"R90";
	$policies["400-560"]=	"R90";
	$policies["400-441"]=	"R90";
	$policies["400-034"]=	"R90";
	$policies["400-579"]=	"R90";
	$policies["100-094"]=	"R90";
	$policies["400-467"]=	"R90";
	$policies["400-632"]=	"R90";
	$policies["100-201"]=	"R90";
	$policies["100-044"]=	"R90";
	$policies["400-198"]=	"R90";
	$policies["100-043"]=	"R90";
	$policies["100-041"]=	"R90";
	$policies["100-504"]=	"R90";
	$policies["400-110"]=	"R90";
	$policies["100-156"]=	"R90";
	$policies["400-408"]=	"R90";
	$policies["100-290"]=	"R90";
	$policies["100-383"]=	"R90";
	$policies["400-412"]=	"R90";
	$policies["400-440"]=	"R90";
	$policies["400-585"]=	"R90";
	$policies["100-186"]=	"R90";
	$policies["100-427"]=	"R90";
	$policies["101-187"]=	"R90";
	$policies["400-424"]=	"R90";
	$policies["400-201"]=	"R90";
	$policies["400-572"]=	"R90";
	$policies["100-301"]=	"R90";
	$policies["400-459"]=	"R90";
	$policies["400-468"]=	"R90";
	$policies["100-049"]=	"R90";
	$policies["400-136"]=	"R90";
	$policies["400-366"]=	"R90";
	$policies["100-058"]=	"R90";
	$policies["100-571"]=	"R90";
	$policies["100-107"]=	"R90";
	$policies["100-506"]=	"R90";
	$policies["100-396"]=	"R90";
	$policies["400-161"]=	"R90";
	$policies["400-559"]=	"R90";
	$policies["400-434"]=	"R90";
	$policies["400-170"]=	"R90";
	$policies["400-208"]=	"R90";
	$policies["100-592"]=	"R90";
	$policies["400-574"]=	"R90";
	$policies["400-243"]=	"R90";
	$policies["100-594"]=	"R90";
	$policies["100-077"]=	"R90";
	$policies["100-053"]=	"R90";
	$policies["100-127"]=	"R90";
	$policies["100-021"]=	"R90";
	$policies["400-199"]=	"R90";
	$policies["100-128"]=	"R90";
	$policies["100-185"]=	"R90";
	$policies["400-046"]=	"R90";
	$policies["100-398"]=	"R90";
	$policies["400-578"]=	"R90";
	$policies["400-212"]=	"R90";
	$policies["400-361"]=	"R90";
	$policies["400-576"]=	"R90";
	$policies["400-447"]=	"R90";
	$policies["400-590"]=	"R90";
	$policies["100-285"]=	"R90";
	$policies["100-209"]=	"R90";
	$policies["100-436"]=	"R90";
	$policies["100-094"]=	"R90";
	$policies["100-591"]=	"R90";
	$policies["400-399"]=	"R90";
	$policies["400-579"]=	"R90";
	$policies["100-054"]=	"R90";
	$policies["400-471"]=	"R90";
	$policies["400-562"]=	"R90";
	$policies["400-581"]=	"R90";
	$policies["400-584"]=	"R90";
	$policies["400-382"]=	"R90";
	$policies["400-145"]=	"R90";
	$policies["400-568"]=	"R90";
	$policies["400-438"]=	"R90";
	$policies["400-221"]=	"R90";
	$policies["400-373"]=	"R90";
	$policies["100-395"]=	"R90";
	$policies["100-144"]=	"R90";
	*/
	$policies["400-085"]=	"R90";
	$policies["100-150"]=	"R90";
	$policies["400-102"]=	"R90";
	$policies["100-530"]=	"R90";
	$policies["400-427"]=	"R90";
	$policies["100-097"]=	"R90";
	$policies["400-045"]=	"R90";
	$policies["400-634"]=	"R90";
	$policies["400-439"]=	"R90";
	$policies["400-200"]=	"R90";
	$policies["400-039"]=	"R90";
	$policies["400-179"]=	"R90";
	$policies["400-206"]=	"R90";
	$policies["100-125"]=	"R90";
	$policies["400-241"]=	"R90";
	$policies["100-105"]=	"R90";
	$policies["100-046"]=	"R90";
	$policies["400-430"]=	"R90";
	$policies["100-015"]=	"R90";
	$policies["400-332"]=	"R90";
	$policies["400-109"]=	"R90";
	$policies["400-112"]=	"R90";
	$policies["100-311"]=	"R90";
	$policies["400-357"]=	"R90";
	$policies["400-396"]=	"R90";
	$policies["400-131"]=	"R90";
	$policies["400-218"]=	"R90";
	$policies["100-157"]=	"R90";
	$policies["400-448"]=	"R90";
	$policies["400-274"]=	"R90";
	$policies["400-082"]=	"R90";
	$policies["400-058"]=	"R90";
	$policies["400-224"]=	"R90";
	$policies["400-413"]=	"R90";
	$policies["400-435"]=	"R90";
	$policies["400-225"]=	"R90";
	$policies["100-335"]=	"R90";
	$policies["100-338"]=	"R90";
	$policies["100-593"]=	"R90";
	$policies["400-349"]=	"R90";
	$policies["400-474"]=	"R90";
	$policies["100-176"]=	"R90";
	$policies["400-236"]=	"R90";
	$policies["400-047"]=	"R90";
	$policies["100-586"]=	"R90";
	$policies["100-039"]=	"R90";
	$policies["100-138"]=	"R90";
	$policies["400-214"]=	"R90";
	$policies["400-122"]=	"R90";
	$policies["400-566"]=	"R90";
	$db = getDatabase();
	foreach($policies as $key => $value)
	{
		echo "========VENDOR: ".$key."\n";
		$sql = "SELECT * FROM ICPRODUCT WHERE VENDID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($key));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item){
			$sql = "UPDATE ICPRODUCT SET SIZE = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			echo "Updating ".$item["PRODUCTID"]."\n";
			$req->execute(array($value,$item["PRODUCTID"]));  
		}
		sleep(3);
	}
}
go();
?>
