<?php 

require_once "./App/models/Category.php";

class CategoriesController extends Category {

    public function getAllCategories () {
        $allcategories = $this->dbGetAllCategories();
        return $allcategories; 
    }

    public function getSelectedCtegory($categoryname) {
        $results = $this->dbGetSelectedCategories($categoryname);
        return $results;
    }

    public function check(){
        return "CategoriesController accessed";
    }

}

