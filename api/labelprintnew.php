<?php

require_once("RestEngine.php"); 
set_time_limit(0);
?>

<html>

<head>
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/canvas-toBlob.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
	<style>

        body{
            margin:0px;
            padding:0px;
        }

        h1,h2,p,span,div{
            margin: 0;
        }

		#target{    	
        background-color: white;
    	width: 210mm;
        height: 297mm;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
    	margin: auto;                               
        border :solid 0px;
        padding-top : -0.15cm;
		}

		#content{
          vertical-align: center;
		  width: 100%;
		  height: 100%;
		  margin-left: 2px;
		  padding:0px;
		  /*background-color: rgba(128,128,128,0.6);*/

		}
        .prices{            
            position: absolute;                 
            top:-2px;            
            left:0px;
            
        }


		.priceFrame{
            border:1px black solid;
            top:0px;
            left:0px;
            width:160px;
            height:30px;
            position: absolute;
        }
		.pricetag{
			height: 3.54cm;
			width:6.79cm;
			background-color: white;
			position: relative;
			border : 0px dashed #009183;
            margin:0px;
            padding:0px;
		}

        .ppsslogo{
            top:5px;
            right:5px;   
            position: absolute;
            width: 30px;
            height: 30px;    
            z-index: 10;
        }


        .borderLeft{
            border-style: solid;
            border-width: 0px 1px 1px 0px;
            border-color: #009183;
            position: absolute;                 
            top:0px;
            height: 25px;
            left:5px;
            width: 85px;
        }

        .borderRight{
            border-style: solid;
            border-width: 0px 0px 1px 1px;
            border-color: #009183;
            position: absolute;                 
            top:0px;
            height: 25px;
            width: 75px;
            left:90px;
        }

        .rielSymbol{
            font-size: 20pt;   
            position: absolute;  
            color: #009183;               
            top:-8px;            
            left:62px;   
            content: "\17DB";  
        }

		.pricetag .rielprice{
    		/*color:#009183; */
            color:black;
    	}


	    .pricetag .dollarprice{
    		/*color:#009183; */
            color:black;
    	}



    	
        @font-face {
        font-family: WesFy;
        src: url(fonts/Wes-FY-Bold.ttf);
        }

        @font-face {
        font-family: Dangrek;
        src: url(fonts/Dangrek.ttf);
        }


    	.nameEN{			
    		left:7px;      	
    		position: absolute;
    		width: 155px;    
    		height: 45px;	    		
            white-space: nowrap;
            overflow: hidden;
            font-family: WesFy;
    	
    	}

    	.pricetag .nameEN{
    		color: black;
    	}

    	

    	.nameKH{    		
			top:25px;
    		left:5px;  
    		width: 155px;    		
    		height: 24px;    		
    		position: absolute;
    		font-size: 9pt;   
            white-space: nowrap;
            font-family: Dangrek;
               		
    	}
    	
    	.pricetag .nameKH{
    		color:#009183;
    	}
    	.pricetagGreen .nameKH{
    		color:#ffed00;
    	}
    	.pricetagblack .nameKH{
    		color:#009183;
    	}
    	

        .rightSide{
            height: 130px;
            width: 85px;   
            top:0px;
            right:0px;  
            border-left : 1px solid #009183;
            
            position: absolute;            
        }
        .productImg{
            top:5px;
            right:0px;  
            position: absolute;            
            background-color: white;
            height: 100px;
            width: 85px;   
            display: flex;
            text-align: center;
            align-items: center;                    
            
        }   
        .country{           
            width:70px;
            bottom:2px;
            right:2px;                      
            font-size: 10pt;
            text-align: center;
            position: absolute;
            font-family: WesFy;
        }

    	.barcode{    		
        
    		background-size: cover;    	
    		bottom:14px;
    		left:5px;    		
    		position: absolute;
            width: 160px;                
    	}

    	.barcodeNumber{
    		width:160px;      		
    		bottom:1px;
    		left:5px;    		
            pointer-events: none;
            text-decoration: none;
            color:inherit;
            
    		position: absolute;    		
    		font-size: 8pt;
            text-decoration-color: red;
    		text-align: center;
            font-family: WesFy;

    	}
    	.pricetaggreen .barcodeNumber{
    		color: white;
    	}
    	.pricetag .barcodeNumber{
    		color: black;
    	}

    	.pricetagblack .barcodeNumber{
    		color: white;
    	}



    	

    	.pricetag .country{
    		color:#009183;
    	}
    



    	.return {    		
    		
    		width:50px;     		
    		bottom:6px;
    		right:92px;
    		font-size:4pt;    		    		
    		position: absolute;
    		text-align: right;
    		vertical-align: top;

    	}
    	.pricetag .return{
    		color:black;
    	}


        .packing {           
            
            width:50px;             
            bottom:0px;
            right:92px;
            font-size:4pt;                      
            position: absolute;
            text-align: right;
            vertical-align: top;

        }

        .unit {           
                       
            bottom:0px;
            left:8px;
            font-size:4pt;                      
            position: absolute;
            vertical-align: top;

        }



        .pricetag .packing{
            color:black;
        }

        .salefactor{           
            width:160px;            
            bottom:8px;
            left:0px;
            font-size:5pt;                      
            position: absolute;
            text-align: left;
            vertical-align: top;
        }


        #generate{
            background-color:#009183;
            font-size: 40pt;
            color: white;
        }
   </style>
