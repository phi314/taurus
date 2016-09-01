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
    <li class="active">Absensi</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('dosen/absensi/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Waktu Mulai</th>
                            <th>Durasi (menit)</th>
                            <th>Mata Kuliah</th>
                            <th>Laboratorium</th>
                            <th>Waktu Selesai</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($absensi)):
                            foreach($absensi as $data_absensi):
                                $end_time = absensi_end_time($data_absensi->waktu_mulai, $data_absensi->durasi);
                                ?>
                                <tr id="<?= $data_absensi->id; ?>">
                                    <td><?= $data_absensi->id; ?></td>
                                    <td><?php echo format_tanggal_indonesia($data_absensi->waktu_mulai, TRUE); ?></td>
                                    <td><?= $data_absensi->durasi; ?></td>
                                    <td><?= $data_absensi->mengajar->mata_kuliah->nama_mata_kuliah; ?></td>
                                    <td><?= $data_absensi->laboratorium->nama_laboratorium; ?></td>
                                    <td><?php echo format_tanggal_indonesia($data_absensi->waktu_selesai, TRUE); ?></td>
                                    <td>
                                        <?php echo absensi_status($data_absensi->waktu_mulai, $data_absensi->durasi, TRUE); ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo anchor('dosen/absensi/edit/'.$data_absensi->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('dosen/absensi/detail/'.$data_absensi->id, '<i class="fa fa-users"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('dosen/absensi/delete/'.$data_absensi->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs btn-delete-mahasiswa']);
                                        ?>
                                    </td>
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