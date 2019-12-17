<?php

    include_once "../database/user.php";

    $successful = false;

    if(isset($_POST['username']) && ($username = $_POST['username']) && 
       isset($_POST['password']) && ($password = $_POST['password'])) {

        if(checkLogin($username, $password))
            $successful = true;
    }

    echo json_encode(['successful'=>$successful]);

?>
