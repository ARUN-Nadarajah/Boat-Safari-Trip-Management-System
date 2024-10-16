<?php

session_start();
    require('db.php');
    if(!isset($_SESSION['email'])){
        header("Location: pwd_reset.php");
        exit();
    }

if(isset($_SESSION['email'])){
    $newpwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE User SET Password = '$newpwd' WHERE Email = '$_SESSION[email]'";
    $con->query($sql);
    session_destroy();
    header('Location: login.php');
    exit();
}

?>