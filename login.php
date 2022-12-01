<?php

ini_set('display_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/functions/session.php';
require __DIR__ . '/functions/login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-6 col-xl-5 mx-auto">

                <div class="text-center mb-4">
                    <img class="mb-4" style="height: 60px" src="https://cdn-icons-png.flaticon.com/512/3572/3572730.png" alt="Send Global">
                    <h4>Log In</h4>
                </div>

                <div class="card">
                    <div class="card-body">

                        <?php if(isset($error)){ ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php } ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label>Your Email</label>
                                <input class="form-control" type="email" name="email" id="email" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>

                            <div class="form-group mb-4">
                                <button class="btn btn-primary btn-block">Log In</button>
                            </div>

                            <div class="text-center">
                                Not registered? <a href="signup.php">Create Account</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>