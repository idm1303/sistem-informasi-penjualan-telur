<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
        
                <?= form_open_multipart(base_url('admin/produk/gambar/'.$produk['id_produk'])); ?>
                <?= form_hidden('id_produk', $produk['id_produk']); ?>
                    <div class="form-group">
                        <label for="judul_gambar">Judul Gambar</label>
                        <?= form_input('judul_gambar', set_value('judul_gambar'), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Unggah Gambar</label>
                        <?= form_upload('gambar', set_value('gambar'), 'class="form-control"'); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan dan Unggah Gambar</button>
                    <button type="reset" class="btn btn-default float-right"><i class="fa fa-save"></i>  Reset</button>
                </form>

            </div>
        </div>
    </div>

    <table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>JUDUL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $no=1; ?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/'.$produk['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?= $produk['nama_produk']; ?></td>
            <td>
                
            </td>
        </tr>
        <?php $no=2; foreach( $gambar as $row ) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <img src="<?= base_url('assets/upload/image/thumbs/'.$row['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                </td>
                <td><?= $row['judul_gambar']; ?></td>
                <td>
                    <?php
                        $id = $row['id_produk'];
                    ?>
                    <a href="<?= base_url('admin/produk/delete_gambar/'.$produk['id_produk'].'/'.$row['id_gambar']); ?>" class="btn btn-danger btn-xs"  onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash"></i>
                        Hapus
                    </a>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>