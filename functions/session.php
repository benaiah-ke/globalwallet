<?php

// Start a session
session_start();

require __DIR__ . '/../config/db.php';

// Gets the logged in user
function getCurrentUser(){
    if(!sessionActive()){
        return null;
    }

    $email = $_SESSION['user'];
    $query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";

    // Run sql
    $result = conn()->query($query);

    return $result->fetch_assoc();
}

// Checks if a user session is active
function sessionActive(){
    return isset($_SESSION['user']);
}
