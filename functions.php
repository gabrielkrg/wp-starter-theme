<?php

/**
 * Remove Emoji
 */
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/**
 * Thumbnail
 */
add_image_size('default', 768, 330, true);


/**
 * Remove acentos no Namespace
 */
function sa_sanitize_spanish_chars($filename)
{
    return remove_accents($filename);
}
add_filter('sanitize_file_name', 'sa_sanitize_spanish_chars', 10);


/**
 * Filtro de busca
 */
function search_filter($query)
{
    if (!is_admin()) {
        if ($query->is_search) {
            $query->set('post_type', array('post'));
        }
        return $query;
    }
}
add_filter('pre_get_posts', 'search_filter');


/**
 * Desativa Guttenberg
 */
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    //if ($post_type !== 'post') return false;
    //return $current_status;
    return false;
}
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);


/**
 * Remove h2 do pagination
 */
function sanitize_pagination($content)
{
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
add_action('navigation_markup_template', 'sanitize_pagination');

/**
 * Altera a função wp_title()
 */
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
add_filter('wp_title', 'wpdocs_filter_wp_title', 10, 2);

/**
 * Altera quantidad de caracteres do excerpt
 */
function wpdocs_custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Ellipsis no excerpt
 */
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// add_action('admin_init', 'cmfc_posts_order');
// function cmfc_posts_order()
// {
//     add_post_type_support('post', 'page-attributes');
// }