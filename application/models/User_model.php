<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Selecting data Users form database
    public function getUsers()
    {
        return $this->db->get('users')->result_array();
    }

    // Selecting data Konfirm_Users form database
    public function getKonfirmUsers()
    {
        return $this->db->get('konfirm_users')->result_array();
    }

    // get user dengan id
    public function getUserById($id_user)
    {
        return $this->db->get_where('users', ['id_user' => $id_user])->row_array();
    }

    // get profil dengan id
    public function getProfilById($id_user)
    {
        return $this->db->get_where('profil_pelanggan', ['id_user' => $id_user])->result_array();
    }

    // get profil lengkap dengan id 
    public function getProfilLengkapById($id_user)
    {
        $this->db->select('profil_pelanggan.*, daftar_kota.nama_kota');
        $this->db->from('profil_pelanggan');
        $this->db->where('profil_pelanggan.id_user', $id_user);
        $this->db->join('daftar_kota', 'daftar_kota.id_kota = profil_pelanggan.kab_kota', 'left');
    
        $query = $this->db->get();
        return $query->result_array();
    }

    // get user dengan id
    public function getUsersByLevel()
    {
        return $this->db->get_where('users', ['akses_level' => 'Peternak'])->result_array();
    }

    // get user dengan id produk
    public function getUserByIdProduk($id_produk)
    {
        $this->db->select('id_user');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
    
        $query = $this->db->get();
        return $query->result_array();
    }

    // get user peternak
    public function getUserPeternak()
    {
        return $this->db->get_where('users',['akses_level' => 'Peternak'])->result_array();
    }

    // login user
    public function login($username, $password)
    {
        return $this->db->get_where('users', ['username' => $username, 'password' => SHA1($password)])->row_array();
    }

    public function addUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "akses_level" => $this->input->post('akses_level', true)
        ];

        if ( $this->input->post('akses_level') == 'Pelanggan' ) {
            $this->db->insert('users', $data);

            $email = $this->input->post('email', true);
            $user = $this->db->select('id_user')->from('users')->where('email', $email)->get()->row();

            $data2 = [
                "id_user" => $user->id_user,
                "nama_lengkap"  => $this->input->post('nama', true),
                "email" => $this->input->post('email', true)
            ];
            $this->db->insert('profil_pelanggan', $data2);
        } else {
            $this->db->insert('users', $data);
        }
        
    }

    public function addKonfirmUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "username" => $this->input->post('username', true),
            "password" => SHA1($this->input->post('password', true)),
            "status" => $this->input->post('status', true),
            "akses_level" => $this->input->post('level', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->insert('Konfirm_users', $data);
    }

    public function editUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "username" => $this->input->post('username', true),
            "password" => SHA1($this->input->post('password', true)),
            "akses_level" => $this->input->post('akses_level', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('users', $data);
    }

    public function editProfil($id_user)
    {
        $data = [
            "nama_lengkap" => $this->input->post('nama_lengkap', true),
            "email" => $this->input->post('email', true),
            "telepon" => $this->input->post('telepon', true),
            "kab_kota" => $this->input->post('kab_kota', true),
            "kecamatan" => $this->input->post('kecamatan', true),
            "kel_desa" => $this->input->post('kel_desa', true),
            "nama_jalan" => $this->input->post('nama_jalan', true),
            "kode_pos" => $this->input->post('kode_pos', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_user', $id_user);
        $this->db->update('profil_pelanggan', $data);
    }

    public function deleteUser($id_user)
    {
        $this->db->delete('users', ['id_user' => $id_user]);
    }

    public function deleteKonfirmUser($id_user)
    {
        $this->db->delete('konfirm_users', ['id_user' => $id_user]);
    }

}