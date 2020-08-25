<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect post variables
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Query database for username
    $db->query("SELECT * FROM users WHERE username = :username LIMIT 1");
    $db->bind(":username", $username);
    $db->execute();

    // Check if user is there
    if ($db->rowCount() > 0) :

        $row = $db->single();

        // Check the passwords match
        if (password_verify($password, $row->password)) :
            $_SESSION['uid'] = $row->id;
            echo "success";
        else :
            echo "error";
        endif;
    else :
        echo "error";
    endif;
