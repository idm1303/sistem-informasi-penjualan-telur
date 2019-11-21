<?php 
    if( $this->session->flashdata('sukses') ) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '/p>';
    }
?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php if( isset($error) ) : ?>
                    <div class="alert alert-warning">
                        <?= $errors; ?>
                    </div>
                <?php endif; ?>

                <?= validation_errors('<div class="alert alert-warning">','</div>'); ?>
        
                <?= form_open_multipart(base_url('admin/konfigurasi')); ?>

                    <div class="form-group">
                        <label for="nama_web">Nama Website</label>
                        <?= form_input('nama_web', set_value('nama_web', $konfigurasi->nama_web), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tagline">Tagline/Moto</label>
                        <?= form_input('tagline', set_value('tagline', $konfigurasi->tagline), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= form_input('email', set_value('email', $konfigurasi->email), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <?= form_input('website', set_value('website', $konfigurasi->website), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Alamat Facebook</label>
                        <?= form_input('facebook', set_value('facebook', $konfigurasi->facebook), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Alamat Instagram</label>
                        <?= form_input('instagram', set_value('instagram', $konfigurasi->instagram), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon/HP</label>
                        <?= form_input('telepon', set_value('telepon', $konfigurasi->telepon), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Kantor</label>
                        <?= form_input('alamat', set_value('alamat', $konfigurasi->alamat), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keyword (untuk SEO Google)</label>
                        <?= form_input('keywords', set_value('keywords', $konfigurasi->keywords), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="metatext">Metatext</label>
                        <?= form_input('metatext', set_value('metatext', $konfigurasi->metatext), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Website</label>
                        <?= form_input('deskripsi', set_value('deskripsi', $konfigurasi->deskripsi), 'class="form-control"'); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan</button>
                </form>

            </div>
        </div>
    </div>