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
    <li class="active">Mahasiswa</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/mahasiswa/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($mahasiswa)):
                            foreach($mahasiswa as $data_mahasiswa):
                                ?>
                                <tr>
                                    <td><?php echo $data_mahasiswa->id; ?></td>
                                    <td><?php echo $data_mahasiswa->nim; ?></td>
                                    <td><?php echo $data_mahasiswa->user->name; ?></td>
                                    <td><?php echo $data_mahasiswa->user->gender; ?></td>
                                    <td><?php echo anchor('admin/mahasiswa/edit/'.$data_mahasiswa->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']); ?>
                                        <?php
                                        if($current_user->id != $data_mahasiswa->id)
                                        {
                                            echo anchor('admin/mahasiswa/delete/'.$data_mahasiswa->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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