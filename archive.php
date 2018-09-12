<?php
/**
 * Le modèle pour l'affichage des pages d'archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>
<!--déclaration permettant de faire appelle au contenu du fichier header.php -->
<?php get_header(); ?>

  <section class="content">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">

              <?php
              /* récupère le titre de l'archive: liée à la taxonomie de l'archive */
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              /* récupère la description de l'archive */
              the_archive_description( '<div class="archive-description">', '</div>' );

              ?>

        </header><!-- .page-header -->

    <!-- Début de la boucle -->
    <?php

              while ( have_posts() ) : the_post();
    				     /*
    				      * Utilise le modèle spécifique en fonction du post-type pour le contenu: content.php
    				      */
        				  get_template_part( 'template-parts/content', get_post_type() );

        			endwhile;

                 /*
                  * Affiche la navigation vers la série de posts suivant / précédent, le cas échéant
                  */
        			    the_posts_navigation();

    else :
                  /*
                  * Utilise le modèle spécifique en fonction du post-type pour le contenu non trouvé: content-none.php
                  */
        			    get_template_part( 'template-parts/content', 'none' );

    endif;

    ?>

  </section>

  <!--déclaration permettant de faire appelle au contenu du fichier sidebar.php definit dans les widgets -->
  <?php get_sidebar(); ?>

<!--déclaration permettant de faire appelle au contenu du fichier footer.php -->
<?php get_footer(); ?>
