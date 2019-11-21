<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    // Selecting data Kategoris form database
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    // get kategori dengan id
    public function getKategoriById($id_kategori)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
    }

    // detail kategori
    public function read($slug_kategori)
    {
    
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    
    }

    public function addKategori()
    {
        $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', true);
        $data = [
            "slug_kategori" => $slug_kategori,
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "urutan" => $this->input->post('urutan', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->insert('kategori', $data);
    }

    public function editKategori()
    {
        $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', true);
        $data = [
            "slug_kategori" => $slug_kategori,
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "urutan" => $this->input->post('urutan', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori', $data);
    }

    public function deleteKategori($id_kategori)
    {
        $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
    }

}