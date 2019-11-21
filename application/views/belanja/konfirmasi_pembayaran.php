<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1><?= $title; ?></h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li> -->
            </ol>
        </nav>
				</div>
			</div>
    </div>
	</section>
<!-- ================ end banner area ================= -->
 

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="cupon_area">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
            <?= form_open_multipart(); ?>
                <div class="check_title">
                    <h2 style="">Silahkan upload foto struk / bukti pembayaran anda!</h2>
                </div>
                <input type="text" value="<?= $kode_transaksi->kode_transaksi; ?>" name="kode_transaksi">
                <?= form_upload('struk_pembayaran', set_value('struk_pembayaran'), 'class="form-control"'); ?>
                <div class="col-lg-3">
                    <input style="cursor:pointer;" class="button primary-btn" type="submit" name="submit" value="Kirim">
                </div>
            <?= form_close(); ?>
            </div>
        </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->