<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ternak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Produk_model');
        // $this->load->library('encrypt');
        
        // proteksi halaman
        $this->auth_2->cek_login();
    }

    // Halaman User
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $peternak = $this->Ternak_model->getTernakByIdUser($id_user);
        // $query = $this->db->get('Produk');
        // echo "<pre>";
        // print_r($peternak);exit;
        
        $data['ternak'] = $this->Ternak_model->getTernak($id_user);

        $data = [
            "title" => 'Data Peternakan',
            "ternak"  => $data['ternak'],
            "peternak" => $peternak,
            "isi"   => 'peternak/ternak/list'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }

    // Gambar
    // public function gambar($id_ternak)
    // {
    
    //     $ternak = $this->Ternak_model->getTernakById($id_ternak);
    //     $gambar = $this->Ternak_model->gambar($id_ternak);
        
    //     // validasi input
    //     $valid = $this->form_validation;
    //     $valid->set_rules('judul_gambar', 'Judul/Nama Gambar', 'required');
        

    //     if( $valid->run() ) {
    //         $config['upload_path']   = './assets/upload/image';
    //         $config['allowed_types']  = 'gif|jpg|png|jpeg';
    //         $config['max_size']      = 2048;
    //         $config['max_width']     = 2040;
    //         $config['max_height']    = 2040;
    
    //         $this->load->library('upload', $config);

    //         if( ! $this->upload->do_upload('gambar') ) {
    //             echo $this->upload->display_errors();
    //             // var_dump($this->upload->display_errors('', ''));
    //             // var_dump($_FILES);exit;
    //             $data = [
    //                 "title" => 'Tambah Gambar Ternak: '.$ternak['nama_ternak'],
    //                 "kategori" => $ternak,
    //                 "gambar" => $gambar,
    //                 "error" => $this->upload->display_errors(),
    //                 "isi"   => 'peternak/ternak/gambar'
    //             ];

    //         $this->load->view('peternak/layout/wrapper', $data);

    //     } else {
    //         $this->Produk_model->addGambar();
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect(base_url('peternak/Produk/gambar/'.$ternak['id_ternak']));
    //     }}

    //     $data = [
    //         "title" => 'Tambah Gambar Produk: '.$ternak['nama_ternak'],
    //         "ternak" => $ternak,
    //         "gambar" => $gambar,
    //         "isi"   => 'peternak/ternak/gambar'
    //     ];

    //     $this->load->view('peternak/layout/wrapper', $data);
    // }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');
        $peternak = $this->User_model->getUserPeternak();
        //pemberian kode id secara otomatis
        $this->db->select('id_ternak');
        $this->db->from('ternak');
        $query1 = $this->db->get();

        $this->db->select('kd_rek');
        $this->db->from('rekening');
        $query2 = $this->db->get();
        
        $dataternak = $query1->result_array();
        $jumlah_ternak = count($dataternak);
        if ($dataternak) {
            $nilaikode_trn = substr($jumlah_ternak[0], 1);
            $kode1 = (int) $nilaikode_trn;
            $kode1 = $jumlah_ternak + 1;
            $kode_ternak = "trk-".str_pad($kode1, 3, "0", STR_PAD_LEFT);
            
        } else {
            $kode_ternak = "trk-001";
            
        }

        $datarek = $query2->result_array();
        $jumlah_rek = count($datarek);
        if ($datarek) {
            $nilaikode_rek = substr($jumlah_rek[0], 1);
            $kode2 = (int) $nilaikode_rek;
            $kode2 = $jumlah_rek + 1;
            $kode_rek = "rek-".str_pad($kode2, 3, "0", STR_PAD_LEFT);
            
        } else {
            $kode_rek = "rek-001";
            
        }

        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('id_user', 'Pengguna', 'required|is_unique[ternak.id_user]',
                array('is_unique'   =>  '{field} Ini Sudah Memiliki Peternakan.')
        );
        $valid->set_rules('nama_peternakan', 'Nama Peternakan', 'required');
        // $valid->set_rules('kode_ternak', 'Kode Produk', 'required|is_unique[ternak.kode_ternak]');
        $valid->set_rules('alamat', 'Alamat Peternakan', 'required');
        $valid->set_rules('telepon', 'Nomor Telepon', 'required|numeric');
        $valid->set_rules('rekening', 'Nomor Rekening', 'required|numeric');

        if( $valid->run() ) {
            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('gambar') ) {
                echo $this->upload->display_errors();
                // var_dump($this->upload->display_errors('', ''));
                // var_dump($_FILES);exit;
                $data = [
                    "title" => 'Tambah Peternakan',
                    "peternak" => $peternak,
                    'kode_ternak' => $kode_ternak,
                    'kode_rek' => $kode_rek,
                    "error" => $this->upload->display_errors(),
                    "isi"   => 'peternak/ternak/tambah'
                ];
                
                $this->load->view('peternak/layout/wrapper', $data);

            } else {
                
                $this->Ternak_model->addPeternakan();
                $this->Ternak_model->addRekening();
                $this->session->set_flashdata('sukses', 'Peternakan Baru Ditambahkan');
                redirect(base_url('peternak/ternak'));
            }}

        $data = [
            "title" => 'Tambah Peternakan',
            "id_user" => $id_user,
            "peternak" => $peternak,
            'kode_ternak' => $kode_ternak,
            'kode_rek' => $kode_rek,
            "isi"   => 'peternak/ternak/tambah'
        ];

        $this->load->view('peternak/layout/wrapper', $data);

    }

    public function edit($id_ternak)
    {
        // ambil data ternak yg akan diedit
        $ternak = $this->Ternak_model->getTernakById($id_ternak);
        // echo "<pre>";
        // print_r($ternak);exit;
        
        //pemberian kode id secara otomatis
        $this->db->select('id_ternak');
        $this->db->from('ternak');
        $query1 = $this->db->get();

        $this->db->select('kd_rek');
        $this->db->from('rekening');
        $query2 = $this->db->get();
        
        $dataternak = $query1->result_array();
        $jumlah_ternak = count($dataternak);
        if ($dataternak) {
            $nilaikode_trn = substr($jumlah_ternak[0], 1);
            $kode1 = (int) $nilaikode_trn;
            $kode1 = $jumlah_ternak + 1;
            $kode_ternak = "trk-".str_pad($kode1, 3, "0", STR_PAD_LEFT);
            
        } else {
            $kode_ternak = "trk-001";
            
        }
        // var_dump($ternak);exit;
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('nama_peternakan', 'Nama Peternakan', 'required');
        // $valid->set_rules('kode_ternak', 'Kode Produk', 'required|is_unique[ternak.kode_ternak]');
        $valid->set_rules('alamat', 'Alamat Peternakan', 'required');
        $valid->set_rules('telepon', 'Nomor Telepon', 'required|numeric');
        $valid->set_rules('rekening', 'Nomor Rekening', 'required|numeric');

        if( $valid->run() ) {
            // cek jika gambar diganti
            if( !empty($_FILES['gambar']['name']) ) {

            $config['upload_path']   = './assets/upload/image';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['max_width']     = 2040;
            $config['max_height']    = 2040;
    
            $this->load->library('upload', $config);

                if( ! $this->upload->do_upload('gambar') ) {
                    echo $this->upload->display_errors();
                    // var_dump($this->upload->display_errors('', ''));
                    // var_dump($_FILES);exit;
                    $data = [
                        "title" => 'Ubah Peternakan : '.$ternak['nama_peternakan'],
                        "ternak" => $ternak,
                        "error" => $this->upload->display_errors(),
                        "isi"   => 'peternak/ternak/edit'
                    ];

                $this->load->view('peternak/layout/wrapper', $data);

                } else {
                
                $this->Ternak_model->editPeternakan();
                $this->Ternak_model->editRekening();
                $this->session->set_flashdata('sukses', 'Data Peternakan Telah Diedit');
                redirect(base_url('peternak/ternak'));
                }

            } else {
                // echo "upload tanpa gambar jalan"; exit;
            // edit ternak tanpa ganti gambar
            $this->Ternak_model->editPeternakanTanpaGambar();
            $this->Ternak_model->editRekening();
            $this->session->set_flashdata('sukses', 'Data Peternakan Telah Diedit');
            redirect(base_url('peternak/ternak'));
        }}

        $data = [
            "title" => 'Ubah Peternakan: ' .$ternak['nama_peternakan'],
            "ternak" => $ternak,
            "isi"   => 'peternak/ternak/edit'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }
    
    public function delete($id_ternak)
    {
        // proses hapus gambar
        $ternak = $this->Ternak_model->getTernakById($id_ternak);
        unlink('./assets/upload/image/'.$ternak['gambar']);
        unlink('./assets/upload/image/thumbs/'.$ternak['gambar']);
        // end proses hapus
        $this->Ternak_model->deletePeternakan($id_ternak);
        $this->session->set_flashdata('sukses', 'Peternakan Telah Dihapus');
        redirect(base_url('peternak/ternak'), 'refresh');
    }

    public function delete_gambar($id_ternak, $id_gambar)
    {
        // proses hapus gambar
        $gambar = $this->Produk_model->getGambarById($id_gambar);
        unlink('./assets/upload/image/'.$gambar['gambar']);
        unlink('./assets/upload/image/thumbs/'.$gambar['gambar']);
        // end proses hapus
        $this->Produk_model->deleteGambar($id_gambar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('peternak/Produk/gambar/'.$id_ternak), 'refresh');
    }

}