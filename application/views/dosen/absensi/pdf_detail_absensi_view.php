<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/22/16
 * Time: 9:14 PM
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

    <div style="overflow-x: auto">

        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Dosen</th>
                <td><?= $absensi->mengajar->dosen->user->name; ?></td>
                <th>Mata Kuliah</th>
                <td><?= $absensi->mengajar->mata_kuliah->nama_mata_kuliah; ?></td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>Laboratorium <?= $absensi->laboratorium->nama_laboratorium; ?></td>
                <th>Waktu Mulai</th>
                <td><?php echo format_date($absensi->waktu_mulai); ?></td>
                <th>Durasi (menit)</th>
                <td><?= $absensi->durasi; ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr>

    <table class="table table-bordered" style="width: 100%">
        <thead>
        <tr>
            <th width="50px">#</th>
            <th width="100px">NIM</th>
            <th>Mahasiswa</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($absensi->absensi_mahasiswa)):
            $no = 1;
            foreach($absensi->absensi_mahasiswa as $absensi_mahasiswa):
                ?>
                <tr id="<?= $absensi_mahasiswa->id; ?>">
                    <td><?= $no++.'.'; ?></td>
                    <td><?= $absensi_mahasiswa->mahasiswa->nim; ?></td>
                    <td><?= cameltext($absensi_mahasiswa->mahasiswa->user->name); ?></td>
                    <td><?php echo format_tanggal_indonesia($absensi_mahasiswa->waktu_masuk, TRUE); ?></td>
                    <td><?php echo format_tanggal_indonesia($absensi_mahasiswa->waktu_keluar, TRUE); ?></td>
                </tr>
            <?php
            endforeach;
        endif;
        ?>
        </tbody>
    </table>

</body>
</html>
