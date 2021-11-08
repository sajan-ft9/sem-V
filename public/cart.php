<?php 
session_start();
require_once "layout/header.php";

if(!isset($_SESSION['customer'])){
    echo "
    <div class='alert alert-info' role='alert'>
        Please login to access cart! <a href='login.php' class='alert-link'>Login</a>
    </div>
";
    die;
}
if(isset($_SESSION['customer'])){

    $cart = new Cart();
    // print_r($cart->getAll($_SESSION['customer_id']));
    ?>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($cart->getAll($_SESSION['customer_id']) > 0):
                    foreach ($cart->getAll($_SESSION['customer_id']) as $items) {
                        ?>
                            <tr>
                                <td><?=$items['pr_name']?></td>
                                <td><img src="../admin/uploads/<?=$items['pr_img']?>" alt="" srcset="" height="70px" width="70px"></td>
                                <td><input type="number" value="<?=$items['qty']?>"></td>
                                <td><?=$items['pr_price']?></td>
                                <td><i class="fas fa-trash" style="color:red"></i></td>
                            </tr>
                        <?php
                    }
                else:
                    echo "
                        <div class='alert alert-info' role='alert'>
                        No items present in cart!
                        </div>
                    ";
                endif;
            ?>
        </tbody>
    </table>
    <?php
    
}
require_once "layout/footer.php";    

?>