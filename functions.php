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
	add_image_size( 'spec_thumb', 480, 320, true );
	add_image_size( 'testimonial_thumb', 150, 225, true );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'vetapteka' ),
	) );
	add_filter( 'nav_menu_css_class', '__return_empty_array' );
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
add_action( 'after_setup_theme', 'vetapteka_setup' );

/**
 * Enqueue scripts and styles.
 */
function vetapteka_scripts() {
	wp_enqueue_style( 'vetapteka-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vetapteka-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style( 'vetapteka-carousel-style', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style( 'vetapteka-main-style', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'vetapteka-media',  get_template_directory_uri() . '/css/media.css');
		
	wp_enqueue_script( 'vetapteka-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20151215',true );
	wp_enqueue_script( 'vetapteka-jquery',get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(),'3.4.1' , true );
   	wp_enqueue_script( 'vetapteka-carousel-js',get_template_directory_uri() . '/js/owl.carousel.js', array(), NULL, true );
   	wp_enqueue_script( 'vetapteka--main-js',get_template_directory_uri() . '/js/main.js', array(), NULL, true );
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
* Add search form in menu
*/
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
 
function add_search_box( $items, $args ) {
    $items .= '<li>' . get_search_form( false ) . '</li>';
    return $items;
}

/**
* Top header options
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

/**
* Custom background for section
**/
function vetapteka_get_background($field, $cat = null){
    if( get_field($field, $cat) ){
       return ' style="background: url(' . get_field($field, $cat) . ') fixed 50% 50%; "';
    }
    return null;
}

/**
*  Pagination
**/
function vet_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => false,
        'previous_string' => __( '«', 'text-domain' ),
        'next_string'     => __( '»', 'text-domain' ),
        'before_output'   => '<div class="pagination">',
        'after_output'    => '</div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'vet_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    if ( $previous && (1 != $page) )
        $echo .= '<a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<a class="active">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</a>';
            } else {
                $echo .= sprintf( '<a href="%s">%2d</a>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a>';
    
    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}
/**
*  Changing comment form fields
*/
add_filter('comment_form_fields', 'vet_reorder_comment_fields' );
function vet_reorder_comment_fields( $fields ){
	

	$new_fields = array(); 

	$myorder = array('author','email','comment'); 
	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}
/**
*  Comment markup HTML output
*/
function vet_list_comment( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
		<div class="media-heading">
			<div class="media-img">
				<?php 
					echo get_avatar( $comment, 95, '', '', array('class'=>'media-object img-rounded') );
			 	?>	
			</div>
			<?php
				printf(
					__( '<h4>%s</h4>' ),
					get_comment_author()
				);			
			?>
			<?php 
				printf(
					__('<h4><span>%1$s</span></h4>'),
					get_comment_date()
				);
			?>
		</div>		
		<div class="media-body">
			
			<?php if ( $comment->comment_approved == '0' ) { ?>
			<em class="comment-awaiting-moderation">
				<?php _e( 'Ваш комментар очікує модерації.' ); ?>
			</em><br/>
			<?php } ?>
			<?php comment_text(); ?>
		
			<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						)
					)
				); ?>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) { ?>
	
	<?php }
}
/**
* Footer icon
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
* Slider
**/
function slider_posts(){  
	$labels = array(  
		'name' => 'Слайдери', 
		'singular_name' => 'Слайдер', 
		'add_new' => 'Додати новий',  
		'add_new_item' => 'Додати новий слайдер',  
		'edit_item' => 'Редагувати слайдер',  
		'new_item' => 'Новий слайдер',  
		'view_item' => 'Подивитись слайдер',  
		'search_items' => 'Знайти слайдер',  
		'not_found' =>  'Слайдер не знайдено',  
		'not_found_in_trash' => 'В корзині слайдера не знайдено',  
		'parent_item_colon' => '',  
		'menu_name' => 'Слайдери'  
	);  
	$args = array(  
		'labels' => $labels,  
		'public' => true,  
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,  
		'rewrite' => true,  
		'capability_type' => 'post',  
		'has_archive' => true,  
		'hierarchical' => false,  
		'menu_position' => 40, 
		'menu_icon' => 'dashicons-images-alt' ,
		'supports' => array('title', 'thumbnail')  
	);  
	register_post_type('slider', $args);  
}
add_action('init', 'slider_posts');

/**
* Testimonial
**/
function testimonial_posts(){  
	$labels = array(  
		'name' => 'Відгуки', 
		'singular_name' => 'Відгук', 
		'add_new' => 'Додати новий',  
		'add_new_item' => 'Додати новий відгук',  
		'edit_item' => 'Редагувати відгук',  
		'new_item' => 'Новий відгук',  
		'view_item' => 'Подивитись відгук',  
		'search_items' => 'Знайти відгук',  
		'not_found' =>  'Відгук не знайдено',  
		'not_found_in_trash' => 'В корзині відгука не знайдено',  
		'parent_item_colon' => '',  
		'menu_name' => 'Відгуки'  
	);  
	$args = array(  
		'labels' => __( $labels, 'vetapteka' ),  
		'public' => true,  
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,  
		'rewrite' => true,  
		'capability_type' => 'post',  
		'has_archive' => true,  
		'hierarchical' => false,  
		'menu_position' => 55,
		'menu_icon' => 'dashicons-id' ,
		'supports' => array('title', 'editor', 'author', 'thumbnail'),
		'taxonomies' => array( 'category' ),  
	);  
	register_post_type('testimonial_slider', $args);  
}
add_action('init', 'testimonial_posts');

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post',  $labels); 
    $query->set('post_type',$post_type);
    return $query;
    }
}

/**
* Text widget 
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
* Widget Google maps
**/
register_sidebar(array(
		'name' => 'Мапа Google',
		'id' => 'map',
		'description' => 'Використовуйте віджет Текст для додавання HTML-кода',
		'before_widget' => '',
		'after_widget' => ''
	)
);
