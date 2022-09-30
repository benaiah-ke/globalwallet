<?php

$error = null;

if(isset($_POST['amount'])){

    // Get submitted details
    $amount = mysqli_escape_string($conn, $_POST['amount']);

    // Check the amount
    if(is_numeric($amount) || intval($amount) < 0){

        $currentUser = getCurrentUser();

        // Make Deposit
        $result = topup($currentUser, $amount);

        if(is_string($result)){
            // An error
            echo "<script>alert('ERROR: $result')</script>";
        }else{
            $msg = "Top up successful. ".$currentUser['currency']." ".number_format($amount, 2)." has been credited to your account";
            echo "<script>
                alert('$msg');
                window.location.href = window.location.href;
            </script>";
        }

    }else{
        $error = "Amount should be a numeric value more than 0";
    }

}

function topup($user, $amount){
    global $conn;

    // Multiple sql statements
    // All need to be executed successfully or none executed at all
    // So we'll use a db transaction
    $conn->autocommit(false);

    // Create transaction
    $res = $conn->query("INSERT INTO `transactions`(`type`) VALUES('Deposit')");

    // Get the id of the new transaction record
    if($res){
        $transaction_id = $conn->insert_id;
    }else{
        return "Something went wrong";
    }
    
    // Debit record
    $res = $conn->query("INSERT INTO `balance_updates`(`user_id`, `transaction_id`, `amount`, `currency`)
        VALUES(".$user['id'].", $transaction_id, $amount, '".$user['currency']."')");

    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }

    // Update balance
    $res = $conn->query("UPDATE `users` SET `balance` = `balance` + $amount WHERE
        `id` = ".$user['id']);

    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }


    // At this point, all queries are executed
    // We can now commit all the results to the database
    $conn->commit();

    return true;
}
