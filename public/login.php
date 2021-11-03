<?php 
require_once "layout/header.php";
$customer = new Customer();
?>
<link rel="stylesheet" href="layout/css/login.css">
<div class="container">
<div class="wrapper">
    <!-- <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div> -->
    <div class="logo"> <img src="../img/logo.jpeg" alt=""> </div>
    <div class="text-center mt-4 name"> Home Appliances </div>
    <form class="p-3 mt-3" action="" method="POST">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="email" name="email" id="userName" placeholder="Email" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password" required> </div> <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center">
        <h5>OR</h5>
    </div>
    <form action="" method="POST">
        <div class="d-flex align-items-center">
            <button class="btn" type="submit" name="glogin">Login with Google</button>
        </div>
    </form>
    <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="#">Sign up</a> </div>
</div>
</div>
<?php 
require_once "layout/footer.php";
?>