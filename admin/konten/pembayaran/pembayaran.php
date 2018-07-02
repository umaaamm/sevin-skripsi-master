<?php
@$id_delete = $_GET['id_delete'];
if (!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM pembayaran where id_pembayaran='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Pembayaran Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pembayaran&m2=pembayaran'>";
}
?>

<?php
if (isset($_POST['submit'])) {
    $id_konsumen = $_POST['id_konsumen'];
    $id_transaksi = $_POST['id_transaksi'];
    //$jumlah_pinjaman=$_POST['jumlah_pinjaman'];
    $jumlah_angsuran=$_POST['jumlah_angsuran'];
    $tanggal=$_POST['tanggal'];
    $q=$koneksi->query("SELECT * FROM transaksi where id_transaksi='".$id_transaksi."' ");
    $tampil_s = $q->fetch_assoc();
    $zd=$koneksi->query("SELECT sum(pembayaran_pinjaman) FROM pembayaran group by id_transaksi ");

    $z=$koneksi->query("SELECT count(angsuran_ke) as hitung FROM pembayaran WHERE id_transaksi='".$id_transaksi."' group by id_transaksi");
    $tampil_a = $z->fetch_assoc();
    $hit=$tampil_a['hitung'];

   // $tampil_s = $q->fetch_assoc();
    // $temp_jumlah_pinjaman=$tampil_s['jumlah_pinjaman'];
    $temp_angsuran=$tampil_s['angsuran'];
    $temp_jumlah_angsuran=$tampil_s['jumlah_angsuran'];
    if ($hit < $temp_jumlah_angsuran) {
        $hit=$hit+1;
        $query_tambah = $koneksi->query("INSERT INTO pembayaran (id_konsumen,id_transaksi,pembayaran_pinjaman,angsuran_ke,tanggal_pembayaran)values ('" . $id_konsumen . "','" . $id_transaksi . "','" . $temp_angsuran . "','" .$hit . "','".$tanggal."')");


    echo '<div class="alert alert-success">Data Pembayaran Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pembayaran&m2=pembayaran'>";

    }else{
        echo '<div class="alert alert-success">Pembayaran Sudah Sesuai jangka pembayaran</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=pembayaran&m2=pembayaran'>";
    }

    // if ($sisa_pinjaman <= $temp_jumlah_pinjaman) {
    //     $temp_jumlah_pinjaman=$sisa_pinjaman;
    // }

    //$temp_jumlah_pinjaman=$tampil_s['jumlah_pinjaman'];
    //$temp_jumlah_angsuran=$tampil_s['jumlah_angsuran'];
    //$temp_angsuran=$tampil_s['angsuran'];
    //$sisa_pinjaman = $temp_jumlah_pinjaman;
    //$temp_jumlah_pinjaman = $temp_jumlah_pinjaman - $temp_angsuran;
   // $temp_jumlah_angsuran = $temp_jumlah_angsuran - 1;

        
}
?>
<?php
if (isset($_POST['cari'])) {
    $nk_cari = $_POST['id_transaksi'];
    @$query_edit = $koneksi->query("SELECT * FROM transaksi where id_transaksi='" . $nk_cari . "' ");
    @$tampil_edit = $query_edit->fetch_assoc();
    @$query_konsu = $koneksi->query("select * from konsumen where id_konsumen='".$tampil_edit['id_konsumen']."'");
    $tampil_konsu = $query_konsu->fetch_assoc();
    $query=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi = '".$nk_cari."' ");
    $queryaaaa=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi = '".$nk_cari."' ");
    $tampil_detail = $queryaaaa->fetch_assoc();
    $jumlah_pinjamana="Rp. ".number_format($tampil_detail['jumlah_pinjaman'],2,',','.');

    $zc=$koneksi->query("SELECT count(angsuran_ke) as hitung FROM pembayaran WHERE id_transaksi='".$nk_cari."' group by id_transaksi");
    $zx=$koneksi->query("SELECT sum(pembayaran_pinjaman) as hitung_total FROM pembayaran WHERE id_transaksi='".$nk_cari."' group by id_transaksi");
    $tampil_a = $zc->fetch_assoc();
    $tampil_b = $zx->fetch_assoc();
    $hits=$tampil_a['hitung'];
    $sum_pembayaran = $tampil_b['hitung_total'];

    $temp_sisa_pinjaman=$tampil_detail['jumlah_pinjaman']-$sum_pembayaran;
    $sisa_pinjaman_rp="Rp. ".number_format($temp_sisa_pinjaman,2,',','.');
    echo '<div class="alert alert-success"><h4>Data Temukan :<br><br>
         No Transaksi : '.$tampil_detail['id_transaksi'].'<br>
         Nama Konsumen : '.$tampil_detail['nama_konsumen'].'<br>
         Jumlah Pinjaman : '.$jumlah_pinjamana.'<br>
         Angsuran Ke : '.$hits.'<br><br></h4>

         <h3>Sisa Pinjaman : '.$sisa_pinjaman_rp.' <h3>

        </div>';



    if ($nk_cari != $tampil_edit['id_transaksi']) {
        echo '<div class="alert alert-danger">Data Transaksi Tidak Ada</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=pembayaran&m2=pembayaran'>";
    }
} else {
    @$query_edit = $koneksi->query("SELECT * FROM konsumen where no_ktp='" . $nk_cari . "' ");
    @$tampil_edit = $query_edit->fetch_assoc();
    $query=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi ");
}
?> 


