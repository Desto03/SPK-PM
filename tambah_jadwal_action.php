<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_pelamar = htmlspecialchars($_POST['nama_pelamar']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $email = htmlspecialchars($_POST['email']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    // Perbaikan query untuk menyesuaikan jumlah kolom
    $query = "INSERT into jadwal (nama_pelamar, no_hp, email, jadwal) VALUES (?, ?, ?, ?)";
    $pelamar = $koneksi->prepare($query);
    $pelamar->bind_param("ssss", $nama_pelamar, $no_hp, $email, $jadwal);

    if ($pelamar->execute()) {
        echo "<script>alert('Data Berhasil Disimpan');location='home.php?page=jadwal';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
