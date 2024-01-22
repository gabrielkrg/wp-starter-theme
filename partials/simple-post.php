<?php

// var_dump($args);

$category = $args['category'];
$category = $category[0];

$tag = $args['tag'];
$tag = $tag[0];

$link = $args['link'];
$thumbnail = $args['thumbnail'];
$title = $args['title'];
$excerpt = $args['excerpt'];
$date = $args['date'];
$author = $args['author'];

?>

<!-- post -->
<div class="simple-post">
    <div class="row">
        <div class="col-4">
            <div class="thumbnail">
                <a href="<?php echo $args['link']; ?>">
                    <?php echo $args['thumbnail']; ?>
                </a>
            </div>
        </div>

        <div class="col-8">
            <div class="content">
                <?php if ($category) { ?>
                    <a href="<?= get_category_link($category); ?>" class="category mb-2">
                        <?= $category->name; ?>
                    </a>
                <?php } ?>

                <h2 class="title">
                    <a href="<?= $link ?>">
                        <?= $title;  ?>
                    </a>
                </h2>

                <div class="excerpt">
                    <a href="<?= $link ?>">
                        <?= $excerpt; ?>
                    </a>
                </div>

                <div class="infos">
                    <div class="author">
                        <?= $author; ?>
                    </div>

                    <div class="date">
                        <?= $date; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>