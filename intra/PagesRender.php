
<?php 

include('data.php');

ini_set('max_input_vars','10000' );


// LABEL A4
function renderA4Label()
{
  return "
    <center>
      <img height='200px' src='images/roundlogo.png' >
      <br>
      <h1 style='color:#009183'>A4 LABEL GENERATOR</h1>        
    <table bgcolor='#009183' width='1000px' border='1'>
      <tr>    
        <td>
          <center>
          <span style='color:white'>NORMAL</span><br><br>
          <form  action='http://phnompenhsuperstore.com/api/labelA4.php' method='GET' target='_blank'>
            <span style='color:white'>BARCODE 1</span><input name='barcode1' ><br>
            <span style='color:white'>BARCODE 2</span><input name='barcode2' ><br>
            <span style='color:white'>BARCODE 3</span><input name='barcode3' ><br>
            <span style='color:white'>BARCODE 4</span><input name='barcode4' ><br><br>            
            <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
          </form>
          </center>
        </td>
      </tr>
      <tr>
    </table>
    </center>";
}


// LABEL SMALL
function renderA5Label()
{
  return "
        <center>
          <img height='200px' src='images/roundlogo.png' >
          <br>
          <h1 style='color:#009183'>A5 LABEL GENERATOR</h1>  
        <table bgcolor='#009183' width='1000px' border='1'>
          <tr>    
            <td >
            <center>              
              <form action='http://phnompenhsuperstore.com/api/labelA5.php' method='GET'  target='_blank'>
                <span style='color:white'>BARCODE</span><input name='barcode1' ><br>
                <center><input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' /></center>
              </form>
            </center>
            </td>
            
          </tr>
          <tr>
        </table>
        </center>"; 
}


function renderA6Label()
{
  return "
        <center>
          <img height='200px' src='images/roundlogo.png' >
          <br>
          <h1 style='color:#009183'>A6 LABEL GENERATOR</h1>  
        <table bgcolor='#009183' width='1000px' border='1'>
          <tr>    
            <td >
              <center>   

                <form  method='GET' action='http://phnompenhsuperstore.com/api/labelA6.php' target='_blank'>                
                 <span style='color:white'>BARCODE1</span><input name='barcode1' ><br>        
                 <span style='color:white'>BARCODE2</span><input name='barcode2' ><br>        
                 <span style='color:white'>BARCODE3</span><input name='barcode3' ><br>        
                 <span style='color:white'>BARCODE4</span><input name='barcode4' ><br>                  
                  <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
                </center>
              </form>
            </td>
          </tr>

          <tr>
        </table>
        </center>
        ";
}

function renderA7Label()
{
  return "
        <center>
          <img height='200px' src='images/roundlogo.png' >
          <br>
          <h1 style='color:#009183'>A7 LABEL GENERATOR</h1>  
        <table bgcolor='#009183' width='1000px' border='1'>
          <tr>    
            <td >
              <center>                
                <form  method='GET' action='http://phnompenhsuperstore.com/api/labelA7.php' target='_blank'>                
                  <span style='color:white'>BARCODE1</span><input name='barcode1' ><br>        
                 <span style='color:white'>BARCODE2</span><input name='barcode2' ><br>        
                 <span style='color:white'>BARCODE3</span><input name='barcode3' ><br>        
                 <span style='color:white'>BARCODE4</span><input name='barcode4' ><br>
                 <span style='color:white'>BARCODE5</span><input name='barcode5' ><br>        
                 <span style='color:white'>BARCODE6</span><input name='barcode6' ><br>        
                 <span style='color:white'>BARCODE7</span><input name='barcode7' ><br>        
                 <span style='color:white'>BARCODE8</span><input name='barcode8' ><br>                
                  <input style='background-color:#ffed00;color:009183;font-weight: bold' type='submit' value='GENERATE' />
                </center>
              </form>
            </td>
          </tr>

          <tr>
        </table>
        </center>
        ";
}

function renderLabelSmall()
{
	return "
	<center>
        <img height='100px' src='images/roundlogo.png' >
    <div style='background-color:#009183'>
        <h1 style='color:#009183'>SMALL LABEL GENERATOR</h1>
        <span style='background-color:#009183;color:white'>Copy up to 24 barcodes, separated by a '|'</span><br>        
	      <form method='GET' target='_blank' action='http://phnompenhsuperstore.com/api/labelprint.php'>
		      <textarea type='text' name='barcodes' rows='5' cols='40' style='text-align:center;background-color:white' /> </textarea><br><br>
		      <input style='background-color: #009183;;font-size: 20pt;color:white' type='submit' value='GENERATE' />
	      </form>
  </div>
	</center>";
}


function renderLabelSmallNew()
{
  return "
  <center>
        <img height='100px' src='images/roundlogo.png' >
    <div style='background-color:#009183'>
        <h1 style='color:#009183'>SMALL LABEL GENERATOR</h1>
        <span style='background-color:#009183;color:white'>Copy up to 24 barcodes, separated by a '|'</span><br>        
        <form method='GET' target='_blank' action='http://phnompenhsuperstore.com/api/labelprintnew.php'>
          <textarea type='text' name='barcodes' rows='5' cols='40' style='text-align:center;background-color:white' /> </textarea><br><br>
          <input style='background-color: #009183;;font-size: 20pt;color:white' type='submit' value='GENERATE' />
        </form>
  </div>
  </center>";
}


function renderSales($sales)
{
	$body = "";	

	if ($sales != null){
		  $body .= "<div class='col s12 m8 l9' align='center'>";
    	$body .= "<span>SALE: ".$sales['SALE']."</span><br>";
    	$body .= "<span>PROFIT: ".$sales['PROFIT']."</span>";
    	$body .= "</div>";	
	 }

    $body .= "<div class='col s12 m8 l9'>
              <div class='row'>
                <form class='col s12' method='GET'>";              
    $body .=      dateSelect("date");               
    $body .=      "<div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='sales'>
                      <input type='hidden' name='entity' value='sales'>
                      <input type='hidden' name='action' value='sales'>

                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>";  
    $body .= "  </form>
              </div>
             </div> 
              ";                  

 return $body;
}



function renderKPISales($data)
{
  $salesData = "";
  $profitData = "";

  $year = $data["year"];

  $labels = "'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AUG','SEP','OCT','NOV', 'DEC'";
  for($i = 1;$i <= 12;$i++){
        $salesData .= "'".$data["data"]["year"][strval($i)]["SALE"]."',";
        $profitData .= "'".$data["data"]["year"][strval($i)]["PROFIT"]."',";          
  }
  $title = "Sales for Year ".$data["year"];
  $salesData = substr($salesData,0, strlen($salesData) - 1);
  $profitData = substr($profitData,0, strlen($profitData) - 1);  

  $linkY = "http://phnompenhsuperstore.com/intra/?display=KPISales&entity=KPISales&year=";
  $body = "<center>YEAR : <a href='".$linkY."2019'>2019</a>|<a href='".$linkY."2020'>2020</a></center><br>"; 

  // ALL Year
  $body .= "<br><center>".$title."</center>";
  $body .= "<canvas id='allMonths'></canvas><br><br>"; 
  $body .= "<script>
  var ctx = document.getElementById('allMonths').getContext('2d');
  var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',

  // The data for our dataset
  data: {
        labels: [".$labels."],
        datasets: [{
            label: 'SALES',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [".$salesData."]
        },
        {
            label: 'PROFIT',
            backgroundColor: 'rgb(0, 0, 132)',
            borderColor: 'rgb(0, 0, 132)',
            data: [".$profitData."]
        }]
    },

    // Configuration options go here
    options: {}    
  });
  </script>";
  

  $months["1"] = "January";
  $months["2"] = "February";
  $months["3"] = "March";
  $months["4"] = "April";
  $months["5"] = "May";
  $months["6"] = "June";
  $months["7"] = "July";
  $months["8"] = "August";
  $months["9"] = "September";
  $months["10"] = "October";
  $months["11"] = "November";
  $months["12"] = "December";

  

  // MONTH BY MONTH
  foreach($data["data"]["months"] as $key => $value)
  {
      $month = sprintf("%02d",$key); ;      
      $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
      $labels = "";
      $salesData = "";
      $profitData = "";
      for($i = 1; $i <= $daysInMonth;$i++)
      {
        $day = sprintf("%02d",$i);
        
        $salesData .= "'".$value[$i]["SALE"]."',";
        $profitData .= "'".$value[$i]["PROFIT"]."',";                  
        $labels .= "'".$day."/".$month."',";
     } 
    $title = "Sales for ".$months[$key];
    $salesData = substr($salesData,0, strlen($salesData) - 1);
    $profitData = substr($profitData,0, strlen($profitData) - 1);  
    $labels = substr($labels,0, strlen($labels) - 1);  

    $body .= "<br><center>".$title."</center>";
    $body .= "<canvas id='month".$key."'></canvas><br><br>"; 
    $body .= "<script>
    var ctx = document.getElementById('month".$key."').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
          labels: [".$labels."],
          datasets: [{
              label: 'SALES',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [".$salesData."]
          },
          {
              label: 'PROFIT',
              backgroundColor: 'rgb(0, 0, 132)',
              borderColor: 'rgb(0, 0, 132)',
              data: [".$profitData."]
          }]
      },

      // Configuration options go here
      options: {}    
    });
    </script>";
  }


 return $body;
}

function renderKPIRow($data)
{ 

  $months = array("","05/2019","06/2019","07/2019","08/2019","09/2019","10/2019","11/2019","12/2019",
              "01/2020","02/2020","03/2020","04/2020","06/2020","07/2020","08/2020","09/2020","10/2020","11/2020","12/2020",
              "01/2021","02/2021","03/2021","04/2021","06/2021","07/2021","08/2021","09/2021","10/2021","11/2021","12/2021",
              "01/2022","02/2022","03/2022","04/2022","06/2022","07/2022","08/2022","09/2022","10/2022","11/2022","12/2022");

  $years = array("","2020","2021","2022");

    //".elemSelect(array("YES","NO"),"zerosale",12,$zerosale)."
  $body = "";  
  $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
              
                <div class='row'>
                    <div class='input-field col s12'>
                      ".elemSelect($years,"YEAR",12)."
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>
                      ".elemSelect($months,"MONTH",12)."
                    </div>
                </div>

                    <div class='row'>
                    <div class='input-field col s12'>
                      ".dateSelect("date",$date)."
                    </div>
                </div>

                       
                <div class='row'>    
                       <div class='input-field col s12'>             
                        <input type='hidden' name='display' value='kpirow'>
                        <input type='hidden' name='entity' value='kpirow'>
                        <input type='hidden' name='action' value='kpirow'>
                        <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                       </div>
                </div>

                </form>
              </div>
            </div> 
              ";

  /*              
  if ($month == null){
    $labels = "'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AUG','SEP','OCT','NOV', 'DEC'";
    $times = 12;
  }
  else 
  {
    $labels = "";
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $times = $daysInMonth;
    for($i = 1; $i <= $daysInMonth;$i++){
      $day = sprintf("%02d",$i);
      $labels .= "'".$day."/".$month."',";
     }
     $labels = substr($labels,0,-1);
  }
  */
  $labels = "";
  foreach($data as $key => $value){
    $labels .= "'".$key."',";
  }
  $labels = substr($labels,0,-1);
  $times = count($data); 

  $keysHolder = null;
  $dataQuantityHolder = array();
  $dataAmountHolder = array();
  $body = "";
  

  for($i = 1;$i <= $times;$i++)
  {
    if ($keysHolder == null && count($data["data"][strval($i)][$group]) > 0)
      $keysHolder = array_keys($data["data"][strval($i)][$group]);        
    
    foreach($data["data"][strval($i)][$group] as $key => $value)
    {              
        $dataSaleHolder[$key] .= "'".$value["SALE"]."',";
        $dataProfitHolder[$key] .= "'".$value["PROFIT"]."',";        
    }    
  }

  foreach($keysHolder as $key){            
        $dataSaleHolder[$key] =  substr($dataSaleHolder[$key],0,-1);
        $dataProfitHolder[$key] = substr($dataProfitHolder[$key],0,-1);
  }    

  $body .= "<br><center>".$group."</center>";
  $body .= "<canvas id='".$group."'></canvas><br><br>"; 
  $body .= "<script>
  var ctx = document.getElementById('".$group."').getContext('2d');
  var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',

  // The data for our dataset
  data: {
        labels: [".$labels."],
        datasets: [";
   foreach($keysHolder as $key)
   {            
    $body .= "
            {
                label: '".$key." Amount Sold',
                backgroundColor: '".xCBN($key)."',
                borderColor: '".xCBN($key)."',
                stack: '".$key."',
                data: [".$dataAmountHolder[$key]."]
            },
               {
                label: '".$key." Quantity Sold',
                backgroundColor: '".CBN($key)."',
                borderColor: '".CBN($key)."',
                stack: '".$key."',
                data: [".$dataQuantityHolder[$key]."]
            },

             ";
  }      
  $body .= "          
        ]
    },

    // Configuration options go here
    options: {
                scales: 
                {
                  xAxes: [{ stacked: true }],
                  yAxes: [{ticks: {beginAtZero:true},stacked: false}]
                }
              }
                
  });
  </script>";              

  
}

function renderKPIAverage($data)
{
  
}

function CBN($name){
  $colors["FRESH"] = "rgb(0,204,0)";
  $colors["DRY GROCERY"] = "rgb(255,128,0)";
  $colors["FROZEN"] = "rgb(0,102,204)";
  $colors["NON-FOOD"] = "rgb(153,76,0)";

  if(isset($colors[$name]))
    return $colors[$name];
  else 
    return sprintf("rgb(%d,%d,%d)",rand(0,255),rand(0,255),rand(0,255));
}

function xCBN($name){
    $str = CBN($name);
    $tmp = explode('rgb(',$str)[1];
    $tmp = explode(')',$str)[0];

    $tmp = explode(',',$str);
    
    $r = 255 - intval($tmp[0]);
    $g = 255 - intval($tmp[1]);
    $b = 255 - intval($tmp[2]);
    return sprintf("rgb(%d,%d,%d)",$r,$g,$b);
}




function RenderGroup($group,$data,$year = '',$month = null)
{
  if ($month == null){
    $labels = "'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AUG','SEP','OCT','NOV', 'DEC'";
    $times = 12;
  }
  else 
  {
    $labels = "";
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    $times = $daysInMonth;
    for($i = 1; $i <= $daysInMonth;$i++){
      $day = sprintf("%02d",$i);
      $labels .= "'".$day."/".$month."',";
     }
     $labels = substr($labels,0,-1);
  }


  $keysHolder = null;
  $dataSaleHolder = array();
  $dataProfitHolder = array();
  $body = "";
  

  for($i = 1;$i <= $times;$i++)
  {
    if ($keysHolder == null && count($data["data"][strval($i)][$group]) > 0)
      $keysHolder = array_keys($data["data"][strval($i)][$group]);        
    
    foreach($data["data"][strval($i)][$group] as $key => $value)
    {              
        $dataSaleHolder[$key] .= "'".$value["SALE"]."',";
        $dataProfitHolder[$key] .= "'".$value["PROFIT"]."',";        
    }    
  }

  foreach($keysHolder as $key){            
        $dataSaleHolder[$key] =  substr($dataSaleHolder[$key],0,-1);
        $dataProfitHolder[$key] = substr($dataProfitHolder[$key],0,-1);
  }    

  $body .= "<br><center>".$group."</center>";
  $body .= "<canvas id='".$group."'></canvas><br><br>"; 
  $body .= "<script>
  var ctx = document.getElementById('".$group."').getContext('2d');
  var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',

  // The data for our dataset
  data: {
        labels: [".$labels."],
        datasets: [";
   foreach($keysHolder as $key){            
    $body .= "
            {
                label: '".$key." Profit',
                backgroundColor: '".xCBN($key)."',
                borderColor: '".xCBN($key)."',
                stack: '".$key."',
                data: [".$dataProfitHolder[$key]."]
            },
               {
                label: '".$key." Sale',
                backgroundColor: '".CBN($key)."',
                borderColor: '".CBN($key)."',
                stack: '".$key."',
                data: [".$dataSaleHolder[$key]."]
            },

             ";
  }      
  $body .= "          
        ]
    },

    // Configuration options go here
    options: {
                scales: 
                {
                  xAxes: [{ stacked: true }],
                  yAxes: [{ticks: {beginAtZero:true},stacked: false}]
                }
              }
                
  });
  </script>";
  return $body;
}


function linkMonth($month,$year){
  return "<a href='http://phnompenhsuperstore.com/intra/?display=KPICategory&entity=KPICategory&month=".$month."&year=".$year."'>".$month."/".$year."</a>";
}

function renderKPICategory($data)
{
  if (isset($data["month"]))
    $body .= "<center>Sales for ".$data["month"]."/".$data["year"]."</center><br>";
  else 
    $body .= "<center>Sales for Year ".$data["year"]."<center><br>";


  $salesData = substr($salesData,0, strlen($salesData) - 1);
  $profitData = substr($profitData,0, strlen($profitData) - 1);  

  $linkY = "http://phnompenhsuperstore.com/intra/?display=KPICategory&entity=KPICategory&year=";
  $body .= "<center>YEAR : <a href='".$linkY."2019'>2019</a>|<a href='".$linkY."2020'>2020</a></center><br>";

  $body .= "<center>MONTHS:<br> ".
                    linkMonth("05","2019")."|".linkMonth("06","2019")."|".linkMonth("07","2019")."|".linkMonth("08","2019")."|".linkMonth("09","2019")."|".linkMonth("10","2019")."<br>".
                    linkMonth("11","2019")."|".linkMonth("12","2019")."<br>". 

                    linkMonth("01","2020")."|".linkMonth("02","2020")."|".linkMonth("03","2020")."|".linkMonth("04","2020")."|".linkMonth("05","2020")."|".linkMonth("06","2020")."<br>". 
                    linkMonth("07","2020")."|".linkMonth("08","2020")."|".linkMonth("09","2020")."|".linkMonth("10","2020")."|".linkMonth("11","2020")."|".linkMonth("12","2020")
                      
                      ."</center>";

  $year = $data["year"];
  
  

  if (isset($data["month"])){       
    $body .= RenderGroup("ALL",$data,$year,$data["month"]);
    $body .= RenderGroup("FRESH",$data,$year,$data["month"]);
    $body .= RenderGroup("DRY GROCERY",$data,$year,$data["month"]);
    $body .= RenderGroup("FROZEN",$data,$year,$data["month"]);
    $body .= RenderGroup("NON-FOOD",$data,$year,$data["month"]); 
  }
  else 
  {
  // ALL 
    $body .= RenderGroup("ALL",$data);
    $body .= RenderGroup("FRESH",$data);
    $body .= RenderGroup("DRY GROCERY",$data);
    $body .= RenderGroup("FROZEN",$data);
    $body .= RenderGroup("NON-FOOD",$data);    
  }
  


  //
  /*
  $dataSaleHolder = array();
  $dataProfitHolder = array();
  $keysHolder = null;

  for($i = 1;$i <= 12;$i++)
  {

    if ($keysHolder == null && count($data["data"]["year"][strval($i)]["FRESH"]) > 0)
      $keysHolder = array_keys($data["data"]["year"][strval($i)]["FRESH"]);        
    
    foreach($data["data"]["year"][strval($i)]["FRESH"] as $key => $value)
    {              
        $dataSaleHolder[$key] .= "'".$value["SALE"]."',";
        $dataProfitHolder[$key] .= "'".$value["PROFIT"]."',";        
    }    
  }
  
  foreach($keysHolder as $key){            
        $dataSaleHolder[$key] =  substr($dataSaleHolder[$key],0,-1);
        $dataProfitHolder[$key] = substr($dataProfitHolder[$key],0,-1);
  }    

  $body .= "<br><center>FRESH</center>";
  $body .= "<canvas id='FRESHSection'></canvas><br><br>"; 
  $body .= "<script>
  var ctx = document.getElementById('FRESHSection').getContext('2d');
  var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',
   data: {
        labels: [".$labels."],
        datasets: [
          ";
  foreach($keysHolder as $key){            
    $body .= "
               {
                label: '".$key." Sale',
                backgroundColor: 'rgb(153, 76, 0)',
                borderColor: 'rgb(255, 0, 0)',
                data: [".$dataSaleHolder[$key]."]
            },
            {
                label: '".$key." Profit',
                backgroundColor: 'rgb(153, 76, 0)',
                borderColor: 'rgb(0, 255, 0)',
                data: [".$dataProfitHolder[$key]."]
            },
             ";
  }
  $body .="]
      },
    options: {}    
  });
  </script>";

  */
 return $body;  
}


function renderItemList($list)
{      
  
  $body = "<table>
  		  <tr><th>Picture</th><th>Name</th> <th>Vendor</th> <th>RCV</th><th>SOLD</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th></tr>";  

  foreach($list as $item)
  {
  		$body .=  "<tr>  						
  						<td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>	
  						<td>".$item["PRODUCTNAME"]."</td>
  						<td>".$item["VENDNAME"]."</td>
  						<td>".$item["TOTALRECEIVE"]."</td>
  						<td>".$item["TOTALSALE"]."</td>
  						<td>".$item["WH1"]."</td>
  						<td>".$item["WH2"]."</td>
  						<td>".$item["CATEGORYID"]."</td>
  						<td>".$item["COLOR"]."</td>
  				  </tr>";         	  
  }
  $body .= "</table>";


  return $body;
}

function truncatePrice($price,$decimals = 4)
{
  if (strpos($price, '.') === false)
    return  $price.".00";

  if (strpos($price, 'E') !== false)
    return floatval($price);

  if (substr($price,0,3) == ".00")
    return "0";

  if (substr($price,0,1) == ".")
    return "0".substr($price,0,1 + $decimals);

	$left = explode('.',$price)[0];

	if (count(explode('.',$price)) > 1)
	{
		$right = explode('.',$price)[1];
		$right = substr($right,0,$decimals);    
    return $left.".".$right;

	}
	else	    
		return  substr($left,0,2);		
	
}

function escapeJS($string)
{

    $string =  str_replace("\n", '\n', $string);
    $string = str_replace('"', '\"',$string);
    $string = str_replace("'", "’",$string);    
    return $string;
}

