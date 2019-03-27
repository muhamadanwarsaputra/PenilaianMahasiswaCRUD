<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: AliceBlue;
            color: Blue;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="home.php">
            <img src="logo.jpg" alt="logo" style="width:40px;">
            BPPTIK KOMINFO
        </a>
    </nav>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>

    <p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <div class="container">
        <h3>SKKNI BPPTIK</h3>
        <div class="card">
            <div class="card-body">
                <h4>Menu<h4>
                        <nav>
                            <ul>
                                <li><a href="form-input.php">Input Nilai</a></li>
                                <li><a href="list-nilai.php">List Nilai</a></li>
                        </nav>
            </div>
        </div>
    </div>

    <div class="footer">
        <p><b>KOMINFO 2019</p>
    </div>

</body>

</html> 