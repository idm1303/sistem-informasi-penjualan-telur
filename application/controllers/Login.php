<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->library('Simple_login');
    // }

    // Halaman Login
    public function index()
    {
        // validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() ) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // proses ke simple login
            $this->auth->login($username, $password);
        }

        $data = array('title' => 'LOGIN');
        $this->load->view('login/list', $data, FALSE);
    }

    // fungsi logout
    public function logout()
    {
        // ambil fungsi logout dari library simle_login
        $this->auth->logout();
    }


}