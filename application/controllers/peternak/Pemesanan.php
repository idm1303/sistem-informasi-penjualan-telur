<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        // $this->load->library('encrypt');
        
        // proteksi halaman
        $this->auth_2->cek_login();
        $this->load->helper('date');
    }

    public function index()
    {
        # code...
    }

    public function transaksi()
    {

        $id_user = $this->session->userdata('id_user');
        // echo $id_user;exit;
        // $query = $this->db->get('Produk');
        $transaksi = $this->Pelanggan_model->getTransaksiByIdUser($id_user);
        // var_dump($transaksi);exit;
        $data = [
            "title"         => 'Daftar Transaksi',
            "transaksi"     => $transaksi,
            "isi"           => 'peternak/transaksi/list'
        ];

        $this->load->view('peternak/layout/wrapper', $data);

    }

    public function konfirmasi()
    {
        $id_user = $this->session->userdata('id_user');
        // echo $id_user;exit;
        // $query = $this->db->get('Produk');
        $pemesanan = $this->Pelanggan_model->getKonfirmPesananByIdUser($id_user);
        // var_dump($pemesanan);exit;
        $data = [
            "title"         => 'Daftar Pesanan',
            "pemesanan"     => $pemesanan,
            "isi"           => 'peternak/pemesanan/list'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }

    public function riwayat()
    {
        $id_user = $this->session->userdata('id_user');
        // echo $id_user;exit;
        // $query = $this->db->get('Produk');
        $transaksi = $this->Pelanggan_model->getAllTransaksiByIdUser($id_user);
        // var_dump($transaksi);exit;
        $data = [
            "title"         => 'Daftar Riwayat Transaksi',
            "transaksi"     => $transaksi,
            "isi"           => 'peternak/transaksi/riwayat'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }

    public function laporan()
    {
        $id_user = $this->session->userdata('id_user');
        // echo $id_user;exit;
        // $query = $this->db->get('Produk');
        $transaksi = $this->Pelanggan_model->getAllTransaksiByIdUser($id_user);
        // var_dump($transaksi);exit;
        $data = [
            "title"         => 'Laporan Transaksi',
            "transaksi"     => $transaksi,
            "isi"           => 'peternak/laporan/list'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }

    public function detail_riwayat_tr($id_transaksi)
    {
        $transaksi = $this->Pelanggan_model->getDetailTransaksi($id_transaksi);
        
        $data = [
            "title"         => 'Detail Riwayat Transaksi',
            "transaksi"     => $transaksi[0],   
            "isi"           => 'peternak/transaksi/detail_riwayat'
        ];

        $this->load->view('peternak/layout/wrapper', $data);
    }

    // cetak detail
    public function cetak($id_transaksi)
    {
        $id_user = $this->session->userdata('id_user');
        $transaksi = $this->Pelanggan_model->getDetailTransaksi($id_transaksi);
        $ternak = $this->Ternak_model->getNamaTernak($id_user);
        
        $data = [
            "title"         => 'Riwayat Transaksi',
            "transaksi"     => $transaksi[0],
            "ternak"        => $ternak
        ];

        $this->load->view('peternak/transaksi/cetak', $data);
    }

    // cetak laporan
    // public function cetak_laporan_pdf()
    // {
    //     $id_user = $this->session->userdata('id_user');
    //     $transaksi = $this->Pelanggan_model->getAllTransaksiByIdUser($id_user);
    //     $ternak = $this->Ternak_model->getNamaTernak($id_user);
        
    //     $data = [
    //         "title"         => 'Riwayat Transaksi',
    //         "transaksi"     => $transaksi,
    //         "ternak"        => $ternak
    //     ];

    //     $this->load->view('peternak/laporan/cetak', $data);
    // }

    // unduh pdf
    public function unduh_laporan_pdf()
    {
        $id_user = $this->session->userdata('id_user');

        if ( $this->input->post('laporan_transaksi') == 'tanggal' ) {
            $tanggal = $this->input->post('tanggal');
            $transaksi = $this->Pelanggan_model->getTransaksiByTanggal($id_user, $tanggal);
            $ternak = $this->Ternak_model->getNamaTernak($id_user);
            
            // sum total bayar
            $sum = 0;
            foreach($transaksi as $row)
            {
            $sum += $row['total_bayar'];
            }
            
            $data = [
                "title"         => 'Laporan Transaksi',
                "transaksi"     => $transaksi,
                "jumlah"        => $sum,
                "ternak"        => $ternak
            ];

            // $this->load->view('peternak/laporan/cetak', $data);
            $html = $this->load->view('peternak/laporan/isi', $data, TRUE);
            // Create an instance of the class:
            $mpdf = new \Mpdf\Mpdf();

            // Define the Header before writing anything so they appear on the first page
            $mpdf->SetHTMLHeader($this->load->view('peternak/laporan/header', $data, TRUE));
            // Write some HTML code:
            $mpdf->WriteHTML($html);
            // Define the Footer 
            $mpdf->SetHTMLFooter($this->load->view('peternak/laporan/footer', $data, TRUE));

            // Output a PDF file directly to the browser
            $nama_file_pdf = url_title($ternak['nama_peternakan'],'dash','true').'-'.date('j-m-y').'.pdf';
            $mpdf->Output($nama_file_pdf,'I');

        } elseif ( $this->input->post('laporan_transaksi') == 'bulan' ) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $transaksi = $this->Pelanggan_model->getTransaksiByBulan($id_user, $bulan, $tahun);
            $ternak = $this->Ternak_model->getNamaTernak($id_user);

            // sum total bayar
            $sum = 0;
            foreach($transaksi as $row)
            {
            $sum += $row['total_bayar'];
            }
            
            $data = [
                "title"         => 'Laporan Transaksi',
                "transaksi"     => $transaksi,
                "jumlah"        => $sum,
                "ternak"        => $ternak
            ];

            // $this->load->view('peternak/laporan/cetak', $data);
            $html = $this->load->view('peternak/laporan/isi', $data, TRUE);
            // Create an instance of the class:
            $mpdf = new \Mpdf\Mpdf();

            // Define the Header before writing anything so they appear on the first page
            $mpdf->SetHTMLHeader($this->load->view('peternak/laporan/header', $data, TRUE));
            // Write some HTML code:
            $mpdf->WriteHTML($html);
            // Define the Footer 
            $mpdf->SetHTMLFooter($this->load->view('peternak/laporan/footer', $data, TRUE));

            // Output a PDF file directly to the browser
            $nama_file_pdf = url_title($ternak['nama_peternakan'],'dash','true').'-'.date('j-m-y').'.pdf';
            $mpdf->Output($nama_file_pdf,'I');
        } elseif ( $this->input->post('laporan_transaksi') == 'tahun' ) {
            $tahun = $this->input->post('tahun');
            $transaksi = $this->Pelanggan_model->getTransaksiByTahun($id_user, $tahun);
            $ternak = $this->Ternak_model->getNamaTernak($id_user);

            // sum total bayar
            $sum = 0;
            foreach($transaksi as $row)
            {
            $sum += $row['total_bayar'];
            }
            
            $data = [
                "title"         => 'Laporan Transaksi',
                "transaksi"     => $transaksi,
                "jumlah"        => $sum,
                "ternak"        => $ternak
            ];

            // $this->load->view('peternak/laporan/cetak', $data);
            $html = $this->load->view('peternak/laporan/isi', $data, TRUE);
            // Create an instance of the class:
            $mpdf = new \Mpdf\Mpdf();

            // Define the Header before writing anything so they appear on the first page
            $mpdf->SetHTMLHeader($this->load->view('peternak/laporan/header', $data, TRUE));
            // Write some HTML code:
            $mpdf->WriteHTML($html);
            // Define the Footer 
            $mpdf->SetHTMLFooter($this->load->view('peternak/laporan/footer', $data, TRUE));

            // Output a PDF file directly to the browser
            $nama_file_pdf = url_title($ternak['nama_peternakan'],'dash','true').'-'.date('j-m-y').'.pdf';
            $mpdf->Output($nama_file_pdf,'I');
        } else {
            $this->session->set_flashdata('warning', 'Anda belum memilih tanggal laporan yang akan diunduh.');
            redirect(base_url('peternak/pemesanan/laporan'), 'refresh');
        }
        
    }

    public function update_pelanggan($id_pelanggan)
    {
        $id_konfirm = $this->input->post('id_konfirm');
        $status = $this->input->post('status');
        // jika ada id_pelanggan
        if($id_pelanggan && $status == 'Konfirmasi' ) {
            $data = array (
                'id_pelanggan'     => $id_pelanggan,
                'status'           => $status,
                'kode_transaksi'   => $this->input->post('kode_transaksi'),
                'id_produk'        => $this->input->post('id_produk'),
                'id_pemilik'       => $this->input->post('id_pemilik'),
                'jumlah'           => $this->input->post('jumlah'),
                'tanggal_upload'   => $this->input->post('tanggal_upload')
            );

            $this->Pelanggan_model->ubahStatus($data);
            $this->Pelanggan_model->addTransaksi($data);
            // $this->Pelanggan_model->deleteKonfirmasi($id_konfirm);
            $this->session->set_flashdata('sukses', 'Pesanan telah dikonfirmasi.');
            redirect(base_url('peternak/pemesanan/konfirmasi'), 'refresh');
        } else {
            // jika tdk ada id_pelanggan
            $this->session->set_flashdata('warning', 'Pesanan belum dikonfirmasi.');
            redirect(base_url('peternak/pemesanan/konfirmasi'), 'refresh');
        }
    }

    public function update_transaksi($id_transaksi)
    {
        $status = $this->input->post('status');

        if ( $id_transaksi && $status == 'Telah diterima' ) {
            $data = array (
                'id_transaksi'      =>  $id_transaksi,
                'status'            =>  $status
            );
            $this->Pelanggan_model->ubahStatusTransaksi($data);
            $this->session->set_flashdata('sukses', 'Status telah diubah.');
            redirect(base_url('peternak/pemesanan/transaksi'), 'refresh');
        } else {
            // jika tdk ada id_transaksi
            $this->session->set_flashdata('warning', 'Status belum diubah.');
            redirect(base_url('peternak/pemesanan/transaksi'), 'refresh');
        }
    }

    // perintah hapus data pesanan
    public function delete_pesanan($id_konfirm)
    {
        $this->Pelanggan_model->deleteKonfirmasi($id_konfirm);
        $this->session->set_flashdata('sukses', 'Data Pesanan Telah Dihapus');
        redirect(base_url('peternak/pemesanan/konfirmasi'), 'refresh');
    }

    // perintah hapus riwayat transaksi
    public function delete_riwayat_transaksi($id_transaksi)
    {
        $this->Pelanggan_model->deleteRiwayatTransaksi($id_transaksi);
        $this->session->set_flashdata('sukses', 'Data Riwayat Transaksi Telah Dihapus');
        redirect(base_url('peternak/pemesanan/riwayat'), 'refresh');
    }
}