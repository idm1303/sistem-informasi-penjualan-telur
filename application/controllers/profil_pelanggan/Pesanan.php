<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi halaman
        $this->auth_2->cek_login();
        $this->load->model('Pelanggan_model');
        
    }

    public function index()
    {
        $pesanan = $this->Pelanggan_model->getAllTransaksiByIdUserPelanggan($this->session->userdata('id_user'));
        // echo "<pre>";
        // print_r($pesanan);exit;
        $data = array(  
            'title'     =>      'Daftar Produk Yang Dipesan',
            'pesanan'   =>      $pesanan,
            'isi'       =>      'pelanggan/pesanan/list' 
        );
        
        $this->load->view('pelanggan/layout/wrapper', $data, FALSE);
    }

    // pesanan diterima
    public function diterima($kode_transaksi)
    {
        $this->Pelanggan_model->konfirmasiPesanan($kode_transaksi);
        $this->session->set_flashdata('sukses', 'Anda Telah Mengonfirmasi Pesanan Yang Telah Diterima.');
        redirect(base_url('profil_pelanggan/pesanan'), 'refresh');
    }

    public function delete($id_pelanggan)
    {
        $this->Pelanggan_model->deletePelanggan($id_pelanggan);
        $this->session->set_flashdata('sukses', 'Pesanan Telah Dihapus');
        redirect(base_url('profil_pelanggan/pesanan'), 'refresh');
    }

    // cetak info
    public function cetak($kd_ternak)
    {
        $info_ternak = $this->Pelanggan_model->getInfoTernak($kd_ternak);
        // echo "<pre>";
        // print_r($info_ternak);exit;
        $data = array(  
            'title'         =>      'Daftar Produk Yang Dipesan',
            'info'          =>      $info_ternak[0]
        );

        $this->load->view('pelanggan/pesanan/cetak', $data, FALSE);
    }

}

/* End of file Pesanan.php */
