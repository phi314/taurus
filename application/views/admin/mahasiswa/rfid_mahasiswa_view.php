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
    <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
    <li><a href="<?php echo site_url('admin/mahasiswa'); ?>">Mahasiswa</a></li>
    <li><a href="<?php echo site_url('admin/mahasiswa/edit/'.$mahasiswa->id); ?>"><?= $mahasiswa->user->name; ?></a></li>
    <li class="active">RFID</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kode RFID</h3>
                <ul class="panel-controls">
                    <li><a class="" title="set RFID" href="<?php echo site_url('admin/mahasiswa/set_rfid/'.$mahasiswa->id); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="widget widget-primary widget-no-subtitle">
                    <div class="widget-big-int"><span class="num-count"><?= $mahasiswa->kode_rfid; ?></span></div>
                    <div class="widget-subtitle">Kode RFID</div>
                </div>
            </div>
        </div>

    </div>
</div>