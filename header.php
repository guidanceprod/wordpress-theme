<?php
/**
 * L'en-tête pour le thème
 * Ceci est le fichier permettant l'affichage de l'ensemble des éléménts presents dans la balise head
 * ainsi que le debut des éléments du body
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _tm
 */
?>
<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- fonction raccourci permettant d'insérer des actions depuis le hook wp_head afin de charger des element dans le head html (js, css, favicons...)-->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <div id="page" class="site"><!-- #page -->

    	<a class="skip-link screen-reader-text" href="#content">

				<?php esc_html_e( 'Skip to content', '_tm' ); ?>

			</a>

    	<header id="masthead" class="site-header">

    		<div class="site-branding"><!-- .site-branding -->

					<!-- requete conditionnelle permettant de mettre le logo du site en <h1> sur l'accueil (front-page ou home)-->
          <?php the_custom_logo(); if ( is_front_page() && is_home() ) : ?>

    				<h1 class="site-title">

              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<!-- marqueur de modele pour afficher le titre du site -->
                <?php bloginfo( 'name' ); ?>

              </a>

            </h1>
					<!-- requete conditionnelle permettant de mettre le logo du site en paragraphe sur les autres types de contenu-->
    			<?php else : ?>

    				<p class="site-title">

              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<!-- marqueur de modele pour afficher le titre du site -->
                <?php bloginfo( 'name' ); ?>

              </a>

            </p>

    		  <?php endif; ?>

    		</div><!-- .site-branding -->

    		<nav id="site-navigation" class="main-navigation"><!-- #site-navigation -->

    			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

            <?php esc_html_e( 'Menu Principal', '_tm' ); ?>

          </button>
					<!-- marqueur de modele pour structure l'affichage d'un menu de navigation -->
    			<?php
    			wp_nav_menu( array(
						'menu_id'  => 'main-menu',
						'menu_class' => 'navigation',
						'container' => 'ul',
						'theme_location' => 'main_menu'
					)); ?>

    		</nav><!-- #site-navigation -->

    	</header><!-- #masthead -->

  <div id="content" class="site-content"><!-- #content -->
