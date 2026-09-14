<?php
/**
 * Arsha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Arsha
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arsha_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Arsha, use a find and replace
		* to change 'arsha' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'arsha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
require_once get_template_directory() . '/inc/class-arsha-navwalker.php';
	
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'arsha' ),
		)
		);
	register_nav_menus(
		array(
			'menu-about' => esc_html__( 'about', 'arsha' ),
		)
	    );
	register_nav_menus(
		array(
			'menu-services' => esc_html__( 'services', 'arsha' ),
		)
	    );
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'arsha_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'arsha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function arsha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arsha_content_width', 640 );
}
add_action( 'after_setup_theme', 'arsha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function arsha_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'arsha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'arsha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'arsha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function arsha_scripts() {

	// Theme Style
	wp_enqueue_style( 'arsha-style', get_stylesheet_uri(), array(), _S_VERSION );

	// Google Fonts
	wp_enqueue_style(
		'arsha-google-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
		array(),
		null
	);

	// Vendor CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), null );
	wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), null );
	wp_enqueue_style( 'glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), null );
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), null );

	// Main CSS
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array(), null );

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );

	// Vendor JS
	wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), null, true );
	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), null, true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array( 'imagesloaded-js' ), null, true );

	// Main JS
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );

	// Navigation JS
	wp_enqueue_script( 'arsha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Comment Reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arsha_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Arsha Nav Walker
 */
require get_template_directory() . '/inc/class-arsha-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
