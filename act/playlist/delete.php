<?php
    session_start();

    include_once '../../inc/includes.php';

    // Grab playlist id
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

    // Remove playlist from the DB
    $db->query("DELETE FROM playlist WHERE id = :id");
    $db->bind(':id', $id);
    $db->execute();

    // Redirect to playlist page
    header('Location: ../../playlists');