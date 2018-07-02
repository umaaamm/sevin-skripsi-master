<?php
include "koneksi/koneksi.php"
?>

<?php
@$id_edit = $_GET['id_edit'];
$query_edit = $koneksi->query("SELECT * FROM konsumen where id_konsumen='" . $id_edit . "' ");
$tampil_edit = $query_edit->fetch_assoc();
?>

<?php
if (isset($_POST['submit'])) {
    $no_ktp = $_POST['no_ktp'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $alamat_konsumen = $_POST['alamat_konsumen'];
    $no_telp = $_POST['no_telp'];
    $no_polisi = $_POST['no_polisi'];
    $merk_unit = $_POST['merk_unit'];
    $tipe_motor = $_POST['tipe_motor'];
    $tahun_motor = $_POST['tahun_motor'];
    //$tipe_motor = $_POST['tipe_motor'];
    $warna_motor = $_POST['warna_motor'];
    $no_bpkb = $_POST['no_bpkb'];
    $nama_bpkb = $_POST['nama_bpkb'];
    $alamat_bpkb = $_POST['alamat_bpkb'];
    $no_mesin = $_POST['no_mesin'];
    $no_rangka = $_POST['no_rangka'];
    $level='konsumen';
    $query_tambah = $koneksi->query("UPDATE konsumen SET nama_konsumen='" . $nama_konsumen . "',no_ktp='" . $no_ktp . "',alamat='" . $alamat_konsumen . "',no_telpon='" . $no_telp . "',merk_unit='" . $merk_unit . "',tipe_motor='" . $tipe_motor . "',tahun_motor='" . $tahun_motor . "',warna_motor='" . $warna_motor . "',no_bpkb='" . $no_bpkb . "',nama_bpkb='" . $nama_bpkb . "',alamat_bpkb='" . $alamat_bpkb . "',no_polisi='" . $no_polisi . "',no_rangka='" . $no_rangka . "',no_mesin='" . $no_mesin . "',level='" . $level . "' where id_konsumen='" . $id_edit . "'  ");

    if ($query_tambah) {
        echo '<div class="alert alert-success">Data konsumen Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=konsumen&m2=datakonsumen'>";
    }
}
?>

<?php
$query_combo = $koneksi->query("SELECT * FROM konsumen");
$query_c = $koneksi->query("SELECT * FROM konsumen");

//$query_tahun=$koneksi->query("SELECT DISTINCT tahun from npf order by tahun ASC");
?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Konsumen</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form role="form" action="" method="post">
            <div class="col-md-4">
              <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" class="form-control" name="no_ktp" value="<?= $tampil_edit['no_ktp'] ?>" placeholder="Masukkan No KTP">
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" class="form-control" name="nama_konsumen" value="<?= $tampil_edit['nama_konsumen'] ?>" placeholder="Masukkan Nama Konsumen">
                    </div>
                    <div class="form-group">
                        <label>Alamat Konsumen</label>
                        <textarea class="form-control" rows="5" name="alamat_konsumen" placeholder="Masukan Alamat Konsumen"><?= $tampil_edit['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telp Konsumen</label>
                        <input type="text" class="form-control" name="no_telp" value="<?= $tampil_edit['no_telpon'] ?>" placeholder="Masukkan No Telp Konsumen">
                    </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" class="form-control" name="no_polisi" value="<?= $tampil_edit['no_polisi'] ?>" placeholder="Masukkan No Polisi">
                    </div>
                    <div class="form-group">
                        <label>Merk Unit</label>
                        <input type="text" class="form-control" name="merk_unit" value="<?= $tampil_edit['merk_unit'] ?>" placeholder="Masukkan Merk Unit">
                    </div>
                    <div class="form-group">
                        <label>Tipe Motor</label>
                        <input type="text" class="form-control" name="tipe_motor" value="<?= $tampil_edit['tipe_motor'] ?>" placeholder="Masukkan Tipe Motor">
                    </div>
                    <div class="form-group">
                        <label>Tahun Motor</label>
                        <input type="text" class="form-control" name="tahun_motor" value="<?= $tampil_edit['tahun_motor'] ?>" placeholder="Masukkan Tahun Motor">
                    </div>
                    <div class="form-group">
                        <label>Warna Motor</label>
                        <input type="text" class="form-control" name="warna_motor" value="<?= $tampil_edit['warna_motor'] ?>" placeholder="Masukkan Warna Motor">
                    </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
                <div class="form-group">
                        <label>No BPKB</label>
                        <input type="text" class="form-control" name="no_bpkb" value="<?= $tampil_edit['no_bpkb'] ?>" placeholder="Masukkan No BPKB">
                    </div>
                    <div class="form-group">
                        <label>Nama BPKB</label>
                        <input type="text" class="form-control" name="nama_bpkb" value="<?= $tampil_edit['nama_bpkb'] ?>" placeholder="Masukkan Nama BPKB">
                    </div>
                    <div class="form-group">
                        <label>Alamat BPKB</label>
                        <textarea class="form-control" rows="5" name="alamat_bpkb" placeholder="Masukan Alamat BPKB"><?= $tampil_edit['alamat_bpkb'] ?></textarea>
                    </div>
                     <div class="form-group">
                        <label>No Mesin</label>
                        <input type="text" class="form-control" name="no_mesin" value="<?= $tampil_edit['no_mesin'] ?>" placeholder="Masukkan No Mesin">
                    </div>
                     <div class="form-group">
                        <label>No Rangka</label>
                        <input type="text" class="form-control" name="no_rangka" value="<?= $tampil_edit['no_rangka'] ?>" placeholder="Masukkan No Rangka">
                    </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
        </div>
    </form>
    </div>