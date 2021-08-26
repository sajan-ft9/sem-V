<?php 

include "../includes/class-autoload.inc.php";

$products = new Product();

if(isset($_POST['submit'])) {
    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $products->addProduct($name, $desc, $price, $qty, $category);

    header("Location: {$_SERVER['HTTP_REFERER']}");

}

else if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $products->updateProduct($name, $desc, $price, $qty, $category, $id);

    header("Location: {$_SERVER['HTTP_ORIGIN']}/project/admin");

}

elseif ($_GET['send'] === 'del') {
    $id = $_GET['id'];

    $products->delProduct($id);

    header("Location: {$_SERVER['HTTP_ORIGIN']}/project/admin");
}