<?php
    session_start();

    include_once '../../inc/includes.php';

    // Set name and user id
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $_POST['uid'] = $_SESSION['uid'];

    // Instantiate the category object
    $category = new Category($_POST);

    // Save object ot db
    $category->save();

    // Redirect to the categories page
    header("Location: ../../categories");