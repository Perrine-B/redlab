<?php

/** Styles et scripts */

add_action('wp_enqueue_styles', 'add_theme_styles');

function add_theme_styles()
{
  wp_enqueue_style('stylesheet', get_stylesheet_uri());
  wp_enqueue_style('bulma', "https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css");
  wp_enqueue_style('Fira_Sans_Light', "https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap");
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
function wpb_custom_new_menu()
{
  register_nav_menus(array(
    'main' => __('principal'),
    'social' => __('Menu réseaux sociaux'),
    'footer' => __('Menu footer')
  ));
}
add_action('init', 'wpb_custom_new_menu');

/** Sidebars*/

register_sidebar(array(
  'id' => 'footer-1',
  'name' => 'footer-1',
  'description' => "container pour les informations de localisation",
  //'before_widget' => '<div class="menu-footer box is-flex is-flex-direction-column is-justify-content-center is-align-items-center">',
  //'after_widget' => '</div>',
));

register_sidebar(array(
  'id' => 'footer-logo',
  'name' => 'footer-logo',
  'description' => "container le logo du footer",
  //'before_widget' => '<div class="menu-footer box is-flex is-flex-direction-column is-justify-content-center is-align-items-center">',
  //'after_widget' => '</div>',
));

register_sidebar(array(
  'id' => 'footer-2',
  'name' => 'footer-2',
  'description' => "container pour le menu d'accès aux réseaux sociaux",
  //'before_widget' => '<div class="menu-footer box is-flex is-justify-content-center is-flex-direction-column is-align-items-center">',
  //'after_widget' => '</div>',
));


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
  <div class="container mt-5" id="<?php comment_class(); ?> id=" comment-<?php comment_ID() ?>">
    <article class="media">
      <div class="media-left">
        <figure class="image is-64x64">
          <?php echo get_avatar($comment, $size = '48'); ?>
        </figure>
      </div>
      <div class="media-content">
        <div class="content">
            <p><strong id='comment-name'>
              <? echo get_comment_author() ?></strong></p> 
              <p class="comment-date"><small>
              <?= get_comment_date() ?></small>
              <div class="comment"></p>
              <p><?= comment_text() ?></p>
        </div>
      </div>
    </article>
  </div>
  <? endif ?>
<?php
}

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> '',
				'next_text'		=> '',
			 ) );
		}
	}
	
}

// Cookies

// function wpb_cookies_tutorial1() { 
 
//   $visit_time = date('F j, Y  g:i a');
   
//   if(!isset($_COOKIE[$wpb_visit_time])) {
   
//   // set a cookie for 1 year
//   setcookie('wpb_visit_time', $visit_time, time()+31556926);
   
//   }
   
//   }
