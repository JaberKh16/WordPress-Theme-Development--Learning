<?php


// To Set Walker Menu
function setup_walker_nav_menu($item_output, $item, $args)
{
    // if description related to nav menu is not empty
    if(!empty($item->description)){
        $item_output = str_replace($args->link_after. '</a>', '<span class="walker_nav">'.$item->description .'</span>'
            . $args->link_after. '</a>', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'setup_walker_nav_menu', 10, 3);