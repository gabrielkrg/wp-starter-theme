<?php get_header(); ?>

<section id="page" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
