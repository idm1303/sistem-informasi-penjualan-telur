

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
            <th style="width:340px;">NAMA PENGGUNA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach( $user as $row ) : ?>
        <?= form_open(base_url('admin/users/konfirm_user/'.$row['id_user'])); ?>
        <?= form_hidden('nama', $row['nama']); ?>
        <?= form_hidden('email', $row['email']); ?>
        <?= form_hidden('username', $row['username']); ?>
        <?= form_hidden('password', $row['password']); ?>
        <?= form_hidden('akses_level', $row['akses_level']); ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['username']; ?></td>
                <td>
                    <?php 
                        $options = array(
                            'Pending'         => $row['status'],
                            'Konfirmasi'      => 'Konfirmasi',
                    );
                    
                        $status_pelanggan = array('Pending', 'Konfirmasi');
                        echo form_dropdown('status', $options, 'Pending');
                    ?>
                    
                </td>
                <td>
                    <?php
                        $id = $row['id_user'];
                    ?>
                        <button type="submit" name="update" value="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                            Update
                        </button>
                        <?php include('delete_konfirm.php') ?>
                </td>
            </tr>
            <?= form_close(); ?>
        <?php endforeach; ?>
    </tbody>
</table>