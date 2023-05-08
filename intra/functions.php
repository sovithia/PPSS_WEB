<?php



function truncatePrice($price)
{
  if ($price == null)
    return "";
  if (strpos($price, 'E') !== false)
  {
    return floatval($price);
  }
  if (substr($price,0,3) == ".00")
    return "0";
  $left = explode('.',$price)[0];

  if (count(explode('.',$price)) > 1)
  {
    $right = explode('.',$price)[1];
    $right = substr($right,0,2);
    return $left.".".$right;
  }
  else  
    return  substr($left,0,2);    
  
} 


?>