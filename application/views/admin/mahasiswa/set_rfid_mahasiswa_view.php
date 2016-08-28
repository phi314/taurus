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
    <li><a href="<?php echo site_url('admin/mahasiswa/edit/'.$mahasiswa->id); ?>"><?= $mahasiswa->user->name; ?></a></li>
    <li><a href="<?php echo site_url('admin/mahasiswa/rfid/'.$mahasiswa->id); ?>">RFID</a></li>
    <li class="active">Daftar ke RFID</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <?php echo form_open('', ['class'=>'form-horizontal', 'id'=>'add-rfid']); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo form_label('Kode RFID', 'kode-rfid', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <?php echo form_input('kode_rfid', "", 'id="kode-rfid" class="form-control" placeholder="Silahkan Tap Kartu"'); ?>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="button" id="clear-kode-rfid"><i class="fa fa-times"></i></button>
                            </span>
                        </div>
                        <?php echo form_error('kode_rfid', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_hidden('mahasiswa_id', $mahasiswa->id); ?>
                <?php echo form_submit('submit', 'Daftarkan', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>