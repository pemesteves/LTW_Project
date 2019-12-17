<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    include_once "../database/commodity.php";
    include_once "../database/property.php";

    if(!isset($_SESSION['username'])){
        header('Location: ../pages/login.php');
        die;
    }

    $username = $_SESSION['username'];
    error_log("name: " . $username . "\n");

    if(!isset($_SESSION['property_id'])){
        header('Location: '.$_SERVER['HTTP_REFERER']);   
        die;
    }

    $property_id = $_SESSION['property_id'];
    unset($_SESSION['property_id']);
    error_log("property: " . $property_id . "\n");

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price_per_day = $_POST['price_per_day'];
    
    try{
        updateProperty($property_id, $title, $description, $price_per_day);
    }catch(PDOException $e){
        catchException($e);
    }

    if(isset($_POST['commodity'])){
        $commodity = $_POST['commodity'];
        try{
            $commodityID = getCommodityID($commodity);

            if($commodityID == null){
                createCommodity($commodity);
                
                $commodityID = getCommodityID($commodity);
            }
            
            addPropertyCommodity($property_id, $commodityID['id']);
        }catch(PDOException $e){
            catchException($e);
        }
    }


    header('Location: ../pages/user.php');
    die();
?>