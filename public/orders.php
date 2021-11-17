<?php 
// session_start();
require_once "../includes/init.php";
customerLogin();
require_once "layout/header.php";
$customer_id = $_SESSION['customer_id'];
$orders = new Orders();
if($orders->getAll($customer_id) > 0){
    $allorders = $orders->getAll($customer_id);
    print_r($allorders);
}else{
    echo "
        <div class='alert alert-primary' role='alert'>
            No orders made!
        </div>
    ";
}
?>



<?php require_once "layout/footer.php" ?>