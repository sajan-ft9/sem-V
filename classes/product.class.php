<?php  
require_once "../classes/dbh.class.php";

class Product extends Dbh {
    public function getProduct() {
        $sql = "SELECT * FROM `products` INNER JOIN categories WHERE cat_id = categories.ct_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function selected($id) {
        $sql = "SELECT * FROM `products` INNER JOIN categories WHERE cat_id = categories.ct_id AND pr_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
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

    // public function getRating($id) {
    //     $sql = "SELECT * FROM `products` INNER JOIN rating WHERE pr_id = rating.product_id AND pr_id = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$id]);
    //     while($result = $stmt->fetchAll()) {
    //         return $result;
    //     }
    // }

    public function getRating($id) {
        $sql = "SELECT * FROM rating WHERE product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while($result = $stmt->fetchAll()) {
           return $result;
        }
    }

    public function getComments($id) {
        $sql = "SELECT * FROM `rating` inner JOIN customers WHERE customer_id = customers.id AND product_id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while($result = $stmt->fetchAll()) {
           return $result;
        }
    }
    
    public function getStar($id){
        if(is_array($this->getRating($id))){
            $total = count($this->getRating($id));            
            $rated = 0;
            foreach($this->getRating(32) as $prod){
                // echo "<br>".$prod['rate_points'];
                $rated = $rated + $prod['rate_points'];
            }
            // echo "<br>";
            // echo $rated;
            // echo "<br>";
            $rating = $rated/$total;
    
            $percent = ($rated/($total*5))*100;
            return ['percent'=>$percent, "rating"=>$rating, "total"=>$total];
        }
        else{
            return ['percent'=>$percent=0]; 
        }
        
    }
}