<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1><?= $title; ?></h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li> -->
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img" style="height:700px;">
						<div class="hover">
							<h4>Sudah memiliki akun?</h4>
							<p>Silahkan login untuk agar bisa melakukan pembelian!</p>
							<a class="button button-account" href="<?= base_url('registrasi/login') ?>">Login Sekarang</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Buat Akun</h3>
                        <?php if( validation_errors() ) : ?>
                            <div class="alert alert-warning">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= form_open('registrasi', 'class="row login_form" id="register_form"'); ?>
							<div class="col-md-12 form-group">
                                <?= form_input('nama', set_value('nama'), 'class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"'); ?>
							</div>
							<div class="col-md-12 form-group">
                                <?= form_input('username', set_value('username'), 'class="form-control" id="username" name="username" placeholder="Username"'); ?>
							</div>
							<div class="col-md-12 form-group">
                                <?= form_input('email', set_value('email'), 'class="form-control" id="email" name="email" placeholder="Alamat Email"'); ?>
                            </div>
                            <div class="col-md-12 form-group">
                                <?= form_password('password', set_value(''), 'class="form-control" id="password" name="password" placeholder="Password"'); ?>
                            </div>
                            <div class="col-md-12 form-group">
                                <?= form_password('confirmPassword', set_value(''), 'class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Password"'); ?>
							</div>
                            <div class="col-md-12 form-group">
                                <select class="form_control" name="level" style="width:100px;">
                                    <option value="">Daftar Sebagai..</option>
                                    <option value="Pelanggan">Pelanggan</option>
                                    <option value="Peternak">Peternak</option>
                                </select>
							</div>
                            <!-- hidden form -->
                            <?= form_hidden('status', 'Pending') ?>
                            <!-- end hidden form -->
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100">Register</button>
							</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->