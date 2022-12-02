<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/functions/session.php';
require __DIR__ . '/functions/history.php';

// User must be signed in to access this page
if(!sessionActive()){
    header("location: login.php");
}

$transactions = getTransactions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-default bg-white navbar-expand-md">
        <div class="container-fluid">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img style="height: 40px" class="mr-3" src="https://cdn-icons-png.flaticon.com/512/3572/3572730.png" alt="Logo">
                    <span class="logo-text">Sendr</span>
                </a>
            </div>

            <button class="btn ml-auto d-md-none navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span style="display: block; margin: 0 0 5px 0; height: 3px; width: 25px; background: #333"></span>
                <span style="display: block; margin: 5px 0; height: 3px; width: 25px; background: #333"></span>
                <span style="display: block; margin: 0; height: 3px; width: 25px; background: #333"></span>
            </button>

            <div class="collapse navbar-collapse ml-md-auto" id="menu" aria-expanded="false">
                <ul class="mt-4 mt-md-0 nav navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="history.php">History</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="deposit.php">Top Up</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="send.php">Send Money</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">
            <a>History</a>
        </li>
    </ul>

    <style>
        @media screen and (max-width: 768px) {

            * {
                font-size: 12px;
                text-align: center;
            }

            .logo-text {
                font-size: 18px;
            }

            .nav-link {
                font-size: 14px;
                text-align: left;
            }

        }
    </style>

    <div class="container py-5">

        
        
        <div class="row">

            <div class="col-md-11 col-lg-10 mx-auto">

                <div class="text-center mb-4">
                    <h4>Transaction History</h4>
                </div>

                <table class="table table-bordered table-striped">
                    <tr class="bg-success text-white">
                        <th>Type</th>
                        <th>Credit Amount</th>
                        <th>Debit Amount</th>
                        <th>Time</th>
                    </tr>

                    <?php if(count($transactions) == 0){ ?>
                        <tr>
                            <td colspan="3">
                                There are no transactions involving your account
                            </td>
                        </tr>
                    <?php } ?>

                    <?php foreach($transactions as $transaction){ ?>
                        <tr>
                            <td><?= $transaction['type'] ?></td>
                            <td>
                                <span class="text-success">
                                + <?= $transaction['currency'].' '.$transaction['credit'] ?>
                                </span>
                            </td>
                            <td>
                                <span class="text-danger">
                                - <?= $transaction['currency'].' '.$transaction['debit'] ?>
                                </span>
                            </td>
                            <td><?= $transaction['transaction_time'] ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>

        </div>


    </div>
</body>
</html>
