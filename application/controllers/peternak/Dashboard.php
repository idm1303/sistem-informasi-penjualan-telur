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
        $id_user = $this->session->userdata('id_user');
        $data['ternak'] = $this->Ternak_model->getTernak($id_user);

        $data = array(  'title'     =>      'Halaman Peternak',
                        'ternak'    =>      $data['ternak'],
                        'isi'       =>      'peternak/dashboard/list' );
        
        $this->load->view('peternak/layout/wrapper', $data, FALSE);
    }

}