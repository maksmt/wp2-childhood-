<?php
add_action('wp_enqueue_scripts','childhood_scripts');


function childhood_scripts(){
    wp_enqueue_style('childhood-style', get_stylesheet_uri());
    
    wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js',array(),null, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
    wp_enqueue_script('jquery');
}

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );


function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyAq50cK1pCfj3p9L_S6UpmNEhJuPHnc6A8'; // Ваш ключ Google API
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);

function filter_nav_menu_link_attributes($atts, $item, $args){
    if($args->menu === 'Main'){
        $atts['class'] = 'header__nav-item';

        if($item->current){
            $atts['class'] .= ' header__nav-item-active';
        }
        if($item->ID=== 177 && (in_category('soft_toys')) || (in_category('edu_toys'))){
            $atts['class'] .= ' header__nav-item-active';
        }
    }
    return $atts;
}

?>