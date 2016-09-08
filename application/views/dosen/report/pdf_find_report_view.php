<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 9/7/16
 * Time: 10:21 PM
 */

?>
<html>
<head>
    <title>Laporan Absensi</title>
    <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo site_url(CSS.'bootstrap/bootstrap.min.css'); ?><!--">-->
    <style type="text/css">
        .title {
            font-size: 1.5em;
        }
        .subtitle {
            font-size: 1em;
        }
        .table {
            font-size: .7em;
        }

        .print-date {
            font-size: .5em;
        }

        #header {
            left: 0px;
            right: 0px;
            top: -180px;
            bottom: 0px;
            text-align: center;
            font-size: .5em;
        }

        #footer {
            left: 0px;
            right: 0px;
            top: 0px;
            bottom: -180px;
            text-align: center;
        }

        table th {
            text-align: left;
        }

        table thead th, table tbody td {
            padding: 10px;
        }

    </style>
</head>
<body>

<div id="header">
</div>
<div id="footer">
</div>

<b class="title">Universitas Pendidikan Indonesia</b>
<br>
<b class="subtitle">Laporan Absensi</b>
<br>
<small class="print-date">Tanggal cetak: <?php echo format_date(now()); ?></small>

<table class="table table-bordered">
    <tbody>
    <tr>
        <th>Dosen</th>
        <td><?= $mengajar->dosen->user->name; ?></td>
        <th>Mata Kuliah</th>
        <td><?= $mengajar->mata_kuliah->nama_mata_kuliah; ?></td>
    </tr>
    <tr>
        <th>Dari</th>
        <td><?= format_date($date_from, 'date') ?></td>
        <th>Sampai</th>
        <td><?= format_date($date_to, 'date') ?></td>
    </tr>
    </tbody>
</table>

<hr>

<table class="table table-bordered" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>NIM</th>
        <th>Nama</th>
        <?php foreach($array_tanggal as $tanggal): ?>
            <th><?= date('d/m/Y', strtotime($tanggal['waktu_mulai'])); ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php $no=1;foreach($array_mahasiswa as $mahasiswa): ?>
        <tr>
            <td><?= $no++; ?>.</td>
            <td><?= $mahasiswa['nim']; ?></td>
            <td><?= $mahasiswa['name']; ?></td>
            <?php
            foreach($array_tanggal as $tanggal):
                $detail_absensi = $this->absensi_mahasiswa_model->get(['absensi_id'=>$tanggal['id'], 'mahasiswa_id'=>$mahasiswa['id']]);
                $waktu_masuk = 'X';
                $waktu_keluar = 'x';
                if($detail_absensi !== FALSE)
                {
                    $waktu_masuk = format_date($detail_absensi->waktu_masuk, 'time-no-sec');
                    $waktu_keluar = is_null($detail_absensi->waktu_keluar) ? '' : format_date($detail_absensi->waktu_keluar, 'time-no-sec');
                }
                ?>
                <td><?= $waktu_masuk; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>