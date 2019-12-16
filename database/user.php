<?php

  include_once "../database/connection.php";

  // Get-functions
  function checkLogin($username, $password) {
    $user_info = getUserInfo($username, sha1($password)); 
    return $user_info !== false;
  }

  function getUserInfo($username, $password){
    global $db;

    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password_hash = ?');
    $stmt->execute(array($username, $password));

    return $stmt->fetch();
  }

  function getUserContacts($username){
    global $db;

    $stmt = $db->prepare('SELECT User.email, User.phone FROM User WHERE username = ?');
    $stmt->execute(array($username));

    return $stmt->fetch();
  }

  function usernameAlreadyExists($username) {
    global $db;
  
    $stmt = $db->prepare('SELECT username FROM User WHERE username = ?');
    $stmt->execute(array($username));

    return $stmt->fetch() !== false;  
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

  function getUserImagePath($username) {
    global $db;

    $stmt = $db->prepare('
        SELECT image_name
        FROM User
        WHERE username = ?
    ');
    $stmt->execute(array($username));
    return $stmt->fetch();
  }


  // Set-functions
  function registerUser($username, $email, $full_name, $phone, $birthdate, $password) {
    global $db;
     
    $stmt = $db->prepare('INSERT INTO User 
                          (username, full_name, birthdate, phone, email, password_hash, image_name)
                          VALUES
                          (?, ?, ?, ?, ?, ?, \'user_placeholder.jpg\')');
    $stmt->execute(array($username, $full_name, $birthdate, $phone, $email, sha1($password)));
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

  function updateUsername($username, $new_username){
    global $db;

    $stmt = $db->prepare('
      UPDATE User
      SET username = ?
      WHERE username = ?
    ');

    $stmt->execute(array($new_username, $username));
  }

  function updateUserPassword($username, $new_password){
    global $db;
    
    $stmt = $db->prepare('
      UPDATE User
      SET password_hash = ?
      WHERE username = ?
    ');

    $stmt->execute(array(sha1($new_password), $username));
  }
?>