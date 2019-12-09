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

    if (!isset($username) || $username === '' || !preg_match ("/[A-Za-z0-9]+/", $username)) {
        $_SESSION['error_messages'][] = "Username can only contain aplhabetical letters and numbers";
        error_log("BAD USERNAME");
        die(header('Location: ../pages/register.php'));
    }

    $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    if(!isset($email) || $email === '' || !preg_match($email_pattern, $email)) {
        $_SESSION['error_messages'][] = "Email is invalid";
        error_log("BAD EMAIL");
        die(header('Location: ../pages/register.php'));        
    }

    if(usernameAlreadyExists($username)) {
        $_SESSION['error_messages'][] = "Username's already taken";  
        error_log("REPEATED USERNAME");    
        die(header('Location: ../pages/register.php'));          
    }

    if (!isset($first_name) || $first_name === '') {
        $_SESSION['error_messages'][] = "First name cannot be empty";
        error_log("BAD FIRST NAME");
        die(header('Location: ../pages/register.php'));
    }

    if (!isset($last_name) || $last_name === '') {
        $_SESSION['error_messages'][] = "Last name cannot be empty";
        error_log("BAD LAST NAME");
        die(header('Location: ../pages/register.php'));
    }

    if(!isset($phone) || $phone === '' || !preg_match("/^[1-9][0-9]{7,12}$/", $phone)) {
        $_SESSION['error_messages'][] = "Invalid phone number";
        error_log("BAD PHONE NUMBER");
        die(header('Location: ../pages/register.php'));
    }
    
    $date_pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";  // YYYY-MM-DD
    if(!isset($birthdate) || $birthdate === '') { //|| !preg_match($date_pattern, $birthdate)) {
        $_SESSION['error_messages'][] = "Invalid date";
        error_log("BAD BIRTHDATE");
        die(header('Location: ../pages/register.php'));        
    }

    if(!isset($password) || $password === '') {
        $_SESSION['error_messages'][] = "Password does not meet requirements";
        error_log("BAD PASSWORD");
        die(header('Location: ../pages/register.php'));            
    }

    $full_name = $first_name . " " . $last_name;
    try {
        registerUser($username, $email, $full_name, $phone, $birthdate, $password);
        $_SESSION['username'] = $username;
        $_SESSION['success_messages'][] = "Registered successfuly and logged in";
        header('Location: ../pages/user.php'); // CHANGE
    } 
    catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['error_messages'][] = "Failed to register";
        header('Location: ../pages/register.php');
    }

    clearMessages();
    error_log(implode($_SESSION['error_messages']));
    error_log(implode($_SESSION['success_messages']));   
?>