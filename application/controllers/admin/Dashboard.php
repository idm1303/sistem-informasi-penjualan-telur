<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth->cek_login();
    }

    // Halaman utama Dashboard
    public function index()
    {
        $data = array(  'title'     =>      'Halaman Administrator',
                        'isi'       =>      'admin/dashboard/list' );
        
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

}