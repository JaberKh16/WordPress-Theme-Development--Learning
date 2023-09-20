<?php

    function setup_pagination()
    {
        global $wp_query, $wp_rewrite;
        $pages = "";
        $max_pages = $wp_query->max_num_pages;
        if(!$current = get_query_var('paged')){
            $current = 1;
        }
        $args['base'] = str_replace(1111, "%#%", get_pagenum_link(1111));
        $args['total'] = $max_pages;
        $args['current'] = $current;
        $total = 1;
        $args['prev_text'] = 'Prev';
        $args['next_text'] = 'Next';
        if ($max_pages > 1) echo '</pre>
        <div class="wp_pagenav">';
        if ($total == 1 && $max_pages > 1) $pages = '<p class="pages"> Page ' .$current . '<span>of</span>' . $max_pages . '</p>';
        echo $pages . paginate_links($args);
        if ($max_pages > 1 ) echo '</div><pre>';
    }