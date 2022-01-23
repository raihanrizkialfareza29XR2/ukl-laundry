<?php
$title = 'laporan';
require 'functions.php';
require 'layout_header.php';
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


// $koneksi = new mysqli("localhost", "root", "", "db_web");
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];

$no= 1;

$query = "SELECT transaksi.*,member.* , detail_transaksi.*, paket.*, outlet.* FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi INNER JOIN paket ON paket.id_paket=detail_transaksi.paket_id INNER JOIN outlet ON outlet.id_outlet=transaksi.outlet_id and tgl between '$tgl_awal' and '$tgl_akhir' ";
$total = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id and tgl between '$tgl_awal' and '$tgl_akhir' ");
$datas = ambildata($conn, $query);
$datases = mysqli_query($conn, $query);
// die($query);


?>


<style>

    @media print{
        input.noPrint{
            display: none;
        }
    }

</style>

<table border="1" width="100%" style="border-collapse: collapse;">
    <caption>Laporan penjualan</caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Invoice</th>
            <th>Nama Pelanggan</th>
            <th>Nama Paket</th>
            <th>Status Pesanan</th>
            <th>Jumlah</th>
            <th>Nama Outlet</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($datas as $data): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo date('d F Y', strtotime($data['tgl'])) ?></td>
                    <td><?php echo $data['kode_invoice'] ?></td>
                    <td><?php echo $data['nama_member'] ?></td>
                    <td><?php echo $data['nama_paket'] ?></td>
                    <td><?php echo $data['status'] ?></td>
                    <td><?php echo $data['qty'] ?></td>
                    <td><?php echo $data['nama_outlet'] ?></td>
                    <td><?php echo number_format ($data['total_harga']) ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="8">Total Pemasukan</th>
                <td><?= number_format($total['total']) ?></td>
            </tr>
    </tbody>
</table>

<br>
<input type="button" class="noPrint" value="Print" onclick="window.print()">
<?php
require 'layout_footer.php';
?> 
