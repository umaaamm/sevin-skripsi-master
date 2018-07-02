<?php include "koneksi/koneksi.php" ?>
<div class="page-header">
	<h2>Laporan Konsumen</h2>
</div>
<?php
@$id_transaksi = $_GET['id_transaksi'];
if (!empty($id_transaksi)) {
$query_cetak=$koneksi->query("SELECT * from konsumen inner join transaksi on konsumen.id_konsumen = transaksi.id_konsumen inner join pembayaran on transaksi.id_transaksi = pembayaran.id_transaksi where pembayaran.id_transaksi='".$id_transaksi."' ");
}
?>   
<table class="table table-striped">
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
                    </tr>
                    </thead>

                    <?php
                    while ($tampil = $query_cetak->fetch_assoc()) {
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
                        </tr>
              <?php } ?>
                </tbody>
            </table>
                   <hr size='1px'>

                   <script type="text/javascript">window.print()</script>