<?php
    $db = new PDO('sqlite:../database/data.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $db->prepare('PRAGMA foreign_keys = ON');
    $stmt->execute();
?>