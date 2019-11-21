
<!-- ================ trending product section start ================= -->  
<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
        <p>Telur yang berkualitas</p>
        <h2>Produk <span class="section-intro__style">Terlaris</span></h2>
        </div>
        <div class="row">
            <?php foreach( $produk as $row ) : ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <!-- form untuk proses belanja -->
                    <?= form_open(base_url('belanja/add')); ?>
                    <?= form_hidden('id_produk', $row->id_produk); ?>
                    <?= form_hidden('qty', 1); ?>
                    <?= form_hidden('price', $row->harga); ?>
                    <?= form_hidden('name', $row->nama_produk); ?>
                    <?= form_hidden('redirect_page', str_replace('index.php','',base_url('belanja/cart'))); ?>    

                        <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="<?= base_url('assets/upload/image/'.$row->gambar); ?>" alt="<?= $row->nama_produk; ?>">
                            <?php if ($this->session->userdata('akses_level') == 'Pelanggan') { ?>
                            <ul class="card-product__imgOverlay">
                            <!-- <li><button><a href="<?= base_url('produk/detail/'.$row->slug_produk) ?>"><i class="ti-search"></i></a></button></li> -->
                                <li><button type="submit" value="submit"><i class="ti-shopping-cart"></i></a></button></li>
                            <?php } else { ?>
                            <?php } ?>
                            <!-- <li><button><i class="ti-heart"></i></button></li> -->
                            <!-- <li><a href=""><button>Tambah Ke Keranjang</button></a>x</li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            <p><?= $row->nama_peternakan; ?></p>
                            <h4 class="card-product__title"><a href="<?= base_url('produk/detail/'.$row->slug_produk) ?>"><?= $row->nama_produk; ?></a></h4>
                            <p class="card-product__price">IDR <?= number_format($row->harga,'0',',','.'); ?></p>
                            <p>Stok Tersedia : <?= $row->stok; ?> (rak)</p>
                        </div>
                        </div>
                    <!-- form close -->
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
    <div class="container">
        <div class="row">
        <div class="col-xl-5">
            <div class="offer__content text-center">
            
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- ================ offer section end ================= --> 

    <!-- ================ Best Selling item  carousel ================= --> 
<!-- <section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
        <p>Barang populer di toko</p>
        <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
        <?php foreach($produk as $row) : ?>
            <div class="card text-center card-product">
                <div class="card-product__img">
                <img class="img-fluid" src="<?= base_url('assets/upload/image/'.$row->gambar); ?>" alt="">
                <ul class="card-product__imgOverlay">
                    <li><button><i class="ti-search"></i></button></li>
                    <li><button><i class="ti-shopping-cart"></i></button></li>
                    <li><button><i class="ti-heart"></i></button></li>
                </ul>
                </div>
                <div class="card-body">
                <p>kategori</p>
                <h4 class="card-product__title"><a href="<?= base_url('produk/detail/'.$row->slug_produk) ?>"><?= $row->nama_produk; ?></a></h4>
                <p class="card-product__price">IDR <?= number_format($row->harga,'0',',','.'); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
        </div>
    </div>
</section> -->
    <!-- ================ Best Selling item  carousel end ================= --> 
