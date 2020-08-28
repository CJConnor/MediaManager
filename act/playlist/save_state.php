<?php
session_start();

include_once '../../inc/includes.php';

// Collect post variables
$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$new_order = filter_var($_POST['new_order'], FILTER_SANITIZE_STRING);

// Instantiate playlist object
$playlist = new Playlist(['id' => $id]);

// Set playlist order
$playlist->newOrder($new_order);

$playlist->save();

echo "success";