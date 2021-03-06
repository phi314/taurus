<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $page_title; ?></title>
        <meta name="description" content="<?= @$description; ?>">
        <meta name="author" content="<?= @$author; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" href="<?php echo site_url(CSS.'admin/app.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url(CSS.'admin/main.css'); ?>">

        <?= $before_head; ?>

        <script src="<?php echo site_url(JS.'vendor/modernizr-2.8.3.min.js'); ?>"></script>
    </head>
    <body>

        <!-- The Content -->
        <div class="page-container page-navigation-top-fixed">

            <!-- The Sidebar
            <?php $this->load->view('templates/_parts/admin_master_sidebar_view'); ?>

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- The Header -->
                <?php $this->load->view('templates/_parts/admin_master_header_view'); ?>

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <?= $the_view_content; ?>

                    <!-- The Footer -->
                    <?php $this->load->view('templates/_parts/admin_master_footer_view'); ?>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url('dosen/user/logout'); ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <script>window.jQuery || document.write('<script src="<?php echo site_url(JS.'vendor/jquery-1.12.0.min.js'); ?>"><\/script>')</script>
        <script src="<?php echo site_url(JS.'vendor/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'bootstrap/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'_controller/admin/plugins.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'_controller/admin/actions.js'); ?>"></script>

        <?= $before_body; ?>

    </body>
</html>
