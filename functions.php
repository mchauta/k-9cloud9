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
        'singular_name' => __( 'Review' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'reviews'),
    )
  );
}
add_action( 'init', 'create_reviews' );
