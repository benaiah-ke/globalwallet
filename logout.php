<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/../functions/session.php';

unset($_SESSION['user']);
header("Location: login.php")

?>
