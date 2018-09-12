<?php
/**
 * La barre latérale contenant la zone principale des widgets
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _tm
 */

/*
 * Cette balise conditionnelle vérifie si une barre latérale donnée est active (en cours d'utilisation).
 * Ceci est une fonction booléenne, ce qui signifie qu'elle renvoie soit TRUE ou FALSE.
 * Toute barre latérale contenant des widgets renverra TRUE,
 * tandis que toute barre latérale ne contenant aucun widget renverra FALSE.
 */
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside class="sidebar-content">

	<?php
	/**
	 * Cette fonction appelle chacun des rappels de widgets actifs dans l'ordre,
	 * ce qui imprime le balisage de la barre latérale. Si vous avez plus d'une barre latérale,
	 * vous devez donner à cette fonction le nom ou le numéro de la barre latérale à imprimer.
	 * Cette fonction renvoie true en cas de succès et false en cas d'échec.

	 * La valeur de retour doit être utilisée pour déterminer
	 * si une barre latérale statique doit être affichée.
	 * Cela garantit que votre thème aura l'air bien,
	 * même lorsque le plug-in Widgets n'est pas actif.

	 * Si vos barres latérales étaient enregistrées par numéro,
	 * elles devraient être récupérées par numéro.
	 * S'ils avaient des noms lors de leur enregistrement,
	 * utilisez leurs noms pour les récupérer.
	 */
	?>
	
	<?php dynamic_sidebar( 'sidebar' ); ?>

</aside>
