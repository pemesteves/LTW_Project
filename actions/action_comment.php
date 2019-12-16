<?php   
    include_once "../database/reservations.php";
    
    $comment = htmlspecialchars($_POST['comment']);
    $id = $_POST['reservation'];

    try{
        addComment($id, $comment);
    }catch(PDOException $e){
        die($e->message());
    }
    
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
?>