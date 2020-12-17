</main>
<footer class="footer">
  <div class='columns is-flex-wrap-wrap'>
    <div id='company-info' class="footer-widget column is-6 has-text-centered">
    <?php dynamic_sidebar('footer-logo'); ?>
    <?php dynamic_sidebar('footer-1'); ?>
    </div>
    <div class="footer-widget column is-6 has-text-centered">
      <?php dynamic_sidebar('footer-2'); ?>
    </div>
    <div class="footer-menu column is-12">
    <? wp_nav_menu(array(
      'theme_location' => 'footer',
      'menu' => 'footer',
      'menu_id' => 'footer-menu',
      'menu_class' => "footer-menu",
      )
    )?>
  </div>
  </div>
</footer>
</body>

</html>