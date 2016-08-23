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
    <li class="active">Mata Kuliah</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/mata_kuliah/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama mata kuliah</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($mata_kuliah)):
                            foreach($mata_kuliah as $data_mata_kuliah):
                                ?>
                                <tr>
                                    <td><?php echo $data_mata_kuliah->id; ?></td>
                                    <td><?php echo $data_mata_kuliah->nama_mata_kuliah; ?></td>
                                    <td>
                                        <?php
                                            echo anchor('admin/mata_kuliah/edit/'.$data_mata_kuliah->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('admin/mata_kuliah/delete/'.$data_mata_kuliah->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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