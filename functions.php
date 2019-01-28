<?php

//debug the template name being used
add_action('wp_head', 'mchauta_show_template');
function mchauta_show_template() {
    global $template;
    $template_name= basename($template);
    if ( class_exists( 'PC' ) ) { PC::debug($template_name, 'The template being used:');}
}

//disable comments
add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {

	$post = get_post( $post_id );

	if ( 'page' == $post->post_type )
		$open = false;

	return $open;
}

function create_reviews() {
  register_post_type( 'reviews',
    array(
      'labels' => array(
        'name' => __( 'Reviews' ),
        'singular_name' => __( 'Review' ),
        'edit_item' => __( 'Edit Review' ),
        'new_item' => __( 'New Review' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'reviews'),
      'menu_icon'   => 'dashicons-star-empty',
    )
  );
}
add_action( 'init', 'create_reviews' );

function create_services() {
  register_post_type( 'services',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' ),
        'edit_item' => __( 'Edit Service' ),
        'new_item' => __( 'New Service' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies'  => array( 'category' ),
      'supports' => array('title', 'editor','thumbnail', 'revisions', 'page-attributes'),
      'menu_icon'   => 'dashicons-tickets-alt',
    )
  );
}
add_action( 'init', 'create_services' );

function create_dogs() {
  register_post_type( 'dogs',
    array(
      'labels' => array(
        'name' => __( 'Dogs' ),
        'singular_name' => __( 'Dog' ),
        'edit_item' => __( 'Edit Dog' ),
        'new_item' => __( 'New Dog' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies'  => array( 'category' ),
      'supports' => array('title', 'editor','thumbnail', 'revisions', 'page-attributes'),
      'menu_icon'   => 'dashicons-smiley',
    )
  );
}
add_action( 'init', 'create_dogs' );

function img_path($file) {
  $path = '/wp-content/themes/k-9-cloud-9-theme/img/' . $file;
  echo $path;
}
