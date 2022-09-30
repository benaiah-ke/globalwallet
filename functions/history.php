<?php

function getTransactions(){
    $currentUser = getCurrentUser();
    $user_id = $currentUser['id'];

    $sql = "SELECT `transactions`.*, `balance_updates`.amount, `balance_updates`.currency
        FROM `transactions` INNER JOIN `balance_updates` ON (
        `transactions`.`id` = `balance_updates`.`transaction_id` AND `balance_updates`.`user_id` = $user_id
        ) ORDER BY `transaction_time` DESC";

    global $conn;
    $result = $conn->query($sql);

    $transactions = [];
    while($transaction = $result->fetch_assoc()){
        $amount = $transaction['amount'];

        if($amount < 0){
            $transaction['debit'] = number_format(abs($amount), 2);
            $transaction['credit'] = 0;
        }else{
            $transaction['debit'] = 0;
            $transaction['credit'] = number_format($amount, 2);
        }

        array_push($transactions, $transaction);
    }

    return $transactions;
}

function getRecentTransactions(){
    $currentUser = getCurrentUser();
    $user_id = $currentUser['id'];

    $sql = "SELECT `transactions`.*, `balance_updates`.amount, `balance_updates`.currency
        FROM `transactions` INNER JOIN `balance_updates` ON (
        `transactions`.`id` = `balance_updates`.`transaction_id` AND `balance_updates`.`user_id` = $user_id
        ) ORDER BY `transaction_time` DESC LIMIT 3";

    global $conn;
    $result = $conn->query($sql);

    $transactions = [];
    while($transaction = $result->fetch_assoc()){
        $amount = $transaction['amount'];

        if($amount < 0){
            $transaction['debit'] = number_format(abs($amount), 2);
            $transaction['credit'] = 0;
        }else{
            $transaction['debit'] = 0;
            $transaction['credit'] = number_format($amount, 2);
        }

        array_push($transactions, $transaction);
    }

    return $transactions;
}
