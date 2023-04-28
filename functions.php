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
 * Remove acentos no Namespace
 */
add_filter('sanitize_file_name', 'sa_sanitize_spanish_chars', 10);
function sa_sanitize_spanish_chars($filename)
{
    return remove_accents($filename);
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

/**
 * Remove h2 do pagination
 */
add_action('navigation_markup_template', 'sanitize_pagination');
function sanitize_pagination($content)
{
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}

/**
 * Altera a função wp_title()
 */
add_filter('wp_title', 'wpdocs_filter_wp_title', 10, 2);
function wpdocs_filter_wp_title($title, $sep)
{
    global $paged, $page;

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'twentytwelve'), max($paged, $page));

    return $title;
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