function renderItemNegative($items)
{
  $pages = $items["NBPAGES"];
  $nbitems = $items["NBITEMS"];
  $items = $items["ITEMS"];
  $page = isset($_GET["page"]) ? $_GET["page"] : 0;

  $body = "<center>";
  if ($items != null)
  {     
    $body .= "<br><b><u>Total items : ".$nbitems."</b></u><center><br>";
    $body .= "<form target=_blank action='export.php' method='POST'>
              <center>
              <input type='hidden' name='type' value='itemnegative'>              
              <input type='submit' value='EXPORT'>
              </center>";                      
    $body .="          
    <br><table border='1' id='resultTable'>
    <thead>
    <tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th> <th>Vendor</th> <th>RCV</th>
        <th>SOLD</th> <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> 
        <th>COUNTRY</th><th>PRICE</th><th>SALE LAST 30<th>LAST RCV</th><th>LAST SALE</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th> <th>Vendor</th> <th>RCV</th>
        <th>SOLD</th> <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> 
        <th>COUNTRY</th><th>PRICE</th><th>SALE LAST 30<th>LAST RCV</th><th>LAST SALE</th>
        <th></th>
    </tr>
    </tfoot>
    ";  
    $body .= "</table></form><br><br>";        
  }

  $dataSet = "";
  foreach($items as $item)
  {
      $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);
      $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
      $item["ONHAND"] = truncatePrice($item["ONHAND"]);
      $item["WH1"] = truncatePrice($item["WH1"]);
      $item["WH2"] = truncatePrice($item["WH2"]);
      $item["COLOR"] = truncatePrice($item["COLOR"]);
      $item["PRICE"] = truncatePrice($item["PRICE"]);    
      if ($item["SALELAST30"] == "")
        $item["SALELAST30"] = "0";

    $dataSet .= "[
      '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
      '".$item["PRODUCTID"]."',
      \"".$item["PRODUCTNAME"]."\",
      \"".$item["VENDNAME"]."\",
      '".$item["TOTALRECEIVE"]."',
      '".$item["TOTALSALE"]."',
      '".$item["ONHAND"]."',
      '".$item["WH1"]."',
      '".$item["WH2"]."',
      '".$item["CATEGORYID"]."',
      '".$item["COLOR"]."',
      '".$item["PRICE"]."',
      '".$item["SALELAST30"]."',
      '".$item["LASTRECEIVEDATE"]."',
      '".$item["LASTSALEDATE"]."',
      \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"
    ],";
  }
  $dataSet = rtrim($dataSet,",");
  $body .= "  
  <script>  
  var dataSet = [".$dataSet."]
  $(document).ready( function () {
    $('#resultTable').DataTable({                
        data:dataSet,         
        'lengthMenu':[50,100,-1]
      }
    );
  } );
  </script>
  ";
  return $body;
}

function renderItemZeroStock($items)
{  
  $items = $items["ITEMS"];
  $nbitems = count($items);
  

  $body = "<br><b><center><u>Total items : ".$nbitems."</b></u><center><br>";

    


  if ($items != null)
  {      
    $body .= "
      <center>
      <form target=_blank action='export.php' method='POST'>
        <center>
        <input type='hidden' name='type' value='itemzerostock'>
        <input type='submit' value='EXPORT'>
        <center><br>
      <table border='1' id='resultTable'>
      <thead><tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th> <th>Vendor</th> <th>RCV</th><th>SOLD</th> <th>ON HAND</th> <th>WH1</th> 
        <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
          <th>PRICE</th> <th>SALE LAST 30</th> <th>LAST RCV</th> <th>LAST SALE</th>
      </thead></tr>

      <tfoot><tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th> <th>Vendor</th> <th>RCV</th><th>SOLD</th> <th>ON HAND</th> <th>WH1</th> 
        <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
          <th>PRICE</th> <th>SALE LAST 30</th> <th>LAST RCV</th> <th>LAST SALE</th>
      </tfoot></tr>
    </table>
    </form><br><br>";  

    foreach($items as $item)
    {
      if ($item["SALELAST30"] == "")
        $item["SALELAST30"] = "0";

      $dataSet .= "[
      '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
      '".$item["BARCODE"]."',
      \"".$item["PRODUCTNAME"]."\",
      \"".$item["VENDNAME"]."\",
      '".truncatePrice($item["TOTALRECEIVE"])."',
      '".truncatePrice($item["TOTALSALE"])."',
      '".truncatePrice($item["ONHAND"])."',
      '".truncatePrice($item["WH1"])."',
      '".truncatePrice($item["WH2"])."',      
      '".$item["CATEGORYID"]."',
      '".$item["COLOR"]."',
      '".$item["SALELAST30"]."',
      '".$item["LASTRECEIVEDATE"]."',
      '".$item["LASTSALEDATE"]."',
      \"<input type='hidden' name='".$item["BARCODE"]."' value='".escapeJS(json_encode($item))."')>\"
      ],";
    }    
    $dataSet = rtrim($dataSet,",");
    $body .= "  
    <script>  
    var dataSet = [".$dataSet."]
    $(document).ready( function () {
    $('#resultTable').DataTable({                
    data:
    dataSet, 
    'lengthMenu':[50,100,-1]
    }
    );
    } );
    </script>
    ";   
  }
  return $body;
}

function renderZeroSale($items)
{
  $pages = $items["NBPAGES"];
  $nbitems = $items["NBITEMS"];
  $items = $items["ITEMS"];
  $page = isset($_GET["page"]) ? $_GET["page"] : 0;


  $body = "<center>";
  if ($items != null)
  {      
    

    $body .= "<br><b><u>Total Items: ".$nbitems."</b></u><center><br>";

    $body .= "<form target=_blank action='export.php' method='POST'>
              <center>              
              <input type='hidden' name='type' value='zerosale'>  
              <input type='submit' value='EXPORT'>
              </center>";                      

    $body .= "<br><table border='1' id='resultTable'>
    <thead><tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th><th>Vendor</th><th>RCV</th>
        <th>SOLD</th><th>ON HAND</th><th>WH1</th> <th>WH2</th> <th>Category</th> 
        <th>COUNTRY</th><th>PRICE</th><th>LAST RCV</th><th>LAST SALE</th>
    </tr><thead>

    <tfoot><tr>
        <th>Picture</th><th>BARCODE</th><th>Name</th><th>Vendor</th><th>RCV</th>
        <th>SOLD</th><th>ON HAND</th><th>WH1</th> <th>WH2</th> <th>Category</th> 
        <th>COUNTRY</th><th>PRICE</th><th>LAST RCV</th><th>LAST SALE</th>
    </tr><tfoot>
    </table><br><br>
    ";  

    foreach($items as $item)
    {
        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

      $dataSet .= "[
      '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
      '".$item["PRODUCTID"]."',      
      \"".$item["PRODUCTNAME"]."\",
      \"".$item["VENDNAME"]."\",
      '".$item["TOTALRECEIVE"]."',
      '".$item["TOTALSALE"]."',
      '".$item["ONHAND"]."',
      '".$item["WH1"]."',
      '".$item["WH2"]."',
      \"".$item["CATEGORYID"]."\",
      '".$item["COLOR"]."',
      '".$item["PRICE"]."',      
      '".$item["LASTRECEIVEDATE"]."',
      '".$item["LASTSALEDATE"]."',
      \"<input type='hidden' name='".$item["BARCODE"]."' value='".escapeJS(json_encode($item))."')>\"
      
      ],";
    }
    $dataSet = rtrim($dataSet,",");
  $body .= "  
  <script>  
  var dataSet = [".$dataSet."]
  $(document).ready( function () {
    $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[50,100,-1]    
      }
    );
  } );
  </script>
  "; 
  }
  return $body;
}

function escapeJsonString($value) { 
    $result = str_replace("'", "", $value);
    return $result;
}

function renderItemReceived($items){
   $beginStr = isset($_GET["begin"]) ? $_GET["begin"] : "";
   $endStr = isset($_GET["end"]) ? $_GET["end"] : "";

  $body .= "<div class='col s12 m8 l9'>

              <div class='row margin'>
                <form class='col s12' method='GET'>
                            

                <div class='row'>
                  <div class='input-field col s12'>                        
                      ".dateSelect("begin",$beginStr)."
                  </div>
                </div>

              

                <div class='row'>
                  <div class='input-field col s12'>
                    ".dateSelect("end",$endStr)."
                  </div>
                </div>


              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='itemreceived'>
                      <input type='hidden' name='entity' value='itemreceived'>
                      <input type='hidden' name='action' value='itemreceived'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";     

  if ($items != null)
  {
       $body .= "Total : ".count($items);
              
       
       

      foreach($items as $item)
      {
        $body .= "<table border='1'>";

        $body .=  
              "<tr>                            
              <td align='center'>".$item["VENDNAME"]."</td>                            
              <td align='center'>".$item["TRANDATE"]."</td>
              <td align='center'>".$item["BALANCE"]."</td>                            
              </tr>";         

        $body .= 
              "<tr>
                <td colspan='3'>
                <table>
                ";

          foreach($item["detail"] as $itemDetail)
          {
            $body .= "<tr>
                        <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$itemDetail["PRODUCTID"]."'></td> 
                        <td>".$itemDetail["PRODUCTID"]."</td>
                        <td>".$itemDetail["PRODUCTNAME"]."</td>
                        <td>".$itemDetail["PRODUCTNAME1"]."</td>
                        <td>".truncatePrice($itemDetail["TRANQTY"])."</td>
                        <td>".truncatePrice($itemDetail["CURRENCY_COST"])."</td>
                        <td>".truncatePrice($itemDetail["CURRENCY_AMOUNT"])."</td>
                      </tr>";
          }
          $body .="</table></td>
                </tr>
                ";          
          $body .= "</table><br><br>";
      }          
  }  
  else
      $body .= "<center>No Result</center>";
  return $body; 
}


function renderItemThrown($items) 
{
  $beginStr = isset($_GET["begin"]) ? $_GET["begin"] : "";
  $endStr = isset($_GET["end"]) ? $_GET["end"] : "";

  $body = ""; 


  $body .= "<div class='col s12 m8 l9'>

              <div class='row margin'>
                <form class='col s12' method='GET'>
                <div class='row'>
                  <div class='input-field col s12'>                   
                    
                  <textarea id='barcode' name='barcode'  value='".$barcode."' ></textarea>
                    <label for='barcode' class='center-align'>Barcode</label>               
                  </div>                  
                 </div>
                <div class='row'>
                  <div class='input-field col s12'>                        
                      ".dateSelect("begin",$beginStr)."
                  </div>
                </div>
                <div class='row'>
                  <div class='input-field col s12'>
                    ".dateSelect("end",$endStr)."
                  </div>
                </div>
              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='itemthrown'>
                      <input type='hidden' name='entity' value='itemthrown'>
                      <input type='hidden' name='action' value='itemthrown'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";     

  if ($items != null)
  {
       $body .= "Total : ".count($items);
              
       $body .= "
       <table border='1' id='resultTable'>
       <thead><tr>       
         <th>IMAGE</th> <th>BARCODE</th><th>LOCATION</th><th>Name</th><th>Name-KH</th>
         <th>COMMENT</th><th>QTY</th><th>Cumulated QTY</th><th>DATE</th>
       </tr></thead>

       <tfoot><tr>       
         <th>IMAGE</th> <th>BARCODE</th><th>LOCATION</th><th>Name</th><th>Name-KH</th>
         <th>COMMENT</th><th>QTY</th><th>Cumulated QTY</th><th>DATE</th>
       </tr></tfoot>

       </table>
       ";  

      foreach($items as $item)
      {
        $item["TRANQTY"] = truncatePrice($item["TRANQTY"] * -1);

        $dataSet .= "[
        '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
        '".$item["PRODUCTID"]."',
        \"".$item["LOCID"]."\",
        \"".$item["PRODUCTNAME"]."\",
        \"".$item["PRODUCTNAME1"]."\",
        \"".$item["REFERENCE"]."\",
        \"".$item["TRANQTY"]."\",
        \"".$item["THROWN"]."\",
        \"".$item["TRANDATE"]."\"
        ],";
      }
      $dataSet = rtrim($dataSet,",");
      $body .= "  
      <script>  
      var dataSet = [".$dataSet."]
      $(document).ready( function () {
        $('#resultTable').DataTable({                
            data:dataSet,         
            'lengthMenu':[50,100,-1]
          }
        );
      } );
      </script>
      ";
        /*
        $body .=  
              "<tr>
              <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>            
              <td>".$item["PRODUCTID"]."</td>
              <td align='center'>".$item["LOCID"]."</td>                            
              <td align='center'>".$item["PRODUCTNAME"]."</td>
              <td align='center'>".$item["PRODUCTNAME1"]."</td>
              <td align='center'>".$item["REFERENCE"]."</td>
              <td align='center'>".$item["TRANQTY"]."</td>                
              <td align='center'>".$item["TRANDATE"]."</td>          
              </tr>";             
          */
            
  } 
  else 
    $body .= "<center>No result</center><br>"; 


  return $body;
}

function percentConvert($number){

  if (strlen($number) == 0 || substr($number,0,3) == ".00")
    return "0%";
  if (strpos($number,".") === false)
    return $number."%";

  $str = explode('.',$number)[0];

  $str2 = substr(explode('.',$number)[1],0,2);
  return $str.".".$str2."%";
}


