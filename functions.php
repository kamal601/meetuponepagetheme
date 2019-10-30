<?php
/**
 * meetup one page theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meetup_one_page_theme
 */

if ( ! function_exists( 'meetup_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function meetup_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on meetup one page theme, use a find and replace
		 * to change 'meetup' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'meetup', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'meetup' ),
		) );

		/*
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
		add_theme_support( 'custom-background', apply_filters( 'meetup_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
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
add_action( 'after_setup_theme', 'meetup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meetup_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'meetup_content_width', 640 );
}
add_action( 'after_setup_theme', 'meetup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meetup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'meetup' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'meetup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'meetup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
//Enqueue css and Js file

function add_theme_scripts() {
 
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
  wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css');
  wp_enqueue_style( 'dosis-font', get_template_directory_uri() . '/assets/css/dosis-font.css');
 
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), '' , true);
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/scrolling-nav.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/validator.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_style( 'style', get_stylesheet_uri() );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


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
require get_template_directory() . '/inc/tgm.php';
require get_template_directory() . '/inc/sidebars.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//menu
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/redux-framework/sample/theme-option.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/sample/theme-option.php' );
}








