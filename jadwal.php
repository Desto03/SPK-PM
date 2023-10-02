<div class="container">
    <a href="home.php?page=tambah_jadwal">
        <button style="margin-bottom: 20px;" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Data </button>
    </a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Pelamar</td>
                <td>No Handphone</td>
                <td>Email</td>
                <td>Jadwal</td>
                <td>Action</td>
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
                        <td>
                            <!-- base64_encode berguna untuk enkripsi id jadi nanti akan mengubah urlnya menjadi tulisan acak -->
                            <a href="home.php?page=edit_jadwal&aa=<?php echo base64_encode($id) ?>">
                                <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
                            </a>
                            <a href="hapus_jadwal.php?aa=<?php echo base64_encode($id) ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
                            </a>
                        </td>
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