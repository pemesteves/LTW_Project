<?php
  include_once('../includes/init.php');
  include_once('../database/reservations.php');

  if (!isset($_SESSION['username'])){
    header('Location: ../pages/login.php');
  } 
  $username = $_SESSION['username'];

  if(!isset($_POST['id_property'])){
    //SEND MESSAGE: MISSING PROPERTY ID  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  $id_property = $_POST['id_property'];

  if(!isset($_POST['start_date'])){
    //SEND MESSAGE: MISSING START DATE  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  $start_date = $_POST['start_date']; 

  if(!isset($_POST['end_date'])){
    //SEND MESSAGE: MISSING END DATE  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  $end_date = $_POST['end_date'];

  if($end_date <= $start_date){
    //SEND MESSAGE: start date can't be greater than the end date
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
  }

  if(!isset($_POST['sleeps'])){
    //SEND MESSAGE: MISSING SLEEPS  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  $sleeps = $_POST['sleeps'];

  try{
    $reservations = getHouseReservationsBetweenDates($id_property, $start_date, $end_date);
  }catch(PDOException $e){
    die($e->getMessage());
    $_SESSION['error_messages'][] = "Failed to get the house reservations";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  if(count($reservations) != 0){
    //SEND MESSAGE: House can't be booked   
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  try{
      addReservation($id_property, $username, $start_date, $end_date, $sleeps);
  }catch(PDOException $e){
      die($e->getMessage());
      $_SESSION['error_messages'][] = "Failed to add a reservation";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  header('Location: ../pages/index.php');  // CHECK THIS
?>