<h1>Selamat Datang <?= $this->session->userdata('nama'); ?>.</h1>
<p>Sebelum lanjut melakukan pemesanan telur, harap lengkapi data diri terlebih dahulu!</p>
<p>
    <a href="<?= base_url('profil_pelanggan/profil/tambah') ?>" class="btn btn-info btn-md"><i class="fa fa-file"></i></i>
        Lengkapi Data Diri
    </a>
</p>