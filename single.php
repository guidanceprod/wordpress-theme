<?php
/**
 * Le modèle pour afficher tous les articles uniques
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>
<!--déclaration permettant de faire appelle au contenu du fichier header.php -->
<?php get_header(); ?>

  <section class="content">

    <!-- Début de la boucle -->
    <?php

        while ( have_posts() ) : the_post();
        /*
         * Utilise le modèle spécifique en fonction du post-type pour le contenu.
         */
          get_template_part( 'template-parts/content', get_post_type() );

         /*
          * Affiche la navigation vers la série de posts suivant / précédent, le cas échéant
          */
          the_posts_navigation();

          /*
           * Si les commentaires sont ouverts
           * ou si il y a au moins un commentaire,
           * recupération du modèle de commentaire.
           */
          if ( comments_open() || get_comments_number() ) : comments_template(); endif;

        endwhile; // fin de la boucle.
    ?>

  </section>

  <!--déclaration permettant de faire appelle au contenu du fichier sidebar.php definit dans les widgets -->
  <?php get_sidebar(); ?>

<!--déclaration permettant de faire appelle au contenu du fichier footer.php -->
<?php get_footer(); ?>
