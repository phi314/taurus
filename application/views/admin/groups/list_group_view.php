<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/11/16
 * Time: 1:43 PM
 */
?>

<!-- The Breadcrumb -->
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
    <li class="active">Groups</li>
</ul>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $page_title; ?></h3>
                <ul class="panel-controls">
                    <li><a class="" href="<?php echo site_url('admin/groups/create'); ?>"><i class="fa fa-plus"></i></a> </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($groups)):
                                foreach($groups as $group):
                                ?>
                                    <tr>
                                        <td><?php echo $group->id; ?></td>
                                        <td><?php echo anchor('admin/users/index/'.$group->id, $group->name); ?></td>
                                        <td><?php echo $group->description; ?></td>
                                        <td><?php echo anchor('admin/groups/edit/'.$group->id, '<i class="fa fa-pencil"></i>',  ['class'=>'btn btn-link btn-xs']); ?>
                                            <?php
                                            if(!in_array($group->name, ['admin', 'mahasiswa', 'dosen']))
                                            {
                                                echo anchor('admin/groups/delete/'.$group->id, '<i class="fa fa-remove"></i>', ['class'=>'btn btn-link btn-xs']);
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