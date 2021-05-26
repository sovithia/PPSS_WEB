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
        width: 29.7cm;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: auto;        

        
        }

        #content{
          vertical-align: center;
          width: 100%;
          height: 21cm;
          margin-left: 0px;
          padding:0px;
          /*background-color: rgba(128,128,128,0.6);*/

        }
        .prices{            
            position: absolute;                 
            top:0px;            
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
            height: 3.2355cm;
            width:6.55cm;
            background-color: white;
            position: relative;
            border : 1.5px solid #009183;
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
            height: 33px;
            left:5px;
            width: 80px;
        }

        .borderRight{
            border-style: solid;
            border-width: 0px 0px 1px 1px;
            border-color: #009183;
            position: absolute;                 
            top:0px;
            height: 33px;
            width: 80px;
            left:85px;
        }

        .rielSymbol{
            font-size: 20pt;   
            position: absolute;  
            color: #009183;               
            top:-10px;            
            left:73px;   
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



        .packing {
            width:150px;            
            top:30px;
            text-align: left;
            left:5px;                       
            font-size: 8pt;         
            position: absolute;
        }

        .pricetag .packing{
            color:#009183;
        }
        
        
        .nameEN{            
            left:7px;       
            position: absolute;
            width: 155px;    
            height: 30px;               
            white-space: nowrap;
            overflow: hidden;
        
        }

        .pricetag .nameEN{
            color: black;
        }

        

        .nameKH{            
            top:35px;
            left:5px;  
            width: 155px;           
            height: 22px;           
            position: absolute;
            font-size: 10pt;   
            white-space: nowrap;
            font-family: Battambang;
            overflow: hidden;               
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
            height: 122px;
            width: 85px;   
            top:0px;
            right:0px;  
            border-left : 2px solid #009183;
            
            position: absolute;            
        }
        .productImg{
            top:5px;
            right:0px;  
            position: absolute;            
            background-color: white;
            height: 95px;
            width: 85px;   
            display: flex;
            text-align: center;
            align-items: center;                    
            
        }   
        .country{           
            width:90px;
            bottom:10px;
            right:5px;                      
            font-size: 10pt;
            text-align: center;
            position: absolute;
        }

      

        

        .barcode{           
        
            background-size: cover;     
            bottom:18px;
            left:5px;           
            position: absolute;
            width: 160px;                
        }

        .barcodeNumber{
            width:160px;            
            bottom:5px;
            left:5px;           
            pointer-events: none;
            text-decoration: none;
            color:inherit;
            
            position: absolute;         
            font-size: 8pt;
            text-decoration-color: red;
            text-align: center;

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
            
            width:160px;            
            bottom:8px;
            left:0px;
            font-size:5pt;                      
            position: absolute;
            text-align: right;
            vertical-align: top;

        }
        .pricetag .return{
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
            font-size: 30pt;
            color: white;
        }
   </style>
</head>

<?php 


function render($items)
{       
    echo "<br>";    
    echo "<table cellspacing='0' cellpadding='0' >";    
    $close = false;
    for($i = 0;$i < count($items);$i++)
    {
        if ($i  % 4 == 0 && $i != 0)
        {
            $close = !$close;
            if ($close == true)
                echo "<tr>";        
            else
                echo "</tr>";
        }
        echo "<td>".PriceTag($items[$i])."</td>";
        $items[$i]; 
    }   
    echo "</table>";
}


function truncateStringAtWord($string, $limit, $break = ".", $pad = "...") {  
    
    if (strlen($string) <= $limit) return $string;
    
    if (false !== ($max = strpos($string, $break, $limit))) {
         
        if ($max < strlen($string) - 1) {            
            $string = substr($string, 0, $max) . $pad;        
        }    
    }
    return $string;
}

function renderName($string,$limit = 18,$pad = "...")
{
    if (strlen($string) < $limit)
    {
        return "
        <div class='nameEN' style='font-size:13pt;top:50px'>".$string."</div>";
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
        for($i = $wordbreak - 1;$i < count($words);$i++)
        {
            $line2 .= $words[$i]." ";
            if (strlen($line2) > $limit)
            {
                $line2 = substr($line2, 0, $limit) . $pad;        
                break;
            }
        }
        return "
        <div class='nameEN' style='font-size:8pt;top:50px'>$line1<br>$line2</div>        
        ";   
    }
    
}

function PriceTag($item)
{

    $color = 'pricetag';
    $rielPrice = $item["rielPrice"];
    $dollarPrice = $item["dollarPrice"];
    
    //$nameEN = truncateStringAtWord($item["nameEN"],10," ","");

    //$nameEN = str_replace("\n"," ",$nameEN);  
    $nameKH = substr($item["nameKH"],0,82);
    $productImg = $item["productImg"];

    $barcodeImg = $item["barcodeImage"];
    

    $barcodeNumber = $item["barcodeNumber"];
    $packing = $item["packing"];

    $return = $item["return"];
    $salefactor = $item["salefactor"];
    $country = $item["country"];    
    
    $diff = "";
    if (strlen($rielPrice) == 6){
        $rielPrice = "<span style='font-size:16pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:16pt'>".$dollarPrice."</span>";
        $diff="style='height:30px'";
    }
    if (strlen($rielPrice) == 7){
        $rielPrice = "<span style='font-size:13pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:13pt'>".$dollarPrice."</span>";
        $diff="style='height:28px'";
    }
    if (strlen($rielPrice) == 8) {
        $rielPrice = "<span style='font-size:10pt'>".$rielPrice."</span>";
        $dollarPrice = "<span style='font-size:12pt'>".$dollarPrice."</span>";
        $diff="style='height:24px'";
    }


    return "    

    <div class='$color'>
                    
        <div class='borderLeft' $diff></div>
        <div class='borderRight' $diff></div>     
        <span class='rielSymbol'>&#x17DB;</span>

        <div class='prices'>
          <table style='color:#009183;font-weight:900;font-size:17pt' >
          <tr valign='center'>
            <td align='left' width='80px'>$rielPrice</td>
            <td align='center' width='80px'>$dollarPrice</td>
          </tr>
          </table>        
        </div>      
        <div class='nameKH'>$nameKH</div>   
        ".renderName($item["nameEN"]).
        "
                
        <div class='rightSide'>
           
            <div class='ppsslogo'><img  style='max-height:30px;max-width:30px;height:auto;width:auto;' src='img/logo.png'></div>

            <div class='productImg' ><img style='max-height:83px;max-width:83px;height:auto;width:83px;' 
                src='data:image/png;base64, $productImg'></div>
        </div>

        <div class='barcode' align='center' ><img height='20px' src='data:image/png;base64,$barcodeImg'></div>
        <div class='barcodeNumber'>$barcodeNumber</div>
        

        <div class='return'>
            $return
        </div>      

        <div class='salefactor'>            
        </div>
        

        <div class='country'>
            $country
        </div>
    </div>
    ";
}

?>
<body>

    <?php 

    ?>
    <center><button id="generate">Download Image</button></center><br>
    <img id="screenshot" alt=""/>
    <div id="target" >
    <div id="content" >     
        <?php 
            if (isset($_GET["barcodes"]))
            {                
                $barcodes = str_replace(" ","%20",$_GET["barcodes"]);   
                $labels = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/itemlabels/".$barcodes);                 
                render($labels);                
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
            let opt = { scale : 1};
            html2canvas(document.getElementById('target'),opt).then(function(canvas) {
            
            canvas.toBlob(function(blob){
                saveAs(blob, 'lastlabels.jpg');                
            },'image/png');

             //var dataURL = canvas.toDataURL();             
             //document.getElementById('target').innerHTML = "";
             //document.getElementById("screenshot").src = dataURL;
            
            },);
        });

    </script>
</body>
</html>