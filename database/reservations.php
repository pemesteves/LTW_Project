<?php
    include_once "../database/connection.php";

    function getUserReservations($username){
        global $db;

        $stmt = $db->prepare('SELECT * FROM Reservation WHERE tourist_username = ?');
        $stmt->execute(array($username));

        return $stmt->fetchAll();
    }

    function getHouseReservationsBetweenDates($id_property, $start_date, $end_date){
        global $db;

        $stmt = $db->prepare('
            SELECT * FROM Reservation 
            WHERE id_property = ? 
                  AND ((date_start >= Date(?) AND date_end <= Date(?)) 
                       OR (date_end >= Date(?) AND date_start <= Date(?))
                       OR (date_start <= Date(?) AND date_end >= Date(?))) 
            ');
        $stmt->execute(array($id_property, $start_date, $end_date, $end_date, $end_date, $start_date, $start_date));

        return $stmt->fetchAll();
    }

    function addReservation($id_property, $username, $start_date, $end_date,  $sleeps){
        global $db;

        $stmt = $db->prepare('
            INSERT INTO Reservation 
                (id_property, tourist_username, date_start, date_end, sleeps) 
            VALUES
                (?, ?, ?, ?, ?)
        ');
        $stmt->execute(array($id_property, $username, $start_date, $end_date, $sleeps));
    }
?>