<!-- <p>
    <a href="<?= base_url() ?>admin/ternak/tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i></i>
        Tambah Peternakan
    </a>
</p> -->

<?php 
    if( $this->session->flashdata('sukses') ) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</p>';
    }
?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>Pemilik</th>
            <th>NAMA PETERNAKAN</th>
            <th>ALAMAT</th>
            <th>TELEPON</th>
            <!-- <th>REKENING</th> -->
            <th style="width:160px;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $ternak as $row ) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <img src="<?= base_url('assets/upload/image/thumbs/'.$row['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                </td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nama_peternakan']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['telepon']; ?></td>
                <!-- <td><?= $row['rekening']; ?></td> -->
                <td>
                    <?php
                        $id = $row['id_ternak'];
                    ?>
                    <a href="<?= base_url('admin/ternak/edit/'.$id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <?php include('delete.php') ?>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>