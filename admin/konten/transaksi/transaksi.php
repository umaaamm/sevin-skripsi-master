<?php
@$id_delete = $_GET['id_delete'];
if (!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM transaksi where id_transaksi='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Transaksi Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=transaksi&m2=transaksi'>";
}
?>
<?php
if (isset($_POST['submit'])) {
    $id_konsumen = $_POST['id_konsumen'];
    $jumlah_angsuran = $_POST['jumlah_angsuran'];
    $jumlah_pinjaman = $_POST['jumlah_pinjaman'];
    $angsuran = $_POST['angsuran'];
    $tanggal=$_POST['tanggal'];
    $query_tambah = $koneksi->query("INSERT INTO transaksi (id_konsumen,jumlah_pinjaman,jumlah_angsuran,angsuran,tanggal_jatuh_tempo)values ('" . $id_konsumen . "','" . $jumlah_pinjaman . "','" . $jumlah_angsuran . "','" . $angsuran . "','".$tanggal."')");

    echo '<div class="alert alert-success">Data Transaksi Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=transaksi&m2=transaksi'>";
}
?>
<?php
if (isset($_POST['cari'])) {
    $nk_cari = $_POST['no_ktp'];
    @$query_edit = $koneksi->query("SELECT * FROM konsumen where no_ktp='" . $nk_cari . "' ");
    @$tampil_edit = $query_edit->fetch_assoc();
    if ($nk_cari != $tampil_edit['no_ktp']) {
        echo '<div class="alert alert-danger">Data Konsumen Tidak Ada</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=transaksi&m2=transaksi'>";
    }
} else {
    @$query_edit = $koneksi->query("SELECT * FROM konsumen where no_ktp='" . $nk_cari . "' ");
    @$tampil_edit = $query_edit->fetch_assoc();
}
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
                    <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" class="form-control" name="no_ktp" value="<?= $tampil_edit['no_ktp'] ?>"
                               placeholder="Masukkan No KTP">&nbsp;<br>
                        <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                    </div>
                    <input type="hidden" name="id_konsumen" value="<?= $tampil_edit['id_konsumen'] ?>">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" class="form-control" name="nama_konsumen" value="<?= $tampil_edit['nama_konsumen'] ?>"
                               placeholder="Masukkan Nama" readonly>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Pinjaman</label>
                        <input type="text" class="form-control" onkeyup="angka(this);" name="jumlah_pinjaman"
                               placeholder="Masukkan Jumlah Pinjaman">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Angsuran</label>
                        <select class="form-control" name="jumlah_angsuran">
                            <option value="-">-- Pilih Jumlah Angsuran --</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                            <option value="18">18 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Angsuran</label>
                        <input type="text" onkeyup="angka(this);" class="form-control"
                        name="angsuran" placeholder="Masukkan Angsuran"
                               >
                    </div>
                    <div class="form-group">
                        <label>Tanggal Jatuh Tempo</label>
                        <div class='input-group date' id='datepicker'>
                            <input type='text' class="form-control" name="tanggal"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8">
    <?php
    $query = $koneksi->query("SELECT DISTINCT transaksi.tanggal_jatuh_tempo,transaksi.id_transaksi,transaksi.jumlah_pinjaman,transaksi.jumlah_angsuran,transaksi.angsuran,konsumen.nama_konsumen FROM transaksi,konsumen where konsumen.id_konsumen = transaksi.id_konsumen");
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Transaksi</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Nama Konsumen</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Jumlah Angsuran</th>
                    <th>Angsuran</th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>

                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['id_transaksi'] ?></td>
                        <td><?= $tampil['nama_konsumen'] ?></td>
                        <td><?= $tampil['jumlah_pinjaman'] ?></td>
                        <td><?= $tampil['jumlah_angsuran'] ?></td>
                        <td><?= $tampil['angsuran'] ?></td>
                        <td><?= $tampil['tanggal_jatuh_tempo'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['id_transaksi'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=transaksi&m2=edittransaksi&id_edit=<?= $tampil['id_transaksi'] ?>" class="
						btn btn-success btn-warning fa fa-edit"></a></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>


        <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body btn-info">
                        Apakah Anda yakin ingin menghapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data-transaksi">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>