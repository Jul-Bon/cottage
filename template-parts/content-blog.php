<?php
/**
 * Created by PhpStorm.
 * User: Hi-Tech
 * Date: 24.02.2018
 * Time: 21:08
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="content_part">
        <div class="post-img">
            <?php cottage_post_thumbnail(); ?>
        </div>

        <header class="entry-header blog-title clearfix">
            <div class="post_date">
                <span class="day"><?php the_modified_date('j'); ?></span>
                <span><?php the_modified_date('M</\b\r>Y'); ?></span>
            </div>

            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif; ?>
        </header><!-- .entry-header -->


        <div class="entry-content blog-content">
            <?php
            the_excerpt();


            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'cottage'),
                'after' => '</div>',
            ));
            ?>

            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->

