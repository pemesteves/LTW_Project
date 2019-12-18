<?php

    include_once "../database/reservations.php";
    include_once "../database/property.php";

    $exists = true;
    $over_limit = true;

    if(!isset($_POST['property']) || !$property = $_POST['property']) {
        echo json_encode(['exists'=> $exists, 'over_limit'=> $over_limit]);
        exit;
    }

    if(!isset($_POST['start']) || !$start = $_POST['start']) {
        echo json_encode(['exists'=> $exists, 'over_limit'=> $over_limit]);
        exit;
    }

    if(!isset($_POST['end']) || !$end= $_POST['end']) {
        echo json_encode(['exists'=> $exists, 'over_limit'=> $over_limit]);
        exit;
    }    

    if(!isset($_POST['guests']) || !$guests= $_POST['guests']) {
        echo json_encode(['exists'=> $exists, 'over_limit'=> $over_limit]);
        exit;
    }    

    if(count(getHouseReservationsBetweenDates($property, $start, $end)) == 0) {
        $exists = false;
    }

    $property_info = getPropertyInfo($property);
    if($guests <= $property_info['sleeps']){
        $over_limit = false;
    };

    echo json_encode(['exists'=> $exists, 'over_limit'=> $over_limit]);

?>
