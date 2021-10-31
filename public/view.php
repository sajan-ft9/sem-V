<?php 
    if(!isset($_GET['id'])){
        header("location:index.php");
        die;
    }
    require_once "layout/header.php";
    require_once "../includes/init.php";
    $id = $_GET['id'];
    $products = new Product();
?>
  <link rel="stylesheet" href="layout/css/single.css">
  <div class="container">  
    <div class="row d-flex justify-content-center">
        <?php
        $product = $products->selected($id);  
            if(count($product) > 1):
        ?>
        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="../admin/uploads/<?=$product['pr_img']?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                <div class="card-body">
                    <h4 class="card-title"><?=$product['pr_name']?></h4>
                    <p class="card-text"><small class="text-muted"><?=$product['ct_name']?></small></p>
                    <p class="card-text"><?=$product['pr_desc']?></p>
                    <h5>Rs.<?=$product['pr_price']?></h5>
                    
                    <span class="card-text text-muted"> Rating: <?php echo $products->getStar($product['pr_id']) > 0 ? $products->getStar($product['pr_id'])."%" : "No reviews yet!" ?></span>                    
                    <ul class="rating-stars">
                        <li style="width:<?=$products->getStar($product['pr_id'])?>%" class="stars-active">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                        <li>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>                    
                    </ul>  
                    <form action="cart.php" method="post">
                        
                    </form>
                    <a href="">Add to Cart</a>                                          
                </div>
                </div>
            </div>
        </div>
        <?php                 
            else:
                echo "
                    <div class='alert alert-info alert-dismissible fade show' role='alert'>
                        <strong>Alert!</strong> No product available. 
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            endif;
        ?>
    </div>
  </div>
<?php

    require_once "layout/footer.php"; 
?>
