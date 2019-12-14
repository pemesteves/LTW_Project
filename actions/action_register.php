<?php
    include_once "../includes/init.php";
    include_once "../database/user.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];   
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];         
    $password = $_POST['password'];

    error_log($username);
    error_log($first_name);

    clearMessages();

    if (!isset($username) || $username === '' || !preg_match ("/[A-Za-z0-9]+/", $username)) {
        $_SESSION['error_messages'][] = "ERROR: username can only contain aplhabetical letters and numbers";
        echo json_encode("ERROR: username can only contain aplhabetical letters and numbers");
        //die(header('Location: ../pages/register.php'));
        die;
    }

    if(usernameAlreadyExists($username)) {
        $_SESSION['error_messages'][] = "ERROR: username's already taken";  
        echo json_encode("ERROR: username's already taken");
        //die(header('Location: ../pages/register.php'));  
        die;        
    }

    $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    if(!isset($email) || $email === '' || !preg_match($email_pattern, $email)) {
        $_SESSION['error_messages'][] = "ERROR: e-mail is invalid";
        echo json_encode("ERROR: e-mail is invalid");
        //die(header('Location: ../pages/register.php'));       
        die; 
    }

    if (!isset($first_name) || $first_name === '') {
        $_SESSION['error_messages'][] = "ERROR: first name cannot be empty";
        error_log($first_name);
        echo json_encode("ERROR: first name cannot be empty");
        //die(header('Location: ../pages/register.php'));
        die;
    }

    if (!isset($last_name) || $last_name === '') {
        $_SESSION['error_messages'][] = "ERROR: last name cannot be empty";
        echo json_encode("ERROR: last name cannot be empty");
        //die(header('Location: ../pages/register.php'));
        die;
    }

    if(!isset($phone) || $phone === '' || !preg_match("/^[1-9][0-9]{7,12}$/", $phone)) {
        $_SESSION['error_messages'][] = "ERROR: invalid phone number";
        echo json_encode("ERROR: invalid phone number");
        //die(header('Location: ../pages/register.php'));
        die;
    }
    
    $date_pattern = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";  // YYYY-MM-DD
    if(!isset($birthdate) || $birthdate === '') { //|| !preg_match($date_pattern, $birthdate)) {
        $_SESSION['error_messages'][] = "ERROR: invalid date";
        echo json_encode("ERROR: invalid date");
        //die(header('Location: ../pages/register.php'));    
        die;
    }

    if(!isset($password) || $password === '') {
        $_SESSION['error_messages'][] = "ERROR: password does not meet requirements";
        echo json_encode("ERROR: password does not meet requirements");
        //die(header('Location: ../pages/register.php'));   
        die;         
    }

    $full_name = $first_name . " " . $last_name;
    try {
        registerUser($username, $email, $full_name, $phone, $birthdate, $password);
        $_SESSION['username'] = $username;
        $_SESSION['success_messages'][] = "SUCCESS: registered successfuly and logged in";
        echo json_encode("SUCCESS: registered successfuly and logged in");        
        header('Location: ../pages/user.php'); // CHANGE
    } 
    catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['error_messages'][] = "ERROR: failed to register";
        echo json_encode("ERROR: failed to register");
        //header('Location: ../pages/register.php');
        die;
    }

    error_log(implode($_SESSION['error_messages']));
    error_log(implode($_SESSION['success_messages']));   
    die();
?>