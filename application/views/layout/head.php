<?php
// loading konfigurasi website
$site = $this->Konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <!-- ICON DIAMBIL DARI KONFIGURASI WEB -->
    <link rel="icon" href="<?= base_url('assets/upload/image/'.$site->icon); ?>" type="image/png">
    <!-- SEO GOOGLE -->
    <meta name="keywords" content="<?= $site->keywords ?>">
    <meta name="description" content="<?= $title ?>, <?= $site->deskripsi ?>">
    <link href="<?= base_url(); ?>assets/template/css/cart.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendors/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/css/style.css">
<!-- <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js" charset="UTF-8"></script></head> -->

    <!-- My Style -->
    <style type="text/css" media="screen">
        .center {
            margin: auto;
            width: 20%;
            padding: 10px;
        }
        ul.pagination {
            border-radius: 5px;
        }
        .pagination a, .pagination b {
            padding: 5px 20px;
            background-color: #4d94ff;
            color: white;
            text-decoration: none;
            float: center;
        }
        .pagination b{
            background-color: #005ce6;
            color: white;
        }
        .pagination a:hover {
            background-color: #005ce6;
        }

    </style>
<body>
