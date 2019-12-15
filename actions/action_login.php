<?php
  include_once "../includes/init.php";
  include_once "../database/user.php";

  try{
    if (checkLogin($_POST['username'], $_POST['password'])) {
      setCurrentUser($_POST['username']);
      $_SESSION['success_messages'][] = "Login successful";
      header('Location: ../pages/index.php');
    } 
    else {
      $_SESSION['error_messages'][] = "Login failed";
      header('Location: ../pages/login.php');
    }  
  }catch(PDOException $e){
    catchException($e);
  }

  die();
?>