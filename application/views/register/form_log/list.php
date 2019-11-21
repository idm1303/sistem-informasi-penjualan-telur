<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1><?= $title; ?></h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <!-- <li class="breadcrumb-item active" aria-current="page">Login/Register</li> -->
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
					<div class="login_box_img">
						<div class="hover">
							<h4>Baru membuka website kami?</h4>
							<p>Silahkan login untuk agar bisa melakukan pembelian!</p>
							<a class="button button-account" href="<?= base_url('registrasi') ?>">Buat Akun</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in</h3>
						<?php
							// Notifikasi error
							echo validation_errors('<div class="alert alert-warning">','</div>');

							// notifikasi gagal login
							if( $this->session->flashdata('warning') ) {
								echo '<div class="col-md-12 form-group">';
								echo '<div class="alert alert-warning">';
								echo $this->session->flashdata('warning');
								echo '</div>';
								echo '</div>';
							}

							// notifikasi logout
							if( $this->session->flashdata('sukses') ) {
								echo '<div class="col-md-12 form-group">';
								echo '<div class="alert alert-success">';
								echo $this->session->flashdata('sukses');
								echo '</div>';
								echo '</div>';
							}

							// form open login
							echo form_open(base_url('registrasi/login'), 'class="row login_form"');
						?>
						<!-- <form class="row login_form" action="#/" id="contactForm" > -->
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Log In</button>
								
							</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->