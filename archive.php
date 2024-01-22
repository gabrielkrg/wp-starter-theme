<?php

get_header();

$showed_posts = [];

$queried_object = get_queried_object();

$taxonomy = $queried_object->taxonomy;
$tax_id = $queried_object->term_id;
$tax_slug = $queried_object->slug;
$name = $queried_object->name;

?>

<section id="archive" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="title">
                    <?= $name; ?>
                </h1>

                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged,
                    'post__not_in' => $showed_posts,
                    'tax_query' => array(
                        array(
                            'taxonomy'  => $taxonomy,
                            'field'     => 'term_id',
                            'terms'     => $tax_id
                        )
                    ),
                    // Add more parameters as needed
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();

                        $showed_posts[] = get_the_ID();

                        $post_id = get_the_ID();
                        $link = get_the_permalink();
                        $thumbnail = get_the_post_thumbnail($post_id, 'custom-size');
                        $title = get_the_title($post_id);
                        $excerpt = get_the_excerpt($post_id);
                        $date = get_the_date();

                        $category = get_the_category();
                        $tags = get_the_tags();

                        $post_author_id = get_post_field('post_author', get_the_ID());
                        $author = get_the_author_meta('display_name', $post_author_id);

                        get_template_part('partials/simple-post', null, [
                            'post_id' => $post_id,
                            'link' => $link,
                            'thumbnail' => $thumbnail,
                            'title' => $title,
                            'excerpt' => $excerpt,
                            'category' => $category,
                            'tag' => $tag,
                            'date' => $date,
                            'author' => $author,
                        ]);
                    }

                    echo '<div class="pagination">';

                    echo paginate_links(array(
                        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total'        => ($query->max_num_pages > 99) ? '99' :  $query->max_num_pages,
                        'current'      => max(1, get_query_var('paged')),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text' => '&#129092;',
                        'next_text' => '&#129094;',
                        'add_args'     => false,
                        'add_fragment' => '',
                    ));

                    echo '</div>';
                } else {
                    // No posts found
                }

                // Restore original post data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
