<?php 

require_once "dbh.php";

class Category extends Dbh {
    protected function dbGetAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connect()->query($sql);            
        $results = $stmt->fetchAll();
        return  $results;
    }

    protected function dbGetSelectedCategories($categoryname) {
        $sql = "SELECT * FROM categories WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categoryname]);
        $results = $stmt->fetchAll();
        return $results;
    }
}

?>