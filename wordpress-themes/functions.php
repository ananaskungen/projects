<?php

if ( ! function_exists( 'wcm_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @return void
	 * @since Twenty Twenty-One 1.0
	 *
	 */
	function wcm_theme_setup() {
		// Registrerar platser för våra fasta menyer. Visas i temat med wp_nav_menu()
		register_nav_menus(
			[
				'primary' => esc_html__( 'Main navigation', 'wcmuppgift' ),
				'footer'  => esc_html__( 'Footer navigation', 'wcmuppgift' ),
			]
		);

		/**
		 * Add post-formats support.
		 */
		add_theme_support( 'post-formats', [
			'gallery',
			'image',
			'quote',
			'video',
		] );
		// Add theme support for Automatic Feed Links
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );

		// Add theme support for Custom Background
		$background_args = [
			'default-color'          => 'FFFFFF',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		];
		//add_theme_support( 'custom-background', $background_args );

		// Add theme support for Custom Header
		$header_args = [
			'default-image'      => '',
			'width'              => 0,
			'height'             => 0,
			'flex-width'         => true,
			'flex-height'        => true,
			'uploads'            => true,
			'random-default'     => false,
			'header-text'        => true,
			'default-text-color' => 'Detta är mitt tema',
			'video'              => true,
		];
		add_theme_support( 'custom-header', $header_args );

		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

		// Add theme support for document Title tag
		add_theme_support( 'title-tag' );

	}
}
add_action( 'after_setup_theme', 'wcm_theme_setup' );


