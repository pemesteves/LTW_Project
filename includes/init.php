 <?php
  include_once 'session.php';
  include_once '../database/connection.php';

  if(!isset($_SERVER['HTTP_REFERER'])){
    $_SERVER['HTTP_REFERER'] = '../pages/index.php';
  }
  
  function catchException($e){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die($e->getMessage());
  }
?>