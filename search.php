<?php get_header(); ?>

<section id="search">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <p class="title">Termo pesquisado: <span><?php echo get_search_query(); ?></span></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
