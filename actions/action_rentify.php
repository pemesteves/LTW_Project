<?php
    include_once "../includes/init.php";
    include_once "../database/property.php";

    global $db;
    $owner_username = $_SESSION['username'];
    $title = htmlspecialchars($_POST['title']);
    $location = htmlspecialchars($_POST['location']);
    $sleeps = htmlspecialchars($_POST['sleeps']);
    $price = htmlspecialchars($_POST['price']);   
    $description = htmlspecialchars($_POST['description']);

    try {
        rentifyProperty($owner_username, $title, $price, $location, $description, $sleeps);
        $id = $db->lastInsertId();

        foreach($_SESSION['images'] as $image) {
            rentifyPropertyImage($id, $image);
        }
        unset($_SESSION['images']);

        header('Location: ../pages/user.php'); // CHANGE
    } 
    catch (PDOException $e) {
        unset($_SESSION['images']);
        die($e->getMessage());
        $_SESSION['error_messages'][] = "Failed to rentify house";
        header('Location: ../pages/add_properties.php');
    }
    die();
?>