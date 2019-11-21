<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

    // load model
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');

        $this->auth_2->cek_login();
        
    }
    

    // halaman belanja
    public function index()
    {

        

    }

    // tambahkan ke keranjang belanja
    public function add()
    {
        // ambil data peternakan
        // $this->Produk_model->listingPeternakan();
        // ambil data produk dengan ternak yang sama
        // $id_ternak = $this->input->post('id_ternak');
        // $data_produk = $this->Produk_model->getProdukByIdTernak($id_ternak);
        // var_dump($data_produk);exit;
        // $this->Ternak_model->getTernakById($id_ternak);
        
        // destroy cart
        $this->cart->destroy();
        // ambil data produk dari home
        $id = $this->input->post('id_produk');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $redirect_page = $this->input->post('redirect_page');

        // set session id_produk
        $this->session->set_userdata('id_produk', $id);
        

        // proses memasukkan ke keranjang belanja
        $data = array(
            // 'id_ternak'     => $id_ternak,
            'id'            => $id,
            'qty'           => $qty,
            'price'         => $price,
            'name'          => $name
        );

        $this->cart->insert($data);
        // redirect page
        redirect($redirect_page,'refresh');
    
    }

    public function cart()
    {
        $keranjang  = $this->cart->contents();
        // $ternak = $this->Ternak_model->getTernakById($keranjang->id);
        $data = array (
                    'title'     =>  'Keranjang Belanja',
                    'keranjang' => $keranjang,
                    'isi'       =>  'belanja/list'
        );
    
        $this->load->view('layout/wrapper', $data, FALSE);
    
    }

    // update cart
    public function update_cart($rowid)
    {
        // jika ada data rowid
        if($rowid) {
            $data = array (
                'rowid'     => $rowid,
                'qty'       => $this->input->post('qty')
            );
            $this->cart->update($data);
            $this->session->set_flashdata('sukses', 'Data belanja telah diubah.');
            redirect(base_url('belanja/cart'), 'refresh');
        } else {
            // jika tdk ada rowid
            redirect(base_url('belanja/cart'), 'refresh');
        }
    }

    // public function reset()
    // {
    //     $keranjang  = $this->cart->contents();
        
    //     $data = array(
    //                 'title'     =>  'Keranjang Belanja',
    //                 'keranjang' => $keranjang,
    //                 'isi'       =>  'belanja/list'
    //     );
        
    //     $this->cart->destroy();
    //     $this->load->view('layout/wrapper', $data, FALSE);
    
    // }

    public function hapus($rowid = '')
    {
        if($rowid) {
            // hapus per item
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Data belanja telah dihapus.');
            redirect(base_url('belanja/cart'), 'refresh');

        } else {
            // hapus semua (reset)
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Daftar belanja telah dihapus.');
            redirect(base_url('belanja/cart'), 'refresh');

        }
    
    }

    public function checkoutlogin()
    {
    
        // cek pelanggan sdh login atau belum
        // jika belum harus login atau registrasi kemudian login dulu.
        // mengecek dengan session email

        // kondisi sdh login
        if( $this->session->userdata('email') ) {
            $email = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            
            $pelanggan = $this->Pelanggan_model->sudahLogin($email, $nama_pelanggan);

            $keranjang = $this->cart->contents();

            $data = array (
                'title'     =>  'Checkout',
                'keranjang' =>  $keranjang,
                'pelanggan' =>  $pelanggan,
                'isi'       =>  'belanja/checkout'
            );

            $this->load->view('layout/wrapper', $data, FALSE);

        } else {
            // kondisi belum login (harus login/regis)
            $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
            redirect(base_url('pelanggan/login'), 'refresh');

        }
    
    }

    public function checkout()
    {
        $x['invoice']=$this->Pelanggan_model->get_no_invoice();
        // echo $x['invoice'];exit;
        $kota = $this->Pelanggan_model->getKota();
        $keranjang = $this->cart->contents();
        $id_produk = $this->session->userdata('id_produk');
        $id_pemilik = $this->User_model->getUserByIdProduk($id_produk);
        $profil = $this->User_model->getProfilById($this->session->userdata('id_user'));
        
        $data = array (
            'title'     =>  'Checkout',
            'keranjang' =>  $keranjang,
            'id_pemilik'=>  $id_pemilik[0]['id_user'],
            'profil'    =>  $profil[0],
            'kota'      =>  $kota,
            'no_invoice'=>  $x['invoice'],
            'isi'       =>  'belanja/checkout'
        );
        
        $valid = $this->form_validation;
        $valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('telepon', 'No. Hp / telepon', 'required|numeric');
        $valid->set_rules('kabkota', 'Kota / kabupaten', 'numeric', 
                            array('numeric' => 'Silahkan pilih {field} yang dituju.')
        );
        $valid->set_rules('kecamatan', 'Kecamatan', 'required');
        $valid->set_rules('keldesa', 'Kelurahan / desa', 'required');
        $valid->set_rules('alamat', 'Alamat', 'required');
        $valid->set_rules('kodepos', 'Kode pos', 'required');
        

        if( $valid->run() == FALSE ) {
            $this->load->view('layout/wrapper', $data, FALSE);

        } else {
            // var_dump($_POST);exit;
            $this->Pelanggan_model->addPelanggan($_POST);
            $this->Pelanggan_model->addKonfirmTransaksi($_POST);
            
            $this->session->set_userdata($_POST);            
            
            $this->session->set_flashdata('sukses', 'Pesanan sedang diproses');
            $this->cart->destroy();
            redirect(base_url('belanja/konfirmasi'),'refresh');
            
        }

        

    }

    public function konfirmasi()
    {
        // var_dump($this->session->userdata('no_invoice')); exit;
        $kode_transaksi = 'FK'.$this->session->userdata('no_invoice');
        $id_produk = $this->session->userdata('id');
        $pemilik = $this->Produk_model->getProdukAndUserById($id_produk);
        $ternak = $this->Ternak_model->getTernakByIdUser($pemilik[0]['id_user']);

        $data = array (
            'title'         =>  'Konfirmasi Pesanan',
            'nama'          =>  $pemilik[0]['nama'],
            'nama_bank'     =>  $ternak['nama_bank'],
            'rekening'      =>  $ternak['no_rek'],
            'telepon'       =>  $ternak['telepon'],
            'kode_transaksi'=>  $kode_transaksi,
            'nama_produk'   =>  $pemilik[0]['nama_produk'],
            'qty'           =>  $this->session->userdata('qty'),
            'subtotal'      =>  $this->session->userdata('subtotal'),
            'pengiriman'    =>  $this->session->userdata('ongkir1'),
            'total_bayar'   =>  $this->session->userdata('totalBayar1'),        
            'isi'           =>  'belanja/konfirmasi'
        );
        

        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function konfirm_pembayaran($id_pelanggan)
    {
        // var_dump($_POST);exit;
        $kode_transaksi = $this->Pelanggan_model->getKodeTrans($id_pelanggan);
        // $kode_transaksi = 'FK'.$this->session->userdata('no_invoice');
        
        $valid = $this->form_validation;
        $valid->set_rules('kode_transaksi', 'Kode Transaksi', 'required|is_unique[struk.kode_transaksi]|exact_length[12]',
                array(  'is_unique'         =>  'Pesanan dengan {field} ini sudah dikonfirmasi sebelumnya.',
                        'exact_length'      =>  '{field} Anda Salah.'
                )
        );

        if( $valid->run() ) {

            
            $config['upload_path']   = './assets/upload/image/bukti_pembayaran';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('struk_pembayaran') ) {
                
                echo $this->upload->display_errors();
                // var_dump($this->upload->display_errors('', ''));
                // var_dump($_FILES);exit;
                $data = [
                    "title"             => 'Konfirmasi Pembayaran',
                    'kode_transaksi'    =>  $kode_transaksi,
                    "error"             => 'Gagal upload gambar, ukuran file terlalu besar.',
                    "isi"               => 'belanja/konfirmasi_pembayaran'
                ];

                $this->load->view('layout/wrapper', $data, FALSE);

            } else {
                
                // var_dump($this->input->post('kode_transaksi'));exit;
                $this->Pelanggan_model->addStruk();
                $this->session->set_flashdata('sukses', 'Ditambahkan');
                redirect(base_url('belanja/pemberitahuan'));
            }
        }

        $data = array (
                'title'             =>  'Konfirmasi Pembayaran',
                'kode_transaksi'    =>  $kode_transaksi,
                'isi'               =>  'belanja/konfirmasi_pembayaran'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function pemberitahuan()
    {
        
        $this->session->unset_userdata($_POST);

        $data = array (
                'title'             =>  'Konfirmasi Berhasil',
                'isi'               =>  'belanja/pemberitahuan'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function selesai()
    {
        
        $this->session->unset_userdata($_POST);
        
        redirect(base_url(),'refresh');
        
    }

}