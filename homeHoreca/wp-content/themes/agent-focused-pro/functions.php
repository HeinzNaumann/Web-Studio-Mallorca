<?php
/**
 * Agent Focused Pro.
 *
 * This file adds functions to the Agent Focused Pro Theme.
 *
 * @package Agent Focused Pro
 * @author  Marcy Diaz for Winning Agent
 * @license GPL-2.0-or-later
 * @link    https://www.winningagent.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'agentfocused_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function agentfocused_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );
}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

// Adds community custom post type.
require_once get_stylesheet_directory() . '/lib/community-post-types.php';

// Adds community widget.
require_once get_stylesheet_directory(). '/lib/widgets/agentfocused-widgets.php';

// Adds dashboard widget.
require_once get_stylesheet_directory() . '/lib/dashboard-widget/agentfocused-dashboard-widget.php';

add_action( 'wp_enqueue_scripts', 'agentfocused_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function agentfocused_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style(
		'agentfocused-ionicons',
		'//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
		array(),
		genesis_get_theme_version()
	);

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}
}

add_action( 'after_setup_theme', 'agentfocused_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function agentfocused_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add Visual Editor stylesheet.
add_editor_style( 'editor-style.css' );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu into site header.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 11 );

// Repositions the secondary navigation menu into footer.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 8 );

add_filter( 'wp_nav_menu_args', 'agentfocused_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function agentfocused_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;
}

// Add Footer Bottom widget area.
add_action( 'genesis_after_footer', 'agentfocused_add_footer_bottom_widget_area', 12 );
function agentfocused_add_footer_bottom_widget_area() {

	if ( is_active_sidebar( 'footer-bottom' ) ) {
		genesis_widget_area( 'footer-bottom', array(
			'before' => '<div class="footer-bottom"><div class="wrap"><div class="widget-area">',
			'after'  => '</div></div></div>',
		) );
	}
 
}


// Add image sizes.
add_image_size( 'large-featured-image', 1350, 540, true ); // Large Featured on Single Pages/Posts.
add_image_size( 'properties', 460, 460, true ); // For AgentPress Listings widget.
add_image_size( 'af-featured-community', 900, 450, true ); // For blog and AFP communities archives.

// Add large featured image outside of content.
add_action( 'genesis_after_header', 'agentfocused_large_featured_image' );
function agentfocused_large_featured_image() {

	global $post;

	$image = genesis_get_image( array(
		'format' => 'url',
		'size'   => 'large-featured-image',
		'num'    => 0,
		'fallback' => 'false',
	) );

	if ( ! is_singular() || ! $image ) {
		return;

	} else {

		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

		echo '<div class="large-featured"><div class="large-entry-image" style="background-image: url( ' . esc_url( $image ) . ' );">';
		echo '</div></div>';
	}
}

// Customize 'Read More' text.
add_filter( 'excerpt_more', 'agentfocused_read_more_link' );
add_filter( 'get_the_content_more_link', 'agentfocused_read_more_link' );
add_filter( 'the_content_more_link', 'agentfocused_read_more_link' );
function agentfocused_read_more_link( $more ) {

	$new_a11y_read_more_title = sprintf( '<span class="screen-reader-text">%s %s</span>', __( 'about ', 'agentfocused' ), get_the_title() );

	return sprintf( ' ... <a href="%s" class="more-link">%s %s</a>', get_permalink(), __( '&#187; Leer más', 'agentfocused' ), $new_a11y_read_more_title );
}

// Remove post info on all, but posts.
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'agentfocused_post_post_info', 11 );
function agentfocused_post_post_info() {

	if ( ! ( is_singular( 'post' ) || is_home() ) ) {
		return;
	}

	add_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

// Add community Type to community Post Meta.
add_filter( 'genesis_post_meta', 'agentfocused_community_post_meta' );
function agentfocused_community_post_meta( $post_meta ) {

	if ( 'wap-community' === get_post_type() ) {

		$post_meta = '[post_terms taxonomy="wap-community-type" before="community Type: "]';
		return $post_meta;

	} else {

		return $post_meta;
	}
}

// Add archive description to AgentPress Listings.
add_action( 'init', 'agentfocused_custom_init' );
function agentfocused_custom_init() {
	add_post_type_support( 'listing', 'genesis-cpt-archives-settings' );
}

// Change size of the user profile Gravatar.
add_filter( 'genesis_gravatar_sizes', 'agentfocused_user_profile_gravatar' );
function agentfocused_user_profile_gravatar( $sizes ) {

	$sizes['Agent Profile Image'] = 236;
	return $sizes;
}

add_filter( 'genesis_author_box_gravatar_size', 'agentfocused_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function agentfocused_author_box_gravatar( $size ) {

	return 140;
}

add_filter( 'genesis_comment_list_args', 'agentfocused_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function agentfocused_comments_gravatar( $args ) {

	$args['avatar_size'] = 120;
	return $args;
}

// Setup widget counts.
function agentfocused_count_widgets( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}
}

// From Digital Pro Flexible widget classes.
function agentfocused_widget_area_class( $id ) {

	$count = agentfocused_count_widgets( $id );

	$class = '';

	if( $count == 1 ) {
		$class .= ' widget-full';
	} elseif( $count % 3 == 1 ) {
		$class .= ' widget-thirds';
	} elseif( $count % 4 == 1 ) {
		$class .= ' widget-fourths';
	} elseif( $count % 2 == 0 ) {
		$class .= ' widget-halves uneven';
	} else {	
		$class .= ' widget-halves even';
	}
	return $class;
}




// Register widget areas.
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'agentfocused' ),
	'description' => __( 'This is the front page 1 section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'search-bar',
	'name'        => __( 'Search Bar', 'agentfocused' ),
	'description' => __( 'This is the search bar section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2-left',
	'name'        => __( 'Front Page 2 Left', 'agentfocused' ),
	'description' => __( 'This is the front page 2 left section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2-right',
	'name'        => __( 'Front Page 2 Right', 'agentfocused' ),
	'description' => __( 'This is the front page 2 right section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'agentfocused' ),
	'description' => __( 'This is the front page 3 section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'agentfocused' ),
	'description' => __( 'This is the front page 4 section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'agentfocused' ),
	'description' => __( 'This is the front page 5 section.', 'agentfocused' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-6',
	'name'        => __( 'Front Page 6', 'agentfocused' ),
	'description' => __( 'This is the front page 6 section.', 'agentfocused' ),
) );

genesis_register_sidebar( array(
	'id'          => 'footer-bottom',
	'name'        => __( 'Footer Bottom', 'agentfocused' ),
	'description' => __( 'This is the footer bottom section.', 'agentfocused' ),
) );


//* Register 'footer-left' and 'footer-right' widget areas.
genesis_register_sidebar(
    array(
    'id'          => 'footer-left',
    'name'        => __('Footer Left', 'theme-prefix'),
    'description' => __('This is a footer left widget area and will show at left side.', 'themeprefix'),
    ) 
);
genesis_register_sidebar(
    array(
    'id'          => 'footer-right',
    'name'        => __('Footer Right', 'theme-prefix'),
    'description' => __('This is a footer right widget area and will show at right side.', 'themeprefix'),
    ) 
);

//* Add these two widget areas at site footer area.
add_action('genesis_footer', 'themeprefix_do_footer', 9);
function themeprefix_do_footer() {
    if(! is_active_sidebar('footer-left') && ! is_active_sidebar('footer-right') ) {
        return;
    }
     
    //* Remove default copyright text area .
    remove_action('genesis_footer', 'genesis_do_footer');
  
    //* Add a filter in Text widget. So shortcode will work in Text widget.
    add_filter('widget_text', 'do_shortcode');
  
    if(is_active_sidebar('footer-left') ) {
        genesis_widget_area(
            'footer-left', array(
            'before' => '<div class="footer-widget-area footer-left" id="footer-left">',
            'after'  => '</div>',
            ) 
        );
    }
  
    if(is_active_sidebar('footer-right') ) {
        genesis_widget_area(
            'footer-right', array(
            'before' => '<div class="footer-widget-area footer-right" id="footer-right">',
            'after'  => '</div>',
            ) 
        );
    }
}



//register the widget área, you need after this to add the next part of code

genesis_register_sidebar ( array (
	'id' => 'mi_id',
	'name' => __ ('before footer', 'genesis' ),
	'description' =>__( 'aqui va nuestra description', 'Childtheme' ),
	) );
	
	
	
	
//add the génesis action where you want

add_action( 'genesis_before_footer', 'add_genesis_widget_area2');
function add_genesis_widget_area2() {
genesis_widget_area ( 'mi_id', array(
'before' => '<div class="prueba">',
'after' => '</div>',
) );

}




//adding widget for call to action
genesis_register_sidebar ( array (
	'id' => 'my_widget',
	'name' => __ ('Call to action', 'genesis' ),
	'description' =>__( 'aqui va nuestra description', 'Childtheme' ),
	) );
	
//adding widget for call to action

add_action( 'genesis_before_footer', 'add_genesis_widget_area3');
function add_genesis_widget_area3() {
genesis_widget_area ( 'my_widget', array(
'before' => '<div class="my_prueba">',
'after' => '</div>',
) );

}
//adding widget for products carousel
genesis_register_sidebar ( array (
	'id' => 'my_widget2',
	'name' => __ ('Products carousel', 'genesis' ),
	'description' =>__( 'aqui va nuestra description', 'Childtheme' ),
	) );

	
	
//adding widget for products carousel

add_action( 'genesis_after_entry', 'add_genesis_widget_area4');
function add_genesis_widget_area4() {


	if ( is_single()) {

	genesis_widget_area ( 'my_widget2', array(
		'before' => '<div class="my_prueba2">',
		'after' => '</div>',
		) );

	} 


}



//removing map from all the pages, if it is not front and not Contacto
add_action( 'genesis_before_footer', 'remove_widget2', 4 );
	function remove_widget2() {
	/**
	 * @author Brad Dalton
	 * @link https://wp.me/p1lTu0-gX3
	 */

	if ( ! is_front_page() && ! is_page('9') ) {

	

	remove_action( 'genesis_before_footer', 'add_genesis_widget_area2' );

		}
		
}



//removing Call to action from the front page
add_action( 'genesis_before_footer', 'remove_widget3', 4 );
function remove_widget3() {
	
	
	if ( is_front_page()   ) {
	
	remove_action( 'genesis_before_footer', 'add_genesis_widget_area3' );
	
	} 

}



//removing Call to action from Contactos page
add_action( 'genesis_before_footer', 'remove_widget7', 4 );
function remove_widget7() {
	
	
	if (is_page('9')  ) {
	
	remove_action( 'genesis_before_footer', 'add_genesis_widget_area3' );
	
	} 

}



//removing products carousel from Contactos page
add_action( 'genesis_after_entry', 'remove_widget6', 4 );
function remove_widget6() {
	
	

	if (is_page('9')) {
	
		
	remove_action( 'genesis_after_entry', 'add_genesis_widget_area4' );
	
	} 

}




//removing products carousel from Contactos page
add_action( 'genesis_before_footer', 'remove_widget_partners', 4 );
function remove_widget_partners() {
	
	

	if (is_page('9') || is_single()) {
	
		
	remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
	
	} 

}
