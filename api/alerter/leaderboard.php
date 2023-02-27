<?php 
require_once("../RestEngine.php");

    function Evol($last,$current){
        if ($last == 0)
            return ((($current - $last) / 1)*100);
        else 
        return ((($current - $last) / $last)*100);
    }

    function IMG($sign){
        return "./img/Sign".(ucfirst(strtolower($sign))).".png";
    }

    function renderLeaderBoard($data){
        //var_dump($data);
        echo $data["RAT"]["OCCUPANCY_LAST"]."|".$data["RAT"]["OCCUPANCY_CURRENT"];
        $data["OCCUPANCY_RAT_EVOL"] =   Evol($data["RAT"]["OCCUPANCY_LAST"],$data["RAT"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_OX_EVOL"] =   Evol($data["OX"]["OCCUPANCY_LAST"],$data["OX"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_TIGER_EVOL"] =   Evol($data["TIGER"]["OCCUPANCY_LAST"],$data["TIGER"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_HARE_EVOL"] =   Evol($data["HARE"]["OCCUPANCY_LAST"],$data["HARE"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_DRAGON_EVOL"] =   Evol($data["DRAGON"]["OCCUPANCY_LAST"],$data["DRAGON"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_SNAKE_EVOL"] =   Evol($data["SNAKE"]["OCCUPANCY_LAST"],$data["SNAKE"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_HORSE_EVOL"] =   Evol($data["HORSE"]["OCCUPANCY_LAST"],$data["HORSE"]["OCCUPANCY_CURRENT"]);
        $data["OCCUPANCY_GOAT_EVOL"] =   Evol($data["GOAT"]["OCCUPANCY_LAST"],$data["GOAT"]["OCCUPANCY_CURRENT"]);

        $data["TRANSFER_RAT_EVOL"] =   Evol($data["RAT"]["TRANSFER_LAST"],$data["RAT"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_OX_EVOL"] =   Evol($data["OX"]["TRANSFER_LAST"],$data["OX"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_TIGER_EVOL"] =   Evol($data["TIGER"]["TRANSFER_LAST"],$data["TIGER"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_HARE_EVOL"] =   Evol($data["HARE"]["TRANSFER_LAST"],$data["HARE"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_DRAGON_EVOL"] =   Evol($data["DRAGON"]["TRANSFER_LAST"],$data["DRAGON"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_SNAKE_EVOL"] =   Evol($data["SNAKE"]["TRANSFER_LAST"],$data["SNAKE"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_HORSE_EVOL"] =   Evol($data["HORSE"]["TRANSFER_LAST"],$data["HORSE"]["TRANSFER_CURRENT"]);
        $data["TRANSFER_GOAT_EVOL"] =   Evol($data["GOAT"]["TRANSFER_LAST"],$data["GOAT"]["TRANSFER_CURRENT"]);

        $data["SALE_RAT_EVOL"] =   Evol($data["RAT"]["SALE_LAST"],$data["RAT"]["SALE_CURRENT"]);
        $data["SALE_OX_EVOL"] =   Evol($data["OX"]["SALE_LAST"],$data["OX"]["SALE_CURRENT"]);
        $data["SALE_TIGER_EVOL"] =   Evol($data["TIGER"]["SALE_LAST"],$data["TIGER"]["SALE_CURRENT"]);
        $data["SALE_HARE_EVOL"] =   Evol($data["HARE"]["SALE_LAST"],$data["HARE"]["SALE_CURRENT"]);
        $data["SALE_DRAGON_EVOL"] =   Evol($data["DRAGON"]["SALE_LAST"],$data["DRAGON"]["SALE_CURRENT"]);
        $data["SALE_SNAKE_EVOL"] =   Evol($data["SNAKE"]["SALE_LAST"],$data["SNAKE"]["SALE_CURRENT"]);
        $data["SALE_HORSE_EVOL"] =   Evol($data["HORSE"]["SALE_LAST"],$data["HORSE"]["SALE_CURRENT"]);
        $data["SALE_GOAT_EVOL"] =   Evol($data["GOAT"]["SALE_LAST"],$data["GOAT"]["SALE_CURRENT"]);

        $data["OVERVIEW_RAT_EVOL"] = $data["OCCUPANCY_RAT_EVOL"] + $data["TRANSFER_RAT_EVOL"] + $data["SALE_RAT_EVOL"];
        $data["OVERVIEW_OX_EVOL"] = $data["OCCUPANCY_OX_EVOL"] + $data["TRANSFER_OX_EVOL"] + $data["SALE_OX_EVOL"];
        $data["OVERVIEW_TIGER_EVOL"] = $data["OCCUPANCY_TIGER_EVOL"] + $data["TRANSFER_TIGER_EVOL"] + $data["SALE_TIGER_EVOL"];
        $data["OVERVIEW_HARE_EVOL"] = $data["OCCUPANCY_HARE_EVOL"] + $data["TRANSFER_HARE_EVOL"] + $data["SALE_HARE_EVOL"];
        $data["OVERVIEW_DRAGON_EVOL"] = $data["OCCUPANCY_DRAGON_EVOL"] + $data["TRANSFER_DRAGON_EVOL"] + $data["SALE_DRAGON_EVOL"];
        $data["OVERVIEW_SNAKE_EVOL"] = $data["OCCUPANCY_SNAKE_EVOL"] + $data["TRANSFER_SNAKE_EVOL"] + $data["SALE_SNAKE_EVOL"];
        $data["OVERVIEW_HORSE_EVOL"] = $data["OCCUPANCY_HORSE_EVOL"] + $data["TRANSFER_HORSE_EVOL"] + $data["SALE_HORSE_EVOL"];
        $data["OVERVIEW_GOAT_EVOL"] = $data["OCCUPANCY_GOAT_EVOL"] + $data["TRANSFER_GOAT_EVOL"] + $data["SALE_GOAT_EVOL"];

        $overviewToSort = array();
        $overviewToSort["RAT"] = $data["OVERVIEW_RAT_EVOL"];    
        $overviewToSort["OX"] =  $data["OVERVIEW_OX_EVOL"];
        $overviewToSort["TIGER"] = $data["OVERVIEW_TIGER_EVOL"];
        $overviewToSort["HARE"] = $data["OVERVIEW_HARE_EVOL"];
        $overviewToSort["DRAGON"] = $data["OVERVIEW_DRAGON_EVOL"];
        $overviewToSort["SNAKE"] = $data["OVERVIEW_SNAKE_EVOL"];
        $overviewToSort["HORSE"] = $data["OVERVIEW_HORSE_EVOL"];
        $overviewToSort["GOAT"] = $data["OVERVIEW_GOAT_EVOL"];
        $sortedOverview = array();        
        while(count($overviewToSort) > 0){
            $min = 0;
            $sign = "";
            foreach($overviewToSort as $key => $value ){
                if ($min == 0 || $value < $min){
                    $sign = $key;
                    $min = $value;    
                }
            }
            array_push($sortedOverview, array("SIGN" => $sign, "VALUE" => $value));
            unset($overviewToSort[$sign]);
        }

        $occupancyToSort = array();
        $occupancyToSort["RAT"] = $data["OCCUPANCY_RAT_EVOL"];    
        $occupancyToSort["OX"] =  $data["OCCUPANCY_OX_EVOL"];
        $occupancyToSort["TIGER"] = $data["OCCUPANCY_TIGER_EVOL"];
        $occupancyToSort["HARE"] = $data["OCCUPANCY_HARE_EVOL"];
        $occupancyToSort["DRAGON"] = $data["OCCUPANCY_DRAGON_EVOL"];
        $occupancyToSort["SNAKE"] = $data["OCCUPANCY_SNAKE_EVOL"];
        $occupancyToSort["HORSE"] = $data["OCCUPANCY_HORSE_EVOL"];
        $occupancyToSort["GOAT"] = $data["OCCUPANCY_GOAT_EVOL"];
        $sortedOccupancy = array();
        while(count($occupancyToSort) > 0){
            $min = 0;
            $sign = "";
            foreach($occupancyToSort as $key => $value ){
                if ($min == 0 || $value < $min){
                    $sign = $key;
                    $min = $value;    
                }
            }
            array_push($sortedOccupancy, array("SIGN" => $sign, "VALUE" => $value));
            unset($occupancyToSort[$sign]);
        }

        $transferToSort = array();
        $transferToSort["RAT"] = $data["OCCUPANCY_RAT_EVOL"];    
        $transferToSort["OX"] =  $data["OCCUPANCY_OX_EVOL"];
        $transferToSort["TIGER"] = $data["OCCUPANCY_TIGER_EVOL"];
        $transferToSort["HARE"] = $data["OCCUPANCY_HARE_EVOL"];
        $transferToSort["DRAGON"] = $data["OCCUPANCY_DRAGON_EVOL"];
        $transferToSort["SNAKE"] = $data["OCCUPANCY_SNAKE_EVOL"];
        $transferToSort["HORSE"] = $data["OCCUPANCY_HORSE_EVOL"];
        $transferToSort["GOAT"] = $data["OCCUPANCY_GOAT_EVOL"];
        $sortedTransfer = array();
        while(count($transferToSort) > 0){
            $min = 0;
            $sign = "";
            foreach($transferToSort as $key => $value ){
                if ($min == 0 || $value < $min){
                    $sign = $key;
                    $min = $value;    
                }
            }
            array_push($sortedTransfer, array("SIGN" => $sign, "VALUE" => $value));
            unset($transferToSort[$sign]);
        }

        $saleToSort = array();
        $saleToSort["RAT"] = $data["OCCUPANCY_RAT_EVOL"];    
        $saleToSort["OX"] =  $data["OCCUPANCY_OX_EVOL"];
        $saleToSort["TIGER"] = $data["OCCUPANCY_TIGER_EVOL"];
        $saleToSort["HARE"] = $data["OCCUPANCY_HARE_EVOL"];
        $saleToSort["DRAGON"] = $data["OCCUPANCY_DRAGON_EVOL"];
        $saleToSort["SNAKE"] = $data["OCCUPANCY_SNAKE_EVOL"];
        $saleToSort["HORSE"] = $data["OCCUPANCY_HORSE_EVOL"];
        $saleToSort["GOAT"] = $data["OCCUPANCY_GOAT_EVOL"];
        $sortedSale = array();
        while(count($saleToSort) > 0){
            $min = 0;
            $sign = null;
            foreach($saleToSort as $key => $value )
            {
                if ($min == 0 || $value < $min){
                    $sign = $key;
                    $min = $value;    
                }
            }
            $obj = array();
            $obj["SIGN"] = $sign;
            $obj["VALUE"] = $min;
            array_push($sortedSale, $obj);
            unset($saleToSort[$sign]);
        }

        echo "
            <table border='1'> 
                <tr><td colspan='8' align='center'>OVERALL</td></tr>
                <tr><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>    
                <tr>        
                    <td><img src=".IMG($sortedOverview[0]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[1]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[2]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[3]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[4]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[5]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[6]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOverview[7]["SIGN"])."></td>        
                </tr>
                <tr>        
                    <td>".$sortedOverview[0]["VALUE"]."</td>
                    <td>".$sortedOverview[1]["VALUE"]."</td>
                    <td>".$sortedOverview[2]["VALUE"]."</td>
                    <td>".$sortedOverview[3]["VALUE"]."</td>
                    <td>".$sortedOverview[4]["VALUE"]."</td>
                    <td>".$sortedOverview[5]["VALUE"]."</td>
                    <td>".$sortedOverview[6]["VALUE"]."</td>
                    <td>".$sortedOverview[7]["VALUE"]."</td>   
                </tr>
            </table>
    
            <table border='1'>
                <tr><td colspan='8' align='center'>OCCUPANCY</td></tr>
                <tr><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
                <tr>        
                    <td><img src=".IMG($sortedOccupancy["0"]["SIGN"])."></td>        
                    <td><img src=".IMG($sortedOccupancy["1"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["2"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["3"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["4"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["5"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["6"]["SIGN"])."></td>
                    <td><img src=".IMG($sortedOccupancy["7"]["SIGN"])."></td>
                    
                </tr>
                <tr>        
                    <td>".$sortedOccupancy[0]["VALUE"]."</td>
                    <td>".$sortedOccupancy[1]["VALUE"]."</td>
                    <td>".$sortedOccupancy[2]["VALUE"]."</td>
                    <td>".$sortedOccupancy[3]["VALUE"]."</td>
                    <td>".$sortedOccupancy[4]["VALUE"]."</td>
                    <td>".$sortedOccupancy[5]["VALUE"]."</td>
                    <td>".$sortedOccupancy[6]["VALUE"]."</td>
                    <td>".$sortedOccupancy[7]["VALUE"]."</td>   
                </tr>
            </table>

            <table border='1'>
                <tr><td colspan='8' align='center'>TRANSFER</td></tr>
                <tr><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>                
                <tr>        
                    <td><img src='".IMG($sortedTransfer[0]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[1]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[2]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[3]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[4]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[5]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[6]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedTransfer[7]["SIGN"])."' ></td>        
                </tr>
                <tr>        
                    <td>".$sortedTransfer[0]["VALUE"]."</td>
                    <td>".$sortedTransfer[1]["VALUE"]."</td>
                    <td>".$sortedTransfer[2]["VALUE"]."</td>
                    <td>".$sortedTransfer[3]["VALUE"]."</td>
                    <td>".$sortedTransfer[4]["VALUE"]."</td>
                    <td>".$sortedTransfer[5]["VALUE"]."</td>
                    <td>".$sortedTransfer[6]["VALUE"]."</td>
                    <td>".$sortedTransfer[7]["VALUE"]."</td>   
                </tr>
            </table>

            <table border='1'>
                <tr><td colspan='8' align='center'>SALE</td></tr>
                <tr><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>                
                <tr>        
                    <td><img src='".IMG($sortedSale[0]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[1]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[2]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[3]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[4]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[5]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[6]["SIGN"])."' ></td>
                    <td><img src='".IMG($sortedSale[7]["SIGN"])."' ></td>        
                </tr>
                <tr>        
                    <td>".$sortedSale[0]["VALUE"] ."</td>
                    <td>".$sortedSale[1]["VALUE"] ."</td>
                    <td>".$sortedSale[2]["VALUE"] ."</td>
                    <td>".$sortedSale[3]["VALUE"] ."</td>
                    <td>".$sortedSale[4]["VALUE"] ."</td>
                    <td>".$sortedSale[5]["VALUE"] ."</td>
                    <td>".$sortedSale[6]["VALUE"] ."</td>
                    <td>".$sortedSale[7]["VALUE"] ."</td>   
                </tr>
            </table>
        ";
        
    }

    $data = RestEngine::GET("http://phnompenhsuperstore.com/api/api.php/score?YEAR=2023&MONTH=1");
    renderLeaderBoard($data);
?>



