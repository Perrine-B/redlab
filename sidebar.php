 <!-- Sidebar -->
 <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light">
                    <h4 class="font-bold">Catégories</h4>
                        <ol class="list-unstyled mb-0">
                            <li><?php wp_list_categories() ?></li>
                        </ol>
                </div>

                <div class="p-4 mb-3 bg-light">
                    <h4 class="font-bold">Auteur</h4>
                        <ol class="list-unstyled mb-0">
                            <li><?php the_author() ?></li>
                        </ol>
                </div>

                <div class="p-4 bg-light">
                    <h4 class="font-bold">Date</h4>
                    <ol class="list-unstyled mb-0">
                        <li><?php wp_get_archives(); ?></li>
                    </ol>
                </div>
</aside>
 <!-- Fin sidebar -->