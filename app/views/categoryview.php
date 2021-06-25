<?php 

    require_once "../app\models\category.php";
    class CategoryView extends Category {

        // public function getSelectedProducts() {
        //     $results = $this->dbGetSelectedProduct('sajan');
        //     echo "Full Name: " . $results[0]['users_firstname'] . " " . $results[0]['users_lastname'] . "<br>";
        //     echo "DOB: " . $results[0]['users_dateofbirth'];
        // }

        public function getAllCategories () {
            $allcategories = $this->dbGetAllCategories();
            return $allcategories; 
        }

        public function getSelectedCtegory($categoryname) {
            $results = $this->dbGetSelectedCategories($categoryname);
            return $results;
        }
    }