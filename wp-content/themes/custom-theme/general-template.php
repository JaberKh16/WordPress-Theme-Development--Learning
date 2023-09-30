<?php
    /*
    *  Template Name: General Template
    */
    get_header();
?>

<section id="body-area" class="site-content">
    <div class="container">
        <main class="site-main" id="main">
              <!-- Blog Section -->
            <section class="general-template-blog">
                <div class="container">
                    <div class="row">
                        <!-- Blog Column Section -->
                        <div class="col-md-9">
                            <!-- Post Section -->
                            <div class="post-area">
                                <!-- Blog Items Section -->
                                <div class="blog-items">
                                    <?php if (have_posts() != null) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <div class="blog-area">
                                                <!-- Your code to display blog content goes here -->
                                                <article>
                                                    <h1 class="post-title"><?php the_title(); ?></h1>
                                                    <div class="meta-info">
                                                        <div class="post-time-and-author">
                                                            <p class="post-content"><?php the_content();?></p>
                                                        </div>
                                                    </div>
                                                </article>
                                                
                                            </div>
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
                        <div class="col-md-3">
                            <h2>Sidebar Area</h2>
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