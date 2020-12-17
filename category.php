<?php get_header() ?>
<div class="archive-meta"><?= get_cat_name()  ?></div>
<!-- The loop -->
<? if (have_posts()) : ?>
<? while (have_posts()) : the_post(); ?>
<section class="section container is-8">
    <div class="card m-5 is-8">
    <?  (the_post_thumbnail()) ?>
        <div class="card-content">
            <h1 class='title'>
                <? the_title()?>
            </h1>
            <h2 class="subtitle"> <?php the_category() ?> </h2>
        <h3><?php the_date() ?></h3>
        <h3><?php the_author_posts_link(); ?></h3>
            <div class='mb-5'>
                <? the_excerpt() ?>
            </div>
        </div>
        <a href=<? the_permalink() ?>>Lire la suite</a>
    </div>
</section>
<? endwhile; ?>
<? endif; ?>
<?php get_footer() ?>