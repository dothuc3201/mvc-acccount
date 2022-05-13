<?php
    if(!isset($_SESSION["username"])){
        header("Location:http://localhost/account/User/login");
    }
    // echo $_SESSION['username'] ."adf";
?>
<?php include ('include/header.php') ?>
<?php include ('include/navbar.php') ?>
<?php require_once "./mvc/views/" .$data["page"] .".php" ?>
<?php include ('include/footer.php') ?>

