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
    <li class="active">List RFID</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/mahasiswa/add_rfid/'.$mahasiswa->id); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode RFID</th>
                            <th>Mata Kuliah</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($mahasiswa->mahasiswa_rfid)):
                            foreach($mahasiswa->mahasiswa_rfid as $rfid):
                                ?>
                                <tr>
                                    <td><?php echo $rfid->id; ?></td>
                                    <td><?php echo $rfid->rfid->kode_rfid; ?></td>
                                    <td><?php echo $rfid->mata_kuliah->nama_mata_kuliah; ?></td>
                                    <td>
                                        <?php
                                            echo anchor('admin/mahasiswa/edit/'.$rfid->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('admin/mahasiswa/delete/'.$rfid->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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