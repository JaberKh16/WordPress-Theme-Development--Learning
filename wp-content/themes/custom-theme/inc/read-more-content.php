<?php

    function setup_excerpt_read_more($post)
    {
        $content = '<br><br><a href="'.get_permalink($post->ID).'">'.'Read More'.'</a>';
        return $content;
    }

    $hook_name1 = 'excerpt_more';    
    $function_name_excerpt_content = 'setup_excerpt_read_more';
    add_filter($hook_name1, $function_name_excerpt_content);

    function setup_excerpt_read_more_length($length)
    {
        // 40 words to see
        $content_length = 40;
        return $content_length;
    }

    $hook_name2 = 'excerpt_length';    
    $function_name_excerpt_content_length = 'setup_excerpt_read_more_length';
    add_filter($hook_name2, $function_name_excerpt_content_length);