<? get_header(); ?>
<!-- Get all articles section-->
<section class='m-4'>
    <h1 id='site-title'> <?= get_bloginfo('name') ?> </h1>
    <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
    <? $blog_posts = last_posts_query() ?>
    <div class="container mb-5">
        <div class="tile is-parent m-4 is-12">
            <div class="tile is-child is-9 columns is-flex-wrap-wrap">
                <!-- loop -->
                <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="column p-5 mt-5 mb-5 is-one-quarter" id="presentation-articles">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' =>'', 'style' => 'height: auto;']) ?>
                                <img class="card-img-top">
                                <a href="<?php the_permalink() ?>"><h2 class="card-title"><?php the_title() ?></h2></a>
                                <p class="card-post-meta"><?php the_date(); ?> par <a href="#"><?php the_author() ?></a></p>
                                <?php the_excerpt(); ?>
                                <a class="has-text-right link-article" href="<?php the_permalink() ?>">Lire l'article complet</a>
                            </div>
                        <?php endwhile; ?>
                <?php endif; ?>
                <!-- end loop -->
            </div>
            <!-- sidebar zone -->
                <? get_sidebar() ?>
            <!-- end sidebar zone -->
        </div>
    </div>
</section>
<?get_footer() ?>