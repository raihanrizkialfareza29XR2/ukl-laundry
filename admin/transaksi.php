<?php
$title = 'transaksi';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga, detail_transaksi.qty, paket.* FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id ";
$outlet = $_SESSION['outlet_id'];
// die($outlet);
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master <?= $title ?></h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Paket</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi_cari_member.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                         <a href="transaksi_konfirmasi.php" class="btn btn-primary box-title"><i class="fa fa-check fa-fw"></i> Konfirmasi Pembayaran</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Paket</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Pemabayaran</th>
                                <th>Total Harga</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $transaksi): ?>
                                <tr>
                                    <td></td>
                                    <td><?= $transaksi['kode_invoice'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['nama_paket'] ?></td>
                                    <td><?= $transaksi['qty'] ?>kg</td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['status_bayar'] ?></td>
                                    <td><?= $transaksi['total_harga'] ?></td>
                                    <td align="center">
                                          <a href="transaksi_edit.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-success"><i class="fa fa-clipboard"></i></a>
                                          <a href="transaksi_detail.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                          <!-- <a href="transaksi_hapus.php?id=<?= $transaksi['id_transaksi']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                                          <a data-toggle="modal" class="btn btn-danger" data-target="#smallModal">
                                            <!-- <i class="material-icons">account_circle</i> -->
                                            <i class="fa fa-trash"></i>
                                            <!-- <span>Laporan Penjualan</span> -->
                                          </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php foreach($data as $transaksi): ?>
                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="smallModalLabel">Password Owner</h4>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="transaksi_hapus.php?id=<?= $transaksi['id_transaksi'] ?>&outlet=<?= $outlet ?>" target="blank">

                                <label for="">Password Owner :</label>

                                <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="passlama" class="form-control"  />
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('Yakin hapus data ? ');" class="btn btn-primary waves-effect">SUBMIT</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        
    </div>
</div>
<?php
require'layout_footer.php';
