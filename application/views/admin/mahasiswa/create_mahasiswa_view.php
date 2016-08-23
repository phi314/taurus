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
    <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
    <li><a href="<?php echo site_url('admin/mahasiswa'); ?>">Mahasiswa</a></li>
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
                    <?php echo form_label('Nim', 'nim', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('nim', set_value('nim'), 'class="form-control"'); ?>
                        <?php echo form_error('nim', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Nama', 'name', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('name', set_value('name'), 'class="form-control"'); ?>
                        <?php echo form_error('name', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Jenis Kelamin', 'gender', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_radio('gender', 'laki-laki', set_radio('gender', 'laki-laki', TRUE)); ?> Laki-laki
                        <?php echo form_radio('gender', 'perempuan', set_radio('gender', 'perempuan')); ?> Perempuan
                        <?php echo form_error('gender', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_submit('submit', 'Simpan mahasiswa', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>