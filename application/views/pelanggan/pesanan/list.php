
<?php 
    if( $this->session->flashdata('sukses') ) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</p>';
    }
?>

<table class="table table-bordered" id="example2">
    <thead>
        <tr>
            <th style="width:10px;">NO</th>
            <th>GAMBAR</th>
            <th>NAMA PRODUK</th>
            <th>DARI PETERNAKAN</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL HARGA</th>
            <th>PENGIRIMAN</th>
            <th>TOTAL BAYAR</th>
            <th style="width:200px;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $pesanan as $row ) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <img src="<?= base_url('assets/upload/image/thumbs/'.$row['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                </td>
                <td><?= $row['nama_produk']; ?></td>
                <td><?= $row['nama_peternakan']; ?></td>
                <td>IDR <?= number_format($row['harga'], '0',',','.'); ?>,-</td>
                <td><?= $row['jumlah']; ?> (rak)</td>
                <td>IDR <?= number_format($row['total_harga'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($row['pengiriman'], '0',',','.'); ?>,-</td>
                <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                <td>
                    <?php
                        $id = $row['id_pelanggan'];
                    ?>
                    <?php if ( $row['kode_transaksi'] == "" ) { ?>
                    <a href="<?= base_url('belanja/konfirm_pembayaran/'.$id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                        Konfirmasi Pembayaran
                    </a>
                    <br style="margin-bottom:8px;"> 
                    <?php include('info_ternak.php') ?>
                    <?php include('delete.php') ?>
                    <?php } else { ?>
                    <a href="#" class="btn btn-success btn-sm disabled"><i class="fa fa-check"></i>
                        Pembayaran Terkonfirmasi
                    </a>
                    <br style="margin-bottom:8px;"> 
                    <?php include('status.php') ?>
                    <?php include('info_ternak.php') ?> 
                    <br style="margin-bottom:8px;"> 
                    <?php if ($row['status_pesanan'] == "Sedang diproses") {
                        include('pesanan_diterima.php');
                    } else {
                        echo "";
                    }
                    ?>
                    <?php } ?>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>