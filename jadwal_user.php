<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Jadwal Wawancara</title>

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
    <link rel="stylesheet" href="css/styles.css">

    <style>
        body {
            background-image: url('assets/images/zyro-image2.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            /* background-color: ; */
            /* Warna abu yang diinginkan */
            height: 100%;
            /* Tinggi halaman diatur 100% untuk mengisi layar */
        }

        /* ... (CSS lainnya tetap sama) ... */
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<?php
include 'koneksi.php';
include 'class.php';
?>
<div class="container pt-5">
    <!-- <div class="row justify-content-center"> -->
    <!-- <a href="home.php?page=tambah_jadwal">
        <button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
    </a> -->

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>No Handphone</td>
                <td>Email</td>
                <td>Jadwal</td>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM jadwal ORDER BY id_wwc ASC";
            $jadwal1 = $koneksi->prepare($query);
            $jadwal1->execute();
            $res1 = $jadwal1->get_result();

            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $id = $row['id_wwc'];
                    $nama_pelamar = $row['nama_pelamar'];
                    $no_hp = $row['no_hp'];
                    $email = $row['email'];
                    $jadwal = $row['jadwal'];
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $nama_pelamar; ?></td>
                        <td><?php echo $no_hp; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $jadwal; ?></td>

                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan='7'>Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>