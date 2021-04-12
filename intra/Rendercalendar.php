<?php 
require_once('Service.php');

function getOneStructure($schedule)
{
	$days = ["MON","TUE","WED","THU","FRI","SAT","SUN"];
	$hours = ["7:00","7:30","8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00"];
	$structure = array();
	foreach($days as $day)
	{
		$structure[$day] = array();
		foreach($hours as $hour)
			$structure[$day][$hour] = array();
	}	
	$start1 = array_search($schedule["starttime1"],$hours);	
	$end1 = array_search($schedule["endtime1"],$hours);
	$start2 = array_search($schedule["starttime2"],$hours);
	$end2 = array_search($schedule["endtime2"],$hours);	

	foreach($days as $day)
	{		
		if ($schedule["dayoff"] == $day)
			continue;
		for($i = $start1; $i < $end1;$i++)		
		{						
			$obj["color"] = $schedule["color"];
			$obj["ID"] = $schedule["ID"]; 	
			$obj["firstname"] = $schedule["firstname"]; 	
			array_push($structure[$day][$hours[$i]],$obj);
		}
				
		if ($start2 != "" && $end2 != "")
		{
			for($j = $start2; $j < $end2;$j++)		
			{							
				$obj["color"] = $schedule["color"];
				$obj["ID"] = $schedule["ID"];
				$obj["firstname"] = $schedule["firstname"]; 	
				array_push($structure[$day][$hours[$j]],$obj);
			}				
		}						
	}
	return $structure;
} 

function getStructure($schedules)
{


	$days = ["MON","TUE","WED","THU","FRI","SAT","SUN"];
	$hours = ["7:00","7:30","8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00"];
	$structure = array();
	foreach($days as $day)
	{
		$structure[$day] = array();
		foreach($hours as $hour)
			$structure[$day][$hour] = array();
	}	

	foreach($schedules as $schedule)
	{			
		$start1 = array_search($schedule["starttime1"],$hours);	
		$end1 = array_search($schedule["endtime1"],$hours);
		$start2 = array_search($schedule["starttime2"],$hours);
		$end2 = array_search($schedule["endtime2"],$hours);	

		foreach($days as $day)
		{		
			if ($schedule["dayoff"] == $day)
				continue;
			for($i = $start1; $i < $end1;$i++)		
			{						
				$obj["color"] = $schedule["color"];
				$obj["ID"] = $schedule["ID"]; 	
				$obj["firstname"] = $schedule["firstname"]; 	
				array_push($structure[$day][$hours[$i]],$obj);
			}
					
			if ($start2 != "" && $end2 != "")
			{
				for($j = $start2; $j < $end2;$j++)		
				{							
					$obj["color"] = $schedule["color"];
					$obj["ID"] = $schedule["ID"];
					$obj["firstname"] = $schedule["firstname"]; 	
					array_push($structure[$day][$hours[$j]],$obj);
				}				
			}						
		}			
	}
	return $structure;
}


function renderSchedule($schedule)
{
	$days = ["MON","TUE","WED","THU","FRI","SAT","SUN"];
	$hours = ["7:00","7:30","8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00"];

	// SETUP 
	$schedule = Service::ListEntity("schedule",33);  	
	$structure = getOneStructure($schedule);
	
	
	// RENDER
	$body = "<center>
			 <h1>Timetable</h1>";
	$body .= "<table border='1'>";
	$body .= "<tr>";
	$body .= 	"<th></th>";
	$body .= 	"<th >MON</th>";
	$body .= 	"<th >TUE</th>";
	$body .= 	"<th >WED</th>";
	$body .= 	"<th >THU</th>";
	$body .= 	"<th >FRI</th>";
	$body .= 	"<th >SAT</th>";
	$body .= 	"<th >SUN</th>";
	$body .= "</tr>";
	
	foreach($hours as $hour)
	{
		$body .= "<tr>";
		$body .= "<td>".$hour."</td>";
	

		foreach($days as $day)
		{
			
			$body .= "<td align='center'>";
			$elements = $structure[$day][$hour];			
			$body .= "<table ><tr height='20px'>";
			foreach($elements as $element)	
				$body .= "<td width='4px' bgcolor='009183'></td>";	
			$body .= "</table>";		
				
			$body .= "</td>";	
		}	
		$body .= "</tr>";
	}
	$body .= "<table>";
	$body .= "</center>";
	$body .= "<br><br>";
	return $body;
}

