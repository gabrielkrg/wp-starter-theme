<?php

get_header();

$showed_posts = [];

$post_id = get_the_ID();

?>

<section id="single" class="py-4">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-9">

                <?php

                $categories = get_the_category();

                if ($categories) { ?>
                    <!-- categorias -->
                    <div class="categories">
                        <p>Categorias</p>

                        <div class="content">
                            <?php foreach ($categories as $cat) {
                                // var_dump($cat);

                                $id = $cat->term_id;
                                $name = $cat->name;
                                $link = get_category_link($id);

                                echo '<a href="' . $link . '">';
                                echo $name;
                                echo '</a>';
                            } ?>

                        </div>
                    </div>
                <?php } ?>


                <h1 class="title">
                    <?php the_title(); ?>
                </h1>

                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <div class="infos">
                    <?php

                    $post_author_id = get_post_field('post_author', $post_id);
                    $author = get_userdata($post_author_id);

                    ?>
                    <div class="author">
                        <p>
                            Por
                            <a href="<?= get_author_posts_url($author->ID); ?>">

                                <?= $author->display_name; ?>
                            </a>
                        </p>
                    </div>

                    <?php

                    $date = get_the_date('d/m/Y - H:m');
                    $modified_date = get_the_modified_date('d/m/Y - H:i');

                    ?>
                    <div class="date">
                        <p>
                            <?= $date; ?>
                            <?= ($date < $modified_date) ? ' - Atualizada em: ' . $modified_date : ''; ?>
                        </p>
                    </div>
                </div>

                <div class="thumbnail">

                    <?php
                    $thumbnail = get_the_post_thumbnail($post_id, 'large-post-thumbnail');
                    $thumbnail_desktop = get_the_post_thumbnail_url($post_id, 'large-post-thumbnail');
                    $thumbnail_mobile = get_the_post_thumbnail_url($post_id, 'custom-size');
                    ?>

                    <a href="<?= get_the_post_thumbnail_url($post_id); ?>" data-fancybox>
                        <picture>
                            <source media="(min-width: 1200px)" srcset="<?= $thumbnail_desktop; ?>">
                            <source media="(min-width: 600px)" srcset="<?= $thumbnail_mobile; ?>">
                            <?= $thumbnail; ?>
                        </picture>
                    </a>

                    <p><?= get_the_post_thumbnail_caption(); ?></p>
                </div>



                <article>
                    <?php the_content(); ?>
                </article>

                <?php

                $tags = get_the_category();

                if ($tags) { ?>
                    <!-- categorias -->
                    <div class="tags">
                        <p>Tags</p>

                        <div class="content">
                            <?php foreach ($tags as $tag) {
                                // var_dump($tag);

                                $id = $tag->term_id;
                                $name = $tag->name;
                                $link = get_tag_link($id);


                                echo '<a href="' . $link . '">';
                                echo $name;
                                echo '</a>';
                            } ?>

                        </div>
                    </div>
                <?php } ?>

            </div> <!-- col-md-12 -->
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<?php get_footer();
