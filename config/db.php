<?php

define('DB_HOST', '127.0.0.1');
define('DB_DATABASE', 'sendglobal');
define('DB_USER', 'root');
define('DB_PASSWORD', '.praise30');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function conn(){
    global $conn;

    return $conn;
}
