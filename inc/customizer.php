<?php
/**
 * cottage Theme Customizer
 *
 * @package cottage
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cottage_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'cottage_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'cottage_customize_partial_blogdescription',
        ));
    }

    //Header settings
    $wp_customize->add_section('header_settings', array(
        'title' => __('Settings for Header ', 'cottage'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('select_lang', array(
            'default' => 'Language',
        )
    );

    $wp_customize->add_control('select_lang',
        array(
            'type' => 'select',
            'label' => '',
            'section' => 'header_settings',
            'choices' => array(
                'english' => 'ENG',
                'ukraine' => 'UKR',
            ),
        )
    );

    //Add settings for the Contact Us button
    $wp_customize->add_section('button', array(
        'title' => __('Settings for the Contact Button', 'cottage'),
        'priority' => 21,
    ));


    $wp_customize->add_setting('text_button', array(
        'default' => __('Button Title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('text_button', array(
        'label' => __('Button settings', 'cottage'),
        'section' => 'button',
        'settings' => 'text_button',
        'type' => 'text',
    ));

    $wp_customize->add_setting('tell_button', array(
        'default' => __('Phone number for button', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('tell_button', array(
        'label' => __('Button phone number', 'cottage'),
        'section' => 'button',
        'settings' => 'tell_button',
        'type' => 'text',
    ));


    //Add settings fo the main Banner
    $wp_customize->add_section('banner', array(
        'title' => __('Settings for the company presentation section ', 'cottage'),
        'priority' => 22,
    ));

    //Site Title
    $wp_customize->add_setting('site_title', array(
        'default' => __('Site title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('site_title', array(
        'label' => __('Headline before the site ', 'cottage'),
        'section' => 'banner',
        'settings' => 'site_title',
        'type' => 'textarea',
    ));

    //Site description
    $wp_customize->add_setting('site_description', array(
        'default' => __('Description of the site', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('site_description', array(
        'label' => __('Description of the site', 'cottage'),
        'section' => 'banner',
        'settings' => 'site_description',
        'type' => 'textarea',
    ));


    //Company description
    $wp_customize->add_setting('company_description', array(
        'default' => __('Company description', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('company_description', array(
        'label' => __('Company description', 'cottage'),
        'section' => 'banner',
        'settings' => 'company_description',
        'type' => 'textarea',
    ));

    //Add settings for the banner background
    $wp_customize->add_setting('banner_background', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'banner_background', array(
        'label' => __('Section Background Image', 'cottage'),
        'section' => 'banner',
        'type' => 'background',
    )));

    //Section OUR WORKS
    $wp_customize->add_section('section_our_works', array(
        'title' => __('Our Works Section ', 'cottage'),
        'priority' => 23,
    ));

    //Section Title
    $wp_customize->add_setting('our_works_section_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('our_works_section_title', array(
        'label' => __('Title for section Our Works ', 'cottage'),
        'section' => 'section_our_works',
        'settings' => 'our_works_section_title',
        'type' => 'text',
    ));

    //Section description
    $wp_customize->add_setting('our_works_section_description', array(
        'default' => __('Section description', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('our_works_section_description', array(
        'label' => __('Description for section Our Works ', 'cottage'),
        'section' => 'section_our_works',
        'settings' => 'our_works_section_description',
        'type' => 'textarea',
    ));

    //Section REVIEWS
    $wp_customize->add_section('section_reviews', array(
        'title' => __('Reviews Section ', 'cottage'),
        'priority' => 24,
    ));

    //Section Title
    $wp_customize->add_setting('reviews_section_title', array(
        'default' => __('Reviews Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('reviews_section_title', array(
        'label' => __('Title for section Reviews ', 'cottage'),
        'section' => 'section_reviews',
        'settings' => 'reviews_section_title',
        'type' => 'text',
    ));

    //Add settings for the slider background
    $wp_customize->add_setting('slider_background', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'slider_background', array(
        'label' => __('Section Background Image', 'cottage'),
        'section' => 'section_reviews',
        'type' => 'background',
    )));


    //SECTION Prices
    $wp_customize->add_section('section_prices', array(
        'title' => __('Prices Section ', 'cottage'),
        'priority' => 25,
    ));

    //Section Title
    $wp_customize->add_setting('prices_section_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prices_section_title', array(
        'label' => __('Title for section Prices ', 'cottage'),
        'section' => 'section_prices',
        'settings' => 'prices_section_title',
        'type' => 'text',
    ));

    //Section description
    $wp_customize->add_setting('prices_section_description', array(
        'default' => __('Section description', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('prices_section_description', array(
        'label' => __('Description for section Prices', 'cottage'),
        'section' => 'section_prices',
        'settings' => 'prices_section_description',
        'type' => 'textarea',
    ));

    //Display cost setting
    //the text is before the price
    $wp_customize->add_setting('before_price', array(
        'default' => __('Before price text', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('before_price', array(
        'label' => __('Enter the text that is before the price ', 'cottage'),
        'section' => 'section_prices',
        'settings' => 'before_price',
        'type' => 'text',
    ));

    //the text is after the price
    $wp_customize->add_setting('after_price', array(
        'default' => __('After price text', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('after_price', array(
        'label' => __('Enter the text after the price ', 'cottage'),
        'section' => 'section_prices',
        'settings' => 'after_price',
        'type' => 'text',
    ));

    //Section FAQ
    $wp_customize->add_section('section_faq', array(
        'title' => __('FAQ Section ', 'cottage'),
        'priority' => 26,
    ));

    //Section Title
    $wp_customize->add_setting('faq_section_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('faq_section_title', array(
        'label' => __('Title for section FAQ ', 'cottage'),
        'section' => 'section_faq',
        'settings' => 'faq_section_title',
        'type' => 'text',
    ));

    //Section description
    $wp_customize->add_setting('faq_section_description', array(
        'default' => __('Section description', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('faq_section_description', array(
        'label' => __('Description for section FAQ ', 'cottage'),
        'section' => 'section_faq',
        'settings' => 'faq_section_description',
        'type' => 'textarea',
    ));

    //Section BLOG
    $wp_customize->add_section('section_blog', array(
        'title' => __('Blog Section ', 'cottage'),
        'priority' => 27,
    ));

    //Section Title
    $wp_customize->add_setting('blog_section_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('blog_section_title', array(
        'label' => __('Title for section Blog ', 'cottage'),
        'section' => 'section_blog',
        'settings' => 'blog_section_title',
        'type' => 'text',
    ));

    //Section description
    $wp_customize->add_setting('blog_section_description', array(
        'default' => __('Section description', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('blog_section_description', array(
        'label' => __('Description for section Blog ', 'cottage'),
        'section' => 'section_blog',
        'settings' => 'blog_section_description',
        'type' => 'textarea',
    ));

    //Section Blog Button
    $wp_customize->add_setting('text_blog_button', array(
        'default' => __('Button text', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('text_blog_button', array(
        'label' => __('Button settings', 'cottage'),
        'section' => 'section_blog',
        'settings' => 'text_blog_button',
        'type' => 'text',
    ));

    $wp_customize->add_setting('url_blog_button', array(
        'default' => __('Url button', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('url_blog_button', array(
        'label' => __('Select a page', 'cottage'),
        'section' => 'section_blog',
        'settings' => 'url_blog_button',
        'type' => 'url',
    ));

    //Add Footer settings
    //Add settings for the copyright field
    $wp_customize->add_section('footer_setting', array(
        'title' => __('Footer settings', 'business'),
        'priority' => 28,
    ));

    $wp_customize->add_setting('footer_copy', array(
        'default' => __('Copyright text', 'business'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('footer_copy', array(
        'label' => __('Footer settings', 'business'),
        'section' => 'footer_setting',
        'settings' => 'footer_copy',
        'type' => 'textarea',
    ));

    //Add settings for footer description
    $wp_customize->add_setting('footer_description', array(
        'default' => __('Description for footer part', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('footer_description', array(
        'label' => __('Description for Footer part ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'footer_description',
        'type' => 'textarea',
    ));

    //Add settings for the contact phone
    $wp_customize->add_setting('phones_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('phones_title', array(
        'label' => __('Title for phone section ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'phones_title',
        'type' => 'text',
    ));

    //Phone numbers
    $wp_customize->add_setting('phone_numbers', array(
        'default' => __('Phone numbers', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('phone_numbers', array(
        'label' => __('Phone numbers ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'phone_numbers',
        'type' => 'textarea',
    ));

    //Add settings for the address
    $wp_customize->add_setting('address_title', array(
        'default' => __('Section title', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('address_title', array(
        'label' => __('Title for address ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'address_title',
        'type' => 'text',
    ));

    //Section description
    $wp_customize->add_setting('address', array(
        'default' => __('Address', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('address', array(
        'label' => __('Address ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'address',
        'type' => 'textarea',
    ));

    //Footer Map Button
    $wp_customize->add_setting('map_button', array(
        'default' => __('Button text', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('map_button', array(
        'label' => __('Button settings', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'map_button',
        'type' => 'text',
    ));

    $wp_customize->add_setting('url_map_button', array(
        'default' => __('Url button', 'cottage'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('url_map_button', array(
        'label' => __('Url for button ', 'cottage'),
        'section' => 'footer_setting',
        'settings' => 'url_map_button',
        'type' => 'url',
    ));

    // Footer-logo
    $wp_customize->add_setting('img-logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'img-logo',
            array(
                'label' => 'Logo',
                'section' => 'footer_setting',
                'settings' => 'img-logo'
            )
        )
    );


}

add_action('customize_register', 'cottage_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cottage_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cottage_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cottage_customize_preview_js()
{
    wp_enqueue_script('cottage-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'cottage_customize_preview_js');
