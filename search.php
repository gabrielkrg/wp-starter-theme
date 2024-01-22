<?php

get_header();

?>

<section id="search" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="main-title">Termo pesquisado: <span><?php echo get_search_query(); ?></span></h1>

                <?php

                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

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

                    echo '<div class="pagination my-5">';


                    echo paginate_links(array(
                        'prev_text' => '&#129092;',
                        'next_text' => '&#129094;',
                    ));

                    echo '</div>';
                } else { ?>

                    <div class="search-not-found">
                        <p class="subtitle">Nada foi encontrado com os termos da sua pesquisa.</p>
                        <p class="mb-4">Tente novamente com algumas palavras-chaves diferentes.</p>
                        <?php get_search_form() ?>
                    </div>

                <?php } ?>



            </div>
        </div>
    </div>
    <?php wp_reset_query(); ?>
</section>

<?php get_footer();
