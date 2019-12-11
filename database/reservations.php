<?php
    include_once "../database/connection.php";

    function getUserReservations($username){
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation WHERE tourist_username = ?');
        $stmt->execute(array($username));

        return $stmt->fetchAll();
    }

    function getHouseReservations($id_property, $start_date, $end_date){
        global $db;

        $stmt = $db->prepare('
            SELECT * FROM Reservation 
            WHERE id_property = ? 
                  AND ((date_start >= ? AND date_end <= ?) 
                       OR (date_end >= ? AND date_start <= ?)
                       OR (date_start <= ? AND date_end >= ?)) 
            ');
        $stmt->execute(array($id_property, $start_date, $end_date, $end_date, $end_date, $start_date, $start_date));

        return $stmt->fetchAll();
    }

    function addReservation($id_property, $username, $start_date, $end_date){
        global $db;

        $stmt = $db->prepare('
            INSERT INTO Reservation 
                (id_property, tourist_username, date_start, date_end) 
            VALUES
                (?, ?, ?, ?);
        ');
        $stmt->execute(array($id_property, $username, $start_date, $end_date));
    }
?>