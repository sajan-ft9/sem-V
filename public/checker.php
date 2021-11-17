<?php 

include "../includes/init.php";
session_start();
$c = new Cart();
echo $c->total($_SESSION['customer_id']);
?>