<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    
    $username = $_SESSION['username'];

    
    if(!isset($_SESSION['property_id'])){
        header('Location: '.$_SERVER['HTTP_REFERER']);   
    }

    $property_id = $_SESSION['property_id'];
    unset($_SESSION['property_id']);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price_per_day = $_POST['price_per_day'];
    
    try{
        updateProperty($property_id, $title, $description, $price_per_day);
    }catch(PDOException $e){
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die($e->getMessage());
    }

    if(isset($_POST['commodity'])){
        $commodity = $_POST['commodity'];

        addCommodity($property_id, $commodity);
        //TODO Add Commodity
    }


    header('Location: ../pages/user.php');
    die();
?>