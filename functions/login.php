<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

$error = null;

if(isset($_POST['email'], $_POST['password'])){

    // Get submitted credentials
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";

    // Run sql
    $result = $conn->query($query);

    if($result->num_rows > 0){
        
        $user = $result->fetch_assoc();

        // Check password
        if(password_verify($password, $user['password'])){

            // Start a user session
            $_SESSION['user'] = $email;

            // Redirect to dashboard
            header("location: dashboard.php");

        }else{
            $error = "Failed. Incorrect password provided";
        }

    }else{
        $error = "User with the given email does not exist";
    }

}