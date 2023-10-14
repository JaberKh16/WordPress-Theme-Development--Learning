<!-- get_theme_mod('setting_name', 'Default Value') -->
<footer id="footer-area">
    <section id="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo get_theme_mod('footer_copyright_setting', 'Copyright X-xxxx All right reserved'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'depth' => 1
                            )
                        ); 
                    ?>
                </div>
            </div>
        </div>
    </section>
</footer>

    

<!-- to include wp footer -->
<?php wp_footer(); ?>
</body>
</html>