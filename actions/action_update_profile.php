<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";
    
    $username = $_SESSION['username'];

    
    $old_password = $_POST['old_password'];
    if($old_password != null){
        if(getUserPassword($username)['password'] != sha1($old_password)){
            die("Password is incorrect!");
        }
    }
    
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if($new_password != null){
        if($confirm_password != null){
            if($new_password != $confirm_password){
                die("Passwords don't match");
            }
            else{
                try{
                    updateUserPassword($username, $new_password);
                }catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        }else{
            die("You need to confirm the given password");
        }
    }


    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $image_name = $_POST['image_name'];
    
    updateUserInformation($full_name, $email, $phone, $birthdate, $image_name, $username);

    $new_username = $_POST['username'];

    if(!usernameAlreadyExists($new_username)){
        try{
            updateUsername($username, $new_username);
            $_SESSION['username'] = $new_username;
        }catch(PDOException $e){
            die($e->getMessage());
        }
            
    }
    else{
        /* TODO: Se username existir e' preciso dar esse feedback ao utilizador */
    }

    header('Location: ../pages/user.php');
    die();
?>