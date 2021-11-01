<?php 
    require_once "layout/header.php";
?>
<link rel="stylesheet" href="layout/css/productlist.css">

            <div class=" d-lg-flex flex-lg-row d-flex flex-column-reverse bg-light mt-5">
                <div class="p-5" id="2">
                    <p class="p-green">FRUIT FRESH</p>
                    <P class="fs-4 fw-bold">Whirpool</P>
                    <p class="fs-4 fw-bold">10 ltrs</p>
                    <p class="text-muted mb-4">Free Pickup and Delivery Available</p>
                    <div class="btn btn-success px-4">SHOP NOW</div>
                </div>
                <div id="1"> <img src="../img/coverfridge.jpg" class="w-100 h-100" alt=""> </div>
            </div>
        </div>
        <div class="row g-1 mt-4 mb-2">
            <?php 
            $products = new Product();
            if($products->getProduct() > 0):
                foreach($products->getProduct() as $product):
            ?>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">    
                    <div class="card p-2 ml-5 border">
                        <div class="p-info px-3 py-3">
                            <div>
                                <h5 class="mb-0"><?=$product['pr_name']?></h5> <span><?=$product['ct_name']?></span>
                            </div>
                            <div class="p-price d-flex flex-row"> <span>Rs</span>
                                <h1><?=$product['pr_price']?></h1>
                            </div>
                            <form action="wish.php" method="post">
                                <div class="heart">
                                <button type="submit" name="wish">
                                    <i class="fas fa-heart"></i> 
                                </button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center p-image"> <img src="../admin/uploads/<?=$product['pr_img']?>"> </div>
                        <div class="p-about">
                            <p><?=$product['pr_desc']?></p>
                        </div>
                        <div class="buttons d-flex flex-row gap-3 px-3"> <button class="btn btn-danger w-100"><a href="view.php?id=<?=$product['pr_id']?>" class="text-white">View</a></button> <button class="btn btn-outline-danger w-100">Buy Now</button> </div>
                    </div>
                </div>
            <?php    
                endforeach;
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

<?php require_once "layout/footer.php" ?>