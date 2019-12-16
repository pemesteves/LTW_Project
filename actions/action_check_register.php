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
            if (preg_match ("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $value) && !usernameAlreadyExists($value)) {
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
            if (preg_match ("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $value)) {
                $valid = true;
            }
            break;
        
        case 'first_name':
        case 'last_name':
            if (preg_match ("/^[A-Za-z]+$/", $value)) {
                $valid = true;
            }
            break;
            
        case 'phone':
            if (preg_match("/^[1-9][0-9]{7,12}$/", $value)) {
                $valid = true;
            }
            break; 
            
        case 'birthdate':
            $date_pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
            if(preg_match($date_pattern, $value)) {
                $valid = true;
            }
            break;             

        default: exit;
    }

    echo json_encode(['type'=>$type, 'valid'=>$valid]);
?>
