<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    // listing data produk
    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data_ternak = $this->Produk_model->listingPeternakan();
        // $kategori = $this->Produk_model->listingKategori();
        // ambil data total produk
        $total = $this->Produk_model->totalProduk();
        
        // paginasi start
        $this->load->library('pagination');
        
        $config['base_url']         = base_url().'produk/index/';
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
        $config['first_url']        = base_url().'produk/';
        
        $this->pagination->initialize($config);
        // ambil data produk
        $page   = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
        $produk = $this->Produk_model->produk($config['per_page'], $page);
        // paginasi end

        $data = array(
            'title'     =>  'Produk '.$site->nama_web,
            'site'      =>  $site,
            'data_ternak'  =>  $data_ternak,
            'produk'    =>  $produk,
            'paging'    =>  $this->pagination->create_links(),
            'isi'       =>  'produk/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);

    }

    // listing data kategori produk
    public function kategori($slug_kategori)
    {
        $jenis_kategori = $this->Kategori_model->read($slug_kategori);
        $id_kategori = $jenis_kategori->id_kategori;

        $site = $this->Konfigurasi_model->listing();
        $kategori = $this->Produk_model->listingKategori();
        // ambil data total produk
        $total = $this->Produk_model->totalKategori($id_kategori);
        // paginasi start
        $this->load->library('pagination');
        
        $config['base_url']         = base_url().'produk/kategori/'.$slug_kategori.'/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 6;
        $config['uri_segment']      = 5;
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
        $config['first_url']        = base_url().'produk/kategori/'.$slug_kategori;
        
        $this->pagination->initialize($config);
        // ambil data produk
        $page   = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
        $produk = $this->Produk_model->kategori($id_kategori, $config['per_page'], $page);
        // paginasi end

        $data = array(
            'title'     =>  $jenis_kategori->nama_kategori,
            'site'      =>  $site,
            'kategori'  =>  $kategori,
            'produk'    =>  $produk,
            'total'     =>  $total,
            'paging'    =>  $this->pagination->create_links(),
            'isi'       =>  'produk/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);

    }

    // listing data ternak produk
    public function peternakan($slug_peternakan)
    {
        $peternakan = $this->Ternak_model->read($slug_peternakan);
        $id_ternak = $peternakan->id_ternak;

        $site = $this->Konfigurasi_model->listing();
        $data_ternak = $this->Produk_model->listingPeternakan();
        // ambil data total produk
        $total = $this->Produk_model->totalPeternakan($id_ternak);
        // paginasi start
        $this->load->library('pagination');
        
        $config['base_url']         = base_url().'produk/peternakan/'.$slug_peternakan.'/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 6;
        $config['uri_segment']      = 5;
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
        $config['first_url']        = base_url().'produk/peternakan/'.$slug_peternakan;
        
        $this->pagination->initialize($config);
        // ambil data produk
        $page   = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
        $produk = $this->Produk_model->peternakan($id_ternak, $config['per_page'], $page);
        // paginasi end

        $data = array(
            'title'     =>  $peternakan->nama_peternakan,
            'site'      =>  $site,
            'data_ternak'  =>  $data_ternak,
            'produk'    =>  $produk,
            'total'     =>  $total,
            'paging'    =>  $this->pagination->create_links(),
            'isi'       =>  'produk/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);

    }

    // detail produk
    public function detail($slug_produk)
    {
    
        $site = $this->Konfigurasi_model->listing();
        $produk = $this->Produk_model->read($slug_produk);
        $id_produk = $produk->id_produk;
        // $gambar = $this->Produk_model->gambar($id_produk);
        $best_seller = $this->Produk_model->homeTrendingProduk();

        $data = array(
            'title'     =>  'Detail Produk',
            'site'      =>  $site,
            'produk'    =>  $produk,
            'best_seller'   =>  $best_seller,
            // 'gambar'    =>  $gambar,
            'isi'       =>  'produk/detail'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    
    }
}