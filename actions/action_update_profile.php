<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    
    $username = $_SESSION['username'];

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $image_name = $_POST['image_name'];
    
    updateUserInformation($full_name, $email, $phone, $birthdate, $image_name,$username);

    header('Location: ../pages/change_profile.php');
    exit;
?>