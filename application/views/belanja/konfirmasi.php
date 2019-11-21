<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1><?= $title ?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop Category</li> -->
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->
<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
<div class="container">
    <p class="text-center billing-alert">Terima Kasih. Pesanan Anda telah kami terima. Silahkan lakukan pembayaran ke <b>Rekening</b> yang tertera di bawah agar pesanan Anda dapat kami proses. <br> Gunakan Kode Transaksi untuk konfirmasi pembayaran Anda. Kode Transaksi Anda : <b><?= $kode_transaksi; ?></b></p>
    
    <p class="text-center billing-alert">
        <span>Lihat Pesanan Anda <a href="<?= base_url('profil_pelanggan/pesanan') ?>">Di sini.</a></span> 
    </p>

    <div class="row mb-5">
    <div class="col-md-6 col-xl-3 mb-4 mb-xl-0">
        <!-- <div class="confirmation-card">
        <h3 class="billing-title">Info Pesanan</h3>
        <table class="order-rable">
            <tr>
            <td>Kode Transaksi</td>
            <td>: 60235</td>
            </tr>
            <tr>
            <td>Date</td>
            <td>: Oct 03, 2017</td>
            </tr>
            <tr>
            <td>Total</td>
            <td>: USD 2210</td>
            </tr>
            <tr>
            <td>Payment method</td>
            <td>: Check payments</td>
            </tr>
        </table>
        </div>  -->
    </div> 
    <div class="col-md-4 col-xl-6 mb-3 mb-xl-0">
        <div class="confirmation-card">
        <h3 class="billing-title">Info Pembayaran</h3>
        <table class="order-rable">
            <tr>
            <td width="150px;">Atas Nama</td>
            <td>: <?= $nama; ?></td>
            </tr>
            <tr>
            <td>No. Rekening</td>
            <td>: <?= $rekening; ?> (Bank <?= $nama_bank; ?>)</td>
            </tr>
            <tr>
            <td>No. Telepon</td>
            <td>: <?= $telepon; ?></td>
            </tr>
            <!-- <tr>
            <td>Postcode</td>
            <td>: 1205</td>
            </tr> -->
        </table>
        </div>
    </div>
    <!-- <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
        <div class="confirmation-card">
        <h3 class="billing-title">Shipping Address</h3>
        <table class="order-rable">
            <tr>
            <td>Street</td>
            <td>: 56/8 panthapath</td>
            </tr>
            <tr>
            <td>City</td>
            <td>: Dhaka</td>
            </tr>
            <tr>
            <td>Country</td>
            <td>: Bangladesh</td>
            </tr>
            <tr>
            <td>Postcode</td>
            <td>: 1205</td>
            </tr>
        </table>
        </div>
    </div> -->
    </div>
    <div class="order_details_table">
    <h2>Detail Pesanan</h2>
    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Produk</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <p><?= $nama_produk; ?></p>
            </td>
            <td>
                <h5>x <?= $qty; ?></h5>
            </td>
            <td>
                <p>IDR. <?= number_format($subtotal,'0',',','.'); ?></p>
            </td>
            </tr>
            <!-- <tr>
            <td>
                <p>Pixelstore fresh Blackberry</p>
            </td>
            <td>
                <h5>x 02</h5>
            </td>
            <td>
                <p>$720.00</p>
            </td>
            </tr>
            <tr>
            <td>
                <p>Pixelstore fresh Blackberry</p>
            </td>
            <td>
                <h5>x 02</h5>
            </td>
            <td>
                <p>$720.00</p>
            </td>
            </tr> -->
            <tr>
            <td>
                <h4>Subtotal</h4>
            </td>
            <td>
                <h5></h5>
            </td>
            <td>
                <p>IDR. <?= number_format($subtotal,'0',',','.'); ?></p>
            </td>
            </tr>
            <tr>
            <td>
                <h4>Biaya Pengiriman</h4>
            </td>
            <td>
                <h5></h5>
            </td>
            <td>
                <p>IDR. <?= number_format($pengiriman,'0',',','.'); ?></p>
            </td>
            </tr>
            <tr>
            <td>
                <h4>Total Bayar</h4>
            </td>
            <td>
                <h5></h5>
            </td>
            <td>
                <h4>IDR. <?= number_format($total_bayar,'0',',','.'); ?></h4>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
</section>
<!--================End Order Details Area =================-->