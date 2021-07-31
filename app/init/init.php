<?php 

require_once "./App/controllers/CategoriesController.php";
require_once "./App/controllers/ProductsController.php";



$Products = new ProductsController();
echo $Products->check();
$Categories = new CategoriesController();
echo $Categories->check();