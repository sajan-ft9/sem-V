<?php 

include "includes/class-autoload.inc.php";

$products = new Product();

if(isset($_POST['submit'])) {
    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $products->addProduct($name, $desc, $category, $price);

    header("Location: {$_SERVER['HTTP_REFERER']}");

}

else if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $products->updateProduct($name, $desc, $category, $price, $id);

    header("Location: {$_SERVER['HTTP_ORIGIN']}/project");

}

elseif ($_GET['send'] === 'del') {
    $id = $_GET['id'];

    $products->delProduct($id);

    header("Location: {$_SERVER['HTTP_ORIGIN']}/project");
}