<?php
/**
 * Le modèle pour afficher les commentaires
 *
 * Ceci est le modèle qui affiche la zone qui contient à la fois les commentaires actuels
 * et le formulaire de commentaire.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */

/*
 * Si le contenu actuel est protégé par un mot de passe et
 * que le visiteur n'est pas identifié avec un mot de passe
 * pour lire les commentaires alors
 * les commmentaires ne seront pas chargés.
 */
if ( post_password_required() ) {
	return;
}
?>

<aside id="comments" class="comments-area">

  <!-- utilisation de la structure de la boucle wp des commentaires-->
	<?php if ( have_comments() ) : ?>

		  <h2 class="comments-title">

    			<?php
    			$_tm_comment_count = get_comments_number();
    			if ( '1' === $_tm_comment_count ) {
    				printf(
    					/* translators: 1: title. */
    					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', '_tm' ),
    					'<span>' . get_the_title() . '</span>'
    				);
    			} else {
    				printf( // WPCS: XSS OK.
    					/* translators: 1: comment count number, 2: title. */
    					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $_tm_comment_count, 'comments title', '_tm' ) ),
    					number_format_i18n( $_tm_comment_count ),
    					'<span>' . get_the_title() . '</span>'
    				);
    			}
    			?>
		 </h2><!-- .comments-title -->

		 <?php the_comments_navigation(); ?>

      		<ol class="comment-list">
      			<?php
      			wp_list_comments( array(
      				'style'      => 'ol',
      				'short_ping' => true,
      			) );
      			?>
      		</ol><!-- .comment-list -->

		 <?php the_comments_navigation(); ?>


		     <?php if ( ! comments_open() ) : ?>

			         <p class="no-comments">

                 <?php esc_html_e( 'Comments are closed.', '_tm' ); ?>

               </p>

			   <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>


	  <?php comment_form(); ?>


</aside><!-- #comments -->
