

<?php 
     // notifikasi gagal konfirmasi
    if( $this->session->flashdata('warning') ) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('warning');
        echo '</div>';
    }

    // notifikasi berhasil konfirmasi
    if( $this->session->flashdata('sukses') ) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
?>

<table class="table table-bordered" id="example3">
    <thead>
        <tr>
            <th style="width:10px;">NO</th>
            <th>STRUK</th>
            <th style="width:140px;">NAMA PELANGGAN</th>
            <!-- <th>KATEGORI</th> -->
            <th>PRODUK</th>
            <th>TOTAL BAYAR</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $pemesanan as $row ) : ?>
        <?= form_open(base_url('peternak/pemesanan/update_pelanggan/'.$row['id_pelanggan'])); ?>
        <?= form_hidden('kode_transaksi', $row['kode_transaksi']); ?>
        <?= form_hidden('id_produk', $row['id_produk']); ?>
        <?= form_hidden('id_pemilik', $row['id_pemilik']); ?>
        <?= form_hidden('jumlah', $row['jumlah']); ?>
        <?= form_hidden('tanggal_upload', $row['tanggal_upload']); ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <a href="<?= base_url('assets/upload/image/bukti_pembayaran/'.$row['gambar']); ?>" data-lightbox='image-<?= $no ?>' data-title="Struk Pembayaran dari Transakso dengan Kode <?= $row['kode_transaksi'] ?>"><img src="<?= base_url('assets/upload/image/bukti_pembayaran/thumbs/'.$row['gambar']); ?>" alt="Struk Belum Ada" class="img img-responsive img-thumbnail" width="60"></a>
                </td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                <td>
                    <?php 
                        $options = array(
                            'Pending'         => $row['status_pelanggan'],
                            'Konfirmasi'      => 'Konfirmasi',
                    );
                    
                        $status_pelanggan = array('Pending', 'Konfirmasi');
                        echo form_dropdown('status', $options, 'Pending');
                    ?>
                    
                </td>
                <td>
                    <?php
                        $id = $row['id_konfirm'];
                    ?>
                        <button type="submit" name="update" value="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                            Update
                        </button>
                        <?php include('delete.php') ?>
                </td>
            </tr>
            <?= form_close(); ?>
        <?php endforeach; ?>
    </tbody>
</table>