<p>
    <a href="<?= base_url() ?>admin/users/tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i></i>
        Tambah Pengguna
    </a>
</p>

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
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>LEVEL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $user as $row ) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['akses_level']; ?></td>
                <td>
                    <?php
                        $id = $row['id_user'];
                    ?>
                    <a href="<?= base_url('admin/users/edit/'.$id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                        Edit
                    </a>
                    <?php include('delete.php') ?>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>