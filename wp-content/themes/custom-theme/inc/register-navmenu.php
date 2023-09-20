<?php

    // Register Menu
    register_nav_menus(
        array(
            'primary-menu' =>  __('Main Menu', 'setup_english')    
        )
    );

    // class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
    //     function start_lvl(&$output, $depth = 0, $args = null) {
    //         // Add Bootstrap dropdown-menu class to submenu UL
    //         $indent = str_repeat("\t", $depth);
    //         $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    //     }
    
    //     function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0) {
    //         // Add Bootstrap nav-item class to LI and Bootstrap nav-link class to A
    //         $indent = ($depth) ? str_repeat("\t", $depth) : '';
    //         $li_attributes = '';
    //         $class_names = $value = '';
    //         $classes = empty($item->classes) ? array() : (array) $item->classes;
    //         $classes[] = 'nav-item';
    //         $classes[] = 'nav-item-' . $item->ID;
    //         if ($depth && $args->walker->has_children) {
    //             $classes[] = 'dropdown';
    //         }
    //         $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    //         $class_names = ' class="' . esc_attr($class_names) . '"';
    //         $output .= $indent . '<li' . $class_names . $li_attributes . '>';
    
    //         // Link attributes
    //         $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    //         $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    //         $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    //         $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
    //         $attributes .= ' class="nav-link"'; // Add Bootstrap nav-link class
    //         $item_output = $args->before;
    //         $item_output .= '<a' . $attributes . '>';
    //         $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    //         $item_output .= ($depth == 0 && $args->walker->has_children) ? ' <i class="bi bi-chevron-down"></i></a>' : '</a>';
    //         $item_output .= $args->after;
    //         $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    //     }
    // }

    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
        function start_lvl(&$output, $depth = 0, $args = null) {
            // Add Bootstrap dropdown-menu class to submenu UL
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        }
    
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) { // Updated method signature
            // Add Bootstrap nav-item class to LI and Bootstrap nav-link class to A
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            $li_attributes = '';
            $class_names = $value = '';
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'nav-item';
            $classes[] = 'nav-item-' . $item->ID;
            if ($depth && $args->walker->has_children) {
                $classes[] = 'dropdown';
            }
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';
            $output .= $indent . '<li' . $class_names . $li_attributes . '>';
    
            // Link attributes
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            
            // Check if $args is an array and has 'before' property
            if (is_object($args) && isset($args->before)) {
                $attributes .= ' class="nav-link"'; // Add Bootstrap nav-link class
                $item_output = $args->before;
                $item_output .= '<a' . $attributes . '>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= ($depth == 0 && $args->walker->has_children) ? ' <i class="bi bi-chevron-down"></i></a>' : '</a>';
                $item_output .= $args->after;
                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            } else {
                // Handle the case where $args is not an object with 'before' property
                $output .= '<a' . $attributes . '>';
                $output .= apply_filters('the_title', $item->title, $item->ID);
                $output .= '</a>';
            }
        }
    }
    
    
    
    
    
    
