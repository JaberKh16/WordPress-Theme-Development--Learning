<?php

/*
*   $wp_customize ==> An instance of WordpPress Customize Manger Class which handles the customization of
*                     section, control and panels.
*   $wp_options ==> An table used by $wp_customize to add necessary data. To check theme_mods() to check for the data.
*
*/

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


// Setup Header Logo
function customize_header_logo_on_theme_customization($wp_customize)
{
    // Create a new directory inside the uploads directory (e.g., 'header_logos')
    $custom_new_directory = wp_upload_dir()['basedir'] . '/custom-uploads/';
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
        'default' => get_template_directory_uri() . '/custom-uploads/image-1.png', // Set a default image
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
    $wp_customize->get_setting('logo_setting')->upload_url_path = wp_upload_dir()['baseurl'] . '/custom-uploads/'; // Set URL for the custom directory

}

// add_action('customize_register', 'customize_header_logo_on_theme_customization');

// Setup Menu Position
function customize_menu_position_on_theme_customization($wp_customize)
{
    
    // Menu Position Setup
    // Set customizer section info
    $wp_customize->add_section('menu_position_customize', array(
        'title' => __('Menu Position', 'setup_english'),
        'description' => "You can customize your menu position from here"
    ));

    // Set customizer settings info
    $wp_customize->add_setting('menu_position_setting', array(
        'default' => 'right_menu', // Set a default menu position
    ));

    // Set customizer control info
    $wp_customize->add_control('menu_position_setting', array(
        'label' => 'Menu Position Setup',
        'section' => 'menu_position_customize',
        'setting' => 'menu_position_setting',
        'type' => 'radio',
        'choices' => array(
            'left_menu' => 'Left Menu',
            'right_menu' => 'Right Menu',
            'center_menu' => 'Center Menu',
        ),
    ));
}

add_action('customize_register', 'customize_menu_position_on_theme_customization');



// setup footer 
function customize_footer_on_theme_customization($wp_customize)
{
    
    // Menu Position Setup
    // Set customizer section info
    $wp_customize->add_section('footer_copyright_customize', array(
        'title' => __('Footer Option', 'setup_english'),
        'description' => "You can customize your foooter copyright from here"
    ));

    // Set customizer settings info
    $wp_customize->add_setting('footer_copyright_setting', array(
        'default' => '&copy; Copyright 2023 | All right reserved.', // Set a default menu position
    ));

    // Set customizer control info
    $wp_customize->add_control('footer_copyright_setting', array(
        'label' => 'Footer Copyright',
        'section' => 'footer_copyright_customize',
        'setting' => 'footer_copyright_setting',
    ));
}

add_action('customize_register', 'customize_footer_on_theme_customization');