    <form class=" container is-flex is-flex-direction-column mx-auto" action="<?php echo home_url('/'); ?>" method="get">
        <input class='input m-1' type="text" name="s" placeholder="Votre recherche" id="search" value="<?php the_search_query(); ?>" />
        <button class="p-1 ml-2 mt-3 button is-link has-background-dark">Chercher</button>
    </form>
