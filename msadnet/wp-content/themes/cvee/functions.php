<?php
/**
 * cvee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cvee
 */

if ( ! function_exists( 'cvee_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cvee_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cvee, use a find and replace
		 * to change 'cvee' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cvee', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*Allows to link a custom stylesheet file to the TinyMCE visual editor.*/
		add_editor_style();

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'cvee' ),
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

		//Add responsive embed for Gutenberg
		add_theme_support( 'responsive-embeds' );


		//Add default Gutenberg editor styles
		add_theme_support( 'wp-block-styles' );


		//Add Gutenberg image align wide feature
		add_theme_support( 'align-wide' );

		
		//Add support for gutenberg custom line height units
		add_theme_support( 'custom-units', 'rem', 'em', 'px', 'vw', 'vh' );

		//Spacing control 
		add_theme_support('custom-spacing');

		//  support theme editor styles
		add_theme_support( 'editor-styles' );

	 	// Link color control (Experiemental)
		add_theme_support('experimental-link-color');


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cvee_custom_background_args', array(
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
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cvee_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cvee_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cvee_content_width', 640 );
}
add_action( 'after_setup_theme', 'cvee_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cvee_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cvee' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cvee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'cvee' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'cvee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage', 'cvee' ),
		'id'            => 'frontpage-1',
		'description'   => esc_html__( 'Add Frontpage widgets here.', 'cvee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cvee_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cvee_scripts() {
	wp_enqueue_style( 'cvee-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cvee-sidr', get_template_directory_uri() . '/js/sidr.js', array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'cvee-js', get_template_directory_uri() . '/js/cv.js', array('jquery'), '0.0.1', true );
	wp_enqueue_style('FontAwesome',get_template_directory_uri().'/assets/fonts/fontawesome-all.css', array(), '5.0.13' );
	wp_enqueue_script( 'cvee-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cvee_scripts' );


// WordPress 5.2 theme new standard
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}


//google font enqueue
function cvee_google_fonts() {
	$query_args = array(
		'family' => 'Lato:100,300|Source+Sans:100,500,300,600,latin-ext',
	);
	wp_enqueue_style( 'cvee_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
    }
            
add_action('wp_enqueue_scripts', 'cvee_google_fonts'); 



/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'More' link.
 */
function cvee_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'More<span class="screen-reader-text"> "%s"</span>', 'cvee' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'cvee_excerpt_more' );


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
 * Theme activation redirector
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/dashboard/cvee-info-dashboard.php');




/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-function.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load theme upsell
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/trt-customize-pro/example-1/class-customize.php' );


/**
 * Frontpage widgets
 */
require get_template_directory() . '/inc/widgets/front-intro-one.php';
require get_template_directory() . '/inc/widgets/front-experience-three.php';
require get_template_directory() . '/inc/widgets/front-education-one.php';
require get_template_directory() . '/inc/defaults.php';





// Font size presets
function cvee_theme_setup_font_presets() {
	add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => __( 'Small', 'cvee' ),
        'size' => 12,
        'slug' => 'small'
    ),
    array(
        'name' => __( 'Regular', 'cvee' ),
        'size' => 16,
        'slug' => 'regular'
    ),
    array(
        'name' => __( 'Large', 'cvee' ),
        'size' => 36,
        'slug' => 'large'
    ),
    array(
        'name' => __( 'Huge', 'cvee' ),
        'size' => 50,
        'slug' => 'huge'
	    )
	) );
}

add_action( 'after_setup_theme', 'cvee_theme_setup_font_presets' );


// add color palette support
function cvee_setup_theme_supported_color() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Light Blue', 'cvee' ),
            'slug' => 'light-blue',
            'color' => '#d3e9f3',
        ),
        array(
            'name' => __( 'Material Green', 'cvee' ),
            'slug' => 'material-green',
            'color' => '#4CAF50',
        ),
        array(
            'name' => __( 'Light Gray', 'cvee' ),
            'slug' => 'light-gray',
            'color' => '#eee',
        ),
        array(
            'name' => __( 'Dark', 'cvee' ),
            'slug' => 'dark-gray',
            'color' => '#111',
	        ),
	    ) );
}
 
add_action( 'after_setup_theme', 'cvee_setup_theme_supported_color' );
