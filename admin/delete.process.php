<?php 

include "../includes/init.php";

$products = new Product();

if ($_GET['send'] === 'del') {
    $id = $_GET['id'];
    $img_del = $_GET['name'];

    $products->delProduct($id);

    unlink("uploads/$img_del");

    header("Location: {$_SERVER['HTTP_ORIGIN']}/project/admin");
    // header("Location: {$_SERVER['HTTP_ORIGIN']}/admin");
    die;
}


