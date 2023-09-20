<?php

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
