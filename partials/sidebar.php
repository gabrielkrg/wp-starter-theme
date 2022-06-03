<!-- Anuncio -->
<div class="row justify-content-center d-md-block d-none mb-5">
    <div class="col-auto">
        <div class="ad-side">
            <img src="https://dummyimage.com/350x300/e8e8e8/ffffff&text=Ad" alt="" class="img">
        </div>
    </div>
</div>


<!-- Mais lidas -->
<div id="most-read" class="mb-5">
    <h3 class="subtitle text-uppercase">
        Mais lidas
    </h3>
    <div class="content">
        <!-- Home -->
        <?php
        //if (is_home() || is_single()) {

        $args = array(
            'posts_per_page' => 5,
            'meta_key' => 'popular_posts',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        // } elseif (is_category()) {
        //     $args = array(
        //         'posts_per_page' => 5,
        //         'meta_key' => 'popular_posts',
        //         'orderby' => 'meta_value_num',
        //         'order' => 'DESC',
        //         'cat' => get_query_var('cat')
        //     );
        // }

        query_posts($args);

        if (have_posts()) {
            while (have_posts()) {
                the_post();

                $categories = get_the_term_list(get_the_ID(), 'category', null, ', ');

        ?>


                <div class="news">
                    <div class="row">
                        <div class="col-5">
                            <?php if (has_post_thumbnail()) { ?>

                                <?php if (wp_is_mobile()) { ?>
                                    <!-- Mobile -->
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail('inline-medium-news'); ?>
                                    </a>
                                <?php } else { ?>
                                    <!-- Desktop -->
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail('inline-small-news'); ?>
                                    </a>
                                <?php } ?>
                            <?php } else { ?>
                                <!-- No Thumbnail -->
                                <a href="<?php the_permalink() ?>">
                                    <img src="https://dummyimage.com/600x400/d6d6d6/ffffff&text=No+Thumbnail" alt="" class="img">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="col-7">
                            <span class="category mt-2"><?php echo $categories; ?></span>

                            <a href="<?php the_permalink() ?>">
                                <h4 class="subtitle">
                                    <?php the_title(); ?>
                                </h4>
                            </a>

                            <?php echo get_field('popular_posts'); ?>
                        </div>
                    </div>
                </div>
        <?php

            }
        } else {
            //Não tem posts
        }

        ?>
    </div>
</div>

<!-- Anuncio -->
<div class="row justify-content-center d-md-block d-none mb-5">
    <div class="col-auto">
        <div class="ad-side">
            <img src="https://dummyimage.com/350x300/e8e8e8/ffffff&text=Ad" alt="" class="img">
        </div>
    </div>
</div>