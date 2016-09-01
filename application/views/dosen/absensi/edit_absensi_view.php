<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/11/16
 * Time: 2:32 PM
 */
?>
<!-- The Breadcrumb -->
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dosen'); ?>">Dashboard</a></li>
    <li><a href="<?php echo site_url('dosen/absensi'); ?>">Absensi</a></li>
    <li class="active">Tambah</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <?php echo form_open('', 'class="form-horizontal"'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo form_label('Tanggal', 'tanggal', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-control-static"><?php echo date('Y-m-d', strtotime($absensi->waktu_mulai)); ?></div>
                        <?php echo form_hidden('waktu_mulai', $absensi->waktu_mulai); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Waktu', 'waktu', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-control-static"><?php echo date('H:i', strtotime($absensi->waktu_mulai)); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Durasi', 'durasi', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <?php echo form_input('durasi', set_value('durasi', $absensi->durasi), ['class'=>"form-control", 'placeholder'=>'Durasi dalam menit']); ?>
                            <span class="input-group-addon">
                                Menit
                            </span>
                        </div>
                        <?php echo form_error('durasi', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Laboratorium', 'laboratorium', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_dropdown('laboratorium', $laboratorium_dropdown, $absensi->laboratorium_id, 'class="form-control"'); ?>
                        <?php echo form_error('laboratorium', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Mata Kuliah', 'mata_kuliah', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <select name="mata_kuliah" class="form-control">
                            <?php foreach($mata_kuliah as $mata_kuliah_dropdown): ?>
                                <option value="<?= $mata_kuliah_dropdown->id; ?>" <?php echo set_select('mata_kuliah', $absensi->id); ?>><?= $mata_kuliah_dropdown->mata_kuliah->nama_mata_kuliah; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('mata_kuliah', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_hidden('absensi_id', $absensi->id); ?>
                <?php echo form_submit('submit', 'Simpan absensi', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>