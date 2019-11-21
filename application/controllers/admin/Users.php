<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // proteksi halaman
        $this->auth->cek_login();
    }

    // Halaman User
    public function index()
    {
        $data['user'] = $this->User_model->getUsers();

        $data = [
            "title" => 'Data Pengguna',
            "user"  => $data['user'],
            "isi"   => 'admin/user/list'
        ];

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {
        $data = [
            "title" => 'Tambah Data Pengguna',
            "user"  => $data['user'] = $this->User_model->getUsers(),
            "isi"   => 'admin/user/tambah'
        ];

        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]');
        $valid->set_rules('password', 'Password', 'required');

        if( $valid->run() == FALSE ) {
            $this->load->view('admin/layout/wrapper', $data);

        } else {
            $this->User_model->addUser();
            $this->session->set_flashdata('sukses', 'Pengguna Telah Ditambahkan');
            redirect(base_url('admin/users'));
        }

    }

    public function konfirm()
    {
        $data['user'] = $this->User_model->getKonfirmUsers();

        $data = [
            "title" => 'Data Konfirmasi Pengguna',
            "user"  => $data['user'],
            "isi"   => 'admin/user/konfirm'
        ];

        $this->load->view('admin/layout/wrapper', $data);
    }

    public function konfirm_user($id_user)
    {
        
        if ($_POST['status'] == "Konfirmasi") {
            $this->User_model->addUser();
            $this->User_model->deleteKonfirmUser($id_user);
            $this->session->set_flashdata('sukses', 'Pengguna Telah Dikonfirmasi');
            redirect(base_url('admin/users/konfirm'));
        } else {
            $this->session->set_flashdata('warning', 'Status Pengguna Belum Diganti');
            redirect(base_url('admin/users/konfirm'));
        }
        
    }

    public function edit($id_user)
    {
        $data['user'] = $this->User_model->getUserById($id_user);

        $data = [
            "title" => 'Ubah Data Pelanggan',
            "user"  => $data['user'],
            "isi"   => 'admin/user/edit'
        ];

        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]');
        $valid->set_rules('password', 'Password', 'required');

        if( $valid->run() == FALSE ) {
            $this->load->view('admin/layout/wrapper', $data);
            
        } else {
            $this->User_model->editUser();
            $this->session->set_flashdata('sukses', 'Data Pengguna Telah Diubah');
            redirect(base_url('admin/users'), 'refresh');
        }
    }

    public function delete($id_user)
    {
        $this->User_model->deleteUser($id_user);
        $this->session->set_flashdata('sukses', 'Pengguna Telah Dihapus');
        redirect(base_url('admin/users'), 'refresh');
    }

    public function delete_konfirm($id_user)
    {
        $this->User_model->deleteKonfirmUser($id_user);
        $this->session->set_flashdata('sukses', 'Pengguna Telah Dihapus');
        redirect(base_url('admin/users'), 'refresh');
    }

}