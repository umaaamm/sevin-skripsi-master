<?php include "koneksi/koneksi.php" ?>
<div class="page-header">
	<h2>Laporan Admin</h2>
</div>
<?php
@$id_transaksi = $_GET['id_transaksi'];
@$tanggal1 = $_GET['tanggal1'];
@$tanggal2 = $_GET['tanggal2'];

if (!empty($id_transaksi)) {
$query_cetak=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi='".$id_transaksi."' ");
}elseif (!empty($tanggal1 && $tanggal2)) {
$query_cetak=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where transaksi.tanggal_jatuh_tempo BETWEEN '".$tanggal1."' AND '".$tanggal2."' ");
}else{
 $query_cetak=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi");
}
?>   
<font size="1">
<table class="table table-striped">
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
                    while ($tampil = $query_cetak->fetch_assoc()) {
                        @$a++;
                        $jumlah_pinjaman="Rp. ".number_format($tampil['jumlah_pinjaman'],2,',','.');
                        $jumlah_bayar="Rp. ".number_format($tampil['pembayaran_pinjaman'],2,',','.');
                        $jumlah_angsurana="Rp.".number_format($tampil['angsuran'],2,',','.');
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
                            <td><?= $jumlah_pinjaman ?></td>
                            <td><?= $tampil['jumlah_angsuran'] ?></td>
                            <td><?= $jumlah_bayar ?></td>
                           
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
            </font>
                   <hr size='1px'>

                   <script type="text/javascript">window.print()</script>