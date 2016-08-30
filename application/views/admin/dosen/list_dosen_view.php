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
    <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
    <li class="active">Dosen</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/dosen/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($dosen)):
                            foreach($dosen as $data_dosen):
                                ?>
                                <tr>
                                    <td><?php echo $data_dosen->id; ?></td>
                                    <td><?php echo $data_dosen->nip; ?></td>
                                    <td><?php echo $data_dosen->user->name; ?></td>
                                    <td><?php echo $data_dosen->user->gender; ?></td>
                                    <td><?php echo anchor('admin/dosen/edit/'.$data_dosen->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']); ?>
                                        <?php
                                        if($current_user->id != $data_dosen->id)
                                        {
                                            echo anchor('admin/dosen/delete/'.$data_dosen->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs btn-delete-dosen']);
                                        }
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