<?php  

class Product extends Dbh {
    public function getProduct() {
        $sql = "SELECT * FROM `products` INNER JOIN categories WHERE cat_id = categories.ct_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addProduct($name, $desc, $image, $price, $qty, $category, $brand) {
        $sql = "INSERT INTO products (pr_name, pr_desc, pr_img, pr_price, pr_qty, cat_id, pr_brand) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $image, $price, $qty, $category, $brand]);
    }

    public function editProduct($id) {
        $sql = "SELECT * FROM `products` inner join categories on cat_id = categories.ct_id WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    public function updateProduct($name, $desc, $newFileName, $price, $qty, $category, $brand, $id) {
        $sql = "UPDATE products set pr_name = ?, pr_desc = ?, pr_img = ?, pr_price = ?, pr_qty = ?, cat_id = ?, pr_brand = ? WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $newFileName, $price, $qty, $category, $brand, $id]);
    }

    public function delProduct($id) {
        $sql = "DELETE FROM products WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}