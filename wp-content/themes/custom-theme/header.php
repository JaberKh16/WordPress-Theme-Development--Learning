<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo("UTF-8"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- to include wp header -->
    <?php wp_head(); ?>
</head>
<body>
    <?php body_class(); ?>
    <!-- // static image showing -->
    <!-- <div class="image-area1">
        <div class="container">
            <div class="row">
                <div class="col-md-10">

                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/custom-uploads/image-1.png" alt=""></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- // dynamic image showing -->
    <!-- <div class="image-area2">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <a href=""><img src="<?php echo get_theme_mod('logo_setting'); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="menu-area">
        <div class="main-menu">
            <div class="nav-container">
                <nav class="navbar navbar-expand-lg ps-4 pe-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php home_url(); ?>">
                        <img src="<?php get_template_directory_uri().'/assets/images/image-1.png'; ?>" alt="Logo Missing">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse ml-auto justify-content-end me-4" id="navbarSupportedContent">
                    <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Grouping</a></li>
                            <li><a class="dropdown-item" href="#">Self Taught</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Task Based</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Contact Us</a>
                        </li>
                    </ul> -->
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_class' => 'navbar-nav me-auto',
                            'depth' => 2, // 0 mean no restriction, 1 means menu with only one level(no submenu), 2 means atleast one submenu
                            'walker' => new Bootstrap_Walker_Nav_Menu(),
                        ));
                    ?>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary text-white" type="submit">Search</button>
                    </form>
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </div>
    