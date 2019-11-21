<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                    
                
                <?= form_open_multipart(); ?>
                    <?= form_hidden('id_user', $user['id_user']); ?>
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <?= form_input('nama', set_value('nama', $user['nama']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= form_input('email', set_value('email', $user['email']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <?= form_input('username', set_value('username', $user['username']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', set_value('password', ''), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="akses_level">Akses level</label>
                        <select name="akses_level" id="akses_level" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Peternak" <?php if( $user['akses_level'] === "Peternak" ){ echo "selected"; } ?>>Peternak</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i>  Simpan</button>
                </form>

            </div>
        </div>
    </div>