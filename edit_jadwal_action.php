<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id_wwc = stripslashes(strip_tags(htmlspecialchars($_POST['id_wwc'], ENT_QUOTES)));
    $nama_pelamar = stripslashes(strip_tags(htmlspecialchars($_POST['nama_pelamar'], ENT_QUOTES)));
    $no_hp = stripslashes(strip_tags(htmlspecialchars($_POST['no_hp'], ENT_QUOTES)));
    $email = stripslashes(strip_tags(htmlspecialchars($_POST['email'], ENT_QUOTES)));
    $jadwal = stripslashes(strip_tags(htmlspecialchars($_POST['jadwal'], ENT_QUOTES)));

    $query = "UPDATE jadwal SET nama_pelamar='$nama_pelamar', no_hp='$no_hp', email='$email', jadwal='$jadwal' WHERE id_wwc='$id_wwc'";
    $pelamar = mysqli_query($koneksi, $query);

    if ($pelamar) {
        echo "<script>alert('Data Berhasil Diubah');location='home.php?page=jadwal';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$koneksi->close();
