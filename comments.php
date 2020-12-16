<section id="comments" class="comments">
    <!-- si les commentaires sont acceptés !-->
    <?php if (comments_open()) : ?>
        <h2 class='title'>Commentaires<h2>

        <? var_dump(get_comments_number())?>
                <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
                <article class="message">
                    <?php
                    // on génère le formulaire avec du html personnalisé
                    comment_form([
                        'title_reply' => 
                            "<h2 class=title> Laissez un commentaire</h2>",
                        //'class_form' => 'p-4 message-content',
                        'comment_notes_before' => 
                            '<p class=mb-2 >Les commentaires sont validés par l\'administrateur du site. Un délai peut s\'écouler entre votre envoi et sa validation définitive</p>',
                        'comment_field' =>
                        // Champ message
                            "<div class='field'>
                                <label class='label'>Message</label>
                            <div class='control'>
                                <textarea class='textarea' placeholder='Votre commentaire'></textarea>
                            </div>
                            </div>",
                        // Autres champs ajoutables au formulaire
                            'fields' => apply_filters('comment_form_default_fields', [
                                'author' =>
                                    '<div class="field">
                                        <label class="label">Nom</label>
                                        <div class="control">
                                            <input name="author" class="input" type="text" placeholder="Votre nom">
                                        </div>
                                    </div>',
                                'email'  =>
                                    '<div class="field">
                                        <label class="label">Email</label>
                                        <div class="control">
                                            <input name="email" class="input" type="email" placeholder="e.g. alexsmith@gmail.com">
                                        </div>
                                    </div>',
                                // Fait apparaitre un champ qui permet de mémoriser les identifiants de l'utilisateur qui commente
                                'cookies' => '',
                            ]),
                        // Button de validation
                        'submit_button' =>
                            "<div class='control is-flex is-flex-direction-row-reverse'>
                                <button class='button is-primary'>Poster</button>
                            </div>"
                    ]);
                    ?>
                </article>
                <!-- Si les commentaires sont fermés !-->
            <?php else : ?>
                <article class="message">
                    <div class="message-body">
                        <?php _e('Les commentaires sont fermés'); ?>
                    </div>
                </article>
            <?php endif; ?>
</section>