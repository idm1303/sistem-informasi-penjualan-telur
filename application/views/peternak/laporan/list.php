

<p class="pull-right">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="btn-group col-md-2">
            <?php include('unduh_laporan_pdf.php') ?>
        </div>
    </div>
</p>

<?php 
     // notifikasi laporan tidak terunduh
    if( $this->session->flashdata('warning') ) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('warning');
        echo '</div>';
    }
?>

<table class="table table-bordered" id="example3">
    <thead>
        <tr>
            <th style="width:10px;">NO</th>
            <th style="width:200px;">NAMA PELANGGAN</th>
            <th style="width:120px;">TANGGAL TRANSAKSI</th>
            <th>NAMA PRODUK</th>
            <th>HARGA (per rak)</th>
            <th>JUMLAH (rak)</th>
            <th>TOTAL HARGA</th>
            <th>BIAYA PENGIRIMAN</th>
            <th style="width:150px;">TOTAL BAYAR</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $transaksi as $row ) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= date('d-M-Y', strtotime($row['tanggal_transaksi'])); ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td>IDR <?= number_format($row['harga'], '0',',','.'); ?>,-</td>
                <td><?= $row['jumlah']; ?></td>
                <td>IDR <?= number_format($row['total_harga'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($row['pengiriman'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>