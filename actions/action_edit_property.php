<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    include_once "../database/commodity.php";
    
    if(!isset($_SESSION['username'])){
        header('Location: ../pages/login.php');
        die;
    }

    $username = $_SESSION['username'];
    
    if(!isset($_SESSION['property_id'])){
        header('Location: '.$_SERVER['HTTP_REFERER']);   
        die;
    }

    $property_id = $_SESSION['property_id'];
    unset($_SESSION['property_id']);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price_per_day = $_POST['price_per_day'];
    
    try{
       // updateProperty($property_id, $title, $description, $price_per_day);
    }catch(PDOException $e){
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die($e->getMessage());
    }

    if(isset($_POST['commodity'])){
        $commodity = $_POST['commodity'];
        try{
            $commodityID = getCommodityID($commodity);

            if($commodityID != null){
                addPropertyCommodity($property_id, $commodityID);
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    header('Location: ../pages/user.php');
    die();
?>