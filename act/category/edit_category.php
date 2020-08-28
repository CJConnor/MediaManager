<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect parameters
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    // Instantiate category object
    $category = new Category($_POST);

    // Set the new category name
    $category->setName($name);

    // Save the category
    $category->save();

    // Redirect to the categories page
    header("Location: ../../categories");