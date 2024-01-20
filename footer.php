<footer id="footer" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-auto">
                <?php

                $args = [
                    'theme_location' => 'footer_menu',
                ];

                wp_nav_menu($args);

                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</main>

</body>

</html>