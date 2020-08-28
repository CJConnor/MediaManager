<?php
    @session_start();

    $inc_dir = $_SERVER['DOCUMENT_ROOT'] . '/NOWSKILLS/MediaManager';

    // All required files
    require_once $inc_dir . '/classes/Database.php';
    require_once $inc_dir . '/classes/System.php';
    require_once $inc_dir . '/classes/MediaFile.php';
    require_once $inc_dir . '/classes/Playlist.php';
    require_once $inc_dir . '/classes/Category.php';
    require_once $inc_dir . '/classes/User.php';
    require_once $inc_dir . '/inc/vars.php';