<?php 
$title= "Feedback";
require_once "layout/header.php";
?>

<h1 class="mt-4">Feedback</h1>

<div>
    <form action="" method="post">
        <input type="text" name="customer">
        <button type="submit" name="search" class="btn btn-success">Search</button>
    </form>
</div>
<?php 
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                if(isset($_POST['search'])){
                    $cus_name = clean($_POST['customer']);

?>
<div class="">
    <ul>
        <?php 
            $admin = new Admin();
            if($admin->allComments($cus_name) > 0){
            foreach($admin->allComments($cus_name) as $comment){
                ?>
                    <li><?=$comment['feedback']?> - <span class="text-success"><?=$comment['name']?></span class="text-danger">
                        <form action="deletefb.php" method="post">
                            <input type="hidden" name="id" value="<?=$comment['id']?>">
                            <button type="submit" class="btn btn-danger" name="delfb">Delete</button>
                        </form>
                    <span></span></li>
                <?php
            }
        }
        else{
            echo "Not found";
        }
        }
    }
        ?>
    </ul>
</div>

<?php require_once "layout/footer.php" ?>