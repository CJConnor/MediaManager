<?php
    session_start();

    include_once '../../inc/includes.php';

    // Collect id
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

    // Delete category from database
    $db->query("DELETE FROM category WHERE id = :id");
    $db->bind(':id', $id);
    $db->execute();

    // Remove category id from media files to avoid display errors
    $db->query("UPDATE media_file SET category = '' WHERE category = :id ");
    $db->bind(":id", $id);
    $db->execute();

    // Redirect to categories page
    header('Location: ../../categories');