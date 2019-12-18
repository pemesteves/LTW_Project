<?php

    include_once "../database/reservations.php";
    $exists = true;

    if(!isset($_POST['property']) || !$property = $_POST['property']) {
        echo json_encode(['exists'=> $exists]);
        exit;
    }

    if(!isset($_POST['start']) || !$start = $_POST['start']) {
        echo json_encode(['exists'=> $exists]);
        exit;
    }

    if(!isset($_POST['end']) || !$end= $_POST['end']) {
        echo json_encode(['exists'=> $exists]);
        exit;
    }    

    if(count(getHouseReservationsBetweenDates($property, $start, $end)) == 0) {
        $exists = false;
    }

    echo json_encode(['exists'=> $exists]);
?>
