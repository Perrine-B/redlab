<? get_header(); ?>

<? $count = post_counter(); ?>
<section class="hero is-small is-warning is-bold">
    <div class="hero-body">
        <div class="container">
            <? if ($count <= 1) : ?>
            <h1 class='title'> Votre recherche a donné <?= $count ?> résultat </h1>
            <? else : ?>
            <h1 class='title'> Votre recherche a donné <?= $count ?> résultats </h1>
            <? endif;?>
        </div>
    </div>
</section>
<section class='m-4'>
    <div class="container mb-5">
        <div class="tile is-parent m-4 is-12">
            <div class="container">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="media tile mb-5 is-8">
                        <div class='tile is-child is-5 p-2'>
                            <h1 class="title"><?php the_title() ?></h1>
                            <h2 class="subtitle">par <?php the_author() ?></h2>
                            <div class='tile is-child is-6 is-flex is-flex-direction-column is-justify-content-center'>
                                <? if (the_post_thumbnail()): ?>
                                <div class=" tile is child is-3">
                                    <figure class="is-128x128">
                                        <img class="image is-128x128" src=<? the_post_thumbnail()?>>
                                    </figure>
                                </div>
                                <? endif ?>
                            </div>
                        </div>
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
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="tile is-3">
                <? get_sidebar() ?>
            </div>
        </div>
    </div>
</section>
<?get_footer() ?>