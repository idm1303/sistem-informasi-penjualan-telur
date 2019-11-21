<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1><?= $title; ?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            <li class="breadcrumb-item active" aria-current="page">Proses Belanjaan Anda</li>
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->



<!--================Cart Area =================-->
<!-- cek data belanja -->
<?php
    $keranjang = $this->cart->contents();
?>

<section class="cart_area">
    <div class="container">

    <?php if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
        
    }
    
    ?>

        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah Produk</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col" width="15%">Aksi</th>
                        </tr>
                    </thead>
        <!-- kalau keranjang kosong -->
        <?php 
            if( empty($keranjang) ) {
        ?>
        <div class="header-cart">
            <p class="alert alert-warning">
                Keranjang Belanja Kosong.
            </p>
        </div>
                    <!-- kalau keranjang tidak kosong-->
                    <?php

                    } else {

                        foreach($keranjang as $row) {
                            $id_produk = $row['id'];
                            // ambil data produk
                            $produk = $this->Produk_model->getProdukById($id_produk);
                            // var_dump($produk['gambar']); exit;
                    ?>
                        <!-- form open update -->
                    <?= form_open(base_url('belanja/update_cart/'.$row['rowid'])); ?>
                    
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="<?= base_url('assets/upload/image/thumbs/'.$produk['gambar']) ?>" alt="<?= $row['name']; ?>">
                                    </div>
                                    <div class="media-body">
                                        <a href="<?= base_url('produk/detail/'.$produk['slug_produk']) ?>">
                                            <p class="text-dark"><?= $row['name']; ?></p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>IDR <?= number_format($row['price'],'0',',','.'); ?></h5>
                                <input type="hidden" name="price" value="<?= $row['price'] ?>" id="price" />
                            </td>
                            <td>
                                <!-- <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                        class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                </div> -->
                                <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button> -->

                                <input type="number" class="" name="qty" id="qty" value="<?= $row['qty']; ?>">

                                <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button> -->
                                
                                
                            </td>
                            <td>
                                <h5>IDR 
                                    <span id="hasilsubtotal"></span>
                                </h5>
                                <input type="hidden" name="subtotal" value="<?= $row['price'] ?>" id="subtotal">
                            </td>
                            <td>
                                <button type="submit" name="update" value="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="<?= base_url('belanja/hapus/'.$row['rowid']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- form closed -->
                        </form>
                        <?php 
                            
                            } // tutup foreach keranjang
                        } // tutup if
                        ?>
                        
                        <tr class="bottom_button">
                            <td>
                                <!-- <a class="button" href="#">Update Cart</a> -->
                                <a class="gray_btn" href="<?= base_url('belanja/hapus') ?>">Reset Keranjang</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <!-- <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="button" href="#">Have a Coupon?</a>
                                </div> -->
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td>
                            <?php  // total belanja
                                $total_belanja = number_format($this->cart->total(),'0',',','.'); 
                            ?>
                                <h5>IDR <?= $total_belanja; ?></h5>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="shipping_area">
                            <td class="d-none d-md-block">

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Ongkos Kirim</h5>
                            </td>
                            <td>
                                <!-- <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode">
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div> -->
                                <?php if($total_belanja != 0) { ?>
                                    <?php $ongkir = 10000; ?>
                                    <h5>IDR <?= number_format($ongkir,'0',',','.'); ?></h5>
                                <?php }else{ ?>
                                    <?php $ongkir = 0; ?>
                                    <h5>IDR <?= number_format($ongkir,'0',',','.'); ?> </h5>
                                <?php } ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Total Bayar</h5>
                            </td>
                            <td>
                            <?php  // total belanja
                                $total_belanja = $this->cart->total() + $ongkir; 
                            ?>
                                <h5>IDR <?= number_format($total_belanja,'0',',','.'); ?></h5>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="d-nonw-1">

                            </td>
                            <td>

                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="<?= base_url('produk') ?>">Continue Shopping</a>
                                    <a class="primary-btn ml-2" href="<?= base_url('belanja/checkout') ?>">Checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<!--================Start Jquery =================-->
<script src="<?= base_url(); ?>assets/template/vendors/jquery/jquery-3.2.1.min.js"></script>

<script>

var price = $('#price').val();
$("#hasilsubtotal").html(price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

$('body').on('keyup','#qty', function() {
	// mengambil nilai
    var qty = $(this).val();
	// untuk megisi nilai pada total
    var jumlah = parseInt(qty) * parseInt(price);
    // mengecek apa bila value dari #inphasil bernilai 0
	if (qty == 0 || isNaN(qty)) {
		// akan mengambil nilai dari select
        $("#subtotal").attr('value', price);    
	} else {
		// mengambil hasil perkalian
        $("#subtotal").attr('value', jumlah);
        $("#hasilsubtotal").html(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    } 
    
});

</script>

<!--================End Jquery =================-->

