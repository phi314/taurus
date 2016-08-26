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
    <li class="active">RFID</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/rfid/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode RFID</th>
                            <th>Mahasiswa</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($rfid)):
                            foreach($rfid as $data_rfid):
                                ?>
                                <tr>
                                    <td><?php echo $data_rfid->id; ?></td>
                                    <td><?php echo $data_rfid->kode_rfid; ?></td>
                                    <td>
                                        <?php
                                            if(!empty($mahasiswa)):
                                               foreach($mahasiswa as $data_mahasiswa_rfid):
                                                    echo "- ({$data_mahasiswa_rfid->nim}) {$data_mahasiswa_rfid->name}";
                                               endforeach;
                                            endif;

                                            echo anchor("admin/rfid/add_mahasiswa/{$data_rfid->kode_rfid}", "<button class='btn btn-info btn-xs'><i class='fa fa-plus'></i> Tambah mahasiswa</button>");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo anchor('admin/rfid/edit/'.$data_rfid->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']);
                                            echo anchor('admin/rfid/delete/'.$data_rfid->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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