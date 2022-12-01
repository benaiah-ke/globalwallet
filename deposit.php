<?php

require __DIR__ . '/functions/session.php';
require __DIR__ . '/functions/deposit.php';

// User must be signed in to access this page
if(!sessionActive()){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up wallet</title>
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
                    <span>SendGlobal</span>
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
            <a>Deposit</a>
        </li>
    </ul>

    <div class="container py-5">

        
        
        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-6 col-xl-5 mx-auto">

                <div class="text-center mb-4">
                    <h4>Top up wallet</h4>
                </div>

                <div class="card">
                    <div class="card-body">

                        <?php if(isset($error)){ ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php } ?>

                        <div class="alert alert-info">
                            Note that this is just a simulation oof a top up. No real money is involved here
                        </div>

                        <form action="" method="post">

                            <div class="form-group">
                                <label>Amount</label>
                                <input class="form-control" type="text" name="amount" required>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>


    </div>
</body>
</html>
