
<?php
/*
*   Theme Related Functions
*
*/
// include theme title
include_once('inc/default-themeinfo.php');


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