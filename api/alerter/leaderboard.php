<?php 

    function Evol($last,$current){
        return ((($current - $last) / $last)*100)."%" ;
    }

    function renderLeaderBoard($data){
        $data["OCCUPANCY_RAT_EVOL"] =   Evol($data["OCCUPANCY_RAT_LAST"],$data["OCCUPANCY_RAT_LAST"]);
        $data["OCCUPANCY_OX_EVOL"] =   Evol($data["OCCUPANCY_OX_LAST"],$data["OCCUPANCY_OX_LAST"]);
        $data["OCCUPANCY_TIGER_EVOL"] =   Evol($data["OCCUPANCY_TIGER_LAST"],$data["OCCUPANCY_TIGER_LAST"]);
        $data["OCCUPANCY_HARE_EVOL"] =   Evol($data["OCCUPANCY_HARE_LAST"],$data["OCCUPANCY_HARE_LAST"]);
        $data["OCCUPANCY_DRAGON_EVOL"] =   Evol($data["OCCUPANCY_DRAGON_LAST"],$data["OCCUPANCY_DRAGON_LAST"]);
        $data["OCCUPANCY_SNAKE_EVOL"] =   Evol($data["OCCUPANCY_SNAKE_LAST"],$data["OCCUPANCY_SNAKE_LAST"]);
        $data["OCCUPANCY_HORSE_EVOL"] =   Evol($data["OCCUPANCY_HORSE_LAST"],$data["OCCUPANCY_HORSE_LAST"]);
        $data["OCCUPANCY_GOAT_EVOL"] =   Evol($data["OCCUPANCY_GOAT_LAST"],$data["OCCUPANCY_GOAT_LAST"]);

        $data["TRANSFER_RAT_EVOL"] =   Evol($data["TRANSFER_RAT_LAST"],$data["TRANSFER_RAT_LAST"]);
        $data["TRANSFER_OX_EVOL"] =   Evol($data["TRANSFER_OX_LAST"],$data["TRANSFER_OX_LAST"]);
        $data["TRANSFER_TIGER_EVOL"] =   Evol($data["TRANSFER_TIGER_LAST"],$data["TRANSFER_TIGER_LAST"]);
        $data["TRANSFER_HARE_EVOL"] =   Evol($data["TRANSFER_HARE_LAST"],$data["TRANSFER_HARE_LAST"]);
        $data["TRANSFER_DRAGON_EVOL"] =   Evol($data["TRANSFER_DRAGON_LAST"],$data["TRANSFER_DRAGON_LAST"]);
        $data["TRANSFER_SNAKE_EVOL"] =   Evol($data["TRANSFER_SNAKE_LAST"],$data["TRANSFER_SNAKE_LAST"]);
        $data["TRANSFER_HORSE_EVOL"] =   Evol($data["TRANSFER_HORSE_LAST"],$data["TRANSFER_HORSE_LAST"]);
        $data["TRANSFER_GOAT_EVOL"] =   Evol($data["TRANSFER_GOAT_LAST"],$data["TRANSFER_GOAT_LAST"]);

        $data["SALE_RAT_EVOL"] =   Evol($data["SALE_RAT_LAST"],$data["SALE_RAT_LAST"]);
        $data["SALE_OX_EVOL"] =   Evol($data["SALE_OX_LAST"],$data["SALE_OX_LAST"]);
        $data["SALE_TIGER_EVOL"] =   Evol($data["SALE_TIGER_LAST"],$data["SALE_TIGER_LAST"]);
        $data["SALE_HARE_EVOL"] =   Evol($data["SALE_HARE_LAST"],$data["SALE_HARE_LAST"]);
        $data["SALE_DRAGON_EVOL"] =   Evol($data["SALE_DRAGON_LAST"],$data["SALE_DRAGON_LAST"]);
        $data["SALE_SNAKE_EVOL"] =   Evol($data["SALE_SNAKE_LAST"],$data["SALE_SNAKE_LAST"]);
        $data["SALE_HORSE_EVOL"] =   Evol($data["SALE_HORSE_LAST"],$data["SALE_HORSE_LAST"]);
        $data["SALE_GOAT_EVOL"] =   Evol($data["SALE_GOAT_LAST"],$data["SALE_GOAT_LAST"]);

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
        $$overviewToSort["OX"] =  $data["OVERVIEW_OX_EVOL"];
        $$overviewToSort["TIGER"] = $data["OVERVIEW_TIGER_EVOL"];
        $$overviewToSort["HARE"] = $data["OVERVIEW_HARE_EVOL"];
        $$overviewToSort["DRAGON"] = $data["OVERVIEW_DRAGON_EVOL"];
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
        $$transferToSort["HARE"] = $data["OCCUPANCY_HARE_EVOL"];
        $$transferToSort["DRAGON"] = $data["OCCUPANCY_DRAGON_EVOL"];
        $$transferToSort["SNAKE"] = $data["OCCUPANCY_SNAKE_EVOL"];
        $$transferToSort["HORSE"] = $data["OCCUPANCY_HORSE_EVOL"];
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
            $sign = "";
            foreach($transferToSort as $key => $value ){
                if ($min == 0 || $value < $min){
                    $sign = $key;
                    $min = $value;    
                }
            }
            array_push($sortedSale, array("SIGN" => $sign, "VALUE" => $value));
            unset($saleToSort[$sign]);
        }
    }
