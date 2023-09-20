<?php
    /*
    *   This file is part of index file system
    */
    get_header();
?>

<section id="body-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <?php if (have_posts() != null) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-area">
                        <!-- Your code to display blog content goes here -->
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="blog-area">
                    <div class="post-thumbnails__area">
                        <!-- <?php echo the_post_thumbnail('post-thumbnails'); ?> -->
                        <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('post-thumbnails');?></a>
                    </div>
                    <div class="post-details__area">
                        <div class="post-title">
                            <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                        </div>
                    </div>
                    <p><?php _e('No post found', 'setup_english'); ?></p>
                    <div id="page_nav">
                    <?php if ('setup_pagination'): ?>
                        <?php  setup_pagination(); ?> 
                    <?php else: ?>
                        <?php next_posts_link(); ?>
                        <?php previous_posts_link(); ?>
                    <?php endif; ?>
                </div>
                </div>
                
            <?php endif; ?>

            </div>
            <div class="col-md-3">
                <h2>Sidebar Area</h2>
            </div>
            <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php 
    get_footer();
?>