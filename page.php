<?php get_header() ?>
<!-- The loop -->
<? if (have_posts()) : ?>
<? while (have_posts()) : the_post(); ?>
<section class="section container mx-auto">
    <div class="card is-8">
        <h1 class="p-5 title has-text-centered"><?php the_title() ?></h1>
        <? the_post_thumbnail() ?>
        <div class='container m-5 p-5'>
            <p class='px-5'>
                <? the_content() ?>
            </p>
        </div>
    </div>
</section>
<? endwhile; ?>
<? endif; ?>
<? get_footer(); ?>