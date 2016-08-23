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
    <li class="active">Mengajar</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/mengajar/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mata kuliah</th>
                            <th>Dosen</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($mengajar)):
                            foreach($mengajar as $data_mengajar):
                                ?>
                                <tr>
                                    <td><?php echo $data_mengajar->id; ?></td>
                                    <td><?php echo $data_mengajar->mata_kuliah->nama_mata_kuliah; ?></td>
                                    <td>
                                        <?= "({$data_mengajar->dosen->nip}) {$data_mengajar->user_dosen->name}"; ?></td>
                                    <td>
                                        <?php
                                            echo anchor('admin/mengajar/edit/'.$data_mengajar->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('admin/mengajar/delete/'.$data_mengajar->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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