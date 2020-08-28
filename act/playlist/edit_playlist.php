<?php
    session_start();

    include_once '../../inc/includes.php';

    // Grab post variables
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $media = $_POST['media'];

    // Instantiate playlist object
    $playlist = new Playlist($_POST);

    // Set playlist name and media order
    $playlist->setName($name);
    $playlist->newOrder(implode(',', $media));

    // Save playlist
    $playlist->save();

    // Redirect to playlist page
    header("Location: ../../playlist?id=" . $id);