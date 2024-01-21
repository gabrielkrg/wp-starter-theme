<?php

get_header();

$author_id = get_the_author_meta('ID');

$author_name = get_the_author_meta('display_name', $author_id);
$author_description = get_the_author_meta('description', $author_id);
$author_image = get_avatar($author_id, 100);
?>

<section id="author" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1>
                    <?= $author_name; ?>
                </h1>
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged,
                    'author' => $author_id,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    echo '<ul>';
                    while ($query->have_posts()) {
                        $query->the_post();

                        $showed_posts[] = get_the_ID();

                        $title = get_the_title();
                        $link = get_the_permalink();

                        echo '<li>';
                        echo '<a href="' . $link . '">';

                        echo $title;

                        echo '</a>';
                        echo '</li>';
                    }

                    echo '<div class="pagination">';
                    echo paginate_links(array('total' => $query->max_num_pages));
                    echo '</div>';

                    echo '</ul>';
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
