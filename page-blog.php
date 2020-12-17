/*
* Template Name: Blog
* description: Page template with sidebar
*/



<? get_header(); ?>
<!-- Hero header section -->
<section id='hero' class="hero is-small is-primary is-bold" style="background-image: url(<?= header_image() ?>)">
    <div class="hero-body">
        <div class="container">
            <h1 id='site-title'> <?= get_slug() ?> </h1>
        </div>
        <div class="container">
            <h1 id='site-title'> <?= get_slug() ?> </h1>
        </div>
    </div>
</section>
<!-- Get all articles section-->
<section class='m-4'>
    <? $blog_posts = last_posts_query() ?>
    <div class="container mb-5">
        <div class="tile is-parent m-4 is-12">
            <div class="container">
                <!-- loop -->
                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <!-- article's list zone -->
                    <article class="media tile mb-5 is-8">
                        <!-- title + image zone -->
                        <div class='tile is-child is-5 p-2'>
                            <h1 class="title"><?php the_title() ?></h1>
                            <h2 class="subtitle">par <?php the_author() ?></h2>
                            <div class='tile is-child is-6 is-flex is-flex-direction-column is-justify-content-center'>
                                <?(the_post_thumbnail()) ?>
                            </div>
                        </div>
                        <!-- end title + image zone -->
                        <!-- excerpt + permalink zone -->
                        <div class='tile is-child is-10 mr-2 p-2'>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <? the_excerpt() ?>
                                    </p>
                                    <a href=<? the_permalink() ?> class="btn btn-info">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                        <!-- end excerpt + permalink zone -->
                    </article>
                    <!-- end article's list zone -->
                <?php endwhile; ?>
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