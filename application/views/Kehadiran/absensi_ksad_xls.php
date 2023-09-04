<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border=1 width="100%">
    <thead>
        <tr>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">No.</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Nama Lengkap</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">NPM</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Total Hadir</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Total Izin</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Total Alpha</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_presensi as $value) { ?>
            <tr>
                <td style="background-color: #d3d3d3; text-align:center;"><?= $no ?></td>
                <td style="background-color: #d3d3d3; text-align:center;"><?= $value['nama'] ?></td>
                <td style="background-color: #d3d3d3; text-align:center;"><?= $value['npm'] ?></td>
                <td style="background-color: #00ff00; text-align:center;"><?= $value['hadir'] ?></td>
                <td style="background-color: #ffff00; text-align:center;"><?= $value['izin'] ?></td>
                <td style="background-color: #ff0000; text-align:center;"><?= $value['alpha'] ?></td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>