<h2>
  <center>Report Transaksi Parking System</center>
</h2>
<hr />
<table width="100%" style="text-align:center;" border="1">
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
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($transaksi as $a) : ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $a['KodeTiket'] ?></td>
      <td><?= $a['JenisKendaraan'] ?></td>
      <td><?= $a['PlatNo'] ?></td>
      <td><?= date('d/m/Y  h:i:s', strtotime($a['JamMasuk'])); ?></td>
      <td></td>
      <td></td>
      <td><?= $a['TarifParkir'] ?></td>
    </tr>
    <?php
      $no++;
    endforeach; ?>
  </tbody>
</table>