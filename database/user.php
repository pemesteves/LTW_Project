<?php

  include_once "../database/connection.php";

  function checkLogin($username, $password) {
    $user_info = getUserInfo($username, $password); 
    echo($username);
    echo($password);
    return $user_info !== false;
  }

  // check if user already exists
  function registerUser($username, $email, $first_name, $last_name, $phone, $birthdate, $password) {
    global $db;
     
    $stmt = $db->prepare('INSERT INTO User 
                          (username, full_name, birthdate, phone, email, password_hash, image_name)
                          VALUES
                          (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($username, $email, $first_name, $last_name, $phone, $birthdate, password_hash($password, PASSWORD_DEFAULT, $options)));
  }

  function getUserInfo($username, $password){
    global $db;

    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password_hash = ?');
    $stmt->execute(array($username, $password));

    return $stmt->fetch();
  }
?>