<?php
/**
 * Balises de modèles personnalisés pour ce thème
 *
 *
 * @package _tm
 */
if ( ! function_exists( '_tm_posted_on' ) ) :
	/**
	 * Imprime le code HTML avec les métadonnées pour la date post date/heure actuelle.
	 */
	function _tm_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', '_tm' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( '_tm_posted_by' ) ) :
	/**
	 * Imprime le HTML avec les méta-informations de l'auteur.
	 */
	function _tm_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', '_tm' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( '_tm_entry_footer' ) ) :
	/**
	 * Imprime du HTML avec des méta-informations pour les catégories, les tags et les commentaires.
	 */
	function _tm_entry_footer() {
		// Masque la catégorie et tag des pages.
		if ( 'post' === get_post_type() ) {
			/* translators: utilisé entre les éléments de la liste, il y a un espace après la virgule */
			$categories_list = get_the_category_list( esc_html__( ', ', '_tm' ) );
			if ( $categories_list ) {
				/* translators: 1: liste des categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', '_tm' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: utilisé entre les éléments de la liste, il y a un espace après la virgule */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', '_tm' ) );
			if ( $tags_list ) {
				/* translators: 1: liste des tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', '_tm' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '_tm' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Nom du poste actuel. Seulement visible pour sur écran */
					__( 'Edit <span class="screen-reader-text">%s</span>', '_tm' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( '_tm_post_thumbnail' ) ) :
	/**
	 * Affiche une vignette de publication facultative.
	 *
	 * Enveloppe la vignette de publication dans un élément d'ancrage sur les vues d'index ou sur un div
   * élément sur des vues uniques.
	 */
	function _tm_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
  endif; // fin is_singular().
	}
endif;
