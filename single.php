<?php get_header() ?>
<!-- The loop -->
<? if (have_posts()) : ?>
<? while (have_posts()) : the_post(); ?>
    <? if(has_post_thumbnail()):?>
    <? $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')?>
        <figure class=" article-hero image is-3by1">
            <img class="is-fullwidth" src="<?= $img['0'] ?>"">
        </figure>
    <? endif ?>
<section class='first article'>
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <h1 class='title'>
        <? the_title()?>
    </h1>
    <? $authorId = get_the_author_ID()?>
    <div class='article-info'>
        <h2 class=" subtitle"> <?php the_category() ?> </h2>
    <h3><?php the_date() ?></h3>
    <h3><?php the_author_posts_link(); ?></h3>
    </div>
    <div class='container'>
        <? the_content() ?>
    </div>
    <div class='pagination mt-3 mb-3'>
        <?php
        $prev_post = get_previous_post('true');
        if ($prev_post) {
            $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
            echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '" class="article-precedent"><h4>' . '< ' . $prev_title . '</h4></a>' . "\n";
        }

        $next_post = get_next_post('true');
        if ($next_post) {
            $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
            echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '" class="article-suivant"><h4>' . $next_title . ' >' . '</h4></a>';
        }
        ?>
    </div>
    </section>
    <hr class="solid">
    <section class='article'>
        <? comments_template()?>
    </section>
    <? endwhile; ?>
    <? endif; ?>
    <?php get_footer() ?>