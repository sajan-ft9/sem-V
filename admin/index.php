<?php 
    include "../includes/class-autoload.inc.php";
    require_once "../templates/header.php";
    
?>
    
    <!-- Button trigger modal -->
<div class="text-center">
    <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
        Create Product
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="addPostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form input -->
        <form action="post.process.php" method="POST">
            <div class="form-group">
                <label for="">Product Name</label>
                <input class="form-control" type="text" name="p_name" required>
                <label for="">Description</label>
                <textarea class="form-control" type="text" name="p_desc" required></textarea>
                <label for="">Price</label>
                <input class="form-control" type="number" name="price" required>
                <label for="">Quantity</label>
                <input class="form-control" type="number" name="qty" required>
                <label for="">Category</label>
                <!-- <input class="form-control" type="number" name="category" required> -->
                <select class="form-control" name="category" id="" required>
                    <option value="">Select Category</option>
                    <?php
                        $categories = new Category();
                        if($categories->getCategories()):
                            foreach($categories->getCategories() as $category):
                        ?>
                        <option value="<?=$category['ct_id']?>"><?=$category['ct_name']?></option>
                        <?php
                            endforeach;
                        endif;
                    ?>
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='submit' class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php 
        $products = new Product();
        if($products->getProduct()): 
    ?>
        <?php foreach($products->getProduct() as $product): ?>
            <div class="col">
                <div class="card">
                    <img src="images/ricecoooker2.jpg" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product['pr_name']?></h5>
                        <p class="card-text"><?=$product['pr_desc']?></p>
                    </div>
                    <div class="card-footer">
                        <small class="card-link">Category: <a href="category.php?id=<?=$product['ct_id']?>"><?=$product['ct_name']?></a></small>
                        <small class="card-link">Rs. <?=$product['pr_price']?></small>
                        <small><a href="editForm.php?id=<?=$product['pr_id']?>" class="btn btn-warning btn-sm active">Edit</a></small>
                        <small><a href="post.process.php?send=del&id=<?=$product['pr_id']?>" class="btn btn-danger btn-sm active" onClick="return confirm('Do you want to delete??')">Delete</a></small>
                    </div>
                </div>
            </div>   
        <?php endforeach; ?>
    <?php endif;
    ?>
</div>
<?php 
require_once "../templates/footer.php";
?>
