<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
