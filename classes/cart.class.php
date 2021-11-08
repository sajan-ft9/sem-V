<?php  
require_once "../classes/dbh.class.php";

class Cart extends Dbh {
    public function getAll($customer_id) {
        $sql = "SELECT * FROM cart INNER JOIN products WHERE product_id = products.pr_id AND customer_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_id]);

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function add($product, $customer_id, $qty) {
        $sql = "INSERT INTO cart (product_id, customer_id, qty) VALUES (?, ?, ?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$product, $customer_id, $qty]);
    }

}
