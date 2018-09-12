<?php
/**
 *  fonctions et definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _tm
 */
if ( ! function_exists( '_tm_setup' ) ) :
	/**
	 * Définit les paramètres par défaut du thème et enregistre le support pour diverses fonctionnalités
	 * WordPress.
	 *
	 * Notez que cette fonction est connectée au hook after_setup_theme, qui
   * s'exécute avant le hook init. Le hook init est trop tard pour certaines fonctionnalités,
   * telles que la prise en charge des vignettes de publication.
	 */
	function _tm_setup() {
		/*
		 * Rendre le thème disponible pour traduction.
		 * Les traductions peuvent être classées dans le répertoire /languages/.
     * Si vous construisez un thème basé sur _tm, utilisez un find et replace
     * pour changer '_tm' au nom de votre thème dans tous les fichiers modèles.
		 */
		load_theme_textdomain( '_tm', get_template_directory() . '/languages' );

		// Ajoute les messages et les commentaires par défaut dans Les liens de flux RSS vers le head html.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Laisse WordPress gérer le titre du document.
     * En ajoutant au support du thème, nous déclarons que ce thème n'utilise pas de
     * la balise <title> codée en dur dans le head du document html, ainsi WordPress
     * le fournit automatiquement
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Active le support pour les vignettes de publication sur les posts articles ou pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Ce thème utilise wp_nav_menu() dans un emplacement du header.php
		register_nav_menus( array(
			'main_menu' => esc_html__( 'Menu Principal', '_tm' ),
		) );

		/*
     * Changer le balisage principal par défaut pour le formulaire de recherche,
     * le formulaire de commentaire et les commentaires
     * pour générer du HTML5 valide.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Ajout au support de thème pour l’actualisation sélective des widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Ajoute au support du theme pour un logo personnalisé de base.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', '_tm_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _tm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_tm' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', '_tm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_tm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _tm_scripts() {
	wp_enqueue_style( '_tm-style', get_stylesheet_uri() );
	wp_enqueue_script( '_tm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180917', true );
	wp_enqueue_script( '_tm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180917', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_tm_scripts' );

/**
 * Balises de modèles personnalisés pour ce theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Fonctions qui améliorent le thème en créant ses propres hook pour WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
