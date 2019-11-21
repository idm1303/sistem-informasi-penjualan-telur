<p class="pull-right">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="btn-group col-md-2">
            <a href="<?= base_url('peternak/pemesanan/cetak/'.$transaksi['id_transaksi']) ?>" target="_blank" title="cetak" class="btn btn-success btn-sm">
                <i class="fa fa-print"></i> Cetak
            </a> &ensp;
            <a href="<?= base_url('peternak/pemesanan/riwayat') ?>" title="kembali" class="btn btn-info btn-sm">
                <i class="fa fa-backward"></i> Kembali
            </a>
        </div>
    </div>
</p>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>NAMA PELANGGAN</th>
            <th>: <?= $transaksi['nama_pelanggan']; ?></th>
        </tr>       
        <tr>
            <th width="20%">KODE TRANSAKSI</th>
            <th>: <?= $transaksi['kode_transaksi']; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Status Pembayaran</td>
            <td>: <?= $transaksi['status_pelanggan']; ?></td>
        </tr>      
        <tr>
            <td>Total Bayar</td>
            <td>: Rp. <?= number_format($transaksi['total_bayar'], '0',',','.'); ?>,-</td>
        </tr>  
        <tr>
            <td>Bukti Pembayaran</td>
            <td>: <a href="<?= base_url('assets/upload/image/bukti_pembayaran/'.$transaksi['gambar']); ?>" data-lightbox='image-<?= $transaksi['id_transaksi'] ?>' data-title="Struk Pembayaran dari Produk dengan Kode <?= $transaksi['kode_transaksi'] ?>"><img src="<?= base_url('assets/upload/image/bukti_pembayaran/thumbs/'.$transaksi['gambar']); ?>" alt="Struk Belum Ada" class="img img-responsive img-thumbnail" width="60"></a></td>
        </tr>       
        <tr>
            <td>Tanggal Pembayaran</td>
            <td>: <?= date('d-M-Y', strtotime($transaksi['tanggal_transaksi'])); ?></td>
        </tr>
        <tr>
            <td>Status Transaksi</td>
            <td>: <?= $transaksi['status_pesanan']; ?></td>
        </tr>  
        <tr>
            <td>Tanggal Produk Diterima</td>
            <td>: <?= date('d-M-Y', strtotime($transaksi['tanggal_update'])); ?></td>
        </tr> 
    </tbody>
</table>

<table class="table table-bordered" id="example3">
    <thead>
        <tr>
            <th>#</th>
            <th style="width:300px;">NAMA PRODUK</th>
            <th>JUMLAH (rak)</th>
            <th>TOTAL HARGA</th>
            <th>PENGIRIMAN</th>
            <th>TOTAL BAYAR</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>1.</td>
                <td><?= $transaksi['nama_produk']; ?></td>
                <td><?= $transaksi['jumlah']; ?></td>
                <td>IDR <?= number_format($transaksi['total_harga'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($transaksi['pengiriman'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($transaksi['total_bayar'], '0',',','.'); ?>,-</td>
            </tr>
    </tbody>
</table>