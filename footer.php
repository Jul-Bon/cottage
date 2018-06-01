<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cottage
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="info">
        <div class="container clearfix">
            <div class="footer_logo"><img src="<?php echo get_theme_mod('img-logo'); ?>" alt="Cottage Plus"></div>
            <p class="footer_description"><?php echo get_theme_mod('footer_description'); ?></p>
            <div class="footer_phone">
                <h6><?php echo get_theme_mod('phones_title'); ?></h6>
                <span><?php echo get_theme_mod('phone_numbers'); ?></span>
            </div>
            <div class="footer_address">
                <h6><?php echo get_theme_mod('address_title'); ?></h6>
                <span><?php echo get_theme_mod('address'); ?></span>
                <a href="<?php echo get_theme_mod('url_map_button'); ?>" class="view_map"><?php echo get_theme_mod('map_button'); ?></a>
            </div>

            <a href="tel:<?php echo get_theme_mod('url_button'); ?>" class="contact_us"><?php echo get_theme_mod('text_button'); ?></a>
        </div>
    </div>

    <div class="copyright">
        <div class="container clearfix">
            <span class="copy_text"><?php echo get_theme_mod('footer_copy'); ?></span>
            <div class="social_menu">
                <?php wp_nav_menu('menu=Social Menu'); ?>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
