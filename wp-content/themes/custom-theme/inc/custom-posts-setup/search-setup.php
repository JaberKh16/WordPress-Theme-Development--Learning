<?php

    /**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 * 
 * The only parameter here that will be submitted is s with the value of the current search query. However, you can refine it in many ways. For example by only showing posts in the search results. This can be done with the next addition to the form above:
 *    e.g -       <input type="hidden" value="post" name="post_type" id="post_type" />
 */
function wpdocs_my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    <input type="hidden" value="post" name="post_type" id="post_type" />
	</div>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


