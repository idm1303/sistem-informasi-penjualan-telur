    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('peternak/dashboard'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>assets/admin/dist/img/egg_logo_2.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>Bayaoku</strong> | Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="<?= base_url(); ?>assets/admin/dist/img/egg.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
            </div>
        </div>

        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <!-- MENU DASHBOARD  -->
            <li class="nav-item">
                <a href="<?= base_url('profil_pelanggan/dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt text-info"></i>
                <p>DASHBOARD</p>
                </a>
            </li>

            <!-- MENU PROFIL  -->
            <li class="nav-item">
                <a href="<?= base_url('profil_pelanggan/profil') ?>" class="nav-link">
                <i class="nav-icon fas fa-user text-info"></i>
                <p>PROFIL</p>
                </a>
            </li>

            <!-- MENU DATA PESANAN -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th text-info"></i>
                <p>
                    PESANAN
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('profil_pelanggan/pesanan'); ?>" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>Daftar Pesanan</p>
                    </a>
                </li>
                </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-12">
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">