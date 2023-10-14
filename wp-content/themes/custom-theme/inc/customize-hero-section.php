<?php
    
// Setup Hero Section 
function customize_hero_section($wp_customize)
{
    // Adding Title
    // Set customizer section info
    $wp_customize->add_section('sec_hero', array(
        'title' => __('Hero Settings', 'setup_english'),
        'description' => "You can customize your title from here",
    ));

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_title', array(
        'default' => 'Please, add title',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field'

    ));

    // Set customizer control info
    $wp_customize->add_control('set_hero_title', array(
        'label' => 'Hero Title',
        'section' => 'sec_hero',
        'type' => 'text',
    ));


    // Adding Subtitle

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_subtitle', array(
        'default' => 'Please, add subtitle',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_textarea_field'

    ));

    // Set customizer control info
    $wp_customize->add_control('set_hero_subtitle', array(
        'label' => 'Hero SubTitle',
        'section' => 'sec_hero',
        'type' => 'textarea',
    ));



    // Adding Button Text

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_button_text', array(
        'default' => 'Please, add button text',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field'

    ));

    // Set customizer control info
    $wp_customize->add_control('set_hero_button_text', array(
        'label' => 'Hero Button Text',
        'section' => 'sec_hero',
        'type' => 'text',
    ));


    // Adding Button Link

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_button_link', array(
        'default' => '/',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'

    ));

    // Set customizer control info
    $wp_customize->add_control('set_hero_button_link', array(
        'label' => 'Hero Button Hyperlink',
        'section' => 'sec_hero',
        'type' => 'button',
    ));


    // Adding Height

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_height', array(
        'default' => 800,
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint'

    ));

    // Set customizer control info
    $wp_customize->add_control('set_hero_height', array(
        'label' => 'Hero Section Height',
        'section' => 'sec_hero',
        'type' => 'number',
    ));


    // Adding Height

    // Set customizer settings info
    $wp_customize->add_setting('set_hero_backimage', array(
        'default' => '',
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint'

    ));

    // Set customizer control info
    $wp_customize->add_control( new WP_Customize_Media_Control(
        $wp_customize, 
        'set_hero_backimage', 
            array(
                'label' => 'Hero Image',
                'section' => 'sec_hero',
                'mime_type' => 'image',
            )
        )
    );
}

add_action('customize_register', 'customize_hero_section');