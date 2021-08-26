<?php 

require_once "../templates/header.php";
include "../includes/class-autoload.inc.php";

$products = new Product();
$product = $products->editProduct($_GET['id']);
$name = $product['pr_name'];
$desc = $product['pr_desc'];
$price = $product['pr_price'];
$cat_id = $product['cat_id'];
$qty = $product['pr_qty'];

?>

<div class="text-center my-4">
    <h3>Edit Post</h3>
</div>
<div class="row">
    <div class="col-md-7 mx-auto">
        <!-- form edit -->
    <form action="post.process.php?id=<?=$_GET['id']?>" method="POST">
            <div class="form-group">
                <label for="">Product Name</label>
                <input class="form-control" type="text" name="p_name" value="<?=$name?>" required>
                <label for="">Description</label>
                <textarea class="form-control" type="text" name="p_desc" required><?=$desc?></textarea>
                <label for="">Price</label>
                <input class="form-control" type="number" name="price" value="<?=$price?>" required>
                <label for="">Quantity</label>
                <input class="form-control" type="number" name="qty" value="<?=$qty?>" required>
                <label for="">Category</label>
                <input class="form-control" type="number" name="category" value="<?=$cat_id?>" required>
                <div class="modal-footer">
                <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" name='update' class="btn btn-primary">Update Product</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?php 

require_once "../templates/header.php";
?>