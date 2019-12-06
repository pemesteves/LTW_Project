<?php

  include_once "../database/connection.php";

  function checkLogin($username, $password) {
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password_hash = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
  }

  // Change this
  function registerUser($username, $paswword) {
    $stmt = $db->prepare('INSERT INTO user VALUES(?, ?)');
    $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options)));
  }
?>