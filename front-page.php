<?php
/**
 * Created by PhpStorm.
 * User: Hi-Tech
 * Date: 10.03.2018
 * Time: 19:16
 */
get_header(); ?>
    <div id="primary" class="front-content-area">
        <main id="main" class="site-main">

            <?php if (is_front_page()) : ?>

                <section class="presentation">
                    <div class="main_banner"
                         style="background: url('<?php echo get_theme_mod('banner_background'); ?>') no-repeat center/cover">
                        <div class="container">
                            <h2 class="site_title"><?php echo get_theme_mod('site_title'); ?></h2>
                            <p class="site_description"><?php echo get_theme_mod('site_description'); ?></p>
                            <a class="contact_button" href="tel:<?php echo get_theme_mod('url_button'); ?>">
                                <?php echo get_theme_mod('text_button'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="about_company">
                        <div class="container">
                            <p class="company_description"><?php echo get_theme_mod('company_description'); ?></p>
                        </div>
                    </div>
                    <div class="advantages container" id="features">
                        <ul class="advantage_list clearfix">
                            <?php
                            //The query
                            $args = array(
                                'post_type' => 'our_advantages',
                                'order' => 'ASC',
                                'posts_per_page' => 3
                            );
                            $members = new WP_Query($args); ?>

                            <?php if ($members->have_posts()): ?>

                                <!-- The loop -->
                                <?php while ($members->have_posts()) : $members->the_post(); ?>
                                    <?php get_template_part('template-parts/content-advantages', 'advantages'); ?>
                                <?php endwhile; ?>
                                <!-- End of the loop -->

                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </section>

                <section class="our_works container" id="our_works">
                    <div class="headline">
                        <h2><?php echo get_theme_mod('our_works_section_title'); ?></h2>
                        <p><?php echo get_theme_mod('our_works_section_description'); ?></p>
                    </div>

                    <ul class="works_list clearfix">
                        <?php
                        //The query
                        $args = array(
                            'post_type' => 'our_works',
                            'order' => 'ASC',
                            'posts_per_page' => 8
                        );
                        $members = new WP_Query($args); ?>

                        <?php if ($members->have_posts()): ?>

                            <!-- The loop -->
                            <?php while ($members->have_posts()) : $members->the_post(); ?>
                                <?php get_template_part('template-parts/content-our-works', 'our-works'); ?>
                            <?php endwhile; ?>
                            <!-- End of the loop -->

                            <?php wp_reset_query(); ?>
                        <?php endif; ?>
                    </ul>
                </section>

                <section class="reviews" id="reviews"
                         style="background: url('<?php echo get_theme_mod('slider_background'); ?>') no-repeat center/cover">
                    <div class="container">
                        <div class="headline">
                            <h2><?php echo get_theme_mod('reviews_section_title'); ?></h2>
                        </div>
                        <div class="slider">
                            <?php echo do_shortcode('[slick-slider design="design-5" sliderheight="400" show_content="true"]'); ?>
                        </div>
                    </div>
                </section>

            <section class="prices container" id="prices">
                <div class="headline">
                    <h2><?php echo get_theme_mod('prices_section_title'); ?></h2>
                    <p><?php echo get_theme_mod('prices_section_description'); ?></p>
                </div>
                <ul class="price_list clearfix">
                    <?php
                    //The query
                    $args = array(
                        'post_type' => 'prices',
                        'order' => 'ASC',
                        'posts_per_page' => 4
                    );
                    $members = new WP_Query($args); ?>

                    <?php if ($members->have_posts()): ?>

                        <!-- The loop -->
                        <?php while ($members->have_posts()) : $members->the_post(); ?>
                            <?php get_template_part('template-parts/content-prices', 'prices'); ?>
                        <?php endwhile; ?>
                        <!-- End of the loop -->

                        <?php wp_reset_query(); ?>
                    <?php endif; ?>
                </ul>
            </section>

                <section class="faq" id="faq">
                    <div class="container">
                        <div class="headline">
                            <h2><?php echo get_theme_mod('faq_section_title'); ?></h2>
                            <p><?php echo get_theme_mod('faq_section_description'); ?></p>
                        </div>

                        <ul class="faq_list clearfix">
                            <?php
                            //The query
                            $args = array(
                                'post_type' => 'faq',
                                'order' => 'ASC',
                                'posts_per_page' => 4
                            );
                            $members = new WP_Query($args); ?>

                            <?php if ($members->have_posts()): ?>

                                <!-- The loop -->
                                <?php while ($members->have_posts()) : $members->the_post(); ?>
                                    <?php get_template_part('template-parts/content-faq', 'faq'); ?>
                                <?php endwhile; ?>
                                <!-- End of the loop -->

                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
                        </ul>

                    </div>
                </section>

                <section class="short_blog">
                    <div class="container">
                        <div class="headline">
                            <h2><?php echo get_theme_mod('blog_section_title'); ?></h2>
                            <p><?php echo get_theme_mod('blog_section_description'); ?></p>
                        </div>
                        <div class="last_articles clearfix">
                            <?php $catquery = new WP_Query('orderby=date&posts_per_page=2'); ?>

                            <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
                                <div class="article_home clearfix">
                                        <div class="article-img"><?php the_post_thumbnail(); ?></div>
                                        <span class="date"><?php the_modified_date('j</\b\r> M'); ?></span>
                                        <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                        <div class="content_part"><?php the_excerpt(); ?></div>
                                        <a href="<?php the_permalink() ?>" rel="bookmark" class="read_more">Read more</a>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>

                        <a href="<?php echo get_theme_mod('url_blog_button'); ?>" class="read_all"><?php echo get_theme_mod('text_blog_button'); ?></a>

                    </div>
                </section>

            <?php
            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
