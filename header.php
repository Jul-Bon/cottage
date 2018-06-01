<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cottage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'cottage'); ?></a>

    <header id="masthead" class="site-header">
        <div class="top">
            <nav class="navigation_panel container">
                <h1><?php the_custom_logo(); ?></h1>

                <div class="nav_section">
                    <div class="navbar navbar-default main_nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed"
                                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php /* Primary navigation */

                            wp_nav_menu(array(
                                    'menu' => 'Header menu',
                                    'theme_location' => 'primary',
                                    'depth' => 2,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav header_menu',
                                    'menu_id' => '',
                                    //Process nav menu using our custom nav walker
                                    'walker' => new wp_bootstrap_navwalker())
                            );
                            ?>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
                <div class="right-part">
                    <select class="lang">
                        <option value="ukr">ENG</option>
                        <option value="eng">UKR</option>
                    </select>
                    <div class="search"><?php get_search_form(); ?></div>
                </div>
            </nav>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
