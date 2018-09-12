<?php

/**
 * index.php, Le fichier modèle principal
 * Ceci est le fichier de modèle le plus générique dans un thème WordPress
 * et l'un des deux fichiers requis pour un thème (l'autre étant style.css).
 * Il est utilisé pour afficher une page lorsque rien de plus spécifique ne correspond à une requête.
 *
 * @link https://www.guidanceprod/theme-master/analyse-dun-theme/hierarchie-des-modeles/
 *
 * @package _tm
 */
?>
<!--déclaration permettant de faire appelle au contenu du fichier header.php -->
<?php get_header(); ?>

  <section class="content">

    <!-- zone de contenu principal utilisée pour afficher le contenu d'une page ou d'un article -->
    <!-- utilisation de la structure de la boucle wp -->
    <?php if ( have_posts() ) : ?>
          <!-- requete conditionnelle permettant de mettre le titre du contenu en <h1> sur toutes les pages sauf l'accueil (front-page)-->
			    <?php if ( is_home() && ! is_front_page() ) : ?>

      				<header>

      					<h1 class="page-title screen-reader-text">
                  <!-- affiche le titre du contenu -->
                  <?php single_post_title(); ?>

                </h1>

      				</header>

				  <?php endif; ?>

                 <!-- Start the Loop -->
			           <?php  while ( have_posts() ) : the_post();
            				/*
            				 * Inclut la partie modèle nommée pour un thème ou si un nom est spécifié,
            				 * une partie spécialisée sera incluse: content.php
            				 */
      				       get_template_part( 'template-parts/content', get_post_type() );

			             endwhile;
                     /*
                      * Affiche la navigation vers la série de posts suivant / précédent, le cas échéant
                      */
  			             the_posts_navigation();

		      else :
              /*
      				 * Inclut la partie modèle nommée pour un thème lorsqu'un nom n'est pas spécifié,
      				 * une partie spécialisée sera incluse: content-none.php
      				 */
			         get_template_part( 'template-parts/content', 'none' );

		      endif; ?>


  </section>

  <!--déclaration permettant de faire appelle au contenu du fichier sidebar.php definit dans les widgets -->
	<?php get_sidebar(); ?>

<!--déclaration permettant de faire appelle au contenu du fichier footer.php -->
<?php get_footer(); ?>
