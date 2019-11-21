<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth_2->cek_login();
        $this->load->model('Pelanggan_model');
        
    }

    public function index()
    {
        $profil = $this->User_model->getProfilLengkapById($this->session->userdata('id_user'));

        $data = array(  
            'title'     =>      'Profil Pelanggan',
            'profil'    =>      $profil[0],
            'isi'       =>      'pelanggan/profil/list' 
        );
        
        $this->load->view('pelanggan/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $profil = $this->User_model->getProfilById($this->session->userdata('id_user'));
        $kota = $this->Pelanggan_model->getKota();

        $data = array(  
            'title'     =>      'Data Profil',
            'profil'    =>      $profil[0],
            'kota'      =>      $kota,
            'isi'       =>      'pelanggan/profil/tambah' 
        );

        $valid = $this->form_validation;
        $valid->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('telepon', 'Telepon', 'required|numeric');
        $valid->set_rules('kab_kota', 'Kabupaten / Kota', 'required');
        $valid->set_rules('kecamatan', 'Kecamatan', 'required');
        $valid->set_rules('kel_desa', 'Kelurahan / Desa', 'required');
        $valid->set_rules('nama_jalan', 'Nama Jalan', 'required');
        $valid->set_rules('kode_pos', 'Kode Pos', 'required');

        if( $valid->run() == FALSE ) {
            $this->load->view('pelanggan/layout/wrapper', $data);

        } else {
            $this->User_model->editProfil($this->session->userdata('id_user'));
            $this->session->set_flashdata('sukses', 'Data Profil Telah Dilengkapi');
            redirect(base_url('profil_pelanggan/profil'));
        }
        
        $this->load->view('pelanggan/layout/wrapper', $data, FALSE);
    }

}

/* End of file Profil.php */
