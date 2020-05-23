<?php

function getPercentageValue($value, $percentage){
  return ($value * $percentage)/100;
}

function calculateProductTotalPrice($product){
  $product['discount'] = $product['discount'] ? $product['discount'] : 0;
  $discount = getPercentageValue($product['unit_price'], $product['discount']);
  $totalProductPrice = (($product['unit_price'] - $discount) * $product['quantity']) * $product['factor'];
  return $totalProductPrice;
}

?>