    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
        
                <?= form_open_multipart(); ?>
                    <div class="form-group">
                    <?= form_hidden('kd_ternak', $kode_ternak); ?>
                    <?= form_hidden('kd_rek', $kode_rek); ?>
                        <label for="nama_kategori">Pemilik Ternak</label>
                        <select name="id_user" id="id_user" class="form-control">
                            <option value="">Pilih Pemilik</option>
                            <?php foreach( $peternak as $row ) : ?>
                                
                                <option value="<?= $row['id_user'] ?>">
                                    <?= $row['nama'] ?>
                                </option>
                                
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_peternakan">Nama Peternakan</label>
                        <?= form_input('nama_peternakan', set_value('nama_peternakan'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <?= form_input('telepon', set_value('telepon'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Rekening</label>
                        <select name="nama_bank" id="nama_bank" class="form-control">
                            <option value="">Pilih Bank</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rekening">Nomor Rekening</label>
                        <?= form_input('rekening', set_value('rekening'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Peternakan</label>
                        <?= form_textarea('alamat', set_value('alamat'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Peternakan</label>
                        <?= form_textarea('deskripsi', set_value('deskripsi'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar Peternakan</label>
                        <?= form_upload('gambar', set_value('gambar'), 'class="form-control"'); ?>
                    </div>
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan</button>
                </form>

            </div>
        </div>
    </div>