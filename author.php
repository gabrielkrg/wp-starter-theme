<?php get_header();

if (!wp_is_mobile()) {
    get_template_part('partials/desktop/author', get_post_format());
} else {
    get_template_part('partials/mobile/author', get_post_format());
}

get_footer();