function renderAllSchedule($schedules)
{
	$body = "<center>
			<h1>Timetable</h1>";
	//$schedules = Service::ListEntity("scheduleStore");  
	//$body .= renderSchedule($data);
	$days = ["MON","TUE","WED","THU","FRI","SAT","SUN"];
	$hours = ["7:00","7:30","8:00","8:30","9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00"];
	
	$structureC = getStructure($schedules["C"]);
	$structureF = getStructure($schedules["F"]);
	$structureR = getStructure($schedules["R"]);

	$structureCL = getStructure($schedules["CL"]);
	$structureW = getStructure($schedules["W"]);
	$structureO = getStructure($schedules["O"]);
	
	// RENDER

	$body = "";
	$body .= "<table >";
	$body .= "<tr>";
	$body .= 	"<th></th>";
	$body .= 	"<th>MON</th>";
	$body .= 	"<th>TUE</th>";
	$body .= 	"<th>WED</th>";
	$body .= 	"<th>THU</th>";
	$body .= 	"<th>FRI</th>";
	$body .= 	"<th>SAT</th>";
	$body .= 	"<th>SUN</th>";
	$body .= "</tr>";
	
	foreach($hours as $hour)
	{
		$body .= "<tr>";
		$body .= "<td>".$hour."</td>";
	

		foreach($days as $day)
		{
			$count = 0;		
			$body .= "<td align='center'>";


			$elementsC = $structureC[$day][$hour];			
			if (count($elementsC) > 0)
			{
				$body .= "Cashier<table ><tr height='20px'>";
				foreach($elementsC as $element){
				$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
				$count++;
				}		
				$body .= "</table>";		
			}
			
		
			$elementsF = $structureF[$day][$hour];			
			if (count($elementsF) > 0)
			{
				$body .= "Fresh<table ><tr height='20px'>";
				foreach($elementsF as $element)	{
				$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
				$count++;
				}
				$body .= "</table>";			
			}
			

			$elementsR = $structureR[$day][$hour];			
			if (count($elementsR) > 0)
			{
				$body .= "Rows<table ><tr height='20px'>";
				foreach($elementsR as $element)	{
				$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
				$count++;
				}
				$body .= "</table>";			
			}
			
			
			$elementsCL = $structureCL[$day][$hour];			
			if (count($elementsCL) > 0)
			{
				$body .= "Cleaner<table ><tr height='20px'>";
				foreach($elementsCL as $element)	{
				$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
				$count++;
				}
				$body .= "</table>";	
			}

			$elementsW = $structureW[$day][$hour];			

			if (count($elementsW) > 0)
			{
				$body .= "Warehouse<table ><tr height='20px'>";
				foreach($elementsW as $element)	{
					$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
					$count++;
				}
			$body .= "</table>";	
			}

			$elementsO = $structureO[$day][$hour];			
			if (count($elementsO))
			{
				$body .= "Office<table><tr height='20px'>";
				$skip = 0;
				foreach($elementsO as $element)	
				{

					$body .= "<td width='4px'  onmouseout='hideImage()' onmouseover='showImage(".$element["ID"].",\"".$element["firstname"]."\")'><img height='25px' src='http://phnompenhsuperstore.com/api/img/users/".$element["ID"].".png'> </td>";	
					$count++;
					$skip++;
					if ($skip > 5){					
						$body .= "</tr><tr>";
						$skip = 0;
					}			
				}
				$body .= "</table>";
			} 
			
						
			$body .= "total: ".$count;			

			$body .= "</td>";	
		}	
		$body .= "</tr>";
	}
	$body .= "<table>";






	$body .= "</center>
		<div id='overlay' style='position:fixed;left:-500;top:-500;z-index:100;width:100px;height:200px'>
		<img id='myImage'  style='width:100px'><br>
		<span id='firstname'></span>
	</div>
	<br><br>
	";
	return $body;
}
?>
<script>
	function showImage(id,lastname)
	{
		var e = window.event;
    	var posX = e.clientX;
    	var posY = e.clientY;  
    	var elem = document.getElementById('overlay');
		elem.style.left = posX;
		elem.style.top = posY;
	
		document.getElementById('myImage').src='http://phnompenhsuperstore.com/api/img/users/'+id+'.png';
		document.getElementById('firstname').innerHTML = lastname;
		//elem.top = posY;
	}

	function hideImage()
	{
		var elem =document.getElementById('overlay');
		elem.style.left = -500;
		elem.style.top = -500;
	}
	</script>