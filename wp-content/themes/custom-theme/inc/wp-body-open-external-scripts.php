<?php

    if(!function_exists('wp-body-open')){
        $hook_name = "wp-body-open";
        $function_name = "setup_wp_open_body";
    }

    function setup_wp_open_body($hook_name, $function_name)
    {
        do_action($hook_name, $function_name);
    }


    /*
    * Insert Google Tag Manager right after body open tag
    * @link       https://marcobrughi.com
    *
    * @author     Marco Brughi <marco.brughi@mail.com>
    *
    * NB: Change Code with your's
    */
    function mb_add_after_body_code() {
        echo '<!-- Google Tag Manager (noscript) -->
                <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXX"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            ';
    }
    // add_action( 'wp_body_open', 'mb_add_after_body_code' );   