function renderItemSearch2($items) 
{

  $categories = getOrderedCategories();
  array_unshift($categories, "ALL");

  $defaultstart = date('Y-m-d', strtotime('-30 days'));
  $defaultend = date("Y-m-d");


  $category = isset($_GET["category"]) ? $_GET["category"] : "ALL";
  $thrownstart = isset($_GET["thrownstart"]) ? $_GET["thrownstart"] : $defaultstart;
  $thrownend = isset($_GET["thrownend"]) ? $_GET["thrownend"] :   $defaultend ;
  $sellstart = isset($_GET["sellstart"]) ? $_GET["sellstart"] : $defaultstart;
  $sellend = isset($_GET["sellend"]) ? $_GET["sellend"] :  $defaultend ;
  $zerosale = isset($_GET["zerosale"]) ? $_GET["zerosale"] : "";

  $body = "";  
  $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
              
                <div class='row'>
                    <div class='input-field col s12'>
                      ".elemSelect($categories,"category",12,$category)."
                   </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>                        
                        ".dateSelect("thrownstart",$thrownstart)."
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>
                      ".dateSelect("thrownend",$thrownend)."
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>                        
                        ".dateSelect("sellstart",$sellstart)."
                    </div>
                </div>
                
                <div class='row'>
                    <div class='input-field col s12'>
                      ".dateSelect("sellend",$sellend)."
                    </div>
                </div>

                 <div class='row'>
                    <div class='input-field col s12'>
                      ".elemSelect(array("YES","NO"),"zerosale",12,$zerosale)."
                    </div>
                </div>
                       
                <div class='row'>    
                       <div class='input-field col s12'>             
                        <input type='hidden' name='display' value='itemsearch2'>
                        <input type='hidden' name='entity' value='itemsearch2'>
                        <input type='hidden' name='action' value='itemsearch2'>
                        <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                       </div>
                </div>

                </form>
              </div>
            </div> 
              ";    
                    
    $body .= "<center>   
    <form target=_blank action='export.php' method='POST'>      
        <input type='submit' name='type' value='EXPORTALL'>
    </form><center>
    ";

    if ($items != null)
    {   
       $body .= "Total : ".count($items);        
       $body .= "
       <center>                 
       <form target=_blank action='export.php' method='POST'>      
        <input type='submit' name='type' value='EXPORT2'>
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th>
          <th>BARCODE</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Packing</th>
          <th>Vendor</th>
          <th>RCV</th>
          <th>TOTAL SOLD</th>
          <th>SOLD IN PERIOD</th>
          <th>THROWN</th> 
          <th>THROWN IN PERIOD</th> 
          <th>ON HAND</th> 
          <th>WH1</th> 
          <th>WH2</th> 
          <th>Category</th> 
          <th>COST</th>
          <th>AVG COST</th> 
          <th>LAST COST</th>
          <th>COST PROMO</th>
          <th>COST WITH PROMO</th>
          <th>PRICE</th>
          <th>PRICEPROMO</th>
          <th>PRICE WITH PROMO</th>
          <th>MARGIN</th>
          <th>MARGIN PERCENT</th>
          <th>LAST RCV</th>
          <th>LAST RCV QTY</th>
          <th></th>
        </tr></thead>
        <tfoot><tr>
           <th>Picture</th>
          <th>BARCODE</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Packing</th>
          <th>Vendor</th>
          <th>RCV</th>
          <th>TOTAL SOLD</th>
          <th>SOLD IN PERIOD</th>
          <th>THROWN</th> 
          <th>THROWN IN PERIOD</th> 
          <th>ON HAND</th> 
          <th>WH1</th> 
          <th>WH2</th> 
          <th>Category</th> 
          <th>COST</th>
          <th>AVG COST</th> 
          <th>LAST COST</th>
          <th>COST PROMO</th>

          <th>COST WITH PROMO</th>
          <th>PRICE</th>
          <th>PRICEPROMO</th>
          <th>PRICE WITH PROMO</th>
          <th>MARGIN</th>
          <th>MARGIN PERCENT</th>
          <th>LAST RCV</th>
          <th>LAST RCV QTY</th>
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

      $dataSet = "";
       foreach($items as $item)
       {

        $item["PRODUCTID"] = $item["BARCODE"];
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

        $item["TOTALTHROWN"] = truncatePrice($item["TOTALTHROWN"]);
        $item["THROWNINPERIOD"] = truncatePrice($item["THROWNINPERIOD"]);
        $item["AVGCOST"] = truncatePrice($item["AVGCOST"]);
        $item["LASTCOSTX"] = truncatePrice($item["LASTCOSTX"]);

        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);

        // ORDER IS IMPORTANT
        if ($item["LASTCOSTX"] == "")
          $item["LASTCOSTX"] = $item["LASTCOST"];
        if ($item["LASTCOSTX"] == "")
          $item["LASTCOSTX"] = 0;

        $item["COSTWITHPROMO"] =  truncatePrice($item["LASTCOST"] *  ( (100 -  $item["COSTPROMO"]) / 100)) ;      
        $item["PRICEWITHPROMO"] = truncatePrice($item["PRICE"] * ( (100 - $item["PRICEPROMO"]) / 100));

        $item["COSTPROMO"] = percentConvert($item["COSTPROMO"]);
        $item["PRICEPROMO"] = percentConvert($item["PRICEPROMO"]);

          
        
        $item["LASTRECEIVEQTY"] = truncatePrice($item["LASTRECEIVEQTY"]);

        $item["MARGIN"] =  $item["PRICEWITHPROMO"] - $item["COSTWITHPROMO"];
        if ($item["PRICEWITHPROMO"] != 0)
          $item["MARGINPERCENT"] = percentConvert(($item["MARGIN"] * 100) /  $item["PRICEWITHPROMO"]);
        else
          $item["MARGINPERCENT"] = "N/A";

         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',          
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",
          \"".$item["PACKINGNOTE"]."\",  
          \"".$item["VENDNAME"]."\",      
          '".$item["TOTALRECEIVE"]."',
          '".$item["TOTALSALE"]."',
          '".$item["SALEINPERIOD"]."',
          '".$item["TOTALTHROWN"]."',
          '".$item["THROWNINPERIOD"]."',
          '".$item["ONHAND"]."',
          '".$item["WH1"]."',
          '".$item["WH2"]."',
          '".$item["CATEGORYID"]."',
          '".$item["COST"]."',
          '".$item["AVGCOST"]."',
          '".$item["LASTCOSTX"]."',
          '".$item["COSTPROMO"]."',
          '".$item["COSTWITHPROMO"]."',
          '".$item["PRICE"]."',
          '".$item["PRICEPROMO"]."',
          '".$item["PRICEWITHPROMO"]."',
          '".$item["MARGIN"]."',
          '".$item["MARGINPERCENT"]."',
          '".$item["LASTRECEIVEDATE"]."',
          '".$item["LASTRECEIVEQTY"]."',
          
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");      
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({           
           data:dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }else{
      $body .= "<center><h4>No Results</h4></center><br><br><br>";
    }
  return $body;  


}

function renderTinyItemSearch($items)
{

   $barcode = isset($_GET["barcode"]) ? $_GET["barcode"] : "";
   
   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
                
                <div class='row'>
                  <div class='input-field col s12'>                   
                    
                  <textarea id='barcode' name='barcode'  >".$barcode."</textarea>
                    <label for='barcode' class='center-align'>Barcode</label>               
                  </div>
                 </div>
                          
                <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='tinyitemsearch'>
                      <input type='hidden' name='entity' value='tinyitemsearch'>
                      <input type='hidden' name='action' value='tinyitemsearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                   </div>
               </form>
              </div>
             </div> 
              ";                             
    if ($items != null)
    { 

       $body .= "Total : ".count($items);

       
       $body .= "
       <center>                 
       
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th>
          <th>ON HAND</th><th>COST</th><th>PRICE</th>         
        </tr></thead>
        <tfoot><tr>
           <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th>
          <th>ON HAND</th><th>COST</th><th>PRICE</th>    
        </tr></tfoot>
        </table>                    
      <br><br>";

       foreach($items as $item)
       {
        $item["PRODUCTID"] = $item["BARCODE"];
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

        if ($item["SALELAST30"] == "")
          $item["SALELAST30"] = "0";
         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',          
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",         
          '".$item["ONHAND"]."',          
          '".$item["COST"]."',
          '".$item["PRICE"]."'],";
        }
        $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }
  return $body;  
}

function renderItemSearch($items) 
{   
   $categories = getOrderedCategories();
   array_unshift($categories, "ALL");

   $countries = getCountries();
   array_unshift($countries, "ALL");

   $barcode = isset($_GET["barcode"]) ? $_GET["barcode"] : "";
   $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
   $category = isset($_GET["category"]) ? $_GET["category"] : "ALL";
   $vendorid = isset($_GET["vendorid"]) ? $_GET["vendorid"] : "";   
   $vendor = isset($_GET["vendor"]) ? $_GET["vendor"] : "";  
   $country = isset($_GET["country"]) ? $_GET["country"] : "ALL";

   $body = "";	
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
                <div class='row'>
	          			<div class='input-field col s12'>	            		  
	            		  
                  <textarea id='barcode' name='barcode'  >".$barcode."</textarea>
	            		  <label for='barcode' class='center-align'>Barcode</label>          			
			   			    </div>
		       		   </div>
					    
              <div class='row'>
	          			<div class='input-field col s12'>	            		  
	            		  <input id='keyword' name='keyword' type='text' value='".$keyword."' >
	            		  <label for='keyword' class='center-align'>Keyword</label>          			
			   			</div>
		       		</div>

		       		<div class='row'>
	          			<div class='input-field col s12'>
	            		  ".elemSelect($categories,"category",12,$category)."
			   			</div>
		       		</div>


              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='vendorid' name='vendorid' type='text' value='".$vendorid."'>
                    <label for='vendorid' class='center-align'>Vendor ID</label>               
                  </div>
              </div>  

		       		<div class='row'>
	          			<div class='input-field col s12'>	            		  
	            		  <input id='vendor' name='vendor' type='text' value='".$vendor."'>
	            		  <label for='vendor' class='center-align'>Vendor</label>          			
			   			    </div>
		       		</div>

		       		<div class='row'>
	          			<div class='input-field col s12'>
	            		  ".elemSelect($countries,"country",12,$country)."
			   			</div>
		       		</div>

		       		<div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='itemsearch'>
                      <input type='hidden' name='entity' value='itemsearch'>
                      <input type='hidden' name='action' value='itemsearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
        		</form>
              </div>
             </div> 
              ";                             
    if ($items != null)
    {	

       $body .= "Total : ".count($items);

       
    	 $body .= "
       <center>                 
       <form target=_blank action='export.php' method='POST'>    	 
        <input type='submit' name='type' value='POEXPORT'>
        <input type='submit' name='type' value='EXPORT'>
    	  <table border='1' id='resultTable'>
        <thead><tr>
  		  	<th>Picture</th><th>BARCODE</th><th>QTY</th><th>Name</th><th>Name-KH</th>
          <th>Packing</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>THROWN</th> 
          <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
  		  	<th>LAST COST</th><th>PRICE</th><th>SALE LAST 30</th><th>PERCENTSALE</th>
          <th>LAST RCV</th><th>LAST SALE</th><th></th>
  		  </tr></thead>
        <tfoot><tr>
          <th>Picture</th><th>BARCODE</th><th>QTY</th><th>Name</th><th>Name-KH</th>
          <th>Packing</th> <th>Vendor</th> <th>RCV</th><th>SOLD</th> <th>THROWN</th>
          <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
          <th>LAST COST</th><th>PRICE</th><th>SALE LAST 30</th><th>PERCENTSALE</th>
          <th>LAST RCV</th><th>LAST SALE</th><th></th>
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

       foreach($items as $item)
       {
        $item["PRODUCTID"] = $item["BARCODE"];
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

        $item["TOTALTHROWN"] = truncatePrice($item["TOTALTHROWN"]);
        $item["AVGCOST"] = truncatePrice($item["AVGCOST"]);
        $item["LASTCOST"] = truncatePrice($item["LASTCOST"]);
        if (floatval($item["TOTALRECEIVE"]) > 0.0){
          $item["PERCENTSALE"] = (floatval($item["TOTALSALE"]) * 100) / ( floatval($item["TOTALRECEIVE"]) );  
          $item["PERCENTSALE"] = truncatePrice($item["PERCENTSALE"]);
        }
        
        

        if ($item["SALELAST30"] == "")
          $item["SALELAST30"] = "0";
         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',          
          \"<input type='text' name='qty".$item["BARCODE"]."'>\",
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",
          \"".$item["PACKINGNOTE"]."\",  
          \"".$item["VENDNAME"]."\",      
          '".$item["TOTALRECEIVE"]."',
          '".$item["TOTALSALE"]."',
          '".$item["TOTALTHROWN"]."',
          '".$item["ONHAND"]."',
          '".$item["WH1"]."',
          '".$item["WH2"]."',
          '".$item["CATEGORYID"]."',
          '".$item["COLOR"]."',          
          '".$item["LASTCOST"]."',
          '".$item["PRICE"]."',
          '".$item["SALELAST30"]."',
          '".$item["PERCENTSALE"]."',
          '".$item["LASTRECEIVEDATE"]."',
          '".$item["LASTSALEDATE"]."',
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");    		
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }
	return $body;              
}


function renderBestSeller($items) // items
{          

  $beginStr = isset($_GET["begin"]) ? $_GET["begin"] : "";
  $endStr = isset($_GET["end"]) ? $_GET["end"] : "";

  $body = "";  
  $body .= "<div class='col s12 m8 l9'>
              
              <div class='row margin'>
                <form class='col s12' method='GET'>

                <div class='row'>
                  <div class='input-field col s12'>                        
                      ".dateSelect("begin",$beginStr)."
                  </div>
                </div>

              

                <div class='row'>
                  <div class='input-field col s12'>
                    ".dateSelect("end",$endStr)."
                  </div>
                </div>

                <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='bestseller'>
                      <input type='hidden' name='entity' value='bestseller'>
                      <input type='hidden' name='action' value='bestseller'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                </div>

               </form>
              </div>
             </div> 
              ";   

  if ($items != null)
  {    
    $body .= "<form target=_blank action='export.php' method='POST'>
              <center>                
                <input type='hidden' name='type' value='bestseller'>  
                <input type='submit' name='type' value='EXPORT'>
                 <input type='submit' name='type' value='EXPORTSELECT'>                                      
              </center>";                      
    $body .= "<table>

        <tr><th>EXP</th><th>Picture</th><th>Name</th><th>Barcode</th><th>Count</th><th>Price</th><th>Cost</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>WH1</th><th>WH2</th> <th>Category</th><th>COUNTRY</th></tr>";  

    foreach($items as $item)
    {          
          if ($item["DISCAMOUNT"] != null)
          {
              $amount = floatval($item["DISCAMOUNT"]);
              $numPrice = floatval($item["PRICE"]);
              $item["BEFORE"] = $numPrice + $amount;                  
          }
          else if ($item["DISCPERCENT"] != null)
          {
              $percent = floatval($item["DISCPERCENT"]);
              $numPrice = floatval($item["PRICE"]);
              $item["BEFORE"] = $numPrice * (1.0 + ($percent/100));
              
          } 
          else
            $item["BEFORE"] = "";     

        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);
        $item["TOTALSALE"] =  truncatePrice($item["TOTALSALE"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);


        $body .=  
                "<tr>     
                
                <td><input type='checkbox' name='b".$item["PRODUCTID"]."'></td>         
                <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'</td> 
                <td>".$item["PRODUCTNAME"]."</td>
                <td>".$item["PRODUCTID"]."</td>
                <td>".$item["COUNT"]."</td>
                <td>".$item["PRICE"]."</td> 
                <td>".$item["COST"]."</td> 
                <td>".$item["VENDNAME"]."</td>                              
                <td>".$item["TOTALRECEIVE"]."</td>
                <td>".$item["TOTALSALE"]."</td>
                <td>".$item["WH1"]."</td>
                <td>".$item["WH2"]."</td>
                <td>".$item["CATEGORYID"]."</td>
                <td>".$item["COLOR"]."
                    <input type='hidden' name='".$item["PRODUCTID"]."' value='".json_encode($item)."'>
                </td>
              </tr>";             
    }
    $body .= "</table></form><br>";
  }
  return $body;
  
}

function calculatePercent($receive,$sold)
{
  if ($receive == 0)
    return 0;
  return (($sold * 100) / $receive) ."%";
}

function renderSelection($items) // items
{          
   $body = "";    

  if ($items != null)
  {
    $body .= "<form target=_blank action='export.php' method='POST'>";
    $body .= "<center>
              <input type='hidden' name='type' value='selection'>              
              <input type='submit' value='EXPORT'>
              <center>";
    
    $body .= "<br>

        <table>
        <tr><th>Picture</th><th>Name</th><th>Barcode</th><th>Price</th><th>Cost</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>Percent Sale</th> <th>WH1</th><th>WH2</th> <th>Category</th><th>COUNTRY</th></tr>";  

    foreach($items as $item)
    {
          if ($item["DISCAMOUNT"] != null)
          {
              $amount = floatval($item["DISCAMOUNT"]);
              $numPrice = floatval($item["PRICE"]);
              $item["BEFORE"] = $numPrice + $amount;                  
          }
          else if ($item["DISCPERCENT"] != null)
          {
              $percent = floatval($item["DISCPERCENT"]);
              $numPrice = floatval($item["PRICE"]);
              $item["BEFORE"] = $numPrice * (1.0 + ($percent/100));   
          } 
          else
            $item["BEFORE"] = "";


        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);


        $body .=  
                "<tr>             
                <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'</td> 
                <td>".$item["PRODUCTNAME"]."</td>
                <td>".$item["PRODUCTID"]."</td>                
                <td>".$item["PRICE"]."</td> 
                <td>".$item["COST"]."</td> 
                <td>".$item["VENDNAME"]."</td>                              
                <td>".$item["TOTALRECEIVE"]."</td>
                <td>".$item["TOTALSALE"]."</td>
                <td>".$item["PERCENTSALE"]."</td>
                <td>".$item["WH1"]."</td>
                <td>".$item["WH2"]."</td>
                <td>".$item["CATEGORYID"]."</td>
                <td>".$item["COLOR"]."
                    <input type='hidden' name='".$item["PRODUCTID"]."' value='".json_encode($item)."'>
                </td>
              </tr>";             
    }
    $body .= "</table></form><br><br>";
  }
  return $body;
  
}


function renderItemSale($item) // count
{  
  $body = "";  
  $body .= "<div class='col s12 m8 l9'>
              
              <div class='row margin'>
                <form class='col s12' method='GET'>

                <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='barcode' name='barcode' type='text' >
                    <label for='barcode' class='center-align'>Barcode</label>               
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>                        
                      ".dateSelect("begin")."
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                    ".dateSelect("end")."
                  </div>
                </div>

                <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='itemsale'>
                      <input type='hidden' name='entity' value='itemsale'>
                      <input type='hidden' name='action' value='itemsale'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                </div>

               </form>
              </div>
             </div> 
              ";   

   if ($item != null){
    $body .= "<table><tr><th>Picture</th><th>Barcode</th><th>Name</th> <th>Count</th></tr>";  

    $body .= "<td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'</td>";
    $body .= "<td>".$item["PRODUCTID"]."</td>";
    $body .= "<td>".$item["PRODUCTNAME"]."</td>";
    $body .= "<td>".$item["COUNT"]."</td>";
    $body .= "</table>";    
   }
   return $body;
}

function renderPromotionTag()
{
	return "	
	<center>
  	<img height='200px' src='images/roundlogo.png' >
  	<br>
  	<h1 style='color:#009183'>PERCENTAGE GENERATOR</h1>  
	<table bgcolor='#009183' width='1000px' border='1'>
  	<tr>        
    <td width='50%' align='center'>
      <center><span style='color:white'>INPUT PERCENTAGE</span></center>
      <center>
      <form  action='http://phnompenhsuperstore.com/api/labelpercentage.php' target='_blank'>
        <input name='percent' style='width: 400px;text-align:center' ><br><br>        
        <input style='background-color:#ffed00;color:#009183' type='submit' value='GENERATE' />
      </form>
      </center>
    </td>
  	</tr>
  	<tr>
	</table>
	</center>";
}



function renderMyWaitingPO($data)
{
  $items = $data;
   $body = "Total : ".count($items);              
       $body .= "
       <table border='1' id='resultTable'>
       <thead><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>VENDNAME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></thead>
       <tfoot><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>VENDNAME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></tfoot>
       </table>       
       ";
       

      foreach($items as $item)
      {        
        $link = "<a href='?display=podetail&action=no&entity=podetail&ID=".$item["PONUMBER"]."'>".$item["PONUMBER"]."</a>";

        $dataSet .= "[          
          \"".$link."\",                    
          \"".$item["VENDID"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["DATEADD"]."\",
          \"".$item["USERADD"]."\"],";
      }
      $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>";
    return $body;
}


function  renderMyCompletedPO($data)
{
  $items = $data;
  $body = "Total : ".count($items);              
       $body .=  "<table border='1' id='resultTable'>
       <thead><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>VENDNAME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></thead>
       <tfoot><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>VENDNAME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></tfoot>
       </table>";

      foreach($items as $item)
      {        
        $link = "<a href='?display=podetail&action=no&entity=podetail&ID=".$item["PONUMBER"]."'>".$item["PONUMBER"]."</a>";

        $dataSet .= "[          
          \"".$link."\",                    
          \"".$item["VENDID"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["DATEADD"]."\",
          \"".$item["USERADD"]."\"],";
      }
      $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>";
    return $body;
}


function renderPODetail($data)
{
    $items = $data;

    $body = "<center><b>".$items[0]["PONUMBER"]. " "."</b> ".$items[0]["VENDID"]." <b>".$items[0]["VENDNAME"]."</b><br>".$items[0]["PHONE1"]." ".$items[0]["PHONE2"]."<br>";

    $body .= "Purchase Date: ".$items[0]["PURCHASE_DATE"]."</center>";
    $body .= "<table border='1' id='resultTable'>
               <thead>
               <tr>
                  <th>PICTURE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>ORDER_QTY</th><th>RECEIVE_QTY</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                  <th>PICTURE</th><th>PRODUCTID</th><th>PRODUCTNAME</th><th>ORDER_QTY</th><th>RECEIVE_QTY</th>
               </tr>
               </tbody>
              </table>  
       ";  
      foreach($items as $item)
      {        

          $dataSet .= "[
          '<img height=\"100px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["PRODUCTID"]."',          
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["ORDER_QTY"]."\",
          \"".$item["RECEIVE_QTY"]."\"],";       
      }
       $dataSet = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";  
   
    return $body;
}

function renderPOSearch($data)
{ 
  $usersPurchase = array("","PUTHEAVY","MEY","SODAVIN","PONLEU","SOVI"); 
  $usersEdit = array("","HAY SE","GECKMEY","VICHET","PUTHEAVY","MEY","SODAVIN","PONLEU","PHEARITH","SOVI");
  
   $userPurchase = isset($_GET["userpurchase"]) ? $_GET["userpurchase"] : "";
   $userEdit = isset($_GET["useredit"]) ? $_GET["useredit"] : "";
   $from = isset($_GET["from"]) ? $_GET["from"] : "1900-01-01";
   $to = isset($_GET["to"]) ? $_GET["to"] : "2999-01-01";
   $ponumber = isset($_GET["ponumber"]) ? $_GET["ponumber"] : "";
   

   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
              
              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='ponumber' name='ponumber' type='text' value='".$ponumber."'>
                    <label for='ponumber' class='center-align'>ponumber</label>               
                  </div>
              </div>
              

              <div class='row'>
                <div class='input-field col s12'>
                    ".elemSelect($usersPurchase,"userpurchase",12,$userPurchase)."
                </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($usersEdit,"useredit",12,$userEdit)."
                </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>               
                    ".dateSelect("from",$from)."
                </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>               
                    ".dateSelect("to",$to)."
                </div>
              </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='posearch'>
                      <input type='hidden' name='entity' value='posearch'>
                      <input type='hidden' name='action' value='posearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";                  

    $items = $data;
    if ($items != null)
    { 
       $body .= "Total : ".count($items);              
       $body .= "<table border='1'>
       <tr>
          <th>PONumber</th><th>VENDID</th><th>VENDNAME</th><th>DATEADD</th><th>USERADD</th><th>USEREDIT</th>
       </tr>";  

      foreach($items as $item)
      {        
        $body .=  
             "<tr>              
                <td align='center'><a href='?display=podetail&action=no&entity=podetail&ID=".$item["PONUMBER"]."'>".$item["PONUMBER"]."</a></td>
                <td align='center'>".$item["VENDID"]."</td>
                <td align='center'>".$item["VENDNAME"]."</td>
                <td align='center'>".$item["DATEADD"]."</td> 
                <td align='center'>".$item["USERADD"]."</td> 
                <td align='center'>".$item["USEREDIT"]."</td> 

            </tr>";             
      }
      $body .= "</table>";    
    }

  return $body;   
}


function renderMyReceivedPO($data)
{
  $items = $data;
  $body = "Total : ".count($items);              
       $body .= "<table border='1'>
       <tr>
          <th>ReceiveNumber</th><th>VENDNAME</th><th>DATEADD</th><th>USERADD</th>
       </tr>";  

      foreach($items as $item)
      {        
        $body .=  
             "<tr>              
                <td align='center'><a href='?display=receivedpodetail&action=no&entity=receivedpodetail&ID=".$item["RECEIVENO"]."'>".$item["RECEIVENO"]."</a></td>                
                <td align='center'>".$item["VENDNAME"]."</td>
                <td align='center'>".$item["DATEADD"]."</td> 
                <td align='center'>".$item["USERADD"]."</td>                 

            </tr>";             
      }
      $body .= "</table>";
    return $body;
}

function renderReceivedPODetail($data)
{
  $items = $data;  

    $body = "<center><b>".$items[0]["RECEIVENO"]."</b>".$items[0]["VENDNAME"]."</b><br>";
    $body = "<b>".$items[0]["USERADD"].":".$items[0]["PONUMBER"]."</b><br>";    
    $body .= "Receive Date: ".explode(' ',$items[0]["DATEADD"])[0]."</center>";

    $body .= "<table border='1'>
       <tr>
          <th>PICTURE</th><th>PRODUCTID</th><th>Name</th><th>NameKH</th><th>VAT_PERCENT</th> <th>PURCHASEDATE</th><th>ORDER_QTY</th> <th>RECEIVE QTY</th><th>UNIT PRICE</th><th>DISCOUNT</th><th>TOTAL COST</th>
       </tr>";  

      foreach($items as $item)
      {        
        $body .=  
             "<tr>
                <td align='center'><img height='100px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>                              
                <td align='center'>".$item["PRODUCTID"]."</td>
                <td align='center'>".$item["PRODUCTNAME"]."</td>
                <td align='center'>".$item["PRODUCTNAME1"]."</td>

                <td align='center'>".$item["VAT_PERCENT"]."</td>
                <td align='center'>".$item["PURCHASEDATE"]."</td>

          

                <td align='center'>".$item["QTY_ORDER"]."</td>                  
                <td align='center'>".$item["TRANQTY"]."</td>       

                <td align='center'>".$item["TRANCOST"]."</td>       
                <td align='center'>".$item["TRANDISC"]."</td>       

                <td align='center'>".$item["EXTCOST"]."</td>       




            </tr>";             
      }
      $body .= "</table><br><br>";
    return $body;
}


function renderReceivedPOSearch($data)
{ 
  $usersReceive = array("","GECKMEY","VICHET","HAY SE"); 
  
   $userReceive = isset($_GET["userreceive"]) ? $_GET["userreceive"] : "";     
   $from = isset($_GET["from"]) ? $_GET["from"] : "";
   $to = isset($_GET["to"]) ? $_GET["to"] : "";

   

   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
               

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($usersReceive,"userreceive",12,$userReceive)."
                </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>               
                    ".dateSelect("from",$from)."
                </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>               
                    ".dateSelect("to",$to)."
                </div>
              </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='receivedposearch'>
                      <input type='hidden' name='entity' value='receivedposearch'>
                      <input type='hidden' name='action' value='receivedposearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";                  

    $items = $data;
    if ($items != null)
    { 
       $body .= "Total : ".count($items);              
       $body .= "<table border='1'>
       <tr>
          <th>PONumber</th><th>VENDNAME</th><th>DATEADD</th><th>USER RECEIVE</th>
       </tr>";  

      foreach($items as $item)
      {        
        $body .=  
             "<tr>              
                <td align='center'><a href='?display=receivedpodetail&action=no&entity=receivedpodetail&ID=".$item["RECEIVENO"]."'>"
                .$item["RECEIVENO"]."</a></td>                
                <td align='center'>".$item["VENDNAME"]."</td>
                <td align='center'>".$item["DATEADD"]."</td> 
                <td align='center'>".$item["USERADD"]."</td>                 
            </tr>";             
      }
      $body .= "</table>";    
    }

  return $body;  
}


function renderPromotionList($items) // items
{
 $body = "";
  $body .= "
        <form target=_blank action='export.php' method='POST'>
          <center>
            <input type='hidden' name='type' value='fresh'>            
            <input type='submit' value='EXPORT'>
            <center><br>
            Total items : ".count($items)."<br>          
            <table border='1' id='resultTable'>
              <thead><tr>
                <th>Picture</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Discount</th>
                <th>Before</th>
                <th>Now</th>
                <th>From</th>
                <th>To</th>
                <th>Vendor</th>
                <th>RCV</th>
                <th>SOLD</th>
                <th>WH1</th>
                <th>WH2</th>
                <th>Category</th>
                <th>Country</th>
                <th></th>
              </tr></thead>
              
              <tfoot><tr>
                <th>Picture</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Discount</th>
                <th>Before</th>
                <th>Now</th>
                <th>From</th>
                <th>To</th>
                <th>Vendor</th>
                <th>RCV</th>
                <th>SOLD</th>
                <th>WH1</th>
                <th>WH2</th>
                <th>Category</th>
                <th>Country</th>
                <th></th>
              </tr></tfoot>              
            <table>
       </form>";  

  foreach($items as $item)
  {
        $item["DISCPERCENT"] = substr($item["DISCPERCENT"],0,5);
        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
              
 				if ($item["DISCAMOUNT"] != null)
        {
            $amount = floatval($item["DISCAMOUNT"]);
            $numPrice = floatval($item["PRICE"]);
            $item["BEFORE"] = $numPrice + $amount;    

            if ($item["DISCAMOUNTSTART"] != null)
            	$item["FROM"] = explode(' ',$item["DISCAMOUNTSTART"])[0];                        
            else
              $item["FROM"] = "";

            if ($item["DISCAMOUNTEND"] != null)              
              $item["TO"] = explode(' ',$item["DISCAMOUNTEND"])[0];
            else
                $TO = "";                
        }
        else if ($item["DISCPERCENT"] != null)
        {
            $percent = floatval($item["DISCPERCENT"]);
            $numPrice = floatval($item["PRICE"]);
            $item["BEFORE"] = $numPrice * (1.0 + ($percent/100));   


            if ($item["DISCPERCENTSTART"] != null)
                $item["FROM"] = explode(' ',$item["DISCPERCENTSTART"])[0];
            else
                $item["FROM"] = "";

            if ($item["DISCPERCENT"] != null)
                $item["TO"] = explode(' ',$item["DISCPERCENTEND"])[0];
            else
                $item["TO"] = "";                
        }	
        $i = "";
        $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
           '".$item["PRODUCTID"]."',                    
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["DISCPERCENT"]."\",
          \"".$item["BEFORE"]."\",  
          \"".$item["PRICE"]."\",      
          '".$item["FROM"]."',
          '".$item["TO"]."',
          \"".$item["VENDNAME"]."\",
          '".$item["TOTALRECEIVE"]."',
          '".$item["TOTALSALE"]."',
          '".$item["WH1"]."',
          '".$item["WH2"]."',
          '".$item["CATEGORYID"]."',
          '".$item["COLOR"]."',
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"
        ],"; 
    }
  $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";  
  return $body;
}


function renderTrombiDetail($data)
{
  $body = "";
  $body .= "<div align='center'>";
  $body .= "<img height='200px' src='".$data["image"]."'>";
  $body .= "<div style='font-size:20pt;'>".$data["role"]."</div>"; 
  $body .= "<div style='font-size:10pt;'>TEL : ".$data["phone"]."</div>"; 
  $body .= "<div style='font-size:10pt;'>".$data["companyEmail"]."</div>"; 
  $body .= "</div>";
  return $body;
}

function renderTrombi($data) // specific
{  
  $body = "";
  $body .= "
      <div align='center' class='row' >     
              <div class='col s12 m12 l12'>";
              
  $body .= "<table>";    
  $i = 0;        
  
  foreach($data as $user)
  {          
    if ($i % 6 == 0){
      $body .= "<tr>";
    }
    $body .=  "<td style='text-align:center'><a href='?display=trombidetail&entity=trombi&ID=".$user["ID"]."'><img width='132px' height='170px' src='".$user["image"]."'>
                <br>".$user["firstname"]."</a></td>";
    $i++;
    if ($i % 6 == 0){
      $body .= "</tr>";     
    }        
  }              
 $body .= "</table>";
  $body .= "  </div>                              
       </div><br>";       
  return $body;
}


function renderSupplierPurchaseOrders($data)
{

  $items = $data["purchaseorders"]; 
  $body = "";

  $body .= "<center>";  
  if ($data["image"] == "")
    $body .= "<img width='50px' height='50px' src='./images/notavailable.png'>";
  else 
    $body .= "<img src='".$data["image"]."'><br>";

  $body .= $data["ID"]."<br>";
  $body .= $data["name"]."<br>";
  if ($data["website"] != "")
    $body .= "<a href='".$data["website"]."'>".$data["website"]."</a><br>";
  $body .= $data["email"]."<br>";
  $body .= $data["phone"]."<br>";
  $body .= "Order Day:".$data["order_day"]."<br>"; 
  $body .= "VAT: " . $data["vat"]."<br>";
  $body .= "Discount: " . $data["discount"]."<br>";
  $body .= "Contract Type :".$data["contract_type"]."<br>";
  
  if ($data["note"] != "")
    $body .= "Note :". $data["note"];
  
  if ($items != null)
  {
      $body .= "Total : ".count($items);

       
       $body .= "<form target=_blank action='export.php' method='POST'>";
       $body .= "<center>                                
                 <input type='submit' name='type' value='EXPORT'>";                      
       $body .= "
       <table border='1' id='resultTable'>
       <thead>
       <tr>
          <th>PONUMBER</th>
          <th>PODATE</th>                    
          <th>POSTATUS</th>
          <th>EST ARRIVAL</th>      
          <th>DISC PERCENT</th>
          <th>CURRENCY_AMOUNT</th>
          <th>CURRENCY_VATAMOUNT</th>
          <th>USERADD</th>
          <th>DATEADD</th>                                      
       </tr>
       </thead>
       <tfoot>
       <tr>
          <th>PONUMBER</th>
          <th>PODATE</th>                    
          <th>POSTATUS</th>
          <th>EST_ARRIVAL</th>      
          <th>DISC_PERCENT</th>
          <th>CURRENCY_AMOUNT</th>
          <th>CURRENCY_VATAMOUNT</th>
          <th>USERADD</th>
          <th>DATEADD</th>
       </tr>
       </tfoot>
       </table>
       </form><br><br>";  

      foreach($items as $item)
      {
        
        $item["CURRENCY_AMOUNT"] = truncatePrice($item["CURRENCY_AMOUNT"]);
        $item["CURRENCY_VATAMOUNT"] = truncatePrice($item["CURRENCY_VATAMOUNT"]);
        
        $link = "<a href='?display=podetail&action=no&entity=podetail&ID=".$item["PONUMBER"]."'>".$item["PONUMBER"]."</a>";

        $dataSet = $dataSet .= "[              
        \"".$link."\",        
        \"".$item["PODATE"]."\",      
        \"".$item["POSTATUS"]."\",
        '".$item["EST_ARRIVAL"]."',
        '".$item["DISC_PERCENT"]."',
        '".$item["CURRENCY_AMOUNT"]."',
        '".$item["CURRENCY_VATAMOUNT"]."',
        '".$item["USERADD"]."',
        '".$item["DATEADD"]."'],";            
      }
        $dataSet = rtrim($dataSet,",");       
          $body .= "  
          <script>  
          var dataSet = [".$dataSet."];
          var table;        
          table =  $(document).ready( function () {
           $('#resultTable').DataTable({                
          data:
          dataSet, 
          'lengthMenu':[-1]
          });
        });
        </script>
      ";  
  }

  return $body;
}

function renderSupplierItems($data)
{
  $items = $data["items"];   
  $body = "";

  $body .= "<center>";  
  if ($data["image"] == "")
    $body .= "./images/notavailable.png";
  else 
    $body .= "<img src='".$data["image"]."'><br>";

  $body .= $data["ID"]."<br>";
  $body .= $data["name"]."<br>";
  if ($data["website"] != "")
    $body .= "<a href='".$data["website"]."'>".$data["website"]."</a><br>";
  $body .= $data["email"]."<br>";
  $body .= $data["phone"]."<br>";
  $body .= "Order Day:".$data["order_day"]."<br>"; 
  $body .= "VAT: " . $data["vat"]."<br>";
  $body .= "Discount: " . $data["discount"]."<br>";
  $body .= "Contract Type :".$data["contract_type"]."<br>";
  
  if ($data["note"] != "")
    $body .= "Note :". $data["note"];
  $body .= "<img src=''>";
  $body .= "</center><br>";

  if ($items != null)
  {
      $body .= "Total : ".count($items);

       
       $body .= "<form target=_blank action='export.php' method='POST'>";
       $body .= "<center>                                
                 <input type='submit' name='type' value='EXPORT'>";                      
       $body .= "
       <table border='1' id='resultTable'>
       <thead>
       <tr>
          <th>Picture</th>
          <th>BARCODE</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Vendor</th>
          <th>RCV</th>
          <th>SOLD</th>
          <th>ON HAND</th>
          <th>WH1</th>
          <th>WH2</th>
          <th>Category</th>
          <th>COUNTRY</th>
          <th>COST</th>
          <th>PRICE</th>
          <th>SALE LAST 30</th>
          <th>LAST RCV</th>
          <th>LAST SALE</th>
          <th></th>
       </tr>
       </thead>
       <tfoot>
       <tr>
          <th>Picture</th>
          <th>BARCODE</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Vendor</th>
          <th>RCV</th>
          <th>SOLD</th>
          <th>ON HAND</th>
          <th>WH1</th>
          <th>WH2</th>
          <th>Category</th>
          <th>COUNTRY</th>
          <th>COST</th>
          <th>PRICE</th>
          <th>SALE LAST 30</th>
          <th>LAST RCV</th>
          <th>LAST SALE</th>
          <th></th>
       </tr>
       </tfoot>
       </table>
       </form><br><br>";  

      foreach($items as $item)
      {
        
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

         
        $item["image"] = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
        

        if ($item["SALELAST30"] == "")
          $item["SALELAST30"] = "0";

        $dataSet = $dataSet .= "[        
        '<img width=\"50px\" src=\"".$item["image"]."\">',
        '".$item["BARCODE"]."',
        \"".$item["PRODUCTNAME"]."\",      
        \"".$item["PRODUCTNAME1"]."\",
        '".$item["VENDNAME"]."',
        '".$item["TOTALRECEIVE"]."',
        '".$item["TOTALSALE"]."',
        '".$item["ONHAND"]."',
        '".$item["WH1"]."',
        '".$item["WH2"]."',
        '".$item["CATEGORYID"]."',
        '".$item["COLOR"]."',
        '".$item["COST"]."',
        '".$item["PRICE"]."',
        '".$item["SALELAST30"]."',
        '".$item["LASTRECEIVEDATE"]."',
        '".$item["LASTSALEDATE"]."',
        \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
      }
        $dataSet = rtrim($dataSet,",");       
          $body .= "  
          <script>  
          var dataSet = [".$dataSet."];
          var table;        
          table =  $(document).ready( function () {
           $('#resultTable').DataTable({                
          data: ".$dataSet.", 
          'lengthMenu':[-1]
          });
        });
        </script>
      ";  
  }
  return $body;   
}

function renderSupplierList($data)
{  
  $body = "";
  $body .= "
      <div align='center' class='row' >     
          <div class='col s12 m12 l12'>";        
  $body .= "<table border='1' id='resultTable'>
            <thead>
            <tr>
                <th width='200px'>ORDER DAY</th> 
                <th>IMG</th>
                <th>VENDOR ID</th> 
                <th>VENDOR NAME</th>                  
                <th>LEAD TIME</th> 
                <th>PHONES</th>
                <th>CONTACTS</th>
                <th>VAT</th>
                <th>DISCOUNT</th>
                <th>TERM</th>
                <th>RETURN POLICY</th>
                <th>SPACE RENTAL</th>
                <th>PRODUCT LIST</th>
                <th>PO LIST</th>
                <th>YEAR SPENT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>ORDER DAY</th> 
                <th>IMG</th>
                <th>VENDOR ID</th> 
                <th>VENDOR NAME</th>                 
                <th>LEAD TIME</th> 
                <th>PHONES</th>
                <th>CONTACTS</th>
                <th>VAT</th>
                <th>DISCOUNT</th>
                <th>TERM</th>
                <th>RETURN POLICY</th>
                <th>SPACE RENTAL</th> 
                <th>PRODUCT LIST</th>
                <th>PO LIST</th>
                <th>YEAR SPENT</th>
            </tr>
            </tbody>
            </table>
          </div>                              
       </div><br>";    
  
  $dataSet = "";


  foreach($data as $supplier)
  {          
    if (file_exists("./images/suppliers/".$supplier["ID"].".png"))
      $supplier["image"] = "./images/suppliers/".$supplier["ID"].".png";
    else if (file_exists("./images/suppliers/".$supplier["ID"].".jpg"))
      $supplier["image"] = "./images/suppliers/".$supplier["ID"].".jpg";
    else 
      $supplier["image"] = "./images/notavailable.png";

    $supplier["amountspent"] = truncatePrice($supplier["amountspent"]);

    $dataSet = $dataSet .= "[
    \"".$supplier["orderday"]."\",
      '<img width=\"50px\" src=\"".$supplier["image"]."\">',
      '".$supplier["ID"]."',
      \"".$supplier["name"]."\",      
      \"".$supplier["leadtime"]."\",
      '".$supplier["phones"]."',
      '".$supplier["contacts"]."',
      '".$supplier["vat"]."',
      '".$supplier["discount"]."',
      '".$supplier["term"]."',
      '".$supplier["returnpolicy"]."',
      '".$supplier["spacerental"]."',
      '".$supplier["nbitem"]."<br><a href=\"?display=supplieritems&entity=supplieritems&ID=".$supplier["ID"]."\">ITEM LIST</a>',
      '".$supplier["nbpo"]."<br><a href=\"?display=supplierpurchaseorders&entity=supplierpurchaseorders&ID=".$supplier["ID"]."\">PO LIST</a>',
      '".$supplier["amountspent"]."' 
    ],";
  }
  $dataSet = rtrim($dataSet,",");
  $body .= "  
  <script>  
  var dataSet = [".$dataSet."];
  var table;
  $(document).ready( function () {


    table = $('#resultTable').DataTable({                
        data:dataSet,         
        'lengthMenu':[-1]
    });
    table.MakeCellsEditable(
        {
        'onUpdate': myCallbackFunction,
        'inputCss':'my-input-class',
        'columns': [0,3,4,5,6,7,8,9,10,11],
        'allowNulls': {            
            'errorClass': 'error'
        },
        'confirmationButton': 
        { // could also be true
            'confirmCss': 'my-confirm-class',
            'cancelCss': 'my-cancel-class'
        },
        'inputTypes': 
        [
            {
                'column': 0,
                'type': 'list',
                'options': [
                    { 'value': 'MONDAY', 'display': 'MONDAY' },
                    { 'value': 'TUESDAY', 'display': 'TUESDAY' },
                    { 'value': 'WEDNESDAY', 'display': 'WEDNESDAY' },
                    { 'value': 'THURSDAY', 'display': 'THURSDAY' },
                    { 'value': 'FRIDAY', 'display': 'FRIDAY' },
                    { 'value': 'SATURDAY', 'display': 'SATURDAY' },
                    { 'value': 'SUNDAY', 'display': 'SUNDAY' }
                ]
            },
            {
                'column':3, 
                'type': 'text',
                'options': null
            },
            {
                'column':4, 
                'type': 'text',
                'options': null
            },
            {
                'column':5, 
                'type': 'text',
                'options': null
            },
            {
                'column':6, 
                'type': 'text',
                'options': null
            },
            {
                'column': 7,
                'type': 'list',
                'options': [
                    { 'value': 'YES', 'display': 'YES' },
                    { 'value': 'NO', 'display': 'NO' }                    
                ]
            },
            {
                'column':8, 
                'type': 'text',
                'options': null
            },
            {
                'column':9, 
                'type': 'list',
                'options': [
                    { 'value': 'CREDIT', 'display': 'CREDIT' },
                    { 'value': 'CONSIGNEMENT', 'display': 'CONSIGNEMENT' }                    
                ]
            },
            {
                'column':10, 
                'type': 'text',
                'options': null
            },            
            {
                'column':11, 
                'type': 'text',
                'options': null
            }
         ]
    });

  });

  function myCallbackFunction (updatedCell, updatedRow, oldValue) 
  {
    var vendorid = JSON.stringify(updatedRow.data()).split(',')[2];   
    var form_data = new Object();

    if (updatedCell[0][0]['column'] == 0) 
      form_data['field'] = 'orderday';    
    else if (updatedCell[0][0]['column'] == 3) 
      form_data['field'] = 'vendorname';    
    else if (updatedCell[0][0]['column'] == 4) 
      form_data['field'] = 'leadtime';    
    else if (updatedCell[0][0]['column'] == 5) 
      form_data['field'] = 'phones';  
    else if (updatedCell[0][0]['column'] == 6)
      form_data['field'] = 'contacts';  
    else if (updatedCell[0][0]['column'] == 7) 
      form_data['field'] = 'vat';      
    else if (updatedCell[0][0]['column'] == 8)
      form_data['field'] = 'discount';     
    else if (updatedCell[0][0]['column'] == 9) 
      form_data['field'] = 'term';    
    else if (updatedCell[0][0]['column'] == 10)
      form_data['field'] = 'returnpolicy';    
    else if (updatedCell[0][0]['column'] == 11)
      form_data['field'] = 'spacerental';        

    form_data['value'] = updatedCell.data();
    var url = 'http://phnompenhsuperstore.com/api/intrapi.php/supplier/' + vendorid;
    var request_method = $(this).attr('method');     

    $.ajax({
      url : url,
      type: 'POST',
      data : JSON.stringify(form_data),
      dataType : 'json'
      }).done(function(response)
      {          
        if (response['result'] == 'OK'){
          alert('Update Success');       
        }else{
          alert('Error Updating');     
        } 
    });

    return true;
  }
  </script>
  ";
  return $body;
}



