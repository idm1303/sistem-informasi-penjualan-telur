    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
        
                <?= form_open_multipart(base_url('peternak/produk/edit/'.$produk['id_produk'])); ?>
                    <?= form_hidden('id_produk', $produk['id_produk']); ?>
                    <?= form_hidden('id_ternak', $produk['id_ternak']); ?>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <?= form_input('nama_produk', set_value('nama_produk', $produk['nama_produk']), 'class="form-control"'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga">Harga Produk (Rp)</label>
                        <?= form_input('harga', set_value('harga', $produk['harga']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Produk (kg/rak)</label>
                        <?= form_input('berat', set_value('berat', $produk['berat']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Produk</label>
                        <?= form_textarea('keterangan', set_value('keterangan', $produk['keterangan']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar Produk</label>
                        <?= form_upload('gambar', set_value('gambar'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status_produk">Status Produk</label>
                        <select name="status_produk" id="status_produk" class="form-control">
                            <option value="Publish">Publikasikan</option>
                            <option value="Draft" <?php if( $produk['status_produk'] == "Draft" ) { echo "selected"; } ?>>Simpan Sebagai Draft</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan</button>
                </form>

            </div>
        </div>
    </div>