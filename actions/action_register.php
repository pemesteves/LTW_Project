<?php
    include_once('../includes/init.php');
    include_once('../database/user.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];   
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];         
    $password = $_POST['password'];

    // Only alphabetical letters and numbers
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
        $_SESSION['error_messages'][] = "Username can only contain aplhabetical letters and numbers";
        die(header('Location: ../pages/register.php'));
    }

    // Validate more

    try {
        registerUser($username, $email, $first_name, $last_name, $phone, $birthdate, $password);
        $_SESSION['username'] = $username;
        $_SESSION['success_messages'][] = "Registered successfuly and logged in";
        header('Location: ../pages/user_page.php'); // CHANGE
    } 
    catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['error_messages'][] = "Failed to register";
        header('Location: ../pages/register.php');
    }
?>