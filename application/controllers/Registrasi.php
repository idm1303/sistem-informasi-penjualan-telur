<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    // load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        

    }
    
    // halaman registrasi
    public function index()
    {

        $data = array (
            'title'     => 'Registrasi',
            'isi'       => 'register/form_reg/list'
        );

        
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]');
        $valid->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
        $valid->set_rules('level', 'Daftar Sebagai', 'required');

        if( $valid->run() == FALSE ) {
            $this->load->view('layout/wrapper', $data, FALSE);

        } else {
            $this->User_model->addKonfirmUser();
            $this->session->set_flashdata('sukses', 'Registrasi Berhasil!');
            redirect(base_url('registrasi/info'));
        }
        

    }

    public function info()
    {
        $data = array (
            'title'     => 'Sukses',
            'isi'       => 'register/form_reg/info'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function login()
    {
    
        $data = array (
            'title'     => 'Login',
            'isi'       => 'register/form_log/list'
        );

        $this->load->view('layout/wrapper', $data, FALSE);

        if ($_POST) {
             // validasi
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if( $this->form_validation->run() ) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // proses ke simple login
                $this->auth_2->login($username, $password);
            }

            $data = array (
                'title'     => 'Login',
                'isi'       => 'register/form_log/list'
            );
    
            $this->load->view('layout/wrapper', $data, FALSE);
        }
        
    
    }

    // fungsi logout
    public function logout()
    {
        // ambil fungsi logout dari library simle_login
        $this->auth_2->logout();
    }
}