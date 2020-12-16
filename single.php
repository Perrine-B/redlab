<?php get_header() ?>
<!-- The loop -->
<? if (have_posts()) : ?>
<? while (have_posts()) : the_post(); ?>

<figure class=" article-hero image is-3by1">
  <img class="is-fullwidth" src=" http://redlab.local/wp-content/uploads/2020/12/photo-1488229297570-58520851e868.jpg">
</figure>

<section class='p-5 m-5'>
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <h1 class='title'>
        <? the_title()?>
    </h1>

    <!-- /**
     TODO : Trouver pourquoi author link ne marche pas 
      */ -->
    <? $authorId = get_the_author_ID()?>
    <div class='article-info'>
    <h2 class="subtitle"> <?php the_category() ?> </h2>
    <h3><?php the_date() ?></h3>
    <h3><?php the_author_posts_link(); ?></h3>  
    </div>
    

    <div class='container'>
        <? the_content() ?>
    </div>

</section>
<hr class="solid">
<section class="section m-5 p-5 container">
    <? comments_template()?>
</section>
<? endwhile; ?>
<? endif; ?>

<?php get_footer() ?>