<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1><?= $title; ?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            <!-- <li class="breadcrumb-item active" aria-current="page">Selamat Berbelanja</li> -->
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->


<!-- ================ category section start ================= -->		  
<section class="section-margin--small mb-5">
<div class="container">
    <div class="row">
    <div class="col-xl-2 col-lg-4 col-md-5">
        <!-- <div class="sidebar-categories">
        <div class="head">Kategori Produk</div>
        <ul class="main-categories">
            <li class="common-filter">
            <form action="#">
                <ul>
                    <li class="filter-list">
                        <a href="<?= base_url('produk/') ?>" class="text-secondary">
                            Semua
                        </a>     
                    </li>
                    
                </ul>
            </form>
            </li>
        </ul>
        </div> -->
        <div class="sidebar-filter">
        <!-- <div class="top-filter-head">Product Filters</div> -->
        <div class="">
            <!-- <div class="head">Brands</div> -->
            <!-- <form action="#">
            <ul>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
            </ul>
            </form> -->
        </div>
        <div class="">
            <!-- <div class="head">Color</div> -->
            <!-- <form action="#">
            <ul>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                    Leather<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                    with red<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
            </ul>
            </form> -->
        </div>
        <div class="">
            <!-- <div class="head">Price</div>
            <div class="price-range-area">
            <div id="price-range"></div>
            <div class="value-wrapper d-flex">
                <div class="price">Price:</div>
                <span>$</span>
                <div id="lower-value"></div>
                <div class="to">to</div>
                <span>$</span>
                <div id="upper-value"></div>
            </div>
            </div> -->
        </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-7">
        <!-- Start Filter Bar -->
        <!-- <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting">
            <select>
            <option value="1">Default sorting</option>
            <option value="1">Default sorting</option>
            <option value="1">Default sorting</option>
            </select>
        </div>
        <div class="sorting mr-auto">
            <select>
            <option value="1">Show 12</option>
            <option value="1">Show 12</option>
            <option value="1">Show 12</option>
            </select>
        </div>
        <div>
            <div class="input-group filter-bar-search">
            <input type="text" placeholder="Search">
            <div class="input-group-append">
                <button type="button"><i class="ti-search"></i></button>
            </div>
            </div>
        </div>
        </div> -->
        <!-- End Filter Bar -->
        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">
        <div class="row">
            <?php foreach($ternak as $row) : ?>
            <div class="col-md-6 col-lg-4">
                <!-- form untuk proses belanja -->
                <?= form_open(base_url('belanja/add')); ?>
                <?= form_hidden('id', $row->id_ternak); ?>
                <?= form_hidden('name', $row->nama_peternakan); ?>   

            <div class="card text-center card-product">
                <div class="card-product__img">
                <a href="<?= base_url('peternakan/detail/'.$row->slug_peternakan) ?>"><img class="card-img" src="<?= base_url('assets/upload/image/'.$row->gambar); ?>" alt="<?= $row->nama_peternakan; ?>"></a>
                <!-- <ul class="card-product__imgOverlay">
                <li><button><a href="<?= base_url('peternakan/detail/'.$row->slug_peternakan) ?>"><i class="ti-search"></i></a></button></li>
                <li><button type="submit" value="submit"><i class="ti-shopping-cart"></i></a></button></li>
                <li><button><i class="ti-heart"></i></button></li>
                <li><a href=""><button>Tambah Ke Keranjang</button></a>x</li>
                </ul> -->
                </div>
                <div class="card-body">
                <h4 class="card-product__title"><a href="<?= base_url('peternakan/detail/'.$row->slug_peternakan) ?>"><?= $row->nama_peternakan; ?></a></h4>
                <p class="card-product__price">Pemilik : <?= $row->nama; ?></p>
                </div>
            </div>
            </form>
            </div>
            <?php endforeach; ?>
        </div>
            <!-- pagination -->
            <div class="pagination flex-m flex-w p-t-26 center">
                <?= $paging; ?>
            </div>
        </section>
        <!-- End Best Seller -->
    </div>
    </div>
</div>
</section>
<!-- ================ category section end ================= -->		  

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
                <p><?= $row->nama_kategori; ?></p>
                <h4 class="card-product__title"><a href="<?= base_url('produk/detail/'.$row->slug_produk) ?>"><?= $row->nama_produk; ?></a></h4>
                <p class="card-product__price">IDR <?= number_format($row->harga,'0',',','.'); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
        </div>
    </div>
</section> -->
    <!-- ================ Best Selling item  carousel end ================= --> 