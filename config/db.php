<?php

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'sendglobal');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function conn(){
    global $conn;

    return $conn;
}
