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

        <link rel="stylesheet" href="<?php echo site_url(CSS.'app.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url(CSS.'main.css'); ?>">

        <?= $before_head; ?>

        <script src="<?php echo site_url(JS.'vendor/modernizr-2.8.3.min.js'); ?>"></script>
    </head>
    <body class="page-container-boxed">

        <!-- The Content -->
        <div class="page-container">

            <!-- The Sidebar
            <?php $this->load->view('templates/_parts/public_master_sidebar_view'); ?>

                <!-- PAGE CONTENT -->
                <div class="page-content">

                    <!-- The Header -->
                    <?php $this->load->view('templates/_parts/public_master_header_view'); ?>

                    <!-- PAGE CONTENT WRAPPER -->
                    <div class="page-content-wrap">
                        <?= $the_view_content; ?>

                        <!-- The Footer -->
                        <?php $this->load->view('templates/_parts/public_master_footer_view'); ?>
                    </div>
                    <!-- END PAGE CONTENT WRAPPER -->

            </div>
            <!-- END PAGE CONTENT -->
        </div>

        <script>window.jQuery || document.write('<script src="<?php echo site_url(JS.'vendor/jquery-1.12.0.min.js'); ?>"><\/script>')</script>
        <script src="<?php echo site_url(JS.'vendor/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'bootstrap/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'moment/moment.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'moment/moment-with-locales.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'plugins.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'actions.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'route.js'); ?>"></script>

        <?= $before_body; ?>
    </body>


</html>