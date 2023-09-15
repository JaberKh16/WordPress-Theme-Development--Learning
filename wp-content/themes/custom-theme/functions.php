
<?php
/*
*   Theme Related Functions
*
*/

// theme title
add_theme_support('title-tag');


// enqueing theme style and scripts - 'wp_enqueue_scripts' to enqueue multiple scripts
add_action('wp_enqueue_scripts', 'enqueing_theme_style_css_and_js');
function enqueing_theme_style_css_and_js()
{
    
    // registering theme custom stylesheet - for wordpress custom stylesheet
    // wp_register_style('register_handle_name', src, array $dependancy, 'verison', 'devicemapper');
    wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'css/bootstrap.css', array(), '5.3.2', 'all');
    // registering theme custom stylesheet - for wordpress custom js file
    // array('jquery') as the dependency for the JavaScript file ensures that jQuery is loaded before Bootstrap, as Bootstrap relies on jQuery.
    wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'js/bootstrap.bundle.js', array('jquery'), '5.3.2', true);
    // registering theme custom stylesheet - for wordpress bootstrap stylesheet
    // here '1.0.0' is the theme version we have setted
    wp_register_style('theme_custom_stylesheet', get_template_directory_uri().'css/custom-style.css', array(), '1.0.0', 'all');
    
    
    // enqueing theme outline stylesheet - for wordpress known stylesheet
    wp_enqueue_style('theme_outline_stylesheet', get_stylesheet_uri());
    // enqueing bootstrap file - for registered bootstrap css file
    wp_enqueue_style('theme_custom_stylesheet_bootstrap', get_stylesheet_uri());
    // enqueing bootstrap file - for registered bootstrap js file
    wp_enqueue_style('theme_custom_scipt_bootstrap', get_stylesheet_uri());
    // enqueing bootstrap file - for registered bootstrap file
    wp_enqueue_style('theme_custom_stylesheet', get_stylesheet_uri());

    // enqueue jquery default file
    wp_enqueue_script('jquery');

}

add_action('customize_register', 'customize_header_logo_on_theme_customization');
// function customize_header_logo_on_theme_customization($wp_customize)
// {
//     // Set customizer section info
//     $wp_customize->add_section('header_customize', array(
//         'title' => __('Header Logo', 'setup_english'),
//         'description' => "You can customize your header logo from here"
//     ));

//     // Set customizer settings info
//     $wp_customize->add_setting('logo_setting', array(
//         'default' => get_bloginfo('template_directory').'/img/image-1.png'
//     ));

//     // Set customizer control info
//     $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_setting', array(
//         'label' => 'New Logo Upload',
//         'section' => 'header_customize',
//         'setting' => 'logo_setting'
//     )));

//     // Handle image upload and directory creation
//     if (isset($_FILES['logo_setting']) && $_FILES['logo_setting']['error'] === UPLOAD_ERR_OK) {
//         $upload_dir = wp_upload_dir(); // Get the default uploads directory

//         // Create a new directory inside the uploads directory (e.g., 'header_logos')
//         $new_directory = trailingslashit($upload_dir['basedir']) . 'header_logos';

//         if (!file_exists($new_directory)) {
//             mkdir($new_directory, 0755, true); // Create the directory with 0755 permissions
//         }

//         // Generate a unique filename for the uploaded image
//         $unique_filename = wp_unique_filename($new_directory, $_FILES['logo_setting']['name']);

//         // Move the uploaded image to the new directory
//         $new_file_path = trailingslashit($new_directory) . $unique_filename;
//         move_uploaded_file($_FILES['logo_setting']['tmp_name'], $new_file_path);

//         // Set the value of the logo_setting to the new file path
//         set_theme_mod('logo_setting', $new_file_path);
//     }
// }
function customize_header_logo_on_theme_customization($wp_customize)
{
    // Create a new directory inside the uploads directory (e.g., 'header_logos')
    $custom_new_directory = wp_upload_dir()['basedir'] . '/custom-uploads/header_logos';
    var_dump($custom_new_directory);

    if (!file_exists($custom_new_directory)) {
        mkdir($custom_new_directory, 0755, true); // Create the directory with 0755 permissions
    }

    // Set customizer section info
    $wp_customize->add_section('header_customize', array(
        'title' => __('Header Logo', 'setup_english'),
        'description' => "You can customize your header logo from here"
    ));

    // Set customizer settings info
    $wp_customize->add_setting('logo_setting', array(
        'default' => get_template_directory_uri() . '/custom-uploads/header_logos/image-1.png', // Set a default image
    ));

    // Set customizer control info
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_setting', array(
        'label' => 'New Logo Upload',
        'section' => 'header_customize',
        'setting' => 'logo_setting',
        'mime_type' => 'image', // Ensure only image files can be uploaded
        'button_labels' => array(
            'select' => 'Select Image',
            'remove' => 'Remove Image',
            'change' => 'Change Image',
        ),
    )));

    // Define a custom upload directory for the image setting
    $wp_customize->get_setting('logo_setting')->transport = 'postMessage'; // Enable live preview
    $wp_customize->get_setting('logo_setting')->override = true; // Enable custom directory handling
    $wp_customize->get_setting('logo_setting')->upload_dir = $custom_new_directory; // Set custom upload directory path
    $wp_customize->get_setting('logo_setting')->upload_url_path = wp_upload_dir()['baseurl'] . '/custom-uploads/header_logos/'; // Set URL for the custom directory
}




