<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    // Selecting data Produk form database
    public function getProduk()
    {
        $this->db->select('produk.*,users.nama');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Selecting data Produk and users form database
    public function getProdukAndUserById($id_produk)
    {
        $this->db->select('produk.*,users.nama');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->group_by('produk.id_produk');
        $this->db->where('id_produk', $id_produk);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // selecting data for homepage trending produk
    public function homeTrendingProduk()
    { 
        $this->db->select('produk.*,users.nama,ternak.nama_peternakan');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('ternak', 'ternak.id_ternak = produk.id_ternak', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'asc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();
    }

    // selecting data for homepage trending produk
    public function produk($limit,$start)
    { 
        $this->db->select('produk.*,users.nama,ternak.nama_peternakan');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('ternak', 'ternak.id_ternak = produk.id_ternak', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }

    // total produk
    public function totalProduk()
    {
    
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    
    }

    // selecting data for kategori
    public function kategori($id_kategori, $limit,$start)
    { 
        $this->db->select('produk.*,users.nama,kategori.nama_kategori,kategori.slug_kategori,COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }

    // selecting data for kategori
    public function peternakan($id_ternak, $limit,$start)
    { 
        $this->db->select('produk.*,users.nama,ternak.nama_peternakan,ternak.slug_peternakan');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('ternak', 'ternak.id_ternak = produk.id_ternak', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.id_ternak', $id_ternak);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }

    // total kategori produk
    public function totalKategori($id_kategori)
    {
    
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row();
    
    }

    // total peternakan 
    public function totalPeternakan($id_ternak)
    {
    
        $this->db->select('COUNT(*) AS total');
        $this->db->from('ternak');
        // $this->db->where('status_produk', 'Publish');
        $this->db->where('id_ternak', $id_ternak);
        $query = $this->db->get();
        return $query->row();
    
    }

    // selecting data for detail produk
    public function read($slug_produk)
    { 
        $this->db->select('produk.*,users.nama');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.slug_produk', $slug_produk);
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Selecting data Produk form database
    public function listingPeternakan()
    {
        $this->db->select('ternak.*,ternak.nama_peternakan,ternak.slug_peternakan');
        $this->db->from('produk');
        // JOIN
        // $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('ternak', 'ternak.id_ternak = produk.id_ternak', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->group_by('produk.id_ternak');
        $this->db->order_by('id_produk', 'desc');
    
        $query = $this->db->get();
        return $query->result_array();
    }

    // get produk dengan id
    public function getProdukById($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    }

    // get produk dengan id user
    public function getProdukByIdUser($id_user)
    {
        return $this->db->get_where('produk', ['id_user' => $id_user])->result_array();
    }

    // get produk dengan id user
    public function getProdukByIdTernak($id_ternak)
    {
        return $this->db->get_where('produk', ['id_ternak' => $id_ternak])->result_array();
    }

    // get gambar dengan id
    public function getGambarById($id_gambar)
    {
        return $this->db->get_where('gambar', ['id_gambar' => $id_gambar])->row_array();
    }

    // Gambar
    public function gambar($id_produk)
    {
    
        $this->db->select('*');
        $this->db->from('gambar');
        // JOIN
        // $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    
    }

    public function addProduk()
    {
        // var_dump($_POST); exit;
        $upload_gambar = ["upload_data" => $this->upload->data()];
        // var_dump($upload_gambar); exit; 
        // create thumbnail gambar
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
        // lokasi folder thumbnail
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 75;
        $config['height']           = 50;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        // end create thumbnail

        $slug_produk = url_title($this->input->post('nama_produk'),'dash', true);
        $data = [
            "id_user" => $this->session->userdata('id_user', true),
            "id_ternak" => $this->input->post('id_ternak', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            // "kode_produk" => $this->input->post('kode_produk', true),
            "slug_produk" => $slug_produk,
            // "keywords" => $this->input->post('keywords', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
            "gambar" => $upload_gambar['upload_data']['file_name'],
            "berat" => $this->input->post('berat', true),
            "keterangan" => $this->input->post('keterangan', true),
            // "ukuran" => $this->input->post('ukuran', true),
            "status_produk" => $this->input->post('status_produk', true),
            "tanggal_post" => date('Y-m-d H:i:s')
        ];

        $this->db->insert('produk', $data);
    }

    public function addGambar()
    {
        // var_dump($_POST); exit;
        $upload_gambar = ["upload_data" => $this->upload->data()];
        // var_dump($upload_gambar); exit; 
        // create thumbnail gambar
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
        // lokasi folder thumbnail
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 75;
        $config['height']           = 50;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        // end create thumbnail

        $data = [
            "id_produk" => $this->input->post('id_produk'),
            "judul_gambar" => $this->input->post('judul_gambar'),
            "gambar" => $upload_gambar['upload_data']['file_name']
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->insert('gambar', $data);

        
    }

    public function editProduk()
    {
        // var_dump($_POST); exit;
        $upload_gambar = ["upload_data" => $this->upload->data()];
        // var_dump($upload_gambar); exit; 
        // create thumbnail gambar
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
        // lokasi folder thumbnail
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 75;
        $config['height']           = 50;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        // end create thumbnail

        $slug_produk = $slug_produk = url_title($this->input->post('nama_produk'),'dash', true);
        $data = [
            "id_user" => $this->session->userdata('id_user', true),
            "id_ternak" => $this->input->post('id_ternak', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            // "kode_produk" => $this->input->post('kode_produk', true),
            "slug_produk" => $slug_produk,
            // "keywords" => $this->input->post('keywords', true),
            "harga" => $this->input->post('harga', true),
            // "stok" => $this->input->post('stok', true),
            "gambar" => $upload_gambar['upload_data']['file_name'],
            "berat" => $this->input->post('berat', true),
            "keterangan" => $this->input->post('keterangan', true),
            // "ukuran" => $this->input->post('ukuran', true),
            "status_produk" => $this->input->post('status_produk', true),
            "tanggal_post" => date('Y-m-d H:i:s')
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    }

    
    public function editProdukTanpaGambar()
    {
    
        $slug_produk = $slug_produk = url_title($this->input->post('nama_produk'),'dash', true);
        $data = [
            "id_user" => $this->session->userdata('id_user', true),
            "id_ternak" => $this->input->post('id_ternak', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            // "kode_produk" => $this->input->post('kode_produk', true),
            "slug_produk" => $slug_produk,
            // "keywords" => $this->input->post('keywords', true),
            "harga" => $this->input->post('harga', true),
            // "stok" => $this->input->post('stok', true),
            // gambar tidak diganti
            // "gambar" => $upload_gambar['upload_data']['file_name'],
            "berat" => $this->input->post('berat', true),
            "keterangan" => $this->input->post('keterangan', true),
            // "ukuran" => $this->input->post('ukuran', true),
            "status_produk" => $this->input->post('status_produk', true),
            "tanggal_post" => date('Y-m-d H:i:s')
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    
    }

    public function tambahStok($id, $hasil)
    {
        $this->db->set('stok', $hasil, FALSE);
        $this->db->where('id_produk', $id);
        $this->db->update('produk');
    }

    public function deleteProduk($id_produk)
    {
        $this->db->delete('produk', ['id_produk' => $id_produk]);
    }

    public function deleteGambar($id_gambar)
    {
        $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
    }

}