<?php

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_book_element()
{
	?>
    	<input type="text" name="book_url" id="book_url" value="<?php echo get_option('book_url'); ?>" />
    <?php
}

function display_phone_element()
{
	?>
    	<input type="text" name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>" />
    <?php
}

function display_address_element()
{
	  ?>
    	<textarea type="textarea" rows='7' cols='50' name="address_field" id="address_field" value="<?php echo get_option('address_field'); ?>" ></textarea>
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

	  add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("book_url", "Book Now Url", "display_book_element", "theme-options", "section");
    add_settings_field("phone_number", "Business Phone Number", "display_phone_element", "theme-options", "section");
    add_settings_field("address_field", "Business Address", "display_address_element", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "book_url");
    register_setting("section", "phone_number");
    register_setting("section", "address");
}

add_action("admin_init", "display_theme_panel_fields");

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>K9 Options</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("K9 Options", "K9 Options", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


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
