<?php  
require_once "../classes/dbh.class.php";

class Orders extends Dbh {

    public function getAll($customer_id){
        $sql = "SELECT * FROM orders WHERE customer_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_id]);

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function add($customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address){
        $sql = "INSERT INTO `orders`(`customer_id`, productid, quantity, `payment_type`, `amount`, `order_date`, `order_address`, `order_status`) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address]);
    }
}