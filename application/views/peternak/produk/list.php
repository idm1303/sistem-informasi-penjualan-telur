<?php if($peternak['id_ternak'] == "") { ?>
<?php } else { ?>
<p>
    <a href="<?= base_url() ?>peternak/produk/tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i></i>
        Tambah Produk
    </a>
</p>
<?php } ?>

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
            <th>NAMA</th>
            <!-- <th>KATEGORI</th> -->
            <th>HARGA</th>
            <th>STOK</th>
            <th>STATUS</th>
            <th style="width:200px;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $produk as $row ) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <img src="<?= base_url('assets/upload/image/thumbs/'.$row['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                </td>
                <td><?= $row['nama_produk']; ?></td>
                <td>IDR <?= number_format($row['harga'], '0',',','.'); ?>,-</td>
                <td><?= $row['stok']; ?> (rak)</td>
                <td><?= $row['status_produk']; ?></td>
                <td>
                    <?php
                        $id = $row['id_produk'];
                    ?>
                    <?php include('tambah_stok.php') ?>
                    <a href="<?= base_url('peternak/produk/edit/'.$id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <?php include('delete.php') ?>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>