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
    <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
    <li class="active">Create</li>
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
                    <?php echo form_label('First name', 'first_name', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('first_name', set_value('first_name', $user->first_name), 'class="form-control"'); ?>
                        <?php echo form_error('first_name', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Last name', 'last_name', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('last_name', set_value('last_name', $user->last_name), 'class="form-control"'); ?>
                        <?php echo form_error('last_name', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Company', 'company', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('company', set_value('company', $user->company), 'class="form-control"'); ?>
                        <?php echo form_error('company', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Phone', 'phone', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('phone', set_value('phone', $user->phone), 'class="form-control"'); ?>
                        <?php echo form_error('phone', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Username', 'username', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('username', set_value('username', $user->username), 'class="form-control"'); ?>
                        <?php echo form_error('username', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email', 'email', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('email', set_value('email', $user->email), 'class="form-control"'); ?>
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
                <?php echo form_submit('submit', 'Save profile', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>