<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Data Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>No Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" value="<?= $tampil_edit['id_transaksi'] ?>"
                               placeholder="Masukkan No Transaksi">&nbsp;<br>
                        <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                    </div>

                    <input type="hidden" name="id_konsumen" value="<?= $tampil_konsu['id_konsumen'] ?>">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" class="form-control" name="nama_konsumen" value="<?=@$tampil_konsu['nama_konsumen'] ?>"
                               placeholder="Masukkan Nama" readonly>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Pinjaman</label>
                        <input type="text" class="form-control" onkeyup="angka(this);" name="jumlah_pinjaman"
                               placeholder="Masukkan Jumlah Pinjaman" value="<?=$tampil_edit['jumlah_pinjaman'] ?>" readonly>
                    </div>
                  <!--   <div class="form-group">
                        <label>Pembayaran Angsuran Ke-</label>
                        <input type="text" class="form-control" onkeyup="angka(this);" name="jumlah_pinjaman"
                               placeholder="Masukkan Jumlah Pinjaman" value="<?=$tampil_edit['jumlah_pinjaman'] ?>" readonly>
                    </div> -->

                    <div class="form-group">
                        <label>Angsuran</label>
                        <input type="text" onkeyup="angka(this);" class="form-control"
                        name="angsuran" placeholder="Masukkan Angsuran" value="<?=$tampil_edit['angsuran']?>" readonly
                               >
                    </div>
                    <div class="form-group">
                        <label>Tanggal Jatuh Tempo</label>
                        <input type="text" class="form-control"
                        name="angsuran" placeholder="Masukkan Tanggal Jatuh Tempo" value="<?=$tampil_edit['tanggal_jatuh_tempo']?>" readonly
                               >
                    </div>
                        <div class="form-group">
                        <label>Tanggal Pembayaran</label>
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

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Pembayaran</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Konsumen</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Angsuran Perbulan</th>
                    <th>Jumlah Angsuran</th>
                    <th>Biaya Angsuran</th>
                    <th>Angsuran Ke </th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                        $jumlah_pinjaman="Rp. ".number_format($tampil['jumlah_pinjaman'],2,',','.');
                        $jumlah_bayar="Rp. ".number_format($tampil['pembayaran_pinjaman'],2,',','.');
                        $jumlah_angsurana="Rp.".number_format($tampil['angsuran'],2,',','.');

                    ?>

                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['nama_konsumen'] ?></td>
                        <td><?= $jumlah_pinjaman?></td>
                        <td><?= $jumlah_angsurana?></td>
                        <td><?= $tampil['jumlah_angsuran']." Bulan" ?></td>
                        <td><?= $jumlah_bayar?></td>
                        <td><?= $tampil['angsuran_ke'] ?></td>
                        <td><?= $tampil['tanggal_jatuh_tempo'] ?></td>
                        <td><?= $tampil['tanggal_pembayaran'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['id_pembayaran'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>
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
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data-pembayaran">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>