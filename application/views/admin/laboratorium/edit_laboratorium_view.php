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
    <li><a href="<?php echo site_url('admin/laboratorium'); ?>">Laboratorium</a></li>
    <li class="active">Edit <?php echo $laboratorium->nama_laboratorium; ?></li>
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
                    <?php echo form_label('Nama laboratorium', 'nama_laboratorium', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('nama_laboratorium', set_value('nama_mata_kuliah', $laboratorium->nama_laboratorium), 'class="form-control"'); ?>
                        <?php echo form_error('nama_laboratorium', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_hidden('id', $laboratorium->id); ?>
                <?php echo form_submit('submit', 'Simpan laboratorium', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>