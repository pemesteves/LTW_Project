<?php
  include_once('../includes/init.php');
  include_once('../database/user.php');

  if (checkLogin($_POST['username'], $_POST['password'])) {
    setCurrentUser($_POST['username']);
    $_SESSION['success_messages'][] = "Login successful";
  } 
  else {
    $_SESSION['error_messages'][] = "Login failed";
  }
  
  header('Location: ' . $_SERVER['HTTP_REFERER']);  // CHECK THIS
?>