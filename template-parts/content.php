<?php
/**
 * Template modèle pour l'affichage du contenu d'un post
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

    		<?php
        /*
         * Requête conditionnelle permettant de savoir
         * si l'element affiché est un post seul is_singular()
         * avec affichage de son titre en <h1>
         * ou un autre type de post
         */
    		if ( is_singular() ) :

    			the_title( '<h1 class="entry-title">', '</h1>' );

    		else :

    			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

    		endif;
        /*
         * Requête conditionnelle permettant de savoir
         * si l'element affiché est un post
         * alors recupération de la catégorie de rangement du post
         * et l'auteur de la publication
         */
    		if ( 'post' === get_post_type() ) :
    		?>
          <!-- .entry-meta -->
    			<div class="entry-meta">

    				<?php

      				_tm_posted_on();
      				_tm_posted_by();

    				?>

    			</div>

    		<?php endif; ?>

  	</header>

	  <?php the_post_thumbnail(); ?>

    <!-- .entry-content -->
  	<div class="entry-content">

    		<?php
      		the_content( sprintf(
      			wp_kses(
      				/* translators: %s: Name of current post. Only visible to screen readers */
      				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_tm' ),
      				array(
      					'span' => array(
      					'class' => array(),
      					),
      				)
      			),
      			get_the_title()
      		) );

          /*
           * affiche une fonctionnalité de lien de page, doit être obligatoirement utilisée dans une boucle wp
           */
        		wp_link_pages( array(
        			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_tm' ),
        			'after'  => '</div>',
        		) );
    		?>

  	</div>

    <!-- .entry-footer -->
  	<footer class="entry-footer">

  		<?php _tm_entry_footer(); ?>

  	</footer>

</article>
