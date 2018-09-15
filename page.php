<?php
/**
 * Template modèle pour l'affichage de page
 *
 * Ceci est le modèle qui affiche toutes les pages par défaut.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>

<?php get_header(); ?>

  <section class="content">

      <?php

      		while ( have_posts() ) : the_post();

          /*
           * Inclut la partie modèle nommée page pour un thème,
           * une partie spécialisée sera incluse: content-page.php
           */
      			get_template_part( 'template-parts/content', 'page' );

      		endwhile; // End of the loop.
      ?>

  </section>

  <!--déclaration permettant de faire appelle au contenu du fichier sidebar.php definit dans les widgets -->
  <?php get_sidebar(); ?>

<!--déclaration permettant de faire appelle au contenu du fichier footer.php -->
<?php get_footer(); ?>
