<?php
/**
 * Template pour afficher les résultats d'une recherche
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

            <!-- .page-header -->
      			<header class="page-header">

      				<h1 class="page-title">

      					<?php
      					/* translators: %s: search query. */
      					printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' );
      					?>

      				</h1>

      			</header>

    			<?php
    			/* Debut de la boucle */
    			while ( have_posts() ) : the_post();

          /*
           * Inclut la partie modèle nommée pour un thème ou si un nom est spécifié,
           * une partie spécialisée sera incluse: content-search.php
           */
    				 get_template_part( 'template-parts/content', 'search' );

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

    		endif;

    		?>

    </section>

    <!--déclaration permettant de faire appelle au contenu du fichier sidebar.php definit dans les widgets -->
  	<?php get_sidebar(); ?>

  <!--déclaration permettant de faire appelle au contenu du fichier footer.php -->
  <?php get_footer(); ?>
