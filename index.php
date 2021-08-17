<?php 
    include "includes/class-autoload.inc.php";
    require_once "templates/header.php";
    
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
                <label for="">Category</label>
                <input class="form-control" type="number" name="category" required>
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

<div class="row">
    <?php 
        $products = new Product();
        if($products->getProduct()): 
    ?>
        <?php foreach($products->getProduct() as $product): ?>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_name']?></h5>
                        <p class="card-text"><?= $product['product_desc']?></p>
                        <p class="card-text">Category id: <?= $product['category_id']?></p>
                        <h6 class="card-subtitle text-muted text-end">Rs. <?= $product['price']?></h6>
                        <a href="editForm.php?id=<?=$product['id']?>" class="btn btn-warning">Edit</a>
                        <a href="post.process.php?id=<?=$product['id']?>&send=del" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Product?');">Delete</a>
                    </div>
                </div>
            </div>    
        <?php endforeach; ?>
    <?php endif;
    ?>
</div>
<?php 
require_once "templates/footer.php";
?>
