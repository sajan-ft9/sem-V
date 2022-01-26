<?php 
require_once "../classes/admin.class.php";
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['delfb'])){
            $id = $_POST['id'];
            $admin = new Admin;
            $admin->delBadComment($id);
            header("location:allfeedback.php");
            die;
        }else{
            header("location:allfeedback.php");
            die;
        }
    }else{
        header("location:allfeedback.php");
            die;
    }
?>