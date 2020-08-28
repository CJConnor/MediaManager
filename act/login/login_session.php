<?php
    session_start();

    // if session exists keep logged in
    echo isset($_SESSION['uid']) ? "logged in" : "expired";