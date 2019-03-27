<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NILAI MAHASISWA</title>
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
        <h4>NILAI MAHASISWA</h4>
        <div class="card">
            <div class="card-body">

                <input type="button" class="btn btn-primary btn-sm" value="Add" onclick="window.location.href='form-input.php'" />
                <!-- <input type="button" class="btn btn-primary btn-sm" value="Home" onclick="window.location.href='index.php'" /> -->
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Nama</th>
                            <th>Nilai Tugas</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UAS</th>
                            <th>Grade</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_nilai";
                        $query = mysqli_query($db, $sql);

                        while ($nilai = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            // echo "<td>".$nilai['id']."</td>";
                            echo "<td>" . $nilai['nama'] . "</td>";
                            echo "<td>" . $nilai['nilaiTugas'] . "</td>";
                            echo "<td>" . $nilai['nilaiUts'] . "</td>";
                            echo "<td>" . $nilai['nilaiUas'] . "</td>";
                            echo "<td>" . $nilai['hasil'] . "</td>";

                            echo "<td>";
                            echo "<a href='form-edit.php?id=" . $nilai['id'] . "'>Edit</a> | ";
                            echo "<a href='hapus.php?id=" . $nilai['id'] . "'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>

                <p>Total: <?php echo mysqli_num_rows($query) ?></p>

            </div>
        </div>
    </div>

    <div class="footer">
        <p><b>KOMINFO 2019</p>
    </div>

</body>

</html> 