<?

ini_set('display_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/functions/session.php';
require __DIR__ . '/functions/send.php';

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
    <title>Send Money</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-default bg-white navbar-expand">
        <div class="container-fluid">

            <div class="navbar-header">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img style="height: 40px" class="mr-3" src="https://cdn-icons-png.flaticon.com/512/3572/3572730.png" alt="Logo">
                    <span>SendGlobal</span>
                </a>
            </div>

            <ul class="navbar-nav">
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
    </nav>

    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">
            <a>Send Money</a>
        </li>
    </ul>

    <div class="container py-5">

        
        
        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-6 col-xl-5 mx-auto">

                <div class="text-center mb-4">
                    <h4>Send Money</h4>
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
                                <label>Recepient's Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input class="form-control" type="text" name="amount" required>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block">Send</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>


    </div>
</body>
</html>
