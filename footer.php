<?php
/**
 * Fichier partiel pour afficher le pied de page
 * Celui ci contient l'ensemble des élémnts qui ferme le document html
 * des pages ou articles
 *
 * @link
 *
 * @package _tm
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="site-info">

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_tm' ) ); ?>">

        <?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', '_tm' ), 'WordPress' );
				?>

			</a>

			<span class="sep"> | </span>

        <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', '_tm' ), '_tm', '<a href=""></a>' );
				?>

		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->
<!-- fonction raccourci permettant d'insérer des actions depuis le hook wp_footer afin de charger des element avant la fin html (souvent librairies js plugin ...)-->
<?php wp_footer(); ?>

</body>
</html>
