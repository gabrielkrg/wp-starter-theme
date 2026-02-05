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
 * Register custom scripts and styles with Vite
 */
add_action('wp_enqueue_scripts', 'custom_theme_register_assets');
function custom_theme_register_assets()
{
    $theme_path = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Check if we're in development mode (Vite dev server running)
    // You can also set WP_ENV=development or check for a constant
    $is_dev = defined('WP_ENV') && WP_ENV === 'development';

    // Alternative: check if Vite dev server is accessible
    if (!$is_dev) {
        $vite_response = @file_get_contents('http://localhost:3000', false, stream_context_create([
            'http' => ['timeout' => 1]
        ]));
        $is_dev = $vite_response !== false;
    }

    if ($is_dev) {
        // Development mode - load from Vite dev server
        wp_enqueue_script(
            'vite-client',
            'http://localhost:3000/@vite/client',
            array(),
            null,
            false
        );

        wp_enqueue_script(
            'theme-main',
            'http://localhost:3000/assets/js/main.js',
            array(),
            null,
            true
        );

        wp_enqueue_style(
            'theme-styles',
            'http://localhost:3000/assets/scss/styles.scss',
            array(),
            null
        );
    } else {
        // Production mode - load from dist folder
        $manifest_path = $theme_path . '/dist/.vite/manifest.json';

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);

            // Load main JS
            $main_js_key = 'assets/js/main.js';
            if (isset($manifest[$main_js_key])) {
                $main_js = $manifest[$main_js_key];
                wp_enqueue_script(
                    'theme-main',
                    $theme_uri . '/dist/' . $main_js['file'],
                    isset($main_js['imports']) ? array_map(function ($imp) use ($manifest, $theme_uri) {
                        return $theme_uri . '/dist/' . $manifest[$imp]['file'];
                    }, $main_js['imports']) : array(),
                    null,
                    true
                );
            }

            // Load main CSS
            $main_css_key = 'assets/scss/styles.scss';
            if (isset($manifest[$main_css_key])) {
                $main_css = $manifest[$main_css_key];
                wp_enqueue_style(
                    'theme-styles',
                    $theme_uri . '/dist/' . $main_css['file'],
                    array(),
                    null
                );
            }
        } else {
            // Fallback if manifest doesn't exist
            wp_enqueue_script(
                'theme-main',
                $theme_uri . '/dist/js/main.js',
                array(),
                '1.0',
                true
            );

            wp_enqueue_style(
                'theme-styles',
                $theme_uri . '/dist/css/styles.css',
                array(),
                '1.0'
            );
        }
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
