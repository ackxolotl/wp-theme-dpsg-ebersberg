<?php
/**
 * dpsg-ebersberg functions and definitions
 *
 * @package dpsg-ebersberg
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'dpsg_ebersberg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function dpsg_ebersberg_setup() {

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on dpsg-ebersberg, use a find and replace
		 * to change 'dpsg-ebersberg' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'dpsg-ebersberg', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		//add_theme_support( 'post-thumbnails' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'dpsg-ebersberg' ),
		) );

		/**
		 * Enable support for Post Formats
		 */
		//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		/**
		 * Setup the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'dpsg_ebersberg_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif; // dpsg_ebersberg_setup
add_action( 'after_setup_theme', 'dpsg_ebersberg_setup' );

include 'bp_widget.php';

// register Baden_Powell widget
function register_bp_widget() {
	register_widget( 'Baden_Powell' );
}
add_action( 'widgets_init', 'register_bp_widget' );

// Image sizes

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'article-large', 900, 375, true );
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function dpsg_ebersberg_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dpsg-ebersberg' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s hyphenate">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dpsg_ebersberg_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function dpsg_ebersberg_scripts() {
	wp_enqueue_style( 'dpsg-ebersberg-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dpsg-ebersberg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dpsg-ebersberg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'dpsg-ebersberg-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'dpsg_ebersberg_scripts' );

/**
 * Hier kommt mein Code
 */

if ( function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}

/**
 * Force post titles.
 */
function force_post_title_init()
{
	wp_enqueue_script('jquery');
}
function force_post_title()
{
	echo "<script type='text/javascript'>\n";
	echo "
  jQuery('#publish').click(function(){
	var testervar = jQuery('[id^=\"titlediv\"]')
	.find('#title');
	if (testervar.val().length < 1)
	{
	    setTimeout(\"jQuery('#ajax-loading').css('visibility', 'hidden');\", 100);
	    alert('Bitte gib einen Titel ein!');
	    setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
	    jQuery('[id^=\"title\"]').focus();
	    return false;
	}
    });
  ";
	echo "</script>\n";
}
add_action('admin_init', 'force_post_title_init');
add_action('edit_form_advanced', 'force_post_title');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
