<?php
    /*
    *   This file is part of index file system
    */
?>
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
    <div class="image-area1">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <!-- // static image showing -->
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/image-1.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="image-area2">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <!-- // dynamic image showing -->
                    <a href=""><img src="<?php echo get_theme_mod('logo_setting'); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    

<!-- to include wp footer -->
<?php wp_footer(); ?>
</body>
</html>