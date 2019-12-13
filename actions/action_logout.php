<?php
  include_once "../includes/init.php";
  
  session_destroy();
  session_start();

  $_SESSION['success_messages'][] = "User has been logged out";
  
  header('Location: ../pages/index.php');  
  die();
?>