<?php

    include_once "../database/user.php";

    $type = 'unknown';
    $valid = false;

    if(!isset($_POST['type']) || !$type = $_POST['type']) {
        exit;
    }

    if(!isset($_POST['value']) || !$value = $_POST['value']) {
        echo json_encode(['type'=>$type, 'valid'=>$valid]);
        exit;
    }

    switch($type)
    {
        case 'username':
            if (preg_match ("/[A-Za-z0-9]+/", $value) && !usernameAlreadyExists($value)) {
                $valid = true;
            }
            break;
    
        case 'email':
            $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
            if(preg_match($email_pattern, $value)) {
                $valid = true;
            }
            break;

        case 'password':
            $valid = true;
            break;

        default: exit;
    }

    echo json_encode(['type'=>$type, 'valid'=>$valid]);
?>
