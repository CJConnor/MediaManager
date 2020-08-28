<?php
session_start();

include_once '../../inc/includes.php';

// Collect new order
$new_order = filter_var($_POST['new_order'], FILTER_SANITIZE_STRING);

// Set new order
$user->newOrder($new_order);

// Save new order
$user->save();

echo "success";