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
<div class="page-sidebar scroll">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation x-navigation-custom">
        <li class="xn-logo">
            <a href="#">UNLEASHED</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="" class="profile-mini">
                <img src="<?php echo site_url('assets/demo/avatar.jpg'); ?>" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo site_url('assets/demo/avatar.jpg'); ?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">Lab. <?= $laboratorium->nama_laboratorium; ?></div>
                    <div class="profile-data-title"><?= $ip_address; ?></div>
                </div>
            </div>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->