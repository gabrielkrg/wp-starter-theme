<?php

get_header();

$post_id = get_the_ID();
?>

<section id="single" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div>
                    <p>Categories</p>
                    <?php

                    $categories = get_the_category();

                    if ($categories) {
                        echo '<ul>';
                        foreach ($categories as $cat) {
                            // var_dump($cat);

                            $id = $cat->term_id;
                            $name = $cat->name;
                            $link = get_category_link($id);


                            echo '<li>';
                            echo '<a href="' . $link . '">';
                            echo $name;
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
                <h1>
                    <?php the_title(); ?>
                </h1>

                <?php

                $post_author_id = get_post_field('post_author', $post_id);
                $author = get_userdata($post_author_id);

                ?>

                <p>
                    <a href="<?= get_author_posts_url($author->ID); ?>">
                        <?= $author->display_name; ?>
                    </a>
                </p>

                <p>
                    <?php the_excerpt(); ?>
                </p>

                <article>
                    <?php the_content(); ?>
                </article>

                <div>
                    <p>Tags</p>
                    <?php

                    $tags = get_the_tags();

                    if ($tags) {
                        echo '<ul>';
                        foreach ($tags as $tag) {
                            // var_dump($tag);

                            $id = $tag->term_id;
                            $name = $tag->name;
                            $link = get_tag_link($id);


                            echo '<li>';
                            echo '<a href="' . $link . '">';
                            echo $name;
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
