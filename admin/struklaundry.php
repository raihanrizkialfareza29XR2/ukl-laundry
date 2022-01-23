<?php
$title = 'Struk';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.* , detail_transaksi.*,outlet.*,paket.nama_paket, paket.harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi INNER JOIN outlet ON outlet.id_outlet = transaksi.outlet_id INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id  WHERE transaksi.id_transaksi=".$_GET['id'];
$data = ambilsatubaris($conn,$query);
$time = strtotime($data['tgl']);
$format = date("d/m/y", $time);
$jam = date("H:i:s", $time);
// die($data['nama_paket'])
// echo $data['alamat_outlet'];
?> 

<!DOCTYPE html>
<html lang="en"><head>
		<title>.:: INVOICE ::.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
		.totals-row td {
			border-right:none !important;
			border-left:none !important;
		}
		
		
		td {
			white-space: nowrap;
		}
		.items-table td ,#notes { white-space:normal;}
		.totals-row td strong,.items-table th {
			white-space:nowrap;
		}
		</style>
				<style type="text/css">
			.is_logo {display:none;}
		</style>
			</head>
	<body>
		<div id="editor" class="edit-mode-wrap" style="margin-top: 20px">
			<style type="text/css">
			.is_logo {display:none;}
			</style><style type="text/css">* { margin:0; padding:0; }
