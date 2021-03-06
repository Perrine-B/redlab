<? get_header(); ?>
<!-- Get all articles section-->
<section class='first ml-4 mr-4'>
    <h1 id='site-title' class='title mt-5'> <?= get_bloginfo('name') ?> </h1>
    <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
    <div class="container mb-5">
        <div class="tile is-parent m-4 is-12">
            <div class="tile is-child is-9 columns is-flex-wrap-wrap">
                <!-- loop -->
                <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="presentation-articles column is-4">
                            <?php the_post_thumbnail() ?>
                                <h2 class="card-title title p-3 "><?php the_title() ?></h2>
                                <p class='author pb-5'><?= get_the_date() ?> par <?php the_author_posts_link() ?></p>
                                <?php the_excerpt(); ?>
                                <a class="has-text-right link-article" href="<?php the_permalink() ?>">Lire l'article complet</a>
                            </div>
                        <?php endwhile; ?>
                <?php endif; ?>
                <?php wpex_pagination(); ?>
                <!-- end loop -->
            </div>
            <!-- sidebar zone -->
            <div class="tile is-3">
            <? get_sidebar() ?>
        </div>
            <!-- end sidebar zone -->
        </div>
    </div>
</section>
<?get_footer() ?>
