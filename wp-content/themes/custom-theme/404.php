<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Custom Theme
 * @since custom theme 1.9
 */

get_header();
?>
	<div class="error-code">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="page-header alignwide">
						<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'setup_english' ); ?></h1>
					</header>

					<div class="error-404 not-found default-max-width">
						<div class="page-content">
							<p><?php esc_html_e( 'Try a search?', 'setup_english' ); ?></p>
							<!-- // get the search -->
							<?php get_search_form(); ?>
						</div>
					</div>
					<div class="recent-post">
						<?php
							the_widget
							(
								'WP_Widget_Recent_Posts', 
								array(
									'title' => __( 'Latest Posts'),
									'number' => 3
								)
							); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<?php
get_footer();
