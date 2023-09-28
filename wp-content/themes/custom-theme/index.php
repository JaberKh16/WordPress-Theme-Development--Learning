<?php
    /*
    *   This file is part of index file system
    */
    get_header();
?>

<section id="body-area" class="site-content">
    <div class="container">
        <main class="site-main" id="main">
            <section class="hero">Hero</section>
            <section class="services">Services</section>
            <section class="home-blog">
                <div class="row">
                    <div class="col-md-9">
                        <div class="post-area">
                            <?php if (have_posts() != null) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="blog-area">
                                        <!-- Your code to display blog content goes here -->
                                        <article>
                                            <h2 class="post-title"><?php the_title(); ?></h2>
                                            <div class="meta-info">
                                                <div class="post-time-and-author">
                                                    <p class="post-time">Posted in: <?php echo get_the_date(); ?></p>
                                                    <p class="post-author">Posted By: <?php the_author_posts_link(); ?></p>
                                                    <p class="post-categoyries">Categories: <?php the_category(''); ?></p>
                                                    <p class="post-tags">Tags: <?php the_tags('', ',')?></p>
                                                    <p class="post-content"><?php the_content();?></p>
                                                </div>
                                            </div>
                                        </article>
                                        
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
                    
                    </div>
                    <div class="col-md-3">
                        <h2>Sidebar Area</h2>
                    </div>
                    <?php the_content(); ?>
                </div>
            </section>
        </main>
    </div>
</section>

<?php 
    get_footer();
?>