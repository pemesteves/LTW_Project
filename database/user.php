<?php

  include_once "../database/connection.php";

  function isLoginCorrect($username, $password) {
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password_hash = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
  }
?>