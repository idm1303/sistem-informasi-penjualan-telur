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
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-7">

                <?php if( validation_errors() ) : ?>
                    <div class="alert alert-warning">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                
                    <h3>Detail Pemesanan</h3>
                    <?php $attributes = array('class' => 'row contact_form', 'novalidate' => 'novalidate'); ?>
                    <?= form_open(base_url('belanja/checkout'), $attributes); ?>
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" id="id_user">
                        <input type="hidden" name="no_invoice" value="<?= $no_invoice ?>" id="no_invoice">
                        <input type="hidden" name="id_pemilik" value="<?= $id_pemilik ?>" id="id_pemilik">
                        <div class="col-md-12 form-group">
                            <?= form_input('nama_pelanggan', set_value('nama_pelanggan', $profil['nama_lengkap']), 'class="form-control" placeholder="Nama lengkap.."'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('email', set_value('email', $profil['email']), 'class="form-control" placeholder="Email.."'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('telepon', set_value('telepon', $profil['telepon']), 'class="form-control" placeholder="No. Hp / telepon.."'); ?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" id="kabkota" name="kabkota">
                                <option>Pilih Kota / Kabupaten..</option>
                                <?php foreach( $kota as $row ) : ?>
                                    <option value="<?= $row['id_kota']; ?>" <?php echo ($row['id_kota'] == $profil['kab_kota'])?'selected':'';?>><?= $row['nama_kota']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('kecamatan', set_value('kecamatan', $profil['kecamatan']), 'class="form-control" placeholder="Kecamatan.."'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('keldesa', set_value('keldesa', $profil['kel_desa']), 'class="form-control" placeholder="Kelurahan / desa.."'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('alamat', set_value('alamat', $profil['nama_jalan']), 'class="form-control" placeholder="Alamat.."'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= form_input('kodepos', set_value('kodepos', $profil['kode_pos']), 'class="form-control" placeholder="Kode pos.."'); ?>
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <?= form_textarea('catatan', set_value('catatan'), 'class="form-control" placeholder="Catatan Pesanan.."'); ?>
                        </div>
                </div>
                <div class="col-lg-5">
                            <?php if ( empty($keranjang) ) { ?>
                                
                            <?php } else { ?>
                    <div class="order_box">
                        <h2>Pesanan Anda</h2>
                        <?php foreach ($keranjang as $row) : ?>
                        <ul class="list">
                            <li><a href="#"><h4>Produk <span>Total</span></h4></a></li>
                            <li><a href="#"><?= $row['name']; ?> <span class="middle">x <?= $row['qty']; ?></span>
                            <span class="last">IDR <?= number_format($row['subtotal'],'0',',','.'); ?></span></a></li>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>IDR <?= number_format($row['subtotal'],'0',',','.'); ?></span></a></li>
                            <li><a href="#">Pengiriman <span id="ongkir"></span></a></li>
                            <li><a href="#">Total Bayar <span id="totalBayar"></span></a></li>
                        </ul>
                        <!-- input hidden -->
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" id="id">
                        <input type="hidden" name="price" value="<?= $row['price'] ?>" id="price">
                        <input type="hidden" name="qty" value="<?= $row['qty'] ?>" id="qty">
                        <input type="hidden" name="subtotal" value="<?= $row['subtotal'] ?>" id="subtotal">
                        <input type="hidden" name="ongkir1" id="ongkir1">
                        <input type="hidden" name="totalBayar1" id="totalBayar1">
                        <!-- end input hidden -->
                        <?php endforeach; ?>
                        <div class="text-center">
                                <input type="submit" name="submit" value="Proses" class="button button-paypal" style="cursor:pointer;">
                        </div>
                    </div>
                            <?php } ?>        
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<!--================Start Checkout Jquery =================-->
<script src="<?= base_url(); ?>assets/template/vendors/jquery/jquery-3.2.1.min.js"></script>
<script>

var subtotal = $('#subtotal').val();
$("#totalBayar").html('IDR '+subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

$('#ongkir1').val(0)
$("#totalBayar1").val(subtotal);
// untuk mengambil nilai select
$(document).ready(function (){
    $("#ongkir").html('IDR 0'.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    var nilai=$('#kabkota option:selected').attr("value");
    $("#ongkir1").val(nilai);
    if ( nilai == 4 ){
        ongkir = 5000;
    } else if ( nilai == 5 || nilai == 6 ) {
        ongkir = 10000;
    } else if ( nilai == 3 || nilai == 7 ) {
        ongkir = 15000;
    } else if ( nilai == 2 ) {
        ongkir = 20000;
    } else if ( nilai == 8 ) {
        ongkir = 25000;
    } else if ( nilai == 1 ) {
        ongkir = 30000;
    } else {
        ongkir = 0;
    }

    $('body').on('change','#kabkota', function() {
	// mengambil nilai
	var hasil = $(this).val();
    // kondisi ongkir
    var ongkir = 0;
    if ( hasil == 4 ){
        ongkir = 5000;
    } else if ( hasil == 5 || hasil == 6 ) {
        ongkir = 10000;
    } else if ( hasil == 3 || hasil == 7 ) {
        ongkir = 15000;
    } else if ( hasil == 2 ) {
        ongkir = 20000;
    } else if ( hasil == 8 ) {
        ongkir = 25000;
    } else if ( hasil == 1 ) {
        ongkir = 30000;
    } else {
        ongkir = 0;
    }
    
    $("#ongkir").html('IDR '+ongkir.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    var totalBayar = parseInt(ongkir) + parseInt(subtotal);
    $("#totalBayar").html('IDR '+totalBayar.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    $("#ongkir1").val(ongkir);
    $("#totalBayar1").val(totalBayar);

    });
    $("#ongkir").html('IDR '+ongkir.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    var totalBayar = parseInt(ongkir) + parseInt(subtotal);
    $("#totalBayar").html('IDR '+totalBayar.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
    $("#ongkir1").val(ongkir);
    $("#totalBayar1").val(totalBayar);  
});

</script>
<!--================End Checkout Jquery =================-->

