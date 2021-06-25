<?php 

    require_once "../app\models\Products.php";
    class ProductsView extends Products {

        public function getSelectedProducts() {
            $results = $this->dbGetSelectedProduct('sajan');
            echo "Full Name: " . $results[0]['users_firstname'] . " " . $results[0]['users_lastname'] . "<br>";
            echo "DOB: " . $results[0]['users_dateofbirth'];
        }

        public function getAllProducts () {
            $allproduct = $this->dbGetAllProducts();
            return $allproduct;
        }
    }