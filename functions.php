<?php
/**
 * TestTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TestTheme
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
}

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
function testtheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on TestTheme, use a find and replace
		* to change 'testtheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'testtheme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Default', 'testtheme' ),
			'bottom-menu' => esc_html__( 'Bottom menu', 'testtheme' ),
			'top-menu' => esc_html__( 'Top menu', 'testtheme' ),
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
			'testtheme_custom_background_args',
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
add_action( 'after_setup_theme', 'testtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function testtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'testtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'testtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testtheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'testtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'testtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'testtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testtheme_scripts() {
	wp_enqueue_style( 'testtheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'testtheme-aos', "https://unpkg.com/aos@2.3.1/dist/aos.css", array(),2.3);
	wp_style_add_data( 'testtheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'testtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-slideshow', get_template_directory_uri() . '/js/slideshow.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-animatedButton', get_template_directory_uri() . '/js/animatedButton.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-popup', get_template_directory_uri() . '/js/popup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-backToTopButton', get_template_directory_uri() . '/js/backToTopButton.js', array('testtheme-jQuery'), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-jQuery', "https://code.jquery.com/jquery-3.6.0.js", array(), 3.6, true );
	wp_enqueue_script( 'testtheme-wordCount', get_template_directory_uri() . '/js/wordCount.js', array('testtheme-jQuery'), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-aos', "https://unpkg.com/aos@2.3.1/dist/aos.js",array(),2.3,true);
	wp_enqueue_script( 'testtheme-headroom', "https://unpkg.com/headroom.js", array(),'',true);
	wp_enqueue_script( 'testtheme-timeleft',get_template_directory_uri() . "/js/timeLeft.js",array(), _S_VERSION, true );
	wp_enqueue_script( 'testtheme-weather',get_template_directory_uri() . "/js/weather.js",array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'testtheme_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * function to add an image in the middle of a post
 */
function testtheme_myfunction(){
	$content = get_the_content(); //get the content of the post
	$count = substr_count( $content, '</p>' ); //count the number of paragraph
	$middle = round($count/2, 0, PHP_ROUND_HALF_UP);//find the middle of the post
	$myimage = wp_get_attachment_image(get_field('advert_image'));//get an image using its ID
	$my_paragraph=explode('<p>',$content);
	$my_paragraph[$middle].='<p style="text-align:center;">'.$myimage.'</p>';
	$content=implode($my_paragraph, '<p>');
	echo $content;
}