<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    // load model
    public function __construct()
    {
    
        parent::__construct();
        $this->load->model('Konfigurasi_model');
    
    }

    // Konfigurasi Umum
    public function index()
    {

        $konfigurasi = $this->Konfigurasi_model->listing();
        // var_dump($konfigurasi); exit;

        $valid = $this->form_validation;
        $valid->set_rules('nama_web', 'Nama website', 'required');
        $valid->set_rules('website', 'Website', 'valid_url');
        $valid->set_rules('facebook', 'Facebook', 'valid_url');
        $valid->set_rules('instagram', 'Instagram', 'valid_url');
        

        if( $valid->run() == FALSE ) {

            $data = array(
                'title' => 'Konfigurasi Website',
                'konfigurasi' => $konfigurasi,
                'isi' => 'admin/konfigurasi/list'
            );
            $this->load->view('peternak/layout/wrapper', $data);

        } else {
            
            $i = $this->input;
            $data = array(
                'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                'nama_web' => $i->post('nama_web'), 
                'tagline' => $i->post('tagline'), 
                'email' => $i->post('email'), 
                'website' => $i->post('website'), 
                'keywords' => $i->post('keywords'), 
                'metatext' => $i->post('metatext'), 
                'telepon' => $i->post('telepon'), 
                'alamat' => $i->post('alamat'), 
                'facebook' => $i->post('facebook'), 
                'instagram' => $i->post('instagram'), 
                'deskripsi' => $i->post('deskripsi'), 
                'rekening_pembayaran' => $i->post('rekening_pembayaran')
            );
            $this->Konfigurasi_model->edit($data);
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect(base_url('peternak/konfigurasi'));
        }


    }

    // Konfigurasi logo website
    public function logo()
    {
        $konfigurasi = $this->Konfigurasi_model->listing();
    
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_web', 'Nama website', 'required');

        if( $valid->run() ) {
            // cek jika logo diganti
            if( !empty($_FILES['logo']['name']) ) {

            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

                if( ! $this->upload->do_upload('logo') ) {
                    echo $this->upload->display_errors();
                    // var_dump($this->upload->display_errors('', ''));
                    // var_dump($_FILES);exit;
                    $data = array(
                        "title" => 'Konfigurasi Logo Website',
                        "konfigurasi" => $konfigurasi,
                        "error" => $this->upload->display_errors(),
                        "isi"   => 'peternak/konfigurasi/logo'
                    );

                $this->load->view('peternak/layout/wrapper', $data);

                } else {
                
                $upload_gambar = array("upload_data" => $this->upload->data());
                // var_dump($upload_gambar); exit; 
                // create thumbnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                // lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 75;
                $config['height']           = 50;
                $config['thumb_marker']     = '';
        
                $this->load->library('image_lib', $config);
        
                $this->image_lib->resize();
                // end create thumbnail
        
                $data = array(
                    "id_konfigurasi" => $konfigurasi->id_konfigurasi,
                    "nama_web" => $this->input->post('nama_web'),
                    "logo" => $upload_gambar['upload_data']['file_name']
                );
                
                $this->Konfigurasi_model->edit($data);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect(base_url('peternak/konfigurasi/logo'));
                }

            } else {
                // echo "upload tanpa gambar jalan"; exit;
            // edit produk tanpa ganti gambar
            $data = array(
                "id_konfigurasi" => $konfigurasi->id_konfigurasi,
                "nama_web" => $this->input->post('nama_web'),
                // "logo" => $upload_gambar['upload_data']['file_name']
            );
            
            $this->Konfigurasi_model->edit($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('peternak/konfigurasi/logo'));

        }}

        $data = array(
            "title" => 'Konfigurasi Logo Website',
            "konfigurasi" => $konfigurasi,
            "isi"   => 'peternak/konfigurasi/logo'
        );

        $this->load->view('peternak/layout/wrapper', $data);
    
    }

    // Konfigurasi icon website
    public function icon()
    {
    
        $konfigurasi = $this->Konfigurasi_model->listing();
    
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_web', 'Nama website', 'required');

        if( $valid->run() ) {
            // cek jika icon diganti
            if( !empty($_FILES['icon']['name']) ) {

            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

                if( ! $this->upload->do_upload('icon') ) {
                    echo $this->upload->display_errors();
                    // var_dump($this->upload->display_errors('', ''));
                    // var_dump($_FILES);exit;
                    $data = array(
                        "title" => 'Konfigurasi Icon Website',
                        "konfigurasi" => $konfigurasi,
                        "error" => $this->upload->display_errors(),
                        "isi"   => 'peternak/konfigurasi/icon'
                    );

                $this->load->view('peternak/layout/wrapper', $data);

                } else {
                
                $upload_gambar = array("upload_data" => $this->upload->data());
                // var_dump($upload_gambar); exit; 
                // create thumbnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                // lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 75;
                $config['height']           = 50;
                $config['thumb_marker']     = '';
        
                $this->load->library('image_lib', $config);
        
                $this->image_lib->resize();
                // end create thumbnail
        
                $data = array(
                    "id_konfigurasi" => $konfigurasi->id_konfigurasi,
                    "nama_web" => $this->input->post('nama_web'),
                    "icon" => $upload_gambar['upload_data']['file_name']
                );
                
                $this->Konfigurasi_model->edit($data);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect(base_url('peternak/konfigurasi/icon'));
                }

            } else {
                // echo "upload tanpa gambar jalan"; exit;
            // edit produk tanpa ganti gambar
            $data = array(
                "id_konfigurasi" => $konfigurasi->id_konfigurasi,
                "nama_web" => $this->input->post('nama_web'),
                // "logo" => $upload_gambar['upload_data']['file_name']
            );
            
            $this->Konfigurasi_model->edit($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('peternak/konfigurasi/icon'));

        }}

        $data = array(
            "title" => 'Konfigurasi Icon Website',
            "konfigurasi" => $konfigurasi,
            "isi"   => 'peternak/konfigurasi/icon'
        );

        $this->load->view('peternak/layout/wrapper', $data);
    
    }
}