<?php
/**
 * Norberg 2017 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UG_2017
 */

add_filter('jpeg_quality', function($arg){ return 95; });

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


function removejQuery() {
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-ui' );
}
add_action( 'wp_enqueue_scripts', 'removejQuery' );

function post_data($postID, $name) {
	$cf = get_post_meta($postID, 'wpcf-'.$name);
	$cf = $cf[0];
	if($cf) echo $cf;
}
function get_post_data($postID, $name) {
	$cf = get_post_meta($postID, 'wpcf-'.$name);
	$cf = $cf[0];
	if($cf) return $cf;
}
function get_post_datas($postID, $name) {
	$cf = get_post_meta($postID, 'wpcf-'.$name);
	if($cf) return $cf;
}

if(!function_exists('get_match')) {
	function get_match( $regex, $content ) {
	    preg_match($regex, $content, $matches);
	    return $matches[1];
	}
}


function debug($msg)
{
	// prints objects, arrays or variables
	echo "<xmp style='position: fixed; top: 0; left: 50%; width: 600px; white-space: pre; overflow: scroll; padding: 10px; margin: 0 0 0 -300px; background: rgba(0,0,0,0.8); font-size: 12px; line-height: 1.2em; color: #EEE;'>======================================= DEBUG =======================================\n\n";
		if(is_array($msg) || is_object($msg)) print_r($msg);
		else echo $msg;
	echo "\n\n=====================================================================================</xmp>";
}





// header menu
// class Header_Walker extends Walker
// {
//     public function walk( $elements, $max_depth )
//     {
//         $list = array ();
//         $wfpte = false;
//         foreach ( $elements as $item ) {
//           $classesAr = $item->classes;
//           $classesStr = join(' ', $classesAr);
//           $classes = 'nav-item '.$classesStr;
//           if($item->menu_item_parent) $classes = $classes." child hidden";
//           $cont_start = '';
//           $cont_end = '';
//           $cont_inside_a = '';
//           if( $item->menu_item_parent == 0 && $wfpte == true ) {
//             $wfpte = false;
//             $cont_start = "</div>";
//           }
//           if (strpos($classes, 'has-children') !== false) {
//             $cont_start = "<div class='parent-container'>";
//             $cont_inside_a = '<i class="ion-ios-arrow-down is-small"></i>';
//             $wfpte = true;
//           }
//           $list[] = $cont_start."<a href='$item->url'  class='$classes'>".$item->title.$cont_inside_a."</a>".$cont_end;
//
//         }
//         return join( "\n", $list );
//     }
// }





// footer menu
// class WPSE_33175_Simple_Walker extends Walker
// {
//     public function walk( $elements, $max_depth )
//     {
//         $list = array ();
//         foreach ( $elements as $item )
//             $list[] = "<a class='nav-item' href='$item->url'>$item->title</a>";
//         return join( "\n", $list );
//     }
// }






if ( ! function_exists( 'norberg2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function norberg2017_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Norberg 2017, use a find and replace
	 * to change 'UG_2017' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'UG_2017', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

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
		'menu-1' => esc_html__( 'Primary', 'UG_2017' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		// 'comment-form',
		// 'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'norberg2017_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'norberg2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function norberg2017_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'norberg2017_content_width', 1152 );
}
add_action( 'after_setup_theme', 'norberg2017_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function norberg2017_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'UG_2017' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'UG_2017' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'norberg2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function norberg2017_scripts() {
	wp_enqueue_style( 'UG_2017-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'UG_2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'UG_2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'norberg2017_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';
