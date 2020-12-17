/*
* Template Name: Home
* description: Page template sans sidebar
*/

<? get_header(); ?>
<!-- Hero section -->
<section class="hero is-large is-primary is-bold" style="background-image: url(<?= header_image() ?>)">
    <div class="hero-body">
        <div class="container">
            <h1 id='site-title'> <?php bloginfo('name'); ?> </h1>
            <h2 id="site-subtitle">
                <? bloginfo('description') ?>
            </h2>
            <?php get_search_form(); ?>
        </div>
    </div>
</section>
<!-- end Hero section -->
<!-- Last sticky section -->
<? $most_recent_sticky_post= get_last_sticky_post();?>
<?php while ($most_recent_sticky_post->have_posts()) :  $most_recent_sticky_post->the_post(); ?>
    <section class="hero is-medium is-bold border">
        <div class="hero-body">
            <div class="container">
                <h2 class='section-title'> A la une </h2>
                <h2 class='title'>
                    <? the_title()?>
                </h2>
                <p class="card-text">
                    <? the_excerpt() ?>
                </p>
                <a href=<? the_permalink() ?> class="btn btn-info">Lire la suite</a>
            </div>
        </div>
    </section>
    <? $var = get_the_ID(); ?>
<?php endwhile;
wp_reset_query(); ?>
<!-- end Last sticky section -->
<!-- Last Three posts section -->
<? $blog_posts = get_three_last_posts();?>
<? if(wp_count_posts()->publish >= 3) :?>
<section class="hero is-small is-light is-bold">
    <div class="hero-body">
        <div class='container'>
            <h2 class='section-title'>Derniers posts</h2>
            <div class='columns'>
                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <?php if ($var != get_the_ID()) : ?>
                        <div class="column p-2">
                            <h3 class="title">
                                <? the_title() ?>
                            </h3>
                            <p class="card-text">
                                <? the_excerpt() ?>
                            </p>
                            <a href=<? the_permalink() ?> class="btn btn-info">Lire la suite</a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
</section>
<? endif ?>
<!-- end last three posts section -->
<? get_footer(); ?>