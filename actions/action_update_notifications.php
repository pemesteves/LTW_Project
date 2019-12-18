<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";

  $successful = false;
  $notifications = 0;

  $date1 = "";
  $description1 = "";

  $date2 = "";
  $description2 = "";

  $date3 = "";
  $description3 = "";

  if (!isset($_SESSION['username'])){
    echo json_encode(['successful'=> $successful, 'notifications'=> $notifications]);
    die();
  } 

  try {
    $notifications = getActiveNotifications($_SESSION['username']);
    $notification_number = count($notifications);
    $successful = true;

    $index = 0;
    foreach($notifications as $notification) {
      $index++;
      if($index == 1) {
        $date1 = $notification['date'];
        $description1 = $notification['description'];
      }
      else if($index == 2) {
        $date2 = $notification['date'];
        $description2 = $notification['description'];
      }
      else if($index == 3) {
        $date3 = $notification['date'];
        $description3 = $notification['description'];
      }
      else {
        break;  
      }
    }
    
    echo json_encode(['successful'=> $successful, 'notifications'=> $notification_number,
                      'date1'=> $date1, 'description1'=> $description1,
                      'date2'=> $date2, 'description2'=> $description2,
                      'date3'=> $date3, 'description3'=> $description3
                      ]);
  }
  catch(PDOException $e) {
    echo json_encode(['successful'=> $successful, 'notifications'=> $notifications]);

    $_SESSION['error_messages'][] = "Failed to get the notifications";
    die($e->getMessage());
  }

  die();
?>