<?php 

require_once "../app\controllers\ProductsController.php";
require_once "../app/views\productsview.php";

$Products = new ProductsView();
$ProductsContr = new ProductsController();
require_once "../app/views/categoryview.php";
$Category = new CategoryView;