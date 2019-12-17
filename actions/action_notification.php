<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";

  if (!isset($_SESSION['username'])){
    header('Location: ../pages/login.php');
    die();
  } 

  try {
    updateNotifications($_SESSION['username']);
  }catch(PDOException $e){
    $_SESSION['error_messages'][] = "Failed to get the notifications";
    catchException($e);
  }

  header('Location: ../pages/tourist_reservations.php');  // CHECK THIS
  die();
?>