<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";

  if (!isset($_SESSION['username'])){
    header('Location: ../pages/login.php');
    die();
  } 
  $username = $_SESSION['username'];

  if(!isset($_POST['reservation'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }
  $id_reservation = $_POST['reservation'];

  error_log("Reservation: " . $id_reservation);

  try{
      $reservationInfo = getReservationInfo($id_reservation);
    
      if($username !== $reservationInfo['tourist_username']){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die('Can\'t cancel reservation from other user.');
      }

      if(date('Y-m-d') >= date($reservationInfo['date_start'])){
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          die('Can\'t cancel reservation after the reservation start date.');
      }
  }catch(PDOException $e){
    catchException($e);
  }

  try{
      cancelReservation($id_reservation);
  }catch(PDOException $e){
      $_SESSION['error_messages'][] = "Failed to cancel reservation";
      catchException($e);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  die();
?>