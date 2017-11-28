<?php

function sample_posttype() {

    register_post_type( 'sample',
        array(
            'labels' => array(
                
                'name' => __('Samples', 'textdomain'),
                'singular_name' => __('Sample', 'textdomain'),
                'add_new_item'  => __('New Sample' ,'textdomain'),
                'view_item'     => __('View Sample', 'textdomain')
            ),
            'public' 	   => true,
            'has_archive'  => true,
            'hierarchical' => true,
            'supports' => array('title', 'author', 'page-attributes'),
            'rewrite'  => array('slug' => 'sample'),
        )
    );
}

//add_action( 'init', 'sample_posttype' );