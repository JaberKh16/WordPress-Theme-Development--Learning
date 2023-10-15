
<?php
/*
*   Theme Related Functions
*
*/
// include theme title
include_once('inc/default-theme-support-config.php');


// remove body tag
include_once(get_template_directory() . '/inc/remove-bodytag.php');


// enqueue bootstrap, custom libraries
include_once(get_template_directory() . '/inc/enqueue-scripts.php');



// customize menu options
include_once(get_template_directory() . '/inc/customize-options.php');


// custom directory on uploade
include_once(get_template_directory() . '/inc/custom-directoryonupload.php');



// setup primary nav menu
include_once(get_template_directory() . '/inc/register-navmenu.php');


// setup walker menu
include_once(get_template_directory() . '/inc/walker-navmenu.php');



// custom read more setup
include_once(get_template_directory() . '/inc/read-more-content.php');


// setup pagination
include_once(get_template_directory() . '/inc/pagination-setup.php');


// setup custom posts
// include_once(get_template_directory() . '/inc/custom-posts-setup/custom-posts-setup.php');


// setup sidebar widget
include_once(get_template_directory() . '/inc/register-sidebar.php');


// setup wp-open-body for compability with WordPress 5.2 or custom google analytics scripts setup
include_once(get_template_directory() . '/inc/wp-body-open-external-scripts.php');


// setup hero section
include_once(get_template_directory() . '/inc/customize-hero-section.php');


// setup blog/category customizer
// include_once(get_template_directory() . '/inc/custom-blog-category/customize-blog-category.php');


// setup language internationalization
$text_domain = "setup_english";
load_theme_textdomain($text_domain, get_template_directory() . '/languages/');