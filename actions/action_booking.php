<?php
  include_once "../includes/init.php";
  include_once "../database/reservations.php";
  include_once "../database/property.php";

  if (!isset($_SESSION['username'])){
    header('Location: ../pages/login.php');
    die();
  } 
  $username = $_SESSION['username'];

  if(!isset($_POST['id_property'])){
    //SEND MESSAGE: MISSING PROPERTY ID  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }
  $id_property = $_POST['id_property'];

  try{
    $info = getPropertyInfo($id_property);
  }catch(PDOException $e){
    catchException($e);
  }

  if($info['owner_username'] === $username){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die('Owner can\'t book one of his properties.');
  }

  if(!isset($_POST['start_date'])){
    //SEND MESSAGE: MISSING START DATE  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }
  $start_date = $_POST['start_date']; 

  if(!isset($_POST['end_date'])){
    //SEND MESSAGE: MISSING END DATE  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }
  $end_date = $_POST['end_date'];

  if($end_date <= $start_date){
    //SEND MESSAGE: start date can't be greater than the end date
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
    die();
  }

  if(!isset($_POST['sleeps'])){
    //SEND MESSAGE: MISSING SLEEPS  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }
  $sleeps = $_POST['sleeps'];

  if($sleeps > $info['sleeps']){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
  }

  try{
    $reservations = getHouseReservationsBetweenDates($id_property, $start_date, $end_date);
  }catch(PDOException $e){
    $_SESSION['error_messages'][] = "Failed to get the house reservations";
    catchException($e);
  }

  if(count($reservations) != 0){
    //SEND MESSAGE: House can't be booked   
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
  }

  try{
      addReservation($id_property, $username, $start_date, $end_date, $sleeps);
  }catch(PDOException $e){
      $_SESSION['error_messages'][] = "Failed to add a reservation";
      catchException($e);
  }

  header('Location: ../pages/user.php');
  die();
?>