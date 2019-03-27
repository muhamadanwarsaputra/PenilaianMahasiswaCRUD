<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php

include("config.php");

// Cek tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-nilai.php');
}

// Mengambil id dari query string
$id = $_GET['id'];

// Membuat query untuk mengambil data dari database
$sql = "SELECT * FROM tb_nilai WHERE id=$id";
$query = mysqli_query($db, $sql);
$nilai = mysqli_fetch_assoc($query);

// Jika data yang di edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EDIT NILAI</title>
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

    <br>
    <div class="container">
        <h4>EDIT NILAI</h4>
        <div class="card">
            <div class="card-body">

                <form action="proses-edit.php" method="POST">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $nilai['id'] ?>" />
                        <p>
                            <label for="nama">Nama: </label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $nilai['nama'] ?>" placeholder="Nama Lengkap" required />
                        </p>

                        <p>
                            <label for="nilaiTugas">Nilai Tugas: </label>
                            <input type="number" class="form-control" name="nilaiTugas" value="<?php echo $nilai['nilaiTugas'] ?>" placeholder="0-100" required />
                        </p>

                        <p>
                            <label for="nilaiUts">Nilai UTS: </label>
                            <input type="number" class="form-control" name="nilaiUts" value="<?php echo $nilai['nilaiUts'] ?>" placeholder="0-100" required />
                        </p>

                        <p>
                            <label for="nilaiUas">Nilai UAS: </label>
                            <input type="number" class="form-control" name="nilaiUas" value="<?php echo $nilai['nilaiUas'] ?>" placeholder="0-100" required />
                        </p>

                        <p>
                            <label for="hasil">Grade: </label>
                            <input type="text" class="form-control" name="hasil" value="<?php echo $nilai['hasil'] ?>" placeholder="Grade" required />
                        </p>

                        <p>
                            <input type="submit" class="btn btn-primary" value="Update" name="input" />
                            <input type="button" class="btn btn-primary" value="Cancle" onclick="window.location.href='list-nilai.php'" />
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p><b>KOMINFO 2019</p>
    </div>

</body>

</html> 