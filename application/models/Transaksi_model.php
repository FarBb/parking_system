<?php

class Transaksi_model extends CI_model
{

  public function getAllTransaksi()
  {
    return $this->db->get('tr_parking')->result_array();
  }

  public function autoKode()
  {
    $this->db->select('RIGHT(tr_parking.KodeTiket,3) as kode', FALSE);
    $this->db->order_by('KodeTiket', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('tr_parking');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    } else {
      $kode = 1;
    }

    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodejadi = "PC" . $kodemax;
    return $kodejadi;
  }

  public function addData()
  {
    $awal   = $this->input->post('kode_huruf_awal');
    $tengah = $this->input->post('kode_nomor');
    $akhir  = $this->input->post('kode_huruf_akhir');

    if (strlen($awal) == '1') {
      $platNo = $awal . ' ' . $tengah . ' ' . $akhir;
    } else {
      $platNo = $awal .  $tengah . ' ' . $akhir;
    }

    $jam =  $this->input->post('jam_masuk', true);
    $convertJam = date("Y-m-d h:i:s", strtotime($jam));

    $tahun = substr($jam, 6, 4);
    $bulan = substr($jam, 3, 2);
    $tanggal = substr($jam, 0, 2);
    $hour = substr($jam, 11, 2);
    $menit = substr($jam, 14, 2);
    $detik = substr($jam, 17, 2);

    $jamku = $tahun . '-' . $bulan . '-' . $tanggal . 'T' . $hour . ':' . $menit . ':' . $detik;
    // var_dump($jamku);
    // var_dump($this->input->post('jam_keluar', true));
    // die;

    $data = [
      "KodeTiket" => $this->input->post('kode_tiket', true),
      "JenisKendaraan" => $this->input->post('jenis_kendaraan', true),
      "PlatNo" => $platNo,
      "JamMasuk" => $jamku,
      "JamKeluar" => $this->input->post('jam_keluar', true),
      "Durasi" => $this->input->post('durasi', true),
      "TarifParkir" => $this->input->post('biaya', true),
    ];

    $this->db->insert('tr_parking', $data);
  }

  public function getTransaksiById($kodeTiket)
  {
    return $this->db->get_where('tr_parking', ['KodeTiket' => $kodeTiket])->row_array();
  }

  public function updateData()
  {
    // $a = $this->input->post('kode_tiket_up', true);
    // var_dump($a);
    // die;
    $awal   = $this->input->post('kode_huruf_awal_up');
    $tengah = $this->input->post('kode_nomor_up');
    $akhir  = $this->input->post('kode_huruf_akhir_up');

    if (strlen($awal) == '1') {
      $platNo = $awal . ' ' . $tengah . ' ' . $akhir;
    } else {
      $platNo = $awal .  $tengah . ' ' . $akhir;
    }

    $jam =  $this->input->post('jam_masuk_up', true);
    $convertJam = date("Y-m-d h:i:s", strtotime($jam));



    $data = [
      "JenisKendaraan" => $this->input->post('jenis_kendaraan_up', true),
      "PlatNo" => $platNo,
      "JamMasuk" => $jam,
      "JamKeluar" => $this->input->post('jam_keluar_up', true),
      "Durasi" => $this->input->post('durasi_up', true),
      "TarifParkir" => $this->input->post('biaya_up', true),
    ];

    $this->db->where('KodeTiket', $this->input->post('kode_tiket_up', true));
    $this->db->update('tr_parking', $data);
  }

  public function cariDataTransaksi()
  {
    $keyword = $this->input->post('search', true);
    $this->db->like('KodeTiket', $keyword);
    $this->db->or_like('JenisKendaraan', $keyword);
    $this->db->or_like('PlatNo', $keyword);
    $this->db->or_like('JamMasuk', $keyword);
    $this->db->or_like('JamKeluar', $keyword);
    $this->db->or_like('Durasi', $keyword);
    $this->db->or_like('TarifParkir', $keyword);
    return $this->db->get('tr_parking')->result_array();
  }

  public function hitungJumlahRecord()
  {
    $query = $this->db->get('tr_parking');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  public function hapusData($kodeTiket)
  {
    $this->db->delete('tr_parking', ['KodeTiket' => $kodeTiket]);
  }
}
