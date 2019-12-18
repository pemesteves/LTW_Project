<?php
    include_once "../includes/init.php";

    $username = $_SESSION['username'];
    
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];

    if (!isset($_SESSION['images'])){
        $_SESSION['images'] = array();
    }

    if(!isset($_SESSION['image_names'])){
        $_SESSION['image_names'] = array();
    }

    $name = sha1($username) . '_' . sha1(basename($_FILES["fileToUpload"]["name"])) . '_' . sha1(date('Y-m-d h:i a')) . '_' . count($_SESSION['images']);
    move_uploaded_file($tmp_name, "$target_dir/$name");

    array_push($_SESSION['images'], $name);
    array_push($_SESSION['image_names'], basename($_FILES["fileToUpload"]["name"]) );
    error_log($_SESSION['image_name']);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
?>