<?php
/**
 * Template modèle pour afficher les resultats d'une recherche
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>
<!-- #post-<?php the_ID(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		  <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

      <?php
      /*
       * Requête conditionnelle permettant de savoir
       * si l'element affiché est un post
       * alors recupération de la catégorie de rangement du post
       * et l'auteur de la publication
       */
      ?>
		  <?php if ( 'post' === get_post_type() ) : ?>

      		<div class="entry-meta">

      			<?php
      			_s_posted_on();
      			_s_posted_by();
      			?>

      		</div><!-- .entry-meta -->

		  <?php endif; ?>

	</header><!-- .entry-header -->

	<?php the_post_thumbnail(); ?>

	<div class="entry-summary">

    <!-- affiche l'extrait du contenu -->
		<?php the_excerpt(); ?>

	</div>

	<footer class="entry-footer">

		<?php _s_entry_footer(); ?>

	</footer>

</article>
