<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'ehouseco_sendglobal');
define('DB_USER', 'ehouseco_benaiah');
define('DB_PASSWORD', '.praise30');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function conn(){
    global $conn;

    return $conn;
}
