<!--================ Hero banner start =================-->
<section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
            <div class="col-5 d-none d-sm-block">
                <div class="hero-banner__img">
                <img class="img-fluid" src="<?= base_url(); ?>assets/template/img/home/hero-banner.png" alt="">
                </div>
            </div>
            <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                <div class="hero-banner__content">
                <?php if ($this->session->userdata('akses_level') == 'Pelanggan') { ?>

                <h4>Shop is fun</h4>
                <h1>Browse Our Premium Product</h1>
                <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>

                <?php } else { ?>

                <h4>Shop is fun</h4>
                <h3>Silahkan Daftar Atau Login Terlebih Dahulu Sebelum Berbelanja</h3>
                <!-- <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p> -->
                <a class="button button-hero" href="<?= base_url('registrasi') ?>">Register</a>
                
                <?php } ?>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->