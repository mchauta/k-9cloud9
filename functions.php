<?php

//debug the template name being used
add_action('wp_head', 'mchauta_show_template');
function mchauta_show_template() {
    global $template;
    $template_name= basename($template);
    if ( class_exists( 'PC' ) ) { PC::debug($template_name, 'The template being used:');}
}
