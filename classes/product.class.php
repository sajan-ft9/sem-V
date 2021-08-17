<?php  

class Product extends Dbh{
    public function getProduct() {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addProduct($name, $desc, $category, $price) {
        $sql = "INSERT INTO products (product_name, product_desc, category_id, price) VALUES (?, ?, ?, ?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $category, $price]);
        echo "executed";
    }

    public function editProduct($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    public function updateProduct($name, $desc, $category, $price, $id) {
        $sql = "UPDATE products set product_name = ?, product_desc = ?, category_id = ?, price = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $desc, $category, $price, $id]);
    }

    public function delProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}