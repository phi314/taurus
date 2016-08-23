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
    <li><a href="<?php echo site_url('admin/mengajar'); ?>">Mengajar</a></li>
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
                    <?php echo form_label('Dosen', 'dosen', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <select name="dosen" id="dosen" class="form-control">
                            <?php foreach($dosen as $dropdown_dosen): ?>
                                <option value="<?php echo $dropdown_dosen->id; ?>"><?php echo $dropdown_dosen->user->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('dosen', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Mata Kuliah', 'mata_kuliah', ['class'=>'col-md-3 col-xs-12 control-label']); ?>
                    <div class="col-md-6 col-xs-12">
                        <?php echo form_dropdown('mata_kuliah', $mata_kuliah, '', 'class="form-control"'); ?>
                        <?php echo form_error('mata_kuliah', '<div class="text-danger help-block">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php echo form_submit('submit', 'Simpan Mata kuliah', ['class'=>'btn btn-primary pull-right']); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>