<?php

function setup_custom_posts()
{
    // register posts
    register_post_type('Sliders', array(
        'labels' => array(
            'name' => __('Sliders', 'setup_english'),
            'singular_name' => __('Slides', 'setup_english'),
        ),
        'public' => true,
        'show_uri' => true,
        'supports' => array('title', 'editor', 'thumbnails', 'custom-fields'),
        'show_in_rest' => true
    ));

    add_theme_support('post-thumbnails', array('post', 'sliders'));
}

add_action('init', 'setup_custom_posts()');