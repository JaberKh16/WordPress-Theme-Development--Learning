<?php
/*
*  Comment: Page For Single Post Blog
*  Function : 
    a) post_class() --> to get the series of classes for article in WordPress like-  sticky post type styles
    b) the_ID() --> to get the each post id
*/
    get_header();
?>

<div id="primary">
    <div id="main">
        <div class="container">
            <?php
                while( have_posts() ):
                    the_post();
                    ?>
                    <!-- Your code to display blog content goes here -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
                    <header>
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <div class="meta-info">
                            <div class="post-info">
                                <p class="post-time">Posted in: <?php echo get_the_date(); ?></p>
                                <p class="post-author">Posted By: <?php the_author_posts_link(); ?></p>
                                <p class="post-categoyries">Categories: <?php the_category(''); ?></p>
                                <p class="post-tags">Tags: <?php the_tags('', ',')?></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p class="post-content"><?php the_content();?></p>
                        </div>
                    <header>
                    </article>
                <?php
                // comment code
                if( comments_open () || get_comments_number() ){
                    comments_template();
                }
                endwhile;
            ?>
        </div>
    </div>
</div>

<?php
    get_footer();
?>


