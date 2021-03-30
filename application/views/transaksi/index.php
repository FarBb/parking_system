<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');
                                          unset($_SESSION['flash']) ?>"></div>
  <div class="row mt-3 mb-5 form-tambah" style="display: none;">
    <div class="container">
      <div class="row mt-3">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <div style="margin-bottom: -10px;">
                <a href="<?= base_url() ?>" class="close">&times;</a>
                <strong>Form Tambah Data</strong>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= base_url('transaksi/add') ?>" method="post">
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="kodeTiket">Kode Tiket</label>
                  <label class="col-md-1 mt-2" for="kodeTiket">:</label>
                  <input type="text" name="kode_tiket" value="<?= $kode ?>" class="form-control col-md-8" id="kodeTiket" readonly>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-1" for="jenis">Jenis</label>
                    <label class="col-md-1 mt-1" for="jenis">:</label>
                    <select class="form-control col-md-8" id="jenisKendaraanAdd" name="jenis_kendaraan" autofocus>
                      <option value="" <?php echo set_select('jenis_kendaraan', '', (!empty($data) && $data == "input" ? TRUE : FALSE)); ?> disabled selected>
                        Pilih Jenis Kendaraan
                      </option>
                      <option value="Motor" <?php echo set_select('jenis_kendaraan', 'Motor', (!empty($data) && $data == "Motor" ? TRUE : FALSE)); ?>>
                        Motor</option>
                      <option value="Mobil" <?php echo set_select('jenis_kendaraan', 'Mobil', (!empty($data) && $data == "Mobil" ? TRUE : FALSE)); ?>>
                        Mobil</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('jenis_kendaraan'); ?>
                    </small>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-2" for="platNo">Plat No.</label>
                    <label class="col-md-1 mt-2" for="platNo">:</label>
                    <input type="text" placeholder="Kode Awal" autocomplete="off" name="kode_huruf_awal" class="form-control col-md-1 mr-4" id="platNo" maxlength="2" value="<?php echo set_value('kode_huruf_awal'); ?>">
                    <input type=" text" name="kode_nomor" placeholder="Kode Nomor" autocomplete="off" class="form-control col-md-4 mr-3" value="<?php echo set_value('kode_nomor'); ?>">
                    <input type="text" name="kode_huruf_akhir" placeholder="Kode Akhir" autocomplete="off" class="form-control col-md-2" value="<?php echo set_value('kode_huruf_akhir'); ?>">
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_huruf_awal'); ?> </small>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_nomor'); ?> </small>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_huruf_akhir'); ?> </small>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="jamMasuk">Jam Masuk</label>
                  <label class="col-md-1 mt-2" for="jamMasuk">:</label>
                  <input type="datetime" id="dateTime" name="jam_masuk" class="form-control col-md-8" readonly>
                </div>
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="jamKeluar">Jam Keluar</label>
                  <label class="col-md-1 mt-2" for="jamKeluar">:</label>
                  <input type="datetime-local" name="jam_keluar" class="form-control col-md-8" id="jamKeluarAdd">
                </div>
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="durasi">Durasi</label>
                  <label class="col-md-1 mt-2" for="durasi">:</label>
                  <input type="text" name="durasi" class="form-control col-md-8" id="durasiAdd">
                </div>
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="biaya">Biaya</label>
                  <label class="col-md-1 mt-2" for="biaya">:</label>
                  <input type="text" name="biaya" class="form-control col-md-8" id="biayaAdd">
                </div>
                <button type="reset" name="reset" class="btn btn-secondary float-right">Cancel</button>
                <button type="submit" name="tambah" class="btn btn-primary float-right mr-2 btn-save"><i class="fa fa-save mr-2"></i>
                  Save
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3 mb-5 form-edit" style="display: none;">
    <div class="container">
      <div class="row mt-3">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <div style="margin-bottom: -10px;">
                <a href="<?= base_url() ?>" class="close">&times;</a>
                <strong>Form Edit Data</strong>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="kodeTiket">Kode Tiket</label>
                  <label class="col-md-1 mt-2" for="kodeTiket">:</label>
                  <input type="text" name="kode_tiket_up" value="<?= $trId['KodeTiket'] ?>" class="form-control col-md-8" id="kodeTiket" readonly>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-1" for="jenis">Jenis</label>
                    <label class="col-md-1 mt-1" for="jenis">:</label>
                    <select class="form-control col-md-8" id="jenisKendaraanUp" name="jenis_kendaraan_up" autofocus>
                      <option value="" selected disabled>Pilih Jenis Kendaraan</option>
                      <?php
                      if ($trId['JenisKendaraan'] == 'Motor') {
                        echo '<option value="Motor" selected>Motor</option>
                        <option value="Mobil">Mobil</option>';
                      } else {
                        echo '<option value="Motor">Motor</option>
                        <option value="Mobil" selected>Mobil</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('jenis_kendaraan_up'); ?>
                    </small>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-2" for="platNo">Plat No.</label>
                    <label class="col-md-1 mt-2" for="platNo">:</label>
                    <input type="text" placeholder="Kode Awal" autocomplete="off" name="kode_huruf_awal_up" class="form-control col-md-1 mr-4" maxlength="2" id="platNo" value=<?= substr($trId['PlatNo'], 0, 2) ?>>
                    <input type="text" name="kode_nomor_up" placeholder="Kode Nomor" autocomplete="off" class="form-control col-md-4 mr-3" value="<?= substr($trId['PlatNo'], 2, 4) ?>">
                    <input type="text" name="kode_huruf_akhir_up" value=<?= substr($trId['PlatNo'], -3) ?> placeholder="Kode Akhir" autocomplete="off" class="form-control col-md-2">
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_huruf_awal_up'); ?> </small>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_nomor_up'); ?> </small>
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('kode_huruf_akhir_up'); ?></small>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-3 mt-2" for="jamMasuk">Jam Masuk</label>
                  <label class="col-md-1 mt-2" for="jamMasuk">:</label>
                  <input type="datetime-local" name="jam_masuk_up" class="form-control col-md-8" value="<?= date("Y-m-d\Th:i", strtotime($trId['JamMasuk'])); ?>" id="jamMasukUp">
                </div>
                <div class=" form-group">
                  <div class="row">
                    <label class="col-md-3 mt-2" for="jamKeluar">Jam Keluar</label>
                    <label class="col-md-1 mt-2" for="jamKeluar">:</label>
                    <input type="datetime-local" name="jam_keluar_up" class="form-control col-md-8" id="jamKeluarUp" value="<?= date("Y-m-d\Th:i", strtotime($trId['JamKeluar'])); ?>">
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('jam_keluar_up'); ?>
                    </small>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-2" for="durasi">Durasi</label>
                    <label class="col-md-1 mt-2" for="durasi">:</label>
                    <input type="text" name="durasi_up" value="<?php echo $trId['Durasi'] ?>" class="form-control col-md-8" id="durasiUp">
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('durasi_up'); ?>
                    </small>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-md-3 mt-2" for="biaya">Biaya</label>
                    <label class="col-md-1 mt-2" for="biaya">:</label>
                    <input type="text" name="biaya_up" class="form-control col-md-8" id="biayaUp" value="<?= $trId['TarifParkir'] ?>">
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <small class="form-text-error text-danger"><?= form_error('biaya_up'); ?>
                    </small>
                  </div>
                </div>
                <button type="reset" name="tambah" class="btn btn-secondary float-right" id="btnEditCancel">Cancel</button>
                <button type="submit" name="tambah" class="btn btn-primary float-right mr-2 btn-save" id="btnEditSave"><i class="fa fa-save mr-2"></i>
                  Save
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row mt-3">
      <div class="col-md-1 mb-1">
        <a href="#" class="btn btn-primary btn-tambah">
          <i class="fa fa-plus"></i>
          New
        </a>
      </div>
      <div class="col-md-3 mb-1">
        <a href="<?= base_url('transaksi/print') ?>" class="btn btn-warning">
          <i class="fa fa-print"></i>
          Print
        </a>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-6 mb-1">
        <form action="<?= base_url('transaksi') ?>" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Tiket</th>
          <th scope="col">Jenis Kendaraan</th>
          <th scope="col">Plat No</th>
          <th scope="col">Jam Masuk</th>
          <th scope="col">Jam Keluar</th>
          <th scope="col">Durasi</th>
          <th scope="col">Tarif</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($transaksi)) : ?>
          <tr class="bg-danger text-center">
            <th scope="row" colspan="9">Data Transaksi Tidak Ditemukan</th>
          </tr>
        <?php endif; ?>
        <?php
        $no = 1;
        foreach ($transaksi as $a) : ?>
          <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $a['KodeTiket'] ?></td>
            <td><?= $a['JenisKendaraan'] ?></td>
            <td><?= substr($a['PlatNo'], 0, 2) . ' ' . substr($a['PlatNo'], 2, 4) . ' ' . substr($a['PlatNo'], -3)  ?></td>
            <td><?= date('d/m/Y  h:i:s', strtotime($a['JamMasuk'])); ?></td>
            <td><?php
                $tanggal = date('d/m/Y  h:i:s', strtotime($a['JamKeluar']));
                // die($tanggal);
                if ($tanggal == '30/11/-0001  12:00:00') {
                  echo '';
                } else {
                  echo $tanggal;
                }
                ?></td>
            <td><?php
                $durasi = $a['Durasi'];
                if ($durasi == '00:00:00') {
                  echo '';
                } else {
                  echo $durasi;
                }
                ?></td>
            <td><?= $a['TarifParkir'] ?></td>
            <td>
              <a href="<?= base_url(); ?>transaksi/delete/<?= $a['KodeTiket']; ?>" class="badge badge-danger float-right tombol-hapus">Delete</a>
              <a href="<?= base_url(); ?>transaksi/update/<?= $a['KodeTiket']; ?>" class="badge badge-success float-right btn-edit">Update</a>
            </td>
          </tr>
        <?php
          $no++;
        endforeach; ?>
      </tbody>
    </table>
    <div class="container">
      <div class="row form-group">
        <label class="col-md-2 mt-2" for="count" style="margin-left: -10px;">Record Count</label>
        <div class="record-count">
          <input type="text" class="form-control col-md-3 record-count-value text-center" value="<?= $jumlah ?>" id="count" readonly>
        </div>
      </div>
    </div>
  </div>
</div>