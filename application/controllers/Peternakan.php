<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peternakan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    // listing data produk
    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data_ternak = $this->Ternak_model->getTernak();
        // $kategori = $this->Produk_model->listingKategori();
        // ambil data total produk
        $total = $this->Ternak_model->totalPeternakan();
        
        // paginasi start
        $this->load->library('pagination');
        
        $config['base_url']         = base_url().'peternakan/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 6;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="disabled"><li class="active"><a href="#">';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt;';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url().'peternakan/';
        
        $this->pagination->initialize($config);
        // ambil data produk
        $page   = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
        $ternak = $this->Ternak_model->ternak($config['per_page'], $page);
        // paginasi end

        $data = array(
            'title'     =>  'Daftar Peternakan',
            'site'      =>  $site,
            'data_ternak'  =>  $data_ternak,
            'ternak'    =>  $ternak,
            'paging'    =>  $this->pagination->create_links(),
            'isi'       =>  'peternakan/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);

    }

    // detail peternakan
    public function detail($slug_peternakan)
    {
    
        $site = $this->Konfigurasi_model->listing();
        $ternak = $this->Ternak_model->read($slug_peternakan);
        $id_user = $ternak->id_user;
        $pemilik = $this->User_model->getUserById($id_user);
        // $gambar = $this->Produk_model->gambar($id_produk);
        // $best_seller = $this->Produk_model->homeTrendingProduk();

        $data = array(
            'title'     =>  'Detail Peternakan',
            'site'      =>  $site,
            'ternak'    =>  $ternak,
            'pemilik'   =>  $pemilik,
            // 'best_seller'   =>  $best_seller,
            // 'gambar'    =>  $gambar,
            'isi'       =>  'peternakan/detail'
        );

        // var_dump($data);exit;

        $this->load->view('layout/wrapper', $data, FALSE);
    
    }
}