<?php
    include_once "../database/connection.php";

    function getUserReservations($username){
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation WHERE tourist_username = ?');
        $stmt->execute(array($username));

        return $stmt->fetchAll();
    }
?>