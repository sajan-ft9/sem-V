<?php 

$err = $_SERVER['REDIRECT_STATUS'];

$err_title = "";
$err_msg = "";
if($err == 404){
    $err_title = "404 page not found.";
    $err_msg = " Click on link below to go back.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Error 404</h1>
    <?php echo $err_title. $err_msg; ?><br>
    <a href="/sem-v/index.php">Home</a>

</body>
</html>