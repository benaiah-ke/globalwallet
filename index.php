<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/functions/session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sendr - Send money to anyone, locally or abroad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .hero{
            background: linear-gradient(130deg, #131856, #111);
        }

        .hero-title{
            color: #fff;
            font-size: 40px;
            line-height: 55px;
        }

        .hero-subtitle{
            font-weight: 300;
            color: #fff;
            font-size: 30px;
        }

        .hero-img{
            height: 400px;
        }

        .icon{
            height: 80px;
            width: 80px;
            padding: 15px;
            display: block;
            margin: 15px auto 15px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 3px 0 rgba(0,0,0,.5);
        }

        .number{
            min-width: 50px;
            height: 50px;
            font-weight: 700;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-default bg-white navbar-expand-md">
        <div class="container-fluid">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img style="height: 40px" class="mr-3" src="https://cdn-icons-png.flaticon.com/512/3572/3572730.png" alt="Logo">
                    <span>Sendr</span>
                </a>
            </div>

            <button class="btn ml-auto d-md-none navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span style="display: block; margin: 0 0 5px 0; height: 3px; width: 25px; background: #333"></span>
                <span style="display: block; margin: 5px 0; height: 3px; width: 25px; background: #333"></span>
                <span style="display: block; margin: 0; height: 3px; width: 25px; background: #333"></span>
            </button>

            <div class="collapse navbar-collapse ml-md-auto" id="menu" aria-expanded="false">
                <ul class="mt-4 mt-md-0 nav navbar-nav ml-md-auto">
                    <?php if(sessionActive()){ ?>
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

                    <?php }else{ ?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary ml-4" href="signup.php">Get Started</a>
                    </li>

                    <?php } ?>
                </ul>
            </div>

        </div>
    </nav>


    <section class="hero py-5">
        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-lg-6 d-flex align-items-center">
                    <div>
                        <h4 class="hero-title mb-4">
                            Whether locally or accross borders, money transfer should be <span class="info-text">simple</span>
                        </h4>

                        <p class="lead text-white">
                            Sendr enables you to send money to any user regardless of
                            their wallet currency or country. Sign up and start sending and receiving money!
                        </p>

                        <div>
                            <a href="dashboard.php" class="btn btn-success btn-lg btn-top">Start Sending Money</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <img src="assets/images/transfer_money.svg" class="hero-img" alt="Transfer Money">
                    <style>
                        @media screen and (max-width: 768px) {
                            .hero-img {
                                width: 100%;
                            }

                            * {
                                font-size: 12px;
                                text-align: center;
                            }

                            .hero-title, .info-text {
                                font-size: 20px;
                                text-align: center;
                                line-height: 25px;
                            }

                            .lead {
                                padding-bottom: 20px;
                                text-align: center;
                            }

                            .ml-3 h4, .ml-3 p {
                                text-align: left;
                            }

                            .ml-3 {
                                padding-bottom: 15px;
                            }

                        }
                    </style>
                </div>

            </div>

        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-lg-4">
                    <div class="text-center">

                        <img src="assets/icons/simple.png" alt="" class="icon">

                        <h4 class="mb-3">Simple</h4>

                        <p class="lead mt-0 mb-4 text-left">
                            Sending money is as simple as providing an email and amount,
                            and just like that, you are done
                        </p>

                        <div>
                            <a href="dashboard.php" class="btn btn-block btn-primary">Get Started</a>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="text-center">

                        <img src="assets/icons/fast.png" alt="" class="icon">

                        <h4 class="mb-3">Fast</h4>

                        <p class="lead mt-0 mb-4 text-left">
                            When you hit send, your money is transferred that instant
                            and can be used immediately
                        </p>

                        <div>
                            <a href="dashboard.php" class="btn btn-block btn-primary">Get Started</a>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="text-center">

                        <img src="assets/icons/secure.png" alt="" class="icon">

                        <h4 class="mb-3">Secure</h4>

                        <p class="lead mt-0 mb-4 text-left">
                            Every cent transferred via Sendr is done with knowledge of the
                            sender. No one can send money on your behalf
                        </p>

                        <div>
                            <a href="dashboard.php" class="btn btn-block btn-primary">Get Started</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="hero py-5">
        <div class="container">

        <div class="row">
            <div class="col-lg-8 mx-auto text-center">

                <p class="lead text-white">
                    Creating a wallet is totally free and fast. Join the fastest money
                    transfer service on the planet and start enjoying our services
                </p>

                <div>
                    <a href="dashboard.php" class="btn btn-success btn-lg">Get Started Now</a>
                </div>

            </div>
        </div>

        </div>
    </section>


    <section class="py-5">
        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex">
                        <span class="number bg-primary text-white d-flex align-items-center justify-content-center">
                            1
                        </span>

                        <div class="ml-3">
                            <h4>Create Account</h4>

                            <p class="mb-0">
                                This requires only your details and takes a minute or less. It is totally free to sign up
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex">
                        <span class="number bg-primary text-white d-flex align-items-center justify-content-center">
                            2
                        </span>

                        <div class="ml-3">
                            <h4>Top Up</h4>

                            <p class="mb-0">
                                Hit the deposit page and top up your wallet using your favorite deposit method
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex">
                        <span class="number bg-primary text-white d-flex align-items-center justify-content-center">
                            3
                        </span>

                        <div class="ml-3">
                            <h4>Send Money</h4>

                            <p class="mb-0">
                                You can now transfer funds from your wallet to another user anywhere in the world
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
</body>
</html>
