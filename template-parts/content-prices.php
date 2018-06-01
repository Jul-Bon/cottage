<?php
/**
 * Created by PhpStorm.
 * User: Hi-Tech
 * Date: 14.03.2018
 * Time: 11:31
 */
?>

<li class="price_item">
    <div class="object_img"><?php the_post_thumbnail(); ?></div>
    <div class="about_object clearfix">
        <div class="object_headline">
            <h3><?php the_title(); ?></h3>
            <p class="float_price">
                <?php echo get_theme_mod('before_price'); ?>
                <span class="price"><?php the_field('object_price'); ?></span>
                <?php echo get_theme_mod('after_price'); ?>
            </p>
        </div>

        <div class="characteristics"><?php the_content(); ?></div>
        <a class="contact_button" href="tel:<?php echo get_theme_mod('url_button'); ?>">
            <?php echo get_theme_mod('text_button'); ?>
        </a>
    </div>
</li>

