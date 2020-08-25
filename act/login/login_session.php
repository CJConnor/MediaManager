<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        echo 'logged-in';
    } else {
        echo 'expired';
    }