/**
 * Här laddar vi in alla våra styles och scripts.
 *
 * @return void
 */
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_theme_file_uri( 'dist/main.css' ), );
	wp_enqueue_script( 'script', get_theme_file_uri( 'dist/main.js' ), );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function social_link_classes( $classes, $item, $args ) {
	if ( 'footer' === $args->theme_location ) {
		$classes[] = "social-link";
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'social_link_classes', 10, 4 );

/**
 * Registrera en Custom Post Type
 * https://developer.wordpress.org/plugins/post-types/
 *
 * Läs mer om funktionen register_post_type och dess argument nedan.
 * https://developer.wordpress.org/reference/functions/register_post_type/
 *
 */

function my_c_wcm_travel() {
	register_post_type( 'wcm_travel', [
		'labels'      => [
			'name'          => __( 'Wcmtravels', ),
			'singular_name' => __( 'wcmTravel', ),
		
		],
		'public'      => true,
		'has_archive' => true,
		'supports'    => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
		'rewrite'     => ['slug' => 'travel'],
		'menu_icon'   => 'dashicons-admin-site',
		'taxonomies' => ['travel_age',  'travel_country', 'travel_sport_league', 'travel_sport_type', 'travel_type' ],
		'description' => 'Some Desc about wcm travels',

	] );
}
add_action( 'init', 'my_c_wcm_travel', );

function my_c_travel_matches() {
	register_post_type( 'travel_matches', [
		'labels'      => [
			'name'          => __( 'Sportresor', ),
			'singular_name' => __( 'Sportresa', ' singular name' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'sportresor'],
		'menu_icon'   => 'dashicons-heart',
		'taxonomies' => ['travel_sport_league', 'travel_type'],
		'hierarchical' => true,
		'supports'    => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
		'description' => 'Some Desc about travel matches',

	] );
}
add_action( 'init', 'my_c_travel_matches', );

function my_c_travel_cup() {
	register_post_type( 'travel_cup', [
		'labels'      => [
			'name'          => __( 'Cuper', ),
			'singular_name' => __( 'Cup', ' singular name' ),
	
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'cuper'],
		'menu_icon'   => 'dashicons-universal-access',
		'taxonomies' => ['travel_age', 'travel_country', 'travel_sport_type', 'travel_type'],
		'hierarchical' => true,
		'supports'    => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
		'description' => 'Some Desc about travel cup',

	] );
}
add_action( 'init', 'my_c_travel_cup', );

function my_c_travel_camp() {
	register_post_type( 'travel_camp', [
		'labels'      => [
			'name'          => __( 'Traningsresor', ),
			'singular_name' => __( 'Traningsresa', ' singular name' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'traningsresor'],
		'menu_icon'   => 'dashicons-star-filled',
		'taxonomies' => ['travel_age', 'travel_country', 'travel_sport_type', 'travel_type'],
		'hierarchical' => true,
		'supports'    => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
		'description' => 'Some Desc about travel camp',

	] );
}
add_action( 'init', 'my_c_travel_camp', );

function my_c_travel_soccer() {
	register_post_type( 'travel_soccer', [
		'labels'      => [
			'name'          => __( 'Fotbollsresor', '' ),
			'singular_name' => __( 'Fotbollsresa', ' singular name' ),
		],
		'public'      => true,
		'has_archive' => true,
		'supports'    => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
		'rewrite'     => ['slug' => 'fotbollsresor'],
		'menu_icon'   => 'dashicons-games',
		'taxonomies' => ['travel_sport_league', 'travel_country', 'travel_sport_type'],
		'hierarchical' => true,
		'description' => 'Some Desc about travel soccer',

	] );
}
add_action( 'init', 'my_c_travel_soccer', );

function my_c_netr_team() {
	register_post_type( 'netr_team', [
		'labels'      => [
			'name'          => __( 'netrs' ),
			'singular_name' => __( 'netr'),
		],
		'public'      => true,
		'has_archive' => true,
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields' ],
		'rewrite'     => ['slug' => 'netr'],
		'menu_icon'   => 'dashicons-airplane',
		'description' => 'Some desc about netr teams',

	] );
}
add_action( 'init', 'my_c_netr_team', );

/**
 * Registrera Custom Taxonomies
 * https://developer.wordpress.org/plugins/taxonomies/
 *
 * Mer information kring funktionen register_taxonomy
 * https://developer.wordpress.org/reference/functions/register_taxonomy/
 */

// Bättre namn på funktionen....
function  my_c_travel_age() {
	$labels = [
		'name'              => _x( 'Travelersage', 'taxonomy general name', 'wcmuppgift' ),
		'singular_name'     => _x( 'Travelage', 'taxonomy singular name', 'wcmuppgift' ),

	];
	$args   = [
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'travels' ),
	];
	register_taxonomy( 'travel_age' , ['wcm_travel, travel_camp, travel_cup, page'], $args );
}
add_action( 'init', 'my_c_travel_age', 4 ); 

function  my_c_travel_country() {
	$labels = [
		'name'              => _x( 'Travelcountries', 'taxonomy general name', 'wcmuppgift' ),
		'singular_name'     => _x( 'Travelcountry', 'taxonomy singular name','wcmuppgift' ),

	];
	$args   = [
		'public'      		=> true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'travels' ),
	];
	register_taxonomy( 'travel_country', ['wcm_travel, travel_camp, travel_cup, travel_soccer, page'], $args );
}
add_action( 'init', 'my_c_travel_country', 4 ); 

function  my_c_travel_sport_league() {
	$labels = [
		'name'              => _x( 'travelsportleagues', 'taxonomy general name', 'wcmuppgift' ),
		'singular_name'     => _x( 'travelsportleague', 'taxonomy singular name','wcmuppgift' ),
	
	];
	$args   = [
		'public'      		=> true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'travels' ),
	];
	register_taxonomy( 'travel_sport_league', ['wcm_travel, travel_soccer,travel_matches, page'], $args );
}
add_action( 'init', 'my_c_travel_sport_league', 4 ); 

function  my_c_travel_sport_type() {
	$labels = [
		'name'              => _x( 'Travelsporttypes', 'taxonomy general name', 'wcmuppgift' ),
		'singular_name'     => _x( 'Travelsporttype', 'taxonomy singular name','wcmuppgift' ),
	
	];
	$args   = [
		'public'      		=> true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'travels' ),
	];
	register_taxonomy( 'travel_sport_type', ['wcm_travel, travel_camp, travel_cup, travel_soccer, page'], $args );
}
add_action( 'init', 'my_c_travel_sport_type', 4 );

function my_c_travel_type() {
	$labels = [
		'name'              => _x( 'Traveltypes', 'taxonomy general name', 'wcmuppgift' ),
		'singular_name'     => _x( 'Traveltype', 'taxonomy singular name','wcmuppgift' ),
	
	];
	$args   = [
		'public'      		=> true,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'travels-types' ),
	];
	register_taxonomy( 'travel_type', ['wcm_travel, travel_camp, travel_cup, travel_matches, page'], $args );
}
add_action( 'init', 'my_c_travel_type', 4 ); 

function add_taxonomies() {
	my_c_travel_age();
	my_c_travel_country();
	my_c_travel_type();
	my_c_travel_sport_type();
	my_c_travel_sport_league();

}