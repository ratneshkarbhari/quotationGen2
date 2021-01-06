<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Gochiskool Invoicing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/app.min.css') ?>">
</head>
<body>

    <script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
    <header id="public-header">

        <nav>
            <div class="nav-wrapper black">

                <div style="width: 90%; margin: 0 auto;">
                
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li><div class="user-view" style="border-bottom: 1px solid darkgray; padding-bottom: 3%;">
                    <a href="#name"><span class="black-text name"><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></span></a>
                    </div></li>
                    <li><a href="<?php echo site_url(); ?>">Dashboard</a></li>
                    <li><a href="<?php echo site_url('see-all-items'); ?>">All Items</a></li>
                    <li><a href="<?php echo site_url('change-password'); ?>">Change Password</a></li>
                    <!-- <li><a href="#">Invoices</a></li> -->
                    <li><a href="https://www.youtube.com/watch?v=v5l7h7NGHY4" target="_blank">How to use?</a></li>
                </ul>
                
                <a href="#" data-target="slide-out" class="sidenav-trigger" style="margin: none !important;"><i class="material-icons text-white">menu</i></a>        
                <a href="<?php echo site_url(); ?>" class="brand-logo center">
                <img src="<?php echo site_url('assets/images/logo.png'); ?>" style="width: 40%; margin-top: 2%;">
                <!-- Logo Position -->
                </a>
                <ul id="nav-mobile" class="right">
                    <li>
                        <a href="<?php echo site_url('logout'); ?>"><i class="material-icons">exit_to_app</i></a>   
                    </li>
                </ul>
                
                </div>

                
            </div>
        </nav>
    
    </header>