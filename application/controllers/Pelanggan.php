<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    // load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        

    }

    public function index()
    {
    
    
    }
    
    // halaman registrasi
    public function registrasi()
    {
        $valid = $this->form_validation;
        $valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required');
        $valid->set_rules('email', 'Alamat email', 'required|valid_email|is_unique[pelanggan.email]');
        // $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('confirmPassword', 'Konfirmasi password', 'required|matches[password]');

        if( $valid->run() == FALSE ) {

            $data = array (
                'title'     => 'Registrasi Pelanggan',
                'isi'       => 'pelanggan/registrasi/list'
            );

            $this->load->view('layout/wrapper', $data, FALSE);

        } else {

            $data = array (
                'status_pelanggan'      =>  'Pending',    
                'nama_pelanggan'        =>  $this->input->post('nama_pelanggan'),
                'email'                 =>  $this->input->post('email'),
                'password'              =>  SHA1($this->input->post('password')),
                'telepon'               =>  $this->input->post('telepon'),
                'alamat'                =>  $this->input->post('alamat'),
                'tanggal_daftar'        =>  date('Y-m-d H:i:s')
                
            );

            $this->Pelanggan_model->addPelanggan($data);
            // create session login pelanggan
            
            $this->session->set_userdata('email', $this->input->post('email'));
            $this->session->set_userdata('nama_pelanggan', $this->input->post('nama_pelanggan'));
            
            // end create session
            $this->session->set_flashdata('sukses', 'Registrasi berhasil.');
            redirect(base_url('pelanggan/sukses'), 'refresh');
        }

    }

    // sukses regis
    public function sukses()
    {
    
        $data = array (
            'title'     => 'Registrasi berhasil.',
            'isi'       => 'pelanggan/registrasi/sukses'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
        
    
    }

    // halaman login
    public function login()
    {
    
        $data = array (
            'title'     => 'Login Pelanggan',
            'isi'       => 'pelanggan/login/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    
    }
}