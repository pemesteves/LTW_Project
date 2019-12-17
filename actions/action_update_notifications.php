<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";

  $successful = false;
  $notifications = 0;

  if (!isset($_SESSION['username'])){
    echo json_encode(['successful'=> $successful, 'notifications'=> $notifications]);
    die();
  } 

  try {
    $notifications = count(getActiveNotifications($_SESSION['username']));
    $successful = true;

    error_log($successful);
    error_log($notifications);
    
    echo json_encode(['successful'=> $successful, 'notifications'=> $notifications]);
  }
  catch(PDOException $e) {
    echo json_encode(['successful'=> $successful, 'notifications'=> $notifications]);

    $_SESSION['error_messages'][] = "Failed to get the notifications";
    die($e->getMessage());
  }

  die();
?>