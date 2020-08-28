<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect post variables
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $media = $_POST['media'];

    // Set the media and user id variables
    $_POST['media'] = implode(',', $media);
    $_POST['uid'] = $_SESSION['uid'];

    // Instantiate the playlist object
    $playlist = new Playlist($_POST);

    // Save object to DB
    $playlist->save();

    // Redirect to the playlist page
    header("Location: ../../playlists");