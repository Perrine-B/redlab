<?php get_header() ?>
<section class='m-4'>
<h1 class='category title ml-5'><?= single_term_title("", false); ?></h1>
<? if (function_exists('yoast_breadcrumb')) {
yoast_breadcrumb('<p class="ml-5" id="breadcrumbs">', '</p>');
}?>
    <div class="container mb-5">
        <div class="tile is-parent m-4 is-12">
            <div class="container">
                <!-- loop -->
                <!-- article's list zone -->
                <article class="media tile mb-5 is-12">
                    <!-- excerpt + permalink zone -->
                    <? if (have_posts()) : ?>
                    <? while (have_posts()) : the_post(); ?>
                    <section class="container is-8">
                        <div class="card mb-5 is-8">
                            <figure class=" article-hero image is-3by1">
                                <img class="is-fullwidth" src=" http://redlab.local/wp-content/uploads/2020/12/photo-1488229297570-58520851e868.jpg">
                            </figure>
                            <div class="categories card-content p-4">
                                <h1 class='title'>
                                    <? the_title()?>
                                </h1>
                                <div class='article-info'>
                                    <h2 class="subtitle"> <?php the_category() ?> </h2>
                                    <h3><?php the_date() ?></h3>
                                    <h3><?php the_author_posts_link(); ?></h3>
                                </div>
                                <? the_excerpt() ?>
                                <a class='permalink' href="<?php the_permalink(); ?>">Lire l'article</a>
                            </div>
                        </div>
                        <!-- end excerpt + permalink zone -->
                        <!-- end article's list zone -->
                        <? endwhile; ?>
                        <? endif; ?>
                    
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