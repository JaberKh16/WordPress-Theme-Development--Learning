<?php

    $post_per_page = get_theme_mod('set_posts_per_page', 3);
    $categories_include = get_theme_mod('set_category_include');
    $categories_exclude = get_theme_mod('set_category_exclude');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'category__in' => array(9,10,5),
        'category__not_in' => array(1)
    );
    $postlist = new WP_Query($args);
?>
    
<?php if($postlist->have_posts()): ?>
    <?php while($postlist->have_posts()): $postlist->the_post(); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>