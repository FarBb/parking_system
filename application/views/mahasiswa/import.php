<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Form Import Data Mahasiswa
        </div>
        <div class="card-body">
          <?= form_open_multipart('mahasiswa/import') ?>
          <div class="form-group">
            <label for="nama">File</label>
            <input type="file" name="importexcel" class="form-control" id="nama" accept=".xlsx,.xls">
            <small class="form-text text-danger"><?= form_error('file'); ?></small>
          </div>
          <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>