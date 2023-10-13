<?php

    function widget_sidebar_setup()
    {
        register_sidebar(
            array(
                'name' => 'Sidebar Widget',
                'id' => 'sidebar-widget',
                'description' => 'To add the sidebar content',
                'before_widget' => '<div class="widget-wraper">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
    }

    $widget_hook_type = "widgets_init";
    $widget_sidebar_setup_function = "widget_sidebar_setup";
    add_action($widget_hook_type, $widget_sidebar_setup_function);
    
