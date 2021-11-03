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
                    <a href="../admin/uploads/<?=$product['pr_img']?>">
                    <img src="../admin/uploads/<?=$product['pr_img']?>" class="img-fluid rounded-start" alt="...">

                    </a>
                </div>
                <div class="col-md-6">
                <div class="card-body">
                    <h4 class="card-title"><?=$product['pr_name']?></h4>
                    <p class="card-text"><small class="text-muted"><?=$product['ct_name']?></small></p>
                    <p class="card-text"><?=$product['pr_desc']?></p>
                    <h5>Rs.<?=$product['pr_price']?></h5>
                    
                    <span class="card-text text-muted"> Rating: <?php echo $products->getStar($product['pr_id'])['percent'] > 0 ? $products->getStar($product['pr_id'])['percent']."%" : "No reviews yet!" ?></span>                    
                    <ul class="rating-stars">
                        <li style="width:<?=$products->getStar($product['pr_id'])['percent']?>%" class="stars-active">
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
                    <p class="text">Qty: <?=$product['pr_qty']?></p>
                    <form class="mt-3" action="" method="post">
                        <?php 
                        if(isset($_POST['tocart'])){
                            if(is_numeric($_POST['quantity']) && ($_POST['quantity'] > 0)){
                                echo $_POST['quantity'];
                            }
                            else{
                                echo  "<p style='color:red'>Enter valid quantity</p>";
                            }     
                        }
                   
                        ?>
                        <div class="btn btn-info" onclick="add()"><i class="fa fa-plus"></i></div> 
                        <input style="width: 100px; background-color:white; border-radius:10px;" type="number" name="quantity" id="qty" placeholder="Qty" value="1" required>
                        <div class="btn btn-dark" onclick="sub()"><i class="fa fa-minus"></i></div> 
                        <button class="mt-2 btn btn-outline-success" type="submit" name="tocart"><h5>Add to Cart</h5></button>
                    </form>
                    <form action="wish.php" method="post">
                        <button class="heart btn btn-outline-light" type="submit" name="wish"><i class="fa fa-heart"></i></button>
                    </form>
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
  <div class="feedback text-center border mb-4 p-2 bg-dark text-light">
      <h2>Feedback & Rating</h2>
      <div class="inner p-4">
          <form action="rate.php" method="post">
              <div class="form-group">
              <label for="">Rate Product</label>
              <select class="form-control" style="color:#f3aa06;" name="ratepoint" required>
                  <option value="5" selected>&#9733 &#9733 &#9733 &#9733 &#9733</option>
                  <option value="4">&#9733 &#9733 &#9733 &#9733</option>
                  <option value="3">&#9733 &#9733 &#9733</option>
                  <option value="2">&#9733 &#9733</option>
                  <option value="1">&#9733</option>
              </select>
              </div>
              <div class="form-group">
                  <textarea name="comment" id="" class="form-control" placeholder="Feedback" required></textarea>
              </div>
              <button type="submit" class="mt-2 btn btn-info" name="feedback">Send Feedback</button>    
          </form>
      </div>
      <div class="oldfeed text-start">
          <ol>
              <?php 
                if($products->getComments($id) > 0):
                    foreach($products->getComments($id) as $comment):
              ?>
                        <li>
                            <b><?=$comment['name']?> <span style="color: #f3aa06;" title="rating given">
                                <?php
                                echo "(";
                                for ($i=1; $i <= $comment['rate_points'] ; $i++) { 
                                    echo "&#9733";
                                }
                                echo ")";
                                ?>
                            </span></b>
                            <p><?=$comment['feedback']?> <span style="float: right;">X</span></p>
                        </li>
              <?php
                    endforeach;
                else: echo "<p style='color:red'>No comments yet</p>";
                endif;
              ?>
          </ol>
      </div>
  </div>
<?php

    require_once "layout/footer.php"; 
?>
<script>
    function add() {
        qty = document.getElementById('qty').value;
        document.getElementById('qty').value =  parseInt(qty) + 1;
        
    }
    function sub() {
        qty = document.getElementById('qty').value;
        document.getElementById('qty').value =  parseInt(qty) - 1;
        
    }

</script>
<?php 

?>