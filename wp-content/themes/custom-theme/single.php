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
                    <!-- // get the template parts --
                    <?php
                        get_template_part('template-parts/content-posts/posts'); 
                    ?>
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


