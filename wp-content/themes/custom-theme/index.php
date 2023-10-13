<?php
    /*
    *   This file is part of index file system
    */
    get_header();
?>

<section id="body-area" class="site-content">
    <div class="container">
        <main class="site-main" id="main">
              <!-- Hero Section -->
            <!-- <section class="hero">Hero</section> -->
              <!-- Services Section -->
            <!-- <section class="services">Services</section> -->
            <!-- Blog Section -->
            <section class="home-blog">
                <div class="container">
                    <div class="row">
                        <!-- Blog Column Section -->
                        <div class="col-md-8">
                            <h1>Search Results:<?php get_search_query(); ?></h1> 
                            <div class="widget-searchbar col-md-3 mt-4 d-inline mb-5 ml-2">
                                <!-- // adding the wordpress search -->
                                <?php get_search_form(); ?>
                            </div>
                            <!-- Post Section -->
                            <div class="post-area">
                                <!-- Blog Items Section -->
                                <div class="blog-items">
                                    <?php if (have_posts() != null) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                        <?php  if("post" == get_post_type()): ?>
                                            <div class="blog-area">
                                                <!-- Your code to display blog content goes here -->
                                                <article>
                                                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    <div class="meta-info">
                                                        <div class="posts-info">
                                                            <p class="post-time">Posted in: <?php echo get_the_date(); ?></p>
                                                            <p class="post-author">Posted By: <?php the_author_posts_link(); ?></p>
                                                            <p class="post-categoyries">Categories: <?php the_category(''); ?></p>
                                                            <p class="post-tags">Tags: <?php the_tags('', ',')?></p>
                                                            <p class="post-content"><?php the_content();?></p>
                                                        </div>
                                                    </div>
                                                </article>
                                                
                                            </div>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <div class="blog-area_thumbnailsandlinks">
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
                        
                        </div>
                        <!-- Sidebar Column Section -->
                        <div class="col-md-4 sidebar-container ml-4" id="sidebar-container">
                            <h2>Sidebar Area</h2>
                            <?php if (is_active_sidebar('sidebar-widget')) : ?>
                                <div id="sidebar" class="widget-area">
                                    <?php dynamic_sidebar('sidebar-widget'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="widget-searchbar col-md-3 mt-4">
                                <!-- // adding the wordpress search -->
                                <?php get_search_form(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</section>

<?php 
    get_footer();
?>