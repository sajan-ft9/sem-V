<?php  
require_once "../classes/dbh.class.php";

class Orders extends Dbh {

    public function allOrders(){
        $sql = "SELECT * FROM `orders` INNER JOIN products WHERE products.pr_id = productid AND sold = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function getAll($customer_id){
        $sql = "SELECT * FROM `orders` INNER JOIN products WHERE products.pr_id = productid AND customer_id = ? AND sold = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_id]);

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function add($customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address){
        if($payment_type === 'cash'){
            $sql = "INSERT INTO `orders`(`customer_id`, productid, quantity, `payment_type`, `amount`, `order_date`, `order_address`, `order_delivered`, payment_received, sold) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 0, 0)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address]);
        }
        if($payment_type === 'esewa'){
            $sql = "INSERT INTO `orders`(`customer_id`, productid, quantity, `payment_type`, `amount`, `order_date`, `order_address`, `order_delivered`, payment_received, sold) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 1, 0)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address]);    
        }
    }
}