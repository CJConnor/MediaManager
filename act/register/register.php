<?php
    session_start();

    include_once "../../inc/includes.php";

    // Collect post variables and filter 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $forename = filter_var($_POST['forename'], FILTER_SANITIZE_STRING);
    $surname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Add user to database
    $db->query(
        "INSERT INTO users (username, password, email, forename, surname, status) " .
        "VALUES (:username, :password, :email, :forename, :surname, '1')"
    );
    // Bind values to the query
    $db->bind(":username", $username);
    $db->bind(":password", $password);
    $db->bind(":email", $email);
    $db->bind(":forename", $forename);
    $db->bind(":surname", $surname);
    $db->execute();

    // Set user session
    $_SESSION['uid'] = $db->lastInsertID();

    echo "success";


