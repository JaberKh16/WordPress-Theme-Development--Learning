<?php
 
// function enqueing_theme_style_css_and_js()
// {
    
//     // registering theme custom stylesheet - for wordpress custom stylesheet
//     // wp_register_style('register_handle_name', src, array $dependancy, 'verison', 'devicemapper');
//     wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), '5.3.2', 'all');
//     // registering theme custom stylesheet - for wordpress custom js file
//     // array('jquery') as the dependency for the JavaScript file ensures that jQuery is loaded before Bootstrap, as Bootstrap relies on jQuery.
//     wp_register_style('theme_custom_stylesheet_bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.js', array('jquery'), '5.3.2', true);
//     // registering theme custom stylesheet - for wordpress bootstrap stylesheet
//     // here '1.0.0' is the theme version we have setted
//     wp_register_style('theme_custom_stylesheet', get_template_directory_uri().'/assets/css/custom-style.css', array(), '1.0.0', 'all');
    
    
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
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.3.2', 'all');
    
    // Register Bootstrap JS
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets//js/bootstrap.bundle.js', array('jquery'), '5.3.2', true);

    // Register your custom stylesheet
    wp_register_style('custom-style', get_template_directory_uri() . '/assets//css/custom-style.css', array(), '1.0.0', 'all');
    
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



// Add CDN Links
function add_google_fonts_cdn_link()
{
    wp_enqueue_style('google_font_cdn', "https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;900&family=Fraunces:opsz,wght@9..144,700&family=Montserrat:wght@500&family=Poor+Story&display=swap", false);
}

add_action('wp_enqueue_scripts', 'add_google_fonts_cdn_link');
