<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    // Selecting data Pelanggans form database
    public function getPelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    // Selecting data Kota form database
    public function getKota()
    {
        return $this->db->get('daftar_kota')->result_array();
    }

    // get pelanggan dengan id
    public function getPelangganById($id_pelanggan)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
    }

    // get pelanggan dengan invoice
    public function getPelangganByInvoice($no_invoice)
    {
        return $this->db->get_where('pelanggan', ['no_invoice' => $no_invoice])->row_array();
    }

    // get pelanggan dengan email
    public function getIdPelangganByInvoice($no_invoice)
    {
        // return $this->db->get_where('pelanggan', ['email' => $email])->row_array();
        $this->db->select('id_pelanggan');
        $this->db->from('pelanggan');
        $this->db->where('no_invoice', $no_invoice);
        
        $query = $this->db->get();
        return $query->row_array();
    }

    // get pelanggan dengan email
    public function getIdPelangganByEmail($email)
    {
        // return $this->db->get_where('pelanggan', ['email' => $email])->row_array();
        $this->db->select('id_pelanggan');
        $this->db->from('pelanggan');
        $this->db->where('email', $email);
        
        $query = $this->db->get();
        return $query->row_array();
    }

    // get kota dengan id
    public function getKotaById($id_kota)
    {
        return $this->db->get_where('daftar_kota', ['id_kota' => $id_kota])->row_array();
    }

    public function getKodeTrans($id_pelanggan)
    {
        return $this->db->select('kode_transaksi')->from('konfirm_transaksi')->where('id_pelanggan', $id_pelanggan)->get()->row();
        
    }

    // detail pelanggan
    public function read($slug_pelanggan)
    {
    
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('slug_pelanggan', $slug_pelanggan);
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
    
    }

    // ambil data pesanan yang belum dikonfirmasi
    public function getKonfirmPesananByIdUser($id_user)
    {
        $this->db->select('konfirm_transaksi.*,struk.gambar,struk.tanggal_upload,pelanggan.status_pelanggan,pelanggan.nama_pelanggan,produk.nama_produk');
        $this->db->from('konfirm_transaksi');
        // JOIN
        $this->db->join('produk', 'konfirm_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('pelanggan', 'konfirm_transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('struk', 'konfirm_transaksi.kode_transaksi = struk.kode_transaksi', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('id_pemilik', $id_user);
        $this->db->where('konfirm_transaksi.status_pelanggan', 'Pending');
        $this->db->order_by('struk.tanggal_upload', 'asc');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil data pesanan yang sudah dikonfirmasi
    public function getTransaksiByIdUser($id_user)
    {
        $this->db->select('transaksi.*,pelanggan.nama_pelanggan,pelanggan.email,pelanggan.telepon,pelanggan.alamat,pelanggan.catatan,produk.nama_produk,konfirm_transaksi.harga,konfirm_transaksi.jumlah,konfirm_transaksi.total_harga,konfirm_transaksi.pengiriman,konfirm_transaksi.total_bayar');
        $this->db->from('transaksi');
        // JOIN
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('konfirm_transaksi', 'transaksi.kode_transaksi = konfirm_transaksi.kode_transaksi', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('transaksi.id_pemilik', $id_user);
        $this->db->where('status_pesanan', 'Sedang diproses');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil data pesanan yang sudah dikonfirmasi
    public function getDetailTransaksi($id_transaksi)
    {
        $this->db->select('transaksi.*,struk.gambar,pelanggan.status_pelanggan,pelanggan.nama_pelanggan,pelanggan.email,pelanggan.telepon,pelanggan.alamat,pelanggan.catatan,produk.nama_produk,konfirm_transaksi.harga,konfirm_transaksi.jumlah,konfirm_transaksi.total_harga,konfirm_transaksi.pengiriman,konfirm_transaksi.total_bayar');
        $this->db->from('transaksi');
        // JOIN
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('konfirm_transaksi', 'transaksi.kode_transaksi = konfirm_transaksi.kode_transaksi', 'left');
        $this->db->join('struk', 'transaksi.kode_transaksi = struk.kode_transaksi', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // ambil data pesanan yang sudah dikonfirmasi
    public function getAllTransaksiByIdUser($id_user)
    {
        $this->db->select('transaksi.*,pelanggan.nama_pelanggan,pelanggan.email,pelanggan.telepon,pelanggan.alamat,pelanggan.catatan,produk.nama_produk,konfirm_transaksi.harga,konfirm_transaksi.jumlah,konfirm_transaksi.total_harga,konfirm_transaksi.pengiriman,konfirm_transaksi.total_bayar');
        $this->db->from('transaksi');
        // JOIN
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('konfirm_transaksi', 'transaksi.kode_transaksi = konfirm_transaksi.kode_transaksi', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('transaksi.id_pemilik', $id_user);
        $this->db->where('status_pesanan', 'Telah diterima');
        $this->db->order_by('transaksi.tanggal_update', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil data pesanan yang sudah dikonfirmasi
    public function getAllTransaksiByIdUserPelanggan($id_user)
    {
        $this->db->select('konfirm_transaksi.*, ternak.kd_ternak, ternak.telepon, ternak.alamat, ternak.nama_peternakan, rekening.nama_bank, rekening.no_rek, produk.nama_produk, produk.gambar, struk.kode_transaksi, transaksi.status_pesanan');
        $this->db->from('konfirm_transaksi');
        // JOIN
        $this->db->join('produk', 'konfirm_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('ternak', 'konfirm_transaksi.id_pemilik = ternak.id_user', 'left');
        $this->db->join('struk', 'konfirm_transaksi.kode_transaksi = struk.kode_transaksi', 'left');
        $this->db->join('transaksi', 'konfirm_transaksi.kode_transaksi = transaksi.kode_transaksi', 'left');
        $this->db->join('rekening', 'ternak.kd_ternak = rekening.kd_ternak', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('konfirm_transaksi.id_user', $id_user);
        $this->db->order_by('konfirm_transaksi.id_pelanggan', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil data pesanan yang sudah dikonfirmasi
    public function getTransaksiByTanggal($id_user, $tanggal)
    {
        $this->db->select('transaksi.*,pelanggan.nama_pelanggan,pelanggan.email,pelanggan.telepon,pelanggan.alamat,pelanggan.catatan,produk.nama_produk,konfirm_transaksi.harga,konfirm_transaksi.jumlah,konfirm_transaksi.total_harga,konfirm_transaksi.pengiriman,konfirm_transaksi.total_bayar');
        $this->db->from('transaksi');
        // JOIN
        $this->db->join('produk', 'transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('konfirm_transaksi', 'transaksi.kode_transaksi = konfirm_transaksi.kode_transaksi', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('transaksi.id_pemilik', $id_user);
        $this->db->where('status_pesanan', 'Telah diterima');
        $this->db->where('transaksi.tanggal_transaksi', $tanggal);
        $this->db->order_by('transaksi.tanggal_update', 'desc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // ambil data pesanan yang sudah dikonfirmasi
    public function getTransaksiByTahun($id_user, $tahun)
    {
        $query = $this->db->query("SELECT
        transaksi.id_pelanggan,
        transaksi.id_pemilik,
        transaksi.kode_transaksi,
        transaksi.id_produk,
        transaksi.jumlah,
        transaksi.id_transaksi,
        transaksi.status_pesanan,
        transaksi.tanggal_transaksi,
        transaksi.tanggal_update,
        pelanggan.nama_pelanggan,
        pelanggan.email,
        pelanggan.telepon,
        pelanggan.alamat,
        pelanggan.catatan,
        produk.nama_produk,
        konfirm_transaksi.harga,
        konfirm_transaksi.jumlah,
        konfirm_transaksi.total_harga,
        konfirm_transaksi.pengiriman,
        konfirm_transaksi.total_bayar
        FROM
        transaksi
        LEFT JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
        LEFT JOIN produk ON transaksi.id_produk = produk.id_produk
        LEFT JOIN konfirm_transaksi ON konfirm_transaksi.id_pelanggan = pelanggan.id_pelanggan
        WHERE
        transaksi.id_pemilik = $id_user AND
        transaksi.status_pesanan = 'Telah diterima' AND
        YEAR(transaksi.tanggal_transaksi) = $tahun
        ORDER BY
        transaksi.tanggal_update DESC
        ");
        return $query->result_array();
    }

    // ambil data pesanan yang sudah dikonfirmasi
    public function getTransaksiByBulan($id_user, $bulan, $tahun)
    {
        $query = $this->db->query("SELECT
        transaksi.id_pelanggan,
        transaksi.id_pemilik,
        transaksi.kode_transaksi,
        transaksi.id_produk,
        transaksi.jumlah,
        transaksi.id_transaksi,
        transaksi.status_pesanan,
        transaksi.tanggal_transaksi,
        transaksi.tanggal_update,
        pelanggan.nama_pelanggan,
        pelanggan.email,
        pelanggan.telepon,
        pelanggan.alamat,
        pelanggan.catatan,
        produk.nama_produk,
        konfirm_transaksi.harga,
        konfirm_transaksi.jumlah,
        konfirm_transaksi.total_harga,
        konfirm_transaksi.pengiriman,
        konfirm_transaksi.total_bayar
        FROM
        transaksi
        LEFT JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
        LEFT JOIN produk ON transaksi.id_produk = produk.id_produk
        LEFT JOIN konfirm_transaksi ON konfirm_transaksi.id_pelanggan = pelanggan.id_pelanggan
        WHERE
        transaksi.id_pemilik = $id_user AND
        transaksi.status_pesanan = 'Telah diterima' AND
        MONTH(transaksi.tanggal_transaksi) = $bulan AND
        YEAR(transaksi.tanggal_transaksi) = $tahun 
        ORDER BY
        transaksi.tanggal_update DESC
        ");
        return $query->result_array();
    }

    // get info rekening ternak
    public function getInfoTernak($kd_ternak)
    {
        $this->db->select('ternak.nama_peternakan, ternak.telepon, ternak.alamat, rekening.nama_bank, rekening.no_rek, users.nama');
        $this->db->from('ternak');
        // JOIN
        $this->db->join('rekening', 'ternak.kd_ternak = rekening.kd_ternak', 'left');
        $this->db->join('users', 'ternak.id_user = users.id_user', 'left');
        // END JOIN
        // $this->db->group_by('produk.id_produk');
        $this->db->where('ternak.kd_ternak', $kd_ternak);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addPelanggan($data)
    {
        $kota = $this->Pelanggan_model->getKotaById($data['kabkota']);
        $alamat = 'Kota '.$kota['nama_kota'].', Kecamatan '.$data['kecamatan'].', Kelurahan/desa '.$data['keldesa'].', '.$data['alamat'].', Kodepos '.$data['kodepos'];
        
        $data = array (
            'id_user'           =>  $data['id_user'],
            'no_invoice'        =>  $data['no_invoice'],
            'status_pelanggan'  =>  'Pending',
            'nama_pelanggan'    =>  $data['nama_pelanggan'],
            'email'             =>  $data['email'],
            'telepon'           =>  $data['telepon'],
            'alamat'            =>  $alamat,
            'catatan'           =>  $data['catatan'],
            'tanggal_pemesanan' =>  date('Y-m-d H:i:s')
        );

        $this->db->insert('pelanggan', $data);
    }

    public function ubahStatus($data)
    {
        $this->db->set('status_pelanggan', $data['status']);
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan');

        $this->db->set('status_pelanggan', $data['status']);
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('konfirm_transaksi');
    }

    public function ubahStatusTransaksi($data)
    {
        $this->db->set('status_pesanan', $data['status']);
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi');
    }

    public function addTransaksi($data)
    {   
        // echo $data['tanggal_upload'];exit;
        $data = array (
            'id_pelanggan'      =>  $data['id_pelanggan'],
            'kode_transaksi'    =>  $data['kode_transaksi'],
            'id_pemilik'        =>  $data['id_pemilik'],
            'id_produk'         =>  $data['id_produk'],
            'jumlah'            =>  $data['jumlah'],
            'status_pesanan'    =>  'Sedang diproses',
            'tanggal_transaksi' =>  $data['tanggal_upload']
        );

        $this->db->insert('transaksi', $data);
    }

    // tambah ke daftar transaksi yang belum dikonfirmasi
    public function addKonfirmTransaksi($data)
    {
        $kode_transaksi = 'FK'.$data['no_invoice'];
        // var_dump($data);exit;
        $data['id_pelanggan'] = $this->Pelanggan_model->getIdPelangganByInvoice($data['no_invoice']);
        
        $data = array (
            'id_pelanggan'      =>  $data['id_pelanggan']['id_pelanggan'],
            'id_user'           =>  $data['id_user'],
            'status_pelanggan'  =>  'Pending',
            'kode_transaksi'    =>  $kode_transaksi,
            'id_produk'         =>  $data['id'],
            'id_pemilik'        =>  $data['id_pemilik'],
            'harga'             =>  $data['price'],
            'jumlah'            =>  $data['qty'],
            'total_harga'       =>  $data['subtotal'],
            'pengiriman'        =>  $data['ongkir1'],
            'total_bayar'       =>  $data['totalBayar1'],
            'tanggal_transaksi' =>  date('Y-m-d H:i:s')
        );

        $this->db->insert('konfirm_transaksi', $data);
    }

    // konfirmasi pesanan
    public function konfirmasiPesanan($kode_transaksi)
    {
        $this->db->set('status_pesanan', 'Telah diterima');
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('transaksi');
    }

    public function editPelanggan()
    {
        $slug_pelanggan = url_title($this->input->post('nama_pelanggan'), 'dash', true);
        $data = [
            "slug_pelanggan" => $slug_pelanggan,
            "nama_pelanggan" => $this->input->post('nama_pelanggan', true),
            "urutan" => $this->input->post('urutan', true)
        ];

        // encrypt password
        // $data['password'] = $this->encrypt->encode($data['password']);

        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('pelanggan', $data);
    }

    public function deletePelanggan($id_pelanggan)
    {
        $this->db->delete('pelanggan', ['id_pelanggan' => $id_pelanggan]);
    }

    public function deleteKonfirmasi($id_konfirm)
    {
        $this->db->delete('konfirm_transaksi', ['id_konfirm' => $id_konfirm]);
    }

    public function deleteRiwayatTransaksi($id_transaksi)
    {
        $this->db->delete('transaksi', ['id_transaksi' => $id_transaksi]);
    }

    public function login($email,$password)
    {
    
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
            'email'     => $email,
            'password'  => SHA1($password)
        ));
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
        
    
    }

    // pelanggan sudah login
    public function sudahLogin($email, $nama_pelanggan)
    {
    
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('email', $email);
        $this->db->where('nama_pelanggan', $nama_pelanggan);
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->row();
        
    
    }

    // invoice maker
    function get_no_invoice(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_invoice,4)) AS kd_max FROM pelanggan WHERE DATE(tanggal_invoice)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }
    // end invoice maker

    public function addStruk()
    {
        // var_dump($this->input->post('kode_transaksi')); exit;
        $upload_gambar = ["upload_data" => $this->upload->data()];
        // var_dump($upload_gambar); exit; 
        // create thumbnail gambar
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/bukti_pembayaran/'.$upload_gambar['upload_data']['file_name'];
        // lokasi folder thumbnail
        $config['new_image']        = './assets/upload/image/bukti_pembayaran/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 75;
        $config['height']           = 50;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        // end create thumbnail

        $data = [
            "kode_transaksi"    => $this->input->post('kode_transaksi'),
            "gambar"            => $upload_gambar['upload_data']['file_name']
        ];

        $this->db->insert('struk', $data);

        
    }
}