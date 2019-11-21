<?php if($peternak['id_ternak'] == "") { ?>
    <p>
        <a href="<?= base_url() ?>peternak/ternak/tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i></i>
            Tambah Peternakan
        </a>
    </p>
<?php } else { ?>

<?php 
    if( $this->session->flashdata('sukses') ) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</p>';
    }
?>

<table class="table">
    <thead>
        <tr>
            <td>Foto</td>
            <td>: <a href="<?= base_url('assets/upload/image/'.$peternak['gambar']); ?>" data-lightbox='image-1 ?>' data-title="Foto dari Peternakan <?= $peternak['nama_peternakan'] ?>"><img src="<?= base_url('assets/upload/image/thumbs/'.$peternak['gambar']); ?>" alt="Foto tidak tersedia" class="img img-responsive img-thumbnail" width="60"></a></td>
        </tr>
        <tr>
            <td>Nama Peternakan</td>
            <td>: <?= $peternak['nama_peternakan']; ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>: <?= $peternak['telepon']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $peternak['alamat']; ?></td>
        </tr>
        <tr>
            <td>Rekening</td>
            <td>: <?= $peternak['no_rek']; ?> (<?= $peternak['nama_bank']; ?>)</td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>: <?= $peternak['deskripsi']; ?></td>
        </tr>
        <tr>
            <td>
                <a href="<?= base_url('peternak/ternak/edit/'.$peternak['id_ternak']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                    Edit
                </a>
            </td>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php } ?>

