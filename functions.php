<?php

function global_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/build/css/style.min.css', array());

    wp_enqueue_script('vendor', get_template_directory_uri() . '/build/js/vendors.min.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/build/js/custom.min.js', array('vendor'));

//    if (is_page(48)) {
//        wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAkbu04rf_WBmWQhuo9c5K8DV1jrsK3Hlw', array('jquery'));
//    }
}

add_action('wp_enqueue_scripts', 'global_scripts');


function remove_head_scripts()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    remove_action('wp_head', 'wp_print_styles', 99);
    remove_action('wp_head', 'wp_enqueue_style', 99);


    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
    add_action('wp_head', 'wp_print_styles', 30);
    add_action('wp_head', 'wp_enqueue_style', 30);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');


show_admin_bar(false);


add_theme_support('menus');