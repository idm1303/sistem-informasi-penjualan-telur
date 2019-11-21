

<?php 
     // notifikasi status tdk berubah
    if( $this->session->flashdata('warning') ) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('warning');
        echo '</div>';
    }

    // notifikasi status berubah
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
            <th style="width:200px;">NAMA PELANGGAN</th>
            <th>KODE TRANSAKSI</th>
            <th style="width:120px;">TANGGAL TRANSAKSI</th>
            <th style="width:150px;">TOTAL BAYAR</th>
            <th>JUMLAH (rak)</th>
            <th>STATUS</th>
            <th style="width:250px;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $transaksi as $row ) : ?>
        <?= form_open(base_url('peternak/pemesanan/update_transaksi/'.$row['id_transaksi'])); ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['kode_transaksi']; ?></td>
                <td><?= date('d-M-Y', strtotime($row['tanggal_transaksi'])); ?></td>
                <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                <td><?= $row['jumlah']; ?></td>
                <td>
                    <?php 
                        $options = array(
                            'Sedang diproses'         => 'Sedang diproses',
                            'Telah diterima'          => 'Telah diterima',
                    );
                    
                        $status_transaksi = array('Sedang diproses', 'Telah diterima');
                        echo form_dropdown('status', $options, 'Sedang diproses');
                    ?>
                    
                </td>
                <td>
                    <button type="submit" name="update" value="submit" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                        Update
                    </button>
                    <?php include('detail.php') ?>
                </td>
            </tr>
            <?= form_close(); ?>
        <?php endforeach; ?>
    </tbody>
</table>