function renderSalaries($data)
{
 $body = "";
  $body .= "
      <div align='center' class='row' >     
              <div class='col s12 m12 l12'>";
              
  $body .= "<table>";    
  $i = 0;
  foreach($data as $user)
  {          
      $body .= "<tr>";
      $body .= "<td>".$user["USER"]["firstname"]."</td>";
      if ($user["SALARIES"] != null)
        $body .= "<td>".$user["SALARIES"][0]["amount"]."</td>";  
      else 
        $body .= "<td></td>";  
      $body .= "</tr>";      
  }              
 $body .= "</table>";

  $body .= "  </div>                              
       </div><br>";       

  return $body; 
}


function renderLabelWord()
{
  $body = "
            <center>
            <img height='200px' src='images/roundlogo.png' >
            <br>
            <h1 style='color:#009183'>FREE WORD GENERATOR</h1>  
           <table bgcolor='#009183' width='1000px' border='1'>
            <tr>    
              <td width='50%' >
              <center>
                <span style='color:white'>ENTER ANYTHING</span>
                <form  action='http://phnompenhsuperstore.com/api/labelword.php' method='GET' target='_blank'>
                  <textarea name='word' rows='4' cols='50' style='text-align:center;background-color:white'></textarea><br>                
                  <input style='background-color:#ffed00;color:green' type='submit' value='GENERATE' />
                </form>
              </center>
              </td>              
            </tr>
            <tr>
          </table>
          </center>
          ";
  return $body;
}

function renderLowProfit($data)
{
  if ($data == null)
      return "";
  $items = $data;

  $body = "<br><center><b><u>Total items : ".count($items)."</b></u><center><br>";
    
  $body .="
  <form target=_blank action='export.php' method='POST'>
      <center>
      <input type='hidden' name='type' value='lowprofit'>            
      <input type='submit' value='EXPORT'>
      <center><br>      

  <table border='1' id='resultTable'>
  <thead><tr>
    <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>PRICE</th>
    <th>COST</th><th>AVGCOST</th><th>PROFIT</th><th>Vendor</th><th>RCV</th>
    <th>SOLD</th> <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> 
    <th>COUNTRY</th><th>SALE LAST 30<th>LAST RCV</th><th>LAST SALE</th><th></th>    
  </tr></thead>
  <tfoot><tr>
    <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>PRICE</th>
    <th>COST</th><th>AVGCOST</th><th>PROFIT</th><th>Vendor</th><th>RCV</th>
    <th>SOLD</th> <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> 
    <th>COUNTRY</th><th>SALE LAST 30<th>LAST RCV</th><th>LAST SALE</th><th></th>    
  </tr></tfoot>
  </table>
  </form><br><br>";        

  foreach($items as $item)
  {
  if ($item["SALELAST30"] == "")
    $item["SALELAST30"] = "0";
  $item["PRICE"] = truncatePrice($item["PRICE"]);
  $item["COST"] = truncatePrice($item["COST"]);
  $item["AVGCOST"] = truncatePrice($item["AVGCOST"]);
  $profit = truncatePrice($item["PRICE"] - $item["AVGCOST"]);        
  $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
  $item["ONHAND"] = truncatePrice($item["ONHAND"]);
  $item["WH1"] = truncatePrice($item["WH1"]);
  $item["WH2"] = truncatePrice($item["WH2"]);

  $dataSet .= "[
  '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
  '".$item["PRODUCTID"]."',
  \"".$item["PRODUCTNAME"]."\",
  \"".$item["PRODUCTNAME1"]."\",
  '".$item["PRICE"]."',
  '".$item["COST"]."',
  '".$item["AVGCOST"]."',
  '".$profit."',
  \"".$item["VENDNAME"]."\",
  '".$item["TOTALRECEIVE"]."',
  '".$item["TOTALSALE"]."',
  '".$item["ONHAND"]."',
  '".$item["WH1"]."',
  '".$item["WH2"]."',
  '".$item["CATEGORYID"]."',
  '".$item["COLOR"]."',
  '".$item["SALELAST30"]."',
  '".$item["LASTRECEIVEDATE"]."',
  '".$item["LASTSALEDATE"]."',
  \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"
  ],";
  }
  $dataSet = rtrim($dataSet,",");
  $body .= "  
  <script>  
  var dataSet = [".$dataSet."]
  $(document).ready( function () {
  $('#resultTable').DataTable({                
  data:
  dataSet, 
  'order': [[ 7, \"asc\" ]],
  'lengthMenu':[-1]
  }
  );
  } );
  </script>
  ";
      
  return $body;  
}

function  renderCostZero($data)
{
  $body = "";
  $items = $data;

  $body .= "<br><center><b><u>Total items : ".count($items)."</b></u><center><br>";

  if ($items != null)
    {       
       $body .= 
       "<center>
          <form target=_blank action='export.php' method='POST'>    
          <input type='hidden' name='type' value='costzero'>                
          <input type='submit' value='EXPORT'><center>                      

       <table border='1' id='resultTable'>
       <thead><tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>PRICE</th>
          <th>COST</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>ON HAND</th> 
          <th>WH1</th><th>WH2</th><th>Category</th><th>COUNTRY</th><th>SALE LAST 30</th>
         <th>LAST RCV</th><th>LAST SALE</th><th></th>
       </tr></thead>
       <tfoot><tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>PRICE</th>
          <th>COST</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>ON HAND</th> 
          <th>WH1</th><th>WH2</th><th>Category</th><th>COUNTRY</th><th>SALE LAST 30</th>
          <th>LAST RCV</th><th>LAST SALE</th><th></th>
       </tr></tfoot>
       </table>
      </form><br><br>
       ";  

       
      foreach($items as $item)
      {            
        if (!isset($item["PRODUCTID"]))
          continue;
        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);

        $dataSet .= "[
        '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
        '".$item["PRODUCTID"]."',
        \"".$item["PRODUCTNAME"]."\",
        \"".$item["PRODUCTNAME1"]."\",
        '".$item["PRICE"]."',

        '".$item["COST"]."',
        '".$item["VENDNAME"]."',
        '".(isset($item["TOTALRECEIVE"]) ? $item["TOTALRECEIVE"] : "")."',
        \"".$item["TOTALSALE"]."\",        
        '".$item["ONHAND"]."',
        
        '".$item["WH1"]."',
        '".$item["WH2"]."',
        '".$item["CATEGORYID"]."',
        '".$item["COLOR"]."',
        '".$item["SALELAST30"]."',

        '".$item["LASTRECEIVEDATE"]."',
        '".$item["LASTSALEDATE"]."',
        \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"
        ],";
      }      
      $dataSet = rtrim($dataSet,",");
      $body .= "  
      <script>  
      var dataSet = [".$dataSet."]
      $(document).ready( function () {
      $('#resultTable').DataTable({                
      data:
      dataSet, 
      'lengthMenu':[-1]
      }
      );
      } );
      </script>
      ";  
  } 
  return $body;  
}



