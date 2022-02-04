<?php  
require_once "../classes/dbh.class.php";

class Sales extends Dbh {

    public function getAll(){
        $sql = "SELECT * FROM `sales` INNER JOIN products WHERE products.pr_id = productid";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function getSelected($product_id){
        $sql = "SELECT * FROM `sales` INNER JOIN products WHERE products.pr_id = product_id AND product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function add($product_id, $sales_qty){    
        $sql = "INSERT INTO `sales`(product_id, sales_qty) VALUES (?, ?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$product_id, $sales_qty]);
    }

    public function update($sales_qty, $product_id){    
        $sql = "UPDATE `sales` SET `sales_qty`= ? WHERE product_id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$sales_qty, $product_id]);
    }

    public function checkProduct($product_id) {
        $sql = "SELECT * FROM `sales` WHERE product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);

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