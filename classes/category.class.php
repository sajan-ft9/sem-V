<?php

class Category extends Dbh {

    public function getCategories() {
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function selectedCategory($id) {
        $sql = "SELECT * FROM `categories` INNER JOIN products WHERE ct_id = ? and products.cat_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $id]);

        while($result = $stmt->fetchAll()){
            return $result;
        }
    }

}