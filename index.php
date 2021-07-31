<?php 

require_once "./App/init/init.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
</head>
<body>
    Categories:
    <ul>
            <?php 
                $all = $Products->getAllProducts();
                foreach ($all as $product):?>
                    <li><?php echo $product['product_name']. "<br><h2>Product Desc</h2>". $product['product_desc']; ?></li>            
                <?php
                endforeach;
                ?>
    </ul> 
</body>
</html>