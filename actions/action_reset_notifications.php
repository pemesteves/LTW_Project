<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";

  if (!isset($_SESSION['username'])){
    die();
  } 
  error_log("CONA");

  try {
    updateNotifications($_SESSION['username']);
  }
  catch(PDOException $e) {
    $_SESSION['error_messages'][] = "Failed to reset the notifications";
    die($e->getMessage());
  }

  die();
?>