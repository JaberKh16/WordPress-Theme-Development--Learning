<?php

// // to remove single body class 'admin-bar'
// function remove_admin_bar_body_class($classes) {
//     if (is_admin_bar_showing()) {
//         // Check if the admin bar is showing, and if so, remove the class
//         $key = array_search('admin-bar', $classes);
//         if ($key !== false) {
//             unset($classes[$key]);
//         }
//     }
//     return $classes;
// }


// add_filter('body_class', 'remove_admin_bar_body_class', 20);


// to remove all body class 'admin-bar'
function remove_body_classes($classes) {

    // List of classes to remove
    $classes_to_remove = array(
        'home',
        'blog',
        'admin-bar',
        'logged-in',
        'no-customize-support',
        ''
    );


    // Remove specified classes
    foreach ($classes_to_remove as $class) {
        if (($key = array_search($class, $classes)) !== false) {
            unset($classes[$key]);
        }
    }

    return $classes;
}

add_filter('body_class', 'remove_body_classes');
