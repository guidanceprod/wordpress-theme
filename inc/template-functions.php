<?php
/**
 * Fonctions qui améliorent le thème avec de nouveaux hook dans WordPress
 *
 * @package _tm
 */
/**
 * Ajoute des classes personnalisées au tableau des classes de la balise body.
 *
 * @param array $classes Classes pour la balise body.
 * @return array
 */
function _tm_body_classes( $classes ) {
	// Ajoute une classe de hfeed aux pages non singulières.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Ajoute une classe de non-sidebar lorsqu'il n'y a pas de barre latérale présente.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', '_tm_body_classes' );
/**
 * Ajouter un en-tête de découverte automatique d'URL pingback pour les publications, les pages ou les pièces jointes simples.
 */
function _tm_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', '_tm_pingback_header' );
