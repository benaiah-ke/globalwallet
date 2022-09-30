<?php

$error = null;

if(isset($_POST['name'], $_POST['currency'], $_POST['email'], $_POST['password'])){

    // Get submitted details
    $name = mysqli_escape_string($conn, $_POST['name']);
    $currency = mysqli_escape_string($conn, $_POST['currency']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    // Check if currency is supported
    $currencies = require __DIR__ . '/../config/currencies.php';
    if(array_key_exists($currency, $currencies)){

        // Encrypt the password
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        $query = "INSERT INTO `users`(`name`, `email`, `currency`, `password`)
            VALUES('$name', '$email', '$currency', '$password')";

        // Run sql
        if($conn->query($query)){

            // Start a user session
            $_SESSION['user'] = $email;

            // Redirect to dashboard
            header("location: dashboard.php");

        }else{
            $error = "Error. Unable to create an account";
        }

    }else{
        $error = "The provide currency is not supported";
    }

}