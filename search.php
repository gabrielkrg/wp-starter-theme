<?php

get_header();

?>

<section id="search" class="py-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1>Termo pesquisado: <span><?php echo get_search_query(); ?></span></h1>

                <?php

                if (have_posts()) {
                    echo '<ul>';

                    while (have_posts()) {
                        the_post();

                        $showed_posts[] = get_the_ID();

                        $post_id = get_the_ID();
                        $link = get_the_permalink();
                        $thumbnail = get_the_post_thumbnail($post_id, 'large-rectangular');
                        $title = get_the_title($post_id);
                        $excerpt = get_the_excerpt($post_id);
                        $date = get_the_date();

                        echo '<li>';
                        echo '<a href="' . $link . '">';

                        echo $title;

                        echo '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else { ?>

                    <div class="search-not-found">
                        <p class="subtitle">Nada foi encontrado com os termos da sua pesquisa.</p>
                        <p class="mb-4">Tente novamente com algumas palavras-chaves diferentes.</p>
                        <?php get_search_form() ?>
                    </div>

                <?php } ?>

                <div class="pagination my-5">
                    <?php

                    echo paginate_links(array(
                        'prev_text' => 'Anterior',
                        'next_text' => 'Próxima'
                    ));
                    ?>
                </div>

            </div>
        </div>
    </div>
    <?php wp_reset_query(); ?>
</section>

<?php get_footer();
