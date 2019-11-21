<?php
// ambil data menu dari konfigurasi
$nav_produk = $this->Konfigurasi_model->nav_produk();

?>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('peternakan') ?>">Peternakan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('produk') ?>">Telur</a></li>
                
                <!-- <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Belanja</a>
                    <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="tracking-order.html">Tracking</a></li>
                    </ul>
                </li> -->
                <?php if ($this->session->userdata('akses_level') == 'Pelanggan') { ?>
                <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('belanja/konfirm_pembayaran') ?>">Konfirmasi Pembayaran</a></li> -->
                <li class="nav-item"><a class="nav-link" href="<?= base_url('belanja/cart') ?>">Keranjang</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('profil_pelanggan/dashboard') ?>">Profil</a></li>
                </ul>
                <?php } else { ?>
                <?php } ?>

                <ul class="nav-shop">
                <!-- <li class="nav-item"><button><i class="ti-search"></i></button></li> -->
                <?php 
                    // cek data belanja di cart
                    // $cart_check = $this->cart->contens();
                ?>
                <!-- <li class="nav-item"><a href="<?= base_url('belanja/cart') ?>"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?= $this->cart->total_items(); ?></span></button></a></li>	 -->
                
                <?php if ($this->session->userdata('akses_level') == 'Pelanggan') { ?>
                    <li class="nav-item"><a class="button button-header" href="<?= base_url('registrasi/logout') ?>">Logout</a></li>
                <?php } else { ?>
                    <li style="width:300px;"></li>
                    <li class="nav-item"><a class="button button-header" href="<?= base_url('registrasi/login') ?>">Login</a></li>
                <?php } ?>
                </ul>
              
            </div>
            </div>
        </nav>
        </div>
    </header>
        <!--================ End Header Menu Area =================-->
<main class="site-main">