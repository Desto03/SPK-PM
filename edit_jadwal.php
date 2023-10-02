<div class="container">
    <h2 align="center" style="margin: 30px;">Edit jadwal Wawancara</h2>
    <?php
    // data difilter terlebih dahulu & base64_decode berguna untuk mendeskripsi id yg sebelumnya di enkripsi/encoding

    $id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['aa']), ENT_QUOTES)));


    $query = "SELECT * FROM jadwal WHERE id_wwc=?";
    $jadwal = $koneksi->prepare($query);
    $jadwal->bind_param("i", $id);
    $jadwal->execute();
    $res1 = $jadwal->get_result();
    while ($row = $res1->fetch_assoc()) {
        $id = $row['id_wwc'];
        $nama_pelamar = $row['nama_pelamar'];
        $no_hp = $row['no_hp'];
        $email = $row['email'];
        $jadwal = $row['jadwal'];
    }
    ?>
    <form method="POST" action="edit_jadwal_action.php">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="form-group">
                    <label>Nama Pelamar</label>
                    <input type="hidden" name="id_wwc" id="id_wwc" value="<?php echo $id; ?>">
                    <input type="text" name="nama_pelamar" id="nama_pelamar" class="form-control" value="<?php echo $nama_pelamar; ?>" required="true">
                </div>
                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $no_hp; ?>" required="true">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required="true">
                </div>
                <div class="form-group">
                    <label>Jadwal Wawancara</label>
                    <input type="date" name="jadwal" id="jadwal" class="form-control" value="<?php echo $jadwal; ?>" required="true">
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan" id="simpan" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <button type="button" name="simpan" id="simpan" class="btn btn-danger">
                        <a href="home.php?page=jadwal" style="color:white;text-decoration: none; "></i>Batal</a>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>