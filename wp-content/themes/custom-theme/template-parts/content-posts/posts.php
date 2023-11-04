<!-- Your code to display blog content goes here -->
<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
<header>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="meta-info">
        <div class="post-info">
            <p class="post-time">Posted in: <?php echo get_the_date(); ?></p>
            <p class="post-author">Posted By: <?php the_author_posts_link(); ?></p>
            <!-- // use of conditional tags -->
            <?php if(has_category()): ?>
                <p class="post-categoyries d-inline">Categories: <?php the_category(''); ?></p>
            <?php endif; ?>
            <?php if(has_tag()): ?>
                <p class="post-tags">Tags: <?php the_tags('', ',')?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="post-content">
        <p class="post-content"><?php the_content();?></p>
    </div>
<header>
</article>
