<?php 

if(!isset($_GET['id'])){
    header("location:index.php");
}
include "layout/header.php"; 
include "../includes/init.php";

$category = new Category();
$result = $category->selectedCategory($_GET['id']);

?>

<h1 class="mt-4"><?=$result[0]["ct_name"]?></h1>
    <div class="mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
            if($result):
                foreach ($result as $category):?>
                    <div class="col">
                        <div class="card">
                        <img class="card-img-top" src="uploads/<?=$category['pr_img']?>" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?=$category['pr_name']?></h5>
                                <p class="card-text"><?=$category['pr_desc']?></p>
                            </div>
                            <div class="card-footer">
                                <small class="card-link">Category: <a href="category.php?id=<?=$category['ct_id']?>"><?=$category['ct_name']?></a></small>
                                <small class="card-link">Rs. <?=$category['pr_price']?></small>
                            </div>
                        </div>
                    </div>   
        <?php 
                endforeach;
            else:
                echo "No data";
            endif;
        ?>
    </div>
    </div>
<?php include "layout/footer.php"; ?>