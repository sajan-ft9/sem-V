<?php 
    require_once "dbh.php";

    class Products extends Dbh {
        protected function dbGetSelectedProduct($productname) {
            $sql = "SELECT * FROM products WHERE product_name = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$productname]);

            $results = $stmt->fetchAll();
            return $results;
        }

        protected function dbGetAllProducts() {
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->query($sql);            
            $results = $stmt->fetchAll();
            return  $results;
        }
    }
