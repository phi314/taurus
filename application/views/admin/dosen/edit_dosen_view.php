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
    <li><a href="<?php echo site_url('admin/dosen'); ?>">Dosen</a></li>
    <li class="active">Edit <?php echo $dosen->nip; ?></li>
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
                    <?php echo form_label('Nip', 'nip', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('nip', set_value('nip', $dosen->nip), 'class="form-control"'); ?>
                        <?php echo form_error('nip', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Nama', 'name', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('name', set_value('name', $dosen->user->name), 'class="form-control"'); ?>
                        <?php echo form_error('name', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Jenis Kelamin', 'gender', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_dropdown('gender', ['laki-laki'=>'laki-laki', 'perempuan'=>'perempuan'], [$dosen->user->gender], 'class="form-control"'); ?>
                        <?php echo form_error('gender', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Username', 'username', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('username', set_value('username', $dosen->user->username), 'class="form-control"'); ?>
                        <?php echo form_error('username', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email', 'email', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('email', set_value('email', $dosen->user->email), 'class="form-control"'); ?>
                        <?php echo form_error('email', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Password', 'password', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_password('password', '', 'class="form-control"'); ?>
                        <?php echo form_error('password', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Confirm changed password', 'password_confirm', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_password('password_confirm', '', 'class="form-control"'); ?>
                        <?php echo form_error('password_confirm', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_hidden('id', $dosen->id); ?>
                <?php echo form_submit('submit', 'Edit dosen', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>