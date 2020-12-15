<?php

/** Styles et scripts */

add_action('wp_enqueue_styles', 'add_theme_styles');

function add_theme_styles()
{
  wp_enqueue_style('stylesheet', get_stylesheet_uri());
  wp_enqueue_style('bulma', "https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css");
  wp_enqueue_style('Amaric_font', "https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap");
  wp_enqueue_style('Oswald_font', "https://fonts.googleapis.com/css2?family=Oswald&display=swap");
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');

function add_theme_scripts()
{
  wp_enqueue_script('font_awesome', "https://use.fontawesome.com/releases/v5.14.0/js/all.js");
  wp_enqueue_script('bulma_burger', get_template_directory_uri() . '/assets/js/app.js');
}

/** Activation des fonctionnalités dans le thème  
 * permet de débloquer des fonctionnalités bonus dans l'interface
 */

// gère l'ajout des titres
add_theme_support('title-tag');

// gère l'ajout d'une image de 'tête' sur un article
add_theme_support('post-thumbnails');

// gère l'ajout d'une image d'un logo'
add_theme_support('custom-logo');

// gère le changement d'image du header
add_theme_support('custom-header');

/** Désactive les widgets déclarés */

add_action('widgets_init', 'wpm_remove_default_widgets');

function wpm_remove_default_widgets()
{
  unregister_widget('WP_Widget_Pages'); // Le widget Pages
  unregister_widget('WP_Widget_Archives'); // Le widget Archives
  unregister_widget('WP_Widget_Media_Audio'); // Le widget Audio
  unregister_widget('WP_Widget_Media_Video'); // Le widget Vidéo
  unregister_widget('WP_Widget_Custom_HTML'); // Le widget HTML personnalisé
  unregister_widget('WP_Widget_Categories'); // Le widget catégories
  unregister_widget('WP_Widget_Recent_Posts'); // Le widget articles récents
  unregister_widget('WP_Widget_RSS'); // Le widget RSS
  unregister_widget('WP_Widget_Meta'); // le widget Méta
  unregister_widget('WP_Widget_Tag_Cloud'); // Le widget nuage d'étiquettes
}

/** Déclaration des éléments */

/** Nav */
register_nav_menus(array(
  'main' => 'Menu Principal',
  'social' => 'Menu réseaux sociaux',
  'footer' => 'Menu footer'
));

/** Sidebars*/

register_sidebar(array(
  'id' => 'about',
  'name' => 'about',
  'description' => 'une sidebar latérale pour empiler du widget',
  'before_widget' => '<div class="box is-flex is-flex-direction-column is-align-items-center">',
  'after_widget' => '</div>',
));

register_sidebar(array(
  'id' => 'footer-1',
  'name' => 'footer-1',
  'description' => "destiné à accueillir un menu de navigation ou un widget text",
  'before_widget' => '<div class="menu-footer box is-flex is-flex-direction-column is-justify-content-center is-align-items-center">',
  'after_widget' => '</div>',
));

register_sidebar(array(
  'id' => 'footer-2',
  'name' => 'footer-2',
  'description' => "destiné à accueillir un menu de navigation ou un widget text",
  'before_widget' => '<div class="menu-footer box is-flex is-justify-content-center is-flex-direction-column is-align-items-center">',
  'after_widget' => '</div>',
));

register_sidebar(array(
  'id' => 'footer-3',
  'name' => 'footer-3',
  'description' => "destiné à accueillir un menu de navigation pour les réseaux sociaux",
  'before_widget' => '<div class="menu-footer box is-flex is-flex-direction-column is-justify-content-center is-align-items-center">',
  'after_widget' => '</div>',
));

/** Header */

$defaultHeader = get_template_directory_uri() . '/assets/img/header.png';

register_default_headers(array(
  'default' => array(
    'url' => $defaultHeader,
    'thumbnail_url' => $defaultHeader,
    'description' => 'un header par défaut'

  )
));

/** Requêtes */
/* Requête pour faire apparaître tous les articles avec le statut 'publié'
 * @return {object}
 */
function last_posts_query()
{
  $blog_posts = new WP_Query(
    array(
      'post_type' => 'post',
      'post_status’' => 'publish',
    )
  );
  return $blog_posts;
}

/* Requête pour faire apparaître les trois derniers articles publiés
 * @return {object}
 */

function get_three_last_posts()
{
  $blog_posts = new WP_Query(array(
    'post_type' => 'post',
    'post_status’' => 'publish',
    'posts_per_page' => 3
  ));

  return $blog_posts;
}

/* Requête pour faire apparaître le dernier sticky post marqué comme tel dans l'interface d'admin
 * @return {object}
 */
function get_last_sticky_post()
{
  // Get IDs of sticky posts
  $sticky = get_option('sticky_posts');
  // first loop to display only my single,
  // MOST RECENT sticky post
  $most_recent_sticky_post = new WP_Query(array(
    // Only sticky posts
    'post__in' => $sticky,
    // Treat them as sticky posts
    'ignore_sticky_posts' => 1,
    // Order by date to get the most recently published sticky post
    'orderby' => 'date',
    // Get only the one most recent
    'posts_per_page' => 1
  ));

  return $most_recent_sticky_post;
}

/** Utils */

/* Retourne le nombre de posts détectés pour une page
 */
function post_counter()
{
  $count = 0;
  while (have_posts()) : 
    the_post();
    $count++;
  endwhile;

  return $count;
}

/* Récupérer le slug d'une page courante
 */
function get_slug()
{
  global $post;
  $post_slug = $post->post_name;

  return $post_slug;
}

/** Commentaires personnalisés */
function mytheme_comment($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>

  <? if( isset($comment)) :?>
  <? $newDate = date("d/m/Y", strtotime(get_comment_date()));?>
  <div class="box mt-5" id="<?php comment_class(); ?> id=" comment-<?php comment_ID() ?>">
    <article class="media">
      <div class="media-left">
        <figure class="image is-64x64">
          <?php echo get_avatar($comment, $size = '48'); ?>
        </figure>
      </div>
      <div class="media-content">
        <div class="content">
          <p>
            <strong id='comment-name'>
              <? echo get_comment_author() ?></strong> <small>
              <? echo $newDate ?></small>
            <br>
            <?php comment_text() ?>
          </p>
        </div>
      </div>
    </article>
  </div>
  <? endif ?>
<?php
}
