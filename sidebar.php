 <!-- Sidebar -->
 <aside class="is-4 container">
 <?php get_search_form(); ?>
     <?php if (is_active_sidebar('about')) : ?>
         <?php dynamic_sidebar('about'); ?>
         </div>
     <?php endif; ?>
 </aside>
 <!-- Fin sidebar -->