<?php
/**
 * Template modèle pour afficher un message indiquant que les posts n'ont pas été trouvé
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tm
 */
?>
<!-- .no-results -->
<section class="no-results not-found">

    <!-- .page-header -->
  	<header class="page-header">

  		<h1 class="page-title">

        <?php esc_html_e( 'Nothing Found', '_tm' ); ?>

      </h1>

  	</header>

    <!-- .page-content -->
  	<div class="page-content">

  		  <!-- Condition d'un resultat de recherche sans resultat ou sans rapport avec la recherche-->
        <?php if ( is_search() ) : ?>

      			<p>

              <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_tm' ); ?>

            </p>
            <!-- affichage du formulaire de recherche -->
      			<?php get_search_form(); ?>

        <?php else : ?>

      			<p>

              <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '_tm' ); ?>

            </p>
            <!-- affichage du formulaire de recherche -->
  			    <?php get_search_form(); ?>

        <?php endif; ?>

  	</div>

</section>