body { background:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:20px; }
#extra {text-align: right; font-size: 22px;  font-weight: 700}
.invoice-wrap { width:700px; margin:0 auto; background:#FFF; color:#000 }
.invoice-inner { margin:0 15px; padding:20px 0 }
.invoice-address { border-top: 3px double #000000; margin: 25px 0; padding-top: 25px; }
.bussines-name { font-size:18px; font-weight:100 }
.invoice-name { font-size:22px; font-weight:700 }
.listing-table th { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; text-align:left; padding:6px 4px }
.listing-table td { border-bottom: 1px solid #555555; text-align:left; padding:5px 6px; vertical-align:top }
.total-table td { border-left: 1px solid #555555; }
.total-row { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; }
.row-items { margin:5px 0; display:block }
.notes-block { margin:50px 0 0 0 }
/*tables*/
table td { vertical-align:top}
.items-table { border:1px solid #1px solid #555555; border-collapse:collapse; width:100%}
.items-table td, .items-table th { border:1px solid #555555; padding:4px 5px ; text-align:left}
.items-table th { background:#f5f5f5;}
.totals-row .wide-cell { border:1px solid #fff; border-right:1px solid #555555; border-top:1px solid #555555}
</style>
<div class="invoice-wrap">
<div class="invoice-inner">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
		<tr>
			<td valign="top" align="right">
			<div class="business_info">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tbody>
					<tr>
						<td><span class="editable-area" id="business_info"><p style="font-size: 18pt;"><?= $data['nama_outlet']?> </p>
<p><br> <?= $data['alamat_outlet'] ?><br> Telpon : <?= $data['telp_outlet'] ?><br> Email: <a href="" class="__cf_email__">sawo.jajar@gmail.com</a></p></span></td>
					</tr>
				</tbody>
			</table>
			</div>
			</td>
			<td valign="top" align="right">
			<p class="editable-text" id="extra"><span style="font-size: 18pt;">Invoice</span></p>
			</td>
		</tr>
	</tbody>
</table>

<div class="invoice-address">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
		<tr>
			<td valign="top" align="left" width="50%">
			<table cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td style="" valign="top" width=""><strong><span class="editable-text" id="label_bill_to">Customer</span></strong></td>
						<td valign="top">
						<div class="client_info">
						<table cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
									<td style="padding-left:25px;"><span class="editable-area" id="client_info"><?= $data['nama_member'] ?><br>
<?= $data['alamat_member'] ?><br>
Telp: <?= $data['telp_member'] ?></span></td>
								</tr>
							</tbody>
						</table>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
			<td valign="top" align="right" width="50%">
			<table cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td align="right"><strong><span class="editable-text" id="label_invoice_no">No. Order</span></strong></td>
						<td style="padding-left:20px" align="left"><span class="editable-text" id="no"><?= $data['kode_invoice'] ?></span></td>
					</tr>
					<tr>
						<td align="right"><strong><span class="editable-text" id="label_date">Tgl. Transaksi</span></strong></td>
						<td style="padding-left:20px" align="left"><span class="editable-text" id="date"><?= $format ?></span></td>
					</tr>
					<tr>
						<td align="right"><strong><span class="editable-text" id="label_date">Jam Transaksi</span></strong></td>
                        <td style="padding-left:20px" align="left"><span class="editable-text" id="date"><?= $jam ?></span></td>
					</tr>
					<!-- <tr>
						<td align="right"><strong><span class="editable-text" id="label_date">Tgl. Ambil</span></strong></td>
						<td style="padding-left:20px" align="left"><span class="editable-text" id="date">01/16/2022</span></td>
					</tr> -->
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<div id="items-list"><table class="table table-bordered table-condensed table-striped items-table">
	<thead>
		<tr>
			<th>No.</th>
			<th>Paket Laundry</th>
			<th>Berat/KG</th>
            <th>Diskon</th>
            <th>Pajak</th>
            <th>Biaya Tambahan</th>
			<th>Harga</th>
			<th width="100">Subtotal</th>
		</tr>
        <?php $i = 1; ?>
	</thead>
    <tbody>
        <?php 
            $total = $data['harga'] * $data['qty'];
            $diskon = ($data['diskon']/100) * $total;
            $pajak = ($data['pajak']/100) * $total;
            $biaya_tambahan = $data['biaya_tambahan'];
        ?>
					
					<tr>
				<td><?= $i++ ?></td>
				<td><?= $data['nama_paket'] ?></td>
				<td><?= $data['qty'] ?></td>
				<td>Rp. <?= $diskon ?>,-</td>
				<td>Rp. <?= $pajak ?>,-</td>
				<td>Rp. <?= $biaya_tambahan ?>,-</td>
				<td>Rp. <?= $total ?>,-</td>
				<td>Rp. <?= $data['total_harga'] ?>-</td>
			</tr>
            
			</tbody>

	<tfoot>
        <tr class="totals-row">
            <td colspan="6" class="wide-cell"></td>
            <td><strong>Total Bayar</strong></td>
            <td coslpan="2">Rp. <?= $data['total_bayar'] ?>,-</td>
        </tr>
		<tr class="totals-row">
			<td colspan="6" class="wide-cell"></td>
			<td><strong>Total</strong></td>
			<td coslpan="2">Rp. <?= $data['total_harga'] ?>,-</td>
		</tr>
        <tr class="totals-row">
            <td colspan="6" class="wide-cell"></td>
            <td><strong>Kembalian</strong></td>
            <td coslpan="2">Rp. <?= $data['total_bayar'] - $data['total_harga'] ?>,-</td>
        </tr>
				
	</tfoot>
</table></div>

<div class="notes-block">
			<div class="editable-area" id="notes" style=""><b>Keterangan:</b></div>
            <div class="notice">1. Pengambilan cucian harus membawa nota</div>
        <div class="notice">2. Cucian Luntur bukan tanggung jawab kami</div>
        <div class="notice">3. Hitung dan periksa sebelum pergi</div>
        <div class="notice">4. klaim kekurangan/kehilangan cucian setelah meninggalkan laundri tidak dilayani</div>
        <div class="notice">5. Cucian yang rusak/mengkerut karena sifat kain tidak dapat kami ganti</div>
        <div class="notice">6. Cucian yang tidak diambil lebih dari 1 bulan bukan tanggung jawab kami</div>
        <div class="notice">7. Maximal penggantian 10x dari total invoice dan barang menjadi milik kami</div>
        
    </div>
    <button class="btn btn-success mx-auto mt-5 hilang" onclick="window.print()">Cetak Struk</button>

&nbsp;</div>
</div>
		</div>
	<style>
body {
    background: #EBEBEB;
}
.invoice-wrap {box-shadow: 0 0 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }
#mobile-preview-close a {
position:fixed; left:20px; bottom:30px; 
background-color: #fff;
font-weight: 600;
outline: 0 !important;
line-height: 1.5;
border-radius: 3px;
font-size: 14px;
padding: 7px 10px;
border:1px solid #fff;
text-decoration:none;
}
@media print {
    .hilang {
        display: none;
    }
}
#mobile-preview-close img {
	width:20px;
	height:auto;
}
#mobile-preview-close a:nth-child(2) {
left:190px;
background:#f5f5f5;
border:1px solid #9f9f9f;
color:#555 !important;
}
#mobile-preview-close a:nth-child(2) img {
    height: auto;
	position: relative;
top: 2px;
}
.invoice-wrap {padding: 20px;}


@media print {
  #mobile-preview-close a {
  display:none
}
.invoice-wrap {0}
body {
    background: none;
}
.invoice-wrap {box-shadow: none; margin-bottom: 0px;}

}
</style>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>