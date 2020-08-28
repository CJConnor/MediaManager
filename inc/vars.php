<?php
    
    # Connection parameters
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "media_manager");

    # Database connection
    $db = new Database;

    # User
    $user = new User(@$_SESSION['uid']);
    $user_fullname = $user->getFullName();
    $user_media = $user->getMedia();