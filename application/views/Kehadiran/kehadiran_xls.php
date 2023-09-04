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
            <th>P.1</th>
            <th>P.2</th>
            <th>P.3</th>
            <th>P.4</th>
            <th>P.5</th>
            <th>P.6</th>
            <th>P.7</th>
            <th>P.8</th>
            <th>P.9</th>
            <th>P.10</th>
            <th>P.11</th>
            <th>P.12</th>
            <th>P.13</th>
            <th>P.14</th>
            <th>P.15</th>
            <th>P.16</th>
            <th>P.17</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($anggota as $value) { ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['npm'] ?></td>
                <td><?= $value['Pertemuan_1'] ?></td>
                <td><?= $value['Pertemuan_2'] ?></td>
                <td><?= $value['Pertemuan_3'] ?></td>
                <td><?= $value['Pertemuan_4'] ?></td>
                <td><?= $value['Pertemuan_5'] ?></td>
                <td><?= $value['Pertemuan_6'] ?></td>
                <td><?= $value['Pertemuan_7'] ?></td>
                <td><?= $value['Pertemuan_8'] ?></td>
                <td><?= $value['Pertemuan_9'] ?></td>
                <td><?= $value['Pertemuan_10'] ?></td>
                <td><?= $value['Pertemuan_11'] ?></td>
                <td><?= $value['Pertemuan_12'] ?></td>
                <td><?= $value['Pertemuan_13'] ?></td>
                <td><?= $value['Pertemuan_14'] ?></td>
                <td><?= $value['Pertemuan_15'] ?></td>
                <td><?= $value['Pertemuan_16'] ?></td>
                <td><?= $value['Pertemuan_17'] ?></td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>