<? get_header(); ?>
<section class='container mx-auto p-5 is-flex flex-direction-column is-justify-content-space-evenly is-align-items-center'>
    <? $url =  get_template_directory_uri()?>
    <div class='is-flex is-flex-direction-column is-align-items-center'>
        <h1 class='title'>Oopsie, cette page n'a pu être trouvée</h1>
        <button class="button is-light is-primary"><a href='<? echo get_home_url()?>' class='is light'>Retourner à l'accueil</a></button>
    </div>
    <figure class="has-ratio" width="640" height="360">
        <img id='404' src='https://media1.tenor.com/images/c2303c9af31d7f865fadc9bbc9a5f293/tenor.gif?itemid=17411479' alt='sad_unicorn'>
    </figure>
</section>
</main>
</body>