<?php get_header() ?>
<!-- The loop -->
<? if (have_posts()) : ?>
<? while (have_posts()) : the_post(); ?>
<section class="section container is-8">
    <div class="card m-5 is-8">
        <div class="card-content">
            <h1 class='title'>
                <? the_title()?>
            </h1>
            <h2 class="subtitle">par <?php the_author() ?></h2>
            <div class='mb-5'>
                <? the_excerpt() ?>
            </div>
            <?  (the_post_thumbnail()) ?>
        </div>
        <div class='container m-3 p-3'>
            <? the_content() ?>
        </div>
    </div>
</section>
<? endwhile; ?>
<? endif; ?>
<?php get_footer() ?>