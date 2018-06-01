<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cottage
 */

get_header();
?>

    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', get_post_type());

                endwhile; // End of the loop.
                ?>
                <aside>
                    <?php
                    the_post_navigation(array(
                        'next_text' =>
                            '<span class="meta-nav " aria-hidden="true"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></span> ',
                        'prev_text' =>
                            '<span class="meta-nav" aria-hidden="true"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></span> '

                    ));


                    get_template_part('template-parts/content-related-post', get_post_type());
                    ?>
                </aside>
            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>

<?php
get_footer();
