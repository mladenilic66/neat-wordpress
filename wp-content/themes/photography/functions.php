<?php
/**
 * photography functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photography
 */

if ( ! function_exists( 'photography_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function photography_setup() {

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


        // custom image sizes.
		add_image_size("hero", 1620, 700, true);
		add_image_size("slider", 1060, 500, true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( [
		    'header-menu' => 'Main Top Location',
		    'footer-menu' => 'Footer Location'
        ] );

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
		add_theme_support( 'custom-background', apply_filters( 'photography_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'photography_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


function photography_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'photography_content_width', 640 );
}
add_action( 'after_setup_theme', 'photography_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function photography_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'photography' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'photography' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'vencanje' ),
        'id'            => 'footer_1',
        'description'   => esc_html__( 'Add widgets here.', 'vencanje' ),
        'before_widget' => '<div class="col-md-3 fh5co-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'photography_widgets_init' );




/**
 * Enqueue scripts.
 */

function photography_scripts() {

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 3.3, true );

	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', 1.3, true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', 2.6, true );

	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', 'jquery', 0.9, true );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', 'jquery', 2.1, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', 'jquery', 4.0, true );

	wp_enqueue_script( 'magnific-popup-options', get_template_directory_uri() . '/js/magnific-popup-options.js', 'jquery', 1.0, true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery', 1.0, true);

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', 2.6 );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photography_scripts' );




/**
 * Enqueue styles.
 */

function photography_styles() {

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );

	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );

	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/css/icomoon.css' );

	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_styles', 'photography_styles' );


// iniciate acf options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
}

/**
 * sync wordpress version to jquery migrate lib.
 */


add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
});



/**
 * delete custom post types.
 */
function delete_post_type(){
    unregister_post_type('theme_settings');
    unregister_post_type('custom_post');
}
add_action('init','delete_post_type');



/**
 * all custom functions.
 */

// debugging tool
function debug($input, $die = false) {
    echo '<pre>';
    print_r($input);
    echo '</pre>';
    if ($die) {
        die();
    }
}

// dynamic title tag
function custom_title($separator = "|") {
	$title = wp_title($separator,true,right);
    $title .= bloginfo( 'name' );

    return $title;
}


// limiting number of characters
function short_text($data,$limit = 10,$endpoint = "...") {
    if (strlen($data) > $limit) {
        $data = substr($data, 0, $limit).$endpoint;
    }
    return $data;
}

// limiting number of words
// function get_first_x_words($text, $words = 7,$endpoint = "...") {
//     $text = wp_strip_all_tags($text);
//     $text = trim(preg_replace('/\s+/', ' ', $text)); // Remove new lines
//     $textAR = explode(' ', $text);
//     $text = array_slice($textAR, 0, $words);
//     return implode(" ", $text) . $endpoint;
// }


// showing short format date
function date_short($data,$format = "d m Y") {
    $data = strtotime($data);
    $data = date($format, $data);
    return $data;
}


/**
 * all included files.
 */

require get_template_directory() . '/inc/post_types.php';