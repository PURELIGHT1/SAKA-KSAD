<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
 <thead>
   <tr>
    <th>No.</th>
    <th>Nama Lengkap</th>
    <th>NPM</th>
    <th>Jenis Kelamin</th>
    <th>Program Studi</th>
    <th>No. HP</th>
    <th>Email</th>
    <th>Keterangan</th>
    <th>Status</th>
  </tr>
</thead>
<tbody> 
  <?php $no = 1; foreach($anggota as $value) { ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $value['nama'] ?></td>
      <td><?= $value['npm'] ?></td>
      <td><?= $value['jenis_kelamin'] ?></td>
      <td><?= $value['nama_prodi'] ?></td>
      <td><?= $value['no_hp'] ?></td>
      <td><?= $value['email'] ?></td>
      <td><?= $value['keterangan'] ?></td>
      <td><?= $value['status_anggota'] ?></td>
    </tr>
    <?php $no++; }?>
  </tbody>
</table>
