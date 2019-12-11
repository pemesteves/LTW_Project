<?php
    include "../includes/init.php";

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
    $name = $username . '_' . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($tmp_name, "$target_dir/$name");

    if (!isset($_SESSION['images']))
        $_SESSION['images'] = array();
    array_push($_SESSION['images'], $name);
    error_log('imagesCenas'.$name);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>