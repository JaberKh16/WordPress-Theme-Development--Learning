
<?php
/*
*   Theme Customization Related Functions
*
*/



// setup language internationalization
$text_domain = "setup_english";
load_theme_textdomain($text_domain, get_template_directory() . '/languages/');


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

function customize_header_logo_on_theme_customization($wp_customize)
{
    // Set customizer section info
    $wp_customize->add_section('header_customize', array(
        'title' => __('Header Logo', 'setup_english'),
        'description' => "You can customize your header logo from here"
    ));

    // Set customizer settings info
    $wp_customize->add_setting('logo_setting', array(
        'default' => get_bloginfo('template_directory').'/img/image-1.png'
    ));

    // Set customizer control info
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_setting', array(
        'label' => 'New Logo Upload',
        'section' => 'header_customize',
        'setting' => 'logo_setting'
    )));

    // Handle image upload and directory creation
    if (isset($_FILES['logo_setting']) && $_FILES['logo_setting']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = wp_upload_dir(); // Get the default uploads directory
        var_dump($upload_dir);

        // Create a new directory inside the uploads directory (e.g., 'header_logos')
        $new_directory = trailingslashit($upload_dir['basedir']) . 'header_logos';
        var_dump($new_directory);

        // if the directory doesnt exist 
        if (!file_exists($new_directory)) {
            mkdir($new_directory, 0755, true); // Create the directory with 0755 permissions
        }

        // Generate a unique filename for the uploaded image
        $unique_filename = wp_unique_filename($new_directory, $_FILES['logo_setting']['name']);
        var_dump($unique_filename);

        // Move the uploaded image to the new directory
        $new_file_path = trailingslashit($new_directory) . $unique_filename;
        move_uploaded_file($_FILES['logo_setting']['tmp_name'], $new_file_path);
        var_dump($_FILES['logo_setting']['tmp_name']);

        // Set the value of the logo_setting to the new file path
        set_theme_mod('logo_setting', $new_file_path);
    }
}

add_action('customize_register', 'customize_header_logo_on_theme_customization');