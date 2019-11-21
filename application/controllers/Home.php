<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    // Halaman Utama Website - Homepage
    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        // $kategori = $this->Konfigurasi_model->nav_produk();
        $produk = $this->Produk_model->homeTrendingProduk();
        // $produkbaru = $this->Produk_model->homeNewProduk();
        $peternak = $this->Ternak_model->getTernak();
        $data = array (
            'title'     =>  $site->nama_web.' | '.$site->tagline,
            'keywords'  =>  $site->keywords,
            'deskripsi' =>  $site->deskripsi,
            'site'      =>  $site,
            'peternak'  =>  $peternak,
            // 'kategori'  =>  $kategori,
            'produk'    =>  $produk,
            // 'produkbaru' =>  $produkbaru,
            'isi'       =>  'home/list'
        );
        
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // public function cart()
    // {

    //     $site = $this->Konfigurasi_model->listing();
    //     // $kategori = $this->Konfigurasi_model->nav_produk();
    //     $produk = $this->Produk_model->homeTrendingProduk();
    //     $produkbaru = $this->Produk_model->homeNewProduk();
    //     $data = array (
    //                 'title'     =>  $site->nama_web.' | '.$site->tagline,
    //                 'keywords'  =>  $site->keywords,
    //                 'deskripsi' =>  $site->deskripsi,
    //                 'site'      =>  $site,
    //                 // 'kategori'  =>  $kategori,
    //                 'produk'    =>  $produk,
    //                 'produkbaru' =>  $produkbaru,
    //                 'isi'       =>  'home/cart'
    //     );
    
    //     $this->load->view('layout/wrapper', $data, FALSE);
    
    // }

    // public function reset()
    // {
    //     $site = $this->Konfigurasi_model->listing();
    //     // $kategori = $this->Konfigurasi_model->nav_produk();
    //     $produk = $this->Produk_model->homeTrendingProduk();
    //     $produkbaru = $this->Produk_model->homeNewProduk();
        
    //     $data = array(
    //         'title'     =>  $site->nama_web.' | '.$site->tagline,
    //         'keywords'  =>  $site->keywords,
    //         'deskripsi' =>  $site->deskripsi,
    //         'site'      =>  $site,
    //         // 'kategori'  =>  $kategori,
    //         'produk'    =>  $produk,
    //         'produkbaru' =>  $produkbaru,
    //         'isi'   => 'home/cart'
    //     );
        
    //     $this->cart->destroy();
    //     $this->load->view('layout/wrapper', $data, FALSE);
    
    // }

}