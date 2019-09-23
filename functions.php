<?php
/**
 * Vetapteka functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vetapteka
 */

show_admin_bar(false);


if ( ! function_exists( 'vetapteka_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vetapteka_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Vetapteka, use a find and replace
	 * to change 'vetapteka' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vetapteka', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'vetapteka' ),
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
	add_theme_support( 'custom-background', apply_filters( 'vetapteka_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'vetapteka_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vetapteka_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vetapteka_content_width', 640 );
}
add_action( 'after_setup_theme', 'vetapteka_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vetapteka_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vetapteka' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vetapteka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vetapteka_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vetapteka_scripts() {
	wp_enqueue_style( 'vetapteka-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vetapteka-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style( 'vetapteka-main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'vetapteka-media',  get_template_directory_uri() . '/css/media.css');
	wp_enqueue_style( 'vetapteka-animate',  get_template_directory_uri() . '/css/animate.css');
	
	wp_enqueue_script( 'vetapteka-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20151215' );
	wp_enqueue_script( 'vetapteka-jquery',get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), NULL, true );
    wp_enqueue_script( 'includes_carousel', get_template_directory_uri() . '/js/jquery.waterwheelCarousel.min.js', array(), NULL, true );
    wp_enqueue_script( 'vetapteka_wow', get_template_directory_uri() . '/js/wow.min.js', array(), NULL, true );
	wp_enqueue_script( 'includes_scroll_menu', get_template_directory_uri() . '/js/scroll-menu.js', array(), NULL, true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vetapteka_scripts' );

remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); 

//3.0+
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); 
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 ); // 

add_filter('template_redirect', function(){   if( is_page() ) remove_action( "wp_head", "rel_canonical" ); }); 
add_filter('the_generator', '__return_empty_string'); 

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
* опції
**/
function my_adress_options(){
		add_settings_field(
		'adress', 
		'Адреса', 
		'display_adress',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_adress' 
	);
}
add_action('admin_init', 'my_adress_options');
function display_adress(){
	echo "<input type='text' class='regular-text' name='my_adress' value='" . esc_attr(get_option('my_adress')) . "'>";
}

function my_time_options(){
		add_settings_field(
		'time', 
		'Час роботи', 
		'display_time',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_time' 
	);
}
add_action('admin_init', 'my_time_options');
function display_time(){
	echo "<input type='text' class='regular-text' name='my_time' value='" . esc_attr(get_option('my_time')) . "'>";
}

function my_phone_options(){
		add_settings_field(
		'phone', 
		'Телефон', 
		'display_phone',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_phone' 
	);
}
add_action('admin_init', 'my_phone_options');
function display_phone(){
	echo "<input type='text' class='regular-text' name='my_phone' value='" . esc_attr(get_option('my_phone')) . "'>";
}

function vet_options(){
		add_settings_field(
		'vet', 
		'Ветеринарний лікар', 
		'display_vet',
		'general' 
	);
    
	register_setting(
		'general', 
		'vet_doc' 
	);
}
add_action('admin_init', 'vet_options');
function display_vet(){
	echo "<input type='text' class='regular-text' name='vet_doc' value='" . esc_attr(get_option('vet_doc')) . "'>";
}

/**
* іконки
**/
register_sidebar(array(
		'name' => 'Іконки в футері',
		'id' => 'icons_footer',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода іконок',
		'before_widget' => '',
		'after_widget' => ''
	)
);


/**
* слайдер
*/
register_sidebar(array(
		'name' => 'Слайдер',
		'id' => 'carousel_slides',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода зображень',
		'before_widget' => '',
		'after_widget' => ''
	)
);

/**
* текстовий віджет Мети
**/
register_sidebar(array(
		'name' => 'Віджет Мета ',
		'id' => 'abouttext_widget',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода ',
		'before_widget' => '',
		'after_widget' => ''
	)
);

/**
* відгуки
**/
 register_sidebar(array(
		'name' => 'Віджет Відгук 1',
		'id' => 'testimonial_widget1',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода ',
		 'before_widget' => '<div class="testimonial-text">',
    'after_widget' => '</div>',
     
	)
);
register_sidebar(array(
		'name' => 'Віджет Відгук 2',
		'id' => 'testimonial_widget2',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода ',
		 'before_widget' => '<div class="testimonial-text">',
    'after_widget' => '</div>',
     
	)
);register_sidebar(array(
		'name' => 'Віджет Відгук 3',
		'id' => 'testimonial_widget3',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода ',
		 'before_widget' => '<div class="testimonial-text">',
    'after_widget' => '</div>',
     
	)
);



/**
* текстовий віджет 
**/
register_sidebar(array(
		'name' => 'Віджет текст ',
		'id' => 'text_widget',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода ',
		'before_widget' => '',
		'after_widget' => ''
	)
);
/**
* мапа гугл
**/
register_sidebar(array(
		'name' => 'Мапа Google',
		'id' => 'map',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода',
		'before_widget' => '',
		'after_widget' => ''
	)
);
