

<?php 
    if( $this->session->flashdata('sukses') ) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</p>';
    }
?>

<table class="table table-bordered" id="example3">
    <thead>
        <tr>
            <th style="width:10px;">NO</th>
            <th style="width:200px;">NAMA PELANGGAN</th>
            <th>KODE TRANSAKSI</th>
            <th style="width:120px;">TANGGAL TRANSAKSI</th>
            <th style="width:150px;">TOTAL BAYAR</th>
            <th>JUMLAH (rak)</th>
            <th>STATUS</th>
            <th width="180px;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $transaksi as $row ) : ?>
        <?= form_open(base_url('peternak/pemesanan/detail_riwayat_tr/'.$row['id_transaksi'])); ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['kode_transaksi']; ?></td>
                <td><?= date('d-M-Y', strtotime($row['tanggal_transaksi'])); ?></td>
                <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['status_pesanan']; ?></td>
                <td>
                    <?php
                        $id = $row['id_transaksi'];
                    ?>
                    <a href="<?= base_url('peternak/pemesanan/cetak/'.$row['id_transaksi']) ?>" target="_blank" title="cetak" class="btn btn-success btn-sm" style="margin-bottom:5px;">
                        <i class="fa fa-print"></i> Cetak
                    </a>
                    <button type="submit" name="update" value="submit" class="btn btn-info btn-sm" style="margin-bottom:5px;">
                        <i class="fa fa-clone"></i>
                        Detail
                    </button>
                    <?php include('delete.php') ?>
                </td>
            </tr>
            <?= form_close(); ?>
        <?php endforeach; ?>
    </tbody>
</table>
