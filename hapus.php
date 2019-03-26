<?php

include("config.php");

if (isset($_GET['id'])) {

    // Mengambil id dari query string
    $id = $_GET['id'];

    // Membuat query hapus
    $sql = "DELETE FROM tb_nilai WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // Apakah query berhasil dihapus?
    if ($query) {
        header('Location: list-nilai.php');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
 