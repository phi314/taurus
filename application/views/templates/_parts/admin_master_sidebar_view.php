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
                <img src="<?php echo site_url('assets/img/logo-small.png'); ?>" alt="<?= $current_user->name; ?>"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo site_url('assets/img/logo-small.png'); ?>" alt="<?= $current_user->name; ?>"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?= $current_user->name; ?></div>
                </div>
            </div>
        </li>
        <?= $current_user_menu; ?>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->