<?php get_header(); ?>

<section id="page" class="py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-col">
            <div class="w-full">
                <h1 class="main-title">
                    <?php the_title(); ?>
                </h1>

                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
