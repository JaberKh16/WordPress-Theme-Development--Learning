
<?php
/*
*   Theme Related Functions
*
*/

// theme title
add_theme_support('title-tag');

// to remove body class
function remove_admin_bar_body_class($classes) {
    if (is_admin_bar_showing()) {
        // Check if the admin bar is showing, and if so, remove the class
        $key = array_search('admin-bar', $classes);
        if ($key !== false) {
            unset($classes[$key]);
        }
    }
    return $classes;
}

add_filter('body_class', 'remove_admin_bar_body_class', 20);



// function enqueing_theme_style_css_and_js()
// {
    
//     // registering theme custom stylesheet - for wordpress custom stylesheet
//     // wp_register_style('register_handle_name', src, array $dependancy, 'verison', 'devicemapper');
//     wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'css/bootstrap.css', array(), '5.3.2', 'all');
//     // registering theme custom stylesheet - for wordpress custom js file
//     // array('jquery') as the dependency for the JavaScript file ensures that jQuery is loaded before Bootstrap, as Bootstrap relies on jQuery.
//     wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'js/bootstrap.bundle.js', array('jquery'), '5.3.2', true);
//     // registering theme custom stylesheet - for wordpress bootstrap stylesheet
//     // here '1.0.0' is the theme version we have setted
//     wp_register_style('theme_custom_stylesheet', get_template_directory_uri().'css/custom-style.css', array(), '1.0.0', 'all');
    
    
//     // enqueing theme outline stylesheet - for wordpress known stylesheet
//     wp_enqueue_style('theme_outline_stylesheet', get_stylesheet_uri());
//     // enqueing bootstrap file - for registered bootstrap css file
//     wp_enqueue_style('theme_custom_stylesheet_bootstrap', get_stylesheet_uri());
//     // enqueing bootstrap file - for registered bootstrap js file
//     wp_enqueue_style('theme_custom_scipt_bootstrap', get_stylesheet_uri());
//     // enqueing bootstrap file - for registered bootstrap file
//     wp_enqueue_style('theme_custom_stylesheet', get_stylesheet_uri());

//     // enqueue jquery default file
//     wp_enqueue_script('jquery');

// }

function enqueue_theme_styles_and_scripts()
{
    // Register Bootstrap CSS
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.2', 'all');
    
    // Register Bootstrap JS
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.js', array('jquery'), '5.3.2', true);

    // Register your custom stylesheet
    wp_register_style('custom-style', get_template_directory_uri() . '/css/custom-style.css', array(), '1.0.0', 'all');
    
    // Enqueue your custom stylesheet
    wp_enqueue_style('custom-style');
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');
}

// enqueing theme style and scripts - 'wp_enqueue_scripts' to enqueue multiple scripts
add_action('wp_enqueue_scripts', 'enqueue_theme_styles_and_scripts');


//Upload directory permission setup
// function change_upload_dir_permissions() {
//     $upload_dir = wp_upload_dir(). '/2023/09'; // Get the upload directory path

//     // Define the desired permissions (0755)
//     $permissions = 0755;

//     // Recursive function to change permissions
//     function chmod_recursive($dir, $permissions) {
//         if (is_dir($dir)) {
//             $items = scandir($dir);
//             foreach ($items as $item) {
//                 if ($item != '.' && $item != '..') {
//                     $item_path = $dir . '/' . $item;
//                     if (is_dir($item_path)) {
//                         chmod_recursive($item_path, $permissions);
//                     } else {
//                         chmod($item_path, $permissions);
//                     }
//                 }
//             }
//         }
//     }

//     // Change permissions for the uploads directory and its parent directories
//     chmod_recursive($upload_dir['basedir'].'/2023/09', $permissions);

//     // Output a success message (optional)
//     // echo 'Permissions changed successfully.';
// }

// // Hook the function to run when a specific admin page loads (for demonstration purposes)
// add_action('admin_init', 'change_upload_dir_permissions');

function custom_upload_dir($upload) {
    $year = date('Y');
    $month = date('m');
    $upload['subdir'] = "/$year/$month";
    $upload['path']   = $upload['basedir'] . $upload['subdir'];
    $upload['url']    = $upload['baseurl'] . $upload['subdir'];

    // Check if the directory exists before attempting to create it
    if (!is_dir($upload['path'])) {
        // Define the desired permissions (0755)
        $permissions = 0755;

        // Get the absolute path to the directory
        $absolutePath = ABSPATH . $upload['subdir'];

        // Create the directory with the desired permissions
        mkdir($absolutePath, $permissions, true); // 'true' creates parent directories if they don't exist
    }

    return $upload;
}

add_filter('upload_dir', 'custom_upload_dir');


function create_directory_on_upload()
{
    $directory_path = WP_CONTENT_DIR . '/uploads'; // Path to the directory you want to create

    // Check if the directory exists, and create it if it doesn't
    if (!is_dir($directory_path)) {

        if (wp_mkdir_p($directory_path, 0755)) {
            // Directory created successfully
            echo "Directory created successfully.";
        } else {
            // Failed to create directory
            echo "Failed to create directory.";
        }
    } else {
        // Directory already exists
        echo "Directory already exists.";
    }

}



// function fix_upload_directory_error() {
//     $upload_dir = wp_upload_dir(); // Get the WordPress uploads directory information

//     $target_directory = $upload_dir['basedir'] . '/2023/09'; // Target directory to create

//     // Check if the target directory already exists or if it can be created
//     if ( ! file_exists( $target_directory ) && wp_mkdir_p( $target_directory ) ) {
//         // Directory created successfully
//         return true;
//     } else {
//         // Directory creation failed
//         return false;
//     }
// }

// // Hook into WordPress to check and create the directory when needed
// add_action( 'admin_init', 'fix_upload_directory_error' );



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


// Add CDN Links
function add_google_fonts_cdn_link()
{
    wp_enqueue_style('google_font_cdn', "https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;900&family=Fraunces:opsz,wght@9..144,700&family=Montserrat:wght@500&family=Poor+Story&display=swap", false);
}

add_action('wp_enqueue_scripts', 'add_google_fonts_cdn_link');


// Register Menu
register_nav_menu('main_menu', __('Main Menu', 'setup_english'));

