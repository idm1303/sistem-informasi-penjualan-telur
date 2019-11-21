<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ternak_model extends CI_Model {


    // Selecting data Ternak form database
    public function getTernak()
    {
        $this->db->select('ternak.*,users.nama');
        $this->db->from('ternak');
        // JOIN
        $this->db->join('users', 'users.id_user = ternak.id_user', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    // Selecting data Ternak by id form database
    public function getRekeningByIdUser($id_user)
    {
        $this->db->select('ternak.telepon,ternak.rekening');
        $this->db->from('ternak');
        $this->db->where('ternak.id_user', $id_user);
    
        $query = $this->db->get();
        return $query->result_array();
    }

    // get nama ternak
    public function getNamaTernak($id_user)
    {
        $this->db->select('ternak.nama_peternakan');
        $this->db->from('ternak');
        $this->db->where('ternak.id_user', $id_user);
    
        $query = $this->db->get();
        return $query->row_array();
    }

    // total peternakan
    public function totalPeternakan()
    {
    
        $this->db->select('COUNT(*) AS total');
        $this->db->from('ternak');
        // $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    
    }

    // selecting data for homepage trending produk
    public function ternak($limit,$start)
    { 
        $this->db->select('ternak.*,users.nama');
        $this->db->from('ternak');
        // JOIN
        $this->db->join('users', 'users.id_user = ternak.id_user', 'left');
        // $this->db->join('ternak', 'ternak.id_ternak = produk.id_ternak', 'left');
        // $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        // $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('ternak.id_ternak');
        $this->db->order_by('id_ternak', 'desc');
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


    // detail kategori
    public function read($slug_peternakan)
    {
    
        $this->db->select('ternak.*, rekening.*');
        $this->db->from('ternak');
        $this->db->join('rekening', 'ternak.kd_ternak = rekening.kd_ternak', 'left');
        $this->db->where('slug_peternakan', $slug_peternakan);
        $this->db->order_by('id_ternak', 'desc');
        $query = $this->db->get();
        return $query->row();
    
    }

    // get kode ternak
    public function getKodeTernak($id_ternak)
    {
        return $this->db->get_where('ternak', ['id_ternak' => $id_ternak])->row_array();
    }

    // get peternakan dengan id ternak
    public function getTernakById($id_ternak)
    {
        // return $this->db->get_where('ternak', ['id_ternak' => $id_ternak])->row_array();
        $this->db->select('ternak.*,rekening.*');
        $this->db->from('ternak');
        $this->db->join('rekening', 'ternak.kd_ternak = rekening.kd_ternak', 'left');
        $this->db->where('id_ternak', $id_ternak);
    
        $query = $this->db->get();
        return $query->row_array();
    }

    // get peternakan dengan id ternak
    public function getTernakByIdUser($id_user)
    {
        // return $this->db->get_where('ternak', ['id_ternak' => $id_ternak])->row_array();
        $this->db->select('ternak.*,rekening.*');
        $this->db->from('ternak');
        $this->db->join('rekening', 'ternak.kd_ternak = rekening.kd_ternak', 'left');
        $this->db->where('id_user', $id_user);
    
        $query = $this->db->get();
        return $query->row_array();
    }

    // get peternakan dengan id user
    // public function getTernakByIdUser($id_user)
    // {
    //     return $this->db->get_where('ternak', ['id_user' => $id_user])->row_array();
    // }

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

    public function addPeternakan()
    {
        $ternak = $this->Ternak_model->getTernak();
        // var_dump($ternak);exit;
        $upload_gambar = ["upload_data" => $this->upload->data()];
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

        $slug_peternakan = url_title($this->input->post('nama_peternakan'), 'dash', true);
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "kd_ternak" => $this->input->post('kd_ternak', true),
            "nama_peternakan" => $this->input->post('nama_peternakan', true),
            "slug_peternakan" => $slug_peternakan,
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true),
            "gambar" => $upload_gambar['upload_data']['file_name'],
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        $this->db->insert('ternak', $data);
    }

    public function addRekening()
    {
        $data = [
            "kd_rek" => $this->input->post('kd_rek', true),
            "kd_ternak" => $this->input->post('kd_ternak', true),
            "nama_bank" => $this->input->post('nama_bank', true),
            "no_rek" => $this->input->post('rekening', true)
        ];

        $this->db->insert('rekening', $data);
    }

    public function editRekening()
    {
        $data = [
            "kd_rek" => $this->input->post('kd_rek', true),
            "kd_ternak" => $this->input->post('kd_ternak', true),
            "nama_bank" => $this->input->post('nama_bank', true),
            "no_rek" => $this->input->post('rekening', true)
        ];

        $this->db->where('kd_rek', $this->input->post('kd_rek'));
        $this->db->update('rekening', $data);
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

    public function editPeternakan()
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

        $slug_peternakan = url_title($this->input->post('nama_peternakan'), 'dash', true);
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "kd_ternak" => $this->input->post('kd_ternak', true),
            "nama_peternakan" => $this->input->post('nama_peternakan', true),
            "slug_peternakan" => $slug_peternakan,
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true),
            "gambar" => $upload_gambar['upload_data']['file_name'],
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_ternak', $this->input->post('id_ternak'));
        $this->db->update('ternak', $data);
    }

    
    public function editPeternakanTanpaGambar()
    {
    
        $slug_peternakan = url_title($this->input->post('nama_peternakan'), 'dash', true);
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "kd_ternak" => $this->input->post('kd_ternak', true),
            "nama_peternakan" => $this->input->post('nama_peternakan', true),
            "slug_peternakan" => $slug_peternakan,
            "alamat" => $this->input->post('alamat', true),
            "telepon" => $this->input->post('telepon', true),
            // gambar tidak diedit
            // "gambar" => $upload_gambar['upload_data']['file_name'],
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_ternak', $this->input->post('id_ternak'));
        $this->db->update('ternak', $data);
    
    }

    public function deletePeternakan($id_ternak)
    {
        $this->db->delete('ternak', ['id_ternak' => $id_ternak]);
    }

    public function deleteGambar($id_gambar)
    {
        $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
    }

    public function kodeOtomatis()
    {
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

    }

}