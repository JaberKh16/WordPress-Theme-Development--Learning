<?php
    /*
    *  Template Name: Custom Home Template
    */
 
    get_header();
?>

<?php if(is_home()) : ?>

    <!-- // Hero section related theme mod info -->
    <?php
        $hero_title = get_theme_mod('set_hero_title', 'Please add title');
        $hero_subtitle = get_theme_mod('set_hero_subtitle', 'Please add subtitle');
        $hero_button_text = get_theme_mod('set_hero_button_text', 'Learn More');
        $hero_button_link = get_theme_mod('set_hero_button_link', '#');
        $hero_height = get_theme_mod('set_hero_height', 800);
        $hero_back_image = wp_get_attachment_image(get_theme_mod('set_hero_backimage'));
    ?>

    <!-- Hero Section -->
    <section class="hero-section mb-5" style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/89a5dbac-600c-4ec6-886f-bf464a8f8ea1/dg1c576-2c5ed454-bda0-44fc-bb6e-96e384cf1dfd.png/v1/fill/w_894,h_894,q_70,strp/ghost_rider___johnny_blaze__by_nostalgicsuperfan_dg1c576-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTAyNCIsInBhdGgiOiJcL2ZcLzg5YTVkYmFjLTYwMGMtNGVjNi04ODZmLWJmNDY0YThmOGVhMVwvZGcxYzU3Ni0yYzVlZDQ1NC1iZGEwLTQ0ZmMtYmI2ZS05NmUzODRjZjFkZmQucG5nIiwid2lkdGgiOiI8PTEwMjQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.XW7mNajrFm7AZiaWr0-t4khhM4HRtb6Ibuhr_zS9T6M'); background-size: cover;">
        <div class="overlay" style="max-height:<?php echo $hero_height; ?>px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hero-info">
                        <h1><?php echo $hero_title; ?></h1>
                        <p><?php echo $hero_subtitle; ?></p>
                        <a href="<?php echo $hero_button_link; ?>" class="btn btn-primary p-2 ps-4 pe-4"><?php echo $hero_button_text; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

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
                                    get_template_part('template-parts/content-posts/post-with-Wp_Query.php');
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