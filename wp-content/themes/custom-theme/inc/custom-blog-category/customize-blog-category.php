<?php

    function setup_blog_and_category($wp_customize)
    {
        $wp_customize->add_action(
            'sec_blog',
            array(
                'title' => 'Blog Section'
            )
        );

        $wp_customize->add_setting(
            'set_posts_per_page',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint' 
            )
        );

        $wp_customize->add_control(
            'set_posts_per_page',
            array(
                'label' => 'Post Per Page',
                'description' => 'How many post items you want to display in postlist?',
                'section' => 'sec_blog',
                'type' => 'number',
            )
        );


        // post category include
        $wp_customize->add_setting(
            'set_category_include',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field' 
            )
        );

        $wp_customize->add_control(
            'set_category_include',
            array(
                'label' => 'Post Categories To Include',
                'description' => 'Comma Separated Values Or Single Category ID',
                'section' => 'sec_blog',
                'type' => 'text',
            )
        );

        // post category exclude
        $wp_customize->add_setting(
            'set_category_exclude',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field' 
            )
        );

        $wp_customize->add_control(
            'set_category_exclude',
            array(
                'label' => 'Post Categories To Exclude',
                'description' => 'Comma Separated Values Or Single Category ID',
                'section' => 'sec_blog',
                'type' => 'text',
            )
        );
    }

    $hook_name = "customize_register";
    $function_name = "setup_blog_and_category"; 
    add_action($hook_name, $function_name);