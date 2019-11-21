<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal-<?= $row['id_transaksi']; ?>">
    <i class="fa fa-clone"></i> Detail
</button>

<!-- Modal -->
<div id="myModal-<?= $row['id_transaksi']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">Detail Pesanan</h4>
            </div>
            <!-- body modal -->
            <div class="modal-body card">
                    <table class="table table-borderless table-condensed table-hover">
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>: &ensp; <?= $row['kode_transaksi']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px;">
                            Nama Pelanggan
                            <br><small>
                                Telepon
                                <br>Alamat
                                <br><br>
                                <br>Email
                                <br>Catatan
                            </small>
                        </td>
                        <td>: &ensp; <?= $row['nama_pelanggan']; ?>
                            <br><small styke="width:200px;">
                            : &ensp; <?= $row['telepon']; ?>
                            <br>: &ensp; <?= $row['alamat']; ?>
                            <br>: &ensp; <?= $row['email']; ?>
                            <br>: &ensp; <?= $row['catatan']; ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td>Produk</td>
                        <td>: &ensp; <?= $row['nama_produk']; ?></td>
                    </tr>
                    <tr>
                        <td>Harga (per rak)</td>
                        <td>: &ensp; IDR <?= number_format($row['harga'], '0',',','.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td>Jumlah (rak) Telur</td>
                        <td>: &ensp; <?= $row['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>: &ensp; IDR <?= number_format($row['total_harga'], '0',',','.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td>Biaya Pengiriman</td>
                        <td>: &ensp; IDR <?= number_format($row['pengiriman'], '0',',','.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td>: &ensp; IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td>: &ensp; <?= date('d-M-Y  h:ia', strtotime($row['tanggal_transaksi'])); ?></td>
                    </tr>
                    <tr>
                        <td>Status Transaksi</td>
                        <td>: &ensp; <?= $row['status_pesanan']; ?></td>
                    </tr>
                    </table>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>