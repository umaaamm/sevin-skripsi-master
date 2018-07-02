<?php
include "koneksi/koneksi.php"
?>

<?php
@$id_edit = $_GET['id_edit'];
$query_edit = $koneksi->query("SELECT * FROM transaksi where id_transaksi='" . $id_edit . "' ");
$tampil_edit = $query_edit->fetch_assoc();
?>

<?php
if (isset($_POST['submit'])) {
   $id_konsumen = $_POST['id_konsumen'];
    $jumlah_angsuran = $_POST['jumlah_angsuran'];
    $jumlah_pinjaman = $_POST['jumlah_pinjaman'];
    $angsuran = $_POST['angsuran'];
    $query_tambah = $koneksi->query("UPDATE transaksi SET id_konsumen='" . $id_konsumen . "',jumlah_angsuran='" . $jumlah_angsuran . "',jumlah_pinjaman='" . $jumlah_pinjaman . "',angsuran='" . $angsuran . "' where id_transaksi='" . $id_edit . "'  ");

    if ($query_tambah) {
        echo '<div class="alert alert-success">Data transaksi Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=transaksi&m2=transaksi'>";
    }
}
?>


<?php
$query_combo = $koneksi->query("SELECT * FROM jml_angsuran");
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">
                    <input type="hidden" name="id_konsumen" value="<?= $tampil_edit['id_konsumen'] ?>">
                    <div class="form-group">
                        <label>Jumlah Pinjaman</label>
                        <input type="text" class="form-control" onkeyup="angka(this);" name="jumlah_pinjaman"
                               placeholder="Masukkan Jumlah Pinjaman" value="<?= $tampil_edit['jumlah_pinjaman'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Angsuran</label>
                        <select class="form-control" name="jumlah_angsuran">
                            <?php

                            while ($tampil_k = $query_combo->fetch_assoc()) {
                                ?>
                                <option value="<?= $tampil_k['jml_angsuran'] ?>" <?= (($tampil_edit['jumlah_angsuran'] == $tampil_k['jml_angsuran']) ? 'selected' : ''); ?>><?= $tampil_k['nama_angsuran'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Angsuran</label>
                        <input type="text" onkeyup="angka(this);" class="form-control"
                        name="angsuran" placeholder="Masukkan Angsuran" value="<?= $tampil_edit['angsuran'] ?>"
                               >
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                    </div>
            </form>
        </div>
    </div>
</div>