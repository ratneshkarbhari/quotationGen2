<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Gochiskool Invoicing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/public.min.css') ?>">
</head>
<body>
    <header id="public-header">

        <nav>
            <div class="nav-wrapper black">

                <div class="container">
                
                <ul id="slide-out" class="sidenav">
                    <li><div class="user-view" style="display: none;">
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    </div></li>

                    <li><a href="https://www.youtube.com/watch?v=v5l7h7NGHY4">How to use?</a></li>
                    <li><a href="mailto:info@pthgroup.in">Contact Admin</a></li>
                    <li><a href="mailto:codesevaco@gmail.com">Contact Developer</a></li>
                </ul>
                
        
                <a href="<?php echo site_url(); ?>" class="brand-logo left"><img src="<?php echo site_url('assets/images/logo.png'); ?>" style="width: 30%;"></a>
                <a href="#" data-target="slide-out" class="sidenav-trigger right" style="margin: none !important;"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="https://www.youtube.com/watch?v=v5l7h7NGHY4">How to use?</a></li>
                    <li><a href="mailto:info@pthgroup.in">Contact Admin</a></li>
                    <li><a href="mailto:codesevaco@gmail.com">Contact Developer</a></li>
                </ul>
                
                </div>

                
            </div>
        </nav>
    
    </header>