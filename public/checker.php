<?php 

include "../includes/init.php";
$products = new Product();
$rated = 0;
echo "<pre>";
print_r($products->getRating(32));
echo $total = count($products->getRating(32));
foreach($products->getRating(32) as $prod){
    echo "<br>".$prod['rate_points'];
    $rated = $rated + $prod['rate_points'];
}
echo "<br>";
print_r(gettype($total));

$percent = ($rated/($total*5))*100;
echo "<br>".$percent;
echo "</pre>";
echo "-------------------------<br>";
$products->getStar(32);
?>