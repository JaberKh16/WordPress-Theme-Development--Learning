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
                                <?php
                                    // get template parts
                                    get_template_part('template-parts/content-posts/template-blog-posts');
                                ?>
                                
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