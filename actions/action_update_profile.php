<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    
    $username = $_SESSION['username'];
    
    $old_password = htmlspecialchars($_POST['old_password']);
    if($old_password != null){
        if(getUserPassword($username)['password'] != sha1($old_password)){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die("Password is incorrect!");
        }
    }
    
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    if($new_password != null){
        if($confirm_password != null){
            if($new_password != $confirm_password){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die("Passwords don't match");
            }
            else{
                try{
                    updateUserPassword($username, $new_password);
                }catch(PDOException $e){
                    catchException($e);
                }
            }
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die("You need to confirm the given password");
        }
    }


    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $image_name = htmlspecialchars($_POST['image_name']);
    
    try{
        updateUserInformation($full_name, $email, $phone, $birthdate, $image_name, $username);
    }catch(PDOException $e){
        catchException($e);
    }

    $new_username = htmlspecialchars($_POST['username']);

    if(!preg_match("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $new_username)){
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die("Invalid Username");
    }

    if(!usernameAlreadyExists($new_username)){
        try{
            updateUsername($username, $new_username);
            $_SESSION['username'] = $new_username;
        }catch(PDOException $e){
            catchException($e);
        }
            
    }
    else{
        /* TODO: Se username existir e' preciso dar esse feedback ao utilizador */
    }

    header('Location: ../pages/user.php');
    die();
?>