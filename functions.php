<?php

/**
 * Remove Emoji
 */
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/**
 * Thumbnail support
 */
add_theme_support('post-thumbnails');

/**
 * Ativa editor de menu no painel
 */
function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');

/**
 * Custom thumbnail sizes
 */
add_image_size('default', 768, 330, true);


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

/**
 * Altera quantidade de caracteres do excerpt
 */
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
function wpdocs_custom_excerpt_length($length)
{
    return 30;
}

/**
 * Ellipsis no excerpt
 */
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more)
{
    return '...';
}