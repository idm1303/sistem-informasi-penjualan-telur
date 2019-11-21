<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Produk_model');
        // $this->load->library('encrypt');
        
        // proteksi halaman
        $this->auth->cek_login();
    }

    // Halaman User
    public function index()
    {
        
        // $query = $this->db->get('Produk');
        $data['produk'] = $this->Produk_model->getProduk();

        $data = [
            "title" => 'Data Produk',
            "produk"  => $data['produk'],
            "isi"   => 'admin/produk/list'
        ];

        $this->load->view('admin/layout/wrapper', $data);
    }

    // Gambar
    public function gambar($id_produk)
    {
    
        $produk = $this->Produk_model->getProdukById($id_produk);
        $gambar = $this->Produk_model->gambar($id_produk);
        
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('judul_gambar', 'Judul/Nama Gambar', 'required');
        

        if( $valid->run() ) {
            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar') ) {
                echo $this->upload->display_errors();
                // var_dump($this->upload->display_errors('', ''));
                // var_dump($_FILES);exit;
                $data = [
                    "title" => 'Tambah Gambar Produk: '.$produk['nama_produk'],
                    "kategori" => $produk,
                    "gambar" => $gambar,
                    "error" => $this->upload->display_errors(),
                    "isi"   => 'admin/produk/gambar'
                ];

            $this->load->view('admin/layout/wrapper', $data);

        } else {
            $this->Produk_model->addGambar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/Produk/gambar/'.$produk['id_produk']));
        }}

        $data = [
            "title" => 'Tambah Gambar Produk: '.$produk['nama_produk'],
            "produk" => $produk,
            "gambar" => $gambar,
            "isi"   => 'admin/produk/gambar'
        ];

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {
        $kategori = $this->Kategori_model->getKategori();
        // var_dump($kategori); exit;
        
        // var_dump($this->session->set_userdata($data));

        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_produk', 'Nama Produk', 'required');
        $valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]');
        // $valid->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $valid->set_rules('harga', 'Harga Produk', 'required|integer');
        $valid->set_rules('stok', 'Stok Produk', 'required|integer');
        $valid->set_rules('berat', 'Berat Produk', 'required');
        $valid->set_rules('ukuran', 'Ukuran Produk', 'required');
        $valid->set_rules('keterangan', 'Keterangan Produk');
        $valid->set_rules('keywords', 'Keyword', 'required');

        if( $valid->run() ) {
            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar') ) {
                echo $this->upload->display_errors();
                // var_dump($this->upload->display_errors('', ''));
                // var_dump($_FILES);exit;
                $data = [
                    "title" => 'Tambah Produk',
                    "kategori" => $kategori,
                    "error" => $this->upload->display_errors(),
                    "isi"   => 'admin/produk/tambah'
                ];

            $this->load->view('admin/layout/wrapper', $data);

        } else {
            
            $this->Produk_model->addProduk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/Produk'));
        }}

        $data = [
            "title" => 'Tambah Produk',
            "kategori" => $kategori,
            "isi"   => 'admin/produk/tambah'
        ];

        $this->load->view('admin/layout/wrapper', $data);

    }

    public function edit($id_produk)
    {
        // ambil data produk yg akan diedit
        $produk = $this->Produk_model->getProdukById($id_produk);

        // ambil data  kategori
        $kategori = $this->Kategori_model->getKategori();

        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_produk', 'Nama Produk', 'required');
        $valid->set_rules('kode_produk', 'Kode Produk', 'required');
        // $valid->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $valid->set_rules('harga', 'Harga Produk', 'required|integer');
        $valid->set_rules('stok', 'Stok Produk', 'required|integer');
        $valid->set_rules('berat', 'Berat Produk', 'required');
        $valid->set_rules('ukuran', 'Ukuran Produk', 'required');
        $valid->set_rules('keterangan', 'Keterangan Produk');
        $valid->set_rules('keywords', 'Keyword');

        if( $valid->run() ) {
            // cek jika gambar diganti
            if( !empty($_FILES['gambar']['name']) ) {

            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

                if( ! $this->upload->do_upload('gambar') ) {
                    echo $this->upload->display_errors();
                    // var_dump($this->upload->display_errors('', ''));
                    // var_dump($_FILES);exit;
                    $data = [
                        "title" => 'Ubah Produk : '.$produk['nama_produk'],
                        "kategori" => $kategori,
                        "produk" => $produk,
                        "error" => $this->upload->display_errors(),
                        "isi"   => 'admin/produk/edit'
                    ];

                $this->load->view('admin/layout/wrapper', $data);

                } else {
                
                $this->Produk_model->editProduk();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect(base_url('admin/Produk'));
                }

            } else {
                // echo "upload tanpa gambar jalan"; exit;
            // edit produk tanpa ganti gambar
            $this->Produk_model->editProdukTanpaGambar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('admin/Produk'));
        }}

        $data = [
            "title" => 'Ubah Produk: ' .$produk['nama_produk'],
            "kategori" => $kategori,
            "produk" => $produk,
            "isi"   => 'admin/produk/edit'
        ];

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function delete($id_produk)
    {
        // proses hapus gambar
        $produk = $this->Produk_model->getProdukById($id_produk);
        unlink('./assets/upload/image/'.$produk['gambar']);
        unlink('./assets/upload/image/thumbs/'.$produk['gambar']);
        // end proses hapus
        $this->Produk_model->deleteProduk($id_produk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('admin/Produk'), 'refresh');
    }

    public function delete_gambar($id_produk, $id_gambar)
    {
        // proses hapus gambar
        $gambar = $this->Produk_model->getGambarById($id_gambar);
        unlink('./assets/upload/image/'.$gambar['gambar']);
        unlink('./assets/upload/image/thumbs/'.$gambar['gambar']);
        // end proses hapus
        $this->Produk_model->deleteGambar($id_gambar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('admin/Produk/gambar/'.$id_produk), 'refresh');
    }

}