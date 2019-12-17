<?php   
    include_once "../database/reservations.php";
    
    $rating = $_POST['rating'];
    $id = $_POST['reservation'];

    try{
        addRating($id, $rating);
    }catch(PDOException $e){      
        catchException($e);
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
?>