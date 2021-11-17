<?php 

// Change Info From Here

$epay_url = "https://uat.esewa.com.np/epay/main";
$pid = mt_rand();
$successurl = "http://localhost/sem-V/public/success.php?q=su";
$failedurl = "http://localhost/sem-V/public/failed.php?q=fu";
$merchant_code = "epay_payment"; 
$fraudcheck_url = "https://uat.esewa.com.np/epay/transrec";

// For Amount Check
$actualamount = 1000;

?>