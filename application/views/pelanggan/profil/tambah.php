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
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <?= form_input('nama_lengkap', set_value('nama_lengkap', $profil['nama_lengkap']), 'class="form-control" placeholder="Nama lengkap.."'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= form_input('email', set_value('email', $profil['email']), 'class="form-control" placeholder="Email.."'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <?= form_input('telepon', set_value('telepon', $profil['telepon']), 'class="form-control" placeholder="Nomor telepon.."'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kab_kota">Alamat</label>
                        <select name="kab_kota" id="kab_kota" class="form-control">
                            <option>Pilih Kota / Kabupaten..</option>
                            <?php foreach( $kota as $row ) : ?>
                                <option value="<?= $row['id_kota']; ?>" <?php echo ($row['id_kota'] == $profil['kab_kota'])?'selected':'';?>><?= $row['nama_kota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="kecamatan">Kecamatan</label> -->
                        <?= form_input('kecamatan', set_value('kecamatan', $profil['kecamatan']), 'class="form-control" placeholder="Kecamatan.."'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <label for="kelurahan">Kelurahan / Desa</label> -->
                        <?= form_input('kel_desa', set_value('kel_desa', $profil['kel_desa']), 'class="form-control" placeholder="Kelurahan / Desa.."'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <label for="nama_jalan">Nama Jalan</label> -->
                        <?= form_input('nama_jalan', set_value('nama_jalan', $profil['nama_jalan']), 'class="form-control" placeholder="Nama jalan.."'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <label for="kode_pos">Kode Pos</label> -->
                        <?= form_input('kode_pos', set_value('kode_pos', $profil['kode_pos']), 'class="form-control" placeholder="Kode pos.."'); ?>
                    </div>
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan</button>
                </form>

            </div>
        </div>
    </div>