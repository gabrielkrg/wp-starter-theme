<?php

get_header();

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
                <h1>
                    <?= $name; ?>
                </h1>

                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'post',
                    'paged' => $paged,
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
