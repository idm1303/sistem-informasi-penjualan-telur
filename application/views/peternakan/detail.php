<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1><?= $title; ?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            <!-- <li class="breadcrumb-item active" aria-current="page">Shop Single</li> -->
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->


<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="<?= base_url('assets/upload/image/'.$ternak->gambar); ?>" alt="">
                    </div>
                    <!-- <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div> -->
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <!-- form untuk proses belanja -->   
                    <h3><?= $ternak->nama_peternakan; ?></h3>
                    <h2>Pemilik : <?= $pemilik['nama']; ?></h2>
                    <ul class="list">
                        <!-- <li><span>Kategori</span> : </li> -->
                    </ul>
                    <br>
                    <a href="<?= base_url('produk/peternakan/'.$ternak->slug_peternakan) ?>" class="button primary-btn">Lihat Produk</a>
                    
                    <!-- <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="false">Detail Informasi</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                    aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false">Reviews</a>
            </li> -->
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p><?= $ternak->deskripsi; ?></p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Alamat</h5>
                                </td>
                                <td>
                                    <h5><?= $ternak->alamat; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>No. Telepon</h5>
                                </td>
                                <td>
                                    <h5><?= $ternak->telepon; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Email</h5>
                                </td>
                                <td>
                                    <h5><?= $pemilik['email']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>No. Rekening (<?= $ternak->nama_bank; ?>)</h5>
                                </td>
                                <td>
                                    <h5><?= $ternak->no_rek; ?></h5>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>
                                    <h5>Kualitas Cek</h5>
                                </td>
                                <td>
                                    <h5>iya</h5>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td>
                                    <h5>Ketika dikemas</h5>
                                </td>
                                <td>
                                    <h5>Dengan rapih dan aman</h5>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->	