function renderItemUpdate($items)
{  

  $categories = getOrderedCategories();
   array_unshift($categories, "ALL");

   $countries = getCountries();
   array_unshift($countries, "ALL");

   $barcode = isset($_GET["barcode"]) ? $_GET["barcode"] : "";
   $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
   $category = isset($_GET["category"]) ? $_GET["category"] : "ALL";
   $vendorid = isset($_GET["vendorid"]) ? $_GET["vendorid"] : "";   
   $vendor = isset($_GET["vendor"]) ? $_GET["vendor"] : "";  
   $country = isset($_GET["country"]) ? $_GET["country"] : "ALL";

   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
                <div class='row'>
                  <div class='input-field col s12'>                   
                    
                  <textarea id='barcode' name='barcode'>".$barcode."</textarea>
                    <label for='barcode' class='center-align'>Barcode</label>               
                  </div>
                 </div>
              
              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='keyword' name='keyword' type='text' value='".$keyword."' >
                    <label for='keyword' class='center-align'>Keyword</label>               
              </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($categories,"category",12,$category)."
              </div>
              </div>


              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='vendorid' name='vendorid' type='text' value='".$vendorid."'>
                    <label for='vendorid' class='center-align'>Vendor ID</label>               
                  </div>
              </div>  

              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='vendor' name='vendor' type='text' value='".$vendor."'>
                    <label for='vendor' class='center-align'>Vendor</label>               
                  </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($countries,"country",12,$country)."
              </div>
              </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='itemupdate'>
                      <input type='hidden' name='entity' value='itemupdate'>
                      <input type='hidden' name='action' value='itemupdate'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";                             
    if ($items != null)
    { 

       $body .= "Total : ".count($items);

       
       $body .= "
       <center>                 
       <form target=_blank action='export.php' method='POST'>      
        <input type='submit' name='type' value='POEXPORT'>
        <input type='submit' name='type' value='EXPORT'>
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th><th>BARCODE</th><th>QTY</th><th width='200px'>Name</th><th>Name-KH</th>
          <th>Packing Note</th><th>Vendor</th><th>RCV</th><th>SOLD</th><th>THROWN</th> 
          <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
          <th>COST</th><th>AVG COST</th> <th>LAST COST</th><th>PRICE</th><th>SALE LAST 30</th>
          <th>LAST RCV</th><th>LAST SALE</th><th></th>
        </tr></thead>
        <tfoot><tr>
          <th>Picture</th><th>BARCODE</th><th>QTY</th><th width='200px'>Name</th><th>Name-KH</th>
          <th>Packing Note</th> <th>Vendor</th> <th>RCV</th><th>SOLD</th> <th>THROWN</th>
          <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
          <th>COST</th><th>AVG COST</th> <th>LAST COST</th><th>PRICE</th><th>SALE LAST 30</th>
          <th>LAST RCV</th><th>LAST SALE</th><th></th>
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

       foreach($items as $item)
       {
        $item["PRODUCTID"] = $item["BARCODE"];
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

        $item["THROWN"] = truncatePrice($item["THROWN"]);
        $item["AVGCOST"] = truncatePrice($item["AVGCOST"]);
        $item["LASTCOST"] = truncatePrice($item["LASTCOST"]);

        if ($item["SALELAST30"] == "")
          $item["SALELAST30"] = "0";
         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["BARCODE"]."',          
          \"<input type='text' name='qty".$item["BARCODE"]."'>\",
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",
          \"".$item["PACKINGNOTE"]."\",  
          \"".$item["VENDNAME"]."\",      
          '".$item["TOTALRECEIVE"]."',
          '".$item["TOTALSALE"]."',
          '".$item["TOTALTHROWN"]."',
          '".$item["ONHAND"]."',
          '".$item["WH1"]."',
          '".$item["WH2"]."',
          '".$item["CATEGORYID"]."',
          '".$item["COLOR"]."',
          '".$item["COST"]."',
          '".$item["AVGCOST"]."',
          '".$item["LASTCOST"]."',
          '".$item["PRICE"]."',
          '".$item["SALELAST30"]."',
          '".$item["LASTRECEIVEDATE"]."',
          '".$item["LASTSALEDATE"]."',
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");   

        $categoryListJS = getCategoryListJS();    
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        $(document).ready( function () {
     
         table = $('#resultTable').DataTable({                
          data:
          dataSet, 
          'lengthMenu':[-1]
         });

        table.MakeCellsEditable(
        {
        'onUpdate': myCallbackFunction,
        'inputCss':'my-input-class',
        'columns': [3,4,5,13],
        'allowNulls': {            
            'errorClass': 'error'
        },
        'confirmationButton': 
        { // could also be true
            'confirmCss': 'my-confirm-class',
            'cancelCss': 'my-cancel-class'
        },
        'inputTypes': 
        [            
            {
                'column':3, 
                'type': 'text',
                'options': null
            },
            {
                'column':13, 
                'type': 'list',
                'options': [".$categoryListJS."]
                
            }
         ]
    });


        });

    function myCallbackFunction (updatedCell, updatedRow, oldValue) 
    {
      var productid = JSON.stringify(updatedRow.data()).split(',')[1];   
      productid = productid.substr(1,productid.length -2);
      var form_data = new Object();

      if (updatedCell[0][0]['column'] == 3) 
        form_data['field'] = 'PRODUCTNAME';  
      else if(updatedCell[0][0]['column'] == 4)
        form_data['field'] = 'PRODUCTNAME1';
      else if(updatedCell[0][0]['column'] == 5)
         form_data['field'] = 'PACKINGNOTE';
      else if (updatedCell[0][0]['column'] == 13) 
        form_data['field'] = 'CATEGORY';    
      

      form_data['value'] = updatedCell.data();


      var url = 'http://phnompenhsuperstore.com/api/api.php/itemupdate/' + productid;
      var request_method = $(this).attr('method');     

      $.ajax({
        url : url,
        type: 'POST',
        data : JSON.stringify(form_data),
        dataType : 'json'
        }).done(function(response)
        {          
          alert(response['result']);
          if (response['result'] == 'OK'){
            alert('Update Success');       
          }else{
            alert('Error Updating');     
          } 
      });

      return true;
    }
    </script>
    ";   
    }
  

  return $body;
}

function renderFreshSales($items)
{   
   $day = isset($_GET["day"]) ? $_GET["day"] : ""; 
   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
            <form>
              <div class='row'>
                  <div class='input-field col s12'>                        
                      ".dateSelect("day",$day)."
                  </div>
              </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='freshsales'>
                      <input type='hidden' name='entity' value='freshsales'>
                      <input type='hidden' name='action' value='freshsales'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";                  

    if ($items != null)
    {
       
       $body .= "<center>
                 <form target=_blank action='export.php' method='POST'>    
                 <input type='hidden' name='type' value='fresh'>                 
                 <input type='submit' value='EXPORT'><center>";                      
       $body .= "<table border='1'>
       <tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>Vendor</th><th>RCV</th><th>SOLD</th> <th>ON HAND</th> <th>WH1</th> <th>WH2</th> <th>Category</th> <th>COUNTRY</th>
            <th>COST</th><th>PRICE</th><th>LAST RCV</th>
       </tr>";  

      foreach($items as $item)
      {
        if ($item["TOTALRECEIVE"] ==  $item["TOTALSALE"] + $item["WH1"] + $item["WH2"])
          $color = "#98FB98";
        else
          $color = "";

        if (substr($item["WH1"],0,1) == '.')
          $colorWH1 = "red";
        else if (substr($item["WH1"],0,2) == '1.' || substr($item["WH1"],0,2) == '2.')
          $colorWH1 = "yellow";
        else 
          $colorWH1 = "black";


        if (substr($item["ONHAND"],0,1) == '.')
          $colorOH = "red";
        else if (substr($item["ONHAND"],0,2) == '1.' || substr($item["ONHAND"],0,2) == '2.')
          $colorOH = "yellow";
        else 
          $colorOH = "black";

        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);

        if ($item["SALELAST30"] == "")
          $item["SALELAST30"] = "0";
        $body .=  "<tr bgcolor='$color'>

              <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'</td> 
              <td>".$item["BARCODE"]."</td>
              
              <td align='center'>".$item["PRODUCTNAME"]."</td>
              <td align='center'>".$item["PRODUCTNAME1"]."</td>
              <td align='center'>".$item["VENDNAME"]."</td>
              <td align='center'>".$item["TOTALRECEIVE"]."</td>
              <td align='center'>".$item["TOTALSALE"]."</td>
              <td align='center'><span style='color:".$colorOH."'>".$item["ONHAND"]."</span></td>
              <td align='center'><span style='color:".$colorWH1."'>".$item["WH1"]."</span></td>
              <td align='center'>".$item["WH2"]."</td>
              <td align='center'>".$item["CATEGORYID"]."</td>
              <td align='center'>".$item["COLOR"]."</td>
              <td align='center'>".$item["COST"]."</td>
              <td align='center'>".$item["PRICE"]."</td>              
              <td align='center'>".$item["LASTRECEIVEDATE"]."
                <input type='hidden' name='".$item["BARCODE"]."' value='".json_encode($item)."'>
              </td>                          
            </tr>";             
      }
      $body .= "</table>";
      $body .= "</form>";     
    }
  return $body;   
}


function renderAdjustedItem($items)
{   
  $storebin = isset($_GET["storebin"]) ? $_GET["storebin"] : "";
  $author = isset($_GET["author"]) ? $_GET["author"] : "";
  $location = isset($_GET["location"]) ? $_GET["location"] : "";
  $date = isset($_GET["date"]) ? $_GET["date"] : " ";
  if ($date == "")
    $date = " ";   
  $body = "";    
     
  $body .= "
  <center>
        <form>".dateSelect("date",$date).              
        "<div class='row'>
            <div class='input-field col s12'>                   
              <input id='storebin' name='storebin' type='text' value='".$storebin."'>
              <label for='storebin' class='center-align'>storebin</label>               
            </div>
        </div>  

        <div class='row'>
            <div class='input-field col s12'>                   
              <input id='location' name='location' type='text' value='".$location."'>
              <label for='location' class='center-align'>location</label>               
            </div>
        </div>  

        <div class='row'>
            <div class='input-field col s12'>                   
              <input id='author' name='author' type='text' value='".$author."'>
              <label for='author' class='center-align'>author</label>               
            </div>
        </div> 
         <input type='hidden' name='display' value='adjusteditems'>
         <input type='hidden' name='entity' value='adjusteditems'>
         <input type='hidden' name='action' value='adjusteditems'>
        <input type='submit' value='FILTER'>              
        </form>";  

    $body .= "<br><center><b><u>Total items : ".count($items)."</b></u><center><br>";

    $body .="
        <form target=_blank action='http://phnompenhsuperstore.com/intra/export.php' method='POST'>    
          <input type='hidden' name='type' value='adjusteditems'>                 
          <input type='submit' value='EXPORT'><center>

          <table border='1' id='resultTable'>
             <thead><tr>
                <th>barcode</th><th>name</th><th>Old Qty</th><th>New Qty</th><th>location</th>
                <th>storebin</th><th>cost</th><th>Difference</th><th>To Adjust</th> <th>date</th>
                <th>author</th><th></th>
             </tr></thead>
             <tfoot><tr>
                <th>barcode</th><th>name</th><th>Old Qty</th><th>New Qty</th><th>location</th>
                <th>storebin</th><th>cost</th><th>Difference</th><th>To Adjust</th> <th>date</th>
                <th>author</th><th></th>
             </tr></tfoot>
          </table>
        </form><br><br>";
       

    $total = 0;
    $count = 0;
    foreach($items as $item)
    {
      $item["difference"] = floatval($item["newqty"]) - floatval($item["oldqty"])  ;     
      $item["toadjust"] = floatval($item["cost"]) * floatval($item["difference"]);      
      $item["PRODUCTID"] = $item["barcode"];
      $item["date"] = date('d/m/Y H:i:s',$item["date"]);

      $dataSet .= "[        
        '".$item["PRODUCTID"]."',
        \"".$item["name"]."\",
        \"".$item["oldqty"]."\",
        '".$item["newqty"]."',
        '".$item["location"]."',
        '".$item["storebin"]."',        
        \"".$item["cost"]."\",
        '".(($item["difference"] > 0) ? "+" : "").$item["difference"]."',
        '".(($item["toadjust"] > 0) ? "+" : "").$item["toadjust"]."',
        '".$item["date"]."',
        '".$item["author"]."',
        \"<input type='hidden' name='".$item["barcode"]."_".rand()."' value='".escapeJS(json_encode($item))."')>\"
        ],";      
      $total += $item["toadjust"];   
      $count++;     
      /*
      $body .=  
           "<tr align='center'>                            
            <td align='center'>".$item["PRODUCTID"]."</td>
            <td align='center'>".$item["name"]."</td>
            <td align='center'>".$item["oldqty"]."</td>
            <td align='center'>".$item["newqty"]."</td>
            <td align='center'>".$item["location"]."</td>            
            <td align='center'>".$item["storebin"]."</td>
            <td align='center'>$ ".$item["cost"]."</td>
            <td align='center'>". (($item["difference"] > 0) ? "+" : "").$item["difference"]."</td>
            <td align='center'>$ ".(($item["toadjust"] > 0) ? "+" : "").$item["toadjust"]."</td>
            <td align='center'>".$item["date"]."</td>            
            <td align='center'>".$item["author"].
              "<input type='hidden' name='".$item["barcode"]."_".rand()."' value='".json_encode($item)."'>
            </td>                                            
          </tr>";  
          
          
      */     
    }
    $dataSet = rtrim($dataSet,",");
    $body .= "  
    <script>  
    var dataSet = [".$dataSet."]
    $(document).ready( function () {
    $('#resultTable').DataTable({                
    data:
    dataSet, 
    'lengthMenu':[-1]
    }
    );
    } );
    </script>
    ";
    $body .= "<center>COUNT :".$count."| AMT: ".$total."</center>";
    $body .= "<br><br>";       
    return $body;  
}
         
function renderPriceCalculator($data)
{
  $categories = getOrderedCategories();
  
  $category = isset($_GET["category"]) ? $_GET["category"] : "";
  $cost = isset($_GET["cost"]) ? $_GET["cost"] : "";

  $body = "<center><u>Single Items</u></center>";             
  $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
                            
                <div class='row'>
                  <div class='input-field col s12'>                   
                      <input id='cost' name='cost' type='text' value=".$cost." >
                      <label for='cost' class='center-align'>Cost</label>               
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                      ".elemSelect($categories,"category",12,$category)."
                  </div>
                </div>

                <div class='row'>    
                  <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='pricecalculator'>
                      <input type='hidden' name='entity' value='pricecalculator'>
                      <input type='hidden' name='action' value='pricecalculator'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                    </div>
                  </div>
                </form>
              </div>
             </div>"; 

  if($data != null && isset($data["MIN"]))
  {

    
      $priceMin = $cost + $data["MIN"];
      $priceAvg = $cost + $data["AVG"];
      $priceMax = $cost + $data["MAX"];  
      $body .= "<center>COST: $".$cost."<center><br>";
      $body .= "<table >";    
      $body .= "<tr><th style='text-align:center'>Price Minimum (Class ".$data["CLASSMIN"].")</th><th style='text-align:center'>Price Average (Class ".$data["CLASSAVG"].")</th><th style='text-align:center'>Price Maximum (Class ".$data["CLASSMAX"].")</th></tr>";
      $body .= "<tr><td style='text-align:center' bgcolor='yellow'>$".$priceMin." (+".$data["MIN"].")</td><td style='text-align:center' bgcolor='green'>$".$priceAvg." (+".$data["AVG"].")</td><td style='text-align:center' bgcolor='orange'>$".$priceMax." (+".$data["MAX"].")</td></tr>";    
      $body .= "</table>";
  }

  $body .= "<center><a href='templates/PRICE_CALCULATE_TEMPLATE.xlsx'><u>Download Template</u></a></center><br>";               
  

  $body .= "<center><u>Multiple Items</u></center>";             
  $body .= "<div class='input-field col s12'>
              <div class='row'>    
                  <div class='input-field col s12'>";             


  $body .= " <form class='col s12' method='POST' enctype='multipart/form-data'>";
  $body .= "<center><input type='file' name='file'></center>";
  $body .=  "<input type='submit' class='btn waves-effect waves-light 
              col s12 grey darken-2' value='SHOW'>
             </form>";
  $body .= "       </div>
              </div>
            </div>";

  if($data != null && isset($data["MIN"]) == false)
  {
      $body .= "<center><form action='export.php' method='POST'>                     
                  <input type='hidden' name='items' value='".json_encode($data)."'>
                  <input type='hidden' name='type' value='pricecalculator'>
                  <input type='submit' value='EXPORT'>
              </form><center>";
        $body .= "<table>
        <tr><th>BARCODE</th><th>NAME-EN</th><th>NAME-KH</th><th>COST</th>
        <th>CATEGORY</th><th>MIN</th><th>AVG</th><th>MAX</th>";
        

        foreach($data as $item){
          $costMin = $item["COST"] + $item["MIN"];
          $costAvg = $item["COST"] + $item["AVG"];
          $costMax = $item["COST"] + $item["MAX"];

          $body .= "<tr>";
          $body .= "<td>".$item["BARCODE"]."</td>";
          $body .= "<td>".$item["NAME-EN"]."</td>";
          $body .= "<td>".$item["NAME-KH"]."</td>";
          $body .= "<td>".$item["COST"]."</td>";
          $body .= "<td>".$item["CATEGORY"]."</td>";
          $body .= "<td>".$costMin."(+".$item["MIN"].")</td>";
          $body .= "<td>".$costAvg."(+".$item["AVG"].")</td>";
          $body .= "<td>".$costMax."(+".$item["MAX"].")</td>";
          $body .= "</tr>";         
        }  
        $body .= "</table><br><br>";                                
  }
  return $body;
}

function renderAllWaitingPo($data)
{
  $items = $data;
  $body = "Total : ".count($items);              
       $body .=  "<table border='1' id='resultTable'>
       <thead><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>PHONE</th>
          <th>VENDNAME</th>
          <th>WAIT TIME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></thead>
       <tfoot><tr>       
          <th>PONumber</th>
          <th>VENDID</th>
          <th>PHONE</th>
          <th>VENDNAME</th>
          <th>WAIT TIME</th>
          <th>DATEADD</th>
          <th>USERADD</th>
       </tr></tfoot>
       </table>";


      foreach($items as $item)
      {      
                        
        $date = new DateTime(explode(' ',$item["DATEADD"])[0]);
        $now = new DateTime("now");
        $diff = $date->diff($now)->format("%a");
                
        $link = "<a href='?display=podetail&action=no&entity=podetail&ID=".$item["PONUMBER"]."'>".$item["PONUMBER"]."</a>";

        $dataSet .= "[          
          \"".$link."\",                    
          \"".$item["VENDID"]."\",
          \"".$item["PHONE1"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$diff."\",
          \"".$item["DATEADD"]."\",
          \"".$item["USERADD"]."\"],";
      }
      $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet,         
        'lengthMenu':[-1]
        });
      });
      </script>";
    return $body;
}
        

function renderBarcodeGenerator($data)
{
  $body = "";
  $body .= "
      <div align='center' class='row' >     
              <div class='col s12 m12 l12'>";
              
  $body .= "<table>";          
  $body .= "<tr>";
  $body .=  "<th style='text-align:center'>SECTION</th>";
  $body .=  "<th style='text-align:center'>DEPARTMENT</th>";
  $body .=  "<th style='text-align:center'>CATEGORY</th>";
  $body .=  "<th style='text-align:center'>BARCODE</th>";
  $body .= "</tr>";   

  $apiURL = "http://phnompenhsuperstore.com/api/api.php/barcode";
  $count = 0;

  $sectionsC["FRESH"] = "#006600";
  $sectionsC["DRY GROCERY"] = "#660000";
  $sectionsC["FROZEN"] = "#000066";
  $sectionsC["NON-FOOD"] = "#663300";

  $departmentC["FRESH"] = "#00CC00";
  $departmentC["DRY GROCERY"] = "#FF3333";
  $departmentC["FROZEN"] = "#0066CC";
  $departmentC["NON-FOOD"] = "#FF8000";

  $categoryC["FRESH"] = "#59d474";
  $categoryC["DRY GROCERY"] = "#FF9999";
  $categoryC["FROZEN"] = "#66B2ff";
  $categoryC["NON-FOOD"] = "#FFCC99";  

  $bans = array("POULTRY","PORK","BEEF","FISH","SEAFOOD","GIBLETS","EGGS");

  foreach($data as $category)
  {             
    $categoryname = urlencode($category["CATEGORYNAME"]);
    $body .= "<tr>";    
    $body .= "<td bgcolor='".$sectionsC[$category["SECTIONNAME"]]."' style='color:white'>".$category["SECTIONNAME"]."</td>";
    $body .= "<td bgcolor='".$departmentC[$category["SECTIONNAME"]]."' style='color:white'>".$category["DEPARTMENTNAME"]."</td>";
    $body .= "<td bgcolor='".$categoryC[$category["SECTIONNAME"]]."' style='color:white'>".$category["CATEGORYNAME"]."</td>";
    $body .= "";    
    if (in_array($category["CATEGORYNAME"],$bans))
    {
      $body .= "<td bgcolor='red'></td>";

    }
    else 
    {
    $body .= "<td><center><span id='barcode_".$count."'></span><center><br>
                  <form action=".$apiURL."/".$categoryname." method='POST' id='form_".$count."'>
                  <input type='submit' value='Load'>
                  </form>
                   <script type='text/javascript'>           
                    $('#form_".$count."').submit(function(event){                    
                        event.preventDefault(); 
                        
                        var post_url = $(this).attr('action'); 
                        var request_method = $(this).attr('method'); 
                        $.ajax({
                          url : post_url,
                          type: request_method,
                          dataType : 'json'}).
                        done(function(response){                                    
                              $('#barcode_".$count."').html(response['BARCODES']);                            
                      });  
                    });       
                  </script></td>";
    }
    $body .= "</tr>";  
    $count++;       
  }              
  $body .= "</table>";

  $body .= "  </div>                              
       </div><br>";  
  return $body;   
}

