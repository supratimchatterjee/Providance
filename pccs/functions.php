<?php
/**
 * PCCS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PCCS
 */

if ( ! function_exists( 'pccs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pccs_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on PCCS, use a find and replace
	 * to change 'pccs' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pccs', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'pccs' ),
		'footer' => esc_html__( 'Footer', 'pccs' ),
		'top_menu' => esc_html__( 'Top Menu', 'pccs' ),
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

}
endif;
add_action( 'after_setup_theme', 'pccs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pccs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pccs_content_width', 1280 );
}
add_action( 'after_setup_theme', 'pccs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pccs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Blog Index', 'pccs' ),
		'id'            => 'sidebar-blog-index',
		'description'   => esc_html__( 'Add widgets here.', 'pccs' ),
		'before_widget' => '<div id="%1$s" class="uk-panel uk-panel-box widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar two column', 'pccs' ),
		'id'            => 'sidebar-two-column',
		'description'   => esc_html__( 'Add widgets here.', 'pccs' ),
		'before_widget' => '<div id="%1$s" class="uk-panel uk-panel-box widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'pccs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pccs_scripts() {

	wp_enqueue_style( 'uikit-css', get_stylesheet_directory_uri(). '/css/uikit.css');
	wp_enqueue_style( 'uikit-css-sticky', get_stylesheet_directory_uri(). '/css/components/sticky.css');
	wp_enqueue_style( 'uikit-css-slidenav', get_stylesheet_directory_uri(). '/css/components/slidenav.css');
	wp_enqueue_style( 'uikit-css-dotnav', get_stylesheet_directory_uri(). '/css/components/dotnav.css');
	wp_enqueue_style( 'uikit-css-slideshow', get_stylesheet_directory_uri(). '/css/components/slideshow.css');
	wp_enqueue_style( 'uikit-css-select', get_stylesheet_directory_uri(). '/css/components/form-select.css');

	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri(). '/css/style.css');

	wp_enqueue_script( 'uikit-js', get_stylesheet_directory_uri(). '/js/uikit.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'uikit-js-sticky', get_stylesheet_directory_uri(). '/js/components/sticky.min.js', array('uikit-js'), '1.0', true );
	wp_enqueue_script( 'uikit-js-slideshow', get_stylesheet_directory_uri(). '/js/components/slideshow.min.js', array('uikit-js'), '1.0', true );
	wp_enqueue_script( 'uikit-js-lightbox', get_stylesheet_directory_uri(). '/js/components/lightbox.min.js', array('uikit-js'), '1.0', true );
	//wp_enqueue_script( 'uikit-js-parallax', get_stylesheet_directory_uri(). '/js/components/parallax.min.js', array('uikit-js'), '1.0', true );
	wp_enqueue_script( 'uikit-js-grid', get_stylesheet_directory_uri(). '/js/components/grid.min.js', array('uikit-js'), '1.0', true );
	wp_enqueue_script( 'uikit-js-select', get_stylesheet_directory_uri(). '/js/components/form-select.min.js', array('uikit-js'), '1.0', true );
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri(). '/js/custom.js', false, '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pccs_scripts' );

// Add theme option

if( function_exists('acf_add_options_page') ) {
 
 acf_add_options_page(array(
  'page_title'  => 'Theme General Settings',
  'menu_title' => 'Theme Settings',
  'menu_slug'  => 'theme-general-settings',
  'capability' => 'edit_posts',
  'redirect'  => false
 ));

}

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function custom_excerpt_more( $more ) {
	global $post;
	return sprintf( '... <a class="read-more" href="%1$s">%2$s</a> <i class="uk-icon-angle-right"></i>', get_permalink( get_the_ID() ), __( 'Read More', 'textdomain' ) );
}
add_filter( 'excerpt_more', 'custom_excerpt_more', 99 );


function posts_orderby_lastname ($orderby_statement)  {
	$orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
	return $orderby_statement;
}


if( function_exists('acf_add_local_field_group') ) :
$choices = array();	
$blogusers = get_users();
// Array of WP_User objects.
foreach ( $blogusers as $user ) {
	$choices[$user->ID] = $user->display_name;
}

acf_add_local_field_group(array (
	'key' => 'group_573eec80a608e',
	'title' => 'Staff Information',
	'fields' => array (
		array (
			'key' => 'field_573eec92d75e7',
			'label' => 'Position',
			'name' => '_possition',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_57440d9aa038f',
			'label' => 'Connected Blog Author',
			'name' => '_user',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => $choices,
			'default_value' => array (
			),
			'allow_null' => true,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'staff',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;





