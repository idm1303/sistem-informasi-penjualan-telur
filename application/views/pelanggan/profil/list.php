
<p>
    <a href="<?= base_url() ?>profil_pelanggan/profil/tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i></i>
        Update Profil
    </a>
</p>

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
            <td>Nama Lengkap</td>
            <td>: <?= $profil['nama_lengkap']; ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>: <?= $profil['email']; ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>: <?= $profil['telepon']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $profil['nama_jalan']; ?>, Kelurahan/desa <?= $profil['kel_desa']; ?>, Kecamatan <?= $profil['kecamatan']; ?>, Kabupaten/kota <?= $profil['nama_kota']; ?>, Kode Pos (<?= $profil['kode_pos']; ?>)</td>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


