<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/22/16
 * Time: 9:14 PM
 */

?>

<!-- The Breadcrumb -->
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dosen'); ?>">Dashboard</a></li>
    <li><a href="<?php echo site_url('absensi'); ?>">Absensi</a></li>
    <li class="active"><?= "{$absensi->mengajar->mata_kuliah->nama_mata_kuliah} - {$absensi->laboratorium->nama_laboratorium}"; ?></li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Mahasiswa</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($absensi->absensi_mahasiswa)):
                            foreach($absensi->absensi_mahasiswa as $absensi_mahasiswa):
                                ?>
                                <tr id="<?= $absensi_mahasiswa->id; ?>">
                                    <td><?= $absensi_mahasiswa->mahasiswa->nim; ?></td>
                                    <td><?= $absensi_mahasiswa->mahasiswa->user->name; ?></td>
                                    <td><?php echo format_tanggal_indonesia($absensi_mahasiswa->waktu_masuk, TRUE); ?></td>
                                    <td><?php echo format_tanggal_indonesia($absensi_mahasiswa->waktu_keluar, TRUE); ?></td>
                                </tr>

                            <?php
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>