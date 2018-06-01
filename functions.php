<?php
/**
 * cottage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cottage
 */


if (!function_exists('cottage_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cottage_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on cottage, use a find and replace
         * to change 'cottage' to the name of your theme in all the template files.
         */
        load_theme_textdomain('cottage', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_image_size ('cottage-recent-post' , 120, 80, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'cottage'),
        ));

        // add post-formats to post_type 'page'
        add_theme_support('post-formats', array(
            'standard',
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('cottage_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

    }
endif;
add_action('after_setup_theme', 'cottage_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cottage_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('cottage_content_width', 640);
}

add_action('after_setup_theme', 'cottage_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cottage_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'cottage'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'cottage'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'cottage_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cottage_scripts()
{
    wp_enqueue_style('cottage-style', get_stylesheet_uri());

    wp_enqueue_script('cottage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('cottage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cottage_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Configured last posts widget.
 */
require get_template_directory() . '/inc/cottage-resent-post-widget.php';

//Register custom navigation walker

require_once('class-wp-bootstrap-navwalker.php');

// Widget class registration
function my_register_widgets() {
    register_widget( 'WP_Cottage_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'my_register_widgets' );


// Add jQuery and JS.
function jquery_init()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}

// Add template unique style sheet.
function add_cottage_scripts()
{
    //Font-awesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
    //Bootstrap stylesheet.
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), ' ');
    //My styles
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');

    //Bootstrap js
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() .
        '/bootstrap/js/bootstrap.min.js', array('jquery'), ' ');
    //Theme JS
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js');

    //Ajax
    wp_enqueue_script( 'ajax_events', get_stylesheet_directory_uri().( '/js/ajax_events.js' ), array( 'jquery'
    ));
    wp_localize_script( 'ajax_events', 'ajaxevents', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
}

add_action('wp_enqueue_scripts', 'add_cottage_scripts');


//Add a filter to remove the structure [...]
add_filter('excerpt_more', function ($more) {
    return '...';
});

//Function to replace the parameters of the tag cloud
function cottage_tag_cloud($args) {

    $args['format'] = 'list';
    $args['smallest'] = '14';
    $args['largest'] = '14';
    $args['unit'] = 'px';
    return $args;
}

add_filter('widget_tag_cloud_args', 'cottage_tag_cloud');


//Function for post views count
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Ajax load more events
function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts( $args );

    if( have_posts() ) :

        while( have_posts() ): the_post();

            get_template_part('template-parts/content-blog', 'blog');

        endwhile;

    endif;
    die();
}

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');







