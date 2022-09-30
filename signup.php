<?php

require __DIR__ . '/functions/session.php';
require __DIR__ . '/functions/signup.php';

$currencies = require __DIR__ . '/config/currencies.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
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
                    <h4>Create Account</h4>
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
                                <label>Full Name</label>
                                <input class="form-control" type="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label>Your Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>Primary Currency</label>
                                <select class="form-control" name="currency" required>
                                    <option value="">Select a Currency</option>
                                    <?php foreach($currencies as $code => $name){ ?>
                                        <option value="<?= $code ?>"><?= $name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Set a Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>

                            <div class="form-group mb-4">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>

                            <div class="text-center">
                                Already registered? <a href="login.php">Log in</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>
