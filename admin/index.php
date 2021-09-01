<?php include "layout/header.php"; 
include "../includes/init.php";

$products = new Product();

if($_SERVER['REQUEST_METHOD'] == "POST"){

  // Product Post
  if(isset($_POST['submit'])) {
    $err = "";
    $name = clean($_POST['p_name']);
    $desc = clean($_POST['p_desc']);
    $category = clean($_POST['category']);
    $price = clean($_POST['price']);
    $qty = clean($_POST['qty']);
    $brand = clean($_POST['brand']);
    $filename = $_FILES["fileToUpload"] ["name"];
    $tempname = $_FILES["fileToUpload"] ["tmp_name"];


    if(empty($name)){
      $err .= "Name required<br>";
    }else {
      if(!preg_match("/^[a-zA-Z0-9-' ]{3,25}$/", $name)) {
        $err .= "Name can only use(- and alphanumeric 3-25 characters)<br>";
      }
    }

    if(empty($desc)){
      $err .= "Description required<br>";
    }else{
      if(strlen($desc) >= 254 ) {
        $err .= "Too long description<br>";
      }
    }

    if(empty($category)) {
      $err .= "Category required<br>";
    }

    if(empty($price)) {
      $err .= "Price required<br>";
    }else{
      if($price < 0){
        $err .= "Price cannot be negative.<br>";
      }
      elseif($price > 100000000) {
        $err .= "Expensive. Try lowering price<br>";
      }
    }
    
    if(empty($qty)) {
      $err .= "Quantity required<br>";
    }else{
      if($qty < 0){
        $err .= "Quantity cannot be negative.<br>";
      }elseif($qty > 100000000) {
        $err .= "Too much quantity product<br>";
      }
    }


    if(empty($brand)) {
      $err .= "Brand required<br>";
    }

    if(empty($filename)) {
      $err .= "Image required<br>";
    }else {
      $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION)); //gives extension
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $err .= "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
      }
    }

    if(empty($err)){
      $newFileName = uniqid('', true) . "." . $imageFileType;
      $fileDestination = "uploads/".$newFileName;
  
      $products->addProduct($name, $desc, $newFileName, $price, $qty, $category, $brand);
      
      move_uploaded_file($tempname, $fileDestination);
    }
    else{ 
      echo "<p style='color:red;'>Error: $err</p>";
    }
  }
  // End Product Post

  // Category Post
  if(isset($_POST['cat_submit'])) {
    $category = new Category();
    $check = [];
    foreach ($category->getCategories() as $name) {
        $check[] = strtoupper($name['ct_name']);
    };
    $cat_name = clean(strtoupper($_POST['cat_name']));
    $cat_desc = clean($_POST['cat_desc']);
    $err = "";
    if(empty($cat_name)){
      $err .= "Category name required.<br>";
    }
    if(in_array($cat_name, $check, TRUE)) {
        $err .= "Category exists. Try another<br>";
    }
    if(!preg_match("/^[a-zA-Z0-9-' ]{3,25}$/", $cat_name)) {
      $err .= "Name can only use(- and alphanumeric 3-25 characters)<br>";
    }
    if(empty($cat_desc)){
      $err .= "Description required<br>";
    }
    if(strlen($cat_desc) >= 254 ) {
      $err .= "Too long description<br>";
    }
    if(empty($err)) {
      $category->addCategory($cat_name, $cat_desc);
    }
    else{
      echo "<p style='color:red;'>$err</p>";
    }

  }
  // End Category Post

}



?>

<h1 class="mt-4">Dashboard</h1>

<!-- Button trigger modal -->
<div class="text-center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
  Add New Product
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
  Add New Category
</button>
</div>


<!-- Products Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="productsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input class="form-control" type="text" name="p_name" required>
                <label for="">Description</label>
                <textarea class="form-control" type="text" name="p_desc" required></textarea>
                <label for="">Price</label>
                <input class="form-control" type="number" name="price" required>
                <label for="">Quantity</label>
                <input class="form-control" type="number" name="qty" required>
                <label for="">Brand</label>
                <input class="form-control" type="text" name="brand" required>
                <label for="">Category</label>
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
                <label for="">Add Product Image</label>
                <input class="form-control" type="file" name="fileToUpload">
            </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='submit' class="btn btn-primary">Add Product</button>
                </div>
        </form>
    </div>
  </div>
</div>
<!-- End product Modal -->

<!-- Add category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="">Category Name</label>    
                <input class="form-control" type="text" name="cat_name" placeholder="" required>
                <label for="">Description</label>    
                <textarea class="form-control" name="cat_desc" required></textarea>
            </div>    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="cat_submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- End Category Modal -->

<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
    <?php 
        $products = new Product();
        if($products->getProduct()): 
    ?>
        <?php foreach($products->getProduct() as $product): ?>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?=$product['pr_img']?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product['pr_name']?></h5>
                        <p class="card-text"><?=$product['pr_desc']?></p>
                        <p class="text-end">Quantity: <?=$product['pr_qty']?></p>
                        <p class="text-end">Brand: <?=$product['pr_brand']?></p>
                    </div>
                    <div class="card-footer">
                        <small class="card-link">Category: <a href="category.php?id=<?=$product['ct_id']?>"><?=$product['ct_name']?></a></small>
                        <small class="card-link">Rs. <?=$product['pr_price']?></small>
                        <small><a href="editForm.php?id=<?=$product['pr_id']?>" class="btn btn-warning btn-sm active">Edit</a></small>
                        <small><a href="delete.process.php?send=del&id=<?=$product['pr_id']?>&name=<?=$product['pr_img']?>" class="btn btn-danger btn-sm active" onClick="return confirm('Do you want to delete??')">Delete</a></small>
                    </div>
                </div>
            </div>   
        <?php endforeach; ?>
    <?php endif;
    ?>
</div>


<?php include "layout/footer.php" ?>