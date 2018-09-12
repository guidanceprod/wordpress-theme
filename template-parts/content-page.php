<?php
/**
 * Template modèle pour l'affichage du contenu de la page dans page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>
<!-- #post-<?php the_ID(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <!-- .entry-header -->
    	<header class="entry-header">
            <!-- affiche le titre de l'article -->
    		    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    	</header>

      <div class="post-image">

            <!-- affiche l'image à la une de la page -->
            <?php the_post_thumbnail(); ?>

      </div>

      <!-- .entry-content -->
    	<div class="entry-content">
            <!-- affiche le contenu d'une page -->
        		<?php the_content(); ?>

            <!-- affiche une fonctionnalité de lien de page, doit être obligatoirement dans une boucle wp -->
            <?php
          		wp_link_pages( array(
          			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_tm' ),
          			'after'  => '</div>',
          		) );
          	?>
            
      </div>

</article>
