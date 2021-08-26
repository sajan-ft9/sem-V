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

    public function addProduct($name, $desc, $price, $qty, $category) {
        $sql = "INSERT INTO products (pr_name, pr_desc, pr_price, pr_qty, cat_id) VALUES (?, ?, ?, ?, ?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $price, $qty, $category]);
        echo "executed";
    }

    public function editProduct($id) {
        $sql = "SELECT * FROM products WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    public function updateProduct($name, $desc, $price, $qty, $category, $id) {
        $sql = "UPDATE products set pr_name = ?, pr_desc = ?, pr_price = ?, pr_qty = ?, cat_id = ? WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $price, $qty, $category, $id]);
    }

    public function delProduct($id) {
        $sql = "DELETE FROM products WHERE pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}