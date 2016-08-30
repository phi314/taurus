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
    <li class="active">Laboratorium</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/laboratorium/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama laboratorium</th>
                            <th>IP Address</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($laboratorium)):
                            foreach($laboratorium as $data_laboratorium):
                                ?>
                                <tr>
                                    <td><?php echo $data_laboratorium->id; ?></td>
                                    <td><?php echo $data_laboratorium->nama_laboratorium; ?></td>
                                    <td><?php echo $data_laboratorium->ip_address; ?></td>
                                    <td>
                                        <?php
                                            echo anchor('admin/laboratorium/edit/'.$data_laboratorium->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('admin/laboratorium/delete/'.$data_laboratorium->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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