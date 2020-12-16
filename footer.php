</main>
<footer class="footer is-light">
  <div class='columns'>
    <div class="column has-text-centered">
      <?php dynamic_sidebar('footer-1'); ?>
    </div>
    <div class="footer-menu column has-text-centered">
      <?php dynamic_sidebar('footer-2'); ?>
    </div>
    <div class="column has-text-centered">
      <?php dynamic_sidebar('footer-3'); ?>
    </div>
  </div>
  <? wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu' => 'footer',
        'menu_id' => 'social-menu',
        'menu_class' => "social-item",
        )
  )?>
  <div class="content has-text-centered">
    <p>
      <strong>Theme 'Skyblog' <\3 </strong>. Thanks to <a href="https://bulma.io/">Bulma</a> for help :D
    </p>
  </div>
</footer>
</body>

</html>