
<?php
    $id_transaksi_temp;
    if (isset($_POST['filter'])) {
        $id_transaksi=$_POST['id_transaksi'];
        $id_transaksi_temp=$id_transaksi;
         $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi='".$id_transaksi."' ");
        $queryaaaa=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi = '".$id_transaksi."' ");
        $tampil_detail = $queryaaaa->fetch_assoc();
        $jumlah_pinjamana="Rp. ".number_format($tampil_detail['jumlah_pinjaman'],2,',','.');
        $zc=$koneksi->query("SELECT count(angsuran_ke) as hitung FROM pembayaran WHERE id_transaksi='".$id_transaksi."' group by id_transaksi");
        $zx=$koneksi->query("SELECT sum(pembayaran_pinjaman) as hitung_total FROM pembayaran WHERE id_transaksi='".$id_transaksi."' group by id_transaksi");
        $tampil_a = $zc->fetch_assoc();
        $tampil_b = $zx->fetch_assoc();
        $hits=$tampil_a['hitung'];
        $sum_pembayaran = $tampil_b['hitung_total'];

        $temp_sisa_pinjaman=$tampil_detail['jumlah_pinjaman']-$sum_pembayaran;
        $sisa_pinjaman_rp="Rp. ".number_format($temp_sisa_pinjaman,2,',','.');
        echo '<div class="alert alert-success"><h4>Data Ditemukan :<br><br>
             No Transaksi : '.$tampil_detail['id_transaksi'].'<br>
             Nama Konsumen : '.$tampil_detail['nama_konsumen'].'<br>
             Jumlah Pinjaman : '.$jumlah_pinjamana.'<br>
             Angsuran Ke : '.$hits.'<br><br></h4>
             <h3>Sisa Pinjaman : '.$sisa_pinjaman_rp.' <h3>

            </div>';
    }else{
        $query_lap=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where konsumen.id_konsumen='".$_SESSION['id_konsumen']."' ");
    }
?> 

<div class="row">
    <form role="form" action="" method="post">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tampilkan Berdasarkan Nomor Transaksi</label>
                <input type="text" class="form-control" name="id_transaksi"
                               placeholder="Masukkan No Transaksi">&nbsp;
                <br>
                <button type="submit" name="filter" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with border">
                <h3 class="box-title">Data Konsumen</h3>
            </div>

            <div class="box-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Jumlah Angsuran</th>
                        <th>Angsuran</th>
                        <th>Angsuran Ke </th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Tanggal Pembayaran</th>
                        <!-- <th>Cetak</th> -->
                    </tr>
                    </thead>

                    <?php
                    while ($tampil = $query_lap->fetch_assoc()) {
                        @$a++;
                        $jumlah_pinjaman="Rp. ".number_format($tampil['jumlah_pinjaman'],2,',','.');
                        $jumlah_bayar="Rp. ".number_format($tampil['pembayaran_pinjaman'],2,',','.');
                        $jumlah_angsurana="Rp. ".number_format($tampil['angsuran'],2,',','.');
                        ?>
                        <tr>
                            <td><?= $a ?></td>
                            <td><?= $tampil['id_transaksi'] ?></td>
                            <td><?= $jumlah_pinjaman; ?></td>
                            <td><?= $tampil['jumlah_angsuran']; ?></td>
                            <td><?= $jumlah_bayar ?></td>
                            <td><?= $tampil['angsuran_ke'] ?></td>
                            <td><?= $tampil['tanggal_jatuh_tempo'] ?></td>
                            <td><?= $tampil['tanggal_pembayaran'] ?></td>
                            <!-- <td><a href="?m1=laporan&m2=cetak&id_transaksi=<?= $tampil['id_transaksi'] ?>" class="
                        btn btn-success btn-warning fa fa-edit"></a></td> -->
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php
                if ($id_transaksi_temp != "") {
                ?>
                <a href="?m1=laporan&m2=cetak&id_transaksi=<?= $id_transaksi_temp ?>" target="_blank" class="
                        btn btn-success btn-warning fa fa-print"></a>
                <?php
            }
                ?>
            </div>
        </div>
    </div>