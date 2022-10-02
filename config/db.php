<?php

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'ehouseco_sendglobal');
define('DB_USER', 'ehouseco@localhost');
define('DB_PASSWORD', '');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function conn(){
    global $conn;

    return $conn;
}
