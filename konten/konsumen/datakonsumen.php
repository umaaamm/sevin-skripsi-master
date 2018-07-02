
<?php
@$id_delete = $_GET['id_delete'];
if(!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM konsumen where id_konsumen='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Konsumen Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=konsumen&m2=datakonsumen'>";
}
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
    $query_tambah = $koneksi->query("INSERT INTO konsumen (nama_konsumen,no_ktp,alamat,no_telpon,merk_unit,tipe_motor,tahun_motor,warna_motor,no_bpkb,nama_bpkb,alamat_bpkb,no_polisi,no_rangka,no_mesin,level)values ('" . $nama_konsumen . "','" . $no_ktp . "','" . $alamat_konsumen . "','" . $no_telp . "','" . $merk_unit . "','" . $tipe_motor . "','" . $tahun_motor . "','" . $warna_motor . "','" . $no_bpkb . "','" . $nama_bpkb . "','" . $alamat_bpkb . "','" . $no_polisi . "','" . $no_rangka . "','" . $no_mesin . "','" . $level . "')");
    echo '<div class="alert alert-success">Data Konsumen Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=konsumen&m2=datakonsumen'>";
}
?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Kelola Data Konsumen</h3>
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
                        <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No KTP">
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" class="form-control" name="nama_konsumen" placeholder="Masukkan Nama Konsumen">
                    </div>
                    <div class="form-group">
                        <label>Alamat Konsumen</label>
                        <textarea class="form-control" rows="5" name="alamat_konsumen" placeholder="Masukan Alamat Konsumen"></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telp Konsumen</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp Konsumen">
                    </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" class="form-control" name="no_polisi" placeholder="Masukkan No Polisi">
                    </div>
                    <div class="form-group">
                        <label>Merk Unit</label>
                        <input type="text" class="form-control" name="merk_unit" placeholder="Masukkan Merk Unit">
                    </div>
                    <div class="form-group">
                        <label>Tipe Motor</label>
                        <input type="text" class="form-control" name="tipe_motor" placeholder="Masukkan Tipe Motor">
                    </div>
                    <div class="form-group">
                        <label>Tahun Motor</label>
                        <input type="text" class="form-control" name="tahun_motor" placeholder="Masukkan Tahun Motor">
                    </div>
                    <div class="form-group">
                        <label>Warna Motor</label>
                        <input type="text" class="form-control" name="warna_motor" placeholder="Masukkan Warna Motor">
                    </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
                <div class="form-group">
                        <label>No BPKB</label>
                        <input type="text" class="form-control" name="no_bpkb" placeholder="Masukkan No BPKB">
                    </div>
                    <div class="form-group">
                        <label>Nama BPKB</label>
                        <input type="text" class="form-control" name="nama_bpkb" placeholder="Masukkan Nama BPKB">
                    </div>
                    <div class="form-group">
                        <label>Alamat BPKB</label>
                        <textarea class="form-control" rows="5" name="alamat_bpkb" placeholder="Masukan Alamat BPKB"></textarea>
                    </div>
                     <div class="form-group">
                        <label>No Mesin</label>
                        <input type="text" class="form-control" name="no_mesin" placeholder="Masukkan No Mesin">
                    </div>
                     <div class="form-group">
                        <label>No Rangka</label>
                        <input type="text" class="form-control" name="no_rangka" placeholder="Masukkan No Rangka">
                    </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>

<div class="row">
<div class="col-md-12">
    <?php
    $query = $koneksi->query("SELECT * FROM konsumen");
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Konsumen</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Merk Unit</th>
                    <th>Tipe Motor</th>
                    <th>Tahun Motor</th>
                    <th>Warna Motor</th>
                    <th>No BPKB</th>
                    <th>Nama BPKB</th>
                    <th>Alamat BPKB</th>
                    <th>No Polisi</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['no_ktp'] ?></td>
                        <td><?= $tampil['nama_konsumen'] ?></td>
                        <td><?= $tampil['alamat'] ?></td>
                        <td><?= $tampil['no_telpon'] ?></td>
                        <td><?= $tampil['merk_unit'] ?></td>
                        <td><?= $tampil['tipe_motor'] ?></td>
                        <td><?= $tampil['tahun_motor'] ?></td>
                        <td><?= $tampil['warna_motor'] ?></td>
                        <td><?= $tampil['no_bpkb'] ?></td>
                        <td><?= $tampil['nama_bpkb'] ?></td>
                        <td><?= $tampil['alamat_bpkb'] ?></td>
                        <td><?= $tampil['no_polisi'] ?></td>
                        <td><?= $tampil['no_rangka'] ?></td>
                        <td><?= $tampil['no_mesin'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['id_konsumen'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=konsumen&m2=editdatakonsumen&id_edit=<?= $tampil['id_konsumen'] ?>" class="
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
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>