function renderCustomBarcodeList($items)
{

    if ($items != null)
    { 
       $body = "Total : ".count($items);
          
       $body .= "<table border='1'>
       <tr>
          <th>Picture</th><th>BARCODE</th><th>Name</th><th>Name-KH</th><th>COST</th><th>PRICE</th>
       </tr>";  

      foreach($items as $item)
      {
        
        $item["COST"] = truncatePrice($item["COST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $body .=  
              "<tr>
                <td><img height='50px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."'></td>  
                <td>".$item["BARCODE"]."</td>
                <td align='center'>".$item["PRODUCTNAME"]."</td>
                <td align='center'>".$item["PRODUCTNAME1"]."</td>              
                <td align='center'>".$item["COST"]."</td>
                <td align='center'>".$item["PRICE"]."</td>                                  
              </tr>";             
      }
      $body .= "</table>";    
    }

  return $body; 
}



// KPI 

function SaleByCategory($data)
{

}

function SaleByRow($data)
{

}

// KPI

function renderUpdateItem()
{
  
}

function renderDownloadApp() // specific
{  
  $body = "<center>IN PROGRESS<center>";
  return $body;
}


function renderLeaflet()
{
  $body = "<center>IN PROGRESS<center>";
  return $body;
}

function renderRestDay($data) // specific
{
  $body = "<center>IN PROGRESS<center>";
  return $body;
}

function renderRestDayList($data)
{
  $body = "<center>IN PROGRESS<center>";
  return $body;
}


function renderShelfRental() 
{
  $body = "IN PROGRESS";
  return $body;
}

function renderBank($data)
{
    $sum = 0;
   $body .= "<table border='1'>
       <tr>
          <th width='100px'>Name</th><th>Amount</th>
       </tr>";  

      foreach($data as $bankitem)
      {         
        $amount = $bankitem["DEBIT"] - $bankitem["CREDIT"];
        $sum += $amount; 
        $body .=  
             "<tr>               
                <td >".$bankitem["NAMEENG"]."</td>
                <td >".$amount."</td>            
              </tr>";              
      }
      $body .= "</table><br>
      Total : $".$sum."
      <br>";

  return $body;
}


/**********************/
/**** ItemRequest ****/

function renderItemRequestActionList($data){
  $items = $data;
  $status = $_GET["status"];

   $body = "<div >";   
   $body .=   "<table border='1' id='result'>
               <thead><tr>
                  <th>DETAILS</th>                                
                  <th>ID</th>
                  <th>TYPE</th> 
                  <th>REQUEST_TIME</th>
                  <th>REQUESTER</th>
                  <th>REQUESTEE</th>                  
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>                                
                  <th>ID</th>
                  <th>TYPE</th> 
                  <th>REQUEST_TIME</th>
                  <th>REQUESTER</th>
                  <th>REQUESTEE</th> 
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";
    

    foreach($items as $item)
    {   
       $base = "../api/img/requestaction/";

        
        $ID = $item["ID"];

        $REQUESTER = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."R".$ID.".png")) ? $base."R".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["REQUESTER"];
        $REQUESTEE = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."E".$ID.".png")) ? $base."E".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["REQUESTEE"];

         $dataSet1 .= 
         "[ 
          '<a href=\"?display=itemrequestactiondetails&entity=itemrequestactiondetails&status=".$status."&ID=".$item["ID"]."\">DETAILS</a>',                
          '".$item["ID"]."',          
          '".$item["TYPE"]."',
          '".$item["REQUEST_TIME"]."',    
          '".$REQUESTER."',
          '".$REQUESTEE."'                  
          ],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#result').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 


    return $body; 
}

function renderItemRequestActionDetails($data){
    $items = $data;
   //$items = $data["items"];   
   //$itemrequest = $data;
   $status = $_GET["status"];

   $body = "<div >";   
   $body .=   "<form id='myform'><table border='1' id='result'>
               <thead><tr>
                  <th>IMAGE</th>
                  <th>NAME</th>
                  <th>DEM</th>                                
                  <th>RES</th>
                  <th>TRAN</th> 
                  <th>PURC</th>
                  <th>WH</th>
                  <th>(BLUE)</th>                  
                  <th>Trans_P</th>
                  <th>Purch_P</th>                  
                  <th>Req_Qty</th>
                  <th>Debt</th>    
                  <th>TRANS</th>
                  <th>PURCH</th>              
                  <th>ACTION</th>
               </tr></thead>
               <tfoot><tr>
                  <th>IMAGE</th>
                  <th>NAME</th>
                  <th>DEM</th>                                
                  <th>RES</th>
                  <th>TRAN</th> 
                  <th>PURC</th>
                  <th>WH</th>
                  <th>(BLUE)</th>                  
                  <th>Trans_P</th>
                  <th>Purch_P</th>                  
                  <th>Req_Qty</th>
                  <th>Debt</th> 
                  <th>TRANS</th>
                  <th>PURCH</th>              
                  <th>ACTION</th>
               </tr></tfoot>
               </table></form>
               ";  
    $dataSet1 = "";
    

    foreach($items as $item)
    {   
         $dataSet1 .= 
         "[ 
         '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',          
          \"".$item["PRODUCTNAME"]."\",          
          '".$item["DEMAND_QTY"]."',
          '".$item["RESTOCK_QTY"]."',    
          '".$item["TRANSFER_QTY"]."',    
          '".$item["PURCHASE_QTY"]."',    
          '".$item["WAREHOUSE_QTY"]."',    
          '".$item["SUPPLIERREQUESTED_QTY"]."',    
          '".$item["TRANSFER_POOL"]."',    
          '".$item["PURCHASE_POOL"]."',    
          '".$item["REQUEST_QUANTITY"]."',    
          '".$item["DEBT_QTY"]."',    
          '<input value=\"".$item["ID"]."\" type=\"hidden\"><input style=\"text-align:center\" id=\"transfer_".$item["ID"]."\" value=\"".$item["REQUEST_QUANTITY"]."\" type=\"text\"  >',
          '<input style=\"text-align:center\" id=\"purchase_".$item["ID"]."\" value=\"0\" type=\"text\"  >',
          '<button onclick=\"All(".$item["ID"].")\">ALL</button><br><button onclick=\"Add(".$item["ID"].")\">-</button><button onclick=\"Substract(".$item["ID"].")\">+</button>',             
          ],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script> 
        function Add(id)
        {
          if (document.getElementById('transfer_' + id).value == ".$item["REQUEST_QUANTITY"].")
            return;
          var t = parseInt(document.getElementById('transfer_' + id).value) + 1;
          var p = parseInt(document.getElementById('purchase_' + id).value) - 1;
          document.getElementById('transfer_' + id).value = t;
          document.getElementById('purchase_' + id).value = p;
        }
        function Substract(id)
        {
          if (document.getElementById('transfer_' + id).value == 0)
            return;
          var t = parseInt(document.getElementById('transfer_' + id).value) - 1;
          var p = parseInt(document.getElementById('purchase_' + id).value) + 1;
          document.getElementById('transfer_' + id).value = t;
          document.getElementById('purchase_' + id).value = p;
        }
        function All(id)
        {
          document.getElementById('transfer_' + id).value = 0;
          document.getElementById('purchase_' + id).value = ".$item["REQUEST_QUANTITY"]."; 
        }
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#result').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    
    $body .=  "<center>
              <input type='hidden' id='action'  value='update'>
                <input type='hidden' id='detailtype' name='detailtype' value='ITEMREQUEST'>                
                <input type='hidden' id='status'  value='".$status."'>                
                <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>
                (Sign with your trackpad or mouse)<br>";
    
    $body .= "
            <button type='button' onclick='zkSignature.clear()'>
                Clear Signature
               </button>
          
               <div id='canvas' style='width:466px;border:1px solid black;!important'>
                Canvas is not supported.
               </div>
               <script>
                zkSignature.capture();
               </script>
        
               <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                SEND
               </button><center><br><br><br>";

    return $body; 
}



function renderItemRequestActionCreate($data){
 
   $items = $data;
       

     $body = "<div class='col s12 m8 l9'>
              <div class='row margin'>
              <form class='col s12' method='GET'>
                
              
              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='productid' name='PRODUCTID' type='text' >
                    <label for='productid' class='center-align'>Product ID</label>               
                  </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>                   
                    <input id='quantity' name='REQUEST_QUANTITY' type='text' >
                    <label for='quantity' class='center-align'>Quantity</label>               
                  </div>
              </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                       <input type='hidden' name='display' value='".$_GET["display"]."'>
                       <input type='hidden' name='entity' value='".$_GET["entity"]."'>
                       <input type='hidden' name='type' value='".$_GET["type"]."'>

                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Single Add'><br><br>
                      
                     </div>
                     
                </div>
            </form>
              </div>
             </div> 


            <div class='col s12 m8 l9'>
              <div class='row margin'>
              <form class='col s12' method='POST' enctype=multipart/form-data>
                
              
              <div class='row'>
                  <div class='input-field col s12'>     
                    <center>              
                    <input id='productid' name='filename' type='file' >
                    <label for='productid' class='center-align'>Template upload</label>               
                    </center>
                  </div>
              </div>

             
              <div class='row'>    
                     <div class='input-field col s12'>             
                       <input type='hidden' name='display' value='".$_GET["display"]."'>
                       <input type='hidden' name='entity' value='".$_GET["entity"]."'>
                       <input type='hidden' name='type' value='".$_GET["type"]."'>

                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Multiple Add'><br><br>
                      
                     </div>
                     
                </div>
            </form>
              </div>
             </div> 

             <center><a href='./Resources/Template.xlsx' target='_blank'>Download template</a></center><br>
              ";  



   $fields = ["IMAGE","PRODUCTNAME","PRODUCTID","PACKINGNOTE","VENDNAME","REQUEST_QUANTITY","LOTWH1","LOTWH2",
              "LOTEXPIREWH1","LOTEXPIREWH2","WH1REQUESTQTY","WH2REQUESTQTY","ACTION"];
   $body .= _ItemsTable($items,$fields,$_GET);

   $body .= "
              <input type='hidden' id='detailtype' name='detailtype' value='ITEMREQUEST'>
              <input type='hidden' id='action'  value='create'>                              
               <input type='hidden' id='type' value='".$_GET["type"]."'>       
              <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>

              <center><button type='button' onclick='zkSignature.clear()'>
                Clear Signature
               </button>
          
               <div id='canvas' style='width:466px;border:1px solid black;!important'>
                Canvas is not supported.
               </div>

               <script>
                zkSignature.capture();
               </script>
        
               <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                SEND
               </button><center><br><br><br>";
   

  return $body;
}

function renderItemRequestDebtList($data){  
}

/**********************/

/**********************/
/**** SupplyRecord ****/
/**********************/


function renderSupplyRecordList($data,$action){
   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];

   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }

              function cancelSupplyRecord(author,identifier,ponumber,type){
                var result = confirm('Are you sure you want to cancel?');
                if (result) 
                {
                  var actiontype  = '';
                  if (type == 'WH')
                    actiontype = 'WHCANCEL';
                  else
                    actiontype = 'PCHCANCEL';

                  var ItemJSON = '';                  
                  ItemJSON = {'IDENTIFIER' : identifier,
                              'AUTHOR'     : author, 
                              'PONUMBER'   : ponumber,                                                      
                              'ACTIONTYPE' : actiontype };   
                  var URL = 'http://phnompenhsuperstore.com/api/api_dev.php/supplyrecord'; 
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () 
                  {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                     {
                       if (type == 'WH')
                        document.getElementById('status_' + identifier).innerHTML = 'ORDERED';
                       else if (type == 'PCH')
                        document.getElementById('status_' + identifier).innerHTML = 'VALIDATED';
                        alert('Supply Record status changed')
                      }
                  }
                  xmlhttp.open('PUT', URL,false);
                  xmlhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                  xmlhttp.send(JSON.stringify(ItemJSON)); 
                }                                                                                            
                else
                {
                  alert('canceled');
                }
              }                           
            </script>
            <center><button onclick='showPO()'>PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";

   // PO // 
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th>                                
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>
                  <th>VAL</th>
                  <th>PCH</th>
                  <th>WH</th>
                  <th>RCV</th>
                  <th>ACC</th>   
                  <th>CANCEL</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>                                
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>
                  <th>VAL</th>
                  <th>PCH</th>
                  <th>WH</th>
                  <th>RCV</th>
                  <th>ACC</th>   
                  <th>CANCEL</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";
    if (($action == "WH" && $_GET["status"] == "DELIVERED") ||
        ($action == "PCH" && $_GET["status"] == "ORDERED"))
      $show = "";  
    else
      $show = "style=\"display:none\"";

    foreach($itemsPO as $item)
    {   
    
        $base = "../api/img/supplyrecords_signatures/";
        $ID = $item["ID"];

        $VAL = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."VAL_".$ID.".png")) ? $base."VAL_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["VALIDATOR_USER"];
        $PCH = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."PCH_".$ID.".png")) ? $base."PCH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["PURCHASER_USER"];
        $WH  = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."WH_".$ID.".png")) ? $base."WH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["WAREHOUSE_USER"];
        $RCV = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."RCV_".$ID.".png")) ? $base."RCV_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["RECEIVER_USER"];
        $ACC = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."ACC_".$ID.".png")) ? $base."ACC_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["ACCOUNTANT_USER"];

         $dataSet1 .= 
         "[ 

          '<a href=\"?display=supplyrecorddetails&entity=supplyrecorddetails&action=".$action."&ID=".$item["ID"]."\">DETAILS</a>',                
          '".$item["PONUMBER"]."',
          \"".$item["VENDNAME"]."\",
          '<span id=\"status_".$item["ID"]."\">".$item["STATUS"]."</span>',
          '".$item["LAST_UPDATED"]."',    
          '".$VAL."',
          '".$PCH."',
          '".$WH."',
          '".$RCV."',
          '".$ACC."',      
          '<button ".$show." onclick=cancelSupplyRecord(\"".$_SESSION["USER"]["login"]."\",\"".$item["ID"]."\",\"".$item["PONUMBER"]."\",\"".$action."\") >Cancel</button>',
          

          ],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 


    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th>
                  <th>NOPONOTE</th>
                  <th>LINKEDPO</th>                  
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>
                  <th>VAL</th>
                  <th>PCH</th>
                  <th>WH</th>
                  <th>RCV</th>
                  <th>ACC</th>                  
                  
                  <th>CANCEL</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>
                  <th>NOPONOTE</th>
                  <th>LINKEDPO</th>
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>
                  <th>VAL</th>
                  <th>PCH</th>
                  <th>WH</th>
                  <th>RCV</th>
                  <th>ACC</th>   
               </tr></tfoot>
               </table>
               ";                  
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          
          $base = "../api/img/supplyrecords_signatures/";
          $ID = $item["ID"];
          $VAL = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."VAL_".$ID.".png")) ? $base."VAL_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["VALIDATOR_USER"];
        $PCH = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."PCH_".$ID.".png")) ? $base."PCH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["PURCHASER_USER"];
        $WH  = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."WH_".$ID.".png")) ? $base."WH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["WAREHOUSE_USER"];
        $RCV = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."RCV_".$ID.".png")) ? $base."RCV_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["RECEIVER_USER"];
        $ACC = "<img style=\"background-color:#009183\" width=\"150px\" src=\"".((file_exists($base."ACC_".$ID.".png")) ? $base."ACC_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$item["ACCOUNTANT_USER"];

          $dataSet2 .= "[    
          '<a href=\"?display=supplyrecorddetails&entity=supplyrecorddetails&action=".$action."&ID=".$item["ID"]."\">DETAILS</a>',      
          \"".$item["NOPONOTE"]."\",
          \"".$item["LINKEDPO"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\",
          '".$VAL."',
          '".$PCH."',
          '".$WH."',
          '".$RCV."',
          '".$ACC."',                                      
          '<button ".$show." onclick=cancelReception(\"".$_SESSION["USER"]["login"]."\",\"".$item["ID"]."\",\"".$item["PONUMBER"]."\") >Cancel</button>'
          ],";
    }
    $dataSet2 = rtrim($dataSet2,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body;  
}

