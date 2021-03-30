<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Transaksi_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['trId'] = array(

      'KodeTiket' => '',
      'JenisKendaraan' => '',
      'PlatNo' => '',
      'JamMasuk' => '',
      'JamKeluar' => '',
      'Durasi' => '',
      'TarifParkir' => '',
    );
    $data['judul'] = 'Parking System';
    $data['kode'] = $this->Transaksi_model->autoKode();
    $data['jumlah'] = $this->Transaksi_model->hitungJumlahRecord();
    if ($this->input->post('search')) {
      $data['transaksi'] = $this->Transaksi_model->cariDataTransaksi();
    } else {
      $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('transaksi/index', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {

    $data['trId'] = array(

      'KodeTiket' => '',
      'JenisKendaraan' => '',
      'PlatNo' => '',
      'JamMasuk' => '',
      'JamKeluar' => '',
      'Durasi' => '',
      'TarifParkir' => '',
    );

    // $a = $this->input->post('jam_masuk');
    // var_dump($a);
    // die;

    $this->form_validation->set_rules('kode_tiket', 'Kode Tiket', 'required');
    $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
    $this->form_validation->set_rules('kode_huruf_awal', 'Kode Huruf Awal', 'required|alpha');
    $this->form_validation->set_rules('kode_nomor', 'Kode Nomor', 'required|numeric|max_length[4]');
    $this->form_validation->set_rules('kode_huruf_akhir', 'Kode Huruf Akhir', 'required|alpha|max_length[3]');
    $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
    $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', '');
    $this->form_validation->set_rules('durasi', 'Durasi', '');
    $this->form_validation->set_rules('biaya', 'Biaya', '');


    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Tambah Parking System';
      $data['kode'] = $this->Transaksi_model->autoKode();
      $data['jumlah'] = $this->Transaksi_model->hitungJumlahRecord();
      if ($this->input->post('search')) {
        $data['transaksi'] = $this->Transaksi_model->cariDataTransaksi();
      } else {
        $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('transaksi/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Transaksi_model->addData();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('transaksi');
    }
  }

  public function update($kodeTiket)
  {
    $data['judul'] = 'Ubah Parking System';
    $data['kode'] = $this->Transaksi_model->autoKode();
    $data['trId'] = $this->Transaksi_model->getTransaksiById($kodeTiket);
    // $data['kode'] = $this->Transaksi_model->getKode();
    $data['jumlah'] = $this->Transaksi_model->hitungJumlahRecord();
    if ($this->input->post('search')) {
      $data['transaksi'] = $this->Transaksi_model->cariDataTransaksi();
    } else {
      $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
    }

    $this->form_validation->set_rules('kode_tiket_up', 'Kode Tiket', 'required');
    $this->form_validation->set_rules('jenis_kendaraan_up', 'Jenis Kendaraan', 'required');
    $this->form_validation->set_rules('kode_huruf_awal_up', 'Kode Huruf Awal', 'required|alpha');
    $this->form_validation->set_rules('kode_nomor_up', 'Kode Nomor', 'required|numeric|max_length[4]');
    $this->form_validation->set_rules('kode_huruf_akhir_up', 'Kode Huruf Akhir', 'required|alpha|max_length[3]');
    $this->form_validation->set_rules('jam_masuk_up', 'Jam Masuk', 'required');
    $this->form_validation->set_rules('jam_keluar_up', 'Jam Keluar', 'required');
    $this->form_validation->set_rules('durasi_up', 'Durasi', 'required');
    $this->form_validation->set_rules('biaya_up', 'Biaya', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('transaksi/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Transaksi_model->updateData();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('transaksi');
    }
  }

  public function delete($kodeTiket)
  {
    $this->Transaksi_model->hapusData($kodeTiket);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('transaksi');
  }

  public function print()
  {
    $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
    $this->load->library('pdf');
    $this->pdf->setPaper('F4', 'landscape');
    $this->pdf->filename = "laporan-transaksi.pdf";
    $this->pdf->load_view('transaksi/print', $data);
  }
}
