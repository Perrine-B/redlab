 <!-- Sidebar -->
 <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3"> 
                    <h4>Catégories</h4>
                            <ul class="mb-0 ml-3 sidebar-link">
                                <?php 
                                $categories = get_categories( array(
                                    'orderby' => 'name',
                                    'order'   => 'ASC'
                                ) );
                                
                                foreach( $categories as $category ) {
                                echo '<li class="col-md-4"><a href="' .get_category_link($category->term_id). '">' .$category->name. '</a></li>';
                                }
                                ?>
                            </ul>
                </div>

                <div class="p-4 mb-3">
                    <h4>Auteur</h4>
                        <ul class="mb-0 ml-3 sidebar-link">
                            <?php wp_list_authors() ?>
                        </ul>
                </div>

                <div class="p-4">
                    <h4>Date</h4>
                    <ul class="mb-0 ml-3 sidebar-link">
                        <?php wp_get_archives(); ?>
                    </ul>
                </div>
</aside>
 <!-- Fin sidebar -->