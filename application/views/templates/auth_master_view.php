<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?= $page_title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo site_url(CSS.'admin/app.css'); ?>"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">

                    <?= $the_view_content; ?>

                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?= date('Y'); ?> Unleashed Framework
                    </div>
                    <div class="pull-right">
                        <a href="<?= site_url(); ?>">Home</a> |
                        <a href="<?= site_url('admin'); ?>">Admin</a> |
                        <a href="<?= site_url('dosen'); ?>">Dosen</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






