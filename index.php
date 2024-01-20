<?php

get_header();

$showed_posts = [];

?>

<section id="home" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <?php

                // The Query
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'post__not_in' => $showed_posts,
                );

                $query = new WP_Query($args);

                // The Loop
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
