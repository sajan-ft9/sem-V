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

    public function getSelected($customer_id){
        $sql = "SELECT * FROM `orders` INNER JOIN products WHERE products.pr_id = productid AND customer_id = ? AND sold = 0 ORDER BY orders.order_date DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_id]);

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function add($customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address, $bill_no){
        if($payment_type === 'cash'){
            $sql = "INSERT INTO `orders`(`customer_id`, productid, quantity, `payment_type`, `amount`, `order_date`, `order_address`, `order_delivered`, payment_received, sold, bill_no) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 0, 0, ?)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address, $bill_no]);
        }
        if($payment_type === 'esewa'){
            $sql = "INSERT INTO `orders`(`customer_id`, productid, quantity, `payment_type`, `amount`, `order_date`, `order_address`, `order_delivered`, payment_received, sold) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 1, 0, ?)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$customer_id, $pr_id, $pr_qty, $payment_type, $amount, $order_date, $order_address, $bill_no]);    
        }
    }

    public function salesMade($order_id){    
        $sql = "UPDATE `orders` SET sold = 1 WHERE id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
    }

    public function delete($order_id){    
        $sql = "DELETE FROM `orders` WHERE id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
    }

    public function deliveryConfirm($order_id){    
        $sql = "UPDATE `orders` SET order_delivered = 1 WHERE id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
    }

    public function paymentConfirm($order_id){    
        $sql = "UPDATE `orders` SET payment_received = 1 WHERE id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
    }

    public function getToggle($order_id) {
        $sql = "SELECT * FROM `orders` WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);

        $result = $stmt->fetch();
        return $result;
    }

    public function showOrders(){
        $sql = "SELECT * FROM customers INNER JOIN orders WHERE customers.cus_id=orders.customer_id AND orders.sold = 0 GROUP BY customers.cus_id ORDER BY orders.order_date";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

}