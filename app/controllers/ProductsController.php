<?php 

require_once "./App/models/Product.php";

    class ProductsController extends Products {
        
        public function getSelectedProducts() {
            $results = $this->dbGetSelectedProduct('sajan');
            echo "Full Name: " . $results[0]['users_firstname'] . " " . $results[0]['users_lastname'] . "<br>";
            echo "DOB: " . $results[0]['users_dateofbirth'];
        }

        public function getAllProducts () {
            $allproduct = $this->dbGetAllProducts();
            return $allproduct;
        }

        public function check() {
            return "ProductsController Accessed";
        }

    }