?>

<table>
    <tr><td colspan='8'>OVERALL</td></tr>
    <tr><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>    
    <tr>        
        <td><img src='<?=$sortedOverview[0]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[1]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[2]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[3]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[4]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[5]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[6]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOverview[7]["SIGN"].".png" ?>'></td>        
    </tr>
    <tr>        
        <td><?=$sortedOverview[0]["VALUE"] ?></td>
        <td><?=$sortedOverview[1]["VALUE"] ?></td>
        <td><?=$sortedOverview[2]["VALUE"] ?></td>
        <td><?=$sortedOverview[3]["VALUE"] ?></td>
        <td><?=$sortedOverview[4]["VALUE"] ?></td>
        <td><?=$sortedOverview[5]["VALUE"] ?></td>
        <td><?=$sortedOverview[6]["VALUE"] ?></td>
        <td><?=$sortedOverview[7]["VALUE"] ?></td>   
    </tr>
</table>

<table>
    <tr><td colspan='8'>OCCUPANCY</td></tr>
    <tr><td></td><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
    <tr>        
        <td><img src='<?=$sortedOccupancy["1"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["2"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["3"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["4"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["5"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["6"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["7"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedOccupancy["8"]["SIGN"].".png" ?>'></td>        
    </tr>
    <tr>        
        <td><?=$sortedOccupancy[0]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[1]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[2]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[3]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[4]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[5]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[6]["VALUE"] ?></td>
        <td><?=$sortedOccupancy[7]["VALUE"] ?></td>   
    </tr>
</table>

<table>
    <tr><td>TRANSFER</td><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
    <tr><td></td><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
    <tr>        
        <td><img src='<?=$sortedTransfer["1"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["2"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["3"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["4"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["5"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["6"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["7"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedTransfer["8"]["SIGN"].".png" ?>'></td>        
    </tr>
    <tr>        
        <td><?=$sortedTransfer[0]["VALUE"] ?></td>
        <td><?=$sortedTransfer[1]["VALUE"] ?></td>
        <td><?=$sortedTransfer[2]["VALUE"] ?></td>
        <td><?=$sortedTransfer[3]["VALUE"] ?></td>
        <td><?=$sortedTransfer[4]["VALUE"] ?></td>
        <td><?=$sortedTransfer[5]["VALUE"] ?></td>
        <td><?=$sortedTransfer[6]["VALUE"] ?></td>
        <td><?=$sortedTransfer[7]["VALUE"] ?></td>   
    </tr>
</table>

<table>
    <tr><td>SALE</td><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
    <tr><td></td><td>1rst</td><td>2nd</td><td>3rd</td><td>4th</td><td>5th</td><td>6th</td><td>7th</td><td>8th</td></tr>
    <tr>        
        <td><img src='<?=$sortedSale["1"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["2"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["3"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["4"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["5"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["6"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["7"]["SIGN"].".png" ?>'></td>
        <td><img src='<?=$sortedSale["8"]["SIGN"].".png" ?>'></td>        
    </tr>
    <tr>        
        <td><?=$sortedSale[0]["VALUE"] ?></td>
        <td><?=$sortedSale[1]["VALUE"] ?></td>
        <td><?=$sortedSale[2]["VALUE"] ?></td>
        <td><?=$sortedSale[3]["VALUE"] ?></td>
        <td><?=$sortedSale[4]["VALUE"] ?></td>
        <td><?=$sortedSale[5]["VALUE"] ?></td>
        <td><?=$sortedSale[6]["VALUE"] ?></td>
        <td><?=$sortedSale[7]["VALUE"] ?></td>   
    </tr>
</table>
