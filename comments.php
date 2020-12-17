<section id="comments" class="comments">
    <!-- si les commentaires sont acceptés !-->
    <?php if (comments_open()) : ?>
                    <?php
                    // on génère le formulaire avec du html personnalisé
                    comment_form([
                        'title_reply' => 
                            "<h2 class=title> Laissez un commentaire</h2>",
                        //'class_form' => 'p-4 message-content',
                        'comment_notes_before' => 
                            '<p class=mb-2 >Les commentaires sont validés par l\'administrateur du site. Un délai peut s\'écouler entre votre envoi et sa validation définitive. Tous les champs indiqués avec une astérique (*) sont obligatoires</p>',
                            'comment_field' => '',
                            
                        // Autres champs ajoutables au formulaire
                            'fields' => apply_filters('comment_form_default_fields', [
                                'author' =>
                                    '<div class="field name">
                                        <label class="label">Nom *</label>
                                        <div class="control">
                                            <input name="author" class="input" type="text" placeholder="Votre nom">
                                        </div>
                                    </div>',
                                'email'  =>
                                    '<div class="field email">
                                        <label class="label">Email *</label>
                                        <div class="control">
                                            <input name="email" class="input" type="email" placeholder="e.g. alexsmith@gmail.com">
                                        </div>
                                    </div>',
                                // Fait apparaitre un champ qui permet de mémoriser les identifiants de l'utilisateur qui commente
                                'cookies' => '',
                                'comment_field' =>
                                // Champ message
                                    "<div class='field comment'>
                                        <label class='label'>Message (maximum 500 caractères) *</label>
                                    <div class='control'>
                                        <textarea id='comment' name='comment' class='textarea' placeholder='Votre commentaire'></textarea>
                                    </div>
                                    </div>",
                                      // Button de validation
                        'submit_button' =>
                        "<div  class='control'>
                            <button id='submit' class='button'>Poster</button>
                        </div>"
                                    
                            ]),
                        // Button de validation
                        'submit_button' =>
                            ""
                    ]);
                    ?>
     
                <h2 class='title mt-4'>Commentaires<h2>

                <?php if(get_comments_number() == 0) : ?>
                    <div class="box mt-5">
                        <p> Cet article n'a pas encore de commentaires </p>
 
  </div>
                <? endif ?>
         
        <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
     
                <!-- Si les commentaires sont fermés !-->
            <?php else : ?>
                <article class="message">
                    <div class="message-body">
                        <?php _e('Les commentaires sont fermés'); ?>
                    </div>
                </article>
            <?php endif; ?>
</section>