<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $page_title; ?></title>
        <meta name="description" content="<?= $page_description; ?>">
        <meta name="author" content="<?= $page_author; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" href="<?php echo site_url(CSS.'bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url(CSS.'normalize.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url(CSS.'main.css'); ?>">

        <?= $before_head; ?>

        <script src="<?php echo site_url(JS.'vendor/modernizr-2.8.3.min.js'); ?>"></script>
    </head>
    <body>

        <!-- The Header -->
        <?php $this->load->view('templates/_parts/public_master_header_view'); ?>

        <!-- The Content -->
        <?= $the_view_content; ?>

        <!-- The Footer -->
        <?php $this->load->view('templates/_parts/public_master_header_view'); ?>

        <script>window.jQuery || document.write('<script src="<?php echo site_url(JS.'vendor/jquery-1.12.0.min.js'); ?>"><\/script>')</script>
        <script src="<?php echo site_url(JS.'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'plugins.js'); ?>"></script>
        <script src="<?php echo site_url(JS.'main.js'); ?>"></script>

        <?= $before_body; ?>

        <?php
            // Load Google Analytics
            if($google_analytics === TRUE)
            {
                $this->load->view('templates/_parts/google_analytics_view');

            };
        ?>
    </body>
</html>
