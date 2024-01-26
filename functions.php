<?php

/**
 * Remove Emoji
 */
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/**
 * Add title tag to the head
 */
add_action('after_setup_theme', 'setup_theme');
function setup_theme()
{
    add_theme_support('title-tag');
}

/**
 * Thumbnail support
 */
add_theme_support('post-thumbnails');

/**
 * Register a custom image size
 */
add_action('after_setup_theme', 'custom_theme_add_custom_image_size');
function custom_theme_add_custom_image_size()
{
    add_image_size('custom-size', 350, 230, true); // Adjust width, height, and crop parameters as needed
    add_image_size('large-post-thumbnail', 850, 400, true); // Adjust width, height, and crop parameters as needed
}

/**
 * Register multiple menus
 */
add_action('after_setup_theme', 'custom_theme_register_menus');
function custom_theme_register_menus()
{
    register_nav_menus(
        array(
            'primary_menu'   => esc_html__('Primary Menu', 'custom-theme'),
            'secondary_menu' => esc_html__('Secondary Menu', 'custom-theme'),
            'footer_menu'    => esc_html__('Footer Menu', 'custom-theme'),
            // Add more menus as needed
        )
    );
}

/**
 * Register custom scripts
 */
add_action('wp_enqueue_scripts', 'custom_theme_register_scripts');
function custom_theme_register_scripts()
{
    $ver = '1.0';

    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), $ver, array(
        'in_footer' => true,
    ));

    // load scripts only on single page
    if (is_single()) {

        wp_enqueue_script('wpdocs-fancyapps-script', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), $ver, array(
            'in_footer' => true,
        ));

        wp_enqueue_script(
            'fancy-gallery',
            get_template_directory_uri() . '/js/fancy-gallery.js',
            array('jquery'),
            $ver,
            array(
                'in_footer' => true,
                'strategy' => 'defer'
            )
        );
    }
}

/**
 * Register custom styles
 */
add_action('wp_enqueue_scripts', 'custom_theme_register_styles');
function custom_theme_register_styles()
{
    $ver = '1.0';

    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/styles.min.css', array(), $ver);

    // load scripts only on single page
    if (is_single()) {
        wp_enqueue_style('wpdocs-fancyapps-style', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), $ver);
    }
}


/**
 * Filtro de busca
 */
add_filter('pre_get_posts', 'search_filter');
function search_filter($query)
{
    if (!is_admin()) {
        if ($query->is_search) {
            $query->set('post_type', array('post'));
        }
        return $query;
    }
}