function renderSupplyRecordDetail($data,$action){
  $supplyrecord = $data;

  if(isset($supplyrecord["items"]))
    $items = $supplyrecord["items"];
  else 
    $items = null;

  $base = "../api/img/supplyrecords_signatures/";
  $ID = $supplyrecord["ID"]; 
  $VAL = "<img style=\"background-color:#009183\" width=\"200px\" src=\"".((file_exists($base."VAL_".$ID.".png")) ? $base."VAL_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$supplyrecord["VALIDATOR_USER"];
        $PCH = "<img style=\"background-color:#009183\" width=\"200px\" src=\"".((file_exists($base."PCH_".$ID.".png")) ? $base."PCH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$supplyrecord["PURCHASER_USER"];
        $WH  = "<img style=\"background-color:#009183\" width=\"200px\" src=\"".((file_exists($base."WH_".$ID.".png")) ? $base."WH_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$supplyrecord["WAREHOUSE_USER"];
        $RCV = "<img style=\"background-color:#009183\" width=\"200px\" src=\"".((file_exists($base."RCV_".$ID.".png")) ? $base."RCV_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$supplyrecord["RECEIVER_USER"];
        $ACC = "<img style=\"background-color:#009183\" width=\"200px\" src=\"".((file_exists($base."ACC_".$ID.".png")) ? $base."ACC_".$ID.".png" : "../api/img/na.jpg")."\"><br>".$supplyrecord["ACCOUNTANT_USER"];

  $body = "<table>
                <tr>
                    <th width='20%'>Validator</th>
                    <th width='20%'>Purchaser</th>                  
                    <th width='20%'>Warehouse</th>
                    <th width='20%'>Receiver</th>
                    <th width='20%'>Accountant</th>
                </tr>
            <tr>
              <td>".$VAL."</td>
              <td>".$PCH."</td>
              <td>".$WH."</td>
              <td>".$RCV."</td>
              <td>".$ACC."</td>
            </tr>
            </table><br>";


    $go = true;
    $count = 1;
    do{

        $filename = "../api/img/supplyrecords_invoices/INV_".$supplyrecord["ID"]."_".$count.".png";
        if (file_exists($filename))
          $body .= "<center><img height='300px' onclick=enlargeimage('".$filename."') src='".$filename."'><center<br>";          
        else 
          $body .= "<center><img height='300px' src='../api/img/na.jpg'><center<br>";        
        
        $count++;        
        $go = file_exists("../api/img/supplyrecords_invoices/INV_".$supplyrecord["ID"]."_".$count.".png");
    }    
    while($go);
    

    if ($supplyrecord["TYPE"] == "PO")
    {
      $body .= "<center>(WITH PO)<b>".$supplyrecord["PONUMBER"].":".$supplyrecord["VENDNAME"]."</b></center><br>
                <input type='hidden' id='ponumber'  value='".$supplyrecord["PONUMBER"]."'>
              ";  
    }
    else if ($supplyrecord["TYPE"] == "NOPO")
    {
      $body .= "<center>(NO PO)<b>".$supplyrecord["LINKEDPO"]."</b></center><br>
               <input type='hidden' id='ponumber'  value='".$supplyrecord["LINKEDPO"]."'>
              ";   
    }
    

    if ($items != null){

      $body .= "<form id='myform'>
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>IMAGE</th>
          <th>BARCODE</th>
          <th>NAME</th>

          <th>MINVENDORNAME</th>
          <th>MINCOST</th>
          <th>MAXVENDORNAME</th>
          <th>MAXCOST</th>
          <th>DISCOUNT</th>
          <th>COST</th>
          <th>ORDER QTY</th>
          <th>VALIDATION QTY</th>
          <th>RECEPTION QTY</th>
          <th>NOTE</th>
          <th>AMT</th>
        </tr></thead>        
        <tfoot><tr>
          <th>IMAGE</th>
          <th>BARCODE</th>
          <th>NAME</th>

          <th>MINVENDORNAME</th>
          <th>MINCOST</th>
          <th>MAXVENDORNAME</th>
          <th>MAXCOST</th>
          <th>DISCOUNT</th>
          <th>COST</th>
          <th>ORDER QTY</th>
          <th>VALIDATION QTY</th>
          <th>RECEPTION QTY</th>
          <th>NOTE</th>
          <th>AMT</th>
        </tr></tfoot>
        </table></form><br>";  

      $dataSet = "";
      $total = 0;
      $totalAmt = 0;

      
      $valdisable = ($action == "VAL") ? '' : 'disabled';    
      $whdisable = ($action == "WH") ? '' : 'disabled';

      foreach($items as $item)
      {           
        if ($supplyrecord["STATUS"] == "WAITING" || $supplyrecord["STATUS"] == "ORDERED"){
          $item["AMT"] = floatval($item["TRANCOST"]) * floatval($item["ORDER_QTY"]);
        }
        else if ($supplyrecord["STATUS"] == "VALIDATED"){  
           $item["AMT"] = floatval($item["TRANCOST"]) * floatval($item["PPSS_VALIDATION_QTY"]);     
        }
        else if ($supplyrecord["STATUS"] == "DELIVERED"){
          $item["AMT"] = floatval($item["TRANCOST"]) * floatval($item["PPSS_RECEPTION_QTY"]);     
        }        
        $item["AMT"] = truncatePrice($item["AMT"],4);        
        
        $item["ORDER_QTY"] = truncatePrice($item["ORDER_QTY"],2);
        if (isset($item["PPSS_VALIDATION_QTY"]))
          $item["PPSS_VALIDATION_QTY"] = truncatePrice($item["PPSS_VALIDATION_QTY"],2);
        else
          $item["PPSS_VALIDATION_QTY"] = 0;
        $item["TRANCOST"] = truncatePrice($item["TRANCOST"],4);

        

        $item["MINCOST"] = truncatePrice($item["MINCOST"]);
        $item["MAXCOST"] = truncatePrice($item["MAXCOST"]);

        if ($item["TRANCOST"] > $item["MINCOST"])
          $color = "#FF5933";
        else if ($item["TRANCOST"] < $item["MINCOST"])
          $color = "#7CFF33";         
        else 
          $color = "#0D1EE0";

        if (floatval($item["ORDER_QTY"]) != floatval($item["PPSS_VALIDATION_QTY"]))
          $order = "<span style='color:red'>".$item["ORDER_QTY"]."</span>";
        else 
          $order = $item["ORDER_QTY"];

        $dataSet .= "[
              '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
              '".$item["PRODUCTID"]." <input type=\"hidden\"  value=\"".$item["PRODUCTID"]."\">',                         
              \"".$item["PRODUCTNAME"]."\",

              \"".$item["MINVENDORNAME"]."\",
              \"".$item["MINCOST"]."\",
              \"".$item["MAXVENDORNAME"]."\",
              \"".$item["MAXCOST"]."\",
              \"".$item["TRANDISC"]."\",

              '<span style=\"color:".$color."\">".$item["TRANCOST"]."</span>',      
             \"".$order."\",
              '<input ".$valdisable." style=\"text-align:center\" type=\"text\" id=\"validationqty_".$item["PRODUCTID"]."\" value=\"".$item["PPSS_VALIDATION_QTY"]."\">',                            
              '<input ".$whdisable." style=\"text-align:center\" type=\"text\" id=\"receptionqty_".$item["PRODUCTID"]."\" value=\"".$item["PPSS_RECEPTION_QTY"]."\">',              
              '<input  style=\"text-align:center\" type=\"text\" id=\"note_".$item["PRODUCTID"]."\" value=\"".$item["PPSS_NOTE"]."\">',              
              \"".$item["AMT"]."\"               
              ],";
        $total++;
        $totalAmt += $item["AMT"];              
      }
      $dataSet = rtrim($dataSet,",");        
      $body .= "  
            <script>  
            var dataSet = [".$dataSet."];
            var table;        
            table =  $(document).ready( function () {
             $('#resultTable').DataTable({                
            data:
            dataSet, 
            'lengthMenu':[-1]
            });
           });

            function serializeArray() {                                                      
            }                      
          </script>
      ";   
      $body .= "<b>Total Quantity: ". $total."</b><br>";
      $body .= "<b>Total Amount: ". $totalAmt."</b><br>";
     }
     else
     {
        $body .= "<b>NO ITEMS</b><br>";
     }
    


    if ($supplyrecord["TYPE"] == "NOPO" && $action == "RCV")    
       $body .= "<br>LINKED PONUMBER<br><input id='linkedponumber' style='width:300px' name='linkedpo' type='text' value='".$supplyrecord["LINKEDPO"]."'><br>";              

    if ($action != "NO")
    {
        $body .= "(".$action.")<br>";
        $body .=  "<center>
                <input type='hidden' id='detailtype' name='detailtype' value='".$action."'>
                <input type='hidden' id='identifier' name='identifier' value='".$supplyrecord["ID"]."'>
                <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>

                (Sign with your trackpad or mouse)<br>";
    
        $body .= "
            <button type='button' onclick='zkSignature.clear()'>
                Clear Signature
               </button>
          
               <div id='canvas' style='width:466px;border:1px solid black;!important'>
                Canvas is not supported.
               </div>

               <script>
                zkSignature.capture();
               </script>
        
               <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                SEND
               </button><center><br><br><br>";
    }  
    return $body;      
}

function renderSupplyRecordSearch($data){
   $statuses = array("ALL","WAITING","VALIDATED","ORDERED","DELIVERED","RECEIVED","PAID");
   $potypes = array("ALL","PO","NOPO");

   $ponumber = isset($_GET["ponumber"]) ? $_GET["ponumber"] : "";
   $start = isset($_GET["start"]) ? $_GET["start"] : "2000-1-1";
   $end = isset($_GET["end"]) ? $_GET["end"] : "2050-1-1";
   $status = isset($_GET["start"]) ? $_GET["start"] : "";
   $potype = isset($_GET["end"]) ? $_GET["end"] : "";


   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
        
                <div class='row'>
                    <div class='input-field col s12'>
                      ".dateSelect("start",$start)."
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>                        
                        ".dateSelect("end",$end)."
                    </div>
                </div>


              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($statuses,"status",12,$status)."
                  </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($potypes,"potype",12,$potype)."
                  </div>
              </div>

                <div class='row'>
                   <div class='input-field col s12'>                   
                      <input id='ponumber' name='ponumber' type='text' value='".$ponumber."' >
                      <label for='ponumber' class='center-align'>PO Number</label>               
                   </div>
                </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='receptionrecordsearch'>
                      <input type='hidden' name='entity' value='receptionrecordsearch'>
                      <input type='hidden' name='action' value='receptionrecordsearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";    

    $items = $data;

  
    if ($items != null)
    {
       $body .=   "<table id='resultTable1'>
                 <thead><tr>
                    <th>DETAILS</th> 
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th>VAL</th>
                    <th>PCH</th>
                    <th>WH</th>
                    <th>RCV</th>
                    <th>ACC</th>
                    <th>PONUMBER</th>
                    <th>VENDOR/NOTE</th> 
                    <th>LAST UPDATED</th>
                 </tr></thead>

                 <tfoot><tr>
                    <th>DETAILS</th> 
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th>VAL</th>
                    <th>PCH</th>
                    <th>WH</th>
                    <th>RCV</th>
                    <th>ACC</th>
                    <th>PONUMBER</th>
                    <th>VENDOR/NOTE</th> 
                    <th>LAST UPDATED</th>
                 </tr></tfoot>
               </table>
               ";  
                $dataSet1 = "";            
        foreach($items as $item)
        {   
          if ($item["TYPE"] == 'NOPO'){
            $item["PONUMBER"] = $item["LINKEDPO"];
            $item["VENDOR"] = $item["PONOTE"];
          }

            $base = "http://phnompenhsuperstore.com/api/img/supplyrecords_signatures/";
            $VAL = "<img src='".$base."VAL_".$item["ID"].".png' alt='N/A'><br>".$item["VALIDATORUSER"] ;
            $PCH = "<img src='".$base."PCH_".$item["ID"].".png' alt='N/A'><br>".$item["PURCHASERUSER"] ;
            $WH = "<img src='".$base."WH_".$item["ID"].".png' alt='N/A'><br>".$item["WAREHOUSEUSER"] ;
            $RCV = "<img src='".$base."RCV_".$item["ID"].".png' alt='N/A'><br>".$item["RECEIVERUSER"] ;
            $ACC = "<img src='".$base."ACC_".$item["ID"].".png' alt='N/A'><br>".$item["ACCOUNTANTUSER"] ;


             $dataSet1 .= "[    
              '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=no&ID=".$item["ID"]."\">DETAILS</a>',
              '".$item["TYPE"]."',
              '".$item["STATUS"]."',
              '".$VAL."',
              '".$PCH."',
              '".$WH."',
              '".$RCV."',
              '".$ACC."',              
              \"".$item["PONUMBER"]."\",
              \"".$item["VENDNAME"]."\",                    
              \"".$item["LAST_UPDATED"]."\"],";
        }
         $dataSet1 = rtrim($dataSet1,",");        
            $body .= "  
            <script>      
            var dataSet1 = [".$dataSet1."];
            var table;        
            table =  $(document).ready( function () {
             $('#resultTable1').DataTable({                
             data:dataSet1, 
             'lengthMenu':[-1],          
               });
            });
          </script>
        ";
    }
    return $body;
}

function renderWHDone($data,$cancel = true){

   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }

              function cancelSupplyRecord(author,identifier,ponumber,actiontype){
                var result = confirm('Are you sure you want to cancel?');
                if (result) 
                {                  
                  var ItemJSON = '';                  
                  ItemJSON = {'IDENTIFIER' : identifier,
                              'AUTHOR'     : author, 
                              'PONUMBER'   : ponumber,                                                      
                              'ACTIONTYPE' : actiontype };   
                  var URL = 'http://phnompenhsuperstore.com/api/api_dev.php/supplyrecord'; 
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () 
                  {
                      document.getElementById('status_' + identifier).innerHTML = 'ORDERED';
                  }
                  xmlhttp.open('PUT', URL,false);
                  xmlhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                  xmlhttp.send(JSON.stringify(ItemJSON)); 
                }                                                                                            
                else
                {
                  alert('canceled');
                }
              }
                           
    
            </script>";
   $body .= "<center><button onclick='showPO()'>PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WH USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th><th>CANCEL</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WH USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th><th>STATUS</th><th>LAST UPDATED</th><th>CANCEL</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";
    $show = "";  
    if ($cancel == false)
      $show = "style=\"display:none\"";

    foreach($itemsPO as $item)
    {   
         $dataSet1 .= 
         "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=wh&ID=".$item["ID"]."\">DETAILS</a>',
          ".(strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img style=\"background-color:#009183\" height=\"50px\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."', 
          '".$item["PONUMBER"]."',
          \"".$item["VENDNAME"]."\",
          '<span id=\"status_".$item["ID"]."\">".$item["STATUS"]."</span>',
          '".$item["LAST_UPDATED"]."',
          '<button ".$show." onclick=cancelReception(\"".$_SESSION["USER"]["login"]."\",\"".$item["ID"]."\",\"".$item["PONUMBER"]."\") >Cancel</button>',
          '".$item["LAST_UPDATED"]."'
          ],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>WH</th>
                  <th>NOPONOTE</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th><th>CANCEL</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WHUSER</th>
                  <th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=wh&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."', 
          \"".$item["ID"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body;  
}

function renderRCVTodo($data){
   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }
            </script>";
   $body .= "<center><button onclick='showPO()'   >PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WH USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WH USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=rcv&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\"  src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."', 
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WH USER</th>
                  <th>NOPONOTE</th><th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> <th>SIGNATURE</th><th>WHUSER</th>
                  <th>NOPONOTE</th><th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=rcv&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."', 
          \"".$item["NOPONOTE"]."\",
          \"".$item["ID"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body;  
}

function renderRCVDone($data){
   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
  
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }
            </script>";
   $body .= "<center><button onclick='showPO()'   >PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>                  
                   <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=rcv&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."',"
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."', 
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ID</th>
                  <th>NOPONOTE</th>
                  <th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ID</th>
                  <th>NOPONOTE</th>
                  <th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=rcv&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."'," 
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."', 
          \"".$item["ID"]."\",
          \"".$item["NOPONOTE"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body; 
}

function renderACCTodo($data){
   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
  
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }
            </script>";
   $body .= "<center><button onclick='showPO()'   >PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>                  
                   <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>PO NUMBER</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=acc&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."',"
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."', 
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> 
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=acc&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\"  style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."'," 
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\"   style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."', 
          \"".$item["ID"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body;   
}

function renderACCDone($data){
   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
  
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }
            </script>";
   $body .= "<center><button onclick='showPO()'   >PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>PO NUMBER</th><th>VENDOR</th> <th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>
                  <th>PCH SIGNATURE</th><th>PCH USER</th>                  
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>PO NUMBER</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=acc&ID=".$item["ID"]."\">DETAILS</a>',"          
          .( strlen($item["PURCHASERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["PURCHASERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["PURCHASER_USER"]."',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."',"
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."'," 
          .( strlen($item["ACCOUNTANTSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["ACCOUNTANTSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["ACCOUNTANT_USER"]."',           
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> 
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>ID</th><th>STATUS</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=acc&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["PURCHASERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["PURCHASERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["PURCHASER_USER"]."',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."'," 
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."',"
          .( strlen($item["ACCOUNTANTSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["ACCOUNTANTSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["ACCOUNTANT_USER"]."', 
          \"".$item["ID"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body; 
}

function renderXWHTodo($data){
   $itemsPO = $data["PO"];
  
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th>  
                  <th>XWH SIGNATURE</th>                 
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>                  
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>  
                  <th>XWH SIGNATURE</th>                 
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=xwh&ID=".$item["ID"]."\">DETAILS</a>',
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["LAST_UPDATED"]."\"
          \"".$item["PURCHASER_USER"]."\"
          ],
          ";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    return $body; 
} 

function renderPCHDone($data){
  $itemsPO = $data["PO"];
  $body = "<script>              

              function cancelOrder(identifier){
                var result = confirm('Are you sure you want to cancel?');
                if (result) 
                {
                  var ItemJSON = '';                  
                  ItemJSON = {'IDENTIFIER' : identifier,
                              'ACTIONTYPE' : 'PCHCANCEL' };   
                  var URL = 'http://phnompenhsuperstore.com/api/api.php/receptionrecord'; 
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () 
                  {
                      document.getElementById('status_' + identifier).innerHTML = 'VALIDATED';
                  }
                  xmlhttp.open('PUT', URL,false);
                  xmlhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                  xmlhttp.send(JSON.stringify(ItemJSON)); 
                }                                                                                            
                else
                {
                  alert('canceled');
                }
              }                              
            </script>";
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th>    
                  <th>XWH SIG</th>
                  <th>PCH USER</th>
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>PODATE</th>
                  <th>XWH USER</th>
                  <th>CANCEL</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>  
                  <th>XWH SIG</th>
                  <th>PCH USER</th>                 
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>PODATE</th>
                  <th>XWH USER</th>
                  <th>CANCEL</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=pch&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["XWAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img style=\"background-color:#009183\" height=\"50px\" src=\"data:image/png;base64,".$item["XWAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          \"".$item["PURCHASER_USER"]."\",
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["PODATE"]."\",
          \"".$item["XWAREHOUSE_USER"]."\",
           '<button onclick=cancelOrder(\"".$item["ID"]."\") >Cancel</button>'
          ],
          ";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    return $body; 
}

function renderPCHTodo($data){
   $itemsPO = $data["PO"];
 
   $body = "<script>              

              function reloadOrder(ponumber){
                var result = confirm('Are you sure you want to reload?');
                if (result) 
                {
                  var ItemJSON = '';                                    
                  var URL = 'http://phnompenhsuperstore.com/api/api.php/receptionrecordrefresh/' + ponumber; 
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function () {                  
                  }
                  xmlhttp.open('GET', URL,false);
                  xmlhttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                  xmlhttp.send(JSON.stringify(ItemJSON)); 

                  alert('PO Reloaded');
                }                                                                                            
                else
                {
                  alert('canceled');
                }
              }                              
            </script>";

   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th>    
                  <th>XWH SIG</th>
                  <th>PCH USER</th>
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>PODATE</th>
                  <th>XWH USER</th>
                  <th>RELOAD</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>  
                  <th>XWH SIG</th>
                  <th>PCH USER</th>                 
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> 
                  <th>STATUS</th>
                  <th>PODATE</th>
                  <th>XWH USER</th>
                  <th>RELOAD</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=pch&ID=".$item["ID"]."\">DETAILS</a>',"
          .( strlen($item["XWAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img style=\"background-color:#009183\" height=\"50px\" src=\"data:image/png;base64,".$item["XWAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          \"".$item["PURCHASER_USER"]."\",
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",
          \"".$item["STATUS"]."\",
          \"".$item["PODATE"]."\",
          \"".$item["XWAREHOUSE_USER"]."\",
          '<button onclick=reloadOrder(\"".$item["PONUMBER"]."\") >Reload</button>'         
          ],
          ";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    return $body; 
}

function renderReceptionRecordSearch($data){

  //
   $statuses = array("ALL","WAITING","VALIDATED","ORDERED","DELIVERED","RECEIVED","PAID");
   $potypes = array("ALL","PO","NOPO");


   $ponumber = isset($_GET["ponumber"]) ? $_GET["ponumber"] : "";
   $start = isset($_GET["start"]) ? $_GET["start"] : "2000-1-1";
   $end = isset($_GET["end"]) ? $_GET["end"] : "2050-1-1";
   $status = isset($_GET["start"]) ? $_GET["start"] : "";
   $potype = isset($_GET["end"]) ? $_GET["end"] : "";


   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
        
                <div class='row'>
                    <div class='input-field col s12'>
                      ".dateSelect("start",$start)."
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12'>                        
                        ".dateSelect("end",$end)."
                    </div>
                </div>


              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($statuses,"status",12,$status)."
                  </div>
              </div>

              <div class='row'>
                  <div class='input-field col s12'>
                    ".elemSelect($potypes,"potype",12,$potype)."
                  </div>
              </div>

                <div class='row'>
                   <div class='input-field col s12'>                   
                      <input id='ponumber' name='ponumber' type='text' value='".$ponumber."' >
                      <label for='ponumber' class='center-align'>PO Number</label>               
                   </div>
                </div>

              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='receptionrecordsearch'>
                      <input type='hidden' name='entity' value='receptionrecordsearch'>
                      <input type='hidden' name='action' value='receptionrecordsearch'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";    

    $items = $data;

    if ($items != null)
    {
       $body .=   "<table id='resultTable1'>
                 <thead><tr>
                    <th>DETAILS</th> 
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th>XWH SIGNATURE</th><th>XWH USER</th>
                    <th>PCH SIGNATURE</th><th>PCH USER</th>
                    <th>WH SIGNATURE</th><th>WH USER</th>
                    <th>RCV SIGNATURE</th><th>RCV USER</th>
                    <th>ACC SIGNATURE</th><th>ACC USER</th>
                    <th>PONUMBER</th>
                    <th>VENDOR/NOTE</th> <th>LAST UPDATED</th>
                 </tr></thead>

                 <tfoot><tr>
                    <th>DETAILS</th>
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th>XWH SIGNATURE</th><th>XWH USER</th>
                    <th>PCH SIGNATURE</th><th>PCH USER</th>                  
                     <th>WH SIGNATURE</th><th>WH USER</th>
                    <th>RCV SIGNATURE</th><th>RCV USER</th>
                    <th>ACC SIGNATURE</th><th>ACC USER</th>
                    <th>PONUMBER</th>
                    <th>VENDOR/NOTE</th> <th>LAST UPDATED</th>
                 </tr></tfoot>
               </table>
               ";  
                $dataSet1 = "";            
        foreach($items as $item)
        {   
          if ($item["TYPE"] == 'NOPO'){
            $item["PONUMBER"] = $item["LINKEDPO"];
            $item["VENDOR"] = $item["PONOTE"];
          }

             $dataSet1 .= "[    
              '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=no&ID=".$item["ID"]."\">DETAILS</a>',
              '".$item["TYPE"]."',
              '".$item["STATUS"]."',"
              .( strlen($item["XWAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["XWAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
              '".$item["XWAREHOUSE_USER"]."',"
              .( strlen($item["PURCHASERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["PURCHASERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
              '".$item["PURCHASER_USER"]."',"
              .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
              '".$item["WAREHOUSE_USER"]."',"
              .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
              '".$item["RECEIVER_USER"]."'," 
              .( strlen($item["ACCOUNTANTSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["ACCOUNTANTSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
              '".$item["ACCOUNTANT_USER"]."', 
              \"".$item["PONUMBER"]."\",
              \"".$item["VENDNAME"]."\",                    
              \"".$item["LAST_UPDATED"]."\"],";
        }
         $dataSet1 = rtrim($dataSet1,",");        
            $body .= "  
            <script>      
            var dataSet1 = [".$dataSet1."];
            var table;        
            table =  $(document).ready( function () {
             $('#resultTable1').DataTable({                
             data:dataSet1, 
             'lengthMenu':[-1],          
               });
            });
          </script>
        ";
    }


    return $body;
}
          
function renderReceptionRecordAll2($data){
 


   $itemsPO = $data["PO"];
   $itemsNOPO = $data["NOPO"];
  
   $body = "<script>
              function showPO(){
                document.getElementById('nopo').style.display = 'none';
                document.getElementById('po').style.display = 'block';
              }
              function showNOPO(){
                 document.getElementById('po').style.display = 'none';
                 document.getElementById('nopo').style.display = 'block';
              }
            </script>";
   $body .= "<center><button onclick='showPO()'   >PO</button> 
            <button onclick='showNOPO()' >NO PO</button><center>";
   // PO
   $body .= "<div id='po'>";
   $body .=   "PO Total : ".count($itemsPO);              
   $body .=   "<table border='1' id='resultTable1'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>STATUS</th>
                  <th>XWH SIGNATURE</th><th>XWH USER</th>
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> <th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th>
                  <th>STATUS</th>
                  <th>XWH SIGNATURE</th><th>XWH USER</th>
                  <th>PCH SIGNATURE</th><th>PCH USER</th>                  
                   <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>PO NUMBER</th>
                  <th>VENDOR</th> <th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";  
    $dataSet1 = "";            
    foreach($itemsPO as $item)
    {   
         $dataSet1 .= "[    
          '<a href=\"?display=receptionRecordDetail&entity=receptionRecordDetail&action=no&ID=".$item["ID"]."\">DETAILS</a>',"
          ."'".$item["STATUS"]."',"
          .( strlen($item["XWAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["XWAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["XWAREHOUSE_USER"]."',"
          .( strlen($item["PURCHASERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["PURCHASERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["PURCHASER_USER"]."',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."',"
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."'," 
          .( strlen($item["ACCOUNTANTSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["ACCOUNTANTSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["ACCOUNTANT_USER"]."', 
          \"".$item["PONUMBER"]."\",
          \"".$item["VENDNAME"]."\",                    
          \"".$item["LAST_UPDATED"]."\"],";
    }
     $dataSet1 = rtrim($dataSet1,",");        
        $body .= "  
        <script>      
        var dataSet1 = [".$dataSet1."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable1').DataTable({                
         data:dataSet1, 
         'lengthMenu':[-1],          
           });
        });
      </script>
    ";   
    $body .=  "</div>"; 
    // NOPO
    $body .= "<div id='nopo' style='display:none'>";
    $body .= "NO PO Total : ".count($itemsNOPO);              
    $body .=   "<table border='1' id='resultTable2'>
               <thead><tr>
                  <th>DETAILS</th> 
                  <th>STATUS</th>
                  <th>XWH SIGNATURE</th><th>XWH USER</th>
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>LINKED PO</th>
                  <th>ID</th><th>LAST UPDATED</th>
               </tr></thead>

               <tfoot><tr>
                  <th>DETAILS</th> 
                  <th>STATUS</th>
                  <th>XWH SIGNATURE</th><th>XWH USER</th>
                  <th>PCH SIGNATURE</th><th>PCH USER</th>
                  <th>WH SIGNATURE</th><th>WH USER</th>
                  <th>RCV SIGNATURE</th><th>RCV USER</th>
                  <th>ACC SIGNATURE</th><th>ACC USER</th>
                  <th>LINKED PO</th>
                  <th>ID</th><th>LAST UPDATED</th>
               </tr></tfoot>
               </table>
               ";
    $dataSet2 = "";             
    foreach($itemsNOPO as $item)
    {           
          $dataSet .= "[    
          '<a href=\"?display=receptionRecordDetailNOPO&entity=receptionRecordDetailNOPO&action=no&ID=".$item["ID"]."\">DETAILS</a>',"
          ."'".$item["STATUS"]."',"
          .( strlen($item["XWAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["XWAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["XWAREHOUSE_USER"]."',"
          .( strlen($item["PURCHASERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["PURCHASERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["PURCHASER_USER"]."',"
          .( strlen($item["WAREHOUSESIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["WAREHOUSESIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["WAREHOUSE_USER"]."'," 
          .( strlen($item["RECEIVERSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["RECEIVERSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["RECEIVER_USER"]."',"
          .( strlen($item["ACCOUNTANTSIGNATUREIMAGE"]) > 0 ? "'<img height=\"50px\" style=\"background-color:#009183\" src=\"data:image/png;base64,".$item["ACCOUNTANTSIGNATUREIMAGE"]."\">'" : "'N/A'" ).",
          '".$item["ACCOUNTANT_USER"]."',
          \"".$item["LINKEDPO"]."\", 
          \"".$item["ID"]."\",
          \"".$item["LAST_UPDATED"]."\"],";
    }
    $dataSet2 = rtrim($dataSet,",");        
        $body .= "  
        <script>  
        var dataSet2 = [".$dataSet2."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable2').DataTable({                
        data:
        dataSet2,         
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    $body .= "</div>"; 
    return $body; 
}

function renderReceptionRecordDetail($data){
    $action = $_GET["action"];
    $rr = $data["receptionrecord"];
  
    $body = "<table>
                <tr>
                    <th width='20%'>XWarehouse</th>
                    <th width='20%'>Purchaser</th>                  
                    <th width='20%'>Warehouse</th>
                    <th width='20%'>Receive</th>
                    <th width='20%'>Account</th>
                </tr>
            <tr>
              <td>".( (strlen($rr["XWAREHOUSESIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["XWAREHOUSESIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["PURCHASERSIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["PURCHASERSIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["WAREHOUSESIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["WAREHOUSESIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["RECEIVERSIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["RECEIVERSIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["ACCOUNTANTSIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["ACCOUNTANTSIGNATUREIMAGE"]."'>") : "N/A" )."</td>
            </tr>
            </table><br>";

    $invoices = json_decode($rr["INVOICEJSONDATA"]);
    $body .= "
      <script>
      
      </script>";

    foreach($invoices as $invoice){
          $body .= "<center><img height='300px' onclick=enlargeimage('data:image/png;base64,".$invoice."') src='data:image/png;base64,".$invoice."'><center<br>";
    }



    $items = $data["items"];
    $body .= "<center><b>".$rr["PONUMBER"]."</b></center><br>";
    $body .= "<table border='1' id='resultTable'>
        <thead><tr>
          <th>IMAGE</th><th>BARCODE</th><th>NAME</th><th>COST</th><th>ORDER QTY</th><th>VALIDATION QTY</th><th>RECEPTION QTY</th><th>AMT</th>
        </tr></thead>
        
        <tbody><tr>
          <th>IMAGE</th><th>BARCODE</th><th>NAME</th><th>COST</th><th>ORDER QTY</th><th>VALIDATION QTY</th><th>RECEPTION QTY</th><th>AMT</th>
        </tr></tbody>
        </table><br><br>";  

    $dataSet = "";

    $total = 0;
    foreach($items as $item)
    {           
      $item["AMT"] = floatval($item["TRANCOST"]) * floatval($item["RECEPTION_QTY"]);
      $item["AMT"] = truncatePrice($item["AMT"],4);
      
      $total += $item["AMT"];
      $item["ORDER_QTY"] = truncatePrice($item["ORDER_QTY"],2);
      $item["VALIDATION_QTY"] = truncatePrice($item["VALIDATION_QTY"],2);

      if (floatval($item["ORDER_QTY"]) != floatval($item["VALIDATION_QTY"]))
        $validation = "<span style='color:red'>".$item["VALIDATION_QTY"]."</span>";
      else 
        $validation = $item["VALIDATION_QTY"];


      $dataSet .= "[
            '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
            '".$item["PRODUCTID"]."',          
            \"".$item["PRODUCTNAME"]."\",
            \"".$item["TRANCOST"]."\",
            \"".$item["ORDER_QTY"]."\",
            \"".$validation."\",
            \"".$item["RECEPTION_QTY"]."\",
            \"".$item["AMT"]."\"               
            ],";
    }
     $dataSet = rtrim($dataSet,",");        
          $body .= "  
          <script>  
          var dataSet = [".$dataSet."];
          var table;        
          table =  $(document).ready( function () {
           $('#resultTable').DataTable({                
          data:
          dataSet, 
          'lengthMenu':[-1]
          });
        });
        </script>
      ";   

      $body .= "<b>Total : ". $total."</b><br><br>";

    $body .=  "<center>
                <input type='hidden' id='detailtype' name='detailtype' value='".$action."'>
                <input type='hidden' id='identifier' name='identifier' value='".$data["receptionrecord"]["ID"]."'>
                <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>
                (Sign with your trackpad or mouse)<br>";
    if ($action != "no")
    {
        $body .= "
            <button type='button' onclick='zkSignature.clear()'>
                Clear Signature
               </button>
          
               <div id='canvas' style='width:466px;border:1px solid black;!important'>
                Canvas is not supported.
               </div>

               <script>
                zkSignature.capture();
               </script>
        
               <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                SEND
               </button><center><br><br><br>";
    }         
    return $body;
}

function renderReceptionRecordDetailNOPO($data){
 
   $action = $_GET["action"];
    $rr = $data["receptionrecord"];
  
    $body = "<table><tr><th width='33%'>Warehouse</th><th width='33%'>Receive</th><th width='33%'>Account</th></tr>
            <tr>
              <td>".( (strlen($rr["WAREHOUSESIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["WAREHOUSESIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["RECEIVERSIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["RECEIVERSIGNATUREIMAGE"]."'>") : "N/A" )."</td>
              <td>".( (strlen($rr["ACCOUNTANTSIGNATUREIMAGE"]) > 0) ? ("<img style=\"background-color:#009183\" src='data:image/png;base64,".$rr["ACCOUNTANTSIGNATUREIMAGE"]."'>") : "N/A" )."</td>
            </tr>
            </table><br>";

    $invoices = json_decode($rr["INVOICEJSONDATA"]);
    foreach($invoices as $invoice){
          $body .= "<center><img height='400px'  onclick=enlargeimage('data:image/png;base64,".$invoice."')  src='data:image/png;base64,".$invoice."'><center<br>";
    }

    $body .=  "<center>
                <input type='hidden' id='detailtype' name='detailtype' value='".$action."'>
                <input type='hidden' id='identifier' name='identifier' value='".$data["receptionrecord"]["ID"]."'>
                <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>
                ";

    $items = $data["items"];
    if ($items != null)
    {
        $body .= "<br><br><br><br><br><br><br><br><center><b>".$rr["PONUMBER"]."</b></center><br>";
        $body .= "<table border='1' id='resultTable'>
            <thead><tr>
              <th>IMAGE</th><th>BARCODE</th><th>NAME</th><th>COST</th><th>QTY</th><th>AMT</th>
            </tr></thead>
            
            <tbody><tr>
              <th>IMAGE</th><th>BARCODE</th><th>NAME</th><th>COST</th><th>QTY</th><th>AMT</th>
            </tr></tbody>
            </table><br><br>";  

        $dataSet = "";

        $total = 0;
        foreach($items as $item)
        {           
           $item["AMT"] = floatval($item["TRANCOST"]) * floatval($item["ORDER_QTY"]);
          $item["TRANCOST"] = truncatePrice($item["TRANCOST"],4);
          $item["ORDER_QTY"] = truncatePrice($item["ORDER_QTY"],4);
          $item["AMT"] = truncatePrice($item["AMT"],4);

          $total += $item["AMT"];
          $dataSet .= "[
                '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
                '".$item["PRODUCTID"]."',          
                \"".$item["PRODUCTNAME"]."\",
                \"".$item["TRANCOST"]."\",
                \"".$item["ORDER_QTY"]."\",
                 \"".$item["AMT"]."\"        
                ],";
        }
         $dataSet = rtrim($dataSet,",");        
              $body .= "  
              <script>  
              var dataSet = [".$dataSet."];
              var table;        
              table =  $(document).ready( function () {
               $('#resultTable').DataTable({                
              data:
              dataSet, 
              'lengthMenu':[-1]
              });
            });
            </script>
          ";   
    }
    $body .= "<b>Total : ". $total."</b><br><br>";
    if ($action != "no")
    {
        if($action == "rcv") 
        {
          if ($rr["LINKEDPO"] != null)
            $body .= "<br>LINKED PONUMBER<br><input id='linkedponumber' style='width:300px' name='linkedpo' type='text' value='".$rr["LINKEDPO"]."'><br>";
          else 
            $body .= "<br>LINKED PONUMBER<br><input id='linkedponumber' style='width:300px' name='linkedpo' type='text'><br>";
        }
        else 
        {
           $body .= "<br>LINKED PONUMBER : ".$rr["LINKEDPO"]."<br>";
        }

        $body .= "
            (Sign with your trackpad or mouse)<br>
            <button type='button' onclick='zkSignature.clear()'>
                Clear Signature
               </button> 
               <div id='canvas' style='width:466px;border:1px solid black;!important'>
                Canvas is not supported.
               </div>
               <script>
                zkSignature.capture();
               </script>      
               <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                SEND
               </button><center><br><br><br>";
    }         
    return $body;
}

// Damaged Items
/*
function renderSetRecordedDamagedItems($data){

}
*/

function renderLowseller($data)
{ 
  $items = $data;
  $body = "";  
                   
    if ($items != null)
    {   
       $body .= "Total : ".count($items);        
       $body .= "
       <center>                 
       <form target=_blank action='export.php' method='POST'> 
         <input type='hidden' name='type' value='lowseller'>
         <input type='submit' value='EXPORT'>     
        
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th>
          <th>BARCODE</th>
          <th>Percent SOLD</th>
          <th>LOCATION</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Packing</th>                    
          <th>TOTAL SOLD</th>          
          <th>TOTAL THROWN</th>            
          <th>LASTRECEIVEDATE</th>           
          <th>TOTAL RECEIVE</th>           
          <th>VENDNAME</th>
          <th>ON HAND</th> 
          <th>WH1</th> 
          <th>WH2</th> 
          <th>Category</th>            
          <th>LAST COST</th>          
          <th>PRICE</th>  
          <th>DISCOUNT</th>         
          <th></th>
        </tr></thead>
        <tfoot><tr>
          <th>Picture</th>
          <th>BARCODE</th>
          <th>Percent SOLD</th>
          <th>LOCATION</th>
          <th>Name</th>
          <th>Name-KH</th>
          <th>Packing</th>          
          <th>TOTAL SOLD</th>          
          <th>TOTAL THROWN</th>  
          <th>TOTAL RECEIVE</th>   
          <th>LASTRECEIVEDATE</th>
          <th>VENDNAME</th>
          <th>ON HAND</th> 
          <th>WH1</th> 
          <th>WH2</th> 
          <th>Category</th>            
          <th>LAST COST</th>          
          <th>PRICE</th>
          <th>DISCOUNT</th> 
          <th></th>
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

      $dataSet = "";
       foreach($items as $item)
       {
        $item["TOTALSALE"] = truncatePrice($item["TOTALSALE"]);
        $item["ONHAND"] = truncatePrice($item["ONHAND"]);
        $item["WH1"] = truncatePrice($item["WH1"]);
        $item["WH2"] = truncatePrice($item["WH2"]);
        $item["COST"] = truncatePrice($item["LASTCOST"]);
        $item["PRICE"] = truncatePrice($item["PRICE"]);
        $item["TOTALTHROWN"] = truncatePrice($item["TOTALTHROWN"]);      
        $item["TOTALRECEIVE"] = truncatePrice($item["TOTALRECEIVE"]);                      
        $item["PERCENTSALE"] =  truncatePrice($item["PERCENTSALE"]);
        $item["LASTCOST"] = truncatePrice($item["LASTCOST"]);
        $item["DISCPERCENT"] = truncatePrice($item["DISCPERCENT"]);

         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"]."\">',
          '".$item["PRODUCTID"]."',          
          \"".$item["PERCENTSALE"]."\",
          \"".$item["LOCATION"]."\",
          \"".$item["PRODUCTNAME"]."\",
          \"".$item["PRODUCTNAME1"]."\",
          \"".$item["PACKINGNOTE"]."\",                           
          '".$item["TOTALSALE"]."',
          '".$item["TOTALTHROWN"]."',   
          '".$item["LASTRECEIVEDATE"]."',   
          '".$item["TOTALRECEIVE"]."',          
          '".$item["VENDNAME"]."',   
          '".$item["ONHAND"]."',
          '".$item["WH1"]."',
          '".$item["WH2"]."',
          '".$item["CATEGORYID"]."',
          '".$item["LASTCOST"]."',
          '".$item["PRICE"]."', 
          '".$item["DISCPERCENT"]."',    
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");      
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({           
           data:dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }else{
      $body .= "<center><h4>No Results</h4></center><br><br><br>";
    }
  return $body;  
  
}


function renderDamagedItems($data)
{
   $items = $data;
  
   $body = "Total : ".count($items);              
       $body .= "<table border='1'>
       <tr>
          <th>ID</th><th>IMAGE</th><th>AUTHOR</th><th>VALIDATOR</th><th>STATE</th><th>DATECREATED</th><th>DATEMODIFIED</th>
       </tr>";  

      foreach($items as $item)
      {           
        $body .=  
             "<tr>               
                <td align='center'>".$item["ID"]."</td>
                <td align='center'><img height='50px' src='data:image/png;base64,".$item["IMAGE"]."'></td>
                <td align='center'>".$item["CREATOR"]."</td>                                
                <td align='center'>".$item["DATECREATED"]."</td> 
                <td align='center'>".$item["VALIDATOR"]."</td>                                
                <td align='center'>".$item["DATEMODIFIED"]."</td> 

                
            </tr>
            <tr><td colspan='6'><table>
            <tr>
              <th>BARCODE</th><th>NAME</th><th>IMAGE</th><th>IMAGEDAMAGED</th><th>QTY</th><th>QTY UPD</th><th>REASON</th><th>COMMENT</th>
              <th>DATECREATED</th><th>DATEMODIFIED</th>          
             </tr>";

            foreach($item["ITEMS"] as $itemDamaged)
            {
              $body .=
              "<tr>
              <td>".$itemDamaged["BARCODE"]."</td>
              <td>".$itemDamaged["NAME"]."</td>
              <td><img height='200px' src='data:image/png;base64,".$itemDamaged["IMAGE"]."'></td>
              <td><img height='200px' src='data:image/png;base64,".$itemDamaged["IMAGEDAMAGED"]."'></td>
              <td>".$itemDamaged["QUANTITY"]."</td>
              <td>".$itemDamaged["QUANTITYMODIFIED"]."</td>
              <td>".$itemDamaged["REASON"]."</td>
              <td>".$itemDamaged["COMMENT"]."</td>
              <td>".$itemDamaged["DATECREATED"]."</td>
              <td>".$itemDamaged["DATEMODIFIED"]."</td>
              </tr>";

            }

         $body .= "<table></tr>";                
      }
      $body .= "</table><br><br>";
    return $body; 
}


function renderVault($data)
{
   $items = $data;
  
   $body = "Total : ".count($items);              
       $body .= "<table border='1'>
       <tr>
         <th>DETAILS</th><th>STATUS</th><th>ID</th> 
         <th>STR</th><th>STR SIG</th><th>STR DATE</th>
         <th>WH</th><th>WH SIG</th><th>WH DATE</th>
         <th>PCH</th><th>PCH SIG</th><th>PCH DATE</th> 
         <th>CREATED</th><th>AUTHOR</th>
         
       </tr>";  

      foreach($items as $item)
      {         
        if ($item["storeignature"] != null)
          $strsig = "<img height='150px' src='data:image/png;base64,".$item["storesignature"]."'>";
        else 
          $strsig = "N/A";

        if ($item["warehousesignature"] != null)
          $whsig = "<img height='150px' src='data:image/png;base64,".$item["warehousesignature"]."'>";
        else 
          $whsig = "N/A";

        if ($item["purchasesignature"] != null)
          $pchsig = "<img height='150px' src='data:image/png;base64,".$item["purchasesignature"]."'>";
        else 
          $pchsig = "N/A";


        $body .=  "<tr>  
                   <td><a href='http://phnompenhsuperstore.com/intra/?display=vaultdetail&entity=vaultdetail&ID=".$item["ID"]."&action=".$_GET["entity"]."'>VIEW</a></td>             
                   <td>".$item["status"]."</td>
                   <td>".$item["ID"]."</td>

                   <td>".$item["storeuser"]."</td>
                   <td>".$strsig."</td>
                   <td>".$item["storedate"]."</td>

                   <td>".$item["warehouse"]."</td>
                   <td>".$whsig."</td>
                   <td>".$item["warehousedate"]."</td>


                   <td>".$item["purchaseruser"]."</td>
                   <td>".$pchsig."</td>
                   <td>".$item["purchaserdate"]."</td>
                                             
                   <td>".$item["created"]."</td>
                   <td>".$item["user"]."</td>

                  </tr>";                         
      }
      $body .= "</table><br><br>";
    return $body; 
}


function renderVaultDetail($data){

  $items = $data["items"]; 
  $vault = $data["vault"];

  $body = $vault["user"]." ".$vault["created"]."<br>";

  $body .= "
  <center>
  <form target=_blank action='export.php' method='POST'>
  <input type='hidden' name='type' value='vault' />
  <input type='submit' value='EXPORT' />


  <table border='1'>
        <tr>
          <th>IMAGE</th>
          <th>ID</th>
          <th>PRODUCTNAME</th>
          <th>ONHAND</th>
          <th>LOCATION</th>
          <th>ORDER QTY(STORE)</th>
          <th>ORDER QTY(WH)</th>
          <th>ORDER QTY(PCH)</th>

          <th></th>
        </tr>";

 
  $strdisabled = ($_GET["action"] == "vaultstrtodo" || $_GET["action"] == "vaultstrtodo") ? "" : "disabled";
  $whdisabled = ($_GET["action"] == "vaultwhtodo" || $_GET["action"] == "vaultwhtodo") ? "" : "disabled";
  $pchdisabled = ($_GET["action"] == "vaultpchtodo" || $_GET["action"] == "vaultpchtodo") ? "" : "disabled";


  if ($items != null){
      foreach ($items as $item){
          $body .= "<tr>";
          $body .= "<td><img height='200px' src='http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["ID"]."'></td>";
          $body .= "<td>".$item["ID"]."</td>";
          $body .= "<td>".$item["PRODUCTNAME"]."</td>";
          $body .= "<td>".$item["ONHAND"]."</td>";
          $body .= "<td>".$item["LOCATION"]."</td>";

          $body .= "<td><input type='text' value='".$item["ORDERQUANTITY_STR"]."' ".$strdisabled."></td>";
          $body .= "<td><input type='text' value='".$item["ORDERQUANTITY_WH"]."' ".  $whdisabled."></td>";
          $body .= "<td><input type='text' value='".$item["ORDERQUANTITY_PCH"]."' ".$pchdisabled."></td>";
          $body .= "<td><input type='hidden' name='".$item["ID"]."' value='".json_encode($item)."')></td>";
          $body .= "</tr>";
      }

  }

  $body .= "</table></form><center>";


  $body .=  "<center>
                  <input type='hidden' id='identifier' value='".$vault["ID"]."'>        
                  <input type='hidden' id='detailtype' value='vault'>                            
                  <input type='hidden' id='author' name='author' value='".$_SESSION["USER"]["login"]."'>
                  (Sign with your trackpad or mouse)<br>

                <button type='button' onclick='zkSignature.clear()'>Clear Signature</button>
            
                 <div id='canvas' style='width:466px;border:1px solid black;!important'>
                  Canvas is not supported.
                 </div>

                 <script>
                  zkSignature.capture();
                 </script>
          
                 <button style='font-size:20pt;background-color:#009183;color:white' type='button' onclick='zkSignature.send()'>
                  SEND
                 </button><center><br><br><br>";
             
  return $body;

}


function renderPriceProgression($data)
{
   $items = $data;
   
   $barcode = isset($_GET["barcode"]) ? $_GET["barcode"] : "";  
   $vendorid = isset($_GET["vendorid"]) ? $_GET["vendorid"] : "";   
   $vendor = isset($_GET["vendor"]) ? $_GET["vendor"] : "";  

   $body = "";  
   $body .= "<div class='col s12 m8 l9'>
              <div class='row margin'>
                <form class='col s12' method='GET'>
                <div class='row'>
                  <div class='input-field col s12'>                   
                    
                  <textarea id='barcode' name='barcode'  >".$barcode."</textarea>
                    <label for='barcode' class='center-align'>Barcode</label>               
                  </div>
                 </div>
              
                <div class='row'>
                    <div class='input-field col s12'>                   
                      <input id='vendorid' name='vendorid' type='text' value='".$vendorid."'>
                      <label for='vendorid' class='center-align'>Vendor ID</label>               
                    </div>
                </div>  

                <div class='row'>
                    <div class='input-field col s12'>                   
                      <input id='vendor' name='vendor' type='text' value='".$vendor."'>
                      <label for='vendor' class='center-align'>Vendor</label>               
                    </div>
                </div>

            
              <div class='row'>    
                     <div class='input-field col s12'>             
                      <input type='hidden' name='display' value='priceprogression'>
                      <input type='hidden' name='entity' value='priceprogression'>
                      <input type='hidden' name='action' value='priceprogression'>
                      <input type='submit' class='btn waves-effect waves-light col s12 grey darken-2' value='Show'>
                     </div>
                  </div>
            </form>
              </div>
             </div> 
              ";                             
    if ($items != null)
    { 

       $body .= "Total : ".count($items);
       
       $body .= "
       <center>                 
       <form target=_blank action='export.php' method='POST'>      
        <input type='hidden' name='type' value='progression'>
        <input type='submit' value='EXPORT'>
        <table border='1' id='resultTable'>
        <thead><tr>
          <th>Picture</th><th>BARCODE</th><th>NAME</th>
          <th>Last1</th><th>Last2</th><th>Last3</th>
          <th>Last4</th><th>Last5</th><th></th>
        </tr></thead>
        <tfoot><tr>
          <th>Picture</th><th>BARCODE</th><th>NAME</th>
          <th>Last1</th><th>Last2</th><th>Last3</th>
          <th>Last4</th><th>Last5</th><th></th>
        </tr></tfoot>
        </table>              
       </form>
      <br><br>";

       foreach($items as $item)
       {

        $item["last1"] = "";
        $item["last2"] = "";
        $item["last3"] = "";
        $item["last4"] = "";
        $item["last5"] = "";
        
        $i = 1;
        foreach($item["lasts"] as $oneLast){
          $item["last".$i] = "RCV: ".$oneLast["RCV"]."<hr>PCH: ".$oneLast["PCH"]."<hr>VENDOR: ".$oneLast["VENDNAME"]."<hr>".$oneLast["TRANDATE"]."<hr>".$oneLast["VAT_PERCENT"]."<hr>".$oneLast["TRANCOST"];
           $i++; 
        }
        $item["PRODUCTNAME"] = str_replace("'","", $item["PRODUCTNAME"]);
         $dataSet .= "[
          '<img height=\"50px\" src=\"http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["BARCODE"]."\">',
          '".$item["BARCODE"]."',
          '".$item["PRODUCTNAME"]."',           
          \"".$item["last1"]."\",
          \"".$item["last2"]."\",
          \"".$item["last3"]."\",
          \"".$item["last4"]."\",
          \"".$item["last5"]."\",
          
          \"<input type='hidden' name='".$item["PRODUCTID"]."' value='".escapeJS(json_encode($item))."')>\"],";
        }
        $dataSet = rtrim($dataSet,",");       
        $body .= "  
        <script>  
        var dataSet = [".$dataSet."];
        var table;        
        table =  $(document).ready( function () {
         $('#resultTable').DataTable({                
        data:
        dataSet, 
        'lengthMenu':[-1]
        });
      });
      </script>
    ";   
    }
  return $body;    

}


?>


