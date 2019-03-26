<?php

include("config.php");

// Cek apakah button Masukan Nilai sudah diklik atau belum?
if (isset($_POST['input'])) {

    // Mengambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nilaiTugas = $_POST['nilaiTugas'];
    $nilaiUts = $_POST['nilaiUts'];
    $nilaiUas = $_POST['nilaiUas'];
    $hasil = $_POST['hasil'];

    // Membuat query
    $sql = "UPDATE tb_nilai SET nama='$nama', nilaiTugas='$nilaiTugas', nilaiUts='$nilaiUts', nilaiUas='$nilaiUas', hasil='$hasil' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // Apakah query berhasil disimpan?
    if ($query) {
        // Jika berhasil kembali ke halaman index.php dengan status sukses
        header('Location: list-nilai.php?status=sukses');
    } else {
        // Jika gagal akan diulangi
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
 