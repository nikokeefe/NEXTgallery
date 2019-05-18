<?php


function shoreditch_child_setup()  {
  // Prepare theme for translation
  load_child_theme_textdomain('shoreditch-child', get_stylesheet_directory() . '/languages' );

  register_nav_menus( array(
		'secondary' => esc_html__( 'Footer', 'shoreditch-child' ),
		'map' => esc_html__( 'Map', 'shoreditch-child' ),
		'social' => esc_html__( 'Social Media Menu', 'shoreditch-child' )
	) );

}
add_action('after_setup_theme', 'shoreditch_child_setup');


/* Need to Dequeue previous fonts */

function shoreditch_child_scripts() {
  wp_enqueue_style('shoreditch-child-fonts',
    '//fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i|Source+Sans+Pro:400,400i,700,700i');
  wp_dequeue_style('shoreditch-inconsolata');
  wp_dequeue_style('Lato');
}
add_action('wp_enqueue_scripts', 'shoreditch_child_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/../shoreditch-child/inc/template-tags.php';

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}




?>
