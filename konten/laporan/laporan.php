
<?php
    if (isset($_POST['filter-transaksi'])) {
        $no_transaksi=$_POST['no_transaksi'];
        $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi='".$no_transaksi."' ");
        # code...
    }else{
        $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi");
    }
?>
<?php
    if (isset($_POST['filter'])) {
        $tanggal1=$_POST['tanggal1'];
        $tanggal2=$_POST['tanggal2'];
        // print_r($tanggal1);
        // exit();
        $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where transaksi.tanggal_jatuh_tempo BETWEEN '".$tanggal1."' AND '".$tanggal2."' ");
    }
        # code...
    // }else{
    //     $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi");
    // }
?>

<div class="row">
    <form role="form" action="" method="post">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tempilkan Bedasarkan Bulan</label>
                <div class='input-group date' id='datepicker'>
                    <input type='text' class="form-control" name="tanggal1"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <br>
                <div class='input-group date' id='datepicker1'>
                    <input type='text' class="form-control" name="tanggal2"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <br>
                <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                <button type="submit" name="cetak" class="btn btn-success">Cetak</button>
            </div>

        </div>
        <div class="col-md-3">
         <div class="form-group">
                        <label>Berdasarkan No Transaksi</label>
                         <input type="text" class="form-control"
                        name="no_transaksi" placeholder="Masukkan No Transaksi">
                    </div>
                <button type="submit" name="filter-transaksi" class="btn btn-primary">Filter</button>
                <button type="submit" name="cetak-transaksi" class="btn btn-success">Cetak</button>
        </div>
        </form>

    <?php
    // $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi");

?>

    <div class="col-md-12">

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
                        <th>Nama Konsumen</th>
                        <th>Alamat Konsumen</th>
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

                        <th>No Transaksi</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Jumlah Angsuran</th>
                        <th>Angsuran</th>

                        <th>Angsuran Ke </th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Tanggal Pembayaran</th>
                    </tr>
                    </thead>

                    <?php
                    while ($tampil = $query_lap->fetch_assoc()) {
                        @$a++;
                        // $jumlah_pinjaman="Rp. ".number_format($tampil['jumlah_pinjaman'],2,',','.');
                        // $jumlah_bayar="Rp. ".number_format($tampil['pembayaran_pinjaman'],2,',','.');
                        // $jumlah_angsurana="Rp.".number_format($tampil['angsuran'],2,',','.');
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
                            
                            <td><?= $tampil['id_transaksi'] ?></td>
                            <td><?= $tampil['jumlah_pinjaman'] ?></td>
                            <td><?= $tampil['jumlah_angsuran'] ?></td>
                            <td><?= $tampil['angsuran'] ?></td>
                           
                            <td><?= $tampil['angsuran_ke'] ?></td>
                            <td><?= $tampil['tanggal_jatuh_tempo'] ?></td>
                            <td><?= $tampil['tanggal_pembayaran'] ?></td>

                           <!--  <td><a href="
						?m1=laporan&m2=invoice&id_print=<?= $tampil['id'] ?>" target="_bank" class="
						btn btn-success btn-warning fa fa-print"></a></td> -->
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>