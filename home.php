<?php
session_start();

if (empty($_SESSION['id_user'])) {
  $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
  header('Location: ./login.php');
  die();
} else {
  include "koneksi.php";
  include "class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <script src='js/fontawesome.js'></script>
  <!-- Bootstrap core CSS -->
  <script src="js/jquery.min.js"></script>
  <!-- DataTable -->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">

  <style>
    /* Reset CSS */
    body, h1, h2, p, ul, li, table, th, td {
      margin: 0;
      padding: 0;
    }

    /* Styling for header */
    header {
      background-color: #0073e6; /* Warna latar belakang biru */
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Styling for main content */
    main {
      padding: 20px;
      text-align: center;
      background-color: #f7f7f7;
      border-radius: 10px;
    }

    /* Styling for table */
    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
      border: 1px solid #0073e6; /* Warna border biru */
    }

    th, td {
      padding: 10px;
    }

    /* Styling for footer */
    footer {
      background-color: #0073e6; /* Warna latar belakang biru */
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    /* Additional Styles */
    h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    /* Add your custom styles here */
    .highlight {
      background-color: #ffcc00;
    }

    /* Styling for buttons */
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #0073e6; /* Warna tombol biru */
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #005dbb; /* Warna tombol biru yang lebih gelap saat hover */
    }

    /* Background Image SpongeBob */
    body {
      background-image: url('spongebob.jpg'); /* Ganti 'spongebob.jpg' dengan nama gambar SpongeBob Anda */
      background-repeat: no-repeat;
      background-size: cover; /* Untuk mengisi latar belakang secara penuh */
      background-attachment: fixed; /* Untuk membuat gambar latar belakang tetap saat menggulir halaman */
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SPK - Profile Matching</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="keluar.php"> <span data-feather="log-out"></span> Sign out </a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <?php include "menu.php"; ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">
            <?php
              if (isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];

                switch ($page) {
                  case 'pelamar':
                    echo "Data Pelamar";
                    break;
                  case 'aspek':
                    echo "Aspek Penilaian";
                    break;
                  case 'kriteria':
                    echo "Kriteria Penilaian";
                    break;
                  case 'profile':
                    echo "Profile Matching";
                    break;
                  case 'perhitungan':
                    echo "Hasil Perhitungan";
                    break;
                  case 'gantipassword':
                    echo "Ganti Password";
                    break;
                }
              } else {
                echo "Home";
              }
            ?>
          </h1>
        </div>
        <div class="table-responsive">
          <?php
            if (isset($_REQUEST['page'])) {
              $page = $_REQUEST['page'];

              switch ($page) {
                case 'pelamar':
                  include "pelamar.php";
                  break;
                case 'aspek':
                  include "aspek.php";
                  break;
                case 'tambah_aspek':
                  include "tambah_aspek.php";
                  break;
                case 'edit_aspek':
                  include "edit_aspek.php";
                  break;
                case 'tambah_pelamar':
                  include "tambah_pelamar.php";
                  break;
                case 'edit_pelamar':
                  include "edit_pelamar.php";
                  break;
                case 'tambah_kriteria':
                  include "tambah_kriteria.php";
                  break;
                case 'edit_kriteria':
                  include "edit_kriteria.php";
                  break;
                case 'kriteria':
                  include "kriteria.php";
                  break;
                case 'profile':
                  include "profile.php";
                  break;
                case 'perhitungan':
                  include "perhitungan.php";
                  break;
                case 'gantipassword':
                  include "gantipassword.php";
                  break;
              }
            } else {
          ?>
          <!-- Main component for a primary marketing message or call to action -->
          <div class="jumbotron">
            <h3>Selamat Datang di Aplikasi SPK Penerimaan Pegawai Dengan Metode Profile Matching</h3>
            <p>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai <strong><?php echo ($_SESSION['level'] == 1) ? 'Admin' : 'Petugas Kasir'; ?></strong></p>
            <p>
              Profile matching merupakan suatu proses yang sangat penting dalam manajemen SDM dimana terlebih dahulu ditentukan kompetensi (kemampuan) yang diperlukan oleh suatu jabatan. Kompetensi atau kemampuan tersebut haruslah dapat dipenuhi oleh pemegang atau calon pemegang jabatan. Dalam proses profile matching secara garis besar merupakan proses membandingkan antara kompetensi individu kedalam kompetensi jabatan sehingga dapat diketahui perbedaan kompetensinya (disebut juga Gap), semakin kecil gap yang dihasilkan maka bobot nilainya semakin besar yang berarti memiliki peluang lebih besar untuk pegawai yang menempati posisi tersebut. (Sianturi, 2015:45).
            </p>       
          </div>
          <?php
            }
          ?>
        </div>
      </main>
    </div>
  </div>      
</body>
</html>
<?php
}
?>