</head>

<?php 

function fakeItem()
{
    $item["nameEN"] = "Trident Mint Bliss Sugar Free Gum";
    $item["nameKH"] = "នំស្រួយរូបត្រី"; 
    $item["productImg"] = "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";
    $item["packing"] = "1x1-pcs";        
    $item["return"] = "No";
    $item["country"] = "USA";
    $item["rielPrice"] = "4600"; 
    $item["dollarPrice"] = "$1.10"; 
    $item["salefactor"] = "1.000";
    $item["barcodeNumber"] = "012546001939";
    $item["barcodeImage"] = "iVBORw0KGgoAAAANSUhEUgAAAJcAAAAeAQMAAAAb7h4qAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAACRJREFUKJFjeFPxeE7B4eI+hUd2hycUysv2yecxjIqNilEoBgDYyRts7BFLTwAAAABJRU5ErkJggg==";
    return $item;
}

/*
function render($items = null)
{    
    
    $item = fakeItem();

    echo "<table cellspacing='0' cellpadding='16' border='0'>";    
    $close = false;
    for($i = 0;$i < 21;$i++)
    {
        if ($i  % 3 == 0 && $i != 0)
        {
            $close = !$close;
            if ($close == true)
                echo "<tr>";        
            else
                echo "</tr>";
        }
        echo "<td align='center'>".PriceTag($item)."</td>";
        $items[$i]; 
    }   
    echo "</table>";
    
}
*/

function render($items)
{
 
	echo "<center><table cellspacing='2' cellpadding='2' border='0' >";	
	$close = false;
	for($i = 0;$i < count($items);$i++)
	{
		if ($i  % 3 == 0 && $i != 0)
		{
			$close = !$close;
			if ($close == true)
				echo "<tr>";		
			else
				echo "</tr>";
		}
		echo "<td >".PriceTag($items[$i])."</td>";
		$items[$i];	
	}	
	echo "</table><center>";    
}


function renderName($string,$limit = 16,$pad = "...")
{
    if (strlen($string) < $limit)
    {
        return "
        <div class='nameEN' style='font-size:13pt;top:55px'>".$string."</div>";
    }
    else
    {        
        $words = explode(' ',$string);        
        $len = 0;
        $wordbreak = 0;
        foreach($words as $word) 
        {
            $len += strlen($word);
            $wordbreak++;
            if ($len > $limit)
                break;       
        }        
        $count = 0;
        $line1 = "";
        foreach($words as $word) 
        {
            $line1 .= $word." ";
            $count++;
            if ($count == $wordbreak -1)
                break;            
        }
        $line2 = "";
        $lastPos = $wordbreak;
        for($i = $wordbreak - 1;$i < count($words);$i++)
        {
            $line2 .= $words[$i]." ";
            if (strlen($line2) > $limit)
            {
                //$line2 = substr($line2, 0, $limit);        
                $lastPos = $i;
                break;
            }
        }
        
        $line3 = "";        
        
        for($i = $lastPos + 1;$i < count($words);$i++)
        {
            $line3 .= $words[$i]." ";
            if (strlen($line3) > $limit)
            {
                $line3 = substr($line3, 0, $limit) . $pad;        
                break;
            }
        }

        if ($line3 == "")
        return "<div class='nameEN' style='font-size:9pt;top:52px'>$line1<br>$line2<br>$line3</div>"; 
        
        return "
        <div class='nameEN' style='font-size:9pt;top:48px'>$line1<br>$line2<br>$line3</div>        
        ";   
    }
    
}

