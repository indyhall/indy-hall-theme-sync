<?php
/**
 * Indy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Indy
 */

if ( ! function_exists( 'indy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function indy_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Indy, use a find and replace
		 * to change 'indy' to the name of your theme in all the template files.
		 * You will also need to update the Gulpfile with the new text domain
		 * and matching destination POT file.
		 */
		load_theme_textdomain( 'indy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-width', 1920, 1080, false );

		// Register navigation menus.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'indy' ),
			'mobile'  => esc_html__( 'Mobile Menu', 'indy' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'indy_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Custom logo support.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 500,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // indy_setup
add_action( 'after_setup_theme', 'indy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function indy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indy_content_width', 640 );
}
add_action( 'after_setup_theme', 'indy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function indy_widgets_init() {

	// Define sidebars.
	$sidebars = array(
		'sidebar-1'  => esc_html__( 'Sidebar 1', 'indy' ),
		// 'sidebar-2'  => esc_html__( 'Sidebar 2', 'indy' ),
		// 'sidebar-3'  => esc_html__( 'Sidebar 3', 'indy' ),
	);

	// Loop through each sidebar and register.
	foreach ( $sidebars as $sidebar_id => $sidebar_name ) {
		register_sidebar( array(
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => /* translators: the sidebar name */ sprintf( esc_html__( 'Widget area for %s', 'indy' ), $sidebar_name ),
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

}
add_action( 'widgets_init', 'indy_widgets_init' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home left ',
		'id'            => 'home_left_1',
		'before_widget' => '<div class="header-left">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 1 ',
		'id'            => 'footer_1',
		'before_widget' => '<div class="footer-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2 ',
		'id'            => 'footer_2',
		'before_widget' => '<div class="footer-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load styles and scripts.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Load custom ACF features.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Load custom filters and hooks.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Load custom queries.
 */
require get_template_directory() . '/inc/queries.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Scaffolding Library.
 */
require get_template_directory() . '/inc/scaffolding.php';

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Custom Fields',
		'menu_title'	=> 'Global Custom Fields',
		'menu_slug' 	=> 'global-custom-fields',
	));

}

add_filter( 'the_title', 'woo_title_order_received', 10, 2 );
function woo_title_order_received( $title, $id ) {
	if ( function_exists( 'is_order_received_page' ) &&
	     is_order_received_page() && get_the_ID() === $id ) {
		$title = "Hey, thanks for your order! 🚀";
	}
	return $title;
}

/**
 * Custom text on the receipt page.
 */
function isa_order_received_text( $text, $order ) {
    return 'Your final order details are below, and a receipt has been sent to you via email. <br/><hr/>';
}
add_filter('woocommerce_thankyou_order_received_text', 'isa_order_received_text', 10, 2 );