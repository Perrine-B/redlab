<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? do_action('wp_enqueue_styles')?>
    <? do_action('wp_enqueue_scripts')?>
    <? wp_head() ?>
</head>
<!-- nav -->
<nav id="navbar" class="navbar is-fixed-top is-secondary is-spaced" aria-label="main navigation">
    <div class="navbar-brand is-flex is-flex-direction-row width-logo is-align-items-center">
        <figure id="logo" class="m-4 image center">
            <?php the_custom_logo(); ?>
        </figure>
        <div id="dropdown" class="p-2 dropdown is-right">
            <div class="dropdown-trigger">
                <button class="button is-rounded" aria-haspopup="true" aria-controls="dropdown-menu">
                    <span class="icon is-small">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu" role="menu" data-target="dropdown">
            
                <div class="p-2 dropdown-content">
                <a class="delete"></a>
                <?php get_search_form(); ?>
                </div>
                
            </div>
        </div>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id='navMenu' class="navbar-menu">
        <div class="navbar-end is-flex is-align-items-center">
            <? wp_nav_menu(array(
       'theme_location' => 'main',
       'menu' => 'main',
       'menu_id' => 'main-menu',
       'menu_class' => "menu-item",
        )
  )?>
        </div>
    </div>
</nav>
<!-- end nav -->

<body>
    <main>