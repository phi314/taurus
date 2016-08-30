<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/10/16
 * Time: 8:37 PM
 */
?>
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar page-sidebar-fixed scroll">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation x-navigation-custom">
        <li class="xn-logo">
            <a href="<?php echo site_url('admin'); ?>">UNLEASHED</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="<?php echo site_url('admin/user/profile'); ?>" class="profile-mini">
                <img src="<?php echo site_url('assets/demo/avatar.jpg'); ?>" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo site_url('assets/demo/avatar.jpg'); ?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?= $current_user->name; ?></div>
                </div>
            </div>
        </li>
        <li>
            <a href="<?php echo site_url('admin/dashboard'); ?>" title="Dashboard"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <?= $current_user_menu; ?>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->