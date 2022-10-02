<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

$error = null;

if(isset($_POST['email'], $_POST['amount'])){

    // Get submitted details
    $amount = mysqli_escape_string($conn, $_POST['amount']);
    $email = mysqli_escape_string($conn, $_POST['email']);

    // Check the amount
    if(is_numeric($amount) || intval($amount) < 0){

        $currentUser = getCurrentUser();

        // Check the balance
        if($currentUser['balance'] >= $amount){

            // Get the recepient
            $recepient = getRecepient($email);

            if($recepient != null){

                // Attempt transfer
                $transfer = transfer($amount, $currentUser, $recepient);

                if(is_string($transfer)){
                    // An error
                    echo "<script>alert('ERROR: $transfer')</script>";
                }else{
                    $msg = $transfer['credit_amount'].' successfully transferred to '.$recepient['name'].'.'.
                        ' '.$transfer['debit_amount'].' has been deducted from your account';
                    echo "<script>
                        alert('$msg');
                        window.location.href = window.location.href;
                    </script>";
                }

            }else{
                $error = "There is no user with that email";
            }

        }else{
            $error = "Your balance of ".$currentUser['currency'].' '.$currentUser['balance'].' cannot satisfy the amount to be transferred';
        }

    }else{
        $error = "Amount should be a numeric value more than 0";
    }

}

function getRecepient($email){
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    global $conn;
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function transfer($amount, $from, $to){
    // Amounts
    // Debit amount is simply the amount
    $debit_amount = $amount;

    if($from['currency'] == $to['currency']){
        // Credit amount is same as debit amount. No need for a conversion
        $credit_amount = $debit_amount;
    }else{
        // We need to convert the amount to the new currency
        $credit_amount = convertToCurrency($debit_amount, $from['currency'], $to['currency']);
    
        if(is_string($credit_amount)){
            // Error
            return $credit_amount;
        }
    }
    

    global $conn;

    // Multiple sql statements
    // All need to be executed successfully or none executed at all
    // So we'll use a db transaction
    $conn->autocommit(false);

    // The unifying transaction
    $res = $conn->query("INSERT INTO `transactions`(`type`) VALUES('Transfer')");

    // Get the id of the new transaction record
    if($res){
        $transaction_id = $conn->insert_id;
    }else{
        return "Something went wrong";
    }
    
    // For user being debited (sender)
    // Debit record
    $res = $conn->query("INSERT INTO `balance_updates`(`user_id`, `transaction_id`, `amount`, `currency`)
        VALUES(".$from['id'].", $transaction_id, -$debit_amount, '".$from['currency']."')");

    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }

    // Update balance
    $res = $conn->query("UPDATE `users` SET `balance` = `balance` - $debit_amount WHERE
        `id` = ".$from['id']);

    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }


    
    // For user being credited (recepient)
    // Credit record
    $res = $conn->query("INSERT INTO `balance_updates`(`user_id`, `transaction_id`, `amount`, `currency`)
        VALUES(".$to['id'].", $transaction_id, $credit_amount, '".$to['currency']."')");
    
    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }

    // Update balance
    $res = $conn->query("UPDATE `users` SET `balance` = `balance` + $credit_amount WHERE
        `id` = ".$to['id']);

    if(!$res){
        // Rollback transaction
        $conn->rollback();
        return "Something went wrong";
    }


    // At this point, all queries are executed
    // We can now commit all the results to the database
    $conn->commit();


    return [
        'debit_amount' => $from['currency'].' '.$debit_amount,
        'credit_amount' => $to['currency'].' '.$credit_amount,
    ];
}

function convertToCurrency($amount, $fromCurrency, $toCurrency) {
    // We'll use a third party API to convert
    $apiKey = 'oHTkg5TwxSW3zWXgc8ISzq1SlEliHUrK';
    $url = "https://api.apilayer.com/exchangerates_data/convert?to=$toCurrency&from=$fromCurrency&amount=$amount";

    // We use curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'apikey: ' . $apiKey
    ));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($ch);
    curl_close($ch);

    // Result is a json string
    $conversion = json_decode($result, true);

    if(!$conversion['success']){
        return 'Unable to get currency conversion data'; 
    }

    return $conversion['result'];
}