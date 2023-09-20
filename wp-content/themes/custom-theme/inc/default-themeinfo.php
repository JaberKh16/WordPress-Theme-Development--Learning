<?php


// theme title
add_theme_support('title-tag');


// thumnail adding for post and page
$supported_for_widgets = array('post', 'page');
add_theme_support('post-thumbnails', $supported_for_widgets);
$thumbnail_image_width = 300;
$thumbnail_image_height = 400;
$thumbnail_image_crop = true;
add_image_size('post-thumbnails', $thumbnail_image_width, $thumbnail_image_height, $thumbnail_image_crop);