<?php

  include_once "../database/connection.php";

  function checkLogin($username, $password) {
    $user_info = getUserInfo($username, $password); 
    echo($username);
    echo($password);
    return $user_info !== false;
  }

  function getUserInfo($username, $password){
    global $db;

    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password_hash = ?');
    $stmt->execute(array($username, $password));

    return $stmt->fetch();
  }

  function usernameAlreadyExists($username) {
    global $db;
  
    $stmt = $db->prepare('SELECT username FROM User WHERE username = ?');
    $stmt->execute(array($username));

    return $stmt->fetch() !== false;  
  }

  function registerUser($username, $email, $full_name, $phone, $birthdate, $password) {
    global $db;
     
    $stmt = $db->prepare('INSERT INTO User 
                          (username, full_name, birthdate, phone, email, password_hash, image_name)
                          VALUES
                          (?, ?, ?, ?, ?, ?, \'user_placeholder.jpg\')');
    $stmt->execute(array($username, $email, $full_name, $phone, $birthdate, sha1($password)));
  }  

  function getUserPassword($username){
    global $db;

    $stmt = $db->prepare('
        SELECT password_hash as password
        FROM User
        WHERE username = ?
    ');
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function updateUserInformation($full_name, $email, $phone, $birthdate, $image_name, $username){
    global $db;

    $stmt = $db->prepare('
      UPDATE User
      SET full_name = ?,
          email = ?,
          phone = ?,
          birthdate = ?,
          image_name = ?
      WHERE username = ?
    ');

    $stmt->execute(array($full_name, $email, $phone, $birthdate, $image_name, $username));
  }
?>