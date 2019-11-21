<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth_2->cek_login();
    }

    // Halaman utama Dashboard
    public function index()
    {
        $data = array(  'title'     =>      'Halaman Pelanggan',
                        'isi'       =>      'pelanggan/dashboard/list' );
        
        $this->load->view('pelanggan/layout/wrapper', $data, FALSE);
    }

}