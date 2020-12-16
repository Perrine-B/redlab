</main>
<footer class="footer is-light">
  <div class='columns'>
    <div class="column has-text-centered">
      <?php dynamic_sidebar('footer-1'); ?>
    </div>
    <div class="footer-menu column has-text-centered">
      <?php dynamic_sidebar('footer-2'); ?>
    </div>
  </div>
  <div class="content has-text-centered">
    <? wp_nav_menu(array(
                'menu' => 'footer',
                'menu_id' => 'footer-menu',
                'menu_class' => "footer-item",
                )
            )?>
  </div>
</footer>
</body>

</html>