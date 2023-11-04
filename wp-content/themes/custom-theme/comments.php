<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage custome_theme
 * @since custome_theme 1.9
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */

 /*
* Function Used -
*   a) post_password_required(): This function checks if a post is password protected and if a password is required 
                                 to view the content of the post. It returns true if a password is required.
*
*   b) have_comments(): This condition checks if there are any comments on the post. It returns true if there 
                        are comments to display.

    c) get_comments_number(): This function retrieves the number of comments on the post and 
                              returns that number. It's commonly used to display the comment count.

    d) get_comment_pages_count(): This function is used to check the number of comment pages. If there are  too many
                                  comments to fit on one page, it helps determine the total number of comment pages.

    e) get_option('page_comments'): This function retrieves the value of the "page_comments" option, which determines 
                                    whether comments should be paginated, i.e., split across multiple pages.

    f) comments_open(): This condition checks if comments are open or allowed on the post. It returns true 
                        if comments are open for that post.

    g) comments_close(): This function is not a built-in WordPress function. It should be comments_open() to 
                         check if comments are open.

    h) post_type_supports(get_post_type(), 'comments'): This checks whether the current post type supports comments. 
                                                        It returns true if comments are supported for the post type.

    i) get_post_type(): This function retrieves the post type of the current post. It's often used to determine 
                        the post type to see if it supports comments.

    j) comment_form(): This function generates the comment form to allow users to leave comments. 
*                      You can customize its behavior and appearance by passing an array of arguments 
*                      to configure the form's settings.
*
*/


if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
                $comments_number = get_comments_number();
                if ($comments_number === 1) {
                    _e("One Comment", "setup_english");
                } else {
                    echo esc_html($comments_number) . " " . __("Comments", "setup_english");
                }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>
        <!-- // To handle the comments for pages -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php _e('Comment navigation', 'setup_english'); ?></h2>
                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'setup_english')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'setup_english')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'setup_english'); ?></p>
    <?php endif; ?>

    <!-- // Comment Form Setup -->
    <?php comment_form(array(
        'title_reply' => __('Leave a Comment', 'setup_english'),
        'label_submit' => __('Submit Comment', 'setup_english'),
        'comment_notes_before' => '',
        'comment_notes_after' => '',
    )); ?>

</div>
