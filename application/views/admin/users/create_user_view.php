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
                    <?php echo form_label('Nama', 'nama', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('nama', set_value('last_name'), 'class="form-control"'); ?>
                        <?php echo form_error('nama', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Jenis Kelamin', 'gender', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_radio('gender', set_value('laki-laki'), TRUE); ?> Laki-laki
                        <?php echo form_radio('gender', set_value('perempuan'), FALSE); ?> Perempuan
                        <?php echo form_error('gender', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Username', 'username', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('username', set_value('username'), 'class="form-control"'); ?>
                        <?php echo form_error('username', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email', 'email', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_input('email', '', 'class="form-control"'); ?>
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
                    <?php echo form_label('Confirm password', 'password_confirm', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_password('password_confirm', '', 'class="form-control"'); ?>
                        <?php echo form_error('password_confirm', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($groups)):
                            echo form_label('Groups', 'groups[]', ['class'=>'col-md-3 col-xs-12 control-label']);
                    ?>
                        <div class="col-md-6 col-xs-12">
                            <?php
                                foreach($groups as $group):
                            ?>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id)); echo $group->name ?>
                                        </label>
                                    </div>
                            <?php
                                endforeach;
                                echo form_error('groups[]', '<div class="text-danger help-block">', '</div>');
                            ?>
                        </div>
                    <?php
                        endif;
                    ?>

                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_submit('submit', 'Create user', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>