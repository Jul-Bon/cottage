<?php
/**
 * The template for blog page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cottage
 */

get_header();
?>

    <div class="container">
        <div id="primary" class="content-area">
            <h2 class="main-part-title"><?php echo get_theme_mod('blog_section_title'); ?></h2>
            <main id="main" class="site-main blog_area">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content-blog', 'blog');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <div id="true_loadmore" class="view_more read_all">view more</div>
                    <?php endif; ?>

                <div class="page_counter" id="max_num_pages">4</div>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>


<?php
get_footer();
