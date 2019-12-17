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
                (?, ?, ?, ?, ?);
        ');
        $stmt->execute(array($id_property, $username, $start_date, $end_date, $sleeps));

        $stmt = $db->prepare('
            SELECT * 
            FROM Property
            WHERE id = ?;
        ');
        $stmt->execute(array($id_property));
        $owner = $stmt->fetch();
        $owner_username = $owner['owner_username'];

        $description = "User ".$username." has booked your property";
        $active = 1;
        $stmt = $db->prepare('
            INSERT INTO Notification 
                (property_id, owner_username, date, description, active) 
            VALUES
                (?, ?, ?, ?, ?);
        ');
        $stmt->execute(array($id_property, $owner_username, date("Y-m-d"), $description, $active));
    }

    function addComment($id, $comment){
        global $db;

        $stmt = $db->prepare('
            UPDATE Reservation
            SET comment = ?
            WHERE id = ?;
        ');

        $stmt->execute(array($comment, $id));
    }

    function addRating($id, $rating){
        global $db;

        $stmt = $db->prepare('
            UPDATE Reservation
            SET rating = ?
            WHERE id = ?
        ');

        $stmt->execute(array($rating, $id));
    }

    function getTouristsReservations($username) {
        global $db;
        $stmt = $db->prepare('
            SELECT *
            FROM Reservation
            JOIN Property
            ON Property.id = Reservation.id_property
            WHERE Property.owner_username = ?
            ORDER BY Property.id
        ');
        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }

    function getActiveNotifications($username) {
        global $db;
        $stmt = $db->prepare('
            SELECT Notification.description, Notification.date
            FROM Notification
            JOIN Property
            ON Notification.property_id = Property.id
            WHERE Property.owner_username = ?
            AND Notification.active = 1
            ORDER BY Property.id
        ');
        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }

    function updateNotifications($username){
        global $db;
        
        $stmt = $db->prepare('
          UPDATE Notification
          SET active = 0
          WHERE owner_username = ?
        ');
    
        $stmt->execute(array($username));
      }
?>