function renderNameKH($string,$pad = "...")
{
    if (strlen($string) < 16)
    {
        return "
        <div class='nameKH' style='font-size:13pt;top:25px'>".$string."</div>";
    }
    else if (strlen($string) > 16 && strlen($string) < 100)
    {   
        return "
        <div class='nameKH' style='font-size:11pt;top:25px'>".$string."</div>";       
    }
    else if (strlen($string) > 100)
        return "<div class='nameKH' style='font-size:8pt;top:28px'>".$string ." ". strlen($string)."</div>";   
}

function PriceTag($item)
{

	
	$rielPrice = $item["rielPrice"] . " R";
	$dollarPrice = $item["dollarPrice"];
	$nameKH = substr($item["nameKH"],0,82);
	$productImg = $item["productImg"];


	$barcodeImg = $item["barcodeImage"];
	$unit = $item["unit"];


	$barcodeNumber = $item["barcodeNumber"];
	$packing = $item["packing"];

	$return = $item["return"];
    $salefactor = $item["salefactor"];
	$country = $item["country"];	
    
    $diff = "";
    if (strlen($rielPrice) == 8){
        $rielPrice = "<span style='font-size:13pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:13pt'>".$dollarPrice."</span>";
        $diff="style='height:30px'";
    }
    if (strlen($rielPrice) == 9){
        $rielPrice = "<span style='font-size:11pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:11pt'>".$dollarPrice."</span>";
        $diff="style='height:28px'";
    }
    if (strlen($rielPrice) == 10) {
        $rielPrice = "<span style='font-size:9pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:11pt'>".$dollarPrice."</span>";
        $diff="style='height:24px'";
    }
    if (strlen($rielPrice) > 10) {
        $rielPrice = "<span style='font-size:8pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:10pt'>".$dollarPrice."</span>";
        $diff="style='height:24px'";
    }

    $body = "   

    <div class='priceTag'>
                    
        <div class='borderLeft' $diff></div>
        <div class='borderRight' $diff></div>             

        <div class='prices'>
          <table style='color:#009183;font-weight:900;font-size:15pt' >
          <tr valign='center'>
            <td align='left' width='85px'>&nbsp;$rielPrice</td>
            <td align='center' width='85px'>$dollarPrice</td>
          </tr>
          </table>        
        </div>      
        ".renderNameKH($item["nameKH"])."
        ".renderName($item["nameEN"]).
        "
                
        <div class='rightSide'>
           
            <div class='ppsslogo'><img  style='max-height:30px;max-width:30px;height:auto;width:auto;' src='img/yellowborder.png'></div>

            <div class='productImg' valign='center'><img style='max-height:85px;max-width:85px;height:auto;width:85px;' 
                src='data:image/png;base64, $productImg'></div>
        </div>

        <div class='barcode' align='center' ><img height='26px' src='data:image/png;base64,$barcodeImg'></div>
        <div class='barcodeNumber'>$barcodeNumber</div>
        
        <div class='packing'>
            $packing
        </div> 

        <div class='return'>
            $return
        </div>";  

    if ($item["isPack"] == 'yes'){
        $body .= " <div class='unit' style='background-color:red;color:white'>
                    $unit
                   </div>";

    }else{
        $body .= " <div class='unit'>
                    $unit
                   </div>";
    }


    $body .= "<div class='salefactor'>            
        </div>
        

        <div class='country'>
            $country
        </div>
    </div>
    ";

    return $body;
       

        
}

?>
<body>

	<?php 

	?>
    <br>
    <br>
    <center><button id="generate">Download Image</button></center>
    <br>
    <br>
    <img id="screenshot" alt=""/>
	<div id="target" >
	<div id="content" >		
		<?php 
			if (isset($_GET["barcodes"]))
			{

                $barcodes = str_replace(" ","",$_GET["barcodes"]);							                        	               
                $labels = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/itemlabels/".$barcodes);                 
                //var_dump($labels);
				render($labels);				
                //render(null);
			}		
		?>
	</div>
	</div>
    
    
    <script>


        function openImage(base64) {
            var image = new Image();
            image.src = "data:image/jpg;base64," + data.d;
            document.body.appendChild(image);
        }

        function download(filename, text) {
          var element = document.createElement('a');
          element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
          element.setAttribute('download', filename);

          element.style.display = 'none';
          document.body.appendChild(element);

          element.click();

          document.body.removeChild(element);
        }




         $('#generate').click(function(){           
            let opt = { scale : 4};
            html2canvas(document.getElementById('target'),opt).then(function(canvas) {
            
            canvas.toBlob(function(blob){
                saveAs(blob, 'lastlabels.jpg');                
            },'image/png');
             
            
            },);
        });

    </script>
</body>
</html>