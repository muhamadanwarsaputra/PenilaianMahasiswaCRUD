<?php

include("config.php");

// Cek apakah button Masukan Nilai sudah diklik atau belum?
if (isset($_POST['input'])) {

    // Mengambil data dari form
    $nama = $_POST['nama'];
    $nilaiTugas = $_POST['nilaiTugas'];
    $nilaiUts = $_POST['nilaiUts'];
    $nilaiUas = $_POST['nilaiUas'];
    $hasil = $_POST['hasil'];

    // Membuat query
    $sql = "INSERT INTO tb_nilai (nama, nilaiTugas, nilaiUts, nilaiUas, hasil) VALUE ('$nama', '$nilaiTugas', '$nilaiUts', '$nilaiUas', '$hasil')";
    $query = mysqli_query($db, $sql);

    // Apakah query berhasil disimpan?
    if ($query) {
        // Jika berhasil kembali ke halaman index.php dengan status sukses
        header('Location: list-nilai.php?status=sukses');
    } else {
        // Jika gagal akan diulangi
        header('Location